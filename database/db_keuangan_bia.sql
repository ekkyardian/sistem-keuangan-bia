-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 05:47 PM
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
  `lokasi_dana` varchar(12) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_saldo`
--

INSERT INTO `tb_saldo` (`id_saldo`, `periode_bulan`, `periode_tahun`, `lokasi_dana`, `jumlah_saldo`) VALUES
(16, '01', '2019', 'Kas', 3050000),
(17, '12', '2018', 'Kas', 0),
(19, '02', '2019', 'Kas', 3239000),
(22, '03', '2019', 'Kas', 5449000),
(23, '04', '2019', 'Kas', 6499000),
(24, '05', '2019', 'Kas', 6619000),
(25, '06', '2019', 'Kas', 6719000),
(26, '07', '2019', 'Kas', 6819000),
(27, '08', '2019', 'Kas', 6869000),
(28, '09', '2019', 'Kas', 7159000),
(29, '10', '2019', 'Kas', 7259000),
(30, '11', '2019', 'Kas', 7639000),
(31, '12', '2018', 'Bank Mandiri', 0),
(32, '01', '2019', 'Bank Mandiri', 0),
(33, '02', '2019', 'Bank Mandiri', 0),
(34, '03', '2019', 'Bank Mandiri', 0),
(35, '04', '2019', 'Bank Mandiri', 0),
(36, '05', '2019', 'Bank Mandiri', 0),
(37, '06', '2019', 'Bank Mandiri', 0),
(38, '07', '2019', 'Bank Mandiri', 0),
(39, '08', '2019', 'Bank Mandiri', 0),
(40, '09', '2019', 'Bank Mandiri', 255050000),
(41, '10', '2019', 'Bank Mandiri', 455030000),
(42, '11', '2019', 'Bank Mandiri', 575680000),
(43, '12', '2018', 'Bank BNI', 0),
(44, '01', '2019', 'Bank BNI', 0),
(45, '02', '2019', 'Bank BNI', 0),
(46, '03', '2019', 'Bank BNI', 0),
(47, '04', '2019', 'Bank BNI', 0),
(48, '05', '2019', 'Bank BNI', 0),
(49, '06', '2019', 'Bank BNI', 0),
(50, '07', '2019', 'Bank BNI', 0),
(51, '08', '2019', 'Bank BNI', 0),
(52, '09', '2019', 'Bank BNI', 6985000),
(53, '10', '2019', 'Bank BNI', 78985000),
(54, '11', '2019', 'Bank BNI', 43995000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_voucher` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `jenis` varchar(6) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `lokasi_dana` varchar(12) NOT NULL,
  `kwitansi_pendukung` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_voucher`, `tanggal`, `deskripsi`, `jenis`, `jumlah`, `lokasi_dana`, `kwitansi_pendukung`) VALUES
(1, 'KTR 001/I/19', '2019-01-01', 'Pengisian saldo kas', 'Debit', 3500000, 'Kas', 'Kwitansi-1574441091.png'),
(2, 'KBY 002/I/19', '2019-01-05', 'Jilid soft cover laporan ABC', 'Kredit', 355000, 'Kas', 'Kwitansi-1573476048.png'),
(3, 'KBY 003/I/19', '2019-01-11', 'Reiburse transportasi pegwai X', 'Kredit', 75000, 'Kas', 'Kwitansi-1573353092.png'),
(4, 'KTR 004/I/19', '2019-01-15', 'Angsuran ke-1 pinjaman karyawan Z', 'Debit', 100000, 'Kas', 'Kwitansi-1573374325.png'),
(5, 'KBY 005/I/19', '2019-01-16', 'Pembelian kertas A4 3 rim', 'Kredit', 120000, 'Kas', 'Kwitansi-1573568827.png'),
(6, 'KTR 001/II/19', '2019-02-05', 'Angsuran ke-2 dan ke-3 karyawan Z', 'Debit', 200000, 'Kas', 'Kwitansi-1573477413.png'),
(7, 'KBR 002/II/19', '2019-02-09', 'Service & perawatan AC kantor', 'Kredit', 150000, 'Kas', 'Kwitansi-1573475323.png'),
(8, 'KTR 003/II/19', '2019-02-11', 'Pengisian saldo kas', 'Debit', 500000, 'Kas', 'Kwitansi-1573573581.png'),
(9, 'KBY 004/II/19', '2019-02-11', 'Konsumsi rapat pendahuluan projek X', 'Kredit', 346000, 'Kas', 'Kwitansi-1573573603.png'),
(10, 'KBY 005/II/19', '2019-02-13', 'Fotokopi dokumen', 'Kredit', 15000, 'Kas', 'Kwitansi-1573573628.jpg'),
(11, 'KBY 001/III/19', '2019-03-17', 'Pembelian tinta printer warna', 'Kredit', 120000, 'Kas', 'Kwitansi-1573573661.png'),
(12, 'KBY 002/III/19', '2019-03-18', 'Pembelian Flash Disk Toshiba 16 GB', 'Kredit', 70000, 'Kas', 'Kwitansi-1573617050.jpg'),
(13, 'KTR 003/III/19', '2019-03-21', 'Pengisian saldo kas', 'Debit', 1500000, 'Kas', 'Kwitansi-1573620068.jpg'),
(14, 'KTR 004/III/19', '2019-03-25', 'Penerimaan sisa pembayaran proyek X', 'Debit', 800000, 'Kas', 'Kwitansi-1574232446.png'),
(15, 'KTR 005/III/19', '2019-03-25', 'Pengisian kas', 'Debit', 100000, 'Kas', 'Kwitansi-1574232497.png'),
(16, 'KTR 001/IV/19', '2019-04-06', 'Pengisian saldo kas', 'Debit', 300000, 'Kas', 'Kwitansi-1574232915.png'),
(17, 'KTR 002/IV/19', '2019-04-06', 'Pengisian saldo kas', 'Debit', 50000, 'Kas', 'Kwitansi-1574232966.png'),
(18, 'KTR 003/IV/19', '2019-04-06', 'Pembayaran proyek X termin 2', 'Debit', 1000000, 'Kas', 'Kwitansi-1574241845.png'),
(19, 'KBY 004/IV/19', '2019-04-09', 'Top-up kartu multi trip perusahaan', 'Kredit', 300000, 'Kas', 'Kwitansi-1574242169.png'),
(20, 'KTR 001/V/19', '2019-05-01', 'Pengisian saldo kas', 'Debit', 300000, 'Kas', NULL),
(21, 'KTR 002/V/19', '2019-05-02', 'Mutasi saldo dari Bank BNI', 'Debit', 800000, 'Kas', NULL),
(22, 'KBY 003/V/19', '2019-05-03', 'Bayar listrik Bulan Mei', 'Kredit', 980000, 'Kas', NULL),
(23, 'KTR 001/VI/19', '2019-06-01', 'Pengisian saldo kas', 'Debit', 500000, 'Kas', NULL),
(24, 'KTR 002/VI/19', '2019-06-02', 'Angsuran ke-2 pinjaman karyawan Z', 'Debit', 100000, 'Kas', NULL),
(25, 'KBY 003/VI/19', '2019-06-03', 'Biaya internet bulan Juni', 'Kredit', 500000, 'Kas', NULL),
(26, 'KTR 001/VII/19', '2019-07-01', 'Pengisian saldo kas', 'Debit', 100000, 'Kas', NULL),
(27, 'KBY 002/VII/19', '2019-07-02', 'Pengisian saldo kas', 'Debit', 50000, 'Kas', NULL),
(28, 'KBY 003/VII/19', '2019-07-03', 'Top-up saldo multi trip', 'Kredit', 50000, 'Kas', NULL),
(29, 'KTR 001/VIII/19', '2019-08-01', 'Pengisian saldo kas', 'Debit', 50000, 'Kas', NULL),
(30, 'KTR 002/VIII/19', '2019-08-02', 'Terima pinjaman dari X', 'Debit', 1000000, 'Kas', NULL),
(31, 'KTR 003/VIII/19', '2019-08-03', 'Biaya survei projek Z', 'Kredit', 1000000, 'Kas', NULL),
(32, 'KTR 001/IX/19', '2019-09-01', 'Pengisian saldo kas', 'Debit', 300000, 'Kas', NULL),
(33, 'KTR 002/IX/19', '2019-09-02', 'Angsuran ke-3 pinjaman karyawan Z', 'Debit', 100000, 'Kas', NULL),
(34, 'KBY 003/IX/19', '2019-09-03', 'Biaya ATK', 'Kredit', 110000, 'Kas', NULL),
(35, 'KTR 001/X/19', '2019-10-01', 'Pengisian saldo kas', 'Debit', 100000, 'Kas', NULL),
(36, 'KBY 002/X/19', '2019-10-02', 'Mutasi saldo Bank Mandiri', 'Debit', 400000, 'Kas', NULL),
(37, 'KBY 003/X/19', '2019-10-03', 'Konsumsi rapat projek X', 'Kredit', 400000, 'Kas', NULL),
(38, 'KTR 001/XI/19', '2019-11-01', 'Pengisian saldo kas', 'Debit', 80000, 'Kas', NULL),
(39, 'KTR 002/XI/19', '2019-11-21', 'Angsuran ke-1 pinjaman karyawan X', 'Debit', 300000, 'Kas', NULL),
(40, 'KBY 003/XI/19', '2019-11-22', 'Obat-obatan', 'Kredit', 200000, 'Kas', NULL),
(41, 'KTR 004/XI/19', '2019-11-22', 'Pengisian saldo kas', 'Debit', 4000000, 'Kas', NULL),
(42, 'KBY 005/XI/19', '2019-11-22', 'Iuran BPJS Kesehatan karyawan', 'Kredit', 3800000, 'Kas', NULL),
(43, 'MTR 001/IX/19', '2019-09-01', 'Penerimaan bayaran peojek X', 'Debit', 300000000, 'Bank Mandiri', NULL),
(44, 'MBY 002/IX/19', '2019-09-02', 'Beban gaji karyawan September 2019', 'Kredit', 45000000, 'Bank Mandiri', NULL),
(45, 'MTR 003/IX/19', '2019-09-03', 'Bunga bank', 'Debit', 50000, 'Bank Mandiri', NULL),
(46, 'MTR 001/X/19', '2019-10-01', 'Bayaran Termin 2 Projek B', 'Debit', 120000000, 'Bank Mandiri', NULL),
(47, 'MBY 002/X/19', '2019-10-02', 'Biaya administrasi', 'Kredit', 20000, 'Bank Mandiri', NULL),
(48, 'MTR 003/X/19', '2019-10-03', 'Penerimaan pembayaran projek X', 'Debit', 80000000, 'Bank Mandiri', NULL),
(49, 'MTR 001/XI/19', '2019-11-01', 'Penerimaan pembayaran projek Y', 'Debit', 120000000, 'Bank Mandiri', NULL),
(50, 'MBY 002/XI/19', '2019-11-02', 'Mutasi saldo ke kas', 'Kredit', 50000, 'Bank Mandiri', NULL),
(51, 'MTR 003/XI/19', '2019-11-03', 'Mutasi dari Bank BNI', 'Debit', 700000, 'Bank Mandiri', NULL),
(52, 'BTR 001/IX/19', '2019-09-01', 'Mutasi dari bank Mandiri', 'Debit', 10000000, 'Bank BNI', NULL),
(53, 'BBY 002/IX/19', '2019-09-02', 'Biaya survey Projek X', 'Kredit', 3000000, 'Bank BNI', NULL),
(54, 'BBY 003/IX/19', '2019-09-03', 'Biaya administasi tabungan', 'Kredit', 15000, 'Bank BNI', NULL),
(55, 'BTR 001/X/19', '2019-10-01', 'Penerimaan bayaran projek C', 'Debit', 90000000, 'Bank BNI', NULL),
(56, 'BBY 002/X/19', '2019-10-02', 'Iuran BPJS Ketenagakerjaan', 'Kredit', 15000000, 'Bank BNI', NULL),
(57, 'BBY 003/X/19', '2019-10-03', 'Sewa mobil kantor', 'Kredit', 3000000, 'Bank BNI', NULL),
(58, 'BTR 001/XI/19', '2019-11-01', 'Mutasi dari Bank Mandiri', 'Debit', 10000, 'Bank BNI', NULL),
(59, 'BBY 002/XI/19', '2019-11-02', 'Beban gaji karyawan', 'Kredit', 20000000, 'Bank BNI', NULL),
(60, 'BBY 003/XI/19', '2019-11-03', 'Iuran BPJS Kesehatan Karyawan', 'Kredit', 15000000, 'Bank BNI', NULL);

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
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Ekky', 'admin', 'admin'),
(2, 'Tedy', 'direktur', 'direktur');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_bulan`
-- (See below for the actual view)
--
CREATE TABLE `view_bulan` (
`bulan` varchar(2)
,`nama_bulan` varchar(9)
);

-- --------------------------------------------------------

--
-- Structure for view `view_bulan`
--
DROP TABLE IF EXISTS `view_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bulan`  AS  select '1' AS `bulan`,'januari' AS `nama_bulan` union all select '2' AS `bulan`,'februari' AS `nama_bulan` union all select '3' AS `bulan`,'maret' AS `nama_bulan` union all select '4' AS `bulan`,'april' AS `nama_bulan` union all select '5' AS `bulan`,'mei' AS `nama_bulan` union all select '6' AS `bulan`,'juni' AS `nama_bulan` union all select '7' AS `bulan`,'juli' AS `nama_bulan` union all select '8' AS `bulan`,'agustus' AS `nama_bulan` union all select '9' AS `bulan`,'september' AS `nama_bulan` union all select '10' AS `bulan`,'oktober' AS `nama_bulan` union all select '11' AS `bulan`,'november' AS `nama_bulan` union all select '12' AS `bulan`,'desember' AS `nama_bulan` ;

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
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
