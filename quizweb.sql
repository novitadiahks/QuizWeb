-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 08.24
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_brg` int(11) NOT NULL,
  `nm_brg` varchar(30) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `merk`, `type`, `harga`, `stok`) VALUES
(128, 'HP', 'Esia', 'Esia Hidayah', 'Rp. 100.000', '3'),
(1211, 'Motherboard', 'Intel', 'Core i7-10700K', 'Rp. 10.000.000', '5'),
(5574, 'Laptop', 'Acer', 'E5-475G', 'Rp. 7.000.000', '1'),
(12232, 'HP', 'Sony', 'Xperia', 'Rp. 8.975.000', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `kd_pembeli` int(11) NOT NULL,
  `nm_pembeli` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`kd_pembeli`, `nm_pembeli`, `jenis_kelamin`, `alamat`, `kota`) VALUES
(1, 'Akbar', 'L', 'JL. RAYA KETENGAN NO 32B', 'BANGKALAN'),
(2, 'Aing', 'L', 'JL. RAYA GUBENG', 'SURABAYA'),
(5, 'Saya', 'P', 'JL. RAYA', 'MALANG'),
(6, 'Admin', 'P', 'JL. RAYA BESAR', 'SIDOARJO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trx` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `kd_pembeli` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_trx`, `kd_brg`, `kd_pembeli`, `tgl_beli`) VALUES
(1, 12232, 2, '2020-05-05 15:02:35'),
(2, 5574, 1, '2020-05-06 08:16:57'),
(3, 1211, 1, '2020-05-06 08:17:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`) VALUES
(9, 'admin', '$2y$10$Wz1zON8WULljkq.jtkQojukm1.Qg6mrZP1zD22kf3Ismfpuy7M5Uy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`kd_pembeli`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trx`),
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `kd_pembeli` (`kd_pembeli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `kd_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kd_pembeli`) REFERENCES `pembeli` (`kd_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
