-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2020 pada 21.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studiofoto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `no_reff` varchar(30) NOT NULL,
  `nama_reff` varchar(30) NOT NULL,
  `keterangan_reff` text NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `id_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`no_reff`, `nama_reff`, `keterangan_reff`, `id_admin`, `id_jenis`) VALUES
('r1', 'Beban Produk', 'Membeli pupuk ke suplier', '1', '2'),
('r2', 'Pendapatan', 'Pendapatan dari penjualan pupuk', '1', '1'),
('r3', 'Piutang', 'Piutang pembelian pupuk', '1', '1'),
('r4', 'Kas', 'Kas dari pemasukan penjualan pupuk', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(40) NOT NULL,
  `alamat_cus` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email_cus` varchar(135) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `is_actived` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_cus`, `nama_cus`, `alamat_cus`, `no_hp`, `email_cus`, `username`, `password`, `is_actived`) VALUES
(1, 'Fahrizal Azi Ferdiansyah', 'Banyuwangi Balak', 'jiwanrizal$gmai', '085678128123', 'jiwan', '12345', 1),
(3, 'm', 'm', 'm', '3123', 'jiw', '123', 0),
(8, 'Aji Pratama', 'asas', 'apratpratama252', '1212', 'aprat11', 'aji', 1),
(9, 'Aji Pratama', 'asas', 'apratpratama252', '1212', 'aprat11', 'aaa', 1),
(10, 'Aji Pratama', 'asas', 'ajip2606@gmail.', '1212', 'aprat11', 'aaaa', 1),
(11, 'Aji Pratama', 'asas', 'ajip2606@gmail.', '1212', 'aprat11', 'aaaa', 1),
(12, 'Aji Pratama', 'asas', 'ajip2606@gmail.', '1212', 'aprat11', 'aaa', 1),
(14, 'Aji Pratama', 'asas', '1212', 'apratpratama2525@gmail.com', 'admin', 'aaaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dekorasi`
--

