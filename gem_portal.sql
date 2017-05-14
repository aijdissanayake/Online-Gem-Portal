-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 08:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gem_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `gem_sizes`
--

CREATE TABLE `gem_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gem_sizes`
--

INSERT INTO `gem_sizes` (`id`, `shop_id`, `size`, `active`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 8, 'Medium (5MM)', 1, 0, NULL, NULL),
(2, 8, 'Large (10MM)', 0, 1, NULL, '2017-05-01 06:54:16'),
(3, 8, 'Small (2MM)', 0, 1, '2017-05-01 07:07:16', '2017-05-01 07:08:11'),
(4, 8, 'Small (2MM)', 0, 1, '2017-05-01 07:08:27', '2017-05-01 07:08:32'),
(5, 8, 'Small (2MM)', 0, 1, '2017-05-01 07:08:36', '2017-05-01 11:34:35'),
(6, 6, 'Large(10MM)', 1, 0, '2017-05-01 11:34:22', '2017-05-01 11:34:22'),
(7, 6, 'Small(2MM)', 1, 0, '2017-05-01 12:00:13', '2017-05-01 12:00:13'),
(8, 1, 'Small(2MM)', 1, 0, '2017-05-03 02:18:42', '2017-05-03 02:18:42'),
(9, 1, 'Small(2MM)', 0, 1, '2017-05-03 02:18:43', '2017-05-03 02:18:49'),
(10, 6, 'Medium(5MM)', 1, 0, '2017-05-11 01:45:38', '2017-05-11 01:45:38'),
(11, 6, 'Average(3-7MM)', 0, 1, '2017-05-11 01:55:16', '2017-05-11 02:14:37'),
(12, 6, 'Maximum(<15MM)', 1, 0, '2017-05-11 01:57:01', '2017-05-11 01:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `gem_stones`
--

CREATE TABLE `gem_stones` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gem_type_id` int(11) NOT NULL,
  `gem_size_id` int(11) NOT NULL,
  `image_src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gem_stones`
--

INSERT INTO `gem_stones` (`id`, `shop_id`, `description`, `gem_type_id`, `gem_size_id`, `image_src`, `image_name`, `price`, `sold`, `active`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ruby from Ratnapura', 14, 6, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_14_6_2017-05-02_13-21-03.jpg', '6_14_6_2017-05-02_13-21-03.jpg', 99999, 0, 1, 0, '2017-05-01 15:40:23', '2017-05-14 00:42:02'),
(2, 1, 'Round Shaped Diamond', 15, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_15_7.png', '6_15_7.png', 100000, 0, 1, 0, '2017-05-02 04:22:46', '2017-05-02 04:22:46'),
(3, 1, 'New Blue Sapphire from Kahawatta.', 14, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_14_7.svg', '6_14_7.svg', 20000, 0, 1, 0, '2017-05-02 06:16:27', '2017-05-02 06:16:27'),
(4, 1, 'New Blue Sapphire from Kahawatta.', 14, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_14_7.svg', '6_14_7.svg', 20002, 0, 0, 1, '2017-05-02 06:18:51', '2017-05-03 03:16:07'),
(5, 1, 'Round Red Sapphire of 20 crt.', 14, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_14_7.jpeg', '6_14_7.jpeg', 40000, 0, 1, 0, '2017-05-02 07:25:24', '2017-05-02 07:25:24'),
(6, 6, 'Green Ruby - Rounded', 16, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_16_7.jpg', '6_16_7.jpg', 45555, 0, 1, 0, '2017-05-02 07:30:36', '2017-05-02 07:30:36'),
(7, 6, 'Light Blue Sapphire - 230 crt', 14, 7, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/6_Admin/6_14_7_2017-05-02_13-05-20.jpeg', '6_14_7_2017-05-02_13-05-20.jpeg', 50000, 0, 1, 0, '2017-05-02 07:35:20', '2017-05-03 01:42:08'),
(8, 1, 'Yellow Ruby - 400 Crts.', 17, 8, 'D:\\Projects\\Gem_Portal\\Laravel\\gem_portal/storage/app/shops/1_Vouge Gems/1_17_8_2017-05-03_08-27-04.jpg', '1_17_8_2017-05-03_08-27-04.jpg', 49999, 0, 1, 0, '2017-05-03 02:57:04', '2017-05-03 02:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `gem_types`
--

CREATE TABLE `gem_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gem_types`
--

INSERT INTO `gem_types` (`id`, `shop_id`, `type`, `active`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 8, 'Ruby', 0, 1, '2017-05-01 02:47:15', '2017-05-03 03:09:43'),
(2, 8, 'Spinel', 0, 1, '2017-05-01 02:59:01', '2017-05-01 06:51:36'),
(3, 8, 'Diamond', 1, 1, '2017-05-01 03:20:05', '2017-05-01 04:10:03'),
(4, 8, 'Ruby', 0, 1, '2017-05-01 04:09:13', '2017-05-03 03:13:43'),
(5, 8, 'Diamond', 1, 1, '2017-05-01 04:10:15', '2017-05-01 04:16:13'),
(6, 8, 'Ruby', 1, 1, '2017-05-01 04:16:01', '2017-05-01 04:16:19'),
(7, 8, 'Ruby', 1, 1, '2017-05-01 04:17:38', '2017-05-01 04:18:20'),
(8, 8, 'Ruby', 1, 1, '2017-05-01 04:17:38', '2017-05-01 04:18:05'),
(9, 8, 'Diamond', 0, 1, '2017-05-01 04:17:49', '2017-05-01 05:04:21'),
(10, 8, 'Ruby', 1, 0, '2017-05-01 05:04:28', '2017-05-01 05:04:28'),
(11, 8, 'Diamond', 0, 1, '2017-05-01 05:04:38', '2017-05-01 05:04:44'),
(12, 8, 'Diamond', 0, 1, '2017-05-01 05:08:33', '2017-05-01 05:09:10'),
(13, 8, 'Diamond', 0, 1, '2017-05-01 05:09:24', '2017-05-01 11:33:24'),
(14, 6, 'Sapphire', 1, 0, '2017-05-01 11:32:30', '2017-05-01 11:32:30'),
(15, 6, 'Diamond', 1, 0, '2017-05-01 11:33:29', '2017-05-01 11:33:29'),
(16, 6, 'Ruby', 1, 0, '2017-05-01 11:59:56', '2017-05-01 11:59:56'),
(17, 1, 'Ruby', 1, 0, '2017-05-03 02:18:11', '2017-05-03 02:18:11'),
(18, 6, 'Emarald', 1, 0, '2017-05-10 14:36:59', '2017-05-10 14:36:59'),
(19, 6, 'Spinel', 0, 1, '2017-05-11 01:27:06', '2017-05-11 01:44:25'),
(20, 6, 'Spinel', 0, 1, '2017-05-11 01:44:56', '2017-05-11 01:45:12'),
(21, 6, 'Spinel', 0, 1, '2017-05-11 01:45:14', '2017-05-11 01:47:51'),
(22, 6, 'New', 0, 1, '2017-05-11 01:50:02', '2017-05-11 01:50:12'),
(23, 6, 'Geuda', 1, 0, '2017-05-12 15:27:01', '2017-05-12 15:27:01'),
(24, 6, 'Tourmaline', 1, 0, '2017-05-12 15:27:18', '2017-05-12 15:27:18'),
(25, 6, 'Corundum', 1, 0, '2017-05-12 15:27:34', '2017-05-12 15:27:34'),
(26, 6, 'Garnet', 1, 0, '2017-05-12 15:27:47', '2017-05-12 15:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `kandy_live_chat`
--

CREATE TABLE `kandy_live_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `agent_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `begin_at` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `end_at` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandy_live_chat_rate`
--

CREATE TABLE `kandy_live_chat_rate` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rated_time` int(11) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandy_users`
--

CREATE TABLE `kandy_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `presence_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kandy_user_login`
--

CREATE TABLE `kandy_user_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `kandy_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `browser_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
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
(3, '2017_04_29_172704_add_columns_to_users', 2),
(4, '2017_04_29_173205_add_active_to_users', 3),
(5, '2017_04_30_210217_create_gem_types_table', 4),
(7, '2017_05_01_062042_create_shops_table', 5),
(8, '2017_05_01_095826_create_gem_sizes_table', 6),
(11, '2017_05_01_142144_create_gem_stones_table', 7),
(12, '2014_12_11_044619_create_kandy_user_table', 8),
(13, '2015_05_28_105113_create_kandy_live_chat_table', 8),
(14, '2015_06_01_091925_create_kandy_agent_rate_table', 8),
(15, '2015_07_22_033625_create_kandy_user_login_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('amara.85@gmail.com', '$2y$10$vWM5jon7cSZpPhbXn.IwB.1xPWyZgry.OLbUsVr1MrDR/5LUodaZu', '2017-05-01 12:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 22, '2017-05-01 10:25:52', '2017-05-01 10:25:52'),
(2, 7, NULL, NULL),
(3, 9, NULL, NULL),
(4, 17, NULL, NULL),
(5, 21, NULL, NULL),
(6, 8, NULL, NULL),
(7, 23, '2017-05-13 00:40:52', '2017-05-13 00:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `tel`, `active`) VALUES
(7, 'Ellawala Gems', 'shop', 'ellawala@gmail.com', '$2y$10$hM0xz3JdtTuOz6.MUiIc.eISc.NLX4X2C9MEgwbzaAdv7x6OD3X6O', 'Kv1TdliMnSCKmCuiGsy2ZYhMET7GNapKFMwuY0YTNrZFosyUxMrr8n25zGZT', '2017-04-29 07:32:11', '2017-04-30 05:19:58', '75, Ellaawala,  Kuruduwatta.', 113184826, 1),
(8, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$qNAW.gpLWbblRViEYi/W0.O6ZZz4pBShMiRyWOxLxEzKKlToENefi', 'hAk1fSDujPlHWzAzvQrhubZMqWavk9Eq0E4ZfuQBBei2sAhdgpoAWCMLqJJJ', '2017-04-29 07:37:16', '2017-04-29 07:37:16', '', 0, 1),
(9, 'Pinwatta Gems', 'shop', 'pinwatta@gmail.com', '$2y$10$o7qBNAQehS4LMxj99Yi6jOBXSlzQRPTCc.MGCCBmhBTvBnmvk1s0K', 'runqwX1eZJFN4uHowOXSTWBOCQY5QYpRR6QuJhhwQQ4vFoE1j6ZFUpND3g36', '2017-04-29 07:49:28', '2017-04-30 15:04:32', '259, Palmadulla, Ratnapura.', 985263987, 1),
(10, 'James Silva', 'buyer', 'james@gmail.com', '$2y$10$5cyZ2lTF3NHyxb822auq6uDIiUGQPr745LKIx0CGroDVfCfxcNEWu', 'i4H9B3KwsI0jy0yQcEM0Pup3fBM7CXTRGzJJZ0iUvKD4vdAkt56JDSQlbZAB', '2017-04-29 08:08:48', '2017-04-29 08:08:48', '', 0, 1),
(11, 'Nimal Perera', 'buyer', 'nimal@gmail.com', '$2y$10$ZFNHK5lhdOdH1ePe6zRWF.Mt0DikoefNogJAOhmd3.QGTmkdRJIiC', NULL, '2017-04-29 08:20:13', '2017-04-30 09:06:00', '', 0, 0),
(12, 'Nimali Perera', 'buyer', 'nimali@gmail.com', '$2y$10$yCfUUX7TKhlT33b/zeC10.kzll/AkEd4BYSnSzk5jwoDCEi3TbuNO', NULL, '2017-04-29 08:25:56', '2017-04-30 09:26:45', '', 0, 1),
(13, 'Achala Dissanayake', 'buyer', 'achala@gmail.com', '$2y$10$RO5NYuUzYdkVMM7w905es.Jv/pq4VWvYsKDlGJJlSiOv9Makw6nZm', '8BAh3PVadC7uIdZdwWTaZPUg5IH16t96mNja4dhyBvTPHIfio1IB2EDqza3W', '2017-04-29 08:28:24', '2017-04-30 09:08:34', '', 0, 1),
(14, 'Lahiru Alwis', 'buyer', 'lahiru@gmail.com', '$2y$10$L6bH7bfLyWZBzGlOl5HW3.L6XF.tgub/fAEH9y5gDnnf86ir0D3MK', NULL, '2017-04-29 08:51:47', '2017-04-30 09:09:06', '', 0, 0),
(15, 'Pavan Supul', 'buyer', 'pavan@gmail.com', '$2y$10$R7XJO5WAcwsF5vCOF4gNpOt4oLBqpqhwYdELf9Z5tGZoDzd1s4uaS', NULL, '2017-04-29 08:53:58', '2017-04-29 08:53:58', '', 0, 1),
(16, 'Ashen Gamage', 'buyer', 'ashen@gmail.com', '$2y$10$ZwODENYMT7XEMcUxz0r1Ze4JmqngWeS0OQEkx8Sa.0rJ.m/3SxE2K', 'ydcWyZd9LKbXzSgpcEy2CGSqaxHB4LBx6ulk1RszxWicIO8MxueH3yl62son', '2017-04-29 08:58:10', '2017-04-30 00:37:07', '165, Katubedda, Moratuwa.', 777777444, 1),
(17, 'Chamath Gems', 'shop', 'chamath@gmail.com', '$2y$10$XqqnzjsvBfwS1HFfFJRXde4KNTZAJWEFo2ptZn0wg23fWtE7r97Yu', 'kMlge9SVwSaZyejPgicETY4pq0Ax2K6ovG7CNNqeCFE4qlLM4jiJukHRSzYv', '2017-04-29 08:59:38', '2017-04-30 15:01:36', '125, Moraketiya, Pannipitiya.', 114585637, 1),
(18, 'Minoli Sanjana', 'buyer', 'minoli@gmail.com', '$2y$10$6dZGBh2KM9XWwCQ.JdwThO27tF/5Uee2xHUCfi2g4jfpuZNpEgBf.', 'Bq30zmFsPizJtk99WY1nvpU6EzySA1nMm210Mqn5skueqgfvpY1kCqBEIYq8', '2017-04-29 09:22:29', '2017-04-29 09:22:29', '', 0, 1),
(19, 'Amara Usgodaarachchi', 'buyer', 'amara.85@gmail.com', '$2y$10$UulHFeAZVTH60aCnrDCBBO0ZFHCor8.1mTvrAwnXcYHV5Z3SDpUda', '3gNSW2mkPqkbWUQntD73Mw3mDbjiCcCvR5WyiKQXD01CqqxEO8hwRT20IQky', '2017-04-29 12:51:21', '2017-04-29 23:10:19', '192/1, Hiripitiya, Pannipitiya.', 113184826, 1),
(20, 'Shane Wolff', 'buyer', 'shane@gmail.com', '$2y$10$oyUtuNzcPg5Igjz9iAdPqe0MtTyV7iMOcX/hvaO5z7c2.Fl4pcPUi', 'vJfCICJGw3ve5cA7e6vShWlz8rlQ4H6KjH4IwZrPDO7Ogu8qcZCE3gUV0eYb', '2017-05-01 10:21:55', '2017-05-01 10:21:55', '122, Rukmalgama, Pannipitiya.', NULL, 1),
(21, 'Kahawatta Gems', 'shop', 'kahawatta@gmail.com', '$2y$10$QZG1xYmJSQQVFWepAWsl3ODTpcOWeQ8vG4.Yhx7OElfwwFtZo51iK', 'XFOmQTKndf2cAOC2sew7jUHbhjvnYj7QoU6uSixKLTGe05YmlmQ468ty6y7I', '2017-05-01 10:23:15', '2017-05-01 10:23:15', '45, Kahawatta, Ratnapura.', NULL, 1),
(22, 'Vouge Gems', 'shop', 'vouge@gmail.com', '$2y$10$xhFXSRIfx/2iepWME330KeKo4E8oT3dAc7MfBKln2DfNtU6eSMA7e', 'DKKt16zQKdC8R1hoBQ0ID4q2awQw67gqf9be9Acra1Z1u8jRHgJXAg1Brkoi', '2017-05-01 10:25:52', '2017-05-13 23:21:36', '133, Galle Road, Bambalapitiya.', 752698887, 1),
(23, 'xperia', 'shop', 'xperia@gmail.com', '$2y$10$aNcaXXzx.OYGcTyjV1hgOepNg4NjkUjvIxi61WeXO5ENYyXw0kQwy', 'YAJSZxwhOrsupmMSBsDXq1JyEOHMGAJcjg89aGSvaSn7RN16Tz9WhgVq7eKh', '2017-05-13 00:40:52', '2017-05-13 00:40:52', '192/1, Hiripitiya, Pannipitiya.', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gem_sizes`
--
ALTER TABLE `gem_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gem_stones`
--
ALTER TABLE `gem_stones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gem_types`
--
ALTER TABLE `gem_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandy_live_chat`
--
ALTER TABLE `kandy_live_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandy_live_chat_customer_email_agent_user_id_index` (`customer_email`,`agent_user_id`);

--
-- Indexes for table `kandy_live_chat_rate`
--
ALTER TABLE `kandy_live_chat_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandy_live_chat_rate_main_user_id_index` (`main_user_id`);

--
-- Indexes for table `kandy_users`
--
ALTER TABLE `kandy_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandy_user_login`
--
ALTER TABLE `kandy_user_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandy_user_login_kandy_user_id_index` (`kandy_user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gem_sizes`
--
ALTER TABLE `gem_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gem_stones`
--
ALTER TABLE `gem_stones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gem_types`
--
ALTER TABLE `gem_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kandy_live_chat`
--
ALTER TABLE `kandy_live_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kandy_live_chat_rate`
--
ALTER TABLE `kandy_live_chat_rate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kandy_users`
--
ALTER TABLE `kandy_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kandy_user_login`
--
ALTER TABLE `kandy_user_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
