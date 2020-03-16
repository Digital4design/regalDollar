-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2020 at 04:04 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.1.33-12+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localShopDev`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active; 0 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beauty', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(2, 'Off licence', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(3, 'Barbers/hairdresser', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(4, 'Vape', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(5, 'Take away', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(6, 'Corner shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(7, 'Coffee shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(8, 'Flower shop', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(9, 'Optician', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(10, 'Meat shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(11, 'Shoe/Clothes shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(12, 'Bakery', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(13, 'Pet shop', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(14, 'Mechanics/electrical', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(15, 'Toy shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(16, 'Sport shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(17, 'Phone shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(18, 'Charity shops', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(19, 'Sport supliments', NULL, '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(20, 'Tattoo Shops', NULL, '1', '2019-08-29 18:40:22', '2019-08-29 18:40:22'),
(21, 'Caring', NULL, '1', '2019-08-29 18:41:14', '2019-08-29 18:41:14'),
(22, 'Restaurants', NULL, '1', '2019-08-29 18:56:16', '2019-08-29 18:56:16'),
(23, 'Spas', NULL, '1', '2019-08-29 18:57:04', '2019-08-29 18:57:04'),
(24, 'Hotels', NULL, '1', '2019-08-29 18:57:45', '2019-08-29 18:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `cityName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active; 0 = Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abbey Wood', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(2, 'Acton', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(3, 'Barnes', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(4, 'Addington', '1', '2019-08-12 12:16:39', '2019-08-12 12:16:39'),
(5, 'Addiscombe', '1', '2019-08-12 12:16:54', '2019-08-12 12:16:54'),
(6, 'Albany Park', '1', '2019-08-12 12:17:14', '2019-08-12 12:17:14'),
(7, 'Aldborough Hatch', '1', '2019-08-12 12:17:27', '2019-08-12 12:17:27'),
(8, 'Aldgate', '1', '2019-08-12 12:17:43', '2019-08-12 12:17:43'),
(9, 'Aldwych', '1', '2019-08-12 12:17:55', '2019-08-12 12:17:55'),
(10, 'Alperton', '1', '2019-08-12 12:18:15', '2019-08-12 12:18:15'),
(11, 'Aberdeen', '1', '2019-08-19 11:09:16', '2019-08-19 11:09:16'),
(12, 'Belfast', '1', '2019-08-19 11:09:35', '2019-08-19 11:09:35'),
(13, 'Birmingham', '1', '2019-08-19 11:10:02', '2019-08-19 11:10:02'),
(14, 'Brighton', '1', '2019-08-19 11:11:23', '2019-08-19 11:11:23'),
(15, 'Bristol', '1', '2019-08-19 11:11:39', '2019-08-19 11:11:39'),
(16, 'Cambridge', '1', '2019-08-19 11:11:56', '2019-08-19 11:11:56'),
(17, 'Cardiff', '1', '2019-08-19 11:12:19', '2019-08-19 11:12:19'),
(18, 'Coventry', '1', '2019-08-19 11:12:36', '2019-08-19 11:12:36'),
(19, 'Derby', '1', '2019-08-19 11:13:46', '2019-08-19 11:13:46'),
(20, 'Dundee', '1', '2019-08-19 11:14:16', '2019-08-19 11:14:16'),
(21, 'Edinburgh', '1', '2019-08-19 11:14:48', '2019-08-19 11:14:48'),
(22, 'Exter', '1', '2019-08-19 11:15:16', '2019-08-19 11:15:16'),
(23, 'Glasgow', '1', '2019-08-19 11:15:43', '2019-08-19 11:15:43'),
(24, 'Ipswich', '1', '2019-08-19 11:16:20', '2019-08-19 11:16:20'),
(25, 'Leeds', '1', '2019-08-19 11:16:48', '2019-08-19 11:16:48'),
(26, 'Leicester', '1', '2019-08-19 11:17:47', '2019-08-19 11:17:47'),
(27, 'Liverpool', '1', '2019-08-19 11:18:17', '2019-08-19 11:18:17'),
(28, 'London', '1', '2019-08-19 11:18:36', '2019-08-19 11:18:36'),
(29, 'Manchester', '1', '2019-08-19 11:19:08', '2019-08-19 11:19:08'),
(30, 'Newcastle upon Tyne', '1', '2019-08-19 11:20:10', '2019-08-19 11:20:10'),
(31, 'Northampton', '1', '2019-08-19 11:21:26', '2019-08-19 11:21:26'),
(32, 'Norwich', '1', '2019-08-19 11:21:54', '2019-08-19 11:21:54'),
(33, 'Nottingham', '1', '2019-08-19 11:22:34', '2019-08-19 11:22:34'),
(34, 'Portsmouth', '1', '2019-08-19 11:31:25', '2019-08-19 11:31:25'),
(35, 'Sheffield', '1', '2019-08-19 11:31:48', '2019-08-19 11:31:48'),
(36, 'Southampton', '1', '2019-08-19 11:32:26', '2019-08-19 11:32:26'),
(37, 'Swansea', '1', '2019-08-19 11:33:11', '2019-08-19 11:33:11'),
(38, 'Swindon', '1', '2019-08-19 11:33:40', '2019-08-19 11:33:40'),
(39, 'Watford', '1', '2019-08-19 11:34:37', '2019-08-19 11:34:37'),
(43, 'Chandigarh', '1', '2019-10-17 09:37:44', '2019-10-17 09:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci,
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `login_signin` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = login_signin / 0 = login_signin',
  `advertise` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = login_signin / 0 = login_signin',
  `payment` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 = login_signin / 0 = login_signin',
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount_percentage`, `created_at`, `updated_at`) VALUES
(1, '40', '2019-11-27 00:43:15', '2019-11-27 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `gmaps_geocache`
--

CREATE TABLE `gmaps_geocache` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_07_08_071129_entrust_setup_tables', 1),
(14, '2019_07_11_072440_add_fields_to_users_table', 1),
(15, '2019_07_11_105534_snaps_adds_table', 1),
(16, '2019_07_15_102458_create_city_table', 1),
(17, '2019_07_16_084207_create_categories_table', 1),
(18, '2019_07_18_075559_price_list_tables', 1),
(19, '2019_07_23_091249_create_shop_details_table', 1),
(20, '2019_07_24_095545_create_gmaps_geocache_table', 1),
(21, '2019_07_30_065216_create_payment_table', 1),
(26, '2019_10_21_125444_create_visitor_table', 2),
(27, '2019_11_11_120155_create_contact_table', 3),
(28, '2019_11_27_144347_create_discount_table', 4);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricelisttables`
--

CREATE TABLE `pricelisttables` (
  `id` int(10) UNSIGNED NOT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active; 0 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricelisttables`
--

INSERT INTO `pricelisttables` (`id`, `hours`, `pricing`, `status`, `created_at`, `updated_at`) VALUES
(1, '8', '2.99', '1', '2019-07-30 23:26:24', '2019-09-03 12:32:36'),
(2, '10', '3.99', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(3, '12', '4.99', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(4, '14', '5.99', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(5, '16', '6.50', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(6, '18', '7.50', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(7, '20', '8.50', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(8, '22', '9.50', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24'),
(9, '24', '10', '1', '2019-07-30 23:26:24', '2019-07-30 23:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'admin', 'Admin', 'This is super admin role for login', '2019-04-26 11:30:00', '2019-04-26 11:30:00'),
(2, 'user', 'User', 'user role', '2019-04-26 11:30:00', '2019-04-26 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(10, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `shop_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `shop_address` longtext COLLATE utf8mb4_unicode_ci,
  `shop_area` longtext COLLATE utf8mb4_unicode_ci,
  `shop_info` longtext COLLATE utf8mb4_unicode_ci,
  `shop_image` longtext COLLATE utf8mb4_unicode_ci,
  `shop_latitude` longtext COLLATE utf8mb4_unicode_ci,
  `shop_longitude` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`id`, `user_id`, `shop_num`, `city_id`, `category_id`, `shop_address`, `shop_area`, `shop_info`, `shop_image`, `shop_latitude`, `shop_longitude`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 'Digital4Design', 2, 5, 'Vista Tower –Commercial Office space for rent in mohali-Commercial site, Industrial Area, Sector 75, Sahibzada Ajit Singh Nagar, Punjab, India', NULL, 'Vista Tower –Commercial Office space for rent in mohali-Commercial site', 'shop_image-1564570726.jpeg', '30.6988331', '76.6918586', '1', '2019-07-31 05:28:47', '2019-07-31 05:30:18'),
(11, 10, 'Mohali Shop', 3, 5, 'London, ON, Canada', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'shop_image-1565160382.jpeg', '42.9849233', '-81.2452768', '1', '2019-08-07 05:46:23', '2019-08-07 05:46:23'),
(13, 13, 'build', 2, 19, 'Stanley Road, London, UK', NULL, 'build for the future Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'shop_image-1565188409.PNG', '51.6124034', '-0.1274676', '1', '2019-08-07 13:30:33', '2019-10-17 06:51:24'),
(14, 2, 'Testing Shop', 2, 8, 'Mohan Nagar, Ghaziabad, Uttar Pradesh, India', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'shop_image-1565359845.jpeg', '28.672818', '77.3862836', '1', '2019-08-09 13:10:45', '2019-11-27 05:32:52'),
(15, 2, 'Digital4DesignMani', 2, 16, 'Mohali 7 Phase, Sahibzada Ajit Singh Nagar, India', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'shop_image-1565360111.jpeg', '30.7017355', '76.7247759', '1', '2019-08-09 13:15:11', '2019-11-27 06:48:39'),
(16, 2, 'Digital4Design Test', 3, 7, 'Mohali International Airport, Jhiurheri, Punjab, India', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'shop_image-1565361076.jpeg', '30.66810559999999', '76.7834701', '1', '2019-08-09 13:31:16', '2019-11-27 06:42:51'),
(17, 14, 'mukul testing', 3, 3, 'Mohali, Punjab, India', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'shop_image-1565362074.jpg', '30.7046486', '76.71787259999999', '1', '2019-08-09 13:47:54', '2019-08-09 13:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `snapsAddsTable`
--

CREATE TABLE `snapsAddsTable` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `adsType` enum('paid','free') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free' COMMENT '1 = Active; 0 = Deactive',
  `snapsAddsTitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapsAddsDescription` longtext COLLATE utf8mb4_unicode_ci,
  `snapsAddsImages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active; 0 = Deactive',
  `advert_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broadcast_on_site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_app` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adsPrices` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymetStatus` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = Payment Not Done; 1 = Payment Done',
  `expiredAt` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snapsAddsTable`
--

INSERT INTO `snapsAddsTable` (`id`, `user_id`, `shop_id`, `adsType`, `snapsAddsTitle`, `snapsAddsDescription`, `snapsAddsImages`, `status`, `advert_time`, `broadcast_on_site`, `phone_app`, `miles`, `adsPrices`, `paymetStatus`, `expiredAt`, `created_at`, `updated_at`) VALUES
(28, 2, 14, 'paid', 'Lorem Ipsum \n 43543', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'snapsAddsImages-1565787823.jpg', '0', '14', '1', '1', '5', '5.99', '1', '2019-08-21 08:33:43', '2019-08-14 17:33:43', '2019-08-14 17:33:43'),
(30, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1566286558.jpeg', '0', '8', '1', '1', '5', '2.99', '1', '2019-08-21 16:35:58', '2019-08-20 07:35:58', '2019-08-20 07:35:58'),
(31, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1566306984.jpeg', '0', '8', '1', '1', '6', '2.99', '1', '2019-08-20 22:16:24', '2019-08-20 13:16:24', '2019-08-20 13:16:24'),
(32, 2, 14, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1566450512.png', '0', '8', '1', '1', '8', '2.99', '1', '2019-08-22 14:08:32', '2019-08-22 05:08:32', '2019-08-22 05:08:32'),
(33, 2, 14, 'paid', 'Lorem Ipsum is simply', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567063726.jpeg', '0', '10', '1', '1', '1', '3.99', '0', '2019-08-29 18:28:46', '2019-08-29 07:28:46', '2019-08-29 07:28:46'),
(34, 13, 13, 'paid', 'builders', 'building for the future', 'snapsAddsImages-1567101188.PNG', '0', '8', '1', '2', '1', '2.99', '0', '2019-08-30 02:53:08', '2019-08-29 17:53:08', '2019-09-03 06:20:03'),
(35, 2, 14, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567138458.jpeg', '0', '8', '1', '1', '3', '2.99', '0', '2019-08-30 13:14:18', '2019-08-30 04:14:18', '2019-08-30 04:14:18'),
(36, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567139193.jpg', '0', '14', '1', '1', '4', '5.99', '0', '2019-08-30 19:26:33', '2019-08-30 04:26:33', '2019-08-30 04:26:33'),
(37, 2, 15, 'paid', 'test product', 'hello test', 'snapsAddsImages-1567139290.jpg', '0', '10', '1', '1', '5', '3.99', '0', '2019-08-30 15:28:10', '2019-08-30 04:28:10', '2019-08-30 04:28:10'),
(38, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567140658.jpeg', '0', '10', '1', '1', '7', '3.99', '0', '2019-08-30 15:50:58', '2019-08-30 04:50:58', '2019-08-30 04:50:58'),
(39, 2, 14, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567142270.jpeg', '0', '8', '1', '1', '3', '2.99', '0', '2019-08-30 09:17:50', '2019-08-30 05:17:50', '2019-08-30 05:17:50'),
(40, 2, 15, 'paid', 'Lorem Ipsum is simply', 'Lorem Ipsum is simply Lorem Ipsum is simply Lorem Ipsum is simply Lorem Ipsum is simply', 'snapsAddsImages-1567144613.jpeg', '0', '12', '1', '1', '3', '4.99', '0', '2019-08-30 18:56:53', '2019-08-30 05:56:53', '2019-08-30 05:56:53'),
(41, 2, 14, 'paid', 'Test', 'This is test info', 'snapsAddsImages-1567145103.jpg', '0', '8', '1', '1', '4', '2.99', '0', '2019-08-30 15:05:03', '2019-08-30 06:05:03', '2019-08-30 06:05:03'),
(42, 13, 13, 'paid', 'builders', 'builder info', 'snapsAddsImages-1567147309.PNG', '0', '8', '1', '1', '1', '2.99', '0', '2019-08-30 15:41:49', '2019-08-30 06:41:49', '2019-08-30 06:41:49'),
(43, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567149275.jpeg', '0', '12', '1', '1', '2', '4.99', '0', '2019-08-30 20:14:35', '2019-08-30 07:14:35', '2019-08-30 07:14:35'),
(44, 2, 16, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567151542.jpeg', '0', '10', '1', '1', '2', '3.99', '0', '2019-08-30 18:52:22', '2019-08-30 07:52:22', '2019-08-30 07:52:22'),
(45, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567154868.jpeg', '0', '8', '1', '1', '3', '2.99', '0', '2019-08-30 17:47:48', '2019-08-30 08:47:48', '2019-08-30 08:47:48'),
(46, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567166893.jpeg', '0', '10', '1', '1', '2', '3.99', '1', '2019-08-30 23:08:13', '2019-08-30 12:08:13', '2019-08-30 12:08:13'),
(47, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567167110.jpeg', '0', '14', '1', '1', '9', '5.99', '1', '2019-08-31 03:11:50', '2019-08-30 12:11:50', '2019-09-03 06:39:11'),
(48, 2, 15, 'paid', 'Lorem Ipsum12', 'Lorem Ipsum12Lorem Ipsum12Lorem Ipsum12Lorem Ipsum12', 'snapsAddsImages-1567502374.png', '0', '8', '1', '1', '3', '2.99', '0', '2019-09-03 18:19:34', '2019-09-03 09:19:34', '2019-09-03 09:19:34'),
(49, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567515403.png', '0', '8', '1', '1', '2', '2.99', '0', '2019-09-03 21:56:43', '2019-09-03 12:56:43', '2019-09-03 12:56:43'),
(50, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567599911.png', '0', '10', '1', '1', '8', '3.99', '0', '2019-09-04 23:25:11', '2019-09-04 12:25:11', '2019-09-04 12:25:11'),
(51, 13, 13, 'paid', 'builders', 'testing add', 'snapsAddsImages-1567876566.png', '0', '8', '1', '2', '1', '2.99', '1', '2019-09-08 02:16:06', '2019-09-07 17:16:06', '2019-09-07 17:16:06'),
(52, 2, 14, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1568088904.jpeg', '0', '8', '1', '1', '7', '2.99', '1', '2019-09-10 13:15:04', '2019-09-10 04:15:04', '2019-09-10 04:15:04'),
(53, 13, 13, 'paid', 'builders', 'info', 'snapsAddsImages-1570093591.PNG', '0', '8', '1', '2', '1', '2.99', '0', '2019-10-03 18:06:31', '2019-10-03 09:06:31', '2019-10-03 09:06:31'),
(54, 2, 15, 'paid', 'Lorem Ipsum', 'on Shop Details Page... can you put insteat of (add new shop) can you put (PLACE  A  ADD)\r\nI would like you to put (add new shop) underneath (edit shop)on Shop Details Page... can you put insteat of (add new shop) can you put (PLACE  A  ADD)\r\nI would like you to put (add new shop) underneath (edit shop)', 'snapsAddsImages-1571228202.jpeg', '0', '14', '1', '1', '3', '5.99', '0', '2019-10-16 21:33:38', '2019-10-16 06:33:38', '2019-10-16 06:33:38'),
(55, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571225629.jpeg', '0', '16', '1', '1', '4', '6.50', '0', '2019-10-17 04:33:49', '2019-10-16 11:33:49', '2019-10-16 11:33:49'),
(56, 2, 14, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1567151542.jpeg', '0', '14', '1', '1', '2', '5.99', '1', '2019-10-17 02:40:35', '2019-10-16 11:40:35', '2019-10-16 11:40:35'),
(57, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571228202.jpeg', '0', '18', '1', '1', '3', '7.50', '1', '2019-10-17 11:45:54', '2019-10-16 12:15:54', '2019-10-16 12:15:54'),
(58, 2, 16, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571228202.jpeg', '0', '14', '1', '1', '5', '5.99', '1', '2019-10-17 07:46:42', '2019-10-16 12:16:42', '2019-10-16 12:16:42'),
(59, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571377920.jpeg', '0', '10', '1', '1', '6', '3.99', '1', '2019-10-18 21:22:00', '2019-10-18 05:52:00', '2019-10-18 05:52:00'),
(60, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571390307.jpeg', '0', '14', '1', '1', '5', '5.99', '0', '2019-10-19 04:48:27', '2019-10-18 09:18:27', '2019-10-18 09:18:27'),
(61, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571390316.jpeg', '0', '14', '1', '1', '5', '5.99', '0', '2019-10-19 04:48:36', '2019-10-18 09:18:36', '2019-10-18 09:18:36'),
(62, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571390553.jpeg', '0', '14', '1', '1', '5', '5.99', '0', '2019-10-19 04:52:33', '2019-10-18 09:22:33', '2019-10-18 09:22:33'),
(63, 2, 15, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571390599.jpeg', '0', '14', '1', '1', '6', '5.99', '0', '2019-10-19 04:53:19', '2019-10-18 09:23:19', '2019-10-18 09:23:19'),
(64, 2, 16, 'paid', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571390801.jpeg', '0', '14', '1', '1', '2', '5.99', '0', '2019-10-19 04:56:41', '2019-10-18 09:26:41', '2019-10-18 09:26:41'),
(65, 2, 16, 'paid', 'Lorem Ipsum 32423', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1571404382.jpeg', '0', '12', '1', '1', '4', '4.99', '0', '2019-10-19 06:43:02', '2019-10-18 13:13:02', '2019-10-18 13:13:02'),
(66, 2, 14, 'paid', 'Lorem Ipsum', 'rtyrt', 'snapsAddsImages-1572520111.jpeg', '0', '12', NULL, NULL, '3', '4.99', '0', '2019-11-01 04:38:31', '2019-10-31 11:08:31', '2019-10-31 11:08:31'),
(67, 2, 15, 'paid', 'yuyt', 'tyuyt', 'snapsAddsImages-1574775708.jpeg', '0', '14', NULL, NULL, '3', '5.99', '0', '2019-11-27 09:11:48', '2019-11-26 13:41:48', '2019-11-26 13:41:48'),
(68, 2, 14, 'paid', 'Lorem Ipsum435345', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1574832619.jpeg', '0', '12', NULL, NULL, '3', '4.99', '0', '2019-11-27 23:00:19', '2019-11-27 05:30:19', '2019-11-27 05:30:19'),
(69, 2, 14, 'paid', 'Lorem Ipsum 6456546', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1574832772.jpeg', '0', '12', NULL, NULL, '7', '4.99', '0', '2019-11-27 23:02:52', '2019-11-27 05:32:52', '2019-11-27 05:32:52'),
(70, 2, 15, 'paid', 'Lorem Ipsum 85647567', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1574835631.jpeg', '0', '12', NULL, NULL, '3', '4.99', '0', '2019-11-27 23:50:31', '2019-11-27 06:20:31', '2019-11-27 06:20:31'),
(71, 2, 16, 'paid', 'Lorem Ipsum 43543543', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1574836971.jpeg', '0', '12', NULL, NULL, '2', '4.99', '0', '2019-11-28 00:12:51', '2019-11-27 06:42:51', '2019-11-27 06:42:51'),
(72, 2, 15, 'paid', 'Lorem Ipsum 432534435', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'snapsAddsImages-1574837173.jpeg', '0', '16', NULL, NULL, '4', '3.25', '1', '2019-11-28 04:16:13', '2019-11-27 06:46:13', '2019-11-27 06:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` text COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active; 0 = Blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_picture`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'amdin', 'testdigital4design@gmail.com', '2019-07-30 23:26:24', '$2y$10$r0SnzcHR8L.zFoce1X2zG.8XFtVsuZEIqbWyF86CyTOUKFcyfVdm6', NULL, 'admin-1566214729.jpeg', '1', '2019-07-30 23:26:24', '2019-08-19 16:08:49'),
(2, 'User', 'User', 'user21321', 'testd4d@yopmail.com', '2019-07-30 23:26:24', '$2y$10$bMobbxJXOds5tG3AATXkOunNwJQYTfm/J.SoJnUc6NBeUgEczbUbe', NULL, 'user-1565787892.jpeg', '1', '2019-07-30 23:26:24', '2019-08-14 17:34:52'),
(3, 'Manish', 'Pathak', 'mani86345435', 'mani86@yopmail.com', '2019-07-31 05:16:05', '$2y$10$vh1znf2rFoyiZxCal0vN7eaRU7uJfnzY0TOrgY1IPBoczQ5fVweIu', NULL, NULL, '1', '2019-07-31 05:15:31', '2019-07-31 05:55:41'),
(10, 'Expert', 'Expert', 'expert', 'expert@yopmail.com', '2019-08-07 05:45:32', '$2y$10$ChQkvcuW/h.JQwp..E41aeBkkFRjMUnMBO4iJQVEqv0TaALMnzdAG', NULL, NULL, '1', '2019-08-07 05:45:02', '2019-08-07 05:45:32'),
(13, 'carig', 'hay', 'chay', 'bryantbs@live.co.uk', '2019-08-07 13:28:19', '$2y$10$vkm5TdrKr/J.Eeb2bptvvuJJJ1BzZ7Plk1HhwaU2ri3uLD3Etq5m2', NULL, NULL, '1', '2019-08-07 13:28:07', '2019-08-07 13:28:19'),
(14, 'mukul', 'singh', 'mukul123', 'mukulsingh@gmail.com', '2019-08-09 13:45:45', '$2y$10$VamaSA37YUdcS1f2qbAJfeFIUPjBYkilmsGlUeWohyLkzPsfJ20la', NULL, NULL, '1', '2019-08-09 13:37:35', '2019-08-09 13:45:45'),
(15, 'Test', 'Mani', 'mani', 'mani@yopmail.com', '2019-08-19 16:11:57', '$2y$10$tF8gGG7Qv6v05HvhC/9HyudRS3MWojlwywpsDs1GnU0Yu7C6TuvtK', NULL, NULL, '1', '2019-08-19 16:11:23', '2019-08-19 16:11:57'),
(16, 'angelika', 'monori', 'angee', 'monori.angelika@yahoo.com', '2019-10-03 07:35:51', '$2y$10$vzsjKbq.7kXXu95tmDo.H.Gzas84lgyMqrP2vc7.v0lUzP7/S1Pnq', NULL, NULL, '1', '2019-10-03 07:34:13', '2019-10-21 05:42:31'),
(17, 'test angelina', 'test t', 'angiet', 'angelina.tom@gmail.com', '2019-10-04 15:50:23', '$2y$10$FDd0RkSLcSEBzYRY/bR41ukakVOHYwKZ4o14Jhhu4EdIxITJvOWr2', 'EiSbiCwptOCgDebrN8jIMsyuiSNzdKcxQWBaGZkjLevZzT25hkIOWdE88qvq', NULL, '1', '2019-10-04 15:49:36', '2019-10-13 16:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vistorName` longtext COLLATE utf8mb4_unicode_ci,
  `visitorEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `vistorName`, `visitorEmail`, `created_at`, `updated_at`) VALUES
(1, 'Manish', 'mani@yopmail.com', '2019-10-22 08:10:07', '2019-10-22 08:10:07'),
(2, 'Manish', 'mani@yopmail.com', '2019-10-22 09:44:49', '2019-10-22 09:44:49'),
(3, 'Manish', 'mani@yopmail.com', '2019-10-28 10:47:58', '2019-10-28 10:47:58'),
(4, 'Manish', 'mani@yopmail.com', '2019-11-04 09:11:15', '2019-11-04 09:11:15'),
(5, 'Manish', 'mani1@yopmail.com', '2019-11-11 11:56:05', '2019-11-11 11:56:05'),
(6, 'Manish', 'mani@yopmail.com', '2020-02-20 06:32:01', '2020-02-20 06:32:01'),
(7, 'Manish', 'mani1@yopmail.com', '2020-02-20 06:37:55', '2020-02-20 06:37:55'),
(8, 'Manish', 'mani@yopmail.com', '2020-02-20 06:55:43', '2020-02-20 06:55:43'),
(9, 'Manish', 'mani1@yopmail.com', '2020-02-20 06:56:14', '2020-02-20 06:56:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pricelisttables`
--
ALTER TABLE `pricelisttables`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `snapsAddsTable`
--
ALTER TABLE `snapsAddsTable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gmaps_geocache`
--
ALTER TABLE `gmaps_geocache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pricelisttables`
--
ALTER TABLE `pricelisttables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `snapsAddsTable`
--
ALTER TABLE `snapsAddsTable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD CONSTRAINT `shop_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
