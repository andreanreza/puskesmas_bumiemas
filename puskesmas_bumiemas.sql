-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 08:42 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas_bumiemas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 2),
(9, 2, 6),
(10, 3, 3),
(11, 3, 5),
(12, 3, 6),
(13, 4, 4),
(14, 4, 5),
(15, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `kode_diagnosa` varchar(122) NOT NULL,
  `nama_diagnosa` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `kode_diagnosa`, `nama_diagnosa`) VALUES
(1, 'D001', 'Pusing');

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id` int(11) NOT NULL,
  `nama_icon` varchar(122) NOT NULL,
  `icon` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `nama_icon`, `icon`) VALUES
(1, 'fas fa-fw fa-tachometer-alt mr-1\r\n', 'fas fa-fw fa-tachometer-alt mr-1\r\n'),
(2, 'fas fa-fw fa-cart-plus mr-1', 'fas fa-fw fa-cart-plus mr-1'),
(3, 'fas fa-fw fa-user-friends mr-1', 'fas fa-fw fa-user-friends mr-1'),
(4, 'fas fa-fw fa-universal-access mr-1', 'fas fa-fw fa-universal-access mr-1'),
(5, 'fab fa-fw fa-elementor mr-1', 'fab fa-fw fa-elementor mr-1'),
(6, 'fas fa-fw fa-chevron-circle-down mr-1', 'fas fa-fw fa-chevron-circle-down mr-1'),
(7, 'fas fa-fw fa-diagnoses mr-1', 'fas fa-fw fa-diagnoses mr-1'),
(8, 'fab fa-fw fa-font-awesome mr-1', 'fab fa-fw fa-font-awesome mr-1'),
(10, 'fas fa-fw fa-male mr-1', 'fas fa-fw fa-male mr-1'),
(11, 'fas fa-fw fa-key mr-1', 'fas fa-fw fa-key mr-1'),
(12, 'fas fa-fw fa-user-md mr-1', 'fas fa-fw fa-user-md mr-1'),
(13, 'fab fa-fw fa-product-hunt mr-1', 'fab fa-fw fa-product-hunt mr-1'),
(14, 'fas fa-fw fa-industry mr-1', 'fas fa-fw fa-industry mr-1');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id`, `kode`) VALUES
(1, '10'),
(2, '11'),
(3, '10'),
(4, '10');

-- --------------------------------------------------------

--
-- Table structure for table `menu_user`
--

CREATE TABLE `menu_user` (
  `id` int(11) NOT NULL,
  `menu` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_user`
--

INSERT INTO `menu_user` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'pendaftaran'),
(3, 'poliumum'),
(4, 'polikia'),
(6, 'profile'),
(7, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(111) NOT NULL,
  `url` varchar(111) NOT NULL,
  `icon` varchar(111) NOT NULL,
  `is_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_aktif`) VALUES
(1, 7, 'Role', 'menu/role', 'fas fa-fw fa-universal-access mr-1', 1),
(3, 2, 'Dashboard', 'pendaftaran/pendaftaran', 'fas fa-fw fa-user-md mr-fas fa-fw fa-tachometer-alt mr-1\r\n', 1),
(4, 7, 'Menu', 'menu', 'fab fa-fw fa-elementor mr-1', 1),
(6, 1, 'Dashboard', 'admin/admin', 'fas fa-fw fa-tachometer-alt mr-1\r\n', 1),
(8, 3, 'Dashboard', 'polikia/polikia', 'fas fa-fw fa-tachometer-alt mr-1\r\n', 1),
(9, 7, 'Sub Menu', 'menu/submenu', 'fas fa-fw fa-chevron-circle-down mr-1', 1),
(11, 1, 'User', 'admin/admin/user', 'fas fa-fw fa-user-friends mr-1', 1),
(12, 2, 'Data Pasien', 'pendaftaran/pendaftaran/viewpasien', 'fas fa-fw fa-cart-plus mr-1', 1),
(14, 7, 'Icon', 'menu/icon', 'fab fa-fw fa-font-awesome mr-1', 1),
(15, 6, 'Profile', 'profile/profile', 'fas fa-fw fa-male mr-1', 1),
(16, 6, 'Ganti Password', 'profile/profile/gantiPassword', 'fas fa-fw fa-key mr-1', 1),
(21, 1, 'Diagnosa', 'admin/diagnosa', 'fab fa-fw fa-product-hunt mr-1', 1),
(22, 2, 'Kunjungan', 'pendaftaran/kunjungan', 'fas fa-fw fa-cart-plus mr-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keluhan` varchar(122) NOT NULL,
  `id_poli` varchar(30) NOT NULL,
  `tgl_kun` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id`, `id_pasien`, `keluhan`, `id_poli`, `tgl_kun`) VALUES
(1, 8, 'pusing pusing', '1', 22),
(2, 8, 'dasda', '2', 0),
(3, 21, 'gsdgsd', '1', 1608709403);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(122) NOT NULL,
  `no_rm` varchar(111) NOT NULL,
  `alamat` varchar(160) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id`, `nama`, `no_rm`, `alamat`, `jk`, `tgl_lahir`, `tgl_reg`) VALUES
