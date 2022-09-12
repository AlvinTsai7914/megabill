<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$resultMessage = "";
$users = null;
$url = WEBAPI_USER_LoginUserData;
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $users) != 200 || count($users) != 1)
    redir("dashboard.php");

$id = $users[0]['id'];
$account = $users[0]['account'];
$name = $users[0]['name'];
$email = $users[0]['email'];
$phone = $users[0]['phone'];
$last_login_time = $users[0]['last_login_time'];
$last_login_ip = $users[0]['last_login_ip'];
$status = $users[0]['status'];
$remark = $users[0]['remark'];
$user_roles = $users[0]['roles'];
$sub_title = '修改資料';
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>使用者資料
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="loginuser_data_edit_ajax.php" data-toggle="validator" role="form">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="account" class="col-md-1">帳號</label>
                                    <div class="col-md-5">
                                        <input type="text" id="account" name="account" class="form-control" value="<?= $account ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">姓名</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="email" class="col-md-1">Email</label>
                                    <div class="col-md-5">
                                        <input type="text" id="email" name="email" class="form-control validate[required,custom[email]]" value="<?= $email ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="phone" class="col-md-1">電話</label>
                                    <div class="col-md-5">
                                        <input type="text" id="phone" name="phone" class="form-control validate[custom[phone]" value="<?= $phone ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-primary float-right submit_btn" onclick="validate_form_submit('#edit_form')">確定</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <?php require_once '_admin_footer.php'; ?>
</div>
<?php require_once "_admin_post_js.php"; ?>
<script>
    document.title += "-使用者資料";
    $(function () {
        $("#edit_form").validationEngine({
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

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result == true)
                success_brand_alert("使用者資料<?= $sub_title ?>成功", "");
            else
                error_brand_alert("使用者資料<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("使用者資料<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>

