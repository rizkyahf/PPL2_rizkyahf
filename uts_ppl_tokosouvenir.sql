-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 02:43 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_ppl_tokosouvenir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no_pegawai` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_pegawai`, `username`, `password`) VALUES
('PEG001', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(3) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(9) NOT NULL,
  `stok_barang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_barang`, `stok_barang`) VALUES
(1, 'Penghapus', 2000, 30),
(2, 'Penggaris', 1500, 30),
(3, 'Pulpen', 2500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hobi`
--

CREATE TABLE `hobi` (
  `id` int(3) NOT NULL,
  `hobi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hobi`
--

INSERT INTO `hobi` (`id`, `hobi`) VALUES
(1, 'membaca'),
(2, 'menulis'),
(3, 'olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_penjualan` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `harga_jual` double(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`no_penjualan`, `id_barang`, `jumlah`, `harga_jual`) VALUES
('5d92cb8e8a1ae', 'BRG003', 1, 20000.00),
('5d92cb8e8a1ae', 'BRG006', 1, 15000.00),
('5d92cb8e8a1ae', 'BRG001', 1, 10000.00),
('5d92cb8e8a1ae', 'BRG005', 3, 15000.00),
('5d9be13e860dc', 'BRG003', 3, 20000.00),
('5d9be5d55d6b4', 'BRG003', 1, 20000.00),
('5db6eb643c203', 'BRG003', 1, 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` bit(1) NOT NULL,
  `pendidikan` int(2) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hobi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `pendidikan`, `telepon`, `email`, `hobi`) VALUES
('171511000', 'nama mahasiswa', b'1', 2, '+62812345617', 'email@mail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhs_hobi`
--

CREATE TABLE `mhs_hobi` (
  `nim` varchar(10) NOT NULL,
  `id_hobi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mhs_hobi`
--

INSERT INTO `mhs_hobi` (`nim`, `id_hobi`) VALUES
('171511000', 1),
('171511000', 2),
('171511000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(2) NOT NULL,
  `nama_pend` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama_pend`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` text,
  `id_provinsi` int(5) DEFAULT NULL,
  `id_kota` int(5) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'blm_bayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `tanggal`, `total`, `nama`, `no_hp`, `alamat`, `id_provinsi`, `id_kota`, `provinsi`, `kota`, `kode_pos`, `status`) VALUES
('5d92cb8e8a1ae', '2019-10-01 05:44:33', 90000, 'nama', '0812345678', 'alamatnya', NULL, NULL, 'jawa barat', 'bandung', '40211', 'sdh_kirim'),
('5d9be13e860dc', '2019-10-08 03:07:24', 60000, 'customer 2', '0812345678', 'alamatnya', NULL, NULL, 'jawa barat', 'bandung', '40211', 'sdh_kirim'),
('5d9be5d55d6b4', '2019-10-08 03:26:56', 20000, 'pembeli', '0812345678', 'alamatnya', NULL, NULL, 'jawa barat', 'bandung', '40211', 'sdh_kirim'),
('5db6eb643c203', '2019-10-28 14:42:54', 20000, 'ali', '0812345678', 'alamatnya', NULL, NULL, NULL, NULL, '20000', 'sdh_kirim');

-- --------------------------------------------------------

--
-- Table structure for table `souvenir`
--

CREATE TABLE `souvenir` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `stok` int(4) DEFAULT NULL,
  `harga` double(14,2) DEFAULT NULL,
  `keterangan` text,
  `foto` varchar(100) DEFAULT NULL,
  `berat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `souvenir`
--

INSERT INTO `souvenir` (`id_barang`, `nama_barang`, `stok`, `harga`, `keterangan`, `foto`, `berat`) VALUES
('BRG001', 'Barang 1', 9, 10000.00, 'Keterangan Barang 1', 'sakai31556160290.png', 1000),
('BRG002', 'Barang 2', 10, 15000.00, 'Keterangan Barang 2', 'sakai11556160359.png', 100),
('BRG003', 'Barang 3', 4, 20000.00, 'Keterangan Barang 3', 'sakai21556162448.png', 250),
('BRG004', 'Barang 4', 10, 10000.00, 'Keterangan Barang 3', NULL, 350),
('BRG005', 'Barang 5', 3, 15000.00, 'Keterangan Barang 3', NULL, 200),
('BRG006', 'Barang 6', 0, 15000.00, NULL, NULL, 500),
('BRG010', 'Barang 1', 9, 10000.00, 'Keterangan Barang 1', 'sakai31556160290.png', 1000),
('BRG020', 'Barang 2', 10, 15000.00, 'Keterangan Barang 2', 'sakai11556160359.png', 100),
('BRG030', 'Barang 2', 5, 10000.00, NULL, NULL, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_pegawai`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `hobi`
--
ALTER TABLE `hobi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD KEY `no_penjualan` (`no_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `pendidikan` (`pendidikan`);

--
-- Indexes for table `mhs_hobi`
--
ALTER TABLE `mhs_hobi`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_hobi` (`id_hobi`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`);

--
-- Indexes for table `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hobi`
--
ALTER TABLE `hobi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `penjualan` (`no_penjualan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `souvenir` (`id_barang`) ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`pendidikan`) REFERENCES `pendidikan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mhs_hobi`
--
ALTER TABLE `mhs_hobi`
  ADD CONSTRAINT `mhs_hobi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mhs_hobi_ibfk_2` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
