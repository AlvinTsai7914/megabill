<?php

require_once '_webapi_tools.php';

//使用者登入POST
function User_Login($dbconnect, $args, $fileData, &$resultData, &$programguid) {
    $programguid = null;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["account", "password", "ip"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $account = $data['account'];  //帳號
    $password = $data['password'];  //密碼
    $ip = $data['ip'];  //密碼

    if (empty($account) || empty($password))
        return E_ACCOUNTORPASSWORDERROR;    //帳號或密碼錯誤

    $id = -1;
    $login_type = -1;
    $status = -1;
    //查詢帳號是否存在及登入驗證模式
    $query = "SELECT `id`, `login_type`, `status` from user WHERE account='$account'";
    if ($result = $dbconnect->query($query)) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $id = $r["id"];
            $login_type = $r["login_type"];
            $status = $r["status"];
        }
    } else
        throw new Exception($dbconnect->error);

    if ($result->num_rows != 1)
        return E_USERACCOUNTNOTFOUND;    //使用者帳號不存在

    if ($status != 0)//檢查帳號狀態
        return E_USERACCOUNTNOTACTIVE;  //帳號未啟用

    if ($login_type == 1) {
        //LDAP驗證
        try {
            $ldapconn = ldap_connect(AD_SERVER);
            if ($ldapconn) {
                $ldab_account = $account;
                if (!empty(AD_SERVER_DOMAIN))
                    $ldab_account = $account . "@" . AD_SERVER_DOMAIN;
                ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($ldapconn, LDAP_OPT_NETWORK_TIMEOUT, 10);
                $bind = @ldap_bind($ldapconn, $ldab_account, $password);
                if (!$bind)
                    return E_LDAPAUTHENTICATIONFAILED;
                else
                    ldap_unbind($ldapconn);
            } else
                return E_LDAPCONNECTFAILED;
        } catch (Exception $ex) {
            return E_LDAPAUTHENTICATIONFAILED;
        }
    } else {
        //系統驗證
        //密碼加密
        $encrypt_PSW = EncryptString($password);
        //檢查帳號、密碼是否正確
        $query = "SELECT `id` from user WHERE account='$account' AND password='$encrypt_PSW'";
        if ($result = $dbconnect->query($query)) {
            if ($result->num_rows != 1)
                return E_ACCOUNTORPASSWORDERROR;    //帳號或密碼錯誤
        } else
            throw new Exception($dbconnect->error);
    }

    $query = "SELECT user_id, token from login_user WHERE user_id='$id'";
    if ($result = $dbconnect->query($query)) {
        $token = CreateGuid();
        if ($result->num_rows <= 0) {//沒有login
            $query = "INSERT INTO `login_user`(`user_id`, `token`) VALUES ('$id', '$token');";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        } else if ($result->num_rows == 1) {//有login
            $r = mysqli_fetch_array($result, MYSQLI_ASSOC);

            //角色編號為1，可以重複登入
            $find = false;
            $role_ids = null;
            if (GetRoleIDByAccessToken($dbconnect, $r["token"], $role_ids) == true) {
                foreach ($role_ids as $role_id) {
                    if ($role_id == 1) {
                        $find = true;
                        break;
                    }
                }
            }
            if ($find == true)
                $token = $r["token"];
            else {
                $query = "UPDATE `login_user` SET `token`='$token' WHERE user_id='$id'";
                if (!$dbconnect->query($query))
                    throw new Exception($dbconnect->error);
            }
        } else //多筆login，錯誤
            return E_UNKNOWNERROR;

        User_UpdateLastLoginDataByID($dbconnect, $id, $ip);
        $resultData = array("token" => $token);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//使用者登出POST
function User_Logout($dbconnect, $token, &$resultData, &$programguid) {
    $programguid = null;

    $resultCode = E_SUCCESS;
    $resultData = null;

//刪除loginuser資料
    $query = "DELETE FROM `login_user` WHERE token='$token'";
    if ($dbconnect->query($query))
        $resultCode = E_SUCCESS;
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢使用者GET
function User_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "6FFF994902F45E92C56C27817E4C8A63";
//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    //組合查詢字串
    $query = User_GetBaseQueryString($onlycount);
    $query = $query . " AND status <= 1";

    if (isset($args[0]) && $args[0] != 0) {
        $id = $args[0];
        $query = $query . " AND id='$id'";
    }

    if (isset($request["query"]))
        $query = $query . " AND (" . $request["query"] . ")";

    if (isset($request["order"]))
        $query = $query . " ORDER BY " . $request["order"];
    else
        $query = $query . " ORDER BY id ASC";

    if ($onlycount == false && isset($request["length"]) && $request["length"] > 0) {
        if (isset($request["start"]))
            $query = $query . " LIMIT " . $request["start"] . "," . $request["length"];
        else
            $query = $query . " LIMIT " . $request["length"];
    }

    $result = $dbconnect->query($query);
    if ($result) {
        if ($onlycount) {
            $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $resultData = $r["COUNT(`id`)"];
        } else {
            while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultData[] = User_BuildQueryResultData($dbconnect, $r);
            }
        }
    } else {
        throw new Exception($dbconnect->error);
    }

    return $resultCode;
}

