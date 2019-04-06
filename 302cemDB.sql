-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 10:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `302cem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_name` varchar(30) NOT NULL,
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_name`, `id`, `pw`, `level`) VALUES
('2', '2', '2', '2'),
('OR Ltd', 'RE001', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `retailer_id` varchar(5) NOT NULL,
  `item_id` varchar(5) NOT NULL,
  `deliverble` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`retailer_id`, `item_id`, `deliverble`) VALUES
('RE001', 'IT001', 1),
('RE001', 'IT003', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` char(5) NOT NULL,
  `item_name` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `quantity`, `description`) VALUES
('IT001', 'Addidas Shoes', 0, '4');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `item_id` char(5) NOT NULL,
  `item_name` varchar(80) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deadline_date` date NOT NULL,
  `retailer_id` char(5) NOT NULL,
  `retailer_name` varchar(50) NOT NULL,
  `retailer_tel` int(8) NOT NULL,
  `retailer_address` varchar(100) NOT NULL,
  `manufacturer_id` char(5) NOT NULL,
  `manufacturer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`item_id`, `item_name`, `quantity`, `deadline_date`, `retailer_id`, `retailer_name`, `retailer_tel`, `retailer_address`, `manufacturer_id`, `manufacturer_name`) VALUES
('IT001', 'Addidas Shoes', 20, '2019-03-21', 'RE001', 'OR Ltd', 25892147, 'Tat Chee Ave, 2410, 2/F, Li Dak Sum Yip Yio Chin Academic Building, City University of Hong Kong', 'MA001', 'Ma Ltd'),
('IT003', 'Glass ', 30, '2019-03-14', 'RE001', 'OR Ltd', 25892147, 'Tat Chee Ave, 2410, 2/F, Li Dak Sum Yip Yio Chin Academic Building, City University of Hong Kong', 'MA003', 'Apple Premium Reseller T.S.T Branch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`item_id`,`retailer_id`,`manufacturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
