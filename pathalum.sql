-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 05:07 AM
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
  `nama_lengkap` varchar(100) DEFAULT NULL,
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

INSERT INTO `alumni` (`id_alumni`, `id_users`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `status`) VALUES
(2, 2, 'Alumni', 'Laki-laki', 'PH Pride', 'Bandung', '2004-10-22', '08989898989', 'Teknik Instalasi Tenaga Listrik', '2019', '2022', '0000000000', '0000000000', 'Bekerja'),
(7, 7, 'Abdul Azis Basyari', 'Laki-laki', 'Bandung', 'Bandung', '2004-10-22', '083804302067', 'Rekayasa Perangkat Lunak', '2019', '2022', '-', '-', 'Tidak Bekerja Ataupun Kuliah'),
(11, 11, 'Naufal', '', '', '', '0000-00-00', '', 'Multimedia', '', '', '', '', 'Wirausaha'),
(14, 14, '', '', '', '', '0000-00-00', '', 'Teknik Audio Video', '', '', '', '', 'Bekerja'),
(15, 15, '', '', '', '', '0000-00-00', '', 'Teknik Komputer Jaringan', '', '', '', '', 'Wirausaha'),
(16, 16, '', '', '', '', '0000-00-00', '', 'Teknik Otomasi Industri', '', '', '', '', 'Kuliah'),
(17, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_kuliah`
--

CREATE TABLE `deskripsi_kuliah` (
  `id_kuliah` int(15) NOT NULL,
  `id_alumni` int(15) NOT NULL,
  `nama_perguruan_tinggi` varchar(100) DEFAULT NULL,
  `alamat_perguruan_tinggi` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_kuliah`
--

INSERT INTO `deskripsi_kuliah` (`id_kuliah`, `id_alumni`, `nama_perguruan_tinggi`, `alamat_perguruan_tinggi`, `fakultas`, `jurusan`, `semester`) VALUES
(2, 2, NULL, NULL, NULL, NULL, NULL),
(4, 7, NULL, NULL, NULL, NULL, NULL),
(8, 11, NULL, NULL, NULL, NULL, NULL),
(11, 14, NULL, NULL, NULL, NULL, NULL),
(12, 15, NULL, NULL, NULL, NULL, NULL),
(13, 16, NULL, NULL, NULL, NULL, NULL),
(14, 17, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_pekerjaan`
--

CREATE TABLE `deskripsi_pekerjaan` (
  `id_pekerjaan` int(15) NOT NULL,
  `id_alumni` int(15) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat_perusahaan` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_pekerjaan`
--

INSERT INTO `deskripsi_pekerjaan` (`id_pekerjaan`, `id_alumni`, `nama_perusahaan`, `alamat_perusahaan`, `posisi`) VALUES
(2, 2, 'Casadev', 'Kliningan 6', 'Nganggur'),
(6, 7, NULL, NULL, NULL),
(10, 11, NULL, NULL, NULL),
(13, 14, NULL, NULL, NULL),
(14, 15, NULL, NULL, NULL),
(15, 16, NULL, NULL, NULL),
(16, 17, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_wirausaha`
--

CREATE TABLE `deskripsi_wirausaha` (
  `id_wirausaha` int(15) NOT NULL,
  `id_alumni` int(15) NOT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `alamat_usaha` varchar(100) DEFAULT NULL,
  `jenis_produk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deskripsi_wirausaha`
--

INSERT INTO `deskripsi_wirausaha` (`id_wirausaha`, `id_alumni`, `nama_usaha`, `alamat_usaha`, `jenis_produk`) VALUES
(2, 2, NULL, NULL, NULL),
(4, 7, NULL, NULL, NULL),
(8, 11, NULL, NULL, NULL),
(11, 14, NULL, NULL, NULL),
(12, 15, NULL, NULL, NULL),
(13, 16, NULL, NULL, NULL),
(14, 17, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` int(15) NOT NULL,
  `judul_postingan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_users` int(15) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_postingan`, `judul_postingan`, `deskripsi`, `id_users`, `tanggal_dibuat`, `photo`) VALUES
(1, 'Postingan Pertama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi malesuada tristique viverra. Cras accumsan tortor ac sem mollis molestie. Sed ut dignissim eros. Quisque mattis mauris ut libero cursus condimentum. Nulla vitae blandit enim, non suscipit nisi. Morbi dignissim arcu vel faucibus dapibus. Vestibulum ullamcorper viverra leo quis faucibus. Nunc ac tincidunt dui, a sollicitudin ipsum. Vivamus justo diam, placerat sit amet leo nec, aliquam suscipit velit. Phasellus nec efficitur lorem, sed interdum dui. Quisque elementum viverra odio. Nullam porttitor blandit rutrum. Sed placerat fringilla ex in scelerisque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus a tortor ut ligula fermentum elementum eget quis libero.\n\nDuis tempor ante id lectus volutpat, vel luctus nisl ullamcorper. Cras finibus vulputate enim, sit amet dictum sem tristique quis. Ut a convallis libero, sit amet pharetra nisl. Nullam vel dictum tortor. Sed sagittis tincidunt turpis ac pellentesque. Nam mollis ligula id leo ornare viverra. Duis nec quam in arcu pellentesque feugiat id in libero. Sed eros felis, maximus non aliquam nec, dapibus sed leo. Integer ligula purus, convallis eget felis dapibus, lobortis cursus mauris.\n\nVestibulum sed ex blandit ante blandit auctor et non lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Quisque feugiat turpis et vestibulum gravida. Sed ante lacus, ornare id ex non, egestas sagittis orci. Etiam ac nibh commodo, congue erat sit amet, dapibus augue. Nunc iaculis aliquet lorem.\n\nCras sed dui ac sapien aliquet venenatis et ac erat. Sed bibendum turpis eget lectus viverra, sed fringilla nunc auctor. Suspendisse erat neque, hendrerit et purus id, dapibus malesuada sem. Suspendisse potenti. Nulla diam turpis, tincidunt sit amet ultrices in, finibus sit amet arcu. Integer iaculis facilisis lorem at rutrum. Suspendisse potenti.\n\nProin eget sem feugiat, tempor tortor a, cursus dui. Aliquam commodo libero ipsum, sed feugiat sapien tincidunt tempor. Etiam quis sem pretium, faucibus quam vel, suscipit dolor. Nullam eget nibh massa. Vestibulum fermentum neque sit amet faucibus malesuada. Aliquam erat volutpat. Duis blandit venenatis mi, sed ullamcorper diam gravida viverra. Sed leo ipsum, volutpat et viverra et, elementum sit amet neque. Donec at velit odio. Suspendisse potenti. Donec eu nibh nec ligula sagittis porttitor. Ut aliquet consequat pellentesque. Sed tempor nisi sed mi gravida fermentum. Proin facilisis, nibh in ornare bibendum, nisl neque commodo mauris, elementum vulputate mi mi sit amet augue. Nullam at ex purus. Nulla facilisi.', 1, '2022-02-23', ''),
(2, 'Postingan Kedua', 'When George Washington was quite a little boy, his father gave him a hatchet. It was bright and new, and George took great delight in going about and chopping things with it.\r\n\r\nHe ran into the garden, and there he saw a tree which seemed to say to him, \"Come and cut me down!\"\r\n \r\nGeorge had often seen his father\'s men chop down the great trees in the forest, and he thought that it would be fine sport to see this tree fall with a crash to the ground. So he set to work with his little hatchet, and, as the tree was a very small one, it did not take long to lay it low.\r\n\r\nSoon after that, his father came home.\r\n\r\n\"Who has been cutting my fine young cherry tree?\" he cried. \"It was the only tree of its kind in this country, and it cost me a great deal of money.\"\r\n\r\nHe was very angry when he came into the house.\r\n\r\n\"If I only knew who killed that cherry tree,\" he cried, \"I would--yes, I would\"--\r\n\r\n\"Father!\" cried little George. \"I will tell you the truth about it. I chopped the tree down with my hatchet.\"\r\n\r\nHis father forgot his anger.\r\n\r\n\"George,\" he said, and he took the little fellow in his arms, \"George, I am glad that you told me about it. I would rather lose a dozen cherry trees than that you should tell one false-hood.\"', 7, '2022-02-23', ''),
(3, 'Postingan Ketiga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt. Non consectetur a erat nam at lectus. Odio eu feugiat pretium nibh ipsum. Eu mi bibendum neque egestas congue quisque egestas. Duis at consectetur lorem donec massa sapien faucibus et. Nisl vel pretium lectus quam id leo in. At lectus urna duis convallis convallis tellus id interdum. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Lorem donec massa sapien faucibus et molestie ac. Nibh praesent tristique magna sit amet. Donec et odio pellentesque diam volutpat commodo. Neque viverra justo nec ultrices dui sapien eget. Ut tristique et egestas quis ipsum. Purus in massa tempor nec feugiat nisl pretium fusce. Nunc id cursus metus aliquam eleifend mi in nulla. Neque volutpat ac tincidunt vitae.\r\n\r\nA pellentesque sit amet porttitor eget dolor morbi. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Enim facilisis gravida neque convallis. Venenatis lectus magna fringilla urna porttitor rhoncus. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Egestas sed sed risus pretium. Nunc non blandit massa enim nec dui. Montes nascetur ridiculus mus mauris vitae ultricies leo. Mauris pharetra et ultrices neque ornare aenean. Sit amet mauris commodo quis. Elit pellentesque habitant morbi tristique senectus et. Massa sapien faucibus et molestie ac feugiat sed. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Est placerat in egestas erat imperdiet sed euismod nisi porta. Vestibulum morbi blandit cursus risus.', 17, '2022-02-23', ''),
(4, 'Postingan Keempat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt. Non consectetur a erat nam at lectus. Odio eu feugiat pretium nibh ipsum. Eu mi bibendum neque egestas congue quisque egestas. Duis at consectetur lorem donec massa sapien faucibus et. Nisl vel pretium lectus quam id leo in. At lectus urna duis convallis convallis tellus id interdum. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Lorem donec massa sapien faucibus et molestie ac. Nibh praesent tristique magna sit amet. Donec et odio pellentesque diam volutpat commodo. Neque viverra justo nec ultrices dui sapien eget. Ut tristique et egestas quis ipsum. Purus in massa tempor nec feugiat nisl pretium fusce. Nunc id cursus metus aliquam eleifend mi in nulla. Neque volutpat ac tincidunt vitae.\r\n\r\nA pellentesque sit amet porttitor eget dolor morbi. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Enim facilisis gravida neque convallis. Venenatis lectus magna fringilla urna porttitor rhoncus. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Egestas sed sed risus pretium. Nunc non blandit massa enim nec dui. Montes nascetur ridiculus mus mauris vitae ultricies leo. Mauris pharetra et ultrices neque ornare aenean. Sit amet mauris commodo quis. Elit pellentesque habitant morbi tristique senectus et. Massa sapien faucibus et molestie ac feugiat sed. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Est placerat in egestas erat imperdiet sed euismod nisi porta. Vestibulum morbi blandit cursus risus.', 14, '2022-02-23', ''),
(5, 'Postingan Kelima', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt. Non consectetur a erat nam at lectus. Odio eu feugiat pretium nibh ipsum. Eu mi bibendum neque egestas congue quisque egestas. Duis at consectetur lorem donec massa sapien faucibus et. Nisl vel pretium lectus quam id leo in. At lectus urna duis convallis convallis tellus id interdum. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Lorem donec massa sapien faucibus et molestie ac. Nibh praesent tristique magna sit amet. Donec et odio pellentesque diam volutpat commodo. Neque viverra justo nec ultrices dui sapien eget. Ut tristique et egestas quis ipsum. Purus in massa tempor nec feugiat nisl pretium fusce. Nunc id cursus metus aliquam eleifend mi in nulla. Neque volutpat ac tincidunt vitae.\r\n\r\nA pellentesque sit amet porttitor eget dolor morbi. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Enim facilisis gravida neque convallis. Venenatis lectus magna fringilla urna porttitor rhoncus. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Egestas sed sed risus pretium. Nunc non blandit massa enim nec dui. Montes nascetur ridiculus mus mauris vitae ultricies leo. Mauris pharetra et ultrices neque ornare aenean. Sit amet mauris commodo quis. Elit pellentesque habitant morbi tristique senectus et. Massa sapien faucibus et molestie ac feugiat sed. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Est placerat in egestas erat imperdiet sed euismod nisi porta. Vestibulum morbi blandit cursus risus.', 16, '2022-02-23', ''),
(6, 'Postingan Keenam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt. Non consectetur a erat nam at lectus. Odio eu feugiat pretium nibh ipsum. Eu mi bibendum neque egestas congue quisque egestas. Duis at consectetur lorem donec massa sapien faucibus et. Nisl vel pretium lectus quam id leo in. At lectus urna duis convallis convallis tellus id interdum. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Lorem donec massa sapien faucibus et molestie ac. Nibh praesent tristique magna sit amet. Donec et odio pellentesque diam volutpat commodo. Neque viverra justo nec ultrices dui sapien eget. Ut tristique et egestas quis ipsum. Purus in massa tempor nec feugiat nisl pretium fusce. Nunc id cursus metus aliquam eleifend mi in nulla. Neque volutpat ac tincidunt vitae.\r\n\r\nA pellentesque sit amet porttitor eget dolor morbi. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Enim facilisis gravida neque convallis. Venenatis lectus magna fringilla urna porttitor rhoncus. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Egestas sed sed risus pretium. Nunc non blandit massa enim nec dui. Montes nascetur ridiculus mus mauris vitae ultricies leo. Mauris pharetra et ultrices neque ornare aenean. Sit amet mauris commodo quis. Elit pellentesque habitant morbi tristique senectus et. Massa sapien faucibus et molestie ac feugiat sed. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Est placerat in egestas erat imperdiet sed euismod nisi porta. Vestibulum morbi blandit cursus risus.', 15, '2022-02-23', ''),
(7, 'Postingan Ketujuh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum velit laoreet id donec ultrices tincidunt. Non consectetur a erat nam at lectus. Odio eu feugiat pretium nibh ipsum. Eu mi bibendum neque egestas congue quisque egestas. Duis at consectetur lorem donec massa sapien faucibus et. Nisl vel pretium lectus quam id leo in. At lectus urna duis convallis convallis tellus id interdum. Aliquam eleifend mi in nulla posuere sollicitudin aliquam. Lorem donec massa sapien faucibus et molestie ac. Nibh praesent tristique magna sit amet. Donec et odio pellentesque diam volutpat commodo. Neque viverra justo nec ultrices dui sapien eget. Ut tristique et egestas quis ipsum. Purus in massa tempor nec feugiat nisl pretium fusce. Nunc id cursus metus aliquam eleifend mi in nulla. Neque volutpat ac tincidunt vitae.\r\n\r\nA pellentesque sit amet porttitor eget dolor morbi. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Enim facilisis gravida neque convallis. Venenatis lectus magna fringilla urna porttitor rhoncus. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Egestas sed sed risus pretium. Nunc non blandit massa enim nec dui. Montes nascetur ridiculus mus mauris vitae ultricies leo. Mauris pharetra et ultrices neque ornare aenean. Sit amet mauris commodo quis. Elit pellentesque habitant morbi tristique senectus et. Massa sapien faucibus et molestie ac feugiat sed. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Est placerat in egestas erat imperdiet sed euismod nisi porta. Vestibulum morbi blandit cursus risus.', 2, '2022-02-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'alumni@alumni', 'alumni', 'c52c830f927fe3c895a5499defa8b6a078d701b7', 'alumni'),
(7, 'abdul', 'abdul', '3fb86591025780f719fcd21d6fd06a8330659670', 'alumni'),
(11, 'naufal', 'naufal', '745de6038585a515fcd174f25ad92eef50de7b0a', 'alumni'),
(14, 'byan', 'byan', 'fd5c498f123b1646feb1c4b58a7b9ef4b4e8b602', 'alumni'),
(15, 'fayyadh', 'fayyadh', 'cc4b8a2a52ff061ed90fa4a7ef0da757afca5b49', 'alumni'),
(16, 'fly', 'fly', '41a682cadfe3d717067972796ef7451d08172fc5', 'alumni'),
(17, 'duba', 'duba', '1b053a6f39def2810cd54590fe7ba486908c895b', 'alumni');

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
  ADD KEY `id_alumni` (`id_alumni`);

--
-- Indexes for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_alumni` (`id_alumni`);

--
-- Indexes for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  ADD PRIMARY KEY (`id_wirausaha`),
  ADD KEY `id_alumni` (`id_alumni`);

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
  MODIFY `id_alumni` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `deskripsi_kuliah`
--
ALTER TABLE `deskripsi_kuliah`
  MODIFY `id_kuliah` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  MODIFY `id_pekerjaan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  MODIFY `id_wirausaha` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi_kuliah`
--
ALTER TABLE `deskripsi_kuliah`
  ADD CONSTRAINT `deskripsi_kuliah_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi_pekerjaan`
--
ALTER TABLE `deskripsi_pekerjaan`
  ADD CONSTRAINT `deskripsi_pekerjaan_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi_wirausaha`
--
ALTER TABLE `deskripsi_wirausaha`
  ADD CONSTRAINT `deskripsi_wirausaha_ibfk_1` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
