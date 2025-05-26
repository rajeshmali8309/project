-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 11:56 PM
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
  `liked_id` int(11) NOT NULL,
  `likeable_type` enum('post','comment','reply') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitters_post_likes`
--

INSERT INTO `twitters_post_likes` (`id`, `user_id`, `post_id`, `liked_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(2, 2, 62, 0, 'post', '2025-05-24 07:06:52', '2025-05-24 07:06:52'),
(3, 2, 60, 0, 'post', '2025-05-24 07:06:53', '2025-05-24 07:06:53'),
(4, 2, 39, 0, 'post', '2025-05-24 07:06:56', '2025-05-24 07:06:56'),
(5, 8, 63, 0, 'post', '2025-05-24 07:12:06', '2025-05-24 07:12:06'),
(6, 8, 62, 0, 'post', '2025-05-24 07:12:08', '2025-05-24 07:12:08'),
(7, 8, 33, 0, 'post', '2025-05-24 07:12:11', '2025-05-24 07:12:11'),
(8, 8, 12, 0, 'post', '2025-05-24 07:14:02', '2025-05-24 07:14:02'),
(11, 2, 52, 0, 'post', '2025-05-24 19:41:55', '2025-05-24 19:41:55'),
(12, 2, 11, 0, 'post', '2025-05-24 19:41:57', '2025-05-24 19:41:57'),
(14, 2, 101, 0, 'post', '2025-05-25 06:59:23', '2025-05-25 06:59:23'),
(15, 2, 104, 0, 'post', '2025-05-25 07:00:02', '2025-05-25 07:00:02'),
(18, 2, 54, 0, 'post', '2025-05-25 08:58:27', '2025-05-25 08:58:27'),
(49, 2, 20, 0, 'comment', '2025-05-25 13:07:30', '2025-05-25 13:07:30'),
(50, 2, 21, 0, 'comment', '2025-05-25 13:07:31', '2025-05-25 13:07:31'),
(186, 2, NULL, 10, 'comment', '2025-05-25 15:55:12', '2025-05-25 15:55:12'),
(188, 2, NULL, 34, 'comment', '2025-05-25 16:12:35', '2025-05-25 16:12:35'),
(189, 2, 50, 0, 'post', '2025-05-25 17:53:39', '2025-05-25 17:53:39'),
(190, 2, NULL, 18, 'comment', '2025-05-25 19:13:46', '2025-05-25 19:13:46'),
(191, 2, NULL, 35, 'comment', '2025-05-25 19:30:09', '2025-05-25 19:30:09'),
(192, 2, NULL, 32, 'comment', '2025-05-25 20:55:13', '2025-05-25 20:55:13'),
(193, 2, NULL, 31, 'comment', '2025-05-25 20:55:15', '2025-05-25 20:55:15'),
(194, 2, NULL, 30, 'comment', '2025-05-25 20:55:16', '2025-05-25 20:55:16'),
(195, 2, 31, 0, 'post', '2025-05-25 21:06:13', '2025-05-25 21:06:13'),
(196, 2, 55, 0, 'post', '2025-05-25 21:17:19', '2025-05-25 21:17:19'),
(197, 2, 48, 0, 'post', '2025-05-25 21:17:37', '2025-05-25 21:17:37'),
(203, 2, NULL, 16, 'comment', '2025-05-25 21:20:09', '2025-05-25 21:20:09'),
(205, 2, 63, 0, 'post', '2025-05-25 21:22:15', '2025-05-25 21:22:15'),
(226, 2, NULL, 17, 'comment', '2025-05-25 21:53:00', '2025-05-25 21:53:00');

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
(86, 3, 11, '2025-05-20 13:48:20', '2025-05-20 13:48:20'),
(92, 6, 2, '2025-05-22 17:49:11', '2025-05-22 17:49:11'),
(93, 4, 2, '2025-05-22 17:49:12', '2025-05-22 17:49:12'),
(94, 8, 2, '2025-05-22 17:49:17', '2025-05-22 17:49:17'),
(98, 3, 8, '2025-05-24 07:10:24', '2025-05-24 07:10:24');

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

