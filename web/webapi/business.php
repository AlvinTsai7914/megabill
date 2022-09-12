<?php

require_once '_webapi_tools.php';

//查詢業務簡介GET
function Business_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "7B41D50493D5DF5D7F22907C52193482";

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

    $query = Business_GetBaseQueryString($onlycount);
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
                $resultData[] = Business_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增業務簡介POST
function Business_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "18402C4FC2C6826FBBAB435FC77EF5FF";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "seo_description", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];
    $content = $data['content'];
    $seo_description = $data['seo_description'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `business` (`name`, `content`, `seo_description`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$content', '$seo_description', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改業務簡介PUT
function Business_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "1B31CF3414F03D2CC62233A2D5C5FA12";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "seo_description", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $name = $data['name'];
    $content = $data['content'];
    $seo_description = $data['seo_description'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查業務簡介編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "business", "id", $id) == false)
        return E_BUSINESSIDNOTFOUND;

    $query = "UPDATE `business` SET `name`='$name',`content`='$content',`seo_description`='$seo_description',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序業務簡介 PUT
function Business_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "511DE42E9AE8FF098B16BF2253AB770C";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["ids"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

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
        $query = "UPDATE `business` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `business` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND status <= 1";
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

//刪除業務簡介DELETE
function Business_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "648A093422CE8C62AAD9EA4FFCBF7E13";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查業務簡介編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "business", "id", $id) == false)
        return E_BUSINESSIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `business` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢業務簡介基本QueryString
function Business_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `business` WHERE 1";
    else
        return "SELECT `id`, `name`, `content`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `business` WHERE 1";
}

//建立查詢業務簡介回傳資料
function Business_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "seo_description" => $array['seo_description'],
            "list_order" => $array['list_order'],
            "status" => $array['status'],
            "remark" => $array['remark'],
            "c_time" => $array['c_time'],
            "c_user_id" => $array['c_user_id'],
            "u_time" => $array['u_time'],
            "u_user_id" => $array['u_user_id']);
    } else {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "seo_description" => $array['seo_description'],
            "list_order" => $array['list_order']);
    }
}

?>
