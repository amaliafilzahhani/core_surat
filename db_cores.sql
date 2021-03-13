-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 04:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cores`
--

-- --------------------------------------------------------

--
-- Table structure for table `conf_level`
--

CREATE TABLE `conf_level` (
  `id_level` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `conf_level`
--

INSERT INTO `conf_level` (`id_level`, `name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `conf_menu`
--

CREATE TABLE `conf_menu` (
  `id_menu` int(10) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `icon2` varchar(150) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `akses` tinyint(1) NOT NULL,
  `sub` tinyint(1) NOT NULL,
  `level` text NOT NULL,
  `position` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `conf_menu`
--

INSERT INTO `conf_menu` (`id_menu`, `icon`, `icon2`, `name`, `link`, `status`, `akses`, `sub`, `level`, `position`) VALUES
(1, 'fa-desktop', '', 'Dashboard', 'home', 1, 1, 1, '\"1\",\"2\"', 1),
(2, 'fa-cogs', NULL, 'Configuration', 'admin/gen_modul', 1, 1, 1, '\"1\",\"2\"', 3),
(7, 'fa-envelope', NULL, 'Surat', 'admin/surat', 1, 1, 1, '\"1\",\"2\"', 2);

-- --------------------------------------------------------

--
-- Table structure for table `conf_submenu`
--

CREATE TABLE `conf_submenu` (
  `id_submenu` int(5) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `icon2` varchar(150) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` text NOT NULL,
  `position` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `conf_users`
--

CREATE TABLE `conf_users` (
  `id_user` int(10) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(15) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `conf_users`
--

INSERT INTO `conf_users` (`id_user`, `fullname`, `avatar`, `username`, `password`, `salt`, `level`, `last_login`, `ip_address`, `status`) VALUES
(1, 'Superadmin', 'img/avatar/6U6lk2At.jpg', 'admin', '89a0c6ee2ad740022ce185004dd64cca98c04b51', 'Wb8e.?s5', 1, '2021-03-08 09:58:37', '::1', 1),
(2, 'Ardi', '', 'ardi', '00cc677ebf28c2788351082fe42ccc8982437a9c', '+qt_a0Wy', 1, '0000-00-00 00:00:00', '', 1),
(3, 'Security MSS', '', 'usermss', '1173924d5a9f16d77969734b271c888a4ddeb641', 'QOOCQTpE', 3, '2021-02-02 12:47:57', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(11) NOT NULL,
  `srt_kode` varchar(20) NOT NULL,
  `srt_name` varchar(50) NOT NULL,
  `srt_tgl` date NOT NULL,
  `srt_jenis` varchar(20) NOT NULL,
  `srt_desk` varchar(100) NOT NULL,
  `srt_insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `srt_kode`, `srt_name`, `srt_tgl`, `srt_jenis`, `srt_desk`, `srt_insert_date`) VALUES
(5, '72789', 'Cuti', '2021-03-05', 'Pribadi', 'Surat cuti atas nama Salsa telah disetujui', '0000-00-00 00:00:00'),
(6, '72790', 'Tanda tangan', '2021-03-03', 'Rahasia', 'Surat tanda tangan untuk Bapak Neil', '2021-03-05 04:29:11'),
(7, '72791', 'Surat Izin', '2021-03-05', 'Perorangan', 'Surat cuti atas nama budi', '2021-03-05 11:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `temp_login`
--

CREATE TABLE `temp_login` (
  `id_temp` int(10) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_login`
--

INSERT INTO `temp_login` (`id_temp`, `id_user`, `tanggal`, `ip_address`, `nama_user`) VALUES
(1, 1, '2021-01-29 12:48:50', '127.0.0.1', 'Superadmin'),
(2, 1, '2021-01-29 13:47:12', '::1', 'Superadmin'),
(3, 1, '2021-01-29 14:07:01', '127.0.0.1', 'Superadmin'),
(4, 1, '2021-01-29 14:08:04', '127.0.0.1', 'Superadmin'),
(5, 1, '2021-01-29 14:16:31', '127.0.0.1', 'Superadmin'),
(6, 1, '2021-01-29 15:29:47', '127.0.0.1', 'Superadmin'),
(7, 1, '2021-01-30 07:18:36', '127.0.0.1', 'Superadmin'),
(8, 1, '2021-01-30 07:29:20', '127.0.0.1', 'Superadmin'),
(9, 1, '2021-01-30 08:43:16', '127.0.0.1', 'Superadmin'),
(10, 1, '2021-01-30 08:43:27', '127.0.0.1', 'Superadmin'),
(11, 1, '2021-01-30 10:09:41', '127.0.0.1', 'Superadmin'),
(12, 1, '2021-01-30 12:12:29', '127.0.0.1', 'Superadmin'),
(13, 1, '2021-01-30 13:48:45', '127.0.0.1', 'Superadmin'),
(14, 1, '2021-02-01 07:03:25', '127.0.0.1', 'Superadmin'),
(15, 1, '2021-02-01 16:05:34', '127.0.0.1', 'Superadmin'),
(16, 1, '2021-02-02 06:59:54', '127.0.0.1', 'Superadmin'),
(17, 3, '2021-02-02 08:32:42', '127.0.0.1', 'Security MSS'),
(18, 1, '2021-02-02 08:33:04', '127.0.0.1', 'Superadmin'),
(19, 3, '2021-02-02 08:33:36', '127.0.0.1', 'Security MSS'),
(20, 1, '2021-02-02 08:35:41', '127.0.0.1', 'Superadmin'),
(21, 3, '2021-02-02 08:35:52', '127.0.0.1', 'Security MSS'),
(22, 3, '2021-02-02 12:47:57', '127.0.0.1', 'Security MSS'),
(23, 1, '2021-02-02 13:20:40', '127.0.0.1', 'Superadmin'),
(24, 1, '2021-02-02 15:50:59', '127.0.0.1', 'Superadmin'),
(25, 1, '2021-02-03 07:00:49', '127.0.0.1', 'Superadmin'),
(26, 1, '2021-02-03 09:02:21', '127.0.0.1', 'Superadmin'),
(27, 1, '2021-02-03 12:17:04', '127.0.0.1', 'Superadmin'),
(28, 1, '2021-02-03 12:32:03', '127.0.0.1', 'Superadmin'),
(29, 1, '2021-02-03 14:58:15', '127.0.0.1', 'Superadmin'),
(30, 1, '2021-02-04 07:11:03', '127.0.0.1', 'Superadmin'),
(31, 1, '2021-02-04 12:17:49', '127.0.0.1', 'Superadmin'),
(32, 1, '2021-02-05 07:05:42', '127.0.0.1', 'Superadmin'),
(33, 1, '2021-02-05 07:16:20', '127.0.0.1', 'Superadmin'),
(34, 1, '2021-02-05 12:14:22', '127.0.0.1', 'Superadmin'),
(35, 1, '2021-02-05 15:00:27', '127.0.0.1', 'Superadmin'),
(36, 1, '2021-02-05 15:32:07', '192.168.0.102', 'Superadmin'),
(37, 1, '2021-02-05 15:39:54', '192.168.0.102', 'Superadmin'),
(38, 1, '2021-02-06 07:23:15', '127.0.0.1', 'Superadmin'),
(39, 1, '2021-02-06 12:13:15', '127.0.0.1', 'Superadmin'),
(40, 1, '2021-02-09 07:11:24', '127.0.0.1', 'Superadmin'),
(41, 1, '2021-02-10 15:11:12', '127.0.0.1', 'Superadmin'),
(42, 1, '2021-02-17 13:29:50', '127.0.0.1', 'Superadmin'),
(43, 1, '2021-02-18 06:49:50', '127.0.0.1', 'Superadmin'),
(44, 1, '2021-02-18 09:10:29', '127.0.0.1', 'Superadmin'),
(45, 1, '2021-02-18 12:16:07', '127.0.0.1', 'Superadmin'),
(46, 1, '2021-02-20 14:30:20', '127.0.0.1', 'Superadmin'),
(47, 1, '2021-02-20 14:54:51', '127.0.0.1', 'Superadmin'),
(48, 1, '2021-02-20 15:20:48', '127.0.0.1', 'Superadmin'),
(49, 1, '2021-02-20 15:29:19', '127.0.0.1', 'Superadmin'),
(50, 1, '2021-02-22 08:06:08', '127.0.0.1', 'Superadmin'),
(51, 1, '2021-02-22 09:36:26', '127.0.0.1', 'Superadmin'),
(52, 1, '2021-02-23 14:07:09', '127.0.0.1', 'Superadmin'),
(53, 1, '2021-02-24 06:55:36', '127.0.0.1', 'Superadmin'),
(54, 1, '2021-02-26 07:43:41', '127.0.0.1', 'Superadmin'),
(55, 1, '2021-03-01 10:28:05', '127.0.0.1', 'Superadmin'),
(56, 1, '2021-03-02 13:11:04', '127.0.0.1', 'Superadmin'),
(57, 1, '2021-03-02 14:32:45', '127.0.0.1', 'Superadmin'),
(58, 1, '2021-03-03 06:43:18', '127.0.0.1', 'Superadmin'),
(59, 1, '2021-03-03 07:59:54', '127.0.0.1', 'Superadmin'),
(60, 1, '2021-03-03 13:12:26', '127.0.0.1', 'Superadmin'),
(61, 1, '2021-03-04 06:45:52', '127.0.0.1', 'Superadmin'),
(62, 1, '2021-03-04 08:00:41', '188.88.3.131', 'Superadmin'),
(63, 1, '2021-03-04 12:52:05', '127.0.0.1', 'Superadmin'),
(64, 1, '2021-03-04 21:36:31', '::1', 'Superadmin'),
(65, 1, '2021-03-05 06:29:53', '::1', 'Superadmin'),
(66, 1, '2021-03-05 08:20:31', '::1', 'Superadmin'),
(67, 1, '2021-03-05 13:46:52', '::1', 'Superadmin'),
(68, 1, '2021-03-05 13:48:57', '::1', 'Superadmin'),
(69, 1, '2021-03-05 13:49:17', '::1', 'Superadmin'),
(70, 1, '2021-03-05 13:55:32', '::1', 'Superadmin'),
(71, 1, '2021-03-05 14:10:07', '::1', 'Superadmin'),
(72, 1, '2021-03-05 14:17:36', '::1', 'Superadmin'),
(73, 1, '2021-03-05 15:41:51', '::1', 'Superadmin'),
(74, 1, '2021-03-05 16:20:13', '::1', 'Superadmin'),
(75, 1, '2021-03-05 16:36:27', '::1', 'Superadmin'),
(76, 1, '2021-03-08 09:28:00', '::1', 'Superadmin'),
(77, 1, '2021-03-08 09:58:37', '::1', 'Superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conf_level`
--
ALTER TABLE `conf_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `conf_menu`
--
ALTER TABLE `conf_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `conf_submenu`
--
ALTER TABLE `conf_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `conf_users`
--
ALTER TABLE `conf_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `temp_login`
--
ALTER TABLE `temp_login`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conf_level`
--
ALTER TABLE `conf_level`
  MODIFY `id_level` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conf_menu`
--
ALTER TABLE `conf_menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conf_submenu`
--
ALTER TABLE `conf_submenu`
  MODIFY `id_submenu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conf_users`
--
ALTER TABLE `conf_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_login`
--
ALTER TABLE `temp_login`
  MODIFY `id_temp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
