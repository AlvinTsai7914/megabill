-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-14 09:23:39
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `megabills`
--

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL COMMENT '操作記錄編號',
  `user_id` int(11) DEFAULT NULL COMMENT '使用者編號',
  `ip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'IP位址',
  `program_id` int(11) DEFAULT NULL COMMENT '程式編號',
  `method` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'method',
  `endpoint` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'endpoint',
  `verb` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'verb',
  `args` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'args',
  `file` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'file',
  `resultCode` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'resultCode',
  `resultMessage` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'resultMessage',
  `resultData` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'resultData',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '操作時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `log`
--

INSERT INTO `log` (`id`, `user_id`, `ip`, `program_id`, `method`, `endpoint`, `verb`, `args`, `file`, `resultCode`, `resultMessage`, `resultData`, `c_time`) VALUES
(1, 0, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '4', 'AccessToken錯誤', 'null', '2022-04-14 15:06:45'),
(2, 0, '::1', 0, 'POST', 'user', 'login', '[]', '\"\"', '0', '執行成功', '{\"token\":\"B08BC1DD9823546CF9EA84D97B5756F4\"}', '2022-04-14 15:06:48'),
(3, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:06:48'),
(4, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:06:48'),
(5, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"9\",\"parent_id\":\"0\",\"name\":\"系統資訊\",\"url\":\"sysinfo_edit.php\",\"icon\":\"fas fa-database\",\"program_ids\":\"41,42\",\"remark\":\"\",\"submenu\":null},{\"id\":\"10\",\"parent_id\":\"0\",\"name\":\"最新消息\",\"url\":\"news_list.php\",\"icon\":\"far fa-newspaper\",\"program_ids\":\"58,59,60,61,62\",\"remark\":null,\"submenu\":null},{\"id\":\"11\",\"parent_id\":\"0\",\"name\":\"廣告合作\",\"url\":\"ad_list.php\",\"icon\":\"fas fa-ad\",\"program_ids\":\"63,64,65,66,67\",\"remark\":null,\"submenu\":null},{\"id\":\"12\",\"parent_id\":\"0\",\"name\":\"凱斯案例\",\"url\":null,\"icon\":\"fas fa-archive\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"13\",\"parent_id\":\"12\",\"name\":\"凱斯案例類別\",\"url\":\"portfolio_category_list.php\",\"icon\":\"fas fa-boxes\",\"program_ids\":\"68,69,70,71,72\",\"remark\":null,\"submenu\":null},{\"id\":\"14\",\"parent_id\":\"12\",\"name\":\"凱斯案例\",\"url\":\"portfolio_list.php\",\"icon\":\"fas fa-archive\",\"program_ids\":\"73,74,75,76,77\",\"remark\":null,\"submenu\":null}]},{\"id\":\"15\",\"parent_id\":\"0\",\"name\":\"服務項目\",\"url\":\"service_list.php\",\"icon\":\"fas fa-hands-helping\",\"program_ids\":\"78,79,80,81,82\",\"remark\":null,\"submenu\":null},{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"解決方案\",\"url\":null,\"icon\":\"far fa-lightbulb\",\"program_ids\":\"\",\"remark\":null,\"submenu\":[{\"id\":\"17\",\"parent_id\":\"16\",\"name\":\"解決方案類別\",\"url\":\"solution_category_list.php\",\"icon\":\"fas fa-lightbulb\",\"program_ids\":\"83,84,85,86,87\",\"remark\":null,\"submenu\":null},{\"id\":\"18\",\"parent_id\":\"16\",\"name\":\"解決方案\",\"url\":\"solution_list.php\",\"icon\":\"far fa-lightbulb\",\"program_ids\":\"88,89,90,91,92\",\"remark\":null,\"submenu\":null}]},{\"id\":\"19\",\"parent_id\":\"0\",\"name\":\"知識庫\",\"url\":null,\"icon\":\"fas fa-book-open\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"20\",\"parent_id\":\"19\",\"name\":\"知識庫類別\",\"url\":\"knowledge_category_list.php\",\"icon\":\"fas fa-book\",\"program_ids\":\"93,94,95,96,97\",\"remark\":null,\"submenu\":null},{\"id\":\"21\",\"parent_id\":\"19\",\"name\":\"知識庫\",\"url\":\"knowledge_list.php\",\"icon\":\"fas fa-book-open\",\"program_ids\":\"98,99,100,101,102\",\"remark\":null,\"submenu\":null}]},{\"id\":\"22\",\"parent_id\":\"0\",\"name\":\"聯絡我們\",\"url\":\"contact_list.php\",\"icon\":\"far fa-envelope\",\"program_ids\":\"103,104,105\",\"remark\":null,\"submenu\":null},{\"id\":\"23\",\"parent_id\":\"0\",\"name\":\"標籤\",\"url\":null,\"icon\":\"fas fa-tag\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"24\",\"parent_id\":\"23\",\"name\":\"標籤類別\",\"url\":\"tag_category_list.php\",\"icon\":\"fas fa-tags\",\"program_ids\":\"43,44,45,46,47\",\"remark\":null,\"submenu\":null},{\"id\":\"25\",\"parent_id\":\"23\",\"name\":\"標籤\",\"url\":\"tag_list.php\",\"icon\":\"fas fa-tag\",\"program_ids\":\"48,49,50,51,52\",\"remark\":null,\"submenu\":null}]},{\"id\":\"26\",\"parent_id\":\"0\",\"name\":\"詢問項目\",\"url\":\"inquiry_list.php\",\"icon\":\"fas fa-question\",\"program_ids\":\"53,54,55,56,57\",\"remark\":null,\"submenu\":null},{\"id\":\"27\",\"parent_id\":\"0\",\"name\":\"員工\",\"url\":\"staff_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"106,107,108,109,110\",\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:06:48'),
(6, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:06:57'),
(7, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"9\",\"parent_id\":\"0\",\"name\":\"系統資訊\",\"url\":\"sysinfo_edit.php\",\"icon\":\"fas fa-database\",\"program_ids\":\"41,42\",\"remark\":\"\",\"submenu\":null},{\"id\":\"10\",\"parent_id\":\"0\",\"name\":\"最新消息\",\"url\":\"news_list.php\",\"icon\":\"far fa-newspaper\",\"program_ids\":\"58,59,60,61,62\",\"remark\":null,\"submenu\":null},{\"id\":\"11\",\"parent_id\":\"0\",\"name\":\"廣告合作\",\"url\":\"ad_list.php\",\"icon\":\"fas fa-ad\",\"program_ids\":\"63,64,65,66,67\",\"remark\":null,\"submenu\":null},{\"id\":\"12\",\"parent_id\":\"0\",\"name\":\"凱斯案例\",\"url\":null,\"icon\":\"fas fa-archive\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"13\",\"parent_id\":\"12\",\"name\":\"凱斯案例類別\",\"url\":\"portfolio_category_list.php\",\"icon\":\"fas fa-boxes\",\"program_ids\":\"68,69,70,71,72\",\"remark\":null,\"submenu\":null},{\"id\":\"14\",\"parent_id\":\"12\",\"name\":\"凱斯案例\",\"url\":\"portfolio_list.php\",\"icon\":\"fas fa-archive\",\"program_ids\":\"73,74,75,76,77\",\"remark\":null,\"submenu\":null}]},{\"id\":\"15\",\"parent_id\":\"0\",\"name\":\"服務項目\",\"url\":\"service_list.php\",\"icon\":\"fas fa-hands-helping\",\"program_ids\":\"78,79,80,81,82\",\"remark\":null,\"submenu\":null},{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"解決方案\",\"url\":null,\"icon\":\"far fa-lightbulb\",\"program_ids\":\"\",\"remark\":null,\"submenu\":[{\"id\":\"17\",\"parent_id\":\"16\",\"name\":\"解決方案類別\",\"url\":\"solution_category_list.php\",\"icon\":\"fas fa-lightbulb\",\"program_ids\":\"83,84,85,86,87\",\"remark\":null,\"submenu\":null},{\"id\":\"18\",\"parent_id\":\"16\",\"name\":\"解決方案\",\"url\":\"solution_list.php\",\"icon\":\"far fa-lightbulb\",\"program_ids\":\"88,89,90,91,92\",\"remark\":null,\"submenu\":null}]},{\"id\":\"19\",\"parent_id\":\"0\",\"name\":\"知識庫\",\"url\":null,\"icon\":\"fas fa-book-open\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"20\",\"parent_id\":\"19\",\"name\":\"知識庫類別\",\"url\":\"knowledge_category_list.php\",\"icon\":\"fas fa-book\",\"program_ids\":\"93,94,95,96,97\",\"remark\":null,\"submenu\":null},{\"id\":\"21\",\"parent_id\":\"19\",\"name\":\"知識庫\",\"url\":\"knowledge_list.php\",\"icon\":\"fas fa-book-open\",\"program_ids\":\"98,99,100,101,102\",\"remark\":null,\"submenu\":null}]},{\"id\":\"22\",\"parent_id\":\"0\",\"name\":\"聯絡我們\",\"url\":\"contact_list.php\",\"icon\":\"far fa-envelope\",\"program_ids\":\"103,104,105\",\"remark\":null,\"submenu\":null},{\"id\":\"23\",\"parent_id\":\"0\",\"name\":\"標籤\",\"url\":null,\"icon\":\"fas fa-tag\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"24\",\"parent_id\":\"23\",\"name\":\"標籤類別\",\"url\":\"tag_category_list.php\",\"icon\":\"fas fa-tags\",\"program_ids\":\"43,44,45,46,47\",\"remark\":null,\"submenu\":null},{\"id\":\"25\",\"parent_id\":\"23\",\"name\":\"標籤\",\"url\":\"tag_list.php\",\"icon\":\"fas fa-tag\",\"program_ids\":\"48,49,50,51,52\",\"remark\":null,\"submenu\":null}]},{\"id\":\"26\",\"parent_id\":\"0\",\"name\":\"詢問項目\",\"url\":\"inquiry_list.php\",\"icon\":\"fas fa-question\",\"program_ids\":\"53,54,55,56,57\",\"remark\":null,\"submenu\":null},{\"id\":\"27\",\"parent_id\":\"0\",\"name\":\"員工\",\"url\":\"staff_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"106,107,108,109,110\",\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:06:57'),
(8, 0, '::1', 0, 'POST', 'user', 'logout', '[]', '\"\"', '0', '執行成功', 'null', '2022-04-14 15:07:13'),
(9, 0, '::1', 0, 'POST', 'user', 'login', '[]', '\"\"', '0', '執行成功', '{\"token\":\"74DA09B095590FCCBEEA6AA5AA0BF248\"}', '2022-04-14 15:07:25'),
(10, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:07:25'),
(11, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:07:25'),
(12, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"9\",\"parent_id\":\"0\",\"name\":\"系統資訊\",\"url\":\"sysinfo_edit.php\",\"icon\":\"fas fa-database\",\"program_ids\":\"41,42\",\"remark\":\"\",\"submenu\":null},{\"id\":\"10\",\"parent_id\":\"0\",\"name\":\"最新消息\",\"url\":\"news_list.php\",\"icon\":\"far fa-newspaper\",\"program_ids\":\"58,59,60,61,62\",\"remark\":null,\"submenu\":null},{\"id\":\"11\",\"parent_id\":\"0\",\"name\":\"廣告合作\",\"url\":\"ad_list.php\",\"icon\":\"fas fa-ad\",\"program_ids\":\"63,64,65,66,67\",\"remark\":null,\"submenu\":null},{\"id\":\"12\",\"parent_id\":\"0\",\"name\":\"凱斯案例\",\"url\":null,\"icon\":\"fas fa-archive\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"13\",\"parent_id\":\"12\",\"name\":\"凱斯案例類別\",\"url\":\"portfolio_category_list.php\",\"icon\":\"fas fa-boxes\",\"program_ids\":\"68,69,70,71,72\",\"remark\":null,\"submenu\":null},{\"id\":\"14\",\"parent_id\":\"12\",\"name\":\"凱斯案例\",\"url\":\"portfolio_list.php\",\"icon\":\"fas fa-archive\",\"program_ids\":\"73,74,75,76,77\",\"remark\":null,\"submenu\":null}]},{\"id\":\"15\",\"parent_id\":\"0\",\"name\":\"服務項目\",\"url\":\"service_list.php\",\"icon\":\"fas fa-hands-helping\",\"program_ids\":\"78,79,80,81,82\",\"remark\":null,\"submenu\":null},{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"解決方案\",\"url\":null,\"icon\":\"far fa-lightbulb\",\"program_ids\":\"\",\"remark\":null,\"submenu\":[{\"id\":\"17\",\"parent_id\":\"16\",\"name\":\"解決方案類別\",\"url\":\"solution_category_list.php\",\"icon\":\"fas fa-lightbulb\",\"program_ids\":\"83,84,85,86,87\",\"remark\":null,\"submenu\":null},{\"id\":\"18\",\"parent_id\":\"16\",\"name\":\"解決方案\",\"url\":\"solution_list.php\",\"icon\":\"far fa-lightbulb\",\"program_ids\":\"88,89,90,91,92\",\"remark\":null,\"submenu\":null}]},{\"id\":\"19\",\"parent_id\":\"0\",\"name\":\"知識庫\",\"url\":null,\"icon\":\"fas fa-book-open\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"20\",\"parent_id\":\"19\",\"name\":\"知識庫類別\",\"url\":\"knowledge_category_list.php\",\"icon\":\"fas fa-book\",\"program_ids\":\"93,94,95,96,97\",\"remark\":null,\"submenu\":null},{\"id\":\"21\",\"parent_id\":\"19\",\"name\":\"知識庫\",\"url\":\"knowledge_list.php\",\"icon\":\"fas fa-book-open\",\"program_ids\":\"98,99,100,101,102\",\"remark\":null,\"submenu\":null}]},{\"id\":\"22\",\"parent_id\":\"0\",\"name\":\"聯絡我們\",\"url\":\"contact_list.php\",\"icon\":\"far fa-envelope\",\"program_ids\":\"103,104,105\",\"remark\":null,\"submenu\":null},{\"id\":\"23\",\"parent_id\":\"0\",\"name\":\"標籤\",\"url\":null,\"icon\":\"fas fa-tag\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"24\",\"parent_id\":\"23\",\"name\":\"標籤類別\",\"url\":\"tag_category_list.php\",\"icon\":\"fas fa-tags\",\"program_ids\":\"43,44,45,46,47\",\"remark\":null,\"submenu\":null},{\"id\":\"25\",\"parent_id\":\"23\",\"name\":\"標籤\",\"url\":\"tag_list.php\",\"icon\":\"fas fa-tag\",\"program_ids\":\"48,49,50,51,52\",\"remark\":null,\"submenu\":null}]},{\"id\":\"26\",\"parent_id\":\"0\",\"name\":\"詢問項目\",\"url\":\"inquiry_list.php\",\"icon\":\"fas fa-question\",\"program_ids\":\"53,54,55,56,57\",\"remark\":null,\"submenu\":null},{\"id\":\"27\",\"parent_id\":\"0\",\"name\":\"員工\",\"url\":\"staff_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"106,107,108,109,110\",\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:07:25'),
(13, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:08:35'),
(14, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"9\",\"parent_id\":\"0\",\"name\":\"系統資訊\",\"url\":\"sysinfo_edit.php\",\"icon\":\"fas fa-database\",\"program_ids\":\"41,42\",\"remark\":\"\",\"submenu\":null},{\"id\":\"10\",\"parent_id\":\"0\",\"name\":\"最新消息\",\"url\":\"news_list.php\",\"icon\":\"far fa-newspaper\",\"program_ids\":\"58,59,60,61,62\",\"remark\":null,\"submenu\":null},{\"id\":\"11\",\"parent_id\":\"0\",\"name\":\"廣告合作\",\"url\":\"ad_list.php\",\"icon\":\"fas fa-ad\",\"program_ids\":\"63,64,65,66,67\",\"remark\":null,\"submenu\":null},{\"id\":\"12\",\"parent_id\":\"0\",\"name\":\"凱斯案例\",\"url\":null,\"icon\":\"fas fa-archive\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"13\",\"parent_id\":\"12\",\"name\":\"凱斯案例類別\",\"url\":\"portfolio_category_list.php\",\"icon\":\"fas fa-boxes\",\"program_ids\":\"68,69,70,71,72\",\"remark\":null,\"submenu\":null},{\"id\":\"14\",\"parent_id\":\"12\",\"name\":\"凱斯案例\",\"url\":\"portfolio_list.php\",\"icon\":\"fas fa-archive\",\"program_ids\":\"73,74,75,76,77\",\"remark\":null,\"submenu\":null}]},{\"id\":\"15\",\"parent_id\":\"0\",\"name\":\"服務項目\",\"url\":\"service_list.php\",\"icon\":\"fas fa-hands-helping\",\"program_ids\":\"78,79,80,81,82\",\"remark\":null,\"submenu\":null},{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"解決方案\",\"url\":null,\"icon\":\"far fa-lightbulb\",\"program_ids\":\"\",\"remark\":null,\"submenu\":[{\"id\":\"17\",\"parent_id\":\"16\",\"name\":\"解決方案類別\",\"url\":\"solution_category_list.php\",\"icon\":\"fas fa-lightbulb\",\"program_ids\":\"83,84,85,86,87\",\"remark\":null,\"submenu\":null},{\"id\":\"18\",\"parent_id\":\"16\",\"name\":\"解決方案\",\"url\":\"solution_list.php\",\"icon\":\"far fa-lightbulb\",\"program_ids\":\"88,89,90,91,92\",\"remark\":null,\"submenu\":null}]},{\"id\":\"19\",\"parent_id\":\"0\",\"name\":\"知識庫\",\"url\":null,\"icon\":\"fas fa-book-open\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"20\",\"parent_id\":\"19\",\"name\":\"知識庫類別\",\"url\":\"knowledge_category_list.php\",\"icon\":\"fas fa-book\",\"program_ids\":\"93,94,95,96,97\",\"remark\":null,\"submenu\":null},{\"id\":\"21\",\"parent_id\":\"19\",\"name\":\"知識庫\",\"url\":\"knowledge_list.php\",\"icon\":\"fas fa-book-open\",\"program_ids\":\"98,99,100,101,102\",\"remark\":null,\"submenu\":null}]},{\"id\":\"22\",\"parent_id\":\"0\",\"name\":\"聯絡我們\",\"url\":\"contact_list.php\",\"icon\":\"far fa-envelope\",\"program_ids\":\"103,104,105\",\"remark\":null,\"submenu\":null},{\"id\":\"23\",\"parent_id\":\"0\",\"name\":\"標籤\",\"url\":null,\"icon\":\"fas fa-tag\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"24\",\"parent_id\":\"23\",\"name\":\"標籤類別\",\"url\":\"tag_category_list.php\",\"icon\":\"fas fa-tags\",\"program_ids\":\"43,44,45,46,47\",\"remark\":null,\"submenu\":null},{\"id\":\"25\",\"parent_id\":\"23\",\"name\":\"標籤\",\"url\":\"tag_list.php\",\"icon\":\"fas fa-tag\",\"program_ids\":\"48,49,50,51,52\",\"remark\":null,\"submenu\":null}]},{\"id\":\"26\",\"parent_id\":\"0\",\"name\":\"詢問項目\",\"url\":\"inquiry_list.php\",\"icon\":\"fas fa-question\",\"program_ids\":\"53,54,55,56,57\",\"remark\":null,\"submenu\":null},{\"id\":\"27\",\"parent_id\":\"0\",\"name\":\"員工\",\"url\":\"staff_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"106,107,108,109,110\",\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:08:35'),
(15, 0, '::1', 36, 'GET', 'menu', '{id}', '[]', 'null', '4', 'AccessToken錯誤', 'null', '2022-04-14 15:09:12'),
(16, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:05:42\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:05:42\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:12:03'),
(17, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"9\",\"parent_id\":\"0\",\"name\":\"系統資訊\",\"url\":\"sysinfo_edit.php\",\"icon\":\"fas fa-database\",\"program_ids\":\"41,42\",\"remark\":\"\",\"submenu\":null},{\"id\":\"10\",\"parent_id\":\"0\",\"name\":\"最新消息\",\"url\":\"news_list.php\",\"icon\":\"far fa-newspaper\",\"program_ids\":\"58,59,60,61,62\",\"remark\":null,\"submenu\":null},{\"id\":\"11\",\"parent_id\":\"0\",\"name\":\"廣告合作\",\"url\":\"ad_list.php\",\"icon\":\"fas fa-ad\",\"program_ids\":\"63,64,65,66,67\",\"remark\":null,\"submenu\":null},{\"id\":\"12\",\"parent_id\":\"0\",\"name\":\"凱斯案例\",\"url\":null,\"icon\":\"fas fa-archive\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"13\",\"parent_id\":\"12\",\"name\":\"凱斯案例類別\",\"url\":\"portfolio_category_list.php\",\"icon\":\"fas fa-boxes\",\"program_ids\":\"68,69,70,71,72\",\"remark\":null,\"submenu\":null},{\"id\":\"14\",\"parent_id\":\"12\",\"name\":\"凱斯案例\",\"url\":\"portfolio_list.php\",\"icon\":\"fas fa-archive\",\"program_ids\":\"73,74,75,76,77\",\"remark\":null,\"submenu\":null}]},{\"id\":\"15\",\"parent_id\":\"0\",\"name\":\"服務項目\",\"url\":\"service_list.php\",\"icon\":\"fas fa-hands-helping\",\"program_ids\":\"78,79,80,81,82\",\"remark\":null,\"submenu\":null},{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"解決方案\",\"url\":null,\"icon\":\"far fa-lightbulb\",\"program_ids\":\"\",\"remark\":null,\"submenu\":[{\"id\":\"17\",\"parent_id\":\"16\",\"name\":\"解決方案類別\",\"url\":\"solution_category_list.php\",\"icon\":\"fas fa-lightbulb\",\"program_ids\":\"83,84,85,86,87\",\"remark\":null,\"submenu\":null},{\"id\":\"18\",\"parent_id\":\"16\",\"name\":\"解決方案\",\"url\":\"solution_list.php\",\"icon\":\"far fa-lightbulb\",\"program_ids\":\"88,89,90,91,92\",\"remark\":null,\"submenu\":null}]},{\"id\":\"19\",\"parent_id\":\"0\",\"name\":\"知識庫\",\"url\":null,\"icon\":\"fas fa-book-open\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"20\",\"parent_id\":\"19\",\"name\":\"知識庫類別\",\"url\":\"knowledge_category_list.php\",\"icon\":\"fas fa-book\",\"program_ids\":\"93,94,95,96,97\",\"remark\":null,\"submenu\":null},{\"id\":\"21\",\"parent_id\":\"19\",\"name\":\"知識庫\",\"url\":\"knowledge_list.php\",\"icon\":\"fas fa-book-open\",\"program_ids\":\"98,99,100,101,102\",\"remark\":null,\"submenu\":null}]},{\"id\":\"22\",\"parent_id\":\"0\",\"name\":\"聯絡我們\",\"url\":\"contact_list.php\",\"icon\":\"far fa-envelope\",\"program_ids\":\"103,104,105\",\"remark\":null,\"submenu\":null},{\"id\":\"23\",\"parent_id\":\"0\",\"name\":\"標籤\",\"url\":null,\"icon\":\"fas fa-tag\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"24\",\"parent_id\":\"23\",\"name\":\"標籤類別\",\"url\":\"tag_category_list.php\",\"icon\":\"fas fa-tags\",\"program_ids\":\"43,44,45,46,47\",\"remark\":null,\"submenu\":null},{\"id\":\"25\",\"parent_id\":\"23\",\"name\":\"標籤\",\"url\":\"tag_list.php\",\"icon\":\"fas fa-tag\",\"program_ids\":\"48,49,50,51,52\",\"remark\":null,\"submenu\":null}]},{\"id\":\"26\",\"parent_id\":\"0\",\"name\":\"詢問項目\",\"url\":\"inquiry_list.php\",\"icon\":\"fas fa-question\",\"program_ids\":\"53,54,55,56,57\",\"remark\":null,\"submenu\":null},{\"id\":\"27\",\"parent_id\":\"0\",\"name\":\"員工\",\"url\":\"staff_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"106,107,108,109,110\",\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:12:03'),
(18, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:22:59'),
(19, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:22:59'),
(20, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:01'),
(21, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:01'),
(22, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:02'),
(23, 1, '::1', 9, 'GET', 'role', '', '[]', 'null', '0', '執行成功', '\"2\"', '2022-04-14 15:23:02'),
(24, 1, '::1', 9, 'GET', 'role', '', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"name\":\"系統管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2019-03-09 15:54:58\",\"c_user_id\":\"0\",\"u_time\":\"2019-03-09 15:54:58\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"name\":\"網站管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2021-06-05 15:01:38\",\"c_user_id\":\"1\",\"u_time\":\"2021-06-05 15:01:38\",\"u_user_id\":\"1\"}]', '2022-04-14 15:23:02'),
(25, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:04'),
(26, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:04'),
(27, 1, '::1', 9, 'GET', 'role', '', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"2\",\"name\":\"網站管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2021-06-05 15:01:38\",\"c_user_id\":\"1\",\"u_time\":\"2021-06-05 15:01:38\",\"u_user_id\":\"1\"}]', '2022-04-14 15:23:04'),
(28, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:04'),
(29, 1, '::1', 22, 'GET', 'role', 'menu', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"list_order\":\"100\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"list_order\":\"9000\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"parent_id\":\"2\",\"parent_name\":\"權限\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"list_order\":\"9010\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"parent_id\":\"2\",\"parent_name\":\"權限\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"list_order\":\"9020\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"list_order\":\"9100\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"parent_id\":\"5\",\"parent_name\":\"使用者資料\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"list_order\":\"9110\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"7\",\"parent_id\":\"5\",\"parent_name\":\"使用者資料\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"list_order\":\"9120\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"8\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"list_order\":\"9200\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:04'),
(30, 1, '::1', 1, 'GET', 'programcategory', '', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"name\":\"程式類別\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"name\":\"程式\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"name\":\"角色\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"name\":\"使用者\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"name\":\"選單\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"name\":\"操作紀錄\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:04'),
(31, 1, '::1', 34, 'GET', 'user', 'loginuserprogram', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"查詢程式類別\",\"guid\":\"A5E214B8215C7102CFA530856A548C6A\",\"remark\":null},{\"id\":\"2\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"新增程式類別\",\"guid\":\"250038B29B2A8B92FEDB031694588D3F\",\"remark\":null},{\"id\":\"3\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"修改程式類別\",\"guid\":\"D4AA08388D01A7CBD35AE21221C1AA64\",\"remark\":null},{\"id\":\"4\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"刪除程式類別\",\"guid\":\"619CA96841B5A4814EFED3C60A5A6CFD\",\"remark\":null},{\"id\":\"5\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"查詢程式\",\"guid\":\"E47212F055F9748C9313F87E74106544\",\"remark\":null},{\"id\":\"6\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"新增程式\",\"guid\":\"75699A307CF4C23407EAB515F444A260\",\"remark\":null},{\"id\":\"7\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"修改程式\",\"guid\":\"BDC15D7876BB188264EBA1CD5A3F03BD\",\"remark\":null},{\"id\":\"8\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"刪除程式\",\"guid\":\"3E21AD3DC59D6CC9BCEC90E562CD127E\",\"remark\":null},{\"id\":\"9\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色\",\"guid\":\"D9D0FB041171CBFF002F1D02A7D01E5E\",\"remark\":null},{\"id\":\"10\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"新增角色\",\"guid\":\"2482DDDCDCB3C85EB72DDAE2330DCE30\",\"remark\":null},{\"id\":\"11\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"修改角色\",\"guid\":\"F40D8A063D77C197CE6125F7666AB056\",\"remark\":null},{\"id\":\"12\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"刪除角色\",\"guid\":\"E6BADA98AA9D8C835354B1DF2A83CB92\",\"remark\":null},{\"id\":\"13\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊程式\",\"guid\":\"333CDC633438A89A005B4610ED7D00C8\",\"remark\":null},{\"id\":\"14\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有程式\",\"guid\":\"C304430C714757C788A4FD082D94121E\",\"remark\":null},{\"id\":\"15\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷程式\",\"guid\":\"A860C4A437AE730D5B70C6BA27A5343D\",\"remark\":null},{\"id\":\"16\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有程式\",\"guid\":\"209D04489E9950DA056F580D9130E829\",\"remark\":null},{\"id\":\"17\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色程式\",\"guid\":\"1C2733127AC3CC8BDC40A704E9DCF5A5\",\"remark\":null},{\"id\":\"18\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊選單\",\"guid\":\"FA0100D2EF870731B3450C0E347AEE91\",\"remark\":null},{\"id\":\"19\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有選單\",\"guid\":\"488846F4CE7B43342EB3FA994E42CD86\",\"remark\":null},{\"id\":\"20\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷選單\",\"guid\":\"901C788ABDEC80F44971B2D26154D253\",\"remark\":null},{\"id\":\"21\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有選單\",\"guid\":\"6BF9D523FEDEE45D677E3FB9CA5BCA4A\",\"remark\":null},{\"id\":\"22\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色選單\",\"guid\":\"5021F9264DB1D0212BE75E562BE3423F\",\"remark\":null},{\"id\":\"23\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢使用者\",\"guid\":\"6FFF994902F45E92C56C27817E4C8A63\",\"remark\":null},{\"id\":\"24\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"新增使用者\",\"guid\":\"6DFCB35F2D2B76A35E864DEB4923AC16\",\"remark\":null},{\"id\":\"25\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者\",\"guid\":\"6D9B8D251E4F005595D45735AF276A5B\",\"remark\":null},{\"id\":\"26\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"刪除使用者\",\"guid\":\"8154DEBC7B540D07EA5F37DAE7DAC654\",\"remark\":null},{\"id\":\"27\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者密碼\",\"guid\":\"3CD3753F6F16C0A08E55770D9556EBC0\",\"remark\":null},{\"id\":\"28\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註冊角色\",\"guid\":\"06A86144ACF42137EC3C6CE54C2193B4\",\"remark\":null},{\"id\":\"29\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷角色\",\"guid\":\"CF98E0849C98EA9E50AE61104878A87E\",\"remark\":null},{\"id\":\"30\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷所有角色\",\"guid\":\"4B72BE10FF9333E34A5040C6BF424B20\",\"remark\":null},{\"id\":\"31\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者資料\",\"guid\":\"7B65FAEF91541F99D6247A5A55A31E53\",\"remark\":null},{\"id\":\"32\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者資料\",\"guid\":\"A5389CFCFC0B67A3C5A079D11D487083\",\"remark\":null},{\"id\":\"33\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者密碼\",\"guid\":\"713911BE9C23CAB930E74618C567DF5B\",\"remark\":null},{\"id\":\"34\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者程式\",\"guid\":\"A7E8C8FA964DEA5B2E00B6BCD3554366\",\"remark\":null},{\"id\":\"35\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者樹狀選單\",\"guid\":\"820D196327A04D67B430F7E32CC7E08C\",\"remark\":null},{\"id\":\"36\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"查詢選單\",\"guid\":\"89996F463820BC89DA218E8BC161B73B\",\"remark\":null},{\"id\":\"37\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"新增選單\",\"guid\":\"6D2FDBFF8429ADF495F8E947C9563093\",\"remark\":null},{\"id\":\"38\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"修改選單\",\"guid\":\"C02A5FF9CAA42A9C1983600EA55E0D64\",\"remark\":null},{\"id\":\"39\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"刪除選單\",\"guid\":\"8CADB2EF4B106FD4E5217B8E62C43483\",\"remark\":null},{\"id\":\"40\",\"category_id\":\"6\",\"category_name\":\"操作紀錄\",\"name\":\"查詢操作紀錄\",\"guid\":\"999E2E30F65D4DDAD416036813A8993B\",\"remark\":null}]', '2022-04-14 15:23:04');
INSERT INTO `log` (`id`, `user_id`, `ip`, `program_id`, `method`, `endpoint`, `verb`, `args`, `file`, `resultCode`, `resultMessage`, `resultData`, `c_time`) VALUES
(32, 1, '::1', 17, 'GET', 'role', 'program', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"查詢程式類別\",\"guid\":\"A5E214B8215C7102CFA530856A548C6A\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"新增程式類別\",\"guid\":\"250038B29B2A8B92FEDB031694588D3F\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"修改程式類別\",\"guid\":\"D4AA08388D01A7CBD35AE21221C1AA64\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"刪除程式類別\",\"guid\":\"619CA96841B5A4814EFED3C60A5A6CFD\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"查詢程式\",\"guid\":\"E47212F055F9748C9313F87E74106544\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"新增程式\",\"guid\":\"75699A307CF4C23407EAB515F444A260\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"7\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"修改程式\",\"guid\":\"BDC15D7876BB188264EBA1CD5A3F03BD\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"8\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"刪除程式\",\"guid\":\"3E21AD3DC59D6CC9BCEC90E562CD127E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"9\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色\",\"guid\":\"D9D0FB041171CBFF002F1D02A7D01E5E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"10\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"新增角色\",\"guid\":\"2482DDDCDCB3C85EB72DDAE2330DCE30\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"11\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"修改角色\",\"guid\":\"F40D8A063D77C197CE6125F7666AB056\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"12\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"刪除角色\",\"guid\":\"E6BADA98AA9D8C835354B1DF2A83CB92\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"13\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊程式\",\"guid\":\"333CDC633438A89A005B4610ED7D00C8\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"14\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有程式\",\"guid\":\"C304430C714757C788A4FD082D94121E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"15\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷程式\",\"guid\":\"A860C4A437AE730D5B70C6BA27A5343D\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"16\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有程式\",\"guid\":\"209D04489E9950DA056F580D9130E829\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"17\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色程式\",\"guid\":\"1C2733127AC3CC8BDC40A704E9DCF5A5\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"18\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊選單\",\"guid\":\"FA0100D2EF870731B3450C0E347AEE91\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"19\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有選單\",\"guid\":\"488846F4CE7B43342EB3FA994E42CD86\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"20\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷選單\",\"guid\":\"901C788ABDEC80F44971B2D26154D253\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"21\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有選單\",\"guid\":\"6BF9D523FEDEE45D677E3FB9CA5BCA4A\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"22\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色選單\",\"guid\":\"5021F9264DB1D0212BE75E562BE3423F\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"23\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢使用者\",\"guid\":\"6FFF994902F45E92C56C27817E4C8A63\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"24\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"新增使用者\",\"guid\":\"6DFCB35F2D2B76A35E864DEB4923AC16\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"25\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者\",\"guid\":\"6D9B8D251E4F005595D45735AF276A5B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"26\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"刪除使用者\",\"guid\":\"8154DEBC7B540D07EA5F37DAE7DAC654\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"27\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者密碼\",\"guid\":\"3CD3753F6F16C0A08E55770D9556EBC0\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"28\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註冊角色\",\"guid\":\"06A86144ACF42137EC3C6CE54C2193B4\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"29\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷角色\",\"guid\":\"CF98E0849C98EA9E50AE61104878A87E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"30\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷所有角色\",\"guid\":\"4B72BE10FF9333E34A5040C6BF424B20\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"31\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者資料\",\"guid\":\"7B65FAEF91541F99D6247A5A55A31E53\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"32\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者資料\",\"guid\":\"A5389CFCFC0B67A3C5A079D11D487083\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"33\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者密碼\",\"guid\":\"713911BE9C23CAB930E74618C567DF5B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"34\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者程式\",\"guid\":\"A7E8C8FA964DEA5B2E00B6BCD3554366\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"35\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者樹狀選單\",\"guid\":\"820D196327A04D67B430F7E32CC7E08C\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"36\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"查詢選單\",\"guid\":\"89996F463820BC89DA218E8BC161B73B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"37\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"新增選單\",\"guid\":\"6D2FDBFF8429ADF495F8E947C9563093\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"38\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"修改選單\",\"guid\":\"C02A5FF9CAA42A9C1983600EA55E0D64\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"39\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"刪除選單\",\"guid\":\"8CADB2EF4B106FD4E5217B8E62C43483\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"40\",\"category_id\":\"6\",\"category_name\":\"操作紀錄\",\"name\":\"查詢操作紀錄\",\"guid\":\"999E2E30F65D4DDAD416036813A8993B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:04'),
(33, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:10'),
(34, 1, '::1', 11, 'PUT', 'role', '', '[\"2\"]', '\"{\"name\":\"網站管理員\",\"status\":\"0\",\"remark\":\"\"}\"', '0', '執行成功', '{\"id\":\"2\"}', '2022-04-14 15:23:10'),
(35, 1, '::1', 13, 'POST', 'role', 'registerprogram', '[]', '\"{\"role_id\":\"2\",\"program_ids\":\"31,32,33,34,35\",\"unregisterall\":true}\"', '0', '執行成功', '{\"role_id\":\"2\",\"program_ids\":\"35\"}', '2022-04-14 15:23:10'),
(36, 1, '::1', 13, 'POST', 'role', 'registerprogram', '[]', '\"{\"role_id\":\"2\",\"program_ids\":\"1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40\",\"unregisterall\":false}\"', '0', '執行成功', '{\"role_id\":\"2\",\"program_ids\":\"40\"}', '2022-04-14 15:23:10'),
(37, 1, '::1', 18, 'POST', 'role', 'registermenu', '[]', '\"{\"role_id\":\"2\",\"menu_ids\":\"1,2,3,4,5,6,7,8\",\"unregisterall\":true}\"', '0', '執行成功', '{\"role_id\":\"2\",\"menu_ids\":\"1,2,3,4,5,6,7,8\"}', '2022-04-14 15:23:10'),
(38, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:11'),
(39, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:11'),
(40, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:11'),
(41, 1, '::1', 9, 'GET', 'role', '', '[]', 'null', '0', '執行成功', '\"2\"', '2022-04-14 15:23:12'),
(42, 1, '::1', 9, 'GET', 'role', '', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"name\":\"系統管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2019-03-09 15:54:58\",\"c_user_id\":\"0\",\"u_time\":\"2019-03-09 15:54:58\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"name\":\"網站管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2021-06-05 15:01:38\",\"c_user_id\":\"1\",\"u_time\":\"2021-06-05 15:01:38\",\"u_user_id\":\"1\"}]', '2022-04-14 15:23:12'),
(43, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:15'),
(44, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:15'),
(45, 1, '::1', 9, 'GET', 'role', '', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"2\",\"name\":\"網站管理員\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2021-06-05 15:01:38\",\"c_user_id\":\"1\",\"u_time\":\"2021-06-05 15:01:38\",\"u_user_id\":\"1\"}]', '2022-04-14 15:23:15'),
(46, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:15'),
(47, 1, '::1', 22, 'GET', 'role', 'menu', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"list_order\":\"100\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"list_order\":\"9000\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"parent_id\":\"2\",\"parent_name\":\"權限\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"list_order\":\"9010\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"parent_id\":\"2\",\"parent_name\":\"權限\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"list_order\":\"9020\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"list_order\":\"9100\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"parent_id\":\"5\",\"parent_name\":\"使用者資料\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"list_order\":\"9110\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"7\",\"parent_id\":\"5\",\"parent_name\":\"使用者資料\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"list_order\":\"9120\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"8\",\"parent_id\":\"0\",\"parent_name\":null,\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"list_order\":\"9200\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:15'),
(48, 1, '::1', 1, 'GET', 'programcategory', '', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"name\":\"程式類別\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"name\":\"程式\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"name\":\"角色\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"name\":\"使用者\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"name\":\"選單\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"name\":\"操作紀錄\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:15'),
(49, 1, '::1', 34, 'GET', 'user', 'loginuserprogram', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"查詢程式類別\",\"guid\":\"A5E214B8215C7102CFA530856A548C6A\",\"remark\":null},{\"id\":\"2\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"新增程式類別\",\"guid\":\"250038B29B2A8B92FEDB031694588D3F\",\"remark\":null},{\"id\":\"3\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"修改程式類別\",\"guid\":\"D4AA08388D01A7CBD35AE21221C1AA64\",\"remark\":null},{\"id\":\"4\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"刪除程式類別\",\"guid\":\"619CA96841B5A4814EFED3C60A5A6CFD\",\"remark\":null},{\"id\":\"5\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"查詢程式\",\"guid\":\"E47212F055F9748C9313F87E74106544\",\"remark\":null},{\"id\":\"6\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"新增程式\",\"guid\":\"75699A307CF4C23407EAB515F444A260\",\"remark\":null},{\"id\":\"7\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"修改程式\",\"guid\":\"BDC15D7876BB188264EBA1CD5A3F03BD\",\"remark\":null},{\"id\":\"8\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"刪除程式\",\"guid\":\"3E21AD3DC59D6CC9BCEC90E562CD127E\",\"remark\":null},{\"id\":\"9\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色\",\"guid\":\"D9D0FB041171CBFF002F1D02A7D01E5E\",\"remark\":null},{\"id\":\"10\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"新增角色\",\"guid\":\"2482DDDCDCB3C85EB72DDAE2330DCE30\",\"remark\":null},{\"id\":\"11\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"修改角色\",\"guid\":\"F40D8A063D77C197CE6125F7666AB056\",\"remark\":null},{\"id\":\"12\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"刪除角色\",\"guid\":\"E6BADA98AA9D8C835354B1DF2A83CB92\",\"remark\":null},{\"id\":\"13\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊程式\",\"guid\":\"333CDC633438A89A005B4610ED7D00C8\",\"remark\":null},{\"id\":\"14\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有程式\",\"guid\":\"C304430C714757C788A4FD082D94121E\",\"remark\":null},{\"id\":\"15\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷程式\",\"guid\":\"A860C4A437AE730D5B70C6BA27A5343D\",\"remark\":null},{\"id\":\"16\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有程式\",\"guid\":\"209D04489E9950DA056F580D9130E829\",\"remark\":null},{\"id\":\"17\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色程式\",\"guid\":\"1C2733127AC3CC8BDC40A704E9DCF5A5\",\"remark\":null},{\"id\":\"18\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊選單\",\"guid\":\"FA0100D2EF870731B3450C0E347AEE91\",\"remark\":null},{\"id\":\"19\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有選單\",\"guid\":\"488846F4CE7B43342EB3FA994E42CD86\",\"remark\":null},{\"id\":\"20\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷選單\",\"guid\":\"901C788ABDEC80F44971B2D26154D253\",\"remark\":null},{\"id\":\"21\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有選單\",\"guid\":\"6BF9D523FEDEE45D677E3FB9CA5BCA4A\",\"remark\":null},{\"id\":\"22\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色選單\",\"guid\":\"5021F9264DB1D0212BE75E562BE3423F\",\"remark\":null},{\"id\":\"23\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢使用者\",\"guid\":\"6FFF994902F45E92C56C27817E4C8A63\",\"remark\":null},{\"id\":\"24\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"新增使用者\",\"guid\":\"6DFCB35F2D2B76A35E864DEB4923AC16\",\"remark\":null},{\"id\":\"25\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者\",\"guid\":\"6D9B8D251E4F005595D45735AF276A5B\",\"remark\":null},{\"id\":\"26\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"刪除使用者\",\"guid\":\"8154DEBC7B540D07EA5F37DAE7DAC654\",\"remark\":null},{\"id\":\"27\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者密碼\",\"guid\":\"3CD3753F6F16C0A08E55770D9556EBC0\",\"remark\":null},{\"id\":\"28\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註冊角色\",\"guid\":\"06A86144ACF42137EC3C6CE54C2193B4\",\"remark\":null},{\"id\":\"29\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷角色\",\"guid\":\"CF98E0849C98EA9E50AE61104878A87E\",\"remark\":null},{\"id\":\"30\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷所有角色\",\"guid\":\"4B72BE10FF9333E34A5040C6BF424B20\",\"remark\":null},{\"id\":\"31\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者資料\",\"guid\":\"7B65FAEF91541F99D6247A5A55A31E53\",\"remark\":null},{\"id\":\"32\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者資料\",\"guid\":\"A5389CFCFC0B67A3C5A079D11D487083\",\"remark\":null},{\"id\":\"33\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者密碼\",\"guid\":\"713911BE9C23CAB930E74618C567DF5B\",\"remark\":null},{\"id\":\"34\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者程式\",\"guid\":\"A7E8C8FA964DEA5B2E00B6BCD3554366\",\"remark\":null},{\"id\":\"35\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者樹狀選單\",\"guid\":\"820D196327A04D67B430F7E32CC7E08C\",\"remark\":null},{\"id\":\"36\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"查詢選單\",\"guid\":\"89996F463820BC89DA218E8BC161B73B\",\"remark\":null},{\"id\":\"37\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"新增選單\",\"guid\":\"6D2FDBFF8429ADF495F8E947C9563093\",\"remark\":null},{\"id\":\"38\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"修改選單\",\"guid\":\"C02A5FF9CAA42A9C1983600EA55E0D64\",\"remark\":null},{\"id\":\"39\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"刪除選單\",\"guid\":\"8CADB2EF4B106FD4E5217B8E62C43483\",\"remark\":null},{\"id\":\"40\",\"category_id\":\"6\",\"category_name\":\"操作紀錄\",\"name\":\"查詢操作紀錄\",\"guid\":\"999E2E30F65D4DDAD416036813A8993B\",\"remark\":null}]', '2022-04-14 15:23:15'),
(50, 1, '::1', 17, 'GET', 'role', 'program', '[\"2\"]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"查詢程式類別\",\"guid\":\"A5E214B8215C7102CFA530856A548C6A\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"2\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"新增程式類別\",\"guid\":\"250038B29B2A8B92FEDB031694588D3F\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"3\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"修改程式類別\",\"guid\":\"D4AA08388D01A7CBD35AE21221C1AA64\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"4\",\"category_id\":\"1\",\"category_name\":\"程式類別\",\"name\":\"刪除程式類別\",\"guid\":\"619CA96841B5A4814EFED3C60A5A6CFD\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"5\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"查詢程式\",\"guid\":\"E47212F055F9748C9313F87E74106544\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"6\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"新增程式\",\"guid\":\"75699A307CF4C23407EAB515F444A260\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"7\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"修改程式\",\"guid\":\"BDC15D7876BB188264EBA1CD5A3F03BD\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"8\",\"category_id\":\"2\",\"category_name\":\"程式\",\"name\":\"刪除程式\",\"guid\":\"3E21AD3DC59D6CC9BCEC90E562CD127E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"9\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色\",\"guid\":\"D9D0FB041171CBFF002F1D02A7D01E5E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"10\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"新增角色\",\"guid\":\"2482DDDCDCB3C85EB72DDAE2330DCE30\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"11\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"修改角色\",\"guid\":\"F40D8A063D77C197CE6125F7666AB056\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"12\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"刪除角色\",\"guid\":\"E6BADA98AA9D8C835354B1DF2A83CB92\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"13\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊程式\",\"guid\":\"333CDC633438A89A005B4610ED7D00C8\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"14\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有程式\",\"guid\":\"C304430C714757C788A4FD082D94121E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"15\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷程式\",\"guid\":\"A860C4A437AE730D5B70C6BA27A5343D\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"16\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有程式\",\"guid\":\"209D04489E9950DA056F580D9130E829\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"17\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色程式\",\"guid\":\"1C2733127AC3CC8BDC40A704E9DCF5A5\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"18\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊選單\",\"guid\":\"FA0100D2EF870731B3450C0E347AEE91\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"19\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註冊所有選單\",\"guid\":\"488846F4CE7B43342EB3FA994E42CD86\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"20\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷選單\",\"guid\":\"901C788ABDEC80F44971B2D26154D253\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"21\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"角色註銷所有選單\",\"guid\":\"6BF9D523FEDEE45D677E3FB9CA5BCA4A\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"22\",\"category_id\":\"3\",\"category_name\":\"角色\",\"name\":\"查詢角色選單\",\"guid\":\"5021F9264DB1D0212BE75E562BE3423F\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"23\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢使用者\",\"guid\":\"6FFF994902F45E92C56C27817E4C8A63\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"24\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"新增使用者\",\"guid\":\"6DFCB35F2D2B76A35E864DEB4923AC16\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"25\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者\",\"guid\":\"6D9B8D251E4F005595D45735AF276A5B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"26\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"刪除使用者\",\"guid\":\"8154DEBC7B540D07EA5F37DAE7DAC654\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"27\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改使用者密碼\",\"guid\":\"3CD3753F6F16C0A08E55770D9556EBC0\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"28\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註冊角色\",\"guid\":\"06A86144ACF42137EC3C6CE54C2193B4\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"29\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷角色\",\"guid\":\"CF98E0849C98EA9E50AE61104878A87E\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"30\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"使用者註銷所有角色\",\"guid\":\"4B72BE10FF9333E34A5040C6BF424B20\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"31\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者資料\",\"guid\":\"7B65FAEF91541F99D6247A5A55A31E53\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"32\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者資料\",\"guid\":\"A5389CFCFC0B67A3C5A079D11D487083\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"33\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"修改登入使用者密碼\",\"guid\":\"713911BE9C23CAB930E74618C567DF5B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"34\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者程式\",\"guid\":\"A7E8C8FA964DEA5B2E00B6BCD3554366\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"35\",\"category_id\":\"4\",\"category_name\":\"使用者\",\"name\":\"查詢登入使用者樹狀選單\",\"guid\":\"820D196327A04D67B430F7E32CC7E08C\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"36\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"查詢選單\",\"guid\":\"89996F463820BC89DA218E8BC161B73B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"37\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"新增選單\",\"guid\":\"6D2FDBFF8429ADF495F8E947C9563093\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"38\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"修改選單\",\"guid\":\"C02A5FF9CAA42A9C1983600EA55E0D64\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"39\",\"category_id\":\"5\",\"category_name\":\"選單\",\"name\":\"刪除選單\",\"guid\":\"8CADB2EF4B106FD4E5217B8E62C43483\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"},{\"id\":\"40\",\"category_id\":\"6\",\"category_name\":\"操作紀錄\",\"name\":\"查詢操作紀錄\",\"guid\":\"999E2E30F65D4DDAD416036813A8993B\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-12-21 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2021-12-21 12:00:00\",\"u_user_id\":\"0\"}]', '2022-04-14 15:23:15'),
(51, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:28'),
(52, 1, '::1', 35, 'GET', 'user', 'loginusermenutree', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"儀表板\",\"url\":\"dashboard.php\",\"icon\":\"fas fa-tachometer-alt\",\"program_ids\":null,\"remark\":null,\"submenu\":null},{\"id\":\"2\",\"parent_id\":\"0\",\"name\":\"權限\",\"url\":null,\"icon\":\"fas fa-users-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"3\",\"parent_id\":\"2\",\"name\":\"角色\",\"url\":\"role_list.php\",\"icon\":\"fas fa-users\",\"program_ids\":\"9,10,11,12,13,14,15,16,17,18,19,20,21,22\",\"remark\":null,\"submenu\":null},{\"id\":\"4\",\"parent_id\":\"2\",\"name\":\"使用者\",\"url\":\"user_list.php\",\"icon\":\"fas fa-user\",\"program_ids\":\"23,24,25,26,27,28,29,30\",\"remark\":null,\"submenu\":null}]},{\"id\":\"5\",\"parent_id\":\"0\",\"name\":\"使用者資料\",\"url\":null,\"icon\":\"fas fa-user-cog\",\"program_ids\":null,\"remark\":null,\"submenu\":[{\"id\":\"6\",\"parent_id\":\"5\",\"name\":\"修改資料\",\"url\":\"loginuser_data_edit.php\",\"icon\":\"fas fa-user-edit\",\"program_ids\":\"31,32\",\"remark\":null,\"submenu\":null},{\"id\":\"7\",\"parent_id\":\"5\",\"name\":\"修改密碼\",\"url\":\"loginuser_password_edit.php\",\"icon\":\"fas fa-user-lock\",\"program_ids\":\"33\",\"remark\":null,\"submenu\":null}]},{\"id\":\"8\",\"parent_id\":\"0\",\"name\":\"操作紀錄\",\"url\":\"log_list.php\",\"icon\":\"fas fa-edit\",\"program_ids\":\"40\",\"remark\":null,\"submenu\":null}]', '2022-04-14 15:23:28'),
(53, 1, '::1', 31, 'GET', 'user', 'loginuserdata', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]}]', '2022-04-14 15:23:28'),
(54, 1, '::1', 23, 'GET', 'user', '', '[]', 'null', '0', '執行成功', '[{\"id\":\"1\",\"account\":\"admin@ks\",\"name\":\"admin\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-04-14 15:07:25\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"0\",\"u_time\":\"2022-04-14 15:07:25\",\"u_user_id\":\"1\",\"roles\":[\"1\"]},{\"id\":\"2\",\"account\":\"web_server\",\"name\":\"web_server\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"02-87716606\",\"last_login_time\":\"2022-03-10 15:53:23\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":null,\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"1\",\"u_time\":\"2022-04-14 14:37:45\",\"u_user_id\":\"1\",\"roles\":[\"1\"]},{\"id\":\"3\",\"account\":\"vic@ks\",\"name\":\"vic@ks\",\"email\":\"vic@ks-design.com.tw\",\"phone\":\"\",\"last_login_time\":\"2022-03-28 11:05:43\",\"last_login_ip\":\"::1\",\"status\":\"0\",\"remark\":\"\",\"c_time\":\"2021-08-30 12:00:00\",\"c_user_id\":\"1\",\"u_time\":\"2022-04-14 14:36:52\",\"u_user_id\":\"1\",\"roles\":[\"2\"]}]', '2022-04-14 15:23:28');

-- --------------------------------------------------------

--
-- 資料表結構 `login_user`
--

CREATE TABLE `login_user` (
  `user_id` int(11) DEFAULT NULL COMMENT '使用者編號',
  `token` varchar(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '存取權杖',
  `login_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '登入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `login_user`
