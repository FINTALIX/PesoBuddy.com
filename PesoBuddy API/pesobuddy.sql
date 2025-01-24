-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 08:20 AM
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
-- Database: `pesobuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `categoryName` varchar(35) NOT NULL,
  `categoryType` varchar(20) NOT NULL,
  `isDeleted` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `userID`, `categoryName`, `categoryType`, `isDeleted`) VALUES
(1, 2, 'Vacation', 'Expense', 'no'),
(2, 2, 'Investment', 'Savings', 'no'),
(3, 2, 'Side Hustle', 'Income', 'no'),
(4, 2, 'Fitness', 'Income', 'no'),
(5, 2, 'Birthday', 'Expense', 'no'),
(6, 3, 'Vacation', 'Expense', 'no'),
(7, 3, 'Freelance Work', 'Income', 'no'),
(8, 3, 'Investment', 'Savings', 'no'),
(9, 4, 'Rent', 'Expense', 'no'),
(10, 4, 'Transportation', 'Expense', 'no'),
(11, 4, 'Dining', 'Expense', 'no'),
(12, 4, 'Freelance', 'Income', 'no'),
(13, 4, 'Investments', 'Income', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `defaultcategories`
--

CREATE TABLE `defaultcategories` (
  `defaultCategoryID` int(11) NOT NULL,
  `defaultCategoryName` varchar(35) NOT NULL,
  `defaultCategoryType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `defaultcategories`
--

