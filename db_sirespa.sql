-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sirespa`
--
CREATE DATABASE IF NOT EXISTS `db_sirespa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sirespa`;

-- --------------------------------------------------------

--
-- Table structure for table `tbkamar`
--

CREATE TABLE IF NOT EXISTS `tbkamar` (
  `idKamar` int(2) NOT NULL,
  `namaKamar` varchar(15) NOT NULL,
  `availability` varchar(3) NOT NULL,
  PRIMARY KEY (`idKamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblayanan`
--

CREATE TABLE IF NOT EXISTS `tblayanan` (
  `idLayanan` int(9) NOT NULL AUTO_INCREMENT,
  `namaLayanan` varchar(50) DEFAULT NULL,
  `durasiLayanan` varchar(10) DEFAULT NULL,
  `hargaLayanan` decimal(8,0) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idLayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblayanan`
--

INSERT INTO `tblayanan` (`idLayanan`, `namaLayanan`, `durasiLayanan`, `hargaLayanan`, `foto`, `keterangan`) VALUES
(13, 'Hair Styling', '30', '100000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing eliteger gravida velit quis dolo Pellentesque elit tortor'),
(14, 'Skin Treatment', '60', '235000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing eliteger gravida velit quis dolo Pellentesque elit tortor'),
(15, 'Hair Treatment', '30', '200000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing eliteger gravida velit quis dolo Pellentesque elit tortor'),
(16, 'Body Massage', '60', '275000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing eliteger gravida velit quis dolo Pellentesque elit tortor'),
(17, 'Color Treatment', '30', '210000', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing eliteger gravida velit quis dolo Pellentesque elit tortor');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE IF NOT EXISTS `tblogin` (
  `idLogin` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`idLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`idLogin`, `email`, `password`, `level`) VALUES
(1, 'bagus@gmail.com', '12345678', 1),
(2, 'nana@gmail.com', '12345678', 1),
(3, 'budi@gmail.com', '12345678', 1),
(4, 'nina@gmail.com', '12345678', 1),
(5, 'yuda@gmail.com', '12345678', 2),
(6, 'arifin@gmail.com', '12345678', 2),
(7, 'putuyudajuniarta@gmail.com', '123', 2),
(8, 'bagusanditha@gmail.com', '123', 2),
(9, 'dedi@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE IF NOT EXISTS `tbpelanggan` (
  `idPelanggan` int(9) NOT NULL AUTO_INCREMENT,
  `pNama` varchar(50) DEFAULT NULL,
  `pTelp` varchar(13) DEFAULT NULL,
  `pEmail` varchar(60) DEFAULT NULL,
  `pPassword` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`idPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`idPelanggan`, `pNama`, `pTelp`, `pEmail`, `pPassword`) VALUES
(1, 'Yuda', '085850949722', 'yuda@gmail.com', '12345678'),
(2, 'Arifin', '089776234512', 'arifin@gmail.com', '12345678'),
(6, 'I Putu Yuda Juniarta', '988', 'putuyudajuniarta@gmail.com', '123'),
(8, 'Bagus Anditha Prawira', '084', 'bagusanditha@gmail.com', '123'),
(9, 'dedi', '789', 'dedi@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbpesanan`
--

CREATE TABLE IF NOT EXISTS `tbpesanan` (
  `idPesanan` int(9) NOT NULL AUTO_INCREMENT,
  `idPelanggan` int(9) DEFAULT NULL,
  `idLayanan` int(9) DEFAULT NULL,
  `tglPesanan` date DEFAULT NULL,
  `wktMulai` time DEFAULT NULL,
  `wktSelesai` time DEFAULT NULL,
  `namaKamar` varchar(15) NOT NULL,
  `namaTerapis` varchar(60) NOT NULL,
  `validasi` varchar(8) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `buktiPembayaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPesanan`),
  KEY `fk_pesanan_pelanggan` (`idPelanggan`),
  KEY `fk_pesanan_layanan` (`idLayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpesanan`
--

INSERT INTO `tbpesanan` (`idPesanan`, `idPelanggan`, `idLayanan`, `tglPesanan`, `wktMulai`, `wktSelesai`, `namaKamar`, `namaTerapis`, `validasi`, `status`, `buktiPembayaran`) VALUES
(22, 1, 13, '2024-03-22', '11:00:00', '11:30:00', '', '', 'Valid', 'Aktif', NULL),
(23, 1, 16, '2024-03-27', '09:00:00', '10:00:00', '', '', NULL, NULL, NULL),
(24, 1, 17, '2024-03-22', '13:00:00', '13:30:00', '', '', 'Valid', 'Aktif', NULL),
(25, 1, 14, '2024-03-23', '11:00:00', '12:00:00', '', '', NULL, NULL, NULL),
(26, 1, 16, '2024-03-25', '08:00:00', '09:00:00', '', '', NULL, NULL, NULL),
(27, 1, 14, '2024-03-22', '11:00:00', '12:00:00', '', '', NULL, NULL, NULL),
(28, NULL, 15, '2024-04-30', '10:00:00', '10:30:00', '', '', NULL, NULL, NULL),
(29, NULL, 13, '2024-05-16', '10:00:00', '10:30:00', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbstaff`
--

CREATE TABLE IF NOT EXISTS `tbstaff` (
  `idStaff` int(9) NOT NULL AUTO_INCREMENT,
  `sNama` varchar(50) DEFAULT NULL,
  `sTelp` varchar(13) DEFAULT NULL,
  `sEmail` varchar(50) DEFAULT NULL,
  `sPassword` char(10) DEFAULT NULL,
  PRIMARY KEY (`idStaff`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstaff`
--

INSERT INTO `tbstaff` (`idStaff`, `sNama`, `sTelp`, `sEmail`, `sPassword`) VALUES
(1, 'bagus', '082665347827', 'bagus@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbterapis`
--

CREATE TABLE IF NOT EXISTS `tbterapis` (
  `idTerapis` int(9) NOT NULL,
  `namaTerapis` varchar(60) NOT NULL,
  `Spesialisasi` varchar(30) NOT NULL,
  `telpTerapis` varchar(13) NOT NULL,
  `fotoTerapis` varchar(100) NOT NULL,
  PRIMARY KEY (`idTerapis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbterapisunavailability`
--

CREATE TABLE IF NOT EXISTS `tbterapisunavailability` (
  `id` int(9) NOT NULL,
  `idTerapis` int(9) NOT NULL,
  `tglAbsen(awal)` date NOT NULL,
  `tglAbsen(akhir)` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbtestimoni`
--

CREATE TABLE IF NOT EXISTS `tbtestimoni` (
  `pNama` varchar(50) NOT NULL,
  `namaLayanan` varchar(50) NOT NULL,
  `testimoni` varchar(1000) NOT NULL,
  `visibility` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbpesanan`
--
ALTER TABLE `tbpesanan`
  ADD CONSTRAINT `fk_pesanan_layanan` FOREIGN KEY (`idLayanan`) REFERENCES `tblayanan` (`idLayanan`),
  ADD CONSTRAINT `fk_pesanan_pelanggan` FOREIGN KEY (`idPelanggan`) REFERENCES `tbpelanggan` (`idPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
