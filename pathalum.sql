-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 05:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathalum`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `tahun_lulus` varchar(10) DEFAULT NULL,
  `no_ijazah` varchar(50) DEFAULT NULL,
  `no_skhun` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_users`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `status`) VALUES
(1, 2, 'Laki-laki', 'PH Pride', 'Bandung', '2000-10-30', '08123456789', 'Rekayasa Perangkat Lunak', '2019', '2022', 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'Tidak Bekerja Ataupun Kuliah');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_kuliah`
--

CREATE TABLE `deskripsi_kuliah` (
  `id_kuliah` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `nama_perguruan_tinggi` varchar(100) DEFAULT NULL,
  `alamat_perguruan_tinggi` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_kuliah`
--

INSERT INTO `deskripsi_kuliah` (`id_kuliah`, `id_users`, `nama_perguruan_tinggi`, `alamat_perguruan_tinggi`, `fakultas`, `jurusan`, `semester`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_pekerjaan`
--

CREATE TABLE `deskripsi_pekerjaan` (
  `id_pekerjaan` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat_perusahaan` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_pekerjaan`
--

INSERT INTO `deskripsi_pekerjaan` (`id_pekerjaan`, `id_users`, `nama_perusahaan`, `alamat_perusahaan`, `posisi`) VALUES
(1, 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_wirausaha`
--

CREATE TABLE `deskripsi_wirausaha` (
  `id_wirausaha` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `alamat_usaha` varchar(100) DEFAULT NULL,
  `jenis_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_wirausaha`
--

INSERT INTO `deskripsi_wirausaha` (`id_wirausaha`, `id_users`, `nama_usaha`, `alamat_usaha`, `jenis_produk`) VALUES
(1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` int(11) NOT NULL,
  `judul_postingan` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'alumni@alumni', 'alumni', 'alumni rpl 3', 'c52c830f927fe3c895a5499defa8b6a078d701b7', 'alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `deskripsi_kuliah`
--
ALTER TABLE `deskripsi_kuliah`
  ADD PRIMARY KEY (`id_kuliah`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  ADD PRIMARY KEY (`id_wirausaha`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_postingan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deskripsi_kuliah`
--
ALTER TABLE `deskripsi_kuliah`
  MODIFY `id_kuliah` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  MODIFY `id_pekerjaan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  MODIFY `id_wirausaha` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi_kuliah`
--
ALTER TABLE `deskripsi_kuliah`
  ADD CONSTRAINT `deskripsi_kuliah_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  ADD CONSTRAINT `deskripsi_pekerjaan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  ADD CONSTRAINT `deskripsi_wirausaha_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
