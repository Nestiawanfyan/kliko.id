-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 07:40 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostbdl`
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
-- Table structure for table `fasilitas_kamar_mandi`
--

CREATE TABLE `fasilitas_kamar_mandi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fasilitas_kamar_mandi`
--

INSERT INTO `fasilitas_kamar_mandi` (`id`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ember Mandi', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(2, 'Bak Mandi', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(3, 'K. Mandi Dalam', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(4, 'K. Mandi Luar', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(5, 'Kloset Duduk', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46');

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

--
-- Dumping data for table `fasilitas_khusus`
--

INSERT INTO `fasilitas_khusus` (`id`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kasur', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(2, 'Kursi', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(3, 'Almari Pakaian', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(4, 'Meja Belajar', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(5, 'TV', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(6, 'AC', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46');

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

--
-- Dumping data for table `fasilitas_lingkungan`
--

INSERT INTO `fasilitas_lingkungan` (`id`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rumah Makan', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(2, 'Mall', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(3, 'Apotik', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(4, 'Klinik', NULL, '2017-01-15 15:32:46', '2017-01-15 15:32:46'),
(5, 'Sekolah Kampus', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47');

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

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dapur', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(2, 'Musholla', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(3, 'TV', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(4, 'Parkir', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(5, 'Security', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47');

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
(47, 29, 'image-kost/2018/01/1a416e267865bd601e2479ac12167ad7b1df030d.png', '2018-01-02 16:26:31', '2018-01-02 16:26:31');

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
  `alamatPemilik` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `namaKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamatKost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posKost` int(11) DEFAULT NULL,
  `telpKost` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `luasKamar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlahKamar` int(11) NOT NULL,
  `kamarKosong` int(11) NOT NULL,
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

--
-- Dumping data for table `kosts`
--

INSERT INTO `kosts` (`id`, `user_id`, `seoTitle`, `namaPemilik`, `telpPemilik`, `alamatPemilik`, `namaKost`, `alamatKost`, `posKost`, `telpKost`, `luasKamar`, `jumlahKamar`, `kamarKosong`, `penghuni`, `latitude`, `longitude`, `sewaMin`, `sewaHari`, `sewaMinggu`, `sewaBulan`, `sewaTahun`, `fKhusus`, `fUmum`, `fLingkungan`, `fKamarMandi`, `catatan`, `konfirmasi`, `kode_konfirmasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 3, 'kost-belakang-unila-2', 'Ayu', '082177149192', 'jl. bumi manti 3, no 72, kampung baru, kedaton', 'Kost Belakang UNILA', 'jl. bumi manti 3, no 72, kampung baru, kedaton', NULL, '', '3x4', 6, 0, 'Putra', -5.360555144157296, 105.24482677258607, 1, 0, 0, 400000, 0, '', '', '', '', 'kostan gandeng dengan warung, jadi kalau mau beli apa2 mudah tinggal beli di ibu kost\r\nkost insyaalloh aman', 1, NULL, NULL, '2017-05-16 07:15:44', '2017-05-19 18:08:26'),
(10, 3, 'wisma-srisendono', 'Supriyanto', '08080808', 'Jalan Arabika No. 002, Rajabasa, Bandar Lampung', 'Wisma Srisendono', 'Jalan Arabika No. 002, Rajabasa, Bandar Lampung', NULL, '', '4x4', 40, 0, 'Campur', -5.371735264963359, 105.23609716850888, 1, 0, 0, 0, 3750000, '', 'Listrik', '', '', 'Wisma dekat dengan kampus (Unila, UMITRA)\nLokasi juga dekat dengan terminal Rajabasa, Robinson\nAda warung\nSuasana kondusif', 1, NULL, NULL, '2017-05-16 08:08:18', '2017-05-16 08:27:57'),
(11, 3, 'vita-kost', 'Jun', '082185516007', 'Jl. Nunyai, No. 16A, Rajabasa, Bandar Lampung', 'Vita Kost', 'Jl. Nunyai, No. 16A, Rajabasa, Bandar Lampung', NULL, '', '4x3', 19, 0, 'Campur', -5.370009118053852, 105.2337305178603, 1, 0, 0, 600000, 6000000, '', '', 'Pom Bensin', '', 'Halaman depan luas, lokasi dekat dengan sarana umum, lingkungan kondusif', 1, NULL, NULL, '2017-05-16 08:55:09', '2017-05-17 06:35:08'),
(12, 3, 'wisma-rizky', 'Hi  Nurdin', '081379325624', 'Jl. Bumi Manti 1 Gang Madinah 2 No. 5, RT 02, RW 01, Kampung Baru, Bandar Lampung', 'Wisma Rizky', 'Jl. Bumi Manti 1 Gang Madinah 2 No. 5, RT 02, RW 01, Kampung Baru, Bandar Lampung', NULL, '', '3x3', 34, 0, 'Putri', -5.364235522229077, 105.24938405372404, 1, 0, 0, 0, 3000000, 'Springbed', '', '', '', 'Ada 2 lantai\nListrik belum termasuk', 1, NULL, NULL, '2017-05-16 09:19:20', '2017-05-16 09:23:31'),
(13, 3, 'kost-ceria', 'Pak Nuh', '085279308463', 'Jalan Siworatu, No. 3, Kel. Gedung Meneng, Rajabasa, Bandar Lampung', 'Kost Ceria', 'Jalan Siworatu, No. 3, Kel. Gedung Meneng, Rajabasa, Bandar Lampung', NULL, '', '3x4', 10, 0, 'Putra', -5.370968730171625, 105.24541121454149, 1, 0, 200000, 500000, 5000000, 'Dapur, Kamar Mandi', 'Air', '', '', 'Jarak ke Universitas Lampung 2 menit,\r\nParkiran Luas, untuk mobil juga cukup,\r\nKosan tingkat 2,\r\nAir sudah ada dan lancar,\r\nLingkungan kondusif,\r\nJauh dari kendaraan lewat', 1, NULL, NULL, '2017-05-16 22:27:34', '2017-05-16 22:27:34'),
(14, 3, 'kost-daerah-gang-ratu', 'Masri', '08978909675', 'Jalan Purnawirawan Gg. Anggrek, No. 1A Kedaton, Bandar Lampung', 'Kost Daerah Gang Ratu', 'Jalan Purnawirawan Gg. Anggrek, No. 1A Kedaton, Bandar Lampung', NULL, '', '4x3', 21, 0, 'Putri', -5.3783816515789855, 105.24603073621518, 1, 0, 0, 500000, 5000000, '', '', '', '', '', 1, NULL, NULL, '2017-05-17 06:09:25', '2017-05-17 06:09:25'),
(15, 3, 'kosan-kantin-pokwe', 'Satria Bangsawan', '082175265510', '', 'Kosan Kantin Pokwe', 'Jalan Bumi Manti 2, Kampung Baru Rajabasa, Belakang Fakultas Teknik Unila', NULL, '', '3x6', 7, 0, 'Putri', -5.362882121792809, 105.2452003802872, 1, 0, 0, 0, 4000000, '', '', '', '', '', 1, NULL, NULL, '2017-05-17 06:14:59', '2017-05-19 18:36:13'),
(16, 3, 'kos-ijo', 'Yulita Idris', '085768323545', 'Jalan Kopi Ujung No. 46, Gedung Meneng, Rajabasa', 'Kos Ijo', 'Jalan Kopi Ujung No. 46, Gedung Meneng, Rajabasa', 0, '', '4x3', 10, 0, 'Putri', -5.375701909705807, 105.23801396168824, 1, 0, 0, 0, 3750000, 'Dipan', 'WiFi, Sumur Bor', '', '', '', 1, NULL, NULL, '2017-05-19 08:30:55', '2017-06-26 08:27:07'),
(20, 3, 'kos-bunga-mayang', 'Silvy', '085658750057', 'Jalan Bumi Manti 2, Samping Rumah Makan Council, Kampung Baru', 'Kos Bunga Mayang', 'Jalan Bumi Manti 2, Samping Rumah Makan Council, Kampung Baru', NULL, '', '4x3', 20, 0, 'Putra', -5.364637738772269, 105.24952551904903, 1, 0, 0, 0, 3500000, '', '', '', '', 'Harga per tahun ada yang Rp. 3.500.000, Rp. 4.000.000, Rp. 7.000.000', 1, NULL, NULL, '2017-05-21 23:38:48', '2017-05-21 23:38:48'),
(21, 9, 'kos-ferry', 'Sundari', '081379792492', 'Jl. Imam Bonjol Gg. Damai, No. 15, Sumber Rejo, Kemiling, Bandar Lampung', 'Kos Ferry', 'Jl. Imam Bonjol Gg. Damai, No. 15, Sumber Rejo, Kemiling, Bandar Lampung', NULL, '', '4x4', 2, 0, 'Campur', -5.389199595892895, 105.20509352479257, 1, 0, 0, 250000, 0, '', '', '', '', '', 1, NULL, NULL, '2017-05-22 04:19:36', '2017-05-22 04:19:36'),
(22, 10, 'kost-bang-jhon', 'Jhondy', '081368058182', 'Perum Villa Citra Blok G1-1H', 'Kost Bang Jhon', 'Jl. Badak No 20A Kedaton ', NULL, '081368058182', '3x3', 15, 0, 'Putra', -5.395967329320117, 105.26004562653657, 1, 125000, 400000, 1000000, 0, 'Kamar Mandi Dalam (Shower)', 'Ruang Tamu', '', 'Kamar Mandi Shower', 'Kosan saya berada di \r\nJalan Badak No 20A Kedaton\r\nmasuk dari depan makam pahlawan, sampng toko cahaya keramik.\r\nkurang lbh 50m sebelah kanan sebelum simpang empat pertama.\r\n\r\nRumah Warna Putih List Kuning (Beda Sendiri)\r\n\r\nBangunan Baru di Renov.\r\n\r\nSuasana Kost yang Nyaman dan Bersih\r\nTidak Bising dari suara Jalan Raya\r\n\r\nAkses untuk ke jalan besar juga sangat dekat\r\nmudah untuk mencari Makanan, krn banyak yang jual makanan.\r\nmau jalan ke Mall atau pun Rumah Sakit juga sangat dekat.', 1, NULL, NULL, '2017-05-26 22:20:07', '2017-05-26 22:26:22'),
(24, 13, 'kost-putri-aghoy', 'Lutfi Virliansah', '087770491287', 'Jln Cengkeh gg sumur kucing no.2 dari depan', 'Kost Putri Aghoy', 'Jln Cengkeh gg sumur kucing no.2 dari depan', NULL, '087770491287', '3x3', 12, 0, 'Putri', -5.3777921886254605, 105.23995788200068, 1, 0, 0, 450000, 5400000, 'Kaca rias', '', '', 'Shower, ', 'Kost Putri berlokasi dekat dengan Umitra, UNILA, MM UBL, Sekolah Araihan,Sekolah Global Surya. Bangunan baru dekat masjid', 1, NULL, NULL, '2017-05-28 17:26:29', '2017-05-28 17:26:29'),
(26, 14, 'kamar-kost-lantai-2-1', 'gilang wahyu', '082180205235', 'jl onta gg angsa 1 no 16 kedaton bdl', 'kamar kost lantai dua', 'jl onta gg angsa 1 no 16 kedaton bdl', 35147, '082180205236', '4x2', 1, 1, 'Campur', -5.3971396, 105.2667887, 1, 0, 0, 850000, 0, 'Jemuran kecil', '', 'pasar', '', 'letak kamar kos di lantai 2 , luas 4,5x2,5 m. lingkungan dekat dgn masjid. fasilitas tv, kasur utk 2-3 org, kipas angin, kamar mandi , dan musola hub no tlp. tidak melayani WA. terimakasih...', 1, NULL, NULL, '2017-05-31 19:32:31', '2017-07-19 01:55:53'),
(27, 3, 'kosan-residen-c03', 'Sianturi', '081369520331', 'Jl. Bumi Manti 3 Perumahan Kampus Hijau Residen blok C 03, kelurahan', 'Kosan Residen C03', 'Jl. Bumi Manti 3 Perumahan Kampus Hijau Residen blok C 03, kelurahan', 0, '', '4x3', 20, 0, 'Putri', -5.3971396, 105.2667887, 1, 0, 0, 0, 4500000, '', 'Sofa, Kulkas, Kompor', '', '', '', 1, NULL, NULL, '2017-06-02 09:26:45', '2017-06-26 08:09:27'),
(28, 3, 'tes', 'tes', '123321', 'tes', 'tes', 'res', 25132, '085783104873', '4x4', 4, 4, 'Putra', -5.3971396, 105.2667887, 1, 5000, 0, 0, 0, '', '', '', '', '', 1, NULL, NULL, '2018-01-01 00:46:28', '2018-01-01 00:46:28'),
(29, 3, 'kost-kembar', 'Niki Rahmadi Wiharto', '085783104873', 'Jl. Imam Bonjol Gg. Durian', 'Kost Kembar', 'Jl. Imam Bonjol Gg. Durian', 35365, '085783104873', '5x4', 5, 5, 'Putra', -5.396797799215723, 105.25816271580811, 1, 50000, 150000, 500000, 4000000, '', '', '', '', '', 1, NULL, NULL, '2018-01-02 16:26:31', '2018-01-02 16:26:31');

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

