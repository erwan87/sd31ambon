-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 06:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd31ambon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `keterangan`) VALUES
(1, '<p>test test test</p><p><br></p><p>aja di mana</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Katholik'),
(3, 'Kristen'),
(4, 'Budha'),
(5, 'Hindhu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `keterangan`) VALUES
(1, 'test test test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nisp` varchar(64) DEFAULT NULL,
  `nama_guru` varchar(64) NOT NULL,
  `ttl` varchar(128) DEFAULT NULL,
  `jenkel` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `telp` varchar(64) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `walikelas` int(11) NOT NULL DEFAULT 9,
  `statusguru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nisp`, `nama_guru`, `ttl`, `jenkel`, `agama`, `pendidikan`, `telp`, `alamat`, `walikelas`, `statusguru`) VALUES
(1, '197303092006041012', 'Sarif Mahu, S.Pd.SD', 'Kwarmor, 09-03-1973', 1, 1, 5, '0813545454', 'Batu Merah', 5, 1),
(2, '198308172008012026', 'Basmiati S.Pd.SD', 'Limbung, 08-17-1983', 2, 1, 5, '08522222', 'K. Cengkeh', 8, 1),
(3, '198308172008012999', 'M. Natsir S.Pd', 'Ambon, 11-03-1989', 1, 1, 5, '081323212355', 'Tantui', 6, 1),
(4, '198412182008012004', 'Nani Khu. S.Pd.SD', 'Amboina, 12-18-1984', 2, 1, 5, '1085273282', 'Batu Merah', 9, 2),
(5, '198412182008012111', 'Susi Susanti S.Pd', 'Ambon, 11-03-1995', 2, 2, 4, '0852232', 'Ambon', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `jam` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `mapel`, `guru`, `kelas`, `hari`, `jam`) VALUES
(1, 2, 1, 4, 3, '20:35 - 21:35'),
(2, 1, 1, 1, 1, '20:30 - 21:30'),
(3, 5, 1, 4, 4, '17:54 - 18:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`) VALUES
(1, 'K01', 'Kelas I'),
(2, 'K01A', 'Kelas l A'),
(3, 'K01B', 'Kelas l B'),
(4, 'K02', 'Kelas ll'),
(5, 'K03', 'Kelas lll'),
(6, 'K04', 'Kelas lV'),
(7, 'k05', 'Kelas V'),
(8, 'K06', 'Kelas VI'),
(9, '000', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(16) DEFAULT NULL,
  `nama_mapel` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'M01', 'Pendidikan Agama'),
(2, 'M02', 'Bahasa Indonesia'),
(3, 'M03', 'Matematika'),
(4, 'M04', 'Ilmu Pengetahuan Alam'),
(5, 'M05', 'PPKN'),
(6, 'M06', 'Penjaskes'),
(7, 'M07', 'Ilmu Pengetahuan Sosial'),
(8, 'M08', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'D3'),
(5, 'S1'),
(6, 'S2'),
(7, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Siswa'),
(3, 'Wali Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(32) DEFAULT NULL,
  `nama_siswa` varchar(64) DEFAULT NULL,
  `ttl` varchar(128) NOT NULL,
  `jenkel` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nama_ayah` varchar(32) NOT NULL,
  `nama_ibu` varchar(32) NOT NULL,
  `alamat_ortu` varchar(128) NOT NULL,
  `telp_ortu` varchar(32) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `ttl`, `jenkel`, `agama`, `alamat`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telp_ortu`, `kelas`) VALUES
(1, '1234567890', 'kiki', 'Ambon, 11-04-2008', 1, 3, 'Ambon', 'Kaka', 'Keke', 'Ambon', '08123456789', 5),
(2, '1234567891', 'Imanuela', 'Ambon, 11-06-2012', 2, 3, 'Ambon', 'Imanuela', 'Ester', 'Ambon', '081234567891', 1),
(3, '1234567892', 'Risky', 'Ambon, 11-02-2009', 1, 3, 'Ambon', 'Simon', 'Maria', 'Ambon', '081234567892', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statusguru`
--

CREATE TABLE `tbl_statusguru` (
  `id_stat` int(11) NOT NULL,
  `nama_status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_statusguru`
--

INSERT INTO `tbl_statusguru` (`id_stat`, `nama_status`) VALUES
(1, 'Wali Kelas'),
(2, 'Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `photo` varchar(32) NOT NULL DEFAULT 'default.jpg',
  `role_id` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `password`, `photo`, `role_id`) VALUES
(1, 'Administrator aja', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.jpg', 1),
(2, 'users', 'user', '21232f297a57a5a743894a0e4a801fc3', 'default.jpg', 2),
(3, 'kiki', '1234567890', '', 'default.jpg', 2),
(4, 'imanuela', '1234567891', NULL, 'default.jpg', 2),
(5, 'Risky', '1234567892', NULL, 'default.jpg', 2),
(6, 'Sarif Mahu. S.Pd.l', '197303092006041012', NULL, 'default.jpg', 3),
(7, 'Basmiati S.Pd.SD', '198308172008012026', NULL, 'default.jpg', 3),
(8, 'M. Natsir S.Pd', '198308172008012999', NULL, 'default.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_statusguru`
--
ALTER TABLE `tbl_statusguru`
  ADD PRIMARY KEY (`id_stat`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_statusguru`
--
ALTER TABLE `tbl_statusguru`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
