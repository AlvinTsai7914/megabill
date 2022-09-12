<?php
require_once '_head.php';
require_once 'setting/megabills_oracle.php';

$connect = megabills_Connect();
$base_ndate = get_cm010_web_ndate($connect, "TWD");
//$base_ndate = "1110419";
//距到期日
$data1 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_D, null, null, $data1);
//美元-初級市場買進-CP2
$data2 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CP2, $data2);
//美元-初級市場買進-ABCP
$data3 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_ABCP, $data3);
//美元-次級市場買進-CP2
$data4 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CP2, $data4);
//美元-次級市場賣出-CP2
$data5 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CP2, $data5);
//美元-次級市場買進-ABCP
$data6 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_ABCP, $data6);
//美元-次級市場賣出-ABCP
$data7 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_ABCP, $data7);
//美元-次級市場買進-BD
$data8 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_BD, $data8);
//美元-次級市場賣出-BD
$data9 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_BD, $data9);

//美元-初級市場買進-CD
$data10 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CD, $data10);
//美元-次級市場買進-CD
$data11 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CD, $data11);
//美元-次級市場賣出-CD
$data12 = null;
get_ec_rate_list($connect, DL_TYPE_USD, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CD, $data12);
//人民幣-初級市場買進-BD
$data13 = null;
get_ec_rate_list($connect, DL_TYPE_CNH, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CD, $data13);
//人民幣-次級市場買進-BD
$data14 = null;
get_ec_rate_list($connect, DL_TYPE_CNH, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CD, $data14);
//人民幣-次級市場賣出-BD
$data15 = null;
get_ec_rate_list($connect, DL_TYPE_CNH, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CD, $data15);
//日圓-初級市場買進-BD
$data16 = null;
get_ec_rate_list($connect, DL_TYPE_JPY, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CD, $data16);
//日圓-次級市場買進-BD
$data17 = null;
get_ec_rate_list($connect, DL_TYPE_JPY, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CD, $data17);
//日圓-次級市場賣出-BD
$data18 = null;
get_ec_rate_list($connect, DL_TYPE_JPY, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CD, $data18);
//歐元-初級市場買進-BD
$data19 = null;
get_ec_rate_list($connect, DL_TYPE_EUR, $base_ndate, PS_KIND_P, SB_ID_B, NO1_CD, $data19);
//歐元-次級市場買進-BD
$data20 = null;
get_ec_rate_list($connect, DL_TYPE_EUR, $base_ndate, PS_KIND_S, SB_ID_B, NO1_CD, $data20);
//歐元-次級市場賣出-BD
$data21 = null;
get_ec_rate_list($connect, DL_TYPE_EUR, $base_ndate, PS_KIND_S, SB_ID_S, NO1_CD, $data21);

