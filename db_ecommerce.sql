-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 06:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2021062923396a0120a5580826970c01b7c9056629970b.jpg', '2021-06-29 17:39:53', '2021-06-29 17:39:53'),
(2, 'Samsung', '202106292341Samsung_logo.jpg', '2021-06-29 17:41:03', '2021-06-29 17:41:03'),
(3, 'Dell', '202106292341dell_2016_logo_grid.png', '2021-06-29 17:41:21', '2021-06-29 17:41:21'),
(4, 'Sony', '202106292341105ae4cd25ce31b65a5120ba00a674bf.jpg', '2021-06-29 17:41:34', '2021-06-29 17:41:34'),
(5, 'Canon', '202106292342Canon-See-Impossible-Logo1.jpg', '2021-06-29 17:42:01', '2021-06-29 17:42:01'),
(6, 'Nikon', '2021062923424d9775ff4f14c1b4f4715b82726080d9.jpg', '2021-06-29 17:42:14', '2021-06-29 17:42:14'),
(7, 'Hourglass Jeans', '202106292342M265W_00.jpg', '2021-06-29 17:42:46', '2021-06-29 17:42:46'),
(8, 'Lala Lingerie', '2021062923431804652-1010-1-pique-polo-men-night-blue-2.jpg', '2021-06-29 17:43:06', '2021-06-29 17:43:06'),
(9, 'Herbal Essences', '20210629234317390414-decorative-cosmetics-for-makeup-close-up-.jpg', '2021-06-29 17:43:20', '2021-06-29 17:43:20'),
(10, 'Dove', '202106292343Dove_logo_soap.png', '2021-06-29 17:43:35', '2021-06-29 17:43:35'),
(11, 'Almedahls', '202106292343how-to-eat-more-fruits-and-veg.jpg', '2021-06-29 17:43:52', '2021-06-29 17:43:52'),
(12, 'Asus', '202106292344brand.gif', '2021-06-29 17:44:04', '2021-06-29 17:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, 1, '::1', 1, '2021-07-08 05:17:44', '2021-07-08 05:52:11'),
(6, 5, NULL, 1, '::1', 2, '2021-07-08 05:17:49', '2021-07-08 05:52:11'),
(7, 6, NULL, 1, '::1', 3, '2021-07-08 05:17:55', '2021-07-08 05:52:11'),
(13, 4, NULL, 3, '::1', 1, '2021-07-08 22:37:55', '2021-07-08 22:39:43'),
(14, 10, NULL, 3, '::1', 1, '2021-07-08 22:38:28', '2021-07-08 22:39:43'),
(15, 7, NULL, 3, '::1', 5, '2021-07-08 22:38:38', '2021-07-08 22:39:43'),
(16, 11, NULL, 3, '::1', 1, '2021-07-08 22:38:43', '2021-07-08 22:39:43'),
(17, 12, NULL, 3, '::1', 1, '2021-07-08 22:38:45', '2021-07-08 22:39:43'),
(18, 13, NULL, 3, '::1', 3, '2021-07-08 22:38:46', '2021-07-08 22:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ELECTRONICS', '2021062910238.png', '2021-06-29 04:23:57', '2021-06-29 04:23:57'),
(2, NULL, 'FASHION', '20210629102481mT6As2ztL._UX342_.jpg', '2021-06-29 04:24:30', '2021-06-29 04:24:30'),
(3, NULL, 'HOUSEHOLD', '20210629102461Jy4NTiLtL._SX466_.jpg', '2021-06-29 04:24:45', '2021-06-29 04:24:45'),
(4, NULL, 'PARSONAL CARE', '20210629102561ldZcxx1bL.jpg', '2021-06-29 04:25:00', '2021-06-29 04:25:00'),
(5, NULL, 'KITCHEN', '2021062910252-cream-white-kitchen-dining-room.jpeg', '2021-06-29 04:25:13', '2021-06-29 04:25:13'),
(6, 1, 'Desktop', '20210629102661-TOnca5GL._SX466_.jpg', '2021-06-29 04:26:43', '2021-06-29 04:26:43'),
(7, 1, 'Laptop', '20210629102734-235-070-V01.jpg', '2021-06-29 04:27:11', '2021-06-29 04:27:11'),
(8, 1, 'Mobile', '20210629102711.png', '2021-06-29 04:27:23', '2021-06-29 04:27:23'),
(9, 1, 'Tab', '202106291027372.jpg', '2021-06-29 04:27:39', '2021-06-29 04:27:39'),
(10, 1, 'Camera', '20210629102730-113-551-07.jpg', '2021-06-29 04:27:50', '2021-06-29 04:27:50'),
(11, 2, 'Men Polo', '20210629102817e96f22972592683fc1b29fc36dd483.jpg', '2021-06-29 04:28:33', '2021-06-29 04:28:33'),
(12, 2, 'Women Polo', '2021062910281.jpg', '2021-06-29 04:28:48', '2021-06-29 04:28:48'),
(13, 3, 'Kitchen & Dining', '2021062910291017-AD-GACH06-01_sq.jpg', '2021-06-29 04:29:15', '2021-06-29 04:29:15'),
(14, 4, 'Cosmetics', '20210629102931eQEpPMt6L._SY355_.jpg', '2021-06-29 04:29:28', '2021-06-29 04:29:28'),
(15, 4, 'Hair Care', '202106291029cura-luxe-t3.jpg', '2021-06-29 04:29:58', '2021-06-29 04:29:58'),
(16, 5, 'Fruits & Vegetables', '202106291030fruit-and-veg_1050x600.jpg', '2021-06-29 04:30:17', '2021-06-29 04:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka Sadar', '2021-06-30 17:26:35', '2021-06-30 17:26:35'),
(2, 1, 'Manikganj', '2021-06-30 17:26:55', '2021-06-30 17:26:55'),
(3, 1, 'Gazipur', '2021-06-30 17:27:31', '2021-06-30 17:27:31'),
(4, 1, 'Kishoreganj', '2021-06-30 17:27:37', '2021-06-30 17:27:37'),
(5, 1, 'Munshiganj', '2021-06-30 17:27:47', '2021-06-30 17:27:47'),
(6, 1, 'Narayanganj', '2021-06-30 17:27:54', '2021-06-30 17:27:54'),
(7, 1, 'Narsingdi', '2021-06-30 17:28:01', '2021-06-30 17:28:01'),
(8, 1, 'Tangail', '2021-06-30 17:28:09', '2021-06-30 17:28:09'),
(9, 1, 'Faridpur', '2021-06-30 17:28:16', '2021-06-30 17:28:16'),
(10, 1, 'Gopalganj', '2021-06-30 17:28:39', '2021-06-30 17:28:39'),
(11, 1, 'Madaripur', '2021-06-30 17:28:54', '2021-06-30 17:28:54'),
(12, 1, 'Rajbari', '2021-06-30 17:29:03', '2021-06-30 17:29:03'),
(13, 1, 'Shariatpur', '2021-06-30 17:29:10', '2021-06-30 17:29:10'),
(14, 2, 'Rajshahi Sadar', '2021-06-30 17:31:06', '2021-06-30 17:31:06'),
(15, 2, 'Pabna', '2021-06-30 17:31:15', '2021-06-30 17:31:15'),
(16, 2, 'Bogura', '2021-06-30 17:31:26', '2021-06-30 17:31:26'),
(17, 2, 'Chapainawabganj', '2021-06-30 17:31:33', '2021-06-30 17:31:33'),
(18, 2, 'Joypurhat', '2021-06-30 17:31:40', '2021-06-30 17:31:40'),
(19, 2, 'Naogaon', '2021-06-30 17:31:46', '2021-06-30 17:31:46'),
(20, 2, 'Natore', '2021-06-30 17:31:53', '2021-06-30 17:31:53'),
(21, 2, 'Sirajgonj', '2021-06-30 17:32:06', '2021-06-30 17:32:06'),
(22, 6, 'Mymensingh Sadar', '2021-06-30 17:34:16', '2021-06-30 17:34:16'),
(23, 6, 'Jamalpur', '2021-06-30 17:34:34', '2021-06-30 17:34:34'),
(24, 6, 'Netrokona', '2021-06-30 17:34:43', '2021-06-30 17:34:43'),
(25, 6, 'Sherpur', '2021-06-30 17:34:53', '2021-06-30 17:34:53'),
(26, 3, 'Barisal Sadar', '2021-06-30 17:36:16', '2021-06-30 17:36:16'),
(27, 3, 'Barguna', '2021-06-30 17:36:26', '2021-06-30 17:36:26'),
(28, 3, 'Bhola', '2021-06-30 17:36:34', '2021-06-30 17:36:34'),
(29, 3, 'Jhalokati', '2021-06-30 17:36:41', '2021-06-30 17:36:41'),
(30, 3, 'Patuakhali', '2021-06-30 17:36:49', '2021-06-30 17:36:49'),
(31, 3, 'Pirojpur', '2021-06-30 17:36:57', '2021-06-30 17:36:57'),
(32, 4, 'Chittagong Sadar', '2021-06-30 17:37:09', '2021-06-30 17:37:09'),
(33, 4, 'Brahmanbaria', '2021-06-30 17:37:21', '2021-06-30 17:37:21'),
(34, 4, 'Comilla', '2021-06-30 17:37:28', '2021-06-30 17:37:28'),
(35, 4, 'Chandpur', '2021-06-30 17:37:35', '2021-06-30 17:37:35'),
(36, 4, 'Lakshmipur', '2021-06-30 17:37:42', '2021-06-30 17:37:42'),
(37, 4, 'Noakhali', '2021-06-30 17:37:49', '2021-06-30 17:37:49'),
(38, 4, 'Feni', '2021-06-30 17:37:57', '2021-06-30 17:37:57'),
(39, 4, 'Khagrachhari', '2021-06-30 17:38:05', '2021-06-30 17:38:05'),
(40, 4, 'Rangamati', '2021-06-30 17:38:11', '2021-06-30 17:38:11'),
(41, 4, 'Bandarban', '2021-06-30 17:38:21', '2021-06-30 17:38:21'),
(42, 4, 'Cox\'s Bazar', '2021-06-30 17:38:39', '2021-06-30 17:38:39'),
(43, 5, 'Khulna Sadar', '2021-06-30 17:38:56', '2021-06-30 17:38:56'),
(44, 5, 'Bagerhat', '2021-06-30 17:39:13', '2021-06-30 17:39:13'),
(45, 5, 'Chuadanga', '2021-06-30 17:39:21', '2021-06-30 17:39:21'),
(46, 5, 'Jessore', '2021-06-30 17:39:28', '2021-06-30 17:39:28'),
(47, 5, 'Jhenaidah', '2021-06-30 17:39:34', '2021-06-30 17:39:34'),
(48, 5, 'Kushtia', '2021-06-30 17:39:42', '2021-06-30 17:39:42'),
(49, 5, 'Magura', '2021-06-30 17:39:50', '2021-06-30 17:39:50'),
(50, 5, 'Meherpur', '2021-06-30 17:39:58', '2021-06-30 17:39:58'),
(51, 5, 'Narail', '2021-06-30 17:40:05', '2021-06-30 17:40:05'),
(52, 5, 'Satkhira', '2021-06-30 17:40:13', '2021-06-30 17:40:13'),
(53, 7, 'Rangpur Sadar', '2021-06-30 17:41:18', '2021-06-30 17:41:18'),
(54, 7, 'Thakurgaon', '2021-06-30 17:41:25', '2021-06-30 17:41:25'),
(55, 7, 'Panchagarh', '2021-06-30 17:41:34', '2021-06-30 17:41:34'),
(56, 7, 'Nilphamari', '2021-06-30 17:41:41', '2021-06-30 17:41:41'),
(57, 7, 'Lalmonirhat', '2021-06-30 17:41:47', '2021-06-30 17:41:47'),
(58, 7, 'Kurigram', '2021-06-30 17:41:54', '2021-06-30 17:41:54'),
(59, 7, 'Gaibandha', '2021-06-30 17:42:01', '2021-06-30 17:42:01'),
(60, 7, 'Dinajpur', '2021-06-30 17:42:08', '2021-06-30 17:42:08'),
(61, 8, 'Sylhet Sadar', '2021-06-30 17:42:21', '2021-06-30 17:42:21'),
(62, 8, 'Habiganj', '2021-06-30 17:42:30', '2021-06-30 17:42:30'),
(63, 8, 'Moulvibazar', '2021-06-30 17:42:37', '2021-06-30 17:42:37'),
(64, 8, 'Sunamganj', '2021-06-30 17:42:43', '2021-06-30 17:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2021-06-30 09:00:10', '2021-06-30 09:00:10'),
(2, 'Rajshahi', 2, '2021-06-30 09:00:15', '2021-06-30 09:00:15'),
(3, 'Barishal', 3, '2021-06-30 09:00:23', '2021-06-30 09:00:23'),
(4, 'Chittagong', 4, '2021-06-30 09:00:42', '2021-06-30 09:00:42'),
(5, 'Khulna', 5, '2021-06-30 09:00:49', '2021-06-30 09:00:49'),
(6, 'Mymensingh', 6, '2021-06-30 09:00:58', '2021-06-30 09:00:58'),
(7, 'Rangpur', 7, '2021-06-30 09:01:05', '2021-06-30 09:01:05'),
(8, 'Sylhet', 8, '2021-06-30 09:01:12', '2021-06-30 09:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_29_091358_create_categories_table', 2),
(5, '2021_06_29_232729_create_brands_table', 3),
(7, '2021_06_30_005733_create_product_images_table', 5),
(8, '2021_06_30_004337_create_products_table', 6),
(9, '2021_06_30_144520_create_divisions_table', 7),
(10, '2021_06_30_144855_create_districts_table', 7),
(11, '2021_06_30_235313_create_sliders_table', 8),
(12, '2021_07_03_233233_create_carts_table', 9),
(13, '2021_07_07_093426_create_orders_table', 10),
(14, '2021_07_07_094037_create_payments_table', 10),
(15, '2021_07_07_094331_create_settings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_complete` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_charge` int(11) DEFAULT NULL,
  `customer_discount` int(11) DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `email`, `mobile`, `shipping_address`, `message`, `is_paid`, `is_complete`, `is_seen_by_admin`, `shipping_charge`, `customer_discount`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '::1', 'Montashir', 'laraveldevelopment2@gmail.com', '01712455610', 'Utter raninagar, Aminpur Pabna', 'fdgdfgdfg', 0, 0, 1, NULL, NULL, NULL, '2021-07-08 05:52:11', '2021-07-08 17:56:57'),
(2, 5, 2, '::1', 'Montashir', 'laraveldevelopment2@gmail.com', '01712455610', 'Nakharaj Bazar Aminpur Pabna', 'dfgdgdgdg', 1, 1, 1, 100, 50, '43534535353', '2021-07-08 07:18:19', '2021-07-08 19:02:22'),
(3, 5, 3, '::1', 'Montashir', 'laraveldevelopment2@gmail.com', '01712455610', 'fhfhfghfghfhfhf', 'fghfhfhfhfh', 1, 0, 1, 200, 30, '657657567', '2021-07-08 22:39:43', '2021-07-08 22:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent|Parsonal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_short_name_unique` (`short_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', NULL, 1, 'cash_in', '', '', '2021-07-07 11:54:40', '2021-07-07 11:54:40'),
(2, 'Bkash', NULL, 2, 'bkash', '01723344556', 'Agent', '2021-07-07 11:54:40', '2021-07-07 11:54:40'),
(3, 'Rocket', NULL, 3, 'rocket', '01756453423', 'Parsonal', '2021-07-07 11:54:40', '2021-07-07 11:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `product_key` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `available` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=In Stock, 0=Out of Stock',
  `condition` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=New, 0=Old',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `offer_price` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `description`, `price`, `product_key`, `quantity`, `available`, `condition`, `status`, `offer_price`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'iPhone 5', 'iphone-5', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 18000, '220', 10, 1, 1, 1, NULL, 1, 1, '2021-06-29 21:30:49', '2021-06-29 23:04:39'),
(2, 8, 2, 'Samsung s10', 'samsung-s10', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 20000, '221', 5, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:44:21', '2021-06-29 21:44:21'),
(3, 7, 1, 'MacBook pro', 'macbook-pro', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 200000, '222', 8, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:46:36', '2021-06-29 21:46:36'),
(4, 6, 1, 'iMac (Ratina Display)', 'imac-ratina-display', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 180000, '223', 5, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:50:08', '2021-06-29 21:50:08'),
(5, 6, 1, 'iMac pro', 'imac-pro', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 220000, '224', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:51:25', '2021-06-29 21:51:25'),
(6, 9, 2, 'Samsung tab', 'samsung-tab', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 19000, '225', 4, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:52:42', '2021-06-29 21:52:42'),
(7, 9, 1, 'iPad pro', 'ipad-pro', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 70000, '226', 7, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:54:31', '2021-06-29 21:54:31'),
(8, 6, 12, 'Asus Desktop', 'asus-desktop', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 56000, '227', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:55:20', '2021-06-29 21:55:20'),
(10, 10, 6, 'Nikon 7D', 'nikon-7d', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 8000, '228', 8, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:58:28', '2021-06-29 21:58:28'),
(11, 8, 1, 'iPhone 10', 'iphone-10', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 100000, '229', 6, 1, 1, 1, NULL, 1, NULL, '2021-06-29 21:59:31', '2021-06-29 21:59:31'),
(12, 8, 1, 'iPhone 11', 'iphone-11', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 120000, '230', 7, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:00:28', '2021-06-29 22:00:28'),
(13, 7, 1, 'Mac Book 16inc', 'mac-book-16inc', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 230000, '231', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:01:28', '2021-06-29 22:01:28'),
(14, 8, 2, 'Samsung s9', 'samsung-s9', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 30000, '232', 5, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:02:39', '2021-06-29 22:02:39'),
(15, 7, 12, 'Asus Gaming Book', 'asus-gaming-book', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 80000, '233', 7, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:04:42', '2021-06-29 22:04:42'),
(16, 7, 12, 'Asus VivoBook', 'asus-vivobook', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 110000, '234', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:06:00', '2021-06-29 22:06:00'),
(17, 7, 3, 'Dell Not Book', 'dell-not-book', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 60000, '235', 8, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:06:56', '2021-06-29 22:06:56'),
(18, 11, 11, 'Polo Brand shirt', 'polo-brand-shirt', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 800, '236', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:32:43', '2021-06-29 22:32:43'),
(19, 12, 7, 'Woman polo trans coat', 'woman-polo-trans-coat', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 3000, '237', 6, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:33:54', '2021-06-29 22:33:54'),
(20, 13, 11, 'Digital Dining Table', 'digital-dining-table', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 120000, '238', 7, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:35:24', '2021-06-29 22:35:24'),
(21, 10, 4, 'Sony A600', 'sony-a600', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 7000, '239', 5, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:36:46', '2021-06-29 22:36:46'),
(22, 14, 10, 'Dove Deep Moisture', 'dove-deep-moisture', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 3000, '240', 6, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:39:40', '2021-06-29 22:39:40'),
(23, 14, 9, 'Makeup Box', 'makeup-box', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 2300, '241', 8, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:40:26', '2021-06-29 22:40:26'),
(24, 13, 11, 'Aluminum Cookware Set', 'aluminum-cookware-set', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 2000, '242', 9, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:41:29', '2021-06-29 22:41:29'),
(25, 16, 11, 'Vegetables', 'vegetables', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 800, '243', 5, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:42:15', '2021-06-29 22:42:15'),
(26, 15, 9, 'Hair women', 'hair-women', '<span style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span>', 2300, '244', 7, 1, 1, 1, NULL, 1, NULL, '2021-06-29 22:43:51', '2021-06-29 22:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '202106300330iphone1.png', '2021-06-29 21:30:49', '2021-06-29 21:30:49'),
(2, 1, '202106300330iphone3.png', '2021-06-29 21:30:49', '2021-06-29 21:30:49'),
(3, 1, '202106300330IPhone4.png', '2021-06-29 21:30:49', '2021-06-29 21:30:49'),
(4, 2, '20210630034412.png', '2021-06-29 21:44:21', '2021-06-29 21:44:21'),
(5, 2, '20210630034416.png', '2021-06-29 21:44:22', '2021-06-29 21:44:22'),
(6, 2, '202106300344thumbnail-259x300-f5youth.png', '2021-06-29 21:44:22', '2021-06-29 21:44:22'),
(7, 3, '202106300346macbook_pro_2016_roundup_header.jpg', '2021-06-29 21:46:36', '2021-06-29 21:46:36'),
(8, 3, '202106300346macbookpro15inch2018.jpg', '2021-06-29 21:46:36', '2021-06-29 21:46:36'),
(9, 3, '202106300346macbookpro2018coding-800x442.jpg', '2021-06-29 21:46:37', '2021-06-29 21:46:37'),
(10, 4, '202106300350apple_z0vr_mrr02_22_27_imac_with_retina_1468617.jpg', '2021-06-29 21:50:08', '2021-06-29 21:50:08'),
(11, 4, '202106300350apple-imac-27-inch-late-2012-slim-display-29ghz-in.jpg', '2021-06-29 21:50:08', '2021-06-29 21:50:08'),
(12, 4, '202106300350IMac_Retina_5K.png', '2021-06-29 21:50:08', '2021-06-29 21:50:08'),
(13, 5, '202106300351IMac_Retina_5K.png', '2021-06-29 21:51:25', '2021-06-29 21:51:25'),
(14, 5, '202106300351imac-2019-27-and-21-5.jpg', '2021-06-29 21:51:25', '2021-06-29 21:51:25'),
(15, 5, '202106300351imac-2019-header.jpg', '2021-06-29 21:51:25', '2021-06-29 21:51:25'),
(16, 6, '202106300352372.jpg', '2021-06-29 21:52:42', '2021-06-29 21:52:42'),
(17, 6, '202106300352512804-samsung-galaxy-tab-s4-main.jpg', '2021-06-29 21:52:42', '2021-06-29 21:52:42'),
(18, 6, '202106300352Case-For-Huawei-MediaPad-T3-10-Protective-Cover-Tablet-For-huawei-t310-ags-w09-l09-l03.jpg', '2021-06-29 21:52:42', '2021-06-29 21:52:42'),
(19, 7, '202106300354AmsLnKKp.jpg', '2021-06-29 21:54:31', '2021-06-29 21:54:31'),
(20, 7, '202106300354ipad-air-2019-2.jpg', '2021-06-29 21:54:31', '2021-06-29 21:54:31'),
(21, 7, '202106300354lenovo-tab-e10-hero.png', '2021-06-29 21:54:31', '2021-06-29 21:54:31'),
(22, 8, '20210630035561EIpITRRRL._SX425_.jpg', '2021-06-29 21:55:20', '2021-06-29 21:55:20'),
(23, 8, '20210630035561-TOnca5GL._SX466_.jpg', '2021-06-29 21:55:20', '2021-06-29 21:55:20'),
(24, 8, '20210630035571sjWYfEomL._SL1500_.jpg', '2021-06-29 21:55:20', '2021-06-29 21:55:20'),
(25, 10, '20210630035830-113-551-07.jpg', '2021-06-29 21:58:28', '2021-06-29 21:58:28'),
(26, 10, '202106300358s-l640.jpg', '2021-06-29 21:58:28', '2021-06-29 21:58:28'),
(27, 11, '202106300359iphone2.png', '2021-06-29 21:59:31', '2021-06-29 21:59:31'),
(28, 11, '202106300359IPhone4.png', '2021-06-29 21:59:32', '2021-06-29 21:59:32'),
(29, 11, '202106300359iphonexr.jpg', '2021-06-29 21:59:32', '2021-06-29 21:59:32'),
(30, 12, '202106300400973a2f4d2cc10ace72ed09e14ba85ddc.jpg', '2021-06-29 22:00:28', '2021-06-29 22:00:28'),
(31, 12, '202106300400fwefwefwef.jpg', '2021-06-29 22:00:28', '2021-06-29 22:00:28'),
(32, 12, '202106300400iPhone-11-Mockups.jpg', '2021-06-29 22:00:28', '2021-06-29 22:00:28'),
(33, 12, '202106300400iphone-11-renders-kaymak-1.jpg', '2021-06-29 22:00:28', '2021-06-29 22:00:28'),
(34, 13, '202106300401macbookpro2018coding-800x442.jpg', '2021-06-29 22:01:28', '2021-06-29 22:01:28'),
(35, 13, '202106300401macbookpro2018sidebyside-800x408.jpg', '2021-06-29 22:01:28', '2021-06-29 22:01:28'),
(36, 13, '202106300401macbookprodisplay-800x470.jpg', '2021-06-29 22:01:28', '2021-06-29 22:01:28'),
(37, 14, '202106300402530cb4bc3c3c8943395bb4e0dd9feb35.jpg', '2021-06-29 22:02:39', '2021-06-29 22:02:39'),
(38, 14, '202106300402118580-v3-samsung-galaxy-s9-plus-mobile-phone-large-1.jpg', '2021-06-29 22:02:39', '2021-06-29 22:02:39'),
(39, 14, '202106300402Samsung-Galaxy-S9-1-1024x826.jpg', '2021-06-29 22:02:39', '2021-06-29 22:02:39'),
(40, 15, '202106300404ASUS-TUF-FX504GD-RS51_1200x1200_04.png', '2021-06-29 22:04:42', '2021-06-29 22:04:42'),
(41, 15, '202106300404review-laptop-ibuypower-chimera-cx-9-raqwe.com-00.jpg.pagespeed.ce.8lqVH0UCDG.jpg', '2021-06-29 22:04:43', '2021-06-29 22:04:43'),
(42, 15, '202106300404zdnet-asus-lamborghini-vx7-gaming-laptop.jpg', '2021-06-29 22:04:43', '2021-06-29 22:04:43'),
(43, 16, '202106300406ASUS-TUF-FX504GD-RS51_1200x1200_04.png', '2021-06-29 22:06:00', '2021-06-29 22:06:00'),
(44, 16, '202106300406Asus-X541UA-DM845D-Laptop-Core-i3-6th-Gen4-GB1-TBDOS.jpg', '2021-06-29 22:06:00', '2021-06-29 22:06:00'),
(45, 16, '202106300406FAm8opEnuV3xsUXENuLp23-1200-80.jpg', '2021-06-29 22:06:00', '2021-06-29 22:06:00'),
(46, 17, '202106300406FAm8opEnuV3xsUXENuLp23-1200-80.jpg', '2021-06-29 22:06:56', '2021-06-29 22:06:56'),
(47, 17, '202106300406kwP2nL8FAVboognXmW6nvP.jpg', '2021-06-29 22:06:56', '2021-06-29 22:06:56'),
(48, 17, '202106300406lsamsung-galaxy-tab-s4-003-lede.jpg', '2021-06-29 22:06:56', '2021-06-29 22:06:56'),
(49, 18, '20210630043217e96f22972592683fc1b29fc36dd483.jpg', '2021-06-29 22:32:43', '2021-06-29 22:32:43'),
(50, 18, '2021063004321804542-1010-1-travel-polo-men-night-blue-2.jpg', '2021-06-29 22:32:43', '2021-06-29 22:32:43'),
(51, 18, '2021063004321804652-1010-1-pique-polo-men-night-blue-2.jpg', '2021-06-29 22:32:43', '2021-06-29 22:32:43'),
(52, 19, '20210630043381mT6As2ztL._UX342_.jpg', '2021-06-29 22:33:54', '2021-06-29 22:33:54'),
(53, 19, '202106300433M265W_00.jpg', '2021-06-29 22:33:54', '2021-06-29 22:33:54'),
(54, 19, '202106300433one.png', '2021-06-29 22:33:54', '2021-06-29 22:33:54'),
(55, 20, '2021063004352-cream-white-kitchen-dining-room.jpeg', '2021-06-29 22:35:24', '2021-06-29 22:35:24'),
(56, 20, '2021063004354W0A9751.jpg', '2021-06-29 22:35:24', '2021-06-29 22:35:24'),
(57, 20, '202106300435b27af5393ff89d84c47a8f41718baec1.jpg', '2021-06-29 22:35:25', '2021-06-29 22:35:25'),
(58, 21, '20210630043661cubnNCZML._SL1200_.jpg', '2021-06-29 22:36:46', '2021-06-29 22:36:46'),
(59, 21, '2021063004361392158857_1029860.jpg', '2021-06-29 22:36:46', '2021-06-29 22:36:46'),
(60, 21, '202106300436Sony-A6000-Mirrorless-Digital-Camera-ILCE-6000L-with-16-50mm-Lens-24-3MP-Full-HD-Video.jpg_640x640q70.jpg', '2021-06-29 22:36:47', '2021-06-29 22:36:47'),
(61, 22, '20210630043931eQEpPMt6L._SY355_.jpg', '2021-06-29 22:39:40', '2021-06-29 22:39:40'),
(62, 22, '20210630043951vUGFwNV8L._SY355_.jpg', '2021-06-29 22:39:40', '2021-06-29 22:39:40'),
(63, 22, '20210630043971YF+O6HpmL._SL1500_.jpg', '2021-06-29 22:39:40', '2021-06-29 22:39:40'),
(64, 23, '20210630044061ldZcxx1bL.jpg', '2021-06-29 22:40:26', '2021-06-29 22:40:26'),
(65, 23, '20210630044017390414-decorative-cosmetics-for-makeup-close-up-.jpg', '2021-06-29 22:40:26', '2021-06-29 22:40:26'),
(66, 23, '202106300440cosmetics.jpg', '2021-06-29 22:40:26', '2021-06-29 22:40:26'),
(67, 24, '20210630044161Jy4NTiLtL._SX466_.jpg', '2021-06-29 22:41:29', '2021-06-29 22:41:29'),
(68, 24, '20210630044181UQAUXk1IL._SX466_.jpg', '2021-06-29 22:41:30', '2021-06-29 22:41:30'),
(69, 24, '20210630044191l5w1ylVzL._SX466_.jpg', '2021-06-29 22:41:30', '2021-06-29 22:41:30'),
(70, 25, '202106300442fruit-and-veg_1050x600 (1).jpg', '2021-06-29 22:42:15', '2021-06-29 22:42:15'),
(71, 25, '202106300442fruits-veggies (1).jpg', '2021-06-29 22:42:15', '2021-06-29 22:42:15'),
(72, 25, '202106300442frutas.jpg', '2021-06-29 22:42:15', '2021-06-29 22:42:15'),
(73, 26, '202106300443cura-luxe-t3.jpg', '2021-06-29 22:43:51', '2021-06-29 22:43:51'),
(74, 26, '202106300443maxresdefault (2).jpg', '2021-06-29 22:43:52', '2021-06-29 22:43:52'),
(75, 26, '202106300443womens-pink-polo.jpg', '2021-06-29 22:43:52', '2021-06-29 22:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `mobile`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Apple Mobile', '2021070101191.jpg', 'Shopping Now', 'http://localhost/laravelEcommerce/86024cad1e83101d97359d7351051156/iphone-5', 1, '2021-06-30 19:19:41', '2021-07-02 00:03:29'),
(2, 'Nikon Camera', '2021070101203.jpg', 'Shopping Now', 'http://localhost/laravelEcommerce/86024cad1e83101d97359d7351051156/nikon-7d', 2, '2021-06-30 19:20:50', '2021-07-02 00:03:49'),
(3, 'Asus Computer', '2021070101212.jpg', 'Shopping Now', 'http://localhost/laravelEcommerce/86024cad1e83101d97359d7351051156/asus-desktop', 3, '2021-06-30 19:21:07', '2021-07-02 00:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_addres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'District Table ID',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `email`, `role`, `email_verified_at`, `password`, `mobile`, `code`, `street_addres`, `gender`, `ip_address`, `division_id`, `district_id`, `image`, `status`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Montashir Billah', 'admin', 'montashir92@gmail.com', 'admin', NULL, '$2y$10$I5c4gBYOsvaliCsioJ.Fz.x/HuGbybx8fOJwOF2XpwvM55Fwoy7s6', '01712455660', NULL, NULL, 'Male', NULL, NULL, NULL, '202106290906gallery-03.jpg', 1, NULL, NULL, '2021-06-28 03:52:39', '2021-06-29 03:06:44'),
(2, 'Apple', 'admin', 'apple@gmail.com', 'user', NULL, '$2y$10$z2Btzt6dVJjAzYzreYyu5e52HpizP4chN2ZtgwokVzP5R4ugE7x6C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-29 02:30:54', '2021-06-29 02:30:54'),
(3, 'Test', 'admin', 'test@gmail.com', 'user', NULL, '$2y$10$53mWZ6rQpRLJJKsC/PKcMOdH6MRB9IeIrR.LB8cfbl/ZzANndlFle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-06-29 02:31:21', '2021-06-29 02:31:21'),
(5, 'Montashir', 'customer', 'laraveldevelopment2@gmail.com', NULL, NULL, '$2y$10$gAXENzwLSINuFv/va5FNjeyCkJDcRHtZNGT8jddNXL/gWT6Q0cMVS', '01712455610', '1598', 'Aminpur', 'Male', NULL, 2, 15, '202107061155gallery-07.jpg', 1, NULL, NULL, '2021-07-05 19:12:45', '2021-07-06 05:55:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
