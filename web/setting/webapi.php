<?php

const WEBAPI_PROGRAM_CATEGORY = '/programcategory'; //查詢程式類別

const WEBAPI_ROLE = '/role';    //查詢角色
const WEBAPI_ROLE_Menu = '/role/menu';    //查詢角色選單
const WEBAPI_ROLE_Program = '/role/program';    //查詢角色程式
const WEBAPI_ROLE_RregisterProgram = '/role/registerprogram';    //角色註冊程式
const WEBAPI_ROLE_RegisterAllPrograms = '/role/registerallprograms';    //角色註冊所有程式
const WEBAPI_ROLE_UnregisterAllPrograms = '/role/unregisterallprograms';    //角色註銷所有程式
const WEBAPI_ROLE_RregisterMenu = '/role/registermenu';    //角色註冊選單
const WEBAPI_ROLE_UnregisterAllMenu = '/role/unregisterallmenus';    //角色註銷所有選單

const WEBAPI_USER = '/user';    //查詢使用者
const WEBAPI_USER_Login = '/user/login';    //使用者登入
const WEBAPI_USER_Logout = '/user/logout';    //使用者登出
const WEBAPI_USER_LoginUserData = '/user/loginuserdata'; //查詢登入使用者資料
const WEBAPI_USER_Password = '/user/password'; //修改使用者密碼
const WEBAPI_USER_LoginUserPassword = '/user/loginuserpassword'; //修改登入使用者密碼
const WEBAPI_USER_LoginUserMenuTree = '/user/loginusermenutree'; //查詢登入使用者樹狀選單
const WEBAPI_USER_LoginUserProgram = '/user/loginuserprogram'; //查詢登入使用者程式
const WEBAPI_USER_RegisterRole = '/user/registerrole'; //使用者註冊角色
const WEBAPI_LOG = '/log';    //查詢操作記錄

const WEBAPI_SYSINFO = '/sysinfo';    //系統資訊
const WEBAPI_SYSINFO_ABOUT = '/sysinfo/about';    //關於兆票
const WEBAPI_SYSINFO_ABOUT_EN = '/sysinfo/abouten';    //關於兆票En
const WEBAPI_SYSINFO_CREDIT = '/sysinfo/credit';    //信用評等資訊
const WEBAPI_SYSINFO_SITUATIONRESEARCH = '/sysinfo/situationresearch';    //資金情勢研判
const WEBAPI_BANNER = '/banner';    //Banner
const WEBAPI_BANNER_ListOrder = '/banner/listorder';    //Banner排序
const WEBAPI_MARKET = '/market';    //市場行情
const WEBAPI_MARKET_ListOrder = '/market/listorder';    //市場行情排序
const WEBAPI_COMPANY = '/company';    //公司訊息
const WEBAPI_COMPANY_ListOrder = '/company/listorder';    //公司訊息排序
const WEBAPI_PROPAGANDA = '/propaganda';    //政策宣導
const WEBAPI_PROPAGANDA_ListOrder = '/propaganda/listorder';    //政策宣導排序
const WEBAPI_LINKS = '/links';    //友善連結
const WEBAPI_LINKS_ListOrder = '/links/listorder';    //友善連結排序
const WEBAPI_LOCATION = '/location';    //服務據點
const WEBAPI_LOCATION_ListOrder = '/location/listorder';    //服務據點排序
const WEBAPI_VACANCY = '/vacancy';    //職缺訊息
const WEBAPI_VACANCY_ListOrder = '/vacancy/listorder';    //職缺訊息排序
const WEBAPI_BENEFITS = '/benefits';    //薪酬福利
const WEBAPI_BENEFITS_ListOrder = '/benefits/listorder';    //薪酬福利排序
const WEBAPI_ENCYCLOPEDIA = '/encyclopedia';    //貨幣市場小百科
const WEBAPI_ENCYCLOPEDIA_ListOrder = '/encyclopedia/listorder';    //貨幣市場小百科排序
const WEBAPI_BUSINESS = '/business';    //業務簡介
const WEBAPI_BUSINESS_ListOrder = '/business/listorder';    //業務簡介排序
const WEBAPI_GOVERNANCE = '/governance';    //公司治理情形
const WEBAPI_GOVERNANCE_ListOrder = '/governance/listorder';    //公司治理情形排序
const WEBAPI_NORM = '/norm';    //公司治理規範
const WEBAPI_NORM_ListOrder = '/norm/listorder';    //公司治理規範排序
const WEBAPI_FINANCIAL_CATEGORY = '/financialcategory';    //財務報告類別
const WEBAPI_FINANCIAL_CATEGORY_ListOrder = '/financialcategory/listorder';    //財務報告類別排序
const WEBAPI_FINANCIAL = '/financial';    //財務報告
const WEBAPI_FINANCIAL_ListOrder = '/financial/listorder';    //財務報告排序
const WEBAPI_ANNUAL = '/annual';    //年報
const WEBAPI_ANNUAL_ListOrder = '/annual/listorder';    //年報排序
const WEBAPI_DEVELOPMENT = '/development';    //永續發展
const WEBAPI_DEVELOPMENT_ListOrder = '/development/listorder';    //永續發展排序
const WEBAPI_POLICY = '/policy';    //政策及規範
const WEBAPI_POLICY_ListOrder = '/policy/listorder';    //政策及規範排序
const WEBAPI_SITUATION = '/situation';    //年度執行情形
const WEBAPI_SITUATION_ListOrder = '/situation/listorder';    //年度執行情形排序

