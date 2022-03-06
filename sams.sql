-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 10:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `TimeOfUpdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `name_fk` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `UserName`, `Password`, `TimeOfUpdate`, `name_fk`) VALUES
(1, 'ashir', 'ashir', '2022-02-23 13:17:41', 0),
(2, 'atharva', 'atharva', '2022-02-23 13:17:41', 0),
(3, 'rohit', 'rohit', '2022-02-23 13:18:09', 0),
(4, 'manali', 'manali', '2022-02-23 13:18:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `Name` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `PRN` int(12) NOT NULL,
  `Mobile` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`Name`, `Email`, `PRN`, `Mobile`) VALUES
('rohit', 'rohitladdha26gmail.com', 1032181279, 9860687488),
('manali', 'manaligadiya1111@gmail.com', 1032180728, 9673791837);

-- --------------------------------------------------------

--
-- Table structure for table `stud_info`
--

CREATE TABLE `stud_info` (
  `name_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email_id` text NOT NULL,
  `PRN` mediumint(9) NOT NULL,
  `mobile_number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_fk` (`name_fk`);

--
-- Indexes for table `stud_info`
--
ALTER TABLE `stud_info`
  ADD PRIMARY KEY (`name_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
