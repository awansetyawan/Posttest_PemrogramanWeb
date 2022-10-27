-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 12.44
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesan_gitar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gitar` varchar(40) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `waktu` datetime NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `gitar`, `jumlah`, `alamat`, `email`, `whatsapp`, `waktu`, `bukti`) VALUES
(1, 'Awan', 'Chitarra', '1', 'Jln. Kenangan Indah', 'awan@gmail.com', '0812345678', '2022-10-27 18:41:30', 'Awan.jpg'),
(2, 'Lana', 'Alhambra', '1', 'Jln. Masa Lalu', 'lana@gmail.com', '0812345678', '2022-10-27 18:42:35', 'Lana.jpg'),
(3, 'Alif', 'Dreadnought', '2', 'Jln. Menuju Sukses', 'alif@gmail.com', '0812345678', '2022-10-27 18:43:45', 'Alif.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
