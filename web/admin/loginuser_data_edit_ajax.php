<?php

require '_admin_config.php';
no_permission_json();

$name = request_str("name");
$email = request_str("email");
$phone = request_str("phone");

if ($name == '')
    die('{"result":false,"msg":"使用者姓名錯誤"}');

$data = array("name" => $name,
    "email" => $email,
    "phone" => $phone);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_USER_LoginUserData;
$method = "PUT";

$result = false;
$msg = "未知的錯誤";
$resultData = null;

$result = CallAPI($method, $url, getSession("user_accesstoken"), $jsondata, $msg, $resultData);
if ($result == 200) {
    $user_id = $resultData['id'];

    $result = true;
    $msg = "Successful";
}

$rows = array("result" => $result, "msg" => $msg);
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
