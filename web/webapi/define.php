<?php

//Passwork加密
define('PASSWORK_KEY', '8FYr3uYBYfWWbFqN7V7KsVmaAQuVYPFP');
define('PASSWORK_IV', 'UmxXZ7VXSmmGBhXm');

//回傳碼
define('D_SUCCESS', 200);
define('D_BAD_REQUEST', 400);
define('D_NOT_FOUND', 404);
define('D_METHOD_NOT_ALLOWED', 405);
define('D_INTERNAL_SERVER_ERROR', 500);

//2xx: 成功
//200 OK: 通用狀態碼
//201 Created: 資源新增成功
//202 Accepted: 請求已接受，但尚在處理中
//204 No Content: 請求成功，但未回傳任何內容
//3xx: 重新導向
//301 Moved Permanently: 資源已移至它處
//303 See Other: 回傳的內容可在它處取得（例如在用戶端發送了一個POST請求之後）
//304 Not Modified: 請求的資源並未修改（通常是用戶端發送了帶有If-Modified-Since或If-None-Match表頭的請求）
//4xx: 用戶端錯誤（用戶端不應retry原始請求）
//400 Bad Request: 通用狀態碼
//401 Unauthorized: 用戶端尚未驗證*
//403 Forbidden: 用戶端被禁止此請求*
//404 Not Found: 請求的資源不存在
//405 Method Not Allowed: 不支援請求的HTTP方法
//406 Not Acceptable: 不支援請求所要求的內容類型*（Accept表頭）
//415 Unsupported Media Type: 不支援請求所用的內容類型*（Content-Type表頭）
//5xx: 伺服器錯誤（用戶端可合理retry）
//500 Internal Server Error: 工程師要找bug了
//501 Not Implemented: 用戶端的請求目前未支援（也就是將來有可能支援）
//502 Bad Gateway: 上游的伺服器未回傳正確結果，一般是gateway或proxy server才會回傳此狀態碼
//503 Service Unavailable: 暫停服務（也就是過不久就會恢復服務──如果一切順利的話）
//504 Gateway Timeout: 上游的伺服器逾時，一般是gateway或proxy server才會回傳此狀態碼
//
//錯誤訊息
//回傳碼
define('E_SUCCESS', 0);        //成功
define('E_NOT_FOUND', 1);       //
define('E_DBCONNECTERROR', 2);       //資料庫連線錯誤
define('E_AUTHORITYNOTENOUGH', 3);     //權限不足
define('E_ACCESSTOKENERROR', 4);      //AccessToken錯誤
define('E_INPUTPARAMETERERROR', 5);     //輸入參數錯誤
define('E_ACCOUNTORPASSWORDERROR', 6);    //帳號或密碼錯誤
define('E_OLDPASSWORDERROR', 7);    //舊密碼錯誤
//使用者
define('E_USERIDNOTFOUND', 100);      //使用者編號不存在
define('E_USERACCOUNTNOTFOUND', 101);     //使用者帳號不存在
define('E_USERACCOUNTALREADYEXISTS', 102);    //使用者帳號已存在
define('E_USERSTATUSERROR', 103);       //使用者狀態錯誤
define('E_USERACCOUNTNOTACTIVE', 104);      //帳號未啟用
define('E_USERACCOUNTSTARTDATE', 105);      //帳號尚未到授權開始日期
define('E_USERACCOUNTENDDATE', 106);      //帳號已超過授權結束日期
define('E_LDAPCONNECTFAILED', 107);      //LDAP-Connect失敗
define('E_LDAPAUTHENTICATIONFAILED', 108);      //LDAP驗證失敗
//程式類別
define('E_PROGRAMCATEGORYIDNOTFOUND', 200);   //程式類別編號不存在
define('E_PROGRAMGUIDALREADYEXISTS', 201);   //程式GUID已存在
//程式
define('E_PROGRAMIDNOTFOUND', 300);     //程式編號不存在
define('E_PROGRAMSTATUSERROR', 301);      //程式狀態錯誤
//角色
define('E_ROLEIDNOTFOUND', 400);      //角色編號不存在
define('E_ROLESTATUSERROR', 401);      //角色狀態錯誤
//選單
define('E_MENUIDNOTFOUND', 500);      //選單編號不存在
define('E_MENURULEERROR', 501);      //選單規則錯誤
//操作紀錄
define('E_LOGIDNOTFOUND', 600);      //操作紀錄編號不存在
//系統資訊
define('E_SYSINFOIDNOTFOUND', 700);      //系統資訊編號不存在
//Banner
define('E_BANNERIDNOTFOUND', 800);      //Banner編號不存在
//市場行情
define('E_MARKETIDNOTFOUND', 900);      //市場行情編號不存在
//公司訊息
define('E_COMPANYIDNOTFOUND', 1000);      //公司訊息編號不存在
//政策宣導
define('E_PROPAGANDAIDNOTFOUND', 1100);      //政策宣導編號不存在
//友善連結
define('E_LINKSIDNOTFOUND', 1200);      //友善連結編號不存在
//服務據點
define('E_LOCATIONIDNOTFOUND', 1300);      //服務據點編號不存在
//職缺訊息
define('E_VACANCYIDNOTFOUND', 1400);      //職缺訊息編號不存在
//薪酬福利
define('E_BENEFITSIDNOTFOUND', 1500);      //薪酬福利編號不存在
//貨幣市場小百科
define('E_ENCYCLOPEDIAIDNOTFOUND', 1600);      //貨幣市場小百科編號不存在
//業務簡介
define('E_BUSINESSIDNOTFOUND', 1700);      //業務簡介編號不存在
//公司治理情形
define('E_GOVERNANCEIDNOTFOUND', 1800);      //公司治理情形編號不存在
//公司治理規範
define('E_NORMIDNOTFOUND', 1900);      //公司治理規範編號不存在
//財務報告類別
define('E_FINANCIALCATEGORYIDNOTFOUND', 2000);      //財務報告類別編號不存在
//財務報告
define('E_FINANCIALIDNOTFOUND', 2100);      //財務報告編號不存在
//年報
define('E_ANNUALIDNOTFOUND', 2200);      //年報編號不存在
//永續發展
define('E_DEVELOPMENTIDNOTFOUND', 2300);      //永續發展編號不存在
//政策及規範
define('E_POLICYIDNOTFOUND', 2400);      //政策及規範編號不存在
//年度執行情形
define('E_SITUATIONIDNOTFOUND', 2500);      //年度執行情形編號不存在
//其他
define('E_UNKNOWNERROR', 9900);       //未知的錯誤

