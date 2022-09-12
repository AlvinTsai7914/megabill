<?php

require_once '_webapi_tools.php';

//查詢友善連結GET
function Links_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "B47E1DCCFFC0C0CA102337A318AAEB3E";

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

    $query = Links_GetBaseQueryString($onlycount);
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
                $resultData[] = Links_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增友善連結POST
function Links_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "CADE3850A0DE70BC87D0281256E32141";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "pic1url", "pic1alt", "pic2url", "pic2alt", "link", "blank", "release_date", "start_date", "end_date", "homepage_show", "seo_description", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $name = $data['name'];
    $content = $data['content'];
    $pic1url = $data['pic1url'];
    $pic1alt = $data['pic1alt'];
    $pic2url = $data['pic2url'];
    $pic2alt = $data['pic2alt'];
    $link = $data['link'];
    $blank = $data['blank'];
    $release_date = $data['release_date'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $homepage_show = $data['homepage_show'];
    $seo_description = $data['seo_description'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `links` (`name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$content', '$pic1url', '$pic1alt', '$pic2url', '$pic2alt', '$link', '$blank', '$release_date', '$start_date', '$end_date', '$homepage_show', '$seo_description', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改友善連結PUT
function Links_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "173B625A460FD8E93523C63E8EF84D35";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["name", "content", "pic1url", "pic1alt", "pic2url", "pic2alt", "link", "blank", "release_date", "start_date", "end_date", "homepage_show", "seo_description", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $name = $data['name'];
    $content = $data['content'];
    $pic1url = $data['pic1url'];
    $pic1alt = $data['pic1alt'];
    $pic2url = $data['pic2url'];
    $pic2alt = $data['pic2alt'];
    $link = $data['link'];
    $blank = $data['blank'];
    $release_date = $data['release_date'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
    $homepage_show = $data['homepage_show'];
    $seo_description = $data['seo_description'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查友善連結編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "links", "id", $id) == false)
        return E_LINKSIDNOTFOUND;

    $query = "UPDATE `links` SET `name`='$name',`content`='$content',`pic1url`='$pic1url',`pic1alt`='$pic1alt',`pic2url`='$pic2url',`pic2alt`='$pic2alt',`link`='$link',`blank`='$blank',`release_date`='$release_date',`start_date`='$start_date',`end_date`='$end_date',`homepage_show`='$homepage_show',`seo_description`='$seo_description',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序友善連結 PUT
function Links_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "E68359B217E28A54ACA09A99B7469560";

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
        $query = "UPDATE `links` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `links` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND status <= 1";
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

//刪除友善連結DELETE
function Links_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "C1118811D1129D5322E74F29919773BC";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查友善連結編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "links", "id", $id) == false)
        return E_LINKSIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `links` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢友善連結基本QueryString
function Links_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `links` WHERE 1";
    else
        return "SELECT `id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `links` WHERE 1";
}

//建立查詢友善連結回傳資料
function Links_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "pic1url" => $array['pic1url'],
            "pic1alt" => $array['pic1alt'],
            "pic2url" => $array['pic2url'],
            "pic2alt" => $array['pic2alt'],
            "link" => $array['link'],
            "blank" => $array['blank'],
            "release_date" => $array['release_date'],
            "start_date" => $array['start_date'],
            "end_date" => $array['end_date'],
            "homepage_show" => $array['homepage_show'],
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
            "pic1url" => $array['pic1url'],
            "pic1alt" => $array['pic1alt'],
            "pic2url" => $array['pic2url'],
            "pic2alt" => $array['pic2alt'],
            "link" => $array['link'],
            "blank" => $array['blank'],
            "release_date" => $array['release_date'],
            "start_date" => $array['start_date'],
            "end_date" => $array['end_date'],
            "homepage_show" => $array['homepage_show'],
            "seo_description" => $array['seo_description'],
            "list_order" => $array['list_order']);
    }
}

?>
