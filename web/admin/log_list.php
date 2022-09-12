<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$q_user_name = trim(request_str("q_user_name"));
$q_account = trim(request_str("q_account"));
$q_ip = trim(request_str("q_ip"));
$q_program_name = trim(request_str("q_program_name"));
$q_c_time = request_str("q_c_time");
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>操作紀錄
                            <small>列表</small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="query_form" id="query_form" action="log_list.php">
                            <div class="card-body">
                                <div class="row">
                                    <label for="q_user_name" class="col-md-1">使用者姓名</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_user_name" name="q_user_name" class="form-control" value="<?= $q_user_name ?>">
                                    </div>
                                    <label for="q_account" class="col-md-1">使用者帳號</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_account" name="q_account" class="form-control" value="<?= $q_account ?>">
                                    </div>
                                    <label for="q_ip" class="col-md-1">IP位址</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_ip" name="q_ip" class="form-control" value="<?= $q_ip ?>">
                                    </div>
                                    <label for="q_program_name" class="col-md-1">程式名稱</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_program_name" name="q_program_name" class="form-control" value="<?= $q_program_name ?>">
                                    </div>
                                    <label for="q_program_name" class="col-md-1">操作日期</label>
                                    <div class="col-md-5">
                                        <input type="text" name="q_c_time" id="q_c_time" class="form-control daterange-picker" value="<?= $q_c_time ?>">
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
                                        <th style="width: 13%">使用者姓名</th>
                                        <th style="width: 15%">使用者帳號</th>
                                        <th style="width: 15%">IP</th>
                                        <th style="width: 20%">執行程式名稱</th>
                                        <th style="width: 10%">訊息</th>
                                        <th style="width: 15%">操作時間</th>
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
    document.title += "-操作紀錄";
    $(function () {
        $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'order': [[0, 'desc']],
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [7]}],
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
                            var operate = "<div class='btn-group float-right'>";
                            operate += "<button type='button' class='btn btn-sm btn-primary float-right' onclick='location.href=\"log_edit.php?edit_id=" + row.id + "\"\'><span class='fas fa-search'></span></button>";
                            operate += "</div>";
                            return_data.push({
                                'id': row.id,
                                'user_name': row.user_name,
                                'user_account': row.user_account,
                                'ip': row.ip,
                                'program_name': row.program_name,
                                'resultMessage': row.resultMessage,
                                'c_time': row.c_time,
                                'operate': operate
                            })
                        }
                    }
                    return return_data;
                }
            },
            columns: [
                {data: "id"},
                {data: "user_name"},
                {data: "user_account"},
                {data: "ip"},
                {data: "program_name"},
                {data: "resultMessage"},
                {data: "c_time"},
                {data: "operate"}
            ]
        })
    });
    function GetUrl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_LOG ?>";
        var query_str = "1";
        var q_user_name = $("#q_user_name").val().trim();
        if (q_user_name)
            query_str += " AND POSITION('" + q_user_name + "' IN `user_name`)";

        var q_account = $("#q_account").val().trim();
        if (q_account)
            query_str += " AND POSITION('" + q_account + "' IN `user_account`)";

        var q_ip = $("#q_ip").val().trim();
        if (q_ip)
            query_str += " AND POSITION('" + q_ip + "' IN `ip`)";

        var q_program_name = $("#q_program_name").val().trim();
        if (q_program_name)
            query_str += " AND POSITION('" + q_program_name + "' IN `program_name`)";

        var q_c_time = $("#q_c_time").val().trim();
        if (q_c_time) {
            var start_date = $('#q_c_time').data('daterangepicker').startDate.format('YYYY/MM/DD');
            var end_date = $('#q_c_time').data('daterangepicker').endDate.format('YYYY/MM/DD');
            end_date = new Date(end_date); 
            end_date.setDate(end_date.getDate() + 1); 
            end_date = GetDateString(end_date);
            query_str += " AND ( `c_time` between '" + start_date + "' and '" + end_date + "')";
        }

        if (query_str != "")
            url = url + "&query=" + encodeURIComponent(query_str);
        return url;
    }
</script>
<?php require_once '_admin_foot.php'; ?>
