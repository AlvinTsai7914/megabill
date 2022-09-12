<?php

require '_admin_config.php';
no_permission_json();

$old_password = request_str("old_password");
$new_password = request_str("new_password");

$data = array("old_password" => $old_password,
    "new_password" => $new_password);

$jsondata = json_encode($data, JSON_UNESCAPED_UNICODE);

$url = WEBAPI_USER_LoginUserPassword;
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
