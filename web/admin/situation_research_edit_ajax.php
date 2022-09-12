<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$id = request_str("sysinfo_id");
$observation_indicator = request_str("observation_indicator");
$impact_factor = request_str("impact_factor");

if ($id == '' || ( $id != 1))
    die('{"result":false,"msg":"系統資訊編號錯誤"}');

$data = array("observation_indicator" => $observation_indicator,
    "impact_factor" => $impact_factor);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_SYSINFO_SITUATIONRESEARCH;
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