//新增使用者POST
function User_Create($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "6DFCB35F2D2B76A35E864DEB4923AC16";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["name", "account", "password", "phone", "login_type", "email", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];
    $account = $data['account'];
    $password = $data['password'];
    $phone = $data['phone'];
    $login_type = $data['login_type'];
    $email = $data['email'];
    $status = $data['status'];
    $remark = $data['remark'];

//密碼加密
    $password = EncryptString($password);

//檢查帳號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "account", $account))
        return E_USERACCOUNTALREADYEXISTS;

    $query = "INSERT INTO `user`(`name`, `account`, `password`, `phone`, `login_type`, `email`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$account', '$password', '$phone', '$login_type', '$email', '$status', '$remark', '$loginid', '$loginid');";

    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改使用者PUT
function User_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "6D9B8D251E4F005595D45735AF276A5B";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    if (!isset($args[0]))   //id
        return E_INPUTPARAMETERERROR;

//檢查輸入參數
    $keys = ["name", "phone", "login_type", "email", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $name = $data['name'];
    $phone = $data['phone'];
    $login_type = $data['login_type'];
    $email = $data['email'];
    $status = $data['status'];
    $remark = $data['remark'];

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $id) == false)
        return E_USERIDNOTFOUND;

    $query = "UPDATE `user` SET `name`='$name',`phone`='$phone',`login_type`='$login_type',`email`='$email',`email`='$email',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//刪除使用者DELETE
function User_Delete($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "8154DEBC7B540D07EA5F37DAE7DAC654";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

//檢查使用者編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $id) == false)
        return E_USERIDNOTFOUND;

//不做資料刪除，改將status設定為2
    $query = "UPDATE `user` SET `status`= 2, `u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
//刪除loginuser資料
        $query = "DELETE FROM `login_user` WHERE user_id='$id'";
        @$dbconnect->query($query);
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改使用者密碼PUT
function User_SetPassword($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "3CD3753F6F16C0A08E55770D9556EBC0";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    if (!isset($args[0]))   //id
        return E_INPUTPARAMETERERROR;

//檢查輸入參數
    $keys = ["password"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $password = $data['password'];

//密碼加密
    $password = EncryptString($password);

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $id) == false)
        return E_USERIDNOTFOUND;

    $query = "UPDATE `user` SET `password`='$password', `u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//使用者註冊角色POST
function User_RegisterRole($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "06A86144ACF42137EC3C6CE54C2193B4";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["role_ids", "user_id", "unregisterall"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_ids = $data['role_ids'];
    $role_ids_array = explode(",", $role_ids);
    if (!is_array($role_ids_array))
        return E_INPUTPARAMETERERROR;

    $user_id = $data['user_id'];
    $unregisterall = filter_var($data['unregisterall'], FILTER_VALIDATE_BOOLEAN);

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $user_id) == false)
        return E_USERIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);
        if ($unregisterall == true) {
            $query = "DELETE FROM `role_user` WHERE user_id='$user_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }

        foreach (is_array($role_ids_array) ? $role_ids_array : array() as $role_id) {
            if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
                continue;
            $query = "SELECT `role_id`, `user_id` FROM `role_user` WHERE role_id='$role_id' && user_id='$user_id' ";
            if ($result = $dbconnect->query($query)) {
                if ($result->num_rows <= 0) {
                    $query = "INSERT INTO `role_user`(`role_id`, `user_id`) VALUES ('$role_id', '$user_id');";
                    if (!$dbconnect->query($query))
                        throw new Exception($dbconnect->error);
                }
            } else
                throw new Exception($dbconnect->error);
        }
        $dbconnect->commit();
        $dbconnect->autocommit(true);
    } catch (Exception $ex) {
        $dbconnect->rollback();
        $dbconnect->autocommit(true);
        throw $ex;
    }

    $resultData = array("user_id" => $user_id, "role_ids" => $role_ids);
    return $resultCode;
}

