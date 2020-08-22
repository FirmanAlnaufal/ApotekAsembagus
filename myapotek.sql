-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 02:42 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(3, 'generic manuf', '089999988', 'malang', NULL, '2019-09-15 13:57:21', '2019-11-21 16:10:56'),
(4, 'merk indonesia', '089898989', 'jakarta', NULL, '2019-09-18 09:12:56', '2019-11-21 16:08:45'),
(5, 'dexa medica', '08989898', 'surabaya', NULL, '2019-09-21 19:34:51', '2019-11-21 16:08:08'),
(7, 'kalbe farma', '08880880', 'jakarta', 'farmasi no 1 di indonesia', '2019-11-21 21:50:38', '2019-11-21 16:12:05'),
(11, 'kimia farma', '034255890', 'malang', NULL, '2019-11-21 21:55:30', NULL),
(13, 'konimex', '099987699', 'jakarta timur', NULL, '2019-11-21 21:57:45', NULL),
(14, 'lapi', '09998887650', 'surabaya', NULL, '2019-11-21 21:59:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `selisih` int(20) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `min_stok`, `selisih`, `kapasitas`, `satuan`, `harga_jual`, `harga_beli`, `tgl_kadaluarsa`, `created`, `updated`) VALUES
('B0001', 'paracetamol', 500, 200, 0, 248, 'Kotak', 15000, 9998, '2019-11-24', '2019-10-29 14:26:55', '2019-11-04 13:27:53'),
('B0002', 'mixagrip', 500, 200, 0, 300, 'Kotak', 20000, 15000, '2019-10-09', '2019-10-29 14:28:41', '2019-11-04 13:28:02'),
('B0003', 'dramamin', 160, 100, 0, 200, 'Botol', 10000, 9500, '2019-10-01', '2019-10-29 15:03:09', '2019-11-21 14:41:23'),
('B0004', 'bodrex', 600, 500, 0, 1000, 'Box', 1000, 500, '2019-11-05', '2019-11-12 19:40:34', NULL),
('B0005', 'Alphamol', 220, 200, 20, 500, 'Box', 60000, 45000, '2019-12-30', '2019-11-23 11:01:41', NULL),
('B0006', 'Alpara', 501, 500, 0, 700, 'Box', 85000, 63750, '2019-12-31', '2019-11-23 13:18:17', NULL),
('B0007', 'antangin', 100, 500, 0, 1000, 'Box', 25000, 18750, '2020-01-01', '2019-11-23 19:44:16', NULL),
('B0008', 'albothyl', 100, 700, 0, 1000, 'Botol', 28500, 21375, '2020-05-22', '2019-11-23 19:46:50', NULL),
('B0009', 'antimo', 0, 50, 0, 100, 'Box', 45000, 33750, '2020-01-31', '2019-11-26 19:26:23', NULL),
('B0010', 'asam mafenamat', 0, 200, 0, 300, 'Box', 30000, 22500, '2020-02-13', '2019-11-26 19:29:36', NULL),
('B0011', 'balsem geliga', 0, 50, 0, 100, 'Botol', 16000, 12000, '2019-12-28', '2019-11-26 19:30:51', NULL),
('B0012', 'balsem lang', 0, 50, 0, 100, 'Botol', 7500, 5625, '2019-12-21', '2019-11-26 19:31:58', NULL),
('B0013', 'betadine', 0, 50, 0, 100, 'Botol', 10500, 7850, '2020-02-20', '2019-11-26 19:33:02', NULL),
('B0014', 'benoson', 0, 100, 0, 200, 'Tube', 16000, 12000, '2020-01-01', '2019-11-26 19:34:29', NULL),
('B0015', 'become-C', 0, 100, 0, 200, 'Box', 160000, 120000, '2020-03-06', '2019-11-26 19:36:45', NULL),
('B0016', 'betominplex', 0, 50, 0, 100, 'Botol', 21000, 15750, '2020-01-31', '2019-11-26 19:37:55', NULL),
('B0017', 'biosanbe', 0, 100, 0, 200, 'Box', 150000, 112000, '2020-05-22', '2019-11-26 19:42:23', NULL),
('B0018', 'bisolvon kids', 0, 50, 0, 100, 'Botol', 29000, 21750, '2020-01-16', '2019-11-26 19:44:25', NULL),
('B0019', 'betason Cr', 0, 100, 0, 200, 'Box', 110000, 82500, '2020-01-01', '2019-11-26 19:46:22', NULL),
('B0020', 'betason-N CR', 0, 100, 0, 200, 'Box', 145000, 108750, '2020-06-19', '2019-11-26 19:47:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id_obt_keluar` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_keluar`
--

INSERT INTO `obat_keluar` (`id_obt_keluar`, `id_user`, `tgl_keluar`, `created`, `updated`) VALUES
('OBK201911001', 14, '2019-11-03', '2019-11-03 17:28:23', '2019-11-03 17:28:23'),
('OBK201911002', 14, '2019-11-04', '2019-11-04 19:16:13', '2019-11-04 19:16:13'),
('OBK201911003', 14, '2019-11-04', '2019-11-04 19:16:31', '2019-11-04 19:16:31'),
('OBK201911004', 14, '2019-11-04', '2019-11-04 19:16:59', '2019-11-04 19:16:59'),
('OBK201911005', 14, '2019-11-11', '2019-11-11 17:27:30', '2019-11-11 17:27:30'),
('OBK201911006', 14, '2019-11-11', '2019-11-11 17:27:58', '2019-11-11 17:27:58'),
('OBK201911007', 14, '2019-11-12', '2019-11-12 20:28:54', '2019-11-12 20:28:54'),
('OBK201911008', 14, '2019-11-18', '2019-11-18 14:35:20', '2019-11-18 14:35:20'),
('OBK201911009', 14, '2019-11-21', '2019-11-21 08:43:56', '2019-11-21 08:43:56'),
('OBK201911010', 14, '2019-11-28', '2019-11-28 10:24:00', '2019-11-28 10:24:00'),
('OBK201911011', 14, '2019-11-28', '2019-11-28 11:31:22', '2019-11-28 11:31:22'),
('OBK202001001', 14, '2020-01-18', '2020-01-18 11:04:21', '2020-01-18 11:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `obat_keluar_item`
--

CREATE TABLE `obat_keluar_item` (
  `id_kitem` int(11) NOT NULL,
  `id_obt_keluar` varchar(20) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_keluar_item`
--

INSERT INTO `obat_keluar_item` (`id_kitem`, `id_obt_keluar`, `id_obat`, `jumlah`, `created`, `updated`) VALUES
(1, 'OBK201911001', 'B0001', 2, '2019-11-03 17:28:23', '2019-11-03 17:28:23'),
(2, 'OBK201911002', 'B0001', 2, '2019-11-04 19:16:13', '2019-11-04 19:16:13'),
(3, 'OBK201911002', 'B0002', 2, '2019-11-04 19:16:14', '2019-11-04 19:16:14'),
(4, 'OBK201911006', 'B0002', 10, '2019-11-11 17:27:58', '2019-11-11 17:27:58'),
(5, 'OBK201911007', 'B0001', 10, '2019-11-12 20:28:54', '2019-11-12 20:28:54'),
(6, 'OBK201911007', 'B0002', 10, '2019-11-12 20:28:54', '2019-11-12 20:28:54'),
(7, 'OBK201911008', 'B0001', 1, '2019-11-18 14:35:21', '2019-11-18 14:35:21'),
(8, 'OBK201911009', 'B0001', 10, '2019-11-21 08:43:56', '2019-11-21 08:43:56'),
(9, 'OBK201911009', 'B0002', 10, '2019-11-21 08:43:56', '2019-11-21 08:43:56'),
(10, 'OBK201911009', 'B0003', 10, '2019-11-21 08:43:57', '2019-11-21 08:43:57'),
(11, 'OBK201911010', 'B0001', 100, '2019-11-28 10:24:00', '2019-11-28 10:24:00'),
(12, 'OBK201911010', 'B0002', 100, '2019-11-28 10:24:00', '2019-11-28 10:24:00'),
(13, 'OBK201911011', 'B0003', 150, '2019-11-28 11:31:22', '2019-11-28 11:31:22'),
(14, 'OBK202001001', 'B0001', 175, '2020-01-18 11:04:21', '2020-01-18 11:04:21'),
(15, 'OBK202001001', 'B0002', 168, '2020-01-18 11:04:21', '2020-01-18 11:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id_obt_masuk` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_pemesanan` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`id_obt_masuk`, `id_user`, `tgl_masuk`, `id_pemesanan`, `created`, `updated`) VALUES
('OBM201911001', 14, '2019-11-11', 'PM201910002', '2019-11-11 19:55:34', '2019-11-11 19:55:34'),
('OBM201911002', 14, '2019-11-11', 'PM201910002', '2019-11-11 19:58:10', '2019-11-11 19:58:10'),
('OBM201911003', 14, '2019-11-11', 'PM201910002', '2019-11-11 19:58:35', '2019-11-11 19:58:35'),
('OBM201911004', 14, '2019-11-11', 'PM201910002', '2019-11-11 20:04:34', '2019-11-11 20:04:34'),
('OBM201911005', 14, '2019-11-11', 'PM201910002', '2019-11-11 20:05:49', '2019-11-11 20:05:49'),
('OBM201911006', 14, '2019-11-11', 'PM201910002', '2019-11-11 20:14:25', '2019-11-11 20:14:25'),
('OBM201911007', 14, '2019-11-11', 'PM201910002', '2019-11-11 20:16:29', '2019-11-11 20:16:29'),
('OBM201911008', 14, '2019-11-11', 'PM201910003', '2019-11-11 20:25:23', '2019-11-11 20:25:23'),
('OBM201911009', 14, '2019-11-11', 'PM201911003', '2019-11-11 21:15:59', '2019-11-11 21:15:59'),
('OBM201911010', 14, '2019-11-12', 'PM201911002', '2019-11-12 19:35:17', '2019-11-12 19:35:17'),
('OBM201911011', 14, '2019-11-12', 'PM201911004', '2019-11-12 19:42:30', '2019-11-12 19:42:30'),
('OBM201911012', 14, '2019-11-13', 'PM201911009', '2019-11-13 09:21:27', '2019-11-13 09:21:27'),
('OBM201911013', 14, '2019-11-15', 'PM201911008', '2019-11-15 17:20:06', '2019-11-15 17:20:06'),
('OBM201911014', 14, '2019-11-15', 'PM201911010', '2019-11-15 17:21:59', '2019-11-15 17:21:59'),
('OBM201911015', 14, '2019-11-18', 'PM201911007', '2019-11-18 09:30:29', '2019-11-18 09:30:29'),
('OBM201911016', 14, '2019-11-18', 'PM201911005', '2019-11-18 09:33:25', '2019-11-18 09:33:25'),
('OBM201911017', 14, '2019-11-18', 'PM201911011', '2019-11-18 09:38:33', '2019-11-18 09:38:33'),
('OBM201911018', 14, '2019-11-21', 'PM201911012', '2019-11-21 08:43:19', '2019-11-21 08:43:19'),
('OBM201911019', 14, '2019-11-23', 'PM201911013', '2019-11-23 11:04:11', '2019-11-23 11:04:11'),
('OBM201911020', 14, '2019-11-28', 'PM201911015', '2019-11-28 10:23:11', '2019-11-28 10:23:11'),
('OBM201911021', 14, '2019-11-28', 'PM201911016', '2019-11-28 11:13:19', '2019-11-28 11:13:19'),
('OBM202001001', 14, '2020-01-18', 'PM202001001', '2020-01-18 11:03:29', '2020-01-18 11:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk_item`
--

CREATE TABLE `obat_masuk_item` (
  `id_mitem` int(11) NOT NULL,
  `id_obt_masuk` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_masuk_item`
--

INSERT INTO `obat_masuk_item` (`id_mitem`, `id_obt_masuk`, `created`, `updated`) VALUES
(2, 'OBM201911006', '2019-11-11 20:14:25', '2019-11-11 20:14:25'),
(3, 'OBM201911006', '2019-11-11 20:14:25', '2019-11-11 20:14:25'),
(4, 'OBM201911007', '2019-11-11 20:16:29', '2019-11-11 20:16:29'),
(5, 'OBM201911007', '2019-11-11 20:16:29', '2019-11-11 20:16:29'),
(6, 'OBM201911008', '2019-11-11 20:25:23', '2019-11-11 20:25:23'),
(7, 'OBM201911008', '2019-11-11 20:25:23', '2019-11-11 20:25:23'),
(8, 'OBM201911009', '2019-11-11 21:15:59', '2019-11-11 21:15:59'),
(9, 'OBM201911010', '2019-11-12 19:35:17', '2019-11-12 19:35:17'),
(10, 'OBM201911011', '2019-11-12 19:42:30', '2019-11-12 19:42:30'),
(11, 'OBM201911011', '2019-11-12 19:42:30', '2019-11-12 19:42:30'),
(12, 'OBM201911012', '2019-11-13 09:21:27', '2019-11-13 09:21:27'),
(13, 'OBM201911012', '2019-11-13 09:21:28', '2019-11-13 09:21:28'),
(14, 'OBM201911013', '2019-11-15 17:20:07', '2019-11-15 17:20:07'),
(15, 'OBM201911014', '2019-11-15 17:21:59', '2019-11-15 17:21:59'),
(16, 'OBM201911014', '2019-11-15 17:21:59', '2019-11-15 17:21:59'),
(17, 'OBM201911015', '2019-11-18 09:30:29', '2019-11-18 09:30:29'),
(18, 'OBM201911016', '2019-11-18 09:33:25', '2019-11-18 09:33:25'),
(19, 'OBM201911016', '2019-11-18 09:33:25', '2019-11-18 09:33:25'),
(20, 'OBM201911017', '2019-11-18 09:38:33', '2019-11-18 09:38:33'),
(21, 'OBM201911018', '2019-11-21 08:43:19', '2019-11-21 08:43:19'),
(22, 'OBM201911018', '2019-11-21 08:43:19', '2019-11-21 08:43:19'),
(23, 'OBM201911019', '2019-11-23 11:04:11', '2019-11-23 11:04:11'),
(24, 'OBM201911020', '2019-11-28 10:23:11', '2019-11-28 10:23:11'),
(25, 'OBM201911020', '2019-11-28 10:23:11', '2019-11-28 10:23:11'),
(26, 'OBM201911021', '2019-11-28 11:13:19', '2019-11-28 11:13:19'),
(27, 'OBM202001001', '2020-01-18 11:03:29', '2020-01-18 11:03:29'),
(28, 'OBM202001001', '2020-01-18 11:03:30', '2020-01-18 11:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Amir', 'L', '089999', 'malang', '2019-09-15 19:38:21', '2019-11-23 13:38:26'),
(2, 'budi', 'P', '08998989', 'jakarta', '2019-09-15 19:41:48', '2019-11-23 13:38:37'),
(3, 'dewi pratama', 'P', '8989809', 'jakarta', '2019-09-20 21:18:10', NULL),
(4, 'adam', 'L', '098765445678', 'karawang', '2019-10-08 19:23:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `invoice` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal`, `id_distributor`, `id_user`, `status`, `invoice`) VALUES
('PM201910001', '2019-10-29', 3, 14, 'datang', '0'),
('PM201910002', '2019-10-29', 4, 14, 'belum', '0'),
('PM201910003', '2019-10-29', 5, 14, 'datang', '0'),
('PM201910004', '2019-10-31', 3, 14, 'belum', '0'),
('PM201910005', '2019-10-31', 3, 22, 'belum', '0'),
('PM201910006', '2019-10-31', 3, 14, 'belum', '0'),
('PM201911001', '2019-11-01', 3, 14, 'belum', '0'),
('PM201911002', '2019-11-03', 3, 14, 'datang', '0'),
('PM201911003', '2019-11-11', 3, 14, 'datang', '0'),
('PM201911004', '2019-11-12', 3, 14, 'datang', '0'),
('PM201911005', '2019-11-12', 4, 14, 'datang', '0'),
('PM201911006', '2019-11-12', 4, 14, 'belum', '0'),
('PM201911007', '2019-11-12', 3, 14, 'datang', '0'),
('PM201911008', '2019-11-12', 5, 14, 'datang', '0'),
('PM201911009', '2019-11-13', 3, 14, 'datang', '0'),
('PM201911010', '2019-11-15', 3, 14, 'datang', '0'),
('PM201911011', '2019-11-18', 3, 14, 'datang', '0'),
('PM201911012', '2019-11-21', 3, 14, 'datang', '0'),
('PM201911013', '2019-11-23', 3, 14, 'datang', '0'),
('PM201911014', '2019-11-25', 13, 14, 'belum', 'ab0980'),
('PM201911015', '2019-11-28', 3, 14, 'datang', 'pm00021'),
('PM201911016', '2019-11-28', 7, 14, 'datang', ''),
('PM202001001', '2020-01-18', 3, 14, 'datang', 'ab0980'),
('PM202006001', '2020-06-30', 3, 14, 'belum', 'blablabla');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_item`
--

CREATE TABLE `pemesanan_item` (
  `id_pitem` int(11) NOT NULL,
  `id_pemesanan` varchar(22) NOT NULL,
  `id_obat` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_item`
--

INSERT INTO `pemesanan_item` (`id_pitem`, `id_pemesanan`, `id_obat`, `jumlah`) VALUES
(15, 'PM201910001', 'B0001', 100),
(16, 'PM201910001', 'B0002', 100),
(17, 'PM201910002', 'B0001', 100),
(18, 'PM201910002', 'B0002', 100),
(19, 'PM201910003', 'B0001', 200),
(20, 'PM201910003', 'B0002', 200),
(21, 'PM201910004', 'B0003', 10),
(22, 'PM201910005', 'B0003', 10),
(23, 'PM201910006', 'B0003', 20),
(24, 'PM201911001', 'B0003', 10),
(25, 'PM201911002', 'B0003', 10),
(26, 'PM201911003', 'B0003', 10),
(27, 'PM201911004', 'B0003', 10),
(28, 'PM201911004', 'B0004', 10),
(29, 'PM201911005', 'B0003', 10),
(30, 'PM201911005', 'B0004', 10),
(31, 'PM201911007', 'B0004', 10),
(32, 'PM201911008', 'B0004', 10),
(33, 'PM201911009', 'B0003', 10),
(34, 'PM201911009', 'B0004', 10),
(35, 'PM201911010', 'B0003', 10),
(36, 'PM201911010', 'B0004', 10),
(37, 'PM201911011', 'B0004', 10),
(38, 'PM201911012', 'B0003', 10),
(39, 'PM201911012', 'B0004', 10),
(40, 'PM201911013', 'B0005', 190),
(41, 'PM201911014', 'B0004', 10),
(42, 'PM201911015', 'B0007', 100),
(43, 'PM201911015', 'B0008', 100),
(44, 'PM201911016', 'B0004', 420),
(45, 'PM202001001', 'B0003', 200),
(46, 'PM202001001', 'B0004', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1:admin, 2:pegawai',
  `image` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_pegawai`, `level`, `image`, `created`) VALUES
(14, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3, 1, 'avatar2.png', '2019-10-27 00:00:00'),
(22, 'aqwert', '19b58543c85b97c5498edfd89c11c3aa8cb5fe51', 4, 2, NULL, '2019-10-31 13:31:14'),
(25, 'pegawai', 'a431ba54c55ae2cb91be1785398ecd595ca96b7a', 2, 2, NULL, '2019-11-21 08:46:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id_obt_keluar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `obat_keluar_item`
--
ALTER TABLE `obat_keluar_item`
  ADD PRIMARY KEY (`id_kitem`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_obt_keluar` (`id_obt_keluar`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id_obt_masuk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `obat_masuk_item`
--
ALTER TABLE `obat_masuk_item`
  ADD PRIMARY KEY (`id_mitem`),
  ADD KEY `id_obt_masuk` (`id_obt_masuk`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemesanan_item`
--
ALTER TABLE `pemesanan_item`
  ADD PRIMARY KEY (`id_pitem`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `obat_keluar_item`
--
ALTER TABLE `obat_keluar_item`
  MODIFY `id_kitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obat_masuk_item`
--
ALTER TABLE `obat_masuk_item`
  MODIFY `id_mitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan_item`
--
ALTER TABLE `pemesanan_item`
  MODIFY `id_pitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD CONSTRAINT `obat_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `obat_keluar_item`
--
ALTER TABLE `obat_keluar_item`
  ADD CONSTRAINT `obat_keluar_item_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `obat_keluar_item_ibfk_2` FOREIGN KEY (`id_obt_keluar`) REFERENCES `obat_keluar` (`id_obt_keluar`);

--
-- Constraints for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD CONSTRAINT `obat_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `obat_masuk_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `obat_masuk_item`
--
ALTER TABLE `obat_masuk_item`
  ADD CONSTRAINT `obat_masuk_item_ibfk_2` FOREIGN KEY (`id_obt_masuk`) REFERENCES `obat_masuk` (`id_obt_masuk`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pemesanan_item`
--
ALTER TABLE `pemesanan_item`
  ADD CONSTRAINT `pemesanan_item_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `pemesanan_item_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
