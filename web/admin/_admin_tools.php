<?php

require_once '_admin_config.php';

//檢查權限
function have_permission($check_menu, $menus) {
    //檢查使用者是否登入
    if (empty(getSession("user_accesstoken"))) {//accesstoken不存在，沒有登入過
        return false;
    }

    //確認accesstoken有效
    $result = false;
    $resultMessage = "Bad Request";
    $resultData = null;
    if (CallAPI('GET', WEBAPI_USER_LoginUserData, getSession("user_accesstoken"), null, $resultMessage, $resultData) != 200 || count($resultData) != 1) {
        error_log($resultMessage . "-" . count($resultData));
        return false;
    }

    //檢查使用者是否有進入此頁的權限
    if ($check_menu == true) {
        $page = explode('/', $_SERVER['PHP_SELF']);
        $page = $page[count($page) - 1];
        return have_page_permission($menus, $page);
    } else
        return true;
}

function have_page_permission($menus, $page) {
    if ($menus == null || !is_array($menus))
        return false;
    foreach ($menus as $menu) {
        if ($menu["url"] == $page)
            return true;
        if ($menu["submenu"] != null) {
            if (have_page_permission($menu["submenu"], $page))
                return true;
        }
    }
    return false;
}

//無權限導向登入頁面，login
function no_permission_gohome() {
    if (have_permission(false, null) == false) {
        redir("login.php");
    }
}

//無權限導向指定頁面
function no_permission_gopage($menus, $page) {
    if (have_permission(true, $menus) == false) {
        redir($page);
    }
}

//無權限登出
function no_permission_json() {
    if (have_permission(false, null) == false) {
        die('{"result":false,"msg":""}');
    }
}

//清除登入資料
function clear_loginuser_session() {
    unSession('user_accesstoken');
    unSession('loginusername');
    unSession('loginip');
    unSession('logintime');
    unSession('loginuserrole');
}

function getfirstpage($menus) {
    foreach ((!empty($menus) && is_array($menus)) ? $menus : array() as $menu) {
        if (!empty($menu["url"]))
            return $menu["url"];
        else if (!empty($menu["submenu"]))
            return getfirstpage($menu["submenu"]);
        else
            continue;
    }
    return "";
}

?>