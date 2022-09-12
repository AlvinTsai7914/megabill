-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-18 09:57:00
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
-- 資料表結構 `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL COMMENT 'Banner編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間	',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `banner`
--

INSERT INTO `banner` (`id`, `name`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '/uploads/1650080711.png', '3', '/uploads/1650080712.png', '4', '', 1, 2, 0, '6', '2022-04-16 11:45:13', 1, '2022-04-16 12:05:31', 1),
(2, '2', '/uploads/1650081789.png', '2', '/uploads/1650081790.png', '2', '2', 1, 1, 0, '2', '2022-04-16 12:03:11', 1, '2022-04-16 12:05:31', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL COMMENT '薪資福利編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '1\r\n1\r\n1', '/uploads/1650262549.png', '1', '', '', 1, 0, '1', '2022-04-18 14:15:50', 1, '2022-04-18 14:19:43', 1),
(2, '2', '2\r\n2', '/uploads/1650262578.png', '2', '', '', 2, 0, '2', '2022-04-18 14:16:19', 1, '2022-04-18 14:19:43', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL COMMENT '業務簡介編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL COMMENT '公司訊息編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `release_date` date DEFAULT NULL COMMENT '發布日期',
  `start_date` datetime DEFAULT NULL COMMENT '啟用日期',
  `end_date` datetime DEFAULT NULL COMMENT '停用日期',
  `homepage_show` tinyint(1) NOT NULL COMMENT '首頁顯示',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `company`
--

INSERT INTO `company` (`id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/1920/920/?random=1\" />\r\n<div class=\"text-sub\">置中大圖的圖片說明文字</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', '', 0, '2022-04-18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '1', 1, 0, '1', '2022-04-18 08:50:20', 1, '2022-04-18 09:19:28', 1),
(2, '2', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-md-6 col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/920/360/?random=1\" />\r\n<div class=\"text-sub\">置中兩圖的圖片說明文字</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/920/360/?random=2\" />\r\n<div class=\"text-sub\">置中兩圖的圖片說明文字</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', '', 0, '2022-04-18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2', 2, 0, '2', '2022-04-18 08:50:42', 1, '2022-04-18 09:19:36', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `encyclopedia`
--

CREATE TABLE `encyclopedia` (
  `id` int(11) NOT NULL COMMENT '貨幣市場小百科編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `encyclopedia`
--

INSERT INTO `encyclopedia` (`id`, `name`, `content`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"row justify-content-center justify-content-md-around px-md-5\">\r\n<div class=\"col-8 col-sm-4 col-lg-3\">\r\n<div class=\"img-box-round mb-3 overflow-hidden\"><img alt=\"\" class=\"img-fluid\" src=\"https://fakeimg.pl/350x350\" /></div>\r\n\r\n<p class=\"title text-center\">上圖下文(圓)主標</p>\r\n\r\n<p class=\"text-center\">上圖下文(圓)內文內文</p>\r\n</div>\r\n\r\n<div class=\"col-8 col-sm-4 col-lg-3\">\r\n<div class=\"img-box-round mb-3 overflow-hidden\"><img alt=\"\" class=\"img-fluid\" src=\"https://fakeimg.pl/350x350\" /></div>\r\n\r\n<p class=\"title text-center\">上圖下文(圓)主標</p>\r\n\r\n<p class=\"text-center\">上圖下文(圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n\r\n<div class=\"col-8 col-sm-4 col-lg-3\">\r\n<div class=\"img-box-round mb-3 overflow-hidden\"><img alt=\"\" class=\"img-fluid\" src=\"https://fakeimg.pl/350x350\" /></div>\r\n\r\n<p class=\"title text-center\">上圖下文(圓)主標</p>\r\n\r\n<p class=\"text-center\">上圖下文(圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 1, 0, '1', '2022-04-18 15:02:10', 1, '2022-04-18 15:04:04', 1),
(2, '2', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"row justify-content-center mb-3\">\r\n<div class=\"col-4 col-sm-3 col-md-2 col-xl-1 pl-0\">\r\n<div class=\"img-box-round\"><img alt=\"\" src=\"https://fakeimg.pl/160x160\" /></div>\r\n</div>\r\n\r\n<div class=\"text-box col-8 col-sm-9 col-md-10 col-xl-11\">\r\n<p class=\"title m-0\">左圖右文(小圓)主標</p>\r\n\r\n<p class=\"mb-0\">左圖右文(小圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row justify-content-center mb-3\">\r\n<div class=\"col-4 col-sm-3 col-md-2 col-xl-1 pl-0\">\r\n<div class=\"img-box-round\"><img alt=\"\" src=\"https://fakeimg.pl/160x160\" /></div>\r\n</div>\r\n\r\n<div class=\"text-box col-8 col-sm-9 col-md-10 col-xl-11\">\r\n<p class=\"title m-0\">左圖右文(小圓)主標</p>\r\n\r\n<p class=\"mb-0\">左圖右文(小圓)內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 2, 0, '2', '2022-04-18 15:03:52', 1, '2022-04-18 15:04:04', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL COMMENT '友善連結編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `release_date` date DEFAULT NULL COMMENT '發布日期',
  `start_date` datetime DEFAULT NULL COMMENT '啟用日期',
  `end_date` datetime DEFAULT NULL COMMENT '停用日期',
  `homepage_show` tinyint(1) NOT NULL COMMENT '首頁顯示',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `links`
--

INSERT INTO `links` (`id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '', '', '', '', '', '1', 1, '0000-00-00', '2022-04-01 00:00:00', '2022-05-31 00:00:00', 1, '', 1, 0, '1', '2022-04-18 09:39:47', 1, '2022-04-18 09:47:39', 1),
(2, '2', '', '', '', '', '', '2', 0, '0000-00-00', '2022-04-19 00:00:00', '2022-05-20 00:00:00', 0, '', 2, 0, '2', '2022-04-18 09:47:17', 1, '2022-04-18 09:47:39', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL COMMENT '服務據點編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `map_embed` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '嵌入GoogleMap',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `location`
--

INSERT INTO `location` (`id`, `name`, `content`, `map_embed`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"text-sub\">表格[左標題右內容]的表格說明文字</div>\r\n\r\n<table class=\"table\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"row\">表格標題</th>\r\n			<td>表格內容</td>\r\n			<td>表格內容</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\">表格標題</th>\r\n			<td>表格內容</td>\r\n			<td>表格內容</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\">表格標題</th>\r\n			<td>表格內容</td>\r\n			<td>表格內容</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope=\"row\">表格標題</th>\r\n			<td>表格內容</td>\r\n			<td>表格內容</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4824626577!2d121.54581931537902!3d25.051631743737683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abe7ff2a8975%3A0x33dff12972c9cbe0!2z5Yex5pav5pW05ZCI6KGM6Yq36Kit6KiI!5e0!3m2!1szh-TW!2stw!4v1629080646507!5m2!1szh-TW!2stw\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 0, '1', '2022-04-18 11:39:46', 1, '2022-04-18 11:46:13', 1),
(2, '2', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/1920/920/?random=1\" />\r\n<div class=\"text-sub\">置中大圖的圖片說明文字</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 2, 0, '2', '2022-04-18 11:45:52', 1, '2022-04-18 11:46:13', 1);

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
(1, '818BA346C44293DF1BBF4E38B574A502', '2022-04-14 15:36:39'),
(3, 'FF3C1341E071FB46E7B34FFEBA583069', '2022-04-18 14:50:33');

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
-- 資料表結構 `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL COMMENT '市場行情編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `release_date` date DEFAULT NULL COMMENT '發布日期',
  `start_date` datetime DEFAULT NULL COMMENT '啟用日期',
  `end_date` datetime DEFAULT NULL COMMENT '停用日期',
  `homepage_show` tinyint(1) NOT NULL COMMENT '首頁顯示',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `market`
--

INSERT INTO `market` (`id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '1', '', '', '', '', '', 0, '2022-04-01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '1', 1, 0, '1', '2022-04-16 16:43:45', 1, '2022-04-18 09:18:03', 1),
(2, '2', '2\r\n2\r\n2', '', '', '', '', '', 0, '2022-04-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2', 2, 0, '2', '2022-04-16 16:53:23', 1, '2022-04-18 09:18:16', 1);

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
(8, 0, '操作紀錄', 'log_list.php', 'fas fa-edit', '40', 9200, 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(9, 0, '系統資訊', 'sysinfo_edit.php', 'fas fa-database', '41,42', 200, 0, NULL, '2022-04-16 10:37:36', NULL, '2022-04-16 10:37:36', NULL),
(10, 0, 'Banner', 'banner_list.php', 'fas fa-images', '43,44,45,46,47', 300, 0, NULL, '2022-04-16 11:28:58', NULL, '2022-04-16 11:28:58', NULL),
(11, 0, '動態消息', NULL, 'fas fa-newspaper', NULL, 400, 0, NULL, '2022-04-16 16:27:31', NULL, '2022-04-16 16:28:38', NULL),
(12, 11, '市場行情', 'market_list.php', 'fas fa-chart-line', '48,49,50,51,52', 410, 0, NULL, '2022-04-16 16:28:36', NULL, '2022-04-16 16:28:39', NULL),
(13, 11, '公司訊息', 'company_list.php', 'fas fa-info', '53,54,55,56,57', 420, 0, NULL, '2022-04-18 08:40:08', NULL, '2022-04-18 09:09:40', NULL),
(14, 11, '政策宣導', 'propaganda_list.php', 'fas fa-bullhorn', '58,59,60,61,62', 430, 0, NULL, '2022-04-18 09:09:17', NULL, '2022-04-18 09:09:17', NULL),
(15, 11, '友善連結', 'links_list.php', 'fas fa-link', '63,64,65,66,67', 440, 0, NULL, '2022-04-18 09:25:17', NULL, '2022-04-18 09:25:17', NULL),
(16, 0, '關於我們', '', '', NULL, 500, 0, NULL, '2022-04-18 10:24:45', NULL, '2022-04-18 10:24:45', NULL),
(17, 16, '關於兆票', 'about_edit.php', 'fas fa-address-card', '68', 510, 0, NULL, '2022-04-18 10:25:22', NULL, '2022-04-18 10:25:22', NULL),
(18, 16, '服務據點', 'location_list.php', 'fas fa-map-marker-alt', '69,70,71,72,73', 520, 0, NULL, '2022-04-18 11:32:25', NULL, '2022-04-18 11:32:25', NULL),
(19, 16, '職缺訊息', 'vacancy_list.php', 'fas fa-id-badge', '74,75,76,77,78', 530, 0, NULL, '2022-04-18 13:31:21', NULL, '2022-04-18 14:06:52', NULL),
(20, 16, '薪酬福利', 'benefits_list.php', 'fas fa-money-bill-wave', '79,80,81,82,83', 540, 0, NULL, '2022-04-18 14:04:37', NULL, '2022-04-18 14:07:22', NULL),
(21, 0, '貨幣市場小百科', 'encyclopedia_list.php', 'fas fa-book', '84,85,86,87,88', 600, 0, NULL, '2022-04-18 14:53:39', NULL, '2022-04-18 15:22:08', NULL),
(22, 0, '業務簡介', '', 'fas fa-copy', NULL, 700, 0, NULL, '2022-04-18 15:25:40', NULL, '2022-04-18 15:26:35', NULL),
(23, 22, '交易工具介紹', 'tools_edit.php', 'fas fa-file-alt', NULL, 710, 0, NULL, '2022-04-18 15:26:30', NULL, '2022-04-18 15:27:17', NULL),
(24, 22, '票券及債券買賣', 'bonds_edit.php', 'fas fa-file-alt', NULL, 720, 0, NULL, '2022-04-18 15:27:47', NULL, '2022-04-18 15:27:53', NULL),
(25, 22, '發行融資性商業本票', 'promissorynote_edit.php', 'fas fa-file-alt', NULL, 730, 0, NULL, '2022-04-18 15:28:10', NULL, '2022-04-18 15:28:17', NULL),
(26, 22, '買入發行銀行承兌匯票及商業承兌匯票', 'acceptancebill_edit.php', 'fas fa-file-alt', NULL, 740, 0, NULL, '2022-04-18 15:28:38', NULL, '2022-04-18 15:28:45', NULL),
(27, 22, '買入中心工廠票券交易性商業本票', 'commercialpaper_edit.php', 'fas fa-file-alt', NULL, 750, 0, NULL, '2022-04-18 15:29:00', NULL, '2022-04-18 15:30:00', NULL),
(28, 22, '金融債券簽證業務', 'visa_edit.php', 'fas fa-file-alt', NULL, 760, 0, NULL, '2022-04-18 15:29:24', NULL, '2022-04-18 15:30:03', NULL);

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
(40, 6, '查詢操作紀錄', '999E2E30F65D4DDAD416036813A8993B', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(41, 7, '查詢系統資訊', 'C9BA8F512F83D56B6F4A03EA0E569528', 0, '', '2022-04-16 10:35:42', 1, '2022-04-16 10:35:42', 1),
(42, 7, '修改系統資訊', '0D2A6E445504890AFFEEB159CD1F2F26', 0, '', '2022-04-16 10:35:58', 1, '2022-04-16 10:35:58', 1),
(43, 8, '查詢Banner', '051DC208BD70EC5E062722727D4B10A6', 0, '', '2022-04-16 11:26:39', 1, '2022-04-16 11:26:39', 1),
(44, 8, '新增Banner', '6CF25D1EBE0D9743B109199CB7B1071B', 0, '', '2022-04-16 11:26:50', 1, '2022-04-16 11:26:50', 1),
(45, 8, '修改Banner', '8927DC58795E4749CFECD7DEAF3A431A', 0, '', '2022-04-16 11:27:01', 1, '2022-04-16 11:27:01', 1),
(46, 8, '排序Banner', '48B652CFD786278781B1173A9E63B168', 0, '', '2022-04-16 11:27:12', 1, '2022-04-18 09:01:10', 1),
(47, 8, '刪除Banner', '360D63D9116F4E0680FFF51159A80A79', 0, '', '2022-04-16 11:27:24', 1, '2022-04-16 11:27:24', 1),
(48, 9, '查詢市場行情', 'CA5C1A3FCF82C55EDDB0E199BE146E95', 0, '', '2022-04-16 16:25:14', 1, '2022-04-16 16:25:14', 1),
(49, 9, '新增市場行情', '3146FE117C1EB687DE381A6B7FD2A5FB', 0, '', '2022-04-16 16:25:23', 1, '2022-04-16 16:25:23', 1),
(50, 9, '修改市場行情', '1A47D42F55E872E22D7F090246F05D70', 0, '', '2022-04-16 16:25:31', 1, '2022-04-16 16:25:31', 1),
(51, 9, '排序市場行情', 'F561057F94E59A237847B61698985D21', 0, '', '2022-04-16 16:25:41', 1, '2022-04-18 09:01:15', 1),
(52, 9, '刪除市場行情', 'E319371E8B2ABC28741B7F7C687C2CB4', 0, '', '2022-04-16 16:25:52', 1, '2022-04-16 16:25:52', 1),
(53, 10, '查詢公司訊息', '9582B9ED83B9D24A4EAF9BF4DE491FF9', 0, '', '2022-04-18 08:36:28', 1, '2022-04-18 08:36:28', 1),
(54, 10, '新增公司訊息', 'E9C47EAFC2F4E17E91C5243300C1684A', 0, '', '2022-04-18 08:36:36', 1, '2022-04-18 08:36:36', 1),
(55, 10, '修改公司訊息', 'F75CAD4FA52A2D86449F3393233AD091', 0, '', '2022-04-18 08:36:45', 1, '2022-04-18 08:36:45', 1),
(56, 10, '排序公司訊息', 'B6DCF637B57A556C163F44324AC34DCA', 0, '', '2022-04-18 08:36:55', 1, '2022-04-18 09:01:22', 1),
(57, 10, '刪除公司訊息', 'AE08A3902A573744B4EDC285797B56BF', 0, '', '2022-04-18 08:37:08', 1, '2022-04-18 08:37:08', 1),
(58, 11, '查詢政策宣導', '0FD4D0C778503B529C6B89BFDC1EC79E', 0, '', '2022-04-18 09:07:14', 1, '2022-04-18 09:07:14', 1),
(59, 11, '新增政策宣導', '820523C90F97334191109C2F45BC3F4C', 0, '', '2022-04-18 09:07:26', 1, '2022-04-18 09:07:26', 1),
(60, 11, '修改政策宣導', '4E07A4AFA0F8D7DEF66EF021C2FF98FC', 0, '', '2022-04-18 09:07:36', 1, '2022-04-18 09:07:36', 1),
(61, 11, '排序政策宣導', '90D87A66C05EF3CAA1AF2E90C3BF5430', 0, '', '2022-04-18 09:07:45', 1, '2022-04-18 09:07:45', 1),
(62, 11, '刪除政策宣導', '87A47361DCCDA32D46EBCAD7EB6366BF', 0, '', '2022-04-18 09:07:55', 1, '2022-04-18 09:07:55', 1),
(63, 12, '查詢友善連結', 'B47E1DCCFFC0C0CA102337A318AAEB3E', 0, '', '2022-04-18 09:30:52', 1, '2022-04-18 09:31:49', 1),
(64, 12, '新增友善連結', 'CADE3850A0DE70BC87D0281256E32141', 0, '', '2022-04-18 09:30:58', 1, '2022-04-18 09:30:58', 1),
(65, 12, '修改友善連結', '173B625A460FD8E93523C63E8EF84D35', 0, '', '2022-04-18 09:31:06', 1, '2022-04-18 09:31:06', 1),
(66, 12, '排序友善連結', 'E68359B217E28A54ACA09A99B7469560', 0, '', '2022-04-18 09:31:17', 1, '2022-04-18 09:31:17', 1),
(67, 12, '刪除友善連結', 'C1118811D1129D5322E74F29919773BC', 0, '', '2022-04-18 09:31:28', 1, '2022-04-18 09:31:28', 1),
(68, 7, '修改關於兆票', '8A4C0232BB5BC38F44CD5AC9F3C7B140', 0, '', '2022-04-18 10:23:50', 1, '2022-04-18 10:23:50', 1),
(69, 13, '查詢服務據點', '9CD7006855708085D3776B29B8B24670', 0, '', '2022-04-18 11:30:00', 1, '2022-04-18 11:30:00', 1),
(70, 13, '新增服務據點', '2C09BBDD51AAED1D1BB0DDC09EC97D14', 0, '', '2022-04-18 11:30:11', 1, '2022-04-18 11:30:11', 1),
(71, 13, '修改服務據點', '7EB9CFCFE5E4538423A9A2973CDC83CC', 0, '', '2022-04-18 11:30:23', 1, '2022-04-18 11:30:23', 1),
(72, 13, '排序服務據點', '0258F437336087C2B11833B7C7FBC66C', 0, '', '2022-04-18 11:30:32', 1, '2022-04-18 11:30:32', 1),
(73, 13, '刪除服務據點', '6E19E25034FF79A0FDEA5F675BEED730', 0, '', '2022-04-18 11:30:41', 1, '2022-04-18 11:30:41', 1),
(74, 14, '查詢職缺訊息', '92F52426F89738551D86177FDABEC920', 0, '', '2022-04-18 13:28:50', 1, '2022-04-18 13:28:50', 1),
(75, 14, '新增職缺訊息', 'E2AEB5EDF428758DE091F700187D9E84', 0, '', '2022-04-18 13:29:00', 1, '2022-04-18 13:29:00', 1),
(76, 14, '修改職缺訊息', '82AC4B188C97539FE3CF8A99322F51BC', 0, '', '2022-04-18 13:29:12', 1, '2022-04-18 13:29:12', 1),
(77, 14, '排序職缺訊息', 'B48AC3E43F53B88BE79ABA396D32D16D', 0, '', '2022-04-18 13:29:21', 1, '2022-04-18 13:29:21', 1),
(78, 14, '刪除職缺訊息', 'C8E566ECE1270E49A799184353C3C91B', 0, '', '2022-04-18 13:29:35', 1, '2022-04-18 13:29:35', 1),
(79, 15, '查詢薪酬福利', 'D40D5E7AB15DE9D9C908564449EB84C9', 0, '', '2022-04-18 14:02:07', 1, '2022-04-18 14:02:07', 1),
(80, 15, '新增薪酬福利', 'F35FB8EDE5801B568943430AAB7830B1', 0, '', '2022-04-18 14:02:17', 1, '2022-04-18 14:02:17', 1),
(81, 15, '修改薪酬福利', 'BD522946B1160F85CF963C0691ABE58F', 0, '', '2022-04-18 14:02:26', 1, '2022-04-18 14:02:26', 1),
(82, 15, '排序薪酬福利', 'A337A7DE015CA28A7E4B6198296C18CA', 0, '', '2022-04-18 14:02:36', 1, '2022-04-18 14:02:59', 1),
(83, 15, '刪除薪酬福利', '0F0BF0235C2708C332426D33B1246FCA', 0, '', '2022-04-18 14:02:45', 1, '2022-04-18 14:02:45', 1),
(84, 16, '查詢貨幣市場小百科', 'E4B5575F2153F3E0B01E37ED52037224', 0, '', '2022-04-18 14:51:18', 1, '2022-04-18 14:51:18', 1),
(85, 16, '新增貨幣市場小百科', '616ABBAAC96FD58FDB80B000AD333C16', 0, '', '2022-04-18 14:51:26', 1, '2022-04-18 14:51:26', 1),
(86, 16, '修改貨幣市場小百科', '766AF0CD29CE1CBE1FEEB780EA0DEE1D', 0, '', '2022-04-18 14:51:34', 1, '2022-04-18 14:51:34', 1),
(87, 16, '排序貨幣市場小百科', '0CB580958414238F5C201B25FD3A3750', 0, '', '2022-04-18 14:51:45', 1, '2022-04-18 14:51:45', 1),
(88, 16, '刪除貨幣市場小百科', 'FF3C1341E071FB46E7B34FFEBA583069', 0, '', '2022-04-18 14:51:57', 1, '2022-04-18 14:51:57', 1);

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
(6, '操作紀錄', 0, NULL, '2021-12-21 12:00:00', 0, '2021-12-21 12:00:00', 0),
(7, '系統資訊', 0, '', '2022-04-16 10:35:10', 1, '2022-04-16 10:35:10', 1),
(8, 'Banner', 0, '', '2022-04-16 11:26:13', 1, '2022-04-16 11:26:13', 1),
(9, '市場行情', 0, '', '2022-04-16 16:24:54', 1, '2022-04-16 16:24:54', 1),
(10, '公司訊息', 0, '', '2022-04-18 08:35:50', 1, '2022-04-18 08:35:50', 1),
(11, '政策宣導', 0, '', '2022-04-18 09:06:52', 1, '2022-04-18 09:06:52', 1),
(12, '友善連結', 0, '', '2022-04-18 09:30:32', 1, '2022-04-18 09:30:32', 1),
(13, '服務據點', 0, '', '2022-04-18 11:29:41', 1, '2022-04-18 11:29:41', 1),
(14, '職缺訊息', 0, '', '2022-04-18 13:28:16', 1, '2022-04-18 13:28:16', 1),
(15, '薪酬福利', 0, '', '2022-04-18 14:01:52', 1, '2022-04-18 14:01:52', 1),
(16, '貨幣市場小百科', 0, '', '2022-04-18 14:50:52', 1, '2022-04-18 14:50:52', 1);

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
-- 資料表結構 `propaganda`
--

CREATE TABLE `propaganda` (
  `id` int(11) NOT NULL COMMENT '政策宣導編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `pic1url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1網址',
  `pic1alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片1說明',
  `pic2url` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2網址',
  `pic2alt` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片2說明',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `release_date` date DEFAULT NULL COMMENT '發布日期',
  `start_date` datetime DEFAULT NULL COMMENT '啟用日期',
  `end_date` datetime DEFAULT NULL COMMENT '停用日期',
  `homepage_show` tinyint(1) NOT NULL COMMENT '首頁顯示',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `propaganda`
--

INSERT INTO `propaganda` (`id`, `name`, `content`, `pic1url`, `pic1alt`, `pic2url`, `pic2alt`, `link`, `blank`, `release_date`, `start_date`, `end_date`, `homepage_show`, `seo_description`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"title\">主標、副標、內容的主標</div>\r\n\r\n<div class=\"title-sub\">主標、副標、內容的副標</div>\r\n\r\n<p class=\"text\">主標、副標、內容的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', '', 0, '2022-04-03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '1', 1, 0, '1', '2022-04-18 09:13:55', 1, '2022-04-18 09:20:12', 1),
(2, '2', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-md-6 col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/1920/1080/?random=3\" />\r\n<div class=\"text-sub\">左圖右文的圖片說明文字</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-12 p-3\">\r\n<div class=\"title\">左圖右文的主標</div>\r\n\r\n<div class=\"title-sub\">左圖右文的副標</div>\r\n\r\n<p class=\"text\">左圖右文的內容　內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容內容。</p>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', '', 0, '2022-04-18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2', 2, 0, '2', '2022-04-18 09:14:10', 1, '2022-04-18 09:20:03', 1);

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
(2, 28);

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
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
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
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88);

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
-- 資料表結構 `sysinfo`
--

CREATE TABLE `sysinfo` (
  `id` int(11) NOT NULL COMMENT '系統資訊編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '系統名稱',
  `phone` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '電話',
  `fax` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '傳真',
  `email` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email',
  `address` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址',
  `about` text COLLATE utf8_unicode_ci NOT NULL COMMENT '關於兆票',
  `copyright` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '版權宣告',
  `seo_description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO描述',
  `ga_code` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'GA_code',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `sysinfo`
--

INSERT INTO `sysinfo` (`id`, `name`, `phone`, `fax`, `email`, `address`, `about`, `copyright`, `seo_description`, `ga_code`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '3333333', '4444444', 'vicwu0717@gmail.com', '5', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 control-btnGroup\"><i class=\"fas fa-chevron-circle-up\"></i><i class=\"fas fa-chevron-circle-down\"></i><i class=\"fas fa-times-circle\"></i></div>\r\n\r\n<div class=\"col-md-6 col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/920/360/?random=1\" />\r\n<div class=\"text-sub\">置中兩圖的圖片說明文字</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-12\"><img alt=\"img\" class=\"img-fluid\" src=\"https://picsum.photos/920/360/?random=2\" />\r\n<div class=\"text-sub\">置中兩圖的圖片說明文字</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '6', '7', '8', '9', '2022-04-16 10:15:10', 0, '2022-04-18 10:32:24', 0);

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
(1, 'admin@ks', 'cmxh50Ez0B/z55NSULSWJg==', 'admin', 'vic@ks-design.com.tw', '0918737530', '2022-04-18 13:27:59', '::1', 0, NULL, '2021-08-30 12:00:00', 0, '2022-04-18 13:27:59', 1),
(2, 'web_server', 'P/KpvuTIsLXejoQ9ItFj5Q==', 'web_server', 'vic@ks-design.com.tw', '02-87716606', '2022-03-10 15:53:23', '::1', 0, NULL, '2021-08-30 12:00:00', 1, '2022-04-14 14:37:45', 1),
(3, 'vic@ks', 'cmxh50Ez0B/z55NSULSWJg==', 'vic@ks', 'vic@ks-design.com.tw', '', '2022-04-18 14:50:33', '::1', 0, '', '2021-08-30 12:00:00', 1, '2022-04-18 14:50:33', 1);

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
-- 資料表結構 `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL COMMENT '職缺訊息編號',
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名稱',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '內容',
  `link` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '連結網址',
  `blank` tinyint(1) DEFAULT NULL COMMENT '另開視窗',
  `release_date` date DEFAULT NULL COMMENT '發布日期',
  `list_order` int(11) NOT NULL COMMENT '列表順序',
  `status` tinyint(4) NOT NULL COMMENT '狀態，0：啟用，1：停用，2：已刪除',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '備註',
  `c_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `c_user_id` int(11) NOT NULL COMMENT '建立使用者編號',
  `u_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改時間',
  `u_user_id` int(11) NOT NULL COMMENT '修改使用者編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `vacancy`
--

INSERT INTO `vacancy` (`id`, `name`, `content`, `link`, `blank`, `release_date`, `list_order`, `status`, `remark`, `c_time`, `c_user_id`, `u_time`, `u_user_id`) VALUES
(1, '1', '1\r\n1\r\n1', '', 0, '0000-00-00', 1, 0, '1', '2022-04-18 13:37:17', 1, '2022-04-18 13:42:12', 1),
(2, '2', '2\r\n2', '', 0, '0000-00-00', 2, 0, '2', '2022-04-18 13:41:59', 1, '2022-04-18 13:42:12', 1);

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
-- 資料表索引 `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `encyclopedia`
--
ALTER TABLE `encyclopedia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- 資料表索引 `propaganda`
--
ALTER TABLE `propaganda`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- 資料表索引 `sysinfo`
--
ALTER TABLE `sysinfo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Banner編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '薪資福利編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '業務簡介編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公司訊息編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `encyclopedia`
--
ALTER TABLE `encyclopedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '貨幣市場小百科編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '友善連結編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '服務據點編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '操作記錄編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '市場行情編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '選單編號', AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '程式編號', AUTO_INCREMENT=89;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `program_category`
--
ALTER TABLE `program_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '程式類別編號', AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `propaganda`
--
ALTER TABLE `propaganda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '政策宣導編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sysinfo`
--
ALTER TABLE `sysinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系統資訊編號', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者編號', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '職缺訊息編號', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
