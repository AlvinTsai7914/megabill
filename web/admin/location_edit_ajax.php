<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$location_id = request_num("location_id");
$language_id = request_num("language_id");
$name = request_str("name");
$content = request_str("content");
$map_embed = request_str("map_embed");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($location_id == '')
    die('{"result":false,"msg":"服務據點編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"服務據點名稱錯誤"}');

$data = array(
    "language_id" => $language_id,
    "name" => $name,
    "content" => $content,
    "map_embed" => $map_embed,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_LOCATION;
$method = "POST";
if ($location_id != 0) {
    $url = $url . "/" . $location_id;
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
