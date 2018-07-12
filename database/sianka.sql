-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 10:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sianka`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlet`
--

CREATE TABLE `atlet` (
  `atlet_nik` bigint(20) UNSIGNED NOT NULL,
  `atlet_nama` varchar(100) NOT NULL,
  `atlet_tgl_lahir` date NOT NULL,
  `atlet_jk` enum('Putra','Putri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atlet`
--

INSERT INTO `atlet` (`atlet_nik`, `atlet_nama`, `atlet_tgl_lahir`, `atlet_jk`) VALUES
(2220072512000009, 'AUFA HANIF ABIYYU SULTHON', '2000-12-25', 'Putra'),
(3311072610970003, 'ABDUL ROHIM BAYU AJI PRAYOGO', '1997-10-26', 'Putra'),
(3311121311960001, 'HELMI ADI PRASETYO', '1996-11-13', 'Putra'),
(3311125606980001, 'RAVI EKA WINATA', '1998-06-16', 'Putri'),
(3311126011010003, 'EMPI WANGSA PUTRI', '2001-11-20', 'Putri'),
(3313090801960001, 'ADHIMUKTI SURYA ANINDYAJATI', '1996-01-08', 'Putra'),
(3320096111010005, 'NEVINTA', '2001-11-21', 'Putri');

-- --------------------------------------------------------

--
-- Table structure for table `bagan`
--

CREATE TABLE `bagan` (
  `bagan_id` int(11) UNSIGNED NOT NULL,
  `kelas_id` varchar(6) NOT NULL,
  `event_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagan`
--

INSERT INTO `bagan` (`bagan_id`, `kelas_id`, `event_id`) VALUES
(1, 'KL0001', 'E2018053104'),
(2, 'KL0002', 'E2018053104'),
(3, 'KL0003', 'E2018053104'),
(4, 'KL0004', 'E2018053104');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` varchar(11) NOT NULL,
  `event_nama` varchar(100) NOT NULL,
  `event_tgl_mulai` date NOT NULL,
  `event_tgl_selesai` date NOT NULL,
  `event_tempat` varchar(50) NOT NULL,
  `event_info` varchar(200) NOT NULL,
  `event_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_nama`, `event_tgl_mulai`, `event_tgl_selesai`, `event_tempat`, `event_info`, `event_create`) VALUES
('E2018053103', 'Kejuaraan Karate Nasional Solo 2', '2018-06-08', '2018-06-10', 'GOR MAHANAN', 'apa tuhhh :)', '2018-05-31'),
('E2018053104', 'Kejuaraan Karate Nasional Jepara', '2018-07-01', '2018-07-03', 'GOR Jepara', 'Ditunggu aja info selanjutnya :)', '2018-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(6) NOT NULL,
  `kelas_nama` varchar(100) NOT NULL,
  `kelas_kategori` varchar(100) NOT NULL,
  `kelas_jk` enum('Putra','Putri') NOT NULL,
  `kelas_usia` int(3) NOT NULL,
  `kelas_beratbadan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`, `kelas_kategori`, `kelas_jk`, `kelas_usia`, `kelas_beratbadan`) VALUES
('KL0001', 'Kata Perorangan Pra Usia Dini Putra', 'Pra Usia Dini', 'Putra', 7, 0),
('KL0002', 'Kumite -30 Kg Pra Usia Dini Putra', 'Pra Usia Dini', 'Putra', 7, 30),
('KL0003', 'Kumite +30 Kg Pra Usia Dini Putra', 'Pra Usia Dini', 'Putra', 7, 31),
('KL0004', 'Kata Perorangan Pra Usia Dini Putri', 'Pra Usia Dini', 'Putri', 7, 0),
('KL0005', 'Kumite -25 Kg Pra Usia Dini Putri', 'Pra Usia Dini', 'Putri', 7, 25),
('KL0006', 'Kumite +25 Kg Pra Usia Dini Putri', 'Pra Usia Dini', 'Putri', 7, 26),
('KL0007', 'Kata Perorangan Usia Dini Putra', 'Usia Dini', 'Putra', 9, 0),
('KL0008', 'Kata Beregu Gabungan Usia Dini & Pra Pemula Putra', 'Usia Dini', 'Putra', 9, 0),
('KL0009', 'Kumite -30 Kg Usia Dini Putra', 'Usia Dini', 'Putra', 9, 30),
('KL0010', 'Kumite +30 Kg Usia Dini Putra', 'Usia Dini', 'Putra', 9, 31),
('KL0011', 'Kata Perorangan Usia Dini Putri', 'Usia Dini', 'Putri', 9, 0),
('KL0012', 'Kata Beregu Gabungan Usia Dini & Pra Pemula Putri', 'Usia Dini', 'Putri', 9, 0),
('KL0013', 'Kumite -25 Kg Usia Dini Putri', 'Usia Dini', 'Putri', 9, 25),
('KL0014', 'Kumite +25 Kg Usia Dini Putri', 'Usia Dini', 'Putri', 9, 26),
('KL0015', 'Kata Perorangan Pra Pemula Putra', 'Pra Pemula', 'Putra', 11, 0),
('KL0016', 'Kumite -35 Kg Pra Pemula Putra', 'Pra Pemula', 'Putra', 11, 35),
('KL0017', 'Kumite +35 Kg Pra Pemula Putra', 'Pra Pemula', 'Putra', 11, 36),
('KL0018', 'Kata Perorangan Pra Pemula Putri', 'Pra Pemula', 'Putri', 11, 0),
('KL0019', 'Kumite -30 Kg Pra Pemula Putri', 'Pra Pemula', 'Putri', 11, 30),
('KL0020', 'Kumite +30 Kg Pra Pemula Putri', 'Pra Pemula', 'Putri', 11, 31),
('KL0021', 'Kata Perorangan Pemula Putra', 'Pemula', 'Putra', 13, 0),
('KL0022', 'Kata Beregu Gabungan Pemula & Kadet Putra', 'Pemula', 'Putra', 13, 0),
('KL0023', 'Kumite -40 Kg Pemula Putra', 'Pemula', 'Putra', 13, 40),
('KL0024', 'Kumite -45 Kg Pemula Putra', 'Pemula', 'Putra', 13, 45),
('KL0025', 'Kumite -50 Kg Pemula Putra', 'Pemula', 'Putra', 13, 50),
('KL0026', 'Kumite +50 Kg Pemula Putra', 'Pemula', 'Putra', 13, 51),
('KL0027', 'Kata Perorangan Pemula Putri', 'Pemula', 'Putri', 13, 0),
('KL0028', 'Kata Beregu Gabungan Pemula & Kadet Putri', 'Pemula', 'Putri', 13, 0),
('KL0029', 'Kumite -35 Kg Pemula Putri', 'Pemula', 'Putri', 13, 35),
('KL0030', 'Kumite -40 Kg Pemula Putri', 'Pemula', 'Putri', 13, 40),
('KL0031', 'Kumite -45 Kg Pemula Putri', 'Pemula', 'Putri', 13, 45),
('KL0032', 'Kumite +45 Kg Pemula Putri', 'Pemula', 'Putri', 13, 46),
('KL0033', 'Kata Perorangan Kadet Putra', 'Kadet', 'Putra', 15, 0),
('KL0034', 'Kumite -52 Kg Kadet Putra', 'Kadet', 'Putra', 15, 52),
('KL0035', 'Kumite -57 Kg Kadet Putra', 'Kadet', 'Putra', 15, 57),
('KL0036', 'Kumite -63 Kg Kadet Putra', 'Kadet', 'Putra', 15, 63),
('KL0037', 'Kumite -70 Kg Kadet Putra', 'Kadet', 'Putra', 15, 70),
('KL0038', 'Kumite +70 Kg Kadet Putra', 'Kadet', 'Putra', 15, 71),
('KL0039', 'Kata Perorangan Kadet Putri', 'Kadet', 'Putri', 15, 0),
('KL0040', 'Kumite -47 Kg Kadet Putri', 'Kadet', 'Putri', 15, 47),
('KL0041', 'Kumite -54 Kg Kadet Putri', 'Kadet', 'Putri', 15, 54),
('KL0042', 'Kumite +54 Kg Kadet Putri', 'Kadet', 'Putri', 15, 55),
('KL0043', 'Kata Perorangan Junior Putra', 'Junior', 'Putra', 17, 0),
('KL0044', 'Kata Beregu Gabungan Junior & Senior Putra', 'Junior', 'Putra', 17, 0),
('KL0045', 'Kumite -55 Kg Junior Putra', 'Junior', 'Putra', 17, 55),
('KL0046', 'Kumite -61 Kg Junior Putra', 'Junior', 'Putra', 17, 61),
('KL0047', 'Kumite -68 Kg Junior Putra', 'Junior', 'Putra', 17, 68),
('KL0048', 'Kumite -76 Kg Junior Putra', 'Junior', 'Putra', 17, 76),
('KL0049', 'Kumite +76 Kg Junior Putra', 'Junior', 'Putra', 17, 77),
('KL0050', 'Kata Perorangan Junior Putri', 'Junior', 'Putri', 17, 0),
('KL0051', 'Kata Beregu Gabungan Junior & Senior Putri', 'Junior', 'Putri', 17, 0),
('KL0052', 'Kumite -48 Kg Junior Putri', 'Junior', 'Putri', 17, 48),
('KL0053', 'Kumite -53 Kg Junior Putri', 'Junior', 'Putri', 17, 53),
('KL0054', 'Kumite -59 Kg Junior Putri', 'Junior', 'Putri', 17, 59),
('KL0055', 'Kumite +59 Kg Junior Putri', 'Junior', 'Putri', 17, 60),
('KL0056', 'Kata Perorangan Senior Putra', 'Senior', 'Putra', 19, 0),
('KL0057', 'Kumite -55 Kg Senior Putra', 'Senior', 'Putra', 19, 55),
('KL0058', 'Kumite -60 Kg Senior Putra', 'Senior', 'Putra', 19, 60),
('KL0059', 'Kumite -67 Kg Senior Putra', 'Senior', 'Putra', 19, 67),
('KL0060', 'Kumite -75 Kg Senior Putra', 'Senior', 'Putra', 19, 75),
('KL0061', 'Kumite -84 Kg Senior Putra', 'Senior', 'Putra', 19, 84),
('KL0062', 'Kumite +84 Kg Senior Putra', 'Senior', 'Putra', 19, 85),
('KL0063', 'Kata Perorangan Senior Putri', 'Senior', 'Putri', 19, 0),
('KL0064', 'Kumite -50 Kg Senior Putri', 'Senior', 'Putri', 19, 50),
('KL0065', 'Kumite -55 Kg Senior Putri', 'Senior', 'Putri', 19, 55),
('KL0066', 'Kumite -61 Kg Senior Putri', 'Senior', 'Putri', 19, 61),
('KL0067', 'Kumite -68 Kg Senior Putri', 'Senior', 'Putri', 19, 68),
('KL0068', 'Kumite +68 Kg Senior Putri', 'Senior', 'Putri', 19, 69);

-- --------------------------------------------------------

--
-- Table structure for table `kontingen`
--

CREATE TABLE `kontingen` (
  `kontingen_id` varchar(11) NOT NULL,
  `kontingen_nama` varchar(100) NOT NULL,
  `kontingen_official` varchar(100) NOT NULL,
  `kontingen_cp` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontingen`
--

INSERT INTO `kontingen` (`kontingen_id`, `kontingen_nama`, `kontingen_official`, `kontingen_cp`, `username`, `password`, `authKey`, `accessToken`) VALUES
('KT180520001', 'Solo Karate Club', 'Salimi', '08158151929', 'arohim002@gmail.com', 'asdasd', '', ''),
('KT180520002', 'Cadet Dojo', 'Andi L', '08125124', 'cadet@gmail.com', 'cadet', '', ''),
('KT180520003', 'UMS', 'Aghna I', '0889817248', 'UMS@sc.id', 'ums', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ktg_atlet`
--

CREATE TABLE `ktg_atlet` (
  `ktg_atlet_id` varchar(32) NOT NULL,
  `kontingen_id` varchar(11) NOT NULL,
  `atlet_nik` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktg_atlet`
--

INSERT INTO `ktg_atlet` (`ktg_atlet_id`, `kontingen_id`, `atlet_nik`) VALUES
('KTA2220072512000009KT180520001', 'KT180520001', 2220072512000009),
('KTA3311072610970003KT180520001', 'KT180520001', 3311072610970003),
('KTA3311121311960001KT180520003', 'KT180520003', 3311121311960001),
('KTA3311125606980001KT180520001', 'KT180520001', 3311125606980001),
('KTA3311126011010003KT180520003', 'KT180520003', 3311126011010003);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `pendaftar_id` int(11) NOT NULL,
  `ktg_atlet_id` varchar(32) NOT NULL,
  `bagan_id` int(11) UNSIGNED NOT NULL,
  `berat_badan` int(3) UNSIGNED NOT NULL,
  `info_grup` varchar(100) NOT NULL,
  `perguruan` varchar(20) NOT NULL,
  `prestasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`pendaftar_id`, `ktg_atlet_id`, `bagan_id`, `berat_badan`, `info_grup`, `perguruan`, `prestasi`) VALUES
(1, 'KTA2220072512000009KT180520001', 2, 29, '', 'Lemkari', '2'),
(2, 'KTA3311072610970003KT180520001', 2, 29, '', 'Lemkari', '1'),
(5, 'KTA3311121311960001KT180520003', 1, 29, '', 'Lemkari', ''),
(6, 'KTA3311121311960001KT180520003', 2, 29, '', 'Lemkari', ''),
(7, 'KTA3311072610970003KT180520001', 1, 0, '', 'Lemkari', '1'),
(8, 'KTA3311072610970003KT180520001', 3, 29, '[\"KTA2220072512000009KT180520001\",\"KTA3311072610970003KT180520001\"]', 'Lemkari', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atlet`
--
ALTER TABLE `atlet`
  ADD PRIMARY KEY (`atlet_nik`);

--
-- Indexes for table `bagan`
--
ALTER TABLE `bagan`
  ADD PRIMARY KEY (`bagan_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `kontingen`
--
ALTER TABLE `kontingen`
  ADD PRIMARY KEY (`kontingen_id`);

--
-- Indexes for table `ktg_atlet`
--
ALTER TABLE `ktg_atlet`
  ADD PRIMARY KEY (`ktg_atlet_id`),
  ADD KEY `atlet_nik` (`atlet_nik`),
  ADD KEY `kontingen_id` (`kontingen_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`),
  ADD KEY `ktg_atlet_id` (`ktg_atlet_id`),
  ADD KEY `bagan_id` (`bagan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagan`
--
ALTER TABLE `bagan`
  MODIFY `bagan_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `pendaftar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bagan`
--
ALTER TABLE `bagan`
  ADD CONSTRAINT `bagan_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bagan_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ktg_atlet`
--
ALTER TABLE `ktg_atlet`
  ADD CONSTRAINT `ktg_atlet_ibfk_2` FOREIGN KEY (`kontingen_id`) REFERENCES `kontingen` (`kontingen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ktg_atlet_ibfk_3` FOREIGN KEY (`atlet_nik`) REFERENCES `atlet` (`atlet_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`ktg_atlet_id`) REFERENCES `ktg_atlet` (`ktg_atlet_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_ibfk_2` FOREIGN KEY (`bagan_id`) REFERENCES `bagan` (`bagan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