--
-- Dumping data for table `kost_fk`
--

INSERT INTO `kost_fk` (`id`, `id_kost`, `id_fk`, `created_at`, `updated_at`) VALUES
(17, 8, 1, NULL, NULL),
(18, 8, 2, NULL, NULL),
(19, 8, 3, NULL, NULL),
(20, 8, 4, NULL, NULL),
(27, 10, 1, NULL, NULL),
(28, 10, 3, NULL, NULL),
(29, 10, 4, NULL, NULL),
(34, 11, 1, NULL, NULL),
(35, 11, 2, NULL, NULL),
(36, 11, 3, NULL, NULL),
(37, 11, 4, NULL, NULL),
(40, 12, 3, NULL, NULL),
(41, 12, 4, NULL, NULL),
(42, 13, 1, NULL, NULL),
(43, 13, 2, NULL, NULL),
(44, 13, 3, NULL, NULL),
(45, 13, 4, NULL, NULL),
(46, 14, 1, NULL, NULL),
(47, 14, 2, NULL, NULL),
(48, 14, 3, NULL, NULL),
(49, 14, 4, NULL, NULL),
(50, 15, 1, NULL, NULL),
(51, 15, 3, NULL, NULL),
(52, 15, 4, NULL, NULL),
(56, 16, 1, NULL, NULL),
(57, 16, 2, NULL, NULL),
(58, 16, 4, NULL, NULL),
(59, 20, 1, NULL, NULL),
(60, 20, 3, NULL, NULL),
(61, 20, 4, NULL, NULL),
(62, 22, 1, NULL, NULL),
(63, 22, 3, NULL, NULL),
(64, 22, 5, NULL, NULL),
(65, 22, 6, NULL, NULL),
(70, 24, 1, NULL, NULL),
(71, 24, 3, NULL, NULL),
(72, 24, 4, NULL, NULL),
(89, 27, 1, NULL, NULL),
(90, 27, 3, NULL, NULL),
(91, 27, 4, NULL, NULL),
(96, 26, 1, NULL, NULL),
(97, 26, 5, NULL, NULL),
(98, 28, 1, NULL, NULL),
(99, 28, 4, NULL, NULL);

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

