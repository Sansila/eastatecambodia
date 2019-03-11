-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2019 at 03:52 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms_admin_db`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;