<?php

require '_admin_config.php';

$user_account = request_str("user_account");
$user_password = request_str("user_password");
$checkcode = request_str("checkcode");

if (empty($user_account))
    die('{"result":false,"msg":"帳號錯誤"}');

if (empty($user_password))
    die('{"result":false,"msg":"密碼錯誤"}');

$checknum = getSession('admin_checknum');
if ($checkcode == "" || $checknum == null || $checknum == "" || $checkcode != $checknum)
    die('{"result":false,"msg":"驗證碼錯誤"}');

clear_loginuser_session();

$result = false;
$msg = "未知的錯誤";
$resultData = null;

//取得輸入的帳號及密碼
$request = array("account" => $user_account, "password" => $user_password, "ip" => request_ip());
//登入取得AccessToken
if (CallAPI('POST', WEBAPI_USER_Login, null, json_encode($request), $msg, $resultData) == 200) {
    if (array_key_exists('token', $resultData)) {
        setSession('user_accesstoken', $resultData['token']);
        if (CallAPI('GET', WEBAPI_USER_LoginUserData, $resultData['token'], NULL, $msg, $resultData) == 200 && count($resultData) == 1) {
            setSession('loginusername', $resultData[0]["name"]);
            setSession('loginip', $resultData[0]["last_login_ip"]);
            setSession('logintime', $resultData[0]["last_login_time"]);
            setSession('loginuserrole', $resultData[0]["roles"][0]);
            $result = true;
        } else {
            clear_loginuser_session();
            die('{"result":false,"msg":"無法取得使用者資料"}');
        }
    } else
        die('{"result":false,"msg":"無法取得Access Token"}');
}

$echoData = array("result" => $result, "msg" => $msg);
echo json_encode($echoData, JSON_UNESCAPED_UNICODE);
?>