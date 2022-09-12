<?php
require '_admin_head.php';

if (GetPreviousPageName() != "financial_en_list")
    redir("financial_en_list.php");

$financial_id = request_num('edit_id');
if ($financial_id == '')
    redir("financial_en_list.php");

$rows = null;
$row = null;
if ($financial_id != 0) {
    $url = WEBAPI_FINANCIAL . "/" . $financial_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("financial_en_list.php");
    else
        $row = $rows[0];
}

$id = 0;
$category_id = 0;
$name = "";
$content = "";
$file1url = "";
$list_order = 0;
$status = 0;
$remark = "";
$sub_title = '新增';

if ($row) {
    $id = $row['id'];
    $category_id = $row['category_id'];
    $name = $row['name'];
    $content = $row['content'];
    $file1url = $row['file1url'];
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
                        <h1>Financial Highlights
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="financial_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="financial_id" name="financial_id" value="<?= $id ?>">
                        <input type="hidden" id="category_id" name="category_id" value="0">
                        <input type="hidden" id="language_id" name="language_id" value="1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">標題</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500">
                                    </div>
                                    <label for="file1url" class="col-md-1">檔案</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="text" id="file1url" name="file1url" class="form-control validate[required]" value="<?= $file1url ?>" placeholder="請選擇檔案" readonly>
                                            <input type="file" id="file1url_input" accept="*.*">
                                            <input type="hidden" id="file1string" name="file1string" value="">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-brand file_clear_agent" data-target="#file1url,#file1string"><i class="fas fa-eraser"></i></button>
                                                <button type="button" class="btn btn-brand file_upload_agent" data-target="#file1url_input"><i class="fas fa-file-upload"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="list_order" class="col-md-1">列表順序</label>
                                    <div class="col-md-5">
                                        <input type="number" id="list_order" name="list_order" class="form-control validate[required]" step="1" value="<?= $list_order ?>">
                                    </div>
                                    <label for="status" class="col-md-1">狀態</label>
                                    <div class="col-md-5">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="status" id="status0" value="0" <?= ($status == 0) ? "checked" : ""; ?>>
                                                <label for="status0"><span class="badge bg-success">啟用</span></label>
                                            </div>
                                            <div class="icheck-danger d-inline">
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
        $("input[type=file]").hide();

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
                success_brand_alert("Financial Highlights<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("Financial Highlights<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("Financial Highlights<?= $sub_title ?>失敗", json.msg);
        }
    }

    $(".file_upload_agent").click(function () {
        var target = $(this).data("target");
        if (target)
            $(target).click();
    })

    $(".file_clear_agent").click(function () {
        var target = $(this).data("target");
        console.log(target);
        if (target)
            $(target).val("");
    })

    $("#file1url_input").change(function () {
        var fileobj = $("#file1url_input")[0].files[0];
        if (fileobj) {
            var ext = fileobj.name.substr(fileobj.name.length - 4, fileobj.name.length);
            if (ext.toLowerCase() != ".pdf") {
                error_brand_alert("檔案限制上傳 pdf 格式", "");
            } else
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#file1url").val(fileobj.name);
                    $("#file1string").val(e.target.result);
                };
                reader.readAsDataURL(fileobj);
            }
        }
    });
</script>
<?php require_once '_admin_foot.php'; ?>