--

INSERT INTO `login_user` (`user_id`, `token`, `login_time`) VALUES
(1, '74DA09B095590FCCBEEA6AA5AA0BF248', '2022-04-14 15:07:25');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `log_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `log_view` (
`id` int(11)
,`user_id` int(11)
,`user_account` varchar(128)
,`user_name` varchar(64)
,`ip` varchar(128)
,`program_id` int(11)
,`program_name` varchar(64)
,`verb` varchar(64)
,`args` text
,`file` text
,`resultCode` varchar(16)
,`resultMessage` varchar(64)
,`resultData` text
,`c_time` datetime
);

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL COMMENT '選單編號',
  `parent_id` int(11) DEFAULT NULL COMMENT '父選單編號',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '選單名稱',
  `url` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `icon` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '選單圖示',
  `program_ids` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '相關程式編號',
  `list_order` int(11) DEFAULT NULL COMMENT '列表順序',
  `status` tinyint(1) DEFAULT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間	',
  `c_user_id` int(11) DEFAULT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間	',
  `u_user_id` int(11) DEFAULT NULL COMMENT '修改使用者編號	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `url`, `icon`, `program_ids`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, 0, '儀表板', 'dashboard.php', 'fas fa-tachometer-alt', NULL, 100, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(2, 0, '權限', NULL, 'fas fa-users-cog', NULL, 9000, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(3, 2, '角色', 'role_list.php', 'fas fa-users', '9,10,11,12,13,14,15,16,17,18,19,20,21,22', 9010, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(4, 2, '使用者', 'user_list.php', 'fas fa-user', '23,24,25,26,27,28,29,30', 9020, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(5, 0, '使用者資料', NULL, 'fas fa-user-cog', NULL, 9100, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(6, 5, '修改資料', 'loginuser_data_edit.php', 'fas fa-user-edit', '31,32', 9110, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(7, 5, '修改密碼', 'loginuser_password_edit.php', 'fas fa-user-lock', '33', 9120, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(8, 0, '操作紀錄', 'log_list.php', 'fas fa-edit', '40', 9200, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `menu_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `menu_view` (
`id` int(11)
,`parent_id` int(11)
,`parent_name` varchar(64)
,`name` varchar(64)
,`url` varchar(512)
,`icon` varchar(128)
,`program_ids` text
,`list_order` int(11)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 資料表結構 `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL COMMENT '程式編號',
  `category_id` int(11) DEFAULT NULL COMMENT '程式類別編號',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '程式名稱',
  `guid` varchar(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '程式代號',
  `status` tinyint(1) DEFAULT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) DEFAULT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) DEFAULT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `program`
--

INSERT INTO `program` (`id`, `category_id`, `name`, `guid`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, 1, '查詢程式類別', 'A5E214B8215C7102CFA530856A548C6A', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(2, 1, '新增程式類別', '250038B29B2A8B92FEDB031694588D3F', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(3, 1, '修改程式類別', 'D4AA08388D01A7CBD35AE21221C1AA64', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(4, 1, '刪除程式類別', '619CA96841B5A4814EFED3C60A5A6CFD', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(5, 2, '查詢程式', 'E47212F055F9748C9313F87E74106544', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(6, 2, '新增程式', '75699A307CF4C23407EAB515F444A260', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(7, 2, '修改程式', 'BDC15D7876BB188264EBA1CD5A3F03BD', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(8, 2, '刪除程式', '3E21AD3DC59D6CC9BCEC90E562CD127E', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(9, 3, '查詢角色', 'D9D0FB041171CBFF002F1D02A7D01E5E', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(10, 3, '新增角色', '2482DDDCDCB3C85EB72DDAE2330DCE30', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(11, 3, '修改角色', 'F40D8A063D77C197CE6125F7666AB056', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(12, 3, '刪除角色', 'E6BADA98AA9D8C835354B1DF2A83CB92', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(13, 3, '角色註冊程式', '333CDC633438A89A005B4610ED7D00C8', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(14, 3, '角色註冊所有程式', 'C304430C714757C788A4FD082D94121E', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(15, 3, '角色註銷程式', 'A860C4A437AE730D5B70C6BA27A5343D', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(16, 3, '角色註銷所有程式', '209D04489E9950DA056F580D9130E829', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(17, 3, '查詢角色程式', '1C2733127AC3CC8BDC40A704E9DCF5A5', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(18, 3, '角色註冊選單', 'FA0100D2EF870731B3450C0E347AEE91', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(19, 3, '角色註冊所有選單', '488846F4CE7B43342EB3FA994E42CD86', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(20, 3, '角色註銷選單', '901C788ABDEC80F44971B2D26154D253', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(21, 3, '角色註銷所有選單', '6BF9D523FEDEE45D677E3FB9CA5BCA4A', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(22, 3, '查詢角色選單', '5021F9264DB1D0212BE75E562BE3423F', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(23, 4, '查詢使用者', '6FFF994902F45E92C56C27817E4C8A63', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(24, 4, '新增使用者', '6DFCB35F2D2B76A35E864DEB4923AC16', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(25, 4, '修改使用者', '6D9B8D251E4F005595D45735AF276A5B', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(26, 4, '刪除使用者', '8154DEBC7B540D07EA5F37DAE7DAC654', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(27, 4, '修改使用者密碼', '3CD3753F6F16C0A08E55770D9556EBC0', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(28, 4, '使用者註冊角色', '06A86144ACF42137EC3C6CE54C2193B4', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(29, 4, '使用者註銷角色', 'CF98E0849C98EA9E50AE61104878A87E', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(30, 4, '使用者註銷所有角色', '4B72BE10FF9333E34A5040C6BF424B20', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(31, 4, '查詢登入使用者資料', '7B65FAEF91541F99D6247A5A55A31E53', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(32, 4, '修改登入使用者資料', 'A5389CFCFC0B67A3C5A079D11D487083', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(33, 4, '修改登入使用者密碼', '713911BE9C23CAB930E74618C567DF5B', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(34, 4, '查詢登入使用者程式', 'A7E8C8FA964DEA5B2E00B6BCD3554366', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(35, 4, '查詢登入使用者樹狀選單', '820D196327A04D67B430F7E32CC7E08C', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(36, 5, '查詢選單', '89996F463820BC89DA218E8BC161B73B', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(37, 5, '新增選單', '6D2FDBFF8429ADF495F8E947C9563093', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(38, 5, '修改選單', 'C02A5FF9CAA42A9C1983600EA55E0D64', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(39, 5, '刪除選單', '8CADB2EF4B106FD4E5217B8E62C43483', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(40, 6, '查詢操作紀錄', '999E2E30F65D4DDAD416036813A8993B', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `program_category`
--

CREATE TABLE `program_category` (
  `id` int(11) NOT NULL COMMENT '程式類別編號',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '程式類別名稱',
  `status` tinyint(1) DEFAULT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) DEFAULT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) DEFAULT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `program_category`
--

INSERT INTO `program_category` (`id`, `name`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '程式類別', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(2, '程式', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(3, '角色', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(4, '使用者', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(5, '選單', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(6, '操作紀錄', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `program_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `program_view` (
`id` int(11)
,`category_id` int(11)
,`category_name` varchar(64)
,`name` varchar(64)
,`guid` varchar(36)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 資料表結構 `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL COMMENT '角色編號',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '角色名稱',
  `status` tinyint(1) DEFAULT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) DEFAULT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) DEFAULT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `role`
--

INSERT INTO `role` (`id`, `name`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '系統管理員', 0, '', '2019-03-09 15:54:58', 0, '2019-03-09 15:54:58', 0),
(2, '網站管理員', 0, '', '2021-06-05 15:01:38', 1, '2021-06-05 15:01:38', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `role_menu`
--

CREATE TABLE `role_menu` (
  `role_id` int(11) NOT NULL COMMENT '角色編號',
  `menu_id` int(11) NOT NULL COMMENT '選單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `role_menu`
--

INSERT INTO `role_menu` (`role_id`, `menu_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `role_menu_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `role_menu_view` (
`role_id` int(11)
,`role_name` varchar(64)
,`role_status` tinyint(1)
,`id` int(11)
,`parent_id` int(11)
,`parent_name` varchar(64)
,`name` varchar(64)
,`url` varchar(512)
,`icon` varchar(128)
,`program_ids` text
,`list_order` int(11)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 資料表結構 `role_program`
--

CREATE TABLE `role_program` (
  `role_id` int(11) NOT NULL COMMENT '角色編號',
  `program_id` int(11) NOT NULL COMMENT '程式編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `role_program`
--

INSERT INTO `role_program` (`role_id`, `program_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `role_program_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `role_program_view` (
`role_id` int(11)
,`role_name` varchar(64)
,`role_status` tinyint(1)
,`id` int(11)
,`category_id` int(11)
,`category_name` varchar(64)
,`name` varchar(64)
,`guid` varchar(36)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 資料表結構 `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL COMMENT '角色編號',
  `user_id` int(11) NOT NULL COMMENT '使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `role_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `role_view` (
`id` int(11)
,`name` varchar(64)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '使用者編號',
  `account` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '帳號',
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '密碼，AES-ECB加密',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '電子郵件',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '聯絡電話',
  `last_login_time` datetime DEFAULT NULL COMMENT '最後登入時間',
  `last_login_ip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最後登入IP位址',
  `status` tinyint(1) DEFAULT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) DEFAULT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) DEFAULT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `email`, `phone`, `last_login_time`, `last_login_ip`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, 'admin@ks', 'cmxh50Ez0B/z55NSULSWJg==', 'admin', 'vic@ks-design.com.tw', '', '2022-04-14 15:07:25', '::1', 0, NULL, '2021-08-30 12:00:00', 0, '2022-04-14 15:07:25', 1),
(2, 'web_server', 'P/KpvuTIsLXejoQ9ItFj5Q==', 'web_server', 'vic@ks-design.com.tw', '02-87716606', '2022-03-10 15:53:23', '::1', 0, NULL, '2021-08-30 12:00:00', 1, '2022-04-14 14:37:45', 1),
(3, 'vic@ks', 'cmxh50Ez0B/z55NSULSWJg==', 'vic@ks', 'vic@ks-design.com.tw', '', '2022-03-28 11:05:43', '::1', 0, '', '2021-08-30 12:00:00', 1, '2022-04-14 14:36:52', 1);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `user_role_menu_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `user_role_menu_view` (
`user_id` int(11)
,`user_account` varchar(128)
,`user_name` varchar(64)
,`user_status` tinyint(1)
,`id` int(11)
,`parent_id` int(11)
,`name` varchar(64)
,`url` varchar(512)
,`icon` varchar(128)
,`program_ids` text
,`status` tinyint(1)
,`remark` text
,`list_order` int(11)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `user_role_program_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `user_role_program_view` (
`user_id` int(11)
,`user_account` varchar(128)
,`user_name` varchar(64)
,`user_status` tinyint(1)
,`role_id` int(11)
,`role_name` varchar(64)
,`role_status` tinyint(1)
,`program_id` int(11)
,`program_name` varchar(64)
,`program_status` tinyint(1)
,`program_guid` varchar(36)
,`program_remark` text
,`program_category_id` int(11)
,`program_category_name` varchar(64)
,`program_category_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `user_view`
-- (請參考以下實際畫面)
--
CREATE TABLE `user_view` (
`id` int(11)
,`account` varchar(128)
,`name` varchar(64)
,`email` varchar(128)
,`phone` varchar(20)
,`last_login_time` datetime
,`last_login_ip` varchar(128)
,`status` tinyint(1)
,`remark` text
,`c_time` datetime
,`c_user_id` int(11)
,`u_time` datetime
,`u_user_id` int(11)
);

-- --------------------------------------------------------

--
-- 檢視表結構 `log_view`
--
DROP TABLE IF EXISTS `log_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `log_view`  AS SELECT `log`.`id` AS `id`, `log`.`user_id` AS `user_id`, `user`.`account` AS `user_account`, `user`.`name` AS `user_name`, `log`.`ip` AS `ip`, `log`.`program_id` AS `program_id`, `program`.`name` AS `program_name`, `log`.`verb` AS `verb`, `log`.`args` AS `args`, `log`.`file` AS `file`, `log`.`resultCode` AS `resultCode`, `log`.`resultMessage` AS `resultMessage`, `log`.`resultData` AS `resultData`, `log`.`c_time` AS `c_time` FROM ((`log` left join `user` on(`log`.`user_id` = `user`.`id`)) left join `program` on(`log`.`program_id` = `program`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `menu_view`
--
DROP TABLE IF EXISTS `menu_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menu_view`  AS SELECT `menu`.`id` AS `id`, `menu`.`parent_id` AS `parent_id`, `parent_menu`.`name` AS `parent_name`, `menu`.`name` AS `name`, `menu`.`url` AS `url`, `menu`.`icon` AS `icon`, `menu`.`program_ids` AS `program_ids`, `menu`.`list_order` AS `list_order`, `menu`.`status` AS `status`, `menu`.`remark` AS `remark`, `menu`.`c_time` AS `c_time`, `menu`.`c_user_id` AS `c_user_id`, `menu`.`u_time` AS `u_time`, `menu`.`u_user_id` AS `u_user_id` FROM (`menu` left join `menu` `parent_menu` on(`menu`.`parent_id` = `parent_menu`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `program_view`
--
DROP TABLE IF EXISTS `program_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `program_view`  AS SELECT `program`.`id` AS `id`, `program`.`category_id` AS `category_id`, `program_category`.`name` AS `category_name`, `program`.`name` AS `name`, `program`.`guid` AS `guid`, `program`.`status` AS `status`, `program`.`remark` AS `remark`, `program`.`c_time` AS `c_time`, `program`.`c_user_id` AS `c_user_id`, `program`.`u_time` AS `u_time`, `program`.`u_user_id` AS `u_user_id` FROM (`program` left join `program_category` on(`program`.`category_id` = `program_category`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `role_menu_view`
--
DROP TABLE IF EXISTS `role_menu_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `role_menu_view`  AS SELECT `role`.`id` AS `role_id`, `role`.`name` AS `role_name`, `role`.`status` AS `role_status`, `menu_view`.`id` AS `id`, `menu_view`.`parent_id` AS `parent_id`, `menu_view`.`parent_name` AS `parent_name`, `menu_view`.`name` AS `name`, `menu_view`.`url` AS `url`, `menu_view`.`icon` AS `icon`, `menu_view`.`program_ids` AS `program_ids`, `menu_view`.`list_order` AS `list_order`, `menu_view`.`status` AS `status`, `menu_view`.`remark` AS `remark`, `menu_view`.`c_time` AS `c_time`, `menu_view`.`c_user_id` AS `c_user_id`, `menu_view`.`u_time` AS `u_time`, `menu_view`.`u_user_id` AS `u_user_id` FROM ((`role` left join `role_menu` on(`role`.`id` = `role_menu`.`role_id`)) join `menu_view` on(`role_menu`.`menu_id` = `menu_view`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `role_program_view`
--
DROP TABLE IF EXISTS `role_program_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `role_program_view`  AS SELECT `role`.`id` AS `role_id`, `role`.`name` AS `role_name`, `role`.`status` AS `role_status`, `program_view`.`id` AS `id`, `program_view`.`category_id` AS `category_id`, `program_view`.`category_name` AS `category_name`, `program_view`.`name` AS `name`, `program_view`.`guid` AS `guid`, `program_view`.`status` AS `status`, `program_view`.`remark` AS `remark`, `program_view`.`c_time` AS `c_time`, `program_view`.`c_user_id` AS `c_user_id`, `program_view`.`u_time` AS `u_time`, `program_view`.`u_user_id` AS `u_user_id` FROM ((`role` left join `role_program` on(`role`.`id` = `role_program`.`role_id`)) join `program_view` on(`role_program`.`program_id` = `program_view`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `role_view`
--
DROP TABLE IF EXISTS `role_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `role_view`  AS SELECT `role`.`id` AS `id`, `role`.`name` AS `name`, `role`.`status` AS `status`, `role`.`remark` AS `remark`, `role`.`c_time` AS `c_time`, `role`.`c_user_id` AS `c_user_id`, `role`.`u_time` AS `u_time`, `role`.`u_user_id` AS `u_user_id` FROM `role` ;

-- --------------------------------------------------------

--
-- 檢視表結構 `user_role_menu_view`
--
DROP TABLE IF EXISTS `user_role_menu_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_role_menu_view`  AS SELECT `user`.`id` AS `user_id`, `user`.`account` AS `user_account`, `user`.`name` AS `user_name`, `user`.`status` AS `user_status`, `menu`.`id` AS `id`, `menu`.`parent_id` AS `parent_id`, `menu`.`name` AS `name`, `menu`.`url` AS `url`, `menu`.`icon` AS `icon`, `menu`.`program_ids` AS `program_ids`, `menu`.`status` AS `status`, `menu`.`remark` AS `remark`, `menu`.`list_order` AS `list_order` FROM ((((`user` left join `role_user` on(`user`.`id` = `role_user`.`user_id`)) left join `role` on(`role_user`.`role_id` = `role`.`id`)) left join `role_menu` on(`role`.`id` = `role_menu`.`role_id`)) left join `menu` on(`role_menu`.`menu_id` = `menu`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `user_role_program_view`
--
DROP TABLE IF EXISTS `user_role_program_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_role_program_view`  AS SELECT `user`.`id` AS `user_id`, `user`.`account` AS `user_account`, `user`.`name` AS `user_name`, `user`.`status` AS `user_status`, `role`.`id` AS `role_id`, `role`.`name` AS `role_name`, `role`.`status` AS `role_status`, `program`.`id` AS `program_id`, `program`.`name` AS `program_name`, `program`.`status` AS `program_status`, `program`.`guid` AS `program_guid`, `program_category`.`remark` AS `program_remark`, `program_category`.`id` AS `program_category_id`, `program_category`.`name` AS `program_category_name`, `program_category`.`status` AS `program_category_status` FROM (((((`user` left join `role_user` on(`user`.`id` = `role_user`.`user_id`)) left join `role` on(`role_user`.`role_id` = `role`.`id`)) left join `role_program` on(`role`.`id` = `role_program`.`role_id`)) left join `program` on(`role_program`.`program_id` = `program`.`id`)) join `program_category` on(`program`.`category_id` = `program_category`.`id`)) ;

-- --------------------------------------------------------

--
-- 檢視表結構 `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `user`.`id` AS `id`, `user`.`account` AS `account`, `user`.`name` AS `name`, `user`.`email` AS `email`, `user`.`phone` AS `phone`, `user`.`last_login_time` AS `last_login_time`, `user`.`last_login_ip` AS `last_login_ip`, `user`.`status` AS `status`, `user`.`remark` AS `remark`, `user`.`c_time` AS `c_time`, `user`.`c_user_id` AS `c_user_id`, `user`.`u_time` AS `u_time`, `user`.`u_user_id` AS `u_user_id` FROM `user` ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `program_category`
--
ALTER TABLE `program_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`role_id`,`menu_id`);

--
-- 資料表索引 `role_program`
--
ALTER TABLE `role_program`
  ADD PRIMARY KEY (`role_id`,`program_id`);

--
-- 資料表索引 `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '操作記錄編號', AUTO_INCREMENT=55;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '選單編號', AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '程式編號', AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `program_category`
--
ALTER TABLE `program_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '程式類別編號', AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者編號', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
