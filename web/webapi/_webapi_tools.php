<?php

require_once '../setting/tools.php';
require_once 'config.php';
require_once 'define.php';

//檢查程式執行權限
function CheckAccess($dbconnect, $token, $programguid, &$user_id) {
    if (!$dbconnect)
        return E_DBCONNECTERROR;

    //根據token，在loginuser中尋找userID
    $query = "SELECT `user_id` FROM `login_user` WHERE token='$token'";

    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows == 1) {
            if ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                //根據userID及programguid在useer_role_program_view尋找資料
                $user_id = $r['user_id'];
                if ($programguid == null)
                    return E_SUCCESS;

                $query = "SELECT `user_id` FROM `user_role_program_view` WHERE user_id='$user_id' && program_guid = '$programguid' && user_status = '0' && role_status = '0' && program_status = '0' && program_category_status = '0'";

                if ($result = $dbconnect->query($query)) {
                    if ($result->num_rows >= 1) {
                        return E_SUCCESS;
                    } else
                        return E_AUTHORITYNOTENOUGH;
                } else
                    return $dbconnect->error;
            } else
                return $dbconnect->error;
        } else
            return E_ACCESSTOKENERROR;
    } else
        return $dbconnect->error;
}

//根據AccessToken取得UserID
function GetUserIDByAccessToken($dbconnect, $token, &$user_id) {
    $query = "SELECT `user_id` FROM `login_user` WHERE token='$token'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows == 1) {
            if ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $user_id = $r['user_id'];
                return true;
            }
        }
    }
    return false;
}

//根據AccessToken取得RoleID
function GetRoleIDByAccessToken($dbconnect, $token, &$role_ids) {
    $user_id = 0;
    if (GetUserIDByAccessToken($dbconnect, $token, $user_id) == true) {
        $query = "SELECT `role_id` FROM `role_user` WHERE user_id='$user_id'";
        $result = $dbconnect->query($query);
        if ($result) {
            if ($result->num_rows >= 1) {
                while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $role_ids[] = $r['role_id'];
                }
                return true;
            } else
                return false;
        } else
            return false;
    } else
        return false;
}

//根據ProgramGUID取得ProgramID
function GetProgramIDByGUID($dbconnect, $programguid, &$program_id) {
    $query = "SELECT `id` FROM `program` WHERE guid='$programguid'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows == 1) {
            if ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $program_id = $r['id'];
                return true;
            }
        }
    }
    return false;
}

//產生GUID
function CreateGuid() {
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $hyphen = ""; //chr(45); // "-"
    $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
    return $uuid;
}

//查詢指定欄位的最大值
function FindFieldMaxValue($dbconnect, $table, $field) {
    $query = "SELECT MAX($field) from $table";
    if ($result = $dbconnect->query($query)) {
        $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $r["MAX($field)"];
    } else
        return 0;
}

//根據輸入欄位查詢資料是否存在
function CheckDataExistByFieldValue($dbconnect, $table, $field, $value) {
    $query = "SELECT $field from $table WHERE $field='$value'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    } else
        return false;
}

//根據輸入2個欄位查詢資料是否存在
function CheckDataExistByFieldValue2($dbconnect, $table, $field1, $field2, $value1, $value2) {
    $query = "SELECT $field1 from $table WHERE $field1='$value1' AND $field2='$value2'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    } else
        return false;
}

//根據輸入3個欄位查詢資料是否存在
function CheckDataExistByFieldValue3($dbconnect, $table, $field1, $field2, $field3, $value1, $value2, $value3) {
    $query = "SELECT $field1 from $table WHERE $field1='$value1' AND $field2='$value2' AND $field3='$value3'";
    if ($result = $dbconnect->query($query)) {
        if ($result->num_rows > 0)
            return true;
        else
            return false;
    } else
        return false;
}

//字串加密
function EncryptString($str) {
    $encrypted = openssl_encrypt($str, 'aes-256-cbc', PASSWORK_KEY, OPENSSL_RAW_DATA, PASSWORK_IV);
    return base64_encode($encrypted);
}

//字串解密
function DecryptString($str) {
    return openssl_decrypt($str, 'aes-256-cbc', PASSWORK_KEY, OPENSSL_RAW_DATA, PASSWORK_IV);
}

//取得指定長度的隨機字串
function GetRandomString($length = 32) {
    if (function_exists('openssl_random_pseudo_bytes')) {
        $bytes = openssl_random_pseudo_bytes($length * 2);
        if ($bytes === false)
            throw new RuntimeException('Unable to generate a random string');
        return substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $length);
    }
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

//字串增加Slashes
function StringAddSlashes($str) {
    if (is_array($str))
        return array_map(__METHOD__, $str);

    if (!empty($str) && is_string($str)) {
        return addslashes($str);
        //return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $str);
    }
    return $str;
}

//取得語言數量
function GetLanguageCount($dbconnect) {
    if (!$dbconnect)
        return 0;
    $query = "SELECT COUNT(*) AS `count` FROM `language` WHERE 1";
    $result = $dbconnect->query($query);
    if ($result) {
        $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $r['count'];
    } else
        return 0;
}

?>