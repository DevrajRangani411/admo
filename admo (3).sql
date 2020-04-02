-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 07:30 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admo`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ad_id` int(5) NOT NULL,
  `ad_image` varchar(100) NOT NULL,
  `ad_title` varchar(100) NOT NULL,
  `ad_description` varchar(500) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `ad_status` tinyint(2) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ad_web` varchar(30) DEFAULT NULL,
  `ad_approved` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ad_id`, `ad_image`, `ad_title`, `ad_description`, `UserId`, `ad_status`, `timestamp`, `ad_web`, `ad_approved`) VALUES
(3, 'images.jpg', 'Shop D', 'First Ad', NULL, 1, '2020-03-31 09:27:29', 'd.com', 1),
(4, 'images.jpg', 'Ad 1', 'AD Desc', NULL, 1, '2020-03-30 17:50:25', 'ad.com', 1),
(5, 'images.jpg', 'AD 1', 'AD 1 Description Written Here.', NULL, 1, '2020-03-29 13:13:07', 'www.ad1.com', 0),
(6, 'images.jpg', 'D', 'ddfghj', 1, 1, '2020-03-29 13:47:59', 'www.d.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `c_id` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `coin` int(10) NOT NULL,
  `voucher` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`c_id`, `UserId`, `coin`, `voucher`, `status`) VALUES
(2, 1, 100, 'PGHCT6KM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `re_id` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `money` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `UserId` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`UserId`, `ad_id`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `MobileNumber` decimal(12,0) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `ad_id` int(10) DEFAULT NULL,
  `w_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `password`, `MobileNumber`, `EmailAddress`, `ad_id`, `w_id`) VALUES
(1, 'admin', 'ADMO', '123', '4567891230', 'admin@admo.com', NULL, NULL),
(2, 'Aniket', 'Rupapara', '123', '8200485751', 'a@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `w_id` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `coin` int(10) NOT NULL,
  `transection_history` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`w_id`, `UserId`, `coin`, `transection_history`) VALUES
(1, 1, 49900, 100),
(2, 2, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet1`
--

CREATE TABLE `wallet1` (
  `id` int(2) NOT NULL,
  `UserId` int(10) NOT NULL,
  `coin` int(10) NOT NULL,
  `transection_history` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet1`
--

INSERT INTO `wallet1` (`id`, `UserId`, `coin`, `transection_history`) VALUES
(1, 1, 100, 100),
(2, 2, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wi_id` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `ad_image` varchar(50) NOT NULL,
  `ad_title` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wi_id`, `ad_id`, `ad_image`, `ad_title`, `status`, `UserId`) VALUES
(1, 3, 'images.jpg', 'Shop D', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `wallet1`
--
ALTER TABLE `wallet1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ad_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet1`
--
ALTER TABLE `wallet1`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
