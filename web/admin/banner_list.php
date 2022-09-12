<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$q_name = request_str("q_name");
$q_status = trim(request_str("q_status"));
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Banner
                            <small>列表</small>
                            <button type="button" class="btn btn-sm btn-brand float-right" onclick="location.href = 'banner_edit.php?edit_id=0'"><span class="fas fa-plus"></span></button>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="query_form" id="query_form" action="banner_list.php">
                            <div class="card-body">
                                <div class="row">
                                    <label for="q_name" class="col-md-1">名稱</label>
                                    <div class="col-md-2">
                                        <input type="text" id="q_name" name="q_name" class="form-control" value="<?= $q_name ?>">
                                    </div>
                                    <label for="q_status" class="col-md-1">狀態</label>
                                    <div class="col-md-2">
                                        <select id="q_status" name="q_status" class="form-control select2" style="width: 100%;">
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
                            <div class='btn-group float-right'>
                                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#reorder_modal"><i class="fas fa-sort-numeric-down"></i></button>
                            </div>
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>編號</th>
                                        <th>名稱</th>
                                        <th>桌機圖片</th>
                                        <th>手機圖片</th>
                                        <th>連結網址</th>
                                        <th>另開視窗</th>
                                        <th>列表順序</th>
                                        <th>狀態</th>
                                        <th>操作</th>
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

<div class="modal fade reorder_modal" id="reorder_modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Banner<small>排序</small></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover" id="reorder_table">
                    <thead>
                        <tr>
                            <th>列表順序</th>
                            <th>編號</th>
                            <th>名稱</th>
                            <th>桌機圖片</th>
                            <th>手機圖片</th>
                            <th>狀態</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning float-left" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-success float-right submit_btn" onclick="reorder_modal_sumbit();">確定</button>
            </div>
        </div>
    </div>
