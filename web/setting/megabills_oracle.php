<?php

require_once 'config.php';

//訊息種類
const NEWS_TYPE_D = 'D'; //債券評論
const NEWS_TYPE_I = 'I'; //票券評論
const NEWS_TYPE_W = 'W'; //央行動態
const NEWS_TYPE_X = 'X'; //拆款行情
const NEWS_TYPE_Y = 'Y'; //匯市行情
const NEWS_TYPE_Z = 'Z'; //債券行情
//縮寫註記
const BREV_FLAG_Y = 'Y';  //縮寫
const BREV_FLAG_N = 'N';  //不縮寫
//字串種類
const STR_KIND_NDATE = 'NDATE';
const STR_KIND_TEXT_1 = 'TEXT_1';
const STR_KIND_TEXT_2 = 'TEXT_2'; //只有債券使用
const STR_KIND_TEXT_3 = 'TEXT_3'; //只有債券使用
const STR_KIND_TEXT_4 = 'TEXT_4'; //只有債券使用
//幣別
const DL_TYPE_TWD = 'TWD'; //新台幣
const DL_TYPE_USD = 'USD'; //美元
const DL_TYPE_CNH = 'CNH'; //人民幣
const DL_TYPE_JPY = 'JPY'; //日圓
const DL_TYPE_EUR = 'EUR'; //歐圓
const DL_TYPE_FR = 'FR'; //外幣
//
//市場別
const PS_KIND_P = 'P'; //初級
const PS_KIND_S = 'S'; //次級
const PS_KIND_D = 'D'; //天期列列
//買賣別
const SB_ID_S = 'S'; //賣出
const SB_ID_B = 'B'; //買進
//票別
const NO1_CP2 = 'CP2';
const NO1_CP1 = 'CP1';
const NO1_BA = 'BA';
const NO1_CD = 'CD';
const NO1_ABCP = 'ABCP';
const NO1_BD = 'BD';
//訊息種類
const INDEX_TYPE_ALL = '%'; //全部
const INDEX_TYPE_0 = '0'; //年月
const INDEX_TYPE_1 = '1'; //總體經濟指標
const INDEX_TYPE_2 = '2'; //金融及貿易指標
const INDEX_TYPE_3 = '3'; //貨幣市場利率指標
//訊息子種類
const INDEX_SUB_TYPE_ALL = '%'; //全部(預設)
const INDEX_SUB_TYPE_OTHER = ''; //其它.個別值

function megabills_Connect() {
    if (ORACLE_CONNECT == false)
        return null;
    try {
        $connect = @oci_connect(ORACLE_USERNAME, ORACLE_PASSWORD, ORACLE_CONNECTION_STRING, 'utf8');
        if (!$connect) {
            $e = oci_error();
            //throw new ErrorException(htmlentities($e['message']));
            return null;
        } else {
            return $connect;
        }
    } catch (Exception $e) {
        return null;
    }
}

function megabills_Disconnect($connect) {
    if (empty($connect))
        return;
    oci_close($connect);
}

function get_cm010_web_ndate($connect, $dl_type) {
    if (empty($connect))
        return "";
    $date = new DateTime("now");
    $date->modify("-1911 year");
    $base_ndate = ltrim($date->format("Ymd"), "0");
    $key = strtoupper("ec_pk.get_cm010_web_ndate('$dl_type',$base_ndate)");
    $query_string = "select " . $key . " from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    if (is_array($res) && count($res) == 1 && array_key_exists($key, $res)) {
        return $res[$key][0];
    } else {
        return "";
    }
}

