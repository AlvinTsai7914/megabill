<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

$connect = megabills_Connect();
$base_ndate = get_cm010_web_ndate($connect, "TWD");
//央行動態
$news_w = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_W, BREV_FLAG_N, $news_w);
//拆款行情
$news_x = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_X, BREV_FLAG_N, $news_x);
//匯市行情
$news_y = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_Y, BREV_FLAG_N, $news_y);
//債券行情
$news_z = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_Z, BREV_FLAG_N, $news_z);
megabills_Disconnect($connect);
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
    <?php if ($connect) { ?>
        <main class="pg market">
            <div class="container">
                <ul class="decor_lists__d_t_c">
                    <li>
                        <h3><span><?= empty($news_w["DATE"]) ? "" : NDateToYMDString($news_w["DATE"]) ?></span>央行動態</h3>
                        <?php foreach ((!empty($news_w["TEXT"]) && is_array($news_w["TEXT"])) ? $news_w["TEXT"] : array() as $item) { ?>
                            <p><?= $item ?></p>
                        <?php } ?>
                    </li>
                    <li>
                        <h3><span><?= empty($news_x["DATE"]) ? "" : NDateToYMDString($news_x["DATE"]) ?></span>拆款行情</h3>
                        <?php foreach ((!empty($news_x["TEXT"]) && is_array($news_x["TEXT"])) ? $news_x["TEXT"] : array() as $item) { ?>
                            <p><?= $item ?></p>
                        <?php } ?>
                    </li>
                    <li>
                        <h3><span><?= empty($news_y["DATE"]) ? "" : NDateToYMDString($news_y["DATE"]) ?></span>匯市行情</h3>
                        <?php foreach ((!empty($news_y["TEXT"]) && is_array($news_y["TEXT"])) ? $news_y["TEXT"] : array() as $item) { ?>
                            <p><?= $item ?></p>
                        <?php } ?>
                    </li>
                    <li>
                        <h3><span><?= empty($news_z["DATE"]) ? "" : NDateToYMDString($news_z["DATE"]) ?></span>債券行情</h3>
                        <?php foreach ((!empty($news_z["TEXT"]) && is_array($news_z["TEXT"])) ? $news_z["TEXT"] : array() as $item) { ?>
                            <p><?= $item ?></p>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </main>
    <?php } else { ?>
        <main class="pg">
            <div class="container">
                <div class="maintain">
                    <div class="maintain_content">
                        <img src="<?= BASE_PATH ?>/src/img/maintain.png" alt="">
                        <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                    </div>
                </div>
            </div>
        </main>
    <?php } ?>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>