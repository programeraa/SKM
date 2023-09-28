-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 02:20 PM
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
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(12) NOT NULL,
  `alamat_komisi` varchar(250) NOT NULL,
  `jt_komisi` varchar(250) NOT NULL,
  `tgl_closing_komisi` date NOT NULL,
  `mar_listing_komisi` int(50) NOT NULL,
  `mar_selling_komisi` int(50) NOT NULL,
  `bruto_komisi` varchar(250) NOT NULL,
  `waktu_komisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_selling_komisi`, `bruto_komisi`, `waktu_komisi`) VALUES
(42, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-09-19', 2, 3, '3800000', '2023-09-28');

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
(2, 'Henny', 'AA001', 'Gold Express', '9', '3', '', 'BCA-6730311638 (HENNY)', '', '', '', 'Apa_Itu_Teknologi_VPN,_Definisi,_Cara_Kerja_Hingga_Manfaat_VPN.png'),
(3, 'Jonatan / Lydia', 'AA002', 'Silver', '', '', '', 'BCA-0100359723 (LYDIA SUSANTO)', '', '', '', 'pexels-stefan-coders-2064586.jpg'),
(7, 'Purnomo', 'AA004', 'Prime Pro', '3', '', '', '78654 - Purnomo', '', '', 'Buat_Daftar_Tugas.jpg', 'Rencanakan_Jadwal_Harian.jpg'),
(9, 'Yenny', 'AA005', 'Black Jack', '3', '', '', 'BCA-89897899 - Yenny', '', '', '', ''),
(10, 'Julia / Jeffy', 'AA006', 'Silver', '', '', '', '9090 - Julia Jeffy', '', '', '', ''),
(11, 'Claudia', 'AA007', 'Gold Express', '10', '', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', '', '');

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
  `mm_selling_komisi` int(250) NOT NULL,
  `npwpm_selling_komisi` int(250) NOT NULL,
  `npwpum_selling_komisi` int(250) NOT NULL,
  `npwpum_selling2_komisi` int(250) NOT NULL,
  `admin_pengguna` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `npwpum_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `npwpum_selling2_komisi`, `admin_pengguna`) VALUES
(24, 42, 60, 1, 0, 1, 50, 1, 0, 0, 4);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD PRIMARY KEY (`id_sub_komisi`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD CONSTRAINT `sub_komisi_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
