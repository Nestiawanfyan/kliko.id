-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 11, 2018 at 03:15 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kliko`
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `foto`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Niki Rahmadi Wiharto', 'niki@gmail.com', '', 'nikirahmadi', '$2y$10$YKG8Qkico42LP4Xm3Gyyc./8qd84aKpAulg9l7uPZHbEremzbRSJa', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE `chat_member` (
  `id` char(36) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_chat_room` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`id`, `id_user`, `id_chat_room`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0e2c9d60-a164-11e8-a503-2cfda11d44ff', 3, 'd60b6dae-a163-11e8-a503-2cfda11d44ff', '2018-08-16 14:52:54', NULL, NULL),
('1806f77f-a164-11e8-a503-2cfda11d44ff', 7, 'd60b6dae-a163-11e8-a503-2cfda11d44ff', '2018-08-16 14:53:10', NULL, NULL),
('541aca10-a2c5-11e8-812f-0d3f88bf6e35', 3, '540b9760-a2c5-11e8-9df3-0d5ffc2c6e19', '2018-08-18 02:01:43', '2018-08-18 02:01:43', NULL),
('541f8bc0-a2c5-11e8-ace7-b90ba1ba49f4', 3, '540b9760-a2c5-11e8-9df3-0d5ffc2c6e19', '2018-08-18 02:01:43', '2018-08-18 02:01:43', NULL),
('784778f0-a2c6-11e8-afac-8902aa945043', 3, '783dc840-a2c6-11e8-a5c5-c35045de0717', '2018-08-18 02:09:53', '2018-08-18 02:09:53', NULL),
('78569d60-a2c6-11e8-bb77-4fc06db8e514', 3, '783dc840-a2c6-11e8-a5c5-c35045de0717', '2018-08-18 02:09:54', '2018-08-18 02:09:54', NULL),
('83cbeb60-a2c6-11e8-9467-61d53f439fbd', 3, '83be0a60-a2c6-11e8-a758-4fd422f2bb1c', '2018-08-18 02:10:13', '2018-08-18 02:10:13', NULL),
('83d0d1d0-a2c6-11e8-986d-41f5731b5671', 10, '83be0a60-a2c6-11e8-a758-4fd422f2bb1c', '2018-08-18 02:10:13', '2018-08-18 02:10:13', NULL),
('9b937420-a403-11e8-ad0e-f383073c585f', 3, '9b803950-a403-11e8-ba5f-414302c92b71', '2018-08-19 16:00:03', '2018-08-19 16:00:03', NULL),
('9b97dba0-a403-11e8-bd4f-993cf590b794', 9, '9b803950-a403-11e8-ba5f-414302c92b71', '2018-08-19 16:00:03', '2018-08-19 16:00:03', NULL),
('ab348c40-a40a-11e8-84b5-334730d70c0d', 3, 'ab294570-a40a-11e8-9a64-fff0f354ad65', '2018-08-19 16:50:36', '2018-08-19 16:50:36', NULL),
('ab3cd170-a40a-11e8-a5c2-3f7bc3a5523c', 3, 'ab294570-a40a-11e8-9a64-fff0f354ad65', '2018-08-19 16:50:36', '2018-08-19 16:50:36', NULL),
('cf0ff3c0-a403-11e8-a46f-870d41343815', 3, 'cefb3de0-a403-11e8-a8ec-e77bf10ff14c', '2018-08-19 16:01:30', '2018-08-19 16:01:30', NULL),
('cf2234c0-a403-11e8-a8d2-493f873c6675', 14, 'cefb3de0-a403-11e8-a8ec-e77bf10ff14c', '2018-08-19 16:01:30', '2018-08-19 16:01:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id_chat_room` char(36) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`id_chat_room`, `id_user`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloooo', '2018-08-16 15:03:56', NULL, NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 7, 'Aku adalah anak gembala selalu riang serta gembira', '2018-08-16 15:04:05', NULL, NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Harga kos sini berapa ya', '2018-08-16 15:04:18', NULL, NULL),
('540b9760-a2c5-11e8-9df3-0d5ffc2c6e19', 3, 'Haloo', '2018-08-18 02:07:57', '2018-08-18 02:07:57', NULL),
('540b9760-a2c5-11e8-9df3-0d5ffc2c6e19', 3, 'Haloo', '2018-08-18 02:09:22', '2018-08-18 02:09:22', NULL),
('783dc840-a2c6-11e8-a5c5-c35045de0717', 3, 'Haloo', '2018-08-18 02:09:54', '2018-08-18 02:09:54', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-18 02:10:13', '2018-08-18 02:10:13', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:49:44', '2018-08-19 15:49:44', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:52:44', '2018-08-19 15:52:44', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Tes', '2018-08-19 15:53:43', '2018-08-19 15:53:43', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:55:25', '2018-08-19 15:55:25', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:56:04', '2018-08-19 15:56:04', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:56:39', '2018-08-19 15:56:39', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:56:40', '2018-08-19 15:56:40', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:57:16', '2018-08-19 15:57:16', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Haloo', '2018-08-19 15:57:34', '2018-08-19 15:57:34', NULL),
('9b803950-a403-11e8-ba5f-414302c92b71', 3, 'Tes', '2018-08-19 16:00:03', '2018-08-19 16:00:03', NULL),
('cefb3de0-a403-11e8-a8ec-e77bf10ff14c', 3, 'Tes', '2018-08-19 16:01:30', '2018-08-19 16:01:30', NULL),
('cefb3de0-a403-11e8-a8ec-e77bf10ff14c', 3, 'Tessss', '2018-08-19 16:01:39', '2018-08-19 16:01:39', NULL),
('ab294570-a40a-11e8-9a64-fff0f354ad65', 3, 'Aku adalah anak gembala selalu riang serta gembira karna aku rajin bekerja tak pernah malas atau pun riang', '2018-08-19 16:50:36', '2018-08-19 16:50:36', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Mau nanya', '2018-08-21 06:31:26', '2018-08-21 06:31:26', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo', '2018-08-21 06:55:43', '2018-08-21 06:55:43', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo ss', '2018-08-21 06:55:59', '2018-08-21 06:55:59', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo ss', '2018-08-21 07:07:42', '2018-08-21 07:07:42', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Ttghj', '2018-08-21 07:13:24', '2018-08-21 07:13:24', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo ss', '2018-08-21 07:18:32', '2018-08-21 07:18:32', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo ss', '2018-08-21 07:19:01', '2018-08-21 07:19:01', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 3, 'Haloo ss', '2018-08-21 07:19:02', '2018-08-21 07:19:02', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Whahaa', '2018-08-21 07:21:15', '2018-08-21 07:21:15', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Whahaa', '2018-08-21 07:21:19', '2018-08-21 07:21:19', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Anjay', '2018-08-21 07:27:43', '2018-08-21 07:27:43', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Anjay', '2018-08-21 07:27:58', '2018-08-21 07:27:58', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Ddfff', '2018-08-21 07:31:04', '2018-08-21 07:31:04', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Cfrer', '2018-08-21 07:31:12', '2018-08-21 07:31:12', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Jsjsssj', '2018-08-21 07:33:31', '2018-08-21 07:33:31', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Koko', '2018-08-22 19:28:38', '2018-08-22 19:28:38', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Akaka', '2018-08-22 19:28:42', '2018-08-22 19:28:42', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 3, 'Sksnsnsnan', '2018-08-22 19:30:26', '2018-08-22 19:30:26', NULL),
('783dc840-a2c6-11e8-a5c5-c35045de0717', 3, 'ksjs', '2018-09-29 07:10:14', '2018-09-29 07:10:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `id` char(36) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`id`, `id_kost`, `created_at`, `updated_at`, `deleted_at`) VALUES
('783dc840-a2c6-11e8-a5c5-c35045de0717', 10, '2018-08-18 02:09:53', '2018-08-18 02:09:53', NULL),
('83be0a60-a2c6-11e8-a758-4fd422f2bb1c', 22, '2018-08-18 02:10:13', '2018-08-18 02:10:13', NULL),
('9b803950-a403-11e8-ba5f-414302c92b71', 21, '2018-08-19 16:00:03', '2018-08-19 16:00:03', NULL),
('ab294570-a40a-11e8-9a64-fff0f354ad65', 29, '2018-08-19 16:50:36', '2018-08-19 16:50:36', NULL),
('cefb3de0-a403-11e8-a8ec-e77bf10ff14c', 26, '2018-08-19 16:01:29', '2018-08-19 16:01:29', NULL),
('d60b6dae-a163-11e8-a503-2cfda11d44ff', 8, '2018-08-16 14:51:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `id_kategori`, `created_at`, `updated_at`) VALUES
(101, 'AC', 1, '2018-06-02 08:07:10', NULL),
(102, 'TV', 1, '2018-06-02 08:07:10', NULL),
(103, 'Meja Belajar', 1, '2018-06-02 08:07:10', NULL),
(104, 'Almari Pakaian', 1, '2018-06-02 08:07:10', NULL),
(105, 'Kursi', 1, '2018-06-02 08:07:10', NULL),
(106, 'Kasur', 1, '2018-06-02 08:07:10', NULL),
(201, 'Ember Mandi', 2, '2018-06-02 08:06:17', NULL),
(202, 'Bak Mandi', 2, '2018-06-02 08:06:17', NULL),
(203, 'Kamar Mandi Dalam', 2, '2018-06-02 08:06:17', NULL),
(204, 'Kamar Mandi Luar', 2, '2018-06-02 08:06:17', NULL),
(205, 'Kloset Duduk', 2, '2018-06-02 08:06:17', NULL),
(301, 'Rumah Makan', 3, '2018-06-02 08:09:32', NULL),
(302, 'Mall', 3, '2018-06-02 08:09:32', NULL),
(303, 'Apotik', 3, '2018-06-02 08:09:32', NULL),
(304, 'Klinik', 3, '2018-06-02 08:09:32', NULL),
(305, 'Sekolah Kampus', 3, '2018-06-02 08:09:32', NULL),
(401, 'Ruang Keluarga', 4, '2018-06-02 08:11:31', NULL),
(402, 'Ruang Dapur', 4, '2018-06-02 08:11:31', NULL),
(403, 'Ruang Tamu', 4, '2018-06-02 08:11:31', NULL),
(404, 'Halaman Depan', 4, '2018-06-02 08:11:31', NULL),
(405, 'Halaman Belakang', 4, '2018-06-02 08:11:31', NULL),
(406, 'Teras', 4, '2018-06-02 08:11:31', NULL),
(501, 'Dapur', 5, '2018-06-02 08:12:16', NULL),
(502, 'Musholla', 5, '2018-06-02 08:12:16', NULL),
(503, 'TV', 5, '2018-06-02 08:12:16', NULL),
(504, 'Wi-Fi', 5, '2018-06-02 08:12:16', NULL),
(505, 'Security', 5, '2018-06-02 08:12:16', NULL),
(506, 'Parkir', 5, '2018-06-02 08:12:24', NULL),
(601, 'Sepeda', 6, '2018-06-02 08:19:41', NULL),
(602, 'Motor', 6, '2018-06-02 08:19:41', NULL),
(603, 'Mobil', 6, '2018-06-02 08:19:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kategori`
--

CREATE TABLE `fasilitas_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_kategori`
--

INSERT INTO `fasilitas_kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Khusus', '2018-06-02 08:01:47', NULL),
(2, 'Kamar Mandi', '2018-06-02 08:01:47', NULL),
(3, 'Lingkungan', '2018-06-02 08:01:47', NULL),
(4, 'Ruangan', '2018-06-02 08:01:47', NULL),
(5, 'Umum', '2018-06-02 08:01:47', NULL),
(6, 'Parkir', '2018-06-02 08:19:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kost`
--

CREATE TABLE `fasilitas_kost` (
  `id` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_kost`
--

INSERT INTO `fasilitas_kost` (`id`, `id_kost`, `id_fasilitas`, `created_at`, `updated_at`) VALUES
(1, 8, 602, '2018-06-02 01:25:18', NULL),
(2, 10, 602, '2018-06-02 01:25:18', NULL),
(3, 10, 601, '2018-06-02 01:25:18', NULL),
(4, 11, 602, '2018-06-02 01:25:18', NULL),
(5, 12, 602, '2018-06-02 01:25:18', NULL),
(6, 13, 603, '2018-06-02 01:25:18', NULL),
(7, 13, 602, '2018-06-02 01:25:18', NULL),
(8, 13, 601, '2018-06-02 01:25:18', NULL),
(9, 14, 602, '2018-06-02 01:25:18', NULL),
(10, 14, 601, '2018-06-02 01:25:18', NULL),
(11, 15, 602, '2018-06-02 01:25:18', NULL),
(12, 15, 601, '2018-06-02 01:25:18', NULL),
(13, 16, 602, '2018-06-02 01:25:18', NULL),
(14, 20, 602, '2018-06-02 01:25:18', NULL),
(15, 20, 601, '2018-06-02 01:25:18', NULL),
(16, 21, 602, '2018-06-02 01:25:18', NULL),
(17, 22, 603, '2018-06-02 01:25:18', NULL),
(18, 22, 602, '2018-06-02 01:25:18', NULL),
(19, 24, 602, '2018-06-02 01:25:18', NULL),
(20, 24, 601, '2018-06-02 01:25:18', NULL),
(21, 27, 602, '2018-06-02 01:25:18', NULL),
(22, 27, 601, '2018-06-02 01:25:18', NULL),
(23, 26, 603, '2018-06-02 01:25:18', NULL),
(24, 26, 602, '2018-06-02 01:25:18', NULL),
(25, 26, 601, '2018-06-02 01:25:18', NULL),
(26, 8, 101, '2018-06-02 01:32:26', NULL),
(27, 8, 102, '2018-06-02 01:32:26', NULL),
(28, 8, 103, '2018-06-02 01:32:26', NULL),
(29, 8, 104, '2018-06-02 01:32:26', NULL),
(30, 10, 101, '2018-06-02 01:32:26', NULL),
(31, 10, 103, '2018-06-02 01:32:26', NULL),
(32, 10, 104, '2018-06-02 01:32:26', NULL),
(33, 11, 101, '2018-06-02 01:32:26', NULL),
(34, 11, 102, '2018-06-02 01:32:26', NULL),
(35, 11, 103, '2018-06-02 01:32:26', NULL),
(36, 11, 104, '2018-06-02 01:32:26', NULL),
(37, 12, 103, '2018-06-02 01:32:26', NULL),
(38, 12, 104, '2018-06-02 01:32:26', NULL),
(39, 13, 101, '2018-06-02 01:32:26', NULL),
(40, 13, 102, '2018-06-02 01:32:26', NULL),
(41, 13, 103, '2018-06-02 01:32:26', NULL),
(42, 13, 104, '2018-06-02 01:32:26', NULL),
(43, 14, 101, '2018-06-02 01:32:26', NULL),
(44, 14, 102, '2018-06-02 01:32:26', NULL),
(45, 14, 103, '2018-06-02 01:32:26', NULL),
(46, 14, 104, '2018-06-02 01:32:26', NULL),
(47, 15, 101, '2018-06-02 01:32:26', NULL),
(48, 15, 103, '2018-06-02 01:32:26', NULL),
(49, 15, 104, '2018-06-02 01:32:26', NULL),
(50, 16, 101, '2018-06-02 01:32:26', NULL),
(51, 16, 102, '2018-06-02 01:32:26', NULL),
(52, 16, 104, '2018-06-02 01:32:26', NULL),
(53, 20, 101, '2018-06-02 01:32:26', NULL),
(54, 20, 103, '2018-06-02 01:32:26', NULL),
(55, 20, 104, '2018-06-02 01:32:26', NULL),
(56, 22, 101, '2018-06-02 01:32:26', NULL),
(57, 22, 103, '2018-06-02 01:32:26', NULL),
(58, 22, 105, '2018-06-02 01:32:26', NULL),
(59, 22, 101, '2018-06-02 01:32:26', NULL),
(60, 24, 101, '2018-06-02 01:32:26', NULL),
(61, 24, 103, '2018-06-02 01:32:26', NULL),
(62, 24, 104, '2018-06-02 01:32:26', NULL),
(63, 27, 101, '2018-06-02 01:32:26', NULL),
(64, 27, 103, '2018-06-02 01:32:26', NULL),
(65, 27, 104, '2018-06-02 01:32:26', NULL),
(66, 26, 101, '2018-06-02 01:32:26', NULL),
(67, 26, 105, '2018-06-02 01:32:26', NULL),
(68, 28, 101, '2018-06-02 01:32:26', NULL),
(69, 28, 104, '2018-06-02 01:32:26', NULL),
(70, 30, 101, '2018-06-02 01:32:26', NULL),
(71, 30, 104, '2018-06-02 01:32:26', NULL),
(72, 30, 105, '2018-06-02 01:32:26', NULL),
(73, 8, 204, '2018-06-02 01:34:05', NULL),
(74, 10, 201, '2018-06-02 01:34:05', NULL),
(75, 10, 202, '2018-06-02 01:34:05', NULL),
(76, 10, 204, '2018-06-02 01:34:05', NULL),
(77, 11, 203, '2018-06-02 01:34:05', NULL),
(78, 12, 203, '2018-06-02 01:34:05', NULL),
(79, 13, 201, '2018-06-02 01:34:05', NULL),
(80, 13, 203, '2018-06-02 01:34:05', NULL),
(81, 14, 203, '2018-06-02 01:34:05', NULL),
(82, 15, 203, '2018-06-02 01:34:05', NULL),
(83, 16, 203, '2018-06-02 01:34:05', NULL),
(84, 20, 203, '2018-06-02 01:34:05', NULL),
(85, 21, 203, '2018-06-02 01:34:05', NULL),
(86, 22, 201, '2018-06-02 01:34:05', NULL),
(87, 22, 203, '2018-06-02 01:34:05', NULL),
(88, 24, 204, '2018-06-02 01:34:05', NULL),
(89, 27, 203, '2018-06-02 01:34:05', NULL),
(90, 26, 201, '2018-06-02 01:34:05', NULL),
(91, 26, 203, '2018-06-02 01:34:05', NULL),
(92, 10, 301, '2018-06-02 01:36:20', NULL),
(93, 10, 302, '2018-06-02 01:36:20', NULL),
(94, 10, 305, '2018-06-02 01:36:20', NULL),
(95, 11, 301, '2018-06-02 01:36:20', NULL),
(96, 11, 302, '2018-06-02 01:36:20', NULL),
(97, 11, 305, '2018-06-02 01:36:20', NULL),
(98, 12, 305, '2018-06-02 01:36:20', NULL),
(99, 13, 301, '2018-06-02 01:36:20', NULL),
(100, 13, 302, '2018-06-02 01:36:20', NULL),
(101, 13, 305, '2018-06-02 01:36:20', NULL),
(102, 14, 301, '2018-06-02 01:36:20', NULL),
(103, 14, 305, '2018-06-02 01:36:20', NULL),
(104, 15, 301, '2018-06-02 01:36:20', NULL),
(105, 15, 302, '2018-06-02 01:36:20', NULL),
(106, 15, 305, '2018-06-02 01:36:20', NULL),
(107, 16, 301, '2018-06-02 01:36:20', NULL),
(108, 16, 302, '2018-06-02 01:36:20', NULL),
(109, 16, 305, '2018-06-02 01:36:20', NULL),
(110, 20, 301, '2018-06-02 01:36:20', NULL),
(111, 20, 305, '2018-06-02 01:36:20', NULL),
(112, 22, 301, '2018-06-02 01:36:20', NULL),
(113, 22, 302, '2018-06-02 01:36:20', NULL),
(114, 22, 303, '2018-06-02 01:36:20', NULL),
(115, 22, 304, '2018-06-02 01:36:20', NULL),
(116, 22, 305, '2018-06-02 01:36:20', NULL),
(117, 24, 301, '2018-06-02 01:36:20', NULL),
(118, 24, 303, '2018-06-02 01:36:20', NULL),
(119, 24, 304, '2018-06-02 01:36:20', NULL),
(120, 24, 305, '2018-06-02 01:36:20', NULL),
(121, 26, 301, '2018-06-02 01:36:20', NULL),
(122, 26, 302, '2018-06-02 01:36:20', NULL),
(123, 26, 303, '2018-06-02 01:36:20', NULL),
(124, 26, 304, '2018-06-02 01:36:20', NULL),
(125, 8, 504, '2018-06-02 01:38:27', NULL),
(126, 11, 504, '2018-06-02 01:38:27', NULL),
(127, 11, 505, '2018-06-02 01:38:27', NULL),
(128, 14, 504, '2018-06-02 01:38:27', NULL),
(129, 15, 504, '2018-06-02 01:38:27', NULL),
(130, 16, 504, '2018-06-02 01:38:27', NULL),
(131, 20, 504, '2018-06-02 01:38:27', NULL),
(132, 22, 501, '2018-06-02 01:38:27', NULL),
(133, 22, 504, '2018-06-02 01:38:27', NULL),
(134, 24, 501, '2018-06-02 01:38:27', NULL),
(135, 24, 502, '2018-06-02 01:38:27', NULL),
(136, 24, 504, '2018-06-02 01:38:27', NULL),
(137, 27, 503, '2018-06-02 01:38:27', NULL),
(138, 26, 502, '2018-06-02 01:38:27', NULL),
(139, 26, 504, '2018-06-02 01:38:27', NULL),
(140, 67, 104, '2018-10-04 20:29:39', '2018-10-04 20:29:39'),
(141, 67, 105, '2018-10-04 20:29:39', '2018-10-04 20:29:39'),
(142, 68, 104, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(143, 68, 105, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(144, 68, 504, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(145, 68, 303, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(146, 68, 204, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(147, 69, 104, '2018-10-04 20:30:55', '2018-10-04 20:30:55'),
(148, 69, 105, '2018-10-04 20:30:55', '2018-10-04 20:30:55'),
(149, 69, 504, '2018-10-04 20:30:55', '2018-10-04 20:30:55'),
(150, 69, 303, '2018-10-04 20:30:55', '2018-10-04 20:30:55'),
(151, 69, 204, '2018-10-04 20:30:55', '2018-10-04 20:30:55');

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

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `id_kost`, `url`, `created_at`, `updated_at`) VALUES
(3, 8, 'image-kost/2017/05/5299a58cea84e7aabed4535c7909b65d170218b0.jpg', '2017-05-16 07:15:44', '2017-05-16 07:15:44'),
(4, 8, 'image-kost/2017/05/b045ac3e7cf6a28dd3b2a32a3a7c8fba76e1315b.jpg', '2017-05-16 07:15:44', '2017-05-16 07:15:44'),
(6, 10, 'image-kost/2017/05/f0bb56284cd4aadaa79fd4ee9a52e95b0671fb71.png', '2017-05-16 08:08:18', '2017-05-16 08:08:18'),
(7, 10, 'image-kost/2017/05/22afc51d843431f829ea95e68afc87a4a0910e8f.png', '2017-05-16 08:08:18', '2017-05-16 08:08:18'),
(9, 13, 'image-kost/2017/05/98abe3c7f943dda2cb2a36957dea4039ee4848c7.jpg', '2017-05-16 22:27:37', '2017-05-16 22:27:37'),
(10, 13, 'image-kost/2017/05/ff475aeb6d8227d33de8a1b924067c7ee1564852.jpg', '2017-05-16 22:27:37', '2017-05-16 22:27:37'),
(11, 15, 'image-kost/2017/05/9614dc3edc359e55d6601995cee38de68162249e.jpg', '2017-05-17 06:16:52', '2017-05-17 06:16:52'),
(12, 12, 'image-kost/2017/05/81df33c3e541febfe4dd176dca0cf56960d7e330.jpg', '2017-05-17 16:44:46', '2017-05-17 16:44:46'),
(13, 12, 'image-kost/2017/05/9adb78a5f3e14abb9148cc8f07a401779971196f.jpg', '2017-05-18 05:18:53', '2017-05-18 05:18:53'),
(15, 11, 'image-kost/2017/05/80b5383c3b49a2cd37ea435848bd4e59f4a1fd32.jpg', '2017-05-18 21:39:32', '2017-05-18 21:39:32'),
(16, 11, 'image-kost/2017/05/7ef2f289f30241a8cde248de6f61771376446c5b.jpg', '2017-05-18 21:39:42', '2017-05-18 21:39:42'),
(17, 16, 'image-kost/2017/05/1ce6ec3aaa464b760afdc6b4953847c17277a51d.jpg', '2017-05-19 21:24:53', '2017-05-19 21:24:53'),
(18, 16, 'image-kost/2017/05/ec9970ce8f39bc1cd6d9ac3af6229f4a088d0d97.jpg', '2017-05-19 21:25:01', '2017-05-19 21:25:01'),
(19, 16, 'image-kost/2017/05/d76aa7b21779cc41476c68182a4fb9ecad983822.jpg', '2017-05-19 21:25:14', '2017-05-19 21:25:14'),
(20, 22, 'image-kost/2017/05/a746f576cb3f8033ca5f3bc5aa896b3df3970a89.jpg', '2017-05-26 22:20:09', '2017-05-26 22:20:09'),
(21, 22, 'image-kost/2017/05/5573f377af211797ae85853bc9bf05ffab5206be.jpg', '2017-05-26 22:20:09', '2017-05-26 22:20:09'),
(23, 22, 'image-kost/2017/05/cde1a5703c6a5b264df1ee3d35b6dc23179ffa97.jpg', '2017-05-26 22:20:09', '2017-05-26 22:20:09'),
(25, 22, 'image-kost/2017/05/03d6dc8fd7a7f6f3ec6ea36c015faa71baf961f8.jpg', '2017-05-26 22:44:03', '2017-05-26 22:44:03'),
(26, 22, 'image-kost/2017/05/dc6a87785ea7dae75ebb12bde75885bc1c54cbe0.jpg', '2017-05-26 22:44:18', '2017-05-26 22:44:18'),
(33, 24, 'image-kost/2017/05/6415d22bfea2976e7bd9c949ffff6e5b29d07fba.jpg', '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(34, 24, 'image-kost/2017/05/5bdcd5de81702e25e79da32facd45b541ae177f2.jpg', '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(35, 24, 'image-kost/2017/05/4011e8a6e0a186137b7f49e8027ac5b54ef67f79.jpg', '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(36, 24, 'image-kost/2017/05/2c9daba2614a6508af0d347395d6f1078216b811.jpg', '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(37, 24, 'image-kost/2017/05/860c16bdf6dd676305bcb57620d036c2f0fd4f30.jpg', '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(38, 26, 'image-kost/2017/06/31e83cf585f283697a0366bb59811e66de5b32fe.jpg', '2017-05-31 20:33:17', '2017-05-31 20:33:17'),
(39, 26, 'image-kost/2017/06/9c0023c4cae72d2967128e749d7c791e0891f49e.jpg', '2017-05-31 20:34:22', '2017-05-31 20:34:22'),
(40, 27, 'image-kost/2017/06/bd7f5a33eaa6224afc962b0fe0a9f4aeee7ae23a.jpg', '2017-06-02 09:28:00', '2017-06-02 09:28:00'),
(41, 27, 'image-kost/2017/06/71975e67e9a5277cb2093d066c1f8d29c89ce73b.jpg', '2017-06-02 09:28:03', '2017-06-02 09:28:03'),
(43, 26, 'image-kost/2017/07/dc0ccca678c62c6454539210fe45d1e01d777ef8.jpg', '2017-07-19 01:54:20', '2017-07-19 01:54:20'),
(44, 26, 'image-kost/2017/07/eba2375db1f88968466487b6602a69c291cf7eea.jpg', '2017-07-19 01:54:33', '2017-07-19 01:54:33'),
(45, 26, 'image-kost/2017/07/e3204068fed660f1260568e7f24a4255faa7820a.jpg', '2017-07-19 01:54:43', '2017-07-19 01:54:43'),
(46, 28, 'image-kost/2018/01/51f789d360af5b221a83a95b6dfb85a82f657b35.jpg', '2018-01-01 00:46:28', '2018-01-01 00:46:28'),
(47, 29, 'image-kost/2018/01/1a416e267865bd601e2479ac12167ad7b1df030d.png', '2018-01-02 16:26:31', '2018-01-02 16:26:31'),
(48, 30, 'image-kost/2018/05/7ea25be0fb782197a38f730de908ce0f12c746cf.png', '2018-05-19 03:29:46', '2018-05-19 03:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hunian`
--

CREATE TABLE `jenis_hunian` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_hunian`
--

INSERT INTO `jenis_hunian` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kost', '2018-05-14 13:38:09', NULL),
(2, 'Kontrakan', '2018-05-14 13:38:09', NULL),
(3, 'Bedeng', '2018-05-14 13:38:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_listrik`
--

CREATE TABLE `jenis_listrik` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_listrik`
--

INSERT INTO `jenis_listrik` (`id`, `nama`, `created_at`, `update`) VALUES
(1, 'Token (Prabayar)', '2018-05-14 13:00:05', NULL),
(2, 'Gratis', '2018-05-14 13:00:05', NULL),
(3, 'Pasca Bayar', '2018-05-14 13:00:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tempat`
--

CREATE TABLE `kategori_tempat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `marker` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kosts`
--

CREATE TABLE `kosts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `seoTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namaPemilik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telpPemilik` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `alamatPemilik` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_jenis_hunian` int(11) NOT NULL,
  `namaKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamatKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posKost` int(11) DEFAULT NULL,
  `telpKost` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `luasKamar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlahKamar` int(11) NOT NULL,
  `kamarKosong` int(11) DEFAULT NULL,
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
  `id_jenis_listrik` int(11) NOT NULL,
  `catatan` text COLLATE utf8_unicode_ci,
  `konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `kode_konfirmasi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kosts`
--

INSERT INTO `kosts` (`id`, `user_id`, `seoTitle`, `namaPemilik`, `telpPemilik`, `alamatPemilik`, `id_jenis_hunian`, `namaKost`, `alamatKost`, `posKost`, `telpKost`, `luasKamar`, `jumlahKamar`, `kamarKosong`, `penghuni`, `latitude`, `longitude`, `sewaMin`, `sewaHari`, `sewaMinggu`, `sewaBulan`, `sewaTahun`, `fKhusus`, `fUmum`, `fLingkungan`, `fKamarMandi`, `id_jenis_listrik`, `catatan`, `konfirmasi`, `kode_konfirmasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 3, 'kost-belakang-unila-2', 'Ayu', '082177149192', 'jl. bumi manti 3, no 72, kampung baru, kedaton', 2, 'Kost Belakang UNILA', 'jl. bumi manti 3, no 72, kampung baru, kedaton', NULL, '', '3x4', 6, 0, 'Putra', -5.360555144157296, 105.24482677258607, 1, 0, 0, 400000, 0, '', '', '', '', 1, 'kostan gandeng dengan warung, jadi kalau mau beli apa2 mudah tinggal beli di ibu kost\r\nkost insyaalloh aman', 1, NULL, NULL, '2017-05-16 07:15:44', '2017-05-19 18:08:26'),
(10, 3, 'wisma-srisendono', 'Supriyanto', '08080808', 'Jalan Arabika No. 002, Rajabasa, Bandar Lampung', 3, 'Wisma Srisendono', 'Jalan Arabika No. 002, Rajabasa, Bandar Lampung', NULL, '', '4x4', 40, 0, 'Campur', -5.371735264963359, 105.23609716850888, 1, 0, 0, 0, 3750000, '', 'Listrik', '', '', 1, 'Wisma dekat dengan kampus (Unila, UMITRA)\nLokasi juga dekat dengan terminal Rajabasa, Robinson\nAda warung\nSuasana kondusif', 1, NULL, NULL, '2017-05-16 08:08:18', '2017-05-16 08:27:57'),
(11, 3, 'vita-kost', 'Jun', '082185516007', 'Jl. Nunyai, No. 16A, Rajabasa, Bandar Lampung', 1, 'Vita Kost', 'Jl. Nunyai, No. 16A, Rajabasa, Bandar Lampung', NULL, '', '4x3', 19, 0, 'Campur', -5.370009118053852, 105.2337305178603, 1, 0, 0, 600000, 6000000, '', '', 'Pom Bensin', '', 1, 'Halaman depan luas, lokasi dekat dengan sarana umum, lingkungan kondusif', 1, NULL, NULL, '2017-05-16 08:55:09', '2017-05-17 06:35:08'),
(12, 3, 'wisma-rizky', 'Hi  Nurdin', '081379325624', 'Jl. Bumi Manti 1 Gang Madinah 2 No. 5, RT 02, RW 01, Kampung Baru, Bandar Lampung', 1, 'Wisma Rizky', 'Jl. Bumi Manti 1 Gang Madinah 2 No. 5, RT 02, RW 01, Kampung Baru, Bandar Lampung', NULL, '', '3x3', 34, 0, 'Putri', -5.364235522229077, 105.24938405372404, 1, 0, 0, 0, 3000000, 'Springbed', '', '', '', 1, 'Ada 2 lantai\nListrik belum termasuk', 1, NULL, NULL, '2017-05-16 09:19:20', '2017-05-16 09:23:31'),
(13, 3, 'kost-ceria', 'Pak Nuh', '085279308463', 'Jalan Siworatu, No. 3, Kel. Gedung Meneng, Rajabasa, Bandar Lampung', 1, 'Kost Ceria', 'Jalan Siworatu, No. 3, Kel. Gedung Meneng, Rajabasa, Bandar Lampung', NULL, '', '3x4', 10, 0, 'Putra', -5.370968730171625, 105.24541121454149, 1, 0, 200000, 500000, 5000000, 'Dapur, Kamar Mandi', 'Air', '', '', 1, 'Jarak ke Universitas Lampung 2 menit,\r\nParkiran Luas, untuk mobil juga cukup,\r\nKosan tingkat 2,\r\nAir sudah ada dan lancar,\r\nLingkungan kondusif,\r\nJauh dari kendaraan lewat', 1, NULL, NULL, '2017-05-16 22:27:34', '2017-05-16 22:27:34'),
(14, 3, 'kost-daerah-gang-ratu', 'Masri', '08978909675', 'Jalan Purnawirawan Gg. Anggrek, No. 1A Kedaton, Bandar Lampung', 1, 'Kost Daerah Gang Ratu', 'Jalan Purnawirawan Gg. Anggrek, No. 1A Kedaton, Bandar Lampung', NULL, '', '4x3', 21, 0, 'Putri', -5.3783816515789855, 105.24603073621518, 1, 0, 0, 500000, 5000000, '', '', '', '', 1, '', 1, NULL, NULL, '2017-05-17 06:09:25', '2017-05-17 06:09:25'),
(15, 3, 'kosan-kantin-pokwe', 'Satria Bangsawan', '082175265510', '', 1, 'Kosan Kantin Pokwe', 'Jalan Bumi Manti 2, Kampung Baru Rajabasa, Belakang Fakultas Teknik Unila', NULL, '', '3x6', 7, 0, 'Putri', -5.362882121792809, 105.2452003802872, 1, 0, 0, 0, 4000000, '', '', '', '', 1, '', 1, NULL, NULL, '2017-05-17 06:14:59', '2017-05-19 18:36:13'),
(16, 3, 'kos-ijo', 'Yulita Idris', '085768323545', 'Jalan Kopi Ujung No. 46, Gedung Meneng, Rajabasa', 1, 'Kos Ijo', 'Jalan Kopi Ujung No. 46, Gedung Meneng, Rajabasa', 0, '', '4x3', 10, 0, 'Putri', -5.375701909705807, 105.23801396168824, 1, 0, 0, 0, 3750000, 'Dipan', 'WiFi, Sumur Bor', '', '', 1, '', 1, NULL, NULL, '2017-05-19 08:30:55', '2017-06-26 08:27:07'),
(20, 3, 'kos-bunga-mayang', 'Silvy', '085658750057', 'Jalan Bumi Manti 2, Samping Rumah Makan Council, Kampung Baru', 1, 'Kos Bunga Mayang', 'Jalan Bumi Manti 2, Samping Rumah Makan Council, Kampung Baru', NULL, '', '4x3', 20, 0, 'Putra', -5.364637738772269, 105.24952551904903, 1, 0, 0, 0, 3500000, '', '', '', '', 1, 'Harga per tahun ada yang Rp. 3.500.000, Rp. 4.000.000, Rp. 7.000.000', 1, NULL, NULL, '2017-05-21 23:38:48', '2017-05-21 23:38:48'),
(21, 9, 'kos-ferry', 'Sundari', '081379792492', 'Jl. Imam Bonjol Gg. Damai, No. 15, Sumber Rejo, Kemiling, Bandar Lampung', 1, 'Kos Ferry', 'Jl. Imam Bonjol Gg. Damai, No. 15, Sumber Rejo, Kemiling, Bandar Lampung', NULL, '', '4x4', 2, 0, 'Campur', -5.389199595892895, 105.20509352479257, 1, 0, 0, 250000, 0, '', '', '', '', 1, '', 1, NULL, NULL, '2017-05-22 04:19:36', '2017-05-22 04:19:36'),
(22, 10, 'kost-bang-jhon', 'Jhondy', '081368058182', 'Perum Villa Citra Blok G1-1H', 1, 'Kost Bang Jhon', 'Jl. Badak No 20A Kedaton ', NULL, '081368058182', '3x3', 15, 0, 'Putra', -5.395967329320117, 105.26004562653657, 1, 125000, 400000, 1000000, 0, 'Kamar Mandi Dalam (Shower)', 'Ruang Tamu', '', 'Kamar Mandi Shower', 1, 'Kosan saya berada di \r\nJalan Badak No 20A Kedaton\r\nmasuk dari depan makam pahlawan, sampng toko cahaya keramik.\r\nkurang lbh 50m sebelah kanan sebelum simpang empat pertama.\r\n\r\nRumah Warna Putih List Kuning (Beda Sendiri)\r\n\r\nBangunan Baru di Renov.\r\n\r\nSuasana Kost yang Nyaman dan Bersih\r\nTidak Bising dari suara Jalan Raya\r\n\r\nAkses untuk ke jalan besar juga sangat dekat\r\nmudah untuk mencari Makanan, krn banyak yang jual makanan.\r\nmau jalan ke Mall atau pun Rumah Sakit juga sangat dekat.', 1, NULL, NULL, '2017-05-26 22:20:07', '2017-05-26 22:26:22'),
(24, 13, 'kost-putri-aghoy', 'Lutfi Virliansah', '087770491287', 'Jln Cengkeh gg sumur kucing no.2 dari depan', 1, 'Kost Putri Aghoy', 'Jln Cengkeh gg sumur kucing no.2 dari depan', NULL, '087770491287', '3x3', 12, 0, 'Putri', -5.3777921886254605, 105.23995788200068, 1, 0, 0, 450000, 5400000, 'Kaca rias', '', '', 'Shower, ', 1, 'Kost Putri berlokasi dekat dengan Umitra, UNILA, MM UBL, Sekolah Araihan,Sekolah Global Surya. Bangunan baru dekat masjid', 1, NULL, NULL, '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(26, 14, 'kamar-kost-lantai-2-1', 'gilang wahyu', '082180205235', 'jl onta gg angsa 1 no 16 kedaton bdl', 1, 'kamar kost lantai dua', 'jl onta gg angsa 1 no 16 kedaton bdl', 35147, '082180205236', '4x2', 1, 1, 'Campur', -5.3971396, 105.2667887, 1, 0, 0, 850000, 0, 'Jemuran kecil', '', 'pasar', '', 1, 'letak kamar kos di lantai 2 , luas 4,5x2,5 m. lingkungan dekat dgn masjid. fasilitas tv, kasur utk 2-3 org, kipas angin, kamar mandi , dan musola hub no tlp. tidak melayani WA. terimakasih...', 1, NULL, NULL, '2017-05-31 19:32:31', '2017-07-19 01:55:53'),
(27, 3, 'kosan-residen-c03', 'Sianturi', '081369520331', 'Jl. Bumi Manti 3 Perumahan Kampus Hijau Residen blok C 03, kelurahan', 1, 'Kosan Residen C03', 'Jl. Bumi Manti 3 Perumahan Kampus Hijau Residen blok C 03, kelurahan', 0, '', '4x3', 20, 0, 'Putri', -5.3971396, 105.2667887, 1, 0, 0, 0, 4500000, '', 'Sofa, Kulkas, Kompor', '', '', 1, '', 1, NULL, NULL, '2017-06-02 09:26:45', '2017-06-26 08:09:27'),
(28, 3, 'tes', 'tes', '123321', 'tes', 1, 'tes', 'res', 25132, '085783104873', '4x4', 4, 4, 'Putra', -5.3971396, 105.2667887, 1, 5000, 0, 0, 0, '', '', '', '', 1, '', 1, NULL, NULL, '2018-01-01 00:46:28', '2018-01-01 00:46:28'),
(29, 3, 'kost-kembar', 'Niki Rahmadi Wiharto', '085783104873', 'Jl. Imam Bonjol Gg. Durian', 1, 'Kost Kembar', 'Jl. Imam Bonjol Gg. Durian', 35365, '085783104873', '5x4', 5, 5, 'Putra', -5.396797799215723, 105.25816271580811, 1, 50000, 150000, 500000, 4000000, '', '', '', '', 1, '', 1, NULL, NULL, '2018-01-02 16:26:31', '2018-01-02 16:26:31'),
(30, 3, 'sdasdas', 'sadas', '6766776', 'dasda', 1, 'sdasdas', 'dasda', 35151, '3132323', '4x3', 3, 3, 'Putra', -5.3971396, 105.2667887, 1, 2, 0, 0, 0, 'radio, ac', '', '', '', 1, 'asd', 1, NULL, NULL, '2018-05-19 03:29:46', '2018-05-19 03:29:46'),
(31, 3, 'hshdhdhdd', 'djjfjfjff', '56565965', 'Svgshdhdr', 2, 'hshdhdhdd', 'Dudhdhjd', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:03:02', '2018-09-23 11:03:02'),
(32, 3, 'kost-ceria-1', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:04:09', '2018-09-23 11:04:09'),
(33, 3, 'kost-ceria-1-2', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:04:25', '2018-09-23 11:04:25'),
(34, 3, 'kost-ceria-1-2-3', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:06:13', '2018-09-23 11:06:13'),
(35, 3, 'kost-ceria-2', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:06:59', '2018-09-23 11:06:59'),
(36, 3, 'kost-ceria-3', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:07:01', '2018-09-23 11:07:01'),
(37, 3, 'kost-ceria-4', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:07:03', '2018-09-23 11:07:03'),
(38, 3, 'kost-ceria-5', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:09:30', '2018-09-23 11:09:30'),
(39, 3, 'kost-ceria-6', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 1, NULL, NULL, '2018-09-23 11:10:57', '2018-09-23 11:10:57'),
(40, 3, 'kost-ceria-7', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 1, NULL, NULL, '2018-09-23 11:12:12', '2018-09-23 11:12:12'),
(41, 3, 'kost-ceria-8', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 1, NULL, NULL, '2018-09-23 11:12:18', '2018-09-23 11:12:18'),
(42, 3, 'kost-ceria-9', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 1, NULL, NULL, '2018-09-23 11:12:37', '2018-09-23 11:12:37'),
(43, 3, 'kost-ceria-10', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 1, NULL, NULL, '2018-09-23 11:13:00', '2018-09-23 11:13:00'),
(44, 3, 'kost-ceria-11', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:13:06', '2018-09-23 11:13:06'),
(45, 3, 'kost-ceria-12', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:24:05', '2018-09-23 11:24:05'),
(46, 3, 'kost-ceria-13', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:31:35', '2018-09-23 11:31:35'),
(47, 3, 'kost-ceria-14', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 11:33:59', '2018-09-23 11:33:59'),
(48, 3, 'kost-ceria-15', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 15:32:18', '2018-09-23 15:32:18'),
(49, 3, 'kost-ceria-16', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 15:33:30', '2018-09-23 15:33:30'),
(50, 3, 'kost-ceria-17', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 15:33:49', '2018-09-23 15:33:49'),
(51, 3, 'kost-ceria-18', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-23 15:36:57', '2018-09-23 15:36:57'),
(52, 3, 'nsnsnsnsjs', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:47:36', '2018-09-23 15:47:36'),
(53, 3, 'nsnsnsnsjs-1', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:47:43', '2018-09-23 15:47:43'),
(54, 3, 'nsnsnsnsjs-2', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:52:41', '2018-09-23 15:52:41'),
(55, 3, 'nsnsnsnsjs-3', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:52:53', '2018-09-23 15:52:53'),
(56, 3, 'nsnsnsnsjs-4', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:53:13', '2018-09-23 15:53:13'),
(57, 3, 'nsnsnsnsjs-5', 'nikirahmadi', '08578310873', 'J. Imam bonjol', 2, 'nsnsnsnsjs', 'Zgshzhsvsh', 12356, '7976767979', '6x5', 8, 8, 'Putra', -5.4180684089660645, 105.25568389892578, 0, 80, 0, 0, 0, '', '', '', '', 3, '', 0, NULL, NULL, '2018-09-23 15:53:47', '2018-09-23 15:53:47'),
(58, 3, 'kost-ceria-19', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-29 05:37:39', '2018-09-29 05:37:39'),
(59, 3, 'kost-ceria-20', 'djjfjfjff', '56565965', 'Gg. Durian', 2, 'Kost Ceria', 'Jl. Imam Bonjol', 45808, '5(5565565965', '6x5', 6, 6, 'Putra', -5.418214797973633, 105.2558364868164, 0, 4, 5, 5, 5, '', '', '', '', 1, '', 0, NULL, NULL, '2018-09-29 06:18:12', '2018-09-29 06:18:12'),
(60, 3, 'gggggghhh', 'hmhhhhhhjj', '855522222', 'ghh', 2, 'gggggghhh', 'ghghhhhhhhhhhbb', 52811, '555555555556', '3x3', 25, 25, 'Putri', -5.3924031257629395, 105.27468872070312, 0, 55555, 26688899, 889999, 95963585, '', '', '', '', 2, '', 0, NULL, NULL, '2018-09-29 06:35:26', '2018-09-29 06:35:26'),
(61, 3, 'ahahshhss', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'ahahshhss', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, '', '', '', '', 1, '', 0, NULL, NULL, '2018-10-04 19:58:58', '2018-10-04 19:58:58'),
(62, 3, 'kost-ceria-21', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, '', '', '', '', 1, '', 0, NULL, NULL, '2018-10-04 19:59:16', '2018-10-04 19:59:16'),
(63, 3, 'kost-ceria-22', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, '', '', '', '', 1, '', 0, NULL, NULL, '2018-10-04 19:59:36', '2018-10-04 19:59:36'),
(64, 3, 'hahabshhss', 'janabsbs', '464994464', 'Vsvsgsgsgs', 2, 'hahabshhss', 'Svsvsvsvs', 12563, '46464646644', '6x5', 6, 6, 'Putra', -5.326303005218506, 105.28775787353516, 0, 10000, 0, 0, 0, 'Baju', 'Pakaian', 'cleana', 'sbsbbs', 1, 'Bsbshs', 0, NULL, NULL, '2018-10-04 20:18:13', '2018-10-04 20:18:13'),
(65, 3, 'kost-ceria-23', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, 'Lemari', 'Ahaha, jsjs', 'hahah, jsjs', 'hshshs', 1, 'asdas', 0, NULL, NULL, '2018-10-04 20:23:31', '2018-10-04 20:23:31'),
(66, 3, 'kost-ceria-24', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, 'Lemari', 'Ahaha, jsjs', 'hahah, jsjs', 'hshshs', 1, NULL, 0, NULL, NULL, '2018-10-04 20:24:06', '2018-10-04 20:24:06'),
(67, 3, 'kost-ceria-25', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, 'Lemari', 'Ahaha, jsjs', 'hahah, jsjs', 'hshshs', 1, NULL, 0, NULL, NULL, '2018-10-04 20:29:39', '2018-10-04 20:29:39'),
(68, 3, 'kost-ceria-26', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, 'Lemari', 'Ahaha, jsjs', 'hahah, jsjs', 'hshshs', 1, NULL, 0, NULL, NULL, '2018-10-04 20:30:40', '2018-10-04 20:30:40'),
(69, 3, 'kost-ceria-27', 'Trionel', '97643494', 'Ahahsbbsbsbbsbs', 2, 'Kost Ceria', 'Agahshss', 12658, '46464649494', '6x5', 3, 3, 'Putra', -5.332688331604004, 105.28589630126953, 0, 10000, 0, 0, 0, 'Lemari', 'Ahaha, jsjs', 'hahah, jsjs', 'hshshs', 1, NULL, 0, NULL, NULL, '2018-10-04 20:30:55', '2018-10-04 20:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `kost_tempat`
--

CREATE TABLE `kost_tempat` (
  `id` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` char(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_percetakan`
--

CREATE TABLE `layanan_percetakan` (
  `id` int(11) NOT NULL,
  `id_layanan` char(2) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('011d8deec182dc51502e757353b23df8bad0cb76ea3f1a5aa23ed633e8a6ce81e5c74e68c730d01e', 3, 1, 'nApp', '[]', 0, '2018-05-18 06:14:36', '2018-05-18 06:14:36', '2019-05-18 13:14:36'),
('036b7599f2939418c83c3bfebdee5ab5bf56dd0c14f0b8339b3d13696b8c3075ad0ad8f1e1b27555', 3, 1, 'nApp', '[]', 0, '2018-05-19 07:57:20', '2018-05-19 07:57:20', '2019-05-19 14:57:20'),
('0814363bc66a48b524a3c1198673d5b8033c09677c700d5ff487166f9af092019a72316acbe203d6', 3, 1, 'nApp', '[]', 0, '2018-05-11 16:02:11', '2018-05-11 16:02:11', '2019-05-11 23:02:11'),
('09c678c862d8422388fc85802bdb691a432fe36d7cec426ef35ca1d63f5ad83283a977b96c515cd6', 3, 1, 'nApp', '[]', 0, '2018-04-28 15:44:22', '2018-04-28 15:44:22', '2019-04-28 22:44:22'),
('14222d788183a8e382169da902060fe7a8a03037aec0f86f66ec77ccca259ac32cce5c6b59eedd5e', 3, 1, 'nApp', '[]', 0, '2018-05-05 20:33:07', '2018-05-05 20:33:07', '2019-05-06 03:33:07'),
('1536e396836f02b318e2adcce3f1b4719204fb0f5376467096403ba5c8f0a93f30b15902edf70538', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:39:38', '2018-05-04 23:39:38', '2019-05-05 06:39:38'),
('15ba6e75e24bb45d9bb7d279e5120f6e5350b4f516d7a2d6122d076d345907e7fe1f99af24533083', 3, 1, 'nApp', '[]', 0, '2018-05-17 07:51:20', '2018-05-17 07:51:20', '2019-05-17 14:51:20'),
('171a05f65eb4bcf2fe07b17b19be0df98314e1eeffad99454dc0c2c7e801c7f74a3b79429c3f2e5c', 3, 1, 'nApp', '[]', 0, '2018-05-19 07:58:27', '2018-05-19 07:58:27', '2019-05-19 14:58:27'),
('1d507b5d4bcde644512deb8d53a0e5911dfb14c279bc818a5258aa843fdfda7800645766a843bfd9', 42, 1, 'nApp', '[]', 0, '2018-07-11 21:14:47', '2018-07-11 21:14:47', '2019-07-12 04:14:47'),
('2bf8171a5f853b3a74a8c61c38bbf342c71cd82c9f0ce3f96851d6bf4ac03c92255498daca469990', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:36', '2018-04-28 15:40:36', '2019-04-28 22:40:36'),
('2cee9d57a81545672d876416a053e676c99f112218420191e81223c67d3d86b387dbcc74d68fc2bf', 41, 1, 'nApp', '[]', 0, '2018-07-11 20:49:48', '2018-07-11 20:49:48', '2019-07-12 03:49:48'),
('2f4a02ce0625b912344c2dde77c6e9ec51f295fb44a926cd59f9a7c55172d1d4392f6773653c9fb7', 3, 1, 'nApp', '[]', 0, '2018-07-03 06:00:12', '2018-07-03 06:00:12', '2019-07-03 13:00:12'),
('3159d4c0a051624849074be6412c243902a6df4676ca68b6dc3ffec5395ac1d1e6160f942a1b1f10', 2, 1, 'nApp', '[]', 0, '2018-07-11 20:37:54', '2018-07-11 20:37:54', '2019-07-12 03:37:54'),
('35d6a5042c390f1a2cacd985d747a748d2f5641c7190f12abc15532b212bc7efcc0e12389a23013b', 3, 1, 'nApp', '[]', 0, '2018-05-05 20:15:33', '2018-05-05 20:15:33', '2019-05-06 03:15:33'),
('3898563966650b3bcc90a5e222c1fffc931fe9f723de3a10ac28fbfb80ccce9f115de85cd7cef3e0', 1, 1, 'nApp', '[]', 0, '2018-04-28 08:25:20', '2018-04-28 08:25:20', '2019-04-28 15:25:20'),
('39bf28b3b57c163a3f4e665fb70b025d7f0fe496be3ba364676d96cc400e8f453ce8c1fa022fa428', 3, 1, 'nApp', '[]', 0, '2018-05-19 18:52:50', '2018-05-19 18:52:50', '2019-05-20 01:52:50'),
('3a7c04f739413499dca39c8089feb909daad4e01d5011a5a45010a245d3d49d1dc32308013b0439d', 3, 1, 'nApp', '[]', 0, '2018-04-28 15:47:36', '2018-04-28 15:47:36', '2019-04-28 22:47:36'),
('4a0d1487495642c6e513f6284216a24bdf31a0a5507d1b6775f2e7576d39f6a85e77636b68de698c', 3, 1, 'nApp', '[]', 0, '2018-05-05 20:19:39', '2018-05-05 20:19:39', '2019-05-06 03:19:39'),
('4c6eb6a376ed837bffec60f37fcb06782b101a17b3b79fb71d74159c6713d8b078e19885e1bd3762', 3, 1, 'nApp', '[]', 0, '2018-05-19 18:53:53', '2018-05-19 18:53:53', '2019-05-20 01:53:53'),
('4d88ab51c7f403f4b7ceef88ccedd89111b8d45288c15faaf02e7029947f52a67ddf544b77738a95', 3, 1, 'nApp', '[]', 0, '2018-05-24 14:39:10', '2018-05-24 14:39:10', '2019-05-24 21:39:10'),
('4db8989271783b32f531b9d61fa54a0151e58154f069fa4b7f2ac8492f4e8f5585ff0f3258912d00', 3, 1, 'nApp', '[]', 0, '2018-05-05 00:10:58', '2018-05-05 00:10:58', '2019-05-05 07:10:58'),
('50fbdeff03531bbef2d69ded480ec1e81a81b8ec59c9f5208687bd9a660c9192cc975acc9eba3d5a', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:34', '2018-04-28 15:40:34', '2019-04-28 22:40:34'),
('545e87a6bb00197430cea3e0fe26e8d645944319ebe90d391d23737523a6ee858a1325cc39f7c9b6', 3, 1, 'nApp', '[]', 0, '2018-07-03 06:04:58', '2018-07-03 06:04:58', '2019-07-03 13:04:58'),
('5736bbec11e0e654e2fc54bf167b64a2b2896d6fcf158c4056fbc56ec57fba74f0219c300d095930', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:45:58', '2018-05-04 23:45:58', '2019-05-05 06:45:58'),
('57c0d0bc35eb8f7fdd42f25f6b5223ccd7d17120f3f4cd2182b35b33e09ae2ecee996697a4979861', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:36:30', '2018-05-04 23:36:30', '2019-05-05 06:36:30'),
('5b54374580db2c8bc8ae2219cce81f3d8acc27f9317d602c07b629983be46b5d2cd0e5e2bc5cdb02', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:45:42', '2018-05-04 23:45:42', '2019-05-05 06:45:42'),
('5e535cda0fc498433331a509524a8638bd285c3867ed1e1303a6ececda5202a8cf34b88d9dec65a0', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:37:44', '2018-05-04 23:37:44', '2019-05-05 06:37:44'),
('5e680a7273eedda39fdcebfb68b7aebcbc49d1bdf9f8279a68da644fe642e43941e7d8b042eab5c9', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:52:20', '2018-05-04 23:52:20', '2019-05-05 06:52:20'),
('625039f77b55692cf223907e2f632f2505b05fafeee1f4796e66c6c0d20d9954f739b6d874dc0dc2', 3, 1, 'nApp', '[]', 0, '2018-05-06 01:29:41', '2018-05-06 01:29:41', '2019-05-06 08:29:41'),
('669c2e5850a91e9657e0430ea8758c470d25e770c678dd8aff7c4ac2303f90369fbafd23bdcc7a05', 3, 1, 'nApp', '[]', 0, '2018-07-06 07:33:49', '2018-07-06 07:33:49', '2019-07-06 14:33:49'),
('6733480621f5476e8041ffa21fc8febfe7a2a7a60224336f63fe0b2abe3170d79aa100dce15febbd', 3, 1, 'nApp', '[]', 0, '2018-05-11 16:10:15', '2018-05-11 16:10:15', '2019-05-11 23:10:15'),
('684bd453e0da19d5c73c7e58f0776e9d1dbcf5e24dece0f7b74f450204ed063d2de98f8f19f19dcf', 40, 1, 'nApp', '[]', 0, '2018-07-11 20:45:27', '2018-07-11 20:45:27', '2019-07-12 03:45:27'),
('6aac168d74011a911b93d954e333dff814b39fa14c401ca47aa92ed79fbf2bb3c5845e62d9c9630a', 3, 1, 'nApp', '[]', 0, '2018-05-19 07:27:34', '2018-05-19 07:27:34', '2019-05-19 14:27:34'),
('6b25cce7c9716de6f52f5966ba4e8f2579e8056686df81dfa4ac1077aff3f3382306bc0e69f67883', 3, 1, 'nApp', '[]', 0, '2018-05-06 01:53:32', '2018-05-06 01:53:32', '2019-05-06 08:53:32'),
('6dfabd2b4109efe6f0bb710274b3371fe82f47f11629900b1b9407505c2bfc14bc01ce3357439e35', 3, 1, 'nApp', '[]', 0, '2018-04-28 15:44:26', '2018-04-28 15:44:26', '2019-04-28 22:44:26'),
('73a1e6930fd1b6b3c476d641c76a8ccbaf822437906bb4f4a09e078fe4d069b0928428282ae20692', 32, 1, 'nApp', '[]', 0, '2018-06-02 06:34:21', '2018-06-02 06:34:21', '2019-06-02 13:34:21'),
('75d6b1ec727cdc3a469ca8a4dc3f03c0ca279b5ed8616f25488143961319e473734882748da619f9', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:46:06', '2018-05-04 23:46:06', '2019-05-05 06:46:06'),
('7b82c99cf66a879bc16a4411e24458787a8a6955303a972ffb28aed98a6f6f75bbaab355934afe10', 3, 1, 'nApp', '[]', 0, '2018-05-24 15:23:27', '2018-05-24 15:23:27', '2019-05-24 22:23:27'),
('7e560e4e2686f511268229960b4c239656803bfd0bd7d773452abe276d754e303dc912883d05319c', 3, 1, 'nApp', '[]', 0, '2018-05-17 09:04:34', '2018-05-17 09:04:34', '2019-05-17 16:04:34'),
('7e8c4b82358a0d9c2b3a489f927c89abeb825c75b7f62eece94d1985e7788a12d43696f039a281c6', 3, 1, 'nApp', '[]', 0, '2018-05-25 08:24:40', '2018-05-25 08:24:40', '2019-05-25 15:24:40'),
('81475890cd3871236a829214da7af1af3d0de226a26193001b50c1c45d7907f37fe625f4c3e46c31', 3, 1, 'nApp', '[]', 0, '2018-07-11 20:38:23', '2018-07-11 20:38:23', '2019-07-12 03:38:23'),
('827cdb4783f0ea6610916da32025deafa95b8a496cfd0a5ac81856319d0b94d1170ab6d327634a5e', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:37', '2018-04-28 15:40:37', '2019-04-28 22:40:37'),
('874b35a671ffe65add89413b4e95f9177a35db9f70e77ad42be0cd44293d8edfed5b788943aebf80', 3, 1, 'nApp', '[]', 0, '2018-07-11 00:13:52', '2018-07-11 00:13:52', '2019-07-11 07:13:52'),
('89d585c5cac639bc156299d7a7d35d676fc4b4e08d28956bddf35bc8b3b945a21d9fbb479e44c1c9', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:30', '2018-04-28 15:40:30', '2019-04-28 22:40:30'),
('94f776a31f32dd649e2f53368868741995531081ad4593deeb045ea61997ec11827900b05d9171f7', 3, 1, 'nApp', '[]', 0, '2018-05-05 00:12:12', '2018-05-05 00:12:12', '2019-05-05 07:12:12'),
('95ff16f6a6633759d89c4023117c57d9170fe13146a9562c50e91e1296baaeff07579c8d12cc3045', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:45:42', '2018-05-04 23:45:42', '2019-05-05 06:45:42'),
('96ba9e4aec2ebb9c54f0ad0b438198414ba1dfc4af52f9a9dd5404c41402e1bc604ce0ed4eb951db', 39, 1, 'nApp', '[]', 0, '2018-07-06 07:40:40', '2018-07-06 07:40:40', '2019-07-06 14:40:40'),
('9c5548a16e599fe164b6ac8c86c16a35c193bd03e38603a1aa352ace1e626d63bfb28b7078293fac', 3, 1, 'nApp', '[]', 0, '2018-05-18 06:16:33', '2018-05-18 06:16:33', '2019-05-18 13:16:33'),
('a08d5eab91d9cd8052b7fbe84e1b034cf7b9f6b0cfda43bea4002ef39c6f8ae7ed58ce9138e6eeb1', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:32', '2018-04-28 15:40:32', '2019-04-28 22:40:32'),
('a0a5d911066af99e4be15c02a5dc1ea950b5fa611e8126e754a2bf9476f5c72593a5b8627ed2f174', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:57:14', '2018-05-04 23:57:14', '2019-05-05 06:57:14'),
('a6c931aa2902ae2567dd463108a6a148d6bbe91baa71726ed44b019ec414717e1bffd05bb80f6ca0', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:44:58', '2018-05-04 23:44:58', '2019-05-05 06:44:58'),
('abc602a11066cb358cbef56e7f4528011c8cebfd213e01651e1dd6cef289d88627d4d1bfd1208b6d', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:45:32', '2018-05-04 23:45:32', '2019-05-05 06:45:32'),
('addb3b25c9403b2a6728b61dcfb3cdf68c219d4a7b73549014c0ef8cb6a2760faf7f945c06ed833e', 3, 1, 'nApp', '[]', 0, '2018-07-11 00:14:25', '2018-07-11 00:14:25', '2019-07-11 07:14:25'),
('b3265d8b9f491d155459ad53bee635a3fc982db1ce13a3a2bc4b6d4a432152a98ed8c4634497755a', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:52:14', '2018-05-04 23:52:14', '2019-05-05 06:52:14'),
('b7ab206850273d63a782130c525f52fdfe27f5c0c25235d627ce43958805243f7be4e4fa1089762b', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:58:03', '2018-05-04 23:58:03', '2019-05-05 06:58:03'),
('bda501190eabfb4ac49e13f0071a55a7b9479d17d44c94c1d4546e7a6167102faea1d845bd09fac1', 3, 1, 'nApp', '[]', 0, '2018-05-22 19:15:56', '2018-05-22 19:15:56', '2019-05-23 02:15:56'),
('c01a8df7e55a4d6747311acad6d4380e98b6417ca7aaf71eef0413e728b0a58d3e73f9e95911a47a', 3, 1, 'nApp', '[]', 0, '2018-05-05 20:19:38', '2018-05-05 20:19:38', '2019-05-06 03:19:38'),
('c7f099b3983f0afee49e081967d5e460cd5296752ba957f36b74ff1815dac8d9fedef0463963153e', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:57:26', '2018-05-04 23:57:26', '2019-05-05 06:57:26'),
('cec27f198819b91968c7b8f7d497d382800c4086bbd39c1f38c66a713a6e206ab9cac4f9150b9aec', 3, 1, 'nApp', '[]', 0, '2018-05-18 06:17:08', '2018-05-18 06:17:08', '2019-05-18 13:17:08'),
('cfaba40cc1d18be2c672cdb8e084c807627d765dc3d3dfe75a02db87f59442de0e01598a0bf021d7', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:39:21', '2018-04-28 15:39:21', '2019-04-28 22:39:21'),
('d5c8df2984cebbaa28f0b2d69d22d823eca0c763e34208c6e992bad8c72e85694d17ef5f6d594a9c', 3, 1, 'nApp', '[]', 0, '2018-05-06 03:26:10', '2018-05-06 03:26:10', '2019-05-06 10:26:10'),
('d85b23aa0176b5bf9e843f4cb801c10f85cd06cb5042b84840e0b6ba2f68df91f7c177b1750cff20', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:58:02', '2018-05-04 23:58:02', '2019-05-05 06:58:02'),
('d950ef7edcd272ad6d3bd46061acdeb99cc577ef87595f1472659c1861553766a9f7eeb376eb193a', 3, 1, 'nApp', '[]', 0, '2018-05-12 06:17:44', '2018-05-12 06:17:44', '2019-05-12 13:17:44'),
('de8b14b69568d0b363cf7e4ddeee11c2497a0387c0c2a5da72418df5392b604c87ad806a5238368d', 3, 1, 'nApp', '[]', 0, '2018-05-18 06:01:22', '2018-05-18 06:01:22', '2019-05-18 13:01:22'),
('e0b2b23c9f6c8b8e635e7345bed93a23d89ddbe16fc08575505a7fed15e51d5b724efc382ad77a69', 3, 1, 'nApp', '[]', 0, '2018-05-05 20:09:39', '2018-05-05 20:09:39', '2019-05-06 03:09:39'),
('e13810ea0de45fb485cd5460a09cca16ef9bd6f7074b4449f4731e105c732d2c3ba01802fa17172d', 3, 1, 'nApp', '[]', 0, '2018-05-19 07:38:30', '2018-05-19 07:38:30', '2019-05-19 14:38:30'),
('e5701b297ee06694455967cb9738f69ac50463200e707527d6b304f0e752a7652f05c65ce661a536', 3, 1, 'nApp', '[]', 0, '2018-06-02 04:35:46', '2018-06-02 04:35:46', '2019-06-02 11:35:46'),
('e6c9345643e618a118a0356368e3db71ec995eaeaa40c7cb5b4aea12b320998894e66b81ddf0491d', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:39:58', '2018-05-04 23:39:58', '2019-05-05 06:39:58'),
('e6d834af95aa048272ad12475897df69dad524c98c06563526d8627193ea2d2eea0f54d4d61ac95f', 3, 1, 'nApp', '[]', 0, '2018-05-06 05:24:26', '2018-05-06 05:24:26', '2019-05-06 12:24:26'),
('e7b8a13030fc360581d6961da1667576bf7b3e2c0bc8535fd7e6d222413935ff8a009997eb1477ee', 6, 1, 'nApp', '[]', 0, '2018-04-28 15:40:32', '2018-04-28 15:40:32', '2019-04-28 22:40:32'),
('eff6a7bee8b608e4ff37bbca602cb01649c353d40adc5a22fed761ec72913b20280600b7e7e0fde3', 3, 1, 'nApp', '[]', 0, '2018-04-28 15:38:47', '2018-04-28 15:38:47', '2019-04-28 22:38:47'),
('f26ae13431d117c650ea0209c48485bd780cc02165a2d80d09188188775d1fa2f76e9490de71e8f0', 3, 1, 'nApp', '[]', 0, '2018-05-17 09:13:37', '2018-05-17 09:13:37', '2019-05-17 16:13:37'),
('f52560194620a7a12a7f5274998e7ee271ad5ae57026ce5303f2c20aeffdf6fa1803e5e6f2b00d0f', 3, 1, 'nApp', '[]', 0, '2018-05-17 09:10:45', '2018-05-17 09:10:45', '2019-05-17 16:10:45'),
('f55ac7717ee2c0d85bf1c1ad9058d83d06a1ba756a9532bb5f33fc2220e69ac804f9c513a5e0ba47', 43, 1, 'nApp', '[]', 0, '2018-07-11 21:18:50', '2018-07-11 21:18:50', '2019-07-12 04:18:50'),
('f7fb45a071be548ab6c3ce08cee7c899b29499f60f4b9e1298a571243ada8022c9b13f621a9935a2', 3, 1, 'nApp', '[]', 0, '2018-06-02 06:16:09', '2018-06-02 06:16:09', '2019-06-02 13:16:09'),
('f8959fa2a544a86da134bd6dc07d08ef0b56a4cf10b7afb98d55092ddad6cf82726872f8c7a64a58', 3, 1, 'nApp', '[]', 0, '2018-05-04 23:45:09', '2018-05-04 23:45:09', '2019-05-05 06:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'z324jFxuBKiD0371bo2OgB36tmZWVSLxLODwKEkA', 'http://localhost', 1, 0, 0, '2018-04-28 08:15:29', '2018-04-28 08:15:29'),
(2, NULL, 'Laravel Password Grant Client', 'dqQBEvtJ64MFMiAXa4JGCUTIyyEAieiG8Cs0UpSH', 'http://localhost', 0, 1, 0, '2018-04-28 08:15:29', '2018-04-28 08:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-28 08:15:29', '2018-04-28 08:15:29');

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
-- Table structure for table `percetakan`
--

CREATE TABLE `percetakan` (
  `id` char(36) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_pos` int(5) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `waktu_buka` time DEFAULT NULL,
  `waktu_tutup` time DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `percetakan_foto`
--

CREATE TABLE `percetakan_foto` (
  `id` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `konfirmasi` tinyint(1) NOT NULL DEFAULT '0',
  `api_token` text COLLATE utf8_unicode_ci,
  `kode_konfirmasi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `foto`, `username`, `password`, `is_blocked`, `konfirmasi`, `api_token`, `kode_konfirmasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Niko Rahmadi Wiharto', 'nikorahmadiwiharto@gmail.com', '', 'nikorahmadi', '$2y$10$rtqW9Nj3OoJUeCLNvUB3FOelDSrVfhEBzls1j4ZVQPKr3La1ersaO', 0, 0, 'nikorahmadi52518dd37a66c25be702d7e4770d39abe88e343a', '$2y$10$26tzYrVxhzbeAIlyP8jOjuaFBsPe3jfVyctahMpqNaZ29wr3T76Oi', NULL, '2017-01-18 21:25:42', '2018-08-19 16:28:01'),
(3, 'Niki Rahmadi Wiharto', 'nikirahmadiwiharto@gmail.com', 'image-profil/2017/12//1514637996.jpg', 'nikirahmadi', '$2y$10$rtqW9Nj3OoJUeCLNvUB3FOelDSrVfhEBzls1j4ZVQPKr3La1ersaO', 0, 1, 'nikirahmadif6a62155d765ca15fd43d2e0f473233391f7d10d', NULL, 'zilYGxOlruIjtIMFJKeYd9I0G5fa6d2wBwob8PLnsFLS5fJYSlkCCr170LtM', '2017-02-13 17:01:11', '2018-10-04 20:22:21'),
(4, 'tri setiawan', 'trionelonel@gmail.com', '', 'trionel', '$2y$10$yvchOFMr9AeA8tmj5lSz/upndsYLs5dFP/iXGwzei6U5Pif2gKN8.', 0, 1, NULL, NULL, NULL, '2017-02-28 22:50:43', '2017-02-28 22:52:04'),
(5, 'Noverina Rahmaniyanti', 'nrahmaniyanti@gmail.com', '', 'Rahmaniy', '$2y$10$g9Cv2EvAUWbqIBjhpb980OBTJ5uAgDps5h51CGBlTUY1R6qwW/PcW', 0, 1, NULL, NULL, NULL, '2017-04-10 09:18:05', '2017-04-10 09:25:00'),
(6, 'CSPRO UNILA', 'cspro.unila@gmail.com', '', 'csprounila', '$2y$10$D28M5NTy3gGCWr1i5cQbf.z5Up9xCmh0yX9u6hUvHkXkw1kyIhkUq', 0, 1, NULL, NULL, NULL, '2017-05-15 16:19:01', '2017-05-15 16:20:01'),
(7, 'Amrullah Subekti', 'amrullah167@gmail.com', '', 'aammion', '$2y$10$AslnpzsSdRDDsEKcFe9Bl.g4kGDGnawwWpmLWH5vpAHS8abaWxA9u', 0, 1, NULL, NULL, NULL, '2017-05-18 07:28:50', '2017-05-18 07:29:42'),
(8, 'Rico', 'ricopramuka@gmail.com', '', 'ricopramuka', '$2y$10$gLNi8RvAYbk09xaUUtVhPe23lwjiqbZGBUPp41Nyd1yp0wiD.QwwS', 0, 0, NULL, '$2y$10$BUHtuZAdz/VjMT7cxx632OrUllKhLHQ5kdMurHX0nLbgkcMozud0i', NULL, '2017-05-18 08:44:37', '2017-05-18 08:44:37'),
(9, 'Feri Krisnanto', 'ferrykrisnanto312@gmail.com', '', 'ferryk', '$2y$10$pTFqxcBuJOLngoFUKtJOWuyxAX5Sb6fySisnAbnU1aX3Jaec1hD0.', 0, 1, NULL, NULL, NULL, '2017-05-20 04:44:39', '2017-05-22 04:12:09'),
(10, 'Jhondy', 'jhondy5187@gmail.com', 'image-profil/2017/05//1495860085.jpg', 'KostBangJhon', '$2y$10$2zZl41h2weXxj0MILpxQJuUlVo7nevXIzJ.baam40sUfcyALdPSYC', 0, 1, NULL, NULL, 'bYJBhkFiZMreoXOtimQJIXffkeRzOzC86bFFpRW5zFbRVd4J5mA37Yot22R7', '2017-05-26 21:20:25', '2017-05-26 21:41:25'),
(11, 'Sandy Irvanda', 'sandyirvanda@gmail.com', '', 'sandyirvanda', '$2y$10$6ZDw7C1tURAcyZ/xMn13luE6ar86dagARTUxAtZcrjK3qYIO.R2tO', 0, 1, NULL, NULL, NULL, '2017-05-26 23:57:12', '2017-05-26 23:58:54'),
(12, 'Faiz Azmi Rekatama', 'faizkort@gmail.com', 'image-profil/2017/05//1495964783.jpg', 'faizrekatama', '$2y$10$tfBM433sKTVHHTtz38sx/e4lf8vkU9ofO/5PlnB7DmBiVJuOTbhoe', 0, 1, NULL, NULL, 'WNUsiTs6g091xFkjfdr1AQXEoJ3XZ1qg2XW4jOwVJFchWbFEI6y9fEECbQAG', '2017-05-28 02:40:27', '2017-05-28 02:46:49'),
(13, 'Lutfi virliansah', 'lvirlian@gmail.com', '', 'Lvirlian', '$2y$10$eI.7q5asDw9n2I5UeziCQue57BvtdqMGQqyIxCoFRksbgDWYjE8.C', 0, 1, NULL, NULL, NULL, '2017-05-28 17:17:12', '2017-05-28 17:17:57'),
(14, 'gilang wahyu', 'gilangwahyuk5@gmail.com', '', 'gilangwk', '$2y$10$7Yux2zv1wKtgl.HhCP.4auW8K8V.1A6tuy.mwIC2/Q6fiZ1vTz97a', 0, 1, NULL, NULL, 't4HUGe6iNLaPqUkcaTE2GatlhNkhfbayGbVxUvZ3i3FAmnTquTsaov8jcfY5', '2017-05-30 04:34:17', '2017-07-19 01:58:26'),
(16, 'test', 'test@test.test', '', 'testaja', '$2y$10$SlFO/5iq4y.K8XbnkhSweeWWrOTjMBzIzV8HQp91ycxHkttMkUKYC', 0, 0, NULL, '$2y$10$38d24iVvxWVWZ.wikTAm9OkucbvgVspSxxadoAAhjJH5SMswTnycm', NULL, '2017-12-17 15:09:30', '2017-12-17 15:09:30'),
(22, 'Niki Rahmadi Wiharto', 'guvoricubq@hitbts.com', '', 'guvoricubq', '$2y$10$Pefg9EH1SxTC67kmjbPOgeVYF0dioG20Ft5.o.F/rYpLGWPDaEs.e', 0, 0, NULL, '$2y$10$1qWZ/GL6.ifIYIqyNd6GMOIsDefEyQKz6pnHJuIr95.3YVbEBJDvm', NULL, '2017-12-30 07:28:47', '2017-12-30 07:28:47'),
(32, 'Nestiawan', 'bekano@loketa.com', NULL, 'nestiawan', '$2y$10$Hb2XtzSogNTOYbIwNTRvWOTl.on6ts38E/B3gdybKMoOm.5MkJr06', 0, 1, NULL, NULL, NULL, '2018-06-02 06:30:26', '2018-06-02 06:34:06'),
(33, 'Nestiawan', 'asdasd@o3enzyme.com', NULL, 'nestiawansa', '$2y$10$.s/Q8I29RrBO0HBudbmXeOnddOGG2IaMdVl8rY4VgxQpfMA6FkRPa', 0, 0, NULL, '$2y$10$9cpdT5UtJ0kwY8HffWzb/uy98byYOVKtFn3PUqZBF/3zXLeTivPt2', NULL, '2018-06-06 07:38:25', '2018-06-06 07:38:25'),
(34, 'Gilang', 'gilang@gmail.com', NULL, 'gilang', '$2y$10$nP3OdTrgxF.K6BZ7NxHJQ.NrTruSiVTW6UZXYvi7DPPdUYFiDSCOi', 0, 0, NULL, '$2y$10$LAVlBbhnRDDyO3.SPdve4ubBbJsTCM93BhPGLNzGkXst2KWkFG3YO', NULL, '2018-07-03 06:00:34', '2018-07-03 06:00:34'),
(35, 'Nestiawan', 'bekano2@loketa.com', NULL, 'nestiawans2', '$2y$10$pUxHUubDOZqQUNJ6d4YLX.rd955jIBFnHHAW4B618l4.pXtQNSANO', 0, 0, NULL, '$2y$10$GBwOkA2kEFdbTPL2E7Ikie/0riIqNi8BxwLkzn5kHBDL9eMoDM19e', NULL, '2018-07-03 06:04:14', '2018-07-03 06:04:14'),
(36, 'Nestiawan', 'bekano3@loketa.com', NULL, 'nestiawans3', '$2y$10$tFg..UZgKc62Imb5l61ep.ewvy23oL7YUrhVzBpgWNP.dluHG9waS', 0, 0, NULL, '$2y$10$oec1u17A1i7KTbD.oi1ECeFwKLGQ7elQZFw7bWppzl.O7rzZhK78G', NULL, '2018-07-04 17:31:08', '2018-07-04 17:31:08'),
(37, 'Nestiawan', 'bekano4@loketa.com', NULL, 'nestiawans4', '$2y$10$AGd9Z3CrujraBxEL/ycveOnyJzb9ozZlhYcTK2p//Qlgb43c/HbUG', 0, 0, NULL, '$2y$10$NA0q70H74MTPZmXPFVPKDua21SkJKPsFgGzUXbSOWgsOKu9owcJNm', NULL, '2018-07-06 07:33:40', '2018-07-06 07:33:40'),
(38, 'Nestiawan', 'bekano5@loketa.com', NULL, 'nestiawans5', '$2y$10$xx18M9WP2tAIgX1.OBmKFuws6nPnandJ.gKE5mDSzoPpvCNLFBzBG', 0, 1, NULL, NULL, NULL, '2018-07-06 07:35:30', '2018-07-06 07:35:30'),
(39, 'Coba Aja', 'cobaaja@gmail.com', NULL, 'cobaaja1', '$2y$10$tgOZetYddRVh6mvWk9wESOLbdNxePbRmE9j2YO1Yb.lXkIy5Kts/6', 0, 1, NULL, NULL, NULL, '2018-07-06 07:40:08', '2018-07-06 07:40:08'),
(40, 'Nestiawan', 'bekano6@loketa.com', NULL, 'nestiawans6', '$2y$10$Sx3kUG2EQsYdVOSTsKBtYuh/1B.OJ1QfPgGOKJAd5PGo7dYIhD.F6', 0, 1, NULL, NULL, NULL, '2018-07-11 20:45:27', '2018-07-11 20:45:27'),
(41, 'Anjuuu', 'anjuin@gmail.com', NULL, 'anjuin', '$2y$10$FjSs0ivhKYzyFaIIRo3S8.VbWaP73oMDI4MSUXEMrCq1hQhSrQ3wa', 0, 1, NULL, NULL, NULL, '2018-07-11 20:49:48', '2018-07-11 20:49:48'),
(42, 'Nestiawan', 'bekano7@loketa.com', NULL, NULL, '$2y$10$hsnOlxiuY4fgzRuvmjX4QOUg3t.zAAdzawtKadlFtEP.07ha4a.v2', 0, 1, NULL, NULL, NULL, '2018-07-11 21:14:47', '2018-07-11 21:14:47'),
(44, 'Nestiawan', 'bekandso6@loketa.com', NULL, 'nesdstiawans6', '$2y$10$L0lHf58Pv3rVfxouppiHjupET3kj.NH7.vu.EagcCUucfOJqdGXDm', 0, 1, NULL, NULL, NULL, '2018-08-03 22:13:07', '2018-08-03 22:13:07'),
(45, 'Nestiawan', 'bekandsso6@loketa.com', NULL, 'nesdstisawans6', '$2y$10$gkNFlWQnTvMLAzPeHjFk1.xFnj6LIlH0YKxz7uw6v3tgCCQ.q/oTK', 0, 1, 'nesdstisawans671a625698e0f41d4f9383e4c87f1a273deaf11c6', NULL, NULL, '2018-08-03 22:14:18', '2018-08-03 22:14:18'),
(46, 'Nestiawan', 'bekandsso6s@loketa.com', NULL, 'nesdstisawans6s', '$2y$10$Uudhibcsnxn6Q0MsXpDuQuezJFDdaBnmIl3smpLaCMMYBHZbxAOAS', 0, 1, 'nesdstisawans6s4b5e0487e61f0f2fa7ce2ad5b0f91d09210c2857', NULL, NULL, '2018-08-03 22:14:35', '2018-08-03 22:14:35'),
(47, 'Nikirahmadi', 'nikirahmadiwihartoo@gmail.com', NULL, 'niirahmadi', '$2y$10$hN1do7/m.VF9x3GLcltHQuoGSxDtwlswvdrfb8zfISILMEzUslSB6', 0, 1, 'niirahmadif7371e22908593564900d0d91643b0fd9e127c5c', NULL, NULL, '2018-09-23 15:15:32', '2018-09-23 15:15:32'),
(48, 'Hyper Teknologi', 'hyperteknologi@gmail.com', NULL, 'hypert', '$2y$10$n8OnpA/yGyLlLK8h9oHHh.PfEQQA.IzbEOnZFX.pNs2Xgp0zpMqtq', 0, 1, 'b083ca526ad78da084e37ab5731f416f12e8a581', NULL, NULL, '2018-09-23 15:16:14', '2018-09-23 15:16:14');

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
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chat_room` (`id_chat_room`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD KEY `id_chat_room` (`id_chat_room`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kost` (`id_kost`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `fasilitas_kategori`
--
ALTER TABLE `fasilitas_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kost`
--
ALTER TABLE `fasilitas_kost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kost` (`id_kost`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fotos_id_kost_foreign` (`id_kost`);

--
-- Indexes for table `jenis_hunian`
--
ALTER TABLE `jenis_hunian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_listrik`
--
ALTER TABLE `jenis_listrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kosts`
--
ALTER TABLE `kosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kosts_seotitle_unique` (`seoTitle`),
  ADD KEY `kosts_user_id_foreign` (`user_id`),
  ADD KEY `kosts_seotitle_index` (`seoTitle`),
  ADD KEY `id_jenis_listrik` (`id_jenis_listrik`),
  ADD KEY `id_jenis_hunian` (`id_jenis_hunian`);

--
-- Indexes for table `kost_tempat`
--
ALTER TABLE `kost_tempat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_percetakan`
--
ALTER TABLE `layanan_percetakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_percetakan` (`id_percetakan`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `percetakan`
--
ALTER TABLE `percetakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `percetakan_foto`
--
ALTER TABLE `percetakan_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_percetakan` (`id_percetakan`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas_kategori`
--
ALTER TABLE `fasilitas_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fasilitas_kost`
--
ALTER TABLE `fasilitas_kost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jenis_hunian`
--
ALTER TABLE `jenis_hunian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_listrik`
--
ALTER TABLE `jenis_listrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kosts`
--
ALTER TABLE `kosts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `kost_tempat`
--
ALTER TABLE `kost_tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan_percetakan`
--
ALTER TABLE `layanan_percetakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `percetakan_foto`
--
ALTER TABLE `percetakan_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `fasilitas_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas_kost`
--
ALTER TABLE `fasilitas_kost`
  ADD CONSTRAINT `fasilitas_kost_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
