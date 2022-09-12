<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$role_id = request_num("role_id");
$name = request_str("name");
$status = request_num("status");
$remark = request_str("remark");
$menus = request_arr('menu');
sort($menus);
$menu_ids = implode(",", $menus);
$programs = request_arr('program');
sort($programs);
$program_ids = implode(",", $programs);

if ($role_id == '' || ( $role_id == 1))
    die('{"result":false,"msg":"角色編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"角色名稱錯誤"}');

$data = array("name" => $name,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_ROLE;
$method = "POST";
if ($role_id != 0) {
    $url = $url . "/" . $role_id;
    $method = "PUT";
}

$result = false;
$msg = "未知的錯誤";
$resultData = null;

$result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
if ($result == 200) {
    $role_id = $resultData['id'];
    $method = "POST";

    //註冊預設程式
    $url = WEBAPI_ROLE_RregisterProgram;
    $data = array("role_id" => $role_id, "program_ids" => "31,32,33,34,35", "unregisterall" => true);
    $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
    $result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
    if ($result != 200)
        die('{"result":false,"msg":"註冊預設程式失敗"}');

    //註冊程式
    $url = WEBAPI_ROLE_RregisterProgram;
    $data = array("role_id" => $role_id, "program_ids" => $program_ids, "unregisterall" => false);
    $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
    $result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
    if ($result != 200)
        die('{"result":false,"msg":"註冊程式失敗"}');

    //註冊選單
    $url = WEBAPI_ROLE_RregisterMenu;
    $data = array("role_id" => $role_id, "menu_ids" => $menu_ids, "unregisterall" => true);
    $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
    $result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
    if ($result != 200)
        die('{"result":false,"msg":"註冊選單失敗"}');

    $result = true;
    $msg = "Successful";
}

$rows = array("result" => $result, "msg" => $msg);
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