--
-- Dumping data for table `twitter_notifications`
--

INSERT INTO `twitter_notifications` (`id`, `user_id`, `sender_id`, `post_id`, `type`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(12, 2, 8, 62, 'like', '@kushal_00 liked your post.', 1, '2025-05-24 07:12:08', '2025-05-24 07:12:18'),
(14, 2, 8, 12, 'like', '@kushal_00 liked your post.', 1, '2025-05-24 07:14:02', '2025-05-24 07:14:05'),
(16, 8, 2, 52, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-24 19:41:55', '2025-05-24 19:41:55'),
(17, 11, 2, 104, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 07:00:02', '2025-05-25 07:00:02'),
(20, 9, 2, 54, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 08:58:27', '2025-05-25 08:58:27'),
(47, 7, 2, 10, 'like', '@mahesh_0909 liked your comment.', 0, '2025-05-25 15:55:12', '2025-05-25 15:55:12'),
(48, 7, 2, 50, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 17:53:39', '2025-05-25 17:53:39'),
(49, 4, 2, 31, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 21:06:13', '2025-05-25 21:06:13'),
(50, 9, 2, 55, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 21:17:19', '2025-05-25 21:17:19'),
(51, 7, 2, 48, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 21:17:37', '2025-05-25 21:17:37');

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
(105, 11, '', 'new Post', '2025-05-21 12:33:56', '2025-05-21 12:33:56'),
(106, 2, '', 'aSAS', '2025-05-25 19:17:12', '2025-05-25 19:17:12');

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
(23, 11, 103, 'new video', '2025-05-21 12:04:24', '2025-05-21 12:04:24'),
(24, 11, 103, 'fir comment', '2025-05-21 12:04:45', '2025-05-21 12:04:45'),
(25, 11, 105, 'fdhfghdfgh', '2025-05-21 12:34:07', '2025-05-21 12:34:07'),
(26, 11, 104, 'gfhfghdfg', '2025-05-21 12:34:14', '2025-05-21 12:34:14'),
(27, 11, 103, 'fdgfdfgf', '2025-05-21 12:34:20', '2025-05-21 12:34:20'),
(28, 2, 101, 'scomment', '2025-05-24 19:41:39', '2025-05-24 19:41:39'),
(29, 2, 52, 'comment', '2025-05-24 19:41:51', '2025-05-24 19:41:51'),
(30, 2, 55, 'sadsd', '2025-05-25 08:58:24', '2025-05-25 08:58:24'),
(31, 2, 55, 'hello', '2025-05-25 09:08:04', '2025-05-25 09:08:04'),
(32, 2, 55, 'hello', '2025-05-25 09:55:33', '2025-05-25 09:55:33'),
(33, 2, 39, 'new comment', '2025-05-25 10:31:44', '2025-05-25 10:31:44'),
(34, 2, 50, 'new comment', '2025-05-25 13:10:40', '2025-05-25 13:10:40'),
(35, 2, 62, 'SADAD', '2025-05-25 19:17:26', '2025-05-25 19:17:26');

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

--
-- Dumping data for table `twitter_post_comments_reply`
--

INSERT INTO `twitter_post_comments_reply` (`id`, `user_id`, `post_id`, `comment_id`, `comment_reply`, `created_at`) VALUES
(11, 2, 62, 35, 'helo', '2025-05-25 19:48:41'),
(12, 2, 62, 18, 'hy', '2025-05-25 19:48:47'),
(13, 2, 55, 32, 'hello', '2025-05-25 20:55:22'),
(14, 2, 55, 31, 'helo', '2025-05-25 20:55:31'),
(15, 2, 55, 31, 'new reply', '2025-05-25 20:55:44'),
(16, 2, 55, 32, 'new reply', '2025-05-25 20:55:56'),
(17, 2, 63, 17, 'hello', '2025-05-25 21:42:24'),
(18, 2, 63, 17, 'hello', '2025-05-25 21:42:30'),
(19, 2, 63, 16, 'hello', '2025-05-25 21:43:50');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