--
-- Dumping data for table `kost_fkm`
--

INSERT INTO `kost_fkm` (`id`, `id_kost`, `id_fkm`, `created_at`, `updated_at`) VALUES
(5, 8, 4, NULL, NULL),
(12, 10, 1, NULL, NULL),
(13, 10, 2, NULL, NULL),
(14, 10, 4, NULL, NULL),
(16, 11, 3, NULL, NULL),
(18, 12, 3, NULL, NULL),
(19, 13, 1, NULL, NULL),
(20, 13, 3, NULL, NULL),
(21, 14, 3, NULL, NULL),
(22, 15, 3, NULL, NULL),
(23, 16, 3, NULL, NULL),
(24, 20, 3, NULL, NULL),
(25, 21, 3, NULL, NULL),
(26, 22, 1, NULL, NULL),
(27, 22, 3, NULL, NULL),
(29, 24, 4, NULL, NULL),
(46, 27, 3, NULL, NULL),
(51, 26, 1, NULL, NULL),
(52, 26, 3, NULL, NULL);

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

--
-- Dumping data for table `kost_fl`
--

INSERT INTO `kost_fl` (`id`, `id_kost`, `id_fl`, `created_at`, `updated_at`) VALUES
(1, 10, 1, NULL, NULL),
(2, 10, 2, NULL, NULL),
(3, 10, 5, NULL, NULL),
(7, 11, 1, NULL, NULL),
(8, 11, 2, NULL, NULL),
(9, 11, 5, NULL, NULL),
(11, 12, 5, NULL, NULL),
(12, 13, 1, NULL, NULL),
(13, 13, 2, NULL, NULL),
(14, 13, 5, NULL, NULL),
(15, 14, 1, NULL, NULL),
(16, 14, 5, NULL, NULL),
(17, 15, 1, NULL, NULL),
(18, 15, 2, NULL, NULL),
(19, 15, 5, NULL, NULL),
(23, 16, 1, NULL, NULL),
(24, 16, 2, NULL, NULL),
(25, 16, 5, NULL, NULL),
(26, 20, 1, NULL, NULL),
(27, 20, 5, NULL, NULL),
(28, 22, 1, NULL, NULL),
(29, 22, 2, NULL, NULL),
(30, 22, 3, NULL, NULL),
(31, 22, 4, NULL, NULL),
(32, 22, 5, NULL, NULL),
(36, 24, 1, NULL, NULL),
(37, 24, 3, NULL, NULL),
(38, 24, 4, NULL, NULL),
(39, 24, 5, NULL, NULL),
(64, 26, 1, NULL, NULL),
(65, 26, 2, NULL, NULL),
(66, 26, 3, NULL, NULL),
(67, 26, 4, NULL, NULL);

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

