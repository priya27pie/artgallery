-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2020 at 03:27 AM
-- Server version: 5.7.23-23
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
-- Database: `dnmsquar_art`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `order_time` datetime NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `size`, `price`, `total`, `order_time`, `user_id`) VALUES
(72, 'ORDR160', 'PRO158', 'Children Painting', 1, '', 2799, 0, '2020-03-24 12:39:09', 'AUSR155'),
(73, 'ORDR161', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 12:48:09', 'AUSR155'),
(74, 'ORDR162', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 12:49:16', 'AUSR155'),
(75, 'ORDR163', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 12:49:56', 'AUSR155'),
(76, 'ORDR164', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 01:10:56', 'AUSR155'),
(77, 'ORDR165', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 01:30:41', 'AUSR155'),
(78, 'ORDR166', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 01:31:15', 'AUSR155'),
(79, 'ORDR167', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-24 02:18:10', 'AUSR155'),
(80, 'ORDR167', 'PRO157', 'Couple Painting', 1, 'A4', 2099, 0, '2020-03-24 02:18:10', 'AUSR155'),
(81, 'ORDR168', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-25 11:32:16', 'AUSR155'),
(82, 'ORDR169', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-30 01:04:36', 'AUSR155'),
(83, 'ORDR170', 'PRO158', 'Children Painting', 1, 'A5', 2799, 0, '2020-03-30 02:35:33', 'AUSR155'),
(84, 'ORDR172', 'PRO158', 'Children Painting', 1, 'A4', 1899, 0, '2020-04-06 12:33:02', 'AUSR171'),
(85, 'ORDR172', 'PRO159', 'Drawing Room Women Painting', 1, 'Canvas', 5999, 0, '2020-04-06 12:33:02', 'AUSR171'),
(86, 'ORDR173', 'PRO156', 'Women Painting', 1, 'A5', 2399, 0, '2020-04-07 12:12:08', 'AUSR171'),
(87, 'ORDR174', 'PRO157', 'Couple Painting', 1, 'A3', 1500, 0, '2020-04-07 12:15:13', 'AUSR171');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `category`, `date`) VALUES
(1, 'Titel Lorem ipsum', 'ddddd', '', '2018-03-30'),
(2, 'ddd', ' fff', 'demo', '2019-02-04'),
(3, 'test test\'s', ' test test\'s test test\'s test test\'s\r\ntest test\'s', 'demo', '2019-02-04'),
(4, 'test test\'s', ' test test\'s test test\'s test test\'s\r\ntest test\'s', 'demo', '2019-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'demo'),
(2, 'demo2'),
(3, 'test'),
(4, 'Pastel'),
(5, 'Family Painting'),
(6, 'Birthday Painting'),
(7, 'Couple Painting'),
(8, 'Baby Painting'),
(9, 'Anniversary Painting'),
(10, 'Children Painting'),
(11, 'Pet Painting'),
(12, 'Wedding Painting'),
(13, 'Home Decor Painting');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_id` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `created_at` varchar(128) DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_id`, `name`, `sex`, `phone`, `email`, `address`, `state`, `city`, `pincode`, `password`, `created_at`, `update_by`) VALUES
(1, 'AUSR155', 'priyanka das', 'Female', '9874615676', 'priya.pie27@gmail.com', 'rc-1/2 raghunathpur, teghoria', 'WEST BENGAL', 'kolkata', '700059', 'e10adc3949ba59abbe56e057f20f883e', '23-03-2020', 'SELF'),
(2, 'AUSR171', 'monish', 'Male', '8333016325', 'monishnenavath@gmail.com', 'vizag', 'ANDHRA PRADESH', 'Visakhapatnam', '530048', '448ae130289b5091a3ee201e233e1b41', '06-04-2020', 'SELF');

-- --------------------------------------------------------

--
-- Table structure for table `ids`
--

CREATE TABLE `ids` (
  `id` int(11) NOT NULL,
  `referid` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ids`
--

INSERT INTO `ids` (`id`, `referid`) VALUES
(1, '175');

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `id` int(11) NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  `txid` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `client_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(1000) NOT NULL,
  `amount` double NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `phon` varchar(100) NOT NULL,
  `redeem` varchar(100) NOT NULL,
  `points` int(11) NOT NULL,
  `redeem_money` double NOT NULL,
  `payment_option` varchar(200) NOT NULL,
  `cod` int(11) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `txn_status` varchar(50) NOT NULL,
  `bank_txn` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `checksum` varchar(50) NOT NULL,
  `gatewayname` varchar(50) NOT NULL,
  `txn_msg` varchar(50) NOT NULL,
  `mid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`id`, `pay_status`, `txid`, `user_id`, `client_name`, `email`, `address`, `amount`, `date`, `status`, `order_id`, `phon`, `redeem`, `points`, `redeem_money`, `payment_option`, `cod`, `txnid`, `txn_status`, `bank_txn`, `bank_name`, `checksum`, `gatewayname`, `txn_msg`, `mid`) VALUES
(132, '', '', 'AUSR155', NULL, NULL, '', 2799, '2020-03-24 12:49:56', 'Pending', 'ORDR163', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(133, '', '', 'AUSR155', NULL, NULL, '', 2799, '2020-03-24 01:10:56', 'Pending', 'ORDR164', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(134, '', '', 'priyanka das', 'AUSR155', 'priya.pie27@gmail.com', '', 2799, '2020-03-24 01:30:41', 'Pending', 'ORDR165', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(135, 'Online', '', 'AUSR155', 'priyanka das', 'priya.pie27@gmail.com', 'rc-1/2 raghunathpur, teghoria', 2799, '2020-03-24 01:31:15', 'PENDING', 'ORDR166', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(136, 'COD', '', 'AUSR155', 'priyanka das', 'priya.pie27@gmail.com', 'rc-1/2 raghunathpur, teghoria', 4898, '2020-03-24 02:18:10', 'PLACED', 'ORDR167', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(138, 'Online', '', 'AUSR155', 'priyanka das', 'priya.pie27@gmail.com', 'rc-1/2 raghunathpur, teghoria', 2799, '2020-03-25 11:32:16', 'PENDING', 'ORDR168', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(139, 'Online', '', 'AUSR155', 'priyanka das', 'priya.pie27@gmail.com', 'rc-1/2 raghunathpur, teghoria', 2799, '2020-03-30 01:04:36', 'PENDING', 'ORDR169', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(140, '', '', 'AUSR155', 'priyanka das', 'priya.pie27@gmail.com', '', 2799, '2020-03-30 02:35:33', 'Pending', 'ORDR170', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(141, 'Online', '', 'AUSR171', 'monish', 'monishnenavath@gmail.com', 'vizag', 7898, '2020-04-06 12:33:02', 'PENDING', 'ORDR172', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(142, 'COD', '', 'AUSR171', 'monish', 'monishnenavath@gmail.com', 'vizag', 2399, '2020-04-07 12:12:08', 'PLACED', 'ORDR173', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(143, '', '', 'AUSR171', 'monish', 'monishnenavath@gmail.com', '', 1500, '2020-04-07 12:15:14', 'Pending', 'ORDR174', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `paper` varchar(20) DEFAULT NULL,
  `description` text,
  `category` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `name`, `paper`, `description`, `category`, `status`, `updated_by`, `date`) VALUES
(10, 'PRO147', 'Pastel Painting', 'Bright White', 'Loren lipsum&amp;nbsp; ddddddd', 'Pastel', NULL, 'Admin', '10-02-2020'),
(11, 'PRO156', 'Women Painting', 'White,Beige', 'Oil Painting . Water Painting', 'Family Painting', NULL, 'Admin', '23-03-2020'),
(12, 'PRO157', 'Couple Painting', 'White,Beige', 'Couple Painting', 'Couple Painting', NULL, 'Admin', '23-03-2020'),
(13, 'PRO158', 'Children Painting', 'White,Beige', 'Children Painting', 'Children Painting', NULL, 'Admin', '23-03-2020'),
(14, 'PRO159', 'Drawing Room Women Painting', 'White,Beige', 'Drawing Room Women Painting', 'Home Decor Painting', NULL, 'Admin', '23-03-2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `product_id`, `image`) VALUES
(1, 'PRO145', '10022020test.jpg'),
(2, 'PRO145', '10022020test.jpg'),
(3, 'PRO145', '10022020test.jpg'),
(4, 'PRO146', '10022020test.jpg'),
(5, 'PRO146', '10022020test.jpg'),
(6, 'PRO146', '10022020test.jpg'),
(7, 'PRO147', '5e413b97aab52test.jpg'),
(8, 'PRO147', '5e413b97b626dtest.jpg'),
(9, 'PRO147', '5e413b97c5691test.jpg'),
(10, 'PRO147', '20032020download.jpg'),
(11, 'PRO156', '5e7872dbdbaf6pr1.jpg'),
(12, 'PRO156', '5e7872dbdbf71pr1.jpg'),
(13, 'PRO156', '5e7872dbdc3aapr1.jpg'),
(14, 'PRO157', '5e7873487eb9dpr5.jpg'),
(15, 'PRO157', '5e7873487f75epr5.jpg'),
(16, 'PRO157', '5e787348805bcpr5.jpg'),
(17, 'PRO158', '5e78739be3b47pr4.jpg'),
(18, 'PRO158', '5e78739be412epr4.jpg'),
(19, 'PRO158', '5e78739be4653pr4.jpg'),
(20, 'PRO159', '5e7873fd8f393pr3.jpg'),
(21, 'PRO159', '5e7873fd8f9b9pr3.jpg'),
(22, 'PRO159', '5e7873fd8ff27pr3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size`, `price`) VALUES
(1, 'PRO138', 'A4', 'A4'),
(2, 'PRO138', 'A3', 'A3'),
(3, 'PRO139', 'A3', '999'),
(4, 'PRO139', 'A4', '1000'),
(5, 'PRO140', 'A3', '999'),
(6, 'PRO140', 'A4', '1000'),
(7, 'PRO141', 'A3', '999'),
(8, 'PRO141', 'A4', '1000'),
(9, 'PRO142', 'A3', '999'),
(10, 'PRO142', 'A4', '1000'),
(11, 'PRO143', 'A3', '1999'),
(12, 'PRO143', 'A4', '999'),
(13, 'PRO144', 'A3', '1999'),
(14, 'PRO144', 'A4', '999'),
(15, 'PRO145', 'A3', '1999'),
(16, 'PRO145', 'A4', '999'),
(17, 'PRO146', 'A3', '1999'),
(18, 'PRO146', 'A4', '999'),
(19, 'PRO147', 'A3', '1999'),
(20, 'PRO147', 'A4', '999'),
(21, 'Array', 'A5', '1200'),
(22, 'Array', '', ''),
(23, 'Array', '', ''),
(24, 'Array', '', ''),
(29, 'PRO147', 'A5', '1000'),
(37, 'PRO156', 'A4', '1500'),
(38, 'PRO156', 'A3', '1899'),
(39, 'PRO156', 'A5', '2399'),
(40, 'PRO157', 'A3', '1500'),
(41, 'PRO157', 'A4', '2099'),
(42, 'PRO157', 'A5', '2400'),
(43, 'PRO158', 'A4', '1899'),
(44, 'PRO158', 'A5', '2799'),
(45, 'PRO159', 'Canvas', '5999');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ids`
--
ALTER TABLE `ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ids`
--
ALTER TABLE `ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
