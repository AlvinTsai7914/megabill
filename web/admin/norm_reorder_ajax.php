<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$ids = request_str("ids");
if ($ids == '')
    die('{"result":false,"msg":"公司治理規範編號錯誤"}');

$data = array("ids" => $ids);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_NORM_ListOrder;
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
