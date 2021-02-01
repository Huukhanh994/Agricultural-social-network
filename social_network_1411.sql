-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 01:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Margarette Kerluke', 'admin@gmail.com', NULL, '$2y$10$67zW1Qjmm9Z.Xm7GT8vjVuKmHWVu0gVmP1BJPDTZrjWw87kWQfNJO', NULL, '2020-10-26 09:49:17', '2020-10-26 09:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_slug` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_slug`, `category_code`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'nong-nghiep', 'NN', 'Nông Nghiệp', NULL, NULL),
(2, 'lam-nghiep', 'LN', 'Lâm nghiệp', NULL, NULL),
(3, 'thuy-san', 'TS', 'Thủy Sản', NULL, NULL),
(4, 'thuc-an', 'TA', 'Thức ăn', '2020-11-04 15:59:53', '2020-11-04 15:59:53'),
(5, 'thuoc-tru-be', 'TTB', 'Thuốc trừ bệnh', '2020-11-04 16:00:17', '2020-11-04 16:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `parent_id`, `comment_content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'test', '2020-10-30 07:10:15', NULL),
(2, 1, 2, NULL, 'test comment 2', '2020-10-30 01:15:42', '2020-10-30 01:15:42'),
(3, 2, 1, NULL, 'test 3', '2020-11-08 10:01:43', '2020-11-08 10:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `crop_plant_animals`
--

CREATE TABLE `crop_plant_animals` (
  `crop_plant_animal_id` bigint(20) UNSIGNED NOT NULL,
  `crop_plant_animal_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crop_plant_animal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crop_plant_animal_growth_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crop_plant_animal_color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crop_plant_animal_weight` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crop_plant_animal_height` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `day_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experience_farms`
--

CREATE TABLE `experience_farms` (
  `crop_plant_animal_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `insecticide_id` bigint(20) UNSIGNED NOT NULL,
  `experience_farm_time_farm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `experience_farm_water` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_farm_soil_properties` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_farm_start_to_do` datetime DEFAULT NULL,
  `experience_farm_end_to_do` datetime DEFAULT NULL,
  `experience_farm_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `food_code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`id`, `sender_type`, `sender_id`, `recipient_type`, `recipient_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'App\\Models\\User', 2, 0, '2020-11-08 08:24:26', '2020-11-08 08:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `group_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_members` int(11) DEFAULT 0,
  `group_is_private` tinyint(4) DEFAULT 0,
  `group_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_code`, `group_name`, `group_description`, `group_members`, `group_is_private`, `group_avatar`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'LTMT', 'Lua giong mien tay', 'Lúa giống miền tây', 0, 1, 'rice-crop.jpg', 1, '2020-10-27 07:31:44', '2020-10-27 07:31:44'),
(2, 'HSBR', 'Hải sản Bà Rịa - Vũng Tàu', 'Hải sản Bà Rịa - Vũng Tàu mô tả', 0, 0, 'OIP.jpg', 3, '2020-10-27 07:32:24', '2020-10-27 07:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_post`
--

INSERT INTO `group_post` (`group_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(NULL, 2, NULL, NULL),
(NULL, 3, NULL, NULL),
(NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `group_user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_status` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`group_user_id`, `group_id`, `id`, `group_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insecticides`
--

CREATE TABLE `insecticides` (
  `insecticide_id` bigint(20) UNSIGNED NOT NULL,
  `insecticide_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insecticide_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insecticide_ingredient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thành phần',
  `insecticide_dosage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Liều lượng',
  `insecticide_indication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'chỉ định',
  `insecticide_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Độ tuổi động vật/ bao nhiêu ngày cây trồng',
  `insecticide_amount` int(11) NOT NULL COMMENT 'Liều lượng',
  `insecticide_producer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nhà sản xuất thuốc',
  `insecticide_produce_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ngày sản xuất',
  `insecticide_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'hạn sử dụng',
  `insecticide_price` decimal(20,6) NOT NULL,
  `insecticide_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `larapoll_options`
--

CREATE TABLE `larapoll_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `larapoll_options`
--

INSERT INTO `larapoll_options` (`id`, `name`, `poll_id`, `votes`, `created_at`, `updated_at`) VALUES
(4, '5000', 1, 1, '2020-11-13 20:30:28', '2020-11-13 21:28:12'),
(5, '6000', 1, 0, '2020-11-13 20:30:28', '2020-11-13 20:30:28'),
(6, '7000', 1, 0, '2020-11-13 20:30:28', '2020-11-13 20:30:28'),
(8, 'Messi', 2, 0, '2020-11-13 21:27:57', '2020-11-13 21:27:57'),
(9, 'Ronaldo', 2, 0, '2020-11-13 21:27:57', '2020-11-13 21:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `larapoll_polls`
--

CREATE TABLE `larapoll_polls` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxCheck` int(11) NOT NULL DEFAULT 1,
  `canVisitorsVote` tinyint(1) NOT NULL DEFAULT 0,
  `isClosed` timestamp NULL DEFAULT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `canVoterSeeResult` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `larapoll_polls`
--

INSERT INTO `larapoll_polls` (`id`, `question`, `maxCheck`, `canVisitorsVote`, `isClosed`, `starts_at`, `ends_at`, `created_at`, `updated_at`, `canVoterSeeResult`) VALUES
(1, 'Lúa giống mùa này giá bao nhiêu tiền?', 1, 1, NULL, '2020-11-02 02:47:00', '2020-11-20 02:47:00', '2020-11-13 19:48:22', '2020-11-13 21:28:20', 1),
(2, 'Messi or Ronaldo', 1, 1, NULL, '2020-11-13 04:27:00', '2020-11-20 04:27:00', '2020-11-13 21:27:57', '2020-11-13 21:29:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `larapoll_votes`
--

CREATE TABLE `larapoll_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `larapoll_votes`
--

INSERT INTO `larapoll_votes` (`id`, `user_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 4, '2020-11-13 21:26:38', '2020-11-13 21:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `likeable_type`, `likeable_id`, `created_at`, `updated_at`) VALUES
(196, 1, 'App\\Models\\Post', 1, '2020-11-08 00:08:06', '2020-11-08 00:08:06'),
(197, 1, 'App\\Models\\Post', 2, '2020-11-08 00:08:11', '2020-11-08 00:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1786291355, 'user', 1, 2, 'Hi', NULL, 1, '2020-10-28 07:17:32', '2020-10-28 07:17:33'),
(2018587007, 'user', 1, 2, 'Hello again', NULL, 1, '2020-11-10 09:02:17', '2020-11-10 09:02:25'),
(2035475132, 'user', 1, 2, 'Hello', NULL, 1, '2020-10-27 07:09:45', '2020-10-27 07:09:52'),
(2066350348, 'user', 2, 1, 'hello', NULL, 1, '2020-10-30 01:30:29', '2020-10-30 01:30:29'),
(2087814532, 'user', 1, 2, 'test', NULL, 1, '2020-10-30 01:30:21', '2020-10-30 01:30:22'),
(2111811254, 'group', 1, 2, 'Hello ne em', NULL, 1, '2020-11-10 09:17:54', '2020-11-10 09:17:55'),
(2155626581, 'user', 2, 1, 'Oh', NULL, 1, '2020-11-10 09:03:02', '2020-11-10 09:03:02'),
(2394755860, 'user', 2, 1, 'Hello again', NULL, 1, '2020-10-27 07:10:07', '2020-10-27 07:10:07'),
(2414355347, 'group', 2, 1, 'Xin chao nguoi dep', NULL, 1, '2020-11-10 09:18:20', '2020-11-10 09:18:20'),
(2563086322, 'user', 1, 2, 'hi', NULL, 1, '2020-10-30 01:30:33', '2020-10-30 01:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_groups`
--

CREATE TABLE `message_groups` (
  `message_group_id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_groups`
--

INSERT INTO `message_groups` (`message_group_id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'group', 1, 1, 'test message group', NULL, 0, '2020-10-27 07:09:45', NULL),
(1943907183, 'group', 1, 2, 'Hello ne em', NULL, 0, '2020-11-10 09:17:54', '2020-11-10 09:17:54'),
(2143243311, 'group', 2, 1, 'Xin chao nguoi dep', NULL, 0, '2020-11-10 09:18:20', '2020-11-10 09:18:20'),
(2404983172, 'group', 1, 2, 'Hello ne', NULL, 0, '2020-11-10 09:17:28', '2020-11-10 09:17:28');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_09_22_192348_create_messages_table', 1),
(4, '2019_10_16_211433_create_favorites_table', 1),
(5, '2019_10_18_223259_add_avatar_to_users', 2),
(6, '2019_10_20_211056_add_messenger_color_to_users', 2),
(7, '2019_10_22_000539_add_dark_mode_to_users', 2),
(8, '2019_10_25_214038_add_active_status_to_users', 2),
(9, '2020_08_11_141019_create_admins_table', 2),
(10, '2020_08_11_141930_create_roles_table', 2),
(11, '2020_08_11_143156_create_permissions_table', 2),
(12, '2020_08_11_143703_create_years_table', 2),
(13, '2020_08_11_143815_create_seasonals_table', 2),
(14, '2020_08_11_143948_create_days_table', 2),
(15, '2020_08_11_144001_create_cities_table', 2),
(16, '2020_08_11_144016_create_districts_table', 2),
(17, '2020_08_11_144029_create_wards_table', 2),
(18, '2020_08_11_144055_create_categories_table', 2),
(19, '2020_08_11_144331_create_payments_table', 2),
(20, '2020_08_11_144346_create_transactions_table', 2),
(21, '2020_08_11_145216_create_food_table', 2),
(22, '2020_08_11_145422_create_insecticides_table', 2),
(23, '2020_08_11_145609_create_poll_questions_table', 2),
(24, '2020_08_11_145625_create_poll_answers_table', 2),
(25, '2020_08_19_152841_create_polls_table', 2),
(26, '2020_08_22_172759_create_settings_table', 2),
(27, '2020_09_13_135425_create_weather_table', 2),
(28, '2020_09_19_090508_create_users_table', 2),
(29, '2020_09_19_091248_create_posts_table', 3),
(30, '2020_09_19_091316_create_post_views_table', 3),
(31, '2020_09_19_091338_create_post_likes_table', 4),
(32, '2020_09_19_091357_create_post_images_table', 4),
(33, '2020_09_19_091418_create_post_videos_table', 4),
(34, '2020_09_19_091444_create_comments_table', 4),
(35, '2020_09_19_091516_create_user_votes_table', 4),
(36, '2020_09_19_091809_create_products_table', 4),
(37, '2020_09_19_091857_create_crop_plant_animals_table', 4),
(38, '2020_09_19_091936_create_experience_farms_table', 4),
(39, '2020_09_19_092106_create_transaction_details_table', 4),
(40, '2020_10_11_141431_create_groups_table', 4),
(41, '2020_10_11_141615_create_group_users_table', 4),
(42, '2020_10_12_160040_create_group_post_table', 4),
(43, '2020_10_17_144826_create_relationships_table', 5),
(44, '2020_10_27_144215_create_message_groups_table', 6),
(45, '2020_10_30_153731_add_facebook_id_column', 6),
(46, '2020_04_04_000000_create_user_follower_table', 7),
(47, '2018_12_14_000000_create_likes_table', 8),
(48, '2020_11_08_152131_create_friendships_table', 9),
(49, '2020_11_08_152132_create_friendships_groups_table', 9),
(50, '2020_11_11_142751_create_friendships_table', 10),
(51, '2020_11_11_142752_create_friendships_groups_table', 11),
(52, '2020_08_19_152841_create_polls2_table', 12),
(53, '2020_11_11_145245_create_polls_table', 12),
(54, '2020_11_11_145443_create_options_table', 12),
(55, '2020_11_11_145941_create_votes_table', 12),
(56, '2020_11_11_150016_create_schema_changes_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_grand_total` decimal(20,6) NOT NULL,
  `order_item_count` int(11) NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `order_status`, `order_grand_total`, `order_item_count`, `order_name`, `order_email`, `order_address`, `order_city`, `order_tel`, `order_notes`, `order_payment_status`, `order_payment_method`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ORD-5FA2DDFF72754', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'a', 'a', 'a', NULL, '0', NULL, 1, '2020-11-04 09:59:43', '2020-11-04 09:59:43'),
(2, 'ORD-5FA2DE52CBAD0', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'a', 'a', 'a', NULL, '0', NULL, 1, '2020-11-04 10:01:06', '2020-11-04 10:01:06'),
(3, 'ORD-5FA2DED696D8B', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'a', 'a', 'a', NULL, '0', NULL, 1, '2020-11-04 10:03:18', '2020-11-04 10:03:18'),
(4, 'ORD-5FA5899B70659', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:36:27', '2020-11-06 10:36:27'),
(5, 'ORD-5FA589CD5BE8A', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:37:17', '2020-11-06 10:37:17'),
(6, 'ORD-5FA589E61CCE0', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:37:42', '2020-11-06 10:37:42'),
(7, 'ORD-5FA58A0194179', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:38:09', '2020-11-06 10:38:09'),
(8, 'ORD-5FA58A1910F5B', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:38:33', '2020-11-06 10:38:33'),
(9, 'ORD-5FA58ABB18EF7', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:41:15', '2020-11-06 10:41:15'),
(10, 'ORD-5FA58ADAA5D12', 'pending', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '0', NULL, 1, '2020-11-06 10:41:46', '2020-11-06 10:41:46'),
(11, 'ORD-5FA58B0037D6E', 'processing', '89.000000', 10, 'Huu Khanh', 'khanhho@gmail.com', 'asd', 'asd', 'asd', NULL, '1', 'PayPal - 71846532BU963524F', 1, '2020-11-06 10:42:24', '2020-11-06 10:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  -- `order_item_qty_food` int(11) DEFAULT NULL,
  -- `order_item_qty_insecticide` int(11) DEFAULT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `order_item_price` decimal(20,6) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_item_qty_food`, `order_item_qty_insecticide`, `order_item_qty_cpa`, `order_item_price`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 10, '89.000000', 1, 3, '2020-11-04 10:03:18', '2020-11-04 10:03:18'),
(2, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:36:27', '2020-11-06 10:36:27'),
(3, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:37:17', '2020-11-06 10:37:17'),
(4, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:37:42', '2020-11-06 10:37:42'),
(5, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:38:09', '2020-11-06 10:38:09'),
(6, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:38:33', '2020-11-06 10:38:33'),
(7, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:41:15', '2020-11-06 10:41:15'),
(8, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:41:46', '2020-11-06 10:41:46'),
(9, NULL, NULL, 10, '89.000000', 1, NULL, '2020-11-06 10:42:24', '2020-11-06 10:42:24');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `permission_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `poll_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_published` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_start_time` datetime NOT NULL,
  `poll_end_time` datetime NOT NULL,
  `poll_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `poll_answer_id` bigint(20) UNSIGNED NOT NULL,
  `poll_answer_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_questions`
--

CREATE TABLE `poll_questions` (
  `poll_question_id` bigint(20) UNSIGNED NOT NULL,
  `poll_question_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_question_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_question_instruction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_price` double DEFAULT NULL,
  `post_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `post_published` tinyint(4) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_slug`, `post_title`, `post_content`, `post_price`, `post_status`, `post_published`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'ban-lua-giong-tot', 'Bán lúa giống tốt', 'Bán lúa giống tốt', 10, 'accepted', 0, 1, 1, '2020-10-29 06:28:26', '2020-10-29 06:36:20'),
(2, 'can-ban-hai-san-tuoi', 'Cần bán hải sản tươi', 'Cần bán hải sản tươi sống', 8.9, 'accepted', 0, 1, 3, '2020-11-04 07:43:10', '2020-11-04 08:19:44'),
(3, 'ban-cay-kieng-dep', 'Bán cây kiểng đẹp', 'Bán cây kiểng đẹp', 12, 'pending', 0, 1, 2, '2020-11-04 07:51:32', '2020-11-04 07:51:32'),
(4, 'gia-lua-nam-nay-phai-duoc-ban-tu-6000d1kg', 'Gía lúa năm nay phải được bán từ 6000đ/1kg', 'Gía lúa năm nay phải được bán từ 6000đ/1kg', 6, 'pending', 0, 1, 1, '2020-11-08 10:20:57', '2020-11-08 10:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `post_image_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`post_image_id`, `post_id`, `post_image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'rice-crop.jpg', '2020-10-29 06:28:26', '2020-10-29 06:28:26'),
(2, 2, 'OIP.jpg', '2020-11-04 07:43:11', '2020-11-04 07:43:11'),
(3, 3, 'd3f7d97a84f700c91cd561590532f5e6.jpg', '2020-11-04 07:51:32', '2020-11-04 07:51:32'),
(4, 4, 'rice-crop.jpg', '2020-11-08 10:20:57', '2020-11-08 10:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `post_like_id` bigint(20) UNSIGNED NOT NULL,
  `post_like_like` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_videos`
--

CREATE TABLE `post_videos` (
  `post_video_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_video_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `post_view_id` bigint(20) UNSIGNED NOT NULL,
  `post_view_view` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(20,6) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'PD-TS', 'can-ban-hai-san-tuoi', '10.000000', 3, '2020-11-04 07:43:10', '2020-11-04 07:43:10'),
(2, 'PD-LN', 'ban-cay-kieng-dep', '8.900000', 2, '2020-11-04 07:51:32', '2020-11-04 07:51:32'),
(3, 'PD-NN', 'gia-lua-nam-nay-phai-duoc-ban-tu-6000d1kg', '6.000000', 1, '2020-11-08 10:20:57', '2020-11-08 10:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `relationship_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0: Peding, 1: Accepted,2: Declined, 3: Blocked',
  `action_user_id` bigint(20) DEFAULT NULL COMMENT 'người dùng thao tác action cuối cùng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`relationship_id`, `sender_id`, `receiver_id`, `status`, `action_user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, NULL, '2020-11-08 06:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seasonals`
--

CREATE TABLE `seasonals` (
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `season_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_start_date` date DEFAULT NULL,
  `season_end_date` date DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Agricultural Social Network', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(2, 'site_title', 'Social network', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(3, 'default_email_address', 'admin@gmail.com', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(4, 'currency_code', 'USD', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(5, 'currency_symbol', '$', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(6, 'site_logo', 'img/SFt1Aq5WR9GZRnm20Khu2uZCX.png', '2020-02-23 15:41:09', '2020-02-23 17:42:10'),
(7, 'site_favicon', 'img/5uYlL5x0g4jhp8ZZKCgRGR4P9.jfif', '2020-02-23 15:41:09', '2020-02-23 17:58:55'),
(8, 'footer_copyright_text', 'Agricultural social network by HOHUUKHANH', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(9, 'seo_meta_title', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(10, 'seo_meta_description', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(11, 'social_facebook', 'https://www.facebook.com/khanh.huu.ho.994/', '2020-02-23 15:41:09', '2020-02-23 17:42:47'),
(12, 'social_twitter', NULL, '2020-02-23 15:41:09', '2020-02-23 17:42:47'),
(13, 'social_instagram', NULL, '2020-02-23 15:41:09', '2020-02-23 17:42:47'),
(14, 'social_linkedin', 'https://www.linkedin.com/in/ho-huu-khanh-1b3447197/', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(15, 'google_analytics', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(16, 'facebook_pixels', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(17, 'stripe_payment_method', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(18, 'stripe_key', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(19, 'stripe_secret_key', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(20, 'paypal_payment_method', '', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(21, 'paypal_client_id', 'AXVgPfkb4Eguc5vYCYx3ibCLe0sUhNv6nXFjmr4pS9ov8h0WtZUpu6bijvooion-tyVfMuRMZrNYSFXs', '2020-02-23 15:41:09', '2020-02-23 15:41:09'),
(22, 'paypal_secret_id', 'EFPGSkPGCryJwhzE2583uCSlPeVBR5XxpjHrfaSZ_zANHZj8XHvPaM4gsfxbh7LHz2MN95pcHUIBjq99', '2020-02-23 15:41:09', '2020-02-23 15:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_block` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `birth`, `gender`, `tel`, `address`, `is_block`, `active_status`, `dark_mode`, `messenger_color`, `avatar`, `user_avatar`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `ward_id`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(1, 'Huu Khanh', 'khanhho@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, '#2180f3', '6af28d7e-8c76-4d3a-a372-5b4b891b502a.jpeg', 'avatar.jpeg', NULL, '$2y$10$ybMyw3Wxl4QJg39VHngTEOgYaxz6MUxxoQMTwd0GgYJLuNmnX35Fy', NULL, NULL, NULL, NULL, '2020-10-26 09:54:48', '2020-11-10 09:17:48', NULL, NULL),
(2, 'User One', 'user1@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, '#2180f3', 'avatar.png', 'avatar.png', NULL, '$2y$10$I6Sqjz15UQ6WKfo9LaxHWuaFInyIfw2YFVYmyN5T9fklgCOhBsdjO', NULL, NULL, NULL, NULL, '2020-10-27 07:08:53', '2020-11-10 09:02:56', NULL, NULL),
(3, 'User Two', 'user2@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, 0, '#2180f3', 'avatar.png', 'avatar.png', NULL, '$2y$10$wt1SPZYP.piySFkIPDLIouZeKQcC0HDNzSHxXxeCKMEO5yiz4F/D.', NULL, NULL, NULL, NULL, '2020-11-08 06:29:30', '2020-11-08 06:29:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `id` int(10) UNSIGNED NOT NULL,
  `following_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_follower`
--

INSERT INTO `user_follower` (`id`, `following_id`, `follower_id`, `accepted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 2, '2020-11-08 05:50:17', '2020-11-08 05:50:17', '2020-11-08 05:50:17'),
(69, 2, 1, '2020-11-08 09:26:21', '2020-11-08 09:26:21', '2020-11-08 09:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_friendship_groups`
--

CREATE TABLE `user_friendship_groups` (
  `friendship_id` int(10) UNSIGNED NOT NULL,
  `friend_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE `user_votes` (
  `user_vote_vote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `poll_answer_id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `ward_id` bigint(20) UNSIGNED NOT NULL,
  `ward_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `weather_id` bigint(20) UNSIGNED NOT NULL,
  `weather_code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_number` double DEFAULT NULL,
  `weather_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `year_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `cities_city_name_unique` (`city_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `crop_plant_animals`
--
ALTER TABLE `crop_plant_animals`
  ADD PRIMARY KEY (`crop_plant_animal_id`),
  ADD UNIQUE KEY `crop_plant_animals_crop_plant_animal_code_unique` (`crop_plant_animal_code`),
  ADD KEY `crop_plant_animals_product_id_foreign` (`product_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`),
  ADD KEY `days_season_id_foreign` (`season_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `districts_city_id_foreign` (`city_id`);

--
-- Indexes for table `experience_farms`
--
ALTER TABLE `experience_farms`
  ADD KEY `experience_farms_crop_plant_animal_id_foreign` (`crop_plant_animal_id`),
  ADD KEY `experience_farms_food_id_foreign` (`food_id`),
  ADD KEY `experience_farms_insecticide_id_foreign` (`insecticide_id`),
  ADD KEY `experience_farms_season_id_foreign` (`season_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD UNIQUE KEY `food_food_code_unique` (`food_code`),
  ADD KEY `food_category_id_foreign` (`category_id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friendships_sender_type_sender_id_index` (`sender_type`,`sender_id`),
  ADD KEY `friendships_recipient_type_recipient_id_index` (`recipient_type`,`recipient_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `groups_group_code_unique` (`group_code`),
  ADD KEY `groups_category_id_foreign` (`category_id`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD KEY `group_post_group_id_foreign` (`group_id`),
  ADD KEY `group_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`group_user_id`),
  ADD KEY `group_users_group_id_foreign` (`group_id`),
  ADD KEY `group_users_id_foreign` (`id`);

--
-- Indexes for table `insecticides`
--
ALTER TABLE `insecticides`
  ADD PRIMARY KEY (`insecticide_id`),
  ADD UNIQUE KEY `insecticides_insecticide_code_unique` (`insecticide_code`),
  ADD KEY `insecticides_category_id_foreign` (`category_id`);

--
-- Indexes for table `larapoll_options`
--
ALTER TABLE `larapoll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `larapoll_options_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `larapoll_polls`
--
ALTER TABLE `larapoll_polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `larapoll_votes`
--
ALTER TABLE `larapoll_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `larapoll_votes_option_id_foreign` (`option_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  ADD KEY `likes_user_id_index` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_id_foreign` (`from_id`),
  ADD KEY `messages_to_id_foreign` (`to_id`);

--
-- Indexes for table `message_groups`
--
ALTER TABLE `message_groups`
  ADD PRIMARY KEY (`message_group_id`),
  ADD KEY `message_group_from_id_users` (`from_id`),
  ADD KEY `message_group_from_id_groups` (`to_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transaction_code_unique` (`order_number`),
  ADD KEY `transaction_user_id_users` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`order_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permissions_permission_code_unique` (`permission_code`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`),
  ADD UNIQUE KEY `polls_poll_code_unique` (`poll_code`),
  ADD UNIQUE KEY `polls_poll_slug_unique` (`poll_slug`),
  ADD KEY `polls_poll_question_id_foreign` (`poll_question_id`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`poll_answer_id`),
  ADD KEY `poll_answers_poll_question_id_foreign` (`poll_question_id`);

--
-- Indexes for table `poll_questions`
--
ALTER TABLE `poll_questions`
  ADD PRIMARY KEY (`poll_question_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`post_image_id`),
  ADD KEY `post_images_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`post_like_id`),
  ADD KEY `post_likes_post_id_foreign` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_videos`
--
ALTER TABLE `post_videos`
  ADD PRIMARY KEY (`post_video_id`),
  ADD KEY `post_videos_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`post_view_id`),
  ADD KEY `post_views_post_id_foreign` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`relationship_id`),
  ADD KEY `sender_id` (`sender_id`,`receiver_id`),
  ADD KEY `relationships_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `roles_role_code_unique` (`role_code`);

--
-- Indexes for table `seasonals`
--
ALTER TABLE `seasonals`
  ADD PRIMARY KEY (`season_id`),
  ADD UNIQUE KEY `seasonals_season_code_unique` (`season_code`),
  ADD KEY `seasonals_year_id_foreign` (`year_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_follower_following_id_index` (`following_id`),
  ADD KEY `user_follower_follower_id_index` (`follower_id`),
  ADD KEY `user_follower_accepted_at_index` (`accepted_at`);

--
-- Indexes for table `user_friendship_groups`
--
ALTER TABLE `user_friendship_groups`
  ADD UNIQUE KEY `unique` (`friendship_id`,`friend_id`,`friend_type`,`group_id`),
  ADD KEY `user_friendship_groups_friend_type_friend_id_index` (`friend_type`,`friend_id`);

--
-- Indexes for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD KEY `user_votes_poll_answer_id_foreign` (`poll_answer_id`),
  ADD KEY `user_votes_user_id_foreign` (`user_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`ward_id`),
  ADD KEY `wards_district_id_foreign` (`district_id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`weather_id`),
  ADD UNIQUE KEY `weather_weather_code_unique` (`weather_code`),
  ADD KEY `weather_season_id_foreign` (`season_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crop_plant_animals`
--
ALTER TABLE `crop_plant_animals`
  MODIFY `crop_plant_animal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `group_user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insecticides`
--
ALTER TABLE `insecticides`
  MODIFY `insecticide_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `larapoll_options`
--
ALTER TABLE `larapoll_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `larapoll_polls`
--
ALTER TABLE `larapoll_polls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `larapoll_votes`
--
ALTER TABLE `larapoll_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `message_groups`
--
ALTER TABLE `message_groups`
  MODIFY `message_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2404983173;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `poll_answer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_questions`
--
ALTER TABLE `poll_questions`
  MODIFY `poll_question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `post_image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `post_like_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_videos`
--
ALTER TABLE `post_videos`
  MODIFY `post_video_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `post_view_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `relationship_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seasonals`
--
ALTER TABLE `seasonals`
  MODIFY `season_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_follower`
--
ALTER TABLE `user_follower`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `ward_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `weather_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `year_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `crop_plant_animals`
--
ALTER TABLE `crop_plant_animals`
  ADD CONSTRAINT `crop_plant_animals_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `days`
--
ALTER TABLE `days`
  ADD CONSTRAINT `days_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasonals` (`season_id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE;

--
-- Constraints for table `experience_farms`
--
ALTER TABLE `experience_farms`
  ADD CONSTRAINT `experience_farms_crop_plant_animal_id_foreign` FOREIGN KEY (`crop_plant_animal_id`) REFERENCES `crop_plant_animals` (`crop_plant_animal_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_farms_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `experience_farms_insecticide_id_foreign` FOREIGN KEY (`insecticide_id`) REFERENCES `insecticides` (`insecticide_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_farms_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasonals` (`season_id`) ON DELETE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `group_post`
--
ALTER TABLE `group_post`
  ADD CONSTRAINT `group_post_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_users_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `insecticides`
--
ALTER TABLE `insecticides`
  ADD CONSTRAINT `insecticides_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `larapoll_options`
--
ALTER TABLE `larapoll_options`
  ADD CONSTRAINT `larapoll_options_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `larapoll_polls` (`id`);

--
-- Constraints for table `larapoll_votes`
--
ALTER TABLE `larapoll_votes`
  ADD CONSTRAINT `larapoll_votes_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `larapoll_options` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_to_id_foreign` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_groups`
--
ALTER TABLE `message_groups`
  ADD CONSTRAINT `message_group_from_id_groups` FOREIGN KEY (`to_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_group_from_id_users` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `transaction_user_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_poll_question_id_foreign` FOREIGN KEY (`poll_question_id`) REFERENCES `poll_questions` (`poll_question_id`) ON DELETE CASCADE;

--
-- Constraints for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD CONSTRAINT `poll_answers_poll_question_id_foreign` FOREIGN KEY (`poll_question_id`) REFERENCES `poll_questions` (`poll_question_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_videos`
--
ALTER TABLE `post_videos`
  ADD CONSTRAINT `post_videos_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_views`
--
ALTER TABLE `post_views`
  ADD CONSTRAINT `post_views_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `relationships_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relationships_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seasonals`
--
ALTER TABLE `seasonals`
  ADD CONSTRAINT `seasonals_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`year_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD CONSTRAINT `user_follower_users_id` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_followerdasd_users_id` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_friendship_groups`
--
ALTER TABLE `user_friendship_groups`
  ADD CONSTRAINT `user_friendship_groups_friendship_id_foreign` FOREIGN KEY (`friendship_id`) REFERENCES `friendships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD CONSTRAINT `user_votes_poll_answer_id_foreign` FOREIGN KEY (`poll_answer_id`) REFERENCES `poll_answers` (`poll_answer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`) ON DELETE CASCADE;

--
-- Constraints for table `weather`
--
ALTER TABLE `weather`
  ADD CONSTRAINT `weather_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasonals` (`season_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
