-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2023 pada 08.19
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
-- Struktur dari tabel `co_broke`
--

CREATE TABLE `co_broke` (
  `id_cobroke` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `nama_cobroke` varchar(250) NOT NULL,
  `status_cobroke` varchar(250) NOT NULL,
  `jenis_cobroke` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `co_broke`
--

INSERT INTO `co_broke` (`id_cobroke`, `id_komisi`, `nama_cobroke`, `status_cobroke`, `jenis_cobroke`) VALUES
(12, 133, '', 'Tidak Ada', ''),
(13, 134, '', 'Tidak Ada', ''),
(14, 135, 'Kucing', 'Listing', '2'),
(15, 136, 'Fandi', 'Listing', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(12) NOT NULL,
  `alamat_komisi` varchar(250) NOT NULL,
  `jt_komisi` varchar(250) NOT NULL,
  `tgl_closing_komisi` date NOT NULL,
  `mar_listing_komisi` varchar(500) NOT NULL,
  `mar_listing2_komisi` varchar(500) NOT NULL,
  `mar_selling_komisi` varchar(500) NOT NULL,
  `mar_selling2_komisi` varchar(500) NOT NULL,
  `bruto_komisi` varchar(250) NOT NULL,
  `waktu_komisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_listing2_komisi`, `mar_selling_komisi`, `mar_selling2_komisi`, `bruto_komisi`, `waktu_komisi`) VALUES
(133, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-09-20', '2', '', '3', '', '3800000', '2023-09-30'),
(134, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Sewa', '2023-09-19', '2', '7', '3', '9', '68781750', '2023-09-30'),
(135, 'Jl. Darmo Indah Selatan KK 50, Surabaya 6', 'Jual/Sewa', '2023-09-20', 'Kucing', '', '2', '3', '2500000', '2023-09-30'),
(136, ' Jl. Dr. Sutomo No. 41, Surabaya', 'Sewa', '2023-09-17', 'Fandi', '', '3', '11', '24250000', '2023-09-30');

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
(2, 'Henny', 'AA001', 'Gold Express', '9', '3', '', 'BCA-6730311638 (HENNY)', '', '', '', '3.jpg'),
(3, 'Jonatan / Lydia', 'AA002', 'Silver', '', '', '', 'BCA-0100359723 (LYDIA SUSANTO)', '', '', '', '1.jpg'),
(7, 'Purnomo', 'AA004', 'Prime Pro', '3', '', '', '78654 - Purnomo', '', '', '', ''),
(9, 'Yenny', 'AA005', 'Black Jack', '3', '', '', 'BCA-89897899 - Yenny', '', '', '', ''),
(10, 'Julia / Jeffy', 'AA006', 'Silver', '', '', '', '9090 - Julia Jeffy', '', '', '', ''),
(11, 'Claudia', 'AA007', 'Gold Express', '10', '', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(250) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `pass_pengguna` varchar(250) NOT NULL,
  `level_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username_pengguna`, `pass_pengguna`, `level_pengguna`) VALUES
(1, 'Rohman', 'rohman', '2397977a0e43fb1f5ee26fe993674b5b', 'Administrator'),
(4, 'Julia', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0', 'CMO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `keterangan_potongan` varchar(250) NOT NULL,
  `jumlah_potongan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `id_komisi`, `keterangan_potongan`, `jumlah_potongan`) VALUES
(12, 133, '', ''),
(13, 134, '', ''),
(14, 135, '', ''),
(15, 136, '', '');

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
-- Dumping data untuk tabel `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `npwpum_listing2_komisi`, `mm2_listing_komisi`, `npwpm2_listing_komisi`, `npwpum2_listing_komisi`, `npwpum2_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `npwpum_selling2_komisi`, `mm2_selling_komisi`, `npwpm2_selling_komisi`, `npwpum2_selling_komisi`, `npwpum2_selling2_komisi`, `admin_pengguna`) VALUES
(36, 133, 60, 1, 0, 1, 0, 0, 0, 0, 50, 1, 0, 0, 0, 0, 0, 0, 1),
(37, 134, 60, 1, 0, 1, 70, 0, 1, 0, 50, 1, 0, 0, 80, 0, 1, 0, 1),
(38, 135, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 0, 1, 50, 1, 0, 0, 1),
(39, 136, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 0, 0, 60, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  ADD PRIMARY KEY (`id_cobroke`),
  ADD KEY `id_komisi` (`id_komisi`);

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
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`),
  ADD KEY `id_komisi` (`id_komisi`);

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
-- AUTO_INCREMENT untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  MODIFY `id_cobroke` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  ADD CONSTRAINT `co_broke_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD CONSTRAINT `sub_komisi_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
