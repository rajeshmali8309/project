-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 04:00 PM
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
(7, 7, NULL, 2, 'comment', '2025-05-28 11:37:14', '2025-05-28 11:37:14'),
(8, 7, NULL, 1, 'comment', '2025-05-28 11:37:15', '2025-05-28 11:37:15'),
(15, 7, 39, 0, 'post', '2025-05-28 11:45:39', '2025-05-28 11:45:39'),
(16, 7, 48, 0, 'post', '2025-05-28 11:45:53', '2025-05-28 11:45:53'),
(37, 7, NULL, 9, 'comment', '2025-05-28 12:23:08', '2025-05-28 12:23:08'),
(38, 7, NULL, 52, 'reply', '2025-05-28 12:23:13', '2025-05-28 12:23:13'),
(39, 7, NULL, 46, 'reply', '2025-05-28 12:23:14', '2025-05-28 12:23:14'),
(40, 7, NULL, 45, 'reply', '2025-05-28 12:23:16', '2025-05-28 12:23:16'),
(42, 7, NULL, 32, 'reply', '2025-05-28 12:24:19', '2025-05-28 12:24:19'),
(43, 7, NULL, 33, 'reply', '2025-05-28 12:24:21', '2025-05-28 12:24:21'),
(44, 7, NULL, 34, 'reply', '2025-05-28 12:24:22', '2025-05-28 12:24:22'),
(45, 7, NULL, 35, 'reply', '2025-05-28 12:24:24', '2025-05-28 12:24:24'),
(46, 7, NULL, 36, 'reply', '2025-05-28 12:24:26', '2025-05-28 12:24:26'),
(47, 7, 63, 0, 'post', '2025-05-28 15:32:41', '2025-05-28 15:32:41'),
(48, 7, NULL, 17, 'comment', '2025-05-28 15:32:57', '2025-05-28 15:32:57'),
(49, 7, NULL, 16, 'comment', '2025-05-28 15:32:59', '2025-05-28 15:32:59'),
(50, 7, NULL, 71, 'reply', '2025-05-28 17:26:32', '2025-05-28 17:26:32'),
(51, 7, NULL, 70, 'reply', '2025-05-28 17:26:34', '2025-05-28 17:26:34'),
(52, 7, NULL, 75, 'reply', '2025-05-28 17:55:30', '2025-05-28 17:55:30'),
(53, 7, NULL, 74, 'reply', '2025-05-28 17:55:32', '2025-05-28 17:55:32'),
(54, 7, NULL, 73, 'reply', '2025-05-28 17:55:34', '2025-05-28 17:55:34'),
(55, 7, NULL, 72, 'reply', '2025-05-28 17:55:35', '2025-05-28 17:55:35'),
(56, 7, NULL, 69, 'reply', '2025-05-28 17:55:37', '2025-05-28 17:55:37'),
(57, 7, NULL, 68, 'reply', '2025-05-28 17:55:38', '2025-05-28 17:55:38'),
(58, 7, NULL, 64, 'reply', '2025-05-28 17:55:40', '2025-05-28 17:55:40'),
(59, 7, NULL, 63, 'reply', '2025-05-28 17:55:41', '2025-05-28 17:55:41'),
(60, 7, NULL, 62, 'reply', '2025-05-28 17:55:43', '2025-05-28 17:55:43'),
(61, 7, NULL, 61, 'reply', '2025-05-28 17:55:45', '2025-05-28 17:55:45'),
(62, 7, NULL, 60, 'reply', '2025-05-28 17:55:46', '2025-05-28 17:55:46'),
(63, 7, NULL, 59, 'reply', '2025-05-28 17:55:49', '2025-05-28 17:55:49'),
(64, 7, NULL, 58, 'reply', '2025-05-28 17:55:50', '2025-05-28 17:55:50'),
(65, 7, NULL, 57, 'reply', '2025-05-28 17:55:52', '2025-05-28 17:55:52'),
(66, 7, NULL, 18, 'reply', '2025-05-28 17:55:53', '2025-05-28 17:55:53'),
(67, 7, NULL, 17, 'reply', '2025-05-28 17:55:55', '2025-05-28 17:55:55'),
(69, 11, NULL, 18, 'comment', '2025-05-29 06:47:46', '2025-05-29 06:47:46'),
(72, 11, NULL, 12, 'reply', '2025-05-29 06:48:02', '2025-05-29 06:48:02'),
(73, 11, 62, 0, 'post', '2025-05-29 07:01:26', '2025-05-29 07:01:26'),
(76, 11, NULL, 111, 'reply', '2025-05-29 07:02:24', '2025-05-29 07:02:24'),
(80, 11, NULL, 35, 'comment', '2025-05-29 07:48:00', '2025-05-29 07:48:00'),
(84, 11, NULL, 11, 'reply', '2025-05-29 08:10:29', '2025-05-29 08:10:29'),
(90, 11, NULL, 112, 'reply', '2025-05-29 08:21:51', '2025-05-29 08:21:51'),
(97, 11, NULL, 116, 'reply', '2025-05-29 08:29:11', '2025-05-29 08:29:11'),
(98, 11, NULL, 115, 'reply', '2025-05-29 08:30:07', '2025-05-29 08:30:07'),
(99, 11, NULL, 119, 'reply', '2025-05-29 08:30:08', '2025-05-29 08:30:08'),
(100, 11, NULL, 124, 'reply', '2025-05-29 09:18:35', '2025-05-29 09:18:35'),
(101, 11, NULL, 125, 'reply', '2025-05-29 09:18:39', '2025-05-29 09:18:39'),
(102, 11, NULL, 128, 'reply', '2025-05-29 09:18:40', '2025-05-29 09:18:40'),
(103, 11, NULL, 130, 'reply', '2025-05-29 09:18:41', '2025-05-29 09:18:41'),
(104, 11, NULL, 129, 'reply', '2025-05-29 09:18:42', '2025-05-29 09:18:42'),
(105, 11, 10, 0, 'post', '2025-05-29 09:19:19', '2025-05-29 09:19:19'),
(107, 11, NULL, 39, 'comment', '2025-05-29 09:20:32', '2025-05-29 09:20:32'),
(108, 11, NULL, 139, 'reply', '2025-05-29 09:22:29', '2025-05-29 09:22:29'),
(109, 11, NULL, 138, 'reply', '2025-05-29 09:22:30', '2025-05-29 09:22:30'),
(110, 11, NULL, 137, 'reply', '2025-05-29 09:22:31', '2025-05-29 09:22:31'),
(111, 11, NULL, 141, 'reply', '2025-05-29 09:23:47', '2025-05-29 09:23:47'),
(112, 11, NULL, 140, 'reply', '2025-05-29 09:23:49', '2025-05-29 09:23:49'),
(113, 11, NULL, 145, 'reply', '2025-05-29 09:24:25', '2025-05-29 09:24:25'),
(114, 11, NULL, 144, 'reply', '2025-05-29 09:24:26', '2025-05-29 09:24:26'),
(115, 11, NULL, 143, 'reply', '2025-05-29 09:24:28', '2025-05-29 09:24:28'),
(116, 11, 53, 0, 'post', '2025-05-29 12:48:34', '2025-05-29 12:48:34'),
(117, 11, 52, 0, 'post', '2025-05-29 12:48:35', '2025-05-29 12:48:35'),
(121, 7, 106, 0, 'post', '2025-05-29 12:54:03', '2025-05-29 12:54:03');

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
(98, 3, 8, '2025-05-24 07:10:24', '2025-05-24 07:10:24'),
(103, 2, 11, '2025-05-29 10:11:43', '2025-05-29 10:11:43'),
(112, 6, 11, '2025-05-29 10:59:30', '2025-05-29 10:59:30'),
(118, 8, 11, '2025-05-29 12:48:08', '2025-05-29 12:48:08'),
(119, 11, 7, '2025-05-29 12:53:38', '2025-05-29 12:53:38');

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
(17, 11, 2, 104, 'like', '@mahesh_0909 liked your post.', 1, '2025-05-25 07:00:02', '2025-05-29 06:39:23'),
(20, 9, 2, 54, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 08:58:27', '2025-05-25 08:58:27'),
(47, 7, 2, 10, 'like', '@mahesh_0909 liked your comment.', 1, '2025-05-25 15:55:12', '2025-05-28 10:38:40'),
(48, 7, 2, 50, 'like', '@mahesh_0909 liked your post.', 1, '2025-05-25 17:53:39', '2025-05-28 10:38:40'),
(49, 4, 2, 31, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 21:06:13', '2025-05-25 21:06:13'),
(50, 9, 2, 55, 'like', '@mahesh_0909 liked your post.', 0, '2025-05-25 21:17:19', '2025-05-25 21:17:19'),
(51, 7, 2, 48, 'like', '@mahesh_0909 liked your post.', 1, '2025-05-25 21:17:37', '2025-05-28 10:38:40'),
(59, 2, 7, 26, 'like', '@mr_ravi0909 liked your post.', 1, '2025-05-28 11:20:57', '2025-05-29 12:52:33'),
(72, 2, 7, 45, 'like', '@mr_ravi0909 liked your reply.', 1, '2025-05-28 12:23:16', '2025-05-29 12:52:33'),
(81, 2, 11, 12, 'like', '@ravindra0000 liked your reply.', 1, '2025-05-29 06:48:02', '2025-05-29 12:52:33'),
(82, 2, 11, 62, 'like', '@ravindra0000 liked your post.', 1, '2025-05-29 07:01:26', '2025-05-29 12:52:33'),
(86, 2, 11, 11, 'like', '@ravindra0000 liked your reply.', 1, '2025-05-29 08:10:29', '2025-05-29 12:52:33'),
(87, 2, 11, 10, 'like', '@ravindra0000 liked your post.', 1, '2025-05-29 09:19:19', '2025-05-29 12:52:33'),
(89, 6, 11, NULL, 'follow', '@ravindra0000 Started to following you.', 1, '2025-05-29 10:59:30', '2025-05-29 10:59:42'),
(93, 8, 11, 53, 'like', '@ravindra0000 liked your post.', 1, '2025-05-29 12:48:34', '2025-05-29 12:48:41'),
(94, 8, 11, 52, 'like', '@ravindra0000 liked your post.', 1, '2025-05-29 12:48:35', '2025-05-29 12:48:41'),
(97, 11, 7, NULL, 'follow', '@mr_ravi0909 Started to following you.', 0, '2025-05-29 12:53:38', '2025-05-29 12:53:38'),
(98, 2, 7, 106, 'like', '@mr_ravi0909 liked your post.', 1, '2025-05-29 12:54:03', '2025-05-29 12:54:07');

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
(60, 2, '1747806633.jpg', '', '2025-05-21 05:50:33', '2025-05-21 05:50:33'),
(62, 2, '1747807311.png', '', '2025-05-21 06:01:51', '2025-05-21 06:01:51'),
(63, 2, '1747807332.jpg', '', '2025-05-21 06:02:12', '2025-05-21 06:02:12'),
(101, 2, '1747817512.png', '', '2025-05-21 08:51:52', '2025-05-21 08:51:52'),
(103, 11, '1747828838.mp4', '', '2025-05-21 12:00:38', '2025-05-21 12:00:38'),
(104, 11, '1747828847.mp4', '', '2025-05-21 12:00:47', '2025-05-21 12:00:47'),
(105, 11, '', 'new Post', '2025-05-21 12:33:56', '2025-05-21 12:33:56'),
(106, 2, '', 'aSAS', '2025-05-25 19:17:12', '2025-05-25 19:17:12'),
(108, 7, '1748526987.mp4', '', '2025-05-29 13:56:27', '2025-05-29 13:56:27'),
(109, 7, '1748526998.mp4', '', '2025-05-29 13:56:38', '2025-05-29 13:56:38'),
(110, 7, '1748527030.mp4', '', '2025-05-29 13:57:10', '2025-05-29 13:57:10'),
(111, 2, '1748527095.mp4', '', '2025-05-29 13:58:15', '2025-05-29 13:58:15'),
(112, 2, '1748527113.mp4', '', '2025-05-29 13:58:33', '2025-05-29 13:58:33'),
(113, 6, '1748527155.mp4', '', '2025-05-29 13:59:15', '2025-05-29 13:59:15'),
(114, 6, '1748527171.mp4', '', '2025-05-29 13:59:31', '2025-05-29 13:59:31');

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
(34, 2, 50, 'new comment', '2025-05-25 13:10:40', '2025-05-25 13:10:40'),
(35, 2, 62, 'SADAD', '2025-05-25 19:17:26', '2025-05-25 19:17:26'),
(36, 7, 26, 'hello', '2025-05-28 11:21:25', '2025-05-28 11:21:25'),
(37, 7, 63, 'new comment', '2025-05-28 15:32:54', '2025-05-28 15:32:54'),
(38, 11, 62, 'new add comment', '2025-05-29 07:35:02', '2025-05-29 07:35:02'),
(39, 11, 10, 'post comment', '2025-05-29 09:19:40', '2025-05-29 09:19:40'),
(40, 11, 53, 'hello everyOne', '2025-05-29 12:49:39', '2025-05-29 12:49:39'),
(41, 7, 106, 'hay', '2025-05-29 12:54:15', '2025-05-29 12:54:15'),
(42, 7, 106, 'hay 2', '2025-05-29 13:12:00', '2025-05-29 13:12:00'),
(43, 7, 106, 'hay 3', '2025-05-29 13:15:12', '2025-05-29 13:15:12'),
(44, 7, 106, 'hay  i am  rajesh', '2025-05-29 13:18:02', '2025-05-29 13:18:02'),
(45, 7, 106, 'new comment', '2025-05-29 13:36:53', '2025-05-29 13:36:53'),
(46, 7, 106, 'hello', '2025-05-29 13:39:06', '2025-05-29 13:39:06'),
(47, 7, 106, 'new Data', '2025-05-29 13:41:15', '2025-05-29 13:41:15'),
(48, 7, 106, 'hay 98098', '2025-05-29 13:43:34', '2025-05-29 13:43:34'),
(49, 7, 106, 'hay 98098', '2025-05-29 13:43:34', '2025-05-29 13:43:34'),
(50, 7, 106, 'hay 98098', '2025-05-29 13:43:34', '2025-05-29 13:43:34'),
(51, 7, 106, 'hay 00000', '2025-05-29 13:44:00', '2025-05-29 13:44:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `present_reply_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `twitter_post_comments_reply`
--

INSERT INTO `twitter_post_comments_reply` (`id`, `user_id`, `post_id`, `comment_id`, `comment_reply`, `created_at`, `present_reply_id`) VALUES
(11, 2, 62, 35, 'helo', '2025-05-25 19:48:41', NULL),
(12, 2, 62, 18, 'hy', '2025-05-25 19:48:47', NULL),
(13, 2, 55, 32, 'hello', '2025-05-25 20:55:22', NULL),
(14, 2, 55, 31, 'helo', '2025-05-25 20:55:31', NULL),
(17, 2, 63, 17, 'hello', '2025-05-25 21:42:24', NULL),
(19, 2, 63, 16, 'hello', '2025-05-25 21:43:50', NULL),
(23, 2, 55, 32, 'ass', '2025-05-27 19:24:20', NULL),
(24, 2, 55, 32, 'sASQS', '2025-05-27 19:24:28', NULL),
(25, 2, 55, 24, 'ASAS', '2025-05-27 19:24:44', NULL),
(26, 2, 55, 24, 'dfdfdf', '2025-05-27 19:24:56', NULL),
(27, 2, 55, 24, 'sdsdd', '2025-05-27 19:25:06', NULL),
(28, 2, 55, 24, 'dsff', '2025-05-27 19:25:26', NULL),
(29, 2, 55, 24, 'rajesh', '2025-05-27 19:25:43', NULL),
(30, 2, 55, 23, 'new rahesg', '2025-05-27 19:26:40', NULL),
(31, 2, 55, 24, 'new comment', '2025-05-27 19:27:40', NULL),
(32, 7, 48, 9, 'new', '2025-05-28 10:39:04', NULL),
(33, 7, 48, 9, 'new 2', '2025-05-28 10:39:13', NULL),
(34, 7, 48, 9, 'new 3', '2025-05-28 10:39:21', NULL),
(35, 7, 48, 9, 'new 4', '2025-05-28 10:39:28', NULL),
(36, 7, 48, 9, 'new 5', '2025-05-28 10:39:35', NULL),
(37, 7, 48, 8, 'hello1', '2025-05-28 10:39:48', NULL),
(38, 7, 48, 8, 'hello 2', '2025-05-28 10:39:55', NULL),
(39, 7, 48, 8, 'hello 3', '2025-05-28 10:40:01', NULL),
(40, 7, 48, 8, 'hello 4', '2025-05-28 10:40:09', NULL),
(41, 7, 48, 7, 'noon1', '2025-05-28 10:40:17', NULL),
(42, 7, 48, 7, 'noon2', '2025-05-28 10:40:25', NULL),
(45, 2, 48, 9, 'this is my reply', '2025-05-28 10:42:28', NULL),
(46, 7, 48, 9, 'new data', '2025-05-28 11:01:15', NULL),
(52, 7, 48, 9, 'new comment', '2025-05-28 11:53:13', NULL),
(55, 7, 48, 9, 'new reply', '2025-05-28 13:23:41', NULL),
(56, 7, 48, 9, 'i am rajesh', '2025-05-28 13:44:58', NULL),
(57, 7, 63, 17, 'new reply', '2025-05-28 15:33:31', NULL),
(58, 7, 63, 17, 'new reply', '2025-05-28 15:33:42', NULL),
(59, 7, 63, 17, 'new reply 3', '2025-05-28 15:34:03', NULL),
(60, 7, 63, 17, 'new data', '2025-05-28 15:37:09', NULL),
(61, 7, 63, 17, 'again new comment', '2025-05-28 15:40:43', NULL),
(62, 7, 63, 17, 'new', '2025-05-28 15:41:23', NULL),
(63, 7, 63, 17, 'new again', '2025-05-28 15:41:30', NULL),
(64, 7, 63, 17, 'comment  reply 10', '2025-05-28 15:41:43', NULL),
(68, 7, 63, 17, 'hello 1', '2025-05-28 17:02:11', 64),
(69, 7, 63, 17, 'hello 12', '2025-05-28 17:02:42', 64),
(70, 7, 63, 17, 'new comment', '2025-05-28 17:09:58', NULL),
(71, 7, 63, 17, 'reply', '2025-05-28 17:23:59', 64),
(72, 7, 63, 17, 'reply 1', '2025-05-28 17:26:19', 71),
(73, 7, 63, 17, 'reply 2', '2025-05-28 17:26:29', 71),
(74, 7, 63, 17, 'reply 1', '2025-05-28 17:26:41', 70),
(75, 7, 63, 17, 'new reply', '2025-05-28 17:27:05', 74),
(76, 7, 63, 17, 'reply 1', '2025-05-28 17:56:25', 17),
(77, 7, 63, 17, 'reply 2', '2025-05-28 17:56:31', 17),
(78, 7, 63, 17, 'reply 3', '2025-05-28 17:56:37', 17),
(82, 7, 63, 17, 'reply 1', '2025-05-28 17:56:58', 57),
(83, 7, 63, 17, 'reply 2', '2025-05-28 17:57:04', 57),
(84, 7, 63, 17, 'reply 1', '2025-05-28 17:57:10', 58),
(85, 7, 63, 17, 'reply 1', '2025-05-28 17:57:14', 59),
(86, 7, 63, 17, 'reply 1', '2025-05-28 17:57:19', 60),
(87, 7, 63, 17, 'reply 1', '2025-05-28 17:57:24', 61),
(88, 7, 63, 17, 'reply 2', '2025-05-28 17:57:33', 58),
(89, 7, 63, 17, 'reply 2', '2025-05-28 17:57:36', 59),
(90, 7, 63, 17, 'reply 2', '2025-05-28 17:57:41', 62),
(91, 7, 63, 17, 'reply 2', '2025-05-28 17:57:45', 63),
(92, 7, 63, 17, 'reply 1', '2025-05-28 17:57:49', 63),
(93, 7, 63, 17, 'reply 1', '2025-05-28 17:57:55', 62),
(94, 7, 63, 17, 'reply 22', '2025-05-28 17:58:00', 61),
(95, 7, 63, 17, 'hello', '2025-05-28 17:58:06', 68),
(96, 7, 63, 17, 'hay', '2025-05-28 17:58:11', 69),
(97, 7, 63, 17, 'reply 4', '2025-05-28 17:58:24', 74),
(98, 7, 63, 17, 'reply52', '2025-05-28 17:58:29', 74),
(99, 7, 63, 17, 'reply 21212', '2025-05-28 17:58:37', 75),
(102, 11, 62, 18, 'new comment', '2025-05-29 06:47:53', NULL),
(103, 11, 62, 18, 'comment 1', '2025-05-29 06:48:21', 102),
(104, 11, 62, 18, 'comment 2', '2025-05-29 06:48:26', 102),
(105, 11, 62, 18, 'new 1', '2025-05-29 06:48:34', 12),
(106, 11, 62, 18, 'new 2', '2025-05-29 06:48:40', 12),
(107, 11, 62, 18, 'new 3', '2025-05-29 06:48:47', 12),
(108, 11, 62, 18, 'new 4', '2025-05-29 06:48:53', 12),
(109, 11, 62, 35, 'new', '2025-05-29 07:01:44', 11),
(110, 11, 62, 35, 'comment 2', '2025-05-29 07:01:53', 35),
(111, 11, 62, 35, 'comment 3', '2025-05-29 07:02:10', NULL),
(112, 11, 62, 35, 'comment 3', '2025-05-29 07:02:17', NULL),
(113, 11, 62, 38, 'hello', '2025-05-29 07:35:12', NULL),
(114, 11, 62, 35, 'new', '2025-05-29 07:37:18', 11),
(115, 11, 62, 35, 'hay', '2025-05-29 07:38:11', 112),
(116, 11, 62, 35, 'hay2', '2025-05-29 08:13:02', 112),
(119, 11, 62, 35, 'hay 3', '2025-05-29 08:24:12', 112),
(120, 11, 62, 35, 'hay', '2025-05-29 08:29:20', 119),
(121, 11, 62, 35, 'hay bro', '2025-05-29 08:29:30', 116),
(122, 11, 62, 35, 'hay 2', '2025-05-29 08:29:35', 116),
(123, 11, 62, 35, 'hay 3', '2025-05-29 08:29:44', 116),
(124, 11, 62, 35, 'hello', '2025-05-29 08:29:52', 115),
(125, 11, 62, 35, 'hay', '2025-05-29 08:30:03', 115),
(126, 11, 62, 35, 'hay 4', '2025-05-29 08:30:22', 112),
(127, 11, 62, 35, 'hay 3 1', '2025-05-29 09:12:30', 119),
(128, 11, 62, 35, 'comment 1', '2025-05-29 09:17:15', 115),
(129, 11, 62, 35, 'comment 2', '2025-05-29 09:17:23', 115),
(130, 11, 62, 35, 'comment 3', '2025-05-29 09:17:31', 115),
(131, 11, 62, 35, 'hello 1', '2025-05-29 09:18:00', 124),
(132, 11, 62, 35, 'hello 2', '2025-05-29 09:18:06', 124),
(133, 11, 62, 35, 'hello 3', '2025-05-29 09:18:12', 124),
(134, 11, 62, 35, 'hay1', '2025-05-29 09:18:20', 125),
(135, 11, 62, 35, 'comment 1', '2025-05-29 09:18:28', 128),
(136, 11, 62, 35, 'hello', '2025-05-29 09:18:48', 129),
(137, 11, 10, 39, 'post comment  reply', '2025-05-29 09:20:00', NULL),
(138, 11, 10, 39, 'post coment reply 2', '2025-05-29 09:20:18', NULL),
(139, 11, 10, 39, 'post comment reply 3', '2025-05-29 09:20:45', NULL),
(140, 11, 10, 39, 'post comment reply/reply', '2025-05-29 09:22:54', 138),
(141, 11, 10, 39, 'post comment reply/reply 1', '2025-05-29 09:23:12', 138),
(142, 11, 10, 39, 'dfgfgdsg', '2025-05-29 09:23:52', 141),
(143, 11, 10, 39, 'fhfgjg', '2025-05-29 09:23:55', 141),
(144, 11, 10, 39, 'hgjfghjhj', '2025-05-29 09:23:58', 141),
(145, 11, 10, 39, 'hjggj', '2025-05-29 09:24:01', 141),
(146, 11, 10, 39, 'gjghjhk', '2025-05-29 09:24:04', 140),
(147, 11, 10, 39, 'jhkuytyut', '2025-05-29 09:24:07', 140),
(148, 11, 10, 39, 'yjhgnb v', '2025-05-29 09:24:11', 140),
(149, 11, 10, 39, 'jfghjhj', '2025-05-29 09:24:15', 138);

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
(7, 'mr_ravi0909', 'Ravi Mali', 'ravimali22@gmail.com', 'ravi0000', '2003-04-02', 'I am Ravi mali', '2025-05-17', '1748433175.jpg', '1747471584.jpg', '2025-05-17 08:41:27', '2025-05-28 11:52:55'),
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
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `fk_present_reply` (`present_reply_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `twitter_followers`
--
ALTER TABLE `twitter_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `twitter_notifications`
--
ALTER TABLE `twitter_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `twitter_post_comments`
--
ALTER TABLE `twitter_post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `twitter_post_comments_reply`
--
ALTER TABLE `twitter_post_comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

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
  ADD CONSTRAINT `fk_present_reply` FOREIGN KEY (`present_reply_id`) REFERENCES `twitter_post_comments_reply` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `twitter_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `twitter_post_comments_reply_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `twitter_post_comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
