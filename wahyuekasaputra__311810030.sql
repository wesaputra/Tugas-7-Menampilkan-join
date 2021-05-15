-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2021 pada 18.41
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wahyuekasaputra__311810030`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `no_invoice` varchar(15) NOT NULL,
  `no_sparepart` varchar(20) DEFAULT NULL,
  `tanggal_transaksi` varchar(20) DEFAULT NULL,
  `sisa_bayar` int(50) DEFAULT NULL,
  `discount` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`no_invoice`, `no_sparepart`, `tanggal_transaksi`, `sisa_bayar`, `discount`) VALUES
('INV2001012', '3C1-123', '08 MEI 2020', 120000, 0),
('INV2001013', '3C1-124', '01 MARET 2020', 150000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_polisi` varchar(10) NOT NULL,
  `tipe_motor` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no_polisi`, `tipe_motor`, `alamat`) VALUES
('B 3411 FGV', 'YAMAHA VIXION', 'CIBITUNG'),
('B 3561 GFG', 'YAMAHA VIXION', 'CIKARANG BARAT'),
('B 4312 FCF', 'YAMAHA MIO', 'CIKARANG TIMUR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `yss_code` int(11) NOT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `nama_technician` varchar(30) DEFAULT NULL,
  `jenis_service` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`yss_code`, `no_polisi`, `nama_technician`, `jenis_service`) VALUES
(2991, 'B 4312 FCF', 'YOGA', 'SERVICE RINGAN'),
(2992, 'B 3411 FGV', 'WAHYU', 'SERVICE RINGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `no_sparepart` varchar(20) NOT NULL,
  `yss_code` int(11) DEFAULT NULL,
  `nama_sparepart` varchar(50) DEFAULT NULL,
  `qty` int(30) DEFAULT NULL,
  `harga_sparepart` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`no_sparepart`, `yss_code`, `nama_sparepart`, `qty`, `harga_sparepart`) VALUES
('3C1-123', 2992, 'BRAKE PAD KIT', 1, 60000),
('3C1-124', 2991, 'YAMALUBE SPORT', 1, 80000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `no_sparepart` (`no_sparepart`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_polisi`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`yss_code`),
  ADD KEY `no_polisi` (`no_polisi`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`no_sparepart`),
  ADD KEY `yss_code` (`yss_code`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `no_sparepart` FOREIGN KEY (`no_sparepart`) REFERENCES `sparepart` (`no_sparepart`);

--
-- Ketidakleluasaan untuk tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `no_polisi` FOREIGN KEY (`no_polisi`) REFERENCES `pelanggan` (`no_polisi`);

--
-- Ketidakleluasaan untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `yss_code` FOREIGN KEY (`yss_code`) REFERENCES `service` (`yss_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
