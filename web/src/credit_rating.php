<?php
require_once '_head.php';
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
    <main class="pg">
        <?= $sysinfo["credit"] ?>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>