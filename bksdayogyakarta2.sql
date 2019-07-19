-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 11:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bksdayogyakarta2`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `usename` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `usename`, `email`, `password`) VALUES
(1, 'widya', 'widya@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `detail_obyek_wisata`
--

CREATE TABLE `detail_obyek_wisata` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_fauna` int(11) NOT NULL,
  `jumlah_fauna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fauna`
--

CREATE TABLE `fauna` (
  `id` int(11) NOT NULL,
  `nama_fauna` varchar(50) NOT NULL,
  `spesies` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `status` enum('Sudah Dilepas ke Habitat Aslinya','Masih Dalam Penangkaran','','') NOT NULL,
  `status_konservasi_nasional` enum('dilindungi','tidak dilindungi') NOT NULL,
  `status_konservasi_internasional` enum('dilindungi','tidak dilindungi') NOT NULL,
  `family` varchar(50) NOT NULL,
  `kehidupan_sosial` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fauna`
--

INSERT INTO `fauna` (`id`, `nama_fauna`, `spesies`, `deskripsi`, `status`, `status_konservasi_nasional`, `status_konservasi_internasional`, `family`, `kehidupan_sosial`, `id_kategori`) VALUES
(25, 'Kijang', 'Muntiacus', 'Kijang atau muncak adalah kerabat rusa yang tergabung dalam genus Muntiacus. Kijang berasal dari Dunia Lama dan dianggap sebagai jenis rusa tertua, telah ada sejak 15-35 juta tahun yang lalu, dengan sisa-sisa dari masa Miosen ditemukan di Prancis dan Jerman. ', 'Sudah Dilepas ke Habitat Aslinya', 'dilindungi', 'dilindungi', 'Cervidae', 'Berkelompok', 14),
(26, 'Bajing Kelapa', 'C. notatus', 'Bajing kelapa aktif di siang hari (diurnal). Seperti namanya, bajing ini sering ditemukan berkeliaran di cabang dan ranting pohon, atau melompat di antara pelepah daun di kebun-kebun kelapa dan juga kebun-kebun lainnya.', 'Sudah Dilepas ke Habitat Aslinya', 'tidak dilindungi', 'tidak dilindungi', 'Sciuridae', 'Berkelompok', 14),
(28, 'Kucing Hutan', 'Felis Bengalensis', 'Kucing hutan mengacu pada jenis-jenis kucing (anggota suku Felidae) yang hidup liar di hutan.', 'Masih Dalam Penangkaran', 'dilindungi', 'dilindungi', 'Felidae', 'Berkelompok', 14);

-- --------------------------------------------------------

--
-- Table structure for table `faunatodetail`
--

CREATE TABLE `faunatodetail` (
  `id_fauna` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faunatopenyebaran`
--

CREATE TABLE `faunatopenyebaran` (
  `id_fauna` int(11) NOT NULL,
  `id_penyebaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(10, 'Amfibi (amfibia)'),
(11, 'Burung (Aves)'),
(12, 'Ikan (Pisces)'),
(13, 'Reptil (Reptilia)'),
(14, 'Hewan Menyusui (Mammalia)');

-- --------------------------------------------------------

--
-- Table structure for table `kematian_fauna`
--

CREATE TABLE `kematian_fauna` (
  `id` int(11) NOT NULL,
  `jumlah_kematian` int(11) NOT NULL,
  `tanggal_kematian` datetime NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `id_penyebaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obyek_wisata`
--

CREATE TABLE `obyek_wisata` (
  `id` int(11) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obyek_wisata`
--

INSERT INTO `obyek_wisata` (`id`, `nama_wisata`, `lokasi`, `latitude`, `longitude`) VALUES
(8, 'Suaka Margasatwa Sermo', 'Jl. Sermo - Kokap, Klebu, Hargowilis, Kokap, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', -7.749288573761999, 110.28776315926862),
(9, 'Cagar Alam dan Taman Wisata Alam Batu Gamping', 'Ambarketawang, Gamping, Gamping Tengah, Ambarketawang, Gamping, Kabupaten Sleman, Daerah Istimewa Yo', -7.779320439431308, 110.41242182154971),
(10, 'Suaka Margasatwa Paliyan', 'Karangduwet, Karangasem, Paliyan, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta', -7.905778947589987, 110.88381592704272),
(11, 'Cagar Alam Imogiri', 'Desa Wukirsari dan Desa Girirejo, Kabupaten Bantul', -7.8309463778646, 110.4295279045341);

-- --------------------------------------------------------

--
-- Table structure for table `penambahan_fauna`
--

CREATE TABLE `penambahan_fauna` (
  `id` int(11) NOT NULL,
  `jumlah_penambahan` int(11) NOT NULL,
  `tanggal_penambahan` datetime NOT NULL,
  `id_penyebaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyebaran`
--

CREATE TABLE `penyebaran` (
  `id` int(11) NOT NULL,
  `id_fauna` int(11) NOT NULL,
  `penyebaran` varchar(100) NOT NULL,
  `lokasi_penyebaran` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `jumlah_fauna` int(11) NOT NULL,
  `radius_penyebaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_obyek_wisata`
--
ALTER TABLE `detail_obyek_wisata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_wisata` (`id_wisata`,`id_fauna`),
  ADD KEY `id_wisata_2` (`id_wisata`,`id_fauna`),
  ADD KEY `id_fauna` (`id_fauna`);

--
-- Indexes for table `fauna`
--
ALTER TABLE `fauna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `faunatodetail`
--
ALTER TABLE `faunatodetail`
  ADD UNIQUE KEY `id_fauna` (`id_fauna`),
  ADD UNIQUE KEY `id_detail` (`id_detail`);

--
-- Indexes for table `faunatopenyebaran`
--
ALTER TABLE `faunatopenyebaran`
  ADD UNIQUE KEY `id_fauna` (`id_fauna`),
  ADD UNIQUE KEY `id_penyebaran` (`id_penyebaran`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kematian_fauna`
--
ALTER TABLE `kematian_fauna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_penyebaran` (`id_penyebaran`),
  ADD KEY `id_penyebaran_2` (`id_penyebaran`);

--
-- Indexes for table `obyek_wisata`
--
ALTER TABLE `obyek_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penambahan_fauna`
--
ALTER TABLE `penambahan_fauna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_penyebaran` (`id_penyebaran`),
  ADD KEY `id_penyebaran_2` (`id_penyebaran`);

--
-- Indexes for table `penyebaran`
--
ALTER TABLE `penyebaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fauna_2` (`id_fauna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_obyek_wisata`
--
ALTER TABLE `detail_obyek_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fauna`
--
ALTER TABLE `fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kematian_fauna`
--
ALTER TABLE `kematian_fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obyek_wisata`
--
ALTER TABLE `obyek_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penambahan_fauna`
--
ALTER TABLE `penambahan_fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyebaran`
--
ALTER TABLE `penyebaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_obyek_wisata`
--
ALTER TABLE `detail_obyek_wisata`
  ADD CONSTRAINT `detail_obyek_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `obyek_wisata` (`id`);

--
-- Constraints for table `fauna`
--
ALTER TABLE `fauna`
  ADD CONSTRAINT `fauna_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `faunatodetail`
--
ALTER TABLE `faunatodetail`
  ADD CONSTRAINT `faunatodetail_ibfk_1` FOREIGN KEY (`id_fauna`) REFERENCES `fauna` (`id`),
  ADD CONSTRAINT `faunatodetail_ibfk_2` FOREIGN KEY (`id_detail`) REFERENCES `detail_obyek_wisata` (`id`);

--
-- Constraints for table `faunatopenyebaran`
--
ALTER TABLE `faunatopenyebaran`
  ADD CONSTRAINT `faunatopenyebaran_ibfk_1` FOREIGN KEY (`id_fauna`) REFERENCES `fauna` (`id`),
  ADD CONSTRAINT `faunatopenyebaran_ibfk_2` FOREIGN KEY (`id_penyebaran`) REFERENCES `penyebaran` (`id`);

--
-- Constraints for table `kematian_fauna`
--
ALTER TABLE `kematian_fauna`
  ADD CONSTRAINT `kematian_fauna_ibfk_1` FOREIGN KEY (`id_penyebaran`) REFERENCES `penyebaran` (`id`);

--
-- Constraints for table `penambahan_fauna`
--
ALTER TABLE `penambahan_fauna`
  ADD CONSTRAINT `penambahan_fauna_ibfk_1` FOREIGN KEY (`id_penyebaran`) REFERENCES `penyebaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
