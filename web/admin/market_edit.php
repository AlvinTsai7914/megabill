<?php
require '_admin_head.php';

if (GetPreviousPageName() != "market_list")
    redir("market_list.php");

$market_id = request_num('edit_id');
if ($market_id == '')
    redir("market_list.php");

$rows = null;
$row = null;
if ($market_id != 0) {
    $url = WEBAPI_MARKET . "/" . $market_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rows) != 200 || !is_array($rows) || count($rows) != 1)
        redir("market_list.php");
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
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
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
                        <h1>市場行情
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="market_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="market_id" name="market_id" value="<?= $id ?>">
                        <input type="hidden" id="homepage_show" name="homepage_show" value="0">
                        <input type="hidden" id="list_order" name="list_order" value="<?= $list_order ?>">
                        <input type="hidden" id="status" name="status" value="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">標題</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>" maxlength="500" readonly>
                                    </div>
                                    <label for="release_date" class="col-md-1">日期</label>
                                    <div class="col-md-5">
                                        <input type="text" name="release_date" id="release_date" class="form-control date-picker validate[required]" value="<?= GetDateString($release_date) ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="content" class="col-md-1">簡介</label>
                                    <div class="col-md-11">
                                        <textarea id="content" name="content" class="form-control" rows="3"><?= $content ?></textarea>
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
                success_brand_alert("市場行情<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("市場行情<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("市場行情<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>