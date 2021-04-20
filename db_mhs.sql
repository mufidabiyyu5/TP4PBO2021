-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2021 pada 16.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs`
--

CREATE TABLE `data_mhs` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk_mhs` varchar(255) NOT NULL,
  `prodi_mhs` varchar(255) NOT NULL,
  `alamat_mhs` varchar(455) NOT NULL,
  `status_mhs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mhs`
--

INSERT INTO `data_mhs` (`nim`, `nama`, `jk_mhs`, `prodi_mhs`, `alamat_mhs`, `status_mhs`) VALUES
(1907996, 'Mufid', 'Laki-laki', 'Ilmu Komputer', 'Gg. Cempaka', 'Belum Lulus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mhs`
--
ALTER TABLE `data_mhs`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
