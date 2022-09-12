<?php
require '_admin_head.php';
no_permission_gopage($menus, $first_page);

$sysinfos = null;
$url = WEBAPI_SYSINFO;
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $sysinfos) != 200 || !is_array($sysinfos) || count($sysinfos) != 1)
    redir("dashboard.php");

$id = 1;
$name = "";
$phone = "";
$fax = "";
$email = "";
$address = "";
$address_en = "";
$copyright = "";
$seo_description = "";
$ga_code = "";
$remark = "";

if ($sysinfos) {
    $id = $sysinfos[0]['id'];
    $name = $sysinfos[0]['name'];
    $phone = $sysinfos[0]['phone'];
    $fax = $sysinfos[0]['fax'];
    $email = $sysinfos[0]['email'];
    $address = $sysinfos[0]['address'];
    $address_en = $sysinfos[0]['address_en'];
    $copyright = $sysinfos[0]['copyright'];
    $seo_description = $sysinfos[0]['seo_description'];
    $ga_code = $sysinfos[0]['ga_code'];
    $remark = $sysinfos[0]['remark'];
    $sub_title = '編輯';
} else
    redir("dashboard.php");
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>系統資訊
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="sysinfo_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="sysinfo_id" name="sysinfo_id" value="<?= $id ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">名稱</label>
                                    <div class="col-md-5">
                                        <input type="text" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500">
                                    </div>
                                    <label for="phone" class="col-md-1">電話</label>
                                    <div class="col-md-5">
                                        <input type="text" name="phone" class="form-control validate[required,custom[phone]]"" value="<?= $phone ?>" maxlength="20">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="email" class="col-md-1">Email</label>
                                    <div class="col-md-5">
                                        <input type="text" name="email" class="form-control validate[required,custom[email]]" value="<?= $email ?>" maxlength="500">
                                    </div>
                                    <label for="fax" class="col-md-1">傳真</label>
                                    <div class="col-md-5">
                                        <input type="text" name="fax" class="form-control validate[required,custom[phone]]"" value="<?= $fax ?>" maxlength="20">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="address" class="col-md-1">中文地址</label>
                                    <div class="col-md-11">
                                        <input type="text" name="address" class="form-control validate[required]" value="<?= $address ?>" maxlength="500">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="address_en" class="col-md-1">英文地址</label>
                                    <div class="col-md-11">
                                        <input type="text" name="address_en" class="form-control validate[required]" value="<?= $address_en ?>" maxlength="500">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="copyright" class="col-md-1">版權宣告</label>
                                    <div class="col-md-11">
                                        <input type="text" name="copyright" class="form-control validate[required]" value='<?= $copyright ?>' maxlength="500">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="seo_description" class="col-md-1">SEO描述</label>
                                    <div class="col-md-11">
                                        <input type="text" name="seo_description" class="form-control" value="<?= $seo_description ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="ga_code" class="col-md-1">GA Code</label>
                                    <div class="col-md-11">
                                        <textarea id="ga_code" name="ga_code" class="form-control" rows="3"><?= $ga_code ?></textarea>
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
                                <button type="button" class="btn btn-sm btn-primary float-right submit_btn" onclick="validate_form_submit('#edit_form')">修改</button>
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
    document.title += "-系統資訊";
    $(function () {
        $("#edit_form").validationEngine({
            promptPosition: 'bottomLeft',
            maxErrorsPerField: 1,
            showOneMessage: false,
            addFailureCssClassToField: "formError-border_red",
            autoHidePrompt: true,
            autoHideDelay: 3000,
            validateNonVisibleFields: false,
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            scrollOffset: 100,
            onAjaxFormComplete: ajaxCallback
        });
    });

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result === true)
                success_brand_alert("系統資訊<?= $sub_title ?>成功", "", "sysinfo_edit.php");
            else
                error_brand_alert("系統資訊<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("系統資訊<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>