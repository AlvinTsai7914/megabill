<?php
require_once '_head.php';

$g_page_index = (isset($g_page_index)) ? $g_page_index : 1;

//每頁資料筆數
$page_length = 20;

//查詢政策及規範資料筆數
$policy_count = null;
$url = WEBAPI_POLICY . "?count=true";
if (CallAPI('GET', $url, null, null, $resultMessage, $policy_count) != 200) {
    $policy_count = null;
}
$total_pages = max(ceil($policy_count / $page_length), 1);

if ($total_pages < $g_page_index)
    redir(BASE_PATH . "/policies_norms_list");

//查詢政策及規範
$policies = null;
$url = WEBAPI_POLICY;
$url .= "&start=" . ($g_page_index - 1) * $page_length;
$url .= "&length=" . $page_length;
if (CallAPI('GET', $url, null, null, $resultMessage, $policies) != 200) {
    $policies = null;
}
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner" id="scene">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/development_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/development_414x160.png" alt="永續發展" loading="eager">
        </picture>
    </div>
    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>永續發展</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>
    <main class="pg company_list">
        <div class="container">
            <ul class="decor_lists__t">
                <?php foreach (is_array($policies) ? $policies : array() as $item) { ?>
                    <li><a href="<?= BASE_PATH ?>/policies_norms_detail/<?= $item["id"] ?>"><?= $item["name"] ?></a></li>
                <?php } ?>
            </ul>
            <?php if ($total_pages > 1) { ?>
                <?php $min_index = max($g_page_index - 2, 1); ?>
                <?php $max_index = min($g_page_index + 2, $total_pages); ?>
                <ul class="pgs_list">
                    <li><a href="<?= BASE_PATH ?>/policies_norms_list/<?= max($g_page_index - 1, 1); ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_left.png" alt="上一頁"></a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <?php if ($i == $min_index && $i > 2) { ?>
                            ...
                        <?php } ?>
                        <?php if ($i == 1 || ($i >= $min_index && $i <= $max_index) || $i == $total_pages) { ?>
                            <li class="<?= ($i == $g_page_index) ? "current" : "" ?>"><a href="<?= BASE_PATH ?>/policies_norms_list/<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <?php if ($i == $max_index && $i < ($total_pages - 1)) { ?>
                            ...
                        <?php } ?>
                    <?php } ?>
                    <li><a href="<?= BASE_PATH ?>/policies_norms_list/<?= min($g_page_index + 1, $total_pages); ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_right.png" alt="下一頁"></a></li>
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