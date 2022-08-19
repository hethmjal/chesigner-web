-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chesigner`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_designers`
--

CREATE TABLE `about_designers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arbody` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enbody` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ardescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `endescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Finished','Stopped','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminstatus` enum('Active','Not Active','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expert` int(11) DEFAULT NULL,
  `professional` int(11) DEFAULT NULL,
  `ordinary` int(11) DEFAULT NULL,
  `remainderofexpert` int(11) DEFAULT NULL,
  `remainderofprofessional` int(11) DEFAULT NULL,
  `remainderofordinary` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `challenge_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` double DEFAULT NULL,
  `expir_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `user_id`, `title`, `status`, `adminstatus`, `expert`, `professional`, `ordinary`, `remainderofexpert`, `remainderofprofessional`, `remainderofordinary`, `description`, `challenge_type`, `design_type`, `image`, `audio_file`, `video`, `deadline`, `expir_date`, `created_at`, `updated_at`) VALUES
(25, 1, 'challenge 1', 'Finished', NULL, 0, 1, 0, 0, 1, 0, '<p>challenge 1</p>', 'Public', 'Graphic design', 'images/1648719399_تحميل-خلفيات-سطح-المكتب-6.jpg', 'audio/1648722493_sound.wav', 'videos/1648719337_videoplayback.mp4', 2, '2022-03-31 08:47:02', '2022-03-02 14:17:48', '2022-03-31 08:48:02'),
(29, 1, '123123', 'Finished', NULL, 0, 1, 0, 0, 1, 0, '<p>2</p>', 'Public', 'Graphic design', NULL, NULL, NULL, 2, '2022-03-31 08:47:05', '2022-03-31 08:42:42', '2022-03-31 08:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `challenges_orders`
--

CREATE TABLE `challenges_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_data`
--

CREATE TABLE `challenge_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `Formal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unformal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Symbolic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Geometreic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Free` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Classic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Modern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Luxury` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Economy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_data`
--

