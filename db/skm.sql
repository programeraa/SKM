-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2023 pada 10.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

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
-- Struktur dari tabel `komisi`
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
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_selling_komisi`, `bruto_komisi`, `waktu_komisi`) VALUES
(32, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya A', 'Sewa', '2023-09-06', 2, 3, '3800000', '2023-09-26'),
(33, 'Jl. Darmo Indah Selatan KK 50, Surabaya', 'Jual', '2023-09-08', 13, 13, '2500000', '2023-09-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketing`
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
-- Dumping data untuk tabel `marketing`
--

INSERT INTO `marketing` (`id_mar`, `nama_mar`, `nomor_mar`, `member_mar`, `upline_emd_mar`, `upline_cmo_mar`, `npwp_mar`, `norek_mar`, `fasilitas_mar`, `jabatan_mar`, `gambar_ktp_mar`, `gambar_npwp_mar`) VALUES
(2, 'Henny', 'AA001', 'Gold Express', '9', '3', '1.0.0', 'BCA-6730311638 (HENNY)', '', '', '', ''),
(3, 'Jonatan / Lydia', 'AA002', 'Silver', '', '', '5.9.0 - Jonatan', 'BCA-0100359723 (LYDIA SUSANTO)', '', '', '', ''),
(7, 'Purnomo', 'AA004', 'Prime Pro', '3', '', '', '78654 - Purnomo', '', '', '', ''),
(9, 'Yenny', 'AA005', 'Black Jack', '3', '', '5.7.8 - Yenny', 'BCA-89897899 - Yenny', '', '', '', ''),
(10, 'Julia / Jeffy', 'AA006', 'Silver', '', '', '1', '9090 - Julia Jeffy', '', '', '', ''),
(11, 'Claudia', 'AA007', 'Gold Express', '10', '', '6.9.8', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', '', ''),
(27, 'Rohman', 'AA007', 'Gold Express', '', '', '', '', '', '', 'Bagaimana_Peran_Mitra_Agen_Properti1.jpg', ''),
(28, 'Henny R', 'AA007', 'Prime Pro', '', '', '', '', '', '', '', 'Kesuksesan_Terwujud_Datang_dari_Kerjasama_yang_Terbaik1.jpg'),
(29, 'Fandi', 'AA008', 'Gold Express', '', '', '', '', '', '', 'Memenuhi_Kebutuhan_Anda.jpg', 'Status_Sebagai_Agen2.jpg'),
(30, 'Azril', 'AA006', 'Prime Pro', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_komisi`
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
  `npwpum_selling2_komisi` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `npwpum_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `npwpum_selling2_komisi`) VALUES
(15, 32, 60, 1, 1, 1, 50, 1, 0, 0),
(16, 33, 70, 1, 0, 1, 70, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `mar_listing_komisi` (`mar_listing_komisi`),
  ADD KEY `mar_selling_komisi` (`mar_selling_komisi`);

--
-- Indeks untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indeks untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD PRIMARY KEY (`id_sub_komisi`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD CONSTRAINT `sub_komisi_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
