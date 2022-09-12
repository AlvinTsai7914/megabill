<?php
require_once '_func.php';
$resultMessage = "";

//查詢系統資訊
$sysinfos = null;
$querystring = "id=1";
$url = WEBAPI_SYSINFO . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $sysinfos) != 200)
    $sysinfos = null;

$sysinfo = null;
if (is_array($sysinfos) && count($sysinfos) > 0)
    redir(BASE_PATH . "/");
?>
<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="format-detection" content="telephone=no">

        <title>兆豐票券 | 系統維護中</title>
        <meta name="description" content="兆豐票券">
        <meta name="distribution" content="Taiwan">

        <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_PATH ?>/src/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_PATH ?>/src/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_PATH ?>/src/img/favicon/favicon-16x16.png">

        <?php require_once "_pre_css.php" ?>

    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="maintain_page">
                    <div class="maintain">
                        <div class="maintain_content">
                            <img src="<?= BASE_PATH ?>/src/img/maintain_page.png" alt="">
                            <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>