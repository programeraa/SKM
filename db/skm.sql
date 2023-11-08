-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2023 pada 10.08
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
-- Struktur dari tabel `jabatan_pengaturan`
--

CREATE TABLE `jabatan_pengaturan` (
  `id_jabatan` int(250) NOT NULL,
  `nama_jabatan` varchar(250) NOT NULL,
  `nilai_jabatan` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan_pengaturan`
--

INSERT INTO `jabatan_pengaturan` (`id_jabatan`, `nama_jabatan`, `nilai_jabatan`) VALUES
(2, 'Marketing Executive (ME)', 3),
(3, 'Executive Marketing Director (EMD)', 5),
(4, 'Chief Marketing Officer (CMO)', 5);

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
  `status_komisi` varchar(250) NOT NULL,
  `status_transfer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_listing2_komisi`, `mar_selling_komisi`, `mar_selling2_komisi`, `bruto_komisi`, `waktu_komisi`, `tgl_disetujui`, `status_komisi`, `status_transfer`) VALUES
(283, 'Grand Sungkono Lagoon Tower Venetian Unit 3708', 'Sewa', '2023-08-08', 2, 0, 2, 0, '3800000', '2023-10-13', '0000-00-00', 'Proses Approve', 'Transfer'),
(284, 'Apartemen Grand Sungkono Lagoon Tower Venetian Unit 2801', 'Sewa', '2023-08-01', 1091, 0, 2, 0, '5000000', '2023-10-13', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(285, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-06-26', 2, 0, 11, 0, '68781750', '2023-10-13', '2023-10-24', 'Approve', 'Proses Transfer'),
(286, 'Woodland Blok WL No. 5 Citraland, Surabaya', 'Jual', '2023-08-04', 11, 0, 8642, 0, '50000000', '2023-10-13', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(287, 'JL. Manyar Rejo X/39, Surabaya', 'Jual', '2023-09-28', 38, 0, 4147, 0, '25000000', '2023-10-13', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(288, 'Raya Darmo Permai I No. 60, Surabaya', 'Sewa', '2023-08-29', 11, 0, 11, 0, '16500000', '2023-10-13', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(289, ' Jl. Raya Dukuh Kupang 39A, Surabaya ', 'Sewa', '2023-08-12', 7, 10, 11, 0, '12050000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(290, 'Jl. Darmo Indah Selatan KK 50, Surabaya', 'Jual/Sewa', '2023-10-16', 6118, 0, 2, 38, '25000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(291, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-12', 3, 9, 10, 11, '50000000', '2023-10-16', '2023-11-08', 'Approve', 'Proses Transfer'),
(292, 'Jl. Dukuh Kupang XXIII, No 2, Surabaya', 'Jual', '2023-10-12', 38, 0, 38, 0, '10000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(293, 'Desa Compreng, Widang, Tuban', 'Jual', '2023-10-14', 8731, 0, 38, 0, '12000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(294, 'Compreng, Widang, Tuban', 'Jual', '2023-10-10', 2, 3, 9138, 0, '10000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(295, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-13', 11, 38, 2, 9, '52000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(300, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-13', 11, 38, 2, 9, '52000000', '2023-10-16', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(301, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual', '2023-10-13', 11, 38, 2, 9, '52000000', '2023-10-26', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(302, 'Tuban 1', 'Sewa', '2023-10-13', 2, 3, 7, 9, '10000000', '2023-10-27', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(303, 'Tuban 2', 'Sewa', '2023-10-13', 2, 3, 7, 9, '10000000', '2023-10-27', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(305, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual/Sewa', '2023-10-12', 0, 11, 7, 38, '10000000', '2023-10-27', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(306, ' Jl. Dr. Sutomo No. 41, Surabaya', 'Jual', '2023-11-01', 2, 0, 2, 0, '10000000', '2023-11-01', '0000-00-00', 'Proses Approve', 'Proses Transfer'),
(307, 'Emerald Mansion TN4 No. 6, Citraland ', 'Jual', '2023-11-03', 2, 0, 2, 0, '51000000', '2023-11-06', '0000-00-00', 'Proses Approve', '');

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
  `norek_mar` varchar(250) NOT NULL,
  `fasilitas_mar` varchar(250) NOT NULL,
  `jabatan_mar` varchar(250) NOT NULL,
  `nilai_jabatan_mar` int(250) NOT NULL,
  `gambar_ktp_mar` varchar(250) NOT NULL,
  `gambar_npwp_mar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `marketing`
--

INSERT INTO `marketing` (`id_mar`, `nama_mar`, `nomor_mar`, `member_mar`, `upline_emd_mar`, `upline_cmo_mar`, `norek_mar`, `fasilitas_mar`, `jabatan_mar`, `nilai_jabatan_mar`, `gambar_ktp_mar`, `gambar_npwp_mar`) VALUES
(2, 'Henny', 'AA0005', 'Gold Express', '9', '3', 'BCA-6730311638 (Henny)', '', 'Executive Marketing Director (EMD)', 5, 'ktp.png', 'npwp.png'),
(3, 'Jonatan / Lydia', 'AA0271', 'Silver', '', '', 'BCA-0100359723 (Lydia Susanto)', '', 'Chief Marketing Officer (CMO)', 5, 'ktp1.png', 'npwp1.png'),
(7, 'Purnomo', 'AA0445', 'Silver', '3', '2', 'BCA-3681745040 - Purnomo', '', 'Marketing Executive (ME)', 3, 'ktp2.png', 'npwp2.png'),
(9, 'Yenny', 'AA0065', 'Silver', '39', '', 'BCA-8290541221 - Yenny', '', 'Marketing Executive (ME)', 3, 'ktp3.png', 'npwp3.png'),
(10, 'Julia / Jeffy', 'AA0053', 'Silver', '39', '', 'BCA-7880384320 - Julia/Jeffry', '', 'Chief Marketing Officer (CMO)', 5, 'ktp4.png', 'npwp4.png'),
(11, 'Claudia', 'AA0008', 'Prime Pro', '10', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', 'Executive Marketing Director (EMD)', 5, 'ktp6.png', 'npwp6.png'),
(35, 'Ang', 'AA0007', 'Silver', '10', '2', 'BCA 472-018-1717 (Anggraini Angkawidjaya)', '', 'Marketing Executive (ME)', 3, 'ktp7.png', 'npwp7.png'),
(36, 'Fran', 'AA0009', 'Silver', '35', '', 'BCA-102 031 4776 - (Fransiska)', '', 'Marketing Executive (ME)', 3, 'ktp8.png', 'npwp8.png'),
(37, 'Winata', 'AA0207', 'Silver', '35', '', 'BCA 018-365-6161 (Winata Ciputra)', '', 'Marketing Executive (ME)', 3, 'ktp9.png', 'npwp9.png'),
(38, 'Ang/Fran/Win', 'AA0013', 'Silver', '', '', '-', '', 'Marketing Executive (ME)', 3, '', ''),
(39, 'Gun', 'AA0001', 'Silver', '', '', 'BCA-4631 91 0022 - Gunawan', '', 'Marketing Executive (ME)', 3, 'ktp5.png', 'npwp5.png'),
(40, 'Ana', 'AA0002', 'Silver', '39', '', 'BCA-4632 91 0011 - Ana', '', 'Marketing Executive (ME)', 3, 'ktp10.png', 'npwp10.png'),
(41, 'Johan', 'AA0399', 'Silver', '39', '', 'Belum Ada', '', 'Chief Marketing Officer (CMO)', 5, 'ktp11.png', 'npwp11.png'),
(42, 'Yuhuu / Ani', 'AA0387', 'Silver', '10', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp12.png', 'npwp12.png'),
(43, 'Handoko', 'AA0293', 'Silver', '48', '', 'BCA-2581421241 - Handoko Angkasastro', '', 'Marketing Executive (ME)', 3, 'ktp13.png', 'npwp13.png'),
(44, 'Ersiana', 'AA0447', 'Silver', '48', '', 'BCA-0871216711 - Ersiana', '', 'Marketing Executive (ME)', 3, 'ktp14.png', 'npwp14.png'),
(45, 'Albert / Monic', 'AA0148', 'Silver', '', '', 'BCA-5060198791 - Albert / Monic', '', 'Marketing Executive (ME)', 3, 'ktp15.png', 'npwp15.png'),
(46, 'Budi', 'AA0418', 'Silver', '10', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp16.png', 'npwp16.png'),
(47, 'Ibnu Chandra / Sherla', 'AA0075', 'Silver', '', '', 'BCA-5085007308 - Ibnu Chandra', '', 'Marketing Executive (ME)', 3, 'ktp17.png', 'npwp17.png'),
(48, 'Indri', 'AA0064', 'Silver', '', '', 'BCA-8290693021 - Indri', '', 'Executive Marketing Director (EMD)', 5, 'ktp18.png', 'npwp18.png'),
(49, 'Lily Tan', ' AA0080', 'Silver', '48', '', 'BCA-6720460708 - Lily Tan', '', 'Marketing Executive (ME)', 3, 'ktp19.png', 'npwp19.png'),
(50, 'Dyah CA', 'AA00402', 'Silver', '', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp20.png', 'npwp20.png'),
(51, 'Indrawati Prajogo', 'AA0429', 'Silver', '48', '', '	BCA-6720144717 - Indrawati Prajogo', '', 'Marketing Executive (ME)', 3, 'ktp21.png', 'npwp21.png'),
(52, 'Mariana', 'AA0378', 'Silver', '10', '', 'BCA-1011397447 - Maria Yuliawati', '', 'Marketing Executive (ME)', 3, 'ktp22.png', 'npwp22.png'),
(53, 'Ghary / Yoan', 'AA0311', 'Silver', '', '', 'BCA-8220334881 - Ghary Yoan', '', 'Marketing Executive (ME)', 3, 'ktp23.png', 'npwp23.png'),
(54, 'Jonny Gunawan', 'AA0350', 'Silver', '', '', 'BCA-8220726755 - Jonny Gunawan', '', 'Marketing Executive (ME)', 3, 'ktp24.png', 'npwp24.png'),
(55, 'Ida / Boyong', 'AA0440', 'Silver', '', '', 'BCA-6720576293 - Geertruida Margaretha', '', 'Marketing Executive (ME)', 3, 'ktp25.png', 'npwp25.png'),
(56, 'Teryan / Bian', 'AA0446', 'Silver', '35', '', 'BCA-4641255437 - Teryan Bian', '', 'Marketing Executive (ME)', 3, 'ktp26.png', 'npwp26.png'),
(57, 'Aditya', 'AA0430', 'Silver', '54', '', 'BCA-6965071290 - Aditya Risqi Putra', '', 'Marketing Executive (ME)', 3, 'ktp27.png', 'npwp27.png'),
(58, 'Aming Go', 'AA0196', 'Silver', '', '', 'BCA-675 0220 353 - Aming', '', 'Marketing Executive (ME)', 3, 'ktp28.png', 'npwp28.png'),
(59, 'Mery', 'AA0452', 'Silver', '', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp29.png', 'npwp29.png'),
(60, 'Inata', 'AA0436', 'Silver', '41', '', 'BCA-2582093009 - Inata', '', 'Marketing Executive (ME)', 3, 'ktp30.png', 'npwp30.png'),
(61, 'Aghata', 'AA0444', 'Silver', '60', '', 'BCA-6750379441 - Nathania Agatha Benita', '', 'Marketing Executive (ME)', 3, 'ktp31.png', 'npwp31.png'),
(62, 'Syauqi', 'AA0305', 'Silver', '65', '', 'BCA Syariah-0050061977 - Qomarul Fata Assyauqi', '', 'Marketing Executive (ME)', 3, 'ktp32.png', 'npwp32.png'),
(63, 'Deddy Tansen', 'AA0453', 'Silver', '', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp33.png', 'npwp33.png'),
(64, 'Naning', 'AA0454', 'Silver', '', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp34.png', 'npwp34.png'),
(65, 'Anita / Steven', 'AA0070', 'Silver', '48', '', 'BCA-6720334061 - Anita Steven', '', 'Marketing Executive (ME)', 3, 'ktp35.png', 'npwp35.png'),
(66, 'Vonny C', 'AA0337', 'Silver', '48', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp36.png', 'npwp36.png'),
(67, 'Hokky', 'AA0210', 'Silver', '47', '', 'BCA-0180670904 - Hokky Gunawan', '', 'Marketing Executive (ME)', 3, 'ktp37.png', 'npwp37.png'),
(68, 'Tristya', 'AA0438', 'Silver', '10', '', 'BCA-8630299242 - Novan Hari Tristya', '', 'Marketing Executive (ME)', 3, 'ktp38.png', 'npwp38.png'),
(69, 'Nita', 'AA0456', 'Silver', '', '', 'Belum Ada', '', 'Marketing Executive (ME)', 3, 'ktp39.png', 'npwp39.png'),
(70, 'Owen', 'AA0419', 'Silver', '', '', 'Mandiri - 1410019762400 - Jordan Yuseno Putra', '', 'Marketing Executive (ME)', 3, 'ktp40.png', 'npwp40.png'),
(71, 'Yanes / Nira', 'AA0264', 'Silver', '', '', 'BCA-0885931265 - Yanes Nira', '', 'Marketing Executive (ME)', 3, 'ktp41.png', 'npwp41.png'),
(75, 'Rohman', 'AA008', 'Silver', '', '', '', '', 'Marketing Executive (ME)', 3, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `omzet`
--

CREATE TABLE `omzet` (
  `id_omzet` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `omzet`
--

INSERT INTO `omzet` (`id_omzet`, `id_komisi`) VALUES
(8, 291);

-- --------------------------------------------------------

--
-- Struktur dari tabel `omzet_aavision`
--

CREATE TABLE `omzet_aavision` (
  `id_omzetvision` int(250) NOT NULL,
  `id_omzet` int(250) NOT NULL,
  `id_marketing` int(250) NOT NULL,
  `fee_kantor` int(250) NOT NULL,
  `fee_marketing` int(250) NOT NULL,
  `ptn_admin` int(250) NOT NULL,
  `ptn_pph` int(250) NOT NULL,
  `netto_marketing` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `omzet_aavision`
--

INSERT INTO `omzet_aavision` (`id_omzetvision`, `id_omzet`, `id_marketing`, `fee_kantor`, `fee_marketing`, `ptn_admin`, `ptn_pph`, `netto_marketing`) VALUES
(45, 8, 3, 5000000, 5000000, 0, 125000, 4875000),
(46, 8, 10, 5000000, 5000000, 0, 125000, 4875000),
(47, 8, 9, 2000000, 8000000, 200000, 195000, 7605000),
(48, 8, 11, 3000000, 7000000, 175000, 170625, 6654375);

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
(42, 300, 'Stefano', '1500000'),
(43, 301, 'Rohman Sanjaya', '1000000');

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
  `jabatanum_listing_komisi` int(250) NOT NULL,
  `npwpum_listing2_komisi` int(250) NOT NULL,
  `jabatanum_listing2_komisi` int(250) NOT NULL,
  `mm2_listing_komisi` int(250) NOT NULL,
  `npwpm2_listing_komisi` int(250) NOT NULL,
  `npwpum2_listing_komisi` int(250) NOT NULL,
  `jabatanum2_listing_komisi` int(250) NOT NULL,
  `npwpum2_listing2_komisi` int(250) NOT NULL,
  `jabatanum2_listing2_komisi` int(250) NOT NULL,
  `mm_selling_komisi` int(250) NOT NULL,
  `npwpm_selling_komisi` int(250) NOT NULL,
  `npwpum_selling_komisi` int(250) NOT NULL,
  `jabatanum_selling_komisi` int(250) NOT NULL,
  `npwpum_selling2_komisi` int(250) NOT NULL,
  `jabatanum_selling2_komisi` int(250) NOT NULL,
  `mm2_selling_komisi` int(250) NOT NULL,
  `npwpm2_selling_komisi` int(250) NOT NULL,
  `npwpum2_selling_komisi` int(250) NOT NULL,
  `jabatanum2_selling_komisi` int(250) NOT NULL,
  `npwpum2_selling2_komisi` int(250) NOT NULL,
  `jabatanum2_selling2_komisi` int(250) NOT NULL,
  `admin_pengguna` int(250) NOT NULL,
  `admin_status_komisi` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_komisi`
--

INSERT INTO `sub_komisi` (`id_sub_komisi`, `id_komisi`, `mm_listing_komisi`, `npwpm_listing_komisi`, `npwpum_listing_komisi`, `jabatanum_listing_komisi`, `npwpum_listing2_komisi`, `jabatanum_listing2_komisi`, `mm2_listing_komisi`, `npwpm2_listing_komisi`, `npwpum2_listing_komisi`, `jabatanum2_listing_komisi`, `npwpum2_listing2_komisi`, `jabatanum2_listing2_komisi`, `mm_selling_komisi`, `npwpm_selling_komisi`, `npwpum_selling_komisi`, `jabatanum_selling_komisi`, `npwpum_selling2_komisi`, `jabatanum_selling2_komisi`, `mm2_selling_komisi`, `npwpm2_selling_komisi`, `npwpum2_selling_komisi`, `jabatanum2_selling_komisi`, `npwpum2_selling2_komisi`, `jabatanum2_selling2_komisi`, `admin_pengguna`, `admin_status_komisi`) VALUES
(182, 283, 60, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(183, 284, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(184, 285, 50, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 4),
(185, 286, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(186, 287, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(187, 288, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(188, 289, 70, 0, 1, 0, 1, 0, 50, 1, 0, 0, 0, 0, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(189, 290, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 1, 0, 1, 0, 50, 0, 0, 0, 0, 0, 1, 0),
(190, 291, 50, 1, 0, 0, 0, 0, 80, 1, 1, 0, 0, 0, 50, 1, 0, 0, 0, 0, 70, 1, 1, 0, 0, 0, 1, 4),
(191, 292, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(192, 293, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(193, 294, 50, 1, 1, 0, 1, 0, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(194, 295, 70, 1, 1, 0, 0, 0, 50, 0, 0, 0, 0, 0, 50, 1, 1, 0, 1, 0, 80, 1, 1, 0, 0, 0, 1, 0),
(199, 300, 70, 1, 1, 0, 0, 0, 50, 0, 0, 0, 0, 0, 50, 1, 1, 0, 1, 0, 80, 1, 1, 0, 0, 0, 1, 0),
(200, 301, 70, 1, 1, 0, 0, 0, 50, 0, 0, 0, 0, 0, 60, 1, 1, 0, 1, 0, 50, 1, 1, 0, 0, 0, 1, 0),
(201, 302, 60, 1, 1, 3, 1, 5, 50, 1, 0, 5, 0, 5, 50, 1, 1, 5, 1, 3, 50, 1, 1, 5, 0, 5, 1, 0),
(202, 303, 60, 1, 1, 3, 1, 5, 50, 1, 0, 5, 0, 5, 50, 1, 1, 5, 1, 3, 50, 1, 1, 3, 0, 5, 1, 0),
(204, 305, 60, 1, 1, 3, 1, 5, 70, 1, 1, 5, 0, 5, 50, 1, 1, 5, 1, 3, 50, 0, 0, 5, 0, 5, 1, 0),
(205, 306, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 10, 0),
(206, 307, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 1, 0);

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
  `jabatan_up_ang` int(250) NOT NULL,
  `npwp_up2_ang` int(250) NOT NULL,
  `jabatan_up2_ang` int(250) NOT NULL,
  `m_fran` int(250) NOT NULL,
  `npwp_fran` int(250) NOT NULL,
  `npwp_up_fran` int(250) NOT NULL,
  `jabatan_up_fran` int(250) NOT NULL,
  `npwp_up2_fran` int(250) NOT NULL,
  `jabatan_up2_fran` int(250) NOT NULL,
  `m_win` int(250) NOT NULL,
  `npwp_win` int(250) NOT NULL,
  `npwp_up_win` int(250) NOT NULL,
  `jabatan_up_win` int(250) NOT NULL,
  `npwp_up2_win` int(250) NOT NULL,
  `jabatan_up2_win` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_komisi_afw`
--

INSERT INTO `sub_komisi_afw` (`id_afw`, `id_sub_komisi`, `m_ang`, `npwp_ang`, `npwp_up_ang`, `jabatan_up_ang`, `npwp_up2_ang`, `jabatan_up2_ang`, `m_fran`, `npwp_fran`, `npwp_up_fran`, `jabatan_up_fran`, `npwp_up2_fran`, `jabatan_up2_fran`, `m_win`, `npwp_win`, `npwp_up_win`, `jabatan_up_win`, `npwp_up2_win`, `jabatan_up2_win`) VALUES
(6, 186, 50, 1, 1, 0, 0, 0, 60, 1, 1, 0, 0, 0, 60, 1, 1, 0, 0, 0),
(7, 191, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0),
(8, 192, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0),
(9, 199, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0),
(10, 200, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0, 50, 1, 1, 0, 0, 0),
(12, 204, 50, 1, 1, 5, 1, 3, 50, 1, 1, 3, 0, 5, 50, 1, 1, 3, 0, 5);

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
-- Indeks untuk tabel `jabatan_pengaturan`
--
ALTER TABLE `jabatan_pengaturan`
  ADD PRIMARY KEY (`id_jabatan`);

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
-- Indeks untuk tabel `omzet`
--
ALTER TABLE `omzet`
  ADD PRIMARY KEY (`id_omzet`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indeks untuk tabel `omzet_aavision`
--
ALTER TABLE `omzet_aavision`
  ADD PRIMARY KEY (`id_omzetvision`),
  ADD KEY `id_omzet` (`id_omzet`);

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
-- AUTO_INCREMENT untuk tabel `jabatan_pengaturan`
--
ALTER TABLE `jabatan_pengaturan`
  MODIFY `id_jabatan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `omzet`
--
ALTER TABLE `omzet`
  MODIFY `id_omzet` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `omzet_aavision`
--
ALTER TABLE `omzet_aavision`
  MODIFY `id_omzetvision` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengurangan_fee`
--
ALTER TABLE `pengurangan_fee`
  MODIFY `id_pengurangan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `referal`
--
ALTER TABLE `referal`
  MODIFY `id_referal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi_afw`
--
ALTER TABLE `sub_komisi_afw`
  MODIFY `id_afw` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  ADD CONSTRAINT `co_broke_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `omzet`
--
ALTER TABLE `omzet`
  ADD CONSTRAINT `omzet_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `omzet_aavision`
--
ALTER TABLE `omzet_aavision`
  ADD CONSTRAINT `omzet_aavision_ibfk_1` FOREIGN KEY (`id_omzet`) REFERENCES `omzet` (`id_omzet`) ON DELETE CASCADE ON UPDATE CASCADE;

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
