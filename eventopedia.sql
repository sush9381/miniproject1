-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 11:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventopedia`
--
CREATE DATABASE IF NOT EXISTS `eventopedia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eventopedia`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(2) NOT NULL DEFAULT 'm',
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contact`, `dob`, `gender`, `email`, `password`, `time`) VALUES
(1, 'sourav gupta', 9622112463, '1999-04-08', 'm', 'souravgupta959@gmail.com', '12345678', '2020-04-25 20:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `details` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sportsType` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `aid`, `name`, `date`, `venue`, `price`, `details`, `photo`, `sportsType`, `status`, `time`) VALUES
(11, 1, 'Cricket', '2020-04-30', 'LDCE cricket ground', 50, 't-10 matches is going to be held with 11 players team on one side.', 'documents/c.jpg', 'cricket', 'pending', '2020-04-25 20:59:21'),
(12, 1, 'Football', '2020-05-26', 'LDCE civil lawn', 50, '7 players team will play soccer', 'documents/f.png', 'football', 'pending', '2020-04-25 21:01:10'),
(13, 1, 'Badminton', '2020-02-19', 'LDCE badminton court', 30, 'Singles badminton matches of both boys and girls of aged under 35', 'documents/b.jpg', 'badminton', 'approved', '2020-04-25 21:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `eventregistered`
--

DROP TABLE IF EXISTS `eventregistered`;
CREATE TABLE `eventregistered` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventregistered`
--

INSERT INTO `eventregistered` (`id`, `uid`, `eid`, `status`, `time`) VALUES
(1, 2, 13, 'approved', '2020-04-25 21:15:38'),
(2, 4, 13, 'approved', '2020-04-25 21:17:51'),
(3, 1, 13, 'approved', '2020-04-25 21:18:17'),
(4, 3, 13, 'approved', '2020-04-25 21:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(2) NOT NULL DEFAULT 'm',
  `contact` bigint(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `DOB`, `gender`, `contact`, `email`, `password`, `time`) VALUES
(1, 'Payal', '2020-04-25', 'f', 4567894561, 'payal@gmail.com', '123456', '2020-04-25 20:00:14'),
(2, 'nirali', '2020-04-25', 'f', 4545454563, 'nirali@gmail.com', '123456', '2020-04-25 20:14:44'),
(3, 'himani', '2020-04-25', 'f', 7852125634, 'himani@gmail.com', '123456', '2020-04-25 20:16:29'),
(4, 'deepak', '2020-04-25', 'm', 7002548963, 'deepak@gmail.com', '123456', '2020-04-25 20:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_c`
--

DROP TABLE IF EXISTS `user_c`;
CREATE TABLE `user_c` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `location` varchar(70) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_c`
--

INSERT INTO `user_c` (`id`, `uid`, `eid`, `location`, `time`) VALUES
(3, 1, 13, 'documents/Payal.png', '2020-04-25 21:23:32'),
(4, 2, 13, 'documents/Nirali.png', '2020-04-25 21:23:48'),
(5, 3, 13, 'documents/himani.png', '2020-04-25 21:24:03'),
(6, 4, 13, 'documents/Deepak.png', '2020-04-25 21:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `validation_certificate`
--

DROP TABLE IF EXISTS `validation_certificate`;
CREATE TABLE `validation_certificate` (
  `uid` int(11) NOT NULL,
  `location` varchar(60) DEFAULT NULL,
  `level` varchar(60) NOT NULL DEFAULT 'Inter-College',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validation_certificate`
--

INSERT INTO `validation_certificate` (`uid`, `location`, `level`, `time`) VALUES
(1, 'documents/payal_v.pdf', 'Regional', '2020-04-25 20:00:14'),
(2, NULL, 'Inter-College', '2020-04-25 20:14:44'),
(3, NULL, 'Inter-College', '2020-04-25 20:16:29'),
(4, NULL, 'Inter-College', '2020-04-25 20:17:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `eventregistered`
--
ALTER TABLE `eventregistered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_c`
--
ALTER TABLE `user_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `validation_certificate`
--
ALTER TABLE `validation_certificate`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eventregistered`
--
ALTER TABLE `eventregistered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_c`
--
ALTER TABLE `user_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `eventregistered`
--
ALTER TABLE `eventregistered`
  ADD CONSTRAINT `eventregistered_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `eventregistered_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `event` (`id`);

--
-- Constraints for table `user_c`
--
ALTER TABLE `user_c`
  ADD CONSTRAINT `user_c_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_c_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `event` (`id`);

--
-- Constraints for table `validation_certificate`
--
ALTER TABLE `validation_certificate`
  ADD CONSTRAINT `validation_certificate_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
