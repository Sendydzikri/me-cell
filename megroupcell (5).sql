-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2021 pada 00.11
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megroupcell`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(50) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `username_admin`, `password_admin`) VALUES
(2, 'stevan james', 'james@gmail.com', 'admin', '$2y$10$3EUHB2.54NLIlplKRunxz.MjkNOS8yzCIq1qGlPAwWFHjwBot/GBe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(50) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `stock` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_kategori`, `jenis_barang`, `stock`, `harga`, `gambar`) VALUES
(2, 'Pulsa Telkomsel', 2, 'Kuota', 18, 10000, 'pulsa_telkom1.png'),
(3, 'Pulsa Esia', 1, 'Pulsa', 1808, 10000, 'pulsa_esia.png'),
(4, 'Pulsa XL', 1, 'Pulsa', 32, 20000, 'pulsa_xl.jpg'),
(5, 'Kuota esia', 2, 'Kuota', 90, 20000, 'pulsa_esia.png'),
(6, 'Kuota abc', 2, 'Kuota', 20, 30000, 'kuota_abc.png'),
(7, 'Persib', 2, 'Kuota', 90, 900000, '1617609106-2021-04-05-—Pngtree—set_of_game_buttons_and_5264791.png'),
(8, 'Pulsa Telkomsel ', 1, 'Kuota', 50, 50, '1617690455-2021-04-06-lebur.jpg'),
(9, 'Kartu Perdana Telkomsel', 3, 'Kartu Perdana', 40, 500000, 'pulsa_telkom.png'),
(10, 'Headset Murah', 4, 'Headset', 58, 20000, '1618557591-2021-04-16-headset2.jpg'),
(11, 'Headphone', 4, 'Headphone', 80, 250000, '1618558736-2021-04-16-headset2.jpg'),
(12, 'Kabel Data', 4, 'Kabel Data', 90, 20000, '1618559569-2021-04-16-kabeldata3.jpg'),
(13, 'Kartu Perdana XL', 3, 'Kartu Perdana', 80, 500000, '1619504510-2021-04-27-cover_cd_(2).jpg'),
(15, 'Headphone RTX', 4, 'Headphone', 20, 500000, '1622290815-2021-05-29-Login.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` int(20) NOT NULL,
  `send_to` int(11) NOT NULL,
  `send_from` int(11) NOT NULL,
  `tgl_chat` date NOT NULL,
  `isi` text NOT NULL,
  `lampiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id`, `send_to`, `send_from`, `tgl_chat`, `isi`, `lampiran`) VALUES
