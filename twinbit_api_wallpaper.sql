-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2021 at 08:10 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twinbit_api_wallpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/images/banner/1612691596music_1.jpg', '2021-02-07 21:53:16', '2021-02-07 21:53:16'),
(2, 2, 'uploads/images/banner/16126916203d_20.jpg', '2021-02-07 21:53:40', '2021-02-07 21:53:40'),
(3, 3, 'uploads/images/banner/16126916433d_9.jpg', '2021-02-07 21:54:03', '2021-02-07 21:54:03'),
(4, 4, 'uploads/images/banner/16126917343d_28.jpg', '2021-02-07 21:55:34', '2021-02-07 21:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_new` smallint(6) NOT NULL DEFAULT '0',
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `is_new`, `image_thumb`, `image_background`, `created_at`, `updated_at`) VALUES
(1, 'Static', NULL, 0, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(2, 'Live', NULL, 0, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(3, 'Theme', NULL, 1, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(4, 'Test_Trending', NULL, 1, NULL, NULL, '2021-02-07 21:54:49', '2021-02-07 21:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `category_id`, `sub_category_id`, `image_thumb`, `image_1`, `image_2`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'uploads/images/1612341166calendar_72.jpg', 'uploads/images/1612341167calendar_72.jpg', 'uploads/images/1612341168calendar_72.jpg', '2021-02-03 20:32:48', '2021-02-03 20:32:48'),
(3, 1, 2, 'uploads/images/1612341201calendar_73.jpg', 'uploads/images/1612341202calendar_73.jpg', 'uploads/images/1612341203calendar_73.jpg', '2021-02-03 20:33:23', '2021-02-03 20:33:23'),
(4, 1, 2, 'uploads/images/1612341291calendar_74.jpg', 'uploads/images/1612341292calendar_74.jpg', 'uploads/images/1612341293calendar_74.jpg', '2021-02-03 20:34:53', '2021-02-03 20:34:53'),
(5, 1, 2, 'uploads/images/1612341315calendar_76.jpg', 'uploads/images/1612341316calendar_76.jpg', 'uploads/images/1612341317calendar_76.jpg', '2021-02-03 20:35:17', '2021-02-03 20:35:17'),
(6, 1, 2, 'uploads/images/1612341345calendar_82.jpg', 'uploads/images/1612341346calendar_82.jpg', 'uploads/images/1612341347calendar_82.jpg', '2021-02-03 20:35:47', '2021-02-03 20:35:47'),
(7, 1, 2, 'uploads/images/1612341406calender_77.jpg', 'uploads/images/1612341407calender_77.jpg', 'uploads/images/1612341408calender_77.jpg', '2021-02-03 20:36:48', '2021-02-03 20:36:48'),
(13, 2, 20, 'uploads/images/1612342304live_wallpaper_1.JPG', 'uploads/images/1612342305live_wallpaper_1.mov', 'uploads/images/1612342305live_wallpaper_1.JPG', '2021-02-03 20:51:45', '2021-02-03 20:51:45'),
(14, 2, 20, 'uploads/images/1612342363live_wallpaper_2.JPG', 'uploads/images/1612342364live_wallpaper_2.mov', 'uploads/images/1612342364live_wallpaper_2.JPG', '2021-02-03 20:52:44', '2021-02-03 20:52:44'),
(15, 2, 20, 'uploads/images/1612342415live_wallpaper_3.JPG', 'uploads/images/1612342416live_wallpaper_3.mov', 'uploads/images/1612342416live_wallpaper_3.JPG', '2021-02-03 20:53:36', '2021-02-03 20:53:36'),
(16, 2, 20, 'uploads/images/1612342451live_wallpaper_4.jpg', 'uploads/images/1612342452live_wallpaper_4.mov', 'uploads/images/1612342452live_wallpaper_4.jpg', '2021-02-03 20:54:12', '2021-02-03 20:54:12'),
(17, 2, 25, 'uploads/images/1612429853live_wallpaper_sea_3.jpg', 'uploads/images/1612429854live_wallpaper_sea_3.mov', 'uploads/images/1612429854live_wallpaper_sea_3.jpg', '2021-02-04 21:10:54', '2021-02-04 21:10:54'),
(18, 2, 29, 'uploads/images/1612430393live_wallpaper_sea_4.jpg', 'uploads/images/1612430393live_wallpaper_sea_4.mov', 'uploads/images/1612430393live_wallpaper_sea_3.jpg', '2021-02-04 21:19:53', '2021-02-04 21:19:53'),
(19, 2, 25, 'uploads/images/1612436273live_wallpaper_11.jpg', 'uploads/images/1612436274live_wallpaper_11.mov', 'uploads/images/1612436274live_wallpaper_11.jpg', '2021-02-04 22:57:54', '2021-02-04 22:57:54'),
(20, 2, 25, 'uploads/images/1612436337live_wallpaper_13.JPG', 'uploads/images/1612436338live_wallpaper_13.mov', 'uploads/images/1612436338live_wallpaper_13.JPG', '2021-02-04 22:58:58', '2021-02-04 22:58:58'),
(21, 2, 29, 'uploads/images/1612436414live_wallpaper_animal_1.jpg', 'uploads/images/1612436415live_wallpaper_animal_1.mov', 'uploads/images/1612436415live_wallpaper_animal_1.jpg', '2021-02-04 23:00:15', '2021-02-04 23:00:15'),
(22, 2, 29, 'uploads/images/1612436506live_wallpaper_animal_1.jpg', 'uploads/images/1612436507live_wallpaper_animal_1.mov', 'uploads/images/1612436507live_wallpaper_animal_1.jpg', '2021-02-04 23:01:47', '2021-02-04 23:01:47'),
(24, 4, 32, 'uploads/images/16126923073d_3.jpg', 'uploads/images/16126923083d_3@403x.png', 'uploads/images/16126923083d_3.jpg', '2021-02-07 22:05:08', '2021-02-07 22:05:08'),
(25, 4, 32, 'uploads/images/16126924983d_1.jpg', 'uploads/images/16126924993d_1@403x.png', 'uploads/images/16126924993d_1.jpg', '2021-02-07 22:08:19', '2021-02-07 22:08:19'),
(26, 4, 32, 'uploads/images/1612764160Happy_New_year_2@403x.png', 'uploads/images/1612764160Happy_New_year_2.jpg', 'uploads/images/1612764161Happy_New_year_2.jpg', '2021-02-08 18:02:41', '2021-02-08 18:02:41'),
(27, 4, 32, 'uploads/images/1612764196Happy_New_year_3@403x.png', 'uploads/images/1612764196Happy_New_year_3.jpg', 'uploads/images/1612764197Happy_New_year_3.jpg', '2021-02-08 18:03:17', '2021-02-08 18:03:17'),
(28, 4, 32, 'uploads/images/1612765307Happy_New_year_4@403x.png', 'uploads/images/1612765307Happy_New_year_4.jpg', 'uploads/images/1612765308Happy_New_year_4.jpg', '2021-02-08 18:21:48', '2021-02-08 18:21:48'),
(29, 3, 1, 'uploads/images/1614763511calendar_1@3x.png', 'uploads/images/1614763511calendar_1.jpg', 'uploads/images/16147635113d_10.jpg', '2021-03-03 21:25:11', '2021-03-03 21:25:11'),
(30, 3, 1, 'uploads/images/1614763540calendar_2@3x.png', 'uploads/images/1614763540calendar_2.jpg', 'uploads/images/16147635403d_11.jpg', '2021-03-03 21:25:40', '2021-03-03 21:25:40'),
(31, 3, 1, 'uploads/images/1614763562calendar_7@3x.png', 'uploads/images/1614763562calendar_7.jpg', 'uploads/images/16147635623d_26.jpg', '2021-03-03 21:26:02', '2021-03-03 21:26:02'),
(32, 3, 1, 'uploads/images/1614763601calendar_9@3x.png', 'uploads/images/1614763601calendar_9.jpg', 'uploads/images/16147636013d_28.jpg', '2021-03-03 21:26:41', '2021-03-03 21:26:41'),
(33, 3, 1, 'uploads/images/1614763887calendar_15@3x.png', 'uploads/images/1614763887calendar_15.jpg', 'uploads/images/16147638873d_31.jpg', '2021-03-03 21:31:27', '2021-03-03 21:31:27'),
(34, 3, 1, 'uploads/images/1614763911calendar_18@3x.png', 'uploads/images/1614763911calendar_18.jpg', 'uploads/images/16147639113d_38.jpg', '2021-03-03 21:31:51', '2021-03-03 21:31:51'),
(35, 2, 23, 'uploads/images/1614787419live_wallpaper_animal_2.jpg', 'uploads/images/1614787419live_wallpaper_animal_2.mov', 'uploads/images/1614787419live_wallpaper_25.jpg', '2021-03-04 04:03:39', '2021-03-04 04:03:39'),
(36, 2, 29, 'uploads/images/1614787551live_wallpaper_abstract_12.jpg', 'uploads/images/1614787551live_wallpaper_abstract_12.mov', 'uploads/images/1614787551live_wallpaper_abstract_6.jpg', '2021-03-04 04:05:51', '2021-03-04 04:05:51'),
(37, 1, 18, 'uploads/images/1614787735live_wallpaper_thumb_animal_5.jpg', 'uploads/images/1614787736live_wallpaper_thumb_animal_5.jpg', 'uploads/images/1614787737live_wallpaper_thumb_animal_5.jpg', '2021-03-04 04:08:57', '2021-03-04 04:08:57'),
(38, 1, 8, 'uploads/images/1614788655live_wallpaper_thumb_flower_3.jpg', 'uploads/images/1614788656live_wallpaper_thumb_flower_3.jpg', 'uploads/images/1614788657live_wallpaper_thumb_flower_3.jpg', '2021-03-04 04:24:17', '2021-03-04 04:24:17'),
(39, 1, 17, 'uploads/images/1614788696live_wallpaper_thumb_abstract_6.jpg', 'uploads/images/1614788697live_wallpaper_thumb_abstract_6.jpg', 'uploads/images/1614788698live_wallpaper_thumb_abstract_6.jpg', '2021-03-04 04:24:58', '2021-03-04 04:24:58'),
(40, 3, 1, 'uploads/images/1614790296live_wallpaper_thumb_zen_2.jpg', 'uploads/images/1614790296live_wallpaper_8.JPG', 'uploads/images/1614790296live_wallpaper_abstract_4.jpg', '2021-03-04 04:51:36', '2021-03-04 04:51:36'),
(41, 3, 1, 'uploads/images/1614791953live_wallpaper_thumb_flower_6.jpg', 'uploads/images/1614791953live_wallpaper_abstract_2.jpg', 'uploads/images/1614791953live_wallpaper_18.JPG', '2021-03-04 05:19:13', '2021-03-04 05:19:13'),
(42, 2, 24, 'uploads/images/1614931948live_wallpaper_abstract_13.jpg', 'uploads/images/1614931948live_wallpaper_abstract_13.mov', 'uploads/images/1614931948live_wallpaper_thumb_zen_5.jpg', '2021-03-05 20:12:28', '2021-03-05 20:12:28'),
(43, 2, 24, 'uploads/images/1614932417live_wallpaper_16.jpg', 'uploads/images/1614932417live_wallpaper_16.mov', 'uploads/images/1614932417live_wallpaper_thumb_abstract_17.jpg', '2021-03-05 20:20:17', '2021-03-05 20:20:17'),
(44, 4, 32, 'uploads/images/1614973209live_wallpaper_thumb_zen_1.jpg', 'uploads/images/1614973210live_wallpaper_thumb_zen_1.jpg', 'uploads/images/1614973211live_wallpaper_thumb_zen_1.jpg', '2021-03-06 07:40:11', '2021-03-06 07:40:11'),
(45, 4, 1, 'uploads/images/1614973307nature_2@3x.png', 'uploads/images/1614973308nature_2.jpg', 'uploads/images/1614973308nature_2@3x.png', '2021-03-06 07:41:48', '2021-03-06 07:41:48'),
(46, 4, 32, 'uploads/images/1614973375new_8@3x.png', 'uploads/images/1614973375new_8.jpg', 'uploads/images/1614973376new_8.jpg', '2021-03-06 07:42:56', '2021-03-06 07:42:56'),
(47, 1, 3, 'uploads/images/1614973523nature_14@3x.png', 'uploads/images/1614973523nature_14.jpg', 'uploads/images/1614973524nature_14.jpg', '2021-03-06 07:45:24', '2021-03-06 07:45:24'),
(48, 1, 1, 'uploads/images/1614973635nature_28@3x.png', 'uploads/images/1614973635nature_28.jpg', 'uploads/images/1614973636nature_28.jpg', '2021-03-06 07:47:16', '2021-03-06 07:47:16'),
(49, 4, 32, 'uploads/images/1614974067natural_41@3x.png', 'uploads/images/1614974067natural_41.jpg', 'uploads/images/1614974068natural_41.jpg', '2021-03-06 07:54:28', '2021-03-06 07:54:28'),
(50, 1, 7, 'uploads/images/1614975601natural_35@3x.png', 'uploads/images/1614975601natural_35.jpg', 'uploads/images/1614975602natural_35.jpg', '2021-03-06 08:20:02', '2021-03-06 08:20:02');

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
(144, '2014_10_12_000000_create_users_table', 1),
(145, '2014_10_12_100000_create_password_resets_table', 1),
(146, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(147, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(148, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(149, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(150, '2016_06_01_000004_create_oauth_clients_table', 1),
(151, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(152, '2019_08_19_000000_create_failed_jobs_table', 1),
(153, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(154, '2020_12_14_040144_create_sessions_table', 1),
(155, '2020_12_22_103807_laratrust_setup_tables', 1),
(156, '2020_12_28_150718_create_user_infos_table', 1),
(157, '2020_12_28_151530_create_user_create_histories_table', 1),
(158, '2021_01_28_105159_create_categories_table', 1),
(159, '2021_01_28_110039_create_sub_categories_table', 1),
(160, '2021_01_28_141002_create_images_table', 1),
(161, '2021_01_28_172738_create_banner_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('530b92628133eddcc2829d745c0d3ffaf26a6ea628f27854661324a213036a0c5ca8662299282e2f', 4, 1, 'userToken', '[]', 0, '2021-02-02 17:28:21', '2021-02-02 17:28:21', '2021-03-04 11:28:21'),
('a7d672e37fa985ff8f7c0ccaf05710aad78bd7498eac0341c33f7d7d9e0cd7601e6d700ffda58793', 4, 1, 'userToken', '[]', 0, '2021-02-12 06:52:13', '2021-02-12 06:52:13', '2021-03-14 00:52:13'),
('da7cab26ed456641d32f0440f23b11f15140d319e60d1e0d42d3948f1aaaf84177f747605bc385b4', 4, 1, 'userToken', '[]', 0, '2021-03-04 20:07:02', '2021-03-04 20:07:02', '2021-04-03 14:07:02'),
('f21dbf766236b664f5b462d13b31a2a853479c6ab09a0055214d88ca2540e5fcef286a742f5dba7f', 4, 1, 'userToken', '[]', 0, '2021-04-10 04:37:45', '2021-04-10 04:37:45', '2021-05-09 23:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'vOyzjtmJC4IMuJljFnKjMGE2ZC1VPJwiESpyHJLQ', NULL, 'http://localhost', 1, 0, 0, '2021-02-01 05:25:10', '2021-02-01 05:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-01 05:25:10', '2021-02-01 05:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'permission', 'Permission', 'Permission menu that goes under ACL', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(2, 'role', 'Role', 'Role menu that goes under ACL', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(3, 'user', 'User', 'User menu that goes under ACL', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(4, 'category', 'Category', 'Category menu', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(5, 'sub_category', 'Sub Category', 'Sub Category menu', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(6, 'image', 'Image', 'Image menu', '2021-02-01 05:25:06', '2021-02-01 05:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'name', 'display_name', 'description', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(2, 'super_admin', 'Super Admin', 'Super Admin', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(3, 'admin', 'Admin', 'Admin', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(4, 's_dev', 'Senior Developer', 'Senior Developer', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(5, 'dev', 'Developer', 'Developer', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(6, 'j_dev', 'Junior Developer', 'Junior Developer', '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(7, 'i_dev', 'Intern Developer', 'Intern Developer', '2021-02-01 05:25:06', '2021-02-01 05:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(5, 5, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3BlJi8Mh6tHA5qC5H9uQr65oNlF9XfrNusNGuoRc', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3JveHh3SFdldnlZYXJTemVQZXRjeXljcWV0SHFDa3kwTEMxMHU2NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616389501),
('3Ugl74cidz7LGUKsAdFKvSWKKHTRt7uO3Nf2RFZ0', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3NLRE1mN242QTl1MEF3aGxmTkhlTVNSakRkZGtvMGF4N2V1ZnlRSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387393),
('DChGpEuVjAk0PGxRanlDUFMxCfmlofzRfcDoRnIW', NULL, '203.112.73.19', 'Java/11.0.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR05wV0QzamRvUVZuZVdWaWd0QlFuZGZWTmg3Q1ptMTVZcHhlYnFEZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387402),
('GNHgt6qSr4AZ2BszGqcdODDVOK4JsvtsJeo4I9vG', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNEpMWDFEVG51TnlQZTd4a1Z5T25tblBSelcwVkNEdEJZUUlYWWhxZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387378),
('hjha4TxzoNdeJyBAmOMs9EH79zw06NpJIHaBOnMf', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUpuQmc3bFRuUXZPZDJ0RlY4N0pidDBjV2tYQmZTNWNNd0JhWU1NVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616469665),
('ktWxHltQExuPWow3XlEFyDk8t7NaQximMnDeL03F', NULL, '203.112.73.19', 'Java/11.0.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1BGbXlWVGp4WmRESHN6U1JwS3RHUUtDQ29wOVJKdk9JSmxQN1NEMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387315),
('LMqk43u3fuK0QKnGnZghlVV4j0wUhPmcrvZ53Edg', NULL, '203.112.73.19', 'Java/11.0.6', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGptN3hwc2VDbFRCZUlUdUVIWkFsWGVHQ2Z6R2NXUE5mWWswQlEwRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387353),
('qnxjnUmGkFBYH0nQAV94iG6DG4Fzcsg8dKhTcY9i', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS0lIWE85enlCamo5NnAwRDlhVjNtelFtZnhVNUJqZWRUV1dCUTdzQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387397),
('S3BbcQNxREeeYpImqWLW4QLpzHpRt7tw3ERANIsN', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3VBMml4Z2M5ZmMwQlhocFpNdU1JSjBoQ0o1QkJhSkJZdWNBblMzYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387363),
('sLCMiBDL59A9WlngyuxXjM22UglqqXI0EXOCaE1u', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2pTTkF5U0hlbzJzdGU0bzhZb0dIeEh1clhMc2JBZHAxakV6NFpFOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616387345),
('Um2wCnldcf7F5oV82u5hbDw0boanCj5Xts0y0qgU', NULL, '203.112.73.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMktYU0tjbmZHSGgxZmVoMmhoY2VmazV5VTc2TVBRTEZZOTBRV0NKViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9hcGkudHdpbmJpdC5uZXQvd2FsbHBhcGVyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1616558353);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_menu` smallint(6) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `is_menu`, `description`, `image_thumb`, `image_background`, `created_at`, `updated_at`) VALUES
(1, 1, 'Default', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(2, 1, 'Trending', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(3, 1, 'Today Now', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(4, 1, 'Trending Now', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(5, 1, 'Sunset', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(6, 1, 'Animal', 1, NULL, 'uploads/subCategory/1612159553Animal.png', 'uploads/subCategory/1612159553bgAnimal.png', '2021-02-01 05:25:06', '2021-02-01 18:05:53'),
(7, 1, 'Nature', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(8, 1, 'Flower', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(9, 1, 'Christmas', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(10, 1, 'New Year', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(11, 1, 'Abstract', 1, NULL, 'uploads/subCategory/1612159492Abstract.png', 'uploads/subCategory/1612159492bgAbstract.png', '2021-02-01 05:25:06', '2021-02-01 18:04:52'),
(12, 1, 'Music', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(13, 1, 'Art', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(14, 1, 'Fortnite', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(15, 1, 'Cyberpunk', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(16, 1, 'Games', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(17, 1, 'Super Heroes', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(18, 1, '3D', 1, NULL, 'uploads/subCategory/16121594023D.png', 'uploads/subCategory/1612159402bg3D.png', '2021-02-01 05:25:06', '2021-02-01 18:03:22'),
(19, 2, 'Default', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(20, 2, 'Nature', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(21, 2, 'Sports', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(22, 2, 'Sea', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(23, 2, 'Sci-fi', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(24, 2, 'Abstract', 1, NULL, 'uploads/subCategory/16126918373D.png', 'uploads/subCategory/1612691837bgAnimal.png', '2021-02-01 05:25:06', '2021-02-07 21:57:29'),
(25, 2, 'Zen', 1, NULL, 'uploads/subCategory/1612159451Zen.png', 'uploads/subCategory/1612159451bgZen.png', '2021-02-01 05:25:06', '2021-02-01 18:04:11'),
(26, 2, 'Ink', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(27, 2, 'Flower', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(28, 2, 'Cities', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(29, 2, 'Animal', 1, NULL, 'uploads/subCategory/1612330847Animal.png', 'uploads/subCategory/1612330847bgAnimal.png', '2021-02-01 05:25:06', '2021-02-03 17:40:47'),
(30, 3, 'Default', 0, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(31, 4, 'Default', 0, NULL, NULL, NULL, '2021-02-07 21:54:49', '2021-02-07 21:54:49'),
(32, 4, 'Test_Sub_Catagory_Trending', 1, NULL, 'uploads/subCategory/16126920063D.png', 'uploads/subCategory/1612692006bgFortnite.png', '2021-02-07 22:00:06', '2021-02-07 22:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `is_app` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_name`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_app`, `created_at`, `updated_at`) VALUES
(1, 'Dummy 1', 'd@g.com', NULL, NULL, '$2y$10$pptgjtfZLd4Ng6RX5WnEE.KsuxjrHfUu/Ys6/G/gu7N1MzQUY.4eS', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(2, 'Super Admin', 'sa@g.com', NULL, NULL, '$2y$10$HhcB2TzzDB/oP2A8L3vGbuJrt.ca/Q9WCHuAh4HRSf7bMVAruzTKm', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(3, 'Admin', 'a@g.com', NULL, NULL, '$2y$10$ps8vW9xohwKW.6Y8MqFVAeBgZr/yczZbqtwIrZPGyS7xJ8SXOg3ie', NULL, NULL, 'XzxbytIAMyqljcHIcorAXJWXwG8s7W4DOvu2uqGbUeOHrChM4QSwQpopCDku', NULL, NULL, NULL, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(4, 'General User App', NULL, 'general_user', NULL, '$2y$10$XHiHsj5/MWzuHXOzqfsh9eB4Exv6OXLZQW16MMsA.iieo5j3A9UzS', NULL, NULL, NULL, NULL, NULL, 1, '2021-02-01 05:25:06', '2021-02-01 05:25:06'),
(5, 'Tusher Twinbit', 'twinbit.israkul9@gmail.com', NULL, NULL, '$2y$10$J97EodvYeVGHh0c8OBrBBezDPPjfbXbq.uQiCKWOeAXXMILYD/l0m', NULL, NULL, 'gDniTfCRn6QLdO14HII69ST21PZZ3hVhsNuLLcMGiZyzUZb6f6MHZESb42bJ', NULL, NULL, NULL, '2021-03-01 16:59:09', '2021-03-01 17:04:10'),
(6, 'App User', 'app_user@gmail.com', NULL, NULL, '$2y$10$EqpIlmvhL/PZIX723T482ObDawZpRNueFebwyY/DJlYiAVBGVimXi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_create_histories`
--

CREATE TABLE `user_create_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `last_modified_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_create_histories`
--

INSERT INTO `user_create_histories` (`id`, `user_id`, `created_by_user_id`, `last_modified_by_user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 3, '2021-03-01 16:59:09', '2021-03-01 16:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `employment` text COLLATE utf8mb4_unicode_ci,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `date_of_birth`, `mobile_1`, `mobile_2`, `job_title`, `job_description`, `address`, `education`, `employment`, `skills`, `cv`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-01 16:59:09', '2021-03-01 16:59:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banner_images_image_unique` (`image`),
  ADD KEY `banner_images_category_id_index` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_is_new_index` (`is_new`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_image_thumb_unique` (`image_thumb`),
  ADD UNIQUE KEY `images_image_1_unique` (`image_1`),
  ADD UNIQUE KEY `images_image_2_unique` (`image_2`),
  ADD KEY `images_category_id_index` (`category_id`),
  ADD KEY `images_sub_category_id_index` (`sub_category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_index` (`category_id`),
  ADD KEY `sub_categories_is_menu_index` (`is_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_create_histories`
--
ALTER TABLE `user_create_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_create_histories_user_id_unique` (`user_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_infos_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_create_histories`
--
ALTER TABLE `user_create_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD CONSTRAINT `banner_images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `images_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD CONSTRAINT `user_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
