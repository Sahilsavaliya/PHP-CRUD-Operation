-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 10:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passportapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cname`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'mobile', 'Yes', NULL, '2022-06-24 00:13:04', '2022-06-24 03:58:49'),
(2, 'Car', 'Yes', NULL, '2022-06-24 00:13:13', '2022-06-24 00:13:13'),
(4, 'Watches', 'No', NULL, '2022-06-24 00:13:25', '2022-06-24 02:47:13');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0d968a0a0bc8cbaa7f165348e89e8748b9cc89afe9972ad9eb091ade5ca4cad032d0d466d2ceec32', 7, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 05:53:30', '2022-07-12 05:53:30', '2023-07-12 11:23:30'),
('1a5ada3d5c8587f11e4bcb4be862e24abafac7f5ed714a7baa71c291bea9a369d8f8e2f88461610d', 7, 1, 'Laravel CreateToken', '[]', 0, '2022-07-11 23:40:39', '2022-07-11 23:40:39', '2023-07-12 05:10:39'),
('1c00ed2d7a68a22298fb511e4c86599beca115540d016f518061fbadfe722cc68b2bf6c48cf0d114', 3, 1, 'Laravel CreateToken', '[]', 0, '2022-07-13 03:06:24', '2022-07-13 03:06:24', '2023-07-13 08:36:24'),
('1e57b3178fa3bce1b0e7c25fcdd9d79207ca20a24315e38662e950867438145579e73ef1e8bbfa0c', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-11 23:39:39', '2022-07-11 23:39:39', '2023-07-12 05:09:39'),
('761f0684e0ba80f1f9093e6d756520148d0ffc291e03c6c70d0fa0e45432c34b1f2a75242bab138b', 7, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 01:30:00', '2022-07-12 01:30:00', '2023-07-12 07:00:00'),
('7c2028443ebad937697ef23dd51b188a26a9c6734c31b197b34c64481cd8dd1eda9fd574c1ca04e1', 8, 1, 'Laravel CreateToken', '[]', 0, '2022-07-13 02:51:39', '2022-07-13 02:51:39', '2023-07-13 08:21:39'),
('8c418aacfc494b416d5b06e87aee6e39a783586d3a54da1ec4d41c76d3c4d7cb8088bd90e598c699', 8, 1, 'Laravel CreateToken', '[]', 0, '2022-07-13 02:51:22', '2022-07-13 02:51:22', '2023-07-13 08:21:22'),
('bc1daf25d78257ba6e76696a259291428a1ec717ede87a553022ed45cf69818ec9d2e5e9e5222628', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-11 23:40:16', '2022-07-11 23:40:16', '2023-07-12 05:10:16'),
('defa2cfeb782ae4f0d31b9cf81fed1ec7041a28c1be66c612cee11add9ca85bc6e75344a36dfd60e', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 00:15:45', '2022-07-12 00:15:45', '2023-07-12 05:45:45'),
('eabaf6d2790b378d476bd087b8a9153659d90b89ac8ad31b20604b0aa73878f1fa721d76f243831f', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 00:29:46', '2022-07-12 00:29:46', '2023-07-12 05:59:46'),
('edcae41da546d515c1f25d0d40da09c7e8d9874824399964a77effec7d4bbf355a93a944408a3a9f', 7, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 04:58:24', '2022-07-12 04:58:24', '2023-07-12 10:28:24'),
('f79ac73e4b6d8c1cc2ae1b118997f7c9c5bb2963cd4ff8b0df434345a58ce92980b00d1a5fec02ed', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-11 23:39:55', '2022-07-11 23:39:55', '2023-07-12 05:09:55'),
('fc813cb6f7516a310f38f40da6216659d6d97b8018010690d2511cc801c67172f4e155058c51b948', 2, 1, 'Laravel CreateToken', '[]', 0, '2022-07-12 00:47:41', '2022-07-12 00:47:41', '2023-07-12 06:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, NULL, 'Laravel Personal Access Client', '4FdL9MH6UbHj2L4knnV4wTW2YmXKdt3kKbkCESpw', NULL, 'http://localhost', 1, 0, 0, '2022-07-11 01:20:23', '2022-07-11 01:20:23'),
(2, NULL, 'Laravel Password Grant Client', 'zT6RtxDqyHJKG9LFcw8HRihFYUBnSiOhI4neAZX2', 'users', 'http://localhost', 0, 1, 0, '2022-07-11 01:20:24', '2022-07-11 01:20:24');

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
(1, 1, '2022-07-11 01:20:23', '2022-07-11 01:20:23');

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sahil1@gmail.com', '$2y$10$s3JerkSA30qCbiujJzYNZOgAfZn3lFJ.1mSBfMedzWkShsNl74lEi', '2022-07-12 06:44:21');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\Models\\User', 1, 'Laravel CreateToken', '780f83f1e97166a08bb1772b383b5ac0b6f8d0c8601101028d6bf1b02164a53b', '[\"*\"]', NULL, '2022-07-11 06:37:01', '2022-07-11 06:37:01'),
(6, 'App\\Models\\User', 2, 'Laravel CreateToken', 'f0355d9da9797faafc6984cbcaf261bdc322d4defbc9d2e28e8de0e078750f1d', '[\"*\"]', NULL, '2022-07-11 06:37:51', '2022-07-11 06:37:51'),
(7, 'App\\Models\\User', 3, 'Laravel CreateToken', '81a0bf036101a7126441ac3733da0cf80bd285f23e5ac5fda1c7492db401af00', '[\"*\"]', NULL, '2022-07-11 06:46:43', '2022-07-11 06:46:43'),
(8, 'App\\Models\\User', 4, 'Laravel CreateToken', 'bf9ec26b807569b26fdbce976847bd9b3642cdf7cb2064a0a927f3a86252323a', '[\"*\"]', NULL, '2022-07-11 06:49:15', '2022-07-11 06:49:15'),
(9, 'App\\Models\\User', 5, 'Laravel CreateToken', '83cf6874b66c11cbcda42debd2e45f500dad90fa66f2b3e6533777c818981bad', '[\"*\"]', NULL, '2022-07-11 06:50:28', '2022-07-11 06:50:28'),
(10, 'App\\Models\\User', 1, 'Laravel CreateToken', 'b49a814b8ea143ab7733028775202bbe05b264e7bc4b3143ceaa33b7de2c5245', '[\"*\"]', NULL, '2022-07-11 23:10:40', '2022-07-11 23:10:40'),
(11, 'App\\Models\\User', 1, 'Laravel CreateToken', 'a1926ace68651c786dc57cf9a0fb6f4888dc5a2be5c7d531712b1a9857cf42b6', '[\"*\"]', NULL, '2022-07-11 23:11:07', '2022-07-11 23:11:07'),
(12, 'App\\Models\\User', 6, 'Laravel CreateToken', '4f8e6162849f5145666062d05ce65431b8578fa5ae1065931b42dd868ecec98a', '[\"*\"]', NULL, '2022-07-11 23:11:57', '2022-07-11 23:11:57'),
(13, 'App\\Models\\User', 1, 'Laravel CreateToken', '8bcd9d310617d03c7f71aee999bf2c023dd6b63883852c673df2c3b915f18bae', '[\"*\"]', NULL, '2022-07-11 23:16:54', '2022-07-11 23:16:54'),
(14, 'App\\Models\\User', 2, 'Laravel CreateToken', '49364e592c4c48b7f9a6d96179dc239fdd881a1a99aa0043198f1bb33cd27613', '[\"*\"]', NULL, '2022-07-11 23:34:30', '2022-07-11 23:34:30'),
(15, 'App\\Models\\User', 2, 'Laravel CreateToken', '54dd01edf010d8539f88035f68dea9ce4db25a7b389c8bc07d2f11af9c544ac0', '[\"*\"]', NULL, '2022-07-11 23:35:08', '2022-07-11 23:35:08'),
(16, 'App\\Models\\User', 2, 'Laravel CreateToken', '74b9cd826c880c0fe8c596ba6ec91af2069486f90eacff86ab8c6e026d432350', '[\"*\"]', NULL, '2022-07-11 23:36:05', '2022-07-11 23:36:05'),
(17, 'App\\Models\\User', 2, 'Laravel CreateToken', '5ce50bab32ba1c94c3fdef67d18b25c5a8e7653d3b0d729a5e79ea38b5ebe9b3', '[\"*\"]', NULL, '2022-07-11 23:36:37', '2022-07-11 23:36:37'),
(18, 'App\\Models\\User', 2, 'Laravel CreateToken', '9acd543a13de4686e6c04295dc770e22f8dd388e95aa792140f1a5062090c382', '[\"*\"]', NULL, '2022-07-11 23:36:49', '2022-07-11 23:36:49'),
(19, 'App\\Models\\User', 2, 'Laravel CreateToken', 'e56b399afa948b69b82e6e9e88aae6446e01fa7179e234bd8f54f0c0867093cf', '[\"*\"]', NULL, '2022-07-11 23:36:58', '2022-07-11 23:36:58'),
(20, 'App\\Models\\User', 2, 'Laravel CreateToken', '2f5b9804a886b7c88d9f83dc0bf3859870f6f40eb29f3ed77878890eefdb263a', '[\"*\"]', NULL, '2022-07-11 23:38:07', '2022-07-11 23:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `category_id`, `image`, `createdby_user`, `active_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'oneplus', 'mobile', '1656051104.jpg', 'testuser@kcsitglobal.com', 'Yes', NULL, '2022-06-24 00:41:44', '2022-06-29 01:16:05'),
(6, 'Hundai Varna', 'Car', '1656054961.jpg', 'tej1212@gmail.com', 'Yes', NULL, '2022-06-24 01:46:01', '2022-07-04 04:28:25'),
(7, 'i phone x', 'mobile', '1656325791.jpg', 'testuser@kcsitglobal.com', 'Yes', NULL, '2022-06-27 04:59:51', '2022-06-27 04:59:51'),
(8, 'i phone 13', 'mobile', '1656325820.jpg', 'testuser@kcsitglobal.com', 'Yes', NULL, '2022-06-27 05:00:20', '2022-06-29 05:48:13'),
(9, 'I watch 7', 'Watches', '1656325839.jpg', 'testuser@kcsitglobal.com', 'Yes', '2022-06-29 23:26:41', '2022-06-27 05:00:39', '2022-06-29 23:26:41'),
(10, 'Jaypal', 'mobile', '1656485216.jpg', 'testuser@kcsitglobal.com', 'Yes', '2022-06-29 01:18:25', '2022-06-29 01:16:56', '2022-06-29 01:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sahil', 'sahil1@gmail.com', NULL, '$2y$10$fd5vGKBEfZLo2wEtqcp6iunZuuh8SCyx1gFfXWM6aefSPS6KZnY4q', NULL, '2022-07-11 06:37:00', '2022-07-11 06:37:00'),
(3, 'sahil', 'sahil112@gmail.com', NULL, '$2y$10$gBrFpgKq28D2cQCVMVpGPO1kRKChpYhA0N5nYwJJJdSodLE1K8TQy', NULL, '2022-07-11 06:46:43', '2022-07-13 03:05:50'),
(4, 'sahil', 'sahil12@gmail.com', NULL, '$2y$10$uhJE6TeciWmi6rdTz1w9/.IFdkoL4raG1RcV/PrFeBqG1I2Zxbscu', NULL, '2022-07-11 06:49:14', '2022-07-11 06:49:14'),
(5, 'sahil', 'sahil13@gmail.com', NULL, '$2y$10$XLesDf4.zt0k85BFyI2HSO4TAoVldixwHERe2MbtFIDWq7tGS5SMi', NULL, '2022-07-11 06:50:28', '2022-07-11 06:50:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
