<?php

require_once 'config.php';

//顏色**************************************************************************************************************
function RGB2RGBA($rgb, $a) {
    $new = str_replace("rgb", "rgba", $rgb);
    $astr = "," . $a . ")";
    $new = str_replace(")", $astr, $new);
    return $new;
}

function HEX2RGB($hex, $alpha = false) {
    $hex = str_replace('#', '', $hex);
    $length = strlen($hex);
    $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
    $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
    $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
    if ($alpha) {
        $rgb['a'] = $alpha;
    }
    return $rgb;
}

//日期、時間**************************************************************************************************************
//取得目前日期
function GetCurrentDateTime() {
    return date('Y-m-d H:i:s', time());
}

//取得年份
function GetYear($date) {
    $timestamp = strtotime($date);
    return date("Y", $timestamp);
}

//取得月份
function GetMonth($date) {
    $timestamp = strtotime($date);
    return date("m", $timestamp);
}

//取得日
function GetDay($date) {
    $timestamp = strtotime($date);
    return date("d", $timestamp);
}

//取得日期字串
function GetDateString($date, $format = "Y/m/d") {
    if (!IsValidDate($date))
        return "";
    if ($date == "0000-00-00 00:00:00" || $date == "0000-00-00")
        return "";
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

//取得日期、時間字串
function GetDateTimeString($date, $format = "Y/m/d H:i:s") {
    if (!IsValidDate($date))
        return "";
    if ($date == "0000-00-00 00:00:00" || $date == "0000-00-00")
        return "";
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

//檢查輸入日期是否在指定日期範圍內
function IsinDateRange($start_date, $end_date, $check_date) {
    $start = strtotime($start_date);
    $end = strtotime($end_date) + 86400;
    $check = strtotime($check_date);
    if ($check >= $start && $check < $end)
        return true;
    else
        return false;
}

//字串**************************************************************************************************************
//數字千分位格式化
function GetNumberFormatString($number, $decimals = 0) {
    return number_format($number, $decimals);
}

//輸入**************************************************************************************************************
//取得request
function request($name) {
    if (isset($_GET[$name])) {
        $value = $_GET[$name];
    } else if (isset($_POST[$name])) {
        $value = $_POST[$name];
    } else {
        $value = "";
    }
    return $value;
}

function request_str($name) {
    $value = request($name);
    return $value;
}

function request_num($name) {
    $value = request($name);
    if (is_numeric($value)) {
        return $value;
    } else {
        return 0;
    }
}

function request_dat($name, $default = "") {
    return request_date($name, $default);
}

function request_date($name, $default = "") {
    $value = request($name);
    if (strlen($value) >= 8) {
        $dat = strtotime($value);
        if ($dat) {
            return $value;
        } else {
            return $default;
        }
    } else {
        return $default;
    }
}

function request_pag($name) {
    $page = request_num($name);
    if ($page == "") {
        return 1;
    } else if ($page < 1) {
        return 1;
    } else {
        return $page;
    }
}

function request_arr($name) {
    return request_ary($name);
}

function request_ary($name) {
    $data = request($name);
    if (gettype($data) == "array") {
        return $data;
    } else {
        return array();
    }
}

function request_upl($name) {
    $f = new UploadFile();
    $f->query($name);
    return $f;
}

function request_ag() {
    return $_SERVER['HTTP_USER_AGENT'];
}

function request_ip() {
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    if ($ip == "::1")
        $ip = "127.0.0.1";
    return $ip;
}

function request_cd() {
    return datetime();
}

//URL**************************************************************************************************************
//http://aaa.bbb.ccc/xx/yy/zz.php?a=1&b=2
//$_SERVER["HTTPS"]                 //on off
//$_SERVER["HTTP_HOST"]             //aaa.bbb.ccc   or  aaa.bbb.ccc:81
//$_SERVER["REQUEST_URI"]           // /xx/yy/zz.php?a=1&b=2
//$_SERVER["SCRIPT_NAME"]           // /xx/yy/zz.php
//$_SERVER["QUERY_STRING"]          // a=1&b=2
//basename($_SERVER["SCRIPT_NAME"]) // zz.php取完整 檔名
//dirname($_SERVER["SCRIPT_NAME"])  // /xx/yy取完整 PATH

function Root() {
    return $_SERVER['PATH_TRANSLATED'];
}

function req_protocol() {
    if (isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"] == 'on') {
        return "https://";
    } else {
        return "http://";
    }
}

//http://www.abc.com/dir/aaa.php?a=1
function request_full_url() {
    return req_protocol() . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}

//http://www.abc.com/dir/
function request_url() {
    $res = req_protocol() . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]);
    if (right($res, 1) != "/") {
        $res .= "/";
    }
    return $res;
}