--
-- Dumping data for table `kost_fu`
--

INSERT INTO `kost_fu` (`id`, `id_kost`, `id_fu`, `created_at`, `updated_at`) VALUES
(3, 8, 4, NULL, NULL),
(6, 11, 4, NULL, NULL),
(7, 11, 5, NULL, NULL),
(8, 14, 4, NULL, NULL),
(9, 15, 4, NULL, NULL),
(11, 16, 4, NULL, NULL),
(16, 20, 4, NULL, NULL),
(17, 22, 1, NULL, NULL),
(18, 22, 4, NULL, NULL),
(23, 24, 1, NULL, NULL),
(24, 24, 2, NULL, NULL),
(25, 24, 4, NULL, NULL),
(42, 27, 3, NULL, NULL),
(47, 26, 2, NULL, NULL),
(48, 26, 4, NULL, NULL);

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

--
-- Dumping data for table `kost_parkir`
--

INSERT INTO `kost_parkir` (`id`, `id_kost`, `id_parkir`, `created_at`, `updated_at`) VALUES
(5, 8, 2, NULL, NULL),
(10, 10, 2, NULL, NULL),
(11, 10, 3, NULL, NULL),
(13, 11, 2, NULL, NULL),
(15, 12, 2, NULL, NULL),
(16, 13, 1, NULL, NULL),
(17, 13, 2, NULL, NULL),
(18, 13, 3, NULL, NULL),
(19, 14, 2, NULL, NULL),
(20, 14, 3, NULL, NULL),
(21, 15, 2, NULL, NULL),
(22, 15, 3, NULL, NULL),
(24, 16, 2, NULL, NULL),
(26, 20, 2, NULL, NULL),
(27, 20, 3, NULL, NULL),
(28, 21, 2, NULL, NULL),
(29, 22, 1, NULL, NULL),
(30, 22, 2, NULL, NULL),
(34, 24, 2, NULL, NULL),
(35, 24, 3, NULL, NULL),
(60, 27, 2, NULL, NULL),
(61, 27, 3, NULL, NULL),
(68, 26, 1, NULL, NULL),
(69, 26, 2, NULL, NULL),
(70, 26, 3, NULL, NULL);

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

