-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 01:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_remake`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `status`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Microphone1', 2, '1660131620.jpg', '2022-08-10 11:40:20', '2022-08-10 12:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurisdiction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `user_id`, `section_id`, `email`, `phone`, `case_name`, `jurisdiction`, `parish`, `case_number`, `client_first_name`, `client_last_name`, `client_address`, `company`, `note`, `created_at`, `updated_at`) VALUES
(6, 1, 10, 'zuvujym@mailinator.com', '554', 'Zoe', 'Regan', 'Emmanuel', '105', NULL, 'Amery', 'Brittany', 'Jessica', 'Aut voluptatum labors', '2022-12-11 07:42:54', '2022-12-18 10:03:17'),
(7, 1, 10, 'muwed@mailinator.com', '753', 'Sage', 'Margaret', 'Finn', '743', NULL, 'Adara', 'Claire', 'Lars', 'Et omnis dolor labor', '2022-12-12 07:57:58', '2022-12-12 07:57:58'),
(8, 1, 10, 'nazmul@rssoft.win', '01856433231', 'efsd', 'sdfsd', 'sdfds', '46363', NULL, 'rahman', 'sdfsd', 'drfgsf', 'sdfsdfs', '2022-12-12 12:16:38', '2022-12-12 12:16:38'),
(11, 1, 2, 'mudytiwo@mailinator.com', '358', 'Zia', 'Dante', 'Imogene', '310', NULL, 'Ora', 'Scott', 'Ryan', 'Omnis delectus repu', '2022-12-14 05:58:11', '2022-12-15 06:24:21'),
(12, 1, 2, 'hesec@mailinator.com', '170', 'Mannix', 'Vanna', 'Lilah', '59', NULL, 'Iliana', 'Cameran', 'Violet', 'Est tempor exercitat', '2022-12-14 05:58:40', '2022-12-15 04:57:04'),
(13, 2, 11, 'xegac@mailinator.com', '365', 'Tanek', 'Norman', 'Desirae', '144', NULL, 'Yael', 'Amy', 'Felicia', 'Id non enim at ut a', '2022-12-18 09:20:33', '2022-12-18 09:20:33'),
(14, 6, 12, 'nazmul@rssoft.win', '01856433231', 'bdc', 'xcvxcvxc', 'vcxv', '49', NULL, 'kaka', 'xcvxcv', 'Macey', 'vxcvcx  vczv sdfvsdf', '2022-12-19 07:48:52', '2022-12-19 07:48:52'),
(15, 8, 13, 'nazmul@rssoft.win', '01856433231', 'Rashad', 'Germaine', 'Summer', '567', NULL, 'rahman', 'bonosri', 'Hiroko', 'dfgsd efer  werfwe werw3', '2022-12-19 09:20:58', '2022-12-19 09:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `case_sections`
--

CREATE TABLE `case_sections` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sections_name` varchar(255) NOT NULL DEFAULT '',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_sections`
--

INSERT INTO `case_sections` (`id`, `user_id`, `sections_name`, `created_at`, `updated_at`) VALUES
(2, 1, 'EPP', '2022-12-08 19:07:48', '2022-12-15 19:45:17'),
(3, NULL, 'Engage', '2022-12-08 19:07:48', '2022-12-08 19:07:48'),
(4, NULL, 'Health', '2022-12-11 11:49:05', '2022-12-11 11:49:05'),
(5, NULL, 'Daily Exercise', '2022-12-13 10:57:25', '2022-12-13 10:57:25'),
(6, NULL, 'Exercise', '2022-12-13 11:09:44', '2022-12-13 11:09:44'),
(9, NULL, 'New Section', '2022-12-15 19:48:52', '2022-12-15 19:48:52'),
(10, 1, 'New Section added', '2022-12-18 12:51:47', '2022-12-18 12:51:47'),
(11, 2, 'Test Section', '2022-12-18 13:03:54', '2022-12-18 13:03:54'),
(12, 6, 'Admin User Section', '2022-12-19 13:45:26', '2022-12-19 13:45:26'),
(13, 8, 'Superb Test', '2022-12-19 15:19:54', '2022-12-19 15:19:54'),
(14, 1, 'Health', '2022-12-20 11:05:42', '2022-12-20 11:05:42'),
(15, 1, 'Study Abord New', '2022-12-20 11:05:53', '2022-12-20 11:13:39'),
(16, 1, 'Study Aboard News', '2022-12-20 11:30:37', '2022-12-20 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `case_values`
--

CREATE TABLE `case_values` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `variable_id` int(11) DEFAULT NULL,
  `variable_name` varchar(255) DEFAULT NULL,
  `case_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_values`
--

INSERT INTO `case_values` (`id`, `case_id`, `variable_id`, `variable_name`, `case_value`, `created_at`, `updated_at`) VALUES
(63, 11, 11, '${M_2TESTATOR}', 'Namul', '2022-12-15 11:45:03', '2022-12-15 12:44:01'),
(64, 11, 12, '${M_5YEAR}', '5', '2022-12-15 11:45:03', '2022-12-15 12:44:01'),
(65, 12, 11, '${M_2TESTATOR}', 'Rafi Hossain', '2022-12-15 11:45:55', '2022-12-18 11:02:34'),
(66, 12, 12, '${M_5YEAR}', '5', '2022-12-15 11:45:55', '2022-12-18 11:02:34'),
(67, 11, 13, '${M_1PARISH}', 'Rs Software', '2022-12-15 12:12:16', '2022-12-15 12:44:01'),
(68, 11, 14, '${M_6SSN}', 'DD-MM-YYYY', '2022-12-15 12:44:01', '2022-12-15 12:44:01'),
(69, 13, 16, '${M_2TESTATOR}', 'Shalim Ahmed', '2022-12-18 09:21:55', '2022-12-18 09:21:55'),
(70, 13, 17, '${M_5YEAR}', '11 years', '2022-12-18 09:21:55', '2022-12-18 09:21:55'),
(72, 12, 14, '${M_6SSN}', 'DD-MM-YYYY', '2022-12-18 10:35:06', '2022-12-18 11:02:34'),
(73, 12, 13, '${M_1PARISH}', 'abcd', '2022-12-18 11:02:34', '2022-12-18 11:02:34'),
(74, 14, 18, '${M_2TESTATOR}', 'alhamdulilallah', '2022-12-19 07:49:55', '2022-12-19 07:49:55'),
(75, 15, 19, '${M_2TESTATOR}', 'Nazmul Ahmed', '2022-12-19 09:23:03', '2022-12-19 09:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_info`
--

