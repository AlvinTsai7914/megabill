<?php
require_once '_admin_head.php';

if (GetPreviousPageName() != "log_list")
    redir("log_list.php");

$log_id = request_num('edit_id');
if ($log_id == '')
    redir("log_list.php");

$resultMessage = "";
$logs = null;
if ($log_id != 0) {
    $url = WEBAPI_LOG . "/" . $log_id;
    if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $logs) != 200 || count($logs) != 1)
        redir("log_list.php");
} else
    redir("log_list.php");

$id = $logs[0]['id'];
$user_id = $logs[0]['user_id'];
$user_account = $logs[0]['user_account'];
$user_name = $logs[0]['user_name'];
$ip = $logs[0]['ip'];
$program_id = $logs[0]['program_id'];
$program_name = $logs[0]['program_name'];
$verb = $logs[0]['verb'];
$args = $logs[0]['args'];
$file = $logs[0]['file'];
$resultCode = $logs[0]['resultCode'];
$resultMessage = $logs[0]['resultMessage'];
$resultData = $logs[0]['resultData'];
$c_time = $logs[0]['c_time'];
$sub_title = '詳細資料';
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>操作紀錄
                            <small><?= $sub_title ?></small>
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
                            <div class="row mb-2">
                                <label for="user_account" class="col-md-1">使用者帳號</label>
                                <div class="col-md-5">
                                    <input type="text" id="user_account" name="user_account" class="form-control" value="<?= $user_account ?>" readonly>
                                </div>
                                <label for="user_name" class="col-md-1">使用者姓名</label>
                                <div class="col-md-5">
                                    <input type="text" id="user_name" name="user_name" class="form-control" value="<?= $user_name ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="ip" class="col-md-1">IP位址</label>
                                <div class="col-md-5">
                                    <input type="text" id="ip" name="ip" class="form-control" value="<?= $ip ?>" readonly>
                                </div>
                                <label for="program_name" class="col-md-1">程式名稱</label>
                                <div class="col-md-5">
                                    <input type="text" id="program_name" name="program_name" class="form-control" value="<?= $program_name ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="verb" class="col-md-1">動作</label>
                                <div class="col-md-5">
                                    <input type="text" id="verb" name="verb" class="form-control" value="<?= $verb ?>" readonly>
                                </div>
                                <label for="c_time" class="col-md-1">操作時間</label>
                                <div class="col-md-5">
                                    <input type="text" id="c_time" name="c_time" class="form-control" value="<?= $c_time ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="args" class="col-md-1">參數</label>
                                <div class="col-md-11">
                                    <textarea id="args" name="args" class="form-control" rows="3" readonly><?= $args ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="file" class="col-md-1">檔案</label>
                                <div class="col-md-11">
                                    <textarea id="file" name="file" class="form-control" rows="3" readonly><?= $file ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="resultCode" class="col-md-1">回傳代碼</label>
                                <div class="col-md-5">
                                    <input type="text" id="resultCode" name="resultCode" class="form-control" value="<?= $resultCode ?>" readonly>
                                </div>
                                <label for="resultMessage" class="col-md-1">回傳訊息</label>
                                <div class="col-md-5">
                                    <input type="text" id="resultMessage" name="resultMessage" class="form-control" value="<?= $resultMessage ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="resultData" class="col-md-1">回傳資料</label>
                                <div class="col-md-11">
                                    <textarea id="resultData" name="resultData" class="form-control" rows="10" readonly><?= $resultData ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-secondary float-left" onclick="javascript:history.go(-1)">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once '_admin_footer.php'; ?>
</div>
<?php require_once "_admin_post_js.php"; ?>
<?php require_once '_admin_foot.php'; ?>