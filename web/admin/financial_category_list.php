<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

$q_name = request_str("q_name");
$q_status = trim(request_str("q_status"));

//查詢財務報告類別
$financial_categorys = null;
if (CallAPI('GET', WEBAPI_FINANCIAL_CATEGORY, getSession("USER_ACCESSTOKEN"), null, $resultMessage, $financial_categorys) != 200)
    $financial_categorys = null;
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>財務報告類別
                            <small>列表</small>
                            <button type="button" class="btn btn-sm btn-brand float-right" onclick="location.href = 'financial_category_edit.php?edit_id=0'"><span class="fas fa-plus"></span></button>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="query_form" id="query_form" action="financial_category_list.php">
                            <div class="card-body">
                                <div class="row">
                                    <label for="q_name" class="col-md-1">類別名稱</label>
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
                                        <th>類別名稱</th>
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
                <h4 class="modal-title">財務報告類別<small>排序</small></h4>
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
                            <th>類別名稱</th>
                            <th>狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-warning float-left" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-sm btn-success float-right submit_btn" onclick="reorder_modal_sumbit();">確定</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade reorder_modal" id="reorder_financial_modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">財務報告<small>排序</small></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="reorder_category_id" class="col-md-1">類別</label>
                    <div class="col-md-11">
                        <select id="reorder_category_id" name="reorder_category_id" class="form-control select2" style="width: 100%">
                            <?php foreach (is_array($financial_categorys) ? $financial_categorys : array() as $item) { ?>
                                <option  value="<?= $item["id"] ?>"><?= $item["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <table class="table table-bordered table-hover" id="reorder_financial_table">
                    <thead>
                        <tr>
                            <th>列表順序</th>
                            <th>編號</th>
                            <th>標題</th>
                            <th>狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-sm btn-warning float-left" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-sm btn-success float-right submit_btn" onclick="reorder_financial_modal_sumbit();">確定</button>
            </div>
        </div>
    </div>
</div>
<?php require_once "_admin_post_js.php"; ?>
<script>
    var table = null;
    var subTable_row = null;
    var reorder_table = null;
    var reorder_financial_table = null;
    document.title += "-財務報告類別";
    $(function () {
        table = $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'order': [[2, 'asc'], [0, 'desc']],
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [4]}],
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

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                            var operate = "<div class='btn-group float-right'>";
                            operate += "<button type='button' class='btn btn-sm btn-warning sub-table' data-id='" + row.id + "'><span class='fas fa-arrow-circle-down'></span></button>";
                            operate += "<button type='button' class='btn btn-sm btn-primary' onclick='redir(\"financial_category_edit.php?edit_id=" + row.id + "\")'><span class='fas fa-pen-square'></span></button>";
                            operate += "<button type='button' class='btn btn-sm btn-danger' onclick='delete_alert(\"財務報告類別\"," + row.id + ",\"" + row.name + "\",\"<?= WEBAPI_FINANCIAL_CATEGORY ?>\"); return false;'><span class='fas fa-trash-alt'></span></button>";
                            operate += "</div>";

                            return_data.push({
                                'id': row.id,
                                'name': row.name,
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
                {data: "list_order"},
                {data: "status"},
                {data: "operate"},
            ]
        })
    });

    function geturl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_FINANCIAL_CATEGORY ?>";
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

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                            return_data.push({
                                'list_order': list_order,
                                'id': row.id,
                                'name': row.name,
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
                {data: "status"},
            ]
        });
    });

    $('#reorder_modal').on('shown.bs.modal', function (e) {
        reorder_table.columns.adjust().draw();
    });

    function reorder_table_geturl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_FINANCIAL_CATEGORY ?>";
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
        var url = "financial_category_reorder_ajax.php";
        var result = new Object();
        if (AJAX(url, "POST", jsondata, result) === true) {
            var result = JSON.parse(result.data);
            if (result.result == true)
                success_brand_alert("財務報告類別排序成功", "", "financial_category_list.php");
            else
                error_brand_alert("財務報告類別排序失敗", result.msg);
        } else
            error_brand_alert("財務報告類別排序失敗", result.msg);
    }

    $(document).off("click", ".sub-table").on("click", ".sub-table", function (e) {
        var tr = $(this).closest('tr');
        var category_id = $(this).data("id");
        var row = table.row(tr);
        if (row.child.isShown()) {
            row.child.hide();
        } else {
            if (subTable_row)
            {
                subTable_row.child.hide();
                subTable_row.child.remove();
            }
            var html = "<div class='row mb-2'><div class='col-sm-12'><h5>財務報告<small>列表</small>" +
                    "<div class='btn-group float-right'>" +
                    "<button type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#reorder_financial_modal' data-category_id='" + category_id + "'><span class='fas fa-sort-numeric-down'></span></button>" +
                    "<button type='button' class='btn btn-sm btn-brand' onclick='location.href=\"financial_edit.php?category_id=" + category_id + "&edit_id=0\"'><span class='fas fa-plus'></span></button>" +
                    "</div></h5></div></div>";
            html += "<table style='width: 100%' class='table table-striped table-bordered hover' id='subTable'>" +
                    "<thead>" +
                    "<tr'>" +
                    "<th>編號</th>" +
                    "<th>標題</th>" +
                    "<th>檔案</th>" +
                    "<th>列表順序</th>" +
                    "<th>狀態</th>" +
                    "<th>操作</th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody>" +
                    "</tbody>" +
                    "</table>";
            subTable_row = row;
            row.child(html).show();
            subTable = $('#subTable').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': false,
                'ordering': true,
                'order': [[3, 'asc'], [0, 'desc']],
                'info': true,
                'autoWidth': true,
                'aoColumnDefs': [{'bSortable': false, 'aTargets': [2, 5]}],
                'scrollX': true,
                'scrollCollapse': true,
                'processing': true,
                'serverSide': true,
                'oLanguage': {'sUrl': "../plugins/datatables/dataTables.zh-Hant.json", },
                'ajax': {
                    url: sub_table_geturl(category_id),
                    type: 'POST',
                    dataSrc: function (json) {
                        var return_data = new Array();
                        if (json.data !== null) {
                            for (var i = 0; i < json.data.length; i++) {
                                var row = json.data[i];

                                var file1url = "";
                                if (row.file1url != "")
                                {
                                    if (isAbsoluteURL(row.file1url))
                                        file1url = "<a class='btn btn-sm btn-brand' href='" + row.file1url + "' target='_blank'><span class='fas fa-file1url'></span></a>";
                                    else
                                        file1url = "<a class='btn btn-sm btn-brand' href='<?= BASE_PATH ?>" + row.file1url + "' target='_blank'><span class='fas fa-link'></span></a>";
                                }

                                var status = {};
                                GetStatusColorString(row.status, status);
                                status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                                var operate = "<div class='btn-group float-right'>";
                                operate += "<button type='button' class='btn btn-sm btn-primary' onclick='location.href=\"financial_edit.php?edit_id=" + row.id + "\"\'><span class='fas fa-pen-square'></span></button>";
                                operate += "<button type='button' class='btn btn-sm btn-danger' onclick='delete_alert(\"財務報告\"," + row.id + ",\"" + row.name + "\",\"<?= WEBAPI_FINANCIAL ?>\"); return false;'><span class='fas fa-trash-alt'></span></button>";
                                operate += "</div>";

                                return_data.push({
                                    'id': row.id,
                                    'name': row.name,
                                    'file1url': file1url,
                                    'list_order': row.list_order,
                                    'status': status,
                                    'operate': operate
                                });
                            }
                        }
                        return return_data;
                    }
                },
                columns: [
                    {data: "id"},
                    {data: "name"},
                    {data: "file1url"},
                    {data: "list_order"},
                    {data: "status"},
                    {data: "operate"}
                ]
            });
        }
    });

    function sub_table_geturl(category_id) {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_FINANCIAL ?>";
        var query_str = " AND category_id='" + category_id + "'";
        query_str += " AND language_id='0'";
        url = url + "&query=" + encodeURIComponent(query_str.substr(5));
        return url;
    }

    $('#reorder_financial_modal').on('show.bs.modal', function (e) {
        var category_id = $(e.relatedTarget).data('category_id');
        $("#reorder_category_id").val(category_id).trigger('change');
        reorder_financial_table = $('#reorder_financial_table').DataTable({
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
                url: reorder_financial_table_geturl(),
                type: 'POST',
                dataSrc: function (json) {
                    var return_data = new Array();
                    if (json.data != null) {
                        for (var i = 0; i < json.data.length; i++) {
                            var row = json.data[i];
                            var list_order = i + 1;

                            var status = {};
                            GetStatusColorString(row.status, status);
                            status = "<span class='badge bg-" + status.color + "'>" + status.string + "</span>";

                            return_data.push({
                                'list_order': list_order,
                                'id': row.id,
                                'name': row.name,
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
                {data: "status"},
            ]
        });
    });

    $('#reorder_financial_modal').on('shown.bs.modal', function (e) {
        reorder_financial_table.columns.adjust().draw();
    });

    $('#reorder_category_id').change(function (e) {
        if (reorder_financial_table)
            reorder_financial_table.ajax.url(reorder_financial_table_geturl()).load();
    });

    function reorder_financial_table_geturl()
    {
        var category_id = $("#reorder_category_id").val();
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_FINANCIAL ?>";
        var query_str = "1";
        query_str += " AND category_id=" + category_id;
        query_str += " AND language_id='0'";
        query_str += " AND status='0'";
        if (query_str != "")
            url = url + "&query=" + encodeURIComponent(query_str);
        return url;
    }

    function reorder_financial_modal_sumbit() {
        var category_id = $("#reorder_category_id").val();
        var ids = new Array();
        reorder_financial_table.rows().every(function (rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            ids.push(data.id);
        });
        ids = ids.join(',');
        var jsondata = {category_id: category_id, language_id: '0', ids: ids};
        var url = "financial_reorder_ajax.php";
        var result = new Object();
        if (AJAX(url, "POST", jsondata, result) === true) {
            var result = JSON.parse(result.data);
            if (result.result == true) {
                success_brand_alert("財務報告排序成功", "", "");
                $('#reorder_financial_modal').modal('hide');
                subTable.ajax.url(sub_table_geturl(category_id)).load();
            } else
                error_brand_alert("財務報告排序失敗", result.msg);
        } else
            error_brand_alert("財務報告排序失敗", result.msg);
    }
</script>
<?php require_once '_admin_foot.php'; ?>
