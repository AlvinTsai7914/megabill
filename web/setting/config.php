<?php

//設定錯誤報告級別
error_reporting(E_ALL);

//更改php.ini的內容
ini_set('display_errors', '0');             # 0不顯示 1顯示
ini_set('display_startup_errors', '0');
ini_set("session.cookie_httponly", '1');
ini_set('max_execution_time', '0');
ini_set('max_input_time', '0');
ini_set('memory_limit', '4096M');

//時區設定
date_default_timezone_set("Asia/Taipei");

//設定內部文字編碼
mb_internal_encoding("UTF-8");

//設定session名稱
session_name("megabills");

//開啟瀏覽器輸出緩衝區
ob_start();

//啟用session
session_start();

//向client發送原始的HTTP表頭
header("Content-type: text/html; charset=utf-8");

const ENVIRONMENT = "development"; //development;test;formal
//開發
const API_ACCOUNT = "web_server";
const API_PASSWORD = "c7y2rQ3P";
const API_SERVER = 'http://localhost:8114'; //WebAPI連線設定
const API_BASEURL = '/webapi';
const ROOT_PATH = 'D:/14067826_megabills/web';
const BASE_PATH = '';
const UPLOAD_IMAGE_PATH = '/uploads/';     //圖片上傳路徑
const UPLOAD_FILE_PATH = '/uploads/files/';     //檔案上傳路徑
const EDITOR_UPLOAD_PATH = '/uploads/editor/';     //HTML編輯器檔案上傳路徑設定

const ORACLE_CONNECT = true;
const ORACLE_USERNAME = 'ECP';  //'ECT';
const ORACLE_PASSWORD = 'ECPXX';    //'ECTXX';
const ORACLE_CONNECTION_STRING = "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =192.168.11.49)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = ebond)))";

$sys_site_title = '兆豐票券';
$sys_copyright = "<strong>Copyright &copy; 2022 <a href='https://ks-design.com.tw/' target='_blank'>Kasser Integrated Marketing Co.,LTD.</a></strong> All rights reserved.";
$sys_version = "1.0.0";
?>