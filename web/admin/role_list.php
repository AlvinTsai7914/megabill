<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$q_name = trim(request_str("q_name"));
$q_status = trim(request_str("q_status"));
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>角色
                            <small>列表</small>
                            <button type="button" class="btn btn-sm btn-primary float-right" onclick="location.href = 'role_edit.php?edit_id=0'"><span class="fas fa-plus"></span></button>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="query_form" id="query_form" action="role_list.php">
                            <div class="card-body">
                                <div class="row">
                                    <label for="q_name" class="col-md-1">名稱</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_name" name="q_name" class="form-control" value="<?= $q_name ?>">
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
                                        <th style="width: 7%">編號</th>
                                        <th style="width: 83%">名稱</th>
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
    document.title += "-角色";
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
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [3]}],
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
                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";
                            var operate = "<div class='btn-group float-right'>";
                            if (row.id > 1)
                            {
                                operate += "<button type='button' class='btn btn-sm btn-primary' onclick='location.href=\"role_edit.php?edit_id=" + row.id + "\"\'><span class='fas fa-pen-square'></span></button>";
                                operate += "<button type='button' class='btn btn-sm btn-danger' onclick='delete_alert(\"角色\"," + row.id + ",\"" + row.name + "\",\"<?= WEBAPI_ROLE ?>\"); return false;'><span class='fas fa-trash-alt'></span></button>";
                            }
                            operate += "</div>";
                            return_data.push({
                                'id': row.id,
                                'name': row.name,
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
                {data: "name"},
                {data: "status"},
                {data: "operate"},
            ]
        })
    });
    function GetUrl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_ROLE ?>";
        var query_str = "1";

        var q_name = $("#q_name").val().trim();
        if (q_name)
            query_str += " AND POSITION('" + q_name + "' IN `name`)";

        var q_status = $("#q_status").val();
        if (q_status)
            query_str += " AND status='" + q_status + "'";

        if (query_str != "")
            url = url + "&query=" + encodeURIComponent(query_str);

        return url;
    }
</script>
<?php require_once '_admin_foot.php'; ?>
