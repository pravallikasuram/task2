-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2023 at 03:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `previous_logout` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastupdated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `firstname`, `lastname`, `email`, `created_at`, `last_login`, `previous_logout`, `updated_at`, `lastupdated_at`) VALUES
(6, 'ramyachinnam', '$2y$10$v2y6csHLKrATpouP.fuwwu3N3f4TYDl1W1hJ7kLb0h9xYRfWNyzn.', 'RamyaChinnam', 'Chinnam', 'ramyac@gmail.com', '2023-08-09 14:18:34', '2023-08-10 16:58:54', '2023-08-10 16:58:54', '2023-08-10 11:41:55', '2023-08-10 11:41:42'),
(7, 'pallavi', '$2y$10$c6MICswCL/WYqqjn18a5TOmBBjpY2KTO3b/kPrMMV6QydedC59xye', 'pallavi', 'suram', 'suram@gmail.com', '2023-08-10 06:50:04', '2023-08-10 06:50:04', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Thaswik', '$2y$10$lOAwGIWbM9LhIjWayf5I7O7rp3wJx5GHjGycMeFhHKzRRVux4XEGS', 'Thaswik', 'Suram', 'suramthaswik@gmail.com', '2023-08-10 11:46:56', '2023-08-16 12:12:12', '2023-08-14 07:08:07', '2023-08-14 07:08:39', '2023-08-10 11:47:32'),
(9, 'pravallikasuram', '$2y$10$NXwr2ZF9lQfAV9DrpI/ai.Pe2oLp416FhnriFTf7ntxQVnd8YBYJm', 'Pravallika', 'Suram', 'surampravallika@gmail.com', '2023-08-10 12:02:03', '2023-08-10 12:02:26', '2023-08-10 12:02:26', '2023-08-10 12:02:57', '0000-00-00 00:00:00'),
(10, 'brad', '$2y$10$uTSOwKXsWL2V6ESatxMMhO9tp9D0dHJ3nHiPu0YDsca11ohJ/XIAK', 'Brad', 'Pit', 'bradpit@gmail.com', '2023-08-10 12:10:59', '2023-08-10 12:11:12', '2023-08-10 12:11:12', '2023-08-10 12:11:30', '0000-00-00 00:00:00'),
(11, 'aishu', '$2y$10$HqDYy4TnV4wQPH2ll3FJf.v97./Yi1Dx5dBPUBSaPVb3RsfsrcKr.', 'Aish', 'waryaa', 'aishu@gmail.com', '2023-08-10 16:27:37', '2023-08-10 16:27:58', '2023-08-10 16:27:58', '2023-08-10 16:28:11', '0000-00-00 00:00:00'),
(13, 'abcd', '$2y$10$b8Xwt84xd7/aujLDhACUAupuSJqDiWe.fCBXokAIJ5hoEuCuD5dZ.', 'abcd1', 'abcd', 'abcd@gmail.com', '2023-08-16 09:55:53', '2023-08-19 06:23:19', '2023-08-16 17:26:42', '2023-08-19 06:23:37', '0000-00-00 00:00:00'),
(14, 'defg', '$2y$10$yqA05EK32LZVOBbHJfF3Z.q10NA6QeAuXFC8UKumioiQmItkgAUxe', 'Thaswik', 'Suram', 'suramthaswik@gmail.com', '2023-08-16 12:51:11', '2023-08-16 17:22:41', '2023-08-16 12:51:57', '2023-08-17 07:06:09', '2023-08-16 16:19:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
