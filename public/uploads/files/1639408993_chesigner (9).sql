-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 11:01 AM
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
(1, 3, '<p>i am designer</p>', '2021-12-08 14:01:33', '2021-12-08 14:01:33');

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
(2, 1, NULL, 'peer', '2021-12-03 13:58:31', '2021-12-13 07:35:14', 83);

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
(6, 2, 2, 'active');

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
(85, 1, 1, 'ok', 'text', '2021-12-13 07:37:57', '2021-12-13 07:37:57', NULL);

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
(30, '2021_12_11_163604_create_sub_orders_table', 4);

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
('0552c9e7-937e-4d2c-bc25-105f310a68fb', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-03 13:58:25', '2021-12-03 13:58:15', '2021-12-03 13:58:25'),
('0661110c-8f8c-4b73-92c4-bdc631577895', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 4\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new subsrcibe\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-13 07:54:29', '2021-12-13 07:54:18', '2021-12-13 07:54:29'),
('111767f3-1104-4477-8b13-e641ae6f477b', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-03 17:51:01', '2021-12-03 17:50:55', '2021-12-03 17:51:01'),
('12b8422c-d31e-483c-9eb0-8bc607561972', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"15 seconds ago\",\"order_id\":6}', '2021-12-12 05:08:56', '2021-12-10 09:48:11', '2021-12-12 05:08:56'),
('146374b5-1ef4-4ce0-b2b7-e05b67211940', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-03 13:43:00', '2021-12-03 13:42:50', '2021-12-03 13:43:00'),
('153f6017-476e-4a53-b358-f2b4da379fb7', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 09:28:09', '2021-12-12 18:06:28'),
('1b537621-5dd1-43cb-9a3d-667cf2ae37ac', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":6}', '2021-12-12 05:08:42', '2021-12-10 09:47:57', '2021-12-12 05:08:42'),
('250d9b50-db51-4ca9-963b-9911be06ff84', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-03 10:55:20', '2021-12-03 10:55:12', '2021-12-03 10:55:20'),
('379bb756-9971-4cb0-be01-fe7489858bc8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-12 08:27:05', '2021-12-12 08:26:13', '2021-12-12 08:27:05'),
('40b49561-d723-4936-886d-ab1b676dc861', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 09:23:24', '2021-12-13 07:42:32'),
('41b2ffd5-8322-4661-acb4-ac2063a66029', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 18:06:28', '2021-12-12 10:18:44', '2021-12-12 18:06:28'),
('60c0fd30-1d9b-4417-ab0c-2691be2810f4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:38:08', '2021-12-03 13:58:13', '2021-12-13 07:38:08'),
('6dad95b8-b651-451d-9569-7c2851b16dfa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a note from haitham\",\"body\":\"userhaitham need a edit in order order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"need to edit\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 09:34:00', '2021-12-13 07:42:32'),
('71b2d4f5-920b-40f8-936d-e86a7ca9fd77', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-13 07:42:32', '2021-12-12 10:19:06', '2021-12-13 07:42:32'),
('72f7c447-dcb8-4900-8813-9c9bab9c6544', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 2\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-13 07:42:32', '2021-12-13 06:54:06', '2021-12-13 07:42:32'),
('76cf26c0-5771-49c1-83ac-639e8345eb0e', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 2, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 3\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new subsrcibe\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-13 07:42:08', '2021-12-13 07:39:41', '2021-12-13 07:42:08'),
('7e5d7991-a85b-4ecb-9110-f90cfe8e20e9', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"38 seconds ago\",\"order_id\":3}', '2021-12-13 07:42:32', '2021-12-12 10:17:45', '2021-12-13 07:42:32'),
('8beef1ea-a339-4437-b5a9-a4f71d77065d', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a note from haitham\",\"body\":\"userhaitham need a edit in order subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"need to edit\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-13 07:42:32', '2021-12-12 09:00:39', '2021-12-13 07:42:32'),
('8fae3453-1a86-4466-8c4c-571d57f53427', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"6 minutes ago\",\"order_id\":5}', '2021-12-03 18:00:44', '2021-12-03 17:57:53', '2021-12-03 18:00:44'),
('92535c58-ac50-465b-8c46-4db9e493b3fa', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer ahmed accept your invitation order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"17 seconds ago\",\"order_id\":2}', '2021-12-03 13:57:37', '2021-12-03 13:43:07', '2021-12-03 13:57:37'),
('94897893-d397-47e7-a57c-2d2df22bfc20', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : order\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 09:34:32', '2021-12-12 18:06:28'),
('987103be-ecdc-4129-b6fa-34aa8536aa75', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 08:17:41', '2021-12-12 08:09:31', '2021-12-12 08:17:41'),
('a67c8353-e818-4e3a-99e0-1c4d32401e36', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work subscribtion order 2\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 08:17:41', '2021-12-12 08:09:32', '2021-12-12 08:17:41'),
('a9d31c49-fbe4-41b5-9f47-4a3878873345', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work order 3\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":3}', '2021-12-12 18:06:28', '2021-12-12 08:40:43', '2021-12-12 18:06:28'),
('b7905830-f4c8-4b31-8a2a-e355c65988e8', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order ORDER 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 day ago\",\"order_id\":6}', '2021-12-12 08:27:11', '2021-12-12 08:26:56', '2021-12-12 08:27:11'),
('bc50a8ae-5605-409a-9a9e-1d8450583cf0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 07:41:49', '2021-12-12 05:24:17', '2021-12-12 07:41:49'),
('d21faf86-f143-4687-86b0-26d70012cefd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer ahmed accept your invitation order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"3 minutes ago\",\"order_id\":1}', '2021-12-03 10:59:23', '2021-12-03 10:59:11', '2021-12-03 10:59:23'),
('de30fc83-9847-4677-b75e-319486c86f26', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 07:41:49', '2021-12-12 06:47:24', '2021-12-12 07:41:49'),
('de8c5f3c-d8a4-40c8-adf1-f48691f8e8be', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work in subscription 1 order title : subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-12 18:06:28', '2021-12-12 09:10:00', '2021-12-12 18:06:28'),
('e167e5ce-bf17-40f7-bf41-d4a87ad7b106', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"work added\",\"body\":\"Designer hethmjal4@gmail.com add a work order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":4}', '2021-12-03 17:57:30', '2021-12-03 17:57:19', '2021-12-03 17:57:30'),
('e29df0bb-88f5-48d5-909a-57b86581404f', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham invited you to do a design in subscribtion 1\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":2}', '2021-12-12 05:19:46', '2021-12-12 05:18:12', '2021-12-12 05:19:46'),
('ebf720bd-cfae-4e97-867b-efb6a26b4fa0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"Congratulaion work accepted \",\"body\":\"userhaitham accept your work in order subscribtion order 1\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"1 second ago\",\"order_id\":1}', '2021-12-13 07:42:32', '2021-12-12 09:10:34', '2021-12-13 07:42:32'),
('f243e43d-03ba-4e27-935a-dfd799d4c7e0', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 3, '{\"title\":\"you have a new order\",\"body\":\"Client haitham subscribe woth your package 5\",\"action\":\"\\/panels\\/DesignerPanel\\/Orders\\/MyClients\",\"status\":\"new order\",\"created_at\":\"1 second ago\",\"order_id\":5}', '2021-12-13 07:55:40', '2021-12-13 07:54:58', '2021-12-13 07:55:40'),
('f46fcb2f-6e7f-45e2-bf37-f81c0020a007', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation order 3\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"16 seconds ago\",\"order_id\":4}', '2021-12-03 13:58:43', '2021-12-03 13:58:31', '2021-12-03 13:58:43'),
('f902131e-8468-4cbf-9874-a25b0b540ce1', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"title\":\"order accepted\",\"body\":\"Designer hethmjal4@gmail.com accept your invitation order 4\",\"action\":\"\\/panels\\/UserPanel\\/Orders\",\"status\":\"accept\",\"created_at\":\"11 seconds ago\",\"order_id\":5}', '2021-12-03 17:51:15', '2021-12-03 17:51:06', '2021-12-03 17:51:15');

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
  `work_submitted` enum('working on','submitted','Delayed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'working on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `designer_id`, `designer_name`, `title`, `description`, `image`, `type`, `deadline`, `status`, `work_submitted`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'ahmed', 'subscribtion order 2', 'subscribtion order 1', 'images/1638536112_21833077_400.png', 'Graphic design', '2022-01-03', 'Accepted', 'submitted', '2021-12-03 10:55:12', '2021-12-12 09:10:34'),
(2, 1, 2, 'ahmed', 'order 2', 'order 2', 'images/1638546170_11.jpg', 'Motion Graphic', '2021-12-28', 'Accepted', 'working on', '2021-12-03 13:42:50', '2021-12-03 13:43:07'),
(4, 1, 3, 'hethmjal4@gmail.com', 'order 3', 'order 3', 'images/1638547095_500x500.png', 'Graphic design', '2022-01-06', 'Accepted', 'working on', '2021-12-03 13:58:15', '2021-12-03 13:58:31'),
(5, 1, 3, 'hethmjal4@gmail.com', 'order 4', 'order 4', 'images/1638561055_11.jpg', 'Graphic design', '2022-01-04', 'Accepted', 'submitted', '2021-12-03 17:50:55', '2021-12-03 17:57:53'),
(6, 1, 3, 'hethmjal4@gmail.com', 'ORDER 4', 'OREDER', 'images/1639136876_التقاط.PNG', 'Motion Graphic', '2022-01-06', 'Accepted', 'submitted', '2021-12-10 09:47:56', '2021-12-12 08:26:56');

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
(5, 3, 6, 'images/1639304773_images_1637509906_http___localhost_8000_images_bg4 (2).png', 'files/1639304773_خطة موقع شيزاينر.pdf', 'خطة موقع شيزاينر.pdf', 'pdf', 'Accepted', 'ff', 'thanks', '2021-12-10 09:48:11', '2021-12-12 08:26:56');

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
(2, 3, '2021-12-03 15:58:31');

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
(3, 83, '2021-12-13 07:35:14', NULL);

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
('bNo1JLHRnpRWcDzG5YFT2gjpMLaHDszWFCld809u', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZTVkN0xvOEVwb2lRb0hIT1pYUlFuWnR4T3hFTDJMOHBUckhGblZLMCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHlSVTh6MnBEMnpSZU43cnVmd01qdE9ndHlJTlJzUTdkUzBxMDFqR3hYY0lpNWMvaHg0ci4uIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3BhbmVscy9Vc2VyUGFuZWwvTXlEZXNpZ25lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1639389304),
('Wo9UuQ2CjoFFUQH23qaqE4guyFQjsyjRTy7XG8Mg', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36 Edg/96.0.1054.43', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWFRTemZLWEs5b0VHbVhxRHRoeXZkalhrazM4OVdPZlJidWJielJMMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ub3RpZmljYXRpb25yZXNvdXJjZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRLUVg3Z1NPZW80bUxHUUQ5ZC5TQmUuUTh0Q3U5ekVwcVZvYS9mRDFXYmhPN2d1amt3ZUN2NiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkS1FYN2dTT2VvNG1MR1FEOWQuU0JlLlE4dEN1OXpFcHFWb2EvZkQxV2JoTzdndWprd2VDdjYiO30=', 1639389344);

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
(2, 1, '3', 2, 10, 0, '2021-12-13 06:50:00', '2021-12-13 06:50:00'),
(3, 1, '2', 2, 10, 0, '2021-12-13 07:39:41', '2021-12-13 07:39:41'),
(4, 1, '3', 1, 5, 0, '2021-12-13 07:54:18', '2021-12-13 07:54:18'),
(5, 1, '3', 1, 5, 0, '2021-12-13 07:54:58', '2021-12-13 07:54:58');

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
(4, 1, 3, 2, 'order', 'order', 'images/1639385646_1.jpeg', NULL, NULL, 'Graphic design', 'working on', '2022-01-03', NULL, NULL, 'working on', NULL, NULL, '2021-12-13 06:54:06', '2021-12-13 06:54:06');

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
(3, 3, 'hethmjal4@gmail.com\'s Team', 1, '2021-12-03 13:57:02', '2021-12-03 13:57:02');

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
  `background_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `background_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'haitham', 'hethmjal5@gmail.com', NULL, '$2y$10$yRU8z2pD2zReN7rufwMjtOgtyINRsQ7dS0q01jGxXcIi5c/hx4r..', 'user', NULL, NULL, 'qOoeeDTi2msNcVMLyKZmaKs98D4zzCpUHjyDMxjYVQNmC1eHCiebYHqxtM4O', 1, 'images/1639388170_http___localhost_8000_images_bg4 (2).png', 'images/1638976621_2013-07-Flowers-Wallpaper-Background.jpg', '2021-12-03 10:52:48', '2021-12-13 07:36:10'),
(2, 'ahmed', 'hethmjal6@gmail.com', NULL, '$2y$10$r/y/Ac2UcloLrfrI.feqIOnRwEJeoT49Dk4ZIdQggZ2CRoCbnKC2m', 'designer', NULL, NULL, NULL, 2, 'images/1639388330_home (1).png', 'images/1639388330_smartmockups_kr3mooyh.jpg', '2021-12-03 10:53:23', '2021-12-13 07:38:50'),
(3, 'hethmjal4@gmail.com', 'hethmjal4@gmail.com', NULL, '$2y$10$KQX7gSOeo4mLGQD9d.SBe.Q8tCu9zEpqVoa/fD1WbhO7gujkweCv6', 'designer', NULL, NULL, '5iDMQ6go8RICkEdneYNTP4FauEmI3dhO0ihUwdegeFfIk4KK9aG7RywLDnWY', 3, 'images/1639389146_Wallpaper k4.jpg', 'images/1639389099_Untitled (2).png', '2021-12-03 13:57:02', '2021-12-13 07:52:26');

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
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designer_packages`
--
ALTER TABLE `designer_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order__works`
--
ALTER TABLE `order__works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_orders`
--
ALTER TABLE `sub_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_works`
--
ALTER TABLE `sub_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
