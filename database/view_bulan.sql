-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 11:30 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
-- Structure for view `view_bulan`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bulan`  AS  select '1' AS `bulan`,'januari' AS `nama_bulan` union all select '2' AS `bulan`,'februari' AS `nama_bulan` union all select '3' AS `bulan`,'maret' AS `nama_bulan` union all select '4' AS `bulan`,'april' AS `nama_bulan` union all select '5' AS `bulan`,'mei' AS `nama_bulan` union all select '6' AS `bulan`,'juni' AS `nama_bulan` union all select '7' AS `bulan`,'juli' AS `nama_bulan` union all select '8' AS `bulan`,'agustus' AS `nama_bulan` union all select '9' AS `bulan`,'september' AS `nama_bulan` union all select '10' AS `bulan`,'oktober' AS `nama_bulan` union all select '11' AS `bulan`,'november' AS `nama_bulan` union all select '12' AS `bulan`,'desember' AS `nama_bulan` ;

--
-- VIEW  `view_bulan`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
