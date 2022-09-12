<?php
require_once '_head.php';

$g_page_index = (isset($g_page_index)) ? $g_page_index : 1;

//每頁資料筆數
$page_length = 20;

//查詢政策宣導資料筆數
$propaganda_count = null;
$querystring = "(('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_PROPAGANDA . "?count=true&query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $propaganda_count) != 200) {
    $propaganda_count = null;
}
$total_pages = max(ceil($propaganda_count / $page_length), 1);

if ($total_pages < $g_page_index)
    redir(BASE_PATH . "/propaganda_list");

//查詢公司訊息
$propagandas = null;
$querystring = "(('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_PROPAGANDA . "?query=" . urlencode($querystring);
$url .= "&start=" . ($g_page_index - 1) * $page_length;
$url .= "&length=" . $page_length;
if (CallAPI('GET', $url, null, null, $resultMessage, $propagandas) != 200) {
    $propagandas = null;
}
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/news_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/news_414x160.png" alt="動態消息" loading="eager">
        </picture>
    </div>
    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>動態消息</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>
    <main class="pg porpaganda">
        <div class="container">
            <ul class="decor_lists__d_t">
                <?php foreach (is_array($propagandas) ? $propagandas : array() as $item) { ?>
                    <li><span><?= GetDateString($item["release_date"]) ?></span><a href="<?= BASE_PATH ?>/propaganda_detail/<?= $item["id"] ?>"><?= $item["name"] ?></a></li>
                <?php } ?>
            </ul>
            <?php if ($total_pages > 1) { ?>
                <?php $min_index = max($g_page_index - 2, 1); ?>
                <?php $max_index = min($g_page_index + 2, $total_pages); ?>
                <ul class="pgs_list">
                    <li><a href="<?= BASE_PATH ?>/propaganda_list/<?= max($g_page_index - 1, 1); ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_left.png" alt="上一頁"></a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <?php if ($i == $min_index && $i > 2) { ?>
                            ...
                        <?php } ?>
                        <?php if ($i == 1 || ($i >= $min_index && $i <= $max_index) || $i == $total_pages) { ?>
                            <li class="<?= ($i == $g_page_index) ? "current" : "" ?>"><a href="<?= BASE_PATH ?>/propaganda_list/<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <?php if ($i == $max_index && $i < ($total_pages - 1)) { ?>
                            ...
                        <?php } ?>
                    <?php } ?>
                    <li><a href="<?= BASE_PATH ?>/propaganda_list/<?= min($g_page_index + 1, $total_pages); ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_right.png" alt="下一頁"></a></li>
                </ul>
            <?php } ?>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>