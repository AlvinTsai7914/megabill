<?php

require_once '_webapi_tools.php';

//查詢系統資訊GET
function Sysinfo_Read($dbconnect, $accesstoken, $args, $request, &$resultData, &$programguid) {
    $programguid = "C9BA8F512F83D56B6F4A03EA0E569528";

    //檢查操作權限
    $loginid = 0;
    if ($accesstoken != null)
        if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) !== E_SUCCESS)
            return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;

    $query = Sysinfo_GetBaseQueryString();
    $query = $query . " AND id=1";

    $result = $dbconnect->query($query);
    if ($result) {
        while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultData[] = Sysinfo_BuildQueryResultData($accesstoken, $r);
        }
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改系統資訊PUT
function Sysinfo_Update($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "0D2A6E445504890AFFEEB159CD1F2F26";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ['name', 'phone', 'fax', 'email', 'address', 'address_en', 'copyright', 'seo_description', 'ga_code', 'remark'];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = 1;
    $name = $data['name'];
    $phone = $data['phone'];
    $fax = $data['fax'];
    $email = $data['email'];
    $address = $data['address'];
    $address_en = $data['address_en'];
    $copyright = $data['copyright'];
    $seo_description = $data['seo_description'];
    $ga_code = $data['ga_code'];
    $remark = $data['remark'];
    //檢查系統資訊編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "sysinfo", "id", $id) == false)
        return E_SYSINFOIDNOTFOUND;

    $query = "UPDATE `sysinfo` SET `name`='$name',`phone`='$phone',`fax`='$fax',`email`='$email',`address`='$address',`address_en`='$address_en',`copyright`='$copyright',`seo_description`='$seo_description',`ga_code`='$ga_code',`remark`='$remark' WHERE id='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改關於兆票PUT
function Sysinfo_Update_About($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "8A4C0232BB5BC38F44CD5AC9F3C7B140";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ['about'];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = 1;
    $about = $data['about'];
    //檢查系統資訊編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "sysinfo", "id", $id) == false)
        return E_SYSINFOIDNOTFOUND;

    $query = "UPDATE `sysinfo` SET `about`='$about' WHERE id='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改關於兆票En PUT
function Sysinfo_Update_About_En($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "19B84CAD8B2EFB1F2F2A5DCCDE4227A7";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ['about_en'];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = 1;
    $about_en = $data['about_en'];
    //檢查系統資訊編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "sysinfo", "id", $id) == false)
        return E_SYSINFOIDNOTFOUND;

    $query = "UPDATE `sysinfo` SET `about_en`='$about_en' WHERE id='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改信用評等資訊PUT
function Sysinfo_Update_credit($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "61F81FF16007387B8255342168FDFE97";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ['credit'];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = 1;
    $credit = $data['credit'];
    //檢查系統資訊編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "sysinfo", "id", $id) == false)
        return E_SYSINFOIDNOTFOUND;

    $query = "UPDATE `sysinfo` SET `credit`='$credit' WHERE id='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//修改資金情勢研判PUT
function Sysinfo_Update_SituationResearch($dbconnect, $accesstoken, $args, $fileData, &$resultData, &$programguid) {
    $programguid = "24471A48FB5FA21E970B72283B949A03";

    //檢查操作權限
    $loginid = 0;
    if (( $resultCode = CheckAccess($dbconnect, $accesstoken, $programguid, $loginid)) != E_SUCCESS)
        return $resultCode;

    $resultCode = E_SUCCESS;
    $resultData = null;
    $data = StringAddSlashes(json_decode($fileData, true));

    //檢查輸入參數
    $keys = ['observation_indicator', 'impact_factor'];
    if (!CheckArrayKeys($data, $keys))
        return E_INPUTPARAMETERERROR;

    $id = 1;
    $observation_indicator = $data['observation_indicator'];
    $impact_factor = $data['impact_factor'];
    //檢查系統資訊編號是否已存在
    if (CheckDataExistByFieldValue($dbconnect, "sysinfo", "id", $id) == false)
        return E_SYSINFOIDNOTFOUND;

    $query = "UPDATE `sysinfo` SET `observation_indicator`='$observation_indicator', `impact_factor`='$impact_factor' WHERE id='$id'";
    if ($result = $dbconnect->query($query)) {
        $resultData = array("id" => $id);
    } else
        throw new Exception($dbconnect->error);

    return $resultCode;
}

//取得查詢系統資訊基本QueryString
function Sysinfo_GetBaseQueryString() {
    return "SELECT `id`, `name`, `phone`, `fax`, `email`, `address`, `address_en`, `about`,  `about_en`, `credit`, `observation_indicator`, `impact_factor`,`copyright`, `seo_description`, `ga_code`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id` FROM `sysinfo` WHERE 1";
}

//建立查詢系統資訊回傳資料
function Sysinfo_BuildQueryResultData($accesstoken, $array) {
    if ($accesstoken != null) {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "phone" => $array["phone"],
            "fax" => $array["fax"],
            "email" => $array["email"],
            "address" => $array["address"],
            "address_en" => $array["address_en"],
            "about" => $array["about"],
            "about_en" => $array["about_en"],
            "credit" => $array["credit"],
            "observation_indicator" => $array["observation_indicator"],
            "impact_factor" => $array["impact_factor"],
            "copyright" => $array["copyright"],
            "seo_description" => $array["seo_description"],
            "ga_code" => $array['ga_code'],
            "remark" => $array['remark'],
            "c_time" => $array['c_time'],
            "c_user_id" => $array['c_user_id'],
            "u_time" => $array['u_time'],
            "u_user_id" => $array['u_user_id']);
    } else {
        return array("id" => $array["id"],
            "name" => $array["name"],
            "phone" => $array["phone"],
            "fax" => $array["fax"],
            "email" => $array["email"],
            "address" => $array["address"],
            "address_en" => $array["address_en"],
            "about" => $array["about"],
            "about_en" => $array["about_en"],
            "credit" => $array["credit"],
            "observation_indicator" => $array["observation_indicator"],
            "impact_factor" => $array["impact_factor"],
            "copyright" => $array["copyright"],
            "seo_description" => $array["seo_description"],
            "ga_code" => $array["ga_code"]);
    }
}
