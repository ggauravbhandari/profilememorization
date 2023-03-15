-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2022 at 09:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memorisation`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `confirm_code` varchar(200) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `contactnumber` varchar(150) DEFAULT NULL,
  `address` text,
  `user_status` int(2) NOT NULL DEFAULT '1',
  `user_role` int(3) NOT NULL DEFAULT '2' COMMENT '1=admin,2=user',
  `email_verify` int(2) NOT NULL DEFAULT '1' COMMENT '1=verify,0=unverify',
  `email_varification_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `confirm_code`, `password`, `contactnumber`, `address`, `user_status`, `user_role`, `email_verify`, `email_varification_date`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$10$YF0jdnl6Q0.kEUJwUxnSDuwTcLRdBg1qUsYOkAhAiVjP9mxWmHQ9G', NULL, NULL, 1, 1, 1, '2022-04-23 18:30:00', '2022-04-24 18:08:58', '2022-04-26 18:36:59'),
(4, 'john', 'deu', 'admin1@gmail.com', NULL, '$2y$10$ij91TsQhBUBuMcOnF8FU0.p/M3n/bwH98A6eyOGpyBYioK1yqoM.S', '394834', 'vijay nagar', 1, 2, 1, NULL, '2022-04-26 18:36:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
