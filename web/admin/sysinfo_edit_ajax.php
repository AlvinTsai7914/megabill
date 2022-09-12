<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$id = request_str("sysinfo_id");
$name = request_str("name");
$phone = request_str("phone");
$fax = request_str("fax");
$email = request_str("email");
$address = request_str("address");
$address_en = request_str("address_en");
$copyright = request_str("copyright");
$seo_description = request_str("seo_description");
$ga_code = request_str("ga_code");
$remark = request_str("remark");

if ($id == '' || ( $id != 1))
    die('{"result":false,"msg":"系統資訊編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"系統名稱錯誤"}');

$data = array("name" => $name,
    "phone" => $phone,
    "fax" => $fax,
    "email" => $email,
    "address" => $address,
    "address_en" => $address_en,
    "copyright" => $copyright,
    "seo_description" => $seo_description,
    "ga_code" => $ga_code,
    "remark" => $remark);
$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_SYSINFO;
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
