-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 06:44 AM
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
-- Table structure for table `tblgroupcustomer`
--

DROP TABLE IF EXISTS `tblgroupcustomer`;
CREATE TABLE IF NOT EXISTS `tblgroupcustomer` (
  `groupid` int(10) NOT NULL AUTO_INCREMENT,
  `byrolerid` int(10) DEFAULT NULL,
  `groupname` varchar(245) DEFAULT NULL,
  `groupnamekh` varchar(245) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgroupcustomer`
--

INSERT INTO `tblgroupcustomer` (`groupid`, `byrolerid`, `groupname`, `groupnamekh`, `is_active`, `date_create`) VALUES
(1, NULL, 'GroupA', NULL, 1, '2019-04-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
