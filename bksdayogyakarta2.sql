-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 09:10 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `bksdayogyakarta2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `waktu`, `deskripsi`, `gambar`) VALUES
(1, 'Extended Kalman Filter', '2019-07-02', 'asdasd', '../resources/6195abd2bb82a45a86f190cebe033b50.jpg'),
(2, 'asd', '2019-07-02', 'asdasd', '../resources/b8136dbbebd9ddee27e28506f90fc3a6.jpg'),
(3, 'asdasdasd', '2019-07-09', 'asdasd', '../resources/37bd065bd901efc88fb040a93b67e78e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `usename` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` tinyint(4) NOT NULL,
  `privilege` varchar(15) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `usename`, `email`, `password`, `privilege`) VALUES
(1, 'widya', 'widya@gmail.com', 123, 'admin'),
(2, 'reyzeal', 'rizal@gmail.com', 123, 'kepala');

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

--
-- Dumping data for table `detail_obyek_wisata`
--

INSERT INTO `detail_obyek_wisata` (`id`, `id_wisata`, `id_fauna`, `jumlah_fauna`) VALUES
(1, 8, 25, 11),
(2, 8, 28, 10),
(3, 9, 28, 12),
(4, 9, 26, 1),
(5, 17, 25, 10),
(6, 17, 26, 1),
(7, 17, 30, 1);

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
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fauna`
--

INSERT INTO `fauna` (`id`, `nama_fauna`, `spesies`, `deskripsi`, `status`, `status_konservasi_nasional`, `status_konservasi_internasional`, `family`, `kehidupan_sosial`, `id_kategori`, `gambar`) VALUES
(25, 'Kijang', 'Muntiacus', 'Kijang atau muncak adalah kerabat rusa yang tergabung dalam genus Muntiacus. Kijang berasal dari Dunia Lama dan dianggap sebagai jenis rusa tertua, telah ada sejak 15-35 juta tahun yang lalu, dengan sisa-sisa dari masa Miosen ditemukan di Prancis dan Jerman. ', 'Sudah Dilepas ke Habitat Aslinya', 'dilindungi', 'dilindungi', 'Cervidae', 'Berkelompok', 14, '../resources/8504e6eba4ead1a800598b6ed471e01c.jpg'),
(26, 'Bajing Kelapa', 'C. notatus', 'Bajing kelapa aktif di siang hari (diurnal). Seperti namanya, bajing ini sering ditemukan berkeliaran di cabang dan ranting pohon, atau melompat di antara pelepah daun di kebun-kebun kelapa dan juga kebun-kebun lainnya.', 'Sudah Dilepas ke Habitat Aslinya', 'tidak dilindungi', 'tidak dilindungi', 'Sciuridae', 'Berkelompok', 14, '../resources/287301fc3d3ec2c19dd9468377035ba9.jpg'),
(28, 'Kucing Hutan', 'Felis Bengalensis', 'Kucing hutan mengacu pada jenis-jenis kucing (anggota suku Felidae) yang hidup liar di hutan.', 'Masih Dalam Penangkaran', 'dilindungi', 'dilindungi', 'Felidae', 'Berkelompok', 14, '../resources/0b5b3e4125fe9f1048740d0944ba5b25.jpg'),
(30, 'Macan', 'P. pardus', 'Macan tutul (bahasa Latin: Panthera pardus) adalah salah satu dari empat kucing besar. Hewan ini dikenal juga dengan sebutan harimau dahan karena kemampuannya memanjat. Pada mulanya, orang berpikiran bahwa macan tutul adalah hibrida dari singa dan harimau, sehingga muncul nama &quot;leopard&quot; di kalangan peneliti Eropa awal. Macan tutul jawa (P. p. melas) adalah fauna identitas Jawa Barat dan termasuk hewan yang terancam punah di Indonesia.', 'Sudah Dilepas ke Habitat Aslinya', 'dilindungi', 'dilindungi', 'Felidae', 'Solitare', 14, '../resources/ece7acd3e71985e384536c000f4129db.jpg'),
(37, 'asd', 'a', 'a', 'Sudah Dilepas ke Habitat Aslinya', 'dilindungi', 'dilindungi', 'asd', 'a', 10, '../resources/4b5ebb87f8bd4d9f2581dee7219af702.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `subjek`, `pesan`, `waktu`) VALUES
(1, 'Rizal Ardhi Rahmadani', 'agmini96@gmail.com', 'asdasd', 'asdasd', '2019-07-22 17:00:39'),
(2, 'Rizal Ardhi Rahmadani', 'agmini96@gmail.com', 'mencoba', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2019-07-22 17:19:36'),
(3, 'Rizal Ardhi Rahmadani', 'agmini96@gmail.com', 'asdasd', 'asd', '2019-07-22 21:44:23'),
(4, 'Rizal Ardhi Rahmadani', 'rizal.ardhi.rahmadani@gmail.com', 'asdasd', 'asdasd', '2019-07-23 14:26:09');

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

--
-- Dumping data for table `kematian_fauna`
--

INSERT INTO `kematian_fauna` (`id`, `jumlah_kematian`, `tanggal_kematian`, `alasan`, `id_penyebaran`) VALUES
(2, 1, '2019-07-03 12:00:00', '1', 1),
(3, 2, '2019-07-02 12:00:00', 'asd', 2),
(8, 2, '2019-07-25 12:00:00', '1', 1),
(9, 2, '2019-07-25 12:00:00', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obyek_wisata`
--

