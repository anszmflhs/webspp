-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2023 at 04:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `answbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `hire_date` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `contact`, `hire_date`, `gender`, `address`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Purno', '092309293', '2023-09-09', 'L', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 1, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'Tarno', '0829292', '2023-09-09', 'L', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 2, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'Wati', '0627221', '2023-09-09', 'P', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 3, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `bayar_sekarangs`
--

CREATE TABLE `bayar_sekarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` enum('RPL','TKJ','DMM') NOT NULL DEFAULT 'RPL',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'RPL', 1, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'TKJ', 2, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'DMM', 3, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_08_014930_create_admins_table', 1),
(7, '2023_08_08_014931_create_petugas_table', 1),
(8, '2023_08_08_014932_create_kelas_table', 1),
(9, '2023_08_08_014936_create_siswas_table', 1),
(10, '2023_08_08_015149_create_spps_table', 1),
(11, '2023_08_08_064025_create_permission_tables', 1),
(12, '2023_08_08_075957_create_permintaans_table', 1),
(13, '2023_08_24_072820_create_bayar_sekarangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permintaans`
--

CREATE TABLE `permintaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'read-role', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'update-role', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(4, 'delete-role', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(5, 'create-admin', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(6, 'read-admin', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(7, 'update-admin', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(8, 'delete-admin', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(9, 'create-petugas', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(10, 'read-petugas', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(11, 'update-petugas', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(12, 'delete-petugas', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(13, 'create-siswa', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(14, 'read-siswa', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(15, 'update-siswa', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(16, 'delete-siswa', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(17, 'create-pembayaran', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(18, 'read-pembayaran', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(19, 'update-pembayaran', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(20, 'delete-pembayaran', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48');

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
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `hire_date` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `name`, `contact`, `hire_date`, `gender`, `address`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad', '092309293', '2023-09-09', 'L', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 1, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'Udin', '0829292', '2023-09-09', 'L', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 2, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'Jainab', '0627221', '2023-09-09', 'P', 'Indonesia', 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg', 3, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'petugas', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'siswa', 'web', '2023-09-09 07:31:48', '2023-09-09 07:31:48');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `name`, `nis`, `alamat`, `no_telp`, `user_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '9123456789', 'Puji', '9123456778', 'Indonesia', '013433', 1, 1, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, '9223456788', 'Punjul', '9223456777', 'Indonesia', '08425', 2, 2, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, '9323456777', 'Panji', '9323456776', 'Indonesia', '07674', 3, 3, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nominal` int(11) NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `nominal`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 250000, 1, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 200000, 2, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 150000, 3, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

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
(1, 'Purno', 'admin@gmail.com', NULL, '$2y$10$RNvQUQgWeKxc6nbNsydfz.GkYAA8yKRo3wpL0NJMZY13iMETRa1HG', NULL, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(2, 'Ahmad', 'petugas@gmail.com', NULL, '$2y$10$XlQjyiiFyjqXbXPKzI9nBeqandXk4IqTR9sgdIw3cxwrUuLDs3oT2', NULL, '2023-09-09 07:31:48', '2023-09-09 07:31:48'),
(3, 'Panji', 'siswa@gmail.com', NULL, '$2y$10$CfzA6vH75vBaxBbfBArDBuDLEJDvRr/493tIaoRFx/1w1ttHHLn6a', NULL, '2023-09-09 07:31:48', '2023-09-09 07:31:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `bayar_sekarangs`
--
ALTER TABLE `bayar_sekarangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bayar_sekarangs_user_id_foreign` (`user_id`),
  ADD KEY `bayar_sekarangs_kelas_id_foreign` (`kelas_id`),
  ADD KEY `bayar_sekarangs_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaans_user_id_foreign` (`user_id`),
  ADD KEY `permintaans_kelas_id_foreign` (`kelas_id`),
  ADD KEY `permintaans_spp_id_foreign` (`spp_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spps_kelas_id_foreign` (`kelas_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bayar_sekarangs`
--
ALTER TABLE `bayar_sekarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permintaans`
--
ALTER TABLE `permintaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bayar_sekarangs`
--
ALTER TABLE `bayar_sekarangs`
  ADD CONSTRAINT `bayar_sekarangs_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bayar_sekarangs_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bayar_sekarangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `permintaans`
--
ALTER TABLE `permintaans`
  ADD CONSTRAINT `permintaans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaans_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spps`
--
ALTER TABLE `spps`
  ADD CONSTRAINT `spps_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
