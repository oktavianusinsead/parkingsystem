-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 07:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypark`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact_number`, `subject`, `message`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'okta', 'superadmin@gmail.com', '15123', '123', '123', 1, '2024-04-28 22:25:06', '2024-04-28 22:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `rate` double(8,2) NOT NULL DEFAULT 0.00,
  `applicable_packages` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `valid_for` date DEFAULT NULL,
  `use_limit` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_histories`
--

CREATE TABLE `coupon_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` int(11) NOT NULL DEFAULT 0,
  `package` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `zone` int(11) NOT NULL DEFAULT 0,
  `floor_level` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `title`, `zone`, `floor_level`, `notes`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'LG', 2, 1, '', 1, 6, '2024-04-29 07:31:36', '2024-04-29 07:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `gates`
--

CREATE TABLE `gates` (
  `id` int(11) NOT NULL,
  `gateno` int(11) NOT NULL,
  `gatename` int(11) NOT NULL,
  `gate_type` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `floor_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logged_histories`
--

CREATE TABLE `logged_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(191) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `machineno` int(11) NOT NULL,
  `machinetype` int(11) NOT NULL,
  `machinename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_21_065337_create_permission_tables', 1),
(5, '2021_05_08_100002_create_subscriptions_table', 1),
(6, '2021_05_08_124950_create_settings_table', 1),
(7, '2021_05_29_180034_create_notice_boards_table', 1),
(8, '2021_05_29_183858_create_contacts_table', 1),
(9, '2023_08_04_164513_create_logged_histories_table', 1),
(10, '2024_01_12_141909_create_coupons_table', 1),
(11, '2024_01_12_171136_create_coupon_histories_table', 1),
(12, '2024_01_16_102108_create_parking_zones_table', 1),
(13, '2024_01_16_110454_create_vehicle_types_table', 1),
(14, '2024_01_16_114240_create_floors_table', 1),
(15, '2024_01_16_124135_create_parking_rates_table', 1),
(16, '2024_01_16_163436_create_parking_slots_table', 1),
(17, '2024_01_17_044202_create_rfid_vehicles_table', 1),
(18, '2024_01_17_064527_create_parkings_table', 1),
(19, '2024_02_17_052552_create_package_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

CREATE TABLE `notice_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_transactions`
--

CREATE TABLE `package_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `subscription_id` int(11) NOT NULL DEFAULT 0,
  `subscription_transactions_id` varchar(191) NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `transaction_id` varchar(191) DEFAULT NULL,
  `payment_status` varchar(191) DEFAULT NULL,
  `payment_type` varchar(191) DEFAULT NULL,
  `holder_name` varchar(100) DEFAULT NULL,
  `card_number` varchar(10) DEFAULT NULL,
  `card_expiry_month` varchar(10) DEFAULT NULL,
  `card_expiry_year` varchar(10) DEFAULT NULL,
  `receipt` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parking_id` int(11) NOT NULL DEFAULT 0,
  `zone` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `floor` int(11) NOT NULL DEFAULT 0,
  `slot` int(11) NOT NULL DEFAULT 0,
  `vehicle_number` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `entry_time` time DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `exit_time` time DEFAULT NULL,
  `total_duration` double(8,2) NOT NULL DEFAULT 0.00,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`id`, `parking_id`, `zone`, `type`, `floor`, `slot`, `vehicle_number`, `name`, `phone_number`, `entry_date`, `entry_time`, `exit_date`, `exit_time`, `total_duration`, `amount`, `payment_status`, `status`, `notes`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 0, 'B1214BRE', 'Okta', NULL, '2024-04-28', '20:05:18', '2024-04-28', '20:19:18', 2.00, 5000.00, 1, 0, NULL, 0, NULL, NULL),
(2, 1, 2, 2, 1, 1, 'B1234', 'okta', '125123', '2024-04-29', '14:39:00', NULL, NULL, 0.00, 0.00, 0, 1, '', 6, '2024-04-29 07:39:05', '2024-04-29 07:39:15'),
(3, 2, 2, 2, 1, 2, 'B267BDD', 'B267BDD', '125123', '2024-04-29', '14:41:00', NULL, NULL, 0.00, 0.00, 0, 0, '', 6, '2024-04-29 07:41:45', '2024-04-29 07:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `parking_rates`
--

CREATE TABLE `parking_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` int(11) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `vehicle_type` int(11) NOT NULL DEFAULT 0,
  `fix_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `hourly_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_rates`
