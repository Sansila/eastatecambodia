-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2019 at 02:52 PM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estatga3_eastate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `userid` int(11) NOT NULL,
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
  `business` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userid`, `user_name`, `password`, `email`, `gender`, `dob`, `phone`, `address`, `last_visit`, `last_visit_ip`, `created_date`, `created_by`, `modified_by`, `modified_date`, `roleid`, `last_name`, `first_name`, `is_admin`, `is_active`, `def_storeid`, `type_post`, `remark`, `business`) VALUES
(4, 'admin', 'cd216fc9de5127f992257bab73d686c5', 'vireak.cambodia@gmail.com', '', '0000-00-00', '93633687', '207', '2019-01-18 02:50:37', '199.79.62.208', '2015-01-29 15:10:34', NULL, NULL, NULL, 1, 'VIREAK', 'MUTH', 1, 1, NULL, NULL, NULL, NULL),
(5, 'chetra', '202cb962ac59075b964b07152d234b70', 'eing.chetra@gmail.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2015-02-02 17:26:36', NULL, NULL, NULL, 2, 'eing', 'chetra', 0, 0, NULL, NULL, NULL, NULL),
(1497, 'store', 'e10adc3949ba59abbe56e057f20f883e', 'store@green.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2015-06-26 08:10:54', NULL, NULL, NULL, 21, 'Green', 'Store', 0, 0, NULL, NULL, NULL, NULL),
(1498, 'user', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-11-20 04:42:55', NULL, NULL, NULL, 23, 'user', 'user', 0, 1, NULL, NULL, NULL, NULL),
(1499, 'vireak', '202cb962ac59075b964b07152d234b70', 'vireak@estatecambodia.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-02 11:49:35', NULL, NULL, NULL, 24, 'MUTH', 'Vireak', 0, 1, NULL, NULL, NULL, NULL),
(1500, 'sophoeun', '202cb962ac59075b964b07152d234b70', 'vireak.cambodia@gmail.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-12 04:41:16', NULL, NULL, NULL, 24, 'Nong', 'Sophoeun', 0, 1, NULL, NULL, NULL, NULL),
(1501, 'kunthy', '202cb962ac59075b964b07152d234b70', 'ninsokornthy@gmail.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-18 05:22:04', NULL, NULL, NULL, 24, 'nin', 'kunthy', 0, 1, NULL, NULL, NULL, NULL),
(1502, 'sunny', '8d4a59fcaf2baba62c0992aa62e667aa', 'sunvanny26@gmail.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-22 05:28:52', NULL, NULL, NULL, 24, 'SOKPISETH', 'KHUON', 0, 1, NULL, NULL, NULL, NULL),
(1503, 'nhork', '827ccb0eea8a706c4c34a16891f84e7b', 'imnhork@estatecambodia.com', '', '0000-00-00', '', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-27 03:13:56', NULL, NULL, NULL, 24, 'Im', 'Nhork', 0, 1, NULL, NULL, NULL, NULL),
(1504, 'sovanny', '790824481fe017b9b619f92c09df362c', 'amazing.acc18@gmail.com', '', '0000-00-00', '010300300', '', '2019-01-18 02:50:37', '199.79.62.208', '2018-12-27 07:09:43', NULL, NULL, NULL, 24, 'Deap', 'Sovanny', 0, 1, NULL, NULL, NULL, NULL),
(1506, 'sdfsdf', NULL, 'vireak.cambodia@gmail.com', NULL, NULL, '93633687', '207', '2019-01-18 02:50:37', '199.79.62.208', '2019-01-05 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'owner', NULL, NULL),
(1507, 'hello', NULL, 'vireak.cambodia@gmail.com', NULL, NULL, '93633687', '207', '2019-01-18 02:50:37', '199.79.62.208', '2019-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'owner', NULL, NULL),
(1508, 'noeun', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 'vireak.cambodia@gmail.com', NULL, NULL, NULL, NULL, '2019-01-18 02:50:37', '199.79.62.208', '2019-01-11 02:41:08', NULL, NULL, NULL, 24, 'Noeun', 'Noeun', 0, 1, NULL, NULL, NULL, NULL),
(1509, 'Sinboeun', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 'vireak.cambodia@gmail.com', NULL, NULL, NULL, NULL, '2019-01-18 02:50:37', '199.79.62.208', '2019-01-15 05:49:57', NULL, NULL, NULL, 24, 'SIN', 'BEOUN', 0, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('eb302c60608de183457518a29c04d3ad', '3.17.58.50', 'Mozilla/5.0 (X11; Linux x86_64) Gecko/20100101 Safari/602.1', 1547808773, ''),
('6f019e41269a50e39393797c49c553a2', '185.220.101.8', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547808058, ''),
('c56599d35049a1349f3643bfca5d9bcb', '3.17.58.50', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/537.', 1547808773, ''),
('af7c8db3d7f6e2ffee33629f62de8af9', '52.53.201.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1547805270, ''),
('96cc81ef46914c74cbbb23fb571366f9', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547805652, ''),
('17ca6d12eeffa20dd05cc663cea470f6', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547805652, ''),
('2b0de3192ef42d333d5c496abc747ab3', '18.222.208.48', 'Mozilla/5.0 (X11; Linux x86_64) Gecko/20100101 Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41', 1547806955, ''),
('427fd050da9c3bd4686d07c1985e3c96', '18.222.208.48', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Trident/5.0 Safari/602.1', 1547806955, ''),
('22a766ca9096e44eb13d12c9ed54e88f', '179.43.134.155', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547807424, ''),
('d4270d37d36fadef429cc541d15a6137', '3.16.54.147', 'Mozilla/5.0 (X11; Linux x86_64) Trident/5.0 Firefox/42.0', 1547810629, ''),
('9fe5af2d875d2fff829f66a29e1cb2e8', '3.16.54.147', 'Mozilla/5.0 (X11; Linux x86_64) Trident/5.0 Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41', 1547810629, ''),
('28928e16f07deb7adc9e5163a64dc574', '18.222.89.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) AppleWebKit/537.36 (KHTML, like Gecko) Safari/602.1', 1547812390, ''),
('396314eeaa969e4ee80e6e72b1b97d42', '18.222.89.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) AppleWebKit/537.36 (KHTML, like Gecko) Firefox/42.0', 1547812390, ''),
('01d24d799b41b6671ca4563f36c627c5', '51.75.71.123', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547813197, ''),
('799efa033149c473163081f6850f54fe', '18.222.89.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Trident/5.0 Safari/602.1', 1547814161, ''),
('3cbbe9ed8a1956eb06361e8b4e48529b', '18.222.89.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/5', 1547814161, ''),
('01c74f848d4602376291b86f8c35008a', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547814202, ''),
('30e770271adddcf9fcf9ac66f85e0007', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547814202, ''),
('3161ba53a02875f5385128aeb8a5d227', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547814206, ''),
('73e225f4f48d42c88f6722f9fd412b70', '100.43.81.105', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547814420, ''),
('2cc9f9a2dc3c2258a3e81ea205606e62', '199.79.62.208', '0', 1547814420, ''),
('411922c3c7a260e8670b519fd267f480', '199.79.62.208', '0', 1547814420, ''),
('b67712de76d9c581fc66960b2efb8c28', '199.79.62.208', '0', 1547814420, ''),
('ee8321418d4c4b6ccc1b8a11d9fb4582', '199.79.62.208', '0', 1547814420, ''),
('bd7c5cce3a8ea9fb3611a36e33d18ca9', '199.79.62.208', '0', 1547814420, ''),
('c4ea380e4f9d6de6f2f680f749a3f101', '199.79.62.208', '0', 1547814420, ''),
('61e51cd782d967715ddaae2e72ba3713', '195.123.221.122', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547814741, ''),
('3bcd0eea161608e529f384176ad97958', '18.223.107.37', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Chrome/67.0.3396.79 Safari/537.36', 1547815982, ''),
('1dcaf8d2f1d9b8009cf0ee1e5339910c', '18.223.107.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Firefox/42.0', 1547815982, ''),
('a847a738d5f9e77283f7f748d7024756', '185.220.101.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547817233, ''),
('b7b3c62926704b3c6c7619a2040410e3', '18.216.245.139', 'Mozilla/5.0 (X11; Linux x86_64) Trident/5.0 Firefox/42.0', 1547817827, ''),
('bccd85e7c85ef55817e5cc7e869ad9f5', '18.216.245.139', 'Mozilla/5.0 (X11; Linux x86_64) Gecko/20100101 Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41', 1547817827, ''),
('b31903b336d3ef63965d1ba81fa91443', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547819654, ''),
('22d244cefb5ddd2b9ee16b00ff08ee72', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547819654, ''),
('be8ffffb5fda6a95d2816d330d7bed14', '18.188.240.21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/', 1547820024, ''),
('e8953ed74bef67d9cdd3cb7f89f82fec', '18.188.240.21', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Trident/5.0 Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41', 1547820024, ''),
('79acb18eafc67596343b0d9dba358385', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547820032, ''),
('b54597e98bfecb06c73049be0a9a56d4', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547820032, ''),
('3127fc3ae3ab1974988239b5d612ed96', '178.154.244.171', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1547820036, ''),
('49a0c5f6bfdce5c93550dec721c3d52c', '199.79.62.208', '0', 1547820036, ''),
('9f3477033f1658410e4dae85c69c70ad', '199.79.62.208', '0', 1547820036, ''),
('78f9a6a20141847b1e0058583c85ec8a', '144.217.166.65', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547820071, ''),
('083136914a8e4224a29c54d6fc833490', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547820846, ''),
('57d33d82132e9ab610995b0640068663', '18.221.190.171', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) AppleWebKit/537.36 (KHTML, like Gecko) Safari/602.1', 1547823138, ''),
('772a04450ef1008b2a5f9561be0d2188', '18.221.190.171', 'Mozilla/5.0 (X11; Linux x86_64) Gecko/20100101 Safari/602.1', 1547823138, ''),
('0068b852f38a7d21182fa5b5335b80d1', '207.241.229.235', 'Mozilla/5.0 (compatible; special_archiver/3.1.1 +http://www.archive.org/details/archive.org_bot)', 1547808011, ''),
('2195a5299fb9cee2f0656b050f724589', '207.241.229.235', 'Mozilla/5.0 (compatible; special_archiver/3.1.1 +http://www.archive.org/details/archive.org_bot)', 1547808011, ''),
('0e4198b2a149aa621b17c18afb9a2fc8', '37.187.129.166', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547801372, ''),
('83177ee6b77d6a318c10216f6d9b2010', '180.76.15.9', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 1547801395, ''),
('7ad4ad74aabe6267832b2a62e6d1e6bf', '13.58.141.246', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Trident/5.0 Chrome/67.0.3396.79 Safari/537.36', 1547801649, ''),
('4caa71903bc2a5756582344aa4c34048', '13.58.141.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Trident/5.0 Chrome/67.0.3396.79 Safari/537.36', 1547801649, ''),
('d4960cb04e6fe2582a6a0327ee58c356', '192.160.102.164', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1547803331, ''),
('1838867929c2eeaf63db913a9b63ed8d', '207.241.231.171', 'Mozilla/5.0 (compatible; special_archiver/3.1.1 +http://www.archive.org/details/archive.org_bot)', 1547803361, ''),
('a54ca3001502e76c72ae996c3eb8a2ca', '207.241.231.171', 'Mozilla/5.0 (compatible; special_archiver/3.1.1 +http://www.archive.org/details/archive.org_bot)', 1547803361, ''),
('3e6891afd356dffdc40fe7c3b056d4db', '18.191.182.120', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Safari/602.1', 1547803400, ''),
('6fbb334513173f38b74d5485dba88668', '18.191.182.120', 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Trident/5.0 Safari/602.1', 1547803400, ''),
('7ff5fc576d608169803da1ef52e0294c', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547804271, ''),
('4b6b55180a0dcdf583c4c06a14d26752', '216.244.66.199', 'Mozilla/5.0 (compatible; DotBot/1.1; http://www.opensiteexplorer.org/dotbot, help@moz.com)', 1547804271, ''),
('33038f2ac0e9ba4220d23eb6c97054a1', '18.223.23.251', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537', 1547805179, ''),
('9478ad4187cc7c6eafbcdc7449e5d5dd', '18.223.23.251', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Chrome/51.0.2704.106 Safari/537.36 OPR/38.0.2220.41', 1547805179, ''),
('a8feed969aede5471f61046408ada8ce', '52.53.201.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.3', 1547805270, '');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_item`
--

