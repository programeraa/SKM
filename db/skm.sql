-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 04:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skm`
--

-- --------------------------------------------------------

--
-- Table structure for table `co_broke`
--

CREATE TABLE `co_broke` (
  `id_cobroke` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `id_komisi_unik` int(250) NOT NULL,
  `nama_cobroke` varchar(250) NOT NULL,
  `status_cobroke` varchar(250) NOT NULL,
  `jenis_cobroke` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_broke`
--

INSERT INTO `co_broke` (`id_cobroke`, `id_komisi`, `id_komisi_unik`, `nama_cobroke`, `status_cobroke`, `jenis_cobroke`) VALUES
(51, 213, 5792, 'Rohman', 'Selling', '2.5'),
(52, 214, 3563, 'Fandi - BT', 'Listing', '3'),
(53, 215, 2390, 'Gremenmania', 'Selling', '2'),
(54, 216, 2539, 'Donny BT', 'Listing', '2.5'),
(55, 217, 6496, 'Pocong', 'Listing', '2.5'),
(56, 218, 2546, 'Pocong 2', 'Selling', '2.5');

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(12) NOT NULL,
  `alamat_komisi` varchar(250) NOT NULL,
  `jt_komisi` varchar(250) NOT NULL,
  `tgl_closing_komisi` date NOT NULL,
  `mar_listing_komisi` int(250) NOT NULL,
  `mar_listing2_komisi` int(250) NOT NULL,
  `mar_selling_komisi` int(250) NOT NULL,
  `mar_selling2_komisi` int(250) NOT NULL,
  `bruto_komisi` varchar(250) NOT NULL,
  `waktu_komisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_listing2_komisi`, `mar_selling_komisi`, `mar_selling2_komisi`, `bruto_komisi`, `waktu_komisi`) VALUES
