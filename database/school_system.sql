-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `actual_fee`
--

CREATE TABLE `actual_fee` (
  `id` int(11) NOT NULL,
  `actual_fee` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actual_fee`
--

INSERT INTO `actual_fee` (`id`, `actual_fee`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '15000', 0, 0, '2022-11-24 14:43:09', '0000-00-00 00:00:00'),
(2, '2000', 0, 0, '2022-11-24 14:43:21', '0000-00-00 00:00:00'),
(3, '20000', 0, 0, '2022-12-05 15:12:01', '0000-00-00 00:00:00'),
(4, '30000', 1, 0, '2023-02-22 13:05:42', '0000-00-00 00:00:00'),
(5, '40000', 1, 0, '2023-02-22 13:05:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `campus_type` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `section_name` varchar(1000) NOT NULL,
  `attendance_date` date DEFAULT NULL,
  `remarks` varchar(1000) NOT NULL,
  `teacher_absent` varchar(1000) NOT NULL,
  `is_holiday` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `attendance_date` date DEFAULT NULL,
  `std_id` int(11) NOT NULL,
  `attendance` int(11) DEFAULT NULL COMMENT '0=absent, 1=present, 2=leave, 3=holiday',
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(1000) NOT NULL,
  `banks_logo` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `banks_logo`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Bank alfalah', 'bank alfalah.jpg', 0, 0, '2022-11-22 16:56:19', '0000-00-00 00:00:00'),
(2, 'Faysalbank', 'faysalbank.jpeg', 0, 0, '2022-11-30 16:03:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banks_account`
--

CREATE TABLE `banks_account` (
  `id` int(11) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks_account`
--

INSERT INTO `banks_account` (`id`, `campus`, `bank_name`, `account_title`, `account_no`, `branch_name`, `branch_code`, `note`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '34567', '1234', 'Multan', '98765', 'wer', 1, 0, '2023-02-22 12:56:28', '0000-00-00 00:00:00'),
(2, '4', '2', '6789', '12345', 'new multan', '1234', '1234', 1, 0, '2023-02-22 12:58:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `campus_type`
--

CREATE TABLE `campus_type` (
  `id` int(11) NOT NULL,
  `campus_type` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus_type`
--

INSERT INTO `campus_type` (`id`, `campus_type`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Islam', 0, 0, '2022-10-27 14:01:20', '0000-00-00 00:00:00'),
(3, 'frenchise', 0, 0, '2022-10-27 14:01:43', '0000-00-00 00:00:00'),
(5, 'college', 0, 0, '2022-10-27 15:44:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Computer', 0, 0, '2022-11-04 12:34:01', '0000-00-00 00:00:00'),
(2, 'Urdu', 0, 0, '2022-11-04 12:34:20', '0000-00-00 00:00:00'),
(3, 'English', 0, 0, '2022-11-04 12:39:21', '0000-00-00 00:00:00'),
(4, 'Physics', 0, 0, '2022-12-28 16:14:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employel_level`
--

CREATE TABLE `employel_level` (
  `id` int(11) NOT NULL,
  `employel_level` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employel_level`
--

INSERT INTO `employel_level` (`id`, `employel_level`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'PA', 0, 0, '2022-11-03 18:38:22', '0000-00-00 00:00:00'),
(2, 'PA', 0, 1, '2022-11-03 18:41:49', '0000-00-00 00:00:00'),
(4, 'Pricipal', 0, 0, '2022-11-03 19:21:36', '0000-00-00 00:00:00'),
(5, '', 0, 1, '2022-11-04 11:48:51', '0000-00-00 00:00:00'),
(6, 'Teacher junior', 0, 0, '2022-12-28 16:11:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employel_type`
--

CREATE TABLE `employel_type` (
  `id` int(11) NOT NULL,
  `employel_type` varchar(250) NOT NULL,
  `lunch_allowance` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employel_type`
--

INSERT INTO `employel_type` (`id`, `employel_type`, `lunch_allowance`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'PA', NULL, 0, 1, '2022-11-04 11:52:57', '0000-00-00 00:00:00'),
(3, 'Worker', 1122, 0, 0, '2022-11-04 11:59:56', '0000-00-00 00:00:00'),
(4, 'Teacher', 11000, 0, 0, '2023-02-14 16:45:52', '0000-00-00 00:00:00'),
(5, 'Teacher', 900, 0, 1, '2023-02-14 16:47:37', '0000-00-00 00:00:00'),
(6, 'admin', 15000, 0, 0, '2023-02-14 17:01:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_promotion`
--

CREATE TABLE `exam_promotion` (
  `id` int(11) NOT NULL,
  `session_name` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `section_name` varchar(1000) NOT NULL,
  `exam` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `exam_name` varchar(1000) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `passed` varchar(1000) NOT NULL,
  `total_marks` varchar(1000) NOT NULL,
  `obtained` varchar(1000) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `promoted` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_default_package`
--

CREATE TABLE `fee_default_package` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `campus` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_default_package`
--

INSERT INTO `fee_default_package` (`id`, `session_id`, `campus`, `class`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 10, 1, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(2, 8, 2, 7, 1, 0, '2023-02-22 13:11:04', '0000-00-00 00:00:00'),
(3, 9, 3, 2, 1, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(4, 9, 4, 8, 1, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_default_package_detail`
--

CREATE TABLE `fee_default_package_detail` (
  `id` int(11) NOT NULL,
  `fee_default_pkg_id` int(11) NOT NULL,
  `fee_type` int(11) NOT NULL,
  `actual_fee` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_default_package_detail`
--

INSERT INTO `fee_default_package_detail` (`id`, `fee_default_pkg_id`, `fee_type`, `actual_fee`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5000, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(2, 1, 2, 1000, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(3, 1, 3, 1000, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(4, 1, 4, 500, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(5, 1, 5, 2000, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(6, 1, 6, 2500, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(7, 1, 7, 1000, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(8, 1, 8, 1500, 0, '2023-02-22 13:10:28', '0000-00-00 00:00:00'),
(9, 2, 1, 50000, 0, '2023-02-22 13:11:04', '0000-00-00 00:00:00'),
(10, 2, 2, 1000, 0, '2023-02-22 13:11:04', '0000-00-00 00:00:00'),
(11, 2, 3, 4000, 0, '2023-02-22 13:11:04', '0000-00-00 00:00:00'),
(12, 2, 8, 500, 0, '2023-02-22 13:11:04', '0000-00-00 00:00:00'),
(13, 3, 1, 10000, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(14, 3, 2, 3000, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(15, 3, 3, 15000, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(16, 3, 4, 10000, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(17, 3, 5, 3000, 0, '2023-02-22 13:11:44', '0000-00-00 00:00:00'),
(18, 4, 1, 10000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(19, 4, 2, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(20, 4, 3, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(21, 4, 4, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(22, 4, 5, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(23, 4, 6, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(24, 4, 7, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00'),
(25, 4, 8, 2000, 0, '2023-02-22 13:12:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_detail`
--

CREATE TABLE `fee_detail` (
  `id` int(11) NOT NULL,
  `campus` varchar(250) NOT NULL,
  `class` varchar(255) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `actual_fee` int(11) NOT NULL,
  `concession_fee` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_package`
--

CREATE TABLE `fee_package` (
  `id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `actual_fee` varchar(255) NOT NULL,
  `concession_fee` varchar(255) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

CREATE TABLE `fee_type` (
  `id` int(11) NOT NULL,
  `fee_type` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_type`
--

INSERT INTO `fee_type` (`id`, `fee_type`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', 1, 0, '2023-02-22 13:02:02', '0000-00-00 00:00:00'),
(2, 'Admission Fee', 1, 0, '2023-02-22 13:02:18', '0000-00-00 00:00:00'),
(3, 'Security Fee', 1, 0, '2023-02-22 13:02:40', '0000-00-00 00:00:00'),
(4, 'Stationary Charges', 1, 0, '2023-02-22 13:03:02', '0000-00-00 00:00:00'),
(5, 'Tution Fee', 1, 0, '2023-02-22 13:03:21', '0000-00-00 00:00:00'),
(6, 'Re Vouching Fee', 1, 0, '2023-02-22 13:03:45', '0000-00-00 00:00:00'),
(7, 'Re admission Fee', 1, 0, '2023-02-22 13:04:06', '0000-00-00 00:00:00'),
(8, 'Van Charges', 1, 0, '2023-02-22 13:04:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `routes` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `routes`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Multan 7 Number', 0, 0, '2022-10-28 18:24:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary_type` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `salary_type`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Month', 0, 0, '2022-11-04 13:04:23', '0000-00-00 00:00:00'),
(2, 'Isliamic', 0, 1, '2022-11-04 13:10:10', '0000-00-00 00:00:00'),
(3, 'Advance', 0, 0, '2022-11-04 13:13:42', '0000-00-00 00:00:00'),
(4, 'Other', 0, 0, '2022-11-04 13:14:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_title` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_title`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Red', 1, 0, '2023-02-22 12:59:49', '0000-00-00 00:00:00'),
(2, 'Green', 1, 0, '2023-02-22 13:00:01', '0000-00-00 00:00:00'),
(3, 'Yellow', 1, 0, '2023-02-22 13:00:09', '0000-00-00 00:00:00'),
(4, 'Black', 1, 0, '2023-02-22 13:00:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `session_year`
--

CREATE TABLE `session_year` (
  `id` int(11) NOT NULL,
  `session_year` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_year`
--

INSERT INTO `session_year` (`id`, `session_year`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(6, '2022', 0, 1, '2022-11-24 18:50:05', '0000-00-00 00:00:00'),
(7, '2022-2023', 0, 0, '2022-11-24 19:01:17', '0000-00-00 00:00:00'),
(8, '2023-2024', 0, 0, '2022-11-25 15:23:09', '0000-00-00 00:00:00'),
(9, '2024-2026', 0, 0, '2023-01-06 17:15:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `month_fee` int(1) NOT NULL,
  `month_image` varchar(500) NOT NULL,
  `student_free` int(1) NOT NULL,
  `fee_image` varchar(500) NOT NULL,
  `staff_kid` int(1) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `confirmation_date` date DEFAULT NULL,
  `stationary` int(1) NOT NULL,
  `admission_detail` varchar(255) NOT NULL,
  `commitment` varchar(255) NOT NULL,
  `reference` varchar(500) NOT NULL,
  `conession_form` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `std_id`, `month_fee`, `month_image`, `student_free`, `fee_image`, `staff_kid`, `staff_id`, `confirmation_date`, `stationary`, `admission_detail`, `commitment`, `reference`, `conession_form`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 56, 1, '', 0, '', 0, 0, NULL, 1, 'Testing', 'Testing', 'Testing', '', 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(2, 56, 1, '', 0, '', 0, 0, NULL, 1, 'Again Testing', 'Again Testing', 'Again Testing', '', 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(3, 56, 0, '', 0, '', 0, 0, NULL, 0, '', '', '', '', 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_detail`
--

CREATE TABLE `student_fee_detail` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `student_fee_id` int(11) NOT NULL,
  `actual_fee` int(11) NOT NULL,
  `concession_fee` int(11) NOT NULL,
  `package_payable` int(11) NOT NULL,
  `fee_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fee_detail`
--

INSERT INTO `student_fee_detail` (`id`, `std_id`, `student_fee_id`, `actual_fee`, `concession_fee`, `package_payable`, `fee_type`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 5000, 100, 4900, 1, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(2, 0, 1, 1000, 200, 800, 2, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(3, 0, 1, 1000, 200, 800, 3, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(4, 0, 1, 500, 200, 300, 4, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(5, 0, 1, 2000, 300, 1700, 5, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(6, 0, 1, 2500, 500, 2000, 6, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(7, 0, 1, 1000, 300, 700, 7, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(8, 0, 1, 1500, 500, 1000, 8, 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(9, 0, 2, 50000, 5000, 45000, 1, 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(10, 0, 2, 1000, 100, 900, 2, 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(11, 0, 2, 4000, 500, 3500, 3, 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(12, 0, 2, 500, 50, 450, 8, 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(13, 0, 3, 10000, 1000, 9000, 1, 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00'),
(14, 0, 3, 3000, 500, 2500, 2, 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00'),
(15, 0, 3, 15000, 230, 14770, 3, 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00'),
(16, 0, 3, 10000, 400, 9600, 4, 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00'),
(17, 0, 3, 3000, 234, 2766, 5, 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_left`
--

CREATE TABLE `student_left` (
  `id` int(11) NOT NULL,
  `campus_type` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `section_name` varchar(1000) NOT NULL,
  `addmission_no` varchar(255) DEFAULT NULL,
  `name` varchar(1000) NOT NULL,
  `addmission_date` date NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `student_left` tinyint(4) NOT NULL COMMENT '1=Left,2=Struck Off,3=Freeze',
  `left_date` date NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_promotion`
--

CREATE TABLE `student_promotion` (
  `id` int(11) NOT NULL,
  `campus` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `session_name` varchar(1000) NOT NULL,
  `section_name` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `admission` varchar(1000) NOT NULL,
  `addmission_date` date NOT NULL,
  `promoted` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_transfer`
--

CREATE TABLE `student_transfer` (
  `id` int(11) NOT NULL,
  `campus_type` varchar(1000) NOT NULL,
  `addmission_no` varchar(1000) NOT NULL,
  `addmission_date` date NOT NULL,
  `name` varchar(1000) NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `section_name` varchar(1000) NOT NULL,
  `entry_date` date NOT NULL,
  `in_date` date NOT NULL,
  `campus_in` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campus`
--

CREATE TABLE `tbl_campus` (
  `id` int(11) NOT NULL,
  `campus_type` varchar(1000) NOT NULL,
  `campus_name` varchar(50) NOT NULL,
  `campus_address` varchar(500) NOT NULL,
  `campus_logo` text NOT NULL,
  `landscape_header` varchar(255) NOT NULL,
  `portrait_header` int(11) NOT NULL,
  `landscape_footer` varchar(255) NOT NULL,
  `portrait_footer` int(11) NOT NULL,
  `franchise` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_campus`
--

INSERT INTO `tbl_campus` (`id`, `campus_type`, `campus_name`, `campus_address`, `campus_logo`, `landscape_header`, `portrait_header`, `landscape_footer`, `portrait_footer`, `franchise`, `college`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '5', 'Al-Noor Campus', 'Multan city', '', '', 0, '', 0, '', '1', 1, 0, '2023-02-22 12:42:33', '0000-00-00 00:00:00'),
(2, '3', 'Al-Khaliq Campus', 'New Multan', '', '', 0, '', 0, '1', '1', 1, 0, '2023-02-22 12:43:25', '0000-00-00 00:00:00'),
(3, '2', 'Al-basit Campus', '6 No', '', '', 0, '', 0, '', '1', 1, 0, '2023-02-22 12:44:21', '0000-00-00 00:00:00'),
(4, '2', 'Al-Kareem Campus', '9 No', '', '', 0, '', 0, '', '', 1, 0, '2023-02-22 12:45:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `city` varchar(19) DEFAULT NULL,
  `lat` varchar(6) DEFAULT NULL,
  `lng` varchar(6) DEFAULT NULL,
  `country` varchar(8) DEFAULT NULL,
  `iso2` varchar(4) DEFAULT NULL,
  `province` varchar(18) DEFAULT NULL,
  `capital` varchar(7) DEFAULT NULL,
  `population` varchar(10) DEFAULT NULL,
  `population_prop` varchar(17) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `city`, `lat`, `lng`, `country`, `iso2`, `province`, `capital`, `population`, `population_prop`) VALUES
(2, 'Karachi', '24.860', '67.010', 'Pakistan', 'PK', 'Sindh', 'admin', '14835000', '14835000'),
(3, 'Lahore', '31.549', '74.343', 'Pakistan', 'PK', 'Punjab', 'admin', '11021000', '11021000'),
(4, 'Faisalabad', '31.418', '73.079', 'Pakistan', 'PK', 'Punjab', 'minor', '3203846', '3203846'),
(5, 'Rawalpindi', '33.600', '73.067', 'Pakistan', 'PK', 'Punjab', 'minor', '2098231', '2098231'),
(6, 'Gujranwala', '32.150', '74.183', 'Pakistan', 'PK', 'Punjab', 'minor', '2027001', '2027001'),
(7, 'Peshawar', '34.000', '71.500', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'admin', '1970042', '1970042'),
(8, 'Multan', '30.197', '71.471', 'Pakistan', 'PK', 'Punjab', 'minor', '1871843', '1871843'),
(9, 'Saidu Sharif', '34.750', '72.357', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '1860310', '1860310'),
(10, 'Hyderabad City', '25.379', '68.368', 'Pakistan', 'PK', 'Sindh', 'minor', '1732693', '1732693'),
(11, 'Islamabad', '33.698', '73.036', 'Pakistan', 'PK', 'Islāmābād', 'primary', '1014825', '1014825'),
(12, 'Quetta', '30.192', '67.007', 'Pakistan', 'PK', 'Balochistān', 'admin', '1001205', '1001205'),
(13, 'Bahawalpur', '29.395', '71.672', 'Pakistan', 'PK', 'Punjab', 'minor', '762111', '762111'),
(14, 'Sargodha', '32.083', '72.671', 'Pakistan', 'PK', 'Punjab', 'minor', '659862', '659862'),
(15, 'Sialkot City', '32.500', '74.533', 'Pakistan', 'PK', 'Punjab', 'minor', '655852', '655852'),
(16, 'Sukkur', '27.699', '68.867', 'Pakistan', 'PK', 'Sindh', 'minor', '499900', '499900'),
(17, 'Larkana', '27.560', '68.226', 'Pakistan', 'PK', 'Sindh', 'minor', '490508', '490508'),
(18, 'Chiniot', '31.716', '72.983', 'Pakistan', 'PK', 'Punjab', 'minor', '477781', '477781'),
(19, 'Shekhupura', '31.708', '74.000', 'Pakistan', 'PK', 'Punjab', 'minor', '473129', '473129'),
(20, 'Jhang City', '31.268', '72.318', 'Pakistan', 'PK', 'Punjab', 'minor', '414131', '414131'),
(21, 'Dera Ghazi Khan', '30.050', '70.633', 'Pakistan', 'PK', 'Punjab', 'minor', '399064', '399064'),
(22, 'Gujrat', '32.573', '74.078', 'Pakistan', 'PK', 'Punjab', 'minor', '390533', '390533'),
(23, 'Rahimyar Khan', '28.420', '70.295', 'Pakistan', 'PK', 'Punjab', '', '353203', '353203'),
(24, 'Kasur', '31.116', '74.450', 'Pakistan', 'PK', 'Punjab', 'minor', '314617', '314617'),
(25, 'Mardan', '34.195', '72.044', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '300424', '300424'),
(26, 'Mingaora', '34.771', '72.360', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', '', '279914', '279914'),
(27, 'Nawabshah', '26.244', '68.410', 'Pakistan', 'PK', 'Sindh', 'minor', '263102', '263102'),
(28, 'Sahiwal', '30.670', '73.106', 'Pakistan', 'PK', 'Punjab', 'minor', '247706', '247706'),
(29, 'Mirpur Khas', '25.526', '69.011', 'Pakistan', 'PK', 'Sindh', 'minor', '236961', '236961'),
(30, 'Okara', '30.810', '73.459', 'Pakistan', 'PK', 'Punjab', 'minor', '232386', '232386'),
(31, 'Mandi Burewala', '30.150', '72.683', 'Pakistan', 'PK', 'Punjab', '', '203454', '203454'),
(32, 'Jacobabad', '28.276', '68.451', 'Pakistan', 'PK', 'Sindh', 'minor', '200815', '200815'),
(33, 'Saddiqabad', '28.300', '70.130', 'Pakistan', 'PK', 'Punjab', '', '189876', '189876'),
(34, 'Kohat', '33.586', '71.441', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '170800', '170800'),
(35, 'Muridke', '31.802', '74.255', 'Pakistan', 'PK', 'Punjab', '', '163268', '163268'),
(36, 'Muzaffargarh', '30.070', '71.193', 'Pakistan', 'PK', 'Punjab', 'minor', '163268', '163268'),
(37, 'Khanpur', '28.647', '70.662', 'Pakistan', 'PK', 'Punjab', '', '160308', '160308'),
(38, 'Gojra', '31.150', '72.683', 'Pakistan', 'PK', 'Punjab', '', '157863', '157863'),
(39, 'Mandi Bahauddin', '32.586', '73.491', 'Pakistan', 'PK', 'Punjab', 'minor', '157352', '157352'),
(40, 'Abbottabad', '34.150', '73.216', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '148587', '148587'),
(41, 'Turbat', '26.003', '63.054', 'Pakistan', 'PK', 'Balochistān', 'minor', '147791', '75694'),
(42, 'Dadu', '26.731', '67.775', 'Pakistan', 'PK', 'Sindh', 'minor', '146179', '146179'),
(43, 'Bahawalnagar', '29.994', '73.253', 'Pakistan', 'PK', 'Punjab', 'minor', '141935', '141935'),
(44, 'Khuzdar', '27.800', '66.616', 'Pakistan', 'PK', 'Balochistān', '', '141395', '141395'),
(45, 'Pakpattan', '30.350', '73.400', 'Pakistan', 'PK', 'Punjab', 'minor', '139525', '139525'),
(46, 'Tando Allahyar', '25.466', '68.716', 'Pakistan', 'PK', 'Sindh', 'minor', '133487', '133487'),
(47, 'Ahmadpur East', '29.145', '71.261', 'Pakistan', 'PK', 'Punjab', '', '128112', '128112'),
(48, 'Vihari', '30.041', '72.352', 'Pakistan', 'PK', 'Punjab', 'minor', '128034', '128034'),
(49, 'Jaranwala', '31.334', '73.419', 'Pakistan', 'PK', 'Punjab', '', '127973', '127973'),
(50, 'New Mirpur', '33.133', '73.750', 'Pakistan', 'PK', 'Azad Kashmir', 'minor', '124352', '124352'),
(51, 'Kamalia', '30.725', '72.644', 'Pakistan', 'PK', 'Punjab', '', '121401', '121401'),
(52, 'Kot Addu', '30.470', '70.964', 'Pakistan', 'PK', 'Punjab', '', '120479', '120479'),
(53, 'Nowshera', '34.015', '71.974', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '118594', '118594'),
(54, 'Swabi', '34.116', '72.466', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '115018', '115018'),
(55, 'Khushab', '32.291', '72.350', 'Pakistan', 'PK', 'Punjab', 'minor', '110868', '110868'),
(56, 'Dera Ismail Khan', '31.816', '70.916', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '109686', '109686'),
(57, 'Chaman', '30.921', '66.459', 'Pakistan', 'PK', 'Balochistān', '', '107660', '107660'),
(58, 'Charsadda', '34.145', '71.730', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '105414', '105414'),
(59, 'Kandhkot', '28.400', '69.300', 'Pakistan', 'PK', 'Sindh', '', '105011', '105011'),
(60, 'Chishtian', '29.795', '72.857', 'Pakistan', 'PK', 'Punjab', '', '101659', '101659'),
(61, 'Hasilpur', '29.696', '72.554', 'Pakistan', 'PK', 'Punjab', '', '99171', '99171'),
(62, 'Attock Khurd', '33.766', '72.366', 'Pakistan', 'PK', 'Punjab', '', '97374', '97374'),
(63, 'Muzaffarabad', '34.370', '73.471', 'Pakistan', 'PK', 'Azad Kashmir', '', '96000', '96000'),
(64, 'Mianwali', '32.585', '71.543', 'Pakistan', 'PK', 'Punjab', 'minor', '95007', '95007'),
(65, 'Jalalpur Jattan', '32.766', '74.216', 'Pakistan', 'PK', 'Punjab', '', '90130', '90130'),
(66, 'Bhakkar', '31.633', '71.066', 'Pakistan', 'PK', 'Punjab', 'minor', '88472', '88472'),
(67, 'Zhob', '31.341', '69.448', 'Pakistan', 'PK', 'Balochistān', 'minor', '88356', '50537'),
(68, 'Dipalpur', '30.670', '73.653', 'Pakistan', 'PK', 'Punjab', '', '87176', '87176'),
(69, 'Kharian', '32.811', '73.865', 'Pakistan', 'PK', 'Punjab', '', '85765', '85765'),
(70, 'Mian Channun', '30.439', '72.354', 'Pakistan', 'PK', 'Punjab', '', '82586', '82586'),
(71, 'Bhalwal', '32.265', '72.902', 'Pakistan', 'PK', 'Punjab', '', '82556', '82556'),
(72, 'Jamshoro', '25.428', '68.282', 'Pakistan', 'PK', 'Sindh', 'minor', '80000', '80000'),
(73, 'Pattoki', '31.021', '73.852', 'Pakistan', 'PK', 'Punjab', '', '77210', '77210'),
(74, 'Harunabad', '29.610', '73.136', 'Pakistan', 'PK', 'Punjab', '', '77206', '77206'),
(75, 'Kahror Pakka', '29.623', '71.916', 'Pakistan', 'PK', 'Punjab', '', '76098', '76098'),
(76, 'Toba Tek Singh', '30.966', '72.483', 'Pakistan', 'PK', 'Punjab', 'minor', '75943', '75943'),
(77, 'Samundri', '31.063', '72.961', 'Pakistan', 'PK', 'Punjab', '', '73911', '73911'),
(78, 'Shakargarh', '32.262', '75.158', 'Pakistan', 'PK', 'Punjab', '', '73160', '73160'),
(79, 'Sambrial', '32.475', '74.352', 'Pakistan', 'PK', 'Punjab', '', '71766', '71766'),
(80, 'Shujaabad', '29.880', '71.295', 'Pakistan', 'PK', 'Punjab', '', '70595', '70595'),
(81, 'Hujra Shah Muqim', '30.740', '73.821', 'Pakistan', 'PK', 'Punjab', '', '70204', '70204'),
(82, 'Kabirwala', '30.406', '71.866', 'Pakistan', 'PK', 'Punjab', '', '70123', '70123'),
(83, 'Mansehra', '34.333', '73.200', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '69085', '69085'),
(84, 'Lala Musa', '32.700', '73.955', 'Pakistan', 'PK', 'Punjab', '', '67283', '67283'),
(85, 'Chunian', '30.963', '73.980', 'Pakistan', 'PK', 'Punjab', '', '64386', '64386'),
(86, 'Nankana Sahib', '31.449', '73.712', 'Pakistan', 'PK', 'Punjab', '', '63073', '63073'),
(87, 'Bannu', '32.988', '70.605', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '62191', '62191'),
(88, 'Pasrur', '32.268', '74.667', 'Pakistan', 'PK', 'Punjab', '', '58644', '58644'),
(89, 'Timargara', '34.828', '71.840', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '58050', '58050'),
(90, 'Parachinar', '33.899', '70.100', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', '', '55685', '55685'),
(91, 'Chenab Nagar', '31.750', '72.916', 'Pakistan', 'PK', 'Punjab', '', '53965', '53965'),
(92, 'Gwadar', '25.126', '62.322', 'Pakistan', 'PK', 'Balochistān', 'minor', '51901', '23364'),
(93, 'Abdul Hakim', '30.552', '72.127', 'Pakistan', 'PK', 'Punjab', '', '51494', '51494'),
(94, 'Hassan Abdal', '33.819', '72.689', 'Pakistan', 'PK', 'Punjab', '', '50044', '50044'),
(95, 'Tank', '32.216', '70.383', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '44996', '44996'),
(96, 'Hangu', '33.528', '71.057', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '39766', '39766'),
(97, 'Risalpur Cantonment', '34.004', '71.998', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', '', '36653', '36653'),
(98, 'Karak', '33.116', '71.083', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '35844', '35844'),
(99, 'Kundian', '32.452', '71.471', 'Pakistan', 'PK', 'Punjab', '', '35406', '35406'),
(100, 'Umarkot', '25.361', '69.736', 'Pakistan', 'PK', 'Sindh', 'minor', '35059', '35059'),
(101, 'Chitral', '35.851', '71.788', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '31100', '31100'),
(102, 'Dainyor', '35.920', '74.378', 'Pakistan', 'PK', 'Gilgit-Baltistan', '', '25000', '25000'),
(103, 'Kulachi', '31.928', '70.459', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', '', '24738', '24738'),
(104, 'Kalat', '29.025', '66.590', 'Pakistan', 'PK', 'Balochistān', 'minor', '22879', '22879'),
(105, 'Kotli', '33.515', '73.901', 'Pakistan', 'PK', 'Azad Kashmir', 'minor', '21462', '21462'),
(106, 'Gilgit', '35.920', '74.314', 'Pakistan', 'PK', 'Gilgit-Baltistan', 'minor', '8851', '8851'),
(107, 'Narowal', '32.102', '74.873', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(108, 'Khairpur Mir’s', '27.529', '68.759', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(109, 'Khanewal', '30.301', '71.932', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(110, 'Jhelum', '32.933', '73.733', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(111, 'Haripur', '33.994', '72.933', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(112, 'Shikarpur', '27.955', '68.638', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(113, 'Rawala Kot', '33.857', '73.760', 'Pakistan', 'PK', 'Azad Kashmir', 'minor', '', ''),
(114, 'Hafizabad', '32.070', '73.688', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(115, 'Lodhran', '29.538', '71.633', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(116, 'Malakand', '34.565', '71.930', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(117, 'Attock City', '33.766', '72.359', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(118, 'Batgram', '34.679', '73.026', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(119, 'Matiari', '25.597', '68.446', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(120, 'Ghotki', '28.006', '69.315', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(121, 'Naushahro Firoz', '26.840', '68.122', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(122, 'Alpurai', '34.900', '72.655', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(123, 'Bagh', '33.980', '73.774', 'Pakistan', 'PK', 'Azad Kashmir', 'minor', '', ''),
(124, 'Daggar', '34.511', '72.484', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(125, 'Leiah', '30.964', '70.944', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(126, 'Tando Muhammad Khan', '25.123', '68.538', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(127, 'Chakwal', '32.930', '72.850', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(128, 'Badin', '24.655', '68.838', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(129, 'Lakki', '32.607', '70.912', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(130, 'Rajanpur', '29.104', '70.329', 'Pakistan', 'PK', 'Punjab', 'minor', '', ''),
(131, 'Dera Allahyar', '28.416', '68.166', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(132, 'Shahdad Kot', '27.847', '67.906', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(133, 'Pishin', '30.583', '67.000', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(134, 'Sanghar', '26.046', '68.948', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(135, 'Upper Dir', '35.207', '71.876', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(136, 'Thatta', '24.746', '67.924', 'Pakistan', 'PK', 'Sindh', 'minor', '', ''),
(137, 'Dera Murad Jamali', '28.546', '68.223', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(138, 'Kohlu', '29.896', '69.253', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(139, 'Mastung', '29.799', '66.845', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(140, 'Dasu', '35.291', '73.290', 'Pakistan', 'PK', 'Khyber Pakhtunkhwa', 'minor', '', ''),
(141, 'Athmuqam', '34.571', '73.897', 'Pakistan', 'PK', 'Azad Kashmir', 'minor', '', ''),
(142, 'Loralai', '30.370', '68.597', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(143, 'Barkhan', '29.897', '69.525', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(144, 'Musa Khel Bazar', '30.859', '69.822', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(145, 'Ziarat', '30.381', '67.725', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(146, 'Gandava', '28.613', '67.485', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(147, 'Sibi', '29.543', '67.877', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(148, 'Dera Bugti', '29.036', '69.158', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(149, 'Eidgah', '35.347', '74.856', 'Pakistan', 'PK', 'Gilgit-Baltistan', 'minor', '', ''),
(150, 'Uthal', '25.807', '66.622', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(151, 'Khuzdar', '27.738', '66.643', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(152, 'Chilas', '35.420', '74.096', 'Pakistan', 'PK', 'Gilgit-Baltistan', 'minor', '', ''),
(153, 'Panjgur', '26.964', '64.090', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(154, 'Gakuch', '36.173', '73.766', 'Pakistan', 'PK', 'Gilgit-Baltistan', 'minor', '', ''),
(155, 'Qila Saifullah', '30.700', '68.359', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(156, 'Kharan', '28.583', '65.416', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(157, 'Aliabad', '36.307', '74.617', 'Pakistan', 'PK', 'Gilgit-Baltistan', 'minor', '', ''),
(158, 'Awaran', '26.456', '65.231', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(159, 'Dalbandin', '28.888', '64.406', 'Pakistan', 'PK', 'Balochistān', 'minor', '', ''),
(160, 'Bahara Meel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'Peer Mehal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'Shor kot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Chopar hatta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(250) NOT NULL,
  `is_college` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `class_name`, `is_college`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'hdsgxc', 1, 0, 1, '2022-10-20 18:30:31', '0000-00-00 00:00:00'),
(2, 'Five', 0, 0, 0, '2022-10-26 12:47:33', '0000-00-00 00:00:00'),
(7, 'two', 0, 0, 0, '2022-10-24 19:11:30', '0000-00-00 00:00:00'),
(8, 'Six', 0, 0, 0, '2022-10-26 12:48:59', '0000-00-00 00:00:00'),
(9, '4', 1, 0, 1, '2022-10-26 12:50:14', '0000-00-00 00:00:00'),
(10, 'play Group', 0, 0, 0, '2022-10-26 15:40:56', '0000-00-00 00:00:00'),
(11, '4', 0, 0, 1, '2022-10-27 17:36:49', '0000-00-00 00:00:00'),
(12, 'phgd6r-', 0, 1, 0, '2023-02-21 18:16:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

CREATE TABLE `tbl_site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_phone` varchar(300) NOT NULL,
  `site_skype` varchar(30) NOT NULL,
  `site_address` varchar(200) NOT NULL,
  `site_copyrights` varchar(200) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_tagline` varchar(250) NOT NULL,
  `site_url` varchar(250) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `s_date` date DEFAULT NULL,
  `site_header_code` text NOT NULL,
  `site_footer_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_site_settings`
--

INSERT INTO `tbl_site_settings` (`id`, `site_name`, `site_phone`, `site_skype`, `site_address`, `site_copyrights`, `site_logo`, `site_favicon`, `site_tagline`, `site_url`, `site_email`, `s_date`, `site_header_code`, `site_footer_code`) VALUES
(1, 'Britain', '0300-6330439,03006368584', 'wasifkhantareen', '	<b style=\"font-size:16px\">4B Auto Parts Company</b> <br>Masoom Shah Road Multan', '2021 all rights are reserved', 'unitedsoft_logo.png', 'fav-icon.png', 'Inventory Management System - Purchase, Sales, Stock, Billing Software', 'http://wwww.unitedsoft.net/', 'wasifkhanali@gmail.com', '2022-04-17', '		<b style=\"font-size:16px\">4B Auto Parts Company</b> <br>Masoom Shah Road Multan																																																																																												', '																																																																																															');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `employel_level` varchar(1000) NOT NULL,
  `employel_id` varchar(1000) NOT NULL,
  `employel_name` varchar(1000) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `father_contact` varchar(1000) NOT NULL,
  `spouse_name` varchar(1000) NOT NULL,
  `spouse_contact` varchar(11) NOT NULL,
  `date_birth` date NOT NULL,
  `jouning_date` date NOT NULL,
  `campus` int(11) NOT NULL,
  `employel_type` varchar(11) NOT NULL,
  `department` varchar(11) NOT NULL,
  `shift` varchar(11) NOT NULL,
  `cnic` varchar(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `city` varchar(11) NOT NULL,
  `salary_type` varchar(11) NOT NULL,
  `basic_salary` varchar(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ded_ration` varchar(11) NOT NULL,
  `travelling_allowane` varchar(11) NOT NULL,
  `lunch_allowance` varchar(11) NOT NULL,
  `other_allowance` varchar(11) NOT NULL,
  `fund_duction` varchar(11) NOT NULL,
  `bank_account` varchar(11) NOT NULL,
  `grace_time` varchar(11) NOT NULL,
  `employel_email` varchar(11) NOT NULL,
  `remarks` varchar(11) NOT NULL,
  `experience` varchar(11) NOT NULL,
  `organization` varchar(11) NOT NULL,
  `total_year` varchar(11) NOT NULL,
  `total_months` varchar(11) NOT NULL,
  `designation` varchar(11) NOT NULL,
  `starting_salary` varchar(11) NOT NULL,
  `employel_image` varchar(11) NOT NULL,
  `cast_qualification` varchar(11) NOT NULL,
  `institute` varchar(11) NOT NULL,
  `passing_year` varchar(11) NOT NULL,
  `appointmate_class` varchar(11) NOT NULL,
  `confirmation_date` varchar(11) NOT NULL,
  `staff_confirmation` tinyint(4) NOT NULL,
  `transfer_bank` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `employel_level`, `employel_id`, `employel_name`, `gender`, `father_name`, `father_contact`, `spouse_name`, `spouse_contact`, `date_birth`, `jouning_date`, `campus`, `employel_type`, `department`, `shift`, `cnic`, `contact`, `address`, `city`, `salary_type`, `basic_salary`, `account_no`, `ded_ration`, `travelling_allowane`, `lunch_allowance`, `other_allowance`, `fund_duction`, `bank_account`, `grace_time`, `employel_email`, `remarks`, `experience`, `organization`, `total_year`, `total_months`, `designation`, `starting_salary`, `employel_image`, `cast_qualification`, `institute`, `passing_year`, `appointmate_class`, `confirmation_date`, `staff_confirmation`, `transfer_bank`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Laraib Khan', 'Male', 'testing process', 'testing process', 'testing process', 'testing pro', '2023-02-23', '2023-02-25', 1, '3', '1', 'Morning', '33202-12345', '1234567', 'testing pro', 'testing pro', '1', '150000', '12345', '', '23456', '', '2345', '', '5432', 'testing pro', 'aamir@gmail', 'testing pro', 'testing pro', 'testing pro', 'testing pro', 'testing pro', 'testing pro', 'testing pro', '', 'testing pro', 'testing pro', '2015', 'testing pro', '', 0, 1, 1, 0, '2023-02-22 14:35:55', '0000-00-00 00:00:00'),
(2, '1', '2', 'Muhammad Anas', 'Male', 'Ali', 'testing', 'testing', 'testing', '2023-02-21', '2023-11-22', 2, '4', '3', 'Morning', '98976-54532', 'testing', 'testing', 'Multan', '1', '40000', 'testing', '', 'testing', '', 'testing', '', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', '', 'testing', 'testing', 'testing', 'testing', '', 0, 1, 1, 0, '2023-02-22 15:06:18', '0000-00-00 00:00:00'),
(3, '1', '3', 'Sheryar', 'Male', 'Sheryar', 'testing', 'testing', 'testing', '2023-02-23', '2023-02-17', 4, '6', '4', 'Evening', '12345-67890', 'testing', 'testing', 'testing', '1', 'testing', 'testing', '', 'testing', '', 'testing', '', 'testing', 'testing', 'a@gmail.com', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', '', 'testing', 'testing', 'testing', 'testing', '', 0, 0, 1, 0, '2023-02-22 15:41:58', '0000-00-00 00:00:00'),
(4, '1', '4', 'Sheryar', 'Male', 'Sheryar', 'testing', 'testing', 'testing', '2023-02-23', '2023-02-17', 4, '6', '4', 'Evening', '12345-67890', 'testing', 'testing', 'testing', '1', 'testing', 'testing', '', 'testing', '', 'testing', '', 'testing', 'testing', 'a@gmail.com', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', '', 'testing', 'testing', 'testing', 'testing', '', 0, 0, 1, 0, '2023-02-22 15:42:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `addmission_no` int(255) NOT NULL,
  `b_form` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `place_birth` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `religion` varchar(250) NOT NULL,
  `section_name` varchar(250) NOT NULL,
  `last_school` varchar(255) NOT NULL,
  `routes` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `expiry_date` date NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `fathre_occupt` varchar(255) NOT NULL,
  `mother_occup` varchar(255) NOT NULL,
  `app_user` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `gurdian_name` varchar(255) NOT NULL,
  `gurdian` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `land_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `emergency_phone` varchar(255) NOT NULL,
  `guest` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `addmission_no`, `b_form`, `name`, `session_name`, `gender`, `date_birth`, `age`, `campus`, `place_birth`, `class`, `nationality`, `religion`, `section_name`, `last_school`, `routes`, `image`, `expiry_date`, `father_name`, `cnic`, `mother_name`, `fathre_occupt`, `mother_occup`, `app_user`, `password`, `gurdian_name`, `gurdian`, `address`, `home_address`, `office_address`, `land_number`, `mobile_number`, `emergency_phone`, `guest`, `email`, `user_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3833, 'Testing', 'Ali', '7', 'male', '2010-04-15', 12, '1', 'Testing', '10', 'Pakistan', 'Islam', '1', 'Testing', '1', '', '0000-00-00', 'Testing', '33202-3412345-2', 'Testing', 'Testing', 'Testing', '1234567543', 3833, 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', '1234567543', 0, 'amir@gmail.com', 1, 0, '2023-02-22 13:16:54', '0000-00-00 00:00:00'),
(2, 3835, 'Again Testing', 'Amir', '8', 'male', '2010-12-29', 12, '2', 'Again Testing', '7', 'Pakistan', 'Islam', '2', 'Again Testing', '1', '', '0000-00-00', 'Again Testing', '33202-2345678-9', 'Again Testing', 'Again Testing', 'Again Testing', '9999999999876', 3835, 'Again Testing', 'Again Testing', 'Again Testing', 'Again Testing', 'Again Testing', 'Again Testing', 'Again Testing', '9999999999876', 0, 'amir@gmail.com', 1, 0, '2023-02-22 13:21:10', '0000-00-00 00:00:00'),
(3, 3837, '3332425353', 'Ahamd', '9', 'male', '1999-12-29', 23, '3', '3332425353', '2', 'Pakistan', 'Islam', '3', '3332425353', '1', '', '0000-00-00', '3332425353', '33324-2535389-0', '3332425353', '3332425353', '3332425353', '3332425353', 3837, '3332425353', '3332425353', '3332425353', '3332425353', '3332425353', '3332425353', '3332425353', '3332425353', 0, 'ali@gmail.com', 1, 0, '2023-02-22 13:24:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `s_date` date DEFAULT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `gender`, `password`, `status`, `s_date`, `role`) VALUES
(1, 'Wasif', 'Khan', 'wasif', 'wasifkhanali@gmail.com', 'm', 'e10adc3949ba59abbe56e057f20f883e', '1', '2022-10-15', 'admin'),
(2, 'Admin', 'Wasif', 'admin', 'admin@gmail.com', 'm', '0b129604b8ded005c20c176766d10904', '1', '2022-10-15', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_no`
--

CREATE TABLE `voucher_no` (
  `id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher_no`
--

INSERT INTO `voucher_no` (`id`, `voucher_no`, `datetime`) VALUES
(1, 3837, '2022-02-14 04:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actual_fee`
--
ALTER TABLE `actual_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks_account`
--
ALTER TABLE `banks_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_type`
--
ALTER TABLE `campus_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employel_level`
--
ALTER TABLE `employel_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employel_type`
--
ALTER TABLE `employel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_promotion`
--
ALTER TABLE `exam_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_default_package`
--
ALTER TABLE `fee_default_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_default_package_detail`
--
ALTER TABLE `fee_default_package_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_detail`
--
ALTER TABLE `fee_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_package`
--
ALTER TABLE `fee_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_year`
--
ALTER TABLE `session_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee_detail`
--
ALTER TABLE `student_fee_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_left`
--
ALTER TABLE `student_left`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_promotion`
--
ALTER TABLE `student_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_transfer`
--
ALTER TABLE `student_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_campus`
--
ALTER TABLE `tbl_campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_no`
--
ALTER TABLE `voucher_no`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actual_fee`
--
ALTER TABLE `actual_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks_account`
--
ALTER TABLE `banks_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campus_type`
--
ALTER TABLE `campus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employel_level`
--
ALTER TABLE `employel_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employel_type`
--
ALTER TABLE `employel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_promotion`
--
ALTER TABLE `exam_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_default_package`
--
ALTER TABLE `fee_default_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_default_package_detail`
--
ALTER TABLE `fee_default_package_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fee_detail`
--
ALTER TABLE `fee_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_package`
--
ALTER TABLE `fee_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session_year`
--
ALTER TABLE `session_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_fee_detail`
--
ALTER TABLE `student_fee_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_left`
--
ALTER TABLE `student_left`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_promotion`
--
ALTER TABLE `student_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_transfer`
--
ALTER TABLE `student_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_campus`
--
ALTER TABLE `tbl_campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_site_settings`
--
ALTER TABLE `tbl_site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher_no`
--
ALTER TABLE `voucher_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
