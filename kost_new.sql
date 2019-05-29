-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 03:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar_mandi`
--

CREATE TABLE `fasilitas_kamar_mandi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_khusus`
--

CREATE TABLE `fasilitas_khusus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_lingkungan`
--

CREATE TABLE `fasilitas_lingkungan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kosts`
--

CREATE TABLE `kosts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namaPemilik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telpPemilik` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamatPemilik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namaKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamatKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posKost` int(11) NOT NULL,
  `telpKost` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `luasKamar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlahKamar` int(11) NOT NULL,
  `penghuni` enum('Putra','Putri','Campur') COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `sewaMin` int(11) NOT NULL,
  `sewaHari` int(11) NOT NULL,
  `sewaMinggu` int(11) NOT NULL,
  `sewaBulan` int(11) NOT NULL,
  `sewaTahun` int(11) NOT NULL,
  `fKhusus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fUmum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fLingkungan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fKamarMandi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8_unicode_ci NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `kode_konfirmasi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kost_fk`
--

CREATE TABLE `kost_fk` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `id_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kost_fkm`
--

CREATE TABLE `kost_fkm` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `id_fkm` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kost_fl`
--

CREATE TABLE `kost_fl` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `id_fl` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kost_fu`
--

CREATE TABLE `kost_fu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `id_fu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kost_parkir`
--

CREATE TABLE `kost_parkir` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kost` int(10) UNSIGNED NOT NULL,
  `id_parkir` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_08_20_135730_user', 1),
('2016_08_21_123332_kosts', 1),
('2016_08_22_135629_admins', 1),
('2016_08_22_151132_fasilitas_kamar_mandi', 1),
('2016_08_22_153316_fasilitas_khusus', 1),
('2016_08_23_004942_fasilitas_lingkungan', 1),
('2016_08_23_010157_fasilitas_umum', 1),
('2016_08_24_092730_parkirs', 1),
('2016_08_24_141538_kost_fkm', 1),
('2016_08_24_143238_kost_fk', 1),
('2016_08_24_143333_kost_fl', 1),
('2016_08_24_143407_kost_fu', 1),
('2016_08_24_144825_kost_parkir', 1),
('2016_08_27_110704_fotos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkirs`
--

CREATE TABLE `parkirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `kode_konfirmasi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `foto`, `username`, `password`, `konfirmasi`, `kode_konfirmasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(32, 'Niki Rahmadi Wiharto', 'nikirahmadiwiharto@gmail.com', '', 'nikirahmadi', '$2y$10$Ch8HyZcYQ5qUTeG1Muhl0.t.rdX4L0pcg2O5Z8DjtoSqorQxhlnCW', 1, NULL, 'uSZYqznFgFugEajwx6oDpIoG2pnP9rEUanAj2KN1Prp6Q37kBCd6s0zQvf8F', '2017-01-13 18:49:31', '2017-01-13 19:12:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `fasilitas_kamar_mandi`
--
ALTER TABLE `fasilitas_kamar_mandi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_khusus`
--
ALTER TABLE `fasilitas_khusus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_lingkungan`
--
ALTER TABLE `fasilitas_lingkungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fotos_id_kost_foreign` (`id_kost`);

--
-- Indexes for table `kosts`
--
ALTER TABLE `kosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kosts_seotitle_unique` (`seoTitle`),
  ADD KEY `kosts_user_id_foreign` (`user_id`),
  ADD KEY `kosts_seotitle_index` (`seoTitle`);

--
-- Indexes for table `kost_fk`
--
ALTER TABLE `kost_fk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kost_fk_id_kost_foreign` (`id_kost`),
  ADD KEY `kost_fk_id_fk_foreign` (`id_fk`);

--
-- Indexes for table `kost_fkm`
--
ALTER TABLE `kost_fkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kost_fkm_id_kost_foreign` (`id_kost`),
  ADD KEY `kost_fkm_id_fkm_foreign` (`id_fkm`);

--
-- Indexes for table `kost_fl`
--
ALTER TABLE `kost_fl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kost_fl_id_kost_foreign` (`id_kost`),
  ADD KEY `kost_fl_id_fl_foreign` (`id_fl`);

--
-- Indexes for table `kost_fu`
--
ALTER TABLE `kost_fu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kost_fu_id_kost_foreign` (`id_kost`),
  ADD KEY `kost_fu_id_fu_foreign` (`id_fu`);

--
-- Indexes for table `kost_parkir`
--
ALTER TABLE `kost_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kost_parkir_id_kost_foreign` (`id_kost`),
  ADD KEY `kost_parkir_id_parkir_foreign` (`id_parkir`);

--
-- Indexes for table `parkirs`
--
ALTER TABLE `parkirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasilitas_kamar_mandi`
--
ALTER TABLE `fasilitas_kamar_mandi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasilitas_khusus`
--
ALTER TABLE `fasilitas_khusus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasilitas_lingkungan`
--
ALTER TABLE `fasilitas_lingkungan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kosts`
--
ALTER TABLE `kosts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kost_fk`
--
ALTER TABLE `kost_fk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kost_fkm`
--
ALTER TABLE `kost_fkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kost_fl`
--
ALTER TABLE `kost_fl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kost_fu`
--
ALTER TABLE `kost_fu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kost_parkir`
--
ALTER TABLE `kost_parkir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parkirs`
--
ALTER TABLE `parkirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kosts`
--
ALTER TABLE `kosts`
  ADD CONSTRAINT `kosts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kost_fk`
--
ALTER TABLE `kost_fk`
  ADD CONSTRAINT `kost_fk_id_fk_foreign` FOREIGN KEY (`id_fk`) REFERENCES `fasilitas_khusus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kost_fk_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kost_fkm`
--
ALTER TABLE `kost_fkm`
  ADD CONSTRAINT `kost_fkm_id_fkm_foreign` FOREIGN KEY (`id_fkm`) REFERENCES `fasilitas_kamar_mandi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kost_fkm_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kost_fl`
--
ALTER TABLE `kost_fl`
  ADD CONSTRAINT `kost_fl_id_fl_foreign` FOREIGN KEY (`id_fl`) REFERENCES `fasilitas_lingkungan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kost_fl_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kost_fu`
--
ALTER TABLE `kost_fu`
  ADD CONSTRAINT `kost_fu_id_fu_foreign` FOREIGN KEY (`id_fu`) REFERENCES `fasilitas_umum` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kost_fu_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kost_parkir`
--
ALTER TABLE `kost_parkir`
  ADD CONSTRAINT `kost_parkir_id_kost_foreign` FOREIGN KEY (`id_kost`) REFERENCES `kosts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kost_parkir_id_parkir_foreign` FOREIGN KEY (`id_parkir`) REFERENCES `parkirs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
