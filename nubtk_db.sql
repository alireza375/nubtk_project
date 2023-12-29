-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2023 at 05:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nubtk_db_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_courses`
--

CREATE TABLE `assign_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_courses`
--

INSERT INTO `assign_courses` (`id`, `teacher_id`, `user_id`, `course_id`) VALUES
(14, 6, NULL, 8),
(16, 4, 2, 1),
(18, 6, NULL, 10),
(19, 7, NULL, 11),
(20, 7, NULL, 12),
(21, 4, 2, 13),
(23, 7, NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `teacher_id` int DEFAULT NULL,
  `date` date NOT NULL,
  `attend_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `student_id`, `course_id`, `teacher_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(177, 2201, 14, 6, '2023-12-03', 'present', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(178, 2202, 14, 6, '2023-12-03', 'present', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(179, 2203, 14, 6, '2023-12-03', 'present', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(180, 2204, 14, 6, '2023-12-03', 'present', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(181, 2205, 14, 6, '2023-12-03', 'Absent', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(182, 2206, 14, 6, '2023-12-03', 'Absent', '2023-12-03 02:23:00', '2023-12-03 02:23:00'),
(188, 2101, 8, 5, '2023-12-03', 'Absent', '2023-12-03 09:23:14', '2023-12-03 09:23:14'),
(189, 2102, 8, 5, '2023-12-03', 'Absent', '2023-12-03 09:23:14', '2023-12-03 09:23:14'),
(190, 2103, 8, 5, '2023-12-03', 'present', '2023-12-03 09:23:14', '2023-12-03 09:23:14'),
(191, 2104, 8, 5, '2023-12-03', 'present', '2023-12-03 09:23:14', '2023-12-03 09:23:14'),
(192, 2105, 8, 5, '2023-12-03', 'present', '2023-12-03 09:23:14', '2023-12-03 09:23:14'),
(198, 4101, 13, 2, '2023-12-03', 'Absent', '2023-12-03 09:28:20', '2023-12-03 09:28:20'),
(199, 4102, 13, 2, '2023-12-03', 'Absent', '2023-12-03 09:28:20', '2023-12-03 09:28:20'),
(200, 4103, 13, 2, '2023-12-03', 'present', '2023-12-03 09:28:20', '2023-12-03 09:28:20'),
(201, 4104, 13, 2, '2023-12-03', 'present', '2023-12-03 09:28:20', '2023-12-03 09:28:20'),
(202, 4105, 13, 2, '2023-12-03', 'present', '2023-12-03 09:28:20', '2023-12-03 09:28:20'),
(203, 1101, 1, 2, '2023-12-04', 'present', '2023-12-04 09:34:15', '2023-12-04 09:34:15'),
(204, 1102, 1, 2, '2023-12-04', 'Absent', '2023-12-04 09:34:15', '2023-12-04 09:34:15'),
(205, 1103, 1, 2, '2023-12-04', 'Absent', '2023-12-04 09:34:15', '2023-12-04 09:34:15'),
(206, 1104, 1, 2, '2023-12-04', 'present', '2023-12-04 09:34:15', '2023-12-04 09:34:15'),
(207, 1105, 1, 2, '2023-12-04', 'present', '2023-12-04 09:34:15', '2023-12-04 09:34:15'),
(208, 1101, 1, 2, '2023-12-04', 'present', '2023-12-04 09:36:57', '2023-12-04 09:36:57'),
(209, 1102, 1, 2, '2023-12-04', 'present', '2023-12-04 09:36:57', '2023-12-04 09:36:57'),
(210, 1103, 1, 2, '2023-12-04', 'present', '2023-12-04 09:36:57', '2023-12-04 09:36:57'),
(211, 1104, 1, 2, '2023-12-04', 'Absent', '2023-12-04 09:36:57', '2023-12-04 09:36:57'),
(212, 1105, 1, 2, '2023-12-04', 'Absent', '2023-12-04 09:36:57', '2023-12-04 09:36:57'),
(213, 1101, 1, 2, '2023-12-01', 'present', '2023-12-04 09:38:11', '2023-12-04 09:38:11'),
(214, 1102, 1, 2, '2023-12-01', 'present', '2023-12-04 09:38:11', '2023-12-04 09:38:11'),
(215, 1103, 1, 2, '2023-12-01', 'present', '2023-12-04 09:38:11', '2023-12-04 09:38:11'),
(216, 1104, 1, 2, '2023-12-01', 'Absent', '2023-12-04 09:38:12', '2023-12-04 09:38:12'),
(217, 1105, 1, 2, '2023-12-01', 'Absent', '2023-12-04 09:38:12', '2023-12-04 09:38:12'),
(218, 1101, 1, 2, '2023-11-30', 'present', '2023-12-04 09:40:48', '2023-12-04 09:40:48'),
(219, 1102, 1, 2, '2023-11-30', 'present', '2023-12-04 09:40:48', '2023-12-04 09:40:48'),
(220, 1103, 1, 2, '2023-11-30', 'present', '2023-12-04 09:40:48', '2023-12-04 09:40:48'),
(221, 1104, 1, 2, '2023-11-30', 'Absent', '2023-12-04 09:40:48', '2023-12-04 09:40:48'),
(222, 1105, 1, 2, '2023-11-30', 'Absent', '2023-12-04 09:40:48', '2023-12-04 09:40:48'),
(223, 1101, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(224, 1102, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(225, 1103, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(226, 1104, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(227, 1105, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(228, 4101, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(229, 4102, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(230, 4103, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(231, 4104, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(232, 4105, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(233, 2101, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(234, 2102, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(235, 2103, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(236, 2104, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(237, 2105, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(238, 2201, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(239, 2202, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(240, 2203, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(241, 2204, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(242, 2205, 13, 2, '2023-12-08', 'Absent', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(243, 2206, 13, 2, '2023-12-08', 'present', '2023-12-08 05:04:55', '2023-12-08 05:04:55'),
(244, 1101, 1, 2, '2023-12-08', 'present', '2023-12-08 05:10:52', '2023-12-08 05:10:52'),
(245, 1102, 1, 2, '2023-12-08', 'present', '2023-12-08 05:10:52', '2023-12-08 05:10:52'),
(246, 1103, 1, 2, '2023-12-08', 'Absent', '2023-12-08 05:10:52', '2023-12-08 05:10:52'),
(247, 1104, 1, 2, '2023-12-08', 'present', '2023-12-08 05:10:52', '2023-12-08 05:10:52'),
(248, 1105, 1, 2, '2023-12-08', 'Absent', '2023-12-08 05:10:52', '2023-12-08 05:10:52'),
(269, 4101, 13, 2, '2023-12-08', 'present', '2023-12-08 12:22:30', '2023-12-08 12:22:30'),
(270, 4102, 13, 2, '2023-12-08', 'Absent', '2023-12-08 12:22:30', '2023-12-08 12:22:30'),
(271, 4103, 13, 2, '2023-12-08', 'Absent', '2023-12-08 12:22:30', '2023-12-08 12:22:30'),
(272, 4104, 13, 2, '2023-12-08', 'Absent', '2023-12-08 12:22:30', '2023-12-08 12:22:30'),
(273, 4105, 13, 2, '2023-12-08', 'present', '2023-12-08 12:22:30', '2023-12-08 12:22:30'),
(274, 2201, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(275, 2202, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(276, 2203, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(277, 2204, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(278, 2205, 13, 2, '2023-12-03', 'Absent', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(279, 2206, 13, 2, '2023-12-03', 'Absent', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(280, 2101, 13, 2, '2023-12-03', 'Absent', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(281, 2102, 13, 2, '2023-12-03', 'Absent', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(282, 2103, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(283, 2104, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(284, 2105, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(285, 4101, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(286, 4102, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(287, 4103, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(288, 4104, 13, 2, '2023-12-03', 'Absent', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(289, 4105, 13, 2, '2023-12-03', 'Present', '2023-12-08 12:48:56', '2023-12-08 12:48:56'),
(290, 1101, 1, 2, '2023-12-09', 'Absent', '2023-12-08 22:59:33', '2023-12-08 22:59:33'),
(291, 1102, 1, 2, '2023-12-09', 'Absent', '2023-12-08 22:59:33', '2023-12-08 22:59:33'),
(292, 1103, 1, 2, '2023-12-09', 'Absent', '2023-12-08 22:59:33', '2023-12-08 22:59:33'),
(293, 1104, 1, 2, '2023-12-09', 'Absent', '2023-12-08 22:59:33', '2023-12-08 22:59:33'),
(294, 1105, 1, 2, '2023-12-09', 'Absent', '2023-12-08 22:59:33', '2023-12-08 22:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marksheets` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `course_name_slug`, `duration`, `attendence`, `marksheets`, `created_at`, `updated_at`) VALUES
(1, 'Structure Program', '1101', '1101', NULL, NULL, 'https://docs.google.com/document/d/1DEQ55FqpiyEhIObijOHpYnFBfpHq4AGS/edit', '2023-11-28 10:15:27', '2023-11-28 10:15:27'),
(8, 'Data Structure', '3108', '3108', NULL, 'https://docs.google.com/document/d/1hBgb5SHl-f8UXNqG8D4e9QbWEciPlWka/edit', 'https://docs.google.com/document/d/1e32lTBz2SUwR1e3K2ncvAgNq0OYb8f4c/edit', '2023-10-22 08:16:41', '2023-10-22 08:16:41'),
(10, 'Algorithm', '2201', '2201', NULL, 'https://docs.google.com/document/d/1B5biJ26D33tdYnUqumcXNJNuChKDcETc/edit', 'https://docs.google.com/document/d/1j2lnJH_nIXdNhofIq0in5TCvTNYLXZuf/edit', '2023-10-22 08:27:54', '2023-10-22 08:27:54'),
(11, 'OOP(C++)', '1202', '1202', '6 months', 'https://docs.google.com/document/d/19gsnLqtjsJ9u66aolWLFrmaTIk3KIQEZ/edit', 'https://docs.google.com/document/d/1Vwjmg4_AzTSeJyrMB4nfoPcZWIjGLQZo/edit', '2023-10-22 08:17:47', NULL),
(12, 'Java', '3105', '3105', '6 months', 'https://docs.google.com/document/d/1PpvkSNYWIy4noK7jk3BTBi2dA2sVrWlE/edit', 'https://docs.google.com/document/d/1F65xsAptbB9WUSftHX_nBZ4vEqk6wYkr/edit', '2023-10-22 08:28:37', NULL),
(13, 'AI', '4105', '4105', '6 months', 'https://docs.google.com/document/d/103ttKjLLCzmKINEG1GzavB4Uq7JOKtqu/edit', 'https://docs.google.com/document/d/16-jwJmFEtSkJlpdxW_7MFoXT3b4waGEa/edit', '2023-10-31 23:11:38', NULL),
(14, 'software Engineering', '3110', '3110', NULL, NULL, NULL, '2023-12-03 02:17:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `student_id`, `course_id`) VALUES
(1, 101, 3101),
(2, 102, 3101),
(3, 103, 3101),
(4, 104, 3101),
(5, 103, 4105),
(6, 105, 4105),
(7, 103, 2201);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marksheets`
--

CREATE TABLE `marksheets` (
  `id` bigint UNSIGNED NOT NULL,
  `stu_id` int NOT NULL,
  `stu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_ca` int DEFAULT NULL,
  `stu_mid` int DEFAULT NULL,
  `stu_final` int DEFAULT NULL,
  `stu_mark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marksheets`
--

INSERT INTO `marksheets` (`id`, `stu_id`, `stu_name`, `stu_section`, `stu_ca`, `stu_mid`, `stu_final`, `stu_mark`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(64, 1105, 'Saiem', '1A', 25, 25, 35, 'A+', 1, NULL, '2023-11-29 00:04:55', '2023-11-29 00:04:55'),
(65, 1104, 'Sany', '1A', 20, 20, 30, 'A', 1, NULL, '2023-11-29 00:04:55', '2023-11-29 00:04:55'),
(66, 1103, 'Jamshed', '1A', 15, 15, 30, 'A-', 1, NULL, '2023-11-29 00:04:55', '2023-11-29 00:04:55'),
(67, 1102, 'Sohan', '1A', 20, 15, 15, 'B', 1, NULL, '2023-11-29 00:04:55', '2023-11-29 00:04:55'),
(68, 1101, 'Riyan', '1A', 20, 20, 20, 'A-', 1, NULL, '2023-11-29 00:04:55', '2023-11-29 00:04:55'),
(69, 4105, 'Moni', '7A', 20, 25, 25, 'A', 13, NULL, '2023-11-29 00:36:53', '2023-11-29 00:36:53'),
(70, 4104, 'Mehedi', '7A', 25, 25, 30, 'A+', 13, NULL, '2023-11-29 00:36:53', '2023-11-29 00:36:53'),
(71, 4103, 'Ziya', '7A', 15, 20, 20, 'B', 13, NULL, '2023-11-29 00:36:53', '2023-11-29 00:36:53'),
(72, 4102, 'Sornami', '7A', 20, 10, 5, 'F', 13, NULL, '2023-11-29 00:36:53', '2023-11-29 00:36:53'),
(73, 4101, 'Ali Hasan', '7A', 25, 28, 30, 'A+', 13, NULL, '2023-11-29 00:36:53', '2023-11-29 00:36:53'),
(74, 2101, 'Rafiq', '3A', 20, 22, 30, 'A', 8, NULL, '2023-12-03 00:55:28', '2023-12-03 00:55:28'),
(75, 2102, 'Delwer', '3A', 15, 25, 35, 'A', 8, NULL, '2023-12-03 00:55:28', '2023-12-03 00:55:28'),
(76, 2103, 'Nimmi', '3A', 17, 15, 25, 'B', 8, NULL, '2023-12-03 00:55:28', '2023-12-03 00:55:28'),
(77, 2104, 'Sahriar', '3A', 22, 16, 20, 'B', 8, NULL, '2023-12-03 00:55:28', '2023-12-03 00:55:28'),
(78, 2105, 'Tutul', '3A', 25, 28, 30, 'A+', 8, NULL, '2023-12-03 00:55:28', '2023-12-03 00:55:28'),
(79, 2201, 'Al Hasan', '4A', 20, 20, 33, 'A', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50'),
(80, 2202, 'Md Rahman', '4A', 10, 21, 30, 'A-', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50'),
(81, 2203, 'J Mojumdar', '4A', 25, 25, 28, 'A', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50'),
(82, 2204, 'Sanaul', '4A', 16, 20, 20, 'B', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50'),
(83, 2205, 'Sheikh', '4A', 20, 15, 25, 'A-', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50'),
(84, 2206, 'Arjun', '4A', 15, 18, 20, 'B', 14, NULL, '2023-12-03 02:24:50', '2023-12-03 02:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_26_154058_create_teachers_table', 1),
(7, '2023_09_21_153253_create_courses_table', 1),
(8, '2023_09_24_140936_create_assign_courses_table', 1),
(9, '2023_11_12_171124_create_attendences_table', 2),
(10, '2023_11_13_150512_create_marksheets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$0U0BnSEt6VRjApRkS2iWZOZWY4XqndvnrJ4ZwLlNKu3ai4RcjzBfC', '2023-10-28 09:01:45'),
('ali@gmail.com', '$2y$10$wCFx5ougzq/Au0M0sCkbDO9glZEKfX2kI/zJu.SxSReXbgcJXvJja', '2023-10-28 11:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `stu_id` varchar(10) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_section` varchar(50) NOT NULL,
  `course_id` int DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stu_id`, `stu_name`, `stu_section`, `course_id`, `mark`, `created_at`, `updated_at`) VALUES
(108, '1101', 'Riyan', '1A\r', 1101, NULL, NULL, NULL),
(109, '1102', 'Sohan', '1A\r', 1101, NULL, NULL, NULL),
(110, '1103', 'Jamshed', '1A\r', 1101, NULL, NULL, NULL),
(111, '1104', 'Sany', '1A\r', 1101, NULL, NULL, NULL),
(112, '1105', 'Saiem', '1A', 1101, NULL, NULL, NULL),
(113, '4101', 'Ali Hasan', '7A\r', 4105, NULL, NULL, NULL),
(114, '4102', 'Sornami', '7A\r', 4105, NULL, NULL, NULL),
(115, '4103', 'Ziya', '7A\r', 4105, NULL, NULL, NULL),
(116, '4104', 'Mehedi', '7A\r', 4105, NULL, NULL, NULL),
(117, '4105', 'Moni', '7A', 4105, NULL, NULL, NULL),
(124, '2101', 'Rafiq', '3A\r', 3108, NULL, NULL, NULL),
(125, '2102', 'Delwer', '3A\r', 3108, NULL, NULL, NULL),
(126, '2103', 'Nimmi', '3A\r', 3108, NULL, NULL, NULL),
(127, '2104', 'Sahriar', '3A\r', 3108, NULL, NULL, NULL),
(128, '2105', 'Tutul', '3A', 3108, NULL, NULL, NULL),
(129, '2201', 'Al Hasan', '4A\r', 3110, NULL, NULL, NULL),
(130, '2202', 'Md Rahman', '4A\r', 3110, NULL, NULL, NULL),
(131, '2203', 'J Mojumdar', '4A\r', 3110, NULL, NULL, NULL),
(132, '2204', 'Sanaul', '4A\r', 3110, NULL, NULL, NULL),
(133, '2205', 'Sheikh', '4A', 3110, NULL, NULL, NULL),
(134, '2206', 'Arjun', '4A', 3110, NULL, '2023-12-03 02:22:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `salary` int DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `address`, `salary`, `course`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Ali', 'ali@gmail.com', '0121353324', 'Modern Furniture', 12000, NULL, '/upload/teacher/1778459528292452.jpg', 2, '2023-09-30 04:52:55', '2023-09-30 05:55:37'),
(6, 'shamim', 'shamin@gmail.com', '0121354648', 'Modern Furniture', 57567, NULL, '/upload/teacher/1781018255549354.jpg', 5, '2023-09-30 05:16:24', '2023-10-28 10:42:47'),
(7, 'Reme Rahman', 'reme@gmail.com', '01997344547', 'Dhaka', 310000, NULL, '/upload/teacher/1780466318958972.jpg', 6, '2023-10-22 08:27:12', '2023-10-22 08:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','teacher') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nubtk', 'nubtk@gmail.com', '01795869542', NULL, 'admin', NULL, '$2y$10$yImoJRigFmG0aqT1GaRireDTHxbfEJPgUZHC0imWsRuGS579ulTVm', NULL, NULL, '2023-12-05 08:54:37'),
(2, 'Ali', 'ali@gmail.com', '0121353324', NULL, 'teacher', NULL, '$2y$10$uATcz7hyUJMcFUyNKbvYqexu9S6bA3E/jdoRdP5l5S6f5WE63Keqe', NULL, '2023-09-30 04:52:55', NULL),
(5, 'shamim', 'shamim@gmail.com', '0121354648', NULL, 'teacher', NULL, '$2y$10$72FRMo4jVJHPy1FL6BNHg.DwJlh5W2O7eLwvtDtHGnLT88yeked2.', NULL, '2023-09-30 05:16:24', NULL),
(6, 'Reme Rahman', 'reme@gmail.com', '01997344547', NULL, 'teacher', NULL, '$2y$10$HIQFIzvDIOv.5DG.4fOi6u1NVkLYDMhXRc2pWQDJxRnW/HHvM8NdW', NULL, '2023-10-22 08:27:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_courses`
--
ALTER TABLE `assign_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marksheets`
--
ALTER TABLE `marksheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_courses`
--
ALTER TABLE `assign_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marksheets`
--
ALTER TABLE `marksheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
