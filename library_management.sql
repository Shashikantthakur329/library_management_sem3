-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2022 at 12:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_issued` int(11) NOT NULL DEFAULT 0,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `publishing_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `quantity`, `total_issued`, `added_date`, `publishing_year`) VALUES
('a12', 2, 0, '2022-05-02 16:31:40', '2022'),
('s12', 1, 1, '2022-05-01 18:51:30', '2011'),
('s13', 258, 1, '2022-05-01 18:54:19', '2012'),
('s14', 1, 0, '2022-05-02 08:41:14', '2019'),
('s16', 139, 5, '2022-05-01 20:11:58', '1996'),
('s19', 20, 0, '2022-05-02 19:13:43', '2009'),
('s26', 13, 2, '2022-05-02 19:27:25', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `book_name`
--

CREATE TABLE `book_name` (
  `book_id` varchar(255) NOT NULL DEFAULT '',
  `book_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_name`
--

INSERT INTO `book_name` (`book_id`, `book_name`) VALUES
('a12', 'manpreet_book'),
('s12', 'father of books'),
('s13', 'mother of books'),
('s14', 'cse_book'),
('s16', 'book n0. 1'),
('s19', 'bunbun'),
('s26', 'banban');

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `book_id` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`book_id`, `type`) VALUES
('a12', 'computer_science'),
('s13', 'poetry'),
('s14', 'computer_science'),
('s16', 'fiction'),
('s19', 'fiction'),
('s26', 'fiction');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `s_no` int(11) NOT NULL,
  `borrow_id` varchar(255) DEFAULT NULL,
  `book_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issued_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `returned_date` timestamp NULL DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`s_no`, `borrow_id`, `book_id`, `user_id`, `issued_date`, `returned_date`, `fine`) VALUES
(20, 'GZzoPAtkm2', 's12', 47, '2022-05-02 18:50:13', NULL, NULL),
(27, 'tugVdoWVnw', 's26', 47, '2022-05-02 19:27:42', NULL, NULL),
(28, 'PSnMB4cJEe', 's26', 47, '2022-05-02 19:28:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) DEFAULT NULL,
  `role` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'student'),
(1, 'super admin'),
(2, 'agent'),
(3, 'gleam admin');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `s_no.` int(11) NOT NULL,
  `borrow_id` varchar(255) DEFAULT NULL,
  `book_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `borrowed_date` timestamp NULL DEFAULT NULL,
  `returned_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`s_no.`, `borrow_id`, `book_id`, `user_id`, `borrowed_date`, `returned_date`) VALUES
(1, '956nV6CCj7', 's16', 47, '2022-05-01 23:09:21', '0000-00-00 00:00:00'),
(2, '0i3AyWE06Y', 's13', 47, '2022-05-01 23:09:47', '0000-00-00 00:00:00'),
(3, 'u0UKdoGqJH', 's13', 47, '2022-05-02 06:22:41', '2022-05-02 06:22:41'),
(4, 'bnffPu0OLQ', 's13', 47, '2022-05-02 06:19:24', '2022-05-02 06:28:25'),
(5, 'ivq8rubPQU', 's16', 47, '2022-05-02 06:22:34', '2022-05-02 06:22:34'),
(6, 'sFBFFWBofG', 's16', 47, '2022-05-02 06:31:21', '2022-05-02 06:34:57'),
(7, '8CGNyMViwG', 's16', 47, '2022-05-02 06:35:55', '2022-05-02 06:44:55'),
(8, 'lZK6pIvOl2', 's13', 47, '2022-05-02 08:32:49', '2022-05-02 08:45:06'),
(9, 'WToMeiAqGM', 's16', 47, '2022-05-02 08:38:42', '2022-05-02 08:39:07'),
(10, 'YU8z128UfB', 's16', 47, '2022-05-02 08:47:59', '2022-05-02 16:33:11'),
(11, '0Adk85EwjC', 's13', 47, '2022-05-02 08:48:48', '2022-05-02 13:28:31'),
(12, 'aLlV4nYRJE', 's16', 47, '2022-05-02 13:51:44', '2022-05-02 16:45:22'),
(13, 'XUwi3XLxYN', 's13', 47, '2022-05-02 13:51:56', '2022-05-02 19:02:40'),
(14, 'BjDgapvgJ9', 's16', 47, '2022-05-02 16:32:54', '2022-05-02 16:45:25'),
(15, 'PnnsIdwgu7', 's16', 47, '2022-05-02 16:33:00', '2022-05-02 18:34:40'),
(16, 'wGMBklb9PT', 's16', 47, '2022-05-02 18:49:54', '2022-05-02 19:02:38'),
(17, 'GZzoPAtkm2', 's12', 47, '2022-05-02 18:50:13', NULL),
(18, 'xT84YRcosB', 's16', 47, '2022-05-02 18:51:36', '2022-05-02 19:02:34'),
(19, '5h7kA1GpjF', 's16', 47, '2022-05-02 19:04:10', '2022-05-02 19:05:45'),
(20, 'ECMdAccP2w', 's13', 47, '2022-05-02 19:06:03', '2022-05-02 19:06:50'),
(21, 'iMR0SgOrRG', 's16', 47, '2022-05-02 19:06:10', '2022-05-02 19:06:47'),
(22, 'i6AdgJvxFC', 's16', 47, '2022-05-02 19:06:18', '2022-05-02 19:06:42'),
(23, 'f7XvBuasjd', 's16', 47, '2022-05-02 19:08:25', '2022-05-02 19:08:35'),
(24, 'tugVdoWVnw', 's26', 47, '2022-05-02 19:27:42', NULL),
(25, 'PSnMB4cJEe', 's26', 47, '2022-05-02 19:28:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0 COMMENT '0-student, 1-admin,2-agent, 3-gleam admin',
  `verification_code` text DEFAULT NULL,
  `forgot_token` text DEFAULT NULL,
  `verified` int(10) NOT NULL DEFAULT 0 COMMENT '0-No, 1-Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `is_admin`, `verification_code`, `forgot_token`, `verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'admin', 'admin@gmail.com', 777587558, '$2y$10$hB2oFF57Jutxg5f.0iTU0eL5sQPVvlqA5HNO59l315KjnV4AgtYnG', 1, NULL, '7587', 1, '2022-03-03 07:44:41', '2022-03-12 08:20:44', NULL),