//使用者註銷角色POST
function User_UnregisterRole($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "CF98E0849C98EA9E50AE61104878A87E";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["role_ids", "user_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_ids = $data['role_ids'];
    $role_ids_array = explode(",", $role_ids);
    if (!is_array($role_ids_array))
        return E_INPUTPARAMETERERROR;

    $user_id = $data['user_id'];

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $user_id) == false)
        return E_USERIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);
        foreach (is_array($role_ids_array) ? $role_ids_array : array() as $role_id) {
            $query = "DELETE FROM `role_user` WHERE role_id='$role_id' && user_id='$user_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }
        $dbconnect->commit();
        $dbconnect->autocommit(true);
    } catch (Exception $ex) {
        $dbconnect->rollback();
        $dbconnect->autocommit(true);
        throw $ex;
    }

    $resultData = array("user_id" => $user_id, "role_id" => $role_ids);
    return $resultCode;
}

//使用者註銷所有角色POST
function User_UnregisterAllRoles($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "4B72BE10FF9333E34A5040C6BF424B20";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["user_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $user_id = $data['user_id'];

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $user_id) == false)
        return E_USERIDNOTFOUND;

//檢查權限是否存在
    $query = "DELETE FROM `role_user` WHERE user_id='$user_id'";
    if (!$dbconnect->query($query))
        throw new Exception($dbconnect->error);

    $resultData = array("user_id" => $user_id);
    return $resultCode;
}

//查詢登入使用者資料
function User_GetLoginUserData($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "7B65FAEF91541F99D6247A5A55A31E53";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $loginid)) {
        $query = User_GetBaseQueryString(false);
        $query .= " AND id='$loginid' AND status < 1";

        $result = $dbconnect->query($query);
        if ($result) {
            while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultData[] = User_BuildQueryResultData($dbconnect, $r);
            }
        } else
            throw new Exception($dbconnect->error);
    } else
        return E_USERIDNOTFOUND;

    return $resultCode;
}

//修改登入使用者資料
function User_SetLoginUserData($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "A5389CFCFC0B67A3C5A079D11D487083";

//檢查操作權限
    $loginid = 1;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["name", "phone", "email"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $loginid) == false)
        return E_USERIDNOTFOUND;

    $query = "UPDATE `user` SET `name`='$name',`phone`='$phone',`email`='$email',`u_user_id`='$loginid' WHERE id='$loginid'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $loginid);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改登入使用者密碼
