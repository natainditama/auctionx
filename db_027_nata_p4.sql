-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2023 at 09:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_027_nata_p4`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 3, 3, 1, 300000),
(2, 2, 2, 2, 650000),
(3, 1, 1, 2, 700000),
(4, 4, 4, 2, 320000),
(5, 3, 3, 3, 350000),
(6, 1, 1, 3, 750000),
(7, 4, 4, 3, 400000),
(8, 2, 2, 4, 720000),
(11, 4, 4, 4, 450000),
(12, 2, 2, 6, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang`) VALUES
(1, 'Ford Mustang', '2023-04-29', 400000, 'A charismatic sports car that gives you lots for your money'),
(2, 'BMW i4', '2023-04-28', 600000, 'Capable electric coupe with lots of practicality'),
(3, 'Lamborghini Aventador', '2023-04-27', 200000, 'A stunning supercar that sounds incredible'),
(4, 'Lamborghini Urus', '2023-04-24', 290000, 'An Italian supercar in large SUV form');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_dibuka` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_ditutup` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `harga_akhir` int(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_dibuka`, `tgl_ditutup`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(1, 1, '2023-04-29 14:07:00', '2023-05-06 14:07:00', 750000, 3, 1, 'dibuka'),
(2, 2, '2023-04-28 14:08:00', '2023-05-05 14:08:00', 800000, 6, 1, 'dibuka'),
(3, 3, '2023-04-27 14:08:00', '2023-05-03 14:08:00', 350000, 3, 1, 'dibuka'),
(4, 4, '2023-04-24 14:11:00', '2023-04-30 14:11:00', 450000, 4, 2, 'dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(1, 'Ryan Ary', 'ryan', '$2y$10$9bgyxhxAuI8hU.FwgF6vsuAR5oeIMozdo0Bykg1XOwpkT1uuChKDW', '123'),
(2, 'Cempaka', 'cempaka', '$2y$10$JRStOsOacV2dxUB7MbKUxOtmeiL0GcGf49mCiqEBxLlGMCZ.vW03u', '123'),
(3, 'Yunita', 'yunita', '$2y$10$nJ0oRjS.E5VgHiiTYFOPauOXo6NVg37DQ6lhZLd2Sccy9mM/5VRAq', '123'),
(4, 'William', 'william', '$2y$10$Zq49COoJ4Ik5.xtAf07fze8LELI/XPoGeNmvUNrEsMmf7Y/Dr0ll6', '12131'),
(5, 'dwik erika', 'dwik', '$2y$10$8M8rBnRDljNFkinatlAifOl02VB21Rf2TX24eaZvWDMEnqztNMTXC', '1234055050'),
(6, 'Yovie', 'Yovie', '$2y$10$ngPVeFajnwZlg1yzBh.J7.aNxSsthvnVMbdZq3I1EU6ILRmBtD5Lu', '318030913');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Nata Inditama', 'natainditama', '$2y$10$xkHWEWW.c4qFk9hH1p/3aO5sbSkPCO9tRQ8Bw9/IVWXBkEWZBPv/C', 2),
(2, 'dodek', 'dodek', '$2y$10$e8yJ2UtrNv3OZmbEl/kMkuqV2ASy2xEbyCMVVcOIGJDYaOV5O0r36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lelang` (`id_lelang`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`);

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