(207, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 2, 0, 3, 0, '6000000', '2023-10-06'),
(208, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 2, 0, 3, 7, '6000000', '2023-10-06'),
(209, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 2, 0, 2, 0, '6000000', '2023-10-06'),
(210, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 9, 10, 2, 0, '6000000', '2023-10-06'),
(211, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 9, 10, 2, 11, '6000000', '2023-10-06'),
(213, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 9, 0, 5792, 0, '6000000', '2023-10-06'),
(214, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 3563, 0, 2, 0, '6000000', '2023-10-06'),
(215, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 7, 10, 2390, 0, '6000000', '2023-10-06'),
(216, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-11', 2539, 0, 2, 11, '6000000', '2023-10-06'),
(217, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-10-08', 6496, 0, 2, 3, '6200000', '2023-10-06'),
(218, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-10-08', 2, 3, 2546, 0, '6200000', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id_mar` int(50) NOT NULL,
  `nama_mar` varchar(50) NOT NULL,
  `nomor_mar` varchar(250) NOT NULL,
  `member_mar` varchar(250) NOT NULL,
  `upline_emd_mar` varchar(50) NOT NULL,
  `upline_cmo_mar` varchar(50) NOT NULL,
  `npwp_mar` varchar(250) NOT NULL,
  `norek_mar` varchar(250) NOT NULL,
  `fasilitas_mar` varchar(250) NOT NULL,
  `jabatan_mar` varchar(250) NOT NULL,
  `gambar_ktp_mar` varchar(250) NOT NULL,
  `gambar_npwp_mar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id_mar`, `nama_mar`, `nomor_mar`, `member_mar`, `upline_emd_mar`, `upline_cmo_mar`, `npwp_mar`, `norek_mar`, `fasilitas_mar`, `jabatan_mar`, `gambar_ktp_mar`, `gambar_npwp_mar`) VALUES
(2, 'Henny', 'AA001', 'Gold Express', '9', '3', '', 'BCA-6730311638 (Henny)', '', '', '', '3.jpg'),
(3, 'Jonatan / Lydia', 'AA002', 'Silver', '', '', '', 'BCA-0100359723 (Lydia Susanto)', '', '', '', '1.jpg'),
(7, 'Purnomo', 'AA004', 'Prime Pro', '3', '10', '', '78654 - Purnomo', '', '', '', ''),
(9, 'Yenny', 'AA005', 'Black Jack', '3', '', '', 'BCA-89897899 - Yenny', '', '', '10.jpg', '9.jpg'),
(10, 'Julia / Jeffy', 'AA006', 'Silver', '', '3', '', '9090 - Julia Jeffy', '', '', '', ''),
(11, 'Claudia', 'AA007', 'Gold Express', '10', '9', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', '', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(250) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `pass_pengguna` varchar(250) NOT NULL,
  `level_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username_pengguna`, `pass_pengguna`, `level_pengguna`) VALUES
(1, 'Rohman', 'rohman', '2397977a0e43fb1f5ee26fe993674b5b', 'Administrator'),
(4, 'Julia', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0', 'CMO');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `keterangan_potongan` varchar(250) NOT NULL,
  `jumlah_potongan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `id_komisi`, `keterangan_potongan`, `jumlah_potongan`) VALUES
(33, 217, 'Biaya Pengiriman', '100000'),
(34, 218, 'Biaya Pengiriman', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id_referal` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `keterangan_referal` varchar(250) NOT NULL,
  `jenis_referal` int(250) NOT NULL,
  `jumlah_referal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referal`
--

INSERT INTO `referal` (`id_referal`, `id_komisi`, `keterangan_referal`, `jenis_referal`, `jumlah_referal`) VALUES
(4, 217, 'Catenary', 0, '100000'),
(5, 218, 'Catenary', 0, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `sub_komisi`
--

CREATE TABLE `sub_komisi` (
  `id_sub_komisi` int(12) NOT NULL,
  `id_komisi` int(12) NOT NULL,
  `mm_listing_komisi` int(250) NOT NULL,
  `npwpm_listing_komisi` int(250) NOT NULL,
  `npwpum_listing_komisi` int(250) NOT NULL,
  `npwpum_listing2_komisi` int(250) NOT NULL,
  `mm2_listing_komisi` int(250) NOT NULL,
  `npwpm2_listing_komisi` int(250) NOT NULL,
  `npwpum2_listing_komisi` int(250) NOT NULL,
  `npwpum2_listing2_komisi` int(250) NOT NULL,
  `mm_selling_komisi` int(250) NOT NULL,
  `npwpm_selling_komisi` int(250) NOT NULL,
  `npwpum_selling_komisi` int(250) NOT NULL,
  `npwpum_selling2_komisi` int(250) NOT NULL,
  `mm2_selling_komisi` int(250) NOT NULL,
  `npwpm2_selling_komisi` int(250) NOT NULL,
  `npwpum2_selling_komisi` int(250) NOT NULL,
  `npwpum2_selling2_komisi` int(250) NOT NULL,
  `admin_pengguna` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `npwpum_listing2_komisi`, `mm2_listing_komisi`, `npwpm2_listing_komisi`, `npwpum2_listing_komisi`, `npwpum2_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `npwpum_selling2_komisi`, `mm2_selling_komisi`, `npwpm2_selling_komisi`, `npwpum2_selling_komisi`, `npwpum2_selling2_komisi`, `admin_pengguna`) VALUES
(106, 207, 60, 1, 1, 1, 0, 0, 0, 0, 50, 1, 0, 0, 0, 0, 0, 0, 1),
(107, 208, 60, 1, 1, 1, 0, 0, 0, 0, 50, 1, 0, 0, 70, 0, 1, 0, 1),
(108, 209, 60, 1, 1, 1, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1),
(109, 210, 80, 1, 1, 0, 50, 0, 0, 1, 60, 1, 1, 1, 0, 0, 0, 0, 1),
(110, 211, 80, 1, 1, 0, 50, 0, 0, 1, 60, 1, 1, 1, 60, 1, 0, 1, 1),
(112, 213, 80, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(113, 214, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1),
(114, 215, 70, 0, 1, 0, 50, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(115, 216, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 1, 60, 1, 0, 1, 1),
(116, 217, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 1, 50, 1, 0, 0, 1),
(117, 218, 60, 1, 1, 1, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `co_broke`
--
ALTER TABLE `co_broke`
  ADD PRIMARY KEY (`id_cobroke`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `mar_listing_komisi` (`mar_listing_komisi`),
  ADD KEY `mar_selling_komisi` (`mar_selling_komisi`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id_referal`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indexes for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD PRIMARY KEY (`id_sub_komisi`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `co_broke`
--
ALTER TABLE `co_broke`
  MODIFY `id_cobroke` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id_referal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `co_broke`
--
ALTER TABLE `co_broke`
  ADD CONSTRAINT `co_broke_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `potongan`
--
ALTER TABLE `potongan`
  ADD CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referal`
--
ALTER TABLE `referal`
  ADD CONSTRAINT `referal_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD CONSTRAINT `sub_komisi_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
