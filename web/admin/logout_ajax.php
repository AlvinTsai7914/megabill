<?php

require '_admin_config.php';

$result = false;
$resultMessage = "";
$resultData = "";

$result = CallAPI('POST', WEBAPI_USER_Logout, getSession("user_accesstoken"), null, $resultMessage, $resultData);

clear_loginuser_session();

redir("login.php");
?>