<?php

require_once '_webapi_tools.php';

//查詢程式GET
function Program_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "E47212F055F9748C9313F87E74106544";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Program_GetBaseQueryString($onlycount);
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
                $resultData[] = Program_BuildQueryResultData($r);
            }
        }
    } else {
        throw new Exception($dbconnect->error);
    }

    return $resultCode;
}

//新增程式POST
function Program_Create($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "75699A307CF4C23407EAB515F444A260";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["category_id", "name", "guid", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $category_id = $data['category_id'];
    $name = $data['name'];
    $guid = $data['guid'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查程式類別編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "program_category", "id", $category_id) == false)
        return E_PROGRAMCATEGORYIDNOTFOUND;

    //檢查程式類別編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "program", "guid", $guid) == true)
        return E_PROGRAMGUIDALREADYEXISTS;

    $query = "INSERT INTO `program`(`category_id`, `name`, `guid`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$category_id', '$name', '$guid', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改程式PUT
function Program_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "BDC15D7876BB188264EBA1CD5A3F03BD";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["category_id", "name", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    $category_id = $data['category_id'];
    $name = $data['name'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查程式類別編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "program_category", "id", $category_id) == false)
        return E_PROGRAMCATEGORYIDNOTFOUND;

    //檢查程式編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "program", "id", $id) == false)
        return E_PROGRAMIDNOTFOUND;

    $query = "UPDATE `program` SET `category_id`='$category_id',`name`='$name',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE id='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//刪除程式DELETE
function Program_Delete($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "3E21AD3DC59D6CC9BCEC90E562CD127E";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查程式編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "program", "id", $id) == false)
        return E_PROGRAMIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `program` SET `status`=2,`u_user_id`='$loginid' WHERE id='$id'";

    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢程式基本QueryString
function Program_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `program_view` WHERE 1";
    else
        return "SELECT `id`, `category_id`, `category_name`, `name`, `guid`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `program_view` WHERE 1";
}

//建立查詢程式回傳資料
function Program_BuildQueryResultData($array) {
    return array("id" => $array["id"],
        "category_id" => $array["category_id"],
        "category_name" => $array["category_name"],
        "name" => $array["name"],
        "guid" => $array["guid"],
        "status" => $array['status'],
        "remark" => $array['remark'],
        "c_time" => $array['c_time'],
        "c_user_id" => $array['c_user_id'],
        "u_time" => $array['u_time'],
        "u_user_id" => $array['u_user_id']);
}

?>