CREATE TABLE `document_info` (
  `id` int(11) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `update_file` text NOT NULL DEFAULT '',
  `orginal_document_name` varchar(100) NOT NULL,
  `extension_type` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_info`
--

INSERT INTO `document_info` (`id`, `document_name`, `update_file`, `orginal_document_name`, `extension_type`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, '638f49b0421e81670334896.docx', '1670334961_351355.docs', '1a FORM - NOTARIAL WILL - Male No Usufruct 07-09-15.docx', '.docs', 2, NULL, '2022-12-07 00:55:06', '2022-12-07 00:56:01'),
(2, '638f49b04233e1670334896.docx', '1670335022_431858.docs', '1670325205_693808.docx', '.docs', 2, NULL, '2022-12-07 00:55:06', '2022-12-07 00:57:02'),
(3, '638f49b0424151670334896.docx', '1670335081_75435.docs', 'edited.docx', '.docs', 2, NULL, '2022-12-07 00:55:06', '2022-12-07 00:58:01'),
(4, '638f49b0424dc1670334896.docx', '1670335142_295879.docs', 'helloWorld.docx', '.docs', 2, NULL, '2022-12-07 00:55:06', '2022-12-07 00:59:02'),
(7, '639563e9a517b1670734825.docx', '', '1669881385_141388.docx', '.docs', 1, NULL, '2022-12-11 05:00:27', '2022-12-11 05:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `document_queue`
--

CREATE TABLE `document_queue` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `case_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `document_name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 0 COMMENT '0=>''Process not done'',\r\n1=>''Process done''',
  `is_remove` int(11) DEFAULT 0 COMMENT '0=>''not delete template'',\r\n1=>''deleted template''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_queue`
--

INSERT INTO `document_queue` (`id`, `section_id`, `case_id`, `template_id`, `document_name`, `status`, `is_remove`, `created_at`, `updated_at`) VALUES
(109, 2, 11, 19, '1671024928_509841.docx', 1, 0, '2022-12-15 09:14:39', '2022-12-17 12:35:31'),
(119, 2, 12, 19, '1671024928_509841.docx', 1, 0, '2022-12-15 09:46:23', '2022-12-18 10:06:11'),
(133, 2, 11, 33, '1671279264_309813.docx', 1, 0, '2022-12-17 12:27:54', '2022-12-17 12:32:36'),
(134, 2, 11, 34, '1671279364_640871.docx', 1, 1, '2022-12-17 12:27:54', '2022-12-17 12:56:42'),
(135, 11, 13, 35, '1671355180_372478.docx', 1, 0, '2022-12-18 09:23:08', '2022-12-18 09:23:09'),
(136, 2, 12, 33, '1671279264_309813.docx', 1, 0, '2022-12-18 10:06:09', '2022-12-18 10:06:12'),
(137, 12, 14, 36, '1671436223_318152.docx', 1, 0, '2022-12-19 07:50:39', '2022-12-19 09:13:44'),
(138, 13, 15, 37, '1671441754_451790.docx', 1, 0, '2022-12-19 09:23:19', '2022-12-19 09:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `document_words`
--

CREATE TABLE `document_words` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `document_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gloval_settings`
--

CREATE TABLE `gloval_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gloval_settings`
--

INSERT INTO `gloval_settings` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa11', 'ddddd11', 1, '2022-11-29 10:52:06', '2022-11-29 11:49:58'),
(2, 'bbbbb11', 'eeeeee11', 2, '2022-11-29 10:52:06', '2022-11-29 11:49:58'),
(3, 'cccccccc11', 'fffffffff11', 1, '2022-11-29 10:52:06', '2022-11-29 11:49:58'),
(4, 'cccccc22', 'bbbb22', 1, '2022-11-30 01:06:01', '2022-11-30 01:06:19'),
(5, 'tyrtyrtu', 'yryryj', 2, '2022-12-01 01:26:22', '2022-12-01 01:26:22'),
(6, 'M_1PARISH', 'PARISH', 1, '2022-12-04 19:44:56', '2022-12-04 19:44:56'),
(7, 'M_2TESTATOR', 'TESTATOR', 1, '2022-12-04 19:44:56', '2022-12-04 19:44:56'),
(8, 'M_3DAY', '3 Day', 1, '2022-12-04 19:44:56', '2022-12-04 19:44:56'),
(9, 'M_4MONTH', '4 Month', 1, '2022-12-04 19:44:56', '2022-12-04 19:44:56'),
(10, 'M_22CHILD3FIRST', '2212313FIRST', 1, '2022-12-05 23:54:41', '2022-12-05 23:54:41'),
(11, 'Test', 'Test', 1, '2022-12-11 06:02:31', '2022-12-11 06:02:31'),
(12, 'thank', 'fgdsf', 2, '2022-12-13 06:02:44', '2022-12-13 06:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_11_062135_create_posts_table', 1),
(4, '2018_03_12_062135_create_categories_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_02_19_152418_create_permission_tables', 1),
(7, '2020_02_19_173115_create_activity_log_table', 1),
(8, '2020_02_19_173641_create_settings_table', 1),
(9, '2020_02_19_173700_create_userprofiles_table', 1),
(10, '2020_02_19_173711_create_notifications_table', 1),
(11, '2020_02_22_115918_create_user_providers_table', 1),
(12, '2020_05_01_163442_create_tags_table', 1),
(13, '2020_05_01_163833_create_polymorphic_taggables_table', 1),
(14, '2020_05_04_151517_create_comments_table', 1),
(15, '2020_10_27_155557_create_media_table', 1),
(16, '2022_08_10_162222_create_brands_table', 2),
(17, '2022_12_10_194532_create_templates_table', 3),
(18, '2022_12_15_122719_create_template_updated_file_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(39, 'App\\Models\\User', 6),
(39, 'App\\Models\\User', 7),
(39, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_backend', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(2, 'edit_settings', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(3, 'view_logs', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(4, 'view_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(5, 'add_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(6, 'edit_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(7, 'delete_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(8, 'restore_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(9, 'block_users', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(10, 'view_roles', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(11, 'add_roles', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(12, 'edit_roles', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(13, 'delete_roles', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(14, 'restore_roles', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(15, 'view_backups', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(16, 'add_backups', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(17, 'create_backups', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(18, 'download_backups', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(19, 'delete_backups', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(20, 'view_posts', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(21, 'add_posts', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(22, 'edit_posts', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(23, 'delete_posts', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(24, 'restore_posts', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(25, 'view_categories', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(26, 'add_categories', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(27, 'edit_categories', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(28, 'delete_categories', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(29, 'restore_categories', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(30, 'view_tags', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(31, 'add_tags', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(32, 'edit_tags', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(33, 'delete_tags', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(34, 'restore_tags', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(35, 'view_comments', 'web', '2022-08-10 04:58:29', '2022-08-10 04:58:29'),
(36, 'add_comments', 'web', '2022-08-10 04:58:29', '2022-08-10 04:58:29'),
(37, 'edit_comments', 'web', '2022-08-10 04:58:29', '2022-08-10 04:58:29'),
(38, 'delete_comments', 'web', '2022-08-10 04:58:29', '2022-08-10 04:58:29'),
(39, 'restore_comments', 'web', '2022-08-10 04:58:29', '2022-08-10 04:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_og_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_og_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(2, 'administrator', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(3, 'manager', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(4, 'executive', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28'),
(5, 'user', 'web', '2022-08-10 04:58:28', '2022-08-10 04:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `section_id`, `description`, `template_file`, `extension_type`, `created_at`, `updated_at`) VALUES
(19, 2, 'Visa Process', '1671024928_509841.docx', 'docx', '2022-12-14 13:35:28', '2022-12-15 06:24:17'),
(31, 9, 'My first template', '1671112222_160517.pdf', 'pdf', '2022-12-15 13:50:22', '2022-12-15 13:50:22'),
(33, 2, 'Student Assesment', '1671279264_309813.docx', 'docx', '2022-12-17 12:14:24', '2022-12-17 12:14:24'),
(35, 11, 'New Check', '1671355180_372478.docx', 'docx', '2022-12-18 09:19:40', '2022-12-18 09:19:40'),
(36, 12, 'Visa Process New', '1671436223_318152.docx', 'docx', '2022-12-19 07:50:23', '2022-12-19 07:50:23'),
(37, 13, 'Visa Process done', '1671441754_451790.docx', 'docx', '2022-12-19 09:22:34', '2022-12-19 09:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `template_updated_file`
--

CREATE TABLE `template_updated_file` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `case_id` int(11) NOT NULL,
  `template_id` int(11) DEFAULT NULL,
  `updated_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_remove` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_updated_file`
--

INSERT INTO `template_updated_file` (`id`, `case_id`, `template_id`, `updated_file`, `is_remove`, `created_at`, `updated_at`) VALUES
(216, 11, 33, '1671280356_365576.docx', 0, '2022-12-17 12:32:36', '2022-12-17 12:32:36'),
(217, 11, 34, '1671280356_149915.docx', 1, '2022-12-17 12:32:36', '2022-12-17 12:56:42'),
(219, 11, 19, '1671280531_602518.docx', 0, '2022-12-17 12:35:32', '2022-12-17 12:35:32'),
(220, 13, 35, '1671355389_445849.docx', 0, '2022-12-18 09:23:09', '2022-12-18 09:23:09'),
(221, 12, 19, '1671357971_425131.docx', 0, '2022-12-18 10:06:11', '2022-12-18 10:06:11'),
(222, 12, 33, '1671357971_571860.docx', 0, '2022-12-18 10:06:12', '2022-12-18 10:06:12'),
(224, 14, 36, '1671441223_256916.docx', 0, '2022-12-19 09:13:44', '2022-12-19 09:13:44'),
(225, 15, 37, '1671441800_583868.docx', 0, '2022-12-19 09:23:21', '2022-12-19 09:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `template_variable`
--

CREATE TABLE `template_variable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variable` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_variable`
--

INSERT INTO `template_variable` (`id`, `user_id`, `section_id`, `description`, `variable`, `created_at`, `updated_at`) VALUES
(11, 1, 2, 'Test 2', '${M_2TESTATOR}', '2022-12-13 13:30:36', '2022-12-13 13:30:36'),
(12, 1, 2, 'Test 3', '${M_5YEAR}', '2022-12-13 13:32:02', '2022-12-13 13:32:02'),
(13, 1, 2, 'Test 4', '${M_1PARISH}', '2022-12-15 09:59:14', '2022-12-15 09:59:14'),
(14, 1, 2, 'Test5', '${M_6SSN}', '2022-12-15 12:42:37', '2022-12-15 12:42:37'),
(16, 2, 11, 'Test purpose 2', '${M_2TESTATOR}', '2022-12-18 08:02:04', '2022-12-18 09:09:28'),
(17, 2, 11, 'Test purpose 3', '${M_5YEAR}', '2022-12-18 09:09:37', '2022-12-18 09:21:24'),
(18, 6, 12, 'Check', '${M_2TESTATOR}', '2022-12-19 07:49:40', '2022-12-19 07:49:40'),
(19, 8, 13, 'Test Purpose', '${M_2TESTATOR}', '2022-12-19 09:22:07', '2022-12-19 09:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `user_id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `url_website`, `url_facebook`, `url_twitter`, `url_instagram`, `url_linkedin`, `date_of_birth`, `address`, `bio`, `avatar`, `user_metadata`, `last_ip`, `login_count`, `last_login`, `email_verified_at`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '(865) 947-4201', 'Female', NULL, NULL, NULL, NULL, NULL, '2010-04-15', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 50, '2022-12-20 04:38:45', NULL, 1, NULL, 1, NULL, '2022-08-10 04:58:28', '2022-12-20 04:38:45', NULL),
(2, 2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '272.961.8395', 'Other', NULL, NULL, NULL, NULL, NULL, '1997-06-27', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 20, '2022-12-18 09:16:59', NULL, 1, NULL, 2, NULL, '2022-08-10 04:58:28', '2022-12-18 09:16:59', NULL),
(3, 3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '563.853.4452', 'Other', NULL, NULL, NULL, NULL, NULL, '2003-02-27', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(4, 4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '(938) 783-8064', 'Other', NULL, NULL, NULL, NULL, NULL, '2017-07-19', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(5, 5, 'General User', 'General', 'User', '100005', 'user@user.com', '+1.678.728.3936', 'Male', NULL, NULL, NULL, NULL, NULL, '1988-12-03', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(6, 6, 'Rafi Hossain', 'Rafi', 'Hossain', '100006', 'rafi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 2, '2022-12-19 07:44:37', NULL, 2, 1, 6, NULL, '2022-12-19 05:41:39', '2022-12-19 07:44:37', NULL),
(7, 7, 'shukriti das', 'shukriti', 'das', '100007', 'shukriti@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 3, 1, 1, NULL, '2022-12-19 05:43:22', '2022-12-19 05:43:22', NULL),
(8, 8, 'Shukriti Das', 'Shukriti', 'Das', '100008', 'shukriti@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 3, '2022-12-19 09:19:28', NULL, 1, 6, 8, NULL, '2022-12-19 07:28:51', '2022-12-19 09:19:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>''Super Admin''\r\n',
  `user_role` int(11) DEFAULT NULL COMMENT '2=>''Admin'',\r\n3=>''User''',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `status`, `user_role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '(865) 947-4201', 'Female', '2010-04-15', '2022-08-10 04:58:28', '$2y$10$0gmoLTjdxoVqn1YxqESy2ein2AptJMzU4CNnGnI5yZpB.qzF4OrzG', 'img/default-avatar.jpg', 1, 1, NULL, '2022-08-10 04:58:28', '2022-12-18 06:24:48', NULL),
(2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '272.961.8395', 'Other', '1997-06-27', '2022-08-10 04:58:28', '$2y$10$0gmoLTjdxoVqn1YxqESy2ein2AptJMzU4CNnGnI5yZpB.qzF4OrzG', 'img/default-avatar.jpg', 1, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '563.853.4452', 'Other', '2003-02-27', '2022-08-10 04:58:28', '$2y$10$HONMI.ET7/gFO6VVc4HJ8uhHNgDMYdw91kg5ed64cF68L21qDQ7h.', 'img/default-avatar.jpg', 1, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '(938) 783-8064', 'Other', '2017-07-19', '2022-08-10 04:58:28', '$2y$10$/EjxUKjAgtUMXBNWhiT0wO.RotKwEWrqKJ2fCCaYEd5NKj3ouDceS', 'img/default-avatar.jpg', 1, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(5, 'General User', 'General', 'User', '100005', 'user@user.com', '+1.678.728.3936', 'Male', '1988-12-03', '2022-08-10 04:58:28', '$2y$10$TLQcKlJ4luqcqaTClFv1LOM0N3F9sMf96lTOJseEuO5HTc4SY..yG', 'img/default-avatar.jpg', 1, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(6, 'Rafi Hossain', 'Rafi', 'Hossain', '100006', 'rafi@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$MjeJH6WjyZ4DRSq.ztfSIeUmV/rzQrR4QkFOMsk1e.Q9Uwg7YFlES', 'img/default-avatar.jpg', 1, 2, NULL, '2022-12-19 05:41:36', '2022-12-19 05:41:37', NULL),
(8, 'Shukriti Dass', 'Shukriti', 'Dass', '100008', 'shukriti@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$k1yeRHjx/V4hD19WbMOBx.I8pwB05R8M78uoaa/UYEPKlkR2R7XPK', 'img/default-avatar.jpg', 1, 3, NULL, '2022-12-19 07:28:50', '2022-12-19 10:09:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_providers`
--

CREATE TABLE `user_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_sections`
--
ALTER TABLE `case_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_values`
--
ALTER TABLE `case_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_info`
--
ALTER TABLE `document_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_queue`
--
ALTER TABLE `document_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_words`
--
ALTER TABLE `document_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gloval_settings`
--
ALTER TABLE `gloval_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_updated_file`
--
ALTER TABLE `template_updated_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_variable`
--
ALTER TABLE `template_variable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_providers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `case_sections`
--
ALTER TABLE `case_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `case_values`
--
ALTER TABLE `case_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_info`
--
ALTER TABLE `document_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `document_queue`
--
ALTER TABLE `document_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `document_words`
--
ALTER TABLE `document_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gloval_settings`
--
ALTER TABLE `gloval_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `template_updated_file`
--
ALTER TABLE `template_updated_file`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `template_variable`
--
ALTER TABLE `template_variable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_providers`
--
ALTER TABLE `user_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD CONSTRAINT `user_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
