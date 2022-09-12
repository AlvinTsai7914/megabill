<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$market_id = request_num("market_id");
$name = request_str("name");
$content = request_str("content");
$pic1url = request_str("pic1url");
$pic1alt = request_str("pic1alt");
$pic2url = request_str("pic2url");
$pic2alt = request_str("pic2alt");
$link = request_str("link");
$blank = request_num("blank");
$release_date = request_dat("release_date", "0000-00-00");
$start_date = request_dat("start_date", "0000-00-00");
$end_date = request_dat("end_date", "0000-00-00");
$homepage_show = request_num("homepage_show");
$seo_description = request_str("seo_description");
$list_order = request_num("list_order");
$status = request_num("status");
$remark = request_str("remark");

if ($market_id == '' || $market_id < 1 || $market_id > 4)
    die('{"result":false,"msg":"市場行情編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"市場行情標題錯誤"}');


$pic1string = request_str("pic1string");
if ($pic1string != '') {
    $filename = SaveUploadFile($pic1url, $pic1string, UPLOAD_IMAGE_PATH, true);
    if ($filename == "")
        die('{"result":false,"msg":"檔案儲存失敗"}');
    $pic1url = UPLOAD_IMAGE_PATH . $filename;
}

$pic2string = request_str("pic2string");
if ($pic2string != '') {
    $filename = SaveUploadFile($pic2url, $pic2string, UPLOAD_IMAGE_PATH, true);
    if ($filename == "")
        die('{"result":false,"msg":"檔案儲存失敗"}');
    $pic2url = UPLOAD_IMAGE_PATH . $filename;
}

$data = array(
    "name" => $name,
    "content" => $content,
    "pic1url" => $pic1url,
    "pic1alt" => $pic1alt,
    "pic2url" => $pic2url,
    "pic2alt" => $pic2alt,
    "link" => $link,
    "blank" => $blank,
    "release_date" => $release_date,
    "start_date" => $start_date,
    "end_date" => $end_date,
    "homepage_show" => $homepage_show,
    "seo_description" => $seo_description,
    "list_order" => $list_order,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_MARKET;
$method = "POST";
if ($market_id != 0) {
    $url = $url . "/" . $market_id;
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
