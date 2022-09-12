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
    $sysinfo = $sysinfos[0];
else
    redir(BASE_PATH . "/maintain");

//查詢永續發展專區
$development = null;
$developments = null;
$querystring = "name='" . $g_page_c_name . "'";
$url = WEBAPI_DEVELOPMENT . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $developments) == 200 && is_array($developments) && count($developments) == 1) {
    $development = $developments[0];
}

if ($development == null)
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

        <title><?= $sysinfo["name"] ?><?= (empty($g_page_c_name)) ? "" : (" | " . $g_page_c_name) ?> </title>
        <meta name="description" content="<?= $development["seo_description"] ?>">
        <meta name="distribution" content="Taiwan">

        <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_PATH ?>/src/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_PATH ?>/src/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_PATH ?>/src/img/favicon/favicon-16x16.png">

        <?php require_once "_pre_css.php" ?>

        <script>
            var BASE_PATH = "<?php echo BASE_PATH ?>";
        </script>
        <?php if (ENVIRONMENT == "formal") { ?>
            <?= $sysinfo["ga_code"] ?>
        <?php } ?>
    </head>
    <body>

