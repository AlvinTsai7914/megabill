<?php
require_once '_admin_head.php';

if (GetPreviousPageName() != "role_list")
    redir("role_list.php");

$role_id = request_num('edit_id');
if ($role_id == '' || $role_id == 1)
    redir("role_list.php");

$resultMessage = "";
$roles = null;
if ($role_id != 0) {//0:新增，其他:修改
    $url = WEBAPI_ROLE . "/" . $role_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $roles) != 200 || count($roles) != 1)
        redir("role_list.php");
}

$id = 0;
$name = "";
$status = 0;
$remark = "";
$sub_title = '新增';

if ($roles) {
    $id = $roles[0]['id'];
    $name = $roles[0]['name'];
    $status = $roles[0]['status'];
    $remark = $roles[0]['remark'];
    $sub_title = '編輯';
}

//查詢樹狀選單
$menus = null;
if (CallAPI('GET', WEBAPI_USER_LoginUserMenuTree, $user_accesstoken, null, $resultMessage, $menus) != 200)
    $menus = null;

//查詢角色選單
$rolemenus = null;
if ($role_id != 0) {
    $url = WEBAPI_ROLE_Menu . "/" . $id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $rolemenus) != 200)
        $rolemenus = null;
}

//查詢程式類別
$program_categories = null;
if (CallAPI('GET', WEBAPI_PROGRAM_CATEGORY, $user_accesstoken, null, $resultMessage, $program_categories) != 200)
    $program_categories = null;

//查詢程式
$programs = null;
if (CallAPI('GET', WEBAPI_USER_LoginUserProgram, $user_accesstoken, null, $resultMessage, $programs) != 200)
    $programs = null;

//查詢角色程式
$roleprograms = null;
if ($role_id != 0) {
    $url = WEBAPI_ROLE_Program . "/" . $id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $roleprograms) != 200)
        $roleprograms = null;
}

function DisplayCheckMenuTree($menus, $rolemenus, $rootflag) {
    if ($menus != null) {
        echo "<ul class='checktree'>";
        foreach (is_array($menus) ? $menus : array() as $key => $menu) {
            echo "<li>";
            $checked = CheckIDExist($rolemenus, $menu["id"]) ? " checked" : "";
            echo "<div class='icheck-primary d-inline'>";
            echo "<input type='checkbox' class='menu_checktreeinput' name='menu[]' id='menu-" . $menu["id"] . "' value='" . $menu["id"] . "'" . $checked . " data-program_ids='" . $menu["program_ids"] . "'>";
            echo "<label for='menu-" . $menu["id"] . "'>" . $menu["name"] . "</label>";
            echo "</div>";

            if (isset($menu["submenu"]))
                DisplayCheckMenuTree($menu["submenu"], $rolemenus, false);
            echo "</li>";
        }
        echo "</ul>";
    }
}

