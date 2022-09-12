<?php

require_once '_webapi_tools.php';
require_once 'log.php';

abstract class API {

    //(method)/<endpoint>/<verb>/<arg0>/<arg1>
    //method：GET、POST、PUT、DELETE
    protected $method = '';
    //endpoint
    protected $endpoint = '';
    //verb
    protected $verb = '';
    //args
    protected $args = Array();
    //file，儲存PUT請求的輸入
    protected $file = null;
    protected $dbconnect = null;

    //建構式，允許跨域資源共享、彙整及預先處理資料
    public function __construct($request) {
        header("content-type: application/json;charset=UTF-8"); //輸出標頭，頁面返回為json
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");

        include_once('dbconnect.php');
        $this->dbconnect = $dbconnect;

        //URL後的字串依'/'分割後存為陣列
        $this->args = explode('/', rtrim($request, '/')); //explode函數將字串依'/'拆為陣列，request函數將字串右側的'/'字元移除
        //尋找第一個元素為endpoint
        $this->endpoint = array_shift($this->args); //array_shift函數刪除陣列中的第一個元素，並傳回被刪除的元素
        //尋找第二個元素為verb，若第二個元素為數字，則為args，不是verb
        if (array_key_exists(0, $this->args) && !is_numeric($this->args[0]))//array_key_exists函數檢查Key是否存在陣列中，is_numeric函數判斷變數是否為數字或數字的字串
            $this->verb = array_shift($this->args); //array_shift函數刪除陣列中的第一個元素，並傳回被刪除的元素

        $this->method = $_SERVER['REQUEST_METHOD']; //訪問時的請求方法
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE')
                $this->method = 'DELETE';
            else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT')
                $this->method = 'PUT';
            else
                throw new Exception("Unexpected Header");
        }

        switch ($this->method) {
            case 'DELETE':
                $this->request = $this->_cleanInputs($_GET); //將GET資料整理為陣列資料
                $this->file = file_get_contents("php://input"); //file_get_contents函數把整個文件讀進一個字串中，php://input可以讀取http entity body中指定長度的值
                break;
            case 'POST':
                $this->request = $this->_cleanInputs($_POST); //將POST資料整理為陣列資料
                $this->file = file_get_contents("php://input"); //file_get_contents函數把整個文件讀進一個字串中，php://input可以讀取http entity body中指定長度的值
                break;
            case 'GET':
                $this->request = $this->_cleanInputs($_GET); //將GET資料整理為陣列資料
                break;
            case 'PUT':
                $this->request = $this->_cleanInputs($_GET); //將GET資料整理為陣列資料
                $this->file = file_get_contents("php://input"); //file_get_contents函數把整個文件讀進一個字串中，php://input可以讀取http entity body中指定長度的值
                break;
            default:
                $this->buildResponse('Invalid Method', null, 405);
                break;
        }
    }

    //整理輸入資料
    private function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {//is_array函數判斷變數是否為陣列
            foreach ($data as $k => $v)
            //$clean_input[$k] = mysqli_real_escape_string($this->dbconnect, $this->_cleanInputs($v));
                $clean_input[$k] = $this->_cleanInputs($v);
        } else {
            //$clean_input = mysqli_real_escape_string($this->dbconnect, trim(strip_tags($data))); //trim函數清除字串前後空白，strip_tags函式可以將字串中所包含的 HTML 或 PHP 標籤消除
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    //處理API
    public function processRequest() {
        $resultMessage = null;
        $resultData = null;
        $programguid = null;
        $resultCode = 404;

        if (method_exists($this, $this->endpoint)) {//method_exists函數檢查類別中指定的方法是否存在在
            try {
                $resultCode = $this->{$this->endpoint}($resultData, $programguid); //執行指定endpoint的函式，並傳入args
                $resultMessage = GetResultMessage($resultCode);
            } catch (Exception $e) {
                $resultCode = D_INTERNAL_SERVER_ERROR;
                $resultMessage = $e->getMessage();
            }
        }

        AddLog($this->dbconnect, $this->m_AccessToken, $programguid, $this->method, $this->endpoint, $this->verb, $this->args, $this->file, $resultCode, $resultMessage, $resultData);
        @mysqli_close($this->dbconnect);
        return $this->buildResponse($resultMessage, $resultData, $resultCode);
    }

    //處理回應
    public function buildResponse($resultMessage, $resultData, $resultCode = 200) {
        header("HTTP/1.1 " . GetResponseCode($resultCode) . " " . $resultMessage);
        //使用json_encode()以json格式回傳資料，JSON_UNESCAPED_UNICODE使中文字在json_encode時不用轉譯，減少資料傳輸量
        $result = array("ResultCode" => GetResponseCode($resultCode), "ResultMessage" => "(" . $resultCode . ")" . $resultMessage, "ResultData" => $resultData);
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

}

?>