-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2020 at 04:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cf`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`id`, `tenban`, `created_at`, `updated_at`) VALUES
(1, 'bàn 1', '2020-01-03 14:41:47', '2020-01-03 14:41:47'),
(2, 'bàn 2', '2020-01-03 14:42:16', '2020-01-03 14:42:16'),
(3, 'bàn 3', '2020-01-03 14:42:30', '2020-01-03 14:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `id` int(10) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `giatien` int(11) NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `id_douong` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthd`
--

INSERT INTO `cthd` (`id`, `soluong`, `giatien`, `id_hoadon`, `id_douong`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 1, 2, '2020-01-03 14:48:35', '2020-01-03 14:48:35'),
(2, 2, 240000, 1, 1, '2020-01-03 14:48:35', '2020-01-03 14:48:35'),
(3, 1, 120000, 2, 1, '2020-01-03 14:49:10', '2020-01-03 14:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL,
  `tenkhongdau` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `tenkhongdau`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê', 'Ca-phe', NULL, NULL),
(2, 'Thức uống đá xay', 'Thuc-uong-da-xay', NULL, NULL),
(3, 'Socola', 'Socola', NULL, NULL),
(4, 'Trà trái cây', 'Tra-trai-cay', NULL, NULL),
(5, 'Nước ép trái cây', 'nuoc-ep-trai-cay', '2020-01-03 14:40:42', '2020-01-03 14:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `douong`
--

CREATE TABLE `douong` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tenkhongdau` varchar(255) DEFAULT NULL,
  `giatien` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `douong`
--

INSERT INTO `douong` (`id`, `ten`, `tenkhongdau`, `giatien`, `anh`, `mota`, `id_danhmuc`, `created_at`, `updated_at`) VALUES
(1, 'Nước ép trái cây', 'nuoc-ep-trai-cay', 120000, 'hq1X-U4ar-1.png', '<p>zsdfs&agrave;f</p>', 1, '2020-01-03 14:45:00', '2020-01-03 14:45:00'),
(2, 'Nước ép trái cây 1', 'nuoc-ep-trai-cay-1', 10000, 'JZYv-U4ar-1.png', '<p>nước tinh tr&ugrave;ng</p>', 5, '2020-01-03 14:45:53', '2020-01-03 14:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id_ban` int(10) UNSIGNED NOT NULL,
  `tiendo` varchar(255) DEFAULT '1',
  `ghichu` text DEFAULT NULL,
  `goitieptan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `tongtien`, `id_ban`, `tiendo`, `ghichu`, `goitieptan`, `created_at`, `updated_at`) VALUES
(1, 250000, 1, 'Đã thanh toán', 'làm nhanh nha con', NULL, '2020-01-03 14:48:35', '2020-01-03 14:54:15'),
(2, 120000, 1, 'Đã thanh toán', 'làm nhanh nha con', NULL, '2020-01-03 14:49:10', '2020-01-03 14:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `makhuyenmai` varchar(255) NOT NULL,
  `giatien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_12_094816_create_ban', 1),
(4, '2018_12_12_094928_create_danhmuc', 1),
(5, '2018_12_12_095135_create_khuyenmai', 1),
(6, '2018_12_12_095742_create_douong', 1),
(7, '2018_12_12_095807_create_hoadon', 1),
(8, '2018_12_12_095830_create_nhanvien', 1),
(9, '2018_12_12_103237_create_cthd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `cmnd` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `diachi` text DEFAULT NULL,
  `ngayvaolam` date NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten`, `ngaysinh`, `gioitinh`, `cmnd`, `sdt`, `diachi`, `ngayvaolam`, `chucvu`, `id_users`, `created_at`, `updated_at`) VALUES
(1, 'ten', '2020-01-21', 'hcm', '123213213', '1478523690', 'kkjj', '2020-01-08', 'admin', 1, NULL, '2020-01-03 15:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `taikhoan` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `chucvu` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `taikhoan`, `chucvu`, `email_verified_at`, `password`, `quyen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$ToTTlMXCsuIu2vT3jo7LTuyZPS10sF9uZZ.0Ev6PGpR1KL0vXk2na', 'admin', 's3UCFkx63MoPAmWtYyWu1I4VIDojpygdORXMlK83tq1QI6vFR5lbbU0hwkGw', NULL, NULL),
(2, 'admin1', '2', NULL, '$2y$10$2pfQo12TuDEFXUzDo09xS.x5tO5wa9niqZirU7tEEAeccqcPi.L42', 'nhanvien', NULL, NULL, NULL),
(3, 'admin2', '3', NULL, '$2y$10$xKvqRolFOLScNL75ox.ZYeMuKHzbclnMaJgO78SD.3eCejIeQ3U5.', 'nhanvien', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ban_tenban_unique` (`tenban`);

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cthd_id_hoadon_foreign` (`id_hoadon`),
  ADD KEY `cthd_id_douong_foreign` (`id_douong`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `douong`
--
ALTER TABLE `douong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `douong_ten_unique` (`ten`),
  ADD KEY `douong_id_danhmuc_foreign` (`id_danhmuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id_ban_foreign` (`id_ban`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khuyenmai_makhuyenmai_unique` (`makhuyenmai`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhanvien_cmnd_unique` (`cmnd`),
  ADD KEY `nhanvien_id_users_foreign` (`id_users`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_taikhoan_index` (`taikhoan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_taikhoan_unique` (`taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cthd`
--
ALTER TABLE `cthd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `douong`
--
ALTER TABLE `douong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_id_douong_foreign` FOREIGN KEY (`id_douong`) REFERENCES `douong` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cthd_id_hoadon_foreign` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `douong`
--
ALTER TABLE `douong`
  ADD CONSTRAINT `douong_id_danhmuc_foreign` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_id_ban_foreign` FOREIGN KEY (`id_ban`) REFERENCES `ban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
