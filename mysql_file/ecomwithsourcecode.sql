-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 10:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomwithsourcecode`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `type` enum('long','short_left','short_right') NOT NULL DEFAULT 'short_left',
  `view_section` enum('bellow_slider','bellow_trending_categories','bellow_product_type') NOT NULL DEFAULT 'bellow_slider',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `status`, `type`, `view_section`, `created_at`, `updated_at`) VALUES
(2, '1717912424.jfif', 'Active', 'short_left', 'bellow_slider', '2023-12-20 15:44:08', '2024-06-09 00:41:36'),
(5, '1717913922.jfif', 'Active', 'short_right', 'bellow_slider', '2024-06-09 00:18:42', '2024-06-09 00:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'color', NULL, NULL),
(2, 'size', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1717052741.jpg', 'Active', '2024-01-14 20:05:10', '2024-05-30 01:05:57'),
(2, '1705915737.png', 'Inactive', '2024-01-14 20:04:15', '2024-06-12 07:45:37'),
(3, '1706257692.jpg', 'Inactive', '2024-01-26 19:28:12', '2024-05-30 01:05:59'),
(4, '1706257733.jpg', 'Inactive', '2024-01-26 19:28:53', '2024-05-30 01:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flarish', '', '', '', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalogues`
--

CREATE TABLE `catalogues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogues`
--

