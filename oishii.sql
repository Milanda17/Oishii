-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 08:42 PM
-- Server version: 10.1.34-MariaDB
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
-- Database: `oishii`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `address`, `contact`, `username`, `password`) VALUES
(1, 'upeksha', 'kandy', 773546896, 'upeksha', 123),
(2, 'sin', 'kandy', 778451263, 'sin', 123),
(3, 'thiyangi', 'kandy', 71456932, 'thi', 123),
(4, 'madu', 'kandy', 774512789, 'madu', 123),
(5, 'sheng', 'kandy', 773546896, 'sheng', 123),
(6, 'mila', 'mila', 123, 'mila', 123),
(7, 'Milanda', 'kandy', 715864650, 'Milanda', 123);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `f_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_des` varchar(100) NOT NULL,
  `f_price` varchar(100) NOT NULL,
  `f_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`f_id`, `f_name`, `f_des`, `f_price`, `f_pic`) VALUES
(23, 'Rice', 'Rice', '500', 'crice2.jpg'),
(24, 'Chicken', 'Chicken', '1000', 'dchicken.jpg'),
(25, 'Noodles', 'Noodles', '1500', 'noodles.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `c_name` varchar(11) NOT NULL,
  `size` int(20) NOT NULL,
  `o_price` int(20) NOT NULL,
  `o_make` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `f_id`, `c_name`, `size`, `o_price`, `o_make`, `date`) VALUES
(35, 23, 'Customer', 5, 2500, 0, '2018-10-13 13:40:03'),
(36, 23, 'Customer', 4, 2000, 0, '2018-10-13 13:40:41'),
(47, 23, 'sin', 1, 500, 0, '2018-10-13 14:15:35'),
(48, 23, 'sin', 1, 500, 0, '2018-10-13 14:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
