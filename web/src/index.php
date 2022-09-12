<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

//查詢Banner
$banners = null;
$url = WEBAPI_BANNER;
if (CallAPI('GET', $url, null, null, $resultMessage, $banners) != 200) {
    $banners = null;
}

//查詢公司訊息
$companys = null;
$querystring = "homepage_show=1" . " AND (('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_COMPANY . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $companys) != 200) {
    $companys = null;
}

//查詢政策宣導
$propagandas = null;
$querystring = "homepage_show=1" . " AND (('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_PROPAGANDA . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $propagandas) != 200) {
    $propagandas = null;
}

//查詢友善連結
$linkss = null;
$querystring = "homepage_show=1" . " AND (('" . $today . "' between start_date and end_date) OR ( start_date='0000-00-00 00:00:00' AND end_date='0000-00-00 00:00:00'))";
$url = WEBAPI_LINKS . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $linkss) != 200) {
    $linkss = null;
}

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
    <main>
        <?php if (is_array($banners) && count($banners) > 0) { ?>
            <div class="hero_banner">
                <?php foreach ($banners as $item) { ?>
                    <a class="img_box" <?= (!empty($item["link"])) ? "href='" . $item["link"] . "'" : "" ?> <?= ($item["blank"]) ? "target='_blank'" : "" ?>>
                        <img class="d-none d-md-block" src="<?= BASE_PATH . $item["pic1url"] ?>" alt="<?= $item["pic1alt"] ?>">
                        <img class="d-md-none" src="<?= BASE_PATH . $item["pic2url"] ?>" alt="<?= $item["pic2alt"] ?>">
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
        <section class="current_event">
            <div class="container">
                <h1 class="pg_title">動態消息</h1>
                <div class="tab_list horizon" data-target="news">
                    <div class="tab_list__wrapper">
                        <div class="tab" data-num="0">
                            <div class="hover_box">
                                <div>市場行情</div>
                            </div>
                        </div>
                        <div class="tab" data-num="1">
                            <div class="hover_box">
                                <div>公司訊息</div>
                            </div>
                        </div>
                        <div class="tab" data-num="2">
                            <div class="hover_box">
                                <div>政策宣導</div>
                            </div>
                        </div>
                        <div class="tab" data-num="3">
                            <div class="hover_box">
                                <div>友善連結</div>
                            </div>
                        </div>
                        <div class="shift_box"></div>
                    </div>
                </div>
                <div class="tab_list__target" data-name="news">
                    <?php if ($connect) { ?>
                        <div data-num="0" style="display: block;">
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
                            <div class="d-flex justify-content-end"  id="related_web">
                                <div  class="linear_btn -s">
                                    <a href="/market">查看更多</a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div data-num="0" style="display: block;">
                            <div class="maintain">
                                <div class="maintain_content">
                                    <img src="<?= BASE_PATH ?>/src/img/maintain.png" alt="">
                                    <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div data-num="1">
                        <ul class="decor_lists__d_t">
                            <?php foreach (is_array($companys) ? $companys : array() as $item) { ?>
                                <li><span><?= GetDateString($item["release_date"]) ?></span><a href="<?= BASE_PATH ?>/news_detail/<?= $item["id"] ?>"><?= $item["name"] ?></a></li>
                            <?php } ?>
                        </ul>
                        <div class="d-flex justify-content-end">
                            <div  class="linear_btn -s">
                                <a href="<?= BASE_PATH ?>/news_list">查看更多</a>
                            </div>
                        </div>
                    </div>
                    <div data-num="2">
                        <ul class="decor_lists__d_t">
                            <?php foreach (is_array($propagandas) ? $propagandas : array() as $item) { ?>
                                <li><span><?= GetDateString($item["release_date"]) ?></span><a href="<?= BASE_PATH ?>/propaganda_detail/<?= $item["id"] ?>"><?= $item["name"] ?></a></li>
                            <?php } ?>
                        </ul>
                        <div class="d-flex justify-content-end">
                            <div  class="linear_btn -s">
                                <a href="<?= BASE_PATH ?>/propaganda_list">查看更多</a>
                            </div>
                        </div>
                    </div>
                    <div data-num="3">
                        <ul class="decor_lists__t _blank row m-0">
                            <?php foreach (is_array($linkss) ? $linkss : array() as $item) { ?>
                                <li class="col-md-6"><div><a <?= (!empty($item["link"])) ? "href='" . $item["link"] . "'" : "" ?> <?= ($item["blank"]) ? "target='_blank'" : "" ?>><?= $item["name"] ?></a></div></li>
                            <?php } ?>
                        </ul>
                        <div class="d-flex justify-content-end">
                            <div  class="linear_btn -s" >
                                <a href="<?= BASE_PATH ?>/links">查看更多</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="related_web" >
            <div class="container">
                <h1 class="pg_title">資訊網連結</h1>
                <div class="row">
                    <div class="col-xl-10 mb-2 mb-lg-0">
                        <h3>政府與周邊機構</h3>
                        <div class="row">
                            <div class="col-6 col-lg-2">
                                <a href="https://www.mof.gov.tw/" target="_blank">財政部</a>
                                <a href="https://www.moea.gov.tw/" target="_blank">經濟部</a>
                                <a href="https://www.twse.com.tw/" target="_blank">證交所</a>
                                <a href="https://www.cbc.gov.tw/tw/" target="_blank">中央銀行</a>
                            </div>
                            <div class="col-6 col-lg-3 m_right">
                                <a href="https://www.dgbas.gov.tw/" target="_blank">行政院主計處</a>
                                <a href="https://www.tpex.org.tw/" target="_blank">櫃檯買賣中心</a>
                                <a href="https://www.banking.gov.tw/" target="_blank">金管會銀行局</a>
                                <a href="https://www.sfb.gov.tw/" target="_blank">金管會證期局</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="https://www.cdic.gov.tw/" target="_blank">中央存保公司</a>
                                <a href="https://www.ndc.gov.tw/" target="_blank">國家發展委員會</a>
                                <a href="https://mops.twse.com.tw/" target="_blank">公開資訊觀測站</a>
                                <a href="https://www.twse.com.tw/" target="_blank">台灣證券交易所</a>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <a href="https://www.tdcc.com.tw/" target="_blank">台灣集中保管結算所</a>
                                <a href="https://www.fsc.gov.tw/" target="_blank">金融監督管理委員會</a>
                                <a href="https://www.amlo.moj.gov.tw/" target="_blank">行政院洗錢防制辦公室</a>
                                <a href="https://web.customs.gov.tw/" target="_blank">財政部關務署洗錢防制專區</a>
                                <a href="https://www.foi.org.tw/" target="_blank">財團法人金融消費評議中心</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <h3>研究單位</h3>
                        <div>
                            <a href="https://www.sinica.edu.tw/" target="_blank">中央研究院</a>
                            <a href="https://www.tabf.org.tw/" target="_blank">台灣金融研訓院</a>
                            <a href="https://www.tier.org.tw/" target="_blank">台灣經濟研究院</a>
                            <a href="https://www.cier.edu.tw/" target="_blank">中華經濟研究院</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse_btn"></div>
        </section>
        <section class="lower_banner">
            <picture>
                <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/footer_banner.png" >
                <img src="<?= BASE_PATH ?>/src/img/banner/footer_banner_m.png" alt="<?= $sysinfo["name"] ?>" loading="eager">
            </picture>
        </section>
    </main>
    <?php require_once '_footer.php'; ?>
</div>

<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        $('.hero_banner').slick({
            arrows: true,
            autoplay: true,
            autoplaySpeed: 10000,
        });
        // 水平頁籤
        $(".tab_list.horizon").on("click", ".tab", function (e) {
            let tabNum = $(this).attr("data-num")   //目標索引 0 1 2 .....
            let tabsLength = $(".tab_list.horizon .tab_list__wrapper").children(".tab").length;  //tablist子元素數量-裝飾shiftbox
            let tabTarget = $(".tab_list.horizon").attr("data-target")  //頁籤總數量
            $(`.tab_list.horizon .shift_box`).css("left", `${tabNum * (100 / tabsLength)}%`)    //索引*(100/頁籤數量) == 目標位置
            $(`[data-name=${tabTarget}]`).children().hide()
            $(`[data-name=${tabTarget}]`).children(`div[data-num=${tabNum}]`).fadeIn(700)
        })

        $(".collapse_btn").on("click", function () {
            $(this).parent().toggleClass("active")
        })
        if (window.location.hash == "#related_web") {
            $(".related_web").addClass("active")
        }
    })
</script>
<?php require_once '_foot.php'; ?>