<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    die();

require '_admin_config.php';
no_permission_json();

$user_id = request_num("user_id");
$account = request_str("account");
$password = request_str("password");
$name = request_str("name");
$email = request_str("email");
$phone = request_str("phone");
$login_type = request_num("login_type");
$status = request_num("status");
$remark = request_str("remark");
$roles = request_arr("roles");
sort($roles);
$role_ids = implode(",", $roles);
$edit_password = request_str("edit_password");

if ($user_id == '')
    die('{"result":false,"msg":"使用者編號錯誤"}');

if ($name == '')
    die('{"result":false,"msg":"使用者姓名錯誤"}');

$data = array("account" => $account,
    "password" => $password,
    "name" => $name,
    "email" => $email,
    "phone" => $phone,
    "login_type" => $login_type,
    "status" => $status,
    "remark" => $remark);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_USER;
$method = "POST";
if ($user_id != 0) {
    $url = $url . "/" . $user_id;
    $method = "PUT";
}

$result = false;
$msg = "未知的錯誤";
$resultData = null;

$result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
if ($result == 200) {
    $user_id = $resultData['id'];
    $data = array("user_id" => $user_id,
        "role_ids" => $role_ids,
        "unregisterall" => true);
    $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
    $url = WEBAPI_USER_RegisterRole;
    $method = "POST";
    $result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
    if ($result != 200)
        die('{"result":false,"msg":"使用者註冊角色失敗"}');


    if (($user_id != 0) && $edit_password === "1" && !empty($password)) {
        //修改使用者密碼
        $data = array("password" => $password);
        $jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);
        $url = WEBAPI_USER_Password . "/" . $user_id;
        $method = "PUT";
        $result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
        if ($result != 200)
            die('{"result":false,"msg":"密碼設定失敗"}');
    }
    $result = true;
    $msg = "Successful";
}

$rows = array("result" => $result, "msg" => $msg);
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
