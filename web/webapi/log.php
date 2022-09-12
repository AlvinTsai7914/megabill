<?php

require_once '_webapi_tools.php';

//查詢操作紀錄GET
function Log_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "999E2E30F65D4DDAD416036813A8993B";
    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $onlycount = false;
    if (isset($request["count"]) && json_decode($request["count"]) == true)
        $onlycount = true;

    $query = Log_GetBaseQueryString($onlycount);

    if (isset($args[0]) && $args[0] != 0) {
        $id = $args[0];
        $query = $query . " AND id='$id'";
    }

    if (isset($request["query"]))
        $query = $query . " AND (" . $request["query"] . ")";

    if (isset($request["order"]))
        $query = $query . " ORDER BY " . $request["order"];
    else
        $query = $query . " ORDER BY c_time ASC";

    if ($onlycount == false && isset($request["length"]) && $request["length"] > 0) {
        if (isset($request["start"]))
            $query = $query . " LIMIT " . $request["start"] . "," . $request["length"];
        else
            $query = $query . " LIMIT " . $request["length"];
    }

    $result = $dbconnect->query($query);
    if ($result) {
        if ($onlycount) {
            $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $resultData = $r["COUNT(`id`)"];
        } else {
            while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultData[] = Log_BuildQueryResultData($r);
            }
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢操作紀錄基本QueryString
function Log_GetBaseQueryString($onlycount) {
    if ($onlycount)
        return "SELECT COUNT(`id`) FROM `log_view` WHERE 1";
    else
        return "SELECT `id`, `user_id`, `user_account`, `user_name`, `ip`, `program_id`, `program_name`, `verb`, `args`, `file`, `resultCode`, `resultMessage`, `resultData`, `c_time` FROM `log_view` WHERE 1";
}

//建立查詢操作紀錄回傳資料
function Log_BuildQueryResultData($array) {
    return array("id" => $array["id"],
        "user_id" => $array["user_id"],
        "user_account" => $array["user_account"],
        "user_name" => $array["user_name"],
        "ip" => $array['ip'],
        "program_id" => $array['program_id'],
        "program_name" => $array['program_name'],
        "verb" => $array['verb'],
        "args" => $array['args'],
        "file" => $array['file'],
        "resultCode" => $array['resultCode'],
        "resultMessage" => $array['resultMessage'],
        "resultData" => $array['resultData'],
        "c_time" => $array['c_time']);
}

function AddLog($dbconnect, $accesstoken, $programguid, $method, $endpoint, $verb, $args, $file, $resultCode, $resultMessage, $resultData) {
    if ($endpoint == "log")
        return;
    date_default_timezone_set('Asia/Taipei');
    $user_id = 0;
    $r = GetUserIDByAccessToken($dbconnect, $accesstoken, $user_id);

    //檢查若角色編號為1：系統管理員時，不需要記錄Log
    //    $find = false;
    //    $role_ids = null;
    //    if (GetRoleIDByAccessToken($dbconnect, $accesstoken, $role_ids) == true) {
    //        foreach ($role_ids as $role_id) {
    //            if ($role_id != 1) {
    //                $find = true;
    //                break;
    //            }
    //        }
    //    } else
    //        return true;
    //
    //    if ($find == false)
    //        return true;

    $program_id = 0;
    GetProgramIDByGUID($dbconnect, $programguid, $program_id);

    //使用者登入時不記錄帳號、密碼資料
    if ($programguid == null)
        $file = "";

    $ip = request_ip();
    $headers = getallheaders();
    if (isset($headers["client_ip"]))
        $ip = $headers["client_ip"];

    $args = addslashes(json_encode($args, JSON_UNESCAPED_UNICODE));
    $file = addslashes(json_encode($file, JSON_UNESCAPED_UNICODE));
    $resultData = addslashes(json_encode($resultData, JSON_UNESCAPED_UNICODE));
    $query = "INSERT INTO `log`(`user_id`, `ip`, `program_id`, `method`, `endpoint`, `verb`, `args`, `file`, `resultCode`, `resultMessage`, `resultData`) "
            . "VALUES ('$user_id','$ip','$program_id','$method','$endpoint','$verb','$args','$file','$resultCode','$resultMessage','$resultData')";

    @$dbconnect->query($query);
}

?>