//債券買賣斷利率報價
$data22 = [];
$index = 1;
while ($index > 0) {
    get_bd_rate($connect, DL_TYPE_FR, $base_ndate, $index, $data22[$index]);
    if ($data22[$index] == null)
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
            <img src="<?= BASE_PATH ?>/src/img/banner/quotation_414x160.png" alt="" loading="eager">
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
        <main class="pg">
            <div class="container">
                <div class="px-md-2">
                    <h2 class="pg_sub_title">美元初次級市場利率報價 <?= NDateToYMDString($base_ndate) ?></h2>
                    <div class="sticky_table_left">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="row" colspan="4">距到期日</th>
                                    <?php foreach ((!empty($data1) && is_array($data1)) ? $data1 : array() as $item) { ?>
                                        <th><?= $item ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="8" class="_v" >美<br/>元</th>
                                    <th rowspan="2" class="_vv">初<br/>級<br/>市<br/>場<br/>買<br/>入</th>
                                    <th scope="row" colspan="2" class="_vv_2" >商業本票(CP)</th>
                                    <?php foreach ((!empty($data2) && is_array($data2)) ? $data2 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="_vv_2">資產基礎商業本票(ABCP)</th>
                                    <?php foreach ((!empty($data3) && is_array($data3)) ? $data3 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="6" class="_vv">次<br/>級<br/>市<br/>場</th>
                                    <th rowspan="2" class="_vv_2">CP</th>
                                    <th scope="row" class="_vv_3">買進</th>
                                    <?php foreach ((!empty($data4) && is_array($data4)) ? $data4 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_vv_3">賣出</th>
                                    <?php foreach ((!empty($data5) && is_array($data5)) ? $data5 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="_vv_2">ABCP</th>
                                    <th scope="row" class="_vv_3">買進</th>
                                    <?php foreach ((!empty($data6) && is_array($data6)) ? $data6 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_vv_3">賣出</th>
                                    <?php foreach ((!empty($data7) && is_array($data7)) ? $data7 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="_vv_2">債券</th>
                                    <th scope="row" class="_vv_3">買進</th>
                                    <?php foreach ((!empty($data8) && is_array($data8)) ? $data8 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_vv_3">賣出</th>
                                    <?php foreach ((!empty($data9) && is_array($data9)) ? $data9 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="pg_sub_title">外幣可轉讓定期存單利率報價 <?= NDateToYMDString($base_ndate) ?></h2>
                    <div class="sticky_table_left foreign_currency">
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
                                    <th rowspan="3" class="_v" >美<br>元</th>
                                    <th scope="row" colspan="2" class="_v_2">初級市場買入</th>
                                    <?php foreach ((!empty($data10) && is_array($data10)) ? $data10 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" scope="row" class="_v_2">次級市場</th>
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
                            </tbody>
                            <tbody>
                                <tr>
                                    <th rowspan="3" class="_v" >人<br>民<br>幣</th>
                                    <th scope="row" colspan="2" class="_v_2">初級市場買入</th>
                                    <?php foreach ((!empty($data13) && is_array($data13)) ? $data13 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" scope="row" class="_v_2">次級市場</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data14) && is_array($data14)) ? $data14 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data15) && is_array($data15)) ? $data15 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th rowspan="3" class="_v" >日<br>圓</th>
                                    <th scope="row" colspan="2" class="_v_2">初級市場買入</th>
                                    <?php foreach ((!empty($data16) && is_array($data16)) ? $data16 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" scope="row" class="_v_2">次級市場</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data17) && is_array($data17)) ? $data17 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data18) && is_array($data18)) ? $data18 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th rowspan="3" class="_v" >歐<br>元</th>
                                    <th scope="row" colspan="2" class="_v_2">初級市場買入</th>
                                    <?php foreach ((!empty($data19) && is_array($data19)) ? $data19 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th rowspan="2" scope="row" class="_v_2">次級市場</th>
                                    <th scope="row" class="_v_3">買進</th>
                                    <?php foreach ((!empty($data20) && is_array($data20)) ? $data20 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <th scope="row" class="_v_3">賣出</th>
                                    <?php foreach ((!empty($data21) && is_array($data21)) ? $data21 : array() as $item) { ?>
                                        <td><?= $item ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- 外幣可轉讓定期存單利率報價 END -->
                    <h2 class="pg_sub_title">外幣債券買賣斷利率報價 <?= NDateToYMDString($base_ndate) ?><span class="mark">（按到期日排序）</span></h2>
                    <div class="sticky_table_left">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">幣別</th>
                                    <th scope="col">債券名稱</th>
                                    <th scope="col">發行日</th>
                                    <th scope="col">到期日</th>
                                    <th scope="col">票面利率(%)</th>
                                    <th scope="col">買進利率(%)</th>
                                    <th scope="col">賣出利率(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ((!empty($data22) && is_array($data22)) ? $data22 : array() as $array) { ?>
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
                </div>
                <p class="remark">以上報價為本公司牌告利率，實際承做利率請洽本公司各<a href="<?= BASE_PATH ?>/location">服務據點</a><br>
                    註：初級市場之利率係指次一營業日發行參考利率</p>
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