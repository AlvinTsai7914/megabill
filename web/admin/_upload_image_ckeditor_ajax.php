<?php

require_once '_admin_config.php';
no_permission_json();

$originalfilename = urldecode($_FILES['upload']['name']);

$ext = preg_replace('/^.*\.([^.]+)$/D', '$1', $originalfilename);

$tmp_filename = time() . "." . $ext;
$a_filepath = EDITOR_UPLOAD_PATH . $tmp_filename;
//$a_filepath = EDITOR_UPLOAD_PATH . $originalfilename;
$filepath = ROOT_PATH . BASE_PATH . $a_filepath;
if (empty(ROOT_PATH))
    $filepath = $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . $a_filepath;

if (!file_exists($filepath)) {
    $uploaded = "false";
    $fileName = "";
    $url = "";
    $error = "上傳失敗";
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $filepath)) {
        $uploaded = "true";
        $fileName = $tmp_filename;
        $url = BASE_PATH . $a_filepath;
        $error = "";
    }
    $rows = array("uploaded" => $uploaded, "fileName" => $fileName, "url" => $url, "error" => $error);
    echo json_encode($rows, JSON_UNESCAPED_UNICODE);
} else {
    $error["message"] = "相同檔案名稱的檔案已存在";
    $rows = array("uploaded" => 0, "error" => $error);
    echo json_encode($rows, JSON_UNESCAPED_UNICODE);
}
?>