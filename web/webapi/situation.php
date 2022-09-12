<?php

require_once '_webapi_tools.php';

//查詢年度執行情形GET
function Situation_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "F839DFBF06E11B3F80062B896D05E6BB";

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

    $query = Situation_GetBaseQueryString($onlycount);
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
                $resultData[] = Situation_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增年度執行情形POST
function Situation_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "C9C185DF34AE2176FEA0FF4EEA665371";

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

    $query = "INSERT INTO `situation` (`name`, `content`, `seo_description`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$content', '$seo_description', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改年度執行情形PUT
function Situation_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "DDB3424580DB2FB229423832DF162BC7";

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

    //檢查年度執行情形編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "situation", "id", $id) == false)
        return E_SITUATIONIDNOTFOUND;

    $query = "UPDATE `situation` SET `name`='$name',`content`='$content',`seo_description`='$seo_description',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序年度執行情形 PUT
function Situation_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "5752BCBDC4CE91CD3EEF08D517929E67";

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
        $query = "UPDATE `situation` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `situation` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND status <= 1";
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

//刪除年度執行情形DELETE
function Situation_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "1008A400AF86447FDD8676DFF03A3BE8";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查年度執行情形編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "situation", "id", $id) == false)
        return E_SITUATIONIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `situation` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢年度執行情形基本QueryString
function Situation_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `situation` WHERE 1";
    else
        return "SELECT `id`, `name`, `content`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `situation` WHERE 1";
}

//建立查詢年度執行情形回傳資料
function Situation_BuildQueryResultData($accesstoken, $array) {
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
