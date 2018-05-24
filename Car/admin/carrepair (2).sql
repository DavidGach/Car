-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 01:06 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrepair`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `lastaccess` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `lastaccess`) VALUES
(1, 'dato', '123456', '2018-05-24'),
(2, 'giorgi', '123456', '2018-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(4) NOT NULL,
  `url` varchar(30) COLLATE utf8_bin NOT NULL,
  `cardate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `cardate`) VALUES
(114, '9.jpg', '2018-05-03'),
(115, '2.jpg', '2018-05-27'),
(116, '7.jpg', '2018-05-24'),
(117, '8.jpg', '2018-05-24'),
(118, '5.jpg', '2018-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(4) NOT NULL,
  `url` varchar(30) COLLATE utf8_bin NOT NULL,
  `keyword` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `url`, `keyword`) VALUES
(5, 'modify.png', 'modify'),
(6, 'buy.png', 'buy'),
(7, 'repair.png', 'repair');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(4) NOT NULL,
  `url` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `url`, `description`) VALUES
(13, 'facebook.com', NULL),
(14, 'twitter.com', NULL),
(15, 'plus.google.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `subject` varchar(60) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `gender` varchar(1) COLLATE utf8_bin NOT NULL,
  `resiveImages` tinyint(1) DEFAULT NULL,
  `resivePromotions` tinyint(1) DEFAULT NULL,
  `resiveUpdates` tinyint(1) DEFAULT NULL,
  `resiveJobOffers` tinyint(1) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `subject`, `text`, `gender`, `resiveImages`, `resivePromotions`, `resiveUpdates`, `resiveJobOffers`, `date`) VALUES
(2, 'asda', 'ramazi15@mail.ru', 'asdas', 'asdads', 'm', 1, 1, 0, 0, '2018-05-24'),
(3, 'datu', 'd.gachechiladze123@gmail.com', 'sasadas', 'dddddddddddddddddddd\r\nddddddddddddddddddddddddddddd\r\ndddddddddddddddddddddddddddddddddd\r\n\r\ndddddddddddddddddddddddddddd\r\ndddddddddddddddddddddddddddddddddd\r\ndddddddddddddddddddddddddd\r\nddddddddddddddddddddddddddddddddd\r\nddddddddddddddddd\r\ndddddddddddddddddddddd\r\ndddddddddddddddddddddddddddddddddddd\r\n', 'f', 1, 1, 0, 0, '2018-05-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