INSERT INTO `defaultcategories` (`defaultCategoryID`, `defaultCategoryName`, `defaultCategoryType`) VALUES
(1, 'Salary', 'Income'),
(2, 'Entertainment', 'Expense'),
(3, 'Food', 'Expense'),
(4, 'Healthcare', 'Expense'),
(5, 'Education', 'Savings');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `loginID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `loginDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`loginID`, `userID`, `loginDate`) VALUES
(1, 2, '2023-01-05 03:30:00.000000'),
(2, 2, '2023-01-15 06:00:00.000000'),
(3, 2, '2023-01-20 01:00:00.000000'),
(4, 2, '2023-01-05 01:00:00.000000'),
(5, 2, '2023-01-10 03:00:00.000000'),
(6, 2, '2023-01-15 06:00:00.000000'),
(7, 2, '2023-01-06 02:30:00.000000'),
(8, 2, '2023-01-09 04:00:00.000000'),
(9, 2, '2023-01-15 03:30:00.000000'),
(10, 2, '2023-02-05 02:00:00.000000'),
(11, 2, '2023-02-10 05:00:00.000000'),
(12, 2, '2023-02-15 03:30:00.000000'),
(13, 2, '2023-02-05 01:00:00.000000'),
(14, 2, '2023-02-10 04:30:00.000000'),
(15, 2, '2023-02-15 05:00:00.000000'),
(16, 2, '2023-02-06 06:00:00.000000'),
(17, 2, '2023-02-10 02:30:00.000000'),
(18, 2, '2023-02-15 04:00:00.000000'),
(19, 2, '2023-03-05 02:00:00.000000'),
(20, 2, '2023-03-07 01:30:00.000000'),
(21, 2, '2023-03-08 07:30:00.000000'),
(22, 2, '2023-03-12 03:00:00.000000'),
(23, 2, '2023-03-12 04:00:00.000000'),
(24, 2, '2023-03-12 05:00:00.000000'),
(25, 2, '2023-03-17 05:30:00.000000'),
(26, 2, '2023-03-18 02:00:00.000000'),
(27, 2, '2023-04-03 01:00:00.000000'),
(28, 2, '2023-04-05 06:00:00.000000'),
(29, 2, '2023-04-06 08:00:00.000000'),
(30, 2, '2023-04-08 02:00:00.000000'),
(31, 2, '2023-04-10 04:00:00.000000'),
(32, 2, '2023-04-11 06:30:00.000000'),
(33, 2, '2023-04-14 05:00:00.000000'),
(34, 2, '2023-04-15 02:30:00.000000'),
(35, 2, '2023-04-18 07:30:00.000000'),
(36, 2, '2023-05-05 02:30:00.000000'),
(37, 2, '2023-05-12 06:00:00.000000'),
(38, 2, '2023-05-19 08:00:00.000000'),
(39, 2, '2023-05-04 00:30:00.000000'),
(40, 2, '2023-05-09 02:30:00.000000'),
(41, 2, '2023-05-16 03:00:00.000000'),
(42, 2, '2023-05-07 05:30:00.000000'),
(43, 2, '2023-05-11 04:30:00.000000'),
(44, 2, '2023-05-18 06:00:00.000000'),
(45, 2, '2023-06-05 02:00:00.000000'),
(46, 2, '2023-06-12 05:00:00.000000'),
(47, 2, '2023-06-19 07:00:00.000000'),
(48, 2, '2023-06-03 00:00:00.000000'),
(49, 2, '2023-06-09 02:30:00.000000'),
(50, 2, '2023-06-14 03:30:00.000000'),
(51, 2, '2023-06-07 04:00:00.000000'),
(52, 2, '2023-06-12 06:00:00.000000'),
(53, 2, '2023-06-19 07:30:00.000000'),
(54, 2, '2023-07-04 01:00:00.000000'),
(55, 2, '2023-07-05 05:00:00.000000'),
(56, 2, '2023-07-08 04:30:00.000000'),
(57, 2, '2023-07-09 03:00:00.000000'),
(58, 2, '2023-07-11 06:30:00.000000'),
(59, 2, '2023-07-12 02:00:00.000000'),
(60, 2, '2023-07-15 05:00:00.000000'),
(61, 2, '2023-07-19 06:30:00.000000'),
(62, 2, '2023-07-20 07:00:00.000000'),
(63, 2, '2023-08-02 01:30:00.000000'),
(64, 2, '2023-08-05 04:00:00.000000'),
(65, 2, '2023-08-08 05:00:00.000000'),
(66, 2, '2023-08-10 02:00:00.000000'),
(67, 2, '2023-08-12 06:00:00.000000'),
(68, 2, '2023-08-14 06:00:00.000000'),
(69, 2, '2023-08-16 04:30:00.000000'),
(70, 2, '2023-08-18 07:00:00.000000'),
(71, 2, '2023-08-19 05:30:00.000000'),
(72, 2, '2023-09-05 05:00:00.000000'),
(73, 2, '2023-09-12 02:30:00.000000'),
(74, 2, '2023-09-18 03:00:00.000000'),
(75, 2, '2023-09-02 02:00:00.000000'),
(76, 2, '2023-09-08 03:30:00.000000'),
(77, 2, '2023-09-14 04:00:00.000000'),
(78, 2, '2023-09-06 04:30:00.000000'),
(79, 2, '2023-09-11 05:30:00.000000'),
(80, 2, '2023-09-20 06:00:00.000000'),
(81, 2, '2023-10-05 02:00:00.000000'),
(82, 2, '2023-10-12 04:00:00.000000'),
(83, 2, '2023-10-19 03:30:00.000000'),
(84, 2, '2023-10-04 01:00:00.000000'),
(85, 2, '2023-10-10 02:30:00.000000'),
(86, 2, '2023-10-14 04:00:00.000000'),
(87, 2, '2023-10-06 03:00:00.000000'),
(88, 2, '2023-10-11 05:00:00.000000'),
(89, 2, '2023-10-18 06:00:00.000000'),
(90, 2, '2023-11-05 03:00:00.000000'),
(91, 2, '2023-11-12 04:30:00.000000'),
(92, 2, '2023-11-19 02:30:00.000000'),
(93, 2, '2023-11-02 02:00:00.000000'),
(94, 2, '2023-11-10 01:30:00.000000'),
(95, 2, '2023-11-14 04:00:00.000000'),
(96, 2, '2023-11-06 03:00:00.000000'),
(97, 2, '2023-11-12 06:00:00.000000'),
(98, 2, '2023-11-18 04:30:00.000000'),
(99, 2, '2023-12-05 01:30:00.000000'),
(100, 2, '2023-12-12 02:00:00.000000'),
(101, 2, '2023-12-18 03:30:00.000000'),
(102, 2, '2023-12-02 02:00:00.000000'),
(103, 2, '2023-12-10 01:30:00.000000'),
(104, 2, '2023-12-14 04:00:00.000000'),
(105, 2, '2023-12-06 04:00:00.000000'),
(106, 2, '2023-12-11 05:00:00.000000'),
(107, 2, '2023-12-17 06:00:00.000000'),
(108, 1, '2025-01-23 10:37:19.113230'),
(109, 2, '2025-01-23 10:40:27.818197'),
(110, 1, '2025-01-23 10:41:44.540965'),
(111, 1, '2025-01-23 10:47:37.383497'),
(112, 2, '2025-01-23 13:34:35.550564'),
(113, 2, '2025-01-23 13:49:35.400193'),
(114, 1, '2025-01-23 13:50:07.767109'),
(115, 1, '2025-01-23 14:06:43.930020'),
(116, 2, '2025-01-23 14:13:01.276763'),
(117, 1, '2025-01-23 14:13:13.747811'),
(118, 2, '2025-01-23 14:19:24.540674'),
(119, 1, '2025-01-23 14:19:34.490970'),
(120, 1, '2025-01-23 14:40:14.341433'),
(121, 3, '2025-01-23 16:56:58.859309'),
(122, 1, '2025-01-23 16:57:49.494126'),
(123, 3, '2024-01-05 02:00:00.000000'),
(124, 3, '2024-01-06 01:30:00.000000'),
(125, 3, '2024-01-10 01:30:00.000000'),
(126, 3, '2024-01-10 06:00:00.000000'),
(127, 3, '2024-01-12 01:00:00.000000'),
(128, 3, '2024-01-15 04:00:00.000000'),
(129, 3, '2024-01-18 03:30:00.000000'),
(130, 3, '2024-01-20 03:00:00.000000'),
(131, 3, '2024-01-25 05:00:00.000000'),
(132, 3, '2024-02-05 02:00:00.000000'),
(133, 3, '2024-02-06 01:30:00.000000'),
(134, 3, '2024-02-10 01:30:00.000000'),
(135, 3, '2024-02-10 06:00:00.000000'),
(136, 3, '2024-02-12 01:00:00.000000'),
(137, 3, '2024-02-15 04:00:00.000000'),
(138, 3, '2024-02-18 03:30:00.000000'),
(139, 3, '2024-02-20 03:00:00.000000'),
(140, 3, '2024-02-25 05:00:00.000000'),
(141, 3, '2024-03-05 02:00:00.000000'),
(142, 3, '2024-03-06 01:30:00.000000'),
(143, 3, '2024-03-10 01:30:00.000000'),
(144, 3, '2024-03-10 06:00:00.000000'),
(145, 3, '2024-03-12 01:00:00.000000'),
(146, 3, '2024-03-15 04:00:00.000000'),
(147, 3, '2024-03-18 03:30:00.000000'),
(148, 3, '2024-03-20 03:00:00.000000'),
(149, 3, '2024-03-25 05:00:00.000000'),
(150, 3, '2024-04-05 02:00:00.000000'),
(151, 3, '2024-04-06 01:30:00.000000'),
(152, 3, '2024-04-10 01:30:00.000000'),
(153, 3, '2024-04-10 06:00:00.000000'),
(154, 3, '2024-04-12 01:00:00.000000'),
(155, 3, '2024-04-15 04:00:00.000000'),
(156, 3, '2024-04-18 03:30:00.000000'),
(157, 3, '2024-04-20 03:00:00.000000'),
(158, 3, '2024-04-25 05:00:00.000000'),
(159, 3, '2024-05-05 02:00:00.000000'),
(160, 3, '2024-05-06 01:30:00.000000'),
(161, 3, '2024-05-10 01:30:00.000000'),
(162, 3, '2024-05-10 06:00:00.000000'),
(163, 3, '2024-05-12 01:00:00.000000'),
(164, 3, '2024-05-15 04:00:00.000000'),
(165, 3, '2024-05-18 03:30:00.000000'),
(166, 3, '2024-05-20 03:00:00.000000'),
(167, 3, '2024-05-25 05:00:00.000000'),
(168, 3, '2024-06-05 02:00:00.000000'),
(169, 3, '2024-06-06 01:30:00.000000'),
(170, 3, '2024-06-10 01:30:00.000000'),
(171, 3, '2024-06-10 06:00:00.000000'),
(172, 3, '2024-06-12 01:00:00.000000'),
(173, 3, '2024-06-15 04:00:00.000000'),
(174, 3, '2024-06-18 03:30:00.000000'),
(175, 3, '2024-06-20 03:00:00.000000'),
(176, 3, '2024-06-25 05:00:00.000000'),
(177, 3, '2024-07-03 02:30:00.000000'),
(178, 3, '2024-07-05 03:00:00.000000'),
(179, 3, '2024-07-07 01:00:00.000000'),
(180, 3, '2024-07-12 05:30:00.000000'),
(181, 3, '2024-07-14 04:00:00.000000'),
(182, 3, '2024-07-15 01:00:00.000000'),
(183, 3, '2024-07-20 02:00:00.000000'),
(184, 3, '2024-07-21 06:00:00.000000'),
(185, 3, '2024-07-28 08:00:00.000000'),
(186, 3, '2024-08-02 02:30:00.000000'),
(187, 3, '2024-08-04 02:00:00.000000'),
(188, 3, '2024-08-06 03:30:00.000000'),
(189, 3, '2024-08-11 04:30:00.000000'),
(190, 3, '2024-08-14 01:30:00.000000'),
(191, 3, '2024-08-15 06:00:00.000000'),
(192, 3, '2024-08-22 05:00:00.000000'),
(193, 3, '2024-08-25 03:00:00.000000'),
(194, 3, '2024-08-28 01:00:00.000000'),
(195, 3, '2024-09-03 02:00:00.000000'),
(196, 3, '2024-09-12 05:00:00.000000'),
(197, 3, '2024-09-21 04:30:00.000000'),
(198, 3, '2024-09-08 01:30:00.000000'),
(199, 3, '2024-09-16 06:00:00.000000'),
(200, 3, '2024-09-27 02:30:00.000000'),
(201, 3, '2024-09-05 03:00:00.000000'),
(202, 3, '2024-09-13 02:00:00.000000'),
(203, 3, '2024-09-23 05:00:00.000000'),
(204, 3, '2024-10-07 04:00:00.000000'),
(205, 3, '2024-10-15 06:30:00.000000'),
(206, 3, '2024-10-22 05:00:00.000000'),
(207, 3, '2024-10-05 01:30:00.000000'),
(208, 3, '2024-10-18 03:00:00.000000'),
(209, 3, '2024-10-28 07:00:00.000000'),
(210, 3, '2024-10-04 02:30:00.000000'),
(211, 3, '2024-10-16 01:30:00.000000'),
(212, 3, '2024-10-23 05:30:00.000000'),
(213, 3, '2024-11-03 03:00:00.000000'),
(214, 3, '2024-11-12 06:00:00.000000'),
(215, 3, '2024-11-20 04:30:00.000000'),
(216, 3, '2024-11-07 02:30:00.000000'),
(217, 3, '2024-11-16 05:00:00.000000'),
(218, 3, '2024-11-25 08:00:00.000000'),
(219, 3, '2024-11-05 03:30:00.000000'),
(220, 3, '2024-11-15 01:30:00.000000'),
(221, 3, '2024-11-22 04:00:00.000000'),
(222, 3, '2024-12-04 02:00:00.000000'),
(223, 3, '2024-12-14 05:30:00.000000'),
(224, 3, '2024-12-23 03:00:00.000000'),
(225, 3, '2024-12-05 01:00:00.000000'),
(226, 3, '2024-12-17 04:30:00.000000'),
(227, 3, '2024-12-28 07:00:00.000000'),
(228, 3, '2024-12-06 02:30:00.000000'),
(229, 3, '2024-12-16 01:30:00.000000'),
(230, 3, '2024-12-22 05:00:00.000000'),
(231, 4, '2025-01-05 01:00:00.000000'),
(232, 4, '2025-01-10 02:01:00.000000'),
(233, 4, '2025-01-15 03:02:00.000000'),
(234, 4, '2025-01-20 04:03:00.000000'),
(235, 4, '2025-01-25 05:04:00.000000'),
(236, 4, '2025-01-05 01:01:00.000000'),
(237, 4, '2025-01-10 02:02:00.000000'),
(238, 4, '2025-01-15 03:03:00.000000'),
(239, 4, '2025-01-20 04:04:00.000000'),
(240, 4, '2025-01-25 05:05:00.000000'),
(241, 4, '2025-01-05 01:02:00.000000'),
(242, 4, '2025-01-10 02:03:00.000000'),
(243, 4, '2025-01-15 03:04:00.000000'),
(244, 4, '2025-01-20 04:05:00.000000'),
(245, 4, '2025-01-25 05:06:00.000000'),
(246, 4, '2025-01-23 17:06:10.600310'),
(247, 4, '2025-01-23 17:10:22.730818'),
(248, 4, '2025-01-24 07:09:33.642394');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settingsID` int(10) NOT NULL,
  `settingName` varchar(30) DEFAULT NULL,
  `settingValue` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsID`, `settingName`, `settingValue`) VALUES
