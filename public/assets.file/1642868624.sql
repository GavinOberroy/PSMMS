-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 04:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ceks', 'ceks@gmail.com', '2', NULL, '$2y$10$C40SCSkkvgVZP4zopLitSeBlUwzz1c7Y6TsGk34fN9KtUZJQ2boDy', NULL, NULL, NULL, '2021-11-14 23:52:32', '2021-11-14 23:52:32'),
(2, 'lecturer ceks', 'lecturer@gmail.com', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2021-11-14 23:53:15', '2021-11-14 23:53:15'),
(3, 'nabilah', 'nabilah@gmail.com', '2', NULL, '$2y$10$5sRfufjKIlEVXq30a2EcVuOfoUJjJxQ7BVo2HcdSdAfHC2r3NkB4W', NULL, NULL, NULL, '2021-11-14 23:54:22', '2021-11-14 23:54:22'),
(4, 'nureen', 'nureen@gmail.com', '2', NULL, '$2y$10$Bv8.0WInq.t.zdPsLnylZe3hlX76SSxWcHpwBf5GQrnO8WX9c0FMu', NULL, NULL, NULL, '2021-11-15 00:49:52', '2021-11-15 00:49:52'),
(5, 'Noorlin ', 'norlin@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-16 14:24:50', '2022-01-16 14:24:50'),
(6, 'Wan Isni', 'sofiah@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-16 14:24:50', '2022-01-16 14:24:50'),
(7, 'Zulfahmi', 'zulfahmi@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-16 14:24:50', '2022-01-16 14:24:50'),
(8, 'Yusnita Muhammad Noor', 'yusnitanoor@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-16 14:24:50', '2022-01-16 14:24:50'),
(9, 'Danakorn Nincarean', 'danakorn@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50'),
(10, 'Mohd Izham', 'izhamjaya@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50'),
(11, 'Mohd Faizal', 'faizalrazak@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50'),
(12, 'Syifak Izhar', 'syifakizhar@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50'),
(13, 'Aziman', 'aziman@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50'),
(14, 'Imran Edzereiq ', 'edzereiq@ump.edu.my', '1', NULL, '$2y$10$WMO/KhNtJbew6lEiepDb.uJ9J4jDP93LseTZ9gqCcxJYbcOKWUnOW', NULL, NULL, NULL, '2022-01-17 14:24:50', '2022-01-17 14:24:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
