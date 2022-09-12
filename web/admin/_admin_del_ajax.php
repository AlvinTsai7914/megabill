<?php

require '_admin_config.php';
no_permission_json();

$delete_url = request_str("delete_url");

if ($delete_url == "")
    die('{"result":false,"msg":"指定URL錯誤"}');

$result = false;
$msg = "";
$res = null;

$result = CallAPI('DELETE', $delete_url, getSession("user_accesstoken"), null, $msg, $res);
if ($result == 200) {
    $result = true;
    $msg = "Successful";
}
$rows = array("result" => $result, "msg" => $msg);
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
