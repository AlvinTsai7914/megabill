<footer>
    <div class="head">
        <div class="logo">
            <a href="<?= BASE_PATH ?>/">
                <img src="<?= BASE_PATH ?>/src/img/MegaLogo.png" alt="<?= $sysinfo["name"] ?>">
            </a>
        </div>
        <div class="line"></div>
    </div>
    <div class="body row justify-content-between">
        <div class="col-lg-6 col-xl-5 mb-3 ">
            <div class="row contact">
                <div class="col-md-5 mb-3"><p>電話：<a href="tel:<?= GetClearPhoneString($sysinfo["phone"]) ?>" class="d-inline-block"><?= $sysinfo["phone"] ?></a></p></div>
                <div class="col-md-7 mb-3"><p>Email：<a href="mailto:<?= $sysinfo["email"] ?>" class="d-inline-block"><?= $sysinfo["email"] ?></a></p></div>
                <div class="col-md-5 mb-3"><p>傳真：<?= $sysinfo["fax"] ?></p></div>
                <div class="col-md-7 mb-3"><p>地址：<?= $sysinfo["address"] ?></p></div>
            </div>
        </div>
        <div class="col-sm-11 col-lg-6 mb-3">
            <div class="row no-gutters ">
                <div class="col-lg-3">
                    <h3 class="title">兆豐事業群</h3>
                </div>
                <div class="col-lg-9">
                    <div class="row no-gutters">
                        <div class="link_s mb-3"><a href="https://www.megaholdings.com.tw/tc/index.aspx" target="_blank">兆豐金控</a></div>
                        <div class="link_s mb-3"><a href="https://www.megabank.com.tw/personal" target="_blank">兆豐銀行</a></div>
                        <div class="link_s mb-3"><a href="https://www.megafunds.com.tw/iitweb/messageform.aspx" target="_blank">兆豐投信</a></div>
                        <div class="link_m mb-3"><a href="https://www.megacharity.org.tw/" target="_blank">兆豐慈善基金會</a></div>
                        <div class="link_s mb-3"><a href="https://www.cki.com.tw/" target="_blank">兆豐保險</a></div>
                        <div class="link_s mb-3"><a href="https://www.emega.com.tw/" target="_blank">兆豐證券</a></div>
                        <div class="link_s mb-3"><a href="https://www.megaamc.com.tw/tc/index.aspx" target="_blank">兆豐資產</a></div>
                        <div class="link_m mb-3"><a href="https://www.megafoundation.org.tw/" target="_blank">兆豐文教基金會</a></div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($g_page_name != 'index') { ?>
            <div class="col-xl-1 p-xl-0">
                <h3 class="title"><a href="<?= BASE_PATH ?>/index#related_web">資訊網連結</a> </h3>
            </div>
        <?php } ?>
    </div>
    <div class="copyright">
        <p><?= $sysinfo["copyright"] ?></p>
    </div>
</footer>
<div class="overlay"></div>
