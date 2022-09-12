<?php
require '_admin_config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $sys_site_title ?> CMS</title>
        <link rel="icon" type="image/png" href="<?= BASE_PATH ?>/src/img/favicon/favicon-16x16.png">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <?php require_once "_admin_pre_css.php"; ?>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="card card-outline card-brand">
                <div class="card-header text-center">
                    <a href='../' target='_blank'><img style="max-width: 50%; height: auto;" class="center-block" src="<?= BASE_PATH ?>/src/img/MegaLogo.png"/></a>
                    <h3>內容管理系統</h3>
                </div>
                <div class="card-body">
                    <form id="login_form" action="login_ajax.php">
                        <label for="user_account">帳號</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control validate[required]" id="user_account" name="user_account">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <label for="user_password">密碼</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control validate[required]" id="user_password" name="user_password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <label for="checkcode">驗證碼</label>
                        <div class="input-group mb-3">
                            <input style="width:70%" type=width"text" class="form-control validate[required]" id="checkcode" name="checkcode" maxlength="4" autocomplete="off" placeholder="點擊圖片刷新驗證碼">
                            <img style="width:30%; height: 34px; cursor:pointer" class="pull-right" id="checkcode_img" name="checkcode_img" src="_checkcode.php">
                        </div>

                        <div class="text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-block btn-brand">登入</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php require_once "_admin_post_js.php"; ?>

        <script>
            $(function () {
                $("#login_form").validationEngine({
                    promptPosition: 'bottomLeft',
                    maxErrorsPerField: 1,
                    showOneMessage: true,
                    addFailureCssClassToField: "formError-border_red",
                    autoHidePrompt: true,
                    autoHideDelay: 3000,
                    validateNonVisibleFields: true,
                    ajaxFormValidation: true,
                    ajaxFormValidationMethod: 'post',
                    onAjaxFormComplete: ajaxCallback,
                });
            });

            $("#checkcode_img").click(function () {
                $(this).attr("src", "_checkcode.php");
            })

            function ajaxCallback(status, form, json, options) {
                $("#checkcode").val("");
                $("#checkcode_img").click();
                if (status === true) {
                    if (json.result == true) {
                        location.href = 'dashboard.php';
                    } else {
                        error_brand_alert("登入失敗", json.msg);
                    }
                }
            }
        </script>
    </body>
</html>