INSERT INTO `challenge_data` (`id`, `challenge_id`, `Formal`, `Unformal`, `Symbolic`, `Text`, `Geometreic`, `Free`, `Classic`, `Modern`, `Luxury`, `Economy`, `created_at`, `updated_at`) VALUES
(4, 4, '75', '25', '70', '30', '80', '20', '10', '90', '20', '80', '2022-03-30 11:11:03', '2022-03-30 11:11:03'),
(5, 5, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:15:51', '2022-03-30 11:15:51'),
(6, 6, '5', '95', '75', '25', '85', '15', '80', '20', '5', '95', '2022-03-30 11:31:00', '2022-03-30 11:31:00'),
(7, 7, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:33:17', '2022-03-30 11:33:17'),
(8, 8, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:34:24', '2022-03-30 11:34:24'),
(9, 9, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:35:06', '2022-03-30 11:35:06'),
(10, 10, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:36:53', '2022-03-30 11:36:53'),
(11, 11, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:38:25', '2022-03-30 11:38:25'),
(12, 12, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:40:43', '2022-03-30 11:40:43'),
(13, 13, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:41:18', '2022-03-30 11:41:18'),
(14, 14, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:42:43', '2022-03-30 11:42:43'),
(15, 15, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:43:28', '2022-03-30 11:43:28'),
(16, 16, '15', '85', '50', '50', '50', '50', '50', '50', '15', '85', '2022-03-30 11:56:53', '2022-03-30 11:56:53'),
(17, 17, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:57:28', '2022-03-30 11:57:28'),
(18, 18, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 11:59:42', '2022-03-30 11:59:42'),
(19, 19, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 12:00:10', '2022-03-30 12:00:10'),
(20, 20, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-30 12:04:04', '2022-03-30 12:04:04'),
(21, 21, '25', '75', '25', '75', '90', '10', '75', '25', '5', '95', '2022-03-30 12:04:57', '2022-03-30 12:04:57'),
(25, 25, '20', '80', '10', '90', '80', '20', '70', '30', '65', '35', '2022-03-30 13:17:48', '2022-03-31 07:28:15'),
(26, 26, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-31 06:37:39', '2022-03-31 06:37:39'),
(27, 27, '35', '65', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-31 06:39:05', '2022-03-31 06:39:05'),
(28, 28, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-31 06:39:48', '2022-03-31 06:39:48'),
(29, 29, '50', '50', '50', '50', '50', '50', '50', '50', '50', '50', '2022-03-31 08:42:42', '2022-03-31 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_files`
--

CREATE TABLE `challenge_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_files`
--

INSERT INTO `challenge_files` (`id`, `user_id`, `file`, `created_at`, `updated_at`) VALUES
(42, 1, 'audio/1648721615_sound.wav', '2022-03-31 07:13:35', '2022-03-31 07:13:35'),
(43, 1, 'audio/1648722294_sound.wav', '2022-03-31 07:24:54', '2022-03-31 07:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_works`
--

CREATE TABLE `challenge_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_work` enum('yes','no','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenge_works`
--

INSERT INTO `challenge_works` (`id`, `challenge_id`, `designer_id`, `file`, `image`, `submit_work`, `rank`, `note`, `created_at`, `updated_at`) VALUES
(28, 25, 3, NULL, NULL, 'no', NULL, NULL, '2022-03-31 07:51:02', '2022-03-31 07:51:02'),
(29, 29, 3, 'files/1648727085_2013-07-Flowers-Wallpaper-Background.jpg', 'images/1648727085_7-desktop-wallpapers-hd-4k-صور-خلفيات-كمبيوتر-سطح-المكتب-scaled.jpg', 'yes', NULL, 'جيد', '2022-03-31 08:43:05', '2022-03-31 08:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `challenge_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'good challenge', '2021-12-25 17:27:09', '2021-12-25 17:27:09'),
(2, 3, 5, 'good', '2021-12-26 10:28:53', '2021-12-26 10:28:53'),
(3, 1, 4, 'ok', '2021-12-26 10:43:10', '2021-12-26 10:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('peer','group') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_message_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_id`, `label`, `type`, `created_at`, `updated_at`, `last_message_id`) VALUES
(1, 1, NULL, 'peer', '2021-12-03 11:25:55', '2021-12-13 07:37:57', 85),
(2, 1, NULL, 'peer', '2021-12-03 13:58:31', '2022-03-23 07:23:22', 96),
(3, 4, NULL, 'peer', '2021-12-23 10:44:36', '2022-01-27 06:25:05', 91),
(4, 4, NULL, 'peer', '2021-12-23 10:47:03', '2022-01-27 06:24:48', 90),
(7, 7, NULL, 'peer', '2022-01-27 06:39:02', '2022-01-27 06:40:21', 94);

-- --------------------------------------------------------

--
-- Table structure for table `designer_packages`
--

CREATE TABLE `designer_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `packages_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('active','unactive','','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designer_packages`
--

INSERT INTO `designer_packages` (`id`, `designer_id`, `packages_id`, `type`) VALUES
(1, 3, 1, 'active'),
(2, 3, 2, 'active'),
(3, 3, 3, 'active'),
(5, 2, 3, 'active'),
(6, 2, 2, 'active'),
(7, 8, 1, 'active'),
(8, 8, 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `specialization`, `university`, `degree`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 3, 'animation', 'animatio uni', 'Bachelors degree', '2021-12-07', '2021-12-31', '2021-12-08 14:04:18', '2021-12-08 14:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `challengeWork_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_order_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `rate` double NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `order_id`, `challengeWork_id`, `sub_order_id`, `user_id`, `designer_id`, `rate`, `body`, `created_at`, `updated_at`) VALUES
(11, 1, NULL, NULL, 1, 2, 5, 'excellent', '2021-12-24 05:54:39', '2021-12-24 05:54:39'),
(14, 6, NULL, NULL, 1, 3, 4, 'thanks', '2021-12-26 09:29:17', '2021-12-26 09:29:17'),
(15, 5, NULL, NULL, 1, 3, 3, 'goood', '2021-12-26 09:29:39', '2021-12-26 09:29:39'),
(16, NULL, NULL, 2, 1, 3, 4, 'good', '2021-12-26 09:56:24', '2021-12-26 09:56:24'),
(17, NULL, 6, NULL, 1, 2, 4, 'thank you', '2021-12-26 09:59:06', '2021-12-26 09:59:06'),
(18, NULL, 5, NULL, 1, 3, 5, 'good work', '2021-12-26 10:54:05', '2021-12-26 10:54:05'),
(19, NULL, NULL, 11, 1, 2, 5, 'yjl8iul', '2022-03-17 08:37:50', '2022-03-17 08:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `specialization`, `company`, `from`, `to`, `time`, `created_at`, `updated_at`) VALUES
(1, 3, 'animation', 'company', '2021-12-06', '2022-01-08', 'Part Time', '2021-12-08 14:04:54', '2021-12-08 14:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `challenge_id`, `created_at`, `updated_at`) VALUES
(3, 1, 6, '2021-12-25 18:07:35', '2021-12-25 18:07:35'),
(6, 3, 4, '2021-12-25 18:10:37', '2021-12-25 18:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_designers`
--

CREATE TABLE `favorite_designers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','attachment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `body`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 2, 1, 'السلام عليكم', 'text', '2021-12-03 17:32:11', '2021-12-03 17:32:11', NULL),
(59, 2, 3, 'وعليكم السلام', 'text', '2021-12-03 17:32:26', '2021-12-03 17:32:26', NULL),
(60, 2, 3, 'تفضل', 'text', '2021-12-03 17:32:32', '2021-12-03 17:32:32', NULL),
(61, 1, 1, 'مرحبا', 'text', '2021-12-03 17:32:55', '2021-12-03 17:32:55', NULL),
(62, 1, 1, '???', 'text', '2021-12-03 17:38:04', '2021-12-03 17:38:04', NULL),
(63, 1, 1, '??', 'text', '2021-12-03 17:38:30', '2021-12-03 17:38:30', NULL),
(64, 1, 1, '??????', 'text', '2021-12-03 17:38:54', '2021-12-03 17:38:54', NULL),
(65, 1, 1, '???', 'text', '2021-12-03 17:40:02', '2021-12-03 17:40:02', NULL),
(66, 1, 1, '///', 'text', '2021-12-03 17:40:13', '2021-12-03 17:40:13', NULL),
(67, 1, 1, '???', 'text', '2021-12-03 17:40:51', '2021-12-03 17:40:51', NULL),
(68, 1, 1, '???', 'text', '2021-12-03 17:42:01', '2021-12-03 17:42:01', NULL),
(69, 2, 1, 'احتاج الى تعديل', 'text', '2021-12-03 17:46:57', '2021-12-03 17:46:57', NULL),
(70, 2, 3, 'تم', 'text', '2021-12-03 18:01:01', '2021-12-03 18:01:01', NULL),
(71, 2, 3, '؟', 'text', '2021-12-03 20:54:00', '2021-12-03 20:54:00', NULL),
(72, 1, 1, '??', 'text', '2021-12-03 20:58:12', '2021-12-03 20:58:12', NULL),
(73, 2, 1, 'مرحبا', 'text', '2021-12-05 09:49:39', '2021-12-05 09:49:39', NULL),
(74, 2, 1, 'السلام عليكم', 'text', '2021-12-05 09:53:02', '2021-12-05 09:53:02', NULL),
(75, 2, 3, 'وعليكم السلام', 'text', '2021-12-05 09:53:12', '2021-12-05 09:53:12', NULL),
(76, 2, 1, 'السلام عليكم', 'text', '2021-12-05 09:54:06', '2021-12-05 09:54:06', NULL),
(77, 2, 3, 'وعليكم السلام', 'text', '2021-12-05 09:54:16', '2021-12-05 09:54:16', NULL),
(78, 2, 1, '//', 'text', '2021-12-07 14:03:58', '2021-12-07 14:03:58', NULL),
(79, 2, 1, 'السلام عليكم', 'text', '2021-12-13 07:22:37', '2021-12-13 07:22:37', NULL),
(80, 2, 1, 'dadas', 'text', '2021-12-13 07:30:50', '2021-12-13 07:30:50', NULL),
(81, 2, 3, 'fwf', 'text', '2021-12-13 07:30:59', '2021-12-13 07:30:59', NULL),
(82, 2, 1, 'aads', 'text', '2021-12-13 07:35:03', '2021-12-13 07:35:03', NULL),
(83, 2, 3, 'ok', 'text', '2021-12-13 07:35:14', '2021-12-13 07:35:14', NULL),
(84, 1, 2, 'ok', 'text', '2021-12-13 07:37:34', '2021-12-13 07:37:34', NULL),
(85, 1, 1, 'ok', 'text', '2021-12-13 07:37:57', '2021-12-13 07:37:57', NULL),
(86, 2, 1, 'hallo', 'text', '2021-12-17 17:21:36', '2021-12-17 17:21:36', NULL),
(87, 2, 3, 'hi', 'text', '2021-12-17 17:21:51', '2021-12-17 17:21:51', NULL),
(88, 2, 1, 'o', 'text', '2021-12-25 18:19:19', '2021-12-25 18:19:19', NULL),
(89, 2, 3, 'i', 'text', '2021-12-25 18:19:42', '2021-12-25 18:19:42', NULL),
(90, 4, 4, 'rgfg', 'text', '2022-01-27 06:24:48', '2022-01-27 06:24:48', NULL),
(91, 3, 4, 'fdgreg', 'text', '2022-01-27 06:25:05', '2022-01-27 06:25:05', NULL),
(92, 7, 7, 'hallo', 'text', '2022-01-27 06:39:49', '2022-01-27 06:39:49', NULL),
(93, 7, 8, 'wellcome', 'text', '2022-01-27 06:40:09', '2022-01-27 06:40:09', NULL),
(94, 7, 7, 'i need design', 'text', '2022-01-27 06:40:21', '2022-01-27 06:40:21', NULL),
(95, 2, 1, 'asd', 'text', '2022-03-23 07:23:05', '2022-03-23 07:23:05', NULL),
(96, 2, 3, 'dsa', 'text', '2022-03-23 07:23:22', '2022-03-23 07:23:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_10_31_075905_create_sessions_table', 1),
(10, '2021_11_13_152056_create_about_designers_table', 1),
(11, '2021_11_13_164957_create_education_table', 1),
(12, '2021_11_13_180120_create_experiences_table', 1),
(13, '2021_11_13_184103_create_skills_table', 1),
(14, '2021_11_14_080936_create_programers_table', 1),
(15, '2021_11_14_125821_create_working_hours_table', 1),
(16, '2021_11_14_132732_create_portfolios_table', 1),
(17, '2021_11_15_102625_added_type_to_user_', 1),
(18, '2021_11_17_174109_create_orders_table', 1),
(19, '2021_11_21_141233_create_order__works_table', 1),
(20, '2021_11_21_191515_create_notifications_table', 1),
(21, '2021_12_03_115119_create_conversations_table', 1),
(22, '2021_12_03_115249_create_participants_table', 1),
(23, '2021_12_03_115340_create_messages_table', 1),
(24, '2021_12_03_115431_create_recipients_table', 1),
(25, '2021_12_03_115607_add_last_message_id_to_conversations_table', 1),
(26, '2021_12_09_111647_create_packages_table', 2),
(27, '2021_12_09_111803_create_subscriptions_table', 2),
(28, '2021_12_09_112034_create_designer_package_table', 2),
(29, '2021_12_11_084152_create_sub_works_table', 3),
(30, '2021_12_11_163604_create_sub_orders_table', 4),
(31, '2021_12_18_123958_create_challenges_table', 5),
(32, '2021_12_18_124150_create_challenge_works_table', 5),
(33, '2021_12_23_084754_create_evaluations_table', 6),
(34, '2021_12_23_132727_create_comments_table', 7),
(35, '2021_12_23_133345_create_reply_comments_table', 7),
(38, '2021_12_25_090904_create_likes_table', 8),
(39, '2021_12_25_193128_create_favorites_table', 9),
(40, '2021_12_31_145415_create_reports_table', 10),
(41, '2022_01_02_120919_create_slide_shows_table', 11),
(42, '2022_01_02_132959_create_terms_and_policies_table', 12),
(43, '2022_01_02_133416_create_social_media_table', 12),
(44, '2022_01_11_141210_create_about_us_table', 13),
(45, '2022_01_11_145442_create_blogs_table', 14),
(46, '2022_03_15_125457_create_challenge_data_table', 15),
(47, '2022_03_17_084350_create_challenges_orders_table', 16),
(49, '2022_03_17_103916_create_packages_orders_table', 17),
(50, '2022_03_23_094927_create_favorite_designers_table', 18),
(51, '2022_03_30_131153_create_challenge_files_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0232aa18-2993-45bf-95b4-3cd7d61956da', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 18:06:28', '2021-12-12 08:40:04', '2021-12-12 18:06:28'),
('036b9ba3-e7c5-40ee-b804-84dd2a8ba01e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', NULL, '2022-03-31 07:51:02', '2022-03-31 07:51:02'),
('0393c332-f16f-4d2d-bb39-7934ed892192', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-20 07:01:30', '2021-12-19 14:10:43', '2021-12-20 07:01:30'),
('040d3e60-e308-43d2-bd33-83d19b51018d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com reject our request to subscribe in package Economy\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\",\"status\":\"canceled\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-03-23 07:04:35', '2022-03-23 07:05:27'),
('0552c9e7-937e-4d2c-bc25-105f310a68fb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-03 13:58:25', '2021-12-03 13:58:15', '2021-12-03 13:58:25'),
('0661110c-8f8c-4b73-92c4-bdc631577895', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new subsrcibe\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-13 07:54:29', '2021-12-13 07:54:18', '2021-12-13 07:54:29'),
('07588576-a9f8-45f8-a703-8c56bef8bdac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Economy\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2022-03-23 07:05:55', '2022-03-23 07:25:27'),
('0858c77a-246d-488f-9f5d-f784ac7dda68', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:05:27', '2022-03-17 07:41:29', '2022-03-23 07:05:27'),
('08784dc7-17b0-47e3-95ee-a80d2d5b0583', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 4, '{\"title\":\"work added\",\"body\":\"Designer bbbB add a work fdgdsf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":7}', NULL, '2021-12-23 10:47:19', '2021-12-23 10:47:19'),
('08ec7464-a37e-4863-96da-e5ee5db7c941', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":27}', NULL, '2022-03-31 07:47:15', '2022-03-31 07:47:15'),
('0c4442f7-7449-4898-bd03-8930cfe69ec3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":30}', '2022-03-23 07:05:27', '2022-03-17 08:10:17', '2022-03-23 07:05:27'),
('0c446570-b19d-4bae-b594-0d0c2117afea', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"29 minutes ago\",\"order_id\":1}', '2021-12-20 07:48:40', '2021-12-20 07:40:05', '2021-12-20 07:48:40'),
('0ebe66fd-15f9-4237-bbe0-fee009703a88', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new subscriber\",\"body\":\"Client asd asd subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/8\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', NULL, '2022-01-27 07:00:17', '2022-01-27 07:00:17'),
('0eecd620-b34a-4835-855d-10558893ee26', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":22}', '2022-03-23 07:05:27', '2021-12-25 17:10:35', '2022-03-23 07:05:27'),
('0f94dc92-169d-4d11-a6f9-29402bfa447e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":29}', '2022-03-23 07:05:27', '2022-03-17 08:10:08', '2022-03-23 07:05:27'),
('10511593-958a-4e8c-bdc7-6783f149e91d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', '2022-03-23 07:05:27', '2021-12-26 10:52:22', '2022-03-23 07:05:27'),
('10ce097d-08d3-4f79-9742-ace8fa923214', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your request to subscribe in package Growth\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/10\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', NULL, '2022-03-23 07:08:42', '2022-03-23 07:08:42'),
('111767f3-1104-4477-8b13-e641ae6f477b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-03 17:51:01', '2021-12-03 17:50:55', '2021-12-03 17:51:01'),
('11d7f733-61dc-46ec-9a3b-4814ad42e5c7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":3}', NULL, '2022-03-17 07:38:31', '2022-03-17 07:38:31'),
('124ffb87-63f3-47ef-a62b-5e4249a97eac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new order\",\"body\":\"Client asd asd invited you to do a design in subscribtion 7\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', NULL, '2022-01-27 06:31:47', '2022-01-27 06:31:47'),
('12b8422c-d31e-483c-9eb0-8bc607561972', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"15 seconds ago\",\"order_id\":6}', '2021-12-12 05:08:56', '2021-12-10 09:48:11', '2021-12-12 05:08:56'),
('12c7c2e0-0be1-4cd7-92cc-81fe3dc3724b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', '2022-03-23 07:05:27', '2021-12-25 14:03:17', '2022-03-23 07:05:27'),
('131fdbee-735d-4da0-b1c2-d9bf9d82d2b0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"2 weeks ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2021-12-26 09:29:18', '2022-03-23 07:25:27'),
('13651ee2-9f85-4d29-b4fb-fa6b18ee6ed7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:05:27', '2022-03-17 07:48:40', '2022-03-23 07:05:27'),
('136bca90-4340-4a24-9e24-64ae3fe60f60', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is rejected\",\"body\":\"Designer hethmjal4@gmail.com reject our request to subscribe in package Economy\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":1}', NULL, '2022-03-23 07:07:58', '2022-03-23 07:07:58'),
('1389a314-0b0f-49e1-9b0b-af2c5f3eaad3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', '2022-03-23 07:05:27', '2021-12-25 14:03:28', '2022-03-23 07:05:27'),
('1428ac29-22d5-4a99-b6be-c778f4cb1e78', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:28', '2021-12-25 08:15:03', '2022-03-23 07:05:28'),
('146374b5-1ef4-4ce0-b2b7-e05b67211940', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-03 13:43:00', '2021-12-03 13:42:50', '2021-12-03 13:43:00'),
('14c86717-f094-4a1a-9b42-aeae2d98b282', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', NULL, '2022-03-17 07:46:38', '2022-03-17 07:46:38'),
('153f6017-476e-4a53-b358-f2b4da379fb7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 09:28:09', '2021-12-12 18:06:28'),
('15cd8357-6ce9-49ca-bc34-57e8ad170606', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":31}', '2022-03-23 07:05:27', '2022-03-17 08:10:48', '2022-03-23 07:05:27'),
('15e5f1f0-fa85-4071-b013-4de64c02f5b6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:05:27', '2022-03-17 07:47:18', '2022-03-23 07:05:27'),
('16379b02-f5bd-49eb-8a18-ba694b55dcc0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:01:30', '2021-12-19 15:22:57', '2021-12-20 07:01:30'),
('16872e63-6159-41ad-8e13-fa3b9fbefbb7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":23}', NULL, '2022-03-30 15:14:40', '2022-03-30 15:14:40'),
('16d6aacf-b704-427f-a6c9-896690d5cce2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"3 weeks ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2021-12-26 09:29:39', '2022-03-23 07:25:27'),
('16ee4e9a-b0b6-4f23-b6ad-859280e89e96', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"user haitham accept your work in order bbbbbbbbbbbbbbbbb\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/12\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:25:27', '2022-03-23 07:23:31', '2022-03-23 07:25:27'),
('18061bc7-a163-49be-bd52-cd12ecdbb17a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":35}', '2022-03-23 07:05:27', '2022-03-17 08:23:29', '2022-03-23 07:05:27'),
('18b0f2a3-4d32-4d9a-87d5-bb94b06a8c8a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:05:27', '2021-12-25 13:54:03', '2022-03-23 07:05:27'),
('19c92f5d-4bd4-4aba-ac1c-e17d76f8488a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"challenge finished\",\"body\":\"challenge  is finished now\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', NULL, '2022-03-31 08:34:04', '2022-03-31 08:34:04'),
('1a8eab2c-87d4-4c40-90e9-29a81d233de2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2021-12-25 13:28:52', '2022-03-23 07:05:27'),
('1b537621-5dd1-43cb-9a3d-667cf2ae37ac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2021-12-12 05:08:42', '2021-12-10 09:47:57', '2021-12-12 05:08:42'),
('1c771c10-f0a3-4da8-8694-cb77e36868fc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:28', '2021-12-25 08:36:56', '2022-03-23 07:05:28'),
('1d219ae8-e62f-47b1-ae7f-202f62a50a39', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-03-17 07:38:56', '2022-03-23 07:05:27'),
('1d70c632-998e-4860-9bee-aa6230fb409f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":22}', '2022-03-23 07:05:27', '2021-12-25 14:03:24', '2022-03-23 07:05:27'),
('1d7a4cb7-77a5-4705-ba7e-81fbf5d005a6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', NULL, '2022-03-30 15:06:33', '2022-03-30 15:06:33'),
('1dcf8482-bef0-4f44-8365-ed96aba3edc9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-31 15:38:20', '2022-03-23 07:05:27'),
('1f4b7862-5592-467a-a22f-3fb7c57b92df', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/1\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', '2022-03-23 07:25:27', '2021-12-26 09:56:24', '2022-03-23 07:25:27'),
('2003632f-0e8b-42f9-a62f-3d259c6e931e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Economy\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:25:27', '2022-03-23 06:58:12', '2022-03-23 07:25:27'),
('206815a8-47e3-48cf-9d2e-0ff52d1b9269', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":22}', NULL, '2022-03-30 15:08:39', '2022-03-30 15:08:39'),
('23934e6d-b8c4-4a02-81b4-a817ed6ec673', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:05:28', '2021-12-25 08:36:48', '2022-03-23 07:05:28'),
('24d8ecc3-f16e-4fe4-858e-c506c5647e74', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', '2022-03-23 07:05:27', '2021-12-26 10:52:25', '2022-03-23 07:05:27'),
('250d9b50-db51-4ca9-963b-9911be06ff84', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-03 10:55:20', '2021-12-03 10:55:12', '2021-12-03 10:55:20'),
('25f3caae-c13b-4389-87cd-8db68e52814d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-20 19:49:52', '2021-12-20 19:20:12', '2021-12-20 19:49:52'),
('2826f90a-7209-4355-a734-f17d6d1532b4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:27', '2021-12-25 09:21:58', '2022-03-23 07:05:27'),
('2b5c732d-fbe0-4e5b-ac6e-c4618355b8bb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2021-12-25 09:51:19', '2022-03-23 07:05:27'),
('2b8215e2-057f-4348-83a2-0419b9b7fb99', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:27', '2021-12-25 13:29:24', '2022-03-23 07:05:27'),
('2c56ed08-8086-4c5b-9d78-286bb856961e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"25 minutes ago\",\"order_id\":1}', '2021-12-20 07:48:40', '2021-12-20 07:35:47', '2021-12-20 07:48:40'),
('2c8956ba-f4d9-4502-912a-cbaa7e201519', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is rejected\",\"body\":\"Designer hethmjal4@gmail.com reject our request to subscribe in package Recurit\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":3}', NULL, '2022-03-23 07:09:45', '2022-03-23 07:09:45'),
('2e983698-10fb-4f33-9d1f-45d3bd552bae', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 2 order title : order\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/2\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-13 13:28:56', '2021-12-13 13:23:14', '2021-12-13 13:28:56'),
('2ff9cbd6-939b-4b2b-8e14-dffb1ede3f75', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2022-01-01 08:05:52', '2022-03-23 07:05:27'),
('30267323-1e17-4382-bf73-54e50a2241a6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2022-03-15 10:33:47', '2022-03-23 07:05:27'),
('3077ae06-a021-4abc-a622-61a42579bac1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:03:03', '2022-03-23 07:05:27'),
('3473f5dc-cc0f-4c40-8491-8f3ec551f00f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":18}', NULL, '2022-03-17 07:57:39', '2022-03-17 07:57:39'),
('36c87ef2-a813-40e2-a51e-8eeb626b7972', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 12\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/12\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', NULL, '2022-03-23 07:26:04', '2022-03-23 07:26:04'),
('379bb756-9971-4cb0-be01-fe7489858bc8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-12 08:27:05', '2021-12-12 08:26:13', '2021-12-12 08:27:05'),
('37a51ba7-552f-41ea-90b8-54721d39a3fe', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Recurit\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:25:27', '2022-03-23 07:06:12', '2022-03-23 07:25:27'),
('3837f0e6-4d80-4250-b4f8-9b7201c08725', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new order\",\"body\":\"Client asd asd invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', NULL, '2022-01-27 06:42:47', '2022-01-27 06:42:47'),
('388a34ae-8445-42ae-88ad-b450a9b2527b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 4, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation fbdf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"14 seconds ago\",\"order_id\":7}', NULL, '2021-12-23 10:44:36', '2021-12-23 10:44:36'),
('38cee157-6165-413a-b981-f80b65d8d12c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-31 15:37:30', '2022-03-23 07:05:27'),
('393d8364-a260-4611-b8f6-1b9a2a30e977', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/1\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:11:20', '2021-12-20 07:10:07', '2021-12-20 07:11:20'),
('3a6f9147-c2cb-4f55-837f-3e5c1da42776', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:27', '2021-12-25 10:06:13', '2022-03-23 07:05:27'),
('3a8c3a12-4747-4aaa-b3f6-7d472b955640', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:05:27', '2021-12-26 10:47:28', '2022-03-23 07:05:27'),
('3affbed1-5f55-4341-b826-1f51d8544983', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:27', '2021-12-25 09:51:04', '2022-03-23 07:05:27'),
('3c605b60-5098-4d6a-b004-8741d53766ba', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Client aaaaaaa invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', NULL, '2021-12-23 10:46:50', '2021-12-23 10:46:50'),
('3c6cc0ce-bcae-43dc-b08e-006d0a5df82c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:28', '2021-12-25 08:37:04', '2022-03-23 07:05:28'),
('3e58d5c8-8f44-4223-8b94-ee507d318f2e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"challenge finished\",\"body\":\"challenge  is finished now\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', NULL, '2022-03-31 08:26:18', '2022-03-31 08:26:18'),
('3eb9f775-5977-46e5-a40e-cf3430a8a4b0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"2 weeks ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2021-12-23 08:02:00', '2022-03-23 07:25:27'),
('3f03f50e-69f8-4a08-a1b3-3781d0e1f3f2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:27', '2021-12-25 09:19:54', '2022-03-23 07:05:27'),
('3f2c1892-43b3-4309-bb1e-2202f2d04049', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmedsent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-03-17 07:02:08', '2022-03-23 07:05:27'),
('3f307ae5-34e8-4df4-99d5-7d2ca1b7f2b6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"challenge finished\",\"body\":\"challenge  is finished now\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', NULL, '2022-03-31 08:34:05', '2022-03-31 08:34:05'),
('3f9fd2a4-f9ca-41de-bb11-0dd1478d1993', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"Your order has been reactivated\",\"body\":\"Your request has been reactivated order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-01-01 08:05:45', '2022-03-23 07:05:27'),
('401e587b-d7c6-4149-a814-4dce75e4eccc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":20}', '2022-03-23 07:05:27', '2021-12-25 14:03:21', '2022-03-23 07:05:27'),
('407c46d5-46a5-4dc2-a6de-94d439092df4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"dd work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add wrok in challengechallenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/1\\/show\",\"status\":\"new order\",\"created_at\":\"14 hours ago\",\"order_id\":2}', '2021-12-20 06:38:51', '2021-12-20 06:05:46', '2021-12-20 06:38:51'),
('40b49561-d723-4936-886d-ab1b676dc861', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 09:23:24', '2021-12-13 07:42:32'),
('40e0d155-195f-4452-bc49-39a3c1c9e479', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":21}', NULL, '2022-03-17 08:03:56', '2022-03-17 08:03:56'),
('412229e6-f827-48b1-8e4e-e866157af85b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-20 21:25:30', '2021-12-20 20:34:47', '2021-12-20 21:25:30'),
('41b2ffd5-8322-4661-acb4-ac2063a66029', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 18:06:28', '2021-12-12 10:18:44', '2021-12-12 18:06:28'),
('4369703e-8525-4479-b77c-108309de95f8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 6\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/6\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-25 17:27:09', '2022-03-23 07:05:27'),
('439c5640-f779-4ab2-9d0f-0c383cb04afe', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 4, '{\"title\":\"order accepted\",\"body\":\"Designer bbbB accept your invitation fdgdsf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"13 seconds ago\",\"order_id\":8}', NULL, '2021-12-23 10:47:03', '2021-12-23 10:47:03'),
('445639c5-0703-4963-afcc-a11dc7a46942', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":36}', '2022-03-23 07:05:27', '2022-03-17 08:23:39', '2022-03-23 07:05:27'),
('4497e524-1a43-4bdd-9cbc-edcb51bc0fa0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2022-03-17 07:52:51', '2022-03-23 07:05:27'),
('449cd2c3-5fee-48e5-b45b-50639e04a123', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":18}', '2022-03-23 07:05:27', '2021-12-25 14:03:18', '2022-03-23 07:05:27'),
('45855cbb-9a3f-4fe5-a5f7-c8c704067666', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:28', '2021-12-25 08:11:32', '2022-03-23 07:05:28'),
('46b8d4af-9e58-4352-95c4-176894ca0ebc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":21}', '2022-03-23 07:05:27', '2021-12-25 14:03:22', '2022-03-23 07:05:27'),
('472ff0f4-2832-471e-acde-0128c532ec4e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"challenge finished\",\"body\":\"challenge 123123 is finished now\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/29\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":29}', NULL, '2022-03-31 08:49:02', '2022-03-31 08:49:02'),
('47c30758-6800-453b-8cda-c1933c6aa20c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', NULL, '2022-03-17 09:08:22', '2022-03-17 09:08:22'),
('47dfab84-90dd-4dee-ac28-17f248e7fada', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com reject our request to subscribe in package Growth\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\",\"status\":\"canceled\",\"created_at\":\"1 second ago\",\"order_id\":2}', NULL, '2022-03-23 07:05:37', '2022-03-23 07:05:37'),
('48f8bab0-5653-46b8-872f-edb581507952', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', '2022-03-23 07:05:27', '2021-12-25 14:03:13', '2022-03-23 07:05:27'),
('49a98306-7d0a-4a73-9782-4a449bb3c9cc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:05:27', '2021-12-26 10:47:34', '2022-03-23 07:05:27'),
('4a3aba0a-d30d-4c19-aaf3-2b746ba92229', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"2 weeks ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2021-12-24 05:53:03', '2022-03-23 07:25:27'),
('4abc329a-929c-4df6-8306-ad625bab04a9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your request to subscribe in package Economy\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-03-23 06:58:31', '2022-03-23 07:05:27'),
('4bcc6e27-8f9a-4edc-8ebe-2344ef947a20', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/29\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":29}', NULL, '2022-03-31 08:43:06', '2022-03-31 08:43:06'),
('4d055663-dfc4-4bf1-8e73-a3ad4e42bbd6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"Your challenge has been reactivated\",\"body\":\"Your challenge has been reactivated challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-31 15:38:26', '2022-03-23 07:05:27'),
('4d4438bf-afc0-4dc0-ad7a-309c9e40cd4b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":18}', '2022-03-23 07:05:27', '2021-12-25 14:00:21', '2022-03-23 07:05:27'),
('4d7f3e1c-d1d1-457f-9fb3-c5858966af73', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":21}', '2022-03-23 07:05:27', '2021-12-25 17:08:27', '2022-03-23 07:05:27'),
('4dc1efba-ba3f-4c20-990f-d7d0e90b57d4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-19 14:09:14', '2021-12-19 14:05:38', '2021-12-19 14:09:14'),
('4dcef0fd-6538-487d-b77b-cd5ad8600c91', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":24}', NULL, '2022-03-31 06:37:41', '2022-03-31 06:37:41'),
('4ddc5139-3738-4751-91ab-188d2605c51b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 minute ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-01-01 08:04:21', '2022-03-23 07:05:27'),
('4e657821-7e73-4fdf-b602-cea2e13123a2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2021-12-25 09:32:56', '2022-03-23 07:05:27'),
('4f09e14a-c037-4d43-aa3e-07301f68ccb0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2022-03-17 07:37:06', '2022-03-23 07:05:27'),
('4f527031-d267-412f-8c6f-c80929c89d11', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 10\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/10\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:25:27', '2022-03-23 07:16:35', '2022-03-23 07:25:27'),
('4f597d25-0b27-4aa2-8af2-0a73bb2cd09f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":20}', '2022-03-23 07:05:27', '2021-12-25 14:04:29', '2022-03-23 07:05:27'),
('4f948598-a7b0-4aab-b33f-24a178f96821', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":26}', NULL, '2022-03-31 07:42:14', '2022-03-31 07:42:14'),
('4fcf78a5-5b74-4a60-84d4-8187916344bf', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-25 09:19:42', '2022-03-23 07:05:27'),
('50021fbe-9ce7-422d-86fe-60596428a481', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client aaaaaaa subscribe with your package Economy\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\\/6\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2022-01-27 06:23:12', '2022-03-23 07:25:27'),
('50752524-6d79-4126-9bc0-530a0ae6982b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-25 09:30:07', '2022-03-23 07:05:27'),
('5088fc9a-47dd-43c6-adef-e9edabbd118a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', NULL, '2022-03-17 07:45:23', '2022-03-17 07:45:23'),
('5124d94c-f103-459c-890e-5e47f4dd51d0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2021-12-25 09:21:10', '2022-03-23 07:05:27'),
('521f0f88-b0ae-4263-8dcf-1bd1b64f2240', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge challenge 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":7}', NULL, '2022-03-17 07:47:27', '2022-03-17 07:47:27'),
('583a61df-875a-4b4d-b17f-4da0f2fdba45', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:05:27', '2021-12-25 09:09:06', '2022-03-23 07:05:27'),
('58ba2f6a-8c60-4f37-a4f8-7550534cfc17', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 12\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/12\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:25:27', '2022-03-23 07:21:54', '2022-03-23 07:25:27');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('59c84531-42a8-4bbd-a08e-af0772760677', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"30 minutes ago\",\"order_id\":2}', '2021-12-20 07:48:53', '2021-12-20 07:41:59', '2021-12-20 07:48:53'),
('5a9ef5ff-899a-4d9d-b69f-e35698d15fe3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"3 weeks ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2021-12-25 18:13:49', '2022-03-23 07:25:27'),
('5b745c9a-3b8a-4877-b83f-7cc6b6ca142c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-25 09:06:52', '2022-03-23 07:05:27'),
('5be09cf6-448f-45d5-8988-4aef6a5bfb13', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new order\",\"body\":\"Client asd asd invited you to do a design in subscribtion 7\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', NULL, '2022-01-27 06:28:26', '2022-01-27 06:28:26'),
('5c76af46-48d2-49b0-a552-a5428b7d86e4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-20 05:01:34', '2021-12-19 15:25:52', '2021-12-20 05:01:34'),
('5c795424-9267-4bdd-9085-1d28a3771e29', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-31 15:26:53', '2022-03-23 07:05:27'),
('5ced1855-02d6-4695-b811-05fa1b9257ea', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"Your challenge has been reactivated\",\"body\":\"Your challenge has been reactivated challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:03:12', '2022-03-23 07:05:27'),
('5e56fda7-3f36-4c0d-a0d5-e67e41e5a103', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer ahmed add work in challenge challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"23 seconds ago\",\"order_id\":6}', '2021-12-20 21:25:30', '2021-12-20 20:39:32', '2021-12-20 21:25:30'),
('5ec7dbaf-f829-4fea-993d-1298a35f6787', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:27', '2021-12-25 09:33:11', '2022-03-23 07:05:27'),
('60c0fd30-1d9b-4417-ab0c-2691be2810f4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:38:08', '2021-12-03 13:58:13', '2021-12-13 07:38:08'),
('60c16dad-8dfc-4a07-a3f5-7d0442b68a33', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"13 hours ago\",\"order_id\":2}', NULL, '2021-12-20 20:27:53', '2021-12-20 20:27:53'),
('616fd6db-2b98-420e-b408-fdaace8f537b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:28', '2021-12-25 08:40:29', '2022-03-23 07:05:28'),
('6296f61c-dc50-4512-8723-8e9367650598', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add wrok in challenge challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/1\\/show\",\"status\":\"new order\",\"created_at\":\"2 minutes ago\",\"order_id\":1}', '2021-12-20 07:12:19', '2021-12-20 07:12:13', '2021-12-20 07:12:19'),
('650229ac-3a9d-43da-876f-85806c5358e3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"2 weeks ago\",\"order_id\":1}', NULL, '2021-12-24 05:54:39', '2021-12-24 05:54:39'),
('663fef47-d400-4c00-b4c0-cc0911a95842', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":23}', '2022-03-23 07:05:27', '2021-12-25 17:11:25', '2022-03-23 07:05:27'),
('66754994-77ce-492a-ba4e-69ce6cdded3f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2022-01-27 06:21:03', '2022-03-23 07:25:27'),
('6679d1d1-2a33-42d2-a824-6a2c9baf0632', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":33}', '2022-03-23 07:05:27', '2022-03-17 08:12:04', '2022-03-23 07:05:27'),
('67a7cc3f-0468-48c4-9fa2-3acc2754387a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Recurit\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:25:27', '2022-03-23 07:08:10', '2022-03-23 07:25:27'),
('67eb68b7-4286-4ec6-bf5b-8ee4ee825f60', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in challenge 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":18}', '2022-03-23 07:25:27', '2021-12-26 10:54:06', '2022-03-23 07:25:27'),
('68e1b43a-6842-4fe5-9346-02e265d3a8cf', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:05:27', '2021-12-25 09:07:59', '2022-03-23 07:05:27'),
('692deda3-06ad-475b-9be4-21444b297964', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:05:27', '2022-03-17 07:42:42', '2022-03-23 07:05:27'),
('699d6845-ee1f-486c-8092-99f43fe6806b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"35 seconds ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:06:43', '2022-03-23 07:05:27'),
('69acb0cf-dae1-4285-808b-a53a1a7b3d79', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":20}', NULL, '2022-03-17 08:01:21', '2022-03-17 08:01:21'),
('6b8a3602-1ca3-4dbd-bf33-a63b4de6c09a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', '2022-03-23 07:05:27', '2022-03-17 08:06:01', '2022-03-23 07:05:27'),
('6c424841-77bc-4eaa-bccc-42cc9e3b5bf6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:25:27', '2022-03-23 07:03:21', '2022-03-23 07:25:27'),
('6c6ca818-2f82-4ead-9595-b0bd93804760', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:05:27', '2021-12-25 13:39:55', '2022-03-23 07:05:27'),
('6d7db18e-3916-47bc-8f25-cf40949b4137', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"challenge finished\",\"body\":\"challenge challenge 1 is finished now\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', NULL, '2022-03-31 08:48:02', '2022-03-31 08:48:02'),
('6dad95b8-b651-451d-9569-7c2851b16dfa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a note from haitham\",\"body\":\"userhaitham need a edit in order order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"need to edit\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 09:34:00', '2021-12-13 07:42:32'),
('6de15abb-daa9-4735-92c5-a1e5f0c3da5f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:01:30', '2021-12-19 15:25:50', '2021-12-20 07:01:30'),
('6e151c3b-a14f-4811-bdd3-476fcea9590e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-31 15:36:27', '2022-03-23 07:05:27'),
('6f04e80d-2557-4a3d-8026-b6b88594533b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":29}', '2022-03-23 07:05:27', '2021-12-25 17:10:18', '2022-03-23 07:05:27'),
('6f638eb8-67ff-42e1-b11d-ac3eba816d3e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:27', '2021-12-25 09:50:59', '2022-03-23 07:05:27'),
('6f78eae0-f7b4-4b72-85e5-d3b57062e987', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"32 seconds ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-31 15:38:02', '2022-03-23 07:05:27'),
('70c91090-8001-4352-ba2b-34619952362c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":33}', '2022-03-23 07:05:27', '2021-12-26 10:52:56', '2022-03-23 07:05:27'),
('71b2d4f5-920b-40f8-936d-e86a7ca9fd77', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-13 07:42:32', '2021-12-12 10:19:06', '2021-12-13 07:42:32'),
('71f82cdf-a38a-4088-a30e-2ac0c5f070b5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:07:02', '2022-03-23 07:05:27'),
('72f70a25-01c2-4c67-8908-d8f3a6288cbb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:01:30', '2021-12-19 15:19:11', '2021-12-20 07:01:30'),
('72f7c447-dcb8-4900-8813-9c9bab9c6544', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-13 07:42:32', '2021-12-13 06:54:06', '2021-12-13 07:42:32'),
('730bea53-4aae-4954-a59e-80d7b2045441', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-01-01 08:05:39', '2022-03-23 07:05:27'),
('7401ed66-8f3a-4490-8520-df65ff4d4a44', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:28', '2021-12-25 08:10:12', '2022-03-23 07:05:28'),
('7426b1c3-d82e-44bd-95af-d16f0a29d5dc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add work in challenge 123123\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/29\\/show\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":29}', NULL, '2022-03-31 08:44:45', '2022-03-31 08:44:45'),
('76cf26c0-5771-49c1-83ac-639e8345eb0e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 3\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new subsrcibe\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:08', '2021-12-13 07:39:41', '2021-12-13 07:42:08'),
('777e276f-dcfb-4e9f-abd1-b7a07335fbec', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Economy\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:25:27', '2022-03-23 07:03:31', '2022-03-23 07:25:27'),
('77e26fc1-ade5-4278-ba8e-f8ecf6aabb53', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":1}', NULL, '2022-03-17 07:35:43', '2022-03-17 07:35:43'),
('7b2b1350-3291-45c6-a333-8b21df6037d6', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:27', '2022-03-15 10:31:47', '2022-03-23 07:05:27'),
('7bfe5893-f4c2-458f-b907-b199a2997922', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"challenge finished\",\"body\":\"challenge 123123 is finished now\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/29\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":29}', NULL, '2022-03-31 08:49:04', '2022-03-31 08:49:04'),
('7c0ca1d2-3aaf-4047-8362-29f16542137d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 10\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:25:27', '2022-03-23 07:09:28', '2022-03-23 07:25:27'),
('7c6a3a23-02bf-4b0e-ab60-c78f4c92a73d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"13 hours ago\",\"order_id\":1}', '2022-03-23 07:25:27', '2021-12-20 20:28:05', '2022-03-23 07:25:27'),
('7cefc108-13fc-416d-9099-89b776928020', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 4, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work fbdf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":6}', NULL, '2021-12-23 10:44:56', '2021-12-23 10:44:56'),
('7e5d7991-a85b-4ecb-9110-f90cfe8e20e9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"38 seconds ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 10:17:45', '2021-12-13 07:42:32'),
('7eb334bb-7e36-4447-817c-ec0893031818', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":34}', '2022-03-23 07:05:27', '2021-12-26 10:52:58', '2022-03-23 07:05:27'),
('7fafc51a-659a-41f4-a5fa-ef4ccc962f35', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:05:27', '2022-03-15 10:34:38', '2022-03-23 07:05:27'),
('8465f05a-dbe3-4a14-8d1c-4da95996a8ac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"Congratulaion work accepted \",\"body\":\"useraaaaaaa accept your work in order fdgdsf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"29 seconds ago\",\"order_id\":8}', NULL, '2021-12-23 10:47:32', '2021-12-23 10:47:32'),
('848a4548-217a-4376-ac80-d62990da2291', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 11\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/3\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":19}', NULL, '2022-03-17 08:37:50', '2022-03-17 08:37:50'),
('85e8f15a-5b2b-4311-a35e-cfa2f579c4ad', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', NULL, '2022-03-30 15:14:14', '2022-03-30 15:14:14'),
('87a12b94-3434-464f-b4a1-c41ab89914ba', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-20 07:01:30', '2021-12-20 07:01:12', '2021-12-20 07:01:30'),
('88824226-733b-4313-814a-23c11e8cf597', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-20 05:01:34', '2021-12-19 14:10:44', '2021-12-20 05:01:34'),
('8b043772-7006-43c3-af85-cf7fe9a894b0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"useraaaaaaa accept your work in order fbdf\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"43 seconds ago\",\"order_id\":7}', '2022-03-23 07:25:27', '2021-12-23 10:45:19', '2022-03-23 07:25:27'),
('8bc1f3f9-69dd-425b-b9c5-0ab8ce69e35b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', '2022-03-23 07:05:27', '2022-03-17 08:03:48', '2022-03-23 07:05:27'),
('8bc6ce75-5cf7-40d3-b100-2253dc868348', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:05:27', '2021-12-25 09:35:29', '2022-03-23 07:05:27'),
('8beef1ea-a339-4437-b5a9-a4f71d77065d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a note from haitham\",\"body\":\"userhaitham need a edit in order subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"need to edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-13 07:42:32', '2021-12-12 09:00:39', '2021-12-13 07:42:32'),
('8c4c1626-d375-459c-b496-a705680c8cae', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/6\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:05:27', '2021-12-25 18:08:58', '2022-03-23 07:05:27'),
('8cd1e26c-335a-4dd0-915f-ca359aeb1b8f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":5}', '2022-03-23 07:25:27', '2021-12-20 20:40:12', '2022-03-23 07:25:27'),
('8fae3453-1a86-4466-8c4c-571d57f53427', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"6 minutes ago\",\"order_id\":5}', '2021-12-03 18:00:44', '2021-12-03 17:57:53', '2021-12-03 18:00:44'),
('8fed5741-6c5b-4dea-a1e1-e8639f9cd701', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add work in challenge challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":5}', '2021-12-20 21:25:30', '2021-12-20 20:39:52', '2021-12-20 21:25:30'),
('91bffb6a-ad99-4c6b-9c7f-483550dd0296', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer ahmed add wrok in challenge challenge 2\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"2 minutes ago\",\"order_id\":4}', '2021-12-20 07:09:36', '2021-12-20 07:03:39', '2021-12-20 07:09:36'),
('91fb0db2-e5bf-4fa1-bdb1-d1ddde8ff41b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"Your challenge has been reactivated\",\"body\":\"Your challenge has been reactivated challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-31 15:38:13', '2022-03-23 07:05:27'),
('92535c58-ac50-465b-8c46-4db9e493b3fa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer ahmed accept your invitation order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"17 seconds ago\",\"order_id\":2}', '2021-12-03 13:57:37', '2021-12-03 13:43:07', '2021-12-03 13:57:37'),
('93b0bd3e-1545-4f31-86a5-20e1dacf45ea', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":19}', '2022-03-23 07:05:27', '2021-12-25 14:03:20', '2022-03-23 07:05:27'),
('94897893-d397-47e7-a57c-2d2df22bfc20', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 09:34:32', '2021-12-12 18:06:28'),
('95377d46-acac-439e-8262-0f83d6e7a2af', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer ahmed add a work in subscription 3 order title : derewr\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/3\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2022-03-17 08:36:41', '2022-03-23 07:05:27'),
('956d9e6d-63cc-4945-85c4-fae055daec01', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:05:27', '2022-03-17 08:01:14', '2022-03-23 07:05:27'),
('95985ad1-188a-4759-b1e8-767714d7ba9d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:05:27', '2021-12-25 13:51:08', '2022-03-23 07:05:27'),
('95b4b8ea-21b3-4bc5-9c42-93708cb940e1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"1 week ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2021-12-23 10:38:54', '2022-03-23 07:25:27'),
('96ea1713-c694-401d-aa4a-76ab9e4359a0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-25 09:32:30', '2022-03-23 07:05:27'),
('987103be-ecdc-4129-b6fa-34aa8536aa75', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 08:17:41', '2021-12-12 08:09:31', '2021-12-12 08:17:41'),
('9a1ac45a-fe3f-4653-918e-7de89b674ba5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:27', '2022-03-17 07:49:01', '2022-03-23 07:05:27'),
('9a722132-5a6a-4ffa-bdec-88314af698d5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":19}', '2022-03-23 07:05:27', '2021-12-25 14:01:32', '2022-03-23 07:05:27'),
('9be58088-557f-4e62-b191-79b12b69b353', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:27', '2021-12-25 13:25:25', '2022-03-23 07:05:27'),
('9cfda00b-8231-4f2b-b813-416ef7ddde52', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:27', '2021-12-26 10:43:10', '2022-03-23 07:05:27'),
('9d837c88-c5e5-4072-b881-32b2dd4f46c0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:27', '2022-03-17 07:49:46', '2022-03-23 07:05:27'),
('9dad7b88-d81f-44c2-a9cc-df3f1723cbca', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":20}', NULL, '2022-03-31 07:50:52', '2022-03-31 07:50:52'),
('9fb504c6-9bd6-491e-9878-f7036213be84', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer ahmed add work in challenge challenge 2\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":21}', '2022-03-23 07:05:27', '2022-03-17 08:05:38', '2022-03-23 07:05:27'),
('9fd0d71a-0d21-488b-8f26-354976318556', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:05:28', '2021-12-25 08:36:35', '2022-03-23 07:05:28'),
('a146c613-0c25-4eec-8b81-20df2b0ad96e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":5}', NULL, '2022-03-17 07:41:42', '2022-03-17 07:41:42'),
('a1db345a-187e-4bcd-948a-6b7ec9827bd9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-25 09:22:28', '2022-03-23 07:05:27'),
('a1f387c6-008c-4be3-bd3e-822f399d6d3d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:28', '2021-12-25 08:11:42', '2022-03-23 07:05:28'),
('a2bc536e-be73-4e34-a2c5-d6a72b678bb5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:25:27', '2022-03-23 07:20:38', '2022-03-23 07:25:27'),
('a2f9dff6-c900-418b-a5e4-7ca152bbd56d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:05:27', '2022-03-15 10:21:23', '2022-03-23 07:05:27'),
('a30ffbb4-d7e5-4e69-a9ce-e22de7149240', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"challenge finished\",\"body\":\"challenge challenge 1 is finished now\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', NULL, '2022-03-31 08:48:03', '2022-03-31 08:48:03'),
('a3346e61-30af-40c6-ab3e-39f3fc3b0f54', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', NULL, '2022-03-17 07:53:32', '2022-03-17 07:53:32'),
('a67c8353-e818-4e3a-99e0-1c4d32401e36', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 08:17:41', '2021-12-12 08:09:32', '2021-12-12 08:17:41'),
('a6e349e7-db76-4c8e-ba6f-88b2eebfa1f1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:05:28', '2021-12-25 08:15:21', '2022-03-23 07:05:28'),
('a9c88c3c-7be9-40de-bbf0-122cf0a16eca', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-20 21:25:30', '2021-12-20 20:38:19', '2021-12-20 21:25:30'),
('a9d31c49-fbe4-41b5-9f47-4a3878873345', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work order 3\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 08:40:43', '2021-12-12 18:06:28'),
('aa14332f-c709-4e58-9122-9000c9d529a5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', NULL, '2022-03-17 09:22:28', '2022-03-17 09:22:28'),
('acfeed8b-12bd-47a9-86cc-1e145a97845e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-20 05:01:34', '2021-12-19 15:23:04', '2021-12-20 05:01:34'),
('ae9bd34d-33ed-478e-be1f-fe2d730fd8fe', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', NULL, '2022-03-31 06:39:05', '2022-03-31 06:39:05'),
('ae9e1b22-fe17-4fb7-9b28-8ed563fb4cef', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add wrok in challenge challenge 2\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"20 minutes ago\",\"order_id\":3}', '2021-12-20 07:09:36', '2021-12-20 07:04:19', '2021-12-20 07:09:36'),
('aebc6f1c-c35d-4339-945b-085db2e748aa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 10 order title : aaaaaaa\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/10\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:25:27', '2022-03-23 07:16:56', '2022-03-23 07:25:27'),
('af7503b2-2914-489c-bb79-b03ef72d039a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client aaaaaaa invited you to do a design in subscribtion 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2022-01-27 06:23:57', '2022-03-23 07:25:27'),
('b17b3469-4e22-4cfc-a292-71c47a0cada7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge challenge 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":8}', NULL, '2022-03-17 07:48:48', '2022-03-17 07:48:48'),
('b2660f52-98ec-4937-89f4-6ea5a2fc8c52', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2022-03-23 07:05:27', '2021-12-25 09:34:28', '2022-03-23 07:05:27'),
('b351baf6-d344-40b3-a3dc-47995fb3bf6c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This challenge has been suspended\",\"body\":\"This challenge has been suspended because it is against the terms challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:06:08', '2022-03-23 07:05:27'),
('b3631909-3a12-4577-8a3b-1a50e5837929', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"12 hours ago\",\"order_id\":2}', NULL, '2021-12-20 20:08:27', '2021-12-20 20:08:27'),
('b550e00a-9486-427c-995d-dcf1a71b7d2e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:28', '2021-12-25 08:40:11', '2022-03-23 07:05:28'),
('b6ade955-1ff9-4667-bb36-fbebc42a5d4c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"31 minutes ago\",\"order_id\":1}', '2021-12-20 07:48:40', '2021-12-20 07:41:51', '2021-12-20 07:48:40'),
('b6b688a9-4756-4089-ab24-32127f46a299', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":24}', '2022-03-23 07:05:27', '2021-12-25 14:03:26', '2022-03-23 07:05:27'),
('b7905830-f4c8-4b31-8a2a-e355c65988e8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 day ago\",\"order_id\":6}', '2021-12-12 08:27:11', '2021-12-12 08:26:56', '2021-12-12 08:27:11'),
('baef7eb2-1509-4106-8f26-5325f3e292a2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', '2022-03-23 07:05:27', '2021-12-25 13:37:57', '2022-03-23 07:05:27'),
('baefb909-6b73-4ed1-be41-1c61b96eb428', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-20 05:01:34', '2021-12-19 15:19:13', '2021-12-20 05:01:34'),
('baf4dc8f-ccbe-4ad6-b5ac-b4f47ae89243', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":24}', '2022-03-23 07:05:27', '2021-12-25 17:24:37', '2022-03-23 07:05:27'),
('bc2e4c2f-229f-4afc-be81-9dbfb18076ba', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client hethmjal4@gmail.com like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:05:27', '2021-12-26 10:52:08', '2022-03-23 07:05:27'),
('bc50a8ae-5605-409a-9a9e-1d8450583cf0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 07:41:49', '2021-12-12 05:24:17', '2021-12-12 07:41:49'),
('bdc69c5a-8666-4d87-9991-8244b028520c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"12 hours ago\",\"order_id\":2}', NULL, '2021-12-20 19:23:50', '2021-12-20 19:23:50'),
('c17ac6d7-58eb-4cd8-a116-e93a4079dd5b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:01:30', '2021-12-19 15:27:05', '2021-12-20 07:01:30'),
('c18b09f1-bbc0-496c-8c1d-af5084e3e2be', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order order\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/2\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-17 17:21:14', '2021-12-13 13:28:13', '2021-12-17 17:21:14'),
('c1f49bcc-c44a-4c72-8472-86f6bdabfafa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"challenge finished\",\"body\":\"challenge  is finished now\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', NULL, '2022-03-31 08:26:21', '2022-03-31 08:26:21'),
('c2e3db9c-197f-4d66-9aa0-9d10c8b5a519', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge challenge 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":10}', NULL, '2022-03-17 07:51:47', '2022-03-17 07:51:47'),
('c3abcf87-6e1f-4d8c-86ee-f0762106a8ec', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:05:28', '2021-12-25 08:15:30', '2022-03-23 07:05:28'),
('c49f6542-f205-460b-80a1-1cd26e8acefb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', '2022-03-23 07:05:27', '2022-03-17 08:07:59', '2022-03-23 07:05:27');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('c5b54b33-4339-4ed7-a672-ad8b34d63e29', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new subscriber\",\"body\":\"Client asd asd subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/9\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', NULL, '2022-01-27 07:01:48', '2022-01-27 07:01:48'),
('c7eb4363-a1bc-40e0-ad23-51cc22516afe', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:27', '2022-03-17 07:38:21', '2022-03-23 07:05:27'),
('c7f2a506-449d-4e33-aecb-61a48c38927d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 6\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/6\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":32}', '2022-03-23 07:05:27', '2021-12-25 17:28:40', '2022-03-23 07:05:27'),
('c824374b-0fb0-4883-a240-8aa7e9d5d961', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have invite to challenge\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-20 05:01:34', '2021-12-19 15:27:07', '2021-12-20 05:01:34'),
('c884c33c-14b5-472b-bb4b-c2f925fa815a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"Your challenge has been reactivated\",\"body\":\"Your challenge has been reactivated challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/challenges\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2022-01-01 08:06:56', '2022-03-23 07:05:27'),
('c8d80bbd-b8ca-470f-89b1-2c49de832637', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in challenge 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:25:27', '2021-12-24 05:50:09', '2022-03-23 07:25:27'),
('c8dc736b-ee19-4743-b527-54d8417d719c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"2 weeks ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2021-12-25 18:14:17', '2022-03-23 07:25:27'),
('cc76b46b-7335-483c-a1ed-cbbc63215a1d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new order\",\"body\":\"Client asd asd invited you to do a design in subscribtion 7\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', NULL, '2022-01-27 06:39:01', '2022-01-27 06:39:01'),
('cd165134-7e51-4275-b011-e5fd548e1c98', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/1\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-20 07:11:20', '2021-12-20 07:11:02', '2021-12-20 07:11:20'),
('cdf99e7a-f9e4-4a10-8750-101af58a4bdd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add work in challenge challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":5}', '2021-12-20 21:25:30', '2021-12-20 20:39:54', '2021-12-20 21:25:30'),
('cfcda457-b6bb-48d1-97d8-0863b3b247ca', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:05:27', '2021-12-25 14:03:10', '2022-03-23 07:05:27'),
('d0f65b3e-da81-4ad0-8e32-c42d11ae9017', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:05:27', '2021-12-25 13:29:54', '2022-03-23 07:05:27'),
('d0f8d929-f5f1-42b2-b9cb-99723e99c46e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 5\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/5\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2021-12-26 10:28:53', '2022-03-23 07:05:27'),
('d21faf86-f143-4687-86b0-26d70012cefd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer ahmed accept your invitation order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"3 minutes ago\",\"order_id\":1}', '2021-12-03 10:59:23', '2021-12-03 10:59:11', '2021-12-03 10:59:23'),
('d2c42003-a7a0-4205-aac4-fc9aa14f2f0a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"accept a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":19}', NULL, '2022-03-17 08:00:15', '2022-03-17 08:00:15'),
('d38d8c2c-8d1f-4d34-94df-098feb0ee3eb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new subscriber\",\"body\":\"Client asd asd subscribe with your package Economy\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\\/7\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', NULL, '2022-01-27 06:27:16', '2022-01-27 06:27:16'),
('d39839db-1105-4ce5-b19d-b776a0c99411', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"reject a request to join challenge\",\"body\":\"Client haitham accept your request to join  challenge \",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/3\\/show\",\"status\":\"rejected\",\"created_at\":\"1 second ago\",\"order_id\":4}', NULL, '2022-03-17 07:40:21', '2022-03-17 07:40:21'),
('d40f2a57-139a-4437-b5be-1aa19c5ecb7a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 6\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/6\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":31}', '2022-03-23 07:05:27', '2021-12-25 17:28:21', '2022-03-23 07:05:27'),
('d5a9a123-fe9e-4682-8267-ca5b9e2017f0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', '2022-03-23 07:05:27', '2021-12-25 13:56:37', '2022-03-23 07:05:27'),
('d5c4b93c-c79f-4ce8-bcac-9d57dee0ecb3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 3\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', NULL, '2022-03-17 08:36:13', '2022-03-17 08:36:13'),
('d63950ff-a0e6-4938-a7ee-ee6c4915ffd7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-01-01 08:03:16', '2022-03-23 07:05:27'),
('d65ccde9-4987-467e-8828-a62e25fd26e9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":28}', '2022-03-23 07:05:27', '2021-12-25 14:03:31', '2022-03-23 07:05:27'),
('d71b1b65-f05a-45a1-9db8-26dfdd20df31', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":27}', '2022-03-23 07:05:27', '2021-12-25 14:03:30', '2022-03-23 07:05:27'),
('d796ce85-90f4-4e7a-9c8d-2d5272909a41', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:05:27', '2022-03-17 07:57:07', '2022-03-23 07:05:27'),
('da03f93c-0c3c-41a8-acae-93e8320f8eff', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":6}', NULL, '2021-12-20 20:40:21', '2021-12-20 20:40:21'),
('da7e1633-3b8d-4faa-a87c-f6e07aac4eac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2022-03-23 07:05:27', '2021-12-25 09:35:32', '2022-03-23 07:05:27'),
('db78eebe-24c6-4056-befb-88866df72324', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"12 hours ago\",\"order_id\":1}', '2022-03-23 07:25:27', '2021-12-20 19:30:46', '2022-03-23 07:25:27'),
('dbc45887-cb1e-4217-9e9c-f9f40b97b5bd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in challenge 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', NULL, '2021-12-24 05:45:24', '2021-12-24 05:45:24'),
('dc29b516-19fd-4e22-9633-e0de765070be', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:05:27', '2021-12-25 13:47:50', '2022-03-23 07:05:27'),
('ddaf4254-607c-4a1d-84f5-9fb04447cf62', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2022-03-23 07:05:27', '2021-12-25 09:19:44', '2022-03-23 07:05:27'),
('ddc69869-0dcf-45aa-a1c1-484935f8da35', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:05:27', '2021-12-25 09:34:56', '2022-03-23 07:05:27'),
('de30fc83-9847-4677-b75e-319486c86f26', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 07:41:49', '2021-12-12 06:47:24', '2021-12-12 07:41:49'),
('de629915-a003-45f8-aa3d-f96e708177b7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 1 your rank is 2\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"28 minutes ago\",\"order_id\":2}', '2021-12-20 07:48:53', '2021-12-20 07:39:06', '2021-12-20 07:48:53'),
('de825202-deba-4399-b69e-4b3d66539c97', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2021-12-20 21:25:30', '2021-12-20 20:39:09', '2021-12-20 21:25:30'),
('de8c5f3c-d8a4-40c8-adf1-f48691f8e8be', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 18:06:28', '2021-12-12 09:10:00', '2021-12-12 18:06:28'),
('ded2d4d3-545e-4cd3-bc61-cde80836c480', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2022-03-23 07:05:27', '2021-12-25 09:33:14', '2022-03-23 07:05:27'),
('e151d27b-5071-4f75-929d-ed551acfaf5c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client hethmjal4@gmail.com comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":25}', '2022-03-23 07:05:27', '2021-12-25 17:25:01', '2022-03-23 07:05:27'),
('e167e5ce-bf17-40f7-bf41-d4a87ad7b106', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-03 17:57:30', '2021-12-03 17:57:19', '2021-12-03 17:57:30'),
('e29df0bb-88f5-48d5-909a-57b86581404f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 05:19:46', '2021-12-12 05:18:12', '2021-12-12 05:19:46'),
('e2d4be15-2873-4c86-ba3f-dab7b2eaa422', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":27}', '2022-03-23 07:05:27', '2022-03-17 08:07:16', '2022-03-23 07:05:27'),
('e42721e0-eeb3-4d4f-9fd2-89e06293a060', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"12 hours ago\",\"order_id\":1}', '2022-03-23 07:25:27', '2021-12-20 19:49:32', '2022-03-23 07:25:27'),
('e45038c9-5d62-4466-bfc5-8f27cb37b00e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham want to subscribe with your package Growth\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2022-03-23 07:06:04', '2022-03-23 07:25:27'),
('e4f02a9f-aad2-4477-8180-46604c32a8c3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"This order has been suspended\",\"body\":\"This order has been suspended because it is against the terms order1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"edit\",\"created_at\":\"1 minute ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2022-01-01 08:04:29', '2022-03-23 07:05:27'),
('e59e2cd4-0899-443b-bc7a-ac5d372e9406', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 12 order title : bbbbbbbbbbbbbbbbb\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/12\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":14}', NULL, '2022-03-23 07:22:34', '2022-03-23 07:22:34'),
('e5a73b3c-f155-4ef8-990b-980d9641e77a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 week ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2021-12-23 07:26:05', '2022-03-23 07:25:27'),
('e6189e5c-6c22-4e08-ba05-695f07430722', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"haitham added a review for the challenge \",\"body\":\"Client haitham  added a review for the challenge challenge 11 your rank is 1\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"12 hours ago\",\"order_id\":1}', '2022-03-23 07:25:27', '2021-12-20 19:49:30', '2022-03-23 07:25:27'),
('e650c7b5-76c6-4775-aa5d-bde73976b2e4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 8, '{\"title\":\"you have a new order\",\"body\":\"Client asd asd invited you to do a design in subscribtion 7\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":10}', NULL, '2022-01-27 06:41:21', '2022-01-27 06:41:21'),
('e675f666-6340-42f9-8d24-b92c254bf836', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer hethmjal4@gmail.com add wrok in challenge challenge 2\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 minute ago\",\"order_id\":3}', '2021-12-20 19:49:52', '2021-12-20 19:21:29', '2021-12-20 19:49:52'),
('e81bd468-d64f-443f-b7ec-778ea08956b7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your request to subscribe in package Growth\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/12\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":12}', NULL, '2022-03-23 07:21:27', '2022-03-23 07:21:27'),
('e8cf155a-b71d-4db3-b2d1-2bea48d6e9dd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":19}', NULL, '2022-03-31 07:46:57', '2022-03-31 07:46:57'),
('e93526bc-d043-4450-bbc2-3ddf4816dd1e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/29\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":21}', NULL, '2022-03-31 08:42:57', '2022-03-31 08:42:57'),
('eb4df813-4e43-449f-a92e-97aeb6606158', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-20 07:01:30', '2021-12-20 06:43:59', '2021-12-20 07:01:30'),
('eb5ac719-941f-4e0b-bcc4-83b47585e19f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":14}', '2022-03-23 07:05:27', '2022-03-15 10:43:58', '2022-03-23 07:05:27'),
('ebf720bd-cfae-4e97-867b-efb6a26b4fa0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-13 07:42:32', '2021-12-12 09:10:34', '2021-12-13 07:42:32'),
('eca5afb0-066a-4ba2-a355-ad32f1a5bb9e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', '2022-03-23 07:05:27', '2021-12-25 14:03:15', '2022-03-23 07:05:27'),
('ed01ddd8-1453-432d-8eba-64bc369b7192', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":15}', '2022-03-23 07:05:27', '2021-12-25 13:52:01', '2022-03-23 07:05:27'),
('ef19afe3-ebe9-477c-bbed-c9f927616c84', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 6\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/6\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":30}', '2022-03-23 07:05:27', '2021-12-25 17:27:29', '2022-03-23 07:05:27'),
('f00fe803-e178-43bc-9b13-ad9650aa405e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"your request to subscribe in package is accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your request to subscribe in package Recurit\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/11\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', NULL, '2022-03-23 07:19:38', '2022-03-23 07:19:38'),
('f13427e8-3e21-4768-9c04-52f6ec2ec665', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":23}', '2022-03-23 07:05:27', '2021-12-25 14:03:25', '2022-03-23 07:05:27'),
('f1d4a8b4-7293-4d6c-b4a9-54b6786c0f5c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new reply in a comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":26}', '2022-03-23 07:05:27', '2021-12-25 14:03:29', '2022-03-23 07:05:27'),
('f243e43d-03ba-4e27-935a-dfd799d4c7e0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-13 07:55:40', '2021-12-13 07:54:58', '2021-12-13 07:55:40'),
('f254f10a-cc09-4de2-b696-a3e551205ba1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in order 6\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"1 week ago\",\"order_id\":6}', '2022-03-23 07:25:27', '2021-12-24 05:54:23', '2022-03-23 07:25:27'),
('f2f7021f-df6b-42bf-bbeb-965119f34707', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in challenge 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":17}', NULL, '2021-12-26 09:59:06', '2021-12-26 09:59:06'),
('f303572f-e859-4475-9dae-2743582e4256', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 10 order title : dwgdsg\",\"action\":\"\\/panels\\/UserPanel\\/MyDesigners\\/10\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":12}', '2022-03-23 07:25:27', '2022-03-23 07:11:36', '2022-03-23 07:25:27'),
('f3efd7f9-d55d-4342-8399-20cd349fa30c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2022-03-23 07:05:27', '2021-12-25 09:21:02', '2022-03-23 07:05:27'),
('f45359a5-40b0-4c18-8f1b-2a6e0d59d27f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/2\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2022-03-23 07:05:27', '2022-03-15 10:23:50', '2022-03-23 07:05:27'),
('f46fcb2f-6e7f-45e2-bf37-f81c0020a007', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation order 3\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"16 seconds ago\",\"order_id\":4}', '2021-12-03 13:58:43', '2021-12-03 13:58:31', '2021-12-03 13:58:43'),
('f633636f-6f56-499c-bf5c-03909ca89d45', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new reviews\",\"body\":\"Client haitham add a review in challenge 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyOrders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:25:27', '2021-12-23 08:53:02', '2022-03-23 07:25:27'),
('f653c46e-f6c6-4bb5-b186-d97b92cb7a4a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":11}', '2022-03-23 07:05:27', '2021-12-25 13:39:29', '2022-03-23 07:05:27'),
('f7ce7d20-a4df-44f9-bfed-176a896b1d2b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2022-03-23 07:05:28', '2021-12-25 09:05:55', '2022-03-23 07:05:28'),
('f7ea5c23-a720-439c-a3ca-0063c030ff35', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client aaaaaaa invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2022-03-23 07:25:27', '2021-12-23 10:44:22', '2022-03-23 07:25:27'),
('f824cee5-16b2-4c8e-9071-112cefdd6920', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new comment\",\"body\":\"Client haitham comment in challenge 4\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/4\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":16}', '2022-03-23 07:05:27', '2021-12-25 13:53:23', '2022-03-23 07:05:27'),
('f833cfc3-a0c5-47eb-b960-6c4e91e0c4a9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"add work in your challenge\",\"body\":\"Designer ahmed add wrok in challenge challenge 1\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/1\\/show\",\"status\":\"new order\",\"created_at\":\"37 seconds ago\",\"order_id\":2}', '2021-12-20 07:11:53', '2021-12-20 07:11:38', '2021-12-20 07:11:53'),
('f85375d2-683d-4857-bd15-5b75930e21ec', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new subscriber\",\"body\":\"Client haitham invite you to participate in challenge\",\"action\":\"\\/panels\\/DesignerPanel\\/MyChallenges\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-20 07:01:30', '2021-12-19 14:05:36', '2021-12-20 07:01:30'),
('f902131e-8468-4cbf-9874-a25b0b540ce1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"11 seconds ago\",\"order_id\":5}', '2021-12-03 17:51:15', '2021-12-03 17:51:06', '2021-12-03 17:51:15'),
('fbeffd52-2a55-426a-8358-afefb223b180', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer ahmed sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":13}', '2022-03-23 07:05:27', '2022-03-17 08:00:11', '2022-03-23 07:05:27'),
('fc09ae4b-99cd-4096-a314-035ba131d3bc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 7, '{\"title\":\"order accepted\",\"body\":\"Designer hayitham jalhoum accept your invitation order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"3 minutes ago\",\"order_id\":9}', NULL, '2022-01-27 06:46:36', '2022-01-27 06:46:36'),
('fca1fb05-7c2f-4783-bd2a-66d7e605f33a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"Congratulaion work accepted \",\"body\":\"user haitham accept your work in order derewr\",\"action\":\"\\/panels\\/DesignerPanel\\/MyClients\\/3\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":11}', NULL, '2022-03-17 08:37:19', '2022-03-17 08:37:19'),
('fe1d38d8-ede7-47d5-ad6a-cdd914c51ef5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"you have a new like\",\"body\":\"Client haitham like your challenge 3\",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/3\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":34}', '2022-03-23 07:05:27', '2022-03-17 08:19:35', '2022-03-23 07:05:27'),
('fff4a195-ebf9-46b0-bec1-cfd4da2275e4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"subscribe in your challenge\",\"body\":\"Designer hethmjal4@gmail.com sent a request to subscribe in your challenge \",\"action\":\"\\/panels\\/UserPanel\\/Challenges\\/25\\/show\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":18}', NULL, '2022-03-31 07:41:54', '2022-03-31 07:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `designer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('waiting to response','Accepted','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting to response',
  `adminstatus` enum('Active','Not Active','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_submitted` enum('working on','submitted','Delayed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'working on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `designer_id`, `designer_name`, `title`, `description`, `image`, `type`, `deadline`, `status`, `adminstatus`, `work_submitted`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'ahmed', 'order1', ' order 1', 'images/1638536112_21833077_400.png', 'Graphic design', '2022-01-03', 'Accepted', 'Active', 'submitted', '2021-12-03 10:55:12', '2022-01-01 08:05:45'),
(2, 1, 2, 'ahmed', 'order 2', 'order 2', 'images/1638546170_11.jpg', 'Motion Graphic', '2021-12-28', 'Accepted', 'Not Active', 'working on', '2021-12-03 13:42:50', '2022-01-01 08:05:52'),
(4, 1, 3, 'hethmjal4@gmail.com', 'order 3', 'order 3', 'images/1638547095_500x500.png', 'Graphic design', '2022-01-06', 'Accepted', 'Active', 'working on', '2021-12-03 13:58:15', '2021-12-03 13:58:31'),
(5, 1, 3, 'hethmjal4@gmail.com', 'order 4', 'order 4', 'images/1638561055_11.jpg', 'Graphic design', '2022-01-04', 'Accepted', 'Active', 'submitted', '2021-12-03 17:50:55', '2021-12-03 17:57:53'),
(6, 1, 3, 'hethmjal4@gmail.com', 'ORDER 4', 'OREDER', 'images/1639136876_التقاط.PNG', 'Motion Graphic', '2022-01-06', 'Accepted', 'Active', 'submitted', '2021-12-10 09:47:56', '2021-12-12 08:26:56'),
(7, 4, 3, 'hethmjal4@gmail.com', 'fbdf', 'vvfgjt', 'images/1640263462_1.PNG', 'Graphic design', '2022-01-08', 'Accepted', 'Active', 'submitted', '2021-12-23 10:44:22', '2021-12-23 10:45:19'),
(8, 4, 5, 'bbbB', 'fdgdsf', 'yuiyui', 'images/1640263610_1.PNG', 'Graphic design', '2022-01-06', 'Accepted', 'Active', 'submitted', '2021-12-23 10:46:50', '2021-12-23 10:47:32'),
(9, 7, 8, 'hayitham jalhoum', 'order 1', '111111', 'images/1643272967_3537.jpg', 'Graphic design', '2022-02-03', 'Accepted', NULL, 'working on', '2022-01-27 06:42:47', '2022-01-27 06:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `order__works`
--

CREATE TABLE `order__works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Accepted','need to edit','working on','under review') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__works`
--

INSERT INTO `order__works` (`id`, `designer_id`, `order_id`, `image`, `file`, `file_name`, `file_ext`, `status`, `designer_note`, `user_note`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'images/1639303772_Untitled (2).png', 'files/1639303772_خطة موقع شيزاينر.pdf', 'خطة موقع شيزاينر.pdf', 'pdf', 'under review', 'your work', NULL, '2021-12-03 10:59:11', '2021-12-12 08:09:32'),
(2, 2, 2, NULL, NULL, NULL, NULL, 'working on', NULL, NULL, '2021-12-03 13:43:07', '2021-12-03 13:43:07'),
(3, 3, 4, 'images/1639305643_images_1637509906_http___localhost_8000_images_bg4 (2).png', 'files/1639305643_jobs.csv', 'jobs.csv', 'csv', 'under review', 'ytuityu', NULL, '2021-12-03 13:58:31', '2021-12-12 08:40:43'),
(4, 3, 5, 'images/1638561439_Untitled (2).png', 'files/1638561439_E-commerce Infrastructure-محول.pdf', 'E-commerce Infrastructure-محول.pdf', 'pdf', 'Accepted', 'good', 'thank', '2021-12-03 17:51:06', '2021-12-03 17:57:53'),
(5, 3, 6, 'images/1639304773_images_1637509906_http___localhost_8000_images_bg4 (2).png', 'files/1639304773_خطة موقع شيزاينر.pdf', 'خطة موقع شيزاينر.pdf', 'pdf', 'Accepted', 'ff', 'thanks', '2021-12-10 09:48:11', '2021-12-12 08:26:56'),
(6, 3, 7, 'images/1640263495_images_1637509906_http___localhost_8000_images_bg4 (2).png', 'files/1640263495_1909.13135.pdf', '1909.13135.pdf', 'pdf', 'Accepted', 'good', 'gfh', '2021-12-23 10:44:36', '2021-12-23 10:45:19'),
(7, 5, 8, 'images/1640263639_Untitled (2).png', 'files/1640263639_1909.13135.pdf', '1909.13135.pdf', 'pdf', 'Accepted', 'ytuyt', '5', '2021-12-23 10:47:03', '2021-12-23 10:47:32'),
(8, 8, 9, NULL, NULL, NULL, NULL, 'working on', NULL, NULL, '2022-01-27 06:46:36', '2022-01-27 06:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `number_of_works` int(11) NOT NULL,
  `single_work_editing` int(11) NOT NULL,
  `change_designer` enum('available','Not available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `unsubscribe` enum('available','Not available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_schedule` enum('available','Not available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen_share_technology` enum('available','Not available') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `number_of_works`, `single_work_editing`, `change_designer`, `unsubscribe`, `meeting_schedule`, `screen_share_technology`, `created_at`, `updated_at`) VALUES
(1, 'Economy', 500, 5, 1, 'Not available', 'Not available', 'Not available', 'Not available', NULL, NULL),
(2, 'Growth', 900, 10, 2, 'available', 'Not available', 'Not available', 'Not available', NULL, NULL),
(3, 'Recurit', 1700, 20, 5, 'available', 'available', 'available', 'available', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages_orders`
--

CREATE TABLE `packages_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `designer_package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages_orders`
--

INSERT INTO `packages_orders` (`id`, `designer_id`, `user_id`, `package_id`, `designer_package_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 6, '2022-03-17 09:22:28', '2022-03-17 09:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`conversation_id`, `user_id`, `joined_at`) VALUES
(1, 1, '2021-12-03 13:25:55'),
(1, 2, '2021-12-03 13:25:55'),
(2, 1, '2021-12-03 15:58:31'),
(2, 3, '2021-12-03 15:58:31'),
(3, 3, '2021-12-23 12:44:36'),
(3, 4, '2021-12-23 12:44:36'),
(4, 4, '2021-12-23 12:47:03'),
(4, 5, '2021-12-23 12:47:03'),
(7, 7, '2022-01-27 08:39:02'),
(7, 8, '2022-01-27 08:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `user_id`, `project_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'design', 'images/1638979609_images_1637509906_http___localhost_8000_images_bg4 (2).png', '2021-12-08 14:06:49', '2021-12-08 14:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `programers`
--

CREATE TABLE `programers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `programers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programers`
--

INSERT INTO `programers` (`id`, `user_id`, `programers`, `experience`, `created_at`, `updated_at`) VALUES
(1, 3, 'Camatasia Studio', '5', '2021-12-08 14:05:27', '2021-12-08 14:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`user_id`, `message_id`, `read_at`, `deleted_at`) VALUES
(1, 58, '2021-12-03 17:32:11', NULL),
(1, 59, '2021-12-03 17:32:44', NULL),
(1, 60, '2021-12-03 17:32:44', NULL),
(1, 61, '2021-12-03 17:32:55', NULL),
(1, 62, '2021-12-03 17:38:04', NULL),
(1, 63, '2021-12-03 17:38:30', NULL),
(1, 64, '2021-12-03 17:38:54', NULL),
(1, 65, '2021-12-03 17:40:02', NULL),
(1, 66, '2021-12-03 17:40:13', NULL),
(1, 67, '2021-12-03 17:40:51', NULL),
(1, 68, '2021-12-03 17:42:01', NULL),
(1, 69, '2021-12-03 17:46:57', NULL),
(1, 70, '2021-12-03 18:01:10', NULL),
(1, 71, '2021-12-03 20:54:15', NULL),
(1, 72, '2021-12-03 20:58:12', NULL),
(1, 73, '2021-12-05 09:49:40', NULL),
(1, 74, '2021-12-05 09:53:02', NULL),
(1, 75, '2021-12-05 09:53:17', NULL),
(1, 76, '2021-12-05 09:54:06', NULL),
(1, 77, '2021-12-05 09:54:20', NULL),
(1, 78, '2021-12-07 14:03:58', NULL),
(1, 79, '2021-12-13 07:22:37', NULL),
(1, 80, '2021-12-13 07:30:50', NULL),
(1, 81, '2021-12-13 07:34:52', NULL),
(1, 82, '2021-12-13 07:35:03', NULL),
(1, 83, '2021-12-13 07:36:26', NULL),
(1, 84, '2021-12-13 07:37:41', NULL),
(1, 85, '2021-12-13 07:37:57', NULL),
(1, 86, '2021-12-17 17:21:36', NULL),
(1, 87, '2021-12-17 17:22:01', NULL),
(1, 88, '2021-12-25 18:19:19', NULL),
(1, 89, '2021-12-26 09:24:38', NULL),
(1, 95, '2022-03-23 07:23:05', NULL),
(1, 96, NULL, NULL),
(2, 61, '2021-12-13 07:37:26', NULL),
(2, 62, '2021-12-13 07:37:26', NULL),
(2, 63, '2021-12-13 07:37:26', NULL),
(2, 64, '2021-12-13 07:37:26', NULL),
(2, 65, '2021-12-13 07:37:26', NULL),
(2, 66, '2021-12-13 07:37:26', NULL),
(2, 67, '2021-12-13 07:37:26', NULL),
(2, 68, '2021-12-13 07:37:26', NULL),
(2, 72, '2021-12-13 07:37:26', NULL),
(2, 84, '2021-12-13 07:37:34', NULL),
(2, 85, '2021-12-13 07:38:12', NULL),
(3, 58, '2021-12-03 17:32:18', NULL),
(3, 59, '2021-12-03 17:32:26', NULL),
(3, 60, '2021-12-03 17:32:32', NULL),
(3, 69, '2021-12-03 17:49:03', NULL),
(3, 70, '2021-12-03 18:01:01', NULL),
(3, 71, '2021-12-03 20:54:01', NULL),
(3, 73, '2021-12-05 09:53:12', NULL),
(3, 74, '2021-12-05 09:53:12', NULL),
(3, 75, '2021-12-05 09:53:12', NULL),
(3, 76, '2021-12-05 09:54:16', NULL),
(3, 77, '2021-12-05 09:54:16', NULL),
(3, 78, '2021-12-07 14:04:06', NULL),
(3, 79, '2021-12-13 07:30:42', NULL),
(3, 80, '2021-12-13 07:30:59', NULL),
(3, 81, '2021-12-13 07:30:59', NULL),
(3, 82, '2021-12-13 07:35:14', NULL),
(3, 83, '2021-12-13 07:35:14', NULL),
(3, 86, '2021-12-17 17:21:44', NULL),
(3, 87, '2021-12-17 17:21:51', NULL),
(3, 88, '2021-12-25 18:19:34', NULL),
(3, 89, '2021-12-25 18:19:42', NULL),
(3, 91, NULL, NULL),
(3, 95, '2022-03-23 07:23:17', NULL),
(3, 96, '2022-03-23 07:23:22', NULL),
(4, 90, '2022-01-27 06:24:48', NULL),
(4, 91, '2022-01-27 06:25:05', NULL),
(5, 90, NULL, NULL),
(7, 92, '2022-01-27 06:39:49', NULL),
(7, 93, '2022-01-27 06:40:21', NULL),
(7, 94, '2022-01-27 06:40:21', NULL),
(8, 92, '2022-01-27 06:39:58', NULL),
(8, 93, '2022-01-27 06:40:09', NULL),
(8, 94, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE `reply_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `comment_id`, `user_id`, `challenge_id`, `body`, `created_at`, `updated_at`) VALUES
(30, 1, 1, 6, 'thanks', '2021-12-25 17:27:29', '2021-12-25 17:27:29'),
(31, 1, 1, 6, 'good', '2021-12-25 17:28:21', '2021-12-25 17:28:21'),
(32, 1, 1, 6, 'ok', '2021-12-25 17:28:40', '2021-12-25 17:28:40'),
(33, 3, 3, 4, '/..', '2021-12-26 10:52:56', '2021-12-26 10:52:56'),
(34, 3, 3, 4, '/..', '2021-12-26 10:52:58', '2021-12-26 10:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `challenge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Comment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `from`, `to`, `order_id`, `challenge_id`, `title`, `message`, `type`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 2, NULL, 'report 1', 'report on comment', 'Comment', '2021-12-31 15:28:13', '2021-12-31 15:28:13'),
(4, 2, 3, NULL, 6, 'report 2', 'report on comment', 'Comment', '2021-12-31 15:28:13', '2021-12-31 15:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HKKqWCPdLfV0ZKvt08vBrAD4OVLjl0N0O7isIbxM', 1, '10.0.0.4', 'Mozilla/5.0 (Linux; Android 9; Redmi 7A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTnJRNEVBaU9wZDUzenkwWThqTkU4eWJYTGZMU3d4UHluYWlnMUpLYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMC4wLjAuMjo4MDAwL3BhbmVscy9Vc2VyUGFuZWwvTXlDaGFsbGVuZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHlSVTh6MnBEMnpSZU43cnVmd01qdE9ndHlJTlJzUTdkUzBxMDFqR3hYY0lpNWMvaHg0ci4uIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR5UlU4ejJwRDJ6UmVON3J1ZndNanRPZ3R5SU5Sc1E3ZFMwcTAxakd4WGNJaTVjL2h4NHIuLiI7fQ==', 1648723000),
('mcx5fA5IEIGKaqQkjb1bX3F9AZl14xyA6xk5UgAJ', 1, '10.0.0.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQ1BjMlBqRWkyaGhVVUo4d29ZOG5KVnpaS1FKeDhGQTlST0VvOENxaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly8xMC4wLjAuMjo4MDAwL3BhbmVscy9Vc2VyUGFuZWwvQ2hhbGxlbmdlcy9uZXdDaGFsbGVuZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkeVJVOHoycEQyelJlTjdydWZ3TWp0T2d0eUlOUnNRN2RTMHEwMWpHeFhjSWk1Yy9oeDRyLi4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHlSVTh6MnBEMnpSZU43cnVmd01qdE9ndHlJTlJzUTdkUzBxMDFqR3hYY0lpNWMvaHg0ci4uIjt9', 1648722381),
('TYql6n1R3bo8sHxmTdmM7Zua4xkmenH6B04RG7D6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWHN1bXd0VGpORGdseUN3RXNhbkJMWUZkMjZ1bEZXWTU4UGdHc05YTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcGFuZWxzL1VzZXJQYW5lbC9DaGFsbGVuZ2VzLzI5L3Nob3ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkeVJVOHoycEQyelJlTjdydWZ3TWp0T2d0eUlOUnNRN2RTMHEwMWpHeFhjSWk1Yy9oeDRyLi4iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHlSVTh6MnBEMnpSZU43cnVmd01qdE9ndHlJTlJzUTdkUzBxMDFqR3hYY0lpNWMvaHg0ci4uIjt9', 1648727293),
('YMnMq474BcKWshRgiQ43mrOEcDPCX374vvgAgQwY', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVkxOTzRINU9KVW4xVVBVMHBPRzQwOWxJek9CMUU2UG9SR2sxUUwzeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcGFuZWxzL0Rlc2lnbmVyUGFuZWwvQ2hhbGxlbmdlcy8yOS9zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEtRWDdnU09lbzRtTEdRRDlkLlNCZS5ROHRDdTl6RXBxVm9hL2ZEMVdiaE83Z3Vqa3dlQ3Y2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRLUVg3Z1NPZW80bUxHUUQ5ZC5TQmUuUTh0Q3U5ekVwcVZvYS9mRDFXYmhPN2d1amt3ZUN2NiI7fQ==', 1648727406);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide_shows`
--

CREATE TABLE `slide_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `artitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_shows`
--

INSERT INTO `slide_shows` (`id`, `admin_id`, `artitle`, `entitle`, `image`, `link`, `color`, `description`, `created_at`, `updated_at`) VALUES
(6, 6, 'سلايد1', 'slide 1', 'images/1641907617_2.jpg', 'google.com', '#ca2b2b', 'this is slide 1', '2022-01-11 11:26:57', '2022-01-11 11:26:57'),
(7, 6, 'سلايد2', 'slide 2', 'images/1641907649_1.jpg', 'google.com', '#bb3fe9', 'this is slide 2', '2022-01-11 11:27:29', '2022-01-11 11:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `admin_id`, `title`, `image`, `link`, `created_at`, `updated_at`) VALUES
(4, 6, 'insta', 'images/1641919490_insta.png', 'https://www.instagram.com/', '2022-01-11 14:44:50', '2022-01-11 14:44:50'),
(6, 6, 'facebook', 'images/1641919929_facebook.png', 'https://www.facebook.com/', '2022-01-11 14:52:09', '2022-01-11 14:52:09'),
(7, 6, 'linkedin', 'images/1641919969_linkedin.png', 'https://www.linkedin.com/', '2022-01-11 14:52:49', '2022-01-11 14:52:49'),
(8, 6, 'Twitter', 'images/1641919990_twitter.png', 'https://www.twitter.com/', '2022-01-11 14:53:11', '2022-01-11 14:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `left` int(11) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `designer_id`, `package_id`, `left`, `done`, `created_at`, `updated_at`) VALUES
(1, 1, '3', 1, 0, 5, '2021-12-12 05:20:44', '2021-12-12 10:18:43'),
(2, 1, '3', 2, 9, 1, '2021-12-13 06:50:00', '2021-12-13 13:23:13'),
(3, 1, '2', 2, 9, 1, '2021-12-13 07:39:41', '2022-03-17 08:36:41'),
(4, 1, '3', 1, 5, 0, '2021-12-13 07:54:18', '2021-12-13 07:54:18'),
(5, 1, '3', 1, 5, 0, '2021-12-13 07:54:58', '2021-12-13 07:54:58'),
(6, 4, '3', 1, 5, 0, '2022-01-27 06:23:12', '2022-01-27 06:23:12'),
(7, 7, '8', 1, 5, 0, '2022-01-27 06:27:16', '2022-01-27 06:27:16'),
(8, 7, '2', 2, 10, 0, '2022-01-27 07:00:16', '2022-01-27 07:00:17'),
(9, 7, '8', 2, 10, 0, '2022-01-27 07:01:48', '2022-01-27 07:01:48'),
(10, 3, '3', 2, 8, 2, '2022-03-23 07:08:42', '2022-03-23 07:16:56'),
(11, 3, '3', 3, 20, 0, '2022-03-23 07:19:38', '2022-03-23 07:19:38'),
(12, 1, '3', 2, 9, 1, '2022-03-23 07:21:27', '2022-03-23 07:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_orders`
--

CREATE TABLE `sub_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `subscriptions_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_status` enum('Accepted','need to edit','working on','under review') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'working on',
  `deadline` date NOT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_submitted` enum('submitted','working on','Delayed','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_orders`
--

INSERT INTO `sub_orders` (`id`, `user_id`, `designer_id`, `subscriptions_id`, `title`, `description`, `image`, `work_image`, `work_file`, `type`, `work_status`, `deadline`, `user_note`, `designer_note`, `work_submitted`, `file_name`, `file_ext`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'subscribtion order 1', 'subscribtion order 1', 'images/1639298844_1.jpeg', 'images/1639307399_Untitled (2).png', 'files/1639307399_facebook_messenger_chat.html', 'Video Editing', 'Accepted', '2022-01-03', 'ThANKS', 'thats good', 'submitted', 'facebook_messenger_chat.html', 'html', '2021-12-12 05:24:17', '2021-12-12 09:10:34'),
(2, 1, 3, 1, 'subscribtion order 2', 'subscribtion order 2', 'images/1639293857_images_1637509906_http___localhost_8000_images_bg4 (2).png', 'images/1639311523_1.jpeg', 'files/1639311523_خطة موقع شيزاينر.pdf', 'Graphic design', 'Accepted', '2022-01-02', 'thank you', 'your work', 'submitted', 'خطة موقع شيزاينر.pdf', 'pdf', '2021-12-12 06:47:24', '2021-12-12 10:19:06'),
(3, 1, 3, 1, 'order1', 'order 1', 'images/1639339484_Untitled (2).png', 'images/1639308872_IMG_٢٠٢١٠٩٠٥_١٥٥٣٠٠.jpg', 'files/1639308872_خطة موقع شيزاينر.pdf', 'Graphic design', 'Accepted', '2022-01-03', 'f', 'good', 'submitted', 'خطة موقع شيزاينر.pdf', 'pdf', '2021-12-12 09:23:24', '2021-12-12 18:04:44'),
(4, 1, 3, 2, 'order', 'order', 'images/1639385646_1.jpeg', 'images/1639408993_7-desktop-wallpapers-hd-4k-صور-خلفيات-كمبيوتر-سطح-المكتب-scaled.jpg', 'files/1639408993_chesigner (9).sql', 'Graphic design', 'Accepted', '2022-01-03', 'good', 'good', 'submitted', 'chesigner (9).sql', 'txt', '2021-12-13 06:54:06', '2021-12-13 13:28:13'),
(5, 1, 3, 2, 'order 2', 'order 2', 'images/1643271663_2013-07-Flowers-Wallpaper-Background.jpg', NULL, NULL, 'Graphic design', 'working on', '2022-02-01', NULL, NULL, 'working on', NULL, NULL, '2022-01-27 06:21:03', '2022-01-27 06:21:03'),
(6, 4, 3, 6, 'order 1', 'order 1', 'images/1643271837_insta.png', NULL, NULL, 'Graphic design', 'working on', '2022-02-02', NULL, NULL, 'working on', NULL, NULL, '2022-01-27 06:23:57', '2022-01-27 06:23:57'),
(9, 7, 8, 7, 'order 1', '1111', 'images/1643272741_3537.jpg', NULL, NULL, 'Graphic design', 'working on', '2022-02-04', NULL, NULL, 'working on', NULL, NULL, '2022-01-27 06:39:01', '2022-01-27 06:39:01'),
(10, 7, 8, 7, 'orde 2', '2222222222', 'images/1643272881_7-desktop-wallpapers-hd-4k-صور-خلفيات-كمبيوتر-سطح-المكتب-scaled.jpg', NULL, NULL, 'Video Editing', 'working on', '2022-02-04', NULL, NULL, 'working on', NULL, NULL, '2022-01-27 06:41:21', '2022-01-27 06:41:21'),
(11, 1, 2, 3, 'derewr', 'ggreg', 'images/1647513373_sms.png', 'images/1647513401_3.png', 'files/1647513401_3.png', 'Graphic design', 'Accepted', '2022-03-22', 'oi6o987', 'kyyuk', 'submitted', '3.png', 'png', '2022-03-17 08:36:13', '2022-03-17 08:38:35'),
(12, 3, 3, 10, 'dwgdsg', 'wqewqe', 'images/1648026568_640px-Facebook_icon.svg.png', 'images/1648026696_IMG_2876.png', 'files/1648026696_640px-Facebook_icon.svg.png', 'Graphic design', 'under review', '2022-03-30', NULL, 'good', 'working on', '640px-Facebook_icon.svg.png', 'png', '2022-03-23 07:09:28', '2022-03-23 07:11:36'),
(13, 3, 3, 10, 'aaaaaaa', 'aaaaaaaaa', 'images/1648026995_sms.png', 'images/1648027015_sms.png', 'files/1648027015_640px-Facebook_icon.svg.png', 'Graphic design', 'under review', '2022-03-30', NULL, 'aaaaaaa', 'working on', '640px-Facebook_icon.svg.png', 'png', '2022-03-23 07:16:35', '2022-03-23 07:16:56'),
(14, 1, 3, 12, 'bbbbbbbbbbbbbbbbb', 'bbbbbbb', 'images/1648027314_IMG_2876.png', 'images/1648027354_IMG_2876.png', 'files/1648027354_640px-Facebook_icon.svg.png', 'Graphic design', 'Accepted', '2022-03-28', 'good', 'bbbbbb', 'submitted', '640px-Facebook_icon.svg.png', 'png', '2022-03-23 07:21:54', '2022-03-23 07:23:31'),
(15, 1, 3, 12, 'dddddddd', 'ddddd', 'images/1648027583_sms.png', NULL, NULL, 'Graphic design', 'working on', '2022-03-28', NULL, NULL, 'working on', NULL, NULL, '2022-03-23 07:26:04', '2022-03-23 07:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `sub_works`
--

CREATE TABLE `sub_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriptions_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberOfWorks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_works`
--

INSERT INTO `sub_works` (`id`, `subscriptions_id`, `file`, `image`, `numberOfWorks`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 5, '2021-12-11 14:12:28', '2021-12-11 14:12:28'),
(2, 2, NULL, NULL, 10, '2021-12-11 14:13:03', '2021-12-11 14:13:03'),
(3, 3, NULL, NULL, 5, '2021-12-11 14:22:14', '2021-12-11 14:22:14'),
(4, 1, NULL, NULL, 5, '2021-12-12 05:20:44', '2021-12-12 05:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'haitham\'s Team', 1, '2021-12-03 10:52:48', '2021-12-03 10:52:48'),
(2, 2, 'ahmed\'s Team', 1, '2021-12-03 10:53:23', '2021-12-03 10:53:23'),
(3, 3, 'hethmjal4@gmail.com\'s Team', 1, '2021-12-03 13:57:02', '2021-12-03 13:57:02'),
(4, 4, 'aaaaaaa\'s Team', 1, '2021-12-23 10:43:20', '2021-12-23 10:43:20'),
(5, 5, 'bbbB\'s Team', 1, '2021-12-23 10:46:00', '2021-12-23 10:46:00'),
(6, 6, 'admin\'s Team', 1, '2021-12-28 10:30:33', '2021-12-28 10:30:33'),
(7, 7, 'asd\'s Team', 1, '2022-01-20 07:58:06', '2022-01-20 07:58:06'),
(8, 8, 'hayitham\'s Team', 1, '2022-01-20 08:02:05', '2022-01-20 08:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_policies`
--

CREATE TABLE `terms_and_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `ardes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `endes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_policies`
--

INSERT INTO `terms_and_policies` (`id`, `admin_id`, `ardes`, `endes`, `created_at`, `updated_at`) VALUES
(1, 6, '1 القوانين', 'terms and policy 1', '2022-01-02 12:00:40', '2022-01-12 06:59:41'),
(2, 6, 'قوانين 2', 'terms and policy 2', '2022-01-02 12:03:22', '2022-01-12 07:00:31'),
(3, 6, 'القوانين 3', 'terms and policy 3', '2022-01-12 07:00:51', '2022-01-12 07:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','designer','block','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` enum('Expert','Professional','Ordinary','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','unActive','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `type`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `background_photo_path`, `degree`, `status`, `created_at`, `updated_at`) VALUES
(1, 'haitham', 'hethmjal5@gmail.com', NULL, '$2y$10$yRU8z2pD2zReN7rufwMjtOgtyINRsQ7dS0q01jGxXcIi5c/hx4r..', '546456236', 'user', NULL, NULL, 'ILJeBNnhyZ4ja9HteKmYvyHiHNJMUH9Q5CZllgdSnEDQCe4d3dWRkgisWkqE', 1, 'images/1639388170_http___localhost_8000_images_bg4 (2).png', 'images/1638976621_2013-07-Flowers-Wallpaper-Background.jpg', NULL, 'Active', '2021-12-03 10:52:48', '2021-12-13 07:36:10'),
(2, 'ahmed', 'hethmjal6@gmail.com', NULL, '$2y$10$r/y/Ac2UcloLrfrI.feqIOnRwEJeoT49Dk4ZIdQggZ2CRoCbnKC2m', '54654626', 'designer', NULL, NULL, NULL, 2, 'images/1639388330_home (1).png', 'images/1639388330_smartmockups_kr3mooyh.jpg', 'Ordinary', 'Active', '2021-12-03 10:53:23', '2021-12-13 07:38:50'),
(3, 'hethmjal4@gmail.com', 'hethmjal4@gmail.com', NULL, '$2y$10$KQX7gSOeo4mLGQD9d.SBe.Q8tCu9zEpqVoa/fD1WbhO7gujkweCv6', '696688679546', 'designer', NULL, NULL, 'IsQeFDvuGeTB8xDil4IfDxvHKeh4tpFljcr4axEsBYOx5rMI5uN94aYSKlgc', 3, 'images/1639389146_Wallpaper k4.jpg', 'images/1639389099_Untitled (2).png', 'Professional', 'unActive', '2021-12-03 13:57:02', '2022-01-02 09:11:32'),
(4, 'aaaaaaa', 'aaa@aaa.com', NULL, '$2y$10$Als85oRVu9BRazl82yS98eC3lll9V41DefA5SSBY47g3bSHuVcj6G', NULL, 'user', NULL, NULL, NULL, 4, NULL, NULL, NULL, 'Active', '2021-12-23 10:43:20', '2022-01-02 09:58:43'),
(5, 'bbbB', 'bbbb@bbbb', NULL, '$2y$10$/CaZnTlG6NMFjpTM.5lwsOJbogDN1z7y.OfUyeMN5CwNtNAsY4o6S', NULL, 'designer', NULL, NULL, NULL, 5, NULL, NULL, NULL, 'Active', '2021-12-23 10:46:00', '2021-12-23 10:46:00'),
(6, 'admin', 'admin@gmail.com', NULL, '$2y$10$xjko75lISo8BgdNi0QPAAOIcstLdnqvxeTWsFgibH6bl/KmaE6aV.', NULL, 'admin', NULL, NULL, NULL, 6, 'images/1639389146_Wallpaper k4.jpg', NULL, NULL, 'Active', '2021-12-28 10:30:33', '2021-12-28 10:30:33'),
(7, 'asd asd', 'hethmjal511@gmail.com', NULL, '$2y$10$NfCr6bCGofFkwt1e56cXXePORyNm3JFNVN55f5grzsmnSGW/uAvce', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-01-20 07:58:06', '2022-01-20 07:58:06'),
(8, 'hayitham jalhoum', 'luayjal@gmail.com', NULL, '$2y$10$u5bZa/y1ZIMMpHKmUh2LHeGkxYXBOU6GFtX4Q8hjCll4bDAcBMoQO', NULL, 'designer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '2022-01-20 08:02:05', '2022-01-20 08:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

CREATE TABLE `working_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_hours`
--

INSERT INTO `working_hours` (`id`, `user_id`, `hours`, `created_at`, `updated_at`) VALUES
(1, 3, '7', '2021-12-08 14:06:18', '2021-12-08 14:06:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_designers`
--
ALTER TABLE `about_designers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_designers_user_id_foreign` (`user_id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_user_id_foreign` (`user_id`);

--
-- Indexes for table `challenges_orders`
--
ALTER TABLE `challenges_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_orders_challenge_id_foreign` (`challenge_id`),
  ADD KEY `challenges_orders_designer_id_foreign` (`designer_id`);

--
-- Indexes for table `challenge_data`
--
ALTER TABLE `challenge_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_data_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `challenge_files`
--
ALTER TABLE `challenge_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `challenge_works`
--
ALTER TABLE `challenge_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_works_challenge_id_foreign` (`challenge_id`),
  ADD KEY `challenge_works_designer_id_foreign` (`designer_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user_id_foreign` (`user_id`),
  ADD KEY `conversations_last_message_id_foreign` (`last_message_id`);

--
-- Indexes for table `designer_packages`
--
ALTER TABLE `designer_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer_packages_designer_id_foreign` (`designer_id`),
  ADD KEY `designer_packages_package_id_foreign` (`packages_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_order_id_foreign` (`order_id`),
  ADD KEY `evaluations_subscriptions_id_foreign` (`challengeWork_id`),
  ADD KEY `evaluations_user_id_foreign` (`user_id`),
  ADD KEY `evaluations_designer_id_foreign` (`designer_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `favorite_designers`
--
ALTER TABLE `favorite_designers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_designers_user_id_foreign` (`user_id`),
  ADD KEY `favorite_designers_designer_id_foreign` (`designer_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_work_id_user_id_unique` (`work_id`,`user_id`),
  ADD KEY `likes_challenge_id_foreign` (`challenge_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_designer_id_foreign` (`designer_id`);

--
-- Indexes for table `order__works`
--
ALTER TABLE `order__works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__works_designer_id_foreign` (`designer_id`),
  ADD KEY `order__works_order_id_foreign` (`order_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_orders`
--
ALTER TABLE `packages_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_orders_designer_id_foreign` (`designer_id`),
  ADD KEY `packages_orders_user_id_foreign` (`user_id`),
  ADD KEY `packages_orders_package_id_foreign` (`package_id`),
  ADD KEY `packages_orders_designer_package_id_foreign` (`designer_package_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`conversation_id`,`user_id`),
  ADD KEY `participants_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_user_id_foreign` (`user_id`);

--
-- Indexes for table `programers`
--
ALTER TABLE `programers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programers_user_id_foreign` (`user_id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`user_id`,`message_id`),
  ADD KEY `recipients_message_id_foreign` (`message_id`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_comments_comment_id_foreign` (`comment_id`),
  ADD KEY `reply_comments_user_id_foreign` (`user_id`),
  ADD KEY `reply_comments_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_from_foreign` (`from`),
  ADD KEY `reports_to_foreign` (`to`),
  ADD KEY `reports_order_id_foreign` (`order_id`),
  ADD KEY `reports_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `slide_shows`
--
ALTER TABLE `slide_shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slide_shows_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_media_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_package_id_foreign` (`package_id`);

--
-- Indexes for table `sub_orders`
--
ALTER TABLE `sub_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_orders_user_id_foreign` (`user_id`),
  ADD KEY `sub_orders_designer_id_foreign` (`designer_id`),
  ADD KEY `sub_orders_subscriptions_id_foreign` (`subscriptions_id`);

--
-- Indexes for table `sub_works`
--
ALTER TABLE `sub_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_works_subscription_id_foreign` (`subscriptions_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `terms_and_policies`
--
ALTER TABLE `terms_and_policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_policies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `working_hours_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_designers`
--
ALTER TABLE `about_designers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `challenges_orders`
--
ALTER TABLE `challenges_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `challenge_data`
--
ALTER TABLE `challenge_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `challenge_files`
--
ALTER TABLE `challenge_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `challenge_works`
--
ALTER TABLE `challenge_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designer_packages`
--
ALTER TABLE `designer_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorite_designers`
--
ALTER TABLE `favorite_designers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order__works`
--
ALTER TABLE `order__works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages_orders`
--
ALTER TABLE `packages_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programers`
--
ALTER TABLE `programers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_shows`
--
ALTER TABLE `slide_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_orders`
--
ALTER TABLE `sub_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_works`
--
ALTER TABLE `sub_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_policies`
--
ALTER TABLE `terms_and_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_designers`
--
ALTER TABLE `about_designers`
  ADD CONSTRAINT `about_designers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenges_orders`
--
ALTER TABLE `challenges_orders`
  ADD CONSTRAINT `challenges_orders_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `challenges_orders_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_data`
--
ALTER TABLE `challenge_data`
  ADD CONSTRAINT `challenge_data_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_files`
--
ALTER TABLE `challenge_files`
  ADD CONSTRAINT `challenge_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `challenge_works`
--
ALTER TABLE `challenge_works`
  ADD CONSTRAINT `challenge_works_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `challenge_works_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_last_message_id_foreign` FOREIGN KEY (`last_message_id`) REFERENCES `messages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `designer_packages`
--
ALTER TABLE `designer_packages`
  ADD CONSTRAINT `designer_packages_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `designer_packages_package_id_foreign` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_designers`
--
ALTER TABLE `favorite_designers`
  ADD CONSTRAINT `favorite_designers_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_designers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `challenge_works` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order__works`
--
ALTER TABLE `order__works`
  ADD CONSTRAINT `order__works_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order__works_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `packages_orders`
--
ALTER TABLE `packages_orders`
  ADD CONSTRAINT `packages_orders_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_orders_designer_package_id_foreign` FOREIGN KEY (`designer_package_id`) REFERENCES `designer_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_orders_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `programers`
--
ALTER TABLE `programers`
  ADD CONSTRAINT `programers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipients`
--
ALTER TABLE `recipients`
  ADD CONSTRAINT `recipients_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD CONSTRAINT `reply_comments_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`),
  ADD CONSTRAINT `reply_comments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_to_foreign` FOREIGN KEY (`to`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `slide_shows`
--
ALTER TABLE `slide_shows`
  ADD CONSTRAINT `slide_shows_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `social_media`
--
ALTER TABLE `social_media`
  ADD CONSTRAINT `social_media_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_orders`
--
ALTER TABLE `sub_orders`
  ADD CONSTRAINT `sub_orders_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_orders_subscriptions_id_foreign` FOREIGN KEY (`subscriptions_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_works`
--
ALTER TABLE `sub_works`
  ADD CONSTRAINT `sub_works_subscription_id_foreign` FOREIGN KEY (`subscriptions_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_policies`
--
ALTER TABLE `terms_and_policies`
  ADD CONSTRAINT `terms_and_policies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
