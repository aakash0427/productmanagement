-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 09:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1),
(2, 'admin2', 'admin2@gmail.com', 'admin2', 1),
(3, '', 'mail@gmail.com', 'ww', 0),
(4, '', 'vendor@gmail.com', 'vendor', 0),
(5, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `pattern` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` int(50) NOT NULL,
  `shipping` int(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `sku`, `pattern`, `size`, `quantity`, `shipping`, `status`) VALUES
(7, 'asdad', 'asdad', 'trouser', 'xlarge', 2, 4, 'active'),
(9, 'LPShirt', 'LouisPhilleipe', 'shirt', 'medium', 2, 3, 'active'),
(10, 'Combo', 'comboofferxx7', 'trouser', 'large', 3, 4, 'inactive'),
(16, 'dfg', 'fgd', 'shirt', 'large', 1, 8, 'active'),
(17, 'gsd', 'hfgh', 'shirt', 'medium', 3, 5, 'active'),
(18, 'asafsf', 'sdfasdf4', 'shirt', 'smallmediumlarge', 2, 5, 'inactive'),
(19, 'gdfh', 'fghd', 'shirt', 'smallmedium', 2, 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `email`, `contact`, `password`) VALUES
(1, 'Aakash', 'Gavate', 'male', 'aakash@gmail.com', '7777123456', 'abc123'),
(2, 'Ak', 'Gv', 'male', 'ak@gmail.com', '1234562222', 'ak123456'),
(5, 'asfsa', 'asdfa', 'male', 'mail@gmail.com', '1234567890', 'ww'),
(6, 'Flipkart', 'Flipkart', 'male', 'vendor@gmail.com', '7777894561', 'vendor'),
(7, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
