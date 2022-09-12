<?php
require '_admin_head.php';

if (GetPreviousPageName() != "company_list")
    redir("company_list.php");

$company_id = request_num('edit_id');
if ($company_id == '')
    redir("company_list.php");

$rows = null;
$row = null;
if ($company_id != 0) {
    $url = WEBAPI_COMPANY . "/" . $company_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("company_list.php");
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
$link = "";
$blank = 1;
$release_date = date('Y/m/d', time());
$use_shelf_date = 1;
$start_date = date('Y/m/d', time());
$end_date = date('Y/m/d', time());
$homepage_show = 1;
$seo_description = "";
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
    $link = $row['link'];
    $blank = $row['blank'];
    $release_date = $row['release_date'];
    $start_date = GetDateString($row['start_date']);
    $end_date = GetDateString($row['end_date']);
    if (GetDateString($start_date) != "" && $end_date != "")
        $use_shelf_date = 1;
    else
        $use_shelf_date = 0;

    $start_date = ($start_date == "") ? GetDateString(date("Y-m-d")) : $start_date;
    $end_date = ($end_date == "") ? GetDateString(date("Y-m-d")) : $end_date;
    $homepage_show = $row['homepage_show'];
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
                        <h1>公司訊息
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="company_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="company_id" name="company_id" value="<?= $id ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">標題</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500">
                                    </div>
                                    <label for="release_date" class="col-md-1">日期</label>
                                    <div class="col-md-5">
                                        <input type="text" name="release_date" id="release_date" class="form-control date-picker validate[required]" value="<?= GetDateString($release_date) ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="use_shelf_date" class="col-md-1">設定上架日期</label>
                                    <div class="col-md-5">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline ml-2">
                                                <input type="radio" name="use_shelf_date" id="use_shelf_date1" value="1" <?= ($use_shelf_date == 1) ? "checked=''" : ""; ?> >
                                                <label for="use_shelf_date1"><span class="badge bg-success">是</span></label>
                                            </div>
                                            <div class="icheck-danger d-inline ml-2">
                                                <input type="radio" name="use_shelf_date" id="use_shelf_date0" value="0" <?= ($use_shelf_date == 0) ? "checked=checked" : ""; ?>>
                                                <label for="use_shelf_date0"><span class="badge bg-danger">否</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="start_date" class="col-md-1 use_shelf_date">上架日期</label>
                                    <div class="col-md-5 use_shelf_date">
                                        <input type="hidden" name="start_date" id="start_date" value="<?= GetDateString($start_date) ?>">
                                        <input type="hidden" name="end_date" id="end_date" value="<?= GetDateString($end_date) ?>">
                                        <input type="text" name="shelf_date" id="shelf_date" class="form-control daterange-picker validate[required]" value="<?= GetDateString($start_date) . " - " . GetDateString($end_date); ?>">
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
                                    <label for="homepage_show" class="col-md-1">首頁顯示</label>
                                    <div class="col-md-5">
                                        <div class="clearfix">
                                            <div class="icheck-success d-inline ml-2">
                                                <input type="radio" name="homepage_show" id="homepage_show1" value="1" <?= ($homepage_show == 1) ? "checked=''" : ""; ?> >
                                                <label for="homepage_show1"><span class="badge bg-success">是</span></label>
                                            </div>
                                            <div class="icheck-danger d-inline ml-2">
                                                <input type="radio" name="homepage_show" id="homepage_show0" value="0" <?= ($homepage_show == 0) ? "checked=checked" : ""; ?>>
                                                <label for="homepage_show0"><span class="badge bg-danger">否</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="seo_description" class="col-md-1">SEO描述</label>
                                    <div class="col-md-11">
                                        <input type="text" name="seo_description" class="form-control" value="<?= $seo_description ?>">
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
                                <button type="button" class="btn btn-sm btn-success float-right submit_btn" onclick="customer_form_sumbit('#edit_form')">確定</button>
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

<?php if ($use_shelf_date == 1) { ?>
            $(".use_shelf_date").show();
<?php } else { ?>
            $(".use_shelf_date").hide();
<?php } ?>
    });

    function customer_form_sumbit(selector) {
        $('#start_date').val($('#shelf_date').data('daterangepicker').startDate.format('YYYY/MM/DD'));
        $('#end_date').val($('#shelf_date').data('daterangepicker').endDate.format('YYYY/MM/DD'));
        if (typeof (CKEDITOR) !== "undefined") {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }
        $(selector).removeClass('validating');
        if ($(selector).validationEngine('validate') === true)
        {
            $(".submit_btn").attr('disabled', true);
            $(selector).submit();
        }
    }

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result == true)
                success_brand_alert("公司訊息<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("公司訊息<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("公司訊息<?= $sub_title ?>失敗", json.msg);
        }
    }

    $('input[type=radio][name=use_shelf_date]').change(function () {
        if (this.value == 1)
            $(".use_shelf_date").show();
        else
            $(".use_shelf_date").hide();
    });
</script>
<?php require_once '_admin_foot.php'; ?>