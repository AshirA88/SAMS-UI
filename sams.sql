-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2022 at 06:14 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `rollno` int(16) DEFAULT NULL,
  `accuracy` int(16) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`rollno`, `accuracy`, `timestamp`) VALUES
(9, 95, '2022-05-24 12:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `fpstore`
--

CREATE TABLE `fpstore` (
  `roll` int(100) DEFAULT NULL,
  `id` int(100) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpstore`
--

INSERT INTO `fpstore` (`roll`, `id`, `hash`) VALUES
(11, 11, '8dfa090ee069a9b36fad8e273845a0b9495eb631337190a7f97c931ba4ccebe7');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(255) DEFAULT NULL,
  `Attende` int(255) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `Attende`, `Timestamp`) VALUES
(0, 1, '2022-05-06 09:40:05'),
(1, 1, '2022-05-06 09:40:05'),
(0, 1, '2022-05-06 09:40:09'),
(1, 1, '2022-05-06 09:40:09'),
(2, 1, '2022-05-06 09:59:25'),
(2, 1, '2022-05-06 09:59:26'),
(3, 1, '2022-05-06 10:00:34'),
(4, 0, '2022-05-06 10:01:50'),
(5, 0, '2022-05-06 10:10:50'),
(6, 0, '2022-05-06 11:32:03'),
(7, 1, '2022-05-06 13:03:02'),
(8, 0, '2022-05-06 13:22:51'),
(9, 1, '2022-05-06 13:48:13'),
(10, 0, '2022-05-06 13:50:31'),
(2, 1, '2022-05-06 13:56:15'),
(3, 1, '2022-05-06 14:02:00'),
(2, 1, '2022-05-07 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `UserType` varchar(10) DEFAULT NULL,
  `TimeOfCreation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `Password`, `UserType`, `TimeOfCreation`) VALUES
(1, 'admin', 'admin', 'A', '2022-03-30 07:06:41'),
(12, 'admin', 'admin@123', 'A', '2022-04-01 06:13:26'),
(14, 'sample', 'sample123', 'S', '2022-04-01 07:02:59'),
(15, 'teacher', 'teacher', 'T', '2022-04-16 11:31:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
