<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$id = request_str("sysinfo_id");
$about = request_str("about");

if ($id == '' || ( $id != 1))
    die('{"result":false,"msg":"系統資訊編號錯誤"}');

$data = array("about" => $about);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_SYSINFO_ABOUT;
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
