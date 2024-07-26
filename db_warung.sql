-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 09.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawaikofie`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pemesanan`, `id_menu`, `jumlah`, `harga`) VALUES
(4, 2, 2, 25000),
(5, 3, 15, 15000),
(8, 2, 1, 25000),
(9, 3, 2, 15000),
(10, 7, 1, 25000),
(11, 3, 1, 15000),
(12, 6, 1, 12000),
(13, 2, 2, 25000),
(13, 8, 1, 100000),
(14, 7, 1, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_menu`
--

INSERT INTO `jenis_menu` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Menu Ayam Goreng Mantan'),
(2, 'Paket'),
(3, 'Cemilan Khan Main'),
(6, 'Paket Ayam'),
(7, 'Coba'),
(11, 'qwq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `no_hp`, `username`, `password`) VALUES
(1, 123, 'Muhamad', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `status_meja` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `status_meja`) VALUES
(1, '05'),
(2, '10'),
(3, '15'),
(4, '20'),
(5, '25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `status_habis` varchar(50) DEFAULT 'T',
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `id_jenis`, `status_habis`, `foto`) VALUES
(2, 'Ayam Mantan', 25000, 1, 'T', 'FotoMenu-2.jpg'),
(3, 'Ayam geprek', 15000, 1, 'T', 'FotoMenu-3.jpg'),
(5, 'Ayam goreng', 20000, 1, 'T', 'FotoMenu-5.jpg'),
(6, 'Ayam Bukhan Mhaen', 12000, 6, 'T', 'FotoMenu-6.jpg'),
(7, 'Ayam goreng manis', 25000, 7, 'T', 'FotoMenu-7.jpg'),
(8, 'Ayam taliwang', 100000, 11, 'T', 'FotoMenu-8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `tgl_beli` datetime DEFAULT NULL,
  `id_kasir` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `status_lunas` varchar(50) DEFAULT '''T''',
  `tunai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `no_meja`, `tgl_beli`, `id_kasir`, `id_menu`, `status_lunas`, `tunai`) VALUES
(4, 1, '2024-07-04 12:35:14', 1, NULL, 'Y', 50000),
(5, 2, '2024-07-04 12:36:34', 1, NULL, 'Y', 225000),
(8, 1, '2024-07-04 12:45:19', 1, NULL, 'Y', 25000),
(9, 5, '2024-07-04 12:46:40', 1, NULL, 'Y', 30000),
(10, 3, '2024-07-04 12:48:34', 1, NULL, 'Y', 25000),
(11, 1, '2024-07-04 12:52:37', 1, NULL, 'Y', 1111),
(12, 1, '2024-07-04 13:00:51', 1, NULL, 'Y', 12000),
(13, 3, '2024-07-04 13:40:34', 1, NULL, 'Y', 150000),
(14, 1, '2024-07-04 14:59:04', 1, NULL, 'Y', 25000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_penjualan` (
`tahun` int(4)
,`nama_menu` varchar(50)
,`jan` decimal(32,0)
,`feb` decimal(32,0)
,`mar` decimal(32,0)
,`apr` decimal(32,0)
,`mei` decimal(32,0)
,`jun` decimal(32,0)
,`jul` decimal(32,0)
,`ags` decimal(32,0)
,`sep` decimal(32,0)
,`okt` decimal(32,0)
,`nop` decimal(32,0)
,`des` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_penjualan`
--
DROP TABLE IF EXISTS `v_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan`  AS SELECT year(`p`.`tgl_beli`) AS `tahun`, `b`.`nama_menu` AS `nama_menu`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `jan`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `feb`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `mar`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `apr`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `mei`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `jun`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `jul`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `ags`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `sep`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `okt`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `nop`, ifnull((select sum(`i2`.`jumlah`) from (`detail_pesanan` `i2` join `pemesanan` `p2`) where year(`p2`.`tgl_beli`) = (select `tahun`) and month(`p2`.`tgl_beli`) = 1 and `i2`.`id_pemesanan` = `p2`.`id_pemesanan` and `i2`.`id_menu` = `i`.`id_menu`),0) AS `des` FROM ((`pemesanan` `p` join `detail_pesanan` `i` on(`i`.`id_pemesanan` = `p`.`id_pemesanan`)) join `menu` `b` on(`b`.`id_menu` = `i`.`id_menu`)) GROUP BY (select 'tahun'), `b`.`id_menu` ORDER BY (select `tahun`) DESC, `b`.`id_menu` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_menu`),
  ADD KEY `FK_item_pembelian_jenis_menu` (`id_menu`),
  ADD KEY `FK_item_pembelian_pembelian` (`id_pemesanan`) USING BTREE;

--
-- Indeks untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `FK_pembelian_meja` (`no_meja`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_detail_pesanan_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_item_pembelian_jenis_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_menu_jenis_menu` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_pembelian_meja` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pemesanan_kasir` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pemesanan_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
