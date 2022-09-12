<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$encyclopedia_id = request_num("encyclopedia_id");
$name = request_str("name");
$content = request_str("content");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($encyclopedia_id == '')
    die('{"result":false,"msg":"貨幣市場小百科編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"貨幣市場小百科標題錯誤"}');

$data = array(
    "name" => $name,
    "content" => $content,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_ENCYCLOPEDIA;
$method = "POST";
if ($encyclopedia_id != 0) {
    $url = $url . "/" . $encyclopedia_id;
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
