<?php
require '_admin_head.php';

if (GetPreviousPageName() != "location_en_list")
    redir("location_en_list.php");

$location_id = request_num('edit_id');
if ($location_id == '')
    redir("location_en_list.php");

$rows = null;
$row = null;
if ($location_id != 0) {
    $url = WEBAPI_LOCATION . "/" . $location_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("location_en_list.php");
    else
        $row = $rows[0];
}

$id = 0;
$name = "";
$content = "";
$map_embed = "";
$list_order = 0;
$status = 0;
$remark = "";
$sub_title = '新增';

if ($row) {
    $id = $row['id'];
    $name = $row['name'];
    $content = $row['content'];
    $map_embed = $row['map_embed'];
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
                        <h1>Location
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="location_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="location_id" name="location_id" value="<?= $id ?>">
                        <input type="hidden" id="language_id" name="language_id" value="1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">名稱</label>
                                    <div class="col-md-11">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500">
                                    </div>
                                </div>
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
                                    <label for="map_embed" class="col-md-1">嵌入地圖</label>
                                    <div class="col-md-5">
                                        <textarea name="map_embed" class="form-control" rows="10" data-preview="#preview_div"><?= $map_embed ?></textarea>
                                    </div>
                                    <label for="map_embed_priview" class="col-md-1">預覽</label>
                                    <div class="col-md-5" id="preview_div">
                                        <?= $map_embed ?>
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
                success_brand_alert("Location<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("Location<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("Location<?= $sub_title ?>失敗", json.msg);
        }
    }

    $("textarea[name='map_embed']").on('change keyup paste', function () {
        var preview = $(this).data("preview");
        var data = $(this).val();

        if (preview != null && data != null)
        {
            $(preview).empty();
            $(preview).append(data);
        }
    })
</script>
<?php require_once '_admin_foot.php'; ?>