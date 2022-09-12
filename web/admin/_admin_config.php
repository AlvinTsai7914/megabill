<?php

require_once '../setting/config.php';
require_once '../setting/webapi.php';
require_once '../setting/tools.php';
require_once '_admin_tools.php';
$current_page_name = explode('/', $_SERVER['PHP_SELF']);
$current_page_name = explode('.', $current_page_name[count($current_page_name) - 1])[0];
?>