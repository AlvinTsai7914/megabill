<?php

require_once '_webapi_tools.php';

//查詢職缺訊息GET
function Vacancy_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "92F52426F89738551D86177FDABEC920";

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

    $query = Vacancy_GetBaseQueryString($onlycount);
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
                $resultData[] = Vacancy_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增職缺訊息POST
function Vacancy_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "E2AEB5EDF428758DE091F700187D9E84";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "link", "blank", "release_date", "start_date", "end_date", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];
    $content = $data['content'];
    $link = $data['link'];
    $blank = $data['blank'];
    $release_date = $data['release_date'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `vacancy` (`name`, `content`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$content', '$link', '$blank', '$release_date', '$start_date', '$end_date', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改職缺訊息PUT
function Vacancy_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "82AC4B188C97539FE3CF8A99322F51BC";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "link", "blank", "release_date", "start_date", "end_date", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $name = $data['name'];
    $content = $data['content'];
    $link = $data['link'];
    $blank = $data['blank'];
    $release_date = $data['release_date'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查職缺訊息編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "vacancy", "id", $id) == false)
        return E_VACANCYIDNOTFOUND;

    $query = "UPDATE `vacancy` SET `name`='$name',`content`='$content',`link`='$link',`blank`='$blank',`release_date`='$release_date',`start_date`='$start_date',`end_date`='$end_date',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序職缺訊息 PUT
function Vacancy_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "B48AC3E43F53B88BE79ABA396D32D16D";

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
        $query = "UPDATE `vacancy` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `vacancy` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND status <= 1";
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

//刪除職缺訊息DELETE
function Vacancy_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "C8E566ECE1270E49A799184353C3C91B";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查職缺訊息編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "vacancy", "id", $id) == false)
        return E_VACANCYIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `vacancy` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢職缺訊息基本QueryString
function Vacancy_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `vacancy` WHERE 1";
    else
        return "SELECT `id`, `name`, `content`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `vacancy` WHERE 1";
}

//建立查詢職缺訊息回傳資料
function Vacancy_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "link" => $array['link'],
            "blank" => $array['blank'],
            "release_date" => $array['release_date'],
            "start_date" => $array['start_date'],
            "end_date" => $array['end_date'],
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
            "link" => $array['link'],
            "blank" => $array['blank'],
            "release_date" => $array['release_date'],
            "start_date" => $array['start_date'],
            "end_date" => $array['end_date'],
            "list_order" => $array['list_order']);
    }
}

?>
