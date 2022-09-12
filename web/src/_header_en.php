<header>
    <div class="logo">
        <a href="<?= BASE_PATH ?>/en/aboutus">
            <img src="<?= BASE_PATH ?>/src/img/MegaLogo.png" alt="<?= $sysinfo["name"] ?>">
        </a>
    </div>
    <nav class="nav_wrap">
        <ul class="nav_list">
            <li class="nav_list__item <?= ($g_page_name == "about_en") ? "current" : "" ?>"> <a href="<?= BASE_PATH ?>/en/aboutus">About Us</a> </li>
            <li class="nav_list__item <?= ($g_page_name == "annual_report_en") ? "current" : "" ?>"> <a href="<?= BASE_PATH ?>/en/annual_report">Annual Report</a> </li>
            <li class="nav_list__item <?= ($g_page_name == "financial_highlights_en") ? "current" : "" ?>"> <a href="<?= BASE_PATH ?>/en/financial_highlights">Financial Highlights</a> </li>
        </ul>
    </nav>
    <div class="lang">
        <a href="<?= BASE_PATH ?>/"> 中 </a>
    </div>
    <div class="header_right_m">
        <div class="lang_m">
            <a href="<?= BASE_PATH ?>/"> 中文 </a>
        </div>
        <div class="hamburger">
            <div class="burger burger-squeeze">
                <div class="burger-lines"></div>
            </div>
        </div>
    </div>
</header>
<nav class="sub_nav_en">
    <ul class="nav_list">
        <li class="nav_list__item current"> <a href="<?= BASE_PATH ?>/en/aboutus">About Us</a> </li>
        <li class="nav_list__item"> <a href="<?= BASE_PATH ?>/en/annual_report">Annual Report</a> </li>
        <li class="nav_list__item"> <a href="<?= BASE_PATH ?>/en/financial_highlights">Financial Highlights</a> </li>
    </ul>
</nav>
