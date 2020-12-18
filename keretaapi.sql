-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 06:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keretaapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_tiket` int(8) NOT NULL,
  `id_stasiun` int(8) DEFAULT NULL,
  `id_kereta` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id_kereta` int(8) NOT NULL,
  `nama_kereta` varchar(25) NOT NULL,
  `kelas_kereta` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(8) NOT NULL,
  `NIK` int(20) NOT NULL,
  `nama_penumpang` varchar(50) NOT NULL,
  `id_stasiun` int(8) DEFAULT NULL,
  `id_kereta` int(8) DEFAULT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE `stasiun` (
  `id_stasiun` int(8) NOT NULL,
  `nama_stasiun` varchar(50) NOT NULL,
  `alamat_stasiun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(8) NOT NULL,
  `id_penumpang` int(8) DEFAULT NULL,
  `stasiun_asal` varchar(50) NOT NULL,
  `stasiun_tujuan` varchar(50) NOT NULL,
  `id_kereta` int(8) DEFAULT NULL,
  `berangkat` date NOT NULL,
  `tiba` date NOT NULL,
  `durasi` char(6) NOT NULL,
  `harga` varchar(6) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_tiket`),
  ADD UNIQUE KEY `id_stasiun` (`id_stasiun`) USING BTREE,
  ADD KEY `id_kereta` (`id_kereta`) USING BTREE;

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD UNIQUE KEY `id_kereta` (`id_kereta`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_penumpang` (`id_penumpang`),
  ADD KEY `id_kereta` (`id_kereta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_tiket` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id_kereta` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id_stasiun` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id_stasiun`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penumpang_ibfk_2` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id_stasiun`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id_kereta`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
