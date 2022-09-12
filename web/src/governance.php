<?php
require_once '_head.php';

//查詢公司治理情形
$governances = null;
$url = WEBAPI_GOVERNANCE;
if (CallAPI('GET', $url, null, null, $resultMessage, $governances) != 200) {
    $governances = null;
}

//查詢公司治理規範
$norms = null;
$url = WEBAPI_NORM;
if (CallAPI('GET', $url, null, null, $resultMessage, $norms) != 200) {
    $norms = null;
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
    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>法定公開揭露</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="pg_sub_title">公司治理情形</h2>
                    <?php foreach (is_array($governances) ? $governances : array() as $item) { ?>
                        <?php if (empty($item["file1url"]) && empty($item["content"])) { ?>
                            <div class="card_module">
                                <div class="title">
                                    <h3><?= $item["name"] ?></h3>
                                </div>
                            </div>
                        <?php } else if (!empty($item["file1url"])) { ?>
                            <div class="card_module _download">
                                <a class="title" href="<?= BASE_PATH . $item["file1url"] ?>" download>
                                    <h3><?= $item["name"] ?></h3>
                                </a>
                            </div>
                        <?php } else if (!empty($item["content"])) { ?>
                            <div class="card_module _collapse _open">
                                <div class="title">
                                    <h3><?= $item["name"] ?></h3>
                                </div>
                                <div class="content">
                                    <h3><?= $item["content"] ?></h3>
                                </div>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <h2 class="pg_sub_title">公司治理規範</h2>
                    <?php foreach (is_array($norms) ? $norms : array() as $item) { ?>
                        <?php if (empty($item["file1url"]) && empty($item["content"])) { ?>
                            <div class="card_module">
                                <div class="title">
                                    <h3><?= $item["name"] ?></h3>
                                </div>
                            </div>
                        <?php } else if (!empty($item["file1url"])) { ?>
                            <div class="card_module _download">
                                <a class="title" href="<?= BASE_PATH . $item["file1url"] ?>" download>
                                    <h3><?= $item["name"] ?></h3>
                                </a>
                            </div>
                        <?php } else if (!empty($item["content"])) { ?>
                            <div class="card_module _collapse _open">
                                <div class="title">
                                    <h3><?= $item["name"] ?></h3>
                                </div>
                                <div class="content">
                                    <h3><?= $item["content"] ?></h3>
                                </div>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
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
        // 開合內文（貨幣市場小百科）
        $(".card_module._collapse").on("click", ".title", function () {
            let maxHeight = $(this).siblings(".content").children().height()
            if ($(this).siblings(".content").css("max-height") == "0px") {
                $(this).siblings(".content").css("max-height", maxHeight + 28);
                $(this).parent().addClass("_open")
            } else {
                $(this).siblings(".content").css("max-height", 0);
                $(this).parent().removeClass("_open")
            }
        })
    })
</script>
<?php require_once '_foot.php'; ?>