<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$vacancy_id = request_num("vacancy_id");
$name = request_str("name");
$content = request_str("content");
$link = request_str("link");
$blank = request_num("blank");
$release_date = request_dat("release_date", "0000-00-00");
$start_date = request_dat("start_date", "0000-00-00");
$end_date = request_dat("end_date", "0000-00-00");
$use_shelf_date = request_num("use_shelf_date");
if ($use_shelf_date == 0) {
    $start_date = "0000-00-00";
    $end_date = "0000-00-00";
}
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($vacancy_id == '')
    die('{"result":false,"msg":"職缺訊息編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"職缺訊息標題錯誤"}');

$data = array(
    "name" => $name,
    "content" => $content,
    "link" => $link,
    "blank" => $blank,
    "release_date" => $release_date,
    "start_date" => $start_date,
    "end_date" => $end_date,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_VACANCY;
$method = "POST";
if ($vacancy_id != 0) {
    $url = $url . "/" . $vacancy_id;
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
