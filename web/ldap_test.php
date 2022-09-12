<?php

$adServer = "192.168.11.7";
$ldapconn = ldap_connect($adServer);

if ($ldapconn) {
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
    ldap_set_option($ldapconn, LDAP_OPT_NETWORK_TIMEOUT, 10);

    $username = "Vmsrm";
    $username = $username . "@megabills.megafg.net";
    $password = "ZAQ!2wsx";

    $bind = @ldap_bind($ldapconn, $username, $password);
    if ($bind) {
        var_dump("驗證成功");
        $basedn = "ou=兆豐票券,dc=megabills,dc=megafg,dc=net";
        $filter = "(sAMAccountName=$username)";
        $result = ldap_search($ldapconn, $basedn, $filter);
        var_dump($result);
        $info = ldap_get_entries($ldapconn, $result);
        var_dump($info);

        ldap_unbind($ldapconn);
    } else
        var_dump("驗證失敗");
} else
    var_dump("無法連接LDAP伺服器");
?>