-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 09:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan_bia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `catatan`) VALUES
(21020, 'Hutang/Pinjaman', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` int(10) NOT NULL,
  `periode_bulan` varchar(2) NOT NULL,
  `periode_tahun` varchar(4) NOT NULL,
  `lokasi_dana` varchar(10) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_voucher` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `jenis` varchar(6) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `lokasi_dana` varchar(12) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `kwitansi_pendukung` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_voucher`, `tanggal`, `deskripsi`, `jenis`, `jumlah`, `lokasi_dana`, `id_kategori`, `kwitansi_pendukung`) VALUES
(1, 'KTR 001/XI/18', '2019-11-01', 'Terima Pinjaman dari Pak Tedy I', 'Debit', 10500000, 'Kas', 21010, 'Kwitansi-1573568781.png'),
(2, 'KBY 001/XI/18', '2019-11-01', 'Pembuatan Surat Keterangan Bank Mandiri', 'Kredit', 50000, 'Kas', 21010, 'Kwitansi-1573476048.png'),
(3, 'KBY 002/XI/18', '2019-11-03', 'Honor Kekurangan Staf Bulan Agustus 2018 a.n. Ilham', 'Kredit', 3500000, 'Kas', 21020, 'Kwitansi-1573353092.png'),
(4, 'KBY 003/XI/18', '2019-11-03', 'Honor Kekurangan Staf Bulan September 2018 a.n. Mirzha', 'Kredit', 3500000, 'Kas', 21020, 'Kwitansi-1573374325.png'),
(5, 'KBY 004/XI/18', '2019-11-03', 'Honor Kekurangan Staf Bulan September 2018 a.n. Badruzzaman', 'Kredit', 2500000, 'Kas', 21020, 'Kwitansi-1573568827.png'),
(6, 'KBY 005/XI/18', '2019-11-05', 'Cetak Laporan Akhir Trans Anggrek', 'Kredit', 636800, 'Kas', 21010, 'Kwitansi-1573477413.png'),
(7, 'KTR 002/XI/18', '2019-11-09', 'Pengisian Saldo Kas', 'Debit', 18500000, 'Kas', 21010, 'Kwitansi-1573475323.png'),
(11, 'KBY 006/XI/18', '2019-11-11', 'Honor Staf bulan Agustus 2018 a.n. Ilham', 'Kredit', 3000000, 'Kas', 22010, 'Kwitansi-1573573581.png'),
(12, 'KBY 007/XI/18', '2019-11-11', 'Honor Staf bulan Agustus 2018 a.n. Subtoni', 'Kredit', 3000000, 'Kas', 22010, 'Kwitansi-1573573603.png'),
(13, 'KBY 008/XI/18', '2019-11-11', 'Honor Staf bulan Agustus 2018 a.n. Gondo', 'Kredit', 5000000, 'Kas', 22010, 'Kwitansi-1573573628.jpg'),
(14, 'KTR 003/XI/18', '2019-11-11', 'Pinjaman dari Pak Tedy Murtejo', 'Debit', 412000, 'Kas', 21010, 'Kwitansi-1573573661.png'),
(15, 'KBY 009/XI/18', '2019-11-11', 'Pembelian Flash Disk Toshiba 16 GB (2 buah)', 'Kredit', 138000, 'Kas', 21010, 'Kwitansi-1573617050.jpg'),
(16, 'KBY 010/XI/18', '2020-12-11', 'Pembelian Kertas A4 70 g', 'Kredit', 274000, 'Kas', 21010, 'Kwitansi-1573620068.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