(1, 1, 11, '2021-06-01', 'Halo Admin', ''),
(2, 11, 1, '2021-06-01', 'Halo, Ada Yang bisa kami bantu kak ?', ''),
(3, 1, 11, '2021-06-19', 'Saya Sudah Bayar Transaksi Kak , Berikut Foto Transfernya', '1624004390-2021-06-18-3411181060_Soal1.PNG'),
(4, 1, 11, '2021-06-19', 'Mohon Segera Diproses Ya kak..', ''),
(7, 1, 11, '2021-06-19', 'Check 1', ''),
(8, 1, 11, '2021-06-19', 'Check 2', '1624092105-2021-06-19-unjani.png'),
(9, 1, 11, '2021-06-19', 'Check 3', ''),
(10, 1, 8, '2021-06-20', 'Halo Kak', ''),
(11, 1, 8, '2021-06-20', 'asdasdasd', ''),
(12, 11, 1, '2021-06-20', 'baik kak nanti saya cek', ''),
(14, 11, 1, '2021-06-20', 'Sudah Saya Acc Kak Berikut Buktinya', '1624205410-2021-06-20-DSC_0004.jpg'),
(15, 1, 11, '2021-06-20', 'Baik Kak Terimakasih', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_kuota`
--

CREATE TABLE `tb_detail_kuota` (
  `id_kuota` varchar(50) NOT NULL,
  `id_detailkuota` int(50) NOT NULL,
  `jumlah_kuota` float NOT NULL,
  `masa_aktif` int(20) NOT NULL,
  `harga_kuota` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_kuota`
--

INSERT INTO `tb_detail_kuota` (`id_kuota`, `id_detailkuota`, `jumlah_kuota`, `masa_aktif`, `harga_kuota`) VALUES
('1', 6, 1, 14, 19000),
('1', 7, 3, 30, 28000),
('1', 8, 2, 14, 29000),
('2', 9, 4.5, 30, 27000),
('2', 10, 8, 30, 37500),
('2', 11, 15, 30, 57000),
('2', 12, 25, 30, 92000),
('2', 13, 32, 3, 20000),
('3', 14, 4, 30, 21000),
('3', 15, 8, 30, 32000),
('3', 16, 14, 30, 46000),
('3', 17, 20, 30, 63000),
('3', 18, 1, 1, 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id_kasir` varchar(25) NOT NULL,
  `nama_kasir` varchar(30) NOT NULL,
  `alamat_kasir` varchar(40) NOT NULL,
  `nohp_kasir` varchar(12) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username_kasir` varchar(30) NOT NULL,
  `password_kasir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kasir`
--

INSERT INTO `tb_kasir` (`id_kasir`, `nama_kasir`, `alamat_kasir`, `nohp_kasir`, `cabang`, `email`, `username_kasir`, `password_kasir`) VALUES
('K-0123', 'Junaedis', 'Cigondewah', '08976234', 'Cigondewah Barat', 'james@gmail.com', 'juneds', '$2y$10$3EUHB2.54NLIlplKRunxz.MjkNOS8yzCIq1qGlPAwWFHjwBot/GBe'),
('K-Pm25', 'Rahmat', 'Cicaheum', '08912312', 'Cijerah', 'Rahmat@gmail.com', 'rahmat', '$2y$10$oK4tKOOnNMAM3T7cw.98UO2xJ/Is5uw1bOoi7QAhKLghywW0y.hCG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pulsa'),
(2, 'Kuota'),
(3, 'kartu perdana'),
(4, 'aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id_kuota` varchar(50) NOT NULL,
  `nama_provider` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `nama_provider`, `gambar`) VALUES
('1', 'Telkomsel', 'Telkomsel.png'),
('2', 'XL', 'xl.png'),
('3', 'Indosat', 'indosat.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `alamat_pelanggan` varchar(40) NOT NULL,
  `nohp_pelanggan` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `email`, `username`, `password`) VALUES
(7, 'Muhammad Ramadhan', 'Cijerah', '089762123', 'ramadhan@gmail.com', 'ramadhan', '$2y$10$LmFi.egKALW2lq0NaZsrV.iC1XpsdAQjvYzLs2tj7SqIGsoKVbbXa'),
(8, 'Muhammad Ramadhan', 'Cijerah', '0897231231', 'romadhon@gmail.com', 'rama', '$2y$10$l0LvozonA8heDCBoWkXSLO4IVZNeB9k8z8E9qY5yVQmCX9owkTSCW'),
(11, 'Sendy', 'Sindang Palay', '0897281231', 'Dzikrisendy6@gmail.c', 'sendy', '$2y$10$3EUHB2.54NLIlplKRunxz.MjkNOS8yzCIq1qGlPAwWFHjwBot/GBe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(50) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `id_barang` int(50) NOT NULL,
  `jumlah_barang` int(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `status` int(2) NOT NULL,
  `metode_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_transaksi`, `id_pelanggan`, `id_barang`, `jumlah_barang`, `total_harga`, `tanggal_transaksi`, `status`, `metode_bayar`) VALUES
(63, 'TK-2021-06-16-21-52-45', 11, 10, 21, '420000', '2021-06-16', 2, 'COD'),
(64, 'TK-2021-06-17-20-41-34', 11, 11, 10, '2500000', '2021-06-17', 2, 'COD'),
(65, 'TK-2021-06-17-20-41-34', 11, 5, 10, '200000', '2021-06-17', 2, 'COD'),
(67, 'TK-2021-06-21-22-08-54', 11, 3, 190, '1900000', '2021-06-21', 2, 'Transfer'),
(68, 'TK-2021-06-21-22-08-54', 11, 4, 10, '200000', '2021-06-21', 2, 'Transfer'),
(71, 'TK-2021-06-21-22-47-03', 11, 4, 5, '100000', '2021-06-21', 1, 'Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_kuota`
--

CREATE TABLE `tb_transaksi_kuota` (
  `id_transaksi_kuota` varchar(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `id_detail_kuota` int(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi_kuota`
--

INSERT INTO `tb_transaksi_kuota` (`id_transaksi_kuota`, `id_pelanggan`, `id_detail_kuota`, `no_hp`) VALUES
('TK-2021-04-30-21-10-03', 2, 6, '2147483647'),
('TK-2021-04-30-21-14-57', 2, 9, '2147483647'),
('TK-2021-04-30-21-21-13', 2, 9, '2147483647'),
('TK-2021-04-30-21-21-41', 2, 14, '2147483647'),
('TK-2021-04-30-21-22-06', 2, 8, '2147483647'),
('TK-2021-06-18-05-37-37', 11, 6, '0876544335');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_pulsa`
--

CREATE TABLE `tb_transaksi_pulsa` (
  `id_transpulsa` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `jumlah_saldo` int(12) NOT NULL,
  `id_pelanggan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi_pulsa`
--

INSERT INTO `tb_transaksi_pulsa` (`id_transpulsa`, `no_hp`, `total_harga`, `jumlah_saldo`, `id_pelanggan`) VALUES
('ITP-37348', '089629710886', 7000, 5000, 2),
('ITP-36930', '0877612312', 7000, 5000, 11);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `Id_Kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_kuota`
--
ALTER TABLE `tb_detail_kuota`
  ADD PRIMARY KEY (`id_detailkuota`),
  ADD KEY `id_kuota` (`id_kuota`);

--
-- Indeks untuk tabel `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kuota`
--
ALTER TABLE `tb_kuota`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Pelanggan` (`id_pelanggan`),
  ADD KEY `Id_Barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_transaksi_kuota`
--
ALTER TABLE `tb_transaksi_kuota`
  ADD PRIMARY KEY (`id_transaksi_kuota`),
  ADD KEY `id_user` (`id_pelanggan`),
  ADD KEY `id_kuota` (`id_detail_kuota`);

--
-- Indeks untuk tabel `tb_transaksi_pulsa`
--
ALTER TABLE `tb_transaksi_pulsa`
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_kuota`
--
ALTER TABLE `tb_detail_kuota`
  MODIFY `id_detailkuota` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