(38, 'Nishu', 'piyushbansal941@gmail.com', 8484337774, '$2y$10$kaaFE7GkAYtYSeK2N1gV6eFYws/20NSgtdsqO3TYfLYSq4LgiByYm', 2, '5209', NULL, 1, '2022-03-12 08:16:40', '2022-03-12 08:18:30', NULL),
(39, 'Shashikant Thakur', 'IIT2020024@iiita.ac.in', 9589536173, '$2y$10$U5QvER0OEyq/q1MLE7WZvuf7L/pKujmn2BamO3SHRa5NT0kXVGzU.', 0, NULL, NULL, 0, '2022-04-30 20:30:04', NULL, NULL),
(40, 'das', 'asd@g.com', 1188332211, '$2y$10$6xx1E8B8tVoXEzEQu7t8cugNdq7zgqHHKKncy4HqofEXxBvcMSZuS', 0, NULL, NULL, 0, '2022-04-30 20:32:56', NULL, NULL),
(41, 'asd', 'asdasdf@g,ao.c', 9589536173, '$2y$10$EfWYQME5X2X1NH2VQT996uKhZFwqlVUBKKCuvKsA5yEXsMJjG729q', 0, NULL, NULL, 0, '2022-04-30 20:34:46', NULL, NULL),
(42, 'asd', 'asdasdf@g,ao.c1', 9589536173, '$2y$10$vxowA0TjqXSVUc47slFcxeNM3rpQwVdfUO9yq8j84Bd/sxWT/Njra', 0, NULL, NULL, 0, '2022-04-30 20:36:58', NULL, NULL),
(43, 'asd', 'asdasdf@g,ao.c1a', 9589536173, '$2y$10$srRdVeacOZ0KnO4.s1KFvOIl6v9YHNm7YCBTWwsUcPOH0FBeUFMpy', 0, NULL, NULL, 0, '2022-04-30 20:37:37', NULL, NULL),
(44, 'asd', 'asdasdf@g,ao.c1asad', 9988332211, '$2y$10$xJBZizFwzzM3MRLf3KyX8uY65dEUq87Vc.DKf93CR7d5ZCph4vk.K', 0, NULL, NULL, 0, '2022-04-30 20:39:14', NULL, NULL),
(45, 'Shashikant Thakur', 'usr@gmail.com', 1234567891, '$2y$10$qoSCnjik4vFtPiYpYQs56u.hspMTohHcgL/chDUk1Q7N19S4Hedv6', 0, NULL, NULL, 0, '2022-04-30 20:40:32', NULL, NULL),
(46, 'Himanshu Mathur', 'IIT2020023@iiita.ac.in', 1188332211, '$2y$10$dwpHhCcFoG9I94JPKtEcy.Y2Cm9xXNuZZph/O.GzmJx9mY4ih8q..', 1, NULL, NULL, 0, '2022-04-30 20:41:11', '2022-05-01 11:54:14', NULL),
(47, 'asd', 'IIT2020025@iiita.ac.in', 1188332212, '$2y$10$732OrABMn/f9cF5ZdQyfgeHgu9rsubiZHB4ch.OA6iMb8uEW3ZTsy', 0, NULL, NULL, 0, '2022-05-01 19:12:23', '2022-05-03 10:42:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_name`
--
ALTER TABLE `book_name`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `issued`
--
ALTER TABLE `issued`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`s_no.`),
  ADD UNIQUE KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issued`
--
ALTER TABLE `issued`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `s_no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
