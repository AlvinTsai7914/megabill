<?php

require_once '_webapi_tools.php';

//查詢財務報告GET
function Financial_GET($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "D889D6AFBE3DEF5F3F7689CDFC603B26";

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

    $query = Financial_GetBaseQueryString($onlycount);
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
                $resultData[] = Financial_BuildQueryResultData($accesstoken, $r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//新增財務報告POST
function Financial_INSERT($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "AD3360E72F99EA0EEF16CF46FEC2BFFD";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["category_id", "language_id", "name", "content", "file1url", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $category_id = $data['category_id'];
    $language_id = $data['language_id'];
    $name = $data['name'];
    $content = $data['content'];
    $file1url = $data['file1url'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    $query = "INSERT INTO `financial` (`category_id`, `language_id`, `name`, `content`, `file1url`, `list_order`, `status`, `remark`, `c_user_id`, `u_user_id`) VALUES ('$category_id', '$language_id', '$name', '$content', '$file1url', '$list_order', '$status', '$remark', '$loginid', '$loginid');";
    if ($dbconnect->query($query))
        $resultData = array("id" => $dbconnect->insert_id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改財務報告PUT
function Financial_UPDATE($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "60D1CDD6CAB6CB829511307D7F4A2604";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["category_id", "language_id", "name", "content", "file1url", "list_order", "status", "remark"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];
    $category_id = $data['category_id'];
    $language_id = $data['language_id'];
    $name = $data['name'];
    $content = $data['content'];
    $file1url = $data['file1url'];
    $list_order = $data['list_order'];
    $status = $data['status'];
    $remark = $data['remark'];

    //檢查財務報告編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "financial", "id", $id) == false)
        return E_FINANCIALIDNOTFOUND;

    $query = "UPDATE `financial` SET `category_id`='$category_id',`language_id`='$language_id',`name`='$name',`content`='$content',`file1url`='$file1url',`list_order`='$list_order',`status`='$status',`remark`='$remark',`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//排序財務報告 PUT
function Financial_UPDATE_ListOrder($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "EB6EBB6990B6DCC2EBF17AABAEC67C6C";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ["category_id", "language_id", "ids"];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $category_id = $data['category_id'];
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
        $query = "UPDATE `financial` SET `list_order`='$ids_array_length', `u_user_id`='$loginid' WHERE category_id='$category_id' AND language_id='$language_id'AND status <= 1";
        if ($result = $dbconnect->query($query))
            $resultData = array("ids" => $ids);
        else
            throw new Exception($dbconnect->error);

        $index = 0;
        foreach (is_array($ids_array) ? $ids_array : array() as $item) {
            $index++;
            $query = "UPDATE `financial` SET `list_order`='$index', `u_user_id`='$loginid' WHERE id='$item' AND category_id='$category_id' AND language_id='$language_id' AND status <= 1";
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

//刪除財務報告DELETE
function Financial_DELETE($dbconnect, $accesstoken, $args, &$resultData, &$programguid) {
    $programguid = "83DE63CC5A8FCC1503D6C57BE993BA5B";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    if (!isset($args[0]))
        return E_INPUTPARAMETERERROR;

    $id = $args[0];

    //檢查財務報告編號是否存在
    if (CheckDataExistByFieldValue($dbconnect, "financial", "id", $id) == false)
        return E_FINANCIALIDNOTFOUND;

    //不做資料刪除，改將status設定為2
    $query = "UPDATE `financial` SET `status`= 2 ,`u_user_id`='$loginid' WHERE ID='$id'";
    if ($result = $dbconnect->query($query))
        $resultData = array("id" => $id);
    else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢財務報告基本QueryString
function Financial_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `financial_view` WHERE 1";
    else
        return "SELECT `id`, `category_id`, `category_name`, `language_id`, `name`, `content`, `file1url`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `financial_view` WHERE 1";
}

//建立查詢財務報告回傳資料
function Financial_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "category_id" => $array["category_id"],
            "category_name" => $array["category_name"],
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
            "category_id" => $array["category_id"],
            "category_name" => $array["category_name"],
            "language_id" => $array["language_id"],
            "name" => $array["name"],
            "content" => $array["content"],
            "file1url" => $array['file1url'],
            "list_order" => $array['list_order']);
    }
}

?>
