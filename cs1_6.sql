-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 07:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs1.6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SNo` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SNo`, `username`, `password`) VALUES
(1, 'kali', 'kali'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `SNo` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `TableNo` int(11) NOT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`SNo`, `Name`, `Email`, `Phone`, `TableNo`, `Message`, `Date_Time`) VALUES
(2, 'Prakash Mahara', 'prakashmahara2076@gmail.com', '1234567890', 2, 'Kei vannu xaina;', '2024-01-28 11:54:04'),
(5, 'Ashok Bhujel', 'prakashmahara2077@gmail.com', '9809744015', 3, 'okkk', '2024-02-27 07:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `SNo` int(100) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`SNo`, `Name`, `Email`, `Subject`, `Message`) VALUES
(3, 'Eron Khadka', 'rorawe8019@jucatyo.com', 'First Attempt', ' Hello Mama!'),
(4, 'Prakash Mahara', 'lowabo8942@visignal.com', 'First Attempt', ' okey sir;'),
(7, 'Sushil Mishra', 'mishra@gmail.com', 'About free gift', ' Hello Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `vacant_table`
--

CREATE TABLE `vacant_table` (
  `SNo` int(100) NOT NULL,
  `TableNo` int(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacant_table`
--

INSERT INTO `vacant_table` (`SNo`, `TableNo`, `status`) VALUES
(1, 1, 'booked'),
(2, 2, 'booked'),
(3, 3, 'booked'),
(4, 4, 'vacant'),
(5, 5, 'vacant'),
(6, 6, 'vacant'),
(7, 7, 'vacant'),
(8, 8, 'vacant'),
(14, 9, 'vacant'),
(15, 10, 'vacant'),
(16, 105, 'vacant'),
(17, 110, 'vacant'),
(19, 110, 'vacant'),
(20, 2100, 'vacant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `vacant_table`
--
ALTER TABLE `vacant_table`
  ADD PRIMARY KEY (`SNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `SNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vacant_table`
--
ALTER TABLE `vacant_table`
  MODIFY `SNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
