<?php
require_once '_head.php';

//查詢年報
$annuals = null;
$querystring = "language_id=0";
$url = WEBAPI_ANNUAL . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $annuals) != 200) {
    $annuals = null;
}
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/legal_disclaimers_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/legal_disclaimers_414x160.png" alt="法定公開揭露" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>法定公開揭露</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </div>
    </div>
    <main class="pg financial_report">
        <div class="container">
            <div class="d-block d-md-none">
                <div class="tab_list__target_m">
                    <ul class="decor_lists__t" >
                        <?php foreach (is_array($annuals) ? $annuals : array() as $item) { ?>
                            <li><a href="<?= BASE_PATH . $item["file1url"] ?>" download><?= $item["name"] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="d-none d-md-flex">
                <div class="mr-4">
                    <div class="mr-4 d-none d-md-block ">
                        <div class="tab_list vertical" data-target="annual_report">
                            <div class="tab_list__wrapper">
                                <?php foreach (is_array($annuals) ? $annuals : array() as $key => $item) { ?>
                                    <div class="tab" data-val="<?= $key ?>" data-src="<?= BASE_PATH . $item["file1url"] ?>">
                                        <div class="hover_box">
                                            <div><?= $item["name"] ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="shift_box"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab_list__target" data-name="annual_report">
                    <div class="d-block">
                        <h2 class="pg_sub_title mb-3"></h2>
                        <div class="d-flex justify-content-between align-items-center mb-3 download_block">
                            <p class="">如果您無法預覽此檔，可直接點擊按鈕下載</p>
                            <a class="linear_btn _download" href="" download>
                                <p>下載文件</p>
                            </a>
                        </div>
                        <div class="container embed_container p-0">
                            <embed class="pdf_viewer" src="" width="100%" height="1200px" type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        let tabTarget                                                      //儲存當前互動tablist名稱
        $(`.tab_list__target [data-val=0]`).fadeIn(700)

        // 桌機 選擇年度
        $(".tab_list.vertical").on("click", ".tab", function (e) {
            let tabTarget = $(".tab_list.vertical").attr("data-target"), //切換的目標
                    tabNum = $(this).attr("data-val"), //點擊的排序
                    tabLength = $(this).parent().children(".tab").length, //tab總數
                    shiftTop = tabNum / tabLength * 100, //計算shift_box位置
                    src = $(this).attr("data-src"),
                    title = $(this).children().text(),
                    newEmbed = `<embed class="pdf_viewer" src=${src}#page=1 width="100%" height="1200px" type="application/pdf">`,
                    newBtn = `<a class="linear_btn _download" href="${src}" download>
                                <p>下載文件</p>
                            </a>`



            // 頁籤切換
            $(this).siblings(".active").removeClass("active")
            $(this).addClass("active");
            $(".shift_box").css("top", `${shiftTop}%`)

            // append pdf
            $(`[data-name=${tabTarget}] .pg_sub_title`).text(title)
            $("embed.pdf_viewer").remove();
            $(".embed_container").append(newEmbed)
            $(".linear_btn").remove();
            $(".download_block").append(newBtn)
        })

        // 20220525 Alvin 新增
        $(".tab_list.vertical .tab").first().trigger("click")    //讀取網頁後觸發第一個頁籤，讀取按鈕data-src
    })
</script>
<?php require_once '_foot.php'; ?>