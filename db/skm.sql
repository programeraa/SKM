-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2023 pada 04.39
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
(283, 'Grand Sungkono Lagoon Tower Venetian Unit 3708', 'Sewa', '2023-08-08', 2, 0, 2, 0, '3800000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(284, 'Apartemen Grand Sungkono Lagoon Tower Venetian Unit 2801', 'Sewa', '2023-08-01', 1091, 0, 2, 0, '5000000', '2023-10-13', '0000-00-00', 'Belum Disetujui'),
(285, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-06-26', 2, 0, 11, 0, '68781750', '2023-10-13', '2023-10-24', 'Disetujui'),
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
(2, 'Henny', 'AA0005', 'Gold Express', '9', '3', '', 'BCA-6730311638 (Henny)', '', '', 'ktp.png', 'npwp.png'),
(3, 'Jonatan / Lydia', 'AA0271', 'Silver', '', '', '', 'BCA-0100359723 (Lydia Susanto)', '', '', 'ktp1.png', 'npwp1.png'),
(7, 'Purnomo', 'AA0445', 'Silver', '3', '', '', 'BCA-3681745040 - Purnomo', '', '', 'ktp2.png', 'npwp2.png'),
(9, 'Yenny', 'AA0065', 'Silver', '39', '', '', 'BCA-8290541221 - Yenny', '', '', 'ktp3.png', 'npwp3.png'),
(10, 'Julia / Jeffy', 'AA0053', 'Silver', '39', '', '', 'BCA-7880384320 - Julia/Jeffry', '', '', 'ktp4.png', 'npwp4.png'),
(11, 'Claudia', 'AA0008', 'Prime Pro', '10', '', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', '', 'ktp6.png', 'npwp6.png'),
(35, 'Ang', 'AA0007', 'Silver', '39', '', '', 'BCA 472-018-1717 (Anggraini Angkawidjaya)', '', '', 'ktp7.png', 'npwp7.png'),
(36, 'Fran', 'AA0009', 'Silver', '35', '', '', 'BCA-102 031 4776 - (Fransiska)', '', '', 'ktp8.png', 'npwp8.png'),
(37, 'Winata', 'AA0207', 'Silver', '35', '', '', 'BCA 018-365-6161 (Winata Ciputra)', '', '', 'ktp9.png', 'npwp9.png'),
(38, 'Ang/Fran/Win', 'AA0013', 'Silver', '', '', '', '-', '', '', '', ''),
(39, 'Gun', 'AA0001', 'Silver', '', '', '', 'BCA-4631 91 0022 - Gunawan', '', '', 'ktp5.png', 'npwp5.png'),
(40, 'Ana', 'AA0002', 'Silver', '39', '', '', 'BCA-4632 91 0011 - Ana', '', '', 'ktp10.png', 'npwp10.png'),
(41, 'Johan', 'AA0399', 'Silver', '39', '', '', 'Belum Ada', '', '', 'ktp11.png', 'npwp11.png'),
(42, 'Yuhuu / Ani', 'AA0387', 'Silver', '10', '', '', 'Belum Ada', '', '', 'ktp12.png', 'npwp12.png'),
(43, 'Handoko', 'AA0293', 'Silver', '48', '', '', 'BCA-2581421241 - Handoko Angkasastro', '', '', 'ktp13.png', 'npwp13.png'),
(44, 'Ersiana', 'AA0447', 'Silver', '48', '', '', 'BCA-0871216711 - Ersiana', '', '', 'ktp14.png', 'npwp14.png'),
(45, 'Albert / Monic', 'AA0148', 'Silver', '', '', '', 'BCA-5060198791 - Albert / Monic', '', '', 'ktp15.png', 'npwp15.png'),
(46, 'Budi', 'AA0418', 'Silver', '10', '', '', 'Belum Ada', '', '', 'ktp16.png', 'npwp16.png'),
(47, 'Ibnu Chandra / Sherla', 'AA0075', 'Silver', '', '', '', 'BCA-5085007308 - Ibnu Chandra', '', '', 'ktp17.png', 'npwp17.png'),
(48, 'Indri', 'AA0064', 'Silver', '', '', '', 'BCA-8290693021 - Indri', '', '', 'ktp18.png', 'npwp18.png'),
(49, 'Lily Tan', ' AA0080', 'Silver', '48', '', '', 'BCA-6720460708 - Lily Tan', '', '', 'ktp19.png', 'npwp19.png'),
(50, 'Dyah CA', 'AA00402', 'Silver', '', '', '', 'Belum Ada', '', '', 'ktp20.png', 'npwp20.png'),
(51, 'Indrawati Prajogo', 'AA0429', 'Silver', '48', '', '', '	BCA-6720144717 - Indrawati Prajogo', '', '', 'ktp21.png', 'npwp21.png'),
(52, 'Mariana', 'AA0378', 'Silver', '10', '', '', 'BCA-1011397447 - Maria Yuliawati', '', '', 'ktp22.png', 'npwp22.png'),
(53, 'Ghary / Yoan', 'AA0311', 'Silver', '', '', '', 'BCA-8220334881 - Ghary Yoan', '', '', 'ktp23.png', 'npwp23.png'),
(54, 'Jonny Gunawan', 'AA0350', 'Silver', '', '', '', 'BCA-8220726755 - Jonny Gunawan', '', '', 'ktp24.png', 'npwp24.png'),
(55, 'Ida / Boyong', 'AA0440', 'Silver', '', '', '', 'BCA-6720576293 - Geertruida Margaretha', '', '', 'ktp25.png', 'npwp25.png'),
(56, 'Teryan / Bian', 'AA0446', 'Silver', '35', '', '', 'BCA-4641255437 - Teryan Bian', '', '', 'ktp26.png', 'npwp26.png'),
(57, 'Aditya', 'AA0430', 'Silver', '54', '', '', 'BCA-6965071290 - Aditya Risqi Putra', '', '', 'ktp27.png', 'npwp27.png'),
(58, 'Aming Go', 'AA0196', 'Silver', '', '', '', 'BCA-675 0220 353 - Aming', '', '', 'ktp28.png', 'npwp28.png'),
(59, 'Mery', 'AA0452', 'Silver', '', '', '', 'Belum Ada', '', '', 'ktp29.png', 'npwp29.png'),
(60, 'Inata', 'AA0436', 'Silver', '41', '', '', 'BCA-2582093009 - Inata', '', '', 'ktp30.png', 'npwp30.png'),
(61, 'Aghata', 'AA0444', 'Silver', '60', '', '', 'BCA-6750379441 - Nathania Agatha Benita', '', '', 'ktp31.png', 'npwp31.png'),
(62, 'Syauqi', 'AA0305', 'Silver', '65', '', '', 'BCA Syariah-0050061977 - Qomarul Fata Assyauqi', '', '', 'ktp32.png', 'npwp32.png'),
(63, 'Deddy Tansen', 'AA0453', 'Silver', '', '', '', 'Belum Ada', '', '', 'ktp33.png', 'npwp33.png'),
(64, 'Naning', 'AA0454', 'Silver', '', '', '', 'Belum Ada', '', '', 'ktp34.png', 'npwp34.png'),
(65, 'Anita / Steven', 'AA0070', 'Silver', '48', '', '', 'BCA-6720334061 - Anita Steven', '', '', 'ktp35.png', 'npwp35.png'),
(66, 'Vonny C', 'AA0337', 'Silver', '48', '', '', 'Belum Ada', '', '', 'ktp36.png', 'npwp36.png'),
(67, 'Hokky', 'AA0210', 'Silver', '47', '', '', 'BCA-0180670904 - Hokky Gunawan', '', '', 'ktp37.png', 'npwp37.png'),
(68, 'Tristya', 'AA0438', 'Silver', '10', '', '', 'BCA-8630299242 - Novan Hari Tristya', '', '', 'ktp38.png', 'npwp38.png'),
(69, 'Nita', 'AA0456', 'Silver', '', '', '', 'Belum Ada', '', '', 'ktp39.png', 'npwp39.png'),
(70, 'Owen', 'AA0419', 'Silver', '', '', '', 'Mandiri - 1410019762400 - Jordan Yuseno Putra', '', '', 'ktp40.png', 'npwp40.png'),
(71, 'Yanes / Nira', 'AA0264', 'Silver', '', '', '', 'BCA-0885931265 - Yanes Nira', '', '', 'ktp41.png', 'npwp41.png');

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
(4, 'Julia', 'julia', 'c2e285cb33cecdbeb83d2189e983a8c0', 'ttd_baru.jpg', 'CMO'),
(10, 'Risca', 'risca', 'f5787529cb944fa9600457d30438d20d', 'ttd_baru1.jpg', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurangan_fee`
--

CREATE TABLE `pengurangan_fee` (
  `id_pengurangan` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL,
  `id_marketing` int(250) NOT NULL,
  `keterangan_pengurangan` varchar(250) NOT NULL,
  `jumlah_pengurangan` int(250) NOT NULL,
  `status_pengurangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurangan_fee`
--

INSERT INTO `pengurangan_fee` (`id_pengurangan`, `id_komisi`, `id_marketing`, `keterangan_pengurangan`, `jumlah_pengurangan`, `status_pengurangan`) VALUES
(16, 285, 2, 'Pengiriman Kucing', 50000, 'Listing'),
(24, 291, 9, 'Beli Banner 3', 5000, 'Listing 2'),
(25, 291, 11, 'Beli Banner 4', 54375, 'Selling 2'),
(30, 290, 35, 'Pengiriman Biawak 1', 7188, 'Selling 2'),
(31, 290, 36, 'Pengiriman Biawak 2', 97188, 'Selling 2'),
(33, 290, 2, 'ada aja', 25000, 'Selling');

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
(182, 283, 60, 1, 1, 1, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1, 0),
(183, 284, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 1, 0, 0, 0, 0, 1, 0),
(184, 285, 50, 1, 1, 1, 0, 0, 0, 0, 60, 1, 1, 0, 0, 0, 0, 0, 1, 4),
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
-- Indeks untuk tabel `pengurangan_fee`
--
ALTER TABLE `pengurangan_fee`
  ADD PRIMARY KEY (`id_pengurangan`),
  ADD KEY `id_komisi` (`id_komisi`);

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
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengurangan_fee`
--
ALTER TABLE `pengurangan_fee`
  MODIFY `id_pengurangan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- Ketidakleluasaan untuk tabel `pengurangan_fee`
--
ALTER TABLE `pengurangan_fee`
  ADD CONSTRAINT `pengurangan_fee_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
