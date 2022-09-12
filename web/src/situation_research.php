<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

$connect = megabills_Connect();
$base_ndate = get_cm010_web_ndate($connect, "TWD");
//票券評論
$news_i = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_I, BREV_FLAG_N, $news_i);
//債券評論
$news_d = null;
get_news_data($connect, $base_ndate, NEWS_TYPE_D, BREV_FLAG_N, $news_d);
megabills_Disconnect($connect);
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/financial_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/financial_414x160.png" alt="" loading="eager">
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
            <div class="row">
                <div class="col-lg-6">
                    <?= $sysinfo["observation_indicator"] ?>
                </div>
                <div class="col-lg-6">
                    <?= $sysinfo["impact_factor"] ?>
                </div>
            </div>
        </div>
        <?php if ($connect) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title">票券評論(<?= empty($news_i["DATE"]) ? "" : NDateToYMDString($news_i["DATE"]) ?>)</div>
                        <?php foreach ((!empty($news_i["TEXT"]) && is_array($news_i["TEXT"])) ? $news_i["TEXT"] : array() as $item) { ?>
                            <p class="text"><?= $item ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title">債券評論(<?= empty($news_d["DATE"]) ? "" : NDateToYMDString($news_d["DATE"]) ?>)</div>
                        <div class="title-sub">一、上週國內債券殖利率回顧</div>
                        <p class="text"><?= !isset($news_d["TEXT"][0]) ? "" : $news_d["TEXT"][0] ?></p>
                        <div class="title-sub">二、影響本週債券殖利率可能因素</div>
                        <p class="text" style="white-space: break-spaces;"><?= !isset($news_d["TEXT"][1]) ? "" : $news_d["TEXT"][1] ?></p>
                        <div class="title-sub">三、本週利率走勢展望</div>
                        <p class="text"><?= !isset($news_d["TEXT"][2]) ? "" : $news_d["TEXT"][2] ?></p>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title">票券評論</div>
                        <div class="maintain">
                            <div class="maintain_content">
                                <img src="<?= BASE_PATH ?>/src/img/maintain.png" alt="">
                                <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="title">債券評論</div>
                        <div class="maintain">
                            <div class="maintain_content">
                                <img src="<?= BASE_PATH ?>/src/img/maintain.png" alt="">
                                <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>