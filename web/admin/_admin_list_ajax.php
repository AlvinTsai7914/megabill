<?php

require '_admin_config.php';
no_permission_json();

$order_str = "";
$order_arr = request_arr("order");
$columns = request_arr("columns");
if (count($order_arr) > 0) {
    foreach (is_array($order_arr) ? $order_arr : array() as $order) {
        $index = $order["column"];
        $field = $columns[$index]["data"];
        if (empty($order_str))
            $order_str = $field . " " . $order["dir"];
        else
            $order_str = $order_str . "," . $field . " " . $order["dir"];
    }
    $order_str = "order=" . urlencode($order_str);
}

$api = request_str("api");

$query_str = "";
$query = request_str("query");
if ($query != "") {
    $query = urldecode($query);
    $query_str = "?query=" . urlencode($query);
}

//查詢資料筆數
$data = null;
$recordsTotal = 0;
$count_query_str = "";
if ($query_str != "")
    $count_query_str = $query_str . "&count=true";
else
    $count_query_str = $query_str . "?count=true";
$url = $api . $count_query_str;
if (CallAPI('GET', $url, getSession("user_accesstoken"), null, $resultMessage, $data) == 200)
    $recordsTotal = $data;


$draw = request_num("draw");

$start = request_num("start");
if ($start) {
    if ($query_str != "")
        $query_str = $query_str . "&start=" . $start;
    else
        $query_str = "?start=" . $start;
}

$length = request_num("length");
if ($length) {
    if ($query_str != "")
        $query_str = $query_str . "&length=" . $length;
    else
        $query_str = "?length=" . $length;
}

if ($order_str != "") {
    if ($query_str != "")
        $query_str = $query_str . "&" . $order_str;
    else
        $query_str = "?" . $order_str;
}

//查詢
$data = null;
$url = $api . $query_str;

if (CallAPI('GET', $url, getSession("user_accesstoken"), null, $resultMessage, $data) != 200)
    $data = null;

if ($recordsTotal == 0 && is_array($data))
    $recordsTotal = count($data);

//if ($length > 0 && is_array($data))
//    $data=array_slice($data, $start, $length);

echo json_encode(array(
    "draw" => intval($draw),
    "recordsTotal" => intval($recordsTotal),
    "recordsFiltered" => intval($recordsTotal),
    "data" => $data,
        ), JSON_UNESCAPED_UNICODE);