</div>
<?php require_once "_admin_post_js.php"; ?>
<script>
    var table = null;
    var reorder_table = null;
    document.title += "-Banner";
    $(function () {
        table = $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'order': [[6, 'asc'], [0, 'desc']],
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [2, 3, 4, 8]}],
            'sPaginationType': 'full_numbers',
            'pageLength': 100,
            'processing': true,
            'serverSide': true,
            'oLanguage': {'sUrl': "../plugins/datatables/dataTables.zh-Hant.json", },
            'ajax': {
                url: geturl(),
                type: 'POST',
                dataSrc: function (json) {
                    var return_data = new Array();
                    if (json.data != null) {
                        for (var i = 0; i < json.data.length; i++) {
                            var row = json.data[i];

                            var pic1url = "<img style='max-width:100px;' src='..//" + row.pic1url + "\' alt=\'" + row.pic1alt + "\'>";
                            if (row.pic1url.indexOf("http") == 0)
                                var pic1url = "<img style='max-width:100px;' src='" + row.pic1url + "\' alt=\'" + row.pic1alt + "\'>";

                            var pic2url = "<img style='max-width:100px;' src='..//" + row.pic2url + "\' alt=\'" + row.pic2alt + "\'>";
                            if (row.pic2url.indexOf("http") == 0)
                                var pic2url = "<img style='max-width:100px;' src='" + row.pic2url + "\' alt=\'" + row.pic2alt + "\'>";

                            var link = "";
                            if (row.link != "")
                            {
                                if (isAbsoluteURL(row.link))
                                    link = "<a class='btn btn-sm btn-brand' href='" + row.link + "' target='_blank'><span class='fas fa-link'></span></a>";
                                else
                                    link = "<a class='btn btn-sm btn-brand' href='<?= BASE_PATH ?>" + row.link + "' target='_blank'><span class='fas fa-link'></span></a>";
                            }

                            var blank = {};
                            if (row.link != "") {
                                GetBlankColorString(row.blank, blank);
                                blank = "<span class='badge bg-" + blank.color + "'>" + blank.string + "</span>";
                            } else
                                blank = "";

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                            var operate = "<div class='btn-group float-right'>";
                            operate += "<button type='button' class='btn btn-sm btn-primary' onclick='redir(\"banner_edit.php?edit_id=" + row.id + "\")'><span class='fas fa-pen-square'></span></button>";
                            operate += "<button type='button' class='btn btn-sm btn-danger' onclick='delete_alert(\"Banner\"," + row.id + ",\"" + row.name + "\",\"<?= WEBAPI_BANNER ?>\"); return false;'><span class='fas fa-trash-alt'></span></button>";
                            operate += "</div>";

                            return_data.push({
                                'id': row.id,
                                'name': row.name,
                                'pic1url': pic1url,
                                'pic2url': pic2url,
                                'link': link,
                                'blank': blank,
                                'list_order': row.list_order,
                                'status': status,
                                'operate': operate
                            })
                        }
                    }
                    return return_data;
                }
            },
            'columns': [
                {data: "id"},
                {data: "name"},
                {data: "pic1url"},
                {data: "pic2url"},
                {data: "link"},
                {data: "blank"},
                {data: "list_order"},
                {data: "status"},
                {data: "operate"},
            ]
        })
    });

    function geturl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_BANNER ?>";
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

    $('#reorder_modal').on('show.bs.modal', function (e) {
        if (reorder_table)
            return;
        reorder_table = $('#reorder_table').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'order': [[0, 'asc'], [1, 'desc']],
            'info': true,
            'autoWidth': false,
            'processing': true,
            'serverSide': false,
            'scrollY': '50vh',
            'scrollCollapse': true,
            'destroy': true,
            'oLanguage': {'sUrl': "../plugins/datatables/dataTables.zh-Hant.json", },
            'rowReorder': {
                dataSrc: 'list_order',
                selector: 'tr',
                snapX: 20,
            },
            'columnDefs': [
                {visible: false, orderable: true, className: 'reorder', targets: 0},
                {visible: true, orderable: false, className: 'reorder', targets: '_all'}
            ],
            'ajax': {
                url: reorder_table_geturl(),
                type: 'POST',
                dataSrc: function (json) {
                    var return_data = new Array();
                    if (json.data != null) {
                        for (var i = 0; i < json.data.length; i++) {
                            var row = json.data[i];
                            var list_order = i + 1;

                            var pic1url = "<img style='max-width:100px;' src='..//" + row.pic1url + "\' alt=\'" + row.pic1alt + "\'>";
                            if (row.pic1url.indexOf("http") == 0)
                                var pic1url = "<img style='max-width:100px;' src='" + row.pic1url + "\' alt=\'" + row.pic1alt + "\'>";

                            var pic2url = "<img style='max-width:100px;' src='../" + row.pic2url + "\' alt=\'" + row.pic2alt + "\'>";
                            if (row.pic2url.indexOf("http") == 0)
                                var pic2url = "<img style='max-width:100px;' src='" + row.pic2url + "\' alt=\'" + row.pic2alt + "\'>";

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                            return_data.push({
                                'list_order': list_order,
                                'id': row.id,
                                'name': row.name,
                                'pic1url': pic1url,
                                'pic2url': pic2url,
                                'status': status,
                            })
                        }
                    }
                    return return_data;
                }
            },
            'columns': [
                {data: "list_order"},
                {data: "id"},
                {data: "name"},
                {data: "pic1url"},
                {data: "pic2url"},
                {data: "status"},
            ]
        });
    });

    $('#reorder_modal').on('shown.bs.modal', function (e) {
        reorder_table.columns.adjust().draw();
    });

    function reorder_table_geturl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_BANNER ?>";
        var query_str = "1";
        query_str += " AND status='0'";
        if (query_str != "")
            url = url + "&query=" + encodeURIComponent(query_str);
        return url;
    }

    function reorder_modal_sumbit() {
        var ids = new Array();
        reorder_table.rows().every(function (rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            ids.push(data.id);
        });
        ids = ids.join(',');
        var jsondata = {ids: ids};
        var url = "banner_reorder_ajax.php";
        var result = new Object();
        if (AJAX(url, "POST", jsondata, result) === true) {
            var result = JSON.parse(result.data);
            if (result.result == true)
                success_brand_alert("Banner排序成功", "", "banner_list.php");
            else
                error_brand_alert("Banner排序失敗", result.msg);
        } else
            error_brand_alert("Banner排序失敗", result.msg);
    }
</script>
<?php require_once '_admin_foot.php'; ?>
