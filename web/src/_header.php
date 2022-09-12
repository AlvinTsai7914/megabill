<header>
    <div class="logo">
        <a href="<?= BASE_PATH ?>/">
            <img src="<?= BASE_PATH ?>/src/img/MegaLogo.png" alt="<?= $sysinfo["name"] ?>">
        </a>
    </div>
    <div class="nav_wrap">
        <ul class="nav_list">
            <li class="nav_list__item <?= ($g_page_name == "index" || $g_page_name == "about" || $g_page_name == "location" || $g_page_name == "recruiting") ? "current" : "" ?>">
                關於我們
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/about">關於兆票</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/location">服務據點</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/recruiting">人才招募</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "market" || $g_page_name == "news_list" || $g_page_name == "news_detail" || $g_page_name == "propaganda_list" || $g_page_name == "propaganda_detail" || $g_page_name == "links") ? "current" : "" ?>">
                動態消息
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/market">市場行情</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/news_list">公司訊息</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/propaganda_list">政策宣導</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/links">友善連結</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "ntd_quotation" || $g_page_name == "foreign_quotation") ? "current" : "" ?>">
                牌告利率
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/ntd_quotation">新台幣利率報價</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/foreign_quotation">外幣利率報價</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "situation_research" || $g_page_name == "financial_information" || $g_page_name == "encyclopedia") ? "current" : "" ?>">
                金融情勢
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/situation_research">資金情勢研判</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/financial_information">金融資訊</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/encyclopedia">貨幣市場小百科</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "tools" || $g_page_name == "bonds" || $g_page_name == "promissory_note" || $g_page_name == "acceptance_bill" || $g_page_name == "commercial_paper" || $g_page_name == "invest_foreign" || $g_page_name == "calculator") ? "current" : "" ?>">
                業務簡介
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/tools">交易工具介紹</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/bonds">票券及債券買賣</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/promissory_note">發行融資性商業本票</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/acceptance_bill">買入發行銀行承兌匯票及商業承兌匯票</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/commercial_paper">買入中心工廠票券交易性商業本票</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/invest_foreign">投資外幣票券及債券</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/calculator">試算器</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "governance" || $g_page_name == "financial_report" || $g_page_name == "annual_report" || $g_page_name == "credit_rating") ? "current" : "" ?>">
                法定公開揭露
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/governance">公司治理</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/financial_report">財務報告</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/annual_report">年報</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/credit_rating">信用評等資訊</a></li>
                </ul>
            </li>
            <li class="nav_list__item <?= ($g_page_name == "policies_norms" || $g_page_name == "situation" || $g_page_name == "due_diligence" || $g_page_name == "stakeholders" || $g_page_name == "responsibility") ? "current" : "" ?>">
                永續發展
                <ul class="sub_list">
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/policies_norms_list">政策及規範</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/situation_list">年度執行情形</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/due_diligence">機構投資人盡職治理</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/stakeholders">利害關係人溝通</a></li>
                    <li class="sub_list__item"><a href="<?= BASE_PATH ?>/responsibility">報告書</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="lang">
        <a href="<?= BASE_PATH ?>/en/aboutus">EN</a>
    </div>
    <div class="header_right_m">
        <div class="lang_m">
            <a href="<?= BASE_PATH ?>/en/aboutus">English</a>
        </div>
        <div class="hamburger">
            <div class="burger burger-squeeze">
                <div class="burger-lines"></div>
            </div>
        </div>
    </div>
</header>
<div class="sub_nav">
    <ul class="nav_list">
        <li class="nav_list__item">
            <p>關於我們</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/about">關於兆票</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/location">服務據點</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/recruiting">人才招募</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>動態消息</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/market">市場行情</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/news_list">公司訊息</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/propaganda_list">政策宣導</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/links">友善連結</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>牌告利率</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/ntd_quotation">新台幣利率報價</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/foreign_quotation">外幣利率報價</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>金融情勢</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/situation_research">資金情勢研判</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/financial_information">金融資訊</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/encyclopedia">貨幣市場小百科</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>業務簡介</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/tools">交易工具介紹</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/bonds">票券及債券買賣</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/promissory_note">發行融資性商業本票</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/acceptance_bill">買入發行銀行承兌匯票及商業承兌匯票</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/commercial_paper">買入中心工廠票券交易性商業本票</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/invest_foreign">投資外幣票券及債券</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/calculator">試算器</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>法定公開揭露</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/governance">公司治理</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/financial_report">財務報告</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/annual_report">年報</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/credit_rating">信用評等資訊</a></li>
            </ul>
        </li>
        <li class="nav_list__item">
            <p>永續發展</p>
            <ul class="sub_list">
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/policies_norms_list">政策及規範</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/situation_list">年度執行情形</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/due_diligence">機構投資人盡職治理</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/stakeholders">利害關係人溝通</a></li>
                <li class="sub_list__item"><a href="<?= BASE_PATH ?>/responsibility">報告書</a></li>
            </ul>
        </li>
    </ul>
</div>
