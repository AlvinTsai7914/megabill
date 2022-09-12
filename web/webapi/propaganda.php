<?php

require_once '_webapi_tools.php';

//查詢政策宣導GET
function Propaganda_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "0FD4D0C778503B529C6B89BFDC1EC79E";

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

    $query = Propaganda_GetBaseQueryString($onlycount);
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
                $resultData[] = Propaganda_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增政策宣導POST
function Propaganda_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "820523C90F97334191109C2F45BC3F4C";

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

    $query = "INSERT INTO `propaganda` (`name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$name', '$content', '$pic1url', '$pic1alt', '$pic2url', '$pic2alt', '$link', '$blank', '$release_date', '$start_date', '$end_date', '$homepage_show', '$seo_description', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改政策宣導PUT
function Propaganda_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "4E07A4AFA0F8D7DEF66EF021C2FF98FC";

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

    //檢查政策宣導編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "propaganda", "id", $id) == false)
        return E_PROPAGANDAIDNOTFOUND;

    $query = "UPDATE `propaganda` SET `name`='$name',`content`='$content',`pic1url`='$pic1url',`pic1alt`='$pic1alt',`pic2url`='$pic2url',`pic2alt`='$pic2alt',`link`='$link',`blank`='$blank',`release_date`='$release_date',`start_date`='$start_date',`end_date`='$end_date',`homepage_show`='$homepage_show',`seo_description`='$seo_description',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序政策宣導 PUT
function Propaganda_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "90D87A66C05EF3CAA1AF2E90C3BF5430";

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
        $query = "UPDATE `propaganda` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `propaganda` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND status <= 1";
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

//刪除政策宣導DELETE
function Propaganda_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "87A47361DCCDA32D46EBCAD7EB6366BF";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查政策宣導編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "propaganda", "id", $id) == false)
        return E_PROPAGANDAIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `propaganda` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢政策宣導基本QueryString
function Propaganda_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `propaganda` WHERE 1";
    else
        return "SELECT `id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `propaganda` WHERE 1";
}

//建立查詢政策宣導回傳資料
function Propaganda_BuildQueryResultData($accesstoken, $array) {
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
