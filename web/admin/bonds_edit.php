<?php
require '_admin_head.php';
no_permission_gopage($menus, $first_page);

$business_id = 2; //票券及債券買賣
$rows = null;
$row = null;
if ($business_id != 0) {
    $url = WEBAPI_BUSINESS . "/" . $business_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("business_list.php");
    else
        $row = $rows[0];
}

$id = 0;
$name = "";
$content = "";
$seo_description = "";
$list_order = 0;
$status = 0;
$remark = "";
$sub_title = '新增';

if ($row) {
    $id = $row['id'];
    $name = $row['name'];
    $content = $row['content'];
    $seo_description = $row['seo_description'];
    $list_order = $row['list_order'];
    $status = $row['status'];
    $remark = $row['remark'];
    $sub_title = '編輯';
}
?>
<div class="wrapper">
    <?php include_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>票券及債券買賣
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="business_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="business_id" name="business_id" value="<?= $id ?>">
                        <input type="hidden" id="list_order" name="list_order" value="<?= $list_order ?>">
                        <input type="hidden" id="status" name="status" value="0">
                        <input type="hidden" id="name" name="name" value="<?= $name ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="content" class="col-md-1">內容<br>
                                        <button type="button" class="btn btn-sm btn-brand" data-toggle="dropdown"><i class="fa fa-th-list"></i></button><br>
                                        <div class="dropdown-menu template_menu" role="menu">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-brand clear_template_btn" data-target="content"><i class="fas fa-eraser"></i></button>
                                    </label>
                                    <div class="col-md-11">
                                        <textarea name="content" id="content" class="form-control validate[required]" rows="15"><?= $content ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="seo_description" class="col-md-1">SEO描述</label>
                                    <div class="col-md-11">
                                        <input type="text" name="seo_description" class="form-control" value="<?= $seo_description ?>">
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
                                <button type="button" class="btn btn-sm btn-warning float-left" onclick="javascript:history.go(-1)">取消</button>
                                <button type="button" class="btn btn-sm btn-success float-right submit_btn" onclick="validate_form_submit('#edit_form')">確定</button>
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

        CreateCKEditor("content");

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
    });

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result == true)
                success_brand_alert("票券及債券買賣<?= $sub_title ?>成功", "", "bonds_edit.php");
            else
                error_brand_alert("票券及債券買賣<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("票券及債券買賣<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>