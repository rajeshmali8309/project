-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 04:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `twitter_users`
--

CREATE TABLE `twitter_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `cover_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_users`
--

INSERT INTO `twitter_users` (`id`, `username`, `name`, `email`, `password`, `dob`, `bio`, `join_date`, `profile_picture`, `cover_picture`, `created_at`, `updated_at`) VALUES
(2, 'mahesh_0909', 'Mahesh kumar', 'mahesh67003@gmail.com', 'mahesh0000', '2025-05-08', 'mr mahesh solanki', '2025-05-11', '1747136094.jpg', '1746976781.jpg', '2025-05-11 09:43:01', '2025-05-16 06:51:27'),
(3, '__rajeshmali09', 'Rajesh Mali', 'rajeshk67003@gmail.com', 'rajesh0000', '2002-07-18', 'web developer', '2025-05-13', '1747139116.jpg', '1747139116.jpg', '2025-05-13 12:24:23', '2025-05-13 12:26:20'),
(4, 'suresh_0000', 'Suresh Kumar', 'sureshmali0000@gmail.com', 'suresh0000', '2000-07-17', 'mr suresh Kumar mali', '2025-05-14', '1747220918.jpg', '1747220210.jpg', '2025-05-14 10:53:14', '2025-05-14 11:08:38'),
(6, 'ashish0000', 'Ashish Didiya', 'ashishdodiya09@gmail.com', 'ashish0000', '2002-12-25', '', '2025-05-17', '1747464401.png', '1747464508.jpg', '2025-05-17 06:45:38', '2025-05-17 06:48:28'),
(7, 'mr_ravi0909', 'Ravi Mali', 'ravimali22@gmail.com', 'ravi0000', '2003-04-02', 'I am Ravi mali', '2025-05-17', '1747471511.jpg', '1747471584.jpg', '2025-05-17 08:41:27', '2025-05-17 08:46:24'),
(8, 'kushal_00', 'Kushal singh', 'kushal@gmail.com', 'kushal0000', '2025-05-15', 'efcsdfssads', '2025-05-19', '1747632068.png', '1747632068.jpg', '2025-05-19 05:20:13', '2025-05-19 05:21:08'),
(9, 'harish0000', 'Harish mali', 'harishmali@gmail.com', 'harish0000', '2025-05-16', '', '2025-05-19', '1747632382.jpg', '1747632382.jpg', '2025-05-19 05:25:13', '2025-05-19 05:26:22'),
(10, 'vikram0000', 'Vikram kumar', 'vikram0909@gmail.com', 'vikram0000', '2010-07-22', 'new user', '2025-05-19', '1747648963.jpg', '1747648963.jpg', '2025-05-19 09:57:31', '2025-05-19 10:02:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `twitter_users`
--
ALTER TABLE `twitter_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
