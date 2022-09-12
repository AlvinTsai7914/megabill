<?php
require_once 'business_head.php';
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner black_cover" id="scene">
        <h1 class="text-white">買入中心工廠票券<br class="d-md-none">交易性商業本票</h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/business_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/business_414x160.png" alt="業務簡介" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>業務簡介</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </div>
    </div>
    <main class="pg">
        <?= $business["content"] ?>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>