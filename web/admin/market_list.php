<?php
require_once '_admin_head.php';

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
                        <h1>市場行情
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
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>編號</th>
                                        <th>標題</th>
                                        <th>日期</th>
                                        <th>簡介</th>
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

<?php require_once "_admin_post_js.php"; ?>
<script>
    var table = null;
    var reorder_table = null;
    document.title += "-市場行情";
    $(function () {
        table = $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'order': [[0, 'asc']],
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'aoColumnDefs': [{'bSortable': false, 'aTargets': [3, 4]}],
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

                            var operate = "<div class='btn-group float-right'>";
                            operate += "<button type='button' class='btn btn-sm btn-primary' onclick='redir(\"market_edit.php?edit_id=" + row.id + "\")'><span class='fas fa-pen-square'></span></button>";
                            operate += "</div>";

                            return_data.push({
                                'id': row.id,
                                'name': row.name,
                                'release_date': row.release_date,
                                'content': row.content,
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
                {data: "release_date"},
                {data: "content"},
                {data: "operate"},
            ]
        })
    });

    function geturl()
    {
        var url = "_admin_list_ajax.php?api=<?= WEBAPI_MARKET ?>";
        return url;
    }
</script>
<?php require_once '_admin_foot.php'; ?>
