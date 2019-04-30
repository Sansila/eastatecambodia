-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 10:51 AM
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
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `customerid` int(10) NOT NULL AUTO_INCREMENT,
  `locationid` varchar(150) DEFAULT NULL,
  `byroleid` int(10) DEFAULT NULL,
  `group_name` int(10) DEFAULT NULL,
  `company` varchar(145) DEFAULT NULL,
  `title` varchar(145) DEFAULT NULL,
  `customer_name` varchar(145) DEFAULT NULL,
  `phone` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `description` longtext,
  `remark` longtext,
  `is_active` int(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerid`, `locationid`, `byroleid`, `group_name`, `company`, `title`, `customer_name`, `phone`, `email`, `address`, `description`, `remark`, `is_active`, `create_date`) VALUES
(11, '40,42', NULL, 1, NULL, NULL, 'sila san', '0961234567', 'asasa@gmail.com', 'phnom\npehn', 'hello', NULL, 1, '2019-04-29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
