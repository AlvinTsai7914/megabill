<nav class="main-header navbar navbar-expand navbar-dark bg-brand border-bottom fixed-top">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="hidden-xs"><?= getSession("loginusername") ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="card card-outline card-brand">
                    <div class="card-body">
                        <h3 class="profile-username text-center"><?= getSession("loginusername") ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>登入IP</b><p class="float-right"><?= getSession("loginip") ?></p>
                            </li>
                            <li class="list-group-item">
                                <b>登入時間</b><p class="float-right"><?= GetDateTimeString(getSession("logintime")) ?></p>
                            </li>
                        </ul>
                        <a href="logout_ajax.php" class="float-right btn btn-sm btn-brand">登出</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary">
    <!--<aside class="main-sidebar">-->
    <section class="sidebar">
        <?php require_once "_admin_aside.php"; ?>
    </section>
</aside>