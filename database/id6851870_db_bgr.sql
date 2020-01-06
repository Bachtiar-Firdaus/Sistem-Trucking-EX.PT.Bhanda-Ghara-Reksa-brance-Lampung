-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jan 2020 pada 16.20
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id6851870_db_bgr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `pass`, `level`) VALUES
('gudangbgr', 'SRENGSEM', 'gudangbgr', 4),
('gudangisab', 'ISAB', 'gudangisab', 5),
('gudangpundi', 'PUNDI', 'gudangpundi', 6),
('gudangtatum', 'TATUM', 'gudangtatum', 7),
('gudangwaterindex', 'WATERINDEX', 'gudangwaterindex', 8),
('gudangyapindex', 'YAPINDEX', 'gudangyapindex', 9),
('kantor', 'FULL ADMIN', 'kantor', 3),
('pantau', 'PANTAU', 'pantau', 10),
('pelabuhan', 'PELABUHAN', 'pelabuhan', 1),
('timbangan', 'TIMBANGAN', 'timbangan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_bgrserengsem`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_bgrserengsem` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_bgrserengsem`
--

INSERT INTO `tbl_gd_bgrserengsem` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(8989, '552322323', 2, 'BE 9901 DS', 'BACHTIAR', 'BGR SERENGSEM', 'PETRO', 1000000, 'TSP', 2000, 222, 1778, '2019-11-18', '18:02:18', '14:44:16', '1', 'SUDAH DATANG', 2),
(7878, '552322323', 3, 'BE 9909 AB', 'JAINAL', 'BGR SERENGSEM', 'PETRO', 1000000, 'TSP', 100000, 20000, 80000, '2019-11-18', '10:12:03', '14:44:13', '1', 'SUDAH DATANG', 2),
(7, 'SO-1907034', 7, 'BE 7777 AA', 'DIAN', 'BGR SERENGSEM', 'MBS LAMPUNG', 100000, 'TSP', 20000, 10000, 10000, '2019-11-14', '02:10:36', '02:11:02', '1', 'SUDAH BONGKAR', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_isab`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_isab` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_isab`
--

INSERT INTO `tbl_gd_isab` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(11, 'SO-1907034', 11, 'BE 1111 GG', 'EVAL', 'ISAB', 'MBS LAMPUNG', 100000, 'TSP', 21000, 10000, 11000, '2019-11-14', '02:09:35', '02:12:12', '1', 'SUDAH BONGKAR', 2),
(98, '552322323', 789, 'BE 8809 AD', 'DAYAT', 'ISAB', 'PETRO', 1000000, 'TSP', 1000, 50, 950, '2019-11-25', '10:29:57', '00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_pundi`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_pundi` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_pundi`
--

INSERT INTO `tbl_gd_pundi` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(12, 'SO-1907034', 12, 'BE 1212 VS', 'DENI', 'PUNDI', 'MBS LAMPUNG', 100000, 'TSP', 31000, 20000, 11000, '2019-11-14', '02:09:24', '02:12:47', '2', 'SUDAH BONGKAR', 2),
(535, '552322323', 7873, 'BE 9899 AD', 'DAUS', 'PUNDI', 'PETRO', 1000000, 'TSP', 70000, 30000, 40000, '2019-11-26', '11:12:03', '00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_tatum`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_tatum` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_tatum`
--

INSERT INTO `tbl_gd_tatum` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(10, 'SO-1907034', 10, 'BE 1010 CC', 'LIYAN', 'TATUM', 'MBS LAMPUNG', 100000, 'TSP', 42000, 15000, 27000, '2019-11-14', '02:09:48', '02:13:16', '1', 'SUDAH BONGKAR', 2),
(999, '552322323', 627, 'BE 6782 AS', 'BACHTIAR ', 'TATUM', 'PETRO', 1000000, 'TSP', 200000, 10000, 190000, '2019-11-25', '10:12:18', '10:12:36', '1', 'SUDAH DATANG', 2),
(787, '552322323', 661, 'BE 9912 AS', 'YOGA', 'TATUM', 'PETRO', 1000000, 'TSP', 10000, 5000, 5000, '2019-11-25', '10:28:27', '00:00:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_waterindex`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_waterindex` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_waterindex`
--

INSERT INTO `tbl_gd_waterindex` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(9, 'SO-1907034', 9, 'BE 9999 AD', 'NCI', 'WATERINDEX', 'MBS LAMPUNG', 100000, 'TSP', 40000, 10000, 30000, '2019-11-14', '02:10:00', '02:11:36', '2', 'SUDAH BONGKAR', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gd_yapindex`
--

CREATE TABLE IF NOT EXISTS `tbl_gd_yapindex` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL,
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `subgudang` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_gd_yapindex`
--

INSERT INTO `tbl_gd_yapindex` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `subgudang`, `keterangan`, `bermasalah`) VALUES
(8, 'SO-1907034', 8, 'BE 8888 AD', 'SUTARNO', 'YAPINDEX', 'MBS LAMPUNG', 100000, 'TSP', 21000, 10000, 11000, '2019-11-14', '02:10:20', '02:13:45', '12A', 'SUDAH BONGKAR', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jpt`
--

CREATE TABLE IF NOT EXISTS `tbl_jpt` (
`id` int(11) NOT NULL,
  `jtpelabuhantimbangan` varchar(11) NOT NULL,
  `jtgudangbgr` varchar(11) NOT NULL,
  `jtgudangyapindex` varchar(11) NOT NULL,
  `jtgudangwaterindex` varchar(11) NOT NULL,
  `jtgudangisab` varchar(11) NOT NULL,
  `jtgudangpundi` varchar(11) NOT NULL,
  `jtgudangtatum` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jpt`
--

INSERT INTO `tbl_jpt` (`id`, `jtpelabuhantimbangan`, `jtgudangbgr`, `jtgudangyapindex`, `jtgudangwaterindex`, `jtgudangisab`, `jtgudangpundi`, `jtgudangtatum`) VALUES
(1, '0 hours', '0 hours', '0 hours', '0 hours', '0 hours', '0 hours', '0 hours'),
(2, '-1 minute', '-30 minute', '-30 minute', '-30 minute', '-1 minute', '-30 minute', '-30 minute');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelabuhan_timbangan`
--

CREATE TABLE IF NOT EXISTS `tbl_pelabuhan_timbangan` (
  `nourut` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `nosuratjalan` int(11) NOT NULL DEFAULT '0',
  `nopolisi` varchar(12) NOT NULL,
  `namasupir` varchar(50) NOT NULL,
  `tujuangudang` varchar(50) NOT NULL,
  `pricipal` varchar(50) NOT NULL,
  `party` bigint(20) NOT NULL,
  `jenispupuk` varchar(50) NOT NULL,
  `timbangisi` bigint(20) NOT NULL,
  `timbangkosong` bigint(20) NOT NULL,
  `beratbersih` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `brangkat` time NOT NULL,
  `tiba` time NOT NULL,
  `bermasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelabuhan_timbangan`
--

INSERT INTO `tbl_pelabuhan_timbangan` (`nourut`, `nobongkar`, `nosuratjalan`, `nopolisi`, `namasupir`, `tujuangudang`, `pricipal`, `party`, `jenispupuk`, `timbangisi`, `timbangkosong`, `beratbersih`, `tanggal`, `brangkat`, `tiba`, `bermasalah`) VALUES
(7877, '552322323', 1, 'BE 3715 OV', 'DAUS', 'BGR SERENGSEM', 'PETRO', 1000000, 'TSP', 20000, 10000, 10000, '2019-11-18', '17:55:17', '17:56:08', 2),
(8989, '552322323', 2, 'BE 9901 DS', 'BACHTIAR', 'BGR SERENGSEM', 'PETRO', 1000000, 'TSP', 2000, 222, 1778, '2019-11-18', '18:00:03', '18:02:18', 2),
(7878, '552322323', 3, 'BE 9909 AB', 'JAINAL', 'BGR SERENGSEM', 'PETRO', 1000000, 'TSP', 100000, 20000, 80000, '2019-11-18', '18:03:06', '10:12:03', 2),
(7, 'SO-1907034', 7, 'BE 7777 AA', 'DIAN', 'BGR SERENGSEM', 'MBS LAMPUNG', 100000, 'TSP', 20000, 10000, 10000, '2019-11-14', '02:02:02', '02:10:36', 2),
(8, 'SO-1907034', 8, 'BE 8888 AD', 'SUTARNO', 'YAPINDEX', 'MBS LAMPUNG', 100000, 'TSP', 21000, 10000, 11000, '2019-11-14', '02:02:39', '02:10:20', 2),
(9, 'SO-1907034', 9, 'BE 9999 AD', 'NCI', 'WATERINDEX', 'MBS LAMPUNG', 100000, 'TSP', 40000, 10000, 30000, '2019-11-14', '02:03:10', '02:10:00', 2),
(10, 'SO-1907034', 10, 'BE 1010 CC', 'LIYAN', 'TATUM', 'MBS LAMPUNG', 100000, 'TSP', 42000, 15000, 27000, '2019-11-14', '02:03:36', '02:09:48', 2),
(11, 'SO-1907034', 11, 'BE 1111 GG', 'EVAL', 'ISAB', 'MBS LAMPUNG', 100000, 'TSP', 21000, 10000, 11000, '2019-11-14', '02:04:02', '02:09:35', 2),
(12, 'SO-1907034', 12, 'BE 1212 VS', 'DENI', 'PUNDI', 'MBS LAMPUNG', 100000, 'TSP', 31000, 20000, 11000, '2019-11-14', '02:04:33', '02:09:24', 2),
(999, '552322323', 627, 'BE 6782 AS', 'BACHTIAR ', 'TATUM', 'PETRO', 1000000, 'TSP', 200000, 10000, 190000, '2019-11-25', '10:11:38', '10:12:18', 2),
(787, '552322323', 661, 'BE 9912 AS', 'YOGA', 'TATUM', 'PETRO', 1000000, 'TSP', 10000, 5000, 5000, '2019-11-25', '10:25:30', '10:28:27', 1),
(98, '552322323', 789, 'BE 8809 AD', 'DAYAT', 'ISAB', 'PETRO', 1000000, 'TSP', 1000, 50, 950, '2019-11-25', '10:24:33', '10:29:57', 1),
(535, '552322323', 7873, 'BE 9899 AD', 'DAUS', 'PUNDI', 'PETRO', 1000000, 'TSP', 70000, 30000, 40000, '2019-11-26', '11:11:43', '11:12:03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pricipal`
--

CREATE TABLE IF NOT EXISTS `tbl_pricipal` (
`id` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `pricipal` varchar(100) NOT NULL,
  `party` int(11) NOT NULL,
  `kapal` varchar(100) NOT NULL,
  `jenispupuk` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pricipal`
--

INSERT INTO `tbl_pricipal` (`id`, `nobongkar`, `pricipal`, `party`, `kapal`, `jenispupuk`, `tanggal`, `keterangan`) VALUES
(25, '5520088122', 'PT PUPUK SRIWIJAYA', 1000000, 'MV BAOTONG', 'ZA', '2019-11-14', 'SUDAH BONGKAR'),
(31, '552322323', 'PETRO', 1000000, 'MV BAOTONG', 'TSP', '2019-11-19', 'BELUM BONGKAR'),
(29, 'SO-1907034', 'MBS LAMPUNG', 100000, 'ASTON', 'TSP', '2019-11-15', 'SUDAH BONGKAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_projek`
--

CREATE TABLE IF NOT EXISTS `tbl_projek` (
`id` int(11) NOT NULL,
  `nobongkar` varchar(100) NOT NULL,
  `pricipal` varchar(100) NOT NULL,
  `party` int(11) NOT NULL,
  `kapal` varchar(100) NOT NULL,
  `jenispupuk` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_projek`
--

INSERT INTO `tbl_projek` (`id`, `nobongkar`, `pricipal`, `party`, `kapal`, `jenispupuk`, `tanggal`, `keterangan`) VALUES
(8, '552322323', 'PETRO', 1000000, 'MV BAOTONG', 'TSP', '2019-11-19', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_gd_bgrserengsem`
--
ALTER TABLE `tbl_gd_bgrserengsem`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_gd_isab`
--
ALTER TABLE `tbl_gd_isab`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_gd_pundi`
--
ALTER TABLE `tbl_gd_pundi`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_gd_tatum`
--
ALTER TABLE `tbl_gd_tatum`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_gd_waterindex`
--
ALTER TABLE `tbl_gd_waterindex`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_gd_yapindex`
--
ALTER TABLE `tbl_gd_yapindex`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_jpt`
--
ALTER TABLE `tbl_jpt`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelabuhan_timbangan`
--
ALTER TABLE `tbl_pelabuhan_timbangan`
 ADD PRIMARY KEY (`nosuratjalan`);

--
-- Indexes for table `tbl_pricipal`
--
ALTER TABLE `tbl_pricipal`
 ADD PRIMARY KEY (`nobongkar`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_projek`
--
ALTER TABLE `tbl_projek`
 ADD PRIMARY KEY (`nobongkar`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jpt`
--
ALTER TABLE `tbl_jpt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pricipal`
--
ALTER TABLE `tbl_pricipal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_projek`
--
ALTER TABLE `tbl_projek`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
