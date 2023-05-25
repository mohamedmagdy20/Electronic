-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 01:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '1684885179.jpg', 'Laptops', '2023-05-23 20:39:39', '2023-05-23 20:39:39'),
(3, 'Mobile', '1684951871gV5Hi5TGkpmXYhHjhRTkmnlnct5Acv.jpg.jpg', 'Mobile Category', '2023-05-24 15:11:11', '2023-05-24 15:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `img`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(3, 'magdy', 'super_admin@app.com', NULL, '$2y$10$s/hRt23WuBiHRNn41HM9BuXz36jfzVI4AxWx0YMJqDl4x6Khwmf1m', NULL, '+201066018340', 'test', '2023-05-24 02:24:52', '2023-05-24 02:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_20_164324_create_categories_table', 1),
(6, '2023_05_20_164343_create_products_table', 1),
(7, '2023_05_20_164406_create_product_images_table', 1),
(8, '2023_05_20_164421_create_carts_table', 1),
(9, '2023_05_20_164439_create_orders_table', 1),
(10, '2023_05_20_164457_create_order_details_table', 1),
(11, '2023_05_20_173324_create_clients_table', 1),
(12, '2023_05_20_193547_add_image_users', 2),
(13, '2023_05_20_193612_add_image_catgory', 2),
(14, '2023_05_24_234059_add_count_to_products', 3),
(15, '2023_05_25_001223_add_columns_to_cart_table', 4),
(16, '2023_05_25_012428_add_columns_to_orders_table', 5),
(17, '2023_05_25_012905_add_columns_to_orders_table', 5),
(18, '2023_05_25_022400_add_columns_to_orders_table', 6),
(19, '2023_05_25_023902_add_columns_to_orders_table', 7),
(20, '2023_05_25_063017_add_code_col', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('paypal','manual') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `status` enum('pending','recived','cencel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `created_at`, `updated_at`, `address`, `phone`, `type`, `status`, `client_id`, `total`) VALUES
(10, NULL, '2023-05-25 02:50:35', '2023-05-25 03:48:05', 'test', '+201066018340', 'paypal', 'recived', 3, '9000'),
(11, NULL, '2023-05-25 03:03:47', '2023-05-25 03:48:09', 'test', '+201066018340', 'paypal', 'cencel', 3, '6500'),
(12, NULL, '2023-05-25 03:04:33', '2023-05-25 03:04:33', 'test', '+201066018340', 'paypal', 'pending', 3, '0'),
(13, NULL, '2023-05-25 03:05:10', '2023-05-25 03:05:10', 'test', '+201066018340', 'paypal', 'pending', 3, '15000'),
(14, NULL, '2023-05-25 03:06:37', '2023-05-25 03:06:37', 'test', '+201066018340', 'paypal', 'pending', 3, '300000'),
(15, NULL, '2023-05-25 03:07:50', '2023-05-25 03:07:50', 'test', '+201066018340', 'paypal', 'pending', 3, '15000'),
(16, NULL, '2023-05-25 03:09:51', '2023-05-25 03:09:51', 'test', '+201066018340', 'paypal', 'pending', 3, '15000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `created_at`, `updated_at`, `product_id`, `count`, `order_id`) VALUES
(10, '2023-05-25 02:50:36', '2023-05-25 02:50:36', 3, '1', 10),
(11, '2023-05-25 03:03:47', '2023-05-25 03:03:47', 6, '1', 11),
(12, '2023-05-25 03:05:11', '2023-05-25 03:05:11', 7, '1', 13),
(13, '2023-05-25 03:06:37', '2023-05-25 03:06:37', 5, '1', 14),
(14, '2023-05-25 03:07:50', '2023-05-25 03:07:50', 7, '1', 15),
(15, '2023-05-25 03:09:52', '2023-05-25 03:09:52', 7, '1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priceOut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `priceIn`, `priceOut`, `description`, `img`, `category_id`, `created_at`, `updated_at`, `count`) VALUES
(3, 'Dell 15156', '8000', '9000', 'Test', NULL, 1, '2023-05-24 14:59:30', '2023-05-24 14:59:30', 0),
(4, 'Oppo A7', '6000', '7000', 'Oppo A7 Mobile With 8G Ram and 10cm height', NULL, 3, '2023-05-24 15:13:17', '2023-05-24 15:13:17', 0),
(5, 'Lenovo F72', '10000', '300000', 'adasdas', NULL, 1, '2023-05-24 19:13:21', '2023-05-24 19:13:21', 0),
(6, 'Samsong S35', '5000', '6500', 'Test', NULL, 3, '2023-05-24 19:17:23', '2023-05-24 19:17:23', 0),
(7, 'Iphone 13', '9000', '15000', 'Test', NULL, 3, '2023-05-24 19:21:29', '2023-05-24 19:21:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `img`, `product_id`, `created_at`, `updated_at`) VALUES
(5, '1684951170bCGHfzmsDZCzTFcBwhRxf0BJjVMQgH.jpg.jpg', 3, '2023-05-24 14:59:31', '2023-05-24 14:59:31'),
(6, '1684951171eoXv5W7pT85zEJhQ4MqjErW22F8Hh8.jpg.jpg', 3, '2023-05-24 14:59:31', '2023-05-24 14:59:31'),
(7, '1684951171EXaBB1JhWZoGqW69ko9uzFsZIfBEgL.jpg.jpg', 3, '2023-05-24 14:59:31', '2023-05-24 14:59:31'),
(8, '1684951171iFXkUkHl3DFuPhwhY5vnQltzExBaDB.jpg.jpg', 3, '2023-05-24 14:59:31', '2023-05-24 14:59:31'),
(9, '1684951997gV5Hi5TGkpmXYhHjhRTkmnlnct5Acv.jpg.jpg', 4, '2023-05-24 15:13:17', '2023-05-24 15:13:17'),
(10, '1684951997LgDH4ir1oAxeU5pwXdgYz0QrAWsot1.jpg.jpg', 4, '2023-05-24 15:13:17', '2023-05-24 15:13:17'),
(11, '1684951998PMM1cFH8aVfm9gxKyDkVQNUk1EzVWB.jpg.jpg', 4, '2023-05-24 15:13:18', '2023-05-24 15:13:18'),
(12, '16849664018zNNxLJMNUdkl5px5pz0qaW8CKDLpr.jpg.jpg', 5, '2023-05-24 19:13:21', '2023-05-24 19:13:21'),
(13, '1684966401DRgiuqH9ZJfV7li5ixWsrkKFdHk0XN.jpg.jpg', 5, '2023-05-24 19:13:21', '2023-05-24 19:13:21'),
(14, '1684966402giyzj9P0ezipKLFGPAWXB8Exhl4SZZ.jpg.jpg', 5, '2023-05-24 19:13:22', '2023-05-24 19:13:22'),
(15, '1684966402UEHdroUgiD4UmicY5qnTuEAx6Sf1op.jpg.jpg', 5, '2023-05-24 19:13:22', '2023-05-24 19:13:22'),
(16, '1684966643js75CuUHaYTLEJlwl4C6aSQI8IBSxS.jpg.jpg', 6, '2023-05-24 19:17:23', '2023-05-24 19:17:23'),
(17, '1684966644LgDH4ir1oAxeU5pwXdgYz0QrAWsot1.jpg.jpg', 6, '2023-05-24 19:17:24', '2023-05-24 19:17:24'),
(18, '1684966644OKRra3ZkcfyHsSX5K50XHnvHwVuiNz.jpg.jpg', 6, '2023-05-24 19:17:24', '2023-05-24 19:17:24'),
(19, '1684966889OKRra3ZkcfyHsSX5K50XHnvHwVuiNz.jpg.jpg', 7, '2023-05-24 19:21:29', '2023-05-24 19:21:29'),
(20, '1684966890spnYriJDGIe6n4cbsh8n02WOe9UnDi.jpg.jpg', 7, '2023-05-24 19:21:30', '2023-05-24 19:21:30'),
(21, '1684966890UdB6Dk4QhmIhByKBcytVyzcIpdmX2r.jpg.jpg', 7, '2023-05-24 19:21:30', '2023-05-24 19:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `img`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$dLu87FtYYZcOqTjK/hRsG.6UzGS1nvk4JTr8W49qs3hwWgbppb6QS', NULL, '2023-05-20 17:31:08', '2023-05-20 17:31:08'),
(4, 'Flutter-GIS', 'admin@admi1n.com', '1684627739.png', NULL, '$2y$10$VE.U8qgvCIZKfY5qUXBW2u0o0MYsxoQ1qxudpuSPur9k4BUfAfCT.', NULL, '2023-05-20 21:08:59', '2023-05-20 21:08:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_client_id_foreign` (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