function DisplayCheckProgram($program_categories, $programs, $roleprograms) {
    if ($program_categories == null || $programs == null)
        return "";

    $html = '<div class="row checktree">';
    $html .= '<div class="col-5 col-sm-3">';
    $html .= '<div class="nav flex-column nav-tabs h-100" role="tablist" aria-orientation="vertical">';
    foreach (is_array($program_categories) ? $program_categories : array() as $item) {
        $active = "";
        if ($item == $program_categories[0])
            $active = " active";
        $html .= '<a class="nav-link ' . $active . '" id="programcatetory-' . $item["id"] . '" data-toggle="pill" href="#programcatetory-tab-' . $item["id"] . '" role="tab" aria-controls="programcatetory-tab-' . $item["id"] . '" aria-selected="true">' . $item["name"] . '</a>';
    }
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="col-7 col-sm-9">';
    $html .= '<div class="tab-content">';
    foreach (is_array($program_categories) ? $program_categories : array() as $item) {
        $active = "";
        if ($item == $program_categories[0])
            $active = "active show";

        $html .= '<div class="tab-pane ' . $active . '" id="programcatetory-tab-' . $item["id"] . '" role="tabpanel" aria-labelledby="programcatetory-' . $item["id"] . '">';
        $html .= '<ul>';

        foreach (is_array($programs) ? $programs : array() as $sub_item) {
            if ($sub_item["category_id"] != $item["id"])
                continue;
            $html .= '<li>';
            $checked = CheckIDExist($roleprograms, $sub_item["id"]) ? " checked" : "";
            $html .= '<div class="icheck-primary d-inline">';
            $html .= '<input type="checkbox" class="program_checktreeinput" name="program[]" id="program-' . $sub_item["id"] . '" value="' . $sub_item["id"] . '"' . $checked . '>';
            $html .= '<label for="program-' . $sub_item["id"] . '">' . $sub_item["name"] . '</label>';
            $html .= '</div>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
    }
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    echo $html;
}

function CheckIDExist($datas, $checkid) {
    if ($datas == null || $checkid == null)
        return false;

    foreach (is_array($datas) ? $datas : array() as $data) {
        if ($data["id"] == $checkid)
            return true;
    }
    return false;
}
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>角色
                            <small><?= $sub_title ?></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form name="edit_form" id="edit_form" action="role_edit_ajax.php" data-toggle="validator" role="form">
                        <input type="hidden" id="role_id" name="role_id" value="<?= $id ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <label for="name" class="col-md-1">名稱</label>
                                    <div class="col-md-5">
                                        <input type="text" id="name" name="name" class="form-control validate[required]" value="<?= $name ?>">
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
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <label class="col-md-3">選單</label>
                                            <div class="col-md-9">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-brand selectall">選取</button>
                                                    <button type="button" class="btn btn-sm btn-brand dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item menu_selectall">全部選取</a>
                                                        <a class="dropdown-item menu_unselectall">全部取消</a>
                                                    </ul>
                                                </div>
                                            </div>
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" id="menu_div">
                                                <?= DisplayCheckMenuTree($menus, $rolemenus, true); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row mb-2">
                                            <label class="col-md-3">程式</label>
                                            <div class="col-md-9">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-brand selectall">選取</button>
                                                    <button type="button" class="btn btn-sm btn-brand dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a class="dropdown-item program_selectall">全部選取</a></li>
                                                        <li><a class="dropdown-item program_unselectall">全部取消</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" id="program_div">
                                                <?= DisplayCheckProgram($program_categories, $programs, $roleprograms); ?>
                                            </div>
                                        </div>
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
            validateNonVisibleFields: true,
            ajaxFormValidation: true,
            ajaxFormValidationMethod: 'post',
            onAjaxFormComplete: ajaxCallback,
        });
    });

    function ajaxCallback(status, form, json, options) {
        validate_form_submit_result();
        if (status === true) {
            if (json.result === true)
                success_brand_alert("角色<?= $sub_title ?>成功", "", "javascript:history.go(-1)");
            else
                error_brand_alert("角色<?= $sub_title ?>失敗", json.msg);
        } else {
            error_brand_alert("角色<?= $sub_title ?>失敗", json.msg);
        }
    }

    $('input[type=checkbox]').change(function () {
        if ($(this).is(':checked'))
        {
            $(this).parents('li').each(function () {
                $(this).find('.menu_checktreeinput').first().prop('checked', true);
            });

            if ($(this).data("program_ids"))
            {
                var program_ids = $(this).data("program_ids") + ",";
                var arr = program_ids.split(',');
                for (var i = 0; i < arr.length; i++)
                {
                    if (arr[i] === "")
                        continue;
                    var target = ".program_checktreeinput[value='" + arr[i] + "']";
                    $(target).prop('checked', true);
                }
            }
        } else
        {
            $(this).closest('li').find('.menu_checktreeinput').each(function () {
                $(this).prop('checked', false);
            });
            /*
             if ($(this).data("program_ids"))
             {
             var program_ids = $(this).data("program_ids") + ",";
             var arr = program_ids.split(',');
             for (var i = 0; i < arr.length; i++)
             {
             if (arr[i] === "")
             continue;
             var target = ".program_checktreeinput[value='" + arr[i] + "']";
             $(target).prop('checked', false);
             }
             }
             */
        }
    });

    $(".menu_selectall").click(function () {
        $('.menu_checktreeinput').prop('checked', true);
    });

    $(".menu_unselectall").click(function () {
        $('.menu_checktreeinput').prop('checked', false);
    });

    $(".program_selectall").click(function () {
        $('.program_checktreeinput').prop('checked', true);
    });

    $(".program_unselectall").click(function () {
        $('.program_checktreeinput').prop('checked', false);
    });
</script>
<?php require_once '_admin_foot.php'; ?>