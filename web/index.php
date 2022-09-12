<?php

require_once 'setting/AltoRouter.php';
require_once 'setting/config.php';
require_once 'setting/webapi.php';
require_once 'setting/tools.php';

if (file_exists($_SERVER['SCRIPT_FILENAME']) && pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_EXTENSION) !== 'php') {
    return;
}

$router = new AltoRouter();
$basepah = rtrim(BASE_PATH, '/');
$router->setBasePath($basepah);

// map(), $method,$route,$target
//首頁
$router->map('GET', '', function () {
    $g_page_name = "index";
    $g_page_c_name = "";
    require_once __DIR__ . '/src/index.php';
}, 'index0');
//首頁
$router->map('GET', '/index', function () {
    $g_page_name = "index";
    $g_page_c_name = "";
    require_once __DIR__ . '/src/index.php';
}, 'index1');

//關於兆票
$router->map('GET', '/about', function () {
    $g_page_name = "about";
    $g_page_c_name = "關於兆票";
    require_once __DIR__ . '/src/about.php';
}, 'about0');

//服務據點
$router->map('GET', '/location', function () {
    $g_page_name = "location";
    $g_page_c_name = "服務據點";
    require_once __DIR__ . '/src/location.php';
}, 'location0');

//人才招募
$router->map('GET', '/recruiting', function () {
    $g_page_name = "recruiting";
    $g_page_c_name = "人才招募";
    require_once __DIR__ . '/src/recruiting.php';
}, 'recruiting0');

//市場行情
$router->map('GET', '/market', function () {
    $g_page_name = "market";
    $g_page_c_name = "市場行情";
    require_once __DIR__ . '/src/market.php';
}, 'market0');

//公司訊息-列表
$router->map('GET', '/news_list', function () {
    $g_page_name = "news_list";
    $g_page_index = 1;
    $g_page_c_name = "公司訊息";
    require_once __DIR__ . '/src/news_list.php';
}, 'news_list0');
$router->map('GET', '/news_list/[i:p_id]', function ($p_id) {
    $g_page_name = "news_list";
    $g_page_index = $p_id;
    $g_page_c_name = "公司訊息";
    require_once __DIR__ . '/src/news_list.php';
}, 'news_list1');

//公司訊息-詳細
$router->map('GET', '/news_detail', function () {
    $g_page_name = "news_detail";
    $g_id = "0";
    $g_page_c_name = "公司訊息";
    require_once __DIR__ . '/src/news_detail.php';
}, 'news_detail0');
$router->map('GET', '/news_detail/[i:id]', function ($id) {
    $g_page_name = "news_detail";
    $g_id = $id;
    $g_page_c_name = "公司訊息";
    require_once __DIR__ . '/src/news_detail.php';
}, 'news_detail1');

//政策宣導-列表
$router->map('GET', '/propaganda_list', function () {
    $g_page_name = "propaganda_list";
    $g_page_index = 1;
    $g_page_c_name = "政策宣導";
    require_once __DIR__ . '/src/propaganda_list.php';
}, 'propaganda_list0');
$router->map('GET', '/propaganda_list/[i:p_id]', function ($p_id) {
    $g_page_name = "propaganda_list";
    $g_page_index = $p_id;
    $g_page_c_name = "政策宣導";
    require_once __DIR__ . '/src/propaganda_list.php';
}, 'propaganda_list1');

//政策宣導-詳細
$router->map('GET', '/propaganda_detail', function () {
    $g_page_name = "propaganda_detail";
    $g_page_c_name = "政策宣導";
    $g_id = "0";
    require_once __DIR__ . '/src/propaganda_detail.php';
}, 'propaganda_detail0');
$router->map('GET', '/propaganda_detail/[i:id]', function ($id) {
    $g_page_name = "propaganda_detail";
    $g_page_c_name = "政策宣導";
    $g_id = $id;
    require_once __DIR__ . '/src/propaganda_detail.php';
}, 'propaganda_detail1');

//友善連結-列表
$router->map('GET', '/links', function () {
    $g_page_name = "links";
    $g_page_c_name = "友善連結";
    require_once __DIR__ . '/src/links.php';
}, 'links0');

//新台幣利率報價
$router->map('GET', '/ntd_quotation', function () {
    $g_page_name = "ntd_quotation";
    $g_page_c_name = "新台幣利率報價";
    require_once __DIR__ . '/src/ntd_quotation.php';
}, 'ntd_quotation0');

//外幣利率報價
$router->map('GET', '/foreign_quotation', function () {
    $g_page_name = "foreign_quotation";
    $g_page_c_name = "外幣利率報價";
    require_once __DIR__ . '/src/foreign_quotation.php';
}, 'foreign_quotation0');

