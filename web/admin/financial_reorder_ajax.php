<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$category_id = request_str("category_id");
$language_id = request_num("language_id");
$ids = request_str("ids");

if ($category_id == '')
    die('{"result":false,"msg":"財務報告類別編號錯誤"}');

if ($ids == '')
    die('{"result":false,"msg":"財務報告編號錯誤"}');

$data = array("category_id" => $category_id,
    "language_id" => $language_id,
    "ids" => $ids);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_FINANCIAL_ListOrder;
$method = "PUT";

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
