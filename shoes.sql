-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 05:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Giày nike', 'nike', '2023-03-26 18:12:10', '2023-03-26 18:12:10'),
(2, 'adidas', 'ads', '2023-03-26 18:12:20', '2023-03-26 18:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Cstore', '0385755471', 'cuonghaha43@gmail.com', 'ha noi', '2023-03-26 18:11:24', '2023-03-28 18:24:54'),
(2, 'nam thanh', '0168474437', 'ccaudell0@eepurl.com', 'ha noi', '2023-03-26 18:11:40', '2023-03-26 18:11:40'),
(3, 'bắc ninh fatory', '0168474432', 'vijayrana.me@gmail.com', 'ha noi', '2023-03-27 03:42:50', '2023-03-27 03:42:50');

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
-- Table structure for table `in_products`
--

CREATE TABLE `in_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `in_products`
--

INSERT INTO `in_products` (`id`, `product_id`, `company_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, '3', '2', '20', 24000000, '2023-03-26 18:17:17', '2023-03-28 18:12:53'),
(2, '3', '1', '20', 24000000, '2023-03-27 03:40:04', '2023-03-27 03:40:04'),
(3, '7', '2', '10', 12000000, '2023-03-27 03:40:14', '2023-03-27 03:40:14'),
(4, '10', '1', '25', 35000000, '2023-03-27 03:40:23', '2023-03-27 03:40:23'),
(5, '15', '1', '10', 25000000, '2023-03-27 03:40:30', '2023-03-27 03:40:30'),
(6, '5', '1', '15', 20250000, '2023-03-27 03:40:37', '2023-03-27 03:40:37'),
(7, '13', '1', '30', 24000000, '2023-03-27 03:40:44', '2023-03-27 03:40:44'),
(8, '14', '1', '35', 38500000, '2023-03-27 03:40:50', '2023-03-27 03:40:50'),
(9, '6', '1', '35', 33250000, '2023-03-27 03:40:56', '2023-03-27 03:40:56'),
(10, '15', '1', '20', 50000000, '2023-03-27 03:41:02', '2023-03-27 03:41:02'),
(11, '1', '2', '20', 2000000000, '2023-03-28 17:56:57', '2023-03-28 17:56:57');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_14_095021_create_orders_table', 1),
(6, '2022_10_31_073115_create_products_table', 1),
(7, '2022_11_03_063054_create_categories_table', 1),
(8, '2022_11_09_182156_create_in_products_table', 1),
(9, '2022_11_09_182222_create_receipts_table', 1),
(10, '2022_11_09_182325_create_companies_table', 1),
(11, '2023_03_27_023952_add_date_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `note`, `product_id`, `quantity`, `total`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Thái Văn Cường', 'cuonghaha43@gmail.com', '18, z115, thái nguyên', '0385755473', NULL, '1', 2, 2050000, '1', '2023-03-29', '2023-03-26 18:16:54', '2023-03-28 19:52:23'),
(2, 'hà văn ninh', 'gcranstoun3@baidu.com', 'số 19, quang trung , hồ chí minh', '014587334', NULL, '5', 1, 1400000, '1', '2023-03-27', '2023-03-27 03:45:34', '2023-03-27 03:46:38'),
(3, 'Hải', 'cuonghaha43@gmail.com', '16, ngõ 85, hạ đình, hà nội', '0385755473', NULL, '10', 2, 2850000, '1', '2023-03-29', '2023-03-27 03:46:26', '2023-03-28 19:46:58'),
(4, 'Quang', 'gcranstoun3@baidu.com', 'số 1, đường nam trùng, biên hoà', '0168474437', NULL, '13', 1, 850000, '0', '2023-03-27', '2023-03-27 03:47:18', '2023-03-27 03:47:47'),
(5, 'Nam', 'gcranstoun3@baidu.com', 'số 10, đường bắc , biên hoà', '0168474437', NULL, '13', 1, 850000, '2', NULL, '2023-03-27 03:47:38', '2023-03-27 03:47:38'),
(6, 'Thái Văn Cường', 'cuonghaha43@gmail.com', '18, z115, thái nguyên', '0385755473', NULL, '1', 2, 2450000, '1', '2023-03-29', '2023-03-28 17:52:39', '2023-03-28 18:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Nike ultra boots', 'Giới thiệu', 1000000, '1', 'nike ultra.jpg', '2023-03-26 18:14:16', '2023-03-28 19:27:11'),
(3, 'nike  air', 'giay nike', 1200000, '1', 'air-max-97-womens-shoes-Fr6rM4.jpg', '2023-03-26 18:16:04', '2023-03-26 18:16:04'),
(4, 'adidas ultra boots', 'ádsadas', 1000000, '1', '33954210938910.jpg', '2023-03-26 22:36:42', '2023-03-28 18:48:10'),
(5, 'adidas super star', 'ád', 1350000, '1', '7ed0855435194229a525aad6009a0497_9366.webp', '2023-03-26 22:38:15', '2023-03-28 18:48:13'),
(6, 'adidas forum low', 'ádds', 950000, '2', 'b743345901d446e6b956ae6f0125d81f_9366.webp', '2023-03-26 22:39:02', '2023-03-26 22:39:02'),
(7, 'nike just do it', 'áda', 1200000, '1', 'e777c881-5b62-4250-92a6-362967f54cca.webp', '2023-03-26 22:39:55', '2023-03-26 22:39:55'),
(8, 'nike black running', '21323', 1200000, '1', 'b05afb11-db22-461d-b94e-49bdc316b445.webp', '2023-03-26 22:40:42', '2023-03-26 22:40:42'),
(9, 'nike dunk low', 'dsd', 920000, '1', '08d6d2c8-577c-41ab-9f23-613cdd9e3f77.webp', '2023-03-26 22:41:20', '2023-03-26 22:41:20'),
(10, 'nike air max fc', 'qew', 1400000, '1', '26dbce12-4932-44f4-8502-1b79232fea73.webp', '2023-03-26 22:41:54', '2023-03-26 22:41:54'),
(11, 'nike air max 270', 'dsdasd', 1000000, '1', 'air-max-270-mens-shoes-KkLcGR.jpg', '2023-03-26 22:42:28', '2023-03-26 22:42:28'),
(13, 'adidas nmd', 'asa', 800000, '2', 'c42c5ed95098447983cfaf3400bd1447_9366.webp', '2023-03-26 22:47:22', '2023-03-26 22:47:22'),
(14, 'adidas stand smith', 'ádsa', 1100000, '2', '68ae7ea7849b43eca70aac1e00f5146d_9366.webp', '2023-03-26 22:47:54', '2023-03-26 22:47:54'),
(15, 'adidas grand court', 'ádsa', 2500000, '2', '1f893c7c14424f6f8f72a98101359ecb_9366.webp', '2023-03-26 22:48:29', '2023-03-26 22:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'admin@gmail.com', NULL, '$2y$10$qumyHvpkBTGrAQtUcco9uev.6V8j9EDiT/UnRWCOsVenRx6rkCGCa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `in_products`
--
ALTER TABLE `in_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_products`
--
ALTER TABLE `in_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
