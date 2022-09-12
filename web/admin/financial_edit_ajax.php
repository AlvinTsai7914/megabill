<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$financial_id = request_num("financial_id");
$category_id = request_num("category_id");
$language_id = request_num("language_id");
$name = request_str("name");
$content = request_str("content");
$file1url = request_str("file1url");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($financial_id == '')
    die('{"result":false,"msg":"財務報告編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"財務報告標題錯誤"}');

$file1string = request_str("file1string");
if ($file1string != '') {
    $filename = SaveUploadFile($file1url, $file1string, UPLOAD_FILE_PATH, true);
    if ($filename == "")
        die('{"result":false,"msg":"檔案儲存失敗"}');
    $file1url = UPLOAD_FILE_PATH . $filename;
}

$data = array(
    "category_id" => $category_id,
    "language_id" => $language_id,
    "name" => $name,
    "content" => $content,
    "file1url" => $file1url,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_FINANCIAL;
$method = "POST";
if ($financial_id != 0) {
    $url = $url . "/" . $financial_id;
    $method = "PUT";
}

$result = false;
$msg = "未知的錯誤";
$resultData = null;
$result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
if ($result == 200) {
    $result = true;
    $msg = "";
}

$rows = array("result" => $result, "msg" => $msg);
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
