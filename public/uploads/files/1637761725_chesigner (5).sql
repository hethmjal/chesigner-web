-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 01:15 PM
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

--
-- Dumping data for table `about_designers`
--

INSERT INTO `about_designers` (`id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(15, 3, '<p><strong>Lorem Ipsumm</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2021-11-15 07:31:04', '2021-11-15 10:53:09'),
(16, 6, '<p>hyitham</p>', '2021-11-23 09:29:03', '2021-11-23 09:29:03');

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
(6, 3, 'Graphic designer', 'palestine university', 'Bachelors degree', '2015-02-18', '2021-11-12', '2021-11-15 07:14:22', '2021-11-15 08:01:29'),
(7, 4, 'animation', 'animatio uni', 'Bachelors degree', '2020-05-03', '2021-12-02', '2021-11-15 09:43:48', '2021-11-15 09:43:48');

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
(4, 3, 'Graphic designer', 'designer company', '2019-07-09', '2021-11-10', 'Part Time', '2021-11-14 19:21:16', '2021-11-15 10:54:57');

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
(10, '2021_11_13_152056_create_about_designers_table', 2),
(11, '2021_11_13_164957_create_education_table', 3),
(12, '2021_11_13_180120_create_experiences_table', 4),
(13, '2021_11_13_184103_create_skills_table', 5),
(14, '2021_11_14_080936_create_programers_table', 6),
(15, '2021_11_14_125821_create_working_hours_table', 7),
(16, '2021_11_14_132732_create_portfolios_table', 8),
(18, '2021_11_15_102625_added_type_to_user_', 9),
(19, '2021_11_17_174109_create_orders_table', 10),
(20, '2021_11_21_141233_create_order__works_table', 11),
(21, '2021_11_21_191515_create_notifications_table', 12);

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
('00ec990c-8e8c-4ab0-aeb7-c161e435378b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham accept your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 minute ago\",\"order_id\":37}', '2021-11-23 07:16:15', '2021-11-23 06:54:41', '2021-11-23 07:16:15'),
('0e198db4-451b-46a8-8bf8-5327b58f205e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"work added\",\"body\":\"Designer hayitham add a work order 8\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":9}', '2021-11-23 08:19:50', '2021-11-23 08:16:14', '2021-11-23 08:19:50'),
('15f44797-9919-40a2-a847-149af825f8a5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":39}', '2021-11-23 07:20:46', '2021-11-23 07:19:42', '2021-11-23 07:20:46'),
('29499f45-82b1-4282-a614-3e5347ed2dfe', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":49}', '2021-11-23 08:02:35', '2021-11-23 08:02:25', '2021-11-23 08:02:35'),
('2a408642-0591-43bf-b09d-0882cfad5884', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a note from ahmed ahmed\",\"body\":\"userahmed ahmed accept your work in order order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"3 minutes ago\",\"order_id\":45}', '2021-11-23 07:59:03', '2021-11-23 07:58:06', '2021-11-23 07:59:03'),
('3797fd57-711b-471a-900e-3cd08441f1cd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham accept your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"46 minutes ago\",\"order_id\":35}', '2021-11-23 06:34:56', '2021-11-23 06:32:34', '2021-11-23 06:34:56'),
('3b509b8f-e888-4443-aeb3-86a9bfe0be16', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"work added\",\"body\":\"Designer hayitham add a work order 6\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2021-11-23 08:09:17', '2021-11-23 08:09:05', '2021-11-23 08:09:17'),
('3c1cc6cf-678c-46c6-9d8a-1203d232edbd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":35}', '2021-11-23 06:52:32', '2021-11-23 05:46:18', '2021-11-23 06:52:32'),
('3c3713ef-9ba6-473f-a551-4ab63798ac27', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham accept your invitation\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"5 minutes ago\",\"order_id\":41}', '2021-11-23 07:53:00', '2021-11-23 07:29:22', '2021-11-23 07:53:00'),
('43c1c7c1-b92c-4a92-8ef8-11aa122daaf2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client hayitham jalhoum invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":33}', '2021-11-22 03:39:27', '2021-11-22 03:18:06', '2021-11-22 03:39:27'),
('4477fcb8-353e-4b16-8aa8-f064d5463038', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":34}', NULL, '2021-11-23 05:46:15', '2021-11-23 05:46:15'),
('462a074b-84ee-487a-9cc4-2bb1ace89201', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"order accepted\",\"body\":\"Designer hayitham accept your invitation order 8\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"13 seconds ago\",\"order_id\":53}', '2021-11-23 08:15:07', '2021-11-23 08:14:57', '2021-11-23 08:15:07'),
('5085dbe6-b92b-4308-a57d-fb1e723ff325', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":51}', '2021-11-23 08:08:41', '2021-11-23 08:06:58', '2021-11-23 08:08:41'),
('508e28af-8c6d-4612-a629-30270e13ccd2', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":46}', NULL, '2021-11-23 08:01:50', '2021-11-23 08:01:50'),
('56fbb5a1-b339-4099-8b16-fd92e734f12d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":36}', NULL, '2021-11-23 06:53:13', '2021-11-23 06:53:13'),
('58a577cf-eb81-4ec5-8e2a-5005ef591789', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":53}', '2021-11-23 08:14:50', '2021-11-23 08:14:44', '2021-11-23 08:14:50'),
('66360114-6517-4563-93a5-35f979bcebbc', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham rejected your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"rejected\",\"created_at\":\"24 minutes ago\",\"order_id\":33}', '2021-11-22 03:44:02', '2021-11-22 03:42:42', '2021-11-22 03:44:02'),
('674ae4f0-bb11-48f3-ac13-083649a165e9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham accept your invitation\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"38 seconds ago\",\"order_id\":45}', '2021-11-23 07:55:10', '2021-11-23 07:54:30', '2021-11-23 07:55:10'),
('718ac1e7-42e1-4416-aa39-8ba1580bb02e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"order accepted\",\"body\":\"Designer hayitham accept your invitation order 6\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"32 seconds ago\",\"order_id\":49}', '2021-11-23 08:03:11', '2021-11-23 08:02:57', '2021-11-23 08:03:11'),
('79f06ae8-633e-4af3-a979-02c8dc6ddc78', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"work added\",\"body\":\"Designer hayitham add a work order 6\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":8}', '2021-11-23 08:03:41', '2021-11-23 08:03:30', '2021-11-23 08:03:41'),
('7a17f774-5b27-4a6e-9e51-9800a01ce8e4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":43}', '2021-11-23 07:25:24', '2021-11-23 07:24:50', '2021-11-23 07:25:24'),
('8236887e-24d4-4621-86ff-7f1da97280ae', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":38}', NULL, '2021-11-23 07:19:41', '2021-11-23 07:19:41'),
('85efc69b-8bac-4392-8ee4-eec65153f7a4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":42}', NULL, '2021-11-23 07:24:48', '2021-11-23 07:24:48'),
('890b7fb1-9c64-485b-8721-48d5d4fcff35', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":57}', NULL, '2021-11-23 09:32:24', '2021-11-23 09:32:24'),
('8adff047-ef43-4de9-8d82-61ea36784433', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":55}', NULL, '2021-11-23 09:25:20', '2021-11-23 09:25:20'),
('8e6e9376-2dab-47f0-8e2e-27de4bbc0639', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"order rejected\",\"body\":\"Desiogner hayitham rejected your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"rejected\",\"created_at\":\"27 seconds ago\",\"order_id\":43}', '2021-11-23 07:27:51', '2021-11-23 07:25:17', '2021-11-23 07:27:51'),
('9383d544-5094-4ec9-b634-2cb579453286', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a note from ahmed ahmed\",\"body\":\"userahmed ahmed accept your work in order order 6\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 minute ago\",\"order_id\":49}', '2021-11-23 08:06:07', '2021-11-23 08:04:03', '2021-11-23 08:06:07'),
('9435e22b-219c-486f-841f-fd90bde13980', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userahmed ahmed accept your work in order order 8\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"6 minutes ago\",\"order_id\":53}', '2021-11-23 08:21:38', '2021-11-23 08:21:29', '2021-11-23 08:21:38'),
('98e8b710-1549-4332-9bd2-8a585a7f9e9c', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":37}', '2021-11-23 07:07:23', '2021-11-23 06:53:15', '2021-11-23 07:07:23'),
('9fda9c86-a452-4da9-8720-115cc1982f3b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":44}', NULL, '2021-11-23 07:53:51', '2021-11-23 07:53:51'),
('a54941c0-6a99-4320-ac1a-bdff1d371ae7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":48}', NULL, '2021-11-23 08:02:23', '2021-11-23 08:02:23'),
('ade45834-5e98-4670-a31d-d1feb44f0630', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":52}', NULL, '2021-11-23 08:14:40', '2021-11-23 08:14:40'),
('b669d615-dbfa-4387-ac44-4fd54286cf91', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":40}', NULL, '2021-11-23 07:23:33', '2021-11-23 07:23:33'),
('b9f2dfd5-b46f-4823-aa4b-06d72d79c9d3', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":45}', '2021-11-23 07:54:19', '2021-11-23 07:53:52', '2021-11-23 07:54:19'),
('bf519beb-4ef1-400e-8f64-33dee6d7f8cf', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":47}', '2021-11-23 08:02:35', '2021-11-23 08:01:51', '2021-11-23 08:02:35'),
('c3e9fb6d-2242-445f-8c2a-6a9c307d81ab', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":58}', NULL, '2021-11-23 09:33:31', '2021-11-23 09:33:31'),
('d6e494e4-8cb4-4f9d-9289-8e2aebd6271f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":41}', '2021-11-23 07:25:24', '2021-11-23 07:23:34', '2021-11-23 07:25:24'),
('dad2f1cd-cbf5-4d3f-acc9-1d9810467b6a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":50}', NULL, '2021-11-23 08:06:56', '2021-11-23 08:06:56'),
('dad523dd-9228-40cc-9c49-287f8f8b6db7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"work added\",\"body\":\"Designer hayitham add a work\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":7}', '2021-11-23 07:56:47', '2021-11-23 07:55:47', '2021-11-23 07:56:47'),
('db8c0363-7f14-4436-af53-907bb6e2fb7d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"order rejected\",\"body\":\"Desiogner hayitham rejected your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"rejected\",\"created_at\":\"12 seconds ago\",\"order_id\":39}', '2021-11-23 07:20:41', '2021-11-23 07:19:54', '2021-11-23 07:20:41'),
('dd36f483-cedc-433f-bb83-e2ce6725704f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client hayitham jalhoum invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":32}', NULL, '2021-11-22 03:18:04', '2021-11-22 03:18:04'),
('dfe9dff7-3f89-43fe-8317-4b4b09429608', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"order rejected\",\"body\":\"Designer hayitham reject your invitation order 5\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"rejected\",\"created_at\":\"52 seconds ago\",\"order_id\":47}', '2021-11-23 08:02:52', '2021-11-23 08:02:43', '2021-11-23 08:02:52'),
('e058cb31-31fc-4dde-845a-bb7bc90b4f14', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 6, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":56}', NULL, '2021-11-23 09:31:08', '2021-11-23 09:31:08'),
('e232b1f6-7792-470e-97d1-03697a599895', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client ahmed ahmed invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":54}', NULL, '2021-11-23 09:23:41', '2021-11-23 09:23:41'),
('fcf947a9-0f3b-4317-b02d-62250615096a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 5, '{\"title\":\"you have a new order\",\"body\":\"Desiogner hayitham accept your invitation\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"48 minutes ago\",\"order_id\":35}', '2021-11-23 06:34:56', '2021-11-23 06:34:31', '2021-11-23 06:34:56');

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
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('waiting to response','Accepted','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting to response',
  `work_submitted` enum('working on','submitted','Delayed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'working on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `designer_id`, `designer_name`, `title`, `description`, `image`, `type`, `deadline`, `status`, `work_submitted`, `created_at`, `updated_at`) VALUES
(2, 5, 6, 'hayitham', 'new order', 'new order new order new order new order new order new order new order new order new order new order new order', 'images/1637653789_21833077_400.png', 'Graphic design', '2021-12-06', 'Accepted', 'working on', '2021-11-19 11:54:22', '2021-11-23 10:09:44'),
(37, 5, 6, 'hayitham', 'order 2', 'order 2  order 2  order 2  order 2  order 2  order 2  order 2  order 2', 'images/1637657595_11.jpg', 'Graphic design', '2021-12-01', 'Accepted', 'working on', '2021-11-23 06:53:15', '2021-11-23 06:54:06'),
(41, 5, 6, 'hayitham', 'khmfgh', 'jtfjfgjg', 'images/1637659414_11.jpg', 'Graphic design', '2021-12-09', 'Accepted', 'working on', '2021-11-23 07:23:34', '2021-11-23 07:29:22'),
(45, 5, 6, 'hayitham', 'order 4', 'order 4order 4order 4', 'images/1637661232_500x500.png', 'Graphic design', '2021-11-29', 'Accepted', 'working on', '2021-11-23 07:53:52', '2021-11-23 09:12:46'),
(49, 5, 6, 'hayitham', 'order 6', 'order 6', 'images/1637661745_a.jpg', 'Graphic design', '2021-12-10', 'Accepted', 'working on', '2021-11-23 08:02:25', '2021-11-23 08:02:57'),
(53, 5, 6, 'hayitham', 'order 8', 'order 8', 'images/1637662484_b.jpg', 'Graphic design', '2021-12-10', 'Accepted', 'working on', '2021-11-23 08:14:44', '2021-11-23 08:14:57');

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
  `file_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ext` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Accepted','edit','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__works`
--

INSERT INTO `order__works` (`id`, `designer_id`, `order_id`, `image`, `file`, `file_name`, `file_ext`, `status`, `designer_note`, `user_note`, `created_at`, `updated_at`) VALUES
(4, 6, 2, 'images/1637509906_http___localhost_8000_images_bg4 (2).png', 'files/1637509906_سكتش1.pdf', 'سكتش1.pdf', 'pdf', 'Accepted', 'this is your work !', 'Thank you', '2021-11-21 13:51:46', '2021-11-23 06:25:48'),
(5, 6, 37, 'images/1637658365_qrcode.png', 'files/1637658365_ملاحظات التسليم.pdf', 'ملاحظات التسليم.pdf', 'pdf', 'Accepted', 'you work files', 'Thank you', '2021-11-23 06:54:41', '2021-11-23 07:07:12'),
(6, 6, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-23 07:29:22', '2021-11-23 07:29:22'),
(7, 6, 45, 'images/1637661347_qrcode.png', 'files/1637661347_ملاحظات التسليم.pdf', 'ملاحظات التسليم.pdf', 'pdf', 'Accepted', 'your work files', 'Thank you', '2021-11-23 07:54:30', '2021-11-23 07:57:35'),
(8, 6, 49, 'images/1637662145_qrcode.png', 'files/1637662145_ملاحظات التسليم.pdf', 'ملاحظات التسليم.pdf', 'pdf', 'Accepted', 'work', 'thank youuuu', '2021-11-23 08:02:57', '2021-11-23 08:09:05'),
(9, 6, 53, 'images/1637662574_qrcode.png', 'files/1637662574_ملاحظات التسليم.pdf', 'ملاحظات التسليم.pdf', 'pdf', 'Accepted', 'work', 'thank you', '2021-11-23 08:14:57', '2021-11-23 08:21:29');

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
(21, 3, 'ui ux design', 'images/1636924600_IMG_٢٠٢١٠٩٠٥_١٥٥٣٠٠.jpg', '2021-11-14 18:46:31', '2021-11-14 19:16:40'),
(22, 3, 'ui ux design 3', 'images/1636981001_IMG_٢٠٢١٠٩٠٥_١٥٥٢٥١.jpg', '2021-11-14 18:46:51', '2021-11-15 10:56:41'),
(23, 3, 'new project', 'images/1636924651_Certificate.jpg', '2021-11-14 19:17:31', '2021-11-14 19:17:31');

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
(2, 3, 'Adobe Photoshop', '5', '2021-11-14 19:22:02', '2021-11-14 19:22:02'),
(3, 3, 'Adobe Photoshop', '4', '2021-11-14 19:22:13', '2021-11-15 10:55:39');

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
('wN5dYcZZPn4Jki13k5UIBTAAkWaBAGkVDwV7ERvZ', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiYTIweDNlZUZibGZYTzI5ZlNMWm1sRjNkWTd6WkJvZFVhaDByVlVqbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU4OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcGFuZWxzL0Rlc2lnbmVyUGFuZWwvTXlQcm9maWxlL2Fib3V0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDFIWjhQVnJIdHoxLzUwRDYuWXk4S09lc2lKQlhvZmRRNzIzMFlQUUwxYm9rNVQ3ZWhvZ2l5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQxSFo4UFZySHR6MS81MEQ2Lll5OEtPZXNpSkJYb2ZkUTcyMzBZUFFMMWJvazVUN2Vob2dpeSI7fQ==', 1637669128),
('xdk9jvilKLfeieQzuzupdRSWEjyw6ag0lhcTU8jy', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNkNFeGoyZ0M2M01JY3pYVlZiS0xUcDZYd2dCcnNCTDhWdXo2MWFPQSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHF1OTNMVk9NR1c4SGRrV1JCZEV1eHVncjB2aUZiV08zU0dEWTBJY0FnWmpnUnVUNWR1Z1dPIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3BhbmVscy9Vc2VyUGFuZWwvT3JkZXJzIjt9fQ==', 1637669502);

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

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skills`, `created_at`, `updated_at`) VALUES
(5, 1, 'Graphic design', '2021-11-14 05:45:07', '2021-11-14 05:45:07'),
(6, 1, 'Motion Graphic', '2021-11-14 05:45:07', '2021-11-14 05:45:07'),
(7, 1, 'Video Editing', '2021-11-14 05:45:07', '2021-11-14 05:45:07'),
(18, 3, 'Graphic design', '2021-11-15 08:13:16', '2021-11-15 08:13:16'),
(19, 3, 'Motion Graphic', '2021-11-15 08:13:16', '2021-11-15 08:13:16'),
(21, 3, 'Video Editing', '2021-11-15 10:55:21', '2021-11-15 10:55:21'),
(22, 3, 'Animation', '2021-11-15 10:55:22', '2021-11-15 10:55:22'),
(23, 6, 'Graphic design', '2021-11-17 16:13:34', '2021-11-17 16:13:34'),
(24, 6, 'Video Editing', '2021-11-17 16:13:34', '2021-11-17 16:13:34');

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
(1, 1, 'luay\'s Team', 1, '2021-11-13 11:29:33', '2021-11-13 11:29:33'),
(2, 3, 'hayitham\'s Team', 1, '2021-11-14 10:11:34', '2021-11-14 10:11:34'),
(3, 4, 'aaaaa\'s Team', 1, '2021-11-15 09:40:59', '2021-11-15 09:40:59'),
(4, 5, 'hayitham\'s Team', 1, '2021-11-17 15:31:56', '2021-11-17 15:31:56'),
(5, 6, 'hayitham\'s Team', 1, '2021-11-17 15:34:09', '2021-11-17 15:34:09');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','designer','block','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'luay jalhoum', 'aaaaa@gmail.com', NULL, '$2y$10$5NpJySVgxp7kuOB3PyYlSO1teiuE4QDbgXojJjwNE59cFbRaGhqI6', 'user', NULL, NULL, NULL, 1, NULL, '2021-11-13 11:29:33', '2021-11-13 11:29:35'),
(3, 'hayitham hayitham', 'hethmjal5@gmail.com', NULL, '$2y$10$L2NMlOOqG5DOWMhRQSvg9ePNfJjRyWm85wQ.5fURZXdypj1BMESXe', 'designer', NULL, NULL, NULL, 2, NULL, '2021-11-14 10:11:34', '2021-11-14 10:11:34'),
(4, 'aaaaa', 'aaa@gmail.com', NULL, '$2y$10$KygYGrSEvLG9.gCwHa5F6uwmfkqCWrRcFEwvz2FDcjb7ETR95a7eq', 'user', NULL, NULL, NULL, 3, NULL, '2021-11-15 09:40:59', '2021-11-15 09:41:00'),
(5, 'ahmed ahmed', 'hethmjal6@gmail.com', NULL, '$2y$10$qu93LVOMGW8HdkWRBdEuxugr0viFbWO3SGDY0IcAgZjgRuT5dugWO', 'user', NULL, NULL, 'j81SFZXmuysMkv70sudrD8rTfAP5KuhA7LjMjTmUokSYQ87OMfc5zsdy0UHD', 4, NULL, '2021-11-17 15:31:56', '2021-11-17 15:31:57'),
(6, 'hayitham', 'hethmjal3@gmail.com', NULL, '$2y$10$1HZ8PVrHtz1/50D6.Yy8KOesiJBXofdQ7230YPQL1bok5T7ehogiy', 'designer', NULL, NULL, NULL, 5, NULL, '2021-11-17 15:34:09', '2021-11-17 15:34:10');

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
(6, 3, '7', '2021-11-15 07:39:07', '2021-11-15 10:55:50');

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
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

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
  ADD KEY `orders_designer_id_foreign` (`designer_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order__works`
--
ALTER TABLE `order__works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order__works_designer_id_foreign` (`designer_id`),
  ADD KEY `order__works_order_id_foreign` (`order_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order__works`
--
ALTER TABLE `order__works`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `programers`
--
ALTER TABLE `programers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_designers`
--
ALTER TABLE `about_designers`
  ADD CONSTRAINT `about_designers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order__works`
--
ALTER TABLE `order__works`
  ADD CONSTRAINT `order__works_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order__works_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
