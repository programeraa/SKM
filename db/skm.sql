-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 10.08
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
-- Struktur dari tabel `bank_titipan_a`
--

CREATE TABLE `bank_titipan_a` (
  `id_bta` int(250) NOT NULL,
  `kode_perkiraan` int(250) NOT NULL,
  `nama_properti` varchar(250) NOT NULL,
  `status_properti` varchar(250) NOT NULL,
  `id_marketing` int(250) NOT NULL,
  `tgl_input` varchar(250) NOT NULL,
  `nilai_nominal` varchar(250) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_titipan_a`
--

INSERT INTO `bank_titipan_a` (`id_bta`, `kode_perkiraan`, `nama_properti`, `status_properti`, `id_marketing`, `tgl_input`, `nilai_nominal`, `jenis`, `keterangan`) VALUES
(4, 1, 'Northwest Boulevard', 'Jual/Sewa', 2, '2023-10-12', '50000000', 'Debit', 'Uang UTJ'),
(5, 2, 'Dukuh Kupang XXIII', 'Sewa', 3, '2023-11-15', '20000000', 'Debit', 'UTJ Tahap Pertama'),
(6, 45, 'Surabaya, Indonesia', 'Sewa', 10, '2023-11-08', '10000000', 'Kredit', 'UTJ Terus-Terusan'),
(7, 23, 'Bukit Palma', 'Sewa', 11, '2023-11-15', '10000000', 'Debit', 'UTJ Tahap Pertama'),
(8, 23, 'Pengiriman Barang', '', 0, '2023-11-15', '5000000', 'Kredit', 'Pengiriman 2 Pak'),
(9, 454, 'Citraland, Surabaya', 'Jual', 11, '2023-10-13', '10000000', 'Debit', 'Uang UTJ A'),
(10, 12, 'Northwest Boulevard3', 'Sewa', 38, '2023-09-13', '2000000', 'Debit', 'Uang UTJ Ayo');

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
(85, 303, 1693, 'MERLEN', 'Selling', '2', 50),
(95, 319, 4675, 'LIZA BRIGHTON', 'Listing', '3', 0);

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
-- Struktur dari tabel `jurnal_bttb`
--

CREATE TABLE `jurnal_bttb` (
  `id_bttb` int(250) NOT NULL,
  `tgl_input` date NOT NULL,
  `kode_perkiraan` varchar(250) NOT NULL,
  `nomor_perkiraan` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal_bttb`
--

INSERT INTO `jurnal_bttb` (`id_bttb`, `tgl_input`, `kode_perkiraan`, `nomor_perkiraan`, `keterangan`) VALUES
(9, '2023-12-05', 'UTJ', '0001', 'RUKO CROWN SHO BS 10/51'),
(10, '2023-12-05', 'BT', '000', 'BANK TITIPAN'),
(11, '2023-12-05', 'UTJ', '0002', 'TPI HX 8'),
(12, '2023-12-05', 'UTJ', '0003', 'GREENLAKE C/12'),
(13, '2023-12-05', 'UTJ', '0004', 'LEAD NSW DRIYOREJO B5/06'),
(14, '2023-12-05', 'UTJ', '0025', 'UTJ TANAH DIAMOND HILL DR 1 NO. 9 CITRALAND'),
(15, '2023-12-05', 'UTJ', '0005', 'KEMAYORAN BARU 59'),
(16, '2023-12-05', 'UTJ', '0006', 'WISATA BUKIT SENTUL LAWANG-MALANG'),
(17, '2023-12-05', 'UTJ', '0007', 'GREEN MENGANTI RESIDENCE'),
(18, '2023-12-05', 'UTJ', '0008', 'PERMATA MENGANTI RESIDENCE E5-02'),
(19, '2023-12-05', 'UTJ', '0009', 'ROYAL EMRAN 2'),
(20, '2023-12-05', 'UTJ', '0010', 'RUKO MENUR MUMPUNGAN (RUKO MANYAR)'),
(21, '2023-12-05', 'UTJ', '0011', 'RUKO KARANG EMPAT TIMUR II/68'),
(23, '2023-12-05', 'UTJ', '0012', 'RUKO GOLDEN PALACE A9-10 HR MUHAMMAD'),
(24, '2023-12-05', 'UTJ', '0013', 'ESPLANADE GA 8/7'),
(25, '2023-12-05', 'UTJ', '0014', 'DRIYOREJO'),
(26, '2023-12-05', 'UTJ', '0015', 'UTJ EASTWOOD BLOK EW 5/12'),
(27, '2023-12-05', 'UTJ', '0016', 'UTJ BUKIT GOLF GB 3/26'),
(28, '2023-12-05', 'UTJ', '0017', 'UTJ SEWA RUKO CROWN SOHO BS10 NO 60 ROYAL RESIDENCE'),
(29, '2023-12-05', 'UTJ', '0018', 'UTJ RUKO SATELIT TOWN SQUARE B/1'),
(30, '2023-12-05', 'UTJ', '0019', 'UTJ RUKO JL RAYA MENGANTI NO 411C'),
(31, '2023-12-05', 'BI', '001', 'ADM BANK'),
(32, '2023-12-05', 'H', '001', 'HUTANG CV'),
(33, '2023-12-05', 'UTJ', '0026', 'UTJ RUKO NORTHWEST BOULEVARD NV 3/2'),
(35, '2023-12-05', 'UTJ', '0020', 'UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH NO 30'),
(36, '2023-12-05', 'UTJ', '0022', 'UTJ RUMAH GRIYA ASRI 64/20'),
(37, '2023-12-05', 'UTJ', '0022', 'UTJ SEWA GUDANG TANGGUL NO 5'),
(38, '2023-12-05', 'UTJ', '0023', 'UTJ TAMAN GAPURA E2/30 '),
(39, '2023-12-05', 'UTJ', '0024', 'TANAH ROMOKALISARI ADVENTURE PERSIL 68'),
(40, '2023-12-05', 'UTJ', '0025', 'RUKO NORTHWEST NV 11/27'),
(41, '2023-12-05', 'UTJ', '0026', 'RUKO DARMO PARK 2 BLOK II NO 3'),
(42, '2023-12-05', 'UTJ', '0027', 'JL. GUBENG KERTAJAYA IXB NO.11'),
(43, '2023-12-05', 'UTJ', '0028', 'BUKIT GOLF B2 NO.7'),
(44, '2023-12-05', 'UTJ', '0029', 'JL SIMPANG DARMO PERMAI SELATAN XIV/20'),
(45, '2023-12-05', 'UTJ', '0030', ' BTG TC3/29'),
(46, '2023-12-05', 'UTJ', '0031', 'EMERALD MANSION BLOK TN 1 NO 29'),
(47, '2023-12-05', 'UTJ', '0032', 'TANAH KANDANGAN GRESIK '),
(48, '2023-12-07', 'B', '001', 'BUNGA BANK'),
(50, '2023-12-08', 'BI', '002', 'PAJAK BUNGA'),
(51, '2023-12-10', 'UTJ', '0034', 'UTJ NORTHWEST PARK NA6/11'),
(52, '2023-12-10', 'UTJ', '0034', 'SEWA GUDANG MARGOMULYO A5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id_jurnal` int(250) NOT NULL,
  `tgl_input_asli_jurnal` date NOT NULL,
  `tgl_input_jurnal` date NOT NULL,
  `id_bttb` int(250) NOT NULL,
  `keterangan_jurnal` varchar(250) NOT NULL,
  `jenis_jurnal` varchar(250) NOT NULL,
  `nominal_jurnal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id_jurnal`, `tgl_input_asli_jurnal`, `tgl_input_jurnal`, `id_bttb`, `keterangan_jurnal`, `jenis_jurnal`, `nominal_jurnal`) VALUES
(92, '2023-12-05', '2022-01-01', 9, 'UTJ RUKO CROWN SHO BS 10/51', 'Kredit', 20000000),
(93, '2023-12-05', '2022-01-01', 10, 'UTJ RUKO CROWN SHO BS 10/51', 'Debit', 20000000),
(94, '2023-12-05', '2022-01-01', 11, 'UTJ TPI HX 8', 'Kredit', 200000),
(95, '2023-12-05', '2022-01-01', 10, 'UTJ TPI HX 8', 'Debit', 200000),
(97, '2023-12-05', '2022-01-14', 12, 'UTJ GREENLAKE C/12', 'Kredit', 20000000),
(98, '2023-12-05', '2022-01-14', 10, 'UTJ GREENLAKE C/12', 'Debit', 20000000),
(99, '2023-12-05', '2022-01-19', 13, 'UTJ LEAD NSW DRIYOREJO B5/06', 'Kredit', 2486204),
(100, '2023-12-05', '2022-01-19', 10, 'LEAD NSW DRIYOREJO B5/06', 'Debit', 2486204),
(102, '2023-12-05', '2022-03-18', 15, 'UTJ KEMAYORAN BARU 59', 'Kredit', 20000000),
(103, '2023-12-05', '2022-03-18', 10, 'UTJ KEMAYORAN BARU 59', 'Debit', 20000000),
(104, '2023-12-05', '2022-03-07', 16, 'UTJ WISATA BUKIT SENTUL LAWANG-MALANG', 'Kredit', 12000000),
(105, '2023-12-05', '2022-03-07', 10, 'UTJ WISATA BUKIT SENTUL LAWANG-MALANG', 'Debit', 12000000),
(106, '2023-12-05', '2022-12-30', 17, 'UTJ GREEN MENGANTI RESIDENCE', 'Kredit', 1000000),
(107, '2023-12-05', '2022-12-30', 10, 'UTJ GREEN MENGANTI RESIDENCE', 'Debit', 1000000),
(108, '2023-12-05', '2023-05-22', 18, 'UTJ PERMATA MENGANTI RESIDENCE E5-02', 'Kredit', 9137481),
(109, '2023-12-05', '2023-05-22', 10, 'UTJ PERMATA MENGANTI RESIDENCE E5-02', 'Debit', 9137481),
(110, '2023-12-05', '2023-05-17', 19, 'UTJ ROYAL EMRAN 2', 'Kredit', 2000000),
(111, '2023-12-05', '2023-05-17', 10, 'UTJ ROYAL EMRAN 2', 'Debit', 2000000),
(115, '2023-12-05', '2023-12-04', 14, 'UTJ TANAH DIAMOND HILL DR 1 NO. 9 CITRALAND', 'Kredit', 25000000),
(116, '2023-12-05', '2023-12-04', 10, 'UTJ TANAH DIAMOND HILL DR 1 NO. 9 CITRALAND', 'Debit', 25000000),
(117, '2023-12-05', '2023-12-05', 14, 'UTJ KEDUA TANAH DIAMOND HILL DR 1 NO. 9 CITRALAND', 'Kredit', 75000000),
(118, '2023-12-05', '2023-12-05', 10, 'UTJ KEDUA TANAH DIAMOND HILL DR 1 NO. 9 CITRALAND', 'Debit', 75000000),
(119, '2023-12-05', '2023-12-04', 33, 'UTJ RUO NORTHWEST BOULEVARD NV 3/2', 'Kredit', 10000000),
(120, '2023-12-05', '2023-12-04', 10, 'UTJ RUKO NORTHWEST BOULEVARD NV 3/2', 'Debit', 10000000),
(122, '2023-12-05', '2023-05-22', 20, 'UTJ RUKO MENUR MUMPUNGAN (RUKO MANYAR)', 'Kredit', 3750000),
(123, '2023-12-05', '2023-05-22', 10, 'UTJ RUKO MENUR MUMPUNGAN (RUKO MANYAR)', 'Debit', 3750000),
(124, '2023-12-05', '2023-06-26', 21, 'UTJ RUKO JL KARANG EMPAT TIMUR', 'Kredit', 30000000),
(125, '2023-12-05', '2023-06-26', 10, 'UTJ RUKO JL KARANG EMPAT TIMUR', 'Debit', 30000000),
(126, '2023-12-05', '2023-06-30', 23, 'UTJ RUKO GOLDEN PALACE A9-10 HR MUHAMMAD', 'Kredit', 35000000),
(127, '2023-12-05', '2023-06-30', 10, 'UTJ RUKO GOLDEN PALACE A9-10 HR MUHAMMAD', 'Debit', 35000000),
(128, '2023-12-05', '2023-08-17', 24, 'UTJ ESPLANADE GA 8/7', 'Kredit', 100000000),
(129, '2023-12-05', '2023-08-17', 10, 'UTJ ESPLANADE GA 8/7', 'Debit', 100000000),
(130, '2023-12-05', '2023-09-10', 25, 'UTJ DRIYOREJO', 'Kredit', 10000000),
(131, '2023-12-05', '2023-09-10', 10, 'UTJ DRIYOREJO', 'Debit', 10000000),
(132, '2023-12-05', '2023-10-02', 26, 'UTJ EASTWOOD BLOK EW 5/12', 'Kredit', 68),
(133, '2023-12-05', '2023-10-02', 10, 'UTJ EASTWOOD BLOK EW 5/12', 'Debit', 68),
(134, '2023-12-05', '2023-10-06', 27, 'UTJ BUKIT GOLF GB 3/26', 'Kredit', 100000000),
(135, '2023-12-05', '2023-10-06', 10, 'UTJ BUKIT GOLF GB 3/26', 'Debit', 100000000),
(136, '2023-12-05', '2023-10-11', 28, 'UTJ SEWA RUKO CROWN SOHO BS10 NO 60 ROYAL RESIDENCE ', 'Kredit', 7000000),
(137, '2023-12-05', '2023-10-11', 10, 'UTJ SEWA RUKO CROWN SOHO BS10 NO 60 ROYAL RESIDENCE ', 'Debit', 7000000),
(138, '2023-12-05', '2023-10-12', 29, 'UTJ RUKO SATELIT TOWN SQUARE B/1', 'Kredit', 10000000),
(139, '2023-12-05', '2023-10-12', 10, 'UTJ RUKO SATELIT TOWN SQUARE B/1', 'Debit', 10000000),
(140, '2023-12-05', '2023-10-26', 30, 'UTJ RUKO JL RAYA MENGANTI NO 411C', 'Kredit', 50000000),
(141, '2023-12-05', '2023-10-26', 10, 'UTJ RUKO JL RAYA MENGANTI NO 411C', 'Debit', 50000000),
(146, '2023-12-10', '2023-11-02', 35, 'TAMBAHAN UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH 30', 'Kredit', 20000000),
(147, '2023-12-10', '2023-11-02', 10, 'TAMBAHAN UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH 30', 'Debit', 20000000),
(148, '2023-12-10', '2023-11-02', 35, 'TAMBAHAN UTJ SEWA GUDANG SIMO DI TRANSFER KE XMARKS', 'Debit', 20000000),
(149, '2023-12-10', '2023-11-02', 10, 'TAMBAHAN UTJ SEWA GUDANG SIMO DI TRANSFER KE XMARKS', 'Kredit', 20000000),
(150, '2023-12-06', '2023-11-02', 29, 'PENGEMBALIAN UTJ RUKO SATELIT TOWN SQUARE B/1', 'Debit', 10000000),
(151, '2023-12-06', '2023-11-02', 10, 'PENGEMBALIAN UTJ RUKO SATELIT TOWN SQUARE B/1', 'Kredit', 10000000),
(152, '2023-12-10', '2023-11-02', 36, 'UTJ RUMAH GRIYA ASRI 64/20', 'Kredit', 3000000),
(153, '2023-12-10', '2023-11-02', 10, 'UTJ RUMAH GRIYA ASRI 64/20', 'Debit', 3000000),
(154, '2023-12-06', '2023-11-03', 21, 'UTJ KARANG EMPAT TIMUR II/68 DI TRANSFER KE PENJUAL', 'Debit', 30000000),
(155, '2023-12-06', '2023-11-03', 10, 'UTJ KARANG EMPAT TIMUR II/68 DI TRANSFER KE PENJUAL', 'Kredit', 30000000),
(156, '2023-12-06', '2023-11-03', 37, 'UTJ SEWA GUDANG TANGGUL NO 5', 'Kredit', 25000000),
(157, '2023-12-06', '2023-11-03', 10, 'UTJ SEWA GUDANG TANGGUL NO 5', 'Debit', 25000000),
(158, '2023-12-06', '2023-11-03', 38, 'UTJ TAMAN GAPURA E2/30', 'Kredit', 100000000),
(159, '2023-12-06', '2023-11-03', 10, 'UTJ TAMAN GAPURA E2/30', 'Debit', 100000000),
(160, '2023-12-06', '2023-11-03', 18, 'PEMINDAHAN FEE GREEN MEGANTI E5', 'Debit', 9137841),
(161, '2023-12-06', '2023-11-03', 10, 'PEMINDAHAN FEE GREEN MEGANTI E5', 'Kredit', 9137841),
(162, '2023-12-06', '2023-11-03', 37, 'UTJ SEWA GUDANG TANGGUL NO 5 DITRANSFER KE PROPNEX', 'Debit', 25000000),
(163, '2023-12-06', '2023-11-03', 10, 'UTJ SEWA GUDANG TANGGUL NO 5 DITRANSFER KE PROPNEX', 'Kredit', 25000000),
(164, '2023-12-08', '2023-10-31', 32, 'HUTANG CV KE BANK TITIPAN', 'Debit', 130000000),
(165, '2023-12-08', '2023-10-31', 10, 'HUTANG CV KE BANK TITIPAN', 'Kredit', 130000000),
(167, '2023-12-06', '2022-02-01', 0, 'Saldo Awal Februari', '', 42686204),
(168, '2023-12-06', '2022-03-01', 0, 'Saldo Awal Maret', '', 42686204),
(169, '2023-12-06', '2022-04-01', 0, 'Saldo Awal April', '', 74686204),
(170, '2023-12-06', '2022-05-01', 0, 'Saldo Awal Mei', '', 74686204),
(171, '2023-12-06', '2022-06-01', 0, 'Saldo Awal Juni', '', 74686204),
(172, '2023-12-06', '2022-07-01', 0, 'Saldo Awal Juli', '', 74686204),
(173, '2023-12-06', '2022-08-01', 0, 'Saldo Awal Agustus', '', 74686204),
(174, '2023-12-06', '2022-09-01', 0, 'Saldo Awal September', '', 74686204),
(176, '2023-12-06', '2022-10-01', 0, 'Saldo Awal Oktober', '', 74686204),
(177, '2023-12-06', '2022-11-01', 0, 'Saldo Awal November', '', 74686204),
(178, '2023-12-06', '2022-12-01', 0, 'Saldo Awal Desember', '', 74686204),
(179, '2023-12-06', '2023-01-01', 0, 'Saldo Awal Januari', '', 75686204),
(180, '2023-12-06', '2023-02-01', 0, 'Saldo Awal Februari', '', 75686204),
(181, '2023-12-06', '2023-03-01', 0, 'Saldo Awal Maret', '', 75686204),
(182, '2023-12-06', '2023-04-01', 0, 'Saldo Awal April', '', 75686204),
(183, '2023-12-06', '2023-05-01', 0, 'Saldo Awal Mei', '', 75686204),
(184, '2023-12-06', '2023-06-01', 0, 'Saldo Awal Juni', '', 90573685),
(185, '2023-12-06', '2023-07-01', 0, 'Saldo Awal Juli', '', 155573685),
(186, '2023-12-06', '2023-08-01', 0, 'Saldo Awal Agustus', '', 155573685),
(187, '2023-12-06', '2023-09-01', 0, 'Saldo Awal September', '', 255573685),
(190, '2023-12-05', '2023-09-30', 0, 'Koreksi Saldo', '', 35530),
(191, '2023-12-07', '2023-10-01', 0, 'Saldo Awal Oktober', '', 265609215),
(194, '2023-12-09', '2023-10-31', 31, 'ADM BANK', 'Kredit', 349200.62),
(195, '2023-12-09', '2023-10-31', 10, 'ADM BANK', 'Debit', 349200.62),
(201, '2023-12-09', '2023-11-01', 0, 'Saldo Awal November', '', 562958483.62),
(202, '2023-12-10', '2023-11-01', 35, 'UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH NO 30', 'Kredit', 10000000),
(203, '2023-12-10', '2023-11-01', 10, 'UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH NO 30', 'Debit', 10000000),
(204, '2023-12-10', '2023-11-01', 35, 'UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH NO 30 DI TRANSFER KE XMARKS', 'Debit', 10000000),
(205, '2023-12-10', '2023-11-01', 10, 'UTJ SEWA GUDANG SIMO TAMBAAN SEKOLAH NO 30 DI TRANSFER KE XMARKS', 'Kredit', 10000000),
(206, '2023-12-10', '2023-11-07', 36, 'TAMBAHAN UTJ RUMAH GRIYA ASRI 64/20', 'Kredit', 500000),
(207, '2023-12-10', '2023-11-07', 10, 'TAMBAHAN UTJ RUMAH GRIYA ASRI 64/20', 'Debit', 500000),
(208, '2023-12-10', '2023-11-07', 36, 'TAMBAHAN UTJ RUMAH GRIYA ASRI 64/20', 'Kredit', 59500000),
(209, '2023-12-10', '2023-11-07', 10, 'TAMBAHAN UTJ RUMAH GRIYA ASRI 64/20', 'Debit', 59500000),
(210, '2023-12-10', '2023-11-07', 39, 'UTJ 2 BIDANG TANAH ROMOKALISARI ADVENTURE PERSIL 68', 'Kredit', 100000000),
(211, '2023-12-10', '2023-11-07', 10, 'UTJ 2 BIDANG TANAH ROMOKALISARI ADVENTURE PERSIL 68', 'Debit', 100000000),
(212, '2023-12-10', '2023-11-07', 39, 'UTJ 2 BIDANG TANAH ROMOKALISARI ADVENTURE PERSIL 68 DI TRANSFER KE PEMILIK', 'Debit', 100000000),
(213, '2023-12-10', '2023-11-07', 10, 'UTJ 2 BIDANG TANAH ROMOKALISARI ADVENTURE PERSIL 68 DI TRANSFER KE PEMILIK', 'Kredit', 100000000),
(214, '2023-12-10', '2023-11-07', 40, 'UTJ RUKO NORTHWEST NV 11/27', 'Kredit', 5000000),
(215, '2023-12-10', '2023-11-07', 10, 'UTJ RUKO NORTHWEST NV 11/27', 'Debit', 5000000),
(216, '2023-12-10', '2023-11-08', 36, 'FEE RUMAH GRIYA ASRI 64/20 DIPINDAH KE A&A CV (CABANG)', 'Debit', 3000000),
(217, '2023-12-10', '2023-11-08', 10, 'FEE RUMAH GRIYA ASRI 64/20 DIPINDAH KE A&A CV (CABANG)', 'Kredit', 3000000),
(218, '2023-12-10', '2023-11-08', 36, 'UTJ RUMAH GRIYA ASRI 64/20 DI TRANSFER KE ANDREW CHRISTIAN (PELUNASAN)', 'Debit', 60000000),
(219, '2023-12-10', '2023-11-08', 10, 'UTJ RUMAH GRIYA ASRI 64/20 DI TRANSFER KE ANDREW CHRISTIAN (PELUNASAN)', 'Kredit', 60000000),
(220, '2023-12-10', '2023-11-09', 30, 'PELUNASAN SISA UTJ RUKO RAYA MENGANTI 411C', 'Debit', 34375000),
(221, '2023-12-10', '2023-11-09', 10, 'PELUNASAN SISA UTJ RUKO RAYA MENGANTI 411C', 'Kredit', 34375000),
(222, '2023-12-10', '2023-11-09', 30, 'FEE RUKO RAYA MENGANTI 411C DIPINDAH KE A&A CV (CABANG)', 'Debit', 15625000),
(223, '2023-12-10', '2023-11-09', 10, 'FEE RUKO RAYA MENGANTI 411C DIPINDAH KE A&A CV (CABANG)', 'Kredit', 15625000),
(224, '2023-12-10', '2023-11-09', 38, 'TRANSFER SISA UTJ TAMAN GAPURA E2/30', 'Debit', 9460000),
(225, '2023-12-10', '2023-11-09', 10, 'TRANSFER SISA UTJ TAMAN GAPURA E2/30', 'Kredit', 9460000),
(226, '2023-12-10', '2023-11-10', 41, 'UTJ RUKO DRMO PARK 2 BLOK II NO 3', 'Kredit', 200000000),
(227, '2023-12-10', '2023-11-10', 10, 'UTJ RUKO DRMO PARK 2 BLOK II NO 3', 'Debit', 200000000),
(228, '2023-12-10', '2023-11-10', 38, 'TALANGAN BIAYA SHM TAMAN GAPURA E2/30', 'Debit', 15000000),
(229, '2023-12-10', '2023-11-10', 10, 'TALANGAN BIAYA SHM TAMAN GAPURA E2/30', 'Kredit', 15000000),
(230, '2023-12-10', '2023-11-10', 42, 'TERMIN 1 SIDANG PENGADILAN PENJUAL GUBENG KERTAJAYA IXB NO 11', 'Kredit', 7000000),
(231, '2023-12-10', '2023-11-10', 10, 'TERMIN 1 SIDANG PENGADILAN PENJUAL GUBENG KERTAJAYA IXB NO 11', 'Debit', 7000000),
(232, '2023-12-10', '2023-11-11', 41, 'UTJ  RUKO DARMO PARK II BLOK 2 NO 3', 'Kredit', 250000000),
(233, '2023-12-10', '2023-11-11', 10, 'UTJ  RUKO DARMO PARK II BLOK 2 NO 3', 'Debit', 250000000),
(234, '2023-12-10', '2023-11-13', 38, 'FEE TAMAN GAPURA E2/30 DIPINDAH KE CVA&A (PUSAT)', 'Debit', 75540000),
(235, '2023-12-10', '2023-11-13', 10, 'FEE TAMAN GAPURA E2/30 DIPINDAH KE CVA&A (PUSAT)', 'Kredit', 75540000),
(236, '2023-12-10', '2023-11-13', 42, 'TERMIN 1 PENGURUSAN GUBENG KERTAJAYA IXB NO 11', 'Debit', 7000000),
(237, '2023-12-10', '2023-11-13', 10, 'TERMIN 1 PENGURUSAN GUBENG KERTAJAYA IXB NO 11', 'Kredit', 7000000),
(238, '2023-12-10', '2023-11-13', 43, 'UTJ BUKIT GOLF B2 NO 7', 'Kredit', 100000000),
(239, '2023-12-10', '2023-11-13', 10, 'UTJ BUKIT GOLF B2 NO 7', 'Debit', 100000000),
(240, '2023-12-10', '2023-11-14', 44, 'UTJ SIMPANG DARMO PERMAI SELATAN', 'Kredit', 5000000),
(241, '2023-12-10', '2023-11-14', 10, 'UTJ SIMPANG DARMO PERMAI SELATAN', 'Debit', 5000000),
(242, '2023-12-10', '2023-11-15', 45, 'TITIP BAYAR RETRIBUSI PBG IMB SEWA BTG TC3/29', 'Kredit', 17016160),
(243, '2023-12-10', '2023-11-15', 10, 'TITIP BAYAR RETRIBUSI PBG IMB SEWA BTG TC3/29', 'Debit', 17016160),
(244, '2023-12-10', '2023-11-15', 43, 'UTJ BUKIT GOLF B2 NO 7 DI TRANSFER KE PENJUAL', 'Debit', 100000000),
(245, '2023-12-10', '2023-11-15', 10, 'UTJ BUKIT GOLF B2 NO 7 DI TRANSFER KE PENJUAL', 'Kredit', 100000000),
(246, '2023-12-10', '2023-11-15', 31, 'BI ADM BUKIT GOLF B2 NO 7', 'Debit', 2500),
(247, '2023-12-10', '2023-11-15', 10, 'BI ADM BUKIT GOLF B2 NO 7', 'Kredit', 2500),
(248, '2023-12-10', '2023-11-15', 46, 'TITIP PAJAK EMERALD MANSION BLOK TN 1 NO 29', 'Kredit', 333750000),
(249, '2023-12-10', '2023-11-15', 10, 'TITIP PAJAK EMERALD MANSION BLOK TN 1 NO 29', 'Debit', 333750000),
(250, '2023-12-10', '2023-11-16', 47, 'UTJ TANAH KANDANGAN GRESIK ', 'Kredit', 50000000),
(251, '2023-12-10', '2023-11-16', 10, 'UTJ TANAH KANDANGAN GRESIK ', 'Debit', 50000000),
(252, '2023-12-10', '2023-11-16', 45, 'BAYAR RETRIBUSI PBG IMB SEWA BTG TC3/29', 'Debit', 17016000),
(253, '2023-12-10', '2023-11-16', 10, 'BAYAR RETRIBUSI PBG IMB SEWA BTG TC3/29', 'Kredit', 17016000),
(254, '2023-12-10', '2023-11-16', 43, 'PENGALIHAN HAK TANAH BUKIT GOLF B2 NO.7', 'Kredit', 300000000),
(255, '2023-12-10', '2023-11-16', 10, 'PENGALIHAN HAK TANAH BUKIT GOLF B2 NO.7', 'Debit', 300000000),
(256, '2023-12-10', '2023-11-16', 24, 'UTJ ESPLANADE GA 8/7 DI TRANSFER KE PENJUAL', 'Debit', 100000000),
(257, '2023-12-10', '2023-11-16', 10, 'UTJ ESPLANADE GA 8/7 DI TRANSFER KE PENJUAL', 'Kredit', 100000000),
(258, '2023-12-10', '2023-11-17', 43, 'PPH FINAL BUKIT GOLF B2 NO 7', 'Debit', 90000000),
(259, '2023-12-10', '2023-11-17', 10, 'PPH FINAL BUKIT GOLF B2 NO 7', 'Kredit', 90000000),
(260, '2023-12-10', '2023-11-17', 43, 'PPH FINAL BUKIT GOLF B2 NO 7', 'Debit', 60000000),
(261, '2023-12-10', '2023-11-17', 10, 'PPH FINAL BUKIT GOLF B2 NO 7', 'Kredit', 60000000),
(262, '2023-12-10', '2023-11-17', 45, 'TITIP BAYAR IMB SEWA BTG TC 3-29', 'Kredit', 25000000),
(263, '2023-12-10', '2023-11-17', 10, 'TITIP BAYAR IMB SEWA BTG TC 3-29', 'Debit', 25000000),
(264, '2023-12-10', '2023-11-17', 43, 'PENGALIHAN HAK TANAH BUKIT GOLF B2 NO.7', 'Debit', 150000000),
(265, '2023-12-10', '2023-11-17', 10, 'PENGALIHAN HAK TANAH BUKIT GOLF B2 NO.7', 'Kredit', 150000000),
(266, '2023-12-10', '2023-11-17', 41, 'UTJ RUKO DARMO PARK 2 BLOK II NO 3 DI TRANSFER KE PENJUAL', 'Debit', 450000000),
(267, '2023-12-10', '2023-11-17', 10, 'UTJ RUKO DARMO PARK 2 BLOK II NO 3 DI TRANSFER KE PENJUAL', 'Kredit', 450000000),
(268, '2023-12-10', '2023-11-17', 45, 'TITIP BAYAR PELUNASAN IMB SEWA BTG TC 3-29', 'Debit', 18500000),
(269, '2023-12-10', '2023-11-17', 10, 'TITIP BAYAR PELUNASAN IMB SEWA BTG TC 3-29', 'Kredit', 18500000),
(270, '2023-12-10', '2023-11-17', 45, 'REFUND POT REKOM IMB BTG TC 3-29', 'Debit', 1500000),
(271, '2023-12-10', '2023-11-17', 10, 'REFUND POT REKOM IMB BTG TC 3-29', 'Kredit', 1500000),
(272, '2023-12-10', '2023-11-17', 45, 'FEE IMB SEWA BTG TC 3-29 DI TRANSFER  KE CV A&A', 'Debit', 5000000),
(273, '2023-12-10', '2023-11-17', 10, 'FEE IMB SEWA BTG TC 3-29 DI TRANSFER  KE CV A&A (PUSAT)', 'Kredit', 5000000),
(274, '2023-12-10', '2023-11-17', 27, 'TITIP BAYAR RETRI OKT PENJUAL BGI GB 3/26', 'Debit', 1275912),
(275, '2023-12-10', '2023-11-17', 10, 'TITIP BAYAR RETRI OKT PENJUAL BGI GB 3/26', 'Kredit', 1275912),
(276, '2023-12-10', '2023-11-18', 27, 'KEKURANGAN TITIP BAYAR RETRIBUSI BGI GB3/26', 'Debit', 47344),
(277, '2023-12-10', '2023-11-18', 10, 'KEKURANGAN TITIP BAYAR RETRIBUSI BGI GB3/26', 'Kredit', 47344),
(278, '2023-12-10', '2023-11-20', 51, 'UTJ RUMAH NORTHWEST PARK NA 6/11', 'Kredit', 5000000),
(279, '2023-12-10', '2023-11-20', 10, 'UTJ RUMAH NORTHWEST PARK NA 6/11', 'Debit', 5000000),
(280, '2023-12-10', '2023-11-20', 27, 'FEE BUKIT GOLF GB 3/26 DI PINDAH KE CVA&A (PUSAT)', 'Debit', 98676744),
(281, '2023-12-10', '2023-11-20', 10, 'FEE BUKIT GOLF GB 3/26 DI PINDAH KE CVA&A (PUSAT)', 'Kredit', 98676744),
(282, '2023-12-10', '2023-11-20', 44, 'UTJ SIMPANG DARMO PERMAI SELATAN DI TRANSFER KE PEMILIK', 'Debit', 2825000),
(283, '2023-12-10', '2023-11-20', 10, 'UTJ SIMPANG DARMO PERMAI SELATAN DI TRANSFER KE PEMILIK', 'Kredit', 2825000),
(284, '2023-12-10', '2023-11-20', 44, 'FEE SIMPANG DARMO PERMAI SELATAN DI PINDAH KE A&A CV (CABANG)', 'Debit', 1875000),
(285, '2023-12-10', '2023-11-20', 10, 'FEE SIMPANG DARMO PERMAI SELATAN DI PINDAH KE A&A CV (CABANG)', 'Kredit', 1875000),
(286, '2023-12-10', '2023-11-20', 44, 'FEE NOTARIS SIMPANG DARMO PERMAI SELATAN XIV/20 STEVEN SANTOSO', 'Debit', 300000),
(287, '2023-12-10', '2023-11-20', 10, 'FEE NOTARIS SIMPANG DARMO PERMAI SELATAN XIV/20 STEVEN SANTOSO', 'Kredit', 300000),
(288, '2023-12-10', '2023-11-21', 46, 'TITIP BAYAR REKOM PERUMNAS HPL TN 1/29', 'Debit', 5000000),
(289, '2023-12-10', '2023-11-21', 10, 'TITIP BAYAR REKOM PERUMNAS HPL TN 1/29', 'Kredit', 5000000),
(290, '2023-12-10', '2023-11-22', 46, 'TITIP BAYAR BPHTB PEMBELI TN 1/29', 'Debit', 333750000),
(291, '2023-12-10', '2023-11-22', 10, 'TITIP BAYAR BPHTB PEMBELI TN 1/29', 'Kredit', 333750000),
(292, '2023-12-10', '2023-11-22', 31, 'BI ADM EMERALD MANSION TN 1/29', 'Debit', 25000),
(293, '2023-12-10', '2023-11-22', 10, 'BI ADM EMERALD MANSION TN 1/29', 'Kredit', 25000),
(294, '2023-12-10', '2023-11-28', 51, 'UTJ NORTHWEST PARK NA6/11 DI TRANSFER KE PEMILIK', 'Debit', 3000000),
(295, '2023-12-10', '2023-11-28', 10, 'UTJ NORTHWEST PARK NA6/11 DI TRANSFER KE PEMILIK', 'Kredit', 3000000),
(296, '2023-12-10', '2023-11-28', 51, 'FEE NORTHWEST PARK NA6/11 DI PINDAH KE A&A CV (CABANG)', 'Debit', 2000000),
(297, '2023-12-10', '2023-11-28', 10, 'FEE NORTHWEST PARK NA6/11 DI PINDAH KE A&A CV (CABANG)', 'Kredit', 2000000),
(298, '2023-12-10', '2023-11-30', 52, 'DEPOSIT SEWA GUDANG MARGOMULYO A5', 'Kredit', 10000000),
(299, '2023-12-10', '2023-11-30', 10, 'DEPOSIT SEWA GUDANG MARGOMULYO A5', 'Debit', 10000000),
(300, '2023-12-10', '2023-11-30', 31, 'BIAYA ADM', 'Debit', 30000),
(301, '2023-12-10', '2023-11-30', 10, 'BIAYA ADM', 'Kredit', 30000),
(302, '2023-12-10', '2023-11-30', 48, 'BUNGA', 'Kredit', 104850.02),
(303, '2023-12-10', '2023-11-30', 10, 'BUNGA', 'Debit', 104850.02),
(304, '2023-12-10', '2023-11-30', 50, 'PAJAK BUNGA', 'Debit', 20970),
(305, '2023-12-10', '2023-11-30', 10, 'PAJAK BUNGA', 'Kredit', 20970),
(306, '2023-12-10', '2023-11-03', 32, 'PENGEMBALIAN PINJAMAN CV', 'Kredit', 130000000),
(307, '2023-12-10', '2023-11-03', 10, 'PENGEMBALIAN PINJAMAN CV', 'Debit', 130000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` int(12) NOT NULL,
  `kantor_komisi` varchar(250) NOT NULL,
  `nomor_kantor_komisi` int(250) NOT NULL,
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
  `status_transfer` varchar(250) NOT NULL,
  `keterangan_komisi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `kantor_komisi`, `nomor_kantor_komisi`, `alamat_komisi`, `jt_komisi`, `tgl_closing_komisi`, `mar_listing_komisi`, `mar_listing2_komisi`, `mar_selling_komisi`, `mar_selling2_komisi`, `bruto_komisi`, `waktu_komisi`, `tgl_disetujui`, `status_komisi`, `status_transfer`, `keterangan_komisi`) VALUES
(302, 'VISION', 1, 'APARTEMEN PURIMAS TOWER A UNIT 1528', 'Jual', '2023-09-29', 3, 0, 3, 0, '6500000', '2023-11-02', '2023-12-08', 'Approve', '', ''),
(303, 'VISION', 2, 'EASTWOOD BLOK EW5/12 CITRALAND, SURABAYA', 'Jual', '2023-10-02', 11, 0, 1693, 0, '43312500', '2023-11-02', '2023-12-08', 'Approve', '', ''),
(304, 'VISION', 3, 'DUKUH KUPANG BARAT 107A, SURABAYA', 'Sewa', '2023-08-15', 53, 0, 53, 0, '1500000', '2023-11-02', '2023-12-08', 'Approve', '', ''),
(305, 'VISION', 4, 'DUKUH KUPANG BARAT 107A, SURABAYA', 'Sewa', '2023-08-15', 53, 0, 53, 0, '1500000', '2023-11-02', '2023-12-08', 'Approve', '', ''),
(319, 'VISION', 5, 'surya inti permata 1/C06', 'Sewa', '2023-09-12', 4675, 0, 49, 0, '20000000', '2023-12-09', '0000-00-00', 'Proses Approve', 'Proses Transfer', ''),
(320, 'PUSAT', 1, 'Emerald Mansion TN4 No. 6, Citraland ', 'Sewa', '2023-12-11', 2, 0, 2, 0, '51000000', '2023-12-11', '0000-00-00', 'Proses Approve', 'Proses Transfer', 'Ini Hasil cobroke'),
(321, 'PUSAT', 2, 'Northwest Boulevard Blok NV 10 No 2, Citraland - Surabaya', 'Jual/Sewa', '2023-12-28', 2, 0, 2, 0, '50000000', '2023-12-11', '0000-00-00', 'Proses Approve', 'Proses Transfer', 'Bank Titipan 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kredit_bank_titipan_a`
--

CREATE TABLE `kredit_bank_titipan_a` (
  `id_kredit` int(250) NOT NULL,
  `id_bta` int(250) NOT NULL,
  `tgl_input_kredit` date NOT NULL,
  `keterangan_kredit` varchar(250) NOT NULL,
  `nominal_kredit` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kredit_bank_titipan_a`
--

INSERT INTO `kredit_bank_titipan_a` (`id_kredit`, `id_bta`, `tgl_input_kredit`, `keterangan_kredit`, `nominal_kredit`) VALUES
(7, 4, '2023-11-11', 'Pengiriman Kucing', 10000),
(12, 5, '2023-11-13', 'Berkas Ini Itu', 12000),
(13, 4, '2023-11-13', 'Pengiriman Jerapah', 50000),
(14, 4, '2023-11-13', 'Pengiriman Kura-Kura', 120000),
(18, 8, '2023-11-15', 'Pengiriman Jerapah', 50000),
(20, 6, '2023-11-15', 'Pengiriman Kura-Kura', 50000);

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
(9, 'Yenny', 'AA0065', 'Gold Express', '3', '', 'BCA-8290541221 - Yenny', '', 'Marketing Executive (ME)', 3, 'ktp3.png', 'npwp3.png'),
(10, 'Julia / Jeffy', 'AA0053', 'Silver', '39', '', 'BCA-7880384320 - Julia/Jeffry', '', 'Chief Marketing Officer (CMO)', 5, 'ktp4.png', 'npwp4.png'),
(11, 'Claudia', 'AA0008', 'Prime Pro', '10', '', 'BCA-4700271779 (Claudia Florensia Sri P)', '', 'Executive Marketing Director (EMD)', 5, 'ktp6.png', 'npwp6.png'),
(35, 'Ang', 'AA0007', 'Silver', '10', '', 'BCA 472-018-1717 (Anggraini Angkawidjaya)', '', 'Marketing Executive (ME)', 3, 'ktp7.png', 'npwp7.png'),
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
(49, 'Lily Tan', ' AA0080', 'Gold Express', '48', '10', 'BCA-6720460708 - Lily Tan', '', 'Marketing Executive (ME)', 3, 'ktp19.png', 'npwp19.png'),
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
(71, 'Yanes / Nira', 'AA0264', 'Silver', '', '', 'BCA-0885931265 - Yanes Nira', '', 'Marketing Executive (ME)', 3, 'ktp41.png', 'npwp41.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pph`
--

CREATE TABLE `master_pph` (
  `id_pph` int(250) NOT NULL,
  `id_komisi` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_pph`
--

INSERT INTO `master_pph` (`id_pph`, `id_komisi`) VALUES
(74, 302),
(75, 303),
(76, 304),
(77, 305);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pph_aavision`
--

CREATE TABLE `master_pph_aavision` (
  `id_pph_aavision` int(250) NOT NULL,
  `id_pph` int(250) NOT NULL,
  `id_marketing` int(250) NOT NULL,
  `status_marketing` varchar(250) NOT NULL,
  `fee_setelah_adm` int(250) NOT NULL,
  `fgs` int(250) NOT NULL,
  `ptn_pph` int(250) NOT NULL,
  `total_pph` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_pph_aavision`
--

INSERT INTO `master_pph_aavision` (`id_pph_aavision`, `id_pph`, `id_marketing`, `status_marketing`, `fee_setelah_adm`, `fgs`, `ptn_pph`, `total_pph`) VALUES
(325, 74, 3, 'Listing/Selling', 3250000, 0, 81250, 81250),
(326, 75, 11, 'Listing/Selling', 14780391, 0, 369510, 369510),
(327, 75, 10, 'Upline', 0, 324844, 8121, 8121),
(328, 76, 53, 'Listing/Selling', 750000, 0, 18750, 18750),
(329, 77, 53, 'Listing/Selling', 750000, 0, 18750, 18750);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pph_cobroke`
--

CREATE TABLE `master_pph_cobroke` (
  `id_pph_cobroke` int(250) NOT NULL,
  `id_pph` int(250) NOT NULL,
  `fee_cobroke` int(250) NOT NULL,
  `pph_cobroke` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_pph_cobroke`
--

INSERT INTO `master_pph_cobroke` (`id_pph_cobroke`, `id_pph`, `fee_cobroke`, `pph_cobroke`) VALUES
(21, 75, 21656250, 433125);

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
(127, 302),
(128, 303),
(129, 304),
(130, 305);

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
  `ptn_pribadi` int(250) NOT NULL,
  `netto_vision` int(250) NOT NULL,
  `netto_marketing` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `omzet_aavision`
--

INSERT INTO `omzet_aavision` (`id_omzetvision`, `id_omzet`, `id_marketing`, `fee_kantor`, `fee_marketing`, `ptn_admin`, `ptn_pph`, `ptn_pribadi`, `netto_vision`, `netto_marketing`) VALUES
(259, 127, 3, 3250000, 3250000, 0, 81250, 0, 3250000, 3168750),
(260, 128, 11, 6496875, 15159375, 378984, 369510, 0, 6875859, 14410881),
(261, 129, 53, 750000, 750000, 0, 18750, 0, 750000, 731250),
(262, 130, 53, 750000, 750000, 0, 18750, 0, 750000, 731250);

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
(201, 302, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 4),
(202, 303, 70, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 4),
(203, 304, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 4),
(204, 305, 50, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 4),
(218, 319, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1, 1, 5, 1, 5, 0, 0, 0, 0, 0, 0, 10, 0),
(219, 320, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 1, 0),
(220, 321, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 60, 1, 1, 3, 1, 5, 0, 0, 0, 0, 0, 0, 1, 0);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutup_jurnal`
--

CREATE TABLE `tutup_jurnal` (
  `id_jurnal` int(250) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `tgl_asli_input` date NOT NULL,
  `bulan_jurnal` varchar(250) NOT NULL,
  `total_saldo` int(250) NOT NULL,
  `total_kredit` int(250) NOT NULL,
  `saldo_akhir` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tutup_jurnal`
--

INSERT INTO `tutup_jurnal` (`id_jurnal`, `tgl_jurnal`, `tgl_asli_input`, `bulan_jurnal`, `total_saldo`, `total_kredit`, `saldo_akhir`) VALUES
(109, '2022-01-28', '2023-12-06', 'Januari', 42686204, 42686204, 0),
(110, '2022-02-28', '2023-12-06', 'Februari', 0, 0, 0),
(112, '2022-03-28', '2023-12-06', 'Maret', 32000000, 32000000, 0),
(113, '2022-04-28', '2023-12-06', 'April', 0, 0, 0),
(114, '2022-05-28', '2023-12-06', 'Mei', 0, 0, 0),
(115, '2022-06-28', '2023-12-06', 'Juni', 0, 0, 0),
(116, '2022-07-28', '2023-12-06', 'Juli', 0, 0, 0),
(117, '2022-08-28', '2023-12-06', 'Agustus', 0, 0, 0),
(118, '2022-09-28', '2023-12-06', 'September', 0, 0, 0),
(119, '2022-10-28', '2023-12-06', 'Oktober', 0, 0, 0),
(120, '2022-11-28', '2023-12-06', 'November', 0, 0, 0),
(121, '2022-12-28', '2023-12-06', 'Desember', 1000000, 1000000, 0),
(122, '2023-01-28', '2023-12-06', 'Januari', 0, 0, 0),
(123, '2023-02-28', '2023-12-06', 'Februari', 0, 0, 0),
(124, '2023-03-28', '2023-12-06', 'Maret', 0, 0, 0),
(125, '2023-04-28', '2023-12-06', 'April', 0, 0, 0),
(126, '2023-05-28', '2023-12-06', 'Mei', 14887481, 14887481, 0),
(128, '2023-06-28', '2023-12-06', 'Juni', 65000000, 65000000, 0),
(129, '2023-07-28', '2023-12-06', 'Juli', 0, 0, 0),
(130, '2023-08-28', '2023-12-06', 'Agustus', 100000000, 100000000, 0),
(134, '2023-09-28', '2023-12-08', 'September', 10000000, 10000000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_titipan_a`
--
ALTER TABLE `bank_titipan_a`
  ADD PRIMARY KEY (`id_bta`);

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
-- Indeks untuk tabel `jurnal_bttb`
--
ALTER TABLE `jurnal_bttb`
  ADD PRIMARY KEY (`id_bttb`);

--
-- Indeks untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_bttb` (`id_bttb`);

--
-- Indeks untuk tabel `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`),
  ADD KEY `mar_listing_komisi` (`mar_listing_komisi`),
  ADD KEY `mar_selling_komisi` (`mar_selling_komisi`);

--
-- Indeks untuk tabel `kredit_bank_titipan_a`
--
ALTER TABLE `kredit_bank_titipan_a`
  ADD PRIMARY KEY (`id_kredit`),
  ADD KEY `id_bta` (`id_bta`);

--
-- Indeks untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indeks untuk tabel `master_pph`
--
ALTER TABLE `master_pph`
  ADD PRIMARY KEY (`id_pph`),
  ADD KEY `id_komisi` (`id_komisi`);

--
-- Indeks untuk tabel `master_pph_aavision`
--
ALTER TABLE `master_pph_aavision`
  ADD PRIMARY KEY (`id_pph_aavision`),
  ADD KEY `id_pph` (`id_pph`);

--
-- Indeks untuk tabel `master_pph_cobroke`
--
ALTER TABLE `master_pph_cobroke`
  ADD PRIMARY KEY (`id_pph_cobroke`),
  ADD KEY `id_pph` (`id_pph`);

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
-- Indeks untuk tabel `tutup_jurnal`
--
ALTER TABLE `tutup_jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_titipan_a`
--
ALTER TABLE `bank_titipan_a`
  MODIFY `id_bta` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  MODIFY `id_cobroke` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `jabatan_pengaturan`
--
ALTER TABLE `jabatan_pengaturan`
  MODIFY `id_jabatan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jurnal_bttb`
--
ALTER TABLE `jurnal_bttb`
  MODIFY `id_bttb` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  MODIFY `id_jurnal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT untuk tabel `kredit_bank_titipan_a`
--
ALTER TABLE `kredit_bank_titipan_a`
  MODIFY `id_kredit` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `master_pph`
--
ALTER TABLE `master_pph`
  MODIFY `id_pph` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `master_pph_aavision`
--
ALTER TABLE `master_pph_aavision`
  MODIFY `id_pph_aavision` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT untuk tabel `master_pph_cobroke`
--
ALTER TABLE `master_pph_cobroke`
  MODIFY `id_pph_cobroke` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `omzet`
--
ALTER TABLE `omzet`
  MODIFY `id_omzet` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `omzet_aavision`
--
ALTER TABLE `omzet_aavision`
  MODIFY `id_omzetvision` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengurangan_fee`
--
ALTER TABLE `pengurangan_fee`
  MODIFY `id_pengurangan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `referal`
--
ALTER TABLE `referal`
  MODIFY `id_referal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi`
--
ALTER TABLE `sub_komisi`
  MODIFY `id_sub_komisi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT untuk tabel `sub_komisi_afw`
--
ALTER TABLE `sub_komisi_afw`
  MODIFY `id_afw` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tutup_jurnal`
--
ALTER TABLE `tutup_jurnal`
  MODIFY `id_jurnal` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `co_broke`
--
ALTER TABLE `co_broke`
  ADD CONSTRAINT `co_broke_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kredit_bank_titipan_a`
--
ALTER TABLE `kredit_bank_titipan_a`
  ADD CONSTRAINT `kredit_bank_titipan_a_ibfk_1` FOREIGN KEY (`id_bta`) REFERENCES `bank_titipan_a` (`id_bta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_pph`
--
ALTER TABLE `master_pph`
  ADD CONSTRAINT `master_pph_ibfk_1` FOREIGN KEY (`id_komisi`) REFERENCES `komisi` (`id_komisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_pph_aavision`
--
ALTER TABLE `master_pph_aavision`
  ADD CONSTRAINT `master_pph_aavision_ibfk_1` FOREIGN KEY (`id_pph`) REFERENCES `master_pph` (`id_pph`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_pph_cobroke`
--
ALTER TABLE `master_pph_cobroke`
  ADD CONSTRAINT `master_pph_cobroke_ibfk_1` FOREIGN KEY (`id_pph`) REFERENCES `master_pph` (`id_pph`) ON DELETE CASCADE ON UPDATE CASCADE;

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
