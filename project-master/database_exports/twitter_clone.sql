-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 02:45 PM
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
(205, 2, 11, 'post', '2025-05-14 12:00:59', '2025-05-14 12:00:59'),
(206, 2, 12, 'post', '2025-05-14 12:01:01', '2025-05-14 12:01:01'),
(214, 4, 26, 'post', '2025-05-14 12:12:34', '2025-05-14 12:12:34'),
(270, 2, 25, 'post', '2025-05-16 10:20:36', '2025-05-16 10:20:36'),
(278, 2, 33, 'post', '2025-05-16 12:43:11', '2025-05-16 12:43:11'),
(279, 2, 39, 'post', '2025-05-16 12:43:14', '2025-05-16 12:43:14'),
(283, 2, 26, 'post', '2025-05-16 12:43:39', '2025-05-16 12:43:39'),
(284, 2, 10, 'post', '2025-05-16 13:30:01', '2025-05-16 13:30:01'),
(285, 5, 40, 'post', '2025-05-17 05:37:20', '2025-05-17 05:37:20'),
(286, 5, 42, 'post', '2025-05-17 05:38:21', '2025-05-17 05:38:21'),
(287, 6, 43, 'post', '2025-05-17 06:47:00', '2025-05-17 06:47:00'),
(288, 6, 45, 'post', '2025-05-17 06:50:40', '2025-05-17 06:50:40'),
(290, 7, 48, 'post', '2025-05-17 08:43:41', '2025-05-17 08:43:41'),
(291, 7, 50, 'post', '2025-05-17 08:58:35', '2025-05-17 08:58:35');

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
(39, 5, 7, '2025-05-17 12:10:02', '2025-05-17 12:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_notification`
--

CREATE TABLE `twitter_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `like_id` int(11) DEFAULT NULL,
  `follow_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `type` enum('like','follow','comment') DEFAULT NULL,
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
(25, 2, '', 'this is home page post', '2025-05-13 13:54:15', '2025-05-13 13:54:15'),
(26, 2, '1747144498.jpg', 'this is noptification post', '2025-05-13 13:54:58', '2025-05-13 13:54:58'),
(29, 4, '', 'first post by @suresh_0000', '2025-05-14 11:09:31', '2025-05-14 11:09:31'),
(31, 4, '', 'good after noon', '2025-05-14 11:13:20', '2025-05-14 11:13:20'),
(33, 2, '', 'good night again', '2025-05-14 19:31:07', '2025-05-14 19:31:07'),
(39, 2, '1747399372.jpg', '', '2025-05-16 12:42:52', '2025-05-16 12:42:52'),
(40, 5, '1747460230.png', '', '2025-05-17 05:37:10', '2025-05-17 05:37:10'),
(41, 5, '1747460262.jpg', '', '2025-05-17 05:37:42', '2025-05-17 05:37:42'),
(42, 5, '', 'this is my new account', '2025-05-17 05:38:15', '2025-05-17 05:38:15'),
(43, 6, '', 'letest post', '2025-05-17 06:46:56', '2025-05-17 06:46:56'),
(45, 6, '1747464452.jpg', '', '2025-05-17 06:47:32', '2025-05-17 06:47:32'),
(48, 7, '', 'good after noon', '2025-05-17 08:42:53', '2025-05-17 08:42:53'),
(49, 7, '1747471638.jpg', '', '2025-05-17 08:47:18', '2025-05-17 08:47:18'),
(50, 7, '1747472309.jpg', '', '2025-05-17 08:58:29', '2025-05-17 08:58:29');

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
(4, 5, 40, 'good post', '2025-05-17 05:37:30', '2025-05-17 05:37:30'),
(5, 5, 41, 'new Post', '2025-05-17 05:37:56', '2025-05-17 05:37:56'),
(6, 6, 43, 'first comment', '2025-05-17 06:47:10', '2025-05-17 06:47:10'),
(7, 7, 48, 'good after noon', '2025-05-17 08:43:16', '2025-05-17 08:43:16'),
(8, 7, 48, 'hello', '2025-05-17 08:43:25', '2025-05-17 08:43:25'),
(9, 7, 48, 'hay everyOne', '2025-05-17 08:43:36', '2025-05-17 08:43:36'),
(10, 7, 50, 'dsfsfs', '2025-05-17 10:44:12', '2025-05-17 10:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `twitter_post_comments_reply`
--

CREATE TABLE `twitter_post_comments_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_reply` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_post_comment_likes`
--

CREATE TABLE `twitter_post_comment_likes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_likes` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(2, 'mahesh_0909', 'Mahesh kumar', 'mahesh67003@gmail.com', 'mahesh0000', '2025-05-08', 'mr mahesh solanki', '2025-05-11', '1747136094.jpg', '1746976781.jpg', '2025-05-11 09:43:01', '2025-05-16 06:51:27'),
(3, '__rajeshmali09', 'Rajesh Mali', 'rajeshk67003@gmail.com', 'rajesh0000', '2002-07-18', 'web developer', '2025-05-13', '1747139116.jpg', '1747139116.jpg', '2025-05-13 12:24:23', '2025-05-13 12:26:20'),
(4, 'suresh_0000', 'Suresh Kumar', 'sureshmali0000@gmail.com', 'suresh0000', '2000-07-17', 'mr suresh Kumar mali', '2025-05-14', '1747220918.jpg', '1747220210.jpg', '2025-05-14 10:53:14', '2025-05-14 11:08:38'),
(5, 'suraj_123', 'Suraj Kumar', 'suraj0000@gmail.com', 'suraj0000', '2005-06-17', '', '2025-05-17', '1747460315.jpg', '', '2025-05-17 05:36:06', '2025-05-17 05:38:35'),
(6, 'ashish0000', 'Ashish Didiya', 'ashishdodiya09@gmail.com', 'ashish0000', '2002-12-25', '', '2025-05-17', '1747464401.png', '1747464508.jpg', '2025-05-17 06:45:38', '2025-05-17 06:48:28'),
(7, 'mr_ravi0909', 'Ravi Mali', 'ravimali22@gmail.com', 'ravi0000', '2003-04-02', 'I am Ravi mali', '2025-05-17', '1747471511.jpg', '1747471584.jpg', '2025-05-17 08:41:27', '2025-05-17 08:46:24');

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
-- Indexes for table `twitter_notification`
--
ALTER TABLE `twitter_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `like_id` (`like_id`),
  ADD KEY `follow_id` (`follow_id`),
  ADD KEY `comment_id` (`comment_id`);

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
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `twitter_post_comment_likes`
--
ALTER TABLE `twitter_post_comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `twitter_notification`
--
ALTER TABLE `twitter_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_post_comment_likes`
--
ALTER TABLE `twitter_post_comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `twitter_notification`
--
ALTER TABLE `twitter_notification`
  ADD CONSTRAINT `twitter_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_notification_ibfk_2` FOREIGN KEY (`like_id`) REFERENCES `twitters_post_likes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `twitter_notification_ibfk_3` FOREIGN KEY (`follow_id`) REFERENCES `twitter_followers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `twitter_notification_ibfk_4` FOREIGN KEY (`comment_id`) REFERENCES `twitter_post_comments` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `twitter_post_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `twitter_post_comment_likes`
--
ALTER TABLE `twitter_post_comment_likes`
  ADD CONSTRAINT `twitter_post_comment_likes_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `twitter_post_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comment_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
