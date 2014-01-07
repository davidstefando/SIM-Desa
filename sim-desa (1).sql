-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 10:59 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sim-desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Tgl` date NOT NULL,
  `Waktu` time NOT NULL,
  `Tempat` varchar(100) NOT NULL,
  `Peserta` varchar(100) NOT NULL,
  `Panitia` varchar(100) NOT NULL,
  `Kegiatan` text NOT NULL,
  `IdPenulis` int(6) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`Id`, `Nama`, `Tgl`, `Waktu`, `Tempat`, `Peserta`, `Panitia`, `Kegiatan`, `IdPenulis`) VALUES
(3, 'Rapat Kepengurusan', '2013-05-07', '10:00:00', 'kelurahan magelang utara', 'seluruh warga desa', 'Pengurus Desa', 'Re oraganisasi pengurus desa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `IdPenulis` int(6) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Isi` text NOT NULL,
  `Dibuat` varchar(30) NOT NULL,
  `Diedit` varchar(30) NOT NULL,
  `Kategori` varchar(3) NOT NULL,
  `Dibaca` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`Id`, `IdPenulis`, `Judul`, `Isi`, `Dibuat`, `Diedit`, `Kategori`, `Dibaca`) VALUES
(1, 1, 'Pendidikan', '<p>Abcdefghi</p>', '19-April-2013 09:21:46', '23-April-2013 11:47:39', '', 41);

-- --------------------------------------------------------

--
-- Table structure for table `datakk`
--

CREATE TABLE IF NOT EXISTS `datakk` (
  `IdKK` int(6) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `JK` varchar(20) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `Pekerjaan` varchar(20) NOT NULL,
  `NoIdentitas` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datakk`
--

INSERT INTO `datakk` (`IdKK`, `Status`, `Nama`, `JK`, `TTL`, `Pekerjaan`, `NoIdentitas`, `Alamat`) VALUES
(18, 'Istri', 'Nuraini', 'perempuan', 'Magelang 11996-02-02', 'Ibu Rumah Tangga', '', ''),
(18, 'Anak', 'Sri', 'perempuan', 'Magelang 1996-02-01', 'Pelajar', '', ''),
(18, '', 'abcdefghijklmnopqrstuvwxyz', '', ' ', '', '', ''),
(21, 'Istri', 'Nur', 'laki-laki', ' ', '', '', ''),
(21, 'Anak', 'Aini', 'laki-laki', ' ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE IF NOT EXISTS `datauser` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `TTL` varchar(80) NOT NULL,
  `JK` varchar(20) NOT NULL,
  `Telp` int(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`Id`, `Nama`, `Alamat`, `TTL`, `JK`, `Telp`) VALUES
(1, 'David Aditya Yoga P', 'Sanden', 'Magelang , 1996-02-01 ', 'laki-laki', 2147483647),
(2, 'David Pratama', '', ' , ', 'laki-laki', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE IF NOT EXISTS `kk` (
  `IdKK` int(6) NOT NULL AUTO_INCREMENT,
  `NamaKK` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `JumlahKeluarga` int(3) NOT NULL,
  `NoTelp` varchar(12) NOT NULL,
  `RW` int(3) NOT NULL,
  `RT` int(3) NOT NULL,
  PRIMARY KEY (`IdKK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`IdKK`, `NamaKK`, `Alamat`, `JumlahKeluarga`, `NoTelp`, `RW`, `RT`) VALUES
(18, 'Hari Suryono', 'Jln.Jeruk Timur', 2, '08573845793', 3, 1),
(21, 'Hari Sunyoto', 'Jln.Jeruk Timur', 2, '085738', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Tgl` varchar(30) NOT NULL,
  `Waktu` time NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Isi` text NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Telp` varchar(12) NOT NULL,
  `Tujuan` varchar(3) NOT NULL,
  `mark` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`Id`, `Nama`, `Tgl`, `Waktu`, `Judul`, `Isi`, `Alamat`, `Telp`, `Tujuan`, `mark`) VALUES
(1, 'David Aditya', '19-April-2013', '09:29:23', 'Perbaikan Jalan', 'Saya mau lapor jalan di RT saya rusak (RT1/RW2) Tolong ditindak lanjuti', 'Jln.Jeruk Timur', '085729577758', 'ABC', 1),
(2, 'sdf', '19-April-2013', '09:41:27', 'df', 'df\r\nsdf\r\nsdf\r\nsdf', 'sdf', 'dfg', 'ABC', 1),
(3, 'dfg', '23-April-2013', '13:14:10', 'dfg', 'dfg', 'dfg', 'dfg', 'ABC', 1),
(4, 'David', '24-April-2013', '08:33:46', 'Asu Kwe', 'Heh maju we \r\npijeti aku', '', '', 'ABC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_desa`
--

CREATE TABLE IF NOT EXISTS `pengurus_desa` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `JK` varchar(30) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Jabatan` varchar(30) NOT NULL,
  `NoIdentitas` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengurus_desa`
--

INSERT INTO `pengurus_desa` (`Id`, `Nama`, `JK`, `TTL`, `Alamat`, `Telp`, `Jabatan`, `NoIdentitas`) VALUES
(2, 'Haryanto Marjono S', 'Laki-Laki', 'Magelang, 1998-02-01', 'Jln. Jeruk III', '0857298788234', 'Wakil Kepala Desa', '0910293812322');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_rt`
--

CREATE TABLE IF NOT EXISTS `pengurus_rt` (
  `RW` varchar(10) NOT NULL,
  `RT` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `JK` varchar(9) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus_rt`
--

INSERT INTO `pengurus_rt` (`RW`, `RT`, `Nama`, `Jabatan`, `JK`, `TTL`, `Alamat`, `Telp`) VALUES
('RW1', 'RT1', 'Karjono W', 'Ketua', 'Laki-Laki', 'Magelang, 1998-02-01', 'Jln. Jeruk Barat III/15', '085729878879');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_rw`
--

CREATE TABLE IF NOT EXISTS `pengurus_rw` (
  `RW` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jabatan` varchar(50) NOT NULL,
  `JK` varchar(9) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `Telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus_rw`
--

INSERT INTO `pengurus_rw` (`RW`, `Nama`, `Jabatan`, `JK`, `Alamat`, `TTL`, `Telp`) VALUES
('RW1', 'Marjono S', 'Ketua', 'Laki-Laki', 'Jln. Jeruk', 'Magelang, 1998-02-01', '085729878871'),
('RW2', 'Mujiyono', 'Ketua', 'Laki-Laki', 'Jln. Jeruk Timur III/15, Sanden, Magelang', 'Magelang, 1998-02-01', '085729878871'),
('RW3', 'Karjono', 'Ketua RW', 'laki-laki', 'Jln. Manggis', 'Magelang 2013-04-30', '08572967778');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `Nama` varchar(50) NOT NULL,
  `Isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`Nama`, `Isi`) VALUES
('Nama Desa', 'Selurah'),
('Sub Artikel', 'Artikel Desa Kita'),
('Sub Laporan', 'Terimakasih Atas Kerjasamanya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `Lastaccess` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Level`, `Lastaccess`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '25-April-2013 14:30:24'),
(2, 'david', '81dc9bdb52d04dc20036dbd8313ed055', 'pengurusRT/RW', '23-April-2013 14:36:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