function User_SetLoginUserPassword($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "713911BE9C23CAB930E74618C567DF5B";

//檢查操作權限
    $loginid = 1;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

//檢查輸入參數
    $keys = ["old_password", "new_password"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $old_password = $data['old_password'];
    $new_password = $data['new_password'];

//密碼加密
    $new_password = EncryptString($new_password);
    $old_password = EncryptString($old_password);

//檢查使用者編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "user", "id", $loginid) == false)
        return E_USERIDNOTFOUND;

//檢查帳號、密碼是否正確
    $query = "SELECT `id` from user WHERE id='$loginid' AND password='$old_password'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows != 1)
            return E_OLDPASSWORDERROR;    //帳號或密碼錯誤
    } else
        throw new Exception($dbconnect->error);

    $query = "UPDATE `user` SET `password`='$new_password', `u_user_id`='$loginid' WHERE ID='$loginid'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $loginid);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢登入使用者程式
function User_GetLoginUserProgram($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "A7E8C8FA964DEA5B2E00B6BCD3554366";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!CheckDataExistByFieldValue($dbconnect, "user", "id", $loginid))
        return E_USERIDNOTFOUND;

    $query = "SELECT `user_id`, `user_account`, `user_name`, `user_status`, `role_id`, `role_name`, `role_status`, `program_id`, `program_name`, `program_status`, `program_guid`, `program_remark`, `program_category_id`, `program_category_name`, `program_category_status` FROM `user_role_program_view` WHERE user_id='$loginid' AND program_status < 1 GROUP by program_id ORDER BY program_category_id,program_id";

    if ($result = $dbconnect->query($query)) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultData[] = array("id" => $r['program_id'],
                "category_id" => $r['program_category_id'],
                "category_name" => $r['program_category_name'],
                "name" => $r['program_name'],
                "guid" => $r['program_guid'],
                "remark" => $r['program_remark']);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢登入使用者樹狀選單
function User_GetLoginUserMenuTree($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "820D196327A04D67B430F7E32CC7E08C";

//檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!CheckDataExistByFieldValue($dbconnect, "user", "id", $loginid))
        return E_USERIDNOTFOUND;

    $query = "SELECT `id`, `parent_id`, `name`, `url`, `icon`, `program_ids`,`remark` FROM `user_role_menu_view` WHERE user_id='$loginid' AND status < 1 GROUP BY id ORDER BY list_order";
    if ($result = $dbconnect->query($query)) {
        $bufferData = null;
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $bufferData[] = array("id" => $r['id'],
                "parent_id" => $r['parent_id'],
                "name" => $r['name'],
                "url" => $r['url'],
                "icon" => $r['icon'],
                "program_ids" => $r['program_ids'],
                "remark" => $r['remark']);
        }
        $resultData = User_GetLoginUserMenuTreeEx($bufferData, 0);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢使用者基本QueryString
function User_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `user_view` WHERE 1";
    else
        return "SELECT `id`, `account`, `name`, `email`, `phone`, `login_type`, `last_login_time`, `last_login_ip`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `user_view` WHERE 1";
}

//建立查詢使用者回傳資料
function User_BuildQueryResultData($dbconnect, $array) {
    return array("id" => $array["id"],
        "account" => $array["account"],
        "name" => $array["name"],
        "email" => $array['email'],
        "phone" => $array['phone'],
        "login_type" => $array['login_type'],
        "last_login_time" => $array['last_login_time'],
        "last_login_ip" => $array['last_login_ip'],
        "status" => $array['status'],
        "remark" => $array['remark'],
        "c_time" => $array['c_time'],
        "c_user_id" => $array['c_user_id'],
        "u_time" => $array['u_time'],
        "u_user_id" => $array['u_user_id'],
        "roles" => User_GetRoles($dbconnect, $array["id"]));
}

//取得使用者角色
function User_GetRoles($dbconnect, $id) {
    $roles = array();
    $query = "SELECT `role_id` FROM `role_user` WHERE user_id='$id'";
    $result = $dbconnect->query($query);
    if ($result) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $roles[] = $r["role_id"];
        }
    }
    return $roles;
}

//修改使用者最後登入時間及IP
function User_UpdateLastLoginDataByID($dbconnect, $id, $ip) {
    $lastlogintime = GetCurrentDateTime();
    //$ip = request_ip();
    $query = "UPDATE `user` SET last_login_time='$lastlogintime', last_login_ip='$ip' WHERE id='$id'";
    @$dbconnect->query($query);
}

//取得子選單陣列
function User_GetLoginUserMenuTreeEx($menuarray, $menuparentid) {
    if ($menuarray == null)
        return null;
    $bufferData = null;
    foreach ($menuarray as $value) {
        if ($value["parent_id"] == $menuparentid) {
            $value["submenu"] = User_GetLoginUserMenuTreeEx($menuarray, $value["id"]);
            $bufferData[] = $value;
        }
    }
    return $bufferData;
}

?>