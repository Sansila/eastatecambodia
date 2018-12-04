/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : blankadmin

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-07-18 11:02:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1498 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('4', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '2018-07-14 06:19:11', '192.168.0.106', '2015-01-29 15:10:34', null, null, null, '1', 'System', 'Administrator', '1', '1', null);
INSERT INTO `admin_user` VALUES ('5', 'chetra', '202cb962ac59075b964b07152d234b70', 'eing.chetra@gmail.com', '2018-07-14 06:19:11', '192.168.0.106', '2015-02-02 17:26:36', null, null, null, '2', 'eing', 'chetra', '0', '0', null);
INSERT INTO `admin_user` VALUES ('1497', 'store', 'e10adc3949ba59abbe56e057f20f883e', 'store@green.com', '2018-07-14 06:19:11', '192.168.0.106', '2015-06-26 08:10:54', null, null, null, '21', 'Green', 'Store', '0', '0', null);

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('fdea86d52b4d9c32ffaf499d4ffc7942', '192.168.0.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '1531549870', 'a:13:{s:9:\"user_data\";s:0:\"\";s:6:\"userid\";s:1:\"4\";s:9:\"user_name\";s:5:\"admin\";s:8:\"password\";s:32:\"202cb962ac59075b964b07152d234b70\";s:6:\"roleid\";s:1:\"1\";s:9:\"last_name\";s:6:\"System\";s:10:\"first_name\";s:13:\"Administrator\";s:10:\"last_visit\";s:19:\"2018-07-14 06:17:31\";s:13:\"last_visit_ip\";s:13:\"192.168.0.106\";s:9:\"moduleids\";a:4:{i:0;a:1:{s:8:\"moduleid\";s:2:\"11\";}i:1;a:1:{s:8:\"moduleid\";s:1:\"7\";}i:2;a:1:{s:8:\"moduleid\";s:1:\"1\";}i:3;a:1:{s:8:\"moduleid\";s:2:\"12\";}}s:12:\"ModuleInfors\";a:4:{i:11;a:4:{s:8:\"moduleid\";s:2:\"11\";s:11:\"module_name\";s:7:\"Article\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:7;a:4:{s:8:\"moduleid\";s:1:\"7\";s:11:\"module_name\";s:4:\"Menu\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:1;a:4:{s:8:\"moduleid\";s:1:\"1\";s:11:\"module_name\";s:7:\"Setting\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:12;a:4:{s:8:\"moduleid\";s:2:\"12\";s:11:\"module_name\";s:6:\"Banner\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}}s:10:\"PageInfors\";a:4:{i:11;a:2:{i:65;a:14:{s:6:\"pageid\";s:2:\"65\";s:9:\"page_name\";s:12:\"Article List\";s:4:\"link\";s:13:\"article/index\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"4\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:46:23\";s:4:\"icon\";s:7:\"fa-bars\";}i:66;a:14:{s:6:\"pageid\";s:2:\"66\";s:9:\"page_name\";s:15:\"Add New Article\";s:4:\"link\";s:11:\"article/add\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"5\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:47:08\";s:4:\"icon\";s:7:\"fa-bars\";}}i:7;a:4:{i:63;a:14:{s:6:\"pageid\";s:2:\"63\";s:9:\"page_name\";s:13:\"Category List\";s:4:\"link\";s:10:\"menu/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"10\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 15:53:36\";s:4:\"icon\";s:7:\"fa-bars\";}i:64;a:14:{s:6:\"pageid\";s:2:\"64\";s:9:\"page_name\";s:16:\"Add New Category\";s:4:\"link\";s:8:\"menu/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"11\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 15:53:58\";s:4:\"icon\";s:7:\"fa-bars\";}i:75;a:14:{s:6:\"pageid\";s:2:\"75\";s:9:\"page_name\";s:12:\"Add New Menu\";s:4:\"link\";s:12:\"category/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"12\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2017-12-22 13:42:09\";s:4:\"icon\";s:7:\"fa-bars\";}i:76;a:14:{s:6:\"pageid\";s:2:\"76\";s:9:\"page_name\";s:9:\"Menu List\";s:4:\"link\";s:14:\"category/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"13\";s:9:\"is_insert\";s:2:\"11\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2017-12-22 13:42:54\";s:4:\"icon\";s:7:\"fa-bars\";}}i:1;a:4:{i:5;a:14:{s:6:\"pageid\";s:1:\"5\";s:9:\"page_name\";s:4:\"Page\";s:4:\"link\";s:12:\"setting/page\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"0\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 17:00:01\";s:4:\"icon\";s:9:\"fa-file-o\";}i:6;a:14:{s:6:\"pageid\";s:1:\"6\";s:9:\"page_name\";s:12:\"User Profile\";s:4:\"link\";s:12:\"setting/user\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:20\";s:4:\"icon\";s:7:\"fa-user\";}i:7;a:14:{s:6:\"pageid\";s:1:\"7\";s:9:\"page_name\";s:9:\"User Role\";s:4:\"link\";s:12:\"setting/role\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:57:09\";s:4:\"icon\";s:7:\"fa-user\";}i:8;a:14:{s:6:\"pageid\";s:1:\"8\";s:9:\"page_name\";s:11:\"Role Access\";s:4:\"link\";s:18:\"setting/permission\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"0\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:46\";s:4:\"icon\";s:9:\"fa-wrench\";}}i:12;a:2:{i:69;a:14:{s:6:\"pageid\";s:2:\"69\";s:9:\"page_name\";s:11:\"Banner List\";s:4:\"link\";s:20:\"setup/setupads/index\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:16:13\";s:4:\"icon\";s:7:\"fa-bars\";}i:70;a:14:{s:6:\"pageid\";s:2:\"70\";s:9:\"page_name\";s:14:\"Add New Banner\";s:4:\"link\";s:18:\"setup/setupads/add\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:15:42\";s:4:\"icon\";s:7:\"fa-bars\";}}}s:10:\"PageAction\";a:4:{i:11;a:2:{i:65;s:1:\"1\";i:66;s:1:\"1\";}i:7;a:4:{i:63;s:1:\"1\";i:64;s:1:\"1\";i:75;s:1:\"1\";i:76;s:1:\"1\";}i:1;a:4:{i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";}i:12;a:2:{i:69;s:1:\"1\";i:70;s:1:\"1\";}}}');
INSERT INTO `ci_sessions` VALUES ('38aa1c3d8724a4cbbea99d4a863d337b', '192.168.0.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '1531546921', 'a:13:{s:9:\"user_data\";s:0:\"\";s:6:\"userid\";s:1:\"4\";s:9:\"user_name\";s:5:\"admin\";s:8:\"password\";s:32:\"202cb962ac59075b964b07152d234b70\";s:6:\"roleid\";s:1:\"1\";s:9:\"last_name\";s:6:\"System\";s:10:\"first_name\";s:13:\"Administrator\";s:10:\"last_visit\";s:19:\"2018-07-14 04:34:48\";s:13:\"last_visit_ip\";s:13:\"192.168.0.106\";s:9:\"moduleids\";a:4:{i:0;a:1:{s:8:\"moduleid\";s:2:\"11\";}i:1;a:1:{s:8:\"moduleid\";s:1:\"7\";}i:2;a:1:{s:8:\"moduleid\";s:1:\"1\";}i:3;a:1:{s:8:\"moduleid\";s:2:\"12\";}}s:12:\"ModuleInfors\";a:4:{i:11;a:4:{s:8:\"moduleid\";s:2:\"11\";s:11:\"module_name\";s:7:\"Article\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:7;a:4:{s:8:\"moduleid\";s:1:\"7\";s:11:\"module_name\";s:4:\"Menu\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:1;a:4:{s:8:\"moduleid\";s:1:\"1\";s:11:\"module_name\";s:7:\"Setting\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}i:12;a:4:{s:8:\"moduleid\";s:2:\"12\";s:11:\"module_name\";s:6:\"Banner\";s:8:\"sort_mod\";N;s:12:\"mod_position\";s:1:\"2\";}}s:10:\"PageInfors\";a:4:{i:11;a:2:{i:65;a:14:{s:6:\"pageid\";s:2:\"65\";s:9:\"page_name\";s:12:\"Article List\";s:4:\"link\";s:13:\"article/index\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"4\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:46:23\";s:4:\"icon\";s:7:\"fa-bars\";}i:66;a:14:{s:6:\"pageid\";s:2:\"66\";s:9:\"page_name\";s:15:\"Add New Article\";s:4:\"link\";s:11:\"article/add\";s:8:\"moduleid\";s:2:\"11\";s:5:\"order\";s:1:\"5\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 16:47:08\";s:4:\"icon\";s:7:\"fa-bars\";}}i:7;a:4:{i:63;a:14:{s:6:\"pageid\";s:2:\"63\";s:9:\"page_name\";s:13:\"Category List\";s:4:\"link\";s:10:\"menu/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"10\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 15:53:36\";s:4:\"icon\";s:7:\"fa-bars\";}i:64;a:14:{s:6:\"pageid\";s:2:\"64\";s:9:\"page_name\";s:16:\"Add New Category\";s:4:\"link\";s:8:\"menu/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"11\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-09-11 15:53:58\";s:4:\"icon\";s:7:\"fa-bars\";}i:75;a:14:{s:6:\"pageid\";s:2:\"75\";s:9:\"page_name\";s:12:\"Add New Menu\";s:4:\"link\";s:12:\"category/add\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"12\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2017-12-22 13:42:09\";s:4:\"icon\";s:7:\"fa-bars\";}i:76;a:14:{s:6:\"pageid\";s:2:\"76\";s:9:\"page_name\";s:9:\"Menu List\";s:4:\"link\";s:14:\"category/index\";s:8:\"moduleid\";s:1:\"7\";s:5:\"order\";s:2:\"13\";s:9:\"is_insert\";s:2:\"11\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2017-12-22 13:42:54\";s:4:\"icon\";s:7:\"fa-bars\";}}i:1;a:4:{i:5;a:14:{s:6:\"pageid\";s:1:\"5\";s:9:\"page_name\";s:4:\"Page\";s:4:\"link\";s:12:\"setting/page\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"0\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 17:00:01\";s:4:\"icon\";s:9:\"fa-file-o\";}i:6;a:14:{s:6:\"pageid\";s:1:\"6\";s:9:\"page_name\";s:12:\"User Profile\";s:4:\"link\";s:12:\"setting/user\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"0\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:20\";s:4:\"icon\";s:7:\"fa-user\";}i:7;a:14:{s:6:\"pageid\";s:1:\"7\";s:9:\"page_name\";s:9:\"User Role\";s:4:\"link\";s:12:\"setting/role\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:57:09\";s:4:\"icon\";s:7:\"fa-user\";}i:8;a:14:{s:6:\"pageid\";s:1:\"8\";s:9:\"page_name\";s:11:\"Role Access\";s:4:\"link\";s:18:\"setting/permission\";s:8:\"moduleid\";s:1:\"1\";s:5:\"order\";N;s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"0\";s:7:\"is_show\";s:1:\"0\";s:8:\"is_print\";s:1:\"0\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2015-02-05 16:56:46\";s:4:\"icon\";s:9:\"fa-wrench\";}}i:12;a:2:{i:69;a:14:{s:6:\"pageid\";s:2:\"69\";s:9:\"page_name\";s:11:\"Banner List\";s:4:\"link\";s:20:\"setup/setupads/index\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"0\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:16:13\";s:4:\"icon\";s:7:\"fa-bars\";}i:70;a:14:{s:6:\"pageid\";s:2:\"70\";s:9:\"page_name\";s:14:\"Add New Banner\";s:4:\"link\";s:18:\"setup/setupads/add\";s:8:\"moduleid\";s:2:\"12\";s:5:\"order\";s:1:\"1\";s:9:\"is_insert\";s:1:\"1\";s:9:\"is_update\";s:1:\"1\";s:9:\"is_delete\";s:1:\"1\";s:7:\"is_show\";s:1:\"1\";s:8:\"is_print\";s:1:\"1\";s:9:\"is_export\";s:1:\"1\";s:10:\"created_by\";s:1:\"1\";s:12:\"created_date\";s:19:\"2016-02-05 23:15:42\";s:4:\"icon\";s:7:\"fa-bars\";}}}s:10:\"PageAction\";a:4:{i:11;a:2:{i:65;s:1:\"1\";i:66;s:1:\"1\";}i:7;a:4:{i:63;s:1:\"1\";i:64;s:1:\"1\";i:75;s:1:\"1\";i:76;s:1:\"1\";}i:1;a:4:{i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"0\";}i:12;a:2:{i:69;s:1:\"1\";i:70;s:1:\"1\";}}}');

-- ----------------------------
-- Table structure for dashboard_item
-- ----------------------------
DROP TABLE IF EXISTS `dashboard_item`;
CREATE TABLE `dashboard_item` (
  `dashid` int(11) NOT NULL AUTO_INCREMENT,
  `dash_item` varchar(255) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `link_pageid` int(11) DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  `block` varchar(255) DEFAULT NULL COMMENT 'left_top,left_bottom',
  PRIMARY KEY (`dashid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dashboard_item
-- ----------------------------
INSERT INTO `dashboard_item` VALUES ('1', 'Student', '3', '10', '1', 'top_left');

-- ----------------------------
-- Table structure for site_profile
-- ----------------------------
DROP TABLE IF EXISTS `site_profile`;
CREATE TABLE `site_profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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

-- ----------------------------
-- Records of site_profile
-- ----------------------------
INSERT INTO `site_profile` VALUES ('1', '855 solution', '418Eo+E1, Phlauv 358, Sangkat Chbar Ampov, Khan Chbar Ampov , Phnom Penh.', '015 871 787 / 092 226 133', 'info@855solution.com', 'https://www.facebook.com/%E1%9E%93%E1%9E%B6%E1%9E%99%E1%9E%80%E1%9E%8A%E1%9F%92%E1%9E%8B%E1%9E%B6%E1%9E%93%E1%9E%9C%E1%9E%B7%E1%9E%91%E1%9F%92%E1%9E%99%E1%9E%BB%E1%9E%91%E1%9E%B6%E1%9E%80%E1%9F%8B%E1%9E%91%E1%9E%84-112512662798448/', 'https://plus.google.com/117575618297062468775', '', 'https://twitter.com/Kimhay98Kh', '', null, null, '1');

-- ----------------------------
-- Table structure for tblarticle
-- ----------------------------
DROP TABLE IF EXISTS `tblarticle`;
CREATE TABLE `tblarticle` (
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblarticle
-- ----------------------------
INSERT INTO `tblarticle` VALUES ('86', 'First', 'First', '', '<p>\n	Hello</p>\n', '1', '1', '', '', null, '', '2018-07-14', '83');

-- ----------------------------
-- Table structure for tblbanner
-- ----------------------------
DROP TABLE IF EXISTS `tblbanner`;
CREATE TABLE `tblbanner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `banner_location` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `orders` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblbanner
-- ----------------------------
INSERT INTO `tblbanner` VALUES ('36', 'First', '2', '1', '1', '');

-- ----------------------------
-- Table structure for tblcontact
-- ----------------------------
DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE `tblcontact` (
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

-- ----------------------------
-- Records of tblcontact
-- ----------------------------

-- ----------------------------
-- Table structure for tblgallery
-- ----------------------------
DROP TABLE IF EXISTS `tblgallery`;
CREATE TABLE `tblgallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `gallery_type` int(1) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `home` int(1) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblgallery
-- ----------------------------
INSERT INTO `tblgallery` VALUES ('416', null, 'img-01.jpg', '0', '86', '0', null, null);

-- ----------------------------
-- Table structure for tbllayout
-- ----------------------------
DROP TABLE IF EXISTS `tbllayout`;
CREATE TABLE `tbllayout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`layout_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbllayout
-- ----------------------------
INSERT INTO `tbllayout` VALUES ('1', 'Full Layout', '1');
INSERT INTO `tbllayout` VALUES ('2', 'Grid Layout', '1');

-- ----------------------------
-- Table structure for tbllocation
-- ----------------------------
DROP TABLE IF EXISTS `tbllocation`;
CREATE TABLE `tbllocation` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_active` int(1) NOT NULL,
  `location_name_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbllocation
-- ----------------------------
INSERT INTO `tbllocation` VALUES ('16', 'MainMenu', '1', null);

-- ----------------------------
-- Table structure for tblmenus
-- ----------------------------
DROP TABLE IF EXISTS `tblmenus`;
CREATE TABLE `tblmenus` (
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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblmenus
-- ----------------------------
INSERT INTO `tblmenus` VALUES ('83', 'Home', null, '83', '0', '0', '1', '1', null, null, '2', null, null, 'Home', '0', '16', '16');

-- ----------------------------
-- Table structure for tblproduct
-- ----------------------------
DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE `tblproduct` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `menu_id` int(11) NOT NULL,
  `content_desc` text CHARACTER SET utf8 NOT NULL,
  `content_bottom` text NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproduct
-- ----------------------------
INSERT INTO `tblproduct` VALUES ('8', 'Product1 ', '3', '<p>\n	<img alt=\"\" src=\"/htdocs/cljr/data/images/1410600813.jpg\" style=\"width: 941px; height: 496px;\" />asdfasdfa</p>\n', '<p>\n	asdfasfg</p>\n', '1');
INSERT INTO `tblproduct` VALUES ('9', 'Product 2', '3', '<p>agfsdgwet</p>\n', '<p>wertwetgwt</p>\n', '1');
INSERT INTO `tblproduct` VALUES ('10', 'Product 3', '3', '<p>srtwer</p>\n', '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/201409141410683168993.jpg\" style=\"height:1086px; width:950px\" /></p>\n', '1');

-- ----------------------------
-- Table structure for z_blog
-- ----------------------------
DROP TABLE IF EXISTS `z_blog`;
CREATE TABLE `z_blog` (
  `site_show_blogid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`site_show_blogid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_blog
-- ----------------------------
INSERT INTO `z_blog` VALUES ('1', 'Menu Top');
INSERT INTO `z_blog` VALUES ('2', 'Menu Left');
INSERT INTO `z_blog` VALUES ('3', 'Menu Buttom');
INSERT INTO `z_blog` VALUES ('4', 'Hot Product');
INSERT INTO `z_blog` VALUES ('5', 'Menu Right');

-- ----------------------------
-- Table structure for z_currency
-- ----------------------------
DROP TABLE IF EXISTS `z_currency`;
CREATE TABLE `z_currency` (
  `curid` int(11) NOT NULL AUTO_INCREMENT,
  `currcode` varchar(255) DEFAULT NULL,
  `curr_name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `ex_rate` double DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`curid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_currency
-- ----------------------------
INSERT INTO `z_currency` VALUES ('1', 'USD', 'US Dollars', '$', '1', '1', 'US');

-- ----------------------------
-- Table structure for z_module
-- ----------------------------
DROP TABLE IF EXISTS `z_module`;
CREATE TABLE `z_module` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `sort_mod` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `mod_position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`moduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_module
-- ----------------------------
INSERT INTO `z_module` VALUES ('1', 'Setting', null, '0', '1', '2');
INSERT INTO `z_module` VALUES ('7', 'Menu', null, null, '1', '2');
INSERT INTO `z_module` VALUES ('10', 'Product', null, null, '0', '2');
INSERT INTO `z_module` VALUES ('11', 'Article', null, null, '1', '2');
INSERT INTO `z_module` VALUES ('12', 'Banner', null, null, '1', '2');
INSERT INTO `z_module` VALUES ('13', 'Contact', null, null, '0', '2');

-- ----------------------------
-- Table structure for z_page
-- ----------------------------
DROP TABLE IF EXISTS `z_page`;
CREATE TABLE `z_page` (
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
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_page
-- ----------------------------
INSERT INTO `z_page` VALUES ('5', 'Page', 'setting/page', '1', null, '0', '1', '0', '1', '1', '0', '1', '2015-02-05 17:00:01', '1', 'fa-file-o', null);
INSERT INTO `z_page` VALUES ('6', 'User Profile', 'setting/user', '1', null, '1', '1', '1', '1', '0', '0', '1', '2015-02-05 16:56:20', '1', 'fa-user', null);
INSERT INTO `z_page` VALUES ('7', 'User Role', 'setting/role', '1', null, '1', '1', '1', '1', '1', '1', '1', '2015-02-05 16:57:09', '1', 'fa-user', null);
INSERT INTO `z_page` VALUES ('8', 'Role Access', 'setting/permission', '1', null, '1', '1', '0', '0', '0', '1', '1', '2015-02-05 16:56:46', '1', 'fa-wrench', null);
INSERT INTO `z_page` VALUES ('57', 'Shipping Company', 'shipping/shipping', '11', '1', '1', '1', '1', '1', '1', '1', '1', '2015-06-29 11:21:45', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('58', 'Product List', 'product/product', '7', '7', '1', '1', '1', '1', '1', '1', '1', '2015-07-10 13:47:35', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('59', 'Stock In/Out', 'product/stockmove', '7', '8', '1', '1', '1', '1', '1', '1', '1', '2015-07-15 12:04:46', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('54', 'Category', 'stock/category', '7', '6', '1', '1', '1', '1', '1', '1', '1', '2015-06-17 07:53:19', '0', 'fa-bars', 'category.html');
INSERT INTO `z_page` VALUES ('55', 'Store', 'store', '10', '0', '1', '1', '1', '1', '1', '1', '1', '2015-06-26 08:04:07', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('56', 'Setup List', 'setup/csetup', '11', '0', '1', '1', '1', '1', '1', '1', '1', '2015-06-27 12:11:58', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('60', 'Slide Show', 'slideshow/SlideShow', '7', '9', '1', '1', '1', '1', '1', '1', '1', '2015-07-17 08:19:12', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('61', 'Setup Ads', 'setup/SetupAds', '11', '2', '1', '1', '1', '1', '1', '1', '1', '2015-08-04 03:00:11', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('62', 'Setup Country', 'setup/country', '11', '3', '1', '1', '1', '1', '1', '1', '1', '2015-08-21 16:25:39', '0', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('63', 'Category List', 'menu/index', '7', '10', '1', '1', '1', '1', '1', '1', '1', '2015-09-11 15:53:36', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('64', 'Add New Category', 'menu/add', '7', '11', '1', '1', '1', '1', '1', '1', '1', '2015-09-11 15:53:58', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('65', 'Article List', 'article/index', '11', '4', '1', '1', '1', '1', '1', '1', '1', '2015-09-11 16:46:23', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('66', 'Add New Article', 'article/add', '11', '5', '1', '1', '1', '1', '1', '1', '1', '2015-09-11 16:47:08', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('67', 'Product List', 'product/index', '10', '1', '1', '1', '1', '1', '1', '1', '1', '2015-09-12 17:10:07', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('68', 'Add New Products', 'product/add', '10', '2', '1', '1', '1', '1', '1', '1', '1', '2015-09-12 17:10:46', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('69', 'Banner List', 'setup/setupads/index', '12', '0', '1', '1', '1', '1', '1', '1', '1', '2016-02-05 23:16:13', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('70', 'Add New Banner', 'setup/setupads/add', '12', '1', '1', '1', '1', '1', '1', '1', '1', '2016-02-05 23:15:42', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('71', 'Contact List', 'article/contact_list', '13', '0', '1', '1', '1', '1', '1', '1', '1', '2015-09-15 14:32:25', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('75', 'Add New Menu', 'category/add', '7', '12', '1', '1', '1', '1', '1', '1', '1', '2017-12-22 13:42:09', '1', 'fa-bars', null);
INSERT INTO `z_page` VALUES ('76', 'Menu List', 'category/index', '7', '13', '11', '1', '1', '1', '1', '1', '1', '2017-12-22 13:42:54', '1', 'fa-bars', null);

-- ----------------------------
-- Table structure for z_role
-- ----------------------------
DROP TABLE IF EXISTS `z_role`;
CREATE TABLE `z_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_role
-- ----------------------------
INSERT INTO `z_role` VALUES ('1', 'Administrators', '1', '1');
INSERT INTO `z_role` VALUES ('2', 'Teachers', null, '0');
INSERT INTO `z_role` VALUES ('3', 'Sponsors', null, '0');
INSERT INTO `z_role` VALUES ('4', 'Doctors', null, '0');
INSERT INTO `z_role` VALUES ('5', 'Students', null, '0');
INSERT INTO `z_role` VALUES ('6', 'Parents', null, '0');
INSERT INTO `z_role` VALUES ('8', 'Socials', null, '0');
INSERT INTO `z_role` VALUES ('9', 'www', null, '0');
INSERT INTO `z_role` VALUES ('10', 'asd', null, '0');
INSERT INTO `z_role` VALUES ('11', 'testing', null, '0');
INSERT INTO `z_role` VALUES ('12', 'testing-2a', null, '0');
INSERT INTO `z_role` VALUES ('13', 'testing-3', null, '0');
INSERT INTO `z_role` VALUES ('14', 'testine-4', null, '0');
INSERT INTO `z_role` VALUES ('15', 'Pedagogy Staff', null, '0');
INSERT INTO `z_role` VALUES ('16', 'Human Resource', null, '0');
INSERT INTO `z_role` VALUES ('17', 'Health', null, '0');
INSERT INTO `z_role` VALUES ('18', 'Study Office', null, '0');
INSERT INTO `z_role` VALUES ('19', 'VTC Officier', null, '0');
INSERT INTO `z_role` VALUES ('20', 'Product Posting', null, '0');
INSERT INTO `z_role` VALUES ('21', 'Store Managment', null, '0');
INSERT INTO `z_role` VALUES ('22', 'Product Authorization', null, '0');

-- ----------------------------
-- Table structure for z_role_module_detail
-- ----------------------------
DROP TABLE IF EXISTS `z_role_module_detail`;
CREATE TABLE `z_role_module_detail` (
  `mod_rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`mod_rol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_role_module_detail
-- ----------------------------
INSERT INTO `z_role_module_detail` VALUES ('110', '1', '12', null);
INSERT INTO `z_role_module_detail` VALUES ('109', '1', '11', null);
INSERT INTO `z_role_module_detail` VALUES ('108', '1', '7', null);
INSERT INTO `z_role_module_detail` VALUES ('107', '1', '1', null);

-- ----------------------------
-- Table structure for z_role_page
-- ----------------------------
DROP TABLE IF EXISTS `z_role_page`;
CREATE TABLE `z_role_page` (
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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_role_page
-- ----------------------------
INSERT INTO `z_role_page` VALUES ('17', '17', '24', '7', '2015-03-19 02:18:59', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `z_role_page` VALUES ('26', '17', '25', '7', '2015-06-18 21:15:05', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `z_role_page` VALUES ('27', '17', '26', '7', '2015-04-20 10:57:34', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `z_role_page` VALUES ('28', '17', '27', '7', '2015-04-20 10:57:45', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `z_role_page` VALUES ('29', '17', '28', '7', '2015-04-20 10:57:55', '1', '1', '1', '1', '1', '1', '1', '1');
