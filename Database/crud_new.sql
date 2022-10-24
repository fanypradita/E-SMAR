-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2022 pada 09.44
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhakguna`
--

CREATE TABLE `dhakguna` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhakkelola`
--

CREATE TABLE `dhakkelola` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhakmilik`
--

CREATE TABLE `dhakmilik` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dhakmilik`
--

INSERT INTO `dhakmilik` (`id`, `no_hak`, `thn`, `jns`, `npk`, `kec`, `kel`) VALUES
('R23B10', 201, '2004', 'Hak Milik', 'budi', 'Klirong', 'Dorowati'),
('R41B12', 200, '2004', 'Hak Milik', 'rama', 'Klirong', 'Dorowati'),
('R43B05', 202, '2004', 'Hak Milik', 'rahma', 'Klirong', 'Dorowati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhakpakai`
--

CREATE TABLE `dhakpakai` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhaktanggung`
--

CREATE TABLE `dhaktanggung` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dhakwakaf`
--

CREATE TABLE `dhakwakaf` (
  `id` varchar(100) NOT NULL,
  `no_hak` int(20) NOT NULL,
  `thn` varchar(20) NOT NULL,
  `jns` varchar(20) NOT NULL,
  `npk` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakguna`
--

CREATE TABLE `hakguna` (
  `id` varchar(10) NOT NULL,
  `jns` varchar(50) NOT NULL,
  `nh` int(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL,
  `rak` varchar(10) NOT NULL,
  `bar` int(30) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakkelola`
--

CREATE TABLE `hakkelola` (
  `id` varchar(100) NOT NULL,
  `nh` varchar(100) NOT NULL,
  `jns` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `bar` int(100) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakmilik`
--

CREATE TABLE `hakmilik` (
  `id` varchar(100) NOT NULL,
  `nh` varchar(100) NOT NULL,
  `jns` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `bar` int(100) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hakmilik`
--

INSERT INTO `hakmilik` (`id`, `nh`, `jns`, `kec`, `kel`, `rak`, `bar`, `ban`) VALUES
('R41B12', '200-300', 'Hak Milik', 'Klirong', 'Dorowati', 'R4', 1, 'B12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakpakai`
--

CREATE TABLE `hakpakai` (
  `id` varchar(100) NOT NULL,
  `nh` int(100) NOT NULL,
  `jns` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `bar` int(100) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `haktanggung`
--

CREATE TABLE `haktanggung` (
  `id` varchar(100) NOT NULL,
  `nh` varchar(100) NOT NULL,
  `jns` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `bar` int(100) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakwakaf`
--

CREATE TABLE `hakwakaf` (
  `id` varchar(100) NOT NULL,
  `nh` int(100) NOT NULL,
  `jns` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `kel` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `bar` int(100) NOT NULL,
  `ban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hakwakaf`
--

INSERT INTO `hakwakaf` (`id`, `nh`, `jns`, `kec`, `kel`, `rak`, `bar`, `ban`) VALUES
('ID-1', 1000, 'Hak Wakaf', 'Kebumen', 'Kebumen', 'R1', 2, 'B20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'Pegawai', 'pegawai', 'pegawai', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dhakmilik`
--
ALTER TABLE `dhakmilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hakguna`
--
ALTER TABLE `hakguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hakmilik`
--
ALTER TABLE `hakmilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hakpakai`
--
ALTER TABLE `hakpakai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hakwakaf`
--
ALTER TABLE `hakwakaf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