//取得網頁回應代碼
function GetResponseCode($code) {
    switch ($code) {
        case E_SUCCESS: return D_SUCCESS;
        case E_NOT_FOUND: return D_NOT_FOUND;
        case E_AUTHORITYNOTENOUGH: return D_METHOD_NOT_ALLOWED;
        default: return D_INTERNAL_SERVER_ERROR;
    }
}

//依據狀態碼取得狀態訊息說明
function GetResultMessage($code) {
    switch ($code) {
        default:
        case E_UNKNOWNERROR: return '未知的錯誤';
        case E_SUCCESS: return '執行成功';
        case E_NOT_FOUND: return 'NOT FOUND';
        case E_DBCONNECTERROR: return '資料庫連線錯誤';
        case E_AUTHORITYNOTENOUGH: return '權限不足';
        case E_ACCESSTOKENERROR: return 'AccessToken錯誤';
        case E_INPUTPARAMETERERROR: return '輸入參數錯誤';
        case E_ACCOUNTORPASSWORDERROR: return '帳號或密碼錯誤';
        case E_OLDPASSWORDERROR: return '舊密碼錯誤';

        case E_USERIDNOTFOUND: return '使用者編號不存在';
        case E_USERACCOUNTNOTFOUND: return '使用者帳號不存在';
        case E_USERACCOUNTALREADYEXISTS: return '使用者帳號已存在';
        case E_USERSTATUSERROR: return '使用者狀態錯誤';
        case E_USERACCOUNTNOTACTIVE: return '使用者帳號未啟用';
        case E_USERACCOUNTSTARTDATE: return '帳號尚未到授權開始日期';
        case E_USERACCOUNTENDDATE: return '帳號已超過授權結束日期';
        case E_LDAPCONNECTFAILED: return 'LDAP連線失敗';
        case E_LDAPAUTHENTICATIONFAILED: return 'LDAP驗證失敗';

        case E_PROGRAMCATEGORYIDNOTFOUND: return '程式類別編號不存在';
        case E_PROGRAMGUIDALREADYEXISTS: return '程式GUID已存在';

        case E_PROGRAMIDNOTFOUND: return '程式編號不存在';
        case E_PROGRAMSTATUSERROR: return '程式狀態錯誤';

        case E_ROLEIDNOTFOUND: return '角色編號不存在';
        case E_ROLESTATUSERROR: return '角色狀態錯誤';

        case E_MENUIDNOTFOUND: return '選單編號不存在';
        case E_MENURULEERROR: return '選單規則錯誤';

        case E_LOGIDNOTFOUND: return '操作紀錄編號不存在';

        case E_SYSINFOIDNOTFOUND: return '系統資訊編號不存在';

        case E_BANNERIDNOTFOUND: return 'Banner編號不存在';

        case E_MARKETIDNOTFOUND: return '市場行情編號不存在';
        case E_COMPANYIDNOTFOUND: return '公司訊息編號不存在';
        case E_PROPAGANDAIDNOTFOUND: return '政策宣導編號不存在';
        case E_LINKSIDNOTFOUND: return '友善連結編號不存在';

        case E_LOCATIONIDNOTFOUND: return '服務據點編號不存在';
        case E_VACANCYIDNOTFOUND: return '職缺訊息編號不存在';
        case E_BENEFITSIDNOTFOUND: return '薪酬福利編號不存在';
        case E_ENCYCLOPEDIAIDNOTFOUND: return '貨幣市場小百科編號不存在';

        case E_BUSINESSIDNOTFOUND: return '業務簡介編號不存在';

        case E_GOVERNANCEIDNOTFOUND: return '公司治理情形編號不存在';
        case E_NORMIDNOTFOUND: return '公司治理規範編號不存在';

        case E_FINANCIALCATEGORYIDNOTFOUND: return '財務報告類別編號不存在';
        case E_FINANCIALIDNOTFOUND: return '財務報告編號不存在';

        case E_ANNUALIDNOTFOUND: return '年報編號不存在';

        case E_DEVELOPMENTIDNOTFOUND: return '永續發展編號不存在';

        case E_POLICYIDNOTFOUND: return '政策及規範編號不存在';

        case E_SITUATIONIDNOTFOUND: return '年度執行情形編號不存在';
    }
}

?>