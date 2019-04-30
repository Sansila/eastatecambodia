-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2019 at 02:30 AM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 7.2.7

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
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customerid` int(10) NOT NULL,
  `locationid` varchar(150) DEFAULT NULL,
  `customer_type` varchar(150) DEFAULT NULL,
  `customer_name` varchar(145) DEFAULT NULL,
  `phone` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `address` varchar(245) DEFAULT NULL,
  `description` longtext,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerid`, `locationid`, `customer_type`, `customer_name`, `phone`, `email`, `address`, `description`, `create_date`) VALUES
(11, '40,42', '1', 'sila san', '0961234567', 'asasa@gmail.com', 'phnom\npehn', 'hello', '2019-04-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `customerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