(8, 'reza', 'Rm-0001', 'dada', 'Laki-laki', '1999-12-15', 1608539632),
(12, 'wef', 'Rm-0002', 'sdqw', 'Laki-laki', '2013-02-21', 1608549592),
(13, 'wef', 'Rm-0003', 'dsad', 'Perempuan', '2020-12-02', 1608554608),
(14, 'dasd', 'Rm-0004', 'sdas', 'Perempuan', '2015-05-21', 1608554626),
(15, 'rerwe', 'Rm-0005', 'sadwq', 'Laki-laki', '2020-12-17', 1608554640),
(16, 'dsd', 'Rm-0006', 'sdas', 'Laki-laki', '2020-12-16', 1608554653),
(17, 'dasd', 'Rm-0007', 'sda', 'Laki-laki', '2020-12-30', 1608554665),
(18, 'dsadas', 'Rm-0008', 'dsaasd', 'Laki-laki', '2020-12-18', 1608554677),
(19, 'sdasd', 'Rm-0009', 'dsas', 'Laki-laki', '2020-12-25', 1608554694),
(20, 'sdasd', 'Rm-0010', 'sdasd', 'Laki-laki', '2020-12-17', 1608554708),
(21, 'sdada', 'Rm-0011', 'dad', 'Laki-laki', '2020-12-24', 1608554719);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id` int(11) NOT NULL,
  `poli` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_poli`
--

INSERT INTO `tbl_poli` (`id`, `poli`) VALUES
(1, 'poli umum'),
(2, 'poli kia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `date_created`, `is_active`) VALUES
(1, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$4Jjgbq/VMpRqjK8xOR4CnunseQ54i6dR9lDiHsXJZpIxJZYlsXXiK', 1, 1606806379, 1),
(3, 'pendaftaran', 'pendaftaran@gmail.com', 'default.jpg', '$2y$10$bjfIeYjjtAG3gH8g0qSOMeZNF.uodIRe0GgoqmATz.OOfns9.rT9a', 2, 1607668214, 1),
(7, 'poli umum', 'poliumum@gmail.com', 'default.jpg', '$2y$10$JONOmd4UwlZfUaEuttmBjOKGJxfB/SFegim5vEmq0EsSNDaN3bHjG', 3, 1608090799, 1),
(11, 'poli kia', 'polikia@gmail.com', 'default.jpg', '$2y$10$3qNSf8KKtCLEEGwmTRfjHeBa5ks722gkMu8M1VymaVyvB.7eBHQJm', 4, 1608230822, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pendaftaran'),
(3, 'poli'),
(4, 'polikia');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'andreanreza042@gmail.com', 'ZDVkPEKPuisbmBu1oG+gBlRYl8y+jpby36mYp0+GfvM=', 1608103894),
(4, 'andreanreza042@gmail.com', 'hNuflKrWIQRMuP6WUW3xfPkDV68N3ltghc2pvl1I/I4=', 1608106581),
(5, 'andreanreza042@gmail.com', 'GjmlwxcAhdtP/ekEnECwNU/sxuYlAIp09Lw6wAWDNHA=', 1608110635),
(6, 'andreanreza042@gmail.com', 'ullCPzwNmL6hZd5X/FVMqmKnbFs5tv0+95vRSM3UagI=', 1608209905),
(7, 'staffsadang@gmail.com', '0EnzibD8Twm8L0gqaSZNaLyuima3XTkm9/lJUm/Jooc=', 1608230822),
(8, 'staffjoglo@gmail.com', 'Nhl9xWATSl19aYllT64ZKMJIYk+2okbFDtIGfjl7eDY=', 1608230869),
(9, 'staffaceh@gmail.com', 'D0x2tZj0ioYBoHqx/nBPBl35E9E42TXFWpZHI0LG26s=', 1608236049),
(10, 'staffmojokerto@gmail.com', 'tBzNh2Iy331gBm4qNF7QnjyLNjsj/R7woJ3TmaC/Mec=', 1608236161),
(11, 'coba@gmail.com', 'diARzbrbPO8FVjtAihAxHUbvUDFunhizOfGUPcMlEY8=', 1608362943),
(12, 'coba@gmail.com', '67uFBtzhB0p4oFURKuYw3JCwNhFZ1JuU9lAf7mwgAcU=', 1608363055),
(13, 'kurniawantriwidianto93@gmail.com', '9Aq0/5HtvIoSq7Ubykzdk6JixHw2XJKK3BzFA+l2LLM=', 1608612452),
(14, 'kurniawantriwidianto93@gmail.com', '/5/HFqE4XG+rccPiRj774njsk2NDe8TKAuaYq5xAClc=', 1608612480),
(15, 'kurniawantriwidianto93@gmail.com', '0gEkbXS1V05dGnmMRDwOR2TJZvyecvCCM3r4qBjQoyM=', 1608612677);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_user`
--
ALTER TABLE `menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
