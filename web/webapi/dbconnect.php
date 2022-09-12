<?php

$dbconnect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error());
if ($dbconnect)
    $dbconnect->query("set names utf8");

//保證資料傳輸的編碼一致，相當於下列三行
//SET character_set_client = utf8;
//SET character_set_results = utf8;
//SET character_set_connection = utf8;
?>