INSERT INTO `catalogues` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Product', 'product', NULL, 'Active', NULL, NULL),
(2, 'man', 'ma', NULL, 'Active', '2024-07-16 06:59:20', '2024-07-16 06:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `catalogue_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `homepage_view` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `catalogue_id`, `name`, `slug`, `image`, `description`, `status`, `homepage_view`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'T-shirt', 't-shir', '1723957652.jpg', NULL, 'Active', 'no', '2024-06-12 11:23:11', '2024-08-17 23:08:24'),
(2, 0, 1, 'Full-Tshirt', 'full-tshir', '1723957874.jpg', NULL, 'Active', 'yes', '2024-06-12 11:56:57', '2024-08-17 23:11:14'),
(3, 0, 1, 'jersy', 'jers', '1723957979.jpg', NULL, 'Inactive', 'no', '2024-06-12 12:04:10', '2024-08-17 23:12:59'),
(4, 0, 1, 'SHART', 'shar', '1718215586.png', NULL, 'Inactive', 'yes', '2024-06-12 12:06:26', '2024-08-17 23:09:10'),
(5, 0, 1, 'RIFA', 'rif', '1718268120.jpg', 'NFDYFYJKH', 'Inactive', 'yes', '2024-06-13 02:42:00', '2024-08-17 23:09:13'),
(6, 0, 1, 'SHARI', 'shar', '1718537563.jpg', 'GHHJKK', 'Inactive', 'yes', '2024-06-16 05:32:43', '2024-08-17 23:09:18'),
(7, 0, 1, 'jacket', 'jacke', '1723957776.jpg', NULL, 'Active', 'yes', '2024-07-16 06:26:59', '2024-08-17 23:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` bigint(20) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `size_guide` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `support_hour` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `fb_order` varchar(2) DEFAULT '1',
  `youtube_order` varchar(2) DEFAULT '2',
  `insta_order` varchar(2) DEFAULT '3',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `logo`, `favicon`, `size_guide`, `phone`, `email`, `support_hour`, `facebook`, `youtube`, `instagram`, `fb_order`, `youtube_order`, `insta_order`, `created_at`, `updated_at`) VALUES
(1, '1717051301.jpg', '1717051301.png', '1715847437.jpg', '01909146434', 'shahjalal4645@gmail.com', 'office address 326 west shewrapara,mirpur,dhaka 1216(central mosques of shewrapara,haji sattar ali road) 8am-11pm(everyday) 01909146434 01723354980 shahjalal4645@gmail.com  towiter/f/instragram/youtube', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', '1', '1', '1', NULL, '2024-06-02 23:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bod` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `bod`, `company_name`, `country`, `street_address`, `city`, `created_at`, `updated_at`) VALUES
(1, 24, 'Shohag', NULL, NULL, NULL, NULL, NULL, '2024-06-12 12:16:42', '2024-06-12 12:16:42'),
(2, 25, 'amir', NULL, NULL, NULL, NULL, NULL, '2024-06-13 02:30:58', '2024-06-13 02:30:58'),
(3, 26, 'test purpose', NULL, NULL, NULL, NULL, NULL, '2024-07-16 06:32:05', '2024-07-16 06:32:05'),
(4, 28, 'Rifa', NULL, NULL, NULL, NULL, NULL, '2024-07-16 07:19:46', '2024-07-16 07:19:46'),
(5, 29, 'Hhhh', NULL, NULL, NULL, NULL, NULL, '2024-07-16 07:48:07', '2024-07-16 07:48:07'),
(6, 31, 'Asraful', NULL, NULL, NULL, NULL, NULL, '2024-07-16 10:39:43', '2024-07-16 10:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_27_030116_create_brands_table', 2),
(6, '2023_11_27_030454_create_catalogues_table', 3),
(7, '2023_11_27_031320_create_categories_table', 4),
(8, '2023_11_27_080300_create_attributes_table', 5),
(9, '2023_11_27_081510_create_product_variations_table', 6),
(10, '2023_11_27_082505_create_products_table', 7),
(11, '2023_11_27_101532_create_stocks_table', 7),
(12, '2023_11_27_104727_create_units_table', 8),
(13, '2023_11_28_054136_create_customers_table', 9),
(14, '2023_12_02_065417_create_orders_table', 9),
(15, '2023_12_02_065447_create_order_items_table', 9),
(16, '2023_12_02_065511_create_shippings_table', 9),
(17, '2023_12_02_065606_create_transactions_table', 9),
(18, '2023_12_04_023940_create_product_variation_details_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '17182131430.jpg', '2024-06-12 11:25:43', '2024-06-12 11:25:43'),
(2, 2, '17182153610.jpg', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(3, 2, '17182153611.jpg', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(4, 2, '17182153612.jpg', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(5, 2, '17182153613.jpg', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(6, 2, '17182153614.png', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(7, 2, '17182153615.jpg', '2024-06-12 12:02:41', '2024-06-12 12:02:41'),
(8, 3, '17182678790.png', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(9, 3, '17182678791.jpg', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(10, 3, '17182678792.png', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(11, 3, '17182678793.jpg', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(12, 3, '17182678794.jpg', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(13, 3, '17182678795.jpg', '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(14, 4, '17185373980.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(15, 4, '17185373981.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(16, 4, '17185373982.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(17, 4, '17185373983.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(18, 4, '17185373984.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(19, 4, '17185373985.jpg', '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(20, 5, '17211113840.jpg', '2024-07-16 06:29:45', '2024-07-16 06:29:45'),
(21, 5, '17211113851.jpg', '2024-07-16 06:29:45', '2024-07-16 06:29:45'),
(22, 5, '17211113852.jpg', '2024-07-16 06:29:45', '2024-07-16 06:29:45'),
(23, 6, '17211137920.jpeg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(24, 6, '17211137921.jpeg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(25, 6, '17211137922.jpeg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(26, 6, '17211137923.jpeg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(27, 6, '17211137924.jpeg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(28, 6, '17211137925.jpg', '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(29, 7, '17211155440.jpeg', '2024-07-16 07:39:04', '2024-07-16 07:39:04'),
(30, 7, '17211155441.jpg', '2024-07-16 07:39:04', '2024-07-16 07:39:04'),
(31, 8, '17211253380.jpg', '2024-07-16 10:22:18', '2024-07-16 10:22:18'),
(32, 8, '17211253381.jpeg', '2024-07-16 10:22:18', '2024-07-16 10:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `shipping` double DEFAULT 0,
  `total` double NOT NULL,
  `status` enum('ordered','delivered','canceled','shipping','confirm') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `shipping`, `total`, `status`, `is_shipping_different`, `created_at`, `updated_at`) VALUES
(1, 2, 1110, 0, 0, 120, 1230, 'confirm', 0, '2024-06-12 11:27:06', '2024-06-12 11:28:52'),
(2, 24, 1110, 0, 0, 120, 1230, 'ordered', 0, '2024-06-12 12:17:30', '2024-06-12 12:17:30'),
(3, 26, 2300, 0, 0, 70, 2370, 'ordered', 0, '2024-07-16 06:32:05', '2024-07-16 06:32:05'),
(4, 25, 2920, 0, 0, 70, 2990, 'ordered', 0, '2024-07-16 07:11:23', '2024-07-16 07:11:23'),
(5, 28, 700, 0, 0, 70, 770, 'ordered', 0, '2024-07-16 07:19:46', '2024-07-16 07:19:46'),
(6, 29, 930, 0, 0, 120, 1050, 'ordered', 0, '2024-07-16 07:48:07', '2024-07-16 07:48:07'),
(7, 28, 1550, 0, 0, 70, 1620, 'ordered', 0, '2024-07-16 10:29:18', '2024-07-16 10:29:18'),
(8, 31, 1550, 0, 0, 70, 1620, 'ordered', 0, '2024-07-16 10:39:43', '2024-07-16 10:39:43'),
(9, 31, 1550, 0, 0, 70, 1620, 'ordered', 0, '2024-07-16 10:42:58', '2024-07-16 10:42:58'),
(10, 31, 1550, 0, 0, 70, 1620, 'ordered', 0, '2024-07-16 10:44:45', '2024-07-16 10:44:45'),
(11, 31, 1550, 0, 0, 120, 1670, 'ordered', 0, '2024-07-16 10:50:31', '2024-07-16 10:50:31'),
(12, 2, 370, 0, 0, 70, 440, 'ordered', 0, '2024-08-18 00:46:35', '2024-08-18 00:46:35'),
(13, 2, 380, 0, 0, 120, 500, 'ordered', 0, '2024-08-18 00:59:46', '2024-08-18 00:59:46'),
(14, 2, 450, 0, 0, 120, 570, 'ordered', 0, '2024-08-18 07:02:36', '2024-08-18 07:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_variations_id` bigint(20) NOT NULL DEFAULT 0,
  `order_id` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `product_variations_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1110, 1, '2024-06-12 11:27:06', '2024-06-12 11:27:06'),
(2, 1, 0, 2, 1110, 1, '2024-06-12 12:17:30', '2024-06-12 12:17:30'),
(3, 5, 0, 3, 1150, 2, '2024-07-16 06:32:05', '2024-07-16 06:32:05'),
(4, 2, 0, 4, 750, 1, '2024-07-16 07:11:23', '2024-07-16 07:11:23'),
(5, 3, 0, 4, 320, 1, '2024-07-16 07:11:23', '2024-07-16 07:11:23'),
(6, 5, 0, 4, 1150, 1, '2024-07-16 07:11:23', '2024-07-16 07:11:23'),
(7, 6, 0, 4, 700, 1, '2024-07-16 07:11:23', '2024-07-16 07:11:23'),
(8, 6, 0, 5, 700, 1, '2024-07-16 07:19:46', '2024-07-16 07:19:46'),
(9, 7, 0, 6, 930, 1, '2024-07-16 07:48:07', '2024-07-16 07:48:07'),
(10, 8, 0, 7, 1550, 1, '2024-07-16 10:29:18', '2024-07-16 10:29:18'),
(11, 8, 0, 8, 1550, 1, '2024-07-16 10:39:43', '2024-07-16 10:39:43'),
(12, 8, 0, 9, 1550, 1, '2024-07-16 10:42:58', '2024-07-16 10:42:58'),
(13, 8, 0, 10, 1550, 1, '2024-07-16 10:44:45', '2024-07-16 10:44:45'),
(14, 8, 0, 11, 1550, 1, '2024-07-16 10:50:31', '2024-07-16 10:50:31'),
(15, 5, 2, 12, 370, 1, '2024-08-18 00:46:35', '2024-08-18 00:46:35'),
(16, 7, 0, 13, 380, 1, '2024-08-18 00:59:46', '2024-08-18 00:59:46'),
(17, 2, 1, 14, 450, 1, '2024-08-18 07:02:36', '2024-08-18 07:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT US', '<p>Friend\'s Corporation International is a packaging products manufacturing company in Bangladesh. We manufacture products in our own 4 factories. We mainly serve the needs of customers through online. We are committed to building customer relationships with trust.</p>', 'Active', '2024-06-09 02:04:15', '2024-06-09 04:13:12'),
(2, 'DELIVERY INFORMATION', '<p>We deliver goods all over Bangladesh through Courier / Transport. Courier fee to be borne by buyer. And use the product price payment system through the condition.</p>', 'Active', '2024-06-09 02:05:29', '2024-06-09 02:05:29'),
(3, 'CONTACT US', NULL, 'Active', '2024-06-09 02:06:06', '2024-06-09 02:06:06'),
(4, 'PRIVACY POLICY', NULL, 'Active', '2024-06-09 02:06:40', '2024-06-09 02:06:40'),
(5, 'EXCHANGE AND RETURN POLICY', NULL, 'Active', '2024-06-09 02:10:21', '2024-06-09 02:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `catalogue_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `type` bigint(20) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `has_stock` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `discount_type` enum('Fixed','Percentage','Not_Apply') NOT NULL DEFAULT 'Not_Apply',
  `discount_amount` double NOT NULL DEFAULT 0,
  `cost` double DEFAULT NULL,
  `mrp` double NOT NULL,
  `alert_stock` int(11) NOT NULL DEFAULT 0,
  `view_section` bigint(20) DEFAULT NULL,
  `size_guide` varchar(255) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `description` longtext DEFAULT NULL,
  `details_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `unit_id`, `catalogue_id`, `category_id`, `brand_id`, `title`, `slug`, `code`, `color`, `type`, `weight`, `has_stock`, `discount_type`, `discount_amount`, `cost`, `mrp`, `alert_stock`, `view_section`, `size_guide`, `tags`, `status`, `description`, `details_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 1, 'Mens Fashionable jacket', 'mens-fashionable-jacket', 'jacket-01', NULL, NULL, NULL, 'Yes', 'Not_Apply', 200, NULL, 800, 20, 1, NULL, NULL, 'Active', '<p>ohugcwgcw</p>', '<p>jhuffg</p>', '1723960001.jpg', '2024-08-17 23:46:41', '2024-08-17 23:46:41'),
(2, 1, 1, 7, 1, 'Men fashionable jacket', 'men-fashionable-jacke', 'jacket-02', NULL, NULL, NULL, 'Yes', 'Not_Apply', 150, NULL, 600, 20, 1, NULL, NULL, 'Active', '<p>kjdu</p>', '<p>hwij</p>', '1723960177.jpg', '2024-08-17 23:49:37', '2024-08-17 23:49:37'),
(3, 1, 1, 2, 1, 'Full sleve T-shirt', 'full-sleve-t-shir', 't-shirt-01', NULL, NULL, NULL, 'Yes', 'Not_Apply', 20, NULL, 400, 20, 1, NULL, NULL, 'Active', '<p>hgfhc</p>', '<p>dbugcbh</p>', '1723960315.jpg', '2024-08-17 23:51:55', '2024-08-17 23:51:55'),
(4, 1, 1, 1, 1, 'Mens Premium t-shirt', 'mens-premium-t-shir', 'tshirt-02', NULL, NULL, NULL, 'Yes', 'Not_Apply', 20, NULL, 500, 30, 1, NULL, NULL, 'Active', '<p>jdhcubcjnchagua</p>', '<p>jhgcuagcabcb</p>', '1723960439.jpg', '2024-08-17 23:53:59', '2024-08-17 23:53:59'),
(5, 1, 1, 2, 1, 'Men\'s Stylish comb t-shirt', 'mens-stylish-comb-t-shir', 't-shirt', NULL, NULL, NULL, 'Yes', 'Not_Apply', 30, NULL, 400, 20, 1, NULL, NULL, 'Active', '<p>haugahdgghkkkshygdv</p>', '<p>ohwygyghsuhg</p>', '1723961759.jpg', '2024-08-18 00:15:59', '2024-08-18 00:15:59'),
(6, 1, 1, 2, 1, 'T-shirt For men', 't-shirt-for-me', 't-shirt-04', NULL, NULL, NULL, 'Yes', 'Not_Apply', 50, NULL, 400, 20, 1, NULL, NULL, 'Active', '<p>keda kjwbuv yu nc vwb &nbsp;k</p>', '<p>lkcnic &nbsp;jsbcycv gcvc sncg &nbsp;</p>', '1723961883.jpg', '2024-08-18 00:18:03', '2024-08-18 00:18:03'),
(7, 1, 1, 7, 1, 'Mens premium jacket', 'mens-premium-jacke', 'jacket', NULL, NULL, NULL, 'Yes', 'Not_Apply', 20, NULL, 400, 20, 1, NULL, NULL, 'Active', '<p>egdygd jwg w hwd&nbsp;</p>', '<p>bwhbc wbw &nbsp;hw n &nbsp;</p>', '1723961969.png', '2024-08-18 00:19:29', '2024-08-18 00:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `image`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '1715920893.jpg', 'Winter Special', 'Active', '2023-12-20 15:41:47', '2024-05-17 14:41:33'),
(2, '1715920873.jpg', 'Summer Special', 'Active', '2023-12-20 15:42:09', '2024-05-17 14:41:13'),
(6, '1715920835.jpg', 'Rainy special', 'Active', '2024-05-17 14:40:35', '2024-05-17 14:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL),
(2, 'M', NULL, NULL),
(3, 'L', NULL, NULL),
(4, 'XL', NULL, NULL),
(5, 'XXL', NULL, NULL),
(10, '32', NULL, NULL),
(11, '34', NULL, NULL),
(12, '36', NULL, NULL),
(13, '38', NULL, NULL),
(14, '40', NULL, NULL),
(15, '42', NULL, NULL),
(16, '44', NULL, NULL),
(17, '46', NULL, NULL),
(18, '48', NULL, NULL),
(19, '4-5 YEARS', NULL, NULL),
(20, '6-7 YEARS', NULL, NULL),
(21, '8-9 YEARS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variation_details`
--

CREATE TABLE `product_variation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_variations_id` bigint(20) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variation_details`
--

INSERT INTO `product_variation_details` (`id`, `product_id`, `product_variations_id`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 1, NULL, '2024-06-30 10:43:57', '2024-06-30 10:43:57'),
(2, 1, 1, 0, 5, NULL, '2024-08-17 07:11:07', '2024-08-17 07:11:07'),
(3, 5, 1, 0, 20, NULL, '2024-08-18 00:27:21', '2024-08-18 00:27:21'),
(4, 5, 2, 0, 10, NULL, '2024-08-18 00:27:21', '2024-08-18 00:27:21'),
(5, 5, 3, 0, 5, NULL, '2024-08-18 00:27:21', '2024-08-18 00:27:21'),
(6, 5, 4, 0, 5, NULL, '2024-08-18 00:27:21', '2024-08-18 00:27:21'),
(7, 5, 5, 0, 10, NULL, '2024-08-18 00:27:21', '2024-08-18 00:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `available_qty` int(11) DEFAULT NULL,
  `alert_stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `available_qty`, `alert_stock`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 5, 10, '2024-06-12 11:25:43', '2024-08-17 07:11:07'),
(2, 2, 10, 1, 3, '2024-06-12 12:02:41', '2024-06-30 10:43:57'),
(3, 3, 10, 10, 3, '2024-06-13 02:37:59', '2024-06-13 02:37:59'),
(4, 4, 10, 10, 5, '2024-06-16 05:29:58', '2024-06-16 05:29:58'),
(5, 5, 100, 50, 20, '2024-07-16 06:29:45', '2024-08-18 00:27:21'),
(6, 6, 40, 40, 5, '2024-07-16 07:09:52', '2024-07-16 07:09:52'),
(7, 7, 10, 10, 5, '2024-07-16 07:39:04', '2024-07-16 07:39:04'),
(8, 8, 10, 10, 4, '2024-07-16 10:22:18', '2024-07-16 10:22:18'),
(9, 1, 100, 100, 20, '2024-08-17 23:46:41', '2024-08-17 23:46:41'),
(10, 2, 100, 100, 20, '2024-08-17 23:49:37', '2024-08-17 23:49:37'),
(11, 3, 100, 100, 20, '2024-08-17 23:51:55', '2024-08-17 23:51:55'),
(12, 4, 100, 100, 30, '2024-08-17 23:53:59', '2024-08-17 23:53:59'),
(13, 5, 100, 100, 20, '2024-08-18 00:15:59', '2024-08-18 00:15:59'),
(14, 6, 100, 100, 20, '2024-08-18 00:18:03', '2024-08-18 00:18:03'),
(15, 7, 100, 100, 20, '2024-08-18 00:19:29', '2024-08-18 00:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `mode` enum('cod','card','mobile_banking') NOT NULL DEFAULT 'cod',
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'piece', NULL, NULL, NULL),
(2, 'box', NULL, NULL, NULL),
(3, 'meter', NULL, NULL, NULL),
(4, 'cft', NULL, NULL, NULL),
(5, 'kg', NULL, NULL, NULL),
(6, 'liter', NULL, NULL, NULL),
(7, 'gm', NULL, NULL, NULL),
(8, 'dozon', NULL, NULL, NULL),
(9, 'cm', NULL, NULL, NULL),
(10, 'mm', NULL, NULL, NULL),
(11, 'ft', NULL, NULL, NULL),
(12, 'yard', NULL, NULL, NULL),
(13, 'ml', NULL, NULL, NULL),
(14, 'syp', NULL, NULL, NULL),
(15, 'bag', NULL, NULL, NULL),
(16, 'packet', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `designation_id` bigint(20) NOT NULL DEFAULT 0,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('Admin','Customer') NOT NULL DEFAULT 'Customer',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `designation_id`, `district`, `address`, `image`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Morshed Ahmed', 'superadmin@gmail.com', '017', NULL, '$2y$10$7MoHhANxFYCYBRPI.kpTm.SmlyfOXLWhazIOuAbBrMFvtr/d1MPzm', 0, NULL, 'abc', NULL, 'Admin', 'Active', NULL, NULL, NULL),
(2, 'ADMIN', 'flarish@gmail.com', '018', NULL, '$2y$10$XRbmmAK7EvqH2AdY/5oSee/nftOL2Yba4oWpSD8UC6xjQKArtdchK', 0, NULL, 'abc', NULL, 'Admin', 'Active', NULL, NULL, NULL),
(24, 'Shohag', 'rp8igzhj7r@greencafe24.com', '018828292992', NULL, '$2y$10$s5rOMwd/i3ZTDXGglmCH5eqSUTus4WmDUzL0skKLKyM/9TogC2yEi', 0, NULL, 'Kskjwnns', NULL, 'Customer', 'Inactive', NULL, '2024-06-12 12:16:42', '2024-07-16 07:24:48'),
(25, 'amir', 'amirhosenbakul.bd1995@gmail.com', '01640910440', NULL, '$2y$10$4nx6Fazc5O2HSLpTCyS0BekW.QBtaRXSrlLth6hFoti68xgvWn6EK', 0, NULL, 'House No-201, Road -02, Modhubag, Dakshin Khan, Dhaka 1230', NULL, 'Customer', 'Inactive', NULL, '2024-06-13 02:30:58', '2024-07-17 18:17:42'),
(26, 'test purpose', 'test@gmail.com', '01795232231', NULL, '$2y$10$IndLc4RcwxFaqHCBwSYJcudRWN5oftuvMhaHJlcSz7vp2wgaQk9Bi', 0, NULL, 'Mirpur Dohs,ave-6,road-7, H-536', NULL, 'Customer', 'Inactive', NULL, '2024-07-16 06:32:05', '2024-07-16 07:24:51'),
(28, 'Rifa', 'amirhosen0440@gmail.com', '01569140203', NULL, '$2y$10$NvT4brBPx3CbLkmxgB07OOLDhskmgeWvx9ZjHxmE5JcVTblCLX.Wi', 0, NULL, 'House 103, uttara dhaka', NULL, 'Customer', 'Inactive', NULL, '2024-07-16 07:19:46', '2024-07-16 07:24:46'),
(29, 'Hhhh', 'ggg', 'Gdfhjhh', NULL, '$2y$10$ivU2pSHzA5IlAUobBK8cQO1M/8LpJ1kpISElMhQEaXTloGC.LhHjm', 0, NULL, 'Hhhhh', NULL, 'Customer', 'Inactive', NULL, '2024-07-16 07:48:07', '2024-07-17 18:17:47'),
(31, 'Asraful', 'amirvaiya9@gmail.com', '01678269436', NULL, '$2y$10$PskKMAORyyqd8L5eSun1MOIfKhyYglB8T6L/e5ElTguyS5.ep8XrW', 0, NULL, 'House 12 uttara', NULL, 'Customer', 'Inactive', NULL, '2024-07-16 10:39:43', '2024-07-17 18:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `view_sections`
--

CREATE TABLE `view_sections` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view_sections`
--

INSERT INTO `view_sections` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Arrival', 'new_arrival', 'Active', '2024-05-04 08:03:28', '2024-05-04 08:04:46'),
(2, 'Feature Products', 'feature_products', 'Active', '2024-05-04 09:51:44', '2024-05-04 09:51:44'),
(3, 'Most Popular', 'most_popular', 'Active', '2024-05-04 09:51:55', '2024-05-04 09:51:55'),
(4, 'Best Seller', 'best_seller', 'Active', '2024-05-04 09:52:10', '2024-05-04 09:52:10'),
(5, 'Flash Sell', 'flash_sell', 'Active', '2024-05-04 09:52:29', '2024-05-04 09:52:29'),
(6, 'Speacial Offer', 'speacial_offer', 'Active', '2024-05-04 09:52:50', '2024-05-04 09:52:50'),
(7, 'Trending Products', 'trending_products', 'Active', '2024-05-04 09:53:06', '2024-05-04 09:53:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogues`
--
ALTER TABLE `catalogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variation_details`
--
ALTER TABLE `product_variation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `view_sections`
--
ALTER TABLE `view_sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catalogues`
--
ALTER TABLE `catalogues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_variation_details`
--
ALTER TABLE `product_variation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `view_sections`
--
ALTER TABLE `view_sections`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
