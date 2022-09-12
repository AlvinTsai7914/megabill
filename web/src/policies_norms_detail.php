<?php
require_once 'policies_norms_detail_head.php';
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner _s" id="scene">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/development_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/development_414x160.png" alt="永續發展" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>永續發展</li>
            <li><a href="<?= BASE_PATH ?>/policies_norms_list"><?= $g_page_c_name ?></a ></li>
            <li class="current"><?= $policy["name"] ?></li>
        </div>
    </div>
    <main class="pg">
        <div class="container">
            <h1 class="pg_title mb-0"><?= $policy["name"] ?></h1>
        </div>
        <?= $policy["content"] ?>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>