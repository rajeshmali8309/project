-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 09:01 PM
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
-- Table structure for table `twitters_post_likes`
--

CREATE TABLE `twitters_post_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `likeable_type` enum('post','comment','reply') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitters_post_likes`
--

INSERT INTO `twitters_post_likes` (`id`, `user_id`, `post_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(190, 4, 29, 'post', '2025-05-14 11:11:38', '2025-05-14 11:11:38'),
(214, 4, 26, 'post', '2025-05-14 12:12:34', '2025-05-14 12:12:34'),
(278, 2, 33, 'post', '2025-05-16 12:43:11', '2025-05-16 12:43:11'),
(279, 2, 39, 'post', '2025-05-16 12:43:14', '2025-05-16 12:43:14'),
(283, 2, 26, 'post', '2025-05-16 12:43:39', '2025-05-16 12:43:39'),
(284, 2, 10, 'post', '2025-05-16 13:30:01', '2025-05-16 13:30:01'),
(287, 6, 43, 'post', '2025-05-17 06:47:00', '2025-05-17 06:47:00'),
(288, 6, 45, 'post', '2025-05-17 06:50:40', '2025-05-17 06:50:40'),
(290, 7, 48, 'post', '2025-05-17 08:43:41', '2025-05-17 08:43:41'),
(291, 7, 50, 'post', '2025-05-17 08:58:35', '2025-05-17 08:58:35'),
(299, 10, 53, 'post', '2025-05-19 13:05:07', '2025-05-19 13:05:07'),
(300, 10, 52, 'post', '2025-05-19 13:05:08', '2025-05-19 13:05:08'),
(301, 10, 10, 'post', '2025-05-19 13:07:45', '2025-05-19 13:07:45'),
(302, 10, 6, 'post', '2025-05-19 13:07:47', '2025-05-19 13:07:47'),
(303, 10, 11, 'post', '2025-05-19 13:07:49', '2025-05-19 13:07:49'),
(304, 10, 12, 'post', '2025-05-19 13:07:50', '2025-05-19 13:07:50'),
(306, 10, 26, 'post', '2025-05-19 13:07:53', '2025-05-19 13:07:53'),
(307, 10, 39, 'post', '2025-05-19 13:07:55', '2025-05-19 13:07:55'),
(308, 10, 33, 'post', '2025-05-19 13:07:56', '2025-05-19 13:07:56'),
(309, 10, 43, 'post', '2025-05-19 13:08:08', '2025-05-19 13:08:08'),
(310, 10, 54, 'post', '2025-05-19 13:08:12', '2025-05-19 13:08:12'),
(311, 3, 20, 'post', '2025-05-19 13:24:24', '2025-05-19 13:24:24'),
(315, 3, 50, 'post', '2025-05-19 13:26:00', '2025-05-19 13:26:00'),
(316, 3, 58, 'post', '2025-05-20 05:07:34', '2025-05-20 05:07:34'),
(317, 3, 21, 'post', '2025-05-20 05:07:35', '2025-05-20 05:07:35'),
(318, 2, 62, 'post', '2025-05-21 08:15:23', '2025-05-21 08:15:23'),
(319, 2, 60, 'post', '2025-05-21 08:15:25', '2025-05-21 08:15:25'),
(324, 2, 11, 'post', '2025-05-21 10:02:50', '2025-05-21 10:02:50'),
(326, 2, 63, 'post', '2025-05-21 10:04:59', '2025-05-21 10:04:59'),
(329, 2, 53, 'post', '2025-05-21 10:56:58', '2025-05-21 10:56:58'),
(330, 2, 20, 'post', '2025-05-21 10:57:00', '2025-05-21 10:57:00'),
(331, 2, 45, 'post', '2025-05-21 10:57:01', '2025-05-21 10:57:01'),
(332, 2, 52, 'post', '2025-05-21 10:57:03', '2025-05-21 10:57:03'),
(333, 2, 56, 'post', '2025-05-21 10:57:06', '2025-05-21 10:57:06'),
(334, 2, 55, 'post', '2025-05-21 10:57:07', '2025-05-21 10:57:07'),
(335, 2, 29, 'post', '2025-05-21 10:57:11', '2025-05-21 10:57:11'),
(336, 2, 48, 'post', '2025-05-21 10:57:12', '2025-05-21 10:57:12'),
(337, 2, 57, 'post', '2025-05-21 10:57:21', '2025-05-21 10:57:21'),
(338, 2, 21, 'post', '2025-05-21 10:57:27', '2025-05-21 10:57:27'),
(339, 2, 6, 'post', '2025-05-21 10:57:29', '2025-05-21 10:57:29'),
(340, 2, 58, 'post', '2025-05-21 10:57:35', '2025-05-21 10:57:35'),
(341, 2, 12, 'post', '2025-05-21 10:57:37', '2025-05-21 10:57:37'),
(342, 2, 101, 'post', '2025-05-21 10:57:39', '2025-05-21 10:57:39'),
(343, 11, 49, 'post', '2025-05-21 11:51:35', '2025-05-21 11:51:35'),
(344, 11, 39, 'post', '2025-05-21 11:51:36', '2025-05-21 11:51:36'),
(345, 11, 10, 'post', '2025-05-21 11:51:38', '2025-05-21 11:51:38'),
(346, 11, 56, 'post', '2025-05-21 11:51:42', '2025-05-21 11:51:42'),
(347, 11, 57, 'post', '2025-05-21 11:51:46', '2025-05-21 11:51:46'),
(348, 11, 50, 'post', '2025-05-21 11:51:49', '2025-05-21 11:51:49'),
(349, 11, 58, 'post', '2025-05-21 11:51:51', '2025-05-21 11:51:51'),
(350, 11, 48, 'post', '2025-05-21 11:51:52', '2025-05-21 11:51:52'),
(351, 11, 54, 'post', '2025-05-21 11:51:54', '2025-05-21 11:51:54'),
(352, 11, 60, 'post', '2025-05-21 11:51:56', '2025-05-21 11:51:56'),
(353, 11, 63, 'post', '2025-05-21 11:51:58', '2025-05-21 11:51:58'),
(354, 11, 26, 'post', '2025-05-21 11:52:00', '2025-05-21 11:52:00'),
(355, 11, 53, 'post', '2025-05-21 11:52:01', '2025-05-21 11:52:01'),
(356, 11, 103, 'post', '2025-05-21 12:04:17', '2025-05-21 12:04:17'),
(357, 11, 105, 'post', '2025-05-21 12:34:09', '2025-05-21 12:34:09'),
(358, 11, 104, 'post', '2025-05-21 12:34:11', '2025-05-21 12:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_followers`
--

CREATE TABLE `twitter_followers` (
  `id` int(11) NOT NULL,
  `followers` int(11) DEFAULT NULL,
  `following` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_followers`
--

INSERT INTO `twitter_followers` (`id`, `followers`, `following`, `created_at`, `updated_at`) VALUES
(29, 2, 7, '2025-05-17 12:09:46', '2025-05-17 12:09:46'),
(30, 3, 7, '2025-05-17 12:09:48', '2025-05-17 12:09:48'),
(34, 6, 7, '2025-05-17 12:09:54', '2025-05-17 12:09:54'),
(40, 2, 9, '2025-05-19 05:27:59', '2025-05-19 05:27:59'),
(41, 3, 9, '2025-05-19 05:28:00', '2025-05-19 05:28:00'),
(51, 7, 10, '2025-05-19 10:08:35', '2025-05-19 10:08:35'),
(71, 4, 10, '2025-05-19 11:23:20', '2025-05-19 11:23:20'),
(73, 3, 10, '2025-05-19 11:25:30', '2025-05-19 11:25:30'),
(77, 7, 3, '2025-05-20 05:08:58', '2025-05-20 05:08:58'),
(78, 6, 3, '2025-05-20 05:08:59', '2025-05-20 05:08:59'),
(81, 3, 2, '2025-05-20 11:08:20', '2025-05-20 11:08:20'),
(82, 7, 2, '2025-05-20 12:42:25', '2025-05-20 12:42:25'),
(83, 6, 2, '2025-05-20 12:42:26', '2025-05-20 12:42:26'),
(84, 4, 2, '2025-05-20 12:42:26', '2025-05-20 12:42:26'),
(85, 11, 2, '2025-05-20 12:50:41', '2025-05-20 12:50:41'),
(86, 3, 11, '2025-05-20 13:48:20', '2025-05-20 13:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_notifications`
--

CREATE TABLE `twitter_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `type` enum('follow','like','comment') NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_posts`
--

CREATE TABLE `twitter_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_file` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_posts`
--

INSERT INTO `twitter_posts` (`id`, `user_id`, `post_file`, `description`, `created_at`, `updated_at`) VALUES
(6, 2, '1747127022.jpg', 'my second post with Image', '2025-05-13 09:03:42', '2025-05-13 09:03:42'),
(10, 2, '1747127437.jpg', 'letest post', '2025-05-13 09:10:37', '2025-05-13 09:10:37'),
(11, 2, '', 'hello', '2025-05-13 09:14:44', '2025-05-13 09:14:44'),
(12, 2, '1747127824.png', '', '2025-05-13 09:17:04', '2025-05-13 09:17:04'),
(20, 3, '1747139239.png', 'First Post', '2025-05-13 12:27:19', '2025-05-13 12:27:19'),
(21, 3, '', 'second post', '2025-05-13 12:27:48', '2025-05-13 12:27:48'),
(26, 2, '1747144498.jpg', 'this is noptification post', '2025-05-13 13:54:58', '2025-05-13 13:54:58'),
(29, 4, '', 'first post by @suresh_0000', '2025-05-14 11:09:31', '2025-05-14 11:09:31'),
(31, 4, '', 'good after noon', '2025-05-14 11:13:20', '2025-05-14 11:13:20'),
(33, 2, '', 'good night again', '2025-05-14 19:31:07', '2025-05-14 19:31:07'),
(39, 2, '1747399372.jpg', '', '2025-05-16 12:42:52', '2025-05-16 12:42:52'),
(43, 6, '', 'letest post', '2025-05-17 06:46:56', '2025-05-17 06:46:56'),
(45, 6, '1747464452.jpg', '', '2025-05-17 06:47:32', '2025-05-17 06:47:32'),
(48, 7, '', 'good after noon', '2025-05-17 08:42:53', '2025-05-17 08:42:53'),
(49, 7, '1747471638.jpg', '', '2025-05-17 08:47:18', '2025-05-17 08:47:18'),
(50, 7, '1747472309.jpg', '', '2025-05-17 08:58:29', '2025-05-17 08:58:29'),
(52, 8, '', 'first Post', '2025-05-19 05:21:47', '2025-05-19 05:21:47'),
(53, 8, '1747632259.png', '', '2025-05-19 05:24:19', '2025-05-19 05:24:19'),
(54, 9, '', 'letest post', '2025-05-19 05:26:48', '2025-05-19 05:26:48'),
(55, 9, '1747632417.png', '', '2025-05-19 05:26:57', '2025-05-19 05:26:57'),
(56, 10, '1747648906.jpg', '', '2025-05-19 10:01:46', '2025-05-19 10:01:46'),
(57, 10, '1747648914.png', '', '2025-05-19 10:01:54', '2025-05-19 10:01:54'),
(58, 3, '1747662876.mp4', '', '2025-05-19 13:54:36', '2025-05-19 13:54:36'),
(60, 2, '1747806633.jpg', '', '2025-05-21 05:50:33', '2025-05-21 05:50:33'),
(62, 2, '1747807311.png', '', '2025-05-21 06:01:51', '2025-05-21 06:01:51'),
(63, 2, '1747807332.jpg', '', '2025-05-21 06:02:12', '2025-05-21 06:02:12'),
(101, 2, '1747817512.png', '', '2025-05-21 08:51:52', '2025-05-21 08:51:52'),
(103, 11, '1747828838.mp4', '', '2025-05-21 12:00:38', '2025-05-21 12:00:38'),
(104, 11, '1747828847.mp4', '', '2025-05-21 12:00:47', '2025-05-21 12:00:47'),
(105, 11, '', 'new Post', '2025-05-21 12:33:56', '2025-05-21 12:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_post_comments`
--

CREATE TABLE `twitter_post_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_post_comments`
--

INSERT INTO `twitter_post_comments` (`id`, `user_id`, `post_id`, `comments`, `created_at`, `updated_at`) VALUES
(1, 2, 39, 'this is my first comment', '2025-05-17 05:23:02', '2025-05-17 05:23:02'),
(2, 2, 39, 'second comment', '2025-05-17 05:23:33', '2025-05-17 05:23:33'),
(3, 2, 33, 'new comment', '2025-05-17 05:23:49', '2025-05-17 05:23:49'),
(6, 6, 43, 'first comment', '2025-05-17 06:47:10', '2025-05-17 06:47:10'),
(7, 7, 48, 'good after noon', '2025-05-17 08:43:16', '2025-05-17 08:43:16'),
(8, 7, 48, 'hello', '2025-05-17 08:43:25', '2025-05-17 08:43:25'),
(9, 7, 48, 'hay everyOne', '2025-05-17 08:43:36', '2025-05-17 08:43:36'),
(10, 7, 50, 'dsfsfs', '2025-05-17 10:44:12', '2025-05-17 10:44:12'),
(13, 10, 12, 'hello', '2025-05-19 13:06:59', '2025-05-19 13:06:59'),
(14, 3, 49, 'comment', '2025-05-19 13:26:30', '2025-05-19 13:26:30'),
(15, 3, 58, 'India vs Pakisthan', '2025-05-20 05:08:07', '2025-05-20 05:08:07'),
(16, 2, 63, 'dsfdsfd', '2025-05-21 08:12:18', '2025-05-21 08:12:18'),
(17, 2, 63, 'lijhjn', '2025-05-21 08:14:28', '2025-05-21 08:14:28'),
(18, 2, 62, 'gthyth', '2025-05-21 08:15:20', '2025-05-21 08:15:20'),
(20, 2, 50, 'sdss', '2025-05-21 08:54:41', '2025-05-21 08:54:41'),
(21, 2, 50, 'sdsd', '2025-05-21 08:54:46', '2025-05-21 08:54:46'),
(22, 2, 50, 'sdsd', '2025-05-21 08:54:50', '2025-05-21 08:54:50'),
(23, 11, 103, 'new video', '2025-05-21 12:04:24', '2025-05-21 12:04:24'),
(24, 11, 103, 'fir comment', '2025-05-21 12:04:45', '2025-05-21 12:04:45'),
(25, 11, 105, 'fdhfghdfgh', '2025-05-21 12:34:07', '2025-05-21 12:34:07'),
(26, 11, 104, 'gfhfghdfg', '2025-05-21 12:34:14', '2025-05-21 12:34:14'),
(27, 11, 103, 'fdgfdfgf', '2025-05-21 12:34:20', '2025-05-21 12:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_post_comments_reply`
--

CREATE TABLE `twitter_post_comments_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment_reply` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'mahesh_0909', 'Mahesh kumar', 'mahesh67003@gmail.com', 'mahesh0000', '2025-05-08', 'mr mahesh solanki', '2025-05-11', '1747817771.jpg', '1747817771.jpg', '2025-05-11 09:43:01', '2025-05-21 08:56:11'),
(3, '__rajeshmali09', 'Rajesh Mali', 'rajeshk67003@gmail.com', 'rajesh0000', '2002-07-18', 'web developer', '2025-05-13', '1747139116.jpg', '1747139116.jpg', '2025-05-13 12:24:23', '2025-05-13 12:26:20'),
(4, 'suresh_0000', 'Suresh Kumar', 'sureshmali0000@gmail.com', 'suresh0000', '2000-07-17', 'mr suresh Kumar mali', '2025-05-14', '1747220918.jpg', '1747220210.jpg', '2025-05-14 10:53:14', '2025-05-14 11:08:38'),
(6, 'ashish0000', 'Ashish Didiya', 'ashishdodiya09@gmail.com', 'ashish0000', '2002-12-25', '', '2025-05-17', '1747464401.png', '1747464508.jpg', '2025-05-17 06:45:38', '2025-05-17 06:48:28'),
(7, 'mr_ravi0909', 'Ravi Mali', 'ravimali22@gmail.com', 'ravi0000', '2003-04-02', 'I am Ravi mali', '2025-05-17', '1747471511.jpg', '1747471584.jpg', '2025-05-17 08:41:27', '2025-05-17 08:46:24'),
(8, 'kushal_00', 'Kushal singh', 'kushal@gmail.com', 'kushal0000', '2025-05-15', 'efcsdfssads', '2025-05-19', '1747632068.png', '1747632068.jpg', '2025-05-19 05:20:13', '2025-05-19 05:21:08'),
(9, 'harish0000', 'Harish mali', 'harishmali@gmail.com', 'harish0000', '2025-05-16', '', '2025-05-19', '1747632382.jpg', '1747632382.jpg', '2025-05-19 05:25:13', '2025-05-19 05:26:22'),
(10, 'vikram0000', 'Vikram kumar', 'vikram0909@gmail.com', 'vikram0000', '2010-07-22', 'new user', '2025-05-19', '1747648963.jpg', '1747648963.jpg', '2025-05-19 09:57:31', '2025-05-19 10:02:43'),
(11, 'ravindra0000', 'Ravindra singh', 'harsha1122@gmail.com', 'harsha0000', '2025-05-15', 'mr ravindra', '2025-05-20', '', '', '2025-05-20 05:24:35', '2025-05-20 05:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `twitters_post_likes`
--
ALTER TABLE `twitters_post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers` (`followers`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `twitter_users`
--
ALTER TABLE `twitter_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `twitters_post_likes`
--
ALTER TABLE `twitters_post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `twitters_post_likes`
--
ALTER TABLE `twitters_post_likes`
  ADD CONSTRAINT `twitters_post_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitters_post_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  ADD CONSTRAINT `twitter_followers_ibfk_1` FOREIGN KEY (`followers`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_followers_ibfk_2` FOREIGN KEY (`following`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  ADD CONSTRAINT `twitter_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_notifications_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_notifications_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  ADD CONSTRAINT `twitter_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  ADD CONSTRAINT `twitter_post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `twitter_post_comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