CREATE TABLE `obyek_wisata` (
  `id` int(11) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obyek_wisata`
--

INSERT INTO `obyek_wisata` (`id`, `nama_wisata`, `lokasi`, `latitude`, `longitude`, `gambar`) VALUES
(8, 'Suaka Margasatwa Sermo', 'Jl. Sermo - Kokap, Klebu, Hargowilis, Kokap, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', -7.749288573761999, 110.28776315926862, '../resources/16284ba50c73baee5f24bf4dda4ddd68.jpg'),
(9, 'Cagar Alam dan Taman Wisata Alam Batu Gamping', 'Ambarketawang, Gamping, Gamping Tengah, Ambarketawang, Gamping, Kabupaten Sleman, Daerah Istimewa Yo', -7.779320439431308, 110.41242182154971, NULL),
(10, 'Suaka Margasatwa Paliyan', 'Karangduwet, Karangasem, Paliyan, Kabupaten Gunung Kidul, Daerah Istimewa Yogyakarta', -7.905778947589987, 110.88381592704272, NULL),
(11, 'Cagar Alam Imogiri', 'Desa Wukirsari dan Desa Girirejo, Kabupaten Bantul', -7.8309463778646, 110.4295279045341, NULL),
(16, 'asd', 'asd', -7.872422163129597, 110.32936339734118, '../resources/9a191cdf73548827f23853202d98c6c5.jpg'),
(17, 'as', 'as', -7.744888670168829, 110.3680849418945, '../resources/073354b0c252c762b12b1bfc68d108f6.'),
(20, 'a', 'a', -7.753057093034866, 110.36767849252793, '../resources/cbc50b1423e9e42374834fc6c4a12956.'),
(21, 'aa', 'aa', -7.7605305400921125, 110.40906590760657, '../resources/73e297fceb55860051afa1c60b516ad7.'),
(22, 'aas', 'aas', -7.751344250285288, 110.37355590836488, '../resources/ba2920e1b0d1dc0de644c5af9f73035c.jpg');

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

--
-- Dumping data for table `penambahan_fauna`
--

INSERT INTO `penambahan_fauna` (`id`, `jumlah_penambahan`, `tanggal_penambahan`, `id_penyebaran`) VALUES
(1, 4, '2019-07-09 00:00:00', 1),
(2, 13, '2019-07-10 12:00:00', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usename` (`usename`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_penyebaran_2` (`id_penyebaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_obyek_wisata`
--
ALTER TABLE `detail_obyek_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fauna`
--
ALTER TABLE `fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kematian_fauna`
--
ALTER TABLE `kematian_fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obyek_wisata`
--
ALTER TABLE `obyek_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penambahan_fauna`
--
ALTER TABLE `penambahan_fauna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_obyek_wisata`
--
ALTER TABLE `detail_obyek_wisata`
  ADD CONSTRAINT `detail_obyek_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `obyek_wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_obyek_wisata_ibfk_2` FOREIGN KEY (`id_fauna`) REFERENCES `fauna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fauna`
--
ALTER TABLE `fauna`
  ADD CONSTRAINT `fauna_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `kematian_fauna`
--
ALTER TABLE `kematian_fauna`
  ADD CONSTRAINT `kematian_fauna_ibfk_1` FOREIGN KEY (`id_penyebaran`) REFERENCES `detail_obyek_wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penambahan_fauna`
--
ALTER TABLE `penambahan_fauna`
  ADD CONSTRAINT `penambahan_fauna_ibfk_1` FOREIGN KEY (`id_penyebaran`) REFERENCES `detail_obyek_wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
