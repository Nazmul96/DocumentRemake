-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 07:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikroy`
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
(15, '2020_10_27_155557_create_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '(865) 947-4201', 'Female', NULL, NULL, NULL, NULL, NULL, '2010-04-15', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 4, '2022-08-10 06:29:04', NULL, 1, NULL, 1, NULL, '2022-08-10 04:58:28', '2022-08-10 06:29:04', NULL),
(2, 2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '272.961.8395', 'Other', NULL, NULL, NULL, NULL, NULL, '1997-06-27', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(3, 3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '563.853.4452', 'Other', NULL, NULL, NULL, NULL, NULL, '2003-02-27', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(4, 4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '(938) 783-8064', 'Other', NULL, NULL, NULL, NULL, NULL, '2017-07-19', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(5, 5, 'General User', 'General', 'User', '100005', 'user@user.com', '+1.678.728.3936', 'Male', NULL, NULL, NULL, NULL, NULL, '1988-12-03', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL);

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
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '(865) 947-4201', 'Female', '2010-04-15', '2022-08-10 04:58:28', '$2y$10$TgD6TnWg3WrO2ImMo.GrO.Ejj6z./hdU2quvjmm8eOY4z1kjVnG0S', 'img/default-avatar.jpg', 1, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '272.961.8395', 'Other', '1997-06-27', '2022-08-10 04:58:28', '$2y$10$l9Ghc7/930z5zbPCxRUJWeqr3EGhIMcwkeYOyY4CznNHeuGuQplea', 'img/default-avatar.jpg', 1, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '563.853.4452', 'Other', '2003-02-27', '2022-08-10 04:58:28', '$2y$10$HONMI.ET7/gFO6VVc4HJ8uhHNgDMYdw91kg5ed64cF68L21qDQ7h.', 'img/default-avatar.jpg', 1, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '(938) 783-8064', 'Other', '2017-07-19', '2022-08-10 04:58:28', '$2y$10$/EjxUKjAgtUMXBNWhiT0wO.RotKwEWrqKJ2fCCaYEd5NKj3ouDceS', 'img/default-avatar.jpg', 1, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL),
(5, 'General User', 'General', 'User', '100005', 'user@user.com', '+1.678.728.3936', 'Male', '1988-12-03', '2022-08-10 04:58:28', '$2y$10$TLQcKlJ4luqcqaTClFv1LOM0N3F9sMf96lTOJseEuO5HTc4SY..yG', 'img/default-avatar.jpg', 1, NULL, '2022-08-10 04:58:28', '2022-08-10 04:58:28', NULL);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
