-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 05:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_platform`
--
CREATE DATABASE IF NOT EXISTS `gaming_platform` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gaming_platform`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(16) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `birthdate`, `username`, `created_at`, `updated_at`) VALUES
(12, '', '', 'ahmadsami@gmail.com', '', '$2y$10$G0na/U0s5i5y.suw/mUXHOePbie75F0KEJ4oTm3rqnM0xEieMAR5i', '0000-00-00', 'ahmadsami', '2021-11-03 04:05:50', '2021-11-03 04:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_tokens`
--

CREATE TABLE `users_tokens` (
  `token` varchar(255) NOT NULL,
  `user_id` bigint(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_tokens`
--

INSERT INTO `users_tokens` (`token`, `user_id`, `created_at`, `updated_at`) VALUES
('4ebcb4ad55cd1d5beb3e02cdfee70a6d525fc818c2c53fa63ad288aff0ed67a1c0e487482e8da5a22d62aebeb640079a9d65502ccaba7a8cc6debfb17b8a49f0', 12, '2021-11-03 04:05:50', '2021-11-03 04:05:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tokens`
--
ALTER TABLE `users_tokens`
  ADD PRIMARY KEY (`token`),
  ADD KEY `token_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_tokens`
--
ALTER TABLE `users_tokens`
  ADD CONSTRAINT `token_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
