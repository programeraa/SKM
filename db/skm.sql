-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2023 pada 10.54
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
  `id_komisi_unik` int(250) NOT NULL,
  `nama_cobroke` varchar(250) NOT NULL,
  `status_cobroke` varchar(250) NOT NULL,
  `jenis_cobroke` varchar(250) NOT NULL,
  `persen_komisi_cobroke` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `co_broke`
--

INSERT INTO `co_broke` (`id_cobroke`, `id_komisi`, `id_komisi_unik`, `nama_cobroke`, `status_cobroke`, `jenis_cobroke`, `persen_komisi_cobroke`) VALUES
(79, 284, 1091, 'Evvy-BT', 'Listing', '2', 50),
(80, 286, 8642, 'Hartini - BT', 'Selling', '2', 50),
(81, 287, 4147, 'TOMI BRIGHTON JEMURSARI', 'Selling', '0', 50),
(82, 290, 6118, 'Brighton', 'Listing', '2', 50),
(83, 293, 8731, 'Bramastyo', 'Listing', '3', 60),
(84, 294, 9138, 'Fandi Ahmad Maulana', 'Selling', '3', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
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
  `waktu_komisi` date NOT NULL,
  `tgl_disetujui` date NOT NULL,
  `status_komisi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_listing2_komisi`, `mar_selling_komisi`, `mar_selling2_komisi`, `bruto_komisi`, `waktu_komisi`, `tgl_disetujui`, `status_komisi`) VALUES
