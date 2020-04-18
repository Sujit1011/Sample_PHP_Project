-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2020 at 05:09 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_number` int(8) NOT NULL,
  `branch_name` varchar(15) DEFAULT NULL,
  `balance` int(8) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  PRIMARY KEY (`account_number`),
  KEY `account_ibfk_1` (`branch_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_number`, `branch_name`, `balance`, `DATE`) VALUES
(101, 'Wright Town', 500, '2005-12-10'),
(102, 'S street', 400, '2010-08-06'),
(201, 'Stadium', 900, '2010-04-09'),
(215, 'Meghawan', 700, '2012-07-03'),
(217, 'Stadium', 750, '2012-10-02'),
(222, 'Cross Square', 700, '2011-11-08'),
(305, 'Napier Town', 350, '0009-06-04'),
(321, 'SBI Jhaljhalia', 1000000, '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
CREATE TABLE IF NOT EXISTS `borrower` (
  `customer_name` varchar(15) NOT NULL,
  `loan_number` int(8) NOT NULL,
  PRIMARY KEY (`customer_name`,`loan_number`),
  KEY `borrower_ibfk_2` (`loan_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`customer_name`, `loan_number`) VALUES
('Amit', 16),
('Charu', 93),
('Divya', 11),
('Divya', 23),
('Priya', 15),
('Sakshi', 17),
('Vinay', 17),
('Yash', 14);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_name` varchar(15) NOT NULL,
  `branch_city` varchar(15) NOT NULL,
  `assets` int(8) NOT NULL,
  PRIMARY KEY (`branch_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_name`, `branch_city`, `assets`) VALUES
('Cross Square', 'Nagpur', 2100000),
('Meghawan', 'Hyderabad', 400000),
('Napier Town', 'Hyderabad', 8000000),
('North Town', 'Raipur', 3700000),
('Pownal', 'Bilaspur', 300000),
('S street', 'Hyderabad', 1700000),
('Wright Town', 'Delhi', 9000000),
('Stadium', 'JABALPUR', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_name` varchar(15) NOT NULL,
  `customer_street` varchar(15) DEFAULT NULL,
  `customer_city` varchar(15) NOT NULL,
  PRIMARY KEY (`customer_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_name`, `customer_street`, `customer_city`) VALUES
('Amit', 'Sarafa', 'Patna'),
('Anjali', 'Mall Road', 'Patna'),
('Bani', 'Civil Lines', 'Delhi'),
('Charu', NULL, 'Raipur'),
('Divya', NULL, 'Raipur'),
('Jai', 'South Street', 'Mumbai'),
('Priya', 'Main Street', 'Bangalore'),
('Rahul', 'Vijay Nagar', 'Jabalpur'),
('Rohit', 'Sadar', 'Jabalpur'),
('Sakshi', 'Park Street', 'KOlkata'),
('Vinay', 'Main Street', 'Bangalore'),
('Yash', 'Hill Road', 'Nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `depositor`
--

DROP TABLE IF EXISTS `depositor`;
CREATE TABLE IF NOT EXISTS `depositor` (
  `customer_name` varchar(15) NOT NULL,
  `account_number` int(8) NOT NULL,
  PRIMARY KEY (`customer_name`,`account_number`),
  KEY `depositor_ibfk_2` (`account_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depositor`
--

INSERT INTO `depositor` (`customer_name`, `account_number`) VALUES
('Anjali', 222),
('Divya', 217),
('Priya', 102),
('Rohit', 305),
('Vinay', 217),
('Yash', 101),
('Yash', 201);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `loan_number` int(8) NOT NULL,
  `branch_name` varchar(15) DEFAULT NULL,
  `amount` int(8) DEFAULT NULL,
  PRIMARY KEY (`loan_number`),
  KEY `loan_ibfk_1` (`branch_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_number`, `branch_name`, `amount`) VALUES
(11, 'Napier Town', 900),
(14, 'Wright Town', 1000),
(15, 'S street', 1500),
(16, 'S street', 1300),
(17, 'Wright Town', 1000),
(23, 'Cross Square', 2000),
(93, 'Meghawan', 500),
(91, 'Stadium', 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