(1, 'logo', NULL),
(2, 'theme', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `categoryID` int(10) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `transactionDate` datetime(6) NOT NULL,
  `description` varchar(70) NOT NULL,
  `defaultCategoryID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionID`, `userID`, `categoryID`, `amount`, `transactionDate`, `description`, `defaultCategoryID`) VALUES
(1, 2, NULL, 400, '2023-01-05 11:30:00.000000', 'Saving for education in January', 5),
(2, 2, NULL, 350, '2023-01-15 14:00:00.000000', 'Saving for education in January', 5),
(3, 2, NULL, 300, '2023-01-20 09:00:00.000000', 'Saving for education in January', 5),
(4, 2, 3, 3500, '2023-01-05 00:00:00.000000', 'Income from side hustle in January', 0),
(5, 2, NULL, 4500, '2023-01-10 11:00:00.000000', 'Salary income for January', 1),
(6, 2, 4, 2500, '2023-01-15 14:00:00.000000', 'Income from fitness in January', NULL),
(7, 2, NULL, 1000, '2023-01-06 10:30:00.000000', 'Entertainment expense in January', 2),
(8, 2, NULL, 350, '2023-01-09 12:00:00.000000', 'Food expense in January', 3),
(9, 2, 5, 1200, '2023-01-15 11:30:00.000000', 'Vacation expense in January', NULL),
(10, 2, NULL, 400, '2023-02-05 10:00:00.000000', 'Saving towards my education fees for February', 5),
(11, 2, NULL, 450, '2023-02-10 13:00:00.000000', 'Put aside some funds for my educational expenses this month', 5),
(12, 2, NULL, 500, '2023-02-15 11:30:00.000000', 'Contributing to my education fund for the upcoming semester', 5),
(13, 2, 3, 3600, '2023-02-05 09:00:00.000000', 'Earned extra money from side hustle this month', NULL),
(14, 2, NULL, 4800, '2023-02-10 12:30:00.000000', 'Received salary payment for February', 1),
(15, 2, 4, 2600, '2023-02-15 13:00:00.000000', 'Fitness-related income for this month', NULL),
(16, 2, NULL, 1100, '2023-02-06 14:00:00.000000', 'Spent on entertainment activities during February', 2),
(17, 2, NULL, 380, '2023-02-10 10:30:00.000000', 'Grocery and dining expenses for the month of February', 3),
(18, 2, 5, 1300, '2023-02-15 12:00:00.000000', 'Vacation spending in February for upcoming trip', NULL),
(19, 2, NULL, 450, '2023-03-05 10:00:00.000000', 'March savings towards my tuition fee for next semester', 5),
(20, 2, NULL, 500, '2023-03-12 11:00:00.000000', 'Setting aside money for books and supplies this March', 5),
(21, 2, NULL, 600, '2023-03-20 14:00:00.000000', 'Depositing funds into my education account for this month', 5),
(22, 2, 3, 3700, '2023-03-07 09:30:00.000000', 'Side hustle income from freelance work in March', NULL),
(23, 2, NULL, 4900, '2023-03-12 13:00:00.000000', 'Salary payment received for March', 1),
(24, 2, 4, 2700, '2023-03-18 10:00:00.000000', 'Generated income through fitness-related services this March', NULL),
(25, 2, NULL, 1200, '2023-03-08 15:30:00.000000', 'Entertainment and social expenses for March', 2),
(26, 2, NULL, 400, '2023-03-12 12:00:00.000000', 'Spending on groceries and dining out in March', 3),
(27, 2, 5, 1400, '2023-03-17 13:30:00.000000', 'Vacation planning costs for March trip', NULL),
(28, 2, NULL, 470, '2023-04-05 14:00:00.000000', 'April savings for my education fund', 5),
(29, 2, NULL, 520, '2023-04-10 12:00:00.000000', 'Depositing funds for upcoming educational costs this April', 5),
(30, 2, NULL, 580, '2023-04-15 10:30:00.000000', 'Saving for next semester’s tuition fees in April', 5),
(31, 2, 3, 3800, '2023-04-03 09:00:00.000000', 'Earned through side hustle in April', NULL),
(32, 2, NULL, 5000, '2023-04-08 10:00:00.000000', 'Salary payment for April received', 1),
(33, 2, 4, 2800, '2023-04-14 13:00:00.000000', 'Income from fitness-related services in April', NULL),
(34, 2, NULL, 1300, '2023-04-06 16:00:00.000000', 'Entertainment expenses for the month of April', 2),
(35, 2, NULL, 420, '2023-04-11 14:30:00.000000', 'Food expenses for April including groceries and dining', 3),
(36, 2, 5, 1500, '2023-04-18 15:30:00.000000', 'Vacation trip-related expenses in April', NULL),
(37, 2, NULL, 500, '2023-05-05 10:30:00.000000', 'Saving for my education tuition fees this month of May', 5),
(38, 2, NULL, 550, '2023-05-12 14:00:00.000000', 'Contributing more to my education savings in May', 5),
(39, 2, NULL, 600, '2023-05-19 16:00:00.000000', 'Adding to my savings for future educational expenses this May', 5),
(40, 2, 3, 3900, '2023-05-04 08:30:00.000000', 'Side hustle earnings for May', NULL),
(41, 2, NULL, 5100, '2023-05-09 10:30:00.000000', 'Received my May salary payment', 1),
(42, 2, 4, 2900, '2023-05-16 11:00:00.000000', 'Generated income through fitness sessions in May', NULL),
(43, 2, NULL, 1400, '2023-05-07 13:30:00.000000', 'Entertainment and social activities expenses for May', 2),
(44, 2, NULL, 440, '2023-05-11 12:30:00.000000', 'Food and grocery expenses for May', 3),
(45, 2, 5, 1600, '2023-05-18 14:00:00.000000', 'Traveling expenses for vacation trip planned in May', NULL),
(46, 2, NULL, 530, '2023-06-05 10:00:00.000000', 'Monthly savings for my tuition fees and educational purposes', 5),
(47, 2, NULL, 580, '2023-06-12 13:00:00.000000', 'Depositing more into my education savings this June', 5),
(48, 2, NULL, 620, '2023-06-19 15:00:00.000000', 'Added funds to my education savings account in June', 5),
(49, 2, 3, 4000, '2023-06-03 08:00:00.000000', 'Income from side hustle for June', NULL),
(50, 2, NULL, 5200, '2023-06-09 10:30:00.000000', 'Salary for June received', 1),
(51, 2, 4, 3000, '2023-06-14 11:30:00.000000', 'Earnings from fitness activities in June', NULL),
(52, 2, NULL, 1500, '2023-06-07 12:00:00.000000', 'Expenses for entertainment and movies in June', 2),
(53, 2, NULL, 460, '2023-06-12 14:00:00.000000', 'Grocery and dining out expenses for June', 3),
(54, 2, 5, 1700, '2023-06-19 15:30:00.000000', 'Vacation and trip-related expenses in June', NULL),
(55, 2, NULL, 550, '2023-07-05 13:00:00.000000', 'Depositing into my education savings account for July', 5),
(56, 2, NULL, 600, '2023-07-12 10:00:00.000000', 'Saving for educational expenses for the new semester', 5),
(57, 2, NULL, 650, '2023-07-19 14:30:00.000000', 'Contributing to my education savings for the next term', 5),
(58, 2, 3, 4100, '2023-07-04 09:00:00.000000', 'Income generated from side hustle in July', NULL),
(59, 2, NULL, 5300, '2023-07-09 11:00:00.000000', 'Salary payment received for July', 1),
(60, 2, 4, 3100, '2023-07-15 13:00:00.000000', 'Earned from fitness-related activities in July', NULL),
(61, 2, NULL, 1600, '2023-07-08 12:30:00.000000', 'Expenses for entertainment and social activities this July', 2),
(62, 2, NULL, 480, '2023-07-11 14:30:00.000000', 'Grocery and food expenses for July', 3),
(63, 2, 5, 1800, '2023-07-20 15:00:00.000000', 'Expenses for my July vacation trip', NULL),
(64, 2, NULL, 580, '2023-08-05 12:00:00.000000', 'Saving for my education in August', 5),
(65, 2, NULL, 630, '2023-08-12 14:00:00.000000', 'Contributing to my education savings this August', 5),
(66, 2, NULL, 670, '2023-08-19 13:30:00.000000', 'August contribution to my education fund', 5),
(67, 2, 3, 4200, '2023-08-02 09:30:00.000000', 'Income from side hustle in August', NULL),
(68, 2, NULL, 5400, '2023-08-10 10:00:00.000000', 'August salary payment received', 1),
(69, 2, 4, 3200, '2023-08-16 12:30:00.000000', 'Income from fitness sessions in August', NULL),
(70, 2, NULL, 1700, '2023-08-08 13:00:00.000000', 'Entertainment expenses in August', 2),
(71, 2, NULL, 500, '2023-08-14 14:00:00.000000', 'Food and dining expenses for August', 3),
(72, 2, 5, 1900, '2023-08-18 15:00:00.000000', 'Expenses for vacation during August', NULL),
(73, 2, NULL, 600, '2023-09-05 13:00:00.000000', 'Savings for tuition fees this September', 5),
(74, 2, NULL, 650, '2023-09-12 10:30:00.000000', 'Adding more funds to my education savings this September', 5),
(75, 2, NULL, 700, '2023-09-18 11:00:00.000000', 'Saving for education-related costs this September', 5),
(76, 2, 3, 4300, '2023-09-02 10:00:00.000000', 'Side hustle income in September', NULL),
(77, 2, NULL, 5500, '2023-09-08 11:30:00.000000', 'Salary for September received', 1),
(78, 2, 4, 3300, '2023-09-14 12:00:00.000000', 'Earnings from fitness activities in September', NULL),
(79, 2, NULL, 1800, '2023-09-06 12:30:00.000000', 'Entertainment and movie expenses for September', 2),
(80, 2, NULL, 520, '2023-09-11 13:30:00.000000', 'Food and dining out expenses for September', 3),
(81, 2, 5, 2000, '2023-09-20 14:00:00.000000', 'Trip expenses for my September vacation', NULL),
(82, 2, NULL, 620, '2023-10-05 10:00:00.000000', 'Adding funds to my education savings account in October', 5),
(83, 2, NULL, 670, '2023-10-12 12:00:00.000000', 'Contributing more to my education savings in October', 5),
(84, 2, NULL, 710, '2023-10-19 11:30:00.000000', 'Contributing towards my educational expenses in October', 5),
(85, 2, 3, 4400, '2023-10-04 09:00:00.000000', 'Side hustle earnings in October', NULL),
(86, 2, NULL, 5600, '2023-10-10 10:30:00.000000', 'Salary received for October', 1),
(87, 2, 4, 3400, '2023-10-14 12:00:00.000000', 'Fitness income earned in October', NULL),
(88, 2, NULL, 1900, '2023-10-06 11:00:00.000000', 'Entertainment expenses in October', 2),
(89, 2, NULL, 540, '2023-10-11 13:00:00.000000', 'Food and grocery expenses for October', 3),
(90, 2, 5, 2100, '2023-10-18 14:00:00.000000', 'Vacation expenses during October', NULL),
(91, 2, NULL, 640, '2023-11-05 11:00:00.000000', 'Saving for my education expenses this November', 5),
(92, 2, NULL, 690, '2023-11-12 12:30:00.000000', 'Depositing funds into my education savings account this November', 5),
(93, 2, NULL, 730, '2023-11-19 10:30:00.000000', 'Adding more to my education savings this November', 5),
(94, 2, 3, 4500, '2023-11-02 10:00:00.000000', 'Side hustle income for November', NULL),
(95, 2, NULL, 5700, '2023-11-10 09:30:00.000000', 'Salary received in November', 1),
(96, 2, 4, 3500, '2023-11-14 12:00:00.000000', 'Income from fitness services in November', NULL),
(97, 2, NULL, 2000, '2023-11-06 11:00:00.000000', 'Entertainment-related expenses in November', 2),
(98, 2, NULL, 560, '2023-11-12 14:00:00.000000', 'Food expenses for November', 3),
(99, 2, 5, 2200, '2023-11-18 12:30:00.000000', 'Expenses for vacation in November', NULL),
(100, 2, NULL, 650, '2023-12-05 09:30:00.000000', 'December contribution to education savings', 5),
(101, 2, NULL, 700, '2023-12-12 10:00:00.000000', 'Saving funds for tuition fees in December', 5),
(102, 2, NULL, 750, '2023-12-18 11:30:00.000000', 'Adding funds to education savings this December', 5),
(103, 2, 3, 4600, '2023-12-02 10:00:00.000000', 'Side hustle income for December', NULL),
(104, 2, NULL, 5800, '2023-12-10 09:30:00.000000', 'Salary payment for December', 1),
(105, 2, 4, 3600, '2023-12-14 12:00:00.000000', 'Fitness income earned in December', NULL),
(106, 2, NULL, 2100, '2023-12-06 12:00:00.000000', 'Entertainment expenses for December', 2),
(107, 2, NULL, 580, '2023-12-11 13:00:00.000000', 'Food and groceries expenses for December', 3),
(108, 2, 5, 2300, '2023-12-17 14:00:00.000000', 'Expenses for December vacation trip', NULL),
(109, 3, 6, 1200, '2024-01-05 10:00:00.000000', 'Vacation expenses for January', NULL),
(110, 3, NULL, 800, '2024-01-10 14:00:00.000000', 'Entertainment expenses for January', 2),
(111, 3, NULL, 500, '2024-01-15 12:00:00.000000', 'Food expenses for January', 3),
(112, 3, 7, 2000, '2024-01-06 09:30:00.000000', 'Freelance work income for January', NULL),
(113, 3, NULL, 4000, '2024-01-10 09:30:00.000000', 'Salary payment for January', 1),
(114, 3, 7, 1800, '2024-01-20 11:00:00.000000', 'Freelance work income for January', NULL),
(115, 3, 8, 1500, '2024-01-12 09:00:00.000000', 'Investment savings for January', NULL),
(116, 3, NULL, 800, '2024-01-18 11:30:00.000000', 'Education savings for January', 5),
(117, 3, 8, 1200, '2024-01-25 13:00:00.000000', 'Investment savings for January', NULL),
(118, 3, 6, 1300, '2024-02-05 10:00:00.000000', 'Vacation expenses for February', NULL),
(119, 3, NULL, 900, '2024-02-10 14:00:00.000000', 'Entertainment expenses for February', 2),
(120, 3, NULL, 600, '2024-02-15 12:00:00.000000', 'Food expenses for February', 3),
(121, 3, 7, 2200, '2024-02-06 09:30:00.000000', 'Freelance work income for February', NULL),
(122, 3, NULL, 4200, '2024-02-10 09:30:00.000000', 'Salary payment for February', 1),
(123, 3, 7, 1900, '2024-02-20 11:00:00.000000', 'Freelance work income for February', NULL),
(124, 3, 8, 1600, '2024-02-12 09:00:00.000000', 'Investment savings for February', NULL),
(125, 3, NULL, 850, '2024-02-18 11:30:00.000000', 'Education savings for February', 5),
(126, 3, 8, 1300, '2024-02-25 13:00:00.000000', 'Investment savings for February', NULL),
(127, 3, 6, 1400, '2024-03-05 10:00:00.000000', 'Vacation expenses for March', NULL),
(128, 3, NULL, 1000, '2024-03-10 14:00:00.000000', 'Entertainment expenses for March', 2),
(129, 3, NULL, 700, '2024-03-15 12:00:00.000000', 'Food expenses for March', 3),
(130, 3, 7, 2400, '2024-03-06 09:30:00.000000', 'Freelance work income for March', NULL),
(131, 3, NULL, 4400, '2024-03-10 09:30:00.000000', 'Salary payment for March', 1),
(132, 3, 7, 2000, '2024-03-20 11:00:00.000000', 'Freelance work income for March', NULL),
(133, 3, 8, 1700, '2024-03-12 09:00:00.000000', 'Investment savings for March', NULL),
(134, 3, NULL, 900, '2024-03-18 11:30:00.000000', 'Education savings for March', 5),
(135, 3, 8, 1400, '2024-03-25 13:00:00.000000', 'Investment savings for March', NULL),
(136, 3, 6, 1500, '2024-04-05 10:00:00.000000', 'Vacation expenses for April', NULL),
(137, 3, NULL, 1100, '2024-04-10 14:00:00.000000', 'Entertainment expenses for April', 2),
(138, 3, NULL, 750, '2024-04-15 12:00:00.000000', 'Food expenses for April', 3),
(139, 3, 7, 2500, '2024-04-06 09:30:00.000000', 'Freelance work income for April', NULL),
(140, 3, NULL, 4600, '2024-04-10 09:30:00.000000', 'Salary payment for April', 1),
(141, 3, 7, 2100, '2024-04-20 11:00:00.000000', 'Freelance work income for April', NULL),
(142, 3, 8, 1800, '2024-04-12 09:00:00.000000', 'Investment savings for April', NULL),
(143, 3, NULL, 950, '2024-04-18 11:30:00.000000', 'Education savings for April', 5),
(144, 3, 8, 1500, '2024-04-25 13:00:00.000000', 'Investment savings for April', NULL),
(145, 3, 6, 1600, '2024-05-05 10:00:00.000000', 'Vacation expenses for May', NULL),
(146, 3, NULL, 1200, '2024-05-10 14:00:00.000000', 'Entertainment expenses for May', 2),
(147, 3, NULL, 800, '2024-05-15 12:00:00.000000', 'Food expenses for May', 3),
(148, 3, 7, 2600, '2024-05-06 09:30:00.000000', 'Freelance work income for May', NULL),
(149, 3, NULL, 4800, '2024-05-10 09:30:00.000000', 'Salary payment for May', 1),
(150, 3, 7, 2200, '2024-05-20 11:00:00.000000', 'Freelance work income for May', NULL),
(151, 3, 8, 1900, '2024-05-12 09:00:00.000000', 'Investment savings for May', NULL),
(152, 3, NULL, 1000, '2024-05-18 11:30:00.000000', 'Education savings for May', 5),
(153, 3, 8, 1600, '2024-05-25 13:00:00.000000', 'Investment savings for May', NULL),
(154, 3, 6, 1700, '2024-06-05 10:00:00.000000', 'Vacation expenses for June', NULL),
(155, 3, NULL, 1250, '2024-06-10 14:00:00.000000', 'Entertainment expenses for June', 2),
(156, 3, NULL, 850, '2024-06-15 12:00:00.000000', 'Food expenses for June', 3),
(157, 3, 7, 2700, '2024-06-06 09:30:00.000000', 'Freelance work income for June', NULL),
(158, 3, NULL, 5000, '2024-06-10 09:30:00.000000', 'Salary payment for June', 1),
(159, 3, 7, 2300, '2024-06-20 11:00:00.000000', 'Freelance work income for June', NULL),
(160, 3, 8, 2000, '2024-06-12 09:00:00.000000', 'Investment savings for June', NULL),
(161, 3, NULL, 1050, '2024-06-18 11:30:00.000000', 'Education savings for June', 5),
(162, 3, 8, 1700, '2024-06-25 13:00:00.000000', 'Investment savings for June', NULL),
(163, 3, NULL, 1900, '2024-07-05 11:00:00.000000', 'Entertainment expense for July', 2),
(164, 3, NULL, 1200, '2024-07-12 13:30:00.000000', 'Food expenses in July', 3),
(165, 3, 6, 3000, '2024-07-20 10:00:00.000000', 'Vacation expenses this July', NULL),
(166, 3, NULL, 800, '2024-07-07 09:00:00.000000', 'Savings for education in July', 5),
(167, 3, 8, 2000, '2024-07-14 12:00:00.000000', 'Investment savings for July', NULL),
(168, 3, NULL, 1300, '2024-07-28 16:00:00.000000', 'General savings for healthcare in July', 4),
(169, 3, 7, 4200, '2024-07-03 10:30:00.000000', 'Freelance income in July', NULL),
(170, 3, NULL, 5500, '2024-07-15 09:00:00.000000', 'Salary received for July', 1),
(171, 3, 8, 1800, '2024-07-21 14:00:00.000000', 'Investment income for July', NULL),
(172, 3, NULL, 2000, '2024-08-04 10:00:00.000000', 'Entertainment expenses for August', 2),
(173, 3, NULL, 1100, '2024-08-11 12:30:00.000000', 'Food expenses for August', 3),
(174, 3, 6, 2900, '2024-08-25 11:00:00.000000', 'Vacation expenses for August', NULL),
(175, 3, NULL, 900, '2024-08-02 10:30:00.000000', 'Education savings for August', 5),
(176, 3, 8, 2500, '2024-08-15 14:00:00.000000', 'Investment savings for August', NULL),
(177, 3, NULL, 1400, '2024-08-28 09:00:00.000000', 'Savings for healthcare in August', 4),
(178, 3, 7, 4400, '2024-08-06 11:30:00.000000', 'Freelance income in August', NULL),
(179, 3, NULL, 5600, '2024-08-14 09:30:00.000000', 'Salary received in August', 1),
(180, 3, 8, 2000, '2024-08-22 13:00:00.000000', 'Investment income for August', NULL),
(181, 3, NULL, 1800, '2024-09-03 10:00:00.000000', 'Entertainment-related expense for September', 2),
(182, 3, NULL, 1150, '2024-09-12 13:00:00.000000', 'Food-related expense in September', 3),
(183, 3, 6, 3100, '2024-09-21 12:30:00.000000', 'Vacation expenses in September', NULL),
(184, 3, NULL, 850, '2024-09-08 09:30:00.000000', 'Education savings for September', 5),
(185, 3, 8, 2200, '2024-09-16 14:00:00.000000', 'Investment savings for September', NULL),
(186, 3, NULL, 1500, '2024-09-27 10:30:00.000000', 'Savings for healthcare in September', 4),
(187, 3, 7, 4300, '2024-09-05 11:00:00.000000', 'Freelance income for September', NULL),
(188, 3, NULL, 5700, '2024-09-13 10:00:00.000000', 'Salary payment for September', 1),
(189, 3, 8, 2100, '2024-09-23 13:00:00.000000', 'Investment income for September', NULL),
(190, 3, NULL, 2100, '2024-10-07 12:00:00.000000', 'Entertainment expenses for October', 2),
(191, 3, NULL, 1250, '2024-10-15 14:30:00.000000', 'Food expenses for October', 3),
(192, 3, 6, 3200, '2024-10-22 13:00:00.000000', 'Vacation expenses for October', NULL),
(193, 3, NULL, 950, '2024-10-05 09:30:00.000000', 'Savings for education in October', 5),
(194, 3, 8, 2600, '2024-10-18 11:00:00.000000', 'Investment savings for October', NULL),
(195, 3, NULL, 1600, '2024-10-28 15:00:00.000000', 'Savings for healthcare in October', 4),
(196, 3, 7, 4500, '2024-10-04 10:30:00.000000', 'Freelance income for October', NULL),
(197, 3, NULL, 5800, '2024-10-16 09:30:00.000000', 'Salary received for October', 1),
(198, 3, 8, 2200, '2024-10-23 13:30:00.000000', 'Investment income for October', NULL),
(199, 3, NULL, 1900, '2024-11-03 11:00:00.000000', 'Entertainment expenses for November', 2),
(200, 3, NULL, 1180, '2024-11-12 14:00:00.000000', 'Food expenses for November', 3),
(201, 3, 6, 3300, '2024-11-20 12:30:00.000000', 'Vacation expenses for November', NULL),
(202, 3, NULL, 980, '2024-11-07 10:30:00.000000', 'Education savings for November', 5),
(203, 3, 8, 2700, '2024-11-16 13:00:00.000000', 'Investment savings for November', NULL),
(204, 3, NULL, 1500, '2024-11-25 16:00:00.000000', 'Savings for healthcare in November', 4),
(205, 3, 7, 4600, '2024-11-05 11:30:00.000000', 'Freelance income for November', NULL),
(206, 3, NULL, 5900, '2024-11-15 09:30:00.000000', 'Salary payment for November', 1),
(207, 3, 8, 2300, '2024-11-22 12:00:00.000000', 'Investment income for November', NULL),
(208, 3, NULL, 2000, '2024-12-04 10:00:00.000000', 'Entertainment expenses for December', 2),
(209, 3, NULL, 1300, '2024-12-14 13:30:00.000000', 'Food expenses for December', 3),
(210, 3, 6, 3500, '2024-12-23 11:00:00.000000', 'Vacation expenses for December', NULL),
(211, 3, NULL, 1000, '2024-12-05 09:00:00.000000', 'Education savings for December', 5),
(212, 3, 8, 2800, '2024-12-17 12:30:00.000000', 'Investment savings for December', NULL),
(213, 3, NULL, 1700, '2024-12-28 15:00:00.000000', 'Savings for healthcare in December', 4),
(214, 3, 7, 4700, '2024-12-06 10:30:00.000000', 'Freelance income for December', NULL),
(215, 3, NULL, 6000, '2024-12-16 09:30:00.000000', 'Salary payment for December', 1),
(216, 3, 8, 2400, '2024-12-22 13:00:00.000000', 'Investment income for December', NULL),
(217, 4, 9, 1200, '2025-01-05 09:00:00.000000', 'Rent payment for January', NULL),
(218, 4, 10, 150, '2025-01-10 10:01:00.000000', 'Transportation expenses for January', NULL),
(219, 4, 11, 200, '2025-01-15 11:02:00.000000', 'Dining out with friends', NULL),
(220, 4, 9, 1000, '2025-01-20 12:03:00.000000', 'Rent payment for February', NULL),
(221, 4, 10, 100, '2025-01-25 13:04:00.000000', 'Public transport expenses', NULL),
(222, 4, NULL, 2000, '2025-01-05 09:01:00.000000', 'Freelance project payment', 1),
(223, 4, NULL, 500, '2025-01-10 10:02:00.000000', 'Investment income for January', 1),
(224, 4, NULL, 3000, '2025-01-15 11:03:00.000000', 'Bonus received for January', 1),
(225, 4, 12, 1500, '2025-01-20 12:04:00.000000', 'Freelance income for the month', NULL),
(226, 4, 13, 1000, '2025-01-25 13:05:00.000000', 'Investment returns from stocks', NULL),
(227, 4, NULL, 1000, '2025-01-05 09:02:00.000000', 'Education savings', 5),
(228, 4, NULL, 1500, '2025-01-10 10:03:00.000000', 'Tuition Fee Savings', 5),
(229, 4, 13, 500, '2025-01-15 11:04:00.000000', 'Savings for home purchase', NULL),
(230, 4, 12, 700, '2025-01-20 12:05:00.000000', 'Freelance savings deposit', NULL),
(231, 4, 13, 1000, '2025-01-25 13:06:00.000000', 'Emergency fund deposit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `dateCreated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `profilePicture` varchar(25) DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `firstName`, `lastName`, `birthday`, `dateCreated`, `profilePicture`, `role`) VALUES
(1, 'admin1', 'admin1@example.com', 'admin123', 'Chris', 'Evans', '1980-01-01', '2025-01-23 10:27:00.000000', NULL, 'admin'),
(2, 'john1', 'john1@example.com', 'password1', 'John', 'Doe', '1990-01-01', '2025-01-23 13:49:46.531655', NULL, 'user'),
(3, 'jane2', 'jane2@example.com', 'password2', 'Jane', 'Smith', '1991-02-02', '2025-01-23 10:27:00.000000', NULL, 'user'),
(4, 'mike3', 'mike3@example.com', 'password3', 'Mike', 'Brown', '1992-03-03', '2025-01-23 10:27:00.000000', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `fk_userID_categories` (`userID`);

--
-- Indexes for table `defaultcategories`
--
ALTER TABLE `defaultcategories`
  ADD PRIMARY KEY (`defaultCategoryID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`loginID`),
  ADD KEY `fk_userID_logins` (`userID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `fk_userID_transactions` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `defaultcategories`
--
ALTER TABLE `defaultcategories`
  MODIFY `defaultCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_userID_categories` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `fk_userID_logins` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_userID_transactions` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
