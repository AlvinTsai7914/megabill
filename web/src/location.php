<?php
require_once '_head.php';

//查詢服務據點
$locations = null;
$querystring = "language_id=0";
$url = WEBAPI_LOCATION . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $locations) != 200) {
    $locations = null;
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
    <main class="pg location">
        <div class="container">
            <div class="select_box d-md-none">
                <select class="location_select" data-target="news">
                    <?php foreach (is_array($locations) ? $locations : array() as $key => $item) { ?>
                        <option value="<?= $key ?>"><?= $item["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex">
                <div class="mr-4 d-none d-md-block ">
                    <div class="tab_list vertical" data-target="news">
                        <div class="tab_list__wrapper">
                            <?php foreach (is_array($locations) ? $locations : array() as $key => $item) { ?>
                                <div class="tab" data-val="<?= $key ?>">
                                    <div class="hover_box">
                                        <div><?= $item["name"] ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="shift_box"></div>
                        </div>
                    </div>
                </div>
                <div class="tab_list__target" data-name="news">
                    <?php foreach (is_array($locations) ? $locations : array() as $key => $item) { ?>
                        <div data-val="<?= $key ?>" class="d-show">
                            <div class="mx-0 mb-5">
                                <?= $item["content"] ?>
                            </div>
                            <?= $item["map_embed"] ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        $(".location iframe").attr("width", "100%");
        let tabTarget                                                       //儲存當前互動tablist名稱
        let selectInput = $('.location_select').select2({width: "100%", minimumResultsForSearch: Infinity});  // 呼叫select2
        $(`.tab_list__target [data-val=0]`).fadeIn(700)

        // 垂直頁籤功能
        $(".tab_list.vertical").on("click", ".tab", function (e) {
            let tabNum = $(this).attr("data-val")                           //抓取被點擊的值
            $(selectInput).val(`${tabNum}`).trigger("change");              //改變select值，觸發onchange(下方)
        })

        $(selectInput).on("change", function (e) {
            $(`.location_select option:selected`).each(function () {
                tabTarget = $(this).parent("select").attr("data-target")
                let tabNum = $(this).val()                                  //選中的排序數字 1~n
                let tabsLength = $(".tab_list.vertical .tab_list__wrapper").children(".tab").length;  //tablist子元素數量

                //「選中子元素排序位置」乘上「100/頁籤子元素總數量」，改變選中樣式的定位
                //例如總共四個子元素，點到第3個：
                //3*(100/4) == 3*25 == 75 >>>>> 選中樣式移至母元素75%高度位置
                $(`.tab_list.vertical .shift_box`).css("top", `${tabNum * (100 / tabsLength)}%`)

                $(`[data-name=${tabTarget}]`).children().hide()     //隱藏所有區塊
                $(`[data-name=${tabTarget}]`).children(`div[data-val=${tabNum}]`).fadeIn(700)   //顯示選中區塊
            })
        })
    })
</script>
<?php require_once '_foot.php'; ?>