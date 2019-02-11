-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2019 at 04:01 PM
-- Server version: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` text,
  `last_visit` datetime DEFAULT NULL,
  `last_visit_ip` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT '0',
  `is_active` int(11) DEFAULT '1',
  `def_storeid` int(11) DEFAULT NULL,
  `type_post` varchar(150) DEFAULT NULL,
  `remark` text,
  `business` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1509 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userid`, `user_name`, `password`, `email`, `gender`, `dob`, `phone`, `address`, `last_visit`, `last_visit_ip`, `created_date`, `created_by`, `modified_by`, `modified_date`, `roleid`, `last_name`, `first_name`, `is_admin`, `is_active`, `def_storeid`, `type_post`, `remark`, `business`) VALUES
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '', '2019-01-04', '', '', '2019-02-11 15:59:11', '::1', '2015-01-29 15:10:34', NULL, NULL, NULL, 1, 'System', 'Administrator', 1, 1, NULL, NULL, '', ''),
(5, 'chetra', '202cb962ac59075b964b07152d234b70', 'eing.chetra@gmail.com', '', '2019-01-04', '', '', '2019-02-11 15:59:11', '::1', '2015-02-02 17:26:36', NULL, NULL, NULL, 2, 'eing', 'chetra', 0, 0, NULL, NULL, '', ''),
(1497, 'store', 'e10adc3949ba59abbe56e057f20f883e', 'store@green.com', '', '2019-01-04', '', '', '2019-02-11 15:59:11', '::1', '2015-06-26 08:10:54', NULL, NULL, NULL, 21, 'Green', 'Store', 0, 0, NULL, NULL, '', ''),
(1498, 'user', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', '', '2019-01-04', '', '', '2019-02-11 15:59:11', '::1', '2018-11-20 04:42:55', NULL, NULL, NULL, 23, 'user', 'user', 0, 1, NULL, NULL, '', ''),
(1500, 'Sila', NULL, 'sila@yahoo.com', NULL, NULL, '0964464486', 'phnom penh', '2019-02-11 15:59:11', '::1', '2019-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'owner', '', ''),
(1501, 'Sila', NULL, 'sila@yahoo.com', NULL, NULL, '0964464486', 'phnom penh', '2019-02-11 15:59:11', '::1', '2019-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'owner', '', ''),
(1502, 'sdfdsfgdf', NULL, 'user@gmail.com', NULL, NULL, 'dfgdfg', 'dfgdfg', '2019-02-11 15:59:11', '::1', '2019-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'owner', '', ''),
(1503, 'sdfdsfgdf', NULL, 'user@gmail.com', NULL, NULL, 'dfgdfg', 'dfgdfg', '2019-02-11 15:59:11', '::1', '2019-01-04 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'owner', '', ''),
(1504, 'Sila', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', NULL, NULL, '0964464486', 'hello', '2019-02-11 15:59:11', '::1', '2019-01-05 00:00:00', NULL, NULL, NULL, 23, 'sila', 'sila', 0, 1, NULL, 'owner', '', ''),
(1506, 'Retry', NULL, 'retry@gmail.com', NULL, NULL, '87987980', 'phnom penh', '2019-02-11 15:59:11', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 'the remark', 'Growup'),
(1507, 'Retry New', NULL, 'retry@gmail.com', NULL, NULL, '87987980', 'cvdcgdfgh', '2019-02-11 15:59:11', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 'dfgfdhg', 'gtgrtyrtyrt'),
(1508, 'Retry New', NULL, 'retry@gmail.com', NULL, NULL, '87987980', 'phnom penh', '2019-02-11 15:59:11', '::1', '2019-01-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'phnom penh', 'Growup');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('76cf222c573dee5001cddbd108a86f5f', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1549900744, 'a:13:{s:9:\"user_data\";s:0:\"\";s:6:\"userid\";s:1:\"4\";s:9:\"user_name\";s:5:\"admin\";s:8:\"password\";s:32:\"202cb962ac59075b964b07152d234b70\";s:6:\"roleid\";s:1:\"1\";s:9:\"last_name\";s:6:\"System\";s:10:\"first_name\";s:13:\"Administrator\";s:10:\"last_visit\";s:19:\"2019-01-22 05:08:07\";s:13:\"last_visit_ip\";s:3:\"::1\";s:9:\"moduleids\";a:8:{i:0;a:1:{s:8:\"moduleid\";s:2:\"19\";}i:1;a:1:{s:8:\"moduleid\";s:2:\"18\";}i:2;a:1:{s:8:\"moduleid\";s:2:\"13\";}i:3;a:1:{s:8:\"moduleid\";s:2:\"12\";}i:4;a:1:{s:8:\"moduleid\";s:2:\"11\";}i:5;a:1:{s:8:\"moduleid\";s:1:\"7\";}i:6;a:1:{s:8:\"moduleid\";s:1:\"1\";}i:7;a:1:{s:8:\"moduleid\";s:2:\"20\";}}s:12:\"ModuleInfors\";a:8:{i:19;a:4:{s:8:\"moduleid\";s:2:\"19\";s:11:\"module_name\";s:16:\"Propery Category\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:18;a:4:{s:8:\"moduleid\";s:2:\"18\";s:11:\"module_name\";s:8:\"Property\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:13;a:4:{s:8:\"moduleid\";s:2:\"13\";s:11:\"module_name\";s:9:\"Dashboard\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:12;a:4:{s:8:\"moduleid\";s:2:\"12\";s:11:\"module_name\";s:6:\"Banner\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:11;a:4:{s:8:\"moduleid\";s:2:\"11\";s:11:\"module_name\";s:7:\"Article\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:7;a:4:{s:8:\"moduleid\";s:1:\"7\";s:11:\"module_name\";s:4:\"Menu\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:1;a:4:{s:8:\"moduleid\";s:1:\"1\";s:11:\"module_name\";s:7:\"Setting\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:20;a:4:{s:8:\"moduleid\";s:2:\"20\";s:11:\"module_name\";s:17:\"Property Location\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}}s:10:\"PageInfors\";a:8:{i:19;a:2:{i:80;a:14:{s:6:\"pageid\";s:2:\"80\";s:9:\"page_name\";s:25:\"Add New Property Category\";s:4:\"link\";s:25:\"property/propertytype/add\";s:8:\"moduleid\";s:2:\"19\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-20 02:26:36\";s:4:\"icon\";s:7:\"fa-bars\";}i:81;a:14:{s:6:\"pageid\";s:2:\"81\";s:9:\"page_name\";s:23:\"Property Category Lists\";s:4:\"link\";s:27:\"property/propertytype/index\";s:8:\"moduleid\";s:2:\"19\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-20 02:26:15\";s:4:\"icon\";s:7:\"fa-bars\";}}i:18;a:2:{i:78;a:14:{s:6:\"pageid\";s:2:\"78\";s:9:\"page_name\";s:16:\"Add New Property\";s:4:\"link\";s:21:\"property/property/add\";s:8:\"moduleid\";s:2:\"18\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-18 04:36:42\";s:4:\"icon\";s:7:\"fa-bars\";}i:79;a:14:{s:6:\"pageid\";s:2:\"79\";s:9:\"page_name\";s:13:\"Property List\";s:4:\"link\";s:23:\"property/property/index\";s:8:\"moduleid\";s:2:\"18\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-18 04:36:26\";s:4:\"icon\";s:7:\"fa-bars\";}}i:13;a:1:{i:84;a:14:{s:6:\"pageid\";s:2:\"84\";s:9:\"page_name\";s:9:\"Dashboard\";s:4:\"link\";s:13:\"sys/dashboard\";s:8:\"moduleid\";s:2:\"13\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2019-01-12 11:09:31\";s:4:\"icon\";s:7:\"fa-bars\";}}i:12;a:2:{i:69;a:14:{s:6:\"pageid\";s:2:\"69\";s:9:\"page_name\";s:11:\"Banner List\";s:4:\"link\";s:20:\"setup/setupads/index\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:16:13\";s:4:\"icon\";s:7:\"fa-bars\";}i:70;a:14:{s:6:\"pageid\";s:2:\"70\";s:9:\"page_name\";s:14:\"Add New Banner\";s:4:\"link\";s:18:\"setup/setupads/add\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:15:42\";s:4:\"icon\";s:7:\"fa-bars\";}}i:11;a:2:{i:65;a:14:{s:6:\"pageid\";s:2:\"65\";s:9:\"page_name\";s:12:\"Article List\";s:4:\"link\";s:13:\"article/index\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"4\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:46:23\";s:4:\"icon\";s:7:\"fa-bars\";}i:66;a:14:{s:6:\"pageid\";s:2:\"66\";s:9:\"page_name\";s:15:\"Add New Article\";s:4:\"link\";s:11:\"article/add\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"5\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:47:08\";s:4:\"icon\";s:7:\"fa-bars\";}}i:7;a:4:{i:63;a:14:{s:6:\"pageid\";s:2:\"63\";s:9:\"page_name\";s:9:\"Menu List\";s:4:\"link\";s:10:\"menu/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"10\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-12-06 12:56:55\";s:4:\"icon\";s:7:\"fa-bars\";}i:64;a:14:{s:6:\"pageid\";s:2:\"64\";s:9:\"page_name\";s:12:\"Add New Menu\";s:4:\"link\";s:8:\"menu/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"11\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-12-06 12:56:41\";s:4:\"icon\";s:7:\"fa-bars\";}i:75;a:14:{s:6:\"pageid\";s:2:\"75\";s:9:\"page_name\";s:16:\"Add New Location\";s:4:\"link\";s:12:\"category/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"12\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-12-06 12:56:17\";s:4:\"icon\";s:7:\"fa-bars\";}i:76;a:14:{s:6:\"pageid\";s:2:\"76\";s:9:\"page_name\";s:13:\"Location List\";s:4:\"link\";s:14:\"category/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"13\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-12-06 12:56:06\";s:4:\"icon\";s:7:\"fa-bars\";}}i:1;a:4:{i:5;a:14:{s:6:\"pageid\";s:1:\"5\";s:9:\"page_name\";s:4:\"Page\";s:4:\"link\";s:12:\"setting/page\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"0\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 17:00:01\";s:4:\"icon\";s:9:\"fa-file-o\";}i:6;a:14:{s:6:\"pageid\";s:1:\"6\";s:9:\"page_name\";s:12:\"User Profile\";s:4:\"link\";s:12:\"setting/user\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:20\";s:4:\"icon\";s:7:\"fa-user\";}i:7;a:14:{s:6:\"pageid\";s:1:\"7\";s:9:\"page_name\";s:9:\"User Role\";s:4:\"link\";s:12:\"setting/role\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:57:09\";s:4:\"icon\";s:7:\"fa-user\";}i:8;a:14:{s:6:\"pageid\";s:1:\"8\";s:9:\"page_name\";s:11:\"Role Access\";s:4:\"link\";s:18:\"setting/permission\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"0\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:46\";s:4:\"icon\";s:9:\"fa-wrench\";}}i:20;a:2:{i:82;a:14:{s:6:\"pageid\";s:2:\"82\";s:9:\"page_name\";s:17:\"Property Location\";s:4:\"link\";s:29:\"property/propertylocation/add\";s:8:\"moduleid\";s:2:\"20\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-18 06:14:32\";s:4:\"icon\";s:7:\"fa-bars\";}i:83;a:14:{s:6:\"pageid\";s:2:\"83\";s:9:\"page_name\";s:22:\"Property Location List\";s:4:\"link\";s:31:\"property/propertylocation/index\";s:8:\"moduleid\";s:2:\"20\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2018-11-18 06:01:53\";s:4:\"icon\";s:7:\"fa-bars\";}}}s:10:\"PageAction\";a:8:{i:19;a:2:{i:80;s:1:\"1\";i:81;s:1:\"1\";}i:18;a:2:{i:78;s:1:\"1\";i:79;s:1:\"1\";}i:13;a:1:{i:84;s:1:\"1\";}i:12;a:2:{i:69;s:1:\"1\";i:70;s:1:\"1\";}i:11;a:2:{i:65;s:1:\"1\";i:66;s:1:\"1\";}i:7;a:4:{i:63;s:1:\"1\";i:64;s:1:\"1\";i:75;s:1:\"1\";i:76;s:1:\"1\";}i:1;a:4:{i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";}i:20;a:2:{i:82;s:1:\"1\";i:83;s:1:\"1\";}}}'),
('17337a49465cf860f6df10503738cb75', '::1', '', 1549900744, ''),
('1928e41e00bbd13dc8e5cf5d1fa03379', '::1', '', 1549900744, ''),
('c57c5077cdeefdc0833db068198b3164', '::1', '', 1549900762, ''),
('4c979faf10c72e4b63eddc64d3c90f00', '::1', '', 1549900762, ''),
('f4e7009cea4034224b31789f3c1a5c77', '::1', '', 1549900769, ''),
('7693245f8ec4fe33665cfe93b395414b', '::1', '', 1549900769, ''),
('62bb3d3aeabe1a814e900fff70e0349b', '::1', '', 1549900829, ''),
('f76a22699c98a93255a1c7df6491063e', '::1', '', 1549900829, '');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_item`
--

DROP TABLE IF EXISTS `dashboard_item`;
CREATE TABLE IF NOT EXISTS `dashboard_item` (
  `dashid` int(11) NOT NULL AUTO_INCREMENT,
  `dash_item` varchar(255) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `link_pageid` int(11) DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  `block` varchar(255) DEFAULT NULL COMMENT 'left_top,left_bottom',
  PRIMARY KEY (`dashid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dashboard_item`
--

INSERT INTO `dashboard_item` (`dashid`, `dash_item`, `moduleid`, `link_pageid`, `is_show`, `block`) VALUES
(1, 'Student', 3, 10, 1, 'top_left');

-- --------------------------------------------------------

--
-- Table structure for table `site_profile`
--

DROP TABLE IF EXISTS `site_profile`;
CREATE TABLE IF NOT EXISTS `site_profile` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `date_post` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_profile`
--

INSERT INTO `site_profile` (`id`, `site_name`, `address`, `phone`, `email`, `facebook`, `google_plus`, `youtube`, `twitter`, `linkedin`, `weixin`, `date_post`, `is_active`) VALUES
(1, '855 solution', '418Eo+E1, Phlauv 358, Sangkat Chbar Ampov, Khan Chbar Ampov , Phnom Penh.', '015 871 787 / 092 226 133', 'sansila2222@gmail.com', 'https://www.facebook.com/%E1%9E%93%E1%9E%B6%E1%9E%99%E1%9E%80%E1%9E%8A%E1%9F%92%E1%9E%8B%E1%9E%B6%E1%9E%93%E1%9E%9C%E1%9E%B7%E1%9E%91%E1%9F%92%E1%9E%99%E1%9E%BB%E1%9E%91%E1%9E%B6%E1%9E%80%E1%9F%8B%E1%9E%91%E1%9E%84-112512662798448/', 'https://plus.google.com/117575618297062468775', '', 'https://twitter.com/Kimhay98Kh', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

DROP TABLE IF EXISTS `tblarticle`;
CREATE TABLE IF NOT EXISTS `tblarticle` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `article_title_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content_kh` text CHARACTER SET utf8,
  `content` text CHARACTER SET utf8,
  `is_active` int(1) DEFAULT NULL,
  `is_marguee` int(1) DEFAULT '0',
  `meta_keyword` text CHARACTER SET utf8,
  `meta_desc` text CHARACTER SET utf8,
  `location_id` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `article_date` date DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`article_id`, `article_title`, `article_title_kh`, `content_kh`, `content`, `is_active`, `is_marguee`, `meta_keyword`, `meta_desc`, `location_id`, `icon`, `article_date`, `menu_id`) VALUES
(1, 'about', 'about', '', '<p>\n	&nbsp;<span style=\"color: rgb(81, 87, 98); font-family: museo-sans, sans-serif; font-size: 17.99px; text-align: center;\">Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes</span></p>\n', 1, 1, '', '', NULL, '', '2018-12-06', 103);

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

DROP TABLE IF EXISTS `tblbanner`;
CREATE TABLE IF NOT EXISTS `tblbanner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `banner_location` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `orders` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`banner_id`, `title`, `banner_location`, `is_active`, `orders`, `link`) VALUES
(2, 'h1', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE IF NOT EXISTS `tblcontact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(55) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post_code` varchar(55) NOT NULL,
  `tel` varchar(55) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `how_know_us` varchar(255) NOT NULL,
  `purchase` varchar(55) NOT NULL,
  `register_client` varchar(55) NOT NULL,
  `distributor` varchar(55) NOT NULL,
  `other` varchar(55) NOT NULL,
  `region` varchar(55) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

DROP TABLE IF EXISTS `tblgallery`;
CREATE TABLE IF NOT EXISTS `tblgallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `gallery_type` int(1) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `location_id` int(11) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `home` int(1) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`gallery_id`, `gallery_title`, `url`, `gallery_type`, `article_id`, `pid`, `location_id`, `order`, `home`) VALUES
(1, NULL, 'property-1.jpg', 0, NULL, 1, 0, NULL, NULL),
(2, NULL, 'property-3.jpg', 0, NULL, 2, 0, NULL, NULL),
(3, NULL, 'property-4.jpg', 0, NULL, 2, 0, NULL, NULL),
(4, NULL, 'property-5.jpg', 0, NULL, 2, 0, NULL, NULL),
(5, NULL, 'property-6.jpg', 0, NULL, 2, 0, NULL, NULL),
(6, NULL, '5.jpg', 0, NULL, 3, 0, NULL, NULL),
(7, NULL, '6.jpg', 0, NULL, 3, 0, NULL, NULL),
(8, NULL, '7.jpg', 0, NULL, 3, 0, NULL, NULL),
(9, NULL, '5.jpg', 0, NULL, 4, 0, NULL, NULL),
(10, NULL, '6.jpg', 0, NULL, 4, 0, NULL, NULL),
(11, NULL, '7.jpg', 0, NULL, 4, 0, NULL, NULL),
(12, NULL, 'property-1.jpg', 0, NULL, 5, 0, NULL, NULL),
(13, NULL, 'property-2.jpg', 0, NULL, 5, 0, NULL, NULL),
(14, NULL, 'property-3.jpg', 0, NULL, 5, 0, NULL, NULL),
(15, NULL, 'property-4.jpg', 0, NULL, 5, 0, NULL, NULL),
(16, NULL, 'property-5.jpg', 0, NULL, 5, 0, NULL, NULL),
(17, NULL, 'property-detail-s-5.jpg', 0, NULL, 4, 0, NULL, NULL),
(18, NULL, 'property-5.jpg', 0, NULL, 4, 0, NULL, NULL),
(20, NULL, 'property-detail-2.jpg', 0, NULL, 6, 0, NULL, NULL),
(21, NULL, 'property-detail-2.jpg', 0, NULL, 7, 0, NULL, NULL),
(22, NULL, 'phnom-penh.jpg.jpg', 0, NULL, 9, 0, NULL, NULL),
(23, NULL, 'Phnom-Penh-City-View.jpg', 0, NULL, 9, 0, NULL, NULL),
(24, NULL, 'Phnom-Penh-City-View_a.jpg', 0, NULL, 10, 0, NULL, NULL),
(25, NULL, 'Phnom-Penh-City-View_a.jpg', 0, NULL, 11, 0, NULL, NULL),
(26, NULL, 'Phnom-Penh-City-View_a.jpg', 0, NULL, 12, 0, NULL, NULL),
(101, NULL, 'ancient-70996_640.jpg', 0, NULL, 25, 0, NULL, NULL),
(102, NULL, 'cat_small.jpg', 0, NULL, 25, 0, NULL, NULL),
(103, NULL, 'dream.jpg', 0, NULL, 25, 0, NULL, NULL),
(104, NULL, 'grand-staircase-escalante-boundary-3866228_640.jpg', 0, NULL, 25, 0, NULL, NULL),
(105, NULL, 'home-1596607_640.jpg', 0, NULL, 25, 0, NULL, NULL),
(122, NULL, 'ancient-70996_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(123, NULL, 'cat_small.jpg', 0, NULL, 27, 0, NULL, NULL),
(124, NULL, 'dream.jpg', 0, NULL, 27, 0, NULL, NULL),
(125, NULL, 'grand-staircase-escalante-boundary-3866228_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(126, NULL, 'home-1596607_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(127, NULL, 'house-740x530.png', 0, NULL, 27, 0, NULL, NULL),
(128, NULL, 'house-186400_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(129, NULL, 'houses-984013_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(130, NULL, 'manor-3604684_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(131, NULL, 'money-2724235_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(132, NULL, 'neighborhood-802074_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(133, NULL, 'original.jpg', 0, NULL, 27, 0, NULL, NULL),
(134, NULL, 'Residential_Property.jpg', 0, NULL, 27, 0, NULL, NULL),
(135, NULL, 'villa-2059680_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(136, NULL, 'villa-3237114_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(137, NULL, 'woman-546207_640.jpg', 0, NULL, 27, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllayout`
--

DROP TABLE IF EXISTS `tbllayout`;
CREATE TABLE IF NOT EXISTS `tbllayout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllayout`
--

INSERT INTO `tbllayout` (`layout_id`, `layout_name`, `is_active`) VALUES
(1, 'Full Layout', 1),
(2, 'Grid Layout', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

DROP TABLE IF EXISTS `tbllocation`;
CREATE TABLE IF NOT EXISTS `tbllocation` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_active` int(1) NOT NULL,
  `location_name_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`location_id`, `location_name`, `is_active`, `location_name_kh`) VALUES
(17, 'properties', 1, NULL),
(18, 'about', 1, NULL),
(19, 'contact', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenus`
--

DROP TABLE IF EXISTS `tblmenus`;
CREATE TABLE IF NOT EXISTS `tblmenus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `description` text,
  `lineage` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `layout_id` int(11) DEFAULT NULL,
  `modified_by` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `menu_name_kh` varchar(255) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `menu_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmenus`
--

INSERT INTO `tblmenus` (`menu_id`, `menu_name`, `description`, `lineage`, `parentid`, `level`, `order`, `is_active`, `created_date`, `created_by`, `layout_id`, `modified_by`, `modified_date`, `menu_name_kh`, `article_id`, `location_id`, `menu_type`) VALUES
(105, 'Apartment', NULL, '102-105', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Apartment', 0, 17, '17'),
(102, 'properties', NULL, '102', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'properties', 0, 17, '17'),
(103, 'about us', NULL, '103', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'about us', 0, 17, '18'),
(104, 'contact us', NULL, '104', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'contact us', 0, 17, '19'),
(106, 'Villa', NULL, '102-106', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Villa', 0, 17, '17'),
(107, 'Condo', NULL, '102-107', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Condo', 0, 17, '17'),
(108, 'Flat', NULL, '102-108', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Flat', 0, 17, '17'),
(109, 'Land', NULL, '102-109', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Land', 0, 17, '17'),
(110, 'Building', NULL, '102-110', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Building', 0, 17, '17'),
(111, 'Office Space', NULL, '102-111', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Office Space', 0, 17, '17'),
(112, 'Warehouse', NULL, '102-112', 102, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Warehouse', 0, 17, '17');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `menu_id` int(11) NOT NULL,
  `content_desc` text CHARACTER SET utf8 NOT NULL,
  `content_bottom` text NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblproperty`
--

DROP TABLE IF EXISTS `tblproperty`;
CREATE TABLE IF NOT EXISTS `tblproperty` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) DEFAULT NULL,
  `agent_id` int(10) DEFAULT NULL,
  `lp_id` int(10) DEFAULT NULL,
  `property_name` varchar(250) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `story` varchar(250) DEFAULT NULL,
  `p_type` varchar(250) DEFAULT NULL,
  `floor` varchar(250) DEFAULT NULL,
  `landsize` varchar(250) DEFAULT NULL,
  `housesize` varchar(250) DEFAULT NULL,
  `direction` varchar(250) DEFAULT NULL,
  `bedroom` varchar(150) DEFAULT NULL,
  `bathroom` varchar(150) DEFAULT NULL,
  `livingroom` varchar(250) DEFAULT NULL,
  `kitchen` varchar(150) DEFAULT NULL,
  `dinning_room` varchar(150) DEFAULT NULL,
  `furniture` varchar(50) DEFAULT NULL,
  `air_conditional` varchar(50) DEFAULT NULL,
  `parking` varchar(250) DEFAULT NULL,
  `pool` varchar(50) DEFAULT NULL,
  `gym` varchar(10) DEFAULT NULL,
  `steamandsouna` varchar(50) DEFAULT NULL,
  `garden` varchar(50) DEFAULT NULL,
  `balcony` varchar(50) DEFAULT NULL,
  `terrace` varchar(50) DEFAULT NULL,
  `elevator` varchar(50) DEFAULT NULL,
  `stairs` varchar(50) DEFAULT NULL,
  `img_source` text,
  `contract` varchar(250) DEFAULT NULL,
  `commision` varchar(50) DEFAULT NULL,
  `urgent` int(1) DEFAULT NULL,
  `address` text,
  `advantage` text,
  `contact_owner` varchar(50) DEFAULT NULL,
  `ownername` varchar(150) DEFAULT NULL,
  `remark` text,
  `email_owner` varchar(250) DEFAULT NULL,
  `service_provided` varchar(250) DEFAULT NULL,
  `description` text,
  `description_kh` text,
  `p_status` int(1) DEFAULT NULL,
  `available` int(1) DEFAULT NULL,
  `p_location` varchar(250) DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `title` int(10) DEFAULT NULL,
  `latitude` varchar(250) DEFAULT NULL,
  `longtitude` varchar(250) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproperty`
--

INSERT INTO `tblproperty` (`pid`, `type_id`, `agent_id`, `lp_id`, `property_name`, `price`, `story`, `p_type`, `floor`, `landsize`, `housesize`, `direction`, `bedroom`, `bathroom`, `livingroom`, `kitchen`, `dinning_room`, `furniture`, `air_conditional`, `parking`, `pool`, `gym`, `steamandsouna`, `garden`, `balcony`, `terrace`, `elevator`, `stairs`, `img_source`, `contract`, `commision`, `urgent`, `address`, `advantage`, `contact_owner`, `ownername`, `remark`, `email_owner`, `service_provided`, `description`, `description_kh`, `p_status`, `available`, `p_location`, `add_date`, `end_date`, `title`, `latitude`, `longtitude`, `create_date`, `hit`) VALUES
(1, 0, 0, 40, 'Poolside character home on a wide 422sqm', 358000, '', '1', '0', '', '450', '', '3', '3', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', NULL, '0', 'ss', 0, 'Ferris Park, Jersey City Land in Sales', '', 'ss', 's', NULL, 's', '', '', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '', '', '0000-00-00', 0),
(2, 0, 0, 51, 'Poolside2 character home on a wide 423sqm', 358000, '', '2', '0', '', '470', '', '3', '3', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', NULL, '0', 'df', 0, 'Ferris Park, Jersey City Land in Sales', '', 'df', 'df', NULL, 'df', '', '<p>\n	<strong>Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac rutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus rhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis hendrerit mi a sollicitudin.</strong></p>\n<p>\n	Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\n<p>\n	Vivamus quis dui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in vulputate non, tristique eu mi. Aliquam tristique dapibus tempor. Vivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis bibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum porta sit amet, iaculis in neque.</p>\n', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '1', '1', '0000-00-00', 0),
(3, 5, 4, 0, 'test', 12, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 0, 0, NULL, '2018-11-27', '2018-11-27', 0, '', '', '0000-00-00', 0),
(4, 5, 5, 40, 'new', 12, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-11-27', '2018-11-27', 0, '', '', '2018-12-31', 0),
(5, 5, 4, 0, 'Poolside character home on a wide 422sqm', 12324324, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-11-27', '2018-11-27', 0, '', '', '2018-12-31', 0),
(6, 5, 4, 0, 'Land for Sale in Prek Eng KK', 358000, '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '<p>\n	&nbsp;<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">Note that headers should be sent&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; color: rgb(36, 39, 41);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;\">before</em></strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">&lt;?php</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;as well as ending tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">?&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;in your view.</span></p>\n<p>\n	&nbsp;<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">Note that headers should be sent&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; color: rgb(36, 39, 41);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;\">before</em></strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">&lt;?php</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;as well as ending tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">?&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;in your view.</span></p>\n<p>\n	&nbsp;<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">Note that headers should be sent&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; color: rgb(36, 39, 41);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;\">before</em></strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">&lt;?php</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;as well as ending tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">?&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;in your view.</span></p>\n<p>\n	&nbsp;<span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">Note that headers should be sent&nbsp;</span><strong style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; box-sizing: inherit; color: rgb(36, 39, 41);\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;\">before</em></strong><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">&lt;?php</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;as well as ending tag&nbsp;</span><code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; box-sizing: inherit; background-color: rgb(239, 240, 241); white-space: pre-wrap; color: rgb(36, 39, 41);\">?&gt;</code><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">&nbsp;in your view.</span></p>\n', '', 1, 1, NULL, '2018-12-04', '2018-12-04', 0, '11.52611534067639', '104.91394026171872', '2018-12-31', 0),
(7, 2, 4, 51, 'test', 0, '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-12-09', '2018-12-09', 0, '', '', '2019-02-11', 4),
(8, 6, 4, 0, 'hello', 0, '', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-12-10', '2018-12-10', 0, '', '', '2018-12-10', 0),
(9, 2, 0, 40, 'sdfsdf', 4546, NULL, '1', NULL, NULL, '4546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>\r\n	fwetertgryr</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, NULL, '11.564125877780569', '104.90501387011716', '2019-01-04', 8),
(10, 1, 0, 51, 'test new ', 4546, NULL, '1', NULL, NULL, '4546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>\r\n	fsdfdsfgdfgfdghf</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, NULL, '11.584642697122652', '105.05435926806638', '2019-01-04', 4),
(14, 1, NULL, 51, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL),
(15, 1, NULL, 51, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL),
(16, 1, NULL, 51, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL),
(17, 1, 4, 40, 'try mew test', 4546, '', '1', '', '', '4546', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '<p>\n	hello</p>\n', '', 0, 1, NULL, '2019-01-05', '2019-01-05', 0, '11.585988009740875', '105.05298597705075', '2019-01-05', 4),
(27, 1, 1505, 51, 'test new  for hidding', 4546, NULL, '1', NULL, NULL, '4546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpropertylocation`
--

DROP TABLE IF EXISTS `tblpropertylocation`;
CREATE TABLE IF NOT EXISTS `tblpropertylocation` (
  `propertylocationid` int(10) NOT NULL AUTO_INCREMENT,
  `locationname` varchar(250) DEFAULT NULL,
  `lineage` varchar(250) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `note` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`propertylocationid`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpropertylocation`
--

INSERT INTO `tblpropertylocation` (`propertylocationid`, `locationname`, `lineage`, `parent_id`, `level`, `note`, `status`) VALUES
(40, 'Phnom Penh', '40', 0, 0, '', 1),
(51, 'Chamkarmon', '40-51', 40, 1, '', 1),
(53, 'BKK 1', '40-51-53', 51, 2, '', 1),
(54, 'BKK 2', '40-51-54', 51, 2, NULL, 1),
(55, '7 Makara', '40-55', 40, 1, NULL, 1),
(56, 'Toul Kork', '40-56', 40, 1, NULL, 1),
(57, 'Chroy Changvar', '40-57', 40, 1, NULL, 1),
(58, 'Sen Sok', '40-58', 40, 1, NULL, 1),
(59, 'Russey Keo', '40-59', 40, 1, NULL, 1),
(60, 'Meanchey', '40-60', 40, 1, NULL, 1),
(61, 'Dangkao', '40-61', 40, 1, NULL, 1),
(62, 'Chbar Ampov', '40-62', 40, 1, NULL, 1),
(63, 'Prek Pnov', '40-63', 40, 1, NULL, 1),
(64, 'Por Sen Chey', '40-64', 40, 1, NULL, 1),
(65, 'BKK 3', '40-51-65', 51, 2, NULL, 1),
(66, 'Tonle Bassac', '40-51-66', 51, 2, NULL, 1),
(67, 'Toul Tum Poung 1', '40-51-67', 51, 2, NULL, 1),
(73, 'Daun Penh', '40-73', 40, 1, NULL, 1),
(74, 'Chakto Mukh', '40-73-74', 73, 2, NULL, 1),
(75, 'Phsar Chas', '40-73-75', 73, 2, NULL, 1),
(76, 'Phsar Kandal I', '40-73-76', 73, 2, NULL, 1),
(77, 'Phsar Thmei I', '40-73-77', 73, 2, NULL, 1),
(78, 'Wat Phnom', '40-73-78', 73, 2, NULL, 1),
(79, 'takeo', '79', 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpropertytype`
--

DROP TABLE IF EXISTS `tblpropertytype`;
CREATE TABLE IF NOT EXISTS `tblpropertytype` (
  `typeid` int(10) NOT NULL AUTO_INCREMENT,
  `menu` int(10) NOT NULL,
  `typename` varchar(250) DEFAULT NULL,
  `type_note` text,
  `type_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpropertytype`
--

INSERT INTO `tblpropertytype` (`typeid`, `menu`, `typename`, `type_note`, `type_status`) VALUES
(1, 105, 'Apartment', 'new for apartment', 1),
(2, 106, 'Villa', 'new for villar', 1),
(3, 107, 'Condo', 'condo', 1),
(4, 108, 'Flat', 'flat', 1),
(5, 109, 'Land', 'land', 1),
(6, 0, 'Biulding', '', 1),
(7, 0, 'Office Space', '', 1),
(8, 0, 'Warehouse', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_blog`
--

DROP TABLE IF EXISTS `z_blog`;
CREATE TABLE IF NOT EXISTS `z_blog` (
  `site_show_blogid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`site_show_blogid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_blog`
--

INSERT INTO `z_blog` (`site_show_blogid`, `description`) VALUES
(1, 'Menu Top'),
(2, 'Menu Left'),
(3, 'Menu Buttom'),
(4, 'Hot Product'),
(5, 'Menu Right');

-- --------------------------------------------------------

--
-- Table structure for table `z_currency`
--

DROP TABLE IF EXISTS `z_currency`;
CREATE TABLE IF NOT EXISTS `z_currency` (
  `curid` int(11) NOT NULL AUTO_INCREMENT,
  `currcode` varchar(255) DEFAULT NULL,
  `curr_name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `ex_rate` double DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`curid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_currency`
--

INSERT INTO `z_currency` (`curid`, `currcode`, `curr_name`, `symbol`, `is_default`, `ex_rate`, `country`) VALUES
(1, 'USD', 'US Dollars', '$', 1, 1, 'US');

-- --------------------------------------------------------

--
-- Table structure for table `z_module`
--

DROP TABLE IF EXISTS `z_module`;
CREATE TABLE IF NOT EXISTS `z_module` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `sort_mod` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `mod_position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_module`
--

INSERT INTO `z_module` (`moduleid`, `module_name`, `sort_mod`, `order`, `is_active`, `mod_position`) VALUES
(1, 'Setting', NULL, 0, 1, '2'),
(7, 'Menu', NULL, NULL, 1, '2'),
(10, 'Product', NULL, NULL, 0, '2'),
(11, 'Article', NULL, NULL, 1, '2'),
(12, 'Banner', NULL, NULL, 1, '2'),
(13, 'Dashboard', NULL, NULL, 1, '2'),
(18, 'Property', NULL, NULL, 1, '2'),
(19, 'Propery Category', NULL, NULL, 1, '2'),
(20, 'Property Location', NULL, NULL, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `z_page`
--

DROP TABLE IF EXISTS `z_page`;
CREATE TABLE IF NOT EXISTS `z_page` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `moduleid` int(11) DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `is_insert` int(11) DEFAULT NULL,
  `is_update` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `is_show` int(11) DEFAULT NULL,
  `is_print` int(11) DEFAULT NULL,
  `is_export` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `icon` varchar(255) DEFAULT 'fa-bars',
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_page`
--

INSERT INTO `z_page` (`pageid`, `page_name`, `link`, `moduleid`, `order`, `is_insert`, `is_update`, `is_delete`, `is_show`, `is_print`, `is_export`, `created_by`, `created_date`, `is_active`, `icon`, `alias`) VALUES
(5, 'Page', 'setting/page', 1, NULL, 0, 1, 0, 1, 1, 0, 1, '2015-02-05 17:00:01', 1, 'fa-file-o', NULL),
(6, 'User Profile', 'setting/user', 1, NULL, 1, 1, 1, 1, 0, 0, 1, '2015-02-05 16:56:20', 1, 'fa-user', NULL),
(7, 'User Role', 'setting/role', 1, NULL, 1, 1, 1, 1, 1, 1, 1, '2015-02-05 16:57:09', 1, 'fa-user', NULL),
(8, 'Role Access', 'setting/permission', 1, NULL, 1, 1, 0, 0, 0, 1, 1, '2015-02-05 16:56:46', 1, 'fa-wrench', NULL),
(57, 'Shipping Company', 'shipping/shipping', 11, 1, 1, 1, 1, 1, 1, 1, 1, '2015-06-29 11:21:45', 0, 'fa-bars', NULL),
(58, 'Product List', 'product/product', 7, 7, 1, 1, 1, 1, 1, 1, 1, '2015-07-10 13:47:35', 0, 'fa-bars', NULL),
(59, 'Stock In/Out', 'product/stockmove', 7, 8, 1, 1, 1, 1, 1, 1, 1, '2015-07-15 12:04:46', 0, 'fa-bars', NULL),
(54, 'Category', 'stock/category', 7, 6, 1, 1, 1, 1, 1, 1, 1, '2015-06-17 07:53:19', 0, 'fa-bars', 'category.html'),
(55, 'Store', 'store', 10, 0, 1, 1, 1, 1, 1, 1, 1, '2015-06-26 08:04:07', 0, 'fa-bars', NULL),
(56, 'Setup List', 'setup/csetup', 11, 0, 1, 1, 1, 1, 1, 1, 1, '2015-06-27 12:11:58', 0, 'fa-bars', NULL),
(60, 'Slide Show', 'slideshow/SlideShow', 7, 9, 1, 1, 1, 1, 1, 1, 1, '2015-07-17 08:19:12', 0, 'fa-bars', NULL),
(61, 'Setup Ads', 'setup/SetupAds', 11, 2, 1, 1, 1, 1, 1, 1, 1, '2015-08-04 03:00:11', 0, 'fa-bars', NULL),
(62, 'Setup Country', 'setup/country', 11, 3, 1, 1, 1, 1, 1, 1, 1, '2015-08-21 16:25:39', 0, 'fa-bars', NULL),
(63, 'Menu List', 'menu/index', 7, 10, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 12:56:55', 1, 'fa-bars', NULL),
(64, 'Add New Menu', 'menu/add', 7, 11, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 12:56:41', 1, 'fa-bars', NULL),
(65, 'Article List', 'article/index', 11, 4, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:46:23', 1, 'fa-bars', NULL),
(66, 'Add New Article', 'article/add', 11, 5, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:47:08', 1, 'fa-bars', NULL),
(67, 'Product List', 'product/index', 10, 1, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:07', 1, 'fa-bars', NULL),
(68, 'Add New Products', 'product/add', 10, 2, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:46', 1, 'fa-bars', NULL),
(69, 'Banner List', 'setup/setupads/index', 12, 0, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:16:13', 1, 'fa-bars', NULL),
(70, 'Add New Banner', 'setup/setupads/add', 12, 1, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:15:42', 1, 'fa-bars', NULL),
(71, 'Contact List', 'article/contact_list', 13, 0, 1, 1, 1, 1, 1, 1, 1, '2015-09-15 14:32:25', 0, 'fa-bars', NULL),
(75, 'Add New Location', 'category/add', 7, 12, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 12:56:17', 1, 'fa-bars', NULL),
(76, 'Location List', 'category/index', 7, 13, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 12:56:06', 1, 'fa-bars', NULL),
(77, 'Module', 'setting/module', 1, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-17 11:53:41', 0, 'fa-bars', NULL),
(78, 'Add New Property', 'property/property/add', 18, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 04:36:42', 1, 'fa-bars', NULL),
(79, 'Property List', 'property/property/index', 18, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 04:36:26', 1, 'fa-bars', NULL),
(80, 'Add New Property Category', 'property/propertytype/add', 19, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-20 02:26:36', 1, 'fa-bars', NULL),
(81, 'Property Category Lists', 'property/propertytype/index', 19, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-20 02:26:15', 1, 'fa-bars', NULL),
(82, 'Property Location', 'property/propertylocation/add', 20, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 06:14:32', 1, 'fa-bars', NULL),
(83, 'Property Location List', 'property/propertylocation/index', 20, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 06:01:53', 1, 'fa-bars', NULL),
(84, 'Dashboard', 'sys/dashboard', 13, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-12 11:09:31', 1, 'fa-bars', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_role`
--

DROP TABLE IF EXISTS `z_role`;
CREATE TABLE IF NOT EXISTS `z_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_role`
--

INSERT INTO `z_role` (`roleid`, `role`, `is_admin`, `is_active`) VALUES
(1, 'Administrators', 1, 1),
(2, 'Teachers', NULL, 0),
(3, 'Sponsors', NULL, 0),
(4, 'Doctors', NULL, 0),
(5, 'Students', NULL, 0),
(6, 'Parents', NULL, 0),
(8, 'Socials', NULL, 0),
(9, 'www', NULL, 0),
(10, 'asd', NULL, 0),
(11, 'testing', NULL, 0),
(12, 'testing-2a', NULL, 0),
(13, 'testing-3', NULL, 0),
(14, 'testine-4', NULL, 0),
(15, 'Pedagogy Staff', NULL, 0),
(16, 'Human Resource', NULL, 0),
(17, 'Health', NULL, 0),
(18, 'Study Office', NULL, 0),
(19, 'VTC Officier', NULL, 0),
(20, 'Product Posting', NULL, 0),
(21, 'Store Managment', NULL, 0),
(22, 'Product Authorization', NULL, 0),
(23, 'user', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_role_module_detail`
--

DROP TABLE IF EXISTS `z_role_module_detail`;
CREATE TABLE IF NOT EXISTS `z_role_module_detail` (
  `mod_rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`mod_rol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_role_module_detail`
--

INSERT INTO `z_role_module_detail` (`mod_rol_id`, `roleid`, `moduleid`, `order`) VALUES
(126, 1, 19, NULL),
(125, 1, 18, NULL),
(124, 1, 13, NULL),
(123, 1, 12, NULL),
(122, 1, 11, NULL),
(121, 1, 7, NULL),
(120, 1, 1, NULL),
(118, 23, 7, NULL),
(119, 23, 18, NULL),
(127, 1, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_role_page`
--

DROP TABLE IF EXISTS `z_role_page`;
CREATE TABLE IF NOT EXISTS `z_role_page` (
  `role_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT NULL,
  `pageid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `is_read` int(1) DEFAULT '1',
  `is_insert` int(1) DEFAULT '1',
  `is_delete` int(1) DEFAULT '1',
  `is_update` int(1) DEFAULT '1',
  `is_print` int(1) DEFAULT '1',
  `is_export` int(1) DEFAULT '1',
  `is_import` int(1) DEFAULT '1',
  PRIMARY KEY (`role_page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_role_page`
--

INSERT INTO `z_role_page` (`role_page_id`, `roleid`, `pageid`, `moduleid`, `created_date`, `created_by`, `is_read`, `is_insert`, `is_delete`, `is_update`, `is_print`, `is_export`, `is_import`) VALUES
(17, 17, 24, 7, '2015-03-19 02:18:59', '1', 1, 1, 1, 1, 1, 1, 1),
(26, 17, 25, 7, '2015-06-18 21:15:05', '1', 1, 1, 1, 1, 1, 1, 1),
(27, 17, 26, 7, '2015-04-20 10:57:34', '1', 1, 1, 1, 1, 1, 1, 1),
(28, 17, 27, 7, '2015-04-20 10:57:45', '1', 1, 1, 1, 1, 1, 1, 1),
(29, 17, 28, 7, '2015-04-20 10:57:55', '1', 1, 1, 1, 1, 1, 1, 1),
(40, 23, 63, 7, '2018-11-20 04:43:40', '1', 1, 1, 1, 1, 1, 1, 1),
(41, 23, 75, 7, '2018-11-20 04:43:55', '1', 1, 1, 1, 1, 1, 1, 1),
(42, 23, 78, 18, '2018-11-27 02:13:14', '1', 1, 1, 1, 1, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
