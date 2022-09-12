<?php
require_once '_head.php';

//查詢職缺訊息
$vacancys = null;
$querystring = "(('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_VACANCY . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $vacancys) != 200) {
    $vacancys = null;
}

//查詢薪酬福利
$benefitss = null;
$url = WEBAPI_BENEFITS;
if (CallAPI('GET', $url, null, null, $resultMessage, $benefitss) != 200) {
    $benefitss = null;
}
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/about_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/about_414x160.png" alt="關於我們" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>關於我們</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </div>
    </div>
    <main class="pg recruiting">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>職缺訊息</h2>
                    <div class="recruiting_info">
                        <?php foreach (is_array($vacancys) ? $vacancys : array() as $item) { ?>
                            <h3><?= $item["name"] ?></h3>
                            <p><?= $item["content"] ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="card_list">
                        <h2>薪酬福利</h2>
                        <div class="row no-gutters" >
                            <?php foreach (is_array($benefitss) ? $benefitss : array() as $item) { ?>
                                <div class="col-6">
                                    <div class="card">
                                        <img src="<?= BASE_PATH . $item["pic1url"] ?>" alt="<?= $item["pic1alt"] ?>">
                                        <h3><?= $item["name"] ?></h3>
                                        <p><?= $item["content"] ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recruiting_bottom_banner row no-gutters">
            <div class="img_box col-12 col-xl-7">
                <img src="<?= BASE_PATH ?>/src/img/recruiting.png" alt="人才招募" >
            </div>
            <div class="col-12 col-xl-5">
                <div class="text_box">
                    <h2>在兆票，成就你精彩的未來</h2>
                    <p>歡迎有熱忱的你加入我們<br>請聯絡此信箱：<a href="mailto:hr@megabills.com.tw">hr@megabills.com.tw</a></p>
                </div>
            </div>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>