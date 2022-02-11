-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 04:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `logo`) VALUES
(3, 'Asus', 'asus.png'),
(4, 'Acer', 'acer.png'),
(5, 'Lenovo', 'lenovo.png'),
(6, 'Dell', 'dell.png'),
(7, 'HP', 'hp.png'),
(8, 'ROG', 'rog.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `kategori`) VALUES
(1, 'Gaming'),
(3, 'kantor'),
(4, 'pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(150) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` varchar(7) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `type`, `harga`, `deskripsi`, `stok`, `foto`, `brand`) VALUES
(2, 'Asus TUF Gaming F15 TUF506HE-DS74', 'laptop', '18299000', 'Asus TUF Gaming F15 TUF506HE-DS74 (TUF Gaming F15 FX506 Series)\r\nProcessorIntel Core i7-11800H 8 x 2.3 - 4.6 GHz, Tiger Lake H45\r\nGraphics adapterNVIDIA GeForce RTX 3050 Ti Laptop GPU - 4096 MB, GDDR6\r\nMemory16384 MB  \r\n, DDR4\r\nDisplay15.60 inch 16:9, 1920 x 1080 pixel 141 PPI, IPS, glossy: no, 144 Hz\r\nMainboardIntel HM570\r\nStorage512GB PCIe SSD\r\nConnections3 USB 3.0 / 3.1 Gen1, 1 Thunderbolt, 1 HDMI, Audio Connections: 3.5mm\r\nNetworking802.11 a/b/g/n/ac/ax (a/b/g/n = Wi-Fi 4/ac = Wi-Fi 5/ax = Wi-Fi 6)\r\nSizeheight x width x depth (in mm): 24.4 x 359 x 256 ( = 0.96 x 14.13 x 10.08 in)\r\nBattery90 Wh Lithium-Polymer, 4-cell\r\nCameraWebcam: HD 720p\r\nAdditional featuresSpeakers: Stereo, Keyboard: Chiclet, Keyboard Light: yes\r\nWeight2.3 kg ( = 81.13 oz / 5.07 pounds) ( = 0 oz / 0 pounds)', '4', 'asus_tuf.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(500) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'admin@gmail.com', 'IgdEeqDHZVk9NpDCnSZ5CNhRZwPY0IEVfYMuO1pd', '1642856330');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `is_active` varchar(2) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `no_telp`, `password`, `alamat`, `is_active`, `role`) VALUES
(2, 'Bawik Ardiyan Ramadhan', 'ardiyanramadhan4@gmail.com', '082132881252', '$2y$10$xm6AlH1RzBo.Yxp7y4/hjutUcXk/DVcUbRzsS2VbRvy.0gD//7Ygi', 'Jl Raya Puger Desa Grenden Dusun Kapuran', '1', 2),
(3, 'admin', 'admin@gmail.com', '08111', '$2y$10$CH.H9rSv9y8zHalXLnqWAOuMPbeLZ5HKNjm7wFB2PkJBSW6hFY5dC', 'admin', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
