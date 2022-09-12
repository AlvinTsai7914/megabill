<?php

require_once '_webapi_tools.php';

//查詢選單GET
function Menu_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "89996F463820BC89DA218E8BC161B73B";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Menu_GetBaseQueryString($onlycount);
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
                $resultData[] = Menu_BuildQueryResultData($r);
            }
        }
    } else {
        throw new Exception($dbconnect->error);
    }

    return $resultCode;
}

//新增選單POST
function Menu_Create($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "6D2FDBFF8429ADF495F8E947C9563093";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["parent_id", "name", "url", "icon", "program_ids", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $parent_id = $data['parent_id'];
    $name = $data['name'];
    $url = $data['url'];
    $icon = $data['icon'];
    $program_ids = $data['program_ids'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `menu`(`parent_id`, `name`, `url`, `icon`, `program_ids`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$parent_id', '$name','$url','$icon','$program_ids','$list_order','$status','$remark', '$loginid', '$loginid');";

    if ($dbconnect->query($query)) {
        $resultData = array("id" => $dbconnect->insert_id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改選單PUT
function Menu_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "C02A5FF9CAA42A9C1983600EA55E0D64";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["parent_id", "name", "url", "icon", "program_ids", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    $parent_id = $data['parent_id'];
    $name = $data['name'];
    $url = $data['url'];
    $icon = $data['icon'];
    $program_ids = $data['program_ids'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查選單是否合法
    if (Menu_CheckRule($dbconnect, $id, $parent_id) == false)
        return E_MENURULEERROR;

    //檢查選單編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "menu", "id", $id) == false)
        return E_MENUIDNOTFOUND;

    $query = "UPDATE `menu` SET `parent_id`='$parent_id',`name`='$name',`url`='$url', `icon`='$icon',`program_ids`='$program_ids',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE id='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//刪除選單DELETE
function Menu_Delete($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "8CADB2EF4B106FD4E5217B8E62C43483";
    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查選單編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "menu", "id", $id) == false)
        return E_MENUIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `menu` SET `status`=2,`u_user_id`='$loginid' WHERE id='$id'";

    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//查詢選單規則是否正確
function Menu_CheckRule($dbconnect, $id, $parent_id) {
    if (empty($parent_id) || $parent_id == 0)
        return true;
    else if ($id == $parent_id)
        return false;
    else {
        $query = "SELECT id, parent_id from menu WHERE ID='$parent_id'";
        if ($result = $dbconnect->query($query)) {
            while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($r["parent_id"] == $id)
                    return false;
                else
                    return Menu_CheckRule($dbconnect, $id, $r["parent_id"]);
            }
        } else
            return false;
    }
}

//取得查詢選單基本QueryString
function Menu_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `menu_view` WHERE 1";
    else
        return "SELECT `id`, `parent_id`, `parent_name`, `name`, `url`, `icon`, `program_ids`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `menu_view` WHERE 1";
}

//建立查詢選單回傳資料
function Menu_BuildQueryResultData($array) {
    return array("id" => $array["id"],
        "parent_id" => $array["parent_id"],
        "parent_name" => $array["parent_name"],
        "name" => $array["name"],
        "url" => $array["url"],
        "icon" => $array["icon"],
        "program_ids" => $array["program_ids"],
        "list_order" => $array['list_order'],
        "status" => $array['status'],
        "remark" => $array['remark'],
        "c_time" => $array['c_time'],
        "c_user_id" => $array['c_user_id'],
        "u_time" => $array['u_time'],
        "u_user_id" => $array['u_user_id']);
}

?>