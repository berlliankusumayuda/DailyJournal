-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2024 pada 21.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `article`
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
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Gavi', 'Pablo Páez Gavira, atau \'Gavi\', adalah gelandang berbakat dari Sevilla, Spanyol, yang kini bermain untuk Barcelona.', 'gavi.jpg', '2024-12-09 02:40:16', 'admin'),
(2, 'Pau Cubarsi', 'Pemain bertahan yang memulai debutnya di Barça pada Januari 2024 di Copa del Rey, menampilkan permainan solid di lini belakang.', 'cubarsi.jpg', '2024-12-09 02:43:14', 'admin'),
(3, 'Frankie de Jong', 'Gelandang serba bisa dari Belanda yang kini menjadi pemain kunci di lini tengah Barcelona.', 'dejong.jpg', '2024-12-09 02:43:26', 'admin'),
(4, 'Dani Olmo', 'Dani Olmo, pemain menyerang serbaguna yang memulai karir di La Masia dan kini berkembang di panggung internasional.', 'olmo.jpg', '2024-12-09 02:44:01', 'admin'),
(5, 'Robert Lewandowski', 'Striker asal Polandia ini menonjol karena kemampuannya dalam mencetak gol. Ia dapat mencetak gol dengan kepala dan kedua kakinya dengan presisi yang sama.', 'lewa.jpg', '2024-12-09 02:44:36', 'admin'),
(6, 'Rapinha', 'Pemain sayap yang mahir secara teknis, dengan dribbling yang baik, pengambilan keputusan dan gaya permainan yang menarik dan menarik Raphael Dias Belloli (Raphinha) lahir pada tanggal 14 Desember 1996 di Porto Alegre, Brasil. Dia bergabung dengan Klub dari Leeds United pada musim panas 2022.', 'rapinha.jpg', '2024-12-09 02:45:31', 'admin'),
(7, 'Lamine Yamal', 'Lamine Yamal tiba di FC Barcelona pada usia 7 tahun dari klub lokalnya CF La Torreta. Di La Masia dia melewati kategori usia lebih cepat dibandingkan pemain lain di generasinya.', 'yamal.jpg', '2024-12-09 02:46:15', 'admin'),
(8, 'Pedri', 'Pada tanggal 2 September 2019, FC Barcelona dan Las Palmas mencapai kesepakatan untuk transfer Pedri. Namun, pemain asal Canarian itu baru bergabung dengan Blaugrana pada Agustus 2020. Lahir di Tegueste, Tenerife, pada 25 November 2002, ia memulai karir sepak bolanya di tim dari kampung halamannya.', 'pedri.jpg', '2024-12-09 02:46:48', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
