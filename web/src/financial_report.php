<?php
require_once '_head.php';

//查詢財務報告類別
$financial_categorys = null;
$url = WEBAPI_FINANCIAL_CATEGORY;
if (CallAPI('GET', $url, null, null, $resultMessage, $financial_categorys) != 200) {
    $financial_categorys = null;
}

//查詢財務報告
$financials = null;
$querystring = "language_id=0";
$url = WEBAPI_FINANCIAL . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $financials) != 200) {
    $financials = null;
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
                <div class="select_box">
                    <select class="year_select" data-target="financial_report_m">
                        <?php foreach (is_array($financial_categorys) ? $financial_categorys : array() as $category) { ?>
                            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="tab_list__target_m" data-name="financial_report_m">
                    <?php foreach (is_array($financial_categorys) ? $financial_categorys : array() as $category) { ?>
                        <div class="" data-year="<?= $category["id"] ?>">
                            <h2 class="pg_sub_title"><?= $category["name"] ?></h2>
                            <ul class="decor_lists__t" >
                                <?php foreach (is_array($financials) ? $financials : array() as $item) { ?>
                                    <?php if ($category["id"] == $item["category_id"]) { ?>
                                        <li><a href="<?= BASE_PATH . $item["file1url"] ?>" download><?= $item["name"] ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="d-none d-md-flex">
                <div class="mr-4">
                    <div class="tab_list _v_collapse" data-target="financial_report">
                        <ul class="tab_list__wrapper">
                            <?php foreach (is_array($financial_categorys) ? $financial_categorys : array() as $category) { ?>
                                <li class="tab <?= ($category == $financial_categorys[0]) ? "active" : "" ?>" data-val="<?= $category["id"] ?>">
                                    <div class="hover_box">
                                        <div><?= $category["name"] ?></div>
                                    </div>
                                    <ul class="sub_tab_list">
                                        <?php foreach (is_array($financials) ? $financials : array() as $item) { ?>
                                            <?php if ($category["id"] == $item["category_id"]) { ?>
                                                <li class="sub_tab" data-src="<?= BASE_PATH . $item["file1url"] ?>"><div><?= $item["name"] ?></div></li>
                                            <?php } ?>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                            <div class="shift_box" style="height: 194px;"></div>
                        </ul>
                    </div>
                </div>
                <div class="tab_list__target" data-name="financial_report">
                    <div class="d-block">
                        <h2 class="pg_sub_title mb-3"></h2>
                        <div class="d-flex justify-content-between align-items-center mb-3 download_block">
                            <p class="">如果您無法預覽此檔，可直接點擊按鈕下載</p>
                            <a class="linear_btn" href="/pdf/text.pdf" download="/text.pdf">
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
        let tabTarget;                                                       //儲存當前互動tablist名稱
        let selectInput = $('.year_select').select2({width: "100%", minimumResultsForSearch: Infinity});  // 呼叫select2
        $(`.tab_list__target [data-val=0]`).fadeIn(700);
        $(`.tab_list__target_m`).children().first().fadeIn(700);

        // 開合頁籤
        let shiftHeightDefault = $(".tab_list._v_collapse .tab.active").height();
        $(".tab_list._v_collapse .shift_box").css("height", `${shiftHeightDefault}px`);

        // 桌機 選擇年度
        $(".tab_list._v_collapse").on("click", ".tab", function (e) {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(`.tab_list._v_collapse .shift_box`).css("height", `50`);
                $(`.tab_list._v_collapse .shift_box`).css("opacity", `0`);
            } else {
                let tabNum = $(this).attr("data-val"), //點擊的排序
                        tabTarget = $(".tab_list._v_collapse").attr("data-target"), //切換的目標
                        tabWrapperOffsetTop, //tablist離document高度
                        tabOffsetTop, //tablist子元素離document高度
                        shiftHeight, //裝飾元素高度
                        tapTop;                                                     //裝飾元素位置
                $(this).siblings(".active").removeClass("active");
                $(this).addClass("active");
                setTimeout(() => {
                    tabWrapperOffsetTop = $(this).parent().offset().top;  //tabList位於document位置
                    tabOffsetTop = $(this).offset().top;  //tab位於document位置
                    shiftHeight = $(this).height();
                    tapTop = tabOffsetTop - tabWrapperOffsetTop;
                    $(`.tab_list._v_collapse .shift_box`).css("top", `${tapTop}px`);
                    $(`.tab_list._v_collapse .shift_box`).css("height", `${shiftHeight}`);
                    $(`.tab_list._v_collapse .shift_box`).css("opacity", `1`);
                });
            }
        });
        // 20220525 Alvin 修改頁籤功能沒一併更動下載按鈕的問題
        // 桌機 選擇報告
        $(".tab_list._v_collapse").on("click", ".sub_tab", function (e) {
            e.stopPropagation();
            let src = $(this).attr("data-src"),
                    title = $(this).children().text();
            tabTarget = $(".tab_list._v_collapse").attr("data-target"),
                    newEmbed = `<embed class="pdf_viewer" src=${src}#page=1 width="100%" height="1200px" type="application/pdf">`;
            // 2022055 新增按鈕
            newBtn = `<a class="linear_btn" href=${src} download>
                                <p>下載文件</p>
                            </a>`;
            $(`[data-name=${tabTarget}] .pg_sub_title`).text(title)
            $("embed.pdf_viewer").remove();             //刪除現有viewer
            $(".embed_container").append(newEmbed)      //重新apend PDFviewer
            $(".linear_btn").remove();
            $(".download_block").append(newBtn)
        })

        // 移動裝置 select
        $(selectInput).on("change", function (e) {
            $(`.year_select option:selected`).each(function () {
                tabTarget = $(this).parent("select").attr("data-target")
                let tabYear = $(this).val()  //選中的排序數字 1~n
                $(`[data-name=${tabTarget}]`).children().hide()     //隱藏所有區塊
                $(`[data-name=${tabTarget}]`).children(`div[data-year=${tabYear}]`).fadeIn(700)   //顯示選中區塊
            })
        })
        // 20220525 Alvin 新增
        $(".tab_list._v_collapse .sub_tab").first().trigger("click")    //讀取網頁後觸發第一個頁籤，讀取按鈕data-src
    })
</script>
<?php require_once '_foot.php'; ?>