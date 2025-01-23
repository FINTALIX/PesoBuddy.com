-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 01:40 PM
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
-- Database: `pesobuddy (3)`
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
(5, 2, 'Birthday', 'Expense', 'no');

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
  `loginID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `loginDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`loginID`, `userID`, `loginDate`) VALUES
(1, 2, '2023-01-05 02:00:00.000000'),
(2, 2, '2023-01-07 04:00:00.000000'),
(3, 2, '2023-01-10 06:00:00.000000'),
(4, 2, '2023-01-12 08:00:00.000000'),
(5, 2, '2023-01-14 10:00:00.000000'),
(6, 2, '2023-01-03 02:00:00.000000'),
(7, 2, '2023-01-06 04:00:00.000000'),
(8, 2, '2023-01-09 06:00:00.000000'),
(9, 2, '2023-01-12 08:00:00.000000'),
(10, 2, '2023-01-15 10:00:00.000000'),
(11, 2, '2023-01-02 02:00:00.000000'),
(12, 2, '2023-01-06 04:00:00.000000'),
(13, 2, '2023-01-08 06:00:00.000000'),
(14, 2, '2023-01-10 08:00:00.000000'),
(15, 2, '2023-01-12 10:00:00.000000'),
(16, 2, '2023-02-03 02:00:00.000000'),
(17, 2, '2023-02-04 02:00:00.000000'),
(18, 2, '2023-02-06 04:00:00.000000'),
(19, 2, '2023-02-07 04:00:00.000000'),
(20, 2, '2023-02-09 06:00:00.000000'),
(21, 2, '2023-02-10 06:00:00.000000'),
(22, 2, '2023-02-12 08:00:00.000000'),
(23, 2, '2023-02-14 08:00:00.000000'),
(24, 2, '2023-02-16 02:00:00.000000'),
(25, 2, '2023-02-17 10:00:00.000000'),
(26, 2, '2023-02-18 04:00:00.000000'),
(27, 2, '2023-02-20 06:00:00.000000'),
(28, 2, '2023-02-22 08:00:00.000000'),
(29, 2, '2023-02-24 10:00:00.000000'),
(30, 2, '2023-03-02 02:00:00.000000'),
(31, 2, '2023-03-03 03:00:00.000000'),
(32, 2, '2023-03-04 07:00:00.000000'),
(33, 2, '2023-03-05 04:00:00.000000'),
(34, 2, '2023-03-06 06:00:00.000000'),
(35, 2, '2023-03-07 05:00:00.000000'),
(36, 2, '2023-03-09 09:00:00.000000'),
(37, 2, '2023-03-10 02:00:00.000000'),
(38, 2, '2023-03-11 11:00:00.000000'),
(39, 2, '2023-03-12 08:00:00.000000'),
(40, 2, '2023-03-14 05:00:00.000000'),
(41, 2, '2023-05-01 01:00:00.000000'),
(42, 2, '2023-05-02 02:00:00.000000'),
(43, 2, '2023-05-03 03:00:00.000000'),
(44, 2, '2023-05-04 04:00:00.000000'),
(45, 2, '2023-05-05 05:00:00.000000'),
(46, 2, '2023-05-06 06:00:00.000000'),
(47, 2, '2023-05-07 07:00:00.000000'),
(48, 2, '2023-05-08 08:00:00.000000'),
(49, 2, '2023-05-09 09:00:00.000000'),
(50, 2, '2023-05-10 10:00:00.000000'),
(51, 2, '2023-05-11 11:00:00.000000'),
(52, 2, '2023-05-12 12:00:00.000000'),
(53, 2, '2023-05-13 13:00:00.000000'),
(54, 2, '2023-05-14 14:00:00.000000'),
(55, 2, '2023-05-01 02:00:00.000000'),
(56, 2, '2023-05-03 02:00:00.000000'),
(57, 2, '2023-05-04 04:00:00.000000'),
(58, 2, '2023-05-07 04:00:00.000000'),
(59, 2, '2023-05-09 06:00:00.000000'),
(60, 2, '2023-05-10 06:00:00.000000'),
(61, 2, '2023-05-11 06:00:00.000000'),
(62, 2, '2023-05-12 08:00:00.000000'),
(63, 2, '2023-05-14 08:00:00.000000'),
(64, 2, '2023-05-15 08:00:00.000000'),
(65, 2, '2023-05-17 10:00:00.000000'),
(66, 2, '2023-05-18 10:00:00.000000'),
(67, 2, '2023-06-02 01:00:00.000000'),
(68, 2, '2023-06-03 02:00:00.000000'),
(69, 2, '2023-06-04 01:00:00.000000'),
(70, 2, '2023-06-04 03:00:00.000000'),
(71, 2, '2023-06-05 04:00:00.000000'),
(72, 2, '2023-06-06 03:00:00.000000'),
(73, 2, '2023-06-07 05:00:00.000000'),
(74, 2, '2023-06-08 06:00:00.000000'),
(75, 2, '2023-06-09 05:00:00.000000'),
(76, 2, '2023-06-10 07:00:00.000000'),
(77, 2, '2023-06-11 08:00:00.000000'),
(78, 2, '2023-06-12 07:00:00.000000'),
(79, 2, '2023-06-13 09:00:00.000000'),
(80, 2, '2023-06-14 10:00:00.000000'),
(81, 2, '2023-06-15 09:00:00.000000'),
(82, 2, '2023-07-01 02:00:00.000000'),
(83, 2, '2023-07-02 01:00:00.000000'),
(84, 2, '2023-07-03 04:00:00.000000'),
(85, 2, '2023-07-03 04:00:00.000000'),
(86, 2, '2023-07-04 03:00:00.000000'),
(87, 2, '2023-07-05 06:00:00.000000'),
(88, 2, '2023-07-05 06:00:00.000000'),
(89, 2, '2023-07-06 05:00:00.000000'),
(90, 2, '2023-07-08 08:00:00.000000'),
(91, 2, '2023-07-08 08:00:00.000000'),
(92, 2, '2023-07-09 07:00:00.000000'),
(93, 2, '2023-07-10 10:00:00.000000'),
(94, 2, '2023-07-10 10:00:00.000000'),
(95, 2, '2023-07-11 09:00:00.000000'),
(96, 2, '2023-08-01 01:00:00.000000'),
(97, 2, '2023-08-01 01:00:00.000000'),
(98, 2, '2023-08-02 02:00:00.000000'),
(99, 2, '2023-08-03 03:00:00.000000'),
(100, 2, '2023-08-03 03:00:00.000000'),
(101, 2, '2023-08-04 04:00:00.000000'),
(102, 2, '2023-08-05 05:00:00.000000'),
(103, 2, '2023-08-05 05:00:00.000000'),
(104, 2, '2023-08-06 06:00:00.000000'),
(105, 2, '2023-08-08 07:00:00.000000'),
(106, 2, '2023-08-08 07:00:00.000000'),
(107, 2, '2023-08-09 08:00:00.000000'),
(108, 2, '2023-08-10 09:00:00.000000'),
(109, 2, '2023-08-10 09:00:00.000000'),
(110, 2, '2023-08-11 10:00:00.000000'),
(111, 2, '2023-09-01 01:00:00.000000'),
(112, 2, '2023-09-02 02:00:00.000000'),
(113, 2, '2023-09-03 02:00:00.000000'),
(114, 2, '2023-09-04 03:00:00.000000'),
(115, 2, '2023-09-04 04:00:00.000000'),
(116, 2, '2023-09-05 04:00:00.000000'),
(117, 2, '2023-09-06 05:00:00.000000'),
(118, 2, '2023-09-06 06:00:00.000000'),
(119, 2, '2023-09-07 06:00:00.000000'),
(120, 2, '2023-09-09 07:00:00.000000'),
(121, 2, '2023-09-09 08:00:00.000000'),
(122, 2, '2023-09-10 08:00:00.000000'),
(123, 2, '2023-09-11 10:00:00.000000'),
(124, 2, '2023-09-11 10:00:00.000000'),
(125, 2, '2023-09-12 09:00:00.000000'),
(126, 2, '2023-10-01 01:00:00.000000'),
(127, 2, '2023-10-02 02:00:00.000000'),
(128, 2, '2023-10-02 01:00:00.000000'),
(129, 2, '2023-10-04 03:00:00.000000'),
(130, 2, '2023-10-04 03:00:00.000000'),
(131, 2, '2023-10-04 04:00:00.000000'),
(132, 2, '2023-10-06 06:00:00.000000'),
(133, 2, '2023-10-06 05:00:00.000000'),
(134, 2, '2023-10-09 08:00:00.000000'),
(135, 2, '2023-10-09 07:00:00.000000'),
(136, 2, '2023-10-09 07:00:00.000000'),
(137, 2, '2023-10-11 10:00:00.000000'),
(138, 2, '2023-10-11 09:00:00.000000'),
(139, 2, '2023-11-01 01:00:00.000000'),
(140, 2, '2023-11-02 02:00:00.000000'),
(141, 2, '2023-11-02 01:00:00.000000'),
(142, 2, '2023-11-04 03:00:00.000000'),
(143, 2, '2023-11-05 04:00:00.000000'),
(144, 2, '2023-11-05 03:00:00.000000'),
(145, 2, '2023-11-07 05:00:00.000000'),
(146, 2, '2023-11-07 06:00:00.000000'),
(147, 2, '2023-11-07 05:00:00.000000'),
(148, 2, '2023-11-10 07:00:00.000000'),
(149, 2, '2023-11-10 08:00:00.000000'),
(150, 2, '2023-11-10 07:00:00.000000'),
(151, 2, '2023-11-12 09:00:00.000000'),
(152, 2, '2023-11-12 10:00:00.000000'),
(153, 2, '2023-11-12 09:00:00.000000'),
(154, 2, '2023-12-01 01:00:00.000000'),
(155, 2, '2023-12-02 02:00:00.000000'),
(156, 2, '2023-12-02 01:00:00.000000'),
(157, 2, '2023-12-04 03:00:00.000000'),
(158, 2, '2023-12-05 04:00:00.000000'),
(159, 2, '2023-12-05 03:00:00.000000'),
(160, 2, '2023-12-07 05:00:00.000000'),
(161, 2, '2023-12-07 06:00:00.000000'),
(162, 2, '2023-12-07 05:00:00.000000'),
(163, 2, '2023-12-10 07:00:00.000000'),
(164, 2, '2023-12-10 08:00:00.000000'),
(165, 2, '2023-12-10 07:00:00.000000'),
(166, 2, '2023-12-12 09:00:00.000000'),
(167, 2, '2023-12-12 10:00:00.000000'),
(168, 2, '2023-12-12 09:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settingsID` int(10) NOT NULL,
  `settingName` varchar(20) NOT NULL,
  `settingValue` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 2, NULL, 500, '2023-01-05 10:00:00.000000', 'Savings for vacation trip', 1),
