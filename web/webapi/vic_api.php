<?php

require_once 'api.class.php';

class Vic_API extends API {

    protected $m_AccessToken = '';

    //建構式
    public function __construct($request, $origin, $token) {
        $this->m_AccessToken = $token;
        parent::__construct($request); //父類別建構式
    }

    //endpoint
    //使用者
    protected function user(&$resultData, &$programguid) {
        include_once("user.php");
        switch ($this->method) {
            case 'GET': {
                    if (empty($this->verb) || $this->verb == "{id}")
                        return User_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
                    else {
                        switch ($this->verb) {
                            case "loginuserdata":
                                return User_GetLoginUserData($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
                            case "loginusermenutree":
                                return User_GetLoginUserMenuTree($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
                            case "loginuserprogram":
                                return User_GetLoginUserProgram($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
                            default:
                                return E_NOT_FOUND;
                        }
                    }
                }
            case 'POST': {
                    if (empty($this->verb) || $this->verb == "{id}")
                        return User_Create($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                    else {
                        switch ($this->verb) {
                            case "login":
                                return User_Login($this->dbconnect, $this->request, $this->file, $resultData, $programguid);
                            case "logout":
                                return User_Logout($this->dbconnect, $this->m_AccessToken, $resultData, $programguid);
                            case "registerrole":
                                return User_RegisterRole($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                            case "unregisterrole":
                                return User_UnregisterRole($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                            case "unregisterallroles":
                                return User_UnregisterAllRoles($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                            default:
                                return E_NOT_FOUND;
                        }
                    }
                }
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return User_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "loginuserdata":
                            return User_SetLoginUserData($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        case "loginuserpassword":
                            return User_SetLoginUserPassword($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        case "password":
                            return User_SetPassword($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
                break;
            case 'DELETE':
                return User_Delete($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //程式類別
    protected function programcategory(&$resultData, &$programguid) {
        include_once("program_category.php");
        switch ($this->method) {
            case 'GET':
                return Program_Category_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Program_Category_Create($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                return Program_Category_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
            case 'DELETE':
                return Program_Category_Delete($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //程式
    protected function program(&$resultData, &$programguid) {
        include_once("program.php");
        switch ($this->method) {
            case 'GET':
                return Program_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Program_Create($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                return Program_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
            case 'DELETE':
                return Program_Delete($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //角色
    protected function role(&$resultData, &$programguid) {
        include_once("role.php");
        switch ($this->method) {
            case 'GET':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Role_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "program":
                            return Role_GetRoleProgram($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
                        case "menu":
                            return Role_GetRoleMenu($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'POST':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Role_Create($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "registerprogram":
                            return Role_RegisterProgram($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "registerallprograms":
                            return Role_RegisterAllPrograms($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "unregisterprogram":
                            return Role_UnregisterProgram($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "unregisterallprograms":
                            return Role_UnregisterAllPrograms($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "registermenu":
                            return Role_RegisterMenu($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "registerallmenus":
                            return Role_RegisterAllMenus($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "unregistermenu":
                            return Role_UnregisterMenu($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        case "unregisterallmenus":
                            return Role_UnregisterAllMenus($this->dbconnect, $this->m_AccessToken, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'PUT':
                return Role_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
            case 'DELETE':
                return Role_Delete($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //選單
    protected function menu(&$resultData, &$programguid) {
        include_once("menu.php");
        switch ($this->method) {
            case 'GET':
                return Menu_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Menu_Create($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                return Menu_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
            case 'DELETE':
                return Menu_Delete($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //操作紀錄
    protected function log(&$resultData, &$programguid) {
        include_once("log.php");
        switch ($this->method) {
            case 'GET':
                return Log_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //系統資訊
    protected function sysinfo(&$resultData, &$programguid) {
        include_once("sysinfo.php");
        switch ($this->method) {
            case 'GET':
                return Sysinfo_Read($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return E_NOT_FOUND;
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Sysinfo_Update($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "about":
                            return Sysinfo_Update_About($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        case "abouten":
                            return Sysinfo_Update_About_En($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        case "credit":
                            return Sysinfo_Update_Credit($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        case "situationresearch":
                            return Sysinfo_Update_SituationResearch($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return E_NOT_FOUND;
            default:
                return E_NOT_FOUND;
        }
    }

    //Banner
    protected function banner(&$resultData, &$programguid) {
        include_once("banner.php");
        switch ($this->method) {
            case 'GET':
                return Banner_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Banner_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Banner_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Banner_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Banner_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //市場行情
    protected function market(&$resultData, &$programguid) {
        include_once("market.php");
        switch ($this->method) {
            case 'GET':
                return Market_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Market_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Market_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Market_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Market_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //公司訊息
    protected function company(&$resultData, &$programguid) {
        include_once("company.php");
        switch ($this->method) {
            case 'GET':
                return Company_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Company_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Company_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Company_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Company_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //政策宣導
    protected function propaganda(&$resultData, &$programguid) {
        include_once("propaganda.php");
        switch ($this->method) {
            case 'GET':
                return Propaganda_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Propaganda_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Propaganda_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Propaganda_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Propaganda_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //友善連結
    protected function links(&$resultData, &$programguid) {
        include_once("links.php");
        switch ($this->method) {
            case 'GET':
                return Links_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Links_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Links_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Links_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Links_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //服務據點
    protected function location(&$resultData, &$programguid) {
        include_once("location.php");
        switch ($this->method) {
            case 'GET':
                return Location_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Location_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Location_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Location_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Location_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //職缺訊息
    protected function vacancy(&$resultData, &$programguid) {
        include_once("vacancy.php");
        switch ($this->method) {
            case 'GET':
                return Vacancy_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Vacancy_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Vacancy_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Vacancy_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Vacancy_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //薪酬福利
    protected function benefits(&$resultData, &$programguid) {
        include_once("benefits.php");
        switch ($this->method) {
            case 'GET':
                return Benefits_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Benefits_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Benefits_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Benefits_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Benefits_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //貨幣市場小百科
    protected function encyclopedia(&$resultData, &$programguid) {
        include_once("encyclopedia.php");
        switch ($this->method) {
            case 'GET':
                return Encyclopedia_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Encyclopedia_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Encyclopedia_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Encyclopedia_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Encyclopedia_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //業務簡介
    protected function business(&$resultData, &$programguid) {
        include_once("business.php");
        switch ($this->method) {
            case 'GET':
                return Business_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Business_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Business_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Business_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Business_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //公司治理情形
    protected function governance(&$resultData, &$programguid) {
        include_once("governance.php");
        switch ($this->method) {
            case 'GET':
                return Governance_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Governance_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Governance_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Governance_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Governance_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //公司治理規範
    protected function norm(&$resultData, &$programguid) {
        include_once("norm.php");
        switch ($this->method) {
            case 'GET':
                return Norm_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Norm_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Norm_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Norm_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Norm_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //財務報告類別
    protected function financialcategory(&$resultData, &$programguid) {
        include_once("financialcategory.php");
        switch ($this->method) {
            case 'GET':
                return Financial_Category_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Financial_Category_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Financial_Category_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Financial_Category_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Financial_Category_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //財務報告
    protected function financial(&$resultData, &$programguid) {
        include_once("financial.php");
        switch ($this->method) {
            case 'GET':
                return Financial_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Financial_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Financial_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Financial_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Financial_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //年報
    protected function annual(&$resultData, &$programguid) {
        include_once("annual.php");
        switch ($this->method) {
            case 'GET':
                return Annual_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Annual_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Annual_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Annual_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Annual_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //永續發展
    protected function development(&$resultData, &$programguid) {
        include_once("development.php");
        switch ($this->method) {
            case 'GET':
                return Development_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Development_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Development_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Development_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Development_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //政策及規範
    protected function policy(&$resultData, &$programguid) {
        include_once("policy.php");
        switch ($this->method) {
            case 'GET':
                return Policy_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Policy_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Policy_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Policy_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Policy_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

    //年度執行情形
    protected function situation(&$resultData, &$programguid) {
        include_once("situation.php");
        switch ($this->method) {
            case 'GET':
                return Situation_GET($this->dbconnect, $this->m_AccessToken, $this->args, $this->request, $resultData, $programguid);
            case 'POST':
                return Situation_INSERT($this->dbconnect, $this->m_AccessToken, $this->request, $this->file, $resultData, $programguid);
            case 'PUT':
                if (empty($this->verb) || $this->verb == "{id}")
                    return Situation_UPDATE($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                else {
                    switch ($this->verb) {
                        case "listorder":
                            return Situation_UPDATE_ListOrder($this->dbconnect, $this->m_AccessToken, $this->args, $this->file, $resultData, $programguid);
                        default:
                            return E_NOT_FOUND;
                    }
                }
            case 'DELETE':
                return Situation_DELETE($this->dbconnect, $this->m_AccessToken, $this->args, $resultData, $programguid);
            default:
                return E_NOT_FOUND;
        }
    }

}

//來自同一伺服器的請求沒有HTTP_ORIGIN標題
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

if (!array_key_exists('HTTP_TOKEN', $_SERVER)) {
    $_SERVER['HTTP_TOKEN'] = null;
}

try {
    date_default_timezone_set('Asia/Taipei');
    $API = new Vic_API($_REQUEST['request'], $_SERVER['HTTP_ORIGIN'], $_SERVER['HTTP_TOKEN']);
    echo $API->processRequest();
} catch (Exception $e) {
    $resultCode = 500;
    $resultMessage = json_encode(Array('error' => $e->getMessage()));
    header("HTTP/1.1 " . $resultCode . " " . $resultMessage);
    echo json_encode($resultMessage);
}
?>