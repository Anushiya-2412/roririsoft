-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 01:24 PM
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
-- Table structure for table `academy_detail_tbl`
--

CREATE TABLE `academy_detail_tbl` (
  `academy_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `academy_year` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `academy_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `academy_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `additional_details_tbl`
--

CREATE TABLE `additional_details_tbl` (
  `ad_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `additional_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `aditional_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_details_tbl`
--

INSERT INTO `additional_details_tbl` (`ad_id`, `entity_id`, `stu_id`, `dob`, `email`, `phone`, `address`, `aadhar`, `additional_created_date`, `aditional_status`) VALUES
(1, 0, 1, '2001-01-17', 'yesubalans@roririsoft.com', '9344995037', 'Kalakad', '463689346511', '2024-06-10 12:13:30', 'Inactive'),
(2, 0, 2, '2002-01-24', 'jebastin@gmail.com', '9874563214', 'Kela Kalladi', '989745632146', '2024-06-15 14:18:09', 'Active'),
(3, 0, 3, '1995-02-14', 'jebarlin@gmail.com', '9789867842', 'kalakad', '5342465657567', '2024-06-18 12:40:58', 'Inactive'),
(4, 0, 4, '1997-07-06', 'jebarathi@gmail.com', '9789867842', 'kalakad', '275861786592', '2024-06-18 12:44:43', 'Inactive'),
(5, 0, 5, '2001-07-18', 'nicks@gmail.com', '9789867842', 'kalakad', '125478548665', '2024-06-18 12:55:11', 'Inactive'),
(6, 0, 6, '2003-03-20', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 13:01:58', 'Inactive'),
(7, 0, 7, '2002-07-01', 'dghkgh@gmail.com', '9789867842', 'kalakad', '457812458956', '2024-06-18 13:02:37', 'Inactive'),
(8, 0, 8, '2001-07-10', 'nicks@gmail.com', '9789867842', 'kalakad', '125478548665', '2024-06-18 14:57:20', 'Active'),
(9, 0, 9, '2004-03-18', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 15:09:02', 'Inactive'),
(10, 0, 10, '2024-06-18', 'dania@roriri.com', '67876856676575', 'Kalakad', '576876978945', '2024-06-18 15:09:44', 'Inactive'),
(11, 0, 11, '2003-03-20', 'roriri@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-18 16:08:41', 'Inactive'),
(12, 0, 12, '2024-06-01', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-20 14:20:17', 'Active'),
(13, 0, 13, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:42', 'Active'),
(14, 0, 14, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:44', 'Inactive'),
(15, 0, 15, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:44', 'Inactive'),
(16, 0, 16, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:46', 'Inactive'),
(17, 0, 17, '2024-06-11', 'dania@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 10:41:48', 'Inactive'),
(18, 0, 18, '2024-06-01', 'roriri@roriri.com', '6787685667435', 'Kalakad', '57687697894545', '2024-06-26 10:50:49', 'Active'),
(19, 0, 19, '2024-06-04', 'uma@roriri.com', '6787685667', 'Kalakad', '576876978945', '2024-06-26 11:02:09', 'Active'),
(20, 0, 20, '2024-06-07', 'durga@gmail.com', '5246434558', 'kalakad', '545424548517', '2024-06-28 14:32:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`user_id`, `name`, `username`, `pass`, `role`, `created_date`, `status`) VALUES
(1, 'Anushiya P', 'AnushiyaP', '923', 3, '2024-07-10 11:41:38', 'Active'),
(2, 'Vasanth M', 'VasanthM', '404', 3, '2024-07-10 11:53:18', 'Inactive'),
(3, 'Petchimuthu L', 'PetchimuthuL', '157', 6, '2024-07-10 12:50:11', 'Inactive'),
(4, ' ', '', '709', 0, '2024-07-10 14:19:15', 'Inactive'),
(5, ' ', '215', '753', 0, '2024-07-10 14:21:03', 'Inactive'),
(6, ' ', '664', '784', 0, '2024-07-10 14:24:02', 'Inactive'),
(7, 'Asha T', 'AshaT', '195', 8, '2024-07-10 14:29:07', 'Active'),
(8, 'Kings salem K', 'Kings salemK', '591', 10, '2024-07-11 15:50:52', 'Inactive'),
(9, 'MANISH  K', 'MANISH K', '598', 2, '2024-07-13 10:13:25', 'Active'),
(10, 'Chockalingam S', 'ChockalingamS', '161', 4, '2024-07-15 14:59:55', 'Active'),
(11, 'Sriramkumar M', 'SriramkumarM', '137', 9, '2024-07-15 16:14:43', 'Active'),
(12, 'MARIRAJ  R', 'MARIRAJ R', '997', 9, '2024-07-15 16:19:43', 'Active'),
(13, 'Siva Suresh', 'SivaSuresh', '802', 11, '2024-07-15 16:25:53', 'Active'),
(14, 'Premalatha A', 'PremalathaA', '894', 10, '2024-07-15 16:31:10', 'Active'),
(15, 'Durga s', 'Durgas', '252', 11, '2024-07-15 16:35:26', 'Active'),
(16, 'Surya Prabha  S', 'Surya Prabha S', '773', 8, '2024-07-15 16:42:22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assign_task_tbl`
--

CREATE TABLE `assign_task_tbl` (
  `at_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `at_status` enum('Pending','Completed') NOT NULL,
  `at_date` date NOT NULL DEFAULT current_timestamp(),
  `at_complete_date` date NOT NULL DEFAULT current_timestamp(),
  `at_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `at_updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_task_tbl`
--

INSERT INTO `assign_task_tbl` (`at_id`, `stu_id`, `task_id`, `syllabus_id`, `course_id`, `at_status`, `at_date`, `at_complete_date`, `at_created_date`, `at_updated_date`) VALUES
(1, 0, 0, 0, 0, '', '2024-06-24', '2024-06-24', '2024-06-24 11:13:19', '2024-06-24 05:43:19'),
(2, 1, 1, 1, 2, 'Pending', '2024-06-11', '2024-06-24', '2024-06-24 17:44:45', '2024-06-24 12:14:45'),
(3, 1, 1, 1, 2, 'Pending', '2024-06-12', '2024-06-24', '2024-06-24 17:47:56', '2024-06-24 12:17:56'),
(4, 1, 1, 1, 2, 'Pending', '2024-06-11', '2024-06-24', '2024-06-24 17:48:07', '2024-06-24 12:18:07'),
(5, 8, 1, 1, 2, 'Pending', '2024-06-13', '2024-06-12', '2024-06-25 09:51:57', '2024-06-25 04:21:57'),
(6, 1, 1, 1, 2, 'Pending', '2024-06-04', '2024-06-26', '2024-06-25 09:54:24', '2024-06-25 04:24:24'),
(7, 1, 1, 1, 2, 'Pending', '2024-06-13', '2024-06-16', '2024-06-25 09:54:42', '2024-06-25 04:24:42'),
(8, 3, 1, 1, 2, 'Pending', '2024-06-25', '2024-06-26', '2024-06-25 09:57:12', '2024-06-25 04:27:12'),
(9, 4, 1, 1, 2, 'Pending', '2024-06-25', '2024-06-26', '2024-06-25 10:25:54', '2024-06-25 04:55:54'),
(10, 5, 1, 1, 2, 'Pending', '2024-06-25', '2024-06-26', '2024-06-25 10:27:36', '2024-06-25 04:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `atd_id` int(11) NOT NULL,
  `atd_report` longtext NOT NULL,
  `atd_date` date NOT NULL,
  `atd_status` enum('Active','Inactive') NOT NULL,
  `atd_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `atd_updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(11) DEFAULT NULL,
  `Category_type` varchar(50) NOT NULL,
  `category_status` enum('Active','Inactive','','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `Category_type`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Employee', 'Active', '2024-06-06 12:50:32', '2024-06-06 12:50:32'),
(2, 'Client', 'Active', '2024-06-06 12:50:32', '2024-06-06 12:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `client_tbl`
--

CREATE TABLE `client_tbl` (
  `client_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_company` varchar(100) NOT NULL,
  `client_location` varchar(100) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_phone` varchar(11) NOT NULL,
  `client_gst` varchar(30) NOT NULL,
  `client_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `client_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `client_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_tbl`
--

INSERT INTO `client_tbl` (`client_id`, `entity_id`, `client_name`, `client_company`, `client_location`, `client_email`, `client_phone`, `client_gst`, `client_status`, `client_created_date`, `client_updated_date`) VALUES
(1, 1, 'RORIRI Software Solutions', 'RORIRI Software Solutions', 'Kalakad', 'roririsoft@roriri.com', '8907896786', '3456', 'Active', '2024-07-12 12:16:46', '2024-07-12 07:30:19'),
(2, 1, 'dummy', 'dummy', 'gfd', 'ddfg@gffg.com', '6789065342', '345', 'Inactive', '2024-07-12 13:02:44', '2024-07-12 07:34:35'),
(3, 1, 'JENO', 'JENO ', 'Chennai', 'jeno@gmail.com', '6789065342', 'aax4', 'Active', '2024-07-12 14:25:53', '2024-07-12 08:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `course_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_fees_3` int(11) NOT NULL,
  `course_fees_6` int(11) NOT NULL,
  `course_fees_12` int(11) NOT NULL,
  `course_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `course_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`course_id`, `entity_id`, `course_name`, `course_fees_3`, `course_fees_6`, `course_fees_12`, `course_status`, `course_created_date`) VALUES
(1, 1, 'Internship', 15000, 30000, 0, 'Active', '2024-06-06 13:27:48'),
(2, 3, 'Full Stack Development', 20000, 45000, 90000, 'Active', '2024-06-06 13:28:15'),
(3, 3, 'Testing', 15000, 25000, 0, 'Active', '2024-06-06 13:28:56'),
(4, 3, 'Devops', 15000, 30000, 0, 'Active', '2024-06-06 13:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `emp_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `emp_first_name` varchar(50) NOT NULL,
  `emp_last_name` varchar(50) NOT NULL,
  `emp_gender` enum('Male','Female') NOT NULL,
  `emp_role` int(11) NOT NULL,
  `emp_user_id` int(11) NOT NULL,
  `emp_img` varchar(50) NOT NULL,
  `emp_qr` varchar(50) NOT NULL,
  `emp_aadhar` varchar(50) NOT NULL,
  `emp_pan` varchar(50) NOT NULL,
  `emp_bank` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `emp_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `emp_married_status` enum('Married','Unmarried') NOT NULL DEFAULT 'Unmarried'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`emp_id`, `employee_id`, `entity_id`, `emp_first_name`, `emp_last_name`, `emp_gender`, `emp_role`, `emp_user_id`, `emp_img`, `emp_qr`, `emp_aadhar`, `emp_pan`, `emp_bank`, `created_date`, `updated_date`, `emp_status`, `emp_married_status`) VALUES
(1, 180011, 1, 'Anushiya', 'P', 'Female', 8, 1, 'AnushiyaP.png', '', '', '', '', '2024-07-10 11:41:38', '2024-07-15 11:22:49', 'Active', 'Unmarried'),
(2, 180002, 1, 'Vasanth', 'M', 'Male', 8, 2, 'VasanthM.png', '', '', '', '', '2024-07-10 11:53:18', '2024-07-15 11:24:27', 'Active', 'Unmarried'),
(3, 180003, 1, 'Petchimuthu', 'L', 'Male', 6, 3, 'PetchimuthuL.jpg', '', '', '', '', '2024-07-10 12:50:11', '2024-07-13 04:33:18', 'Active', 'Married'),
(4, 180004, 1, '', '', '', 0, 4, '.jpg', '', '', '', '', '2024-07-10 14:19:15', '2024-07-10 09:13:46', 'Inactive', ''),
(5, 180005, 1, '', '', '', 0, 5, '', '', '', '', '', '2024-07-10 14:21:03', '2024-07-10 09:13:48', 'Inactive', ''),
(6, 180006, 1, '', '', '', 0, 6, '', '', '', '', '', '2024-07-10 14:24:02', '2024-07-10 09:13:50', 'Inactive', ''),
(7, 180007, 1, 'Asha', 'T', 'Female', 8, 7, 'AshaT.png', '', '', '', '', '2024-07-10 14:29:07', '2024-07-13 04:33:27', 'Active', 'Unmarried'),
(8, 180008, 1, 'King salem', 'S', 'Male', 10, 8, '', '', '', '', '', '2024-07-11 15:50:52', '2024-07-15 09:33:52', 'Active', 'Unmarried'),
(9, 180009, 1, 'MANISH ', 'K', 'Male', 12, 9, '', '', '', '', '', '2024-07-13 10:13:25', '2024-07-13 04:44:48', 'Active', 'Unmarried'),
(10, 180010, 1, 'Chockalingam', 'S', 'Male', 4, 10, 'ChockalingamS.png', '', '', '', '', '2024-07-15 14:59:55', '2024-07-15 09:30:57', 'Active', 'Married'),
(11, 180024, 1, 'Sriramkumar', 'M', 'Male', 9, 11, '', '', '', '', '', '2024-07-15 16:14:43', '2024-07-15 11:22:44', 'Active', 'Unmarried'),
(12, 180030, 1, 'MARIRAJ ', 'R', 'Male', 9, 12, '', '', '', '', '', '2024-07-15 16:19:43', '2024-07-15 11:23:34', 'Active', 'Unmarried'),
(13, 180013, 1, 'Siva', 'Suresh', 'Male', 11, 13, '', '', '', '', '', '2024-07-15 16:25:53', '2024-07-15 10:55:53', 'Active', 'Unmarried'),
(14, 180014, 1, 'Premalatha', 'A', 'Female', 10, 14, '', '', '', '', '', '2024-07-15 16:31:10', '2024-07-15 11:01:10', 'Active', 'Unmarried'),
(15, 180015, 1, 'Durga', 's', 'Female', 11, 15, '', '', '', '', '', '2024-07-15 16:35:26', '2024-07-15 11:05:26', 'Active', 'Unmarried'),
(16, 180016, 1, 'Surya Prabha ', 'S', 'Female', 8, 16, '', '', '', '', '', '2024-07-15 16:42:22', '2024-07-15 11:12:22', 'Active', 'Unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `emp_additional_tbl`
--

CREATE TABLE `emp_additional_tbl` (
  `add_tbl_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_personal_email` varchar(30) NOT NULL,
  `emp_company_email` varchar(40) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_pay_role` int(11) NOT NULL,
  `emp_joining_date` date NOT NULL,
  `emp_mobile` varchar(10) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_additional_tbl`
--

INSERT INTO `emp_additional_tbl` (`add_tbl_id`, `emp_id`, `emp_personal_email`, `emp_company_email`, `emp_dob`, `emp_pay_role`, `emp_joining_date`, `emp_mobile`, `emp_address`, `emp_created_date`, `emp_status`) VALUES
(1, 1, 'anushiyapaulraj24@gmail.com', 'anushyap@roririsoft.com', '2001-12-24', 10000, '2024-06-03', '8056775934', 'Kalakad', '2024-07-10 11:41:38', 'Active'),
(2, 2, 'vasanth@gmail.com', 'vasanth@roririsoft.com', '2001-11-02', 10000, '2024-06-03', '9894688091', 'Kallikulam', '2024-07-10 11:53:18', 'Inactive'),
(3, 3, 'lpm20180@gmail.com', 'petchimuthu@roririsoft.com', '1997-05-27', 10000, '2024-06-22', '9384122396', 'Tirunelveli', '2024-07-10 12:50:11', 'Inactive'),
(4, 4, '', '', '0000-00-00', 0, '0000-00-00', '', '', '2024-07-10 14:19:15', 'Inactive'),
(5, 5, '', '', '0000-00-00', 0, '0000-00-00', '', '', '2024-07-10 14:21:03', 'Inactive'),
(6, 6, '', '', '0000-00-00', 0, '0000-00-00', '', '', '2024-07-10 14:24:02', 'Inactive'),
(7, 7, 'ghfgg@gfgf.com', 'ashaT@roririsoft.com', '2024-07-02', 10000, '2024-07-09', '8610350023', 'Kalakad', '2024-07-10 14:29:07', 'Active'),
(8, 8, 'kingshalem47@gmail.com', 'kingsalem@roririsoft.com', '2001-11-02', 15000, '2024-07-01', '7538877737', '499/54 goldennagar, kallidaikurichi - 627416\r\ntirunelveli', '2024-07-11 15:50:52', 'Inactive'),
(9, 9, 'manishkvignesh@gmail.com', 'manishk@roririsoft', '2003-01-27', 15000, '2024-06-26', '8838742425', '6/6,SOUTH STREET,\r\nVENKATESWARAPURAM,\r\nALANGULAM TALUK,\r\nTENKASI DISTRICT,\r\nPINCODE- 627854 ', '2024-07-13 10:13:25', 'Active'),
(10, 10, 'chocksubash@gmail.com', 'chockalingam@roririsoft.com', '1994-03-20', 10000, '2023-10-01', '9884861066', '96, Parvathy Illam, Nanguneri Main Road, Near EB Office, Padalaiyarkulam, Kalakad.', '2024-07-15 14:59:55', 'Active'),
(11, 11, 'sriramkumarbe.77@gmail.com', 'sriramkumar@roririsoft.com', '2002-09-10', 15000, '2024-06-14', '7604498411', '3/181 papanasam main road, 2nd St, KizhaAmbur, Tenkasi Dist.627418', '2024-07-15 16:14:43', 'Active'),
(12, 12, 'marirajr45.inbox@gmail.com', 'mariraj@roririsoft.com', '2002-12-13', 15000, '2024-06-15', '7010799533', '420,Ganpathi mill colony ,Sankarnagar Tirunelveli 627357', '2024-07-15 16:19:43', 'Active'),
(13, 13, 'sureshsaravananofficial@gmail.', 'sivasuresh@roririsoft.com', '2002-11-15', 15000, '2024-06-15', '9486119547', '20A/1 North road street cheranmahadevi.', '2024-07-15 16:25:53', 'Active'),
(14, 14, 'premalatha110503@gmail.com', 'premalatha@rorisoft.com', '2003-05-11', 15000, '2024-06-29', '9361232153', '5/185 Nadar Street, Mela Kuniyoor, Kaarukurichi, Cheranmahadevi, Tirunelveli-627417.', '2024-07-15 16:31:10', 'Active'),
(15, 15, 'durgadurga19675@gmail.com', 'durgas@roririsoft.com', '2001-10-08', 15000, '2024-06-15', '8618230500', 'no 216,karmehanar street,perambu paguthi,sivanthipatti', '2024-07-15 16:35:26', 'Active'),
(16, 16, 'suryaprabha28s@gmail.com', 'suryaprabha@roririsoft.com', '2002-08-28', 15000, '2024-07-01', '6369347439', '136, Karthikara street, keela kadayam, Tenkasi', '2024-07-15 16:42:22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `entity_tbl`
--

CREATE TABLE `entity_tbl` (
  `entity_id` int(11) NOT NULL,
  `entity_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_tbl`
--

INSERT INTO `entity_tbl` (`entity_id`, `entity_name`) VALUES
(1, 'RORIRI SOFTWARE SOLUTIONS '),
(2, 'NEXGEN IT COLLEGE'),
(3, 'NEXGEN IT ACADEMY'),
(4, 'RORIRI FOUNDATION'),
(5, 'RORIRI GROUPS'),
(6, 'RIYA IAS ACADEMY'),
(7, 'ROSHAN TILES'),
(8, 'RITHISH FARMS'),
(9, 'RIYA INFO SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `inv_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `invoice_dateile` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`invoice_dateile`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `entity_id`, `invoice_dateile`) VALUES
(1, 1, '{\"Name\":\"vasanth M\",\"Address\":\"1/117 D vadukachiMathil\",\"MobileNo\":\"09789867842\",\"gstno\":\"787894\",\"gst\":\"IGST\",\"ssncode\":[\"001\",\"002\",\"003\"],\"Technologies\":[\"Website Development\",\"Website Development\",\"Website Development\"],\"Particulars\":[\"4\",\"2\",\"3\"],\"Amount\":[\"5154\",\"2000\",\"5000\"]}'),
(2, 1, '{\"Name\":\"anushiya\",\"Address\":\"kalakad\",\"MobileNo\":\"7878949\",\"gstno\":\"das5454\",\"gst\":\"IGST\",\"ssncode\":[\"002\"],\"Technologies\":[\"Website Development\"],\"Particulars\":[\"4\"],\"Amount\":[\"8941\"]}'),
(3, 1, '{\"Name\":\"anushiya\",\"Address\":\"kalakad\",\"MobileNo\":\"7878949\",\"gstno\":\"das5454\",\"gst\":\"IGST\",\"ssncode\":[\"002\"],\"Technologies\":[\"Website Development\"],\"Particulars\":[\"4\"],\"Amount\":[\"8941\"]}'),
(4, 1, '{\"Name\":\"Riya Infosystems\",\"Address\":\"1\\/117 D vadukachiMathil\",\"MobileNo\":\"09789867842\",\"gstno\":\"787894\",\"gst\":\"SGST-CGST\",\"ssncode\":[\"003\"],\"Technologies\":[\"\"],\"Particulars\":[\"4\"],\"Amount\":[\"8949\"]}'),
(5, 1, '{\"Name\":\"rajkumar\",\"Address\":\"1\\/117 D vadukachiMathil\",\"MobileNo\":\"09789867842\",\"gstno\":\"787894\",\"gst\":\"SGST-CGST\",\"ssncode\":[\"984189\"],\"Technologies\":[\"Website Development\"],\"Particulars\":[\"2\"],\"Amount\":[\"94951\"]}'),
(6, 1, '{\"Name\":\"rajkumar\",\"Address\":\"1\\/117 D vadukachiMathil\",\"MobileNo\":\"09789867842\",\"gstno\":\"787894\",\"gst\":\"SGST-CGST\",\"ssncode\":[\"984189\"],\"Technologies\":[\"Website Development\"],\"Particulars\":[\"2\"],\"Amount\":[\"94951\"]}'),
(7, 1, '{\"Name\":\"RORIRI\",\"Address\":\"RORIRI IT PARK,NALLANATHAPURAM,KALAKAD\",\"MobileNo\":\"09789867842\",\"gstno\":\"787894\",\"gst\":\"IGST\",\"ssncode\":[\"65485\"],\"Technologies\":[\"Website Development\"],\"Particulars\":[\"2\"],\"Amount\":[\"5151\"]}'),
(8, 3, '{\"Name\":\"Yesu Balan\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"7894561231\",\"gst\":\"IGST\",\"Technologies\":null,\"Particulars\":null,\"Amount\":null}'),
(9, 3, '{\"Name\":\"Yesu Balan\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"7894561231\",\"gst\":\"SGST-CGST\",\"Technologies\":[\"web development\"],\"Particulars\":[\"6 months\"],\"Amount\":[\"45000\"]}'),
(10, 3, '{\"Name\":\"Yesu Balan\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"7894561231\",\"gst\":\"SGST-CGST\",\"Technologies\":[\"web development\"],\"Particulars\":[\"6 months\"],\"Amount\":[\"45000\"]}'),
(11, 3, '{\"Name\":\"Yesu Balan\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"4563217896\",\"Technologies\":[\"web development\"],\"Particulars\":[\"6\"],\"Amount\":[\"45000\"]}'),
(12, 3, '{\"Name\":\"Jestin\",\"Address\":\"kalladi\",\"MobileNo\":\"7896541234\",\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"5 years\"],\"Amount\":[\"500000\"]}'),
(13, 3, '{\"Name\":\"Muthu\",\"Address\":\"kalakad\",\"MobileNo\":\"654789321\",\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"6 Months\"],\"Amount\":[\"45000\"]}'),
(14, 3, '{\"Name\":\"Jestin\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"4849494598\",\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"6 Months\"],\"Amount\":[\"45000\"]}'),
(15, 0, '{\"Name\":\"Yesu Balan\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"5494548\",\"gstno\":\"gst54654Sajf\",\"gst\":\"SGST-CGST\",\"ssncode\":[\"4444\"],\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"2\"],\"Amount\":[\"5485\"]}'),
(16, 3, '{\"Name\":\"Tamil Mani\",\"Address\":\"kovilpathu,kalakad,tirunelveli\",\"MobileNo\":\"78654914265\",\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"6 Months\"],\"Amount\":[\"45000\"]}'),
(17, 3, '{\"Name\":\"Jebarlin\",\"Address\":\"kalakad\",\"MobileNo\":\"789465135\",\"Technologies\":[\"Full Stack developer\"],\"Particulars\":[\"6 Months\"],\"Amount\":[\"45000\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history_tbl`
--

CREATE TABLE `payment_history_tbl` (
  `pay_his_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `history_payment_date` date NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `payment_method` enum('Cash','Online Payment','Net Banking') NOT NULL,
  `history_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_history_tbl`
--

INSERT INTO `payment_history_tbl` (`pay_his_id`, `pay_id`, `history_payment_date`, `pay_amount`, `payment_method`, `history_created_date`) VALUES
(1, 1, '2024-05-23', 15000, 'Cash', '2024-06-10 12:16:02'),
(2, 1, '2024-06-15', 1000, 'Cash', '2024-06-15 13:01:07'),
(3, 11, '2024-06-18', 1000, 'Cash', '2024-06-18 16:12:57'),
(4, 8, '2024-06-20', 1000, 'Cash', '2024-06-18 16:31:58'),
(5, 12, '0000-00-00', 1000, 'Cash', '2024-06-20 14:20:57'),
(6, 8, '2024-06-21', 5000, 'Cash', '2024-06-21 16:47:32'),
(7, 12, '0000-00-00', 1000, 'Online Payment', '2024-06-28 12:24:38'),
(8, 8, '2024-06-27', 1000, 'Cash', '2024-06-28 14:47:57'),
(9, 8, '2024-06-28', 1000, 'Cash', '2024-06-28 14:55:46'),
(10, 8, '2024-06-28', 1000, 'Cash', '2024-06-28 14:56:45'),
(11, 20, '2024-06-01', 5000, 'Cash', '2024-06-28 15:57:19'),
(12, 20, '2024-06-28', 5000, 'Cash', '2024-06-28 16:00:17'),
(13, 8, '2024-06-29', 1000, 'Cash', '2024-06-29 12:47:15'),
(14, 12, '2024-06-29', 1000, 'Cash', '2024-06-29 13:49:17'),
(15, 8, '2024-06-29', 1000, 'Cash', '2024-06-29 13:49:26'),
(16, 8, '2024-06-29', 1000, 'Cash', '2024-06-29 13:49:41'),
(17, 20, '2024-06-29', 1000, 'Online Payment', '2024-06-29 14:00:08'),
(18, 20, '2024-06-29', 14000, 'Online Payment', '2024-06-29 14:00:38'),
(19, 8, '2024-06-29', 33000, 'Online Payment', '2024-06-29 14:01:26'),
(20, 12, '2024-06-29', 17000, 'Cash', '2024-06-29 14:41:17'),
(21, 13, '2024-06-29', 15000, 'Cash', '2024-06-29 16:55:56'),
(22, 18, '2024-06-29', 30000, 'Cash', '2024-06-29 17:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `pay_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `amount_received` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `pay_status` enum('Paid','Unpaid','Partially Paid') NOT NULL DEFAULT 'Unpaid',
  `payment_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`pay_id`, `stu_id`, `charge`, `amount_received`, `payment_date`, `pay_status`, `payment_created_date`, `payment_updated_date`, `payment_status`) VALUES
(1, 1, 90000, 200, '0000-00-00', 'Partially Paid', '2024-06-10 12:13:30', '2024-06-29 11:24:36', 'Inactive'),
(2, 2, 30000, 0, '0000-00-00', 'Unpaid', '2024-06-15 14:18:09', '2024-06-18 10:50:14', 'Inactive'),
(3, 3, 90000, 0, '0000-00-00', 'Unpaid', '2024-06-18 12:40:58', '2024-06-18 10:51:07', 'Inactive'),
(4, 4, 90000, 0, '0000-00-00', 'Unpaid', '2024-06-18 12:44:43', '2024-06-18 10:51:13', 'Inactive'),
(5, 5, 45000, 0, '0000-00-00', 'Unpaid', '2024-06-18 12:55:11', '2024-06-18 10:51:17', 'Inactive'),
(6, 6, 30000, 0, '0000-00-00', 'Unpaid', '2024-06-18 13:01:58', '2024-06-18 10:51:21', 'Inactive'),
(7, 7, 45000, 0, '0000-00-00', 'Unpaid', '2024-06-18 13:02:37', '2024-06-18 10:51:03', 'Inactive'),
(8, 8, 45000, 45000, '0000-00-00', 'Partially Paid', '2024-06-18 14:57:20', '2024-06-29 08:31:26', 'Active'),
(9, 9, 30000, 0, '0000-00-00', 'Unpaid', '2024-06-18 15:09:02', '2024-06-18 09:39:56', 'Inactive'),
(10, 10, 30000, 0, '0000-00-00', 'Unpaid', '2024-06-18 15:09:44', '2024-06-18 09:39:50', 'Inactive'),
(11, 11, 20000, 1000, '0000-00-00', 'Unpaid', '2024-06-18 16:08:41', '2024-06-18 10:52:30', 'Inactive'),
(12, 12, 20000, 20000, '0000-00-00', 'Partially Paid', '2024-06-20 14:20:17', '2024-06-29 09:11:17', 'Active'),
(13, 13, 15000, 15000, '0000-00-00', 'Partially Paid', '2024-06-26 10:41:42', '2024-06-29 11:25:56', 'Active'),
(14, 14, 15000, 0, '0000-00-00', 'Unpaid', '2024-06-26 10:41:44', '2024-06-26 05:12:46', 'Inactive'),
(15, 15, 15000, 0, '0000-00-00', 'Unpaid', '2024-06-26 10:41:44', '2024-06-26 05:12:43', 'Inactive'),
(16, 16, 15000, 0, '0000-00-00', 'Unpaid', '2024-06-26 10:41:46', '2024-06-26 05:19:31', 'Inactive'),
(17, 17, 15000, 0, '0000-00-00', 'Unpaid', '2024-06-26 10:41:48', '2024-06-26 05:19:24', 'Inactive'),
(18, 18, 30000, 30000, '0000-00-00', 'Paid', '2024-06-26 10:50:49', '2024-06-29 11:39:28', 'Active'),
(19, 19, 30000, 0, '0000-00-00', 'Unpaid', '2024-06-26 11:02:09', '2024-06-26 05:32:09', 'Active'),
(20, 20, 25000, 25000, '0000-00-00', 'Partially Paid', '2024-06-28 14:32:38', '2024-06-29 08:30:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `position_tbl`
--

CREATE TABLE `position_tbl` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `position_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position_tbl`
--

INSERT INTO `position_tbl` (`position_id`, `position_name`, `position_status`, `created_date`) VALUES
(1, 'MD', 'Active', '2024-07-09 16:36:02'),
(2, 'CEO', 'Active', '2024-07-09 16:36:11'),
(3, 'CTO', 'Active', '2024-07-09 16:53:43'),
(4, 'Business Analyst', 'Active', '2024-07-09 16:53:51'),
(5, 'HR', 'Active', '2024-07-09 16:54:09'),
(6, 'Project Manager', 'Active', '2024-07-09 16:54:25'),
(7, 'Senior Developer', 'Active', '2024-07-09 16:54:38'),
(8, 'JR. Developer', 'Active', '2024-07-09 16:54:48'),
(9, 'UI/UX Designer', 'Active', '2024-07-09 16:55:23'),
(10, 'Digital Marketing ', 'Active', '2024-07-09 16:56:05'),
(11, 'Trainer', 'Active', '2024-07-09 16:56:12'),
(12, 'Client Relations Manager', 'Active', '2024-07-13 10:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_amount`
--

CREATE TABLE `project_amount` (
  `pro_amt_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amnt_received` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_mode` enum('Cash','Net Banking','Online Payment','Cheque') NOT NULL,
  `received_by` varchar(50) NOT NULL,
  `pay_status` enum('Paid','Unpaid','Partially') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_amount`
--

INSERT INTO `project_amount` (`pro_amt_id`, `project_id`, `amnt_received`, `pay_date`, `pay_mode`, `received_by`, `pay_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, '2024-07-15', 'Cash', 'Anushiya', 'Paid', '2024-07-15 14:50:15', '2024-07-15 09:20:15'),
(2, 1, 1000, '2024-07-16', 'Cash', 'Asha', 'Paid', '2024-07-15 14:50:54', '2024-07-15 09:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

CREATE TABLE `project_tbl` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `programming` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `developers` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `client` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `duration` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `pay_status` enum('Pending','Completed') NOT NULL DEFAULT 'Pending',
  `project_status` enum('Old','New','In Progress') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_tbl`
--

INSERT INTO `project_tbl` (`project_id`, `project_name`, `programming`, `developers`, `client`, `start_date`, `end_date`, `duration`, `total_pay`, `description`, `pay_status`, `project_status`, `status`) VALUES
(1, 'Roriri Software ERP', '[\"HTML\",\"CSS\",\"JavaScript\",\"PHP\",\"MySQL\"]', '[\"1\",\"3\"]', 1, '2024-07-06', '2024-07-15 14:47:38', 9, 9000, ' IT is our company software to maintain overall company status', 'Pending', 'In Progress', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE `role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_tbl`
--

INSERT INTO `role_tbl` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Super Admin', 'Active'),
(2, 'Admin', 'Active'),
(3, 'JR. Developer', 'Active'),
(4, 'Trainer', 'Active'),
(5, 'Student', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `stu_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_month` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `stu_gender` enum('Male','Female','Other') NOT NULL,
  `stu_aadhar` varchar(50) NOT NULL,
  `stu_marksheet` varchar(50) NOT NULL,
  `stu_qrcode` varchar(50) NOT NULL,
  `stu_blood_group` varchar(10) NOT NULL,
  `stu_cast` varchar(20) NOT NULL,
  `stu_religion` varchar(20) NOT NULL,
  `stu_mother_tongue` varchar(50) NOT NULL,
  `stu_native` varchar(50) NOT NULL,
  `stu_image` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `stu_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `stu_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `stu_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`stu_id`, `user_id`, `entity_id`, `course_id`, `course_month`, `first_name`, `last_name`, `stu_gender`, `stu_aadhar`, `stu_marksheet`, `stu_qrcode`, `stu_blood_group`, `stu_cast`, `stu_religion`, `stu_mother_tongue`, `stu_native`, `stu_image`, `registration_date`, `stu_status`, `stu_created_date`, `stu_updated_date`, `client_id`) VALUES
(1, 3, 3, 2, 12, 'Yesu', 'Balan', 'Male', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-10 12:13:30', '2024-06-25 07:27:34', 0),
(2, 4, 1, 1, 3, 'Gnana', 'Jebastin', 'Male', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-15 14:18:09', '2024-06-19 07:40:43', 0),
(3, 6, 3, 3, 12, 'Jebarlin', 'Dania', 'Female', 'JebarlinDania_aadhar.jpeg', 'JebarlinDania_marksheet.jpg', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:40:58', '2024-06-25 07:10:12', 0),
(4, 7, 3, 2, 12, 'Jebarathi', 'S', 'Female', '', '', 'JebarathiS_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:44:43', '2024-06-20 11:11:03', 0),
(5, 8, 3, 2, 6, 'KingJohn', 'Nicks', 'Male', '', '', 'KingJohnNicks_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 12:55:11', '2024-06-26 05:33:57', 0),
(6, 9, 1, 1, 3, 'Jebarlin', 'Dania', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 13:01:58', '2024-06-20 11:11:07', 0),
(7, 10, 3, 2, 6, 'Uma', 'Saraswathi', 'Female', '', '', 'UmaSaraswathi_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-18 13:02:37', '2024-06-25 04:20:57', 0),
(8, 11, 3, 2, 6, 'KingJohn', 'N', 'Male', 'KingJohnN_aadhar.jpeg', 'KingJohnN_marksheet.webp', 'KingJohnN_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 14:57:20', '2024-06-18 09:29:34', 0),
(9, 15, 1, 1, 3, 'Asha1', 'T', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 15:09:02', '2024-06-20 11:11:11', 0),
(10, 17, 1, 1, 3, 'Asha12', 'T', 'Female', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 15:09:44', '2024-06-20 11:11:15', 0),
(11, 18, 3, 3, 3, 'Bala', 'Ajinika', 'Female', '', '', 'BalaAjinika_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-18 16:08:41', '2024-06-27 11:07:16', 0),
(12, 20, 3, 2, 3, 'Dania', 'J', 'Female', '', '', 'DaniaJ_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-20 14:20:17', '2024-06-26 05:19:48', 0),
(13, 27, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 10:41:42', '2024-06-26 05:11:43', 0),
(14, 28, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:44', '2024-06-26 05:12:46', 0),
(15, 29, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:44', '2024-06-26 05:12:43', 0),
(16, 30, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:46', '2024-06-26 05:19:31', 0),
(17, 31, 3, 3, 3, 'Jebarlij', 'dania', 'Female', '', '', 'Jebarlijdania_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Inactive', '2024-06-26 10:41:48', '2024-06-26 05:19:24', 0),
(18, 32, 1, 1, 6, 'kavi', 's', 'Female', '', '', 'kavis_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 10:50:49', '2024-07-02 10:03:35', 0),
(19, 33, 1, 1, 6, 'Jons', 'J', 'Female', '', '', 'JonsJ_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-26 11:02:09', '2024-06-28 09:54:42', 0),
(20, 35, 3, 3, 6, 'Durga', 's', 'Female', 'Durgas139_aadhar.jpg', 'Durgas139_marksheet.jpg', 'Durgas_qrcode.png', '', '', '', '', '', '', '0000-00-00', 'Active', '2024-06-28 14:32:38', '2024-06-28 09:06:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_tbl`
--

CREATE TABLE `syllabus_tbl` (
  `syllabus_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `syllabus_name` varchar(50) NOT NULL,
  `syllabus_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `syllabus_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `syllabus_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus_tbl`
--

INSERT INTO `syllabus_tbl` (`syllabus_id`, `entity_id`, `course_id`, `syllabus_name`, `syllabus_created_date`, `syllabus_updated_date`, `syllabus_status`) VALUES
(1, 3, 2, 'HTML', '2024-07-01 12:03:38', '2024-07-01 06:33:38', 'Active'),
(2, 3, 2, 'CSS', '2024-07-01 12:03:52', '2024-07-01 06:33:52', 'Active'),
(3, 3, 2, 'JavaScript', '2024-07-01 12:04:09', '2024-07-01 06:34:09', 'Active'),
(4, 3, 2, 'PHP', '2024-07-01 12:04:26', '2024-07-01 06:34:26', 'Active'),
(5, 3, 2, 'MySQL', '2024-07-01 12:04:41', '2024-07-01 06:34:41', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `task_detail`
--

CREATE TABLE `task_detail` (
  `task_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `task_detail` longtext NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_detail`
--

INSERT INTO `task_detail` (`task_id`, `student_id`, `task_detail`, `created_at`, `update_at`) VALUES
(1, 1, '{\"1\": {\"course_id\": \"2\", \"syllabus_id\": \"1\", \"taskName_id\": \"1\", \"duration\": \"10\", \"status\": \"Pending\", \"start_date\": \"2024-07-03 10:50:25\", \"trainer\": \"7\"}, \"3\": {\"course_id\": \"2\", \"syllabus_id\": \"1\", \"taskName_id\": \"3\", \"duration\": \"10\", \"status\": \"Completed\", \"start_date\": \"2024-07-03 10:50:25\", \"trainer\": \"7\"}, \"4\": {\"course_id\": \"2\", \"syllabus_id\": \"1\", \"taskName_id\": \"4\", \"duration\": \"10\", \"status\": \"Completed\", \"start_date\": \"2024-07-03 10:50:25\", \"trainer\": \"7\"}}', '2024-07-03', '2024-07-03 04:13:06'),
(2, 5, '{\"1\": {\"course_id\": \"2\", \"syllabus_id\": \"1\", \"taskName_id\": \"1\", \"duration\": \"5\", \"status\": \"Pending\", \"start_date\": \"2024-07-03 10:50:37\", \"trainer\": \"7\"}, \"3\": {\"course_id\": \"2\", \"syllabus_id\": \"1\", \"taskName_id\": \"3\", \"duration\": \"5\", \"status\": \"Completed\", \"start_date\": \"2024-07-03 10:50:37\", \"trainer\": \"7\"}}', '2024-07-03', '2024-07-03 08:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `task_tbl`
--

CREATE TABLE `task_tbl` (
  `task_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  `task_name` longtext NOT NULL,
  `task_duration` int(11) NOT NULL,
  `task_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `task_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_tbl`
--

INSERT INTO `task_tbl` (`task_id`, `course_id`, `syllabus_id`, `task_name`, `task_duration`, `task_status`, `task_created_date`) VALUES
(1, 2, 1, 'Create a simple HTML document. ', 2, 'Active', '2024-07-01 12:58:22'),
(2, 2, 1, 'sample', 2, 'Inactive', '2024-07-01 14:40:49'),
(3, 2, 1, 'Create a Resume Template', 3, 'Active', '2024-07-01 15:12:43'),
(4, 2, 1, 'Single Web Page (College)', 5, 'Active', '2024-07-01 15:13:12'),
(5, 2, 1, 'Create Registration Page (College)', 5, 'Active', '2024-07-01 15:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `topic_tbl`
--

CREATE TABLE `topic_tbl` (
  `topic_id` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `topic_duration` int(11) NOT NULL,
  `topic_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `topic_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `topic_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic_tbl`
--

INSERT INTO `topic_tbl` (`topic_id`, `syllabus_id`, `course_id`, `topic_name`, `topic_duration`, `topic_status`, `topic_created_date`, `topic_updated_date`) VALUES
(1, 1, 2, 'Introduction', 1, 'Active', '2024-07-01 12:06:40', '2024-07-01 06:36:40'),
(2, 1, 2, 'Editors', 1, 'Active', '2024-07-01 12:06:58', '2024-07-01 06:36:58'),
(3, 1, 2, 'Basics', 2, 'Active', '2024-07-01 12:07:12', '2024-07-01 06:37:12'),
(4, 1, 2, 'Comments', 1, 'Active', '2024-07-01 12:07:26', '2024-07-01 06:37:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academy_detail_tbl`
--
ALTER TABLE `academy_detail_tbl`
  ADD PRIMARY KEY (`academy_id`);

--
-- Indexes for table `additional_details_tbl`
--
ALTER TABLE `additional_details_tbl`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`username`);

--
-- Indexes for table `assign_task_tbl`
--
ALTER TABLE `assign_task_tbl`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`atd_id`);

--
-- Indexes for table `client_tbl`
--
ALTER TABLE `client_tbl`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_additional_tbl`
--
ALTER TABLE `emp_additional_tbl`
  ADD PRIMARY KEY (`add_tbl_id`);

--
-- Indexes for table `entity_tbl`
--
ALTER TABLE `entity_tbl`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `payment_history_tbl`
--
ALTER TABLE `payment_history_tbl`
  ADD PRIMARY KEY (`pay_his_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `position_tbl`
--
ALTER TABLE `position_tbl`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `project_amount`
--
ALTER TABLE `project_amount`
  ADD PRIMARY KEY (`pro_amt_id`);

--
-- Indexes for table `project_tbl`
--
ALTER TABLE `project_tbl`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `task_detail`
--
ALTER TABLE `task_detail`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `topic_tbl`
--
ALTER TABLE `topic_tbl`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academy_detail_tbl`
--
ALTER TABLE `academy_detail_tbl`
  MODIFY `academy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `additional_details_tbl`
--
ALTER TABLE `additional_details_tbl`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assign_task_tbl`
--
ALTER TABLE `assign_task_tbl`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `atd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_tbl`
--
ALTER TABLE `client_tbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emp_additional_tbl`
--
ALTER TABLE `emp_additional_tbl`
  MODIFY `add_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `entity_tbl`
--
ALTER TABLE `entity_tbl`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_history_tbl`
--
ALTER TABLE `payment_history_tbl`
  MODIFY `pay_his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `position_tbl`
--
ALTER TABLE `position_tbl`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_amount`
--
ALTER TABLE `project_amount`
  MODIFY `pro_amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_tbl`
--
ALTER TABLE `project_tbl`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `syllabus_tbl`
--
ALTER TABLE `syllabus_tbl`
  MODIFY `syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_detail`
--
ALTER TABLE `task_detail`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic_tbl`
--
ALTER TABLE `topic_tbl`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
