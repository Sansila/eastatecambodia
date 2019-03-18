-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2019 at 03:53 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms_admin_db`
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
  `business` varchar(250) DEFAULT NULL,
  `set_time` varchar(150) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1511 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userid`, `user_name`, `password`, `email`, `gender`, `dob`, `phone`, `address`, `last_visit`, `last_visit_ip`, `created_date`, `created_by`, `modified_by`, `modified_date`, `roleid`, `last_name`, `first_name`, `is_admin`, `is_active`, `def_storeid`, `type_post`, `remark`, `business`, `set_time`) VALUES
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', '', '2019-01-04', '', '', '2019-03-05 15:57:55', '::1', '2015-01-29 15:10:34', NULL, NULL, NULL, 1, 'System', 'Administrator', 1, 1, NULL, NULL, '', '', NULL),
(1509, 'user', '202cb962ac59075b964b07152d234b70', 'user@gmail.com', 'Male', NULL, '0961234567', '40', '2019-03-05 15:57:55', '::1', '2019-02-23 16:03:06', NULL, NULL, NULL, 25, 'user', 'user', 0, 1, NULL, NULL, NULL, NULL, NULL),
(1510, 'users', '202cb962ac59075b964b07152d234b70', 'sansila.dev@gmail.com', 'Male', NULL, '0961234567', '40', NULL, NULL, '2019-03-05 15:58:29', NULL, NULL, NULL, 25, 'san', 'sila', 0, 1, NULL, NULL, NULL, NULL, '1552047749');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('b9802e072382ac0b7c694d9fa3f5380e', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.3', 1552135404, ''),
('160cf95056623c4c2548a02b86f6def6', '::1', '', 1552135404, ''),
('7bf1ea44fb6bb79163db6dcc0fb53971', '::1', '', 1552135404, ''),
('e77ae546374c9346d4fc1ea062743da9', '::1', '', 1552135404, ''),
('45882aca2de54f9525d5b8a1e711fd12', '::1', '', 1552135404, ''),
('b5a3afaef2b2a8f9d258d0eaa03a4521', '::1', '', 1552135404, ''),
('7e1c606952297cab0b5b1546dc05dc69', '::1', '', 1552135404, ''),
('831151436bc03ddc2e477e026412ec74', '::1', '', 1552135404, ''),
('e0ede159d6ddb5c6915d01ce1ce12a92', '::1', '', 1552135404, ''),
('4618eb68725cea7ac8e3b937571c34c0', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.3', 1551961322, ''),
('f4b43d1eecfa1ac0e1f0bd87eeca4d61', '::1', '', 1551959396, ''),
('021f55875e543700f60643ad6f4a66f1', '::1', '', 1551959396, ''),
('f9a4c1a915c4e65cc4e574579293c696', '::1', '', 1551959396, ''),
('4e1e8b519fda32e6e54ef0fa3a193e6a', '::1', '', 1551959396, ''),
('8b31a4490c7bcc49c2ccbf2bd8a15053', '::1', '', 1551959396, ''),
('03431cc297e1cb1815b656be56d8a4f5', '::1', '', 1551959396, ''),
('7a58b68a0254e58815ccde35c49bb83f', '::1', '', 1551959396, ''),
('5d3dd0dd0f606babf175385d542d04a6', '::1', '', 1551959396, '');

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

CREATE TABLE `site_profile` (
  `id` int(11) unsigned NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_profile`
--

INSERT INTO `site_profile` (`id`, `site_name`, `address`, `phone`, `email`, `facebook`, `google_plus`, `youtube`, `twitter`, `linkedin`, `weixin`, `date_post`, `is_active`) VALUES
(1, '855 solution', '418Eo+E1, Phlauv 358, Sangkat Chbar Ampov, Khan Chbar Ampov , Phnom Penh.', '015 871 787 / 092 226 133', 'sila@estatecambodia.com', 'https://www.facebook.com/%E1%9E%93%E1%9E%B6%E1%9E%99%E1%9E%80%E1%9E%8A%E1%9F%92%E1%9E%8B%E1%9E%B6%E1%9E%93%E1%9E%9C%E1%9E%B7%E1%9E%91%E1%9F%92%E1%9E%99%E1%9E%BB%E1%9E%91%E1%9E%B6%E1%9E%80%E1%9F%8B%E1%9E%91%E1%9E%84-112512662798448/', 'https://plus.google.com/117575618297062468775', '', 'https://twitter.com/Kimhay98Kh', '', NULL, NULL, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`article_id`, `article_title`, `article_title_kh`, `content_kh`, `content`, `is_active`, `is_marguee`, `meta_keyword`, `meta_desc`, `location_id`, `icon`, `article_date`, `menu_id`) VALUES
(1, 'about', 'about', '', '<p>\n	&nbsp;<span style="color: rgb(81, 87, 98); font-family: museo-sans, sans-serif; font-size: 17.99px; text-align: center;">Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes</span></p>\n', 1, 1, '', '', NULL, '', '2018-12-06', 103);

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
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

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
(137, NULL, 'woman-546207_640.jpg', 0, NULL, 27, 0, NULL, NULL),
(140, NULL, 'm4.jpg', 0, NULL, 28, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllayout`
--

CREATE TABLE `tbllayout` (
  `layout_id` int(11) NOT NULL,
  `layout_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
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

CREATE TABLE `tbllocation` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_active` int(1) NOT NULL,
  `location_name_kh` varchar(255) CHARACTER SET utf8 DEFAULT NULL
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
  `p_parent` int(10) DEFAULT NULL,
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
  `pro_level` int(10) DEFAULT NULL,
  `relative_owner` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproperty`
--

INSERT INTO `tblproperty` (`pid`, `type_id`, `agent_id`, `lp_id`, `p_parent`, `property_name`, `price`, `story`, `p_type`, `floor`, `landsize`, `housesize`, `direction`, `bedroom`, `bathroom`, `livingroom`, `kitchen`, `dinning_room`, `furniture`, `air_conditional`, `parking`, `pool`, `gym`, `steamandsouna`, `garden`, `balcony`, `terrace`, `elevator`, `stairs`, `img_source`, `contract`, `commision`, `urgent`, `address`, `advantage`, `contact_owner`, `ownername`, `remark`, `email_owner`, `service_provided`, `description`, `description_kh`, `p_status`, `available`, `p_location`, `add_date`, `end_date`, `title`, `latitude`, `longtitude`, `create_date`, `hit`, `pro_level`, `relative_owner`) VALUES
(1, 0, 0, 40, 40, 'Poolside character home on a wide 422sqm', 358000, '', '1', '0', '', '450', '', '3', '3', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', NULL, '0', 'ss', 0, 'Ferris Park, Jersey City Land in Sales', '', 'ss', 's', NULL, 's', '', '', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '', '', '0000-00-00', 0, 0, 0),
(2, 0, 0, 51, 40, 'Poolside2 character home on a wide 423sqm', 358000, '', '2', '0', '', '470', '', '3', '3', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', NULL, '0', 'df', 0, 'Ferris Park, Jersey City Land in Sales', '', 'df', 'df', NULL, 'df', '', '<p>\n	<strong>Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac rutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus rhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis hendrerit mi a sollicitudin.</strong></p>\n<p>\n	Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\n<p>\n	Vivamus quis dui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in vulputate non, tristique eu mi. Aliquam tristique dapibus tempor. Vivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis bibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum porta sit amet, iaculis in neque.</p>\n', '', 0, 0, NULL, '2011-11-01', '2011-11-01', 0, '1', '1', '0000-00-00', 0, 0, 0),
(3, 5, 4, 0, NULL, 'test', 12, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 0, 0, NULL, '2018-11-27', '2018-11-27', 0, '', '', '0000-00-00', 0, 0, 0),
(4, 5, 5, 40, 40, 'new', 12, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-11-27', '2018-11-27', 0, '', '', '2018-12-31', 0, 0, 0),
(5, 5, 4, 0, NULL, 'Poolside character home on a wide 422sqm', 12324324, '', '1', '2018-11-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-11-27', '2018-11-27', 0, '', '', '2018-12-31', 15, 0, 0),
(6, 5, 4, 40, 40, 'Land for Sale in Prek Eng KK', 358000, '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '<p>\n	&nbsp;<span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">Note that headers should be sent&nbsp;</span><strong box-sizing:="" color:="" font-size:="" helvetica="" style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, " vertical-align:=""><em style="margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;">before</em></strong><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><!--?php</code--><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;as well as ending tag&nbsp;</span><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">?&gt;</code><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;in your view.</span></code></p>\n<p>\n	<code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">&nbsp;<span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">Note that headers should be sent&nbsp;</span><strong box-sizing:="" color:="" font-size:="" helvetica="" style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, " vertical-align:=""><em style="margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;">before</em></strong><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><!--?php</code--><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;as well as ending tag&nbsp;</span><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">?&gt;</code><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;in your view.</span></code></code></p>\n<p>\n	<code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">&nbsp;<span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">Note that headers should be sent&nbsp;</span><strong box-sizing:="" color:="" font-size:="" helvetica="" style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, " vertical-align:=""><em style="margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;">before</em></strong><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><!--?php</code--><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;as well as ending tag&nbsp;</span><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">?&gt;</code><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;in your view.</span></code></code></code></p>\n<p>\n	<code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">&nbsp;<span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">Note that headers should be sent&nbsp;</span><strong box-sizing:="" color:="" font-size:="" helvetica="" style="margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, " vertical-align:=""><em style="margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: inherit;">before</em></strong><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;anything else. Make sure that there is no code/html or even space/indentation before the header function and there is nothing before the first opening php tag&nbsp;</span><!--?php</code--><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:=""><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;as well as ending tag&nbsp;</span><code background-color:="" bitstream="" box-sizing:="" color:="" courier="" dejavu="" font-size:="" liberation="" lucida="" sans="" style="margin: 0px; padding: 1px 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, " vera="" vertical-align:="" white-space:="">?&gt;</code><span font-size:="" helvetica="" style="color: rgb(36, 39, 41); font-family: Arial, ">&nbsp;in your view.</span></code></code></code></code></p>\n', '', 1, 1, NULL, '2018-12-04', '2018-12-04', 0, '11.52611534067639', '104.91394026171872', '2019-02-18', 3, 2, 0),
(7, 2, 4, 51, 40, 'test', 0, '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-12-09', '2018-12-09', 0, '', '', '2019-02-11', 5, 0, 0),
(8, 6, 4, 40, 40, 'hello', 0, '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2018-12-10', '2018-12-10', 0, '', '', '2019-02-12', 0, 2, 0),
(9, 2, 4, 40, 40, 'sdfsdf', 4546, '', '2', '', '', '4546', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '<p>\n	fwetertgryr</p>\n', '', 1, 1, NULL, '2019-02-18', '2019-02-18', 0, '11.564125877780569', '104.90501387011716', '2019-01-04', 8, 2, 0),
(10, 1, 0, 51, 40, 'test new ', 4546, NULL, '1', NULL, NULL, '4546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>\r\n	fsdfdsfgdfgfdghf</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, NULL, '11.584642697122652', '105.05435926806638', '2019-01-04', 4, 0, 0),
(14, 1, NULL, 51, 40, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL, 0, 0),
(15, 1, NULL, 51, 40, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL, 0, 0),
(16, 1, NULL, 79, 79, 'asdas', 67868, NULL, '1', NULL, NULL, '67868', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-04', NULL, 0, 0),
(17, 1, 4, 40, 40, 'try mew test', 4546, '', '1', '', '', '4546', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '<p>\n	hello</p>\n', '', 0, 1, NULL, '2019-01-05', '2019-01-05', 0, '11.585988009740875', '105.05298597705075', '2019-01-05', 4, 0, 0),
(27, 1, 1505, 51, 40, 'test new  for hidding', 4546, NULL, '1', NULL, NULL, '4546', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, NULL, NULL, NULL, NULL, '', '', '2019-01-05', 1, 0, 0),
(28, 3, 1498, 40, 40, 'testing level', 358000, '', '2', '', '', '1903', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2019-02-18', '2019-02-18', 0, '', '', '2019-02-18', 84, 1, 0),
(29, 4, 4, 0, NULL, 'asdasd', 0, '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2019-02-22', '2019-02-22', 0, '', '', '2019-02-22', NULL, 0, 0),
(31, 1, 4, 75, 40, 'kkkkk', 0, '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', 1, '', '', '', '', NULL, '', '', '', '', 1, 1, NULL, '2019-02-23', '2019-02-23', 0, '', '', '2019-02-23', 33, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpropertylocation`
--

CREATE TABLE `tblpropertylocation` (
  `propertylocationid` int(10) NOT NULL,
  `locationname` varchar(250) DEFAULT NULL,
  `lineage` varchar(250) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `note` text,
  `status` int(1) DEFAULT NULL
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

CREATE TABLE `tblpropertytype` (
  `typeid` int(10) NOT NULL,
  `menu` int(10) NOT NULL,
  `typename` varchar(250) DEFAULT NULL,
  `type_note` text,
  `type_status` int(1) DEFAULT NULL
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
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `id` int(10) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `ip` varchar(150) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `region_code` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `country_name` varchar(250) DEFAULT NULL,
  `continent_code` varchar(150) DEFAULT NULL,
  `in_eu` varchar(150) DEFAULT NULL,
  `postal` varchar(150) DEFAULT NULL,
  `latitude` varchar(500) DEFAULT NULL,
  `longitude` varchar(500) DEFAULT NULL,
  `timezone` varchar(500) DEFAULT NULL,
  `utc_offset` varchar(250) DEFAULT NULL,
  `country_calling_code` varchar(150) DEFAULT NULL,
  `currency` varchar(150) DEFAULT NULL,
  `languages` varchar(150) DEFAULT NULL,
  `asn` varchar(150) DEFAULT NULL,
  `org` varchar(150) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`id`, `pid`, `ip`, `city`, `region`, `region_code`, `country`, `country_name`, `continent_code`, `in_eu`, `postal`, `latitude`, `longitude`, `timezone`, `utc_offset`, `country_calling_code`, `currency`, `languages`, `asn`, `org`, `date_create`) VALUES
(9, 31, '117.20.112.100', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS45498', 'SMART AXIATA Co., Ltd.', '2018-01-26'),
(10, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-01-27'),
(11, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-01'),
(12, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-02'),
(13, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-03'),
(14, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-04'),
(15, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-05'),
(16, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-06'),
(17, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-07'),
(18, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-08'),
(19, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-09'),
(20, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-10'),
(21, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-11'),
(22, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-12'),
(23, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-13'),
(24, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-14'),
(25, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-15'),
(26, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-16'),
(27, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-17'),
(28, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-18'),
(29, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-19'),
(30, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-20'),
(31, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-21'),
(32, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-22'),
(33, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-23'),
(34, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-24'),
(35, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-25'),
(36, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-26'),
(37, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-02-27'),
(38, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-03-01'),
(39, 31, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-03-02'),
(40, 28, '27.96.87.93', 'Phnom Penh', 'Phnom Penh', '12', 'KH', 'Cambodia', 'AS', 'false', '', '11.5625', '104.916', 'Asia/Phnom_Penh', '+0700', '+855', 'KHR', 'km,fr,en', 'AS38901', 'EZECOM limited', '2019-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `z_blog`
--

CREATE TABLE `z_blog` (
  `site_show_blogid` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
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

CREATE TABLE `z_currency` (
  `curid` int(11) NOT NULL,
  `currcode` varchar(255) DEFAULT NULL,
  `curr_name` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `ex_rate` double DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
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

CREATE TABLE `z_module` (
  `moduleid` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_namekh` varchar(250) DEFAULT NULL,
  `sort_mod` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `mod_position` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_module`
--

INSERT INTO `z_module` (`moduleid`, `module_name`, `module_namekh`, `sort_mod`, `order`, `is_active`, `mod_position`) VALUES
(1, 'Setting', 'ការកំណត់', NULL, 0, 1, '2'),
(7, 'Menu', 'មុឺនុយ', NULL, NULL, 1, '2'),
(10, 'Product', 'ផលិតផល', NULL, NULL, 0, '2'),
(11, 'Article', 'អត្ថបទ', NULL, NULL, 1, '2'),
(12, 'Banner', 'ផ្សព្វផ្សាយ', NULL, NULL, 1, '2'),
(13, 'Dashboard', 'ទំព័រដើម', NULL, NULL, 1, '2'),
(18, 'Property', 'អចនទ្រព្យ', NULL, NULL, 1, '2'),
(19, 'Propery Category', 'ប្រភេទអចនទ្រព្យ', NULL, NULL, 1, '2'),
(20, 'Property Location', 'ទីតាំងអចលនទ្រព្យ', NULL, NULL, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `z_page`
--

CREATE TABLE `z_page` (
  `pageid` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_namekh` varchar(250) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_page`
--

INSERT INTO `z_page` (`pageid`, `page_name`, `page_namekh`, `link`, `moduleid`, `order`, `is_insert`, `is_update`, `is_delete`, `is_show`, `is_print`, `is_export`, `created_by`, `created_date`, `is_active`, `icon`, `alias`) VALUES
(5, 'Page', 'ទំព័រ', 'setting/page', 1, NULL, 0, 1, 0, 1, 1, 0, 1, '2015-02-05 17:00:01', 1, 'fa-file-o', NULL),
(6, 'User Profile', 'ប្រវត្តិរូបអ្នកប្រើ', 'setting/user', 1, NULL, 1, 1, 1, 1, 0, 0, 1, '2015-02-05 16:56:20', 1, 'fa-user', NULL),
(7, 'User Role', 'តួនាទីអ្នកប្រើ', 'setting/role', 1, NULL, 1, 1, 1, 1, 1, 1, 1, '2015-02-05 16:57:09', 1, 'fa-user', NULL),
(8, 'Role Access', 'ការចូលដំណើរការ', 'setting/permission', 1, NULL, 1, 1, 0, 0, 0, 1, 1, '2015-02-05 16:56:46', 1, 'fa-wrench', NULL),
(57, 'Shipping Company', NULL, 'shipping/shipping', 11, 1, 1, 1, 1, 1, 1, 1, 1, '2015-06-29 11:21:45', 0, 'fa-bars', NULL),
(58, 'Product List', NULL, 'product/product', 7, 7, 1, 1, 1, 1, 1, 1, 1, '2015-07-10 13:47:35', 0, 'fa-bars', NULL),
(59, 'Stock In/Out', NULL, 'product/stockmove', 7, 8, 1, 1, 1, 1, 1, 1, 1, '2015-07-15 12:04:46', 0, 'fa-bars', NULL),
(54, 'Category', NULL, 'stock/category', 7, 6, 1, 1, 1, 1, 1, 1, 1, '2015-06-17 07:53:19', 0, 'fa-bars', 'category.html'),
(55, 'Store', NULL, 'store', 10, 0, 1, 1, 1, 1, 1, 1, 1, '2015-06-26 08:04:07', 0, 'fa-bars', NULL),
(56, 'Setup List', NULL, 'setup/csetup', 11, 0, 1, 1, 1, 1, 1, 1, 1, '2015-06-27 12:11:58', 0, 'fa-bars', NULL),
(60, 'Slide Show', NULL, 'slideshow/SlideShow', 7, 9, 1, 1, 1, 1, 1, 1, 1, '2015-07-17 08:19:12', 0, 'fa-bars', NULL),
(61, 'Setup Ads', NULL, 'setup/SetupAds', 11, 2, 1, 1, 1, 1, 1, 1, 1, '2015-08-04 03:00:11', 0, 'fa-bars', NULL),
(62, 'Setup Country', NULL, 'setup/country', 11, 3, 1, 1, 1, 1, 1, 1, 1, '2015-08-21 16:25:39', 0, 'fa-bars', NULL),
(63, 'Menu List', 'បញ្ជីរាយនាមមុឺនុយ', 'menu/index', 7, 10, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:23:24', 1, 'fa-bars', NULL),
(64, 'Add New Menu', 'បន្ថែមមុឺនុយថ្មី', 'menu/add', 7, 11, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 04:23:08', 1, 'fa-bars', NULL),
(65, 'Article List', 'បញ្ជីរាយនាមអត្ថបទ', 'article/index', 11, 4, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:46:23', 1, 'fa-bars', NULL),
(66, 'Add New Article', 'បន្ថែមអត្ថបទថ្មី', 'article/add', 11, 5, 1, 1, 1, 1, 1, 1, 1, '2015-09-11 16:47:08', 1, 'fa-bars', NULL),
(67, 'Product List', NULL, 'product/index', 10, 1, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:07', 1, 'fa-bars', NULL),
(68, 'Add New Products', NULL, 'product/add', 10, 2, 1, 1, 1, 1, 1, 1, 1, '2015-09-12 17:10:46', 1, 'fa-bars', NULL),
(69, 'Banner List', 'បញ្ជីរាយនាមផ្សព្វផ្សាយ', 'setup/setupads/index', 12, 0, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:16:13', 1, 'fa-bars', NULL),
(70, 'Add New Banner', 'បន្ថែមផ្សព្វផ្សាយថ្មី', 'setup/setupads/add', 12, 1, 1, 1, 1, 1, 1, 1, 1, '2016-02-05 23:15:42', 1, 'fa-bars', NULL),
(71, 'Contact List', NULL, 'article/contact_list', 13, 0, 1, 1, 1, 1, 1, 1, 1, '2015-09-15 14:32:25', 0, 'fa-bars', NULL),
(75, 'Add New Location', 'បន្ថែមទីតាំងមុឺនុយថ្មី', 'category/add', 7, 12, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:15:43', 1, 'fa-bars', NULL),
(76, 'Location List', 'បញ្ជីរាយនាមទីតាំងមុឺនុយ', 'category/index', 7, 13, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:17:44', 1, 'fa-bars', NULL),
(77, 'Module', NULL, 'setting/module', 1, 0, 1, 1, 1, 1, 1, 1, 1, '2018-11-17 11:53:41', 0, 'fa-bars', NULL),
(78, 'Add New Property', 'បន្ថែមអចនទ្រព្យថ្មី', 'property/property/add', 18, 0, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:14:07', 1, 'fa-bars', NULL),
(79, 'Property List', 'បញ្ជីរាយនាមអចនទ្រព្យ', 'property/property/index', 18, 1, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:13:45', 1, 'fa-bars', NULL),
(80, 'Add Property Category', 'បន្ថែមប្រភេទអចនទ្រព្យ', 'property/propertytype/add', 19, 0, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:13:22', 1, 'fa-bars', NULL),
(81, 'Property Category Lists', 'បញ្ជីរាយនាមប្រភេទអចនទ្រព្យ', 'property/propertytype/index', 19, 1, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:12:34', 1, 'fa-bars', NULL),
(82, 'Property Location', 'បន្ថែមទីតាំងថ្មី', 'property/propertylocation/add', 20, 0, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:12:11', 1, 'fa-bars', NULL),
(83, 'Property Location List', 'បញ្ជីរាយនាមទីតាំងអចនទ្រព្យ', 'property/propertylocation/index', 20, 1, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:11:54', 1, 'fa-bars', NULL),
(84, 'Site Profile', 'ព័ត៌មានអំពីវែបសាយ', 'site-profile', 1, 1, 0, 0, 0, 0, 0, 0, 1, '2019-03-01 09:11:37', 1, 'fa-bars', NULL),
(85, 'Dashboard', 'ទំព័រដើម', 'sys/dashboard', 13, 1, 1, 1, 1, 1, 1, 1, 1, '2019-03-01 09:10:52', 1, 'fa-bars', NULL),
(86, 'Charts Property Analysis ', 'គំនូសតាងវិភាគអចលនទ្រព្យ', 'greenadmin/home', 13, 2, 0, 0, 0, 0, 0, 0, 1, '2019-03-01 09:10:37', 1, 'fa-bars', NULL),
(87, 'Charts Status', NULL, 'greenadmin/home/chartSatatus', 13, 3, 0, 0, 0, 0, 0, 0, 1, '2019-02-21 10:02:07', 0, 'fa-bars', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_role`
--

CREATE TABLE `z_role` (
  `roleid` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

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
(23, 'user', NULL, 0),
(24, 'user', NULL, 0),
(25, 'user', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_role_module_detail`
--

CREATE TABLE `z_role_module_detail` (
  `mod_rol_id` int(11) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

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
(127, 1, 20, NULL),
(137, 25, 13, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_role_page`
--

INSERT INTO `z_role_page` (`role_page_id`, `roleid`, `pageid`, `moduleid`, `created_date`, `created_by`, `is_read`, `is_insert`, `is_delete`, `is_update`, `is_print`, `is_export`, `is_import`) VALUES
(17, 17, 24, 7, '2015-03-19 02:18:59', '1', 1, 1, 1, 1, 1, 1, 1),
(26, 17, 25, 7, '2015-06-18 21:15:05', '1', 1, 1, 1, 1, 1, 1, 1),
(27, 17, 26, 7, '2015-04-20 10:57:34', '1', 1, 1, 1, 1, 1, 1, 1),
(28, 17, 27, 7, '2015-04-20 10:57:45', '1', 1, 1, 1, 1, 1, 1, 1),
(29, 17, 28, 7, '2015-04-20 10:57:55', '1', 1, 1, 1, 1, 1, 1, 1),
(44, 23, 86, 13, '2019-02-23 12:36:18', '1', 1, 0, 0, 0, 0, 0, 0),
(41, 23, 75, 7, '2018-11-20 04:43:55', '1', 1, 1, 1, 1, 1, 1, 1),
(42, 23, 78, 18, '2019-02-23 12:16:54', '1', 1, 1, 1, 1, 1, 1, 1),
(43, 23, 85, 13, '2019-02-23 15:56:19', '1', 1, 1, 0, 0, 0, 0, 0),
(45, 24, 85, 13, '2019-02-23 15:57:15', '1', 1, 1, 0, 0, 0, 0, 0),
(46, 25, 85, 13, '2019-02-23 16:04:00', '1', 1, 1, 0, 0, 0, 0, 0);

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
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1511;
--
-- AUTO_INCREMENT for table `dashboard_item`
--
ALTER TABLE `dashboard_item`
  MODIFY `dashid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_profile`
--
ALTER TABLE `site_profile`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tbllayout`
--
ALTER TABLE `tbllayout`
  MODIFY `layout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblmenus`
--
ALTER TABLE `tblmenus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblproperty`
--
ALTER TABLE `tblproperty`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tblpropertylocation`
--
ALTER TABLE `tblpropertylocation`
  MODIFY `propertylocationid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tblpropertytype`
--
ALTER TABLE `tblpropertytype`
  MODIFY `typeid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `z_blog`
--
ALTER TABLE `z_blog`
  MODIFY `site_show_blogid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `z_currency`
--
ALTER TABLE `z_currency`
  MODIFY `curid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_module`
--
ALTER TABLE `z_module`
  MODIFY `moduleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `z_page`
--
ALTER TABLE `z_page`
  MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `z_role`
--
ALTER TABLE `z_role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `z_role_module_detail`
--
ALTER TABLE `z_role_module_detail`
  MODIFY `mod_rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `z_role_page`
--
ALTER TABLE `z_role_page`
  MODIFY `role_page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;