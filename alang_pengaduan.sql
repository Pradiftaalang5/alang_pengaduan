-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 02:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alang_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(11, 'Kebersihan'),
(13, 'Sosial'),
(14, 'Kesehatan'),
(15, 'Keamanan'),
(16, 'Jalanan');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`) VALUES
(4, '5454654', 'yanto', 'agus', '$2y$10$g1YEN6o1mPNrIuuRzc7WOejCD7w4OI4D4iY6/1h1s/it7p4Q5yQBS', '565464654'),
(5, '1234567', 'caco', 'caco', '$2y$10$hQVnPPGVezI5Frs79TzUpuvzW.L/oxZjFCGOHMaO1kO0FWlpTYb9m', '123456'),
(6, '234567', 'user', 'user', '$2y$10$6p3rgJ6w/TUtINMRnd7.cu1bPlwO9RT3DuvjxN/QNf7KqdsoIAe9u', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `subkategori` varchar(128) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_pengaduan`, `tgl_pengaduan`, `nik`, `kategori`, `subkategori`, `isi_laporan`, `foto`, `status`) VALUES
(5, 0, '2023-02-15', '234567', '16', '26', 'kondisi jalanan yang berada di jln nitikan sangat rusak', '', 'proses'),
(6, 0, '2023-02-14', '234567', '11', '28', 'Banyak orang luar yang membuang sampah sembarangan dikampung saya', '', ''),
(7, 0, '2023-02-28', '5454654', '15', '31', 'motor saya dicuri', '', ''),
(8, 0, '2023-03-02', '5454654', '14', '29', 'sudah sehat', '', ''),
(9, 0, '2023-03-02', '5454654', '15', '30', 'jalanan tidak aman', 'foto1.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(2, 0, 'anang', 'anang', '$2y$10$tlrgQmsqQAJu5tDiKSCEVeEmg3677x.DUHf26JA7QYrmbhNx3M7iq', '656767678', 'admin'),
(5, 0, 'admin', 'admin', '$2y$10$XHiYhNdpUPbjMdqRsqkVseCA5bxaz0Uymub0NENhmaUp4zVUkNsHa', '54555445', 'admin'),
(6, 0, 'petugas', 'petugas', '$2y$10$jnoBV9S38E1Q9XhOP8cSyuTVzdjH8W5meAJIOIDTPc0CJ4hFzt.JS', '33345678', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `subkategori_id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`subkategori_id`, `id_kategori`, `sub_kategori`) VALUES
(25, 16, 'Penerangan jalan'),
(26, 16, 'Jalan berlubang'),
(27, 16, 'Lampu merah mati'),
(28, 11, 'Buang sampah sembarangan'),
(29, 14, 'Kurangnya fasilitas kesehatan'),
(30, 15, 'Kurangnya antisipasi disekitar jalan'),
(31, 15, 'Banyak pencurian');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` int(11) NOT NULL,
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id`, `id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 0, 0, '2023-03-02', 'jehwee', 0),
(2, 0, 0, '2023-03-02', 'efr', 0),
(3, 0, 0, '2023-03-02', 'asd', 0),
(4, 0, 0, '2023-03-02', 'asd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`subkategori_id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
