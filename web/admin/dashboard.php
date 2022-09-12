<?php
require_once '_admin_head.php';
no_permission_gopage($menus, $first_page);

//查詢公司訊息
$company_count = 0;
$querystring = "status=0";
$url = WEBAPI_COMPANY . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $company_count) != 200)
    $company_count = 0;

//查詢政策宣導
$propaganda_count = 0;
$querystring = "status=0";
$url = WEBAPI_PROPAGANDA . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $propaganda_count) != 200)
    $propaganda_count = 0;

//查詢友善連結
$links_count = 0;
$querystring = "status=0";
$url = WEBAPI_LINKS . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $links_count) != 200)
    $links_count = 0;

//查詢服務據點
$location_count = 0;
$querystring = "status=0 AND language_id=0";
$url = WEBAPI_LOCATION . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $location_count) != 200)
    $location_count = 0;

//查詢職缺訊息
$vacancy_count = 0;
$querystring = "status=0";
$url = WEBAPI_VACANCY . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $vacancy_count) != 200)
    $vacancy_count = 0;

//查詢薪酬福利
$benefits_count = 0;
$querystring = "status=0";
$url = WEBAPI_BENEFITS . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $benefits_count) != 200)
    $benefits_count = 0;

//查詢薪酬福利
$encyclopedia_count = 0;
$querystring = "status=0";
$url = WEBAPI_ENCYCLOPEDIA . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $encyclopedia_count) != 200)
    $encyclopedia_count = 0;

//查詢公司治理情形
$governance_count = 0;
$querystring = "status=0";
$url = WEBAPI_GOVERNANCE . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $governance_count) != 200)
    $governance_count = 0;

//查詢公司治理規範
$norm_count = 0;
$querystring = "status=0";
$url = WEBAPI_NORM . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $norm_count) != 200)
    $norm_count = 0;

//查詢財務報告
$financial_count = 0;
$querystring = "status=0 AND language_id=0";
$url = WEBAPI_FINANCIAL . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $financial_count) != 200)
    $financial_count = 0;

//查詢年報
$annual_count = 0;
$querystring = "status=0 AND language_id=0";
$url = WEBAPI_ANNUAL . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $annual_count) != 200)
    $annual_count = 0;

//查詢Location
$location_en_count = 0;
$querystring = "status=0 AND language_id=1";
$url = WEBAPI_LOCATION . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $location_en_count) != 200)
    $location_en_count = 0;

//查詢Annual Report
$annual_en_count = 0;
$querystring = "status=0 AND language_id=1";
$url = WEBAPI_ANNUAL . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $annual_en_count) != 200)
    $annual_en_count = 0;

//查詢Financial Highlights
$financial_en_count = 0;
$querystring = "status=0 AND language_id=1";
$url = WEBAPI_FINANCIAL . "?query=" . urlencode($querystring) . "&count=true";
if (CallAPI('GET', $url, $user_accesstoken, null, $resultMessage, $financial_en_count) != 200)
    $financial_en_count = 0;
?>
<div class="wrapper">
    <?php require_once '_admin_menu.php'; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>儀表板
                            <small></small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $company_count ?></h3>
                            <h4>公司訊息</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <a href="company_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $propaganda_count ?></h3>
                            <h4>政策宣導</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <a href="propaganda_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $links_count ?></h3>
                            <h4>友善連結</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <a href="links_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $location_count ?></h3>
                            <h4>服務據點</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a href="location_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $vacancy_count ?></h3>
                            <h4>職缺訊息</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-id-badge"></i>
                        </div>
                        <a href="vacancy_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $benefits_count ?></h3>
                            <h4>薪酬福利</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <a href="benefits_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $encyclopedia_count ?></h3>
                            <h4>貨幣市場小百科</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <a href="encyclopedia_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $governance_count ?></h3>
                            <h4>公司治理情形</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="governance_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $norm_count ?></h3>
                            <h4>公司治理規範</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <a href="norm_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $financial_count ?></h3>
                            <h4>財務報告</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <a href="financial_category_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $annual_count ?></h3>
                            <h4>年報</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <a href="annual_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $location_en_count ?></h3>
                            <h4>Location</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <a href="location_en_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand-second">
                        <div class="inner">
                            <h3><?= $annual_en_count ?></h3>
                            <h4>Annual Report</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <a href="annual_en_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="small-box bg-brand">
                        <div class="inner">
                            <h3><?= $financial_en_count ?></h3>
                            <h4>Financial Highlights</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <a href="financial_en_list.php" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once '_admin_footer.php'; ?>
</div>
<?php require_once "_admin_post_js.php"; ?>
<?php require_once '_admin_foot.php'; ?>