CREATE TABLE `dekorasi` (
  `id_dekorasi` int(40) NOT NULL,
  `nama_dekorasi` varchar(50) NOT NULL,
  `harga_dekorasi` int(30) NOT NULL,
  `deskripsi_dekorasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dekorasi`
--

INSERT INTO `dekorasi` (`id_dekorasi`, `nama_dekorasi`, `harga_dekorasi`, `deskripsi_dekorasi`) VALUES
(2, 'Minimalis', 750000, 'Dekorasi minimalis dapat di tempatkan di ruangan kecil/sempit dengan harga yang terjangkau'),
(3, 'Sedang', 5000000, 'Dekorasi yang tidak terlalu besar dengan kualitas memuaskan'),
(4, 'Mewah', 10000000, 'Dekorasi yang besar dengan barang-barang yang mewah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `id_kategori`) VALUES
(6, 'cople.jpeg', '3'),
(7, 'grup.jpeg', '7'),
(8, 'kids.jpeg', '4'),
(9, 'single.jpeg', '5'),
(10, 'wedding.jpeg', '2'),
(11, 'wisuda.jpeg', '6'),
(12, 'prewedding.jpeg', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_saldo`
--

CREATE TABLE `jenis_saldo` (
  `id_jenis` int(11) NOT NULL,
  `nama_saldo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_saldo`
--

INSERT INTO `jenis_saldo` (`id_jenis`, `nama_saldo`) VALUES
(1, 'Debit'),
(2, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(35) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `harga`, `deskripsi`) VALUES
(2, 'Wedding', 100000, 'Baju couple dan serasi'),
(3, 'Couple', 100000, 'uwuw'),
(4, 'Kids', 0, '0'),
(5, 'Single', 50000, 'Dapat Konsumsi'),
(6, 'Wisuda', 0, '0'),
(7, 'Grup', 0, '0'),
(8, 'Prewedding', 20000, 'Bensin Gratis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kertas`
--

CREATE TABLE `kertas` (
  `id_kertas` int(50) NOT NULL,
  `nama_kertas` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `dp` int(50) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `bukti_transfer` varchar(128) NOT NULL,
  `tgl_checkout` varchar(50) NOT NULL,
  `jurnal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `id_pemesanan`, `opsi`, `dp`, `total_bayar`, `bukti_transfer`, `tgl_checkout`, `jurnal`) VALUES
(1, 1, 'LUNAS', 35000, 70000, '206013_a2240cd9-17ad-423a-9042-4cfe06242bdb_628_628.jpg', 'Minggu, 2 Agustus 2020', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `id_kategori` int(35) NOT NULL,
  `id_cus` int(50) NOT NULL,
  `id_dekorasi` int(50) NOT NULL,
  `id_sesi` int(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `tgl_pemesanan` varchar(128) NOT NULL,
  `waktu_pemesanan` varchar(50) NOT NULL,
  `waktu_selesai` varchar(50) NOT NULL,
  `total_biaya` int(70) NOT NULL,
  `status_cus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_kategori`, `id_cus`, `id_dekorasi`, `id_sesi`, `jenis`, `lokasi`, `tgl_pemesanan`, `waktu_pemesanan`, `waktu_selesai`, `total_biaya`, `status_cus`) VALUES
(1, 5, 1, 2, 1, 'Studio', '', '19-08-2020', '08:00', '08:03', 70000, 'Pesanan Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_pemotretan`
--

CREATE TABLE `sesi_pemotretan` (
  `id_sesi` int(30) NOT NULL,
  `jumlah_sesi` int(30) NOT NULL,
  `harga_sesi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sesi_pemotretan`
--

INSERT INTO `sesi_pemotretan` (`id_sesi`, `jumlah_sesi`, `harga_sesi`) VALUES
(1, 1, 5000),
(2, 2, 20000),
(3, 3, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_pengeluaran` int(50) NOT NULL,
  `nama_pengeluaran` varchar(50) NOT NULL,
  `biaya_pengeluaran` int(50) NOT NULL,
  `deskripsi_pengeluaran` text NOT NULL,
  `tgl_pengeluaran` varchar(50) NOT NULL,
  `id_jenis_pengeluaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `no_reff` varchar(30) NOT NULL,
  `tgl_input` varchar(30) NOT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `jenis_saldo` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_admin`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(23, '', 'r4', '03-08-2020 11:52:51', '2020-08-03', 1, 150000),
(24, '', 'r1', '03-08-2020 11:53:14', '2020-08-04', 2, 135000),
(25, '', 'r4', '03-08-2020 12:06:59', '2020-02-03', 1, 150000),
(26, '', 'r2', '03-08-2020 02:17:19', '2020-08-03', 1, 130000),
(27, '', 'r2', '03-08-2020 02:17:53', '2020-08-03', 1, 130000),
(28, '', 'r2', '03-08-2020 02:18:21', '2020-08-03', 1, 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(30) NOT NULL,
  `nama_ukuran` varchar(80) NOT NULL,
  `harga` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(30) NOT NULL,
  `email_cus` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email_cus`, `token`, `date_created`) VALUES
(1, '1212', '90', 1596252751),
(2, '1212', '0', 1596252801),
(3, '1212', '0', 1596252934),
(4, '1212', '0', 1596252970),
(5, '1212', 'yB+dSJYVU0pdz0zuuwZD7eiWITE/UkpjcGc/v1woL1A=', 1596253196);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indeks untuk tabel `dekorasi`
--
ALTER TABLE `dekorasi`
  ADD PRIMARY KEY (`id_dekorasi`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indeks untuk tabel `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kertas`
--
ALTER TABLE `kertas`
  ADD PRIMARY KEY (`id_kertas`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `sesi_pemotretan`
--
ALTER TABLE `sesi_pemotretan`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `dekorasi`
--
ALTER TABLE `dekorasi`
  MODIFY `id_dekorasi` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kertas`
--
ALTER TABLE `kertas`
  MODIFY `id_kertas` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sesi_pemotretan`
--
ALTER TABLE `sesi_pemotretan`
  MODIFY `id_sesi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id_pengeluaran` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
