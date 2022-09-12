<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$language_id = request_num("language_id");
$ids = request_str("ids");
if ($ids == '')
    die('{"result":false,"msg":"服務據點編號錯誤"}');

$data = array("language_id" => $language_id,
    "ids" => $ids);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_LOCATION_ListOrder;
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