function get_news_data($connect, $base_ndate, $news_type, $brev_flag, &$data) {
    $data = null;
    if (empty($connect))
        return;

    $key0 = strtoupper("ec_pk.get_news_data($base_ndate,'$news_type','$brev_flag','" . STR_KIND_NDATE . "')");
    $key1 = strtoupper("ec_pk.get_news_data($base_ndate,'$news_type','$brev_flag','" . STR_KIND_TEXT_1 . "')");
    $key2 = strtoupper("ec_pk.get_news_data($base_ndate,'$news_type','$brev_flag','" . STR_KIND_TEXT_2 . "')");
    $key3 = strtoupper("ec_pk.get_news_data($base_ndate,'$news_type','$brev_flag','" . STR_KIND_TEXT_3 . "')");
    $key4 = strtoupper("ec_pk.get_news_data($base_ndate,'$news_type','$brev_flag','" . STR_KIND_TEXT_4 . "')");
    $query_string = "select " . $key0 . "," . $key1 . "," . $key2 . "," . $key3 . "," . $key4 . " from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    if (is_array($res) && array_key_exists($key0, $res)) {
        $data["DATE"] = $res[$key0][0];
    }
    if ($news_type != NEWS_TYPE_D) {
        if (is_array($res) && array_key_exists($key1, $res)) {
            $data["TEXT"][] = $res[$key1][0];
        }
    } else {
        if (is_array($res) && array_key_exists($key2, $res)) {
            $data["TEXT"][] = $res[$key2][0];
        }
        if (is_array($res) && array_key_exists($key3, $res)) {
            $data["TEXT"][] = $res[$key3][0];
        }
        if (is_array($res) && array_key_exists($key4, $res)) {
            $data["TEXT"][] = $res[$key4][0];
        }
    }
    return;
}

function get_ec_rate_list($connect, $dl_type, $ndate, $ps_kind, $sb_id, $no1, &$data) {
    $data = null;
    if (empty($connect))
        return;

    $key = "EC_RATE_LIST";
    $query_string = "select ec_pk.get_ec_rate_list('$dl_type', $ndate, '$ps_kind', '$sb_id', '$no1') ec_rate_list from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    $separator = "$$";
    if (is_array($res) && array_key_exists($key, $res)) {
        if (!empty($res["EC_RATE_LIST"][0]))
            $data = explode($separator, $res["EC_RATE_LIST"][0]);
        else
            $data = null;
    }
    return;
}

function get_bd_rate($connect, $dl_type, $ndate, $ord, &$data) {
    $data = null;
    if (empty($connect))
        return;

    $key = "ORD_STR";
    $query_string = "select ec_pk.get_bd_rate('$dl_type',$ndate, $ord) ord_str from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    $separator = "$$";
    if (is_array($res) && count($res) == 1 && array_key_exists($key, $res)) {
        if (!empty($res["ORD_STR"][0]))
            $data = explode($separator, $res["ORD_STR"][0]);
        else
            $data = null;
    }
    return;
}

function get_index_content($connect, $ndate, $index_type, $index_sub_type, $ord, &$data) {
    $date = null;
    $data = null;
    if (empty($connect))
        return;
    $key = strtoupper("ec_pk.get_index_data($ndate,'" . INDEX_TYPE_0 . "','$index_sub_type',$ord)");
    $query_string = "select " . $key . " from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    $separator = "$$";
    if (is_array($res) && count($res) == 1 && array_key_exists($key, $res)) {
        if (!empty($res["$key"][0]))
            $date = explode($separator, $res["$key"][0]);
        else
            $date = null;
    }
    $data = null;
    $key = strtoupper("ec_pk.get_index_data($ndate,'$index_type','$index_sub_type',$ord)");
    $query_string = "select " . $key . " from dual";
    $s = oci_parse($connect, $query_string);
    oci_execute($s);
    $res = "";
    oci_fetch_all($s, $res);
    $separator = "$$";
    if (is_array($res) && count($res) == 1 && array_key_exists($key, $res)) {
        if (!empty($res["$key"][0]))
            $data = explode($separator, $res["$key"][0]);
        else
            $data = null;
    }

    //if ($index_type == INDEX_TYPE_1 || $index_type == INDEX_TYPE_2) {
    //    $data[0] = $date[0];
    //}
    return;
}

function NDateToYMDString($ndate) {
    if (empty($ndate))
        return "";
    $ndate = str_pad($ndate, 7, "0", STR_PAD_LEFT);
    $date = new DateTime(substr($ndate, 0, 3) . "-" . substr($ndate, 3, 2) . "-" . substr($ndate, 5, 2));
    $date->modify("+1911 year");
    return $date->format("Y/m/d");
}

function NDateToYMString($ndate) {
    if (empty($ndate))
        return "";
    $ndate = str_pad($ndate, 5, "0", STR_PAD_LEFT);
    $ndate = $ndate . "01";
    $date = new DateTime(substr($ndate, 0, 3) . "-" . substr($ndate, 3, 2) . "-" . substr($ndate, 5, 2));
    $date->modify("+1911 year");
    return $date->format("Y/m");
}

?>