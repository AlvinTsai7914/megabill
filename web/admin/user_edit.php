<?php
require_once '_admin_head.php';

if (GetPreviousPageName() != "user_list")
    redir("user_list.php");

$user_id = request_num('edit_id');
if ($user_id == '' || $user_id == 1 || $user_id == 2)
    redir("user_list.php");

$resultMessage = "";
$users = null;
if ($user_id != 0) {//0:新增，其他:修改
    $url = WEBAPI_USER . "/" . $user_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $users) != 200 || count($users) != 1)
        redir("user_list.php");
}

$id = 0;
$account = "";
$name = "";
$email = "";
$phone = "";
$login_type = 1;
$last_login_time = "";
$last_login_ip = "";
$status = 0;
$remark = "";
$user_roles = array();
$sub_title = '新增';

if ($users) {
    $id = $users[0]['id'];
    $account = $users[0]['account'];
    $name = $users[0]['name'];
    $email = $users[0]['email'];
    $phone = $users[0]['phone'];
    $login_type = $users[0]['login_type'];
    $last_login_time = GetDateTimeString($users[0]['last_login_time']);
    $last_login_ip = $users[0]['last_login_ip'];
    $status = $users[0]['status'];
    $remark = $users[0]['remark'];
    $user_roles = $users[0]['roles'];
    $sub_title = '編輯';
}

//查詢角色
$roles = null;
if (CallAPI('GET', WEBAPI_ROLE, $user_accesstoken, null, $resultMessage, $roles) != 200)
    $roles = null;
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>使用者
                            <small><?= $sub_title ?></small>
                            <?php if ($user_id != 0) { ?>
                                <button type="button" class="btn btn-sm btn-primary float-right edit" id="edit_password_btn">設定密碼</button>
                            <?php } ?>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="user_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $id ?>">
                        <input type="hidden" id="edit_password" name="edit_password" value="<?= ($id == 0) ? "0" : "1" ?>">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-2">
                                    <label for="account" class="col-md-1">帳號</label>
                                    <div class="col-md-5">
                                        <input type="text" id="account" name="account" class="form-control validate[required, minSize[3]]" value="<?= $account ?>" <?= ($user_id == 0) ? "" : "readonly" ?>>
                                    </div>
                                    <label for="name" class="col-md-1">姓名</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="login_type" class="col-md-1">驗證方式</label>
                                    <div class="col-md-5">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline ml-2">
                                                <input type="radio" name="login_type" id="login_type0" value="0" <?= ($login_type == 0) ? "checked" : ""; ?>>
                                                <label for="login_type0"><span class="badge bg-success">系統驗證</span></label>
                                            </div>
                                            <div class="icheck-danger d-inline ml-2">
                                                <input type="radio" name="login_type" id="login_type1" value="1" <?= ($login_type == 1) ? "checked" : ""; ?> >
                                                <label for="login_type1"><span class="badge bg-danger">LDAP驗證</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2" id="edit_password_div">
                                    <label for="password" class="col-md-1">密碼</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control validate[required, minSize[12]]" maxlength="16" placeholder="最少12位英數字">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-brand look_password_btn"><i class="fas fa-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>

                                    <label for="password2" class="col-md-1">密碼確認</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="password" id="password2" name="password2" class="form-control validate[required,equals[password]]" maxlength="16" placeholder="必須與密碼相同">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-brand look_password_btn"><i class="fas fa-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <label for="email" class="col-md-1">Email</label>
                                    <div class="col-md-5">
                                        <input type="text" id="email" name="email" class="form-control validate[required,custom[email]]" placeholder="abc@email.com" value="<?= $email ?>">
                                    </div>
                                    <label for="phone" class="col-md-1">電話</label>
                                    <div class="col-md-5">
                                        <input type="text" id="phone" name="phone" class="form-control validate[custom[phone]]" value="<?= $phone ?>">
                                    </div>
                                </div>

                                <?php if ($id != 0) { ?>
                                    <div class="row mb-2">
                                        <label for="last_login_time" class="col-md-1">最後登入時間</label>
                                        <div class="col-md-5">
                                            <input type="text" name="last_login_time" class="form-control" value="<?= GetDateTimeString($last_login_time) ?>" readonly>
                                        </div>
                                        <label for="last_login_ip" class="col-md-1">最後登入IP</label>
                                        <div class="col-md-5">
                                            <input type="text" name="last_login_ip" class="form-control" value="<?= $last_login_ip ?>" readonly>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="row mb-2">
                                    <label for="roles" class="col-md-1">角色</label>
                                    <div class="col-md-5">
                                        <select id="roles" name="roles[]" class="form-control select2 validate[required]" multiple="multiple">
                                            <?php foreach (is_array($roles) ? $roles : array() as $role) { ?>
                                                <option  value="<?= $role["id"] ?>" <?= in_array($role["id"], $user_roles) ? 'selected' : '' ?>><?= $role["name"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label for="status" class="col-md-1">狀態</label>
                                    <div class="col-md-5">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline ml-2">
                                                <input type="radio" name="status" id="status0" value="0" <?= ($status == 0) ? "checked" : ""; ?>>
                                                <label for="status0"><span class="badge bg-success">啟用</span></label>
                                            </div>
                                            <div class="icheck-danger d-inline ml-2">
                                                <input type="radio" name="status" id="status1" value="1" <?= ($status == 1) ? "checked" : ""; ?> >
                                                <label for="status1"><span class="badge bg-danger">停用</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="remark" class="col-md-1">備註</label>
                                    <div class="col-md-11">
                                        <textarea id="remark" name="remark" class="form-control" rows="3"><?= $remark ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-secondary float-left" onclick="javascript:history.go(-1)">取消</button>
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
    $(function () {
        $("#edit_form").validationEngine({
            promptPosition: 'bottomLeft',
            maxErrorsPerField: 1,
            showOneMessage: true,
            addFailureCssClassToField: "formError-border_red",
            autoHidePrompt: true,
            autoHideDelay: 3000,
            validateNonVisibleFields: false,
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            onAjaxFormComplete: ajaxCallback,
        });
        ChangeEditPasswordStatus();
        $("input[name='login_type']").change();
    });

    $("#edit_password_btn").click(function () {
        ChangeEditPasswordStatus();
    });

    $("input[name='login_type']").change(function () {
<?php if ($id == 0) { ?>
            if ($("#login_type1").prop("checked") == true) {
                $("#edit_password_div").hide();
            } else {
                $("#edit_password_div").show();
            }
<?php } else { ?>
            if ($("#login_type1").prop("checked") == true) {
                $("#edit_password").val("1");
                $("#edit_password_div").hide();
                $("#edit_password_btn").hide();
                ChangeEditPasswordStatus();
            } else {
                $("#edit_password").val("1");
                $("#edit_password_btn").show();
                ChangeEditPasswordStatus();
            }
<?php } ?>
    });

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result == true)
                success_brand_alert("使用者<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("使用者<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("使用者<?= $sub_title ?>失敗", json.msg);
        }
    }

    function ChangeEditPasswordStatus()
    {
        var status = $("#edit_password").val();
        if (status == 0)
        {
            $("#edit_password").val("1");
            $("#edit_password_div").show();
            $("#edit_password_btn").text("取消設定密碼");
        } else
        {
            $("#edit_password").val("0");
            $("#edit_password_div").hide();
            $("#edit_password_btn").text("設定密碼");
        }
    }

</script>
<?php require_once '_admin_foot.php'; ?>