//資金情勢研判
$router->map('GET', '/situation_research', function () {
    $g_page_name = "situation_research";
    $g_page_c_name = "資金情勢研判";
    require_once __DIR__ . '/src/situation_research.php';
}, 'situation_research0');

//金融資訊
$router->map('GET', '/financial_information', function () {
    $g_page_name = "financial_information";
    $g_page_c_name = "金融資訊";
    require_once __DIR__ . '/src/financial_information.php';
}, 'financial_information0');

//貨幣市場小百科
$router->map('GET', '/encyclopedia', function () {
    $g_page_name = "encyclopedia";
    $g_page_c_name = "貨幣市場小百科";
    $g_page_index = 1;
    $g_keyword = "";
    require_once __DIR__ . '/src/encyclopedia.php';
}, 'encyclopedia0');
$router->map('GET', '/encyclopedia/[i:p_id]', function ($p_id) {
    $g_page_name = "encyclopedia";
    $g_page_c_name = "貨幣市場小百科";
    $g_page_index = $p_id;
    $g_keyword = "";
    require_once __DIR__ . '/src/encyclopedia.php';
}, 'encyclopedia1');
$router->map('GET', '/encyclopedia/[i:p_id]/[*:keyword]', function ($p_id, $keyword) {
    $g_page_name = "encyclopedia";
    $g_page_c_name = "貨幣市場小百科";
    $g_page_index = $p_id;
    $g_keyword = urldecode($keyword);
    require_once __DIR__ . '/src/encyclopedia.php';
}, 'encyclopedia2');

//交易工具介紹
$router->map('GET', '/tools', function () {
    $g_page_name = "tools";
    $g_page_c_name = "交易工具介紹";
    require_once __DIR__ . '/src/tools.php';
}, 'tools0');

//票券及債券買賣
$router->map('GET', '/bonds', function () {
    $g_page_name = "bonds";
    $g_page_c_name = "票券及債券買賣";
    require_once __DIR__ . '/src/bonds.php';
}, 'bonds0');

//發行融資性商業本票
$router->map('GET', '/promissory_note', function () {
    $g_page_name = "promissory_note";
    $g_page_c_name = "發行融資性商業本票";
    require_once __DIR__ . '/src/promissory_note.php';
}, 'promissory_note0');

//買入發行銀行承兌匯票及商業承兌匯票
$router->map('GET', '/acceptance_bill', function () {
    $g_page_name = "acceptance_bill";
    $g_page_c_name = "買入發行銀行承兌匯票及商業承兌匯票";
    require_once __DIR__ . '/src/acceptance_bill.php';
}, 'acceptance_bill0');

//買入中心工廠票券交易性商業本票
$router->map('GET', '/commercial_paper', function () {
    $g_page_name = "commercial_paper";
    $g_page_c_name = "買入中心工廠票券交易性商業本票";
    require_once __DIR__ . '/src/commercial_paper.php';
}, 'commercial_paper0');

//投資外幣票券及債券
$router->map('GET', '/invest_foreign', function () {
    $g_page_name = "invest_foreign";
    $g_page_c_name = "投資外幣票券及債券";
    require_once __DIR__ . '/src/invest_foreign.php';
}, 'invest_foreign0');

//試算器
$router->map('GET', '/calculator', function () {
    $g_page_name = "calculator";
    $g_page_c_name = "試算器";
    require_once __DIR__ . '/src/calculator.php';
}, 'calculator0');

//公司治理
$router->map('GET', '/governance', function () {
    $g_page_name = "governance";
    $g_page_c_name = "公司治理";
    require_once __DIR__ . '/src/governance.php';
}, 'governance0');

//財務報告
$router->map('GET', '/financial_report', function () {
    $g_page_name = "financial_report";
    $g_page_c_name = "財務報告";
    require_once __DIR__ . '/src/financial_report.php';
}, 'financial_report0');

//年報
$router->map('GET', '/annual_report', function () {
    $g_page_name = "annual_report";
    $g_page_c_name = "年報";
    require_once __DIR__ . '/src/annual_report.php';
}, 'annual_report0');

//信用評等資訊
$router->map('GET', '/credit_rating', function () {
    $g_page_name = "credit_rating";
    $g_page_c_name = "信用評等資訊";
    require_once __DIR__ . '/src/credit_rating.php';
}, 'credit_rating0');

