-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2019 at 09:44 AM
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
-- Table structure for table `tblrequirement`
--

DROP TABLE IF EXISTS `tblrequirement`;
CREATE TABLE IF NOT EXISTS `tblrequirement` (
  `requireid` int(10) NOT NULL AUTO_INCREMENT,
  `customerid` int(10) DEFAULT NULL,
  `category` varchar(245) DEFAULT NULL,
  `location` varchar(245) DEFAULT NULL,
  `min_price` varchar(145) DEFAULT NULL,
  `max_price` varchar(145) DEFAULT NULL,
  `min_size` varchar(145) DEFAULT NULL,
  `max_size` varchar(145) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `property_tag` varchar(545) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `date_modify` datetime DEFAULT NULL,
  `remark` longtext,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`requireid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrequirement`
--

INSERT INTO `tblrequirement` (`requireid`, `customerid`, `category`, `location`, `min_price`, `max_price`, `min_size`, `max_size`, `type`, `property_tag`, `date`, `userid`, `date_modify`, `remark`, `is_active`) VALUES
(2, 17, '2,5', '40,', '1400', '4100', '21000', '55800', '1', 'River Front,', '2019-05-29 08:48:10', 4, '2019-05-29 09:17:00', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