--

INSERT INTO `parking_rates` (`id`, `zone`, `start_date`, `due_date`, `vehicle_type`, `fix_rate`, `hourly_rate`, `notes`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-04-29', '2025-04-29', 1, 5000.00, 4000.00, '', 1, '2024-04-28 23:12:42', '2024-04-28 23:12:42'),
(2, 2, '2024-04-28', '2024-09-02', 2, 5000.00, 4000.00, '', 6, '2024-04-29 07:32:17', '2024-04-29 07:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `zone` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `floor` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `title`, `zone`, `type`, `floor`, `notes`, `is_available`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Lot Mobil', 2, 2, 1, '', 0, 6, '2024-04-29 07:38:07', '2024-04-29 07:39:05'),
(2, 'S1', 2, 2, 1, '', 0, 6, '2024-04-29 07:41:15', '2024-04-29 07:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `parking_zones`
--

CREATE TABLE `parking_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(191) NOT NULL DEFAULT '0',
  `notes` varchar(191) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_zones`
--

INSERT INTO `parking_zones` (`id`, `zone_name`, `notes`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'All', '', 1, '2024-04-28 23:01:51', '2024-04-28 23:01:51'),
(2, 'All', '', 6, '2024-04-29 07:26:43', '2024-04-29 07:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage user', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(2, 'create user', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(3, 'edit user', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(4, 'delete user', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(5, 'manage role', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(6, 'create role', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(7, 'edit role', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(8, 'delete role', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(9, 'manage contact', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(10, 'create contact', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(11, 'edit contact', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(12, 'delete contact', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(13, 'manage support', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(14, 'create support', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(15, 'edit support', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(16, 'delete support', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(17, 'reply support', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(18, 'manage note', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(19, 'create note', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(20, 'edit note', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(21, 'delete note', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(22, 'manage logged history', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(23, 'delete logged history', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(24, 'manage pricing packages', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(25, 'create pricing packages', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(26, 'edit pricing packages', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(27, 'delete pricing packages', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(28, 'buy pricing packages', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(29, 'manage coupon', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(30, 'create coupon', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(31, 'edit coupon', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(32, 'delete coupon', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(33, 'manage coupon history', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(34, 'delete coupon history', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(35, 'manage pricing transation', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(36, 'manage account settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(37, 'manage password settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(38, 'manage general settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(39, 'manage company settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(40, 'manage email settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(41, 'manage payment settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(42, 'manage seo settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(43, 'manage google recaptcha settings', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(44, 'manage parking zone', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(45, 'create parking zone', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(46, 'edit parking zone', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(47, 'delete parking zone', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(48, 'manage vehicle type', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(49, 'create vehicle type', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(50, 'edit vehicle type', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(51, 'delete vehicle type', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(52, 'manage floor', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(53, 'create floor', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(54, 'edit floor', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(55, 'delete floor', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(56, 'manage parking rate', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(57, 'create parking rate', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(58, 'edit parking rate', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(59, 'delete parking rate', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(60, 'manage parking slot', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(61, 'create parking slot', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(62, 'edit parking slot', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(63, 'delete parking slot', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(64, 'manage rfid vehicle', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(65, 'create rfid vehicle', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(66, 'edit rfid vehicle', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(67, 'delete rfid vehicle', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(68, 'manage parking', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(69, 'create parking', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(70, 'edit parking', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(71, 'delete parking', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(72, 'show parking', 'web', '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(73, 'manage gate', 'web', NULL, NULL),
(74, 'create gate', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rfid_vehicles`
--

CREATE TABLE `rfid_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `floor` int(11) NOT NULL DEFAULT 0,
  `slot` int(11) NOT NULL DEFAULT 0,
  `vehicle_no` varchar(191) DEFAULT NULL,
  `rfid_no` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(2, 'owner', 'web', 0, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(3, 'manager', 'web', 2, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(4, 'super', 'web', 0, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(5, 'cpm', 'web', 1, '2024-04-28 22:57:25', '2024-04-28 22:57:25');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 5),
(7, 1),
(7, 2),
(7, 5),
(8, 1),
(8, 2),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(11, 5),
(12, 1),
(12, 2),
(12, 3),
(12, 5),
(13, 1),
(13, 2),
(13, 3),
(13, 5),
(14, 1),
(14, 2),
(14, 3),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 5),
(16, 1),
(16, 2),
(16, 3),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 5),
(21, 1),
(21, 2),
(21, 3),
(21, 5),
(22, 1),
(22, 2),
(22, 5),
(23, 1),
(23, 2),
(23, 5),
(24, 1),
(24, 2),
(24, 5),
(25, 1),
(25, 5),
(26, 1),
(26, 5),
(27, 1),
(27, 5),
(28, 2),
(29, 1),
(29, 5),
(30, 1),
(30, 5),
(31, 1),
(31, 5),
(32, 1),
(32, 5),
(33, 1),
(33, 5),
(34, 1),
(34, 5),
(35, 1),
(35, 2),
(35, 5),
(36, 1),
(36, 2),
(36, 5),
(37, 1),
(37, 2),
(37, 5),
(38, 1),
(38, 2),
(38, 5),
(39, 1),
(39, 2),
(39, 5),
(40, 1),
(40, 5),
(41, 1),
(41, 5),
(42, 1),
(42, 5),
(43, 1),
(43, 5),
(44, 1),
(44, 2),
(44, 3),
(44, 5),
(45, 1),
(45, 2),
(45, 3),
(45, 5),
(46, 1),
(46, 2),
(46, 3),
(46, 5),
(47, 1),
(47, 2),
(47, 3),
(47, 5),
(48, 1),
(48, 2),
(48, 3),
(48, 5),
(49, 1),
(49, 2),
(49, 3),
(49, 5),
(50, 1),
(50, 2),
(50, 3),
(50, 5),
(51, 2),
(51, 3),
(52, 2),
(52, 3),
(53, 2),
(53, 3),
(54, 2),
(54, 3),
(55, 2),
(55, 3),
(56, 1),
(56, 2),
(56, 3),
(56, 5),
(57, 1),
(57, 2),
(57, 3),
(57, 5),
(58, 2),
(58, 3),
(59, 2),
(59, 3),
(60, 2),
(60, 3),
(61, 2),
(61, 3),
(62, 2),
(62, 3),
(63, 2),
(63, 3),
(64, 2),
(64, 3),
(65, 2),
(65, 3),
(66, 2),
(66, 3),
(67, 2),
(67, 3),
(68, 2),
(68, 3),
(69, 2),
(69, 3),
(70, 2),
(70, 3),
(71, 2),
(71, 3),
(72, 2),
(72, 3),
(73, 1),
(74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `type`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'CURRENCY', 'IDR', 'payment', 1, NULL, NULL),
(2, 'CURRENCY_SYMBOL', 'Rp', 'payment', 1, NULL, NULL),
(3, 'company_logo', 'landing_logo.png', NULL, 1, NULL, NULL),
(4, 'app_name', 'Easy Parking', NULL, 1, NULL, NULL),
(5, 'company_name', 'EasyParking', NULL, 1, NULL, NULL),
(6, 'company_city', 'Jakarta', NULL, 1, NULL, NULL),
(7, 'company_email', 'oktavianus.programmer@gmail.com', NULL, 1, NULL, NULL),
(10, 'company_phone', '152312', NULL, 1, NULL, NULL),
(11, 'company_address', 'TEst', NULL, 1, NULL, NULL),
(12, 'company_currency_symbol', 'Rp', NULL, 1, NULL, NULL),
(13, 'timezone', 'Asia/Jakarta', NULL, 1, NULL, NULL),
(14, 'company_date_format', 'd-m-y', NULL, 1, NULL, NULL),
(15, 'company_time_format', 'g:i A', NULL, 1, NULL, NULL),
(16, 'parking_prefix', '#PARK-0000', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `package_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `interval` varchar(191) DEFAULT NULL,
  `user_limit` int(11) DEFAULT NULL,
  `parking_zone_limit` int(11) DEFAULT NULL,
  `enabled_logged_history` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `package_amount`, `interval`, `user_limit`, `parking_zone_limit`, `enabled_logged_history`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 0.00, 'Unlimited', 5, 5, 1, '2024-04-28 20:44:58', '2024-04-28 20:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `profile` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `lang` varchar(191) DEFAULT NULL,
  `subscription` int(11) DEFAULT NULL,
  `subscription_expire_date` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `profile`, `phone_number`, `lang`, `subscription`, `subscription_expire_date`, `parent_id`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 'super admin', '250px-Freddy_Krueger_1714394559.webp', NULL, 'english', NULL, NULL, 0, NULL, '$2y$10$wNPLumo01gxEMi/SckrJU.fnbxt3IqoCfLUxRN5FtkjDi0nnV4n9K', 1, NULL, '2024-04-28 20:44:58', '2024-04-29 05:42:39'),
(2, 'Owner', 'owner@gmail.com', 'manager', 'avatar.png', NULL, 'english', NULL, NULL, 0, NULL, '$2y$10$wNPLumo01gxEMi/SckrJU.fnbxt3IqoCfLUxRN5FtkjDi0nnV4n9K', 1, NULL, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(3, 'Manager', 'manager@gmail.com', 'manager', 'avatar.png', NULL, 'english', 0, NULL, 2, NULL, '$2y$10$x9Pg9u.JcRvLcTYp7u.1dO8XEb4AMCNdRhdFnNm2wRp7l9.GUSVt2', 1, NULL, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(4, 'okta', 'okta@gmail.com', 'owner', NULL, '125123', 'english', 1, NULL, 1, NULL, '$2y$10$zLYadnV0Iwa55rbAsRBGIOiyF3HoWxyrYxYHvIppOYMmt4C1jZuHW', 1, NULL, '2024-04-28 21:23:04', '2024-04-28 21:23:04'),
(5, 'Super User', 'superuser@gmail.com', 'cpm', 'avatar.png', NULL, 'english', NULL, NULL, 1, NULL, '$2y$10$wNPLumo01gxEMi/SckrJU.fnbxt3IqoCfLUxRN5FtkjDi0nnV4n9K', 1, NULL, '2024-04-28 20:44:58', '2024-04-28 20:44:58'),
(6, 'OTTO Parking', 'ottoparking@gmail.com', 'owner', NULL, '12345', 'english', NULL, NULL, 5, NULL, '$2y$10$u/9130vJuqrgOzkkWahcdOr8ZClvIrG3m0D4rsFO9Gj5Bmrs2pLBm', 1, NULL, '2024-04-28 23:19:41', '2024-04-28 23:19:41'),
(7, 'shinta', 'shinta@gmail.com', 'owner', NULL, '123456', 'english', 1, NULL, 1, NULL, '$2y$10$7FWhoVV0HA0VBzdfGLBrROlZDBZbNpESwCMgKl1LbHaTkxsz6CiFW', 1, NULL, '2024-04-29 06:00:30', '2024-04-29 06:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone` int(11) NOT NULL DEFAULT 0,
  `title` varchar(191) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `zone`, `title`, `notes`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobil', '', 1, 1, '2024-04-28 23:02:02', '2024-04-28 23:02:02'),
(2, 2, 'Mobil', '', 1, 6, '2024-04-29 07:31:20', '2024-04-29 07:31:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_histories`
--
ALTER TABLE `coupon_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gates`
--
ALTER TABLE `gates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logged_histories`
--
ALTER TABLE `logged_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notice_boards`
--
ALTER TABLE `notice_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_transactions`
--
ALTER TABLE `package_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_transactions_subscription_transactions_id_unique` (`subscription_transactions_id`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_rates`
--
ALTER TABLE `parking_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_zones`
--
ALTER TABLE `parking_zones`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rfid_vehicles`
--
ALTER TABLE `rfid_vehicles`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_parent_id_unique` (`name`,`parent_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_title_unique` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_histories`
--
ALTER TABLE `coupon_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gates`
--
ALTER TABLE `gates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logged_histories`
--
ALTER TABLE `logged_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notice_boards`
--
ALTER TABLE `notice_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_transactions`
--
ALTER TABLE `package_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parking_rates`
--
ALTER TABLE `parking_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parking_zones`
--
ALTER TABLE `parking_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `rfid_vehicles`
--
ALTER TABLE `rfid_vehicles`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
