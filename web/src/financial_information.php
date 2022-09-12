<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

$connect = megabills_Connect();
$base_ndate = get_cm010_web_ndate($connect, "TWD");
//總體經濟指標
$ord = 1;
$data1 = [];
while ($ord <= 13) {
    get_index_content($connect, $base_ndate, INDEX_TYPE_1, INDEX_SUB_TYPE_ALL, $ord, $data1[$ord]);
    $ord++;
}
//金融及貿易指標
$ord = 1;
$data2 = [];
while ($ord <= 13) {
    get_index_content($connect, $base_ndate, INDEX_TYPE_2, INDEX_SUB_TYPE_ALL, $ord, $data2[$ord]);
    $ord++;
}
//貨幣市場利率指標
$ord = 1;
$data3 = [];
while ($ord <= 13) {
    get_index_content($connect, $base_ndate, INDEX_TYPE_3, INDEX_SUB_TYPE_ALL, $ord, $data3[$ord]);
    $ord++;
}

megabills_Disconnect($connect);
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1 class="text-white"><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/financial_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/financial_414x160.png" alt="" loading="eager">
        </picture>
    </div>
    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>金融情勢</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>
    <?php if ($connect) { ?>
        <main class="pg">
            <div class="container">
                <div class="px-md-2">
                    <h2 class="pg_sub_title">總體經濟指標</h2>
                    <div class="sticky_table_left">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="col">日期</th>
                                    <th scope="col">景氣對策信號分數</th>
                                    <th scope="col">領先指標綜合指數</th>
                                    <th scope="col">消費者物價指數年增率(%)</th>
                                    <th scope="col">躉售物價指數年增率(%)</th>
                                    <th scope="col">失業率(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((!empty($data1) && is_array($data1)) ? $data1 : array() as $array) { ?>
                                    <tr>
                                        <?php foreach ((!empty($array) && is_array($array)) ? $array : array() as $item) { ?>
                                            <?php if ($item == $array[0]) { ?>
                                                <th scope="row"><?= NDateToYMString($item) ?></th>
                                            <?php } else { ?>
                                                <td><?= $item ?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="pg_sub_title">金融及貿易指標<span class="mark">單位％</span></h2>
                    <div class="sticky_table_left">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="col">日期</th>
                                    <th scope="col">Ｍ１Ａ年增率</th>
                                    <th scope="col">Ｍ１Ｂ年增率</th>
                                    <th scope="col">Ｍ２年增率</th>
                                    <th scope="col">進口貿易年增率</th>
                                    <th scope="col">出口貿易年增率</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((!empty($data2) && is_array($data2)) ? $data2 : array() as $array) { ?>
                                    <tr>
                                        <?php foreach ((!empty($array) && is_array($array)) ? $array : array() as $item) { ?>
                                            <?php if ($item == $array[0]) { ?>
                                                <th scope="row"><?= NDateToYMString($item) ?></th>
                                            <?php } else { ?>
                                                <td><?= $item ?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="pg_sub_title">貨幣市場利率指標<span class="mark">單位％</span></h2>
                    <div class="sticky_table_left">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="rowgroup" rowspan="2" style="z-index: 1;">項目</th>
                                    <th scope="col" rowspan="2">隔夜拆款<br>平均利率</th>
                                    <th scope="col" colspan="3">商業本票初級市場平均發行利率</th>
                                    <th scope="col" colspan="3">商業本票次級市場平均發行利率</th>
                                </tr>
                                <tr>
                                    <th scope="col">1-30天</th>
                                    <th scope="col">31-90天</th>
                                    <th scope="col">91-180天</th>
                                    <th scope="col">1-30天</th>
                                    <th scope="col">31-90天</th>
                                    <th scope="col">91-180天</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((!empty($data3) && is_array($data3)) ? $data3 : array() as $array) { ?>
                                    <tr>
                                        <?php foreach ((!empty($array) && is_array($array)) ? $array : array() as $item) { ?>
                                            <?php if ($item == $array[0]) { ?>
                                                <th scope="row"><?= NDateToYMString($item) ?></th>
                                            <?php } else { ?>
                                                <td><?= $item ?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    <?php } else { ?>
        <main class="pg">
            <div class="container">
                <div class="maintain">
                    <div class="maintain_content">
                        <img src="<?= BASE_PATH ?>/src/img/maintain.png" alt="">
                        <p>請稍後再試，如造成您的不便，敬請見諒。</p>
                    </div>
                </div>
            </div>
        </main>
    <?php } ?>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
</script>
<?php require_once '_foot.php'; ?>