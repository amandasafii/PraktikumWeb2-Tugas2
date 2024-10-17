-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 06:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izin_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `izin_id` int NOT NULL,
  `keperluan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `finger_print_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_mulai_izin` date NOT NULL,
  `durasi_izin_hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `durasi_izin_jam` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `durasi_izin_menit` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pengusul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_usul` date NOT NULL,
  `ttd_pengusul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `putusan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_disetujui` date NOT NULL,
  `ttd_atasan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `catatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_izin`
--

INSERT INTO `tbl_izin` (`izin_id`, `keperluan`, `finger_print_id`, `tgl_mulai_izin`, `durasi_izin_hari`, `durasi_izin_jam`, `durasi_izin_menit`, `nama_pengusul`, `tgl_usul`, `ttd_pengusul`, `putusan`, `tgl_disetujui`, `ttd_atasan`, `catatan`, `dosen`) VALUES
(1, 'Sakit', 'abcd', '2024-10-01', '1', '24', '1200', 'Fijar', '2024-10-31', 'lkjh', 'setuju', '2024-10-19', 'poiu', 'gws ya', 'asdf'),
(3, 'Sakit', 'poooo', '2024-10-16', '1', '24', '1200', 'Amanda', '2024-10-01', 'yyyy', 'setuju', '2024-10-15', 'tcstcgdq', 'gws ya', 'akuuu'),
(4, 'Cuti', 'i love you', '2024-10-23', '2', '24', '1200', 'Amanda', '2024-10-10', 'hhhhh', 'tidak setuju', '2024-10-17', 'ytytytyt', 'gblh', 'kelinci'),
(5, 'Alfa', 'love', '2024-10-15', '3', '98', '4500', 'Amanda', '2024-10-01', 'blacky', 'disetujui', '2024-10-03', 'oyen', 'loe ga masuk knp hah?', 'manda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  MODIFY `izin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
