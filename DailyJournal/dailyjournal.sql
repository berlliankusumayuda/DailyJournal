-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Pantai', 'Bersenang senang melihat indahnya alam', 'pantai.jpg', '2025-01-08 13:48:34', 'iyan'),
(2, 'Motor', 'Motor impian yang akan saya beli ', 'motor.jpg', '2025-01-08 13:52:12', 'iyan'),
(3, 'Laptop', 'Laptop yang sangat bagus untuk harga memukau', 'laptop.jpg', '2025-01-08 13:53:50', 'iyan'),
(4, 'Kopi', 'Segelas kopi yang sangat berarti bagi kehidupan', 'kopi.jpg', '2025-01-08 23:17:41', 'iyan'),
(5, 'Asap', 'Membuat pikiran tenang dan nyaman', 'asap.jpg', '2025-01-09 01:23:24', 'iyan'),
(6, 'Handphone', 'Semuanya ada di sini', 'hp.jpg', '2025-01-09 01:33:54', 'iyan'),
(7, 'Singapore', 'Salah satu negara yang sangat ingin saya kunjungi\r\n', 'singapore.jpg', '2025-01-09 01:37:10', 'iyan'),
(8, 'Candi', 'Peninggalan orang zaman dahulu', 'candi.jpg', '2025-01-09 01:38:01', 'iyan');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--


CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `gambar`, `tanggal`) VALUES
(1, 'Pantai', 'pantai.jpg', '2025-01-08'),
(2, 'Motor', 'motor.jpg', '2025-01-08'),
(3, 'Laptop', 'laptop.jpg', '2025-01-08'),
(4, 'Kopi', 'kopi.jpg', '2025-01-08'),
(5, 'Asap', 'asap.jpg', '2025-01-09'),
(6, 'Gunung', 'rinjani.jpg', '2025-01-09'),
(7, 'Singapore', 'singapore.jpg', '2025-01-09'),
(8, 'Candi', 'candi.jpg', '2025-01-09'),
(9, 'Handphone', 'hp.jpg', '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', '0203cc75753ab94a5b7d4cc1ddf8b65d', 'Logohacker.jpg'),
(2, 'danny', '21232f297a57a5a743894a0e4a801fc3', 'gavi.jpg'),
(3, 'iyan', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(4, 'sulthan', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(5, 'toman', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(6, 'natan', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(7, 'arkan', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(8, 'mancung', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg'),
(9, 'gento', '827ccb0eea8a706c4c34a16891f84e7b', 'gavi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