(283, 'Grand Sungkono Lagoon Tower Venetian Unit 3708', 'Sewa', '2023-08-08', 2, 0, 2, 0, '3800000', '2023-10-13', '2023-10-17', 'Disetujui'),
(284, 'Apartemen Grand Sungkono Lagoon Tower Venetian Unit 2801', 'Sewa', '2023-08-01', 1091, 0, 2, 0, '5000000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(285, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-06-26', 2, 0, 11, 0, '68781750', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(286, 'Woodland Blok WL No. 5 Citraland, Surabaya', 'Jual', '2023-08-04', 11, 0, 8642, 0, '50000000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(287, 'JL. Manyar Rejo X/39, Surabaya', 'Jual', '2023-09-28', 38, 0, 4147, 0, '25000000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(288, 'Raya Darmo Permai I No. 60, Surabaya', 'Sewa', '2023-08-29', 11, 0, 11, 0, '16500000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(289, ' Jl. Raya Dukuh Kupang 39A, Surabaya ', 'Sewa', '2023-08-12', 7, 10, 11, 0, '12050000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(290, 'Jl. Darmo Indah Selatan KK 50, Surabaya', 'Jual/Sewa', '2023-10-16', 6118, 0, 2, 38, '25000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(291, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-12', 3, 9, 10, 11, '50000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(292, 'Jl. Dukuh Kupang XXIII, No 2, Surabaya', 'Jual', '2023-10-12', 38, 0, 38, 0, '10000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(293, 'Desa Compreng, Widang, Tuban', 'Jual', '2023-10-14', 8731, 0, 38, 0, '12000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(294, 'Compreng, Widang, Tuban', 'Jual', '2023-10-10', 2, 3, 9138, 0, '10000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(295, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-13', 11, 38, 2, 9, '52000000', '2023-10-16', '0000-00-00', 'Belum Disetujui'),
(300, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-13', 11, 38, 2, 9, '52000000', '2023-10-16', '0000-00-00', 'Belum Disetujui');

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
(2, 'Henny', 'AA001', 'Silver', '9', '3', '', 'BCA-6730311638 (Henny)', '', '', '', '3.jpg'),
(3, 'Jonatan / Lydia', 'AA002', 'Silver', '', '', '', 'BCA-0100359723 (Lydia Susanto)', '', '', '', '1.jpg'),
(7, 'Purnomo', 'AA004', 'Prime Pro', '3', '10', '', '78654 - Purnomo', '', '', '', ''),
(9, 'Yenny', 'AA005', 'Black Jack', '3', '', '', 'BCA-89897899 - Yenny', '', '', '10.jpg', '9.jpg'),
(10, 'Julia / Jeffy', 'AA006', 'Silver', '', '', '', '9090 - Julia Jeffy', '', '', '', 'yanes_nira_used1.png'),
(11, 'Claudia', 'AA007', 'Prime Pro', '10', '', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', '', '6.jpg'),
(35, 'Ang', 'AA0010', 'Silver', '10', '', '', 'BCA 472-018-1717 (Anggraini Angkawidjaya)', '', '', '', 'yanes_nira_used.png'),
(36, 'Fran', 'AA0011', 'Silver', '35', '7', '', 'BCA 102-031-4776 (Fransiska)', '', '', '', 'Owen_Used.png'),
(37, 'Winata', 'AA0012', 'Silver', '35', '', '', 'BCA 018-365-6161 (Winata Ciputra)', '', '', '', 'yanes_nira_used2.png'),
(38, 'Ang/Fran/Win', 'AA0013', 'Silver', '', '', '', '-', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(250) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `pass_pengguna` varchar(250) NOT NULL,
  `gambar_ttd_pengguna` varchar(250) NOT NULL,
  `level_pengguna` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username_pengguna`, `pass_pengguna`, `gambar_ttd_pengguna`, `level_pengguna`) VALUES
(1, 'Rohman', 'rohman', '2397977a0e43fb1f5ee26fe993674b5b', 'ttd_ku_baru.jpg', 'Administrator'),
(4, 'Julia', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0', '', 'CMO'),
(6, 'Fandi', 'fandi', '9bb773615bccfc87168aa059884ca038', 'image_amC.png', 'Administrator'),
(9, 'Henny R', 'gun', '5161ebb0cce4b7987ba8b6935d60a180', '8-TKgm4cgncXgwpL4_(1).png', 'CMO');

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
(53, 288, 'Biaya Lainnya', '500000'),
(54, 289, 'Banner ', '50000'),
(55, 293, 'Biaya Pengantaran', '1000000'),
(56, 295, 'Banner', '500000'),
(61, 300, 'Banner ', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `referal`
--

CREATE TABLE `referal` (
  `id_referal` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `keterangan_referal` varchar(250) NOT NULL,
  `jumlah_referal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `referal`
--

INSERT INTO `referal` (`id_referal`, `id_komisi`, `keterangan_referal`, `jumlah_referal`) VALUES
(31, 288, 'Rohman', '1000000'),
(32, 289, 'Fandi', '10'),
(33, 290, 'Rohman', '1000000'),
(34, 291, 'Vania', '20'),
(35, 293, 'Gremenmania', '20'),
(36, 294, 'Stefano', '1000000'),
(37, 295, 'Stefano', '1500000'),
(42, 300, 'Stefano', '1500000');

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
  `admin_pengguna` int(250) NOT NULL,
  `admin_status_komisi` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `npwpum_listing2_komisi`, `mm2_listing_komisi`, `npwpm2_listing_komisi`, `npwpum2_listing_komisi`, `npwpum2_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `npwpum_selling2_komisi`, `mm2_selling_komisi`, `npwpm2_selling_komisi`, `npwpum2_selling_komisi`, `npwpum2_selling2_komisi`, `admin_pengguna`, `admin_status_komisi`) VALUES
(182, 283, 60, 1, 1, 1, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1, 1),
(183, 284, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1, 0),
(184, 285, 50, 1, 1, 1, 0, 0, 0, 0, 60, 1, 1, 0, 0, 0, 0, 0, 1, 0),
(185, 286, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(186, 287, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(187, 288, 70, 1, 1, 0, 0, 0, 0, 0, 70, 1, 1, 0, 0, 0, 0, 0, 1, 0),
(188, 289, 70, 0, 1, 1, 50, 1, 0, 0, 70, 1, 1, 0, 0, 0, 0, 0, 1, 0),
(189, 290, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 1, 1, 50, 0, 0, 0, 1, 0),
(190, 291, 50, 1, 0, 0, 80, 1, 1, 0, 50, 1, 0, 0, 70, 1, 1, 0, 1, 0),
(191, 292, 50, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(192, 293, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(193, 294, 50, 1, 1, 1, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(194, 295, 70, 1, 1, 0, 50, 0, 0, 0, 50, 1, 1, 1, 80, 1, 1, 0, 1, 0),
(199, 300, 70, 1, 1, 0, 50, 0, 0, 0, 50, 1, 1, 1, 80, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_komisi_afw`
--

CREATE TABLE `sub_komisi_afw` (
  `id_afw` int(250) NOT NULL,
  `id_sub_komisi` int(250) NOT NULL,
  `m_ang` int(250) NOT NULL,
  `npwp_ang` int(250) NOT NULL,
  `npwp_up_ang` int(250) NOT NULL,
  `npwp_up2_ang` int(250) NOT NULL,
  `m_fran` int(250) NOT NULL,
  `npwp_fran` int(250) NOT NULL,
  `npwp_up_fran` int(250) NOT NULL,
  `npwp_up2_fran` int(250) NOT NULL,
  `m_win` int(250) NOT NULL,
  `npwp_win` int(250) NOT NULL,
  `npwp_up_win` int(250) NOT NULL,
  `npwp_up2_win` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_komisi_afw`
--

INSERT INTO `sub_komisi_afw` (`id_afw`, `id_sub_komisi`, `m_ang`, `npwp_ang`, `npwp_up_ang`, `npwp_up2_ang`, `m_fran`, `npwp_fran`, `npwp_up_fran`, `npwp_up2_fran`, `m_win`, `npwp_win`, `npwp_up_win`, `npwp_up2_win`) VALUES
(6, 186, 50, 1, 1, 0, 60, 1, 1, 0, 60, 1, 1, 0),
(7, 191, 50, 1, 1, 0, 50, 1, 1, 0, 50, 1, 1, 0),
(8, 192, 50, 1, 1, 0, 50, 1, 1, 0, 50, 1, 1, 0),
(9, 199, 50, 1, 1, 0, 50, 1, 1, 0, 50, 1, 1, 0);

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
-- Indeks untuk tabel `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id_referal`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indeks untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD PRIMARY KEY (`id_sub_komisi`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indeks untuk tabel `sub_komisi_afw`
--
ALTER TABLE `sub_komisi_afw`
  ADD PRIMARY KEY (`id_afw`),
  ADD KEY `id_sub_komisi` (`id_sub_komisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  MODIFY `id_cobroke` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `referal`
--
ALTER TABLE `referal`
  MODIFY `id_referal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi_afw`
--
ALTER TABLE `sub_komisi_afw`
  MODIFY `id_afw` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Ketidakleluasaan untuk tabel `referal`
--
ALTER TABLE `referal`
  ADD CONSTRAINT `referal_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  ADD CONSTRAINT `sub_komisi_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_komisi_afw`
--
ALTER TABLE `sub_komisi_afw`
  ADD CONSTRAINT `sub_komisi_afw_ibfk_1` FOREIGN KEY (`id_sub_komisi`) REFERENCES `sub_komisi` (`id_sub_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
