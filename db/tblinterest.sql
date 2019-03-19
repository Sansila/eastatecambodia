-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2019 at 08:47 AM
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
-- Table structure for table `tblinterest`
--

DROP TABLE IF EXISTS `tblinterest`;
CREATE TABLE IF NOT EXISTS `tblinterest` (
  `interestid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `inter_name` varchar(145) DEFAULT NULL,
  `inter_phone` varchar(145) DEFAULT NULL,
  `inter_email` varchar(245) DEFAULT NULL,
  `inter_status` int(10) DEFAULT NULL,
  `is_contact` int(10) DEFAULT NULL,
  `inter_date` date DEFAULT NULL,
  PRIMARY KEY (`interestid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinterest`
--

INSERT INTO `tblinterest` (`interestid`, `pid`, `inter_name`, `inter_phone`, `inter_email`, `inter_status`, `is_contact`, `inter_date`) VALUES
(1, 29, 'Sila', '08768768678', 'sansila.dev@gmail.com', 1, 1, '2019-03-19'),
(2, 29, 'Sila', '08768768678', 'sansila.dev@gmail.com', 3, 1, '2019-03-19'),
(3, 29, 'Sila', '08768768678', 'sansila.dev@gmail.com', 3, 1, '2019-03-19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
