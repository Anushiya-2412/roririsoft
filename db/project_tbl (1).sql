-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 01:42 PM
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
-- Database: `db_roriri`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

CREATE TABLE `project_tbl` (
  `project_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `programming` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`programming`)),
  `developers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`developers`)),
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `duration` int(11) NOT NULL,
  `inital_pay` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `pay_status` enum('Pending','Completed') NOT NULL DEFAULT 'Pending',
  `project_status` enum('Old','New','In Progress') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_tbl`
--
ALTER TABLE `project_tbl`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_tbl`
--
ALTER TABLE `project_tbl`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
