<?php
require_once '_head.php';

$g_page_index = (isset($g_page_index)) ? $g_page_index : 1;

//每頁資料筆數
$page_length = 20;

//查詢貨幣市場小百科資料筆數
$encyclopedia_count = null;
$url = WEBAPI_ENCYCLOPEDIA . "?count=true";
if (!empty($g_keyword)) {
    $querystring = "name like '%$g_keyword%'";
    $url = WEBAPI_ENCYCLOPEDIA . "?count=true&query=" . urlencode($querystring);
}
if (CallAPI('GET', $url, null, null, $resultMessage, $encyclopedia_count) != 200) {
    $encyclopedia_count = null;
}
$total_pages = max(ceil($encyclopedia_count / $page_length), 1);

if ($total_pages < $g_page_index)
    redir(BASE_PATH . "/encyclopedia");

//查詢貨幣市場小百科
$encyclopedias = null;
$url = WEBAPI_ENCYCLOPEDIA . "?count=false";
if (!empty($g_keyword)) {
    $querystring = "name like '%$g_keyword%'";
    $url = WEBAPI_ENCYCLOPEDIA . "?query=" . urlencode($querystring);
}
$url .= "&start=" . ($g_page_index - 1) * $page_length;
$url .= "&length=" . $page_length;
if (CallAPI('GET', $url, null, null, $resultMessage, $encyclopedias) != 200) {
    $encyclopedias = null;
}
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner " id="scene">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/financial_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/financial_414x160.png" alt="貨幣市場小百科" loading="eager">
        </picture>
    </div>
    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>金融情勢</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>
    <main class="pg">
        <div class="container">
            <div class="input_box">
                <input type="text" placeholder="請輸入關鍵字搜尋" class="input-group" id="keyword" value="<?= $g_keyword ?>">
                <div  class="linear_btn">
                    <a href="javascript:void(0)" id="search_btn">搜尋</a>
                </div>
            </div>
            <?php foreach (is_array($encyclopedias) ? $encyclopedias : array() as $item) { ?>
                <div class="card_module _collapse open">
                    <div class="title">
                        <h3><?= $item["name"] ?></h3>
                    </div>
                    <div class="content">
                        <?= $item["content"] ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($total_pages > 1) { ?>
                <?php $min_index = max($g_page_index - 2, 1); ?>
                <?php $max_index = min($g_page_index + 2, $total_pages); ?>
                <ul class="pgs_list">
                    <li><a href="<?= BASE_PATH ?>/encyclopedia/<?= max($g_page_index - 1, 1); ?>/<?= $g_keyword ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_left.png" alt="上一頁"></a></li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <?php if ($i == $min_index && $i > 2) { ?>
                            ...
                        <?php } ?>
                        <?php if ($i == 1 || ($i >= $min_index && $i <= $max_index) || $i == $total_pages) { ?>
                            <li class="<?= ($i == $g_page_index) ? "current" : "" ?>"><a href="<?= BASE_PATH ?>/encyclopedia/<?= $i ?>/<?= $g_keyword ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <?php if ($i == $max_index && $i < ($total_pages - 1)) { ?>
                            ...
                        <?php } ?>
                    <?php } ?>
                    <li><a href="<?= BASE_PATH ?>/encyclopedia/<?= min($g_page_index + 1, $total_pages); ?>/<?= $g_keyword ?>"><img src="<?= BASE_PATH ?>/src/img/icon/angle_right.png" alt="下一頁"></a></li>
                </ul>
            <?php } ?>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        // 開合內文（貨幣市場小百科）
        $(".card_module._collapse").on("click", ".title", function () {
            let contentMaxH = $(this).siblings(".content").css("max-height"),
                    contentChildrenH = $(this).siblings(".content").children().height()

            if (contentMaxH == "0px") {
                $(this).siblings(".content").css("max-height", contentChildrenH + 28);
            } else {
                $(this).siblings(".content").css("max-height", "0px");
            }

            $(this).parent().toggleClass("open")
        })
    })

    $("#search_btn").click(function () {
        var keyword = $("#keyword").val();
        location.pathname = '<?= BASE_PATH ?>/encyclopedia/1/' + keyword;
    })


</script>
<?php require_once '_foot.php'; ?>

