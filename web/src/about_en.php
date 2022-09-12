<?php
require_once '_head_en.php';

//查詢服務據點
$locations = null;
$querystring = "language_id=1";
$url = WEBAPI_LOCATION . "?query=" . urlencode($querystring);
if (CallAPI('GET', $url, null, null, $resultMessage, $locations) != 200) {
    $locations = null;
}
?>
<div class="wrapper">
    <?php require_once '_header_en.php'; ?>
    <div class="pg_banner">
        <h1><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/about_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/about_414x160.png" alt="About Us" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li>Home</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </div>
    </div>

    <main class="pg">
        <?= $sysinfo["about_en"] ?>
        <div class="container">
            <h2 class="pg_sub_title mt-5">Contact Us</h2>
            <div class="col-5 col-md-3 w-100 bg-white p-0 mr-0 ml-auto">
                <select class="location_select" data-target="location">
                    <?php foreach (is_array($locations) ? $locations : array() as $key => $item) { ?>
                        <option value="<?= $key ?>"><?= $item["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div data-name="location">
            <?php foreach (is_array($locations) ? $locations : array() as $key => $item) { ?>
                <div class="container tab_content" data-val="<?= $key ?>">

                    <?= $item["content"] ?>
                    <div class="col-12 col-md-8 mx-auto mt-5">
                        <?= $item["map_embed"] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
    <?php require_once '_footer_en.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        let selectInput = $('.location_select').select2({width: "100%", minimumResultsForSearch: Infinity});
        $("iframe").attr("width", "100%")

        // 20220525 新增select切換功能
        $(selectInput).on("change", function (e) {
            $(`.location_select option:selected`).each(function () {
                let tabTarget = $(this).parent("select").attr("data-target")
                tabVal = $(this).val()  //選中的排序數字 1~n
                console.log(tabTarget, tabVal)
                $(`[data-name=${tabTarget}]`).children(".tab_content").hide()     //隱藏所有區塊
                $(`[data-name=${tabTarget}]`).children(`div[data-val=${tabVal}]`).fadeIn(700)   //顯示選中區塊
            })
        })

        // 20220525 讀取網頁後預設顯示區塊
        let defaultVal = $('.location_select').children().first().attr("value")
        selectInput.val(defaultVal).trigger("change");
    })
</script>
<?php require_once '_foot.php'; ?>