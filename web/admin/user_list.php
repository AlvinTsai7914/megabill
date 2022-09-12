<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$q_account = trim(request_str("q_account"));
$q_name = trim(request_str("q_name"));
$q_email = trim(request_str("q_email"));
$q_status = trim(request_str("q_status"));
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>使用者
                            <small>列表</small>
                            <button type="button" class="btn btn-sm btn-primary float-right" onclick="location.href = 'user_edit.php?edit_id=0'"><span class="fas fa-plus"></span></button>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="query_form" id="query_form" action="user_list.php">
                            <div class="card-body">
                                <div class="row">
                                    <label for="q_account" class="col-md-1">帳號</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_account" name="q_account" class="form-control" value="<?= $q_account ?>">
                                    </div>
                                    <label for="q_name" class="col-md-1">姓名</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_name" name="q_name" class="form-control" value="<?= $q_name ?>">
                                    </div>
                                    <label for="q_email" class="col-md-1">Email</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_email" name="q_email" class="form-control" value="<?= $q_email ?>">
                                    </div>
                                    <label for="q_status" class="col-md-1">狀態</label>
                                    <div class="col-md-2">
                                        <select id="q_status" name="q_status" class="form-control select2">
                                            <option  value="" <?php echo ($q_status == "") ? "selected='selected'" : ""; ?>>(All)</option>
                                            <option  value="0" <?php echo ($q_status == "0") ? "selected='selected'" : ""; ?>>啟用</option>
                                            <option  value="1" <?php echo ($q_status == "1") ? "selected='selected'" : ""; ?>>停用</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class='btn-group float-right'>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="query_form_clear('#query_form')"><span class="fas fa-sync-alt"></span></button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="query_form_submit('#query_form')"><span class="fas fa-search"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">編號</th>
                                        <th style="width: 10%">帳號</th>
                                        <th style="width: 10%">姓名</th>
                                        <th style="width: 15%">Email</th>
                                        <th style="width: 10%">電話</th>
                                        <th style="width: 15%">驗證方式</th>
                                        <th style="width: 15%">最後登入時間</th>
                                        <th style="width: 10%">最後登入IP</th>
                                        <th style="width: 5%">狀態</th>
                                        <th style="width: 5%">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once '_admin_footer.php'; ?>
</div>
<?php require_once "_admin_post_js.php"; ?>
<script>
    document.title += "-使用者";
    $(function () {
        $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'order': [[0, 'asc']],
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [9]}],
            'sPaginationType': 'full_numbers',
            'pageLength': 100,
            'processing': true,
            'serverSide': true,
            'oLanguage': {'sUrl': "../plugins/datatables/dataTables.zh-Hant.json", },
            'ajax': {
                url: GetUrl(),
                type: 'POST',
                dataSrc: function (json) {
                    var return_data = new Array();
                    if (json.data != null) {
                        for (var i = 0; i < json.data.length; i++) {
                            var row = json.data[i];

                            var login_type = {};
                            GetLoginTypeColorString(row.login_type, login_type);
                            login_type = "<span class='badge bg-" + login_type.color + "'>" + login_type.string + "</span>";

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";
                            var operate = "<div class='btn-group float-right'>";
                            if (row.id > 2)
                            {
                                operate += "<button type='button' class='btn btn-sm btn-primary' onclick='location.href=\"user_edit.php?edit_id=" + row.id + "\"\'><span class='fas fa-pen-square'></span></button>";
                                operate += "<button type='button' class='btn btn-sm btn-danger' onclick='delete_alert(\"使用者\"," + row.id + ",\"" + row.name + "\",\"<?= WEBAPI_USER ?>\"); return false;'><span class='fas fa-trash-alt'></span></button>";
                            }
                            operate += "</div>";
                            return_data.push({
                                'id': row.id,
                                'account': row.account,
                                'name': row.name,
                                'email': row.email,
                                'phone': row.phone,
                                'login_type': login_type,
                                'last_login_time': row.last_login_time,
                                'last_login_ip': row.last_login_ip,
                                'status': status,
                                'operate': operate
                            })
                        }
                    }
                    return return_data;
                }
            },
            columns: [
                {data: "id"},
                {data: "account"},
                {data: "name"},
                {data: "email"},
                {data: "phone"},
                {data: "login_type"},
                {data: "last_login_time"},
                {data: "last_login_ip"},
                {data: "status"},
                {data: "operate"},
            ]
        })
    });

    function GetUrl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_USER ?>";
        var query_str = "1";

        var q_account = $("#q_account").val().trim();
        if (q_account)
            query_str += " AND POSITION('" + q_account + "' IN `account`)";

        var q_name = $("#q_name").val().trim();
        if (q_name)
            query_str += " AND POSITION('" + q_name + "' IN `name`)";

        var q_email = $("#q_email").val().trim();
        if (q_email)
            query_str += " AND POSITION('" + q_email + "' IN `email`)";

        var q_status = $("#q_status").val();
        if (q_status)
            query_str += " AND status='" + q_status + "'";

        if (query_str != "")
            url = url + "&query=" + encodeURIComponent(query_str);

        return url;
    }
</script>
<?php require_once '_admin_foot.php'; ?>