(2, 2, 1, 300, '2023-01-07 12:00:00.000000', 'Investment savings', NULL),
(3, 2, NULL, 400, '2023-01-10 14:00:00.000000', 'Education savings', 5),
(4, 2, 2, 250, '2023-01-12 16:00:00.000000', 'Birthday savings', NULL),
(5, 2, NULL, 600, '2023-01-14 18:00:00.000000', 'Healthcare savings', 4),
(6, 2, NULL, 2000, '2023-01-03 10:00:00.000000', 'Salary from company', 1),
(7, 2, 3, 1500, '2023-01-06 12:00:00.000000', 'Side hustle income', NULL),
(8, 2, NULL, 1200, '2023-01-09 14:00:00.000000', 'Freelance work income', 1),
(9, 2, 4, 1000, '2023-01-12 16:00:00.000000', 'Fitness training revenue', NULL),
(10, 2, NULL, 2500, '2023-01-15 18:00:00.000000', 'Extra commission', 1),
(11, 2, NULL, 600, '2023-01-02 10:00:00.000000', 'Groceries and food', 3),
(12, 2, 1, 700, '2023-01-06 12:00:00.000000', 'Vacation trip expenses', NULL),
(13, 2, NULL, 500, '2023-01-08 14:00:00.000000', 'Dining out with friends', 2),
(14, 2, 5, 400, '2023-01-10 16:00:00.000000', 'Birthday party expenses', NULL),
(15, 2, NULL, 300, '2023-01-12 18:00:00.000000', 'Medical check-up expenses', 4),
(16, 2, NULL, 550, '2023-02-16 10:00:00.000000', 'Emergency fund savings', 5),
(17, 2, 1, 400, '2023-02-18 12:00:00.000000', 'Investment for future house', NULL),
(18, 2, NULL, 350, '2023-02-20 14:00:00.000000', 'Retirement fund savings', 5),
(19, 2, 2, 300, '2023-02-22 16:00:00.000000', 'Wedding savings', NULL),
(20, 2, NULL, 450, '2023-02-24 18:00:00.000000', 'Health insurance savings', 4),
(21, 2, NULL, 2200, '2023-02-04 10:00:00.000000', 'Project-based freelance income', 1),
(22, 2, 3, 1700, '2023-02-07 12:00:00.000000', 'Income from online course sales', NULL),
(23, 2, NULL, 1400, '2023-02-10 14:00:00.000000', 'Salary bonus', 1),
(24, 2, 4, 1200, '2023-02-14 16:00:00.000000', 'Fitness coaching revenue', NULL),
(25, 2, NULL, 2600, '2023-02-17 18:00:00.000000', 'Sales commission', 1),
(26, 2, NULL, 750, '2023-02-03 10:00:00.000000', 'Grocery shopping for the month', 3),
(27, 2, 1, 800, '2023-02-06 12:00:00.000000', 'Travel expenses for vacation', NULL),
(28, 2, NULL, 450, '2023-02-09 14:00:00.000000', 'Entertainment expenses for movies', 2),
(29, 2, 5, 600, '2023-02-12 16:00:00.000000', 'Celebration for birthday', NULL),
(30, 2, NULL, 350, '2023-02-14 18:00:00.000000', 'Doctor visit and checkup', 4),
(31, 2, NULL, 1000, '2023-03-02 10:00:00.000000', 'Emergency fund savings', 5),
(32, 2, 1, 500, '2023-03-05 12:00:00.000000', 'Savings for online courses', NULL),
(33, 2, NULL, 800, '2023-03-07 14:00:00.000000', 'Tax savings', 5),
(34, 2, 2, 400, '2023-03-10 16:00:00.000000', 'Savings for upcoming vacation', NULL),
(35, 2, NULL, 600, '2023-03-12 18:00:00.000000', 'Health savings for gym membership', 4),
(36, 2, NULL, 3500, '2023-03-03 11:00:00.000000', 'Payment for software development project', 1),
(37, 2, 3, 1800, '2023-03-06 14:00:00.000000', 'Payment from freelance writing project', NULL),
(38, 2, NULL, 2200, '2023-03-09 17:00:00.000000', 'Salary from marketing campaign', 1),
(39, 2, 4, 1500, '2023-03-11 19:00:00.000000', 'Income from online fitness classes', NULL),
(40, 2, NULL, 2500, '2023-03-14 13:00:00.000000', 'Commission from sales', 1),
(41, 2, NULL, 750, '2023-03-04 15:00:00.000000', 'Groceries and dining', 3),
(42, 2, 1, 950, '2023-03-07 13:00:00.000000', 'Entertainment: Movie night', NULL),
(43, 2, NULL, 400, '2023-03-10 10:00:00.000000', 'Dining out with colleagues', 2),
(44, 2, 5, 600, '2023-03-12 16:00:00.000000', 'Birthday dinner party expenses', NULL),
(45, 2, NULL, 500, '2023-03-14 18:00:00.000000', 'Healthcare check-up expenses', 4),
(46, 2, NULL, 400, '2023-04-01 09:00:00.000000', 'Emergency savings', 5),
(47, 2, 3, 700, '2023-04-04 10:00:00.000000', 'Retirement fund savings', NULL),
(48, 2, NULL, 500, '2023-04-07 12:00:00.000000', 'Holiday savings', 5),
(49, 2, NULL, 600, '2023-04-10 14:00:00.000000', 'Health savings', 4),
(50, 2, 1, 1000, '2023-04-13 16:00:00.000000', 'Investment savings', NULL),
(51, 2, NULL, 2500, '2023-04-03 10:00:00.000000', 'Salary from company', 1),
(52, 2, 2, 1200, '2023-04-06 12:00:00.000000', 'Freelance graphic design', NULL),
(53, 2, NULL, 3000, '2023-04-09 14:00:00.000000', 'Consulting income', 1),
(54, 2, NULL, 1500, '2023-04-11 16:00:00.000000', 'Extra commission payment', 1),
(55, 2, 4, 1000, '2023-04-14 18:00:00.000000', 'Business consultancy fee', NULL),
(56, 2, NULL, 700, '2023-04-02 10:00:00.000000', 'Groceries and food', 3),
(57, 2, 2, 600, '2023-04-05 12:00:00.000000', 'Entertainment for vacation', NULL),
(58, 2, NULL, 400, '2023-04-08 14:00:00.000000', 'Dining out with friends', 2),
(59, 2, 5, 500, '2023-04-10 16:00:00.000000', 'Shopping expenses', NULL),
(60, 2, NULL, 1000, '2023-04-12 18:00:00.000000', 'Healthcare and medical expenses', 4),
(61, 2, NULL, 1000, '2023-05-01 10:00:00.000000', 'Retirement savings', 5),
(62, 2, NULL, 500, '2023-05-04 12:00:00.000000', 'Investment savings', 5),
(63, 2, 1, 400, '2023-05-10 14:00:00.000000', 'Emergency fund savings', NULL),
(64, 2, NULL, 700, '2023-05-14 16:00:00.000000', 'Health insurance savings', 5),
(65, 2, NULL, 1000, '2023-05-20 18:00:00.000000', 'College fund savings', 5),
(66, 2, NULL, 3000, '2023-05-03 10:00:00.000000', 'Salary from company', 1),
(67, 2, NULL, 2000, '2023-05-07 12:00:00.000000', 'Freelance work income', 1),
(68, 2, NULL, 1500, '2023-05-11 14:00:00.000000', 'Side project income', 1),
(69, 2, 3, 1000, '2023-05-15 16:00:00.000000', 'Web development project income', NULL),
(70, 2, NULL, 1200, '2023-05-18 18:00:00.000000', 'Consulting services income', 1),
(71, 2, NULL, 700, '2023-05-02 10:00:00.000000', 'Groceries and food expenses', 3),
(72, 2, NULL, 400, '2023-05-06 12:00:00.000000', 'Entertainment expenses', 2),
(73, 2, 4, 800, '2023-05-09 14:00:00.000000', 'Gym and fitness subscription', NULL),
(74, 2, NULL, 600, '2023-05-12 16:00:00.000000', 'Healthcare check-up expenses', 4),
(75, 2, NULL, 1000, '2023-05-17 18:00:00.000000', 'Shopping for clothing', 2),
(76, 2, NULL, 700, '2023-06-02 09:00:00.000000', 'Long-term savings plan', 1),
(77, 2, 3, 550, '2023-06-04 11:00:00.000000', 'Saving for rainy day', NULL),
(78, 2, NULL, 800, '2023-06-07 13:00:00.000000', 'Education fund savings', 5),
(79, 2, 2, 450, '2023-06-10 15:00:00.000000', 'House deposit savings', NULL),
(80, 2, NULL, 900, '2023-06-13 17:00:00.000000', 'Health insurance savings', 4),
(81, 2, NULL, 3000, '2023-06-03 10:00:00.000000', 'Salary payment for June', 1),
(82, 2, 1, 1800, '2023-06-05 12:00:00.000000', 'Payment for freelance project', NULL),
(83, 2, NULL, 1300, '2023-06-08 14:00:00.000000', 'Affiliate marketing earnings', 1),
(84, 2, 4, 1100, '2023-06-11 16:00:00.000000', 'Consulting work payment', NULL),
(85, 2, NULL, 2500, '2023-06-14 18:00:00.000000', 'Bonus for good performance', 1),
(86, 2, NULL, 950, '2023-06-04 09:00:00.000000', 'New wardrobe for summer', 3),
(87, 2, 2, 650, '2023-06-06 11:00:00.000000', 'Concert tickets and entertainment', NULL),
(88, 2, NULL, 750, '2023-06-09 13:00:00.000000', 'Weekend getaway trip', 4),
(89, 2, 5, 400, '2023-06-12 15:00:00.000000', 'Dental check-up and treatment', NULL),
(90, 2, NULL, 350, '2023-06-15 17:00:00.000000', 'Weekend dining and outings', 2),
(91, 2, NULL, 600, '2023-07-01 10:00:00.000000', 'Retirement savings contribution', 1),
(92, 2, 3, 450, '2023-07-03 12:00:00.000000', 'Travel fund savings', NULL),
(93, 2, NULL, 750, '2023-07-05 14:00:00.000000', 'Kids education savings', 5),
(94, 2, 2, 500, '2023-07-08 16:00:00.000000', 'Home improvement savings', NULL),
(95, 2, NULL, 850, '2023-07-10 18:00:00.000000', 'Emergency savings fund', 4),
(96, 2, NULL, 3200, '2023-07-02 09:00:00.000000', 'Salary payment for July', 1),
(97, 2, 1, 2100, '2023-07-04 11:00:00.000000', 'Freelance design project payment', NULL),
(98, 2, NULL, 1600, '2023-07-06 13:00:00.000000', 'Commission from sales', 1),
(99, 2, 4, 1300, '2023-07-09 15:00:00.000000', 'Consulting job payment', NULL),
(100, 2, NULL, 2800, '2023-07-11 17:00:00.000000', 'Yearly bonus from company', 1),
(101, 2, NULL, 800, '2023-07-01 10:00:00.000000', 'Grocery shopping for the month', 3),
(102, 2, 2, 600, '2023-07-03 12:00:00.000000', 'Vacation expenses in Hawaii', NULL),
(103, 2, NULL, 700, '2023-07-05 14:00:00.000000', 'Car maintenance and repair', 4),
(104, 2, 5, 450, '2023-07-08 16:00:00.000000', 'Doctor visit and medical expenses', NULL),
(105, 2, NULL, 350, '2023-07-10 18:00:00.000000', 'Night out for dinner and entertainment', 2),
(106, 2, NULL, 700, '2023-08-01 09:00:00.000000', 'College fund savings', 5),
(107, 2, 3, 600, '2023-08-03 11:00:00.000000', 'Vacation savings for Europe trip', NULL),
(108, 2, NULL, 900, '2023-08-05 13:00:00.000000', 'Investment portfolio savings', 1),
(109, 2, 2, 550, '2023-08-08 15:00:00.000000', 'Home renovation savings', NULL),
(110, 2, NULL, 950, '2023-08-10 17:00:00.000000', 'Emergency fund contribution', 4),
(111, 2, NULL, 3400, '2023-08-02 10:00:00.000000', 'Salary payment for August', 1),
(112, 2, 1, 2200, '2023-08-04 12:00:00.000000', 'Freelance photography work', NULL),
(113, 2, NULL, 1800, '2023-08-06 14:00:00.000000', 'Consulting income from client project', 1),
(114, 2, 4, 1400, '2023-08-09 16:00:00.000000', 'Online course teaching payment', NULL),
(115, 2, NULL, 3000, '2023-08-11 18:00:00.000000', 'Extra commission earned', 1),
(116, 2, NULL, 900, '2023-08-01 09:00:00.000000', 'Back-to-school shopping', 3),
(117, 2, 2, 500, '2023-08-03 11:00:00.000000', 'Vacation trip to Spain', NULL),
(118, 2, NULL, 750, '2023-08-05 13:00:00.000000', 'Home appliances purchase', 4),
(119, 2, 5, 600, '2023-08-08 15:00:00.000000', 'Doctor and dental expenses', NULL),
(120, 2, NULL, 350, '2023-08-10 17:00:00.000000', 'Dining out with family', 2),
(121, 2, NULL, 800, '2023-09-01 09:00:00.000000', 'Retirement savings contribution', 1),
(122, 2, 3, 500, '2023-09-04 11:00:00.000000', 'Savings for car purchase', NULL),
(123, 2, NULL, 700, '2023-09-06 13:00:00.000000', 'Health savings for emergencies', 4),
(124, 2, 2, 600, '2023-09-09 15:00:00.000000', 'Renovation project savings', NULL),
(125, 2, NULL, 850, '2023-09-12 17:00:00.000000', 'Vacation fund for next year', 5),
(126, 2, NULL, 3200, '2023-09-03 10:00:00.000000', 'Salary for September', 1),
(127, 2, 1, 2000, '2023-09-05 12:00:00.000000', 'Photography job income', NULL),
(128, 2, NULL, 1800, '2023-09-07 14:00:00.000000', 'Consulting payment for marketing project', 1),
(129, 2, 4, 1300, '2023-09-10 16:00:00.000000', 'Yoga classes income', NULL),
(130, 2, NULL, 2500, '2023-09-11 18:00:00.000000', 'Commission from product sales', 1),
(131, 2, NULL, 700, '2023-09-02 10:00:00.000000', 'Groceries for the week', 3),
(132, 2, 2, 600, '2023-09-04 12:00:00.000000', 'Vacation to Italy expenses', NULL),
(133, 2, NULL, 500, '2023-09-06 14:00:00.000000', 'Dining and social activities', 2),
(134, 2, 5, 400, '2023-09-09 16:00:00.000000', 'Dental check-up expenses', NULL),
(135, 2, NULL, 300, '2023-09-11 18:00:00.000000', 'Public transportation costs', 4),
(136, 2, NULL, 600, '2023-10-01 09:00:00.000000', 'Emergency fund contribution', 4),
(137, 2, 3, 800, '2023-10-04 11:00:00.000000', 'Savings for home down payment', NULL),
(138, 2, NULL, 700, '2023-10-07 13:00:00.000000', 'Medical savings account deposit', 4),
(139, 2, 2, 550, '2023-10-10 15:00:00.000000', 'Car repair savings', NULL),
(140, 2, NULL, 750, '2023-10-12 17:00:00.000000', 'Retirement fund contribution', 1),
(141, 2, NULL, 3100, '2023-10-02 10:00:00.000000', 'Salary for October', 1),
(142, 2, 1, 1800, '2023-10-04 12:00:00.000000', 'Freelance web development income', NULL),
(143, 2, NULL, 1600, '2023-10-06 14:00:00.000000', 'Payment for online consulting', 1),
(144, 2, 4, 1200, '2023-10-09 16:00:00.000000', 'Revenue from fitness coaching', NULL),
(145, 2, NULL, 2200, '2023-10-11 18:00:00.000000', 'Sales commission', 1),
(146, 2, NULL, 800, '2023-10-02 09:00:00.000000', 'Weekly grocery shopping', 3),
(147, 2, 2, 700, '2023-10-04 11:00:00.000000', 'Holiday travel expenses', NULL),
(148, 2, NULL, 600, '2023-10-06 13:00:00.000000', 'Family outing and entertainment', 2),
(149, 2, 5, 500, '2023-10-09 15:00:00.000000', 'Doctor’s visit expenses', NULL),
(150, 2, NULL, 350, '2023-10-11 17:00:00.000000', 'Transportation and fuel costs', 4),
(151, 2, NULL, 900, '2023-11-01 09:00:00.000000', 'Emergency fund contribution', 4),
(152, 2, 3, 600, '2023-11-04 11:00:00.000000', 'Car down payment savings', NULL),
(153, 2, NULL, 700, '2023-11-07 13:00:00.000000', 'Retirement savings contribution', 1),
(154, 2, 2, 800, '2023-11-10 15:00:00.000000', 'Home renovation savings', NULL),
(155, 2, NULL, 950, '2023-11-12 17:00:00.000000', 'Travel savings for next year', 5),
(156, 2, NULL, 3400, '2023-11-02 10:00:00.000000', 'November salary', 1),
(157, 2, 1, 2000, '2023-11-05 12:00:00.000000', 'Freelance marketing project payment', NULL),
(158, 2, NULL, 2200, '2023-11-07 14:00:00.000000', 'Consulting income from new client', 1),
(159, 2, 4, 1500, '2023-11-10 16:00:00.000000', 'Fitness coaching revenue', NULL),
(160, 2, NULL, 2600, '2023-11-12 18:00:00.000000', 'Sales commission from product', 1),
(161, 2, NULL, 900, '2023-11-02 09:00:00.000000', 'Groceries and food expenses', 3),
(162, 2, 2, 700, '2023-11-05 11:00:00.000000', 'Vacation expenses for trip to Asia', NULL),
(163, 2, NULL, 800, '2023-11-07 13:00:00.000000', 'Dining out with friends', 2),
(164, 2, 5, 600, '2023-11-10 15:00:00.000000', 'Health check-up expenses', NULL),
(165, 2, NULL, 400, '2023-11-12 17:00:00.000000', 'Fuel and transportation costs', 4),
(166, 2, NULL, 1000, '2023-12-01 09:00:00.000000', 'Holiday savings contribution', 5),
(167, 2, 3, 700, '2023-12-04 11:00:00.000000', 'Savings for year-end bonus', NULL),
(168, 2, NULL, 800, '2023-12-07 13:00:00.000000', 'Investments for next year', 1),
(169, 2, 2, 600, '2023-12-10 15:00:00.000000', 'Home down payment savings', NULL),
(170, 2, NULL, 1100, '2023-12-12 17:00:00.000000', 'Retirement fund contribution', 1),
(171, 2, NULL, 3500, '2023-12-02 10:00:00.000000', 'Salary for December', 1),
(172, 2, 1, 2200, '2023-12-05 12:00:00.000000', 'Freelance graphic design income', NULL),
(173, 2, NULL, 2500, '2023-12-07 14:00:00.000000', 'Online teaching income', 1),
(174, 2, 4, 1700, '2023-12-10 16:00:00.000000', 'Fitness program revenue', NULL),
(175, 2, NULL, 2800, '2023-12-12 18:00:00.000000', 'Sales commission and bonuses', 1),
(176, 2, NULL, 1000, '2023-12-02 09:00:00.000000', 'Holiday shopping expenses', 3),
(177, 2, 2, 800, '2023-12-05 11:00:00.000000', 'End-of-year vacation to Europe', NULL),
(178, 2, NULL, 700, '2023-12-07 13:00:00.000000', 'Christmas dinner and party costs', 2),
(179, 2, 5, 600, '2023-12-10 15:00:00.000000', 'Winter healthcare expenses', NULL),
(180, 2, NULL, 500, '2023-12-12 17:00:00.000000', 'Gas and transportation expenses', 4);

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
(1, 'admin', 'admin@example.com', 'admin123', 'Admin', 'User', '1985-08-10', '2025-01-19 05:53:24.572662', NULL, 'admin'),
(2, 'johndoe', 'johndoe@example.com', 'password123', 'John', 'Doe', '1990-01-01', '2025-01-19 05:53:32.206282', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `defaultcategories`
--
ALTER TABLE `defaultcategories`
  ADD PRIMARY KEY (`defaultCategoryID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `defaultcategories`
--
ALTER TABLE `defaultcategories`
  MODIFY `defaultCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `loginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
