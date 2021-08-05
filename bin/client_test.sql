-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2021 at 03:16 AM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1627928358),
('m210802_174336_order', 1627928359);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `amount`, `service_id`, `create_time`, `status`) VALUES
(1, 123, '0', 1, '2021-08-02 23:20:09', 0),
(2, 123, '0', 1, '2021-08-02 23:21:07', 0),
(3, 123, '0', 1, '2021-08-02 23:21:09', 0),
(4, 123, '5000000', 1, '2021-08-02 23:21:31', 0),
(5, 123, '200000000', 1, '2021-08-02 23:21:41', 0),
(6, 123, '50000000', 1, '2021-08-02 23:24:24', 0),
(7, 123, '50000000', 1, '2021-08-02 23:25:05', 0),
(8, 123, '50000000', 1, '2021-08-02 23:25:19', 0),
(9, 123, '50000000', 1, '2021-08-02 23:25:45', 0),
(10, 123, '50000000', 1, '2021-08-02 23:25:53', 0),
(11, 123, '50000000', 1, '2021-08-02 23:26:12', 0),
(12, 123, '50000000', 1, '2021-08-02 23:34:08', 0),
(13, 123, '200000000', 1, '2021-08-02 23:35:03', 0),
(14, 123, '50000000', 1, '2021-08-02 23:35:21', 0),
(15, 123, '50000000', 1, '2021-08-02 23:35:52', 0),
(16, 123, '50000000', 1, '2021-08-03 01:28:47', 0),
(17, 123, '50000000', 1, '2021-08-03 02:12:42', 0),
(18, 123, '50000000', 1, '2021-08-03 02:13:11', 0),
(19, 123, '50000000', 1, '2021-08-03 02:13:20', 0),
(20, 123, '50000000', 1, '2021-08-03 02:13:34', 0),
(21, 123, '50000000', 1, '2021-08-03 02:13:50', 0),
(22, 123, '50000000', 1, '2021-08-03 02:14:13', 0),
(23, 123, '150000000', 1, '2021-08-03 02:14:37', 0),
(24, 123, '150000000', 1, '2021-08-03 02:15:05', 0),
(25, 123, '150000000', 1, '2021-08-03 02:15:25', 0),
(26, 123, '50000000', 1, '2021-08-03 02:43:20', 0),
(27, 123, '50000000', 1, '2021-08-03 02:43:52', 0),
(28, 123, '50000000', 1, '2021-08-03 02:44:44', 0),
(29, 123, '50000000', 1, '2021-08-03 02:44:54', 0),
(30, 123, '50000000', 1, '2021-08-03 12:13:22', 0),
(31, 123, '50000000', 1, '2021-08-03 12:14:23', 0),
(32, 123, '150000000', 1, '2021-08-03 12:14:34', 0),
(33, 123, '50000000', 1, '2021-08-03 17:19:18', 0),
(34, 123, '50000000', 1, '2021-08-03 17:21:24', 0),
(35, 123, '50000000', 1, '2021-08-03 17:21:43', 0),
(36, 123, '50000000', 1, '2021-08-03 17:42:47', 0),
(37, 123, '50000000', 1, '2021-08-03 18:01:21', 0),
(38, 123, '50000000', 1, '2021-08-03 18:01:23', 0),
(39, 123, '50000000', 1, '2021-08-03 18:28:56', 0),
(40, 1, '50000000', 1, '2021-08-03 21:41:47', 0),
(41, 123, '50000000', 1, '2021-08-03 22:16:11', 0),
(42, 123, '50000000', 1, '2021-08-04 01:00:23', 0),
(43, 123, '150000000', 1, '2021-08-04 22:55:17', 0),
(44, 1, '50000000', 1, '2021-08-05 01:04:25', 0),
(45, 123, '50000000', 1, '2021-08-05 01:53:57', 0),
(46, 123, '50000000', 1, '2021-08-05 01:55:42', 0),
(47, 123, '50000000', 1, '2021-08-05 01:56:06', 0),
(48, 123, '50000000', 1, '2021-08-05 01:56:28', 0),
(49, 123, '50000000', 1, '2021-08-05 01:57:20', 0),
(50, 123, '50000000', 1, '2021-08-05 01:58:26', 0),
(51, 123, '200000000', 1, '2021-08-05 02:14:48', 0),
(52, 123, '150000000', 1, '2021-08-05 02:16:47', 0),
(53, 123, '150000000', 1, '2021-08-05 02:25:34', 0),
(54, 123, '755050500', 1, '2021-08-05 02:26:02', 0),
(55, 123, '56465465465400', 1, '2021-08-05 02:26:24', 0),
(56, 123, '123212312300', 1, '2021-08-05 02:27:53', 0),
(57, 123, '1.2653461524365E+32', 1, '2021-08-05 02:28:09', 0),
(58, 123, '150000000', 1, '2021-08-05 02:28:24', 0),
(59, 123, '50000000', 1, '2021-08-05 02:28:47', 0),
(60, 123, '50000000', 1, '2021-08-05 02:29:54', 0),
(61, 123, '50000000', 1, '2021-08-05 02:33:50', 0),
(62, 123, '50000000', 1, '2021-08-05 02:34:07', 0),
(63, 1, '50000000', 1, '2021-08-05 02:35:02', 0),
(64, 1, '50000000', 1, '2021-08-05 02:36:46', 0),
(65, 1, '50000000', 1, '2021-08-05 02:38:33', 0),
(66, 1, '50000000', 1, '2021-08-05 02:39:16', 0),
(67, 1, '150000000', 1, '2021-08-05 03:37:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `balance`, `update_time`) VALUES
(1, '400000000', '2021-04-08 11:50:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
