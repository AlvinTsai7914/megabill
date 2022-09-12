<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

$connect = megabills_Connect();
$base_ndate = get_cm010_web_ndate($connect, "TWD");
//$base_ndate = "1110419";  //測試
//距到期日
$data1 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_D, null, null, $data1);
//初級市場買入-CP2
$data2 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CP2, $data2);
//初級市場買入-交易票據
$data3 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CP1, $data3);
//初級市場買入-銀行承兌匯票
$data4 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_BA, $data4);
//初級市場買入-銀行可轉讓定期存單
$data5 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CD, $data5);
//初級市場買入-資產基礎商業本票
$data6 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_ABCP, $data6);

//次級市場-CP2-買進
$data7 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CP2, $data7);

//次級市場-CP2-賣出
$data8 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CP2, $data8);

//次級市場-BA-買進
$data9 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_BA, $data9);

//次級市場-BA-賣出
$data10 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_BA, $data10);

//次級市場-ABCP-買進
$data11 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_ABCP, $data11);

//次級市場-ABCP-賣出
$data12 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_ABCP, $data12);

//次級市場-債券-買進
$data13 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_BD, $data13);

//次級市場-債券-賣出
$data14 = null;
get_ec_rate_list($connect, DL_TYPE_TWD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_BD, $data14);

//債券買賣斷利率報價
$data15 = [];
$index = 1;
while ($index > 0) {
    get_bd_rate($connect, DL_TYPE_TWD, $base_ndate, $index, $data15[$index]);
    if ($data15[$index] == null)
        break;
    else
        $index++;
}

megabills_Disconnect($connect);
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner">
        <h1><?= $g_page_c_name ?></h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/quotation_1440x300.png" >
            <img src="<?= BASE_PATH ?>/src/img/banner/quotation_414x160.png" alt="新台幣利率報價" loading="eager">
        </picture>
    </div>

    <nav class="breadcrumb">
        <ul class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>牌告利率</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </ul>
    </nav>

    <?php if ($connect) { ?>
        <main class="pg ntd_quotation">
            <div class="container">
                <div class="px-md-2">
                    <h2 class="pg_sub_title">初次級市場利率報價 <?= NDateToYMDString($base_ndate) ?></h2>
                    <div class="sticky_table_left">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="row" colspan="3">距到期日</th>
                                    <?php foreach ((!empty($data1) && is_array($data1)) ? $data1 : array() as $item) { ?>
                                        <th><?= $item ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="5" class="_v" >初<br/>級<br/>市<br/>場<br/>買<br/>入</th>
                                    <th scope="row" colspan="2" class="_v_2">融資性商業本票(CP2)</th>
                                    <?php foreach ((!empty($data2) && is_array($data2)) ? $data2 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="_v_2">交易票據</th>
                                    <?php foreach ((!empty($data3) && is_array($data3)) ? $data3 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="_v_2">銀行承兌匯票(BA)</th>
                                    <?php foreach ((!empty($data4) && is_array($data4)) ? $data4 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="_v_2">銀行可轉讓定期存單</th>
                                    <?php foreach ((!empty($data5) && is_array($data5)) ? $data5 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="_v_2">資產基礎商業本票(ABCP)</th>
                                    <?php foreach ((!empty($data6) && is_array($data6)) ? $data6 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>

                                <tr>
                                    <th rowspan="8" class="_v">次<br/>級<br/>市<br/>場</th>
                                    <th rowspan="2" class="_v_2">CP2</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data7) && is_array($data7)) ? $data7 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data8) && is_array($data8)) ? $data8 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="_v_2">BA</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data9) && is_array($data9)) ? $data9 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data10) && is_array($data10)) ? $data10 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="_v_2">ABCP</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data11) && is_array($data11)) ? $data11 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data12) && is_array($data12)) ? $data12 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="_v_2">債券</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data13) && is_array($data13)) ? $data13 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data14) && is_array($data14)) ? $data14 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="pg_sub_title">債券買賣斷利率報價 <?= NDateToYMDString($base_ndate) ?><span class="mark">（按到期日排序）</span></h2>
                    <div class="sticky_table_left">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">債券名稱</th>
                                    <th scope="col">發行日</th>
                                    <th scope="col">到期日</th>
                                    <th scope="col">票面利率(%)</th>
                                    <th scope="col">買進利率(%)</th>
                                    <th scope="col">賣出利率(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((!empty($data15) && is_array($data15)) ? $data15 : array() as $array) { ?>
                                    <tr>
                                        <?php foreach ((!empty($array) && is_array($array)) ? $array : array() as $item) { ?>
                                            <?php if ($item == $array[0]) { ?>
                                                <th scope="row"><?= $item ?></th>
                                            <?php } else { ?>
                                                <td><?= $item ?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="remark">以上報價為本公司牌告利率，實際承做利率請洽本公司各<a href="<?= BASE_PATH ?>/location">服務據點</a><br>
                        註：初級市場之利率係指次一營業日發行參考利率</p>
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