//http://www.abc.com/
function request_host() {
    return req_protocol() . $_SERVER["HTTP_HOST"] . "/";
}

//aaa.php
function request_sc() {
    return basename($_SERVER['SCRIPT_NAME']);
}

function request_ref() {
    return $_SERVER["HTTP_REFERER"];
}

//Session操作**************************************************************************************************************
//取得session
function session($name) {
    return getSession($name);
}

function getSession($name) {
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    } else {
        return "";
    }
}

function setSession($name, $value) {
    $_SESSION[$name] = $value;
}

function unSession($name) {
    unset($_SESSION["$name"]);
}

//系統警告及轉向**************************************************************************************************************
function alert($msg) {
    echo("<script>alert('" . $msg . "');</script>");
}

function alert_die($msg) {
    echo("<script>alert('" . $msg . "');</script>");
    die("");
}

function redir($dir) {
    header("Location: {$dir}");
    exit();
}

function redir_js($dir) {
    die("<script>location.replace('" . $dir . "');</script>");
}

function alert_back($msg) {
    die("<script>alert('" . $msg . "');history.back();</script>");
}

function alert_redir($msg, $dir) {
    die("<script>alert('" . $msg . "');location.replace('" . $dir . "');</script>");
}

function alert_go($msg, $dir) {
    die("<script>alert('" . $msg . "');location.href='" . $dir . "';</script>");
}

function alert_close($msg) {
    die("<script>alert('" . $msg . "');window.close();</script>");
}

//檢查**************************************************************************************************************
//日期時間字串是否合法
function IsValidDate($dateString) {
    if (empty($dateString))
        return false;
    else
        return (bool) strtotime($dateString);
}

//檢查是否為有效的Email
function IsValidEmail($address) {
    // check an email address is possibly valid
    return preg_match('/^[a-z0-9.+_-]+@([a-z0-9-]+.)+[a-z]+$/i', $address);
}

//檢查是否為手機瀏覽
function IsMobile() {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return true;
    } else {
        return false;
    }
}

//檢查陣列中是否包含所有指定的key
function CheckArrayKeys($array, $keys) {
    if ($array == null)
        return false;

    foreach ($keys as $key => $val) {
        if (!array_key_exists($val, $array))
            return false;
    }
    return true;
}

function GetPreviousPageName() {
    if (isset($_SERVER["HTTP_REFERER"])) {
        $previous_page = explode('/', $_SERVER["HTTP_REFERER"]);
        $previous_page = explode('.', $previous_page[count($previous_page) - 1])[0];
        return $previous_page;
    } else
        return "";
}

function GetClearPhoneString($string) {
    return preg_replace('/(?<!^)\D|^[^+\d]/', '', $string);
}

//File**************************************************************************************************************
function SaveUploadFile($filename, $filestring, $path, $autofilename = true) {
    $fullpath = ROOT_PATH . BASE_PATH . $path;
    if (empty(ROOT_PATH))
        $fullpath = $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . $path;
    $fullpath = iconv("UTF-8", "BIG5", $fullpath);
    if ($autofilename == true) {
        do {
            $filename = time() . '.' . preg_replace('/^.*\.([^.]+)$/D', '$1', $filename);
        } while (file_exists($fullpath . $filename));
    }
    if (!file_exists($fullpath . $filename)) {
        $current_string = $filestring;
        list($type, $current_string) = explode(';', $current_string);
        list(, $current_string) = explode(',', $current_string);
        $current_string = base64_decode($current_string);
        if (file_put_contents($fullpath . $filename, $current_string) == false)
            return "";
        else
            return $filename;
    } else
        return "";
}

//網頁伺服器登入
function WebServerLogin($account, $password) {
    $resultMessage = "";
    $resultData = "";
    $login = array("account" => $account, "password" => $password);
    if (CallAPI('POST', WEBAPI_USER_Login, NULL, json_encode($login), $resultMessage, $resultData) == 200) {
        if (array_key_exists('token', $resultData)) {
            return $resultData['token'];
        } else
            return null;
    }
    return null;
}

//網頁伺服器登出
function WebServerLogout($token) {
    $resultMessage = "";
    $resultData = "";
    if ($token != null) {
        CallAPI('POST', WEBAPI_USER_Logout, $token, NULL, $resultMessage, $resultData);
    }
    return true;
}

?>