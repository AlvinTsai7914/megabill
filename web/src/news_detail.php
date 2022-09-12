<?php
require_once 'news_detail_head.php';
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner _s" id="scene">
        <h1><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/news_1440x160.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/news_414x160.png" alt="動態消息" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>動態消息</li>
            <li><a href="<?= BASE_PATH ?>/news_list"><?= $g_page_c_name ?></a ></li>
            <li class="current"><?= $company["name"] ?></li>
        </div>
    </div>
    <main class="pg">
        <div class="container">
            <h1 class="pg_title mb-0"><?= $company["name"] ?></h1>
            <p class="date"><?= GetDateString($company["release_date"]) ?></p>
        </div>
        <?= $company["content"] ?>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>