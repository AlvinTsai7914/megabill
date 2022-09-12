<?php

require_once '_webapi_tools.php';
require_once 'program.php';
require_once 'menu.php';

//查詢角色GET
function Role_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "D9D0FB041171CBFF002F1D02A7D01E5E";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Role_GetBaseQueryString($onlycount);
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
                $resultData[] = Role_BuildQueryResultData($r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增角色POST
function Role_Create($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "2482DDDCDCB3C85EB72DDAE2330DCE30";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];    //名稱
    $status = $data['status'];      //狀態：0：啟用，其他：停用
    $remark = $data['remark'];   //備註

    $query = "INSERT INTO `role`(`name`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$status', '$remark', '$loginid', '$loginid');";

    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改角色PUT
function Role_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "F40D8A063D77C197CE6125F7666AB056";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    $name = $data['name'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $id) == false)
        return E_ROLEIDNOTFOUND;

    $query = "UPDATE `role` SET `name`='$name',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//刪除角色DELETE
function Role_Delete($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "E6BADA98AA9D8C835354B1DF2A83CB92";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查角色編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $id) == false)
        return E_ROLEIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `role` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//角色註冊程式POST
function Role_RegisterProgram($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "333CDC633438A89A005B4610ED7D00C8";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["program_ids", "role_id", "unregisterall"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $program_ids = $data['program_ids'];
    $program_ids_array = explode(",", $program_ids);
    if (!is_array($program_ids_array))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];
    $unregisterall = filter_var($data['unregisterall'], FILTER_VALIDATE_BOOLEAN);

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);

        if ($unregisterall == true) {
            $query = "DELETE FROM `role_program` WHERE role_id='$role_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }

        foreach (is_array($program_ids_array) ? $program_ids_array : array() as $program_id) {
            if (CheckDataExistByFieldValue($dbconnect, "program", "id", $program_id) == false)
                continue;

            $query = "SELECT `role_id`, `program_id` FROM `role_program` WHERE program_id='$program_id' && role_id='$role_id' ";
            if ($result = $dbconnect->query($query)) {
                if ($result->num_rows <= 0) {
                    $query = "INSERT INTO `role_program`(`program_id`, `role_id`) VALUES ('$program_id','$role_id')";
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

    $resultData = array("role_id" => $role_id, "program_ids" => $program_id);
    return $resultCode;
}

//角色註冊所有程式POST
function Role_RegisterAllPrograms($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "C304430C714757C788A4FD082D94121E";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    $query = "DELETE FROM `role_program` WHERE role_id='$role_id'";
    if (!$dbconnect->query($query))
        throw new Exception($dbconnect->error);

    //取得所有程式
    $query = "SELECT  `id` FROM `program` WHERE 1";
    if ($result = $dbconnect->query($query)) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $program_id = $r["id"];
            $query = "INSERT INTO `role_program`(`program_id`, `role_id`) VALUES ('$program_id','$role_id')";
            $dbconnect->query($query);
        }
    }
    $resultData = array("role_id" => $role_id);
    return $resultCode;
}

//角色註銷程式POST
function Role_UnregisterProgram($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "A860C4A437AE730D5B70C6BA27A5343D";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["program_ids", "role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $program_ids = $data['program_ids'];
    $program_ids_array = explode(",", $program_ids);
    if (!is_array($program_ids_array))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);
        foreach (is_array($program_ids_array) ? $program_ids_array : array() as $program_id) {
            $query = "DELETE FROM `role_program` WHERE program_id='$program_id' && role_id='$role_id'";
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

    $resultData = array("role_id" => $role_id, "program_ids" => $program_id);
    return $resultCode;
}

//角色註銷所有程式POST
function Role_UnregisterAllPrograms($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "209D04489E9950DA056F580D9130E829";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];

    //檢查權限是否存在
    $query = "SELECT `program_id`, `role_id` FROM `role_program` WHERE role_id='$role_id' ";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows > 0) {
            $query = "DELETE FROM `role_program` WHERE role_id='$role_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }

        if ($resultCode == E_SUCCESS) {
            $resultData = array("role_id" => $role_id);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢角色程式GET
function Role_GetRoleProgram($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "1C2733127AC3CC8BDC40A704E9DCF5A5";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    $query = "SELECT `role_id`, `role_name`, `role_status`, `id`, `category_id`, `category_name`, `name`, `guid`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `role_program_view` WHERE 1";
    $query = $query . " AND status <= 1";

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;


    $id = $args[0];
    $query = $query . " AND role_id='$id'";

    if (isset($request["query"]))
        $query = $query . " AND (" . $request["query"] . ")";

    if (isset($request["order"]))
        $query = $query . " ORDER BY " . $request["order"];
    else
        $query = $query . " ORDER BY category_id, id";

    $result = $dbconnect->query($query);
    if ($result) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultData[] = Program_BuildQueryResultData($r);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//角色註冊選單POST
function Role_RegisterMenu($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "FA0100D2EF870731B3450C0E347AEE91";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["menu_ids", "role_id", "unregisterall"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $menu_ids = $data['menu_ids'];
    $menu_ids_array = explode(",", $menu_ids);
    if (!is_array($menu_ids_array))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];
    $unregisterall = filter_var($data['unregisterall'], FILTER_VALIDATE_BOOLEAN);

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);
        if ($unregisterall == true) {
            $query = "DELETE FROM `role_menu` WHERE role_id='$role_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }
        foreach (is_array($menu_ids_array) ? $menu_ids_array : array() as $menu_id) {
            if (CheckDataExistByFieldValue($dbconnect, "menu", "id", $menu_id) == false)
                continue;

            $query = "SELECT `menu_id`, `role_id` FROM `role_menu` WHERE menu_id='$menu_id' && role_id='$role_id' ";
            if ($result = $dbconnect->query($query)) {
                if ($result->num_rows <= 0) {
                    $query = "INSERT INTO `role_menu`(`menu_id`, `role_id`) VALUES ('$menu_id','$role_id')";
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

    $resultData = array("role_id" => $role_id, "menu_ids" => $menu_ids);
    return $resultCode;
}

//角色註冊所有選單POST
function Role_RegisterAllMenus($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "488846F4CE7B43342EB3FA994E42CD86";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];
    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    $query = "DELETE FROM `role_menu` WHERE role_id='$role_id'";
    if (!$dbconnect->query($query))
        throw new Exception($dbconnect->error);

    //取得所有選單
    $query = "SELECT  `id` FROM `menu` WHERE 1";
    if ($result = $dbconnect->query($query)) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $menu_id = $r["id"];
            $query = "INSERT INTO `role_menu`(`menu_id`, `role_id`) VALUES ('$menu_id','$role_id')";
            $dbconnect->query($query);
        }
    }
    $resultData = array("role_id" => $role_id);
    return $resultCode;
}

//角色註銷選單POST
function Role_UnregisterMenu($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "901C788ABDEC80F44971B2D26154D253";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["menu_ids", "role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $menu_ids = $data['menu_ids'];
    $menu_ids_array = explode(",", $menu_ids);
    if (!is_array($menu_ids_array))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];

    //檢查角色編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "role", "id", $role_id) == false)
        return E_ROLEIDNOTFOUND;

    try {
        $dbconnect->autocommit(false);
        foreach (is_array($menu_ids_array) ? $menu_ids_array : array() as $menu_id) {
            $query = "DELETE FROM `role_menu` WHERE menu_id='$menu_id' && role_id='$role_id'";
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

    $resultData = array("rold_id" => $role_id, "menu_ids" => $menu_ids);
    return $resultCode;
}

//角色註銷所有選單POST
function Role_UnregisterAllMenus($dbconnect, $accesstoken, $fileData, &$resultData, &$programguid) {
    $programguid = "6BF9D523FEDEE45D677E3FB9CA5BCA4A";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["role_id"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $role_id = $data['role_id'];

    //檢查選單是否存在
    $query = "SELECT `menu_id`, `role_id` FROM `role_menu` WHERE role_id='$role_id' ";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows > 0) {
            $query = "DELETE FROM `role_menu` WHERE role_id='$role_id'";
            if (!$dbconnect->query($query))
                throw new Exception($dbconnect->error);
        }

        if ($resultCode == E_SUCCESS) {
            $resultData = array("role_id" => $role_id);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢角色選單GET
function Role_GetRoleMenu($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "5021F9264DB1D0212BE75E562BE3423F";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    $query = "SELECT `role_id`, `role_name`, `role_status`, `id`, `parent_id`, `parent_name`, `name`, `url`, `icon`, `program_ids`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `role_menu_view` WHERE 1";
    $query = $query . " AND status <= 1";

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $query = $query . " AND role_id='$id'";

    if (isset($request["query"]))
        $query = $query . " AND (" . $request["query"] . ")";

    if (isset($request["order"]))
        $query = $query . " ORDER BY " . $request["order"];
    else
        $query = $query . " ORDER BY list_order";

    $result = $dbconnect->query($query);
    if ($result) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultData[] = Menu_BuildQueryResultData($r);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢角色基本QueryString
function Role_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `role_view` WHERE 1";
    else
        return "SELECT `id`, `name`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `role_view` WHERE 1";
}

//建立查詢使用者回傳資料
function Role_BuildQueryResultData($array) {
    return array("id" => $array["id"],
        "name" => $array["name"],
        "status" => $array['status'],
        "remark" => $array['remark'],
        "c_time" => $array['c_time'],
        "c_user_id" => $array['c_user_id'],
        "u_time" => $array['u_time'],
        "u_user_id" => $array['u_user_id']);
}

?>
