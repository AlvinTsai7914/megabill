<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$financial_category_id = request_num("financial_category_id");
$name = request_str("name");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($financial_category_id == '')
    die('{"result":false,"msg":"財務報告類別編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"財務報告類別名稱錯誤"}');

$data = array(
    "name" => $name,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_FINANCIAL_CATEGORY;
$method = "POST";
if ($financial_category_id != 0) {
    $url = $url . "/" . $financial_category_id;
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
