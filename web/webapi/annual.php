<?php

require_once '_webapi_tools.php';

//查詢年報GET
function Annual_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "527AAB18714D060A050B6C196401A6E1";

    //檢查操作權限
    $loginid = 0;
    if ($accesstoken != null)
        if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
            return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Annual_GetBaseQueryString($onlycount);
    if ($accesstoken != null)
        $query = $query . " AND status <= 1";
    else
        $query = $query . " AND status <= 0";

    if (isset($args[0]) && $args[0] != 0) {
        $id = $args[0];
        $query = $query . " AND id='$id'";
    }

    if (isset($request["query"]))
        $query = $query . " AND " . $request["query"];

    if (isset($request["order"]))
        $query = $query . " ORDER BY " . $request["order"];
    else
        $query = $query . " ORDER BY list_order ASC, id DESC";

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
                $resultData[] = Annual_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增年報POST
function Annual_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "0404621A43E112F67A58A7467DF09E05";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["language_id", "name", "content", "file1url", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $language_id = $data['language_id'];
    $name = $data['name'];
    $content = $data['content'];
    $file1url = $data['file1url'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `annual` (`language_id`, `name`, `content`, `file1url`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$language_id', '$name', '$content', '$file1url', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改年報PUT
function Annual_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "80E73992A211A0B3FC574E0EF5488BD6";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["language_id", "name", "content", "file1url", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $language_id = $data['language_id'];
    $name = $data['name'];
    $content = $data['content'];
    $file1url = $data['file1url'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查年報編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "annual", "id", $id) == false)
        return E_ANNUALIDNOTFOUND;

    $query = "UPDATE `annual` SET `language_id`='$language_id',`name`='$name',`content`='$content',`file1url`='$file1url',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序年報 PUT
function Annual_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "FE39F12D4D496EEDA4979ED99E13CC82";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["language_id", "ids"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $language_id = $data['language_id'];
    $ids = $data['ids'];
    $ids_array = explode(",", $ids);
    if (!is_array($ids_array))
        return E_INPUTPARAMETERERROR;

    $ids_array_length = count($ids_array);
    if ($ids_array_length <= 0)
        return E_INPUTPARAMETERERROR;

    $ids_array_length += 1;

    try {
        $dbconnect->autocommit(false);
        $query = "UPDATE `annual` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE language_id='$language_id' AND status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `annual` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND language_id='$language_id' AND status <= 1";
            if ($result = $dbconnect->query($query))
                $resultData = array("ids" => $ids);
            else
                throw new Exception($dbconnect->error);
        }
        $dbconnect->commit();
        $dbconnect->autocommit(true);
    } catch (Exception $ex) {
        $dbconnect->rollback();
        $dbconnect->autocommit(true);
        throw $ex;
    }
    return $resultCode;
}

//刪除年報DELETE
function Annual_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "8F8C5B4D3E086E204EAE8C88747DB93D";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查年報編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "annual", "id", $id) == false)
        return E_ANNUALIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `annual` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢年報基本QueryString
function Annual_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `annual` WHERE 1";
    else
        return "SELECT `id`, `language_id`, `name`, `content`, `file1url`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `annual` WHERE 1";
}

//建立查詢年報回傳資料
function Annual_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "language_id" => $array["language_id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "file1url" => $array['file1url'],
            "list_order" => $array['list_order'],
            "status" => $array['status'],
            "remark" => $array['remark'],
            "c_time" => $array['c_time'],
            "c_user_id" => $array['c_user_id'],
            "u_time" => $array['u_time'],
            "u_user_id" => $array['u_user_id']);
    } else {
        return array("id" => $array["id"],
            "language_id" => $array["language_id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "file1url" => $array['file1url'],
            "list_order" => $array['list_order']);
    }
}

?>
