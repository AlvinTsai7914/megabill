<?php
require_once '_admin_config.php';
no_permission_gohome();
$user_accesstoken = getSession('user_accesstoken');

$result = false;
$resultMessage = "";

//查詢選單
$menus = null;
$first_page = "";
if (CallAPI('GET', WEBAPI_USER_LoginUserMenuTree, $user_accesstoken, null, $resultMessage, $menus) == 200 && is_array($menus) && count($menus) > 0)
    $first_page = getfirstpage($menus);
else
    $menus = null;

if (empty($first_page))
    redir("login.php");
?>
<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="no-cache">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title><?= $sys_site_title ?> CMS</title>
        <link rel="icon" type="image/png" href="<?= BASE_PATH ?>/src/img/favicon/favicon-16x16.png">

        <?php require_once "_admin_pre_css.php"; ?>
    </head>

    <script>
        var BASE_PATH = "<?php echo BASE_PATH ?>";
    </script>

    <body class="hold-transition sidebar-mini layout-fixed">
        <?php require_once '_croppie_image_modal.php'; ?>