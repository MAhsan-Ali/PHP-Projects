-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 11:58 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`) VALUES
(1, 'Grocery'),
(2, 'Snacks'),
(3, 'HouseHold'),
(4, 'Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `product_id`, `product_name`, `price`, `qty`, `dt`, `order_no`) VALUES
(10, '4', '2', 'American Garden Salad Dressing Caesar 473Ml', '570', '1', '28-Jan-2019', '2019012811111958'),
(11, '4', '1', 'Aleyna Sauce Crushed Garlic 200G', '100', '10', '28-Jan-2019', '2019012811111958'),
(12, '4', '2', 'American Garden Salad Dressing Caesar 473Ml', '570', '10', '28-Jan-2019', '2019012811113137'),
(13, '4', '1', 'Aleyna Sauce Crushed Garlic 200G', '100', '100', '28-Jan-2019', '2019012811113137'),
(14, 'GUEST', '2', 'American Garden Salad Dressing Caesar 473Ml', '570', '10', '28-Jan-2019', '2019012811113810'),
(15, 'GUEST', '1', 'Aleyna Sauce Crushed Garlic 200G', '100', '100', '28-Jan-2019', '2019012811115108'),
(16, 'GUEST', '2', 'American Garden Salad Dressing Caesar 473Ml', '570', '70', '28-Jan-2019', '2019012811115108');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_shipping`
--

CREATE TABLE IF NOT EXISTS `tbl_order_shipping` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `nmbr` varchar(255) NOT NULL,
  `addrs` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_shipping`
--

INSERT INTO `tbl_order_shipping` (`id`, `customer_id`, `order_no`, `dt`, `c_name`, `nmbr`, `addrs`) VALUES
(3, '4', '2019012811111958', '28-Jan-2019', 'Rehman', '0100000', 'north'),
(4, '4', '2019012811113137', '28-Jan-2019', 'Rehman', '0100000', 'north'),
(5, 'GUEST', '2019012811113810', '28-Jan-2019', 'Shariq', '900000', 'West'),
(6, 'GUEST', '2019012811115108', '28-Jan-2019', 'Qasim', '80000', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL,
  `sub_catID` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `sub_catID`, `product_name`, `product_desc`, `price`, `qty`, `img_url`) VALUES
(1, '1', 'Aleyna Sauce Crushed Garlic 200G', 'Product image may be different than actual product received.While we work to ensure that product information is correct.Actual product packaging and materials may contain more and/or different information than that shown on our Web site.No Return No Exchange.', 100, 3, 'prd_images/p_1.jpg'),
(2, '1', 'American Garden Salad Dressing Caesar 473Ml', 'Product image may be different than actual product received.While we work to ensure that product information is correct.Actual product packaging and materials may contain more and/or different information than that shown on our Web site.No Return No Exchange.', 570, 3, 'prd_images/pic_2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_cat`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_cat` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_cat`
--

INSERT INTO `tbl_sub_cat` (`id`, `cat_id`, `sub_cat_name`) VALUES
(1, '1', 'General Items'),
(2, '1', 'Package Foods'),
(3, '1', 'Breakfast'),
(4, '2', 'Bakery'),
(5, '2', 'Sweets'),
(6, '3', 'Home Textile'),
(7, '3', 'Kitchen'),
(8, '4', 'Tablets'),
(9, '4', 'Mobile'),
(10, '4', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(4, 'ahmed', 'khan', 'abc@yahoo.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_shipping`
--
ALTER TABLE `tbl_order_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_cat`
--
ALTER TABLE `tbl_sub_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_order_shipping`
--
ALTER TABLE `tbl_order_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sub_cat`
--
ALTER TABLE `tbl_sub_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