--
-- Dumping data for table `parkirs`
--

INSERT INTO `parkirs` (`id`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mobil', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(2, 'Motor', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47'),
(3, 'Sepeda', NULL, '2017-01-15 15:32:47', '2017-01-15 15:32:47');

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
(2, 'Niko Rahmadi Wiharto', 'nikorahmadiwiharto@gmail.com', '', 'nikorahmadi', '$2y$10$Clinrv0yyL5tK1uy4KvaReK7nmtbjNahUVyRhZnawubJi2suconLe', 0, '$2y$10$26tzYrVxhzbeAIlyP8jOjuaFBsPe3jfVyctahMpqNaZ29wr3T76Oi', NULL, '2017-01-18 21:25:42', '2017-01-18 21:25:42'),
(3, 'Niki Rahmadi Wiharto', 'nikirahmadiwiharto@gmail.com', 'image-profil/2017/12//1514637996.jpg', 'nikirahmadi', '$2y$10$rtqW9Nj3OoJUeCLNvUB3FOelDSrVfhEBzls1j4ZVQPKr3La1ersaO', 1, NULL, 'zilYGxOlruIjtIMFJKeYd9I0G5fa6d2wBwob8PLnsFLS5fJYSlkCCr170LtM', '2017-02-13 17:01:11', '2018-01-01 23:05:34'),
(4, 'tri setiawan', 'trionelonel@gmail.com', '', 'trionel', '$2y$10$yvchOFMr9AeA8tmj5lSz/upndsYLs5dFP/iXGwzei6U5Pif2gKN8.', 1, NULL, NULL, '2017-02-28 22:50:43', '2017-02-28 22:52:04'),
(5, 'Noverina Rahmaniyanti', 'nrahmaniyanti@gmail.com', '', 'Rahmaniy', '$2y$10$g9Cv2EvAUWbqIBjhpb980OBTJ5uAgDps5h51CGBlTUY1R6qwW/PcW', 1, NULL, NULL, '2017-04-10 09:18:05', '2017-04-10 09:25:00'),
(6, 'CSPRO UNILA', 'cspro.unila@gmail.com', '', 'csprounila', '$2y$10$D28M5NTy3gGCWr1i5cQbf.z5Up9xCmh0yX9u6hUvHkXkw1kyIhkUq', 1, NULL, NULL, '2017-05-15 16:19:01', '2017-05-15 16:20:01'),
(7, 'Amrullah Subekti', 'amrullah167@gmail.com', '', 'aammion', '$2y$10$AslnpzsSdRDDsEKcFe9Bl.g4kGDGnawwWpmLWH5vpAHS8abaWxA9u', 1, NULL, NULL, '2017-05-18 07:28:50', '2017-05-18 07:29:42'),
(8, 'Rico', 'ricopramuka@gmail.com', '', 'ricopramuka', '$2y$10$gLNi8RvAYbk09xaUUtVhPe23lwjiqbZGBUPp41Nyd1yp0wiD.QwwS', 0, '$2y$10$BUHtuZAdz/VjMT7cxx632OrUllKhLHQ5kdMurHX0nLbgkcMozud0i', NULL, '2017-05-18 08:44:37', '2017-05-18 08:44:37'),
(9, 'Feri Krisnanto', 'ferrykrisnanto312@gmail.com', '', 'ferryk', '$2y$10$pTFqxcBuJOLngoFUKtJOWuyxAX5Sb6fySisnAbnU1aX3Jaec1hD0.', 1, NULL, NULL, '2017-05-20 04:44:39', '2017-05-22 04:12:09'),
(10, 'Jhondy', 'jhondy5187@gmail.com', 'image-profil/2017/05//1495860085.jpg', 'KostBangJhon', '$2y$10$2zZl41h2weXxj0MILpxQJuUlVo7nevXIzJ.baam40sUfcyALdPSYC', 1, NULL, 'bYJBhkFiZMreoXOtimQJIXffkeRzOzC86bFFpRW5zFbRVd4J5mA37Yot22R7', '2017-05-26 21:20:25', '2017-05-26 21:41:25'),
(11, 'Sandy Irvanda', 'sandyirvanda@gmail.com', '', 'sandyirvanda', '$2y$10$6ZDw7C1tURAcyZ/xMn13luE6ar86dagARTUxAtZcrjK3qYIO.R2tO', 1, NULL, NULL, '2017-05-26 23:57:12', '2017-05-26 23:58:54'),
(12, 'Faiz Azmi Rekatama', 'faizkort@gmail.com', 'image-profil/2017/05//1495964783.jpg', 'faizrekatama', '$2y$10$tfBM433sKTVHHTtz38sx/e4lf8vkU9ofO/5PlnB7DmBiVJuOTbhoe', 1, NULL, 'WNUsiTs6g091xFkjfdr1AQXEoJ3XZ1qg2XW4jOwVJFchWbFEI6y9fEECbQAG', '2017-05-28 02:40:27', '2017-05-28 02:46:49'),
(13, 'Lutfi virliansah', 'lvirlian@gmail.com', '', 'Lvirlian', '$2y$10$eI.7q5asDw9n2I5UeziCQue57BvtdqMGQqyIxCoFRksbgDWYjE8.C', 1, NULL, NULL, '2017-05-28 17:17:12', '2017-05-28 17:17:57'),
(14, 'gilang wahyu', 'gilangwahyuk5@gmail.com', '', 'gilangwk', '$2y$10$7Yux2zv1wKtgl.HhCP.4auW8K8V.1A6tuy.mwIC2/Q6fiZ1vTz97a', 1, NULL, 't4HUGe6iNLaPqUkcaTE2GatlhNkhfbayGbVxUvZ3i3FAmnTquTsaov8jcfY5', '2017-05-30 04:34:17', '2017-07-19 01:58:26'),
(15, 'Nestiawan', 'p.nestiawan@gmail.com', '', 'nestiawan', '$2y$10$oPNWWXKRASVWYXZuTa3uzOFCrVbVKa7PK6ZGMzEo/VhIk1xwWMY2G', 1, NULL, NULL, '2017-06-05 21:48:17', '2017-06-05 21:49:03'),
(16, 'test', 'test@test.test', '', 'testaja', '$2y$10$SlFO/5iq4y.K8XbnkhSweeWWrOTjMBzIzV8HQp91ycxHkttMkUKYC', 0, '$2y$10$38d24iVvxWVWZ.wikTAm9OkucbvgVspSxxadoAAhjJH5SMswTnycm', NULL, '2017-12-17 15:09:30', '2017-12-17 15:09:30'),
(22, 'Niki Rahmadi Wiharto', 'guvoricubq@hitbts.com', '', 'guvoricubq', '$2y$10$Pefg9EH1SxTC67kmjbPOgeVYF0dioG20Ft5.o.F/rYpLGWPDaEs.e', 0, '$2y$10$1qWZ/GL6.ifIYIqyNd6GMOIsDefEyQKz6pnHJuIr95.3YVbEBJDvm', NULL, '2017-12-30 07:28:47', '2017-12-30 07:28:47');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fasilitas_kamar_mandi`
--
ALTER TABLE `fasilitas_kamar_mandi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fasilitas_khusus`
--
ALTER TABLE `fasilitas_khusus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fasilitas_lingkungan`
--
ALTER TABLE `fasilitas_lingkungan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `kosts`
--
ALTER TABLE `kosts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kost_fk`
--
ALTER TABLE `kost_fk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `kost_fkm`
--
ALTER TABLE `kost_fkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `kost_fl`
--
ALTER TABLE `kost_fl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `kost_fu`
--
ALTER TABLE `kost_fu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `kost_parkir`
--
ALTER TABLE `kost_parkir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `parkirs`
--
ALTER TABLE `parkirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
