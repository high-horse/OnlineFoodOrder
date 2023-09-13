-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 09:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Admin', 'admin', 'infovima93@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_details`
--

CREATE TABLE `tbl_bill_details` (
  `billId` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fulladdress` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `sid` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill_details`
--

INSERT INTO `tbl_bill_details` (`billId`, `fname`, `lname`, `fulladdress`, `note`, `sid`, `cid`, `cdate`) VALUES
(8, 'sajan', '', 'newroad', '', '98ih4pe3gm29c73um1vepnsm5r', 8, '2018-04-15 01:07:01'),
(9, 'Biplov', '', 'Naya gaun', '', '90hq285ldkvhhiq3pv3n6qqv9c', 9, '2018-05-15 01:14:45'),
(10, 'Nabin', 'Hamal', 'Rambazar, Pokhara', '', 'a82pmb40d4lq5fq31snalf44at', 10, '2018-05-15 08:30:45'),
(11, 'Nabin', 'Hamal', 'Rambazar, Pokhara', '', 'a82pmb40d4lq5fq31snalf44at', 10, '2018-05-15 08:32:45'),
(12, 'Himal', 'Poudel', 'Amarsingh, Pokhara', '', 'erkg1ooak1ts885i5pgagbc0np', 11, '2018-05-15 09:45:38'),
(13, 'Himal', 'Poudel', 'BuddaChowk, Pokhara', '', 'g1lshrpou1imdht52090buuei9', 11, '2018-05-15 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_details_done`
--

CREATE TABLE `tbl_bill_details_done` (
  `billId` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fulladdress` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `sid` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(69, '0ui848i03vek7j5qhb9f6nbuhg', 14, 'Chicken Momo', 100.00, 1, 'upload/3f6ee66606.jpg'),
(70, '98ih4pe3gm29c73um1vepnsm5r', 14, 'Chicken Momo', 100.00, 1, 'upload/3f6ee66606.jpg'),
(81, '8q3qa44lb7majb49erl2s8of0p', 14, 'Chicken Momo', 100.00, 1, 'upload/3f6ee66606.jpg'),
(83, '90hq285ldkvhhiq3pv3n6qqv9c', 14, 'Chicken Momo', 100.00, 1, 'upload/3f6ee66606.jpg'),
(84, '19in9h3pddiml4tjere7cv19b4', 13, 'Chicken Choumein', 120.00, 1, 'upload/0b34d2cb59.jpg'),
(85, 'a82pmb40d4lq5fq31snalf44at', 23, 'Veg Momo', 100.00, 1, 'upload/bf193ecb9d.jpg'),
(86, 'erkg1ooak1ts885i5pgagbc0np', 19, 'Chicken Thukpa', 160.00, 1, 'upload/2c35669a05.jpeg'),
(87, 'erkg1ooak1ts885i5pgagbc0np', 16, 'Chicken Chilli', 200.00, 1, 'upload/7b4c26e022.jpg'),
(94, 'g1lshrpou1imdht52090buuei9', 21, 'Chicken Kothey Momo', 130.00, 1, 'upload/273ec33ff4.jpg'),
(95, 'p62k8c02ctdbbov39ctscqc42i', 16, 'Chicken Chilli', 200.00, -1, 'upload/7b4c26e022.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(8, 'Pizza'),
(9, 'Mo:Mo'),
(10, 'Chowmein'),
(11, 'Burger'),
(12, 'Coffee'),
(13, 'Rice'),
(14, 'Soup'),
(15, 'Snacks'),
(17, 'Thukpa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `country`, `phone`, `email`, `pass`) VALUES
(2, 'vima', 'Nepal', '8100479135', 'infovima93@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(9, 'Biplove Magar', 'Nepal', '9806786454', 'biplove321@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'Nabin Hamal', 'Nepal', '9816618902', 'nabin.hamal@gmail.com', '172f101be73be689530f7ece9c445ecc'),
(11, 'Himal Poudel', 'Nepal', '9802347689', 'himal.poudel@gmail.com', 'eb34f78aff557f3cb0291b0a921fbf27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `body`, `price`, `image`) VALUES
(13, 'Chicken Choumein', 10, '', 120, 'upload/0b34d2cb59.jpg'),
(14, 'Chicken Momo', 9, '', 100, 'upload/3f6ee66606.jpg'),
(15, 'Chicken Burger', 11, '', 120, 'upload/f2f5c64396.jpg'),
(16, 'Chicken Chilli', 15, '', 200, 'upload/7b4c26e022.jpg'),
(17, 'Chicken Fried rice', 13, '', 120, 'upload/dae5fb8f89.jpg'),
(18, 'Chicken Tandoori (Full)', 15, '', 900, 'upload/1a8835fe58.jpg'),
(19, 'Chicken Thukpa', 17, '', 160, 'upload/2c35669a05.jpeg'),
(20, 'Chicken Pizza', 8, '', 250, 'upload/0f49aa840b.png'),
(21, 'Chicken Kothey Momo', 9, '', 130, 'upload/273ec33ff4.jpg'),
(22, 'Chicekn Fry Momo', 9, '', 150, 'upload/4ab34aab45.jpg'),
(23, 'Veg Momo', 9, '', 100, 'upload/bf193ecb9d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_bill_details`
--
ALTER TABLE `tbl_bill_details`
  ADD PRIMARY KEY (`billId`);

--
-- Indexes for table `tbl_bill_details_done`
--
ALTER TABLE `tbl_bill_details_done`
  ADD PRIMARY KEY (`billId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bill_details`
--
ALTER TABLE `tbl_bill_details`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_bill_details_done`
--
ALTER TABLE `tbl_bill_details_done`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
