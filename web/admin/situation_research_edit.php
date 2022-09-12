<?php
require '_admin_head.php';
no_permission_gopage($menus, $first_page);

$sysinfos = null;
$url = WEBAPI_SYSINFO;
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $sysinfos) != 200 || !is_array($sysinfos) || count($sysinfos) != 1)
    redir("dashboard.php");

$id = 1;
$observation_indicator = "";
$impact_factor = "";

if ($sysinfos) {
    $id = $sysinfos[0]['id'];
    $observation_indicator = $sysinfos[0]['observation_indicator'];
    $impact_factor = $sysinfos[0]['impact_factor'];
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
                        <h1>資金情勢研判
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="situation_research_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="sysinfo_id" name="sysinfo_id" value="<?= $id ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="observation_indicator" class="col-md-1">研判利率之觀察指標<br>
                                        <button type="button" class="btn btn-sm btn-brand" data-toggle="dropdown"><i class="fa fa-th-list"></i></button><br>
                                        <div class="dropdown-menu template_menu" role="menu">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-brand clear_template_btn" data-target="observation_indicator"><i class="fas fa-eraser"></i></button>
                                    </label>
                                    <div class="col-md-11">
                                        <textarea name="observation_indicator" id="observation_indicator" class="form-control validate[required]" rows="15"><?= $observation_indicator ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="impact_factor" class="col-md-1">利率影響因子分析<br>
                                        <button type="button" class="btn btn-sm btn-brand" data-toggle="dropdown"><i class="fa fa-th-list"></i></button><br>
                                        <div class="dropdown-menu template_menu" role="menu">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-brand clear_template_btn" data-target="impact_factor"><i class="fas fa-eraser"></i></button>
                                    </label>
                                    <div class="col-md-11">
                                        <textarea name="impact_factor" id="impact_factor" class="form-control validate[required]" rows="15"><?= $impact_factor ?></textarea>
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
    document.title += "-資金情勢研判";
    $(function () {

        CreateCKEditor("observation_indicator");
        CreateCKEditor("impact_factor");

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
                success_brand_alert("資金情勢研判<?= $sub_title ?>成功", "", "situation_research_edit.php");
            else
                error_brand_alert("資金情勢研判<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("資金情勢研判<?= $sub_title ?>失敗", json.msg);
        }
    }
</script>
<?php require_once '_admin_foot.php'; ?>