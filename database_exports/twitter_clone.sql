-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 09:34 PM
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
(210, 3, 28, 'post', '2025-05-14 12:05:44', '2025-05-14 12:05:44'),
(212, 4, 28, 'post', '2025-05-14 12:12:04', '2025-05-14 12:12:04'),
(213, 4, 27, 'post', '2025-05-14 12:12:19', '2025-05-14 12:12:19'),
(214, 4, 26, 'post', '2025-05-14 12:12:34', '2025-05-14 12:12:34'),
(238, 2, 15, 'post', '2025-05-14 17:36:02', '2025-05-14 17:36:02'),
(239, 2, 13, 'post', '2025-05-14 17:36:04', '2025-05-14 17:36:04'),
(240, 2, 14, 'post', '2025-05-14 17:36:06', '2025-05-14 17:36:06'),
(245, 2, 27, 'post', '2025-05-14 17:40:37', '2025-05-14 17:40:37'),
(254, 2, 28, 'post', '2025-05-14 18:33:57', '2025-05-14 18:33:57'),
(256, 2, 32, 'post', '2025-05-14 19:22:54', '2025-05-14 19:22:54');

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
(5, 2, '', 'my first Post', '2025-05-13 09:02:36', '2025-05-13 09:02:36'),
(6, 2, '1747127022.jpg', 'my second post with Image', '2025-05-13 09:03:42', '2025-05-13 09:03:42'),
(9, 2, '1747127259.png', '', '2025-05-13 09:07:39', '2025-05-13 09:07:39'),
(10, 2, '1747127437.jpg', 'letest post', '2025-05-13 09:10:37', '2025-05-13 09:10:37'),
(11, 2, '', 'hello', '2025-05-13 09:14:44', '2025-05-13 09:14:44'),
(12, 2, '1747127824.png', '', '2025-05-13 09:17:04', '2025-05-13 09:17:04'),
(13, 2, '', 'hyyy', '2025-05-13 09:18:33', '2025-05-13 09:18:33'),
(14, 2, '', 'hyy hello', '2025-05-13 09:19:07', '2025-05-13 09:19:07'),
(15, 2, '', 'h h', '2025-05-13 09:19:28', '2025-05-13 09:19:28'),
(17, 2, '', 'hello', '2025-05-13 11:14:57', '2025-05-13 11:14:57'),
(19, 2, '', 'new Post', '2025-05-13 11:53:00', '2025-05-13 11:53:00'),
(20, 3, '1747139239.png', 'First Post', '2025-05-13 12:27:19', '2025-05-13 12:27:19'),
(21, 3, '', 'second post', '2025-05-13 12:27:48', '2025-05-13 12:27:48'),
(22, 2, '', 'post 5', '2025-05-13 12:47:47', '2025-05-13 12:47:47'),
(23, 2, '', 'checkout', '2025-05-13 13:52:03', '2025-05-13 13:52:03'),
(24, 2, '', 'this is my post', '2025-05-13 13:53:30', '2025-05-13 13:53:30'),
(25, 2, '', 'this is home page post', '2025-05-13 13:54:15', '2025-05-13 13:54:15'),
(26, 2, '1747144498.jpg', 'this is noptification post', '2025-05-13 13:54:58', '2025-05-13 13:54:58'),
(27, 2, '1747144566.jpg', 'this is a last post', '2025-05-13 13:56:06', '2025-05-13 13:56:06'),
(28, 2, '', 'Good Morning', '2025-05-14 05:36:58', '2025-05-14 05:36:58'),
(29, 4, '', 'first post by @suresh_0000', '2025-05-14 11:09:31', '2025-05-14 11:09:31'),
(31, 4, '', 'good after noon', '2025-05-14 11:13:20', '2025-05-14 11:13:20'),
(32, 2, '', 'good night', '2025-05-14 19:22:47', '2025-05-14 19:22:47'),
(33, 2, '', 'good night again', '2025-05-14 19:31:07', '2025-05-14 19:31:07');

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
(2, 'mahesh_0909', 'Mahesh kumar', 'mahesh67003@gmail.com', 'mahesh0000', '2025-05-08', 'mr mahesh solanki', '2025-05-11', '1747136094.jpg', '1746976781.jpg', '2025-05-11 09:43:01', '2025-05-13 11:55:22'),
(3, '__rajeshmali09', 'Rajesh Mali', 'rajeshk67003@gmail.com', 'rajesh0000', '2002-07-18', 'web developer', '2025-05-13', '1747139116.jpg', '1747139116.jpg', '2025-05-13 12:24:23', '2025-05-13 12:26:20'),
(4, 'suresh_0000', 'Suresh Kumar', 'sureshmali0000@gmail.com', 'suresh0000', '2000-07-17', 'mr suresh Kumar mali', '2025-05-14', '1747220918.jpg', '1747220210.jpg', '2025-05-14 10:53:14', '2025-05-14 11:08:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_notification`
--
ALTER TABLE `twitter_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
