<?php
require '_admin_head.php';

if (GetPreviousPageName() != "benefits_list")
    redir("benefits_list.php");

$benefits_id = request_num('edit_id');
if ($benefits_id == '')
    redir("benefits_list.php");

$rows = null;
$row = null;
if ($benefits_id != 0) {
    $url = WEBAPI_BENEFITS . "/" . $benefits_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("benefits_list.php");
    else
        $row = $rows[0];
}

$id = 0;
$name = "";
$content = "";
$pic1url = "";
$pic1alt = "";
$pic2url = "";
$pic2alt = "";
$list_order = 0;
$status = 0;
$remark = "";
$sub_title = '新增';

if ($row) {
    $id = $row['id'];
    $name = $row['name'];
    $content = $row['content'];
    $pic1url = $row['pic1url'];
    $pic1alt = $row['pic1alt'];
    $pic2url = $row['pic2url'];
    $pic2alt = $row['pic2alt'];
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
                        <h1>薪酬福利
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="benefits_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="benefits_id" name="benefits_id" value="<?= $id ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">標題</label>
                                    <div class="col-md-11">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="content" class="col-md-1">簡介</label>
                                    <div class="col-md-11">
                                        <textarea id="content" name="content" class="form-control" rows="3"><?= $content ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <label for="pic1url" class="col-md-2">圖片</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="text" id="pic1url" name="pic1url" class="form-control validate[required]" value="<?= $pic1url ?>" placeholder="請選擇圖片" readonly>
                                                    <input type="hidden" id="pic1string" name="pic1string" value="">
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-brand" data-toggle="modal" data-target="#croppie_modal" data-width="50" data-height="50" data-basepath="<?= BASE_PATH ?>" data-source="#pic1url" data-result="#pic1string" data-preview="#pic1url_preview"><i class="fas fa-image"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="pic1alt" class="col-md-2">圖片說明</label>
                                            <div class="col-md-10">
                                                <input type="text" id="pic1alt" name="pic1alt" class="form-control" value="<?= $pic1alt ?>" maxlength="500">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="file" class="col-md-2">圖片預覽</label>
                                            <div class="col-md-10">
                                                <img style="max-width: 100%; height: auto;" id="pic1url_preview" src="<?= (strpos($pic1url, 'http') !== false) ? $pic1url : BASE_PATH . $pic1url ?>" alt="">
                                            </div>
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
                success_brand_alert("薪酬福利<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("薪酬福利<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("薪酬福利<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>