function CallAPI($method, $requestURL, $access_token, $json_body_data, &$resultMessage, &$resultData) {
    $curl = curl_init();    //curl初始

    $header[] = "client_ip:" . request_ip();
    if ($access_token != NULL) {
        $header[] = "token:" . $access_token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    }

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);    //用POST方式傳遞
            if ($json_body_data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json_body_data);  //要POST傳送的資料
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($json_body_data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json_body_data);  //要POST傳送的資料
            }
            //curl_setopt($curl, CURLOPT_PUT, 1);
            //curl_setopt($curl, CURLOPT_INFILE, $json_body_data);
            //curl_setopt($curl, CURLOPT_INFILESIZE, strlen($json_body_data));
            //curl_setopt($curl, CURLOPT_PUT, 1);     //用PUT方式傳遞
            //if ($json_body_data)
            //    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_body_data);  //要PUT傳送的資料
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            if ($json_body_data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $json_body_data);  //要POST傳送的資料
        default:                                    //預設為GET
            if ($json_body_data)
                $url = sprintf("%s?%s", $url, http_build_query($json_body_data));
    }

    //Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    $url = API_SERVER . API_BASEURL . $requestURL;

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);
    $resultCode = NULL;

    if (!ParseWebAPIResult($result, $resultCode, $resultMessage, $resultData)) {
        $resultCode = 500;
        $resultMessage = "Internal Server Error";
        $resultData = "API回傳格式錯誤";
    }
    return $resultCode;
}

function ParseWebAPIResult($result, &$resultCode, &$resultMessage, &$resultData) {
    $returnArray = json_decode($result, TRUE);
    if (is_array($returnArray) && array_key_exists("ResultCode", $returnArray)) {
        $resultCode = $returnArray['ResultCode'];
        if (array_key_exists("ResultMessage", $returnArray)) {
            $resultMessage = $returnArray['ResultMessage'];
            if (array_key_exists("ResultData", $returnArray)) {
                $resultData = $returnArray["ResultData"];
                return TRUE;
            } else
                return FALSE;
        } else
            return FALSE;
    } else {
        $resultMessage = "";
        if (is_array($returnArray) && array_key_exists("resultMessage", $returnArray))
            $resultMessage = $returnArray['resultMessage'];
        return FALSE;
    }
}

?>