//政策及規範-列表
$router->map('GET', '/policies_norms_list', function () {
    $g_page_name = "policies_norms_list";
    $g_page_index = 1;
    $g_page_c_name = "政策及規範";
    require_once __DIR__ . '/src/policies_norms_list.php';
}, 'policies_norms_list0');
$router->map('GET', '/policies_norms_list/[i:p_id]', function ($p_id) {
    $g_page_name = "policies_norms_list";
    $g_page_index = $p_id;
    $g_page_c_name = "政策及規範";
    require_once __DIR__ . '/src/policies_norms_list.php';
}, 'policies_norms_list1');

//政策及規範-詳細
$router->map('GET', '/policies_norms_detail', function () {
    $g_page_name = "policies_norms_detail";
    $g_page_c_name = "政策及規範";
    $g_id = "0";
    require_once __DIR__ . '/src/policies_norms_detail.php';
}, 'policies_norms_detail0');
$router->map('GET', '/policies_norms_detail/[i:id]', function ($id) {
    $g_page_name = "policies_norms_detail";
    $g_page_c_name = "政策及規範";
    $g_id = $id;
    require_once __DIR__ . '/src/policies_norms_detail.php';
}, 'policies_norms_detail1');

//年度執行情形-列表
$router->map('GET', '/situation_list', function () {
    $g_page_name = "situation_list";
    $g_page_index = 1;
    $g_page_c_name = "年度執行情形";
    require_once __DIR__ . '/src/situation_list.php';
}, 'situation_list0');
$router->map('GET', '/situation_list/[i:p_id]', function ($p_id) {
    $g_page_name = "situation_list";
    $g_page_index = $p_id;
    $g_page_c_name = "年度執行情形";
    require_once __DIR__ . '/src/situation_list.php';
}, 'situation_list1');

//年度執行情形-詳細
$router->map('GET', '/situation_detail', function () {
    $g_page_name = "situation_detail";
    $g_page_c_name = "年度執行情形";
    $g_id = "0";
    require_once __DIR__ . '/src/situation_detail.php';
}, 'situation_detail0');
$router->map('GET', '/situation_detail/[i:id]', function ($id) {
    $g_page_name = "situation_detail";
    $g_page_c_name = "年度執行情形";
    $g_id = $id;
    require_once __DIR__ . '/src/situation_detail.php';
}, 'situation_detail1');

//機構投資人盡職治理
$router->map('GET', '/due_diligence', function () {
    $g_page_name = "due_diligence";
    $g_page_c_name = "機構投資人盡職治理";
    require_once __DIR__ . '/src/due_diligence.php';
}, 'due_diligence0');

//利害關係人溝通
$router->map('GET', '/stakeholders', function () {
    $g_page_name = "stakeholders";
    $g_page_c_name = "利害關係人溝通";
    require_once __DIR__ . '/src/stakeholders.php';
}, 'stakeholders0');

//報告書
$router->map('GET', '/responsibility', function () {
    $g_page_name = "responsibility";
    $g_page_c_name = "報告書";
    require_once __DIR__ . '/src/responsibility.php';
}, 'responsibility0');

//About Us
$router->map('GET', '/en', function () {
    $g_page_name = "about_en";
    $g_page_c_name = "About Us";
    require_once __DIR__ . '/src/about_en.php';
}, 'aboutus0');
$router->map('GET', '/en/aboutus', function () {
    $g_page_name = "about_en";
    $g_page_c_name = "About Us";
    require_once __DIR__ . '/src/about_en.php';
}, 'aboutus1');

//Annual Report
$router->map('GET', '/en/annual_report', function () {
    $g_page_name = "annual_report_en";
    $g_page_c_name = "Annual Report";
    require_once __DIR__ . '/src/annual_report_en.php';
}, 'annual_report_en0');

//Financial Highlights
$router->map('GET', '/en/financial_highlights', function () {
    $g_page_name = "financial_highlights_en";
    $g_page_c_name = "Financial Highlights";
    require_once __DIR__ . '/src/financial_highlights_en.php';
}, 'financial_highlights_en0');

//maintain
$router->map('GET', '/maintain', function () {
    $g_page_name = "maintain";
    $g_page_c_name = "系統維護中";
    require_once __DIR__ . '/src/maintain.php';
}, 'maintain0');

//使用IIS，需要將URL從BIG5轉換為UTF8
//$match = $router->match(rtrim($_SERVER['REQUEST_URI'], '/'));
$match = $router->match(mb_convert_encoding(rtrim($_SERVER['REQUEST_URI'], '/'), 'UTF-8', 'BIG5'));

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    $g_page_name = "404";
    require_once __DIR__ . '/src/404.php';
}