CREATE TABLE `dashboard_item` (
  `dashid` int(11) NOT NULL,
  `dash_item` varchar(255) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `link_pageid` int(11) DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  `block` varchar(255) DEFAULT NULL COMMENT 'left_top,left_bottom'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dashboard_item`
--

INSERT INTO `dashboard_item` (`dashid`, `dash_item`, `moduleid`, `link_pageid`, `is_show`, `block`) VALUES
(1, 'Student', 3, 10, 1, 'top_left');

-- --------------------------------------------------------

--
-- Table structure for table `site_profile`
--

CREATE TABLE `site_profile` (
  `id` int(11) UNSIGNED NOT NULL,
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
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_profile`
--

INSERT INTO `site_profile` (`id`, `site_name`, `address`, `phone`, `email`, `facebook`, `google_plus`, `youtube`, `twitter`, `linkedin`, `weixin`, `date_post`, `is_active`) VALUES
(1, 'Estate Cambodia', '#101, St. 289, Beng Kak I, Toul Kork, Phnom Penh.', '093 633 687 | 010 577015', 'info@estatecambodia.com', 'https://www.facebook.com/Estate-Cambodia-353593905444238', '', '', '', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

CREATE TABLE `tblarticle` (
  `article_id` int(11) NOT NULL,
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
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`article_id`, `article_title`, `article_title_kh`, `content_kh`, `content`, `is_active`, `is_marguee`, `meta_keyword`, `meta_desc`, `location_id`, `icon`, `article_date`, `menu_id`) VALUES
(1, 'ABOUT US', 'ABOUT US', '', '<p>\n	<span style=\"font-family: hanuman; font-size: 18px; text-align: center;\">Estate Cambodia provide property consulting service to our clients who are property owners and the customers who want properties who their own purpose.</span><span style=\"font-size: 18px;\"><samp><span style=\"font-family:hanuman;\">We provide the best advisory to ensure the client&#39;s requirement is match and delivered</span></samp></span><span style=\"font-family: hanuman; font-size: 18px; text-align: center;\">.</span></p>\n<p>\n	<span style=\"font-size:18px;\"><samp><span style=\"font-family:hanuman;\">Properties focused:</span></samp></span></p>\n<ul>\n	<li>\n		<p>\n			<span style=\"font-size:18px;\"><samp><span style=\"font-family:hanuman;\">Commercial and Development</span></samp></span></p>\n	</li>\n	<li>\n		<p>\n			<span style=\"font-size:18px;\"><samp><span style=\"font-family:hanuman;\">Residential</span></samp></span></p>\n	</li>\n	<li>\n		<p>\n			<span style=\"font-size:18px;\"><samp><span style=\"font-family:hanuman;\">Agriculture</span></samp></span></p>\n	</li>\n	<li>\n		<p>\n			<span style=\"font-size:18px;\"><samp><span style=\"font-family:hanuman;\">Resort</span></samp></span></p>\n	</li>\n</ul>\n<p>\n	&nbsp;</p>\n<p>\n	<font face=\"hanuman\"><span style=\"font-size: 18px;\">Investors or buyers can registers to our portal to look for the properties and our consultant will advise and recommend the properties which fullfill their need. </span></font></p>\n<p>\n	<font face=\"hanuman\"><span style=\"font-size: 18px;\">Contact us for more information info@estatecambodia.com | 093 633 687</span></font></p>', 1, 1, 'Property Consulting, Agent', '', NULL, '', '2018-12-06', 97);

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `banner_location` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `orders` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`banner_id`, `title`, `banner_location`, `is_active`, `orders`, `link`) VALUES
(8, 'h1', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` int(11) NOT NULL,
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
  `region` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `gallery_type` int(1) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `location_id` int(11) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `home` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`gallery_id`, `gallery_title`, `url`, `gallery_type`, `article_id`, `pid`, `location_id`, `order`, `home`) VALUES
(1, NULL, 'property-1.jpg', 0, NULL, 1, 0, NULL, NULL),
(14, NULL, 'property-detail-1.jpg', 0, NULL, 5, 0, NULL, NULL),
(15, NULL, 'property-detail-2.jpg', 0, NULL, 5, 0, NULL, NULL),
(16, NULL, 'property-detail-3.jpg', 0, NULL, 5, 0, NULL, NULL),
(23, NULL, 'property-5.jpg', 0, NULL, 2, 0, NULL, NULL),
(25, NULL, 'property-3.jpg', 0, NULL, 7, 0, NULL, NULL),
(26, NULL, 'property-4.jpg', 0, NULL, 7, 0, NULL, NULL),
(53, NULL, '1880697_242_b.jpg', 0, NULL, 11, 0, NULL, NULL),
(57, NULL, '17025129.jpg', 0, NULL, 11, 0, NULL, NULL),
(58, NULL, '17025748.jpg', 0, NULL, 11, 0, NULL, NULL),
(61, NULL, '44028616.jpg', 0, NULL, 11, 0, NULL, NULL),
(62, NULL, '20150713005215-0fff3813.jpg', 0, NULL, 11, 0, NULL, NULL),
(63, NULL, 'MAJASTICT-HOTEL-ROOM07.jpg', 0, NULL, 11, 0, NULL, NULL),
(64, NULL, 'MAJASTICT-HOTEL-ROOM25.jpg', 0, NULL, 11, 0, NULL, NULL),
(65, NULL, 'MAJASTICT-HOTEL-ROOM27.jpg', 0, NULL, 11, 0, NULL, NULL),
(66, NULL, 'property-detail-5.jpg', 0, NULL, 12, 0, NULL, NULL),
(68, NULL, '10_56d8969c-42ab-4d27-af3a-61f40ad0f222.jpg', 0, NULL, 10, 0, NULL, NULL),
(69, NULL, '9_photo_2018-12-02_22-15-21.jpg', 0, NULL, 9, 0, NULL, NULL),
(70, NULL, '9_photo_2018-12-02_22-15-53.jpg', 0, NULL, 9, 0, NULL, NULL),
(71, NULL, '9_photo_2018-12-02_22-15-58.jpg', 0, NULL, 9, 0, NULL, NULL),
(72, NULL, '8_photo_2018-12-02_19-20-06.jpg', 0, NULL, 8, 0, NULL, NULL),
(73, NULL, '8_photo_2018-12-02_19-20-30.jpg', 0, NULL, 8, 0, NULL, NULL),
(74, NULL, '8_photo_2018-12-02_19-20-34.jpg', 0, NULL, 8, 0, NULL, NULL),
(75, NULL, '6_photo_2018-12-02_11-28-57.jpg', 0, NULL, 6, 0, NULL, NULL),
(76, NULL, '6_photo_2018-12-02_11-29-34.jpg', 0, NULL, 6, 0, NULL, NULL),
(77, NULL, '6_photo_2018-12-02_11-29-39.jpg', 0, NULL, 6, 0, NULL, NULL),
(78, NULL, '4_4_2e36b374-bb1a-4aad-9a5d-dbb7d5a6d655.jpg', 0, NULL, 4, 0, NULL, NULL),
(79, NULL, '4_4_4f12e6eb-e1c6-4b8e-97fc-662aae412b0c.jpg', 0, NULL, 4, 0, NULL, NULL),
(80, NULL, '4_4_4308a481-5708-47c2-8c3f-cc6bcf524a97.jpg', 0, NULL, 4, 0, NULL, NULL),
(81, NULL, '4_4_5833c4d1-411e-4cdc-9ced-bbd7ab70feb8.jpg', 0, NULL, 4, 0, NULL, NULL),
(82, NULL, '4_4_b5dca027-31db-474b-a676-6c236b83e70f.jpg', 0, NULL, 4, 0, NULL, NULL),
(83, NULL, '3_3_5ffb29e2-e3c5-441d-83e8-91a3f93e1f3a.jpg', 0, NULL, 3, 0, NULL, NULL),
(84, NULL, '3_3_d2dbc898-b7e4-48e0-bdcd-25d0b022315d.jpg', 0, NULL, 3, 0, NULL, NULL),
(85, NULL, '3_3_ea907d8d-e2cb-43e1-9504-d8d9c0a4b1e2.jpg', 0, NULL, 3, 0, NULL, NULL),
(86, NULL, 'video_2018-12-02_19-39-10.mp4', 0, NULL, 8, 0, NULL, NULL),
(87, NULL, 'video_2018-12-02_19-39-10.mp4', 0, NULL, 6, 0, NULL, NULL),
(88, NULL, 'Koh-Rong-Cambodia-7.jpg', 0, NULL, 13, 0, NULL, NULL),
(89, NULL, 'photo_2018-11-12_13-24-13.jpg', 0, NULL, 13, 0, NULL, NULL),
(90, NULL, 'southwest-beach-koh-rong-island-cambodia-2.jpg', 0, NULL, 13, 0, NULL, NULL),
(91, NULL, 'the-beach-in-front-of.jpg', 0, NULL, 13, 0, NULL, NULL),
(92, NULL, '288.jpg', 0, NULL, 14, 0, NULL, NULL),
(93, NULL, '290.jpg', 0, NULL, 14, 0, NULL, NULL),
(94, NULL, '291.jpg', 0, NULL, 14, 0, NULL, NULL),
(95, NULL, '292.jpg', 0, NULL, 14, 0, NULL, NULL),
(96, NULL, '291.jpg', 0, NULL, 15, 0, NULL, NULL),
(101, NULL, 'kampot river.jpg', 0, NULL, 16, 0, NULL, NULL),
(102, NULL, '14430.jpg', 0, NULL, 17, 0, NULL, NULL),
(104, NULL, '1.jpg', 0, NULL, 20, 0, NULL, NULL),
(105, NULL, 'video-1545402102.mp4', 0, NULL, 20, 0, NULL, NULL),
(106, NULL, 'a.jpg', 0, NULL, 21, 0, NULL, NULL),
(107, NULL, 'b.jpg', 0, NULL, 21, 0, NULL, NULL),
(108, NULL, 'c.jpg', 0, NULL, 21, 0, NULL, NULL),
(109, NULL, 'd.jpg', 0, NULL, 21, 0, NULL, NULL),
(110, NULL, 'e.jpg', 0, NULL, 21, 0, NULL, NULL),
(111, NULL, 'f.jpg', 0, NULL, 21, 0, NULL, NULL),
(112, NULL, 'DSC_2792.JPG', 0, NULL, 18, 0, NULL, NULL),
(114, NULL, '24-6-15Gorgeous-beach-at-Koh-Ta-Kiev-Island.jpg', 0, NULL, 22, 0, NULL, NULL),
(115, NULL, '113340137.jpg', 0, NULL, 22, 0, NULL, NULL),
(116, NULL, 'Koh_Ta_Kiev_island_(Cambodia).jpg', 0, NULL, 22, 0, NULL, NULL),
(117, NULL, 'Koh-Ta-Kiev.jpg', 0, NULL, 22, 0, NULL, NULL),
(118, NULL, 'maxresdefault.jpg', 0, NULL, 22, 0, NULL, NULL),
(123, NULL, '14965.jpg', 0, NULL, 24, 0, NULL, NULL),
(124, NULL, '14966.jpg', 0, NULL, 24, 0, NULL, NULL),
(125, NULL, '48415733_1965246060263198_4798870120640282624_n.jpg', 0, NULL, 25, 0, NULL, NULL),
(127, NULL, '15303.jpg', 0, NULL, 26, 0, NULL, NULL),
(128, NULL, '15304.jpg', 0, NULL, 26, 0, NULL, NULL),
(129, NULL, '15305.jpg', 0, NULL, 26, 0, NULL, NULL),
(130, NULL, '15308.jpg', 0, NULL, 26, 0, NULL, NULL),
(131, NULL, '15309.jpg', 0, NULL, 26, 0, NULL, NULL),
(132, NULL, 'layout.png', 0, NULL, 27, 0, NULL, NULL),
(133, NULL, '171597649.jpg', 0, NULL, 28, 0, NULL, NULL),
(134, NULL, 'DSC_2791.JPG', 0, NULL, 18, 0, NULL, NULL),
(135, NULL, 'DSC_2790.JPG', 0, NULL, 18, 0, NULL, NULL),
(136, NULL, 'Screenshot_20181219-190848.png', 0, NULL, 29, 0, NULL, NULL),
(137, NULL, 'Screenshot_20181219-190926.png', 0, NULL, 29, 0, NULL, NULL),
(138, NULL, '1546789957349.jpg', 0, NULL, 24, 0, NULL, NULL),
(139, NULL, '01 cover.png', 0, NULL, 31, 0, NULL, NULL),
(140, NULL, '49282227_2179949945390693_5836300594607816704_o.jpg', 0, NULL, 32, 0, NULL, NULL),
(141, NULL, '28.jpg', 0, NULL, 33, 0, NULL, NULL),
(142, NULL, 'map.png', 0, NULL, 33, 0, NULL, NULL),
(143, NULL, '31.jpg', 0, NULL, 33, 0, NULL, NULL),
(144, NULL, '32.jpg', 0, NULL, 33, 0, NULL, NULL),
(145, NULL, '0001.jpg', 0, NULL, 34, 0, NULL, NULL),
(146, NULL, '0002.jpg', 0, NULL, 34, 0, NULL, NULL),
(147, NULL, '3a67c086_z.jpg', 0, NULL, 34, 0, NULL, NULL),
(148, NULL, '44db766d_z.jpg', 0, NULL, 34, 0, NULL, NULL),
(149, NULL, '127b562a_z.jpg', 0, NULL, 34, 0, NULL, NULL),
(150, NULL, '157030856.jpg', 0, NULL, 34, 0, NULL, NULL),
(151, NULL, '158859764.jpg', 0, NULL, 34, 0, NULL, NULL),
(152, NULL, '158859798.jpg', 0, NULL, 34, 0, NULL, NULL),
(153, NULL, '159516834.jpg', 0, NULL, 34, 0, NULL, NULL),
(154, NULL, 'b3ae7b47_z.jpg', 0, NULL, 34, 0, NULL, NULL),
(155, NULL, '45614048_295511947732258_5683038191343370240_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(156, NULL, '45626272_350019795734055_28620330620682240_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(157, NULL, '45643528_773873016280912_6050151818049093632_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(158, NULL, '45651777_308727976401752_4825507898652098560_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(159, NULL, '45654764_1949410082032083_7433243282928304128_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(160, NULL, '45659943_261148827933376_2622879941473075200_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(161, NULL, '45699856_169022257386221_1361281560820580352_n.jpg', 0, NULL, 35, 0, NULL, NULL),
(162, NULL, 'road.png', 0, NULL, 20, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllayout`
--

CREATE TABLE `tbllayout` (
  `layout_id` int(11) NOT NULL,
  `layout_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbllocation` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_active` int(1) NOT NULL,
  `location_name_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tblmenus` (
  `menu_id` int(11) NOT NULL,
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
  `menu_type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmenus`
--

INSERT INTO `tblmenus` (`menu_id`, `menu_name`, `description`, `lineage`, `parentid`, `level`, `order`, `is_active`, `created_date`, `created_by`, `layout_id`, `modified_by`, `modified_date`, `menu_name_kh`, `article_id`, `location_id`, `menu_type`) VALUES
(98, 'contact us', NULL, '98', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'contact us', 0, 17, '19'),
(99, 'Hotel and Resort', NULL, '92-99', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Hotel and Resort', 0, 17, '17'),
(92, 'properties', NULL, '92', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'properties', 0, 17, '17'),
(97, 'about us', NULL, '97', 0, 0, 1, 1, NULL, NULL, 1, NULL, NULL, 'about us', 0, 17, '18'),
(100, 'Villa', NULL, '92-100', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Villa', 0, 17, '17'),
(101, 'Condo', NULL, '92-101', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Condo', 0, 17, '17'),
(102, 'Flat', NULL, '92-102', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Flat', 0, 17, '17'),
(103, 'Land', NULL, '92-103', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Land', 0, 17, '17'),
(104, 'Commercial Unit', NULL, '92-104', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Commercial Unit', 0, 17, '17'),
(105, 'Office Space', NULL, '92-105', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Office Space', 0, 17, '17'),
(106, 'Warehouse', NULL, '92-106', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Warehouse', 0, 17, '17'),
(107, 'Agriculture Land', NULL, '92-107', 92, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 'Agriculture Land', 0, 17, '17');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `menu_id` int(11) NOT NULL,
  `content_desc` text CHARACTER SET utf8 NOT NULL,
  `content_bottom` text NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblproperty`
--

CREATE TABLE `tblproperty` (
  `pid` int(10) NOT NULL,
  `type_id` int(10) DEFAULT NULL,
  `agent_id` int(10) DEFAULT NULL,
  `lp_id` int(10) DEFAULT NULL,
  `property_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `story` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `p_type` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `floor` int(10) DEFAULT NULL,
  `landsize` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `housesize` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `direction` varchar(250) DEFAULT NULL,
  `bedroom` varchar(150) DEFAULT NULL,
  `bathroom` varchar(150) DEFAULT NULL,
  `livingroom` int(10) DEFAULT NULL,
  `kitchen` varchar(150) DEFAULT NULL,
  `dinning_room` varchar(150) DEFAULT NULL,
  `furniture` varchar(50) DEFAULT NULL,
  `air_conditional` varchar(50) DEFAULT NULL,
  `parking` int(10) DEFAULT NULL,
  `pool` varchar(50) DEFAULT NULL,
  `gym` varchar(10) DEFAULT NULL,
  `steamandsouna` varchar(50) DEFAULT NULL,
  `garden` varchar(50) DEFAULT NULL,
  `balcony` varchar(50) DEFAULT NULL,
  `terrace` varchar(50) DEFAULT NULL,
  `elevator` varchar(50) DEFAULT NULL,
  `stairs` varchar(50) DEFAULT NULL,
  `img_source` text,
  `contract` int(10) DEFAULT NULL,
  `commision` varchar(50) DEFAULT NULL,
  `urgent` int(1) NOT NULL,
  `address` text,
  `advantage` text,
  `contact_owner` varchar(50) DEFAULT NULL,
  `ownername` varchar(150) DEFAULT NULL,
  `remark` text,
  `email_owner` varchar(250) DEFAULT NULL,
  `service_provided` varchar(250) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_kh` text CHARACTER SET utf8 NOT NULL,
  `p_status` int(1) DEFAULT NULL,
  `available` int(1) NOT NULL,
  `p_location` varchar(250) DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `end_date` date NOT NULL,
  `title` int(10) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longtitude` varchar(250) NOT NULL,
  `create_date` date DEFAULT NULL,
  `hit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproperty`
--

INSERT INTO `tblproperty` (`pid`, `type_id`, `agent_id`, `lp_id`, `property_name`, `price`, `story`, `p_type`, `floor`, `landsize`, `housesize`, `direction`, `bedroom`, `bathroom`, `livingroom`, `kitchen`, `dinning_room`, `furniture`, `air_conditional`, `parking`, `pool`, `gym`, `steamandsouna`, `garden`, `balcony`, `terrace`, `elevator`, `stairs`, `img_source`, `contract`, `commision`, `urgent`, `address`, `advantage`, `contact_owner`, `ownername`, `remark`, `email_owner`, `service_provided`, `description`, `description_kh`, `p_status`, `available`, `p_location`, `add_date`, `end_date`, `title`, `latitude`, `longtitude`, `create_date`, `hit`) VALUES
(1, 0, 4, 40, 'Poolside character home on a wide 422sqm', 358000, '', '1', 0, '', '450', '', '3', '3', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, 'ss', 0, 'Ferris Park, Jersey City Land in Sales', '', 'ss', 's', NULL, 's', '', '', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '', '', '0000-00-00', 0),
(2, 0, 4, 51, 'Poolside2 character home on a wide 423sqm', 358000, '', '2', 0, '', '470', '', '3', '3', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, 'df', 0, 'Ferris Park, Jersey City Land in Sales', '', 'df', 'df', NULL, 'df', '', 'Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nVivamus quis dui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in vulputate non, tristique eu mi. Aliquam tristique dapibus tempor. Vivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis bibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum porta sit amet, iaculis in neque.', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '1', '1', '0000-00-00', 0),
(3, 2, 4, 0, 'Resort for Sale', 1000000, '', '1', 2018, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '2', 1, '207', '', 'Vireak', 'MUTH VIREAK', NULL, 'vireak.cambodia@gmail.com', '', '<p>\n	Nice Resort for Sale</p>\n', '', 0, 1, NULL, '0000-00-00', '0000-00-00', 0, '', '', '2018-12-09', 1),
(4, 11, 4, 41, 'Land In Kampot for Sale (2000 ha)', 5000, '', '1', 2018, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 1, '3', 1, 'Kampot', '', '012', 'MUTH VIREAK', NULL, 'vireak.cambodia@gmail.com', '', '<p>\n	Agriculture land In Kampot for Sale</p>\n', '', 1, 1, NULL, '0000-00-00', '0000-00-00', 0, '', '', '2018-12-09', 11),
(5, 3, 4, 0, 'test', 1243445, '', '1', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, '', '', '', '', NULL, '', '', '', '', 0, 1, NULL, '2018-12-01', '2018-12-01', 0, '', '', '0000-00-00', 0),
(6, 5, 1499, 51, 'Land for Sale in Prek Eng', 690000, '', '1', 0, '', '3000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Land in Prek Eng for Sale, Near Tiger Beer Factory', '', '093 633687', 'MUTH VIREAK', NULL, 'vireak.cambodia@gmail.com', '', '<p>\n	Land in Prek Eng for Sale, Near Tiger Beer Factory Size: 30x100 m Asking Price: 690000 USD.</p>\n', '', 1, 1, NULL, '2018-12-02', '2018-12-02', 2, '11.495009699999999', '104.9870607', '2019-01-03', 47),
(7, 2, 4, 0, 'Poolside2 character home on a wide 423sqm', 0, '', '1', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, '', '', '', '', NULL, '', '', '', '', 0, 1, NULL, '2018-12-02', '2018-12-02', 0, '', '', '0000-00-00', 0),
(8, 5, 1499, 61, 'Land in Veal Sbov for sale 40x55m', 660000, '', '1', 0, '', '2200', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Veal Sbov, Chbar Ampov, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Dear All,</p>\n<p>\n	Great Location land for sale in Veal Sbov. It is very close to Borey Peng Huoth Beng Snor.<br />\n	Please find the below link for the location. https://fams.app/shared/1543753154243/B1C3yL1fTh2kLhJDvYwE6</p>\n', '', 1, 1, NULL, '2018-12-02', '2018-12-02', 2, '11.526292999999999', '104.971525', '2018-12-09', 82),
(9, 11, 4, 64, '1200 ha land for sale in Sihanouk Villes', 6000, '', '1', 0, '', '1200000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'National road 4, Kampong Sila, Sihanouk Villes', '', '', '', NULL, '', '', '<p>\n	Dear All,</p>\n<p>\n	Land for Sale in Sihanouk Villes 1200 ha, on National road 4.</p>\n', '', 1, 1, NULL, '2018-12-02', '2018-12-02', 2, '11.064875205427777', '103.85890943896482', '2018-12-09', 10),
(10, 11, 1499, 65, '3000 ha land in Koh Kong for Sale', 2700, '', '1', 0, '', '30000000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Kong', '', '', '', NULL, '', '', '<p>\n	Dear All,</p>\n<p>\n	Good land for agriculture purpose or resort development in Koh Kong Province.</p>\n<p>\n	Size: 3000 ha</p>\n<p>\n	Price: 2700 USD per hectare.</p>\n<p>\n	Good opportunity for investment.</p>\n', '', 1, 1, NULL, '2018-12-09', '2018-12-09', 0, '11.279763934530031', '103.78475172412107', '2018-12-09', 11),
(11, 1, 4, 43, '101 Room Hotel for Sale in Siem Reap', 8000000, '', '0', 0, '', '3720', '', '101', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Siem Reap', '', '', '', NULL, '', '', '<div>\n	Hotel in Siem Reap for Sale:</div>\n<div>\n	&nbsp;</div>\n<div id=\"cke_pastebin\">\n	- Room: 102</div>\n<div id=\"cke_pastebin\">\n	- Price:&nbsp; 8 Million</div>\n<div id=\"cke_pastebin\">\n	- Land Size: 30m x 124m</div>\n<div id=\"cke_pastebin\">\n	- Hotel/Building Size: 30m x 60m</div>\n<div id=\"cke_pastebin\">\n	- Car Parking Space: 30m x 25m</div>\n<div id=\"cke_pastebin\">\n	- Number of Floor: 5&nbsp;</div>\n<div id=\"cke_pastebin\">\n	- Location: Siem Reap province</div>\n', '', 1, 1, NULL, '2018-12-09', '2018-12-09', 2, '13.362565064609367', '103.85650617968747', '2018-12-09', 14),
(12, 2, 4, 40, 'test', 3435345, '', '1', 0, '', '123', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, '', '', '', '', NULL, '', '', '', '', 0, 1, NULL, '2018-12-09', '2018-12-09', 0, '', '', '2018-12-09', 0),
(13, 5, 4, 85, '20ha Koh Rong Land for Sale', 60, '', '1', 0, '', '200000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Rong, Sihanouk Villes', '', '', '', NULL, '', '', '<p>\n	Good land for investment in Koh Rong.</p>\n<p>\n	Good for resort and development. Beach Front.</p>\n', '', 1, 1, NULL, '2018-12-09', '2018-12-09', 0, '10.708177443600537', '103.25740797412107', '2018-12-09', 14),
(14, 5, 4, 41, 'Sea Front Property in Kep', 150, '', '1', 0, '', '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Kep', '', '', '', NULL, '', '', '<p>\n	Great location land for sale in Kep. Sea front property in the best location.</p>\n<p>\n	Price: 150 USD per m2</p>\n', '', 1, 1, NULL, '2018-12-10', '2018-12-10', 0, '10.485111398956327', '104.28909284960935', '2018-12-10', 16),
(15, 5, 1499, 42, '833 hectares sea front land in Sihanouk Villes for Sale', 16, '', '0', 0, '', '8330000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Prey Nob, Sihanouk Villes', '', '', '', NULL, '', '', '<p>\n	Good land for investment in Sihanouk Villes.&nbsp;<br />\n	It is sea front property, best for resort or any development.</p>\n<p>\n	Asking Price: 16 USD per m2.</p>\n', '', 1, 1, NULL, '2018-12-10', '2018-12-10', 0, '10.58940908797425', '103.86714918505857', '2018-12-10', 15),
(16, 5, 1501, 41, 'Land in Steng Keo River for Sale, Kampot', 30000, '', '1', 0, '', '1700', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Kampot', '', '', '', NULL, '', '', '<p>\n	Good land near Steng Keo river for sale for holiday house or resort.</p>\n', '', 1, 1, NULL, '2018-12-18', '2018-12-18', 0, '10.680809157997352', '104.15867311846921', '2018-12-18', 15),
(17, 5, 4, 0, 'Land for Sale next AEON 1', 6700, '', '1', 0, '', '14083', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Pich, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Great location land near AEON Mall 1 for Sale</p>\n<p>\n	Size: 14083 m2</p>\n<p>\n	Price: 6700 USD/m2</p>\n', '', 1, 1, NULL, '2018-12-19', '2018-12-19', 0, '11.548858', '104.935521', '2018-12-19', 16),
(18, 5, 4, 57, '5ha - 13ha Urgent land for sale in Chamkar Dong - Below market price', 100, '', '1', 0, '', '50000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Chamkar Doung, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Good opportunities to buy land below market for great profit.</p>\n<p>\n	Location: Chamkar Doung, Phnom Penh. Property is best along the main concret road and corner to another govenment road.</p>\n<p>\n	Size: 5 hectares</p>\n<p>\n	Price: 100 USD per m2&nbsp;</p>\n<p>\n	Note: price is below market price.&nbsp;</p>\n<p>\n	Good to develop the place to be Borey. It is near Borey VIP.</p>\n', '', 1, 1, NULL, '2018-12-20', '2018-12-20', 0, '11.465967', '104.847610 ', '2019-01-04', 121),
(19, 5, 1502, 55, 'Land in Chba Ampov for sale in urgent', 210000, '', '0', 0, '', '600', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'PP', '', '', '', NULL, '', '', '<p>\n	for sale</p>\n', '', 1, 1, NULL, '2018-12-22', '2018-12-22', 0, '11.535099160049281', '104.94009716787912', '2018-12-22', 12),
(20, 11, 4, 43, '10ha and 60ha land in Siem Reap for Sale', 3000, '', '1', 0, '', '100000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Siem Reap', '', '', '', NULL, '', '', '<p>\n	Land in Siem Reap, Kbal Spien for Sale urgent.</p>\n<p>\n	Good price for investment. Hot development area.</p>\n<p>\n	Size: 10 ha and 60ha, 300 meter from national road.</p>\n<p>\n	Asking Price: 3000 USD/hectare</p>\n', '', 1, 1, NULL, '2018-12-22', '2018-12-22', 0, '13.880412767522412', '104.06833631884763', '2018-12-22', 44),
(21, 5, 4, 40, '​ដីត្រូវការលក់ប្រញាប់ជិតបុរីសន្តិភាព2និងផ្សារទួលពង្រ ក្រុងភ្នំពេញ', 164000, '', '1', 0, '', '1903', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, '', '', '', '', NULL, '', '', '<p>\n	&nbsp;<span 20x100m=\"\" apple=\"\" color=\"\" font-size:=\"\" helvetica=\"\" noto=\"\" segoe=\"\" span=\"\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, system-ui, \" ui=\"\">-ស្ថានភាពទីតាំងល្អ ស្ថិតនៅជិតបុរី ជិតផ្សារសុភមង្គលនិងផ្សារបុរីសន្តិភាព២ ក្នុងក្រុង ទីប្រជុំជន មានការអភិវឌ្ឍន៏ ស្ថិតនៅជិតបុរីជាច្រើនព័ទ្ធជំវិញ មានបណ្តាញទឹករដ្ឋ ភ្លើងរដ្ឋ។</span><br apple=\"\" color=\"\" font-size:=\"\" helvetica=\"\" noto=\"\" segoe=\"\" span=\"\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, system-ui, \" ui=\"\" />\n	-លោកអ្នកអាចយកធ្វើផ្ទះ ឃ្លាំង ពុះដីទ្បូដ៏ សាងផ្ទះល្វែង ទៅតាមតំរូវការរបស់លោកអ្នក។</p>\n', '', 1, 1, NULL, '2018-12-22', '2018-12-22', 0, '11.492305187391187', '104.83411772143552', '2018-12-22', 36),
(22, 5, 1499, 42, '300 ha land in Koh Takiev for Sale', 33000000, '', '1', 0, '', '30000000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Takiev, Sihanouk Villes', '', '', '', NULL, '', '', '<p>\n	Great land for investment in Koh Takie.&nbsp;</p>\n<p>\n	Size: 300 hectare, Beach Front Property</p>\n<p>\n	Price: 33,000,000 usd.</p>\n<p>\n	Title: Hard Title</p>\n', '', 1, 1, NULL, '2018-12-27', '2018-12-27', 0, '10.48612416738749', '103.594550918457', '2018-12-27', 36),
(23, 5, 1503, 40, 'Land in beng tumpon for sale', 700, '', '1', 0, '', '1500', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, '', '', '', '', NULL, '', '', '<p>\n	Size: 30x50m</p>\n', '', 1, 1, NULL, '2018-12-27', '2018-12-27', 0, '11.512659049976769', '104.90261061083982', '2018-12-27', 11),
(24, 5, 4, 0, '2130 m2 land in Diamond Island (Koh Pich) For Sale', 6700, '', '1', 0, '', '2130', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Pich, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Land in Koh Pich For Sale</p>\n<p>\n	Size: 2130 m2</p>\n<p>\n	Price: 6700 USD/m2</p>\n<p>\n	Location: Koh Pich (Diamond Island) Top Property Investment Area.</p>', '', 1, 1, NULL, '2018-12-28', '2018-12-28', 0, '11.549284', '104.938205 ', '2019-01-06', 23),
(25, 5, 1499, 86, '2 hectare land in Koh Pich For Sale', 7500, '', '1', 0, '', '20000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Koh Pich, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Hot Property Development land in Phnom Penh For Sale</p>\n<p>\n	Size: 2 hectares</p>\n<p>\n	Price: 7500 USD/m2</p>\n<p>\n	Location: Koh Pich, Phnom Penh, next to Bassac River.</p>\n', '', 1, 1, NULL, '2018-12-28', '2018-12-28', 0, '11.543018892477798', '104.93447525393674', '2018-12-28', 21),
(26, 11, 4, 102, '4000 ha land in Kampot for Sale', 4300, '', '1', 0, '', '40000000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Chhouk, Kampot', '', '', '', NULL, '', '', '<p>\n	Agriculture hectares of land for sale in Kampot</p>\n<p>\n	Size: 4000 hectares</p>\n<p>\n	Price: 4300 USD per hectares</p>\n<p>\n	Title: Hard Title</p>\n', '', 1, 1, NULL, '2018-12-30', '2018-12-30', 0, '10.941708', '104.214173', '2018-12-30', 33),
(27, 5, 4, 40, '8 hectares land in Areysat, Lvea Aem', 22, '', '1', 0, '', '83853', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Lvea Aem, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	Land in Areysat, Lvea Aem for Sale</p>\n<p>\n	Good location, near large property development.</p>\n<p>\n	Size:&nbsp;83853 m2 (8.3 hectares)</p>\n<p>\n	Price: 22 USD per m2</p>\n', '', 1, 1, NULL, '2018-12-30', '2018-12-30', 0, '11.534406', '105.090373', '2018-12-30', 11),
(28, 1, 1499, 43, '30 rooms hotel in Siem Reap for Sale', 1600000, '', '1', 0, '', '', '', '30', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Siem Reap', '', '', '', NULL, '', '', '<p>\n	<span style=\"font-size:14px;\"><span style=\"font-family:arial;\"><code><tt>Hotel for Sale in Center of the Siem Reap City, 5 minutes walk to Night Market and Pub Street.</tt></code></span></span></p>\n<p>\n	<span style=\"font-size:14px;\"><span style=\"font-family:arial;\"><code><tt>Number of Room: 30 Rooms</tt></code></span></span></p>\n<p>\n	<span style=\"font-size:14px;\"><span style=\"font-family:arial;\"><code><tt>Price: 1,600,000 USD.</tt></code></span></span></p>\n<p>\n	<span style=\"font-size:14px;\"><span style=\"font-family:arial;\"><code><tt><span style=\"color: rgb(33, 37, 41);\">Annual occupancy rate 75%-80%. More than 90% when high season.</span><br style=\"box-sizing: border-box; color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, &quot;helvetica neue&quot;, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;, &quot;noto color emoji&quot;, hanuman; font-size: 15px;\" />\n	<br />\n	</tt></code></span></span></p>\n', '', 1, 1, NULL, '2019-01-02', '2019-01-02', 0, '13.35922476141687', '103.85684950244138', '2019-01-02', 26),
(29, 2, 1506, 40, 'aa', 234, NULL, '1', NULL, NULL, '234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, NULL, NULL, '0000-00-00', 0, '', '', '2019-01-17', 3),
(30, 2, 1507, 101, 'testin', 234, NULL, '1', NULL, NULL, '234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>\n	34234</p>\n', '', 0, 0, NULL, NULL, '0000-00-00', 0, '', '', '2019-01-07', 0),
(31, 2, 1507, 101, 'testin', 234, NULL, '1', NULL, NULL, '234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>\n	34234</p>\n', '', 0, 0, NULL, NULL, '0000-00-00', 0, '', '', '2019-01-07', 0),
(32, 11, 1501, 41, '35 hectares of plantation for sale in Kampot', 330000, '', '1', 0, '', '350000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Chhouk, Kampot', '', '', '', NULL, '', '', '<p>\n	35 hectares of plantation in Kampot for Sale.</p>\n<p>\n	Price: 330000 USD.</p>\n<p>\n	Title: Hard Title</p>', '', 1, 1, NULL, '2019-01-07', '2019-01-07', 0, '11.063780146571533', '104.24291593920896', '2019-01-07', 12),
(33, 5, 4, 54, '5 hectares of land for sale in Krang Thnong ,Sen Sok', 350, '', '1', 0, '', '50000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Sen Sok, Phnom Penh', '', '', '', NULL, '', '', '<p>\n	5 hectare land for sale in Krang Thnong, Sen Sok for sale.</p>\n<p>\n	It is on the main road, good location for borey and other investment.</p>\n<p>\n	Price: 350 USD per m2</p>\n<p>\n	Title: Hard Title</p>\n', '', 1, 1, NULL, '2019-01-07', '2019-01-07', 0, '11.589114', '104.838752', '2019-01-07', 27),
(34, 1, 4, 43, '20 rooms hotel for sale in Siem Reap', 1200000, '', '1', 0, '', '', '', '20', '', 0, '', '', '', '', 0, '1', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Siem Reap', '', '', '', NULL, '', '', '<p>\n	20 room hotels for sale in Siem Reap.</p>\n<p>\n	Good location, closed to night market.</p>\n<p>\n	Price: 1,200,000 USD.</p>\n', '', 1, 1, NULL, '2019-01-10', '2019-01-10', 0, '13.357888627190055', '103.85684950244138', '2019-01-10', 29),
(35, 6, 4, 45, 'Factory For Sale in Kandal Province', 15000000, '', '1', 0, '', '200000', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 0, '', 1, 'Kandal Province', '', '', '', NULL, '', '', '<p>\n	Factory for Sale with existing production and customer</p>\n<p>\n	Size: 20 hectares</p>\n<p>\n	Price: 15,000,000 USD.</p>\n<p>\n	Location: Kandal Province.</p>\n', '', 1, 1, NULL, '2019-01-11', '2019-01-11', 0, '11.8880358', '104.7192607', '2019-01-11', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tblpropertylocation`
--

CREATE TABLE `tblpropertylocation` (
  `propertylocationid` int(10) NOT NULL,
  `locationname` varchar(250) NOT NULL,
  `lineage` varchar(250) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `level` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpropertylocation`
--

INSERT INTO `tblpropertylocation` (`propertylocationid`, `locationname`, `lineage`, `parent_id`, `level`, `note`, `status`) VALUES
(40, 'Phnom Penh', '40', 0, 0, '', 1),
(41, 'Kampot', '41', 0, 0, '', 1),
(42, 'Sihanouk Villes', '42', 0, 0, '', 1),
(43, 'Siem Reap', '43', 0, 0, '', 1),
(44, 'Kampong Speu', '44', 0, 0, '', 1),
(45, 'Kandal', '45', 0, 0, '', 1),
(51, 'Khan Chamkarmon', '40-51', 40, 1, '', 1),
(53, 'Beng Keng Kang 2', '40-51-53', 51, 2, '', 1),
(54, 'Khan Sen Sok', '40-54', 40, 1, '', 1),
(55, 'Khan Chbar Ampov', '40-55', 40, 1, '', 1),
(56, 'Khan Russey Keo', '40-56', 40, 1, '', 1),
(57, 'Khan Mean Chey', '40-57', 40, 1, '', 1),
(58, 'Khan 7Makara', '40-58', 40, 1, '', 1),
(59, 'Khan Por SenChey', '40-59', 40, 1, '', 1),
(60, 'Prek Pra', '40-55-60', 55, 2, '', 1),
(61, 'Veal Sbov', '40-55-61', 55, 2, '', 1),
(62, 'Prek Eng', '40-55-62', 55, 2, '', 1),
(63, 'Kien Svay', '40-55-63', 55, 2, '', 1),
(64, 'Kampong Sila', '42-64', 42, 1, '', 1),
(65, 'Koh Kong Province', '65', 0, 0, '', 1),
(66, 'Kampong Chnang Province', '66', 0, 0, '', 1),
(67, 'Banteay Mean Chey Province', '67', 0, 0, '', 1),
(68, 'Khan Toul Kork', '40-68', 40, 1, '', 1),
(69, 'Khan Dang Kor', '40-69', 40, 1, '', 1),
(70, 'Khan Chroy Chang Va', '40-70', 40, 1, '', 1),
(71, 'Khan Prek Phnov', '40-71', 40, 1, '', 1),
(72, 'Niroth', '40-55-72', 55, 2, '', 1),
(73, 'Prek Thmey', '40-55-73', 55, 2, '', 1),
(74, 'Beng Keng Kang 1', '40-51-74', 51, 2, '', 1),
(75, 'Beng Keng Kang 3', '40-51-75', 51, 2, '', 1),
(76, 'Tonle Basak', '40-51-76', 51, 2, '', 1),
(77, 'Boeng Trabek', '40-51-77', 51, 2, '', 1),
(78, 'Tumnup Tuk', '40-51-78', 51, 2, '', 1),
(79, 'Phsar Doeum Thkov', '40-51-79', 51, 2, '', 1),
(80, 'Toul Svay Prey 1', '40-51-80', 51, 2, '', 1),
(81, 'Toul Svay Prey 2', '40-51-81', 51, 2, '', 1),
(82, 'Toul Tum Poung 1', '40-51-82', 51, 2, '', 1),
(83, 'Toul Tum Poung 2', '40-51-83', 51, 2, '', 1),
(84, 'Olympic', '40-51-84', 51, 2, '', 1),
(85, 'Koh Rong', '42-85', 42, 1, '', 1),
(86, 'Khan Doun Penh', '40-86', 40, 1, '', 1),
(87, 'Preah Vihea Province', '87', 0, 0, '', 1),
(88, 'Takeo Province', '88', 0, 0, '', 1),
(89, 'Kampong Thom Province', '89', 0, 0, '', 1),
(90, 'Prey Veng Province', '90', 0, 0, '', 1),
(91, 'Svay Rieng Province', '91', 0, 0, '', 1),
(92, 'Kep Province', '92', 0, 0, '', 1),
(93, 'Battambang Province', '93', 0, 0, '', 1),
(94, 'Kratie', '94', 0, 0, '', 1),
(95, 'Steng Treng', '95', 0, 0, '', 1),
(96, 'Ratanak Kiri', '96', 0, 0, '', 1),
(97, 'Mondul Kiri', '97', 0, 0, '', 1),
(98, 'Kampong Cham', '98', 0, 0, '', 1),
(99, 'Pursat Province', '99', 0, 0, '', 1),
(100, 'Pailin Province', '100', 0, 0, '', 1),
(101, 'Thbong Khmom Province', '101', 0, 0, '', 1),
(102, 'Chhouk District', '41-102', 41, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpropertytype`
--

CREATE TABLE `tblpropertytype` (
  `typeid` int(10) NOT NULL,
  `menu` int(10) NOT NULL,
  `typename` varchar(250) DEFAULT NULL,
  `type_note` text,
  `type_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpropertytype`
--

INSERT INTO `tblpropertytype` (`typeid`, `menu`, `typename`, `type_note`, `type_status`) VALUES
(1, 99, 'Hotel and Resort', '', 1),
(2, 100, 'Villa', 'new for villar', 1),
(3, 101, 'Condo', 'condo', 1),
(4, 102, 'Flat', 'flat', 1),
(5, 103, 'Land', 'land', 1),
(6, 104, 'Commercial Unit', '', 1),
(7, 105, 'Office Space', '', 1),
(8, 106, 'Warehouse', '', 1),
(11, 107, 'Agriculture Land', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_blog`
--

CREATE TABLE `z_blog` (
  `site_show_blogid` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `z_currency` (
  `curid` int(11) NOT NULL,
  `currcode` varchar(255) DEFAULT NULL,
  `curr_name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `ex_rate` double DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_currency`
--

INSERT INTO `z_currency` (`curid`, `currcode`, `curr_name`, `symbol`, `is_default`, `ex_rate`, `country`) VALUES
(1, 'USD', 'US Dollars', '$', 1, 1, 'US');

-- --------------------------------------------------------

--
-- Table structure for table `z_module`
--

CREATE TABLE `z_module` (
  `moduleid` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `sort_mod` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `mod_position` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `z_page` (
  `pageid` int(11) NOT NULL,
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
  `alias` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(63, 'Menu List', 'menu/index', 7, 10, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:23:24', 1, 'fa-bars', NULL),
(64, 'Add New Menu', 'menu/add', 7, 11, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:23:08', 1, 'fa-bars', NULL),
(65, 'Article List', 'article/index', 11, 4, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:46:23', 1, 'fa-bars', NULL),
(66, 'Add New Article', 'article/add', 11, 5, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:47:08', 1, 'fa-bars', NULL),
(67, 'Product List', 'product/index', 10, 1, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:07', 1, 'fa-bars', NULL),
(68, 'Add New Products', 'product/add', 10, 2, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:46', 1, 'fa-bars', NULL),
(69, 'Banner List', 'setup/setupads/index', 12, 0, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:16:13', 1, 'fa-bars', NULL),
(70, 'Add New Banner', 'setup/setupads/add', 12, 1, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:15:42', 1, 'fa-bars', NULL),
(71, 'Contact List', 'article/contact_list', 13, 0, 1, 1, 1, 1, 1, 1, 1, '2015-09-15 14:32:25', 0, 'fa-bars', NULL),
(75, 'Add New Location', 'category/add', 7, 12, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:22:38', 1, 'fa-bars', NULL),
(76, 'Location List', 'category/index', 7, 13, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:22:54', 1, 'fa-bars', NULL),
(77, 'Module', 'setting/module', 1, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-17 11:53:41', 0, 'fa-bars', NULL),
(78, 'Add New Property', 'property/property/add', 18, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 04:36:42', 1, 'fa-bars', NULL),
(79, 'Property List', 'property/property/index', 18, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 04:36:26', 1, 'fa-bars', NULL),
(80, 'Add New Property Category', 'property/propertytype/add', 19, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-20 02:26:36', 1, 'fa-bars', NULL),
(81, 'Property Category Lists', 'property/propertytype/index', 19, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-20 02:26:15', 1, 'fa-bars', NULL),
(82, 'Property Location', 'property/propertylocation/add', 20, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 06:14:32', 1, 'fa-bars', NULL),
(83, 'Property Location List', 'property/propertylocation/index', 20, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-18 06:01:53', 1, 'fa-bars', NULL),
(84, 'Site Profile', 'site-profile', 1, 1, 0, 0, 0, 0, 0, 0, 1, '2018-12-28 09:17:49', 1, 'fa-bars', NULL),
(85, 'Dashboard', 'sys/dashboard', 13, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-09 02:54:49', 1, 'fa-bars', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_role`
--

CREATE TABLE `z_role` (
  `roleid` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(23, 'user', NULL, 1),
(24, 'Property Agent', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_role_module_detail`
--

CREATE TABLE `z_role_module_detail` (
  `mod_rol_id` int(11) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_role_module_detail`
--

INSERT INTO `z_role_module_detail` (`mod_rol_id`, `roleid`, `moduleid`, `order`) VALUES
(127, 1, 19, NULL),
(126, 1, 18, NULL),
(125, 1, 13, NULL),
(124, 1, 12, NULL),
(123, 1, 11, NULL),
(122, 1, 7, NULL),
(121, 1, 1, NULL),
(118, 23, 7, NULL),
(119, 23, 18, NULL),
(120, 24, 18, NULL),
(128, 1, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_role_page`
--

CREATE TABLE `z_role_page` (
  `role_page_id` int(11) NOT NULL,
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
  `is_import` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(43, 24, 78, 18, '2018-12-02 11:56:50', '1', 1, 1, 1, 1, 0, 0, 0),
(44, 24, 79, 18, '2018-12-28 09:08:30', '1', 1, 1, 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `dashboard_item`
--
ALTER TABLE `dashboard_item`
  ADD PRIMARY KEY (`dashid`);

--
-- Indexes for table `site_profile`
--
ALTER TABLE `site_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblarticle`
--
ALTER TABLE `tblarticle`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbllayout`
--
ALTER TABLE `tbllayout`
  ADD PRIMARY KEY (`layout_id`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tblmenus`
--
ALTER TABLE `tblmenus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblproperty`
--
ALTER TABLE `tblproperty`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpropertylocation`
--
ALTER TABLE `tblpropertylocation`
  ADD PRIMARY KEY (`propertylocationid`);

--
-- Indexes for table `tblpropertytype`
--
ALTER TABLE `tblpropertytype`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `z_blog`
--
ALTER TABLE `z_blog`
  ADD PRIMARY KEY (`site_show_blogid`);

--
-- Indexes for table `z_currency`
--
ALTER TABLE `z_currency`
  ADD PRIMARY KEY (`curid`);

--
-- Indexes for table `z_module`
--
ALTER TABLE `z_module`
  ADD PRIMARY KEY (`moduleid`);

--
-- Indexes for table `z_page`
--
ALTER TABLE `z_page`
  ADD PRIMARY KEY (`pageid`);

--
-- Indexes for table `z_role`
--
ALTER TABLE `z_role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `z_role_module_detail`
--
ALTER TABLE `z_role_module_detail`
  ADD PRIMARY KEY (`mod_rol_id`);

--
-- Indexes for table `z_role_page`
--
ALTER TABLE `z_role_page`
  ADD PRIMARY KEY (`role_page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1510;

--
-- AUTO_INCREMENT for table `dashboard_item`
--
ALTER TABLE `dashboard_item`
  MODIFY `dashid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_profile`
--
ALTER TABLE `site_profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tbllayout`
--
ALTER TABLE `tbllayout`
  MODIFY `layout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblmenus`
--
ALTER TABLE `tblmenus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproperty`
--
ALTER TABLE `tblproperty`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblpropertylocation`
--
ALTER TABLE `tblpropertylocation`
  MODIFY `propertylocationid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tblpropertytype`
--
ALTER TABLE `tblpropertytype`
  MODIFY `typeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `z_blog`
--
ALTER TABLE `z_blog`
  MODIFY `site_show_blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `z_currency`
--
ALTER TABLE `z_currency`
  MODIFY `curid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `z_module`
--
ALTER TABLE `z_module`
  MODIFY `moduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `z_page`
--
ALTER TABLE `z_page`
  MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `z_role`
--
ALTER TABLE `z_role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `z_role_module_detail`
--
ALTER TABLE `z_role_module_detail`
  MODIFY `mod_rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `z_role_page`
--
ALTER TABLE `z_role_page`
  MODIFY `role_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
