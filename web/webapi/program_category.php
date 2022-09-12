<?php

require_once '_webapi_tools.php';

//查詢程式類別GET
function Program_Category_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "A5E214B8215C7102CFA530856A548C6A";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Program_Category_GetBaseQueryString($onlycount);
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
                $resultData[] = Program_Category_BuildQueryResultData($r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增程式類別POST
function Program_Category_Create($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "250038B29B2A8B92FEDB031694588D3F";

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

    $query = "INSERT INTO `program_category`(`name`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改程式類別PUT
function Program_Category_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "D4AA08388D01A7CBD35AE21221C1AA64";

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

    //檢查程式類別編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "program_category", "id", $id) == false)
        return E_PROGRAMCATEGORYIDNOTFOUND;

    $query = "UPDATE `program_category` SET `name`='$name',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//刪除程式類別DELETE
function Program_Category_Delete($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "619CA96841B5A4814EFED3C60A5A6CFD";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查程式類別編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "program_category", "id", $id) == false)
        return E_PROGRAMCATEGORYIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `program_category` SET `status`= 2,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢程式類別基本QueryString
function Program_Category_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `program_category` WHERE 1";
    else
        return "SELECT `id`, `name`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `program_category` WHERE 1";
}

//建立查詢程式類別回傳資料
function Program_Category_BuildQueryResultData($array) {
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