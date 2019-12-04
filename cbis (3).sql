-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 05:50 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `name_admin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `sex` enum('Male','Female') DEFAULT NULL,
  `region` enum('Islam','Christian','Hindu','Buddha') DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `email`, `address`, `sex`, `region`, `birth_place`, `birth_date`, `phone`) VALUES
('123000000', 'Administrator', 'admin@gmail.com', 'Gang Delima II No. 30A Ngentak, Caturtunggal, Depok, Sleman, Yogyakarta', 'Male', 'Islam', 'Padang', '2019-10-26', '08990929826');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `name_dosen` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `region` enum('Islam','Christian','Hindu','Buddha') DEFAULT NULL,
  `address` text,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `name_dosen`, `email`, `birth_place`, `birth_date`, `sex`, `region`, `address`, `phone`) VALUES
('123111000', 'Herlina Jayadianti, S.T.', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('123111001', 'Heru Cahya Rustamaji, S.Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('123111002', 'Wilis Kaswidjanti, S.Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('123111003', 'Nur Heri Cahyana', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `input_semester`
--

CREATE TABLE `input_semester` (
  `id_semester` int(2) NOT NULL,
  `nama_semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dosen`
--

CREATE TABLE `jadwal_dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `hari` varchar(8) NOT NULL,
  `jam` time NOT NULL,
  `ruang` varchar(40) NOT NULL,
  `id_matkul` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dosen`
--

INSERT INTO `jadwal_dosen` (`id`, `nip`, `kelas`, `hari`, `jam`, `ruang`, `id_matkul`, `jumlah`) VALUES
(5, '123111000', 'A', 'Kamis', '12:30:00', 'IF Patt I - 3B', '1000132', 0),
(6, '123111001', 'A', 'Senin', '15:00:00', 'IF Patt I - 3B', '1230023', 0),
(7, '123111002', 'A', 'Rabu', '10:00:00', 'IF Patt II - 3D', '1230032', 0),
(8, '123111003', 'A', 'Senin', '10:00:00', 'IF Patt I - 3D', '1230052', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mahasiswa`
--

CREATE TABLE `jadwal_mahasiswa` (
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mahasiswa`
--

INSERT INTO `jadwal_mahasiswa` (`id_jadwal`, `nim`) VALUES
(5, '123180027'),
(6, '123180027'),
(7, '123180027'),
(8, '123180027');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `name_mhs` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `region` enum('Islam','Christian','Hindu','Buddha') DEFAULT NULL,
  `address` text,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `name_mhs`, `email`, `birth_place`, `birth_date`, `sex`, `region`, `address`, `phone`) VALUES
('123180033', 'Rahul', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('123180027', 'Rahmatul Ramadhani', 'dani@gmail.com', 'Padang', '2019-11-12', 'Male', 'Islam', 'Gang Delima II No. 30A Ngentak, Caturtunggal, Depok, Sleman, Yogyakarta', '08990929826');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(10) NOT NULL,
  `name_matkul` varchar(100) DEFAULT NULL,
  `semester` int(2) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `name_matkul`, `semester`, `sks`) VALUES
('1000012', 'Pendidikan Agama Islam', 1, 2),
('1000022', 'Pendidikan Agama Kristen', 1, 2),
('1000032', 'Pendidikan Agama Katholik', 1, 2),
('1000042', 'Pendidikan Agama Hindu', 1, 2),
('1000052', 'Pendidikan Agama Budha', 1, 2),
('1000062', 'Pendidikan Agama Kong Hu Chu', 1, 2),
('1000072', 'Pendidikan Pancasila', 1, 2),
('1000082', 'Pendidikan Kewarganegaraan', 2, 2),
('1000092', 'Bela Negara dan Widya Mwat Yasa', 2, 2),
('1000101', 'Olahraga I', 1, 1),
('1000111', 'Olahraga II', 2, 1),
('1000122', 'Bahasa Indonesia', 2, 2),
('1000132', 'Bahasa Inggris', 1, 2),
('1200012', 'Konsep Teknologi', 1, 2),
('1230012', 'Kalkulus', 1, 2),
('1230023', 'Matematika Diskrit', 1, 3),
('1230032', 'Algoritma dan Pemrograman', 1, 2),
('1230041', 'Praktikum Algoritma dan Pemrograman', 1, 1),
('1230052', 'Logika Informatika', 1, 2),
('1230062', 'Algoritma dan Pemrograman Lanjut', 2, 2),
('1230073', 'Statistika', 2, 3),
('1230082', 'Kalkulus Lanjut', 2, 2),
('1230093', 'Jaringan Komputer', 2, 3),
('1230102', 'Komputer dan Masyarakat', 2, 2),
('1230111', 'Praktikum Algoritma dan Pemrograman Lanjut', 2, 1),
('1230121', 'Praktikum Jaringan Komputer', 2, 1),
('1230133', 'Struktur Data', 3, 3),
('1230143', 'Pemrograman Berorientasi Objek', 3, 3),
('1230152', 'Komputasi Numerik', 3, 2),
('1230163', 'Otomata dan Pengantar Kompilasi', 3, 3),
('1230172', 'Matriks dan Ruang Vektor', 3, 2),
('1230183', 'Sistem Operasi', 3, 3),
('1230193', 'Sistem dan Teknologi Informasi', 3, 3),
('1230201', 'Praktikum Implementasi Struktur Data', 3, 1),
('1230211', 'Praktikum Pemrograman Berorientasi Objek', 3, 1),
('1230222', 'Interaksi Manusia dan Komputer', 4, 2),
('1230233', 'Arsitektur dan Organisasi Komputer', 4, 3),
('1230242', 'Sistem Digital', 4, 2),
('1230252', 'Analisa Algoritma', 4, 2),
('1230263', 'Geoinformatika', 4, 3),
('1230272', 'Teknologi dan Pemrograman Mobile', 4, 2),
('1230283', 'Sistem/Teknologi Basis Data', 4, 3),
('1230291', 'Praktikum Implementasi Basis Data', 4, 1),
('1230301', 'Praktikum Sistem Digital', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Mahasiswa','Dosen') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `level`) VALUES
('123000000', '$2y$10$wREQQtnbm1ODF2O9ygWIn.QBg6dqtsxp9s8wGTF.mz/FFkUwlB7WW', 'Admin'),
('123111000', '$2y$10$ONL3tNXUxbuBOBzJsfBVFu35zcvTpz05TNMaHILlWxP/suZT4B2LG', 'Dosen'),
('123111001', '$2y$10$/RBU6EXy3oIvSOxm8QT4H.dW7Rbn364SdxNZawe7vRRKels4f5Wyu', 'Dosen'),
('123111002', '$2y$10$nXhqz92ZBhT0CGd4JQ4HsOHsyaT8XVic2q.cqudG123PFKdIsHuyC', 'Dosen'),
('123111003', '$2y$10$A63KEccp8kJASYGPk67PK.L7pIK7PLYGLP4oMBGnWdnTxSlw0UXgm', 'Dosen'),
('123180027', '$2y$10$OHpRtxIVpAMa61LFpnZIvuKFEX/5iMQvYNM/NSDjAx8E0nqeeb2nq', 'Mahasiswa'),
('123180033', '$2y$10$95Lz6CgZP//yW1IEFfX.P.EHFJmfu5b97qBHzICFgVcsX6uJyebZ2', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `id` (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD KEY `id_dosen` (`nip`);

--
-- Indexes for table `input_semester`
--
ALTER TABLE `input_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_mhs` (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD KEY `id_nim` (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `id_dosen` FOREIGN KEY (`nip`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_dosen`
--
ALTER TABLE `jadwal_dosen`
  ADD CONSTRAINT `id_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD CONSTRAINT `id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_mhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_nim` FOREIGN KEY (`nim`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
