<?php
require_once '_head.php';
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <main class="pg error">
        <div class="container">
            <div class="text_box">
                <h1>404 NOT FOUND</h1>
                <p>抱歉，您所查看的頁面不存在！</p>
                <div class="linear_btn">
                    <a href="<?= BASE_PATH ?>/">回首頁</a>
                </div>
            </div>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>