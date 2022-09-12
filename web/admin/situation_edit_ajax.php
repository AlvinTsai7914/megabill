<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$situation_id = request_num("situation_id");
$name = request_str("name");
$content = request_str("content");
$seo_description = request_str("seo_description");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($situation_id == '')
    die('{"result":false,"msg":"年度執行情形編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"年度執行情形標題錯誤"}');

$data = array(
    "name" => $name,
    "content" => $content,
    "seo_description" => $seo_description,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_SITUATION;
$method = "POST";
if ($situation_id != 0) {
    $url = $url . "/" . $situation_id;
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
