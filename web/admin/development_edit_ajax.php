<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$development_id = request_num("development_id");
$name = request_str("name");
$content = request_str("content");
$seo_description = request_str("seo_description");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($development_id == '' || $development_id < 1 || $development_id > 6)
    die('{"result":false,"msg":"永續發展編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"永續發展標題錯誤"}');

$data = array(
    "name" => $name,
    "content" => $content,
    "seo_description" => $seo_description,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_DEVELOPMENT;
$method = "POST";
if ($development_id != 0) {
    $url = $url . "/" . $development_id;
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
