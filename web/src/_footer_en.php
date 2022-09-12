<footer>
    <div class="head">
        <div class="logo">
            <a href="<?= BASE_PATH ?>/en">
                <img src="<?= BASE_PATH ?>/src/img/MegaLogo.png" alt="<?= $sysinfo["name"] ?>">
            </a>
        </div>
        <div class="line"></div>
    </div>
    <div class="body row justify-content-between">
        <div class="col-12 col-xl-5 mb-3 ">
            <div class="row contact">
                <div class="col-md-5 mb-3"><p>Tel：<a href="tel:<?= GetClearPhoneString($sysinfo["phone"]) ?>" class="d-inline-block"><?= $sysinfo["phone"] ?></a></p></div>
                <div class="col-md-7 mb-3"><p>Email：<a href="mailto:<?= $sysinfo["email"] ?>" class="d-inline-block"><?= $sysinfo["email"] ?></a></p></div>
                <div class="col-md-5 mb-3"><p>Fax：<?= $sysinfo["fax"] ?></p></div>
                <div class="col-md-7 mb-3"><p>Address：<?= $sysinfo["address_en"] ?></p></div>
            </div>
        </div>
        <div class="col-sm-11 col-lg-12 col-xl-7 mb-3">
            <div class="row no-gutters ">
                <div class="col-12">
                    <h3 class="title text-left">Mega Holdings Group</h3>
                </div>
                <div class="col-12">
                    <div class="row no-gutters">
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megaholdings.com.tw/tc/index.aspx" target="_blank">Mega Holdings</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megabank.com.tw/personal" target="_blank">Mega Bank</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megafunds.com.tw/iitweb/messageform.aspx" target="_blank">Mega Funds</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megacharity.org.tw/" target="_blank">Mega Charity Foundation</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.cki.com.tw/" target="_blank">Chung Kuo Insurance</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.emega.com.tw/" target="_blank">Mega Securities</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megaamc.com.tw/tc/index.aspx" target="_blank">Mega Asset Management</a></div>
                        <div class="col-6 col-sm-4 col-lg-3 mb-3"><a href="https://www.megafoundation.org.tw/" target="_blank">Mega Bank C&E Foundation</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p><?= $sysinfo["copyright"] ?></p>
    </div>
</footer>
<div class="overlay"></div>