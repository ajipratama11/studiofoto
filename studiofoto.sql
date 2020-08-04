-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 09:09 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_reff` varchar(30) NOT NULL,
  `nama_reff` varchar(30) NOT NULL,
  `keterangan_reff` text NOT NULL,
  `id_admin` varchar(5) NOT NULL,
  `id_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_reff`, `nama_reff`, `keterangan_reff`, `id_admin`, `id_jenis`) VALUES
('r1', 'Beban Gaji', 'Gaji pegawai', '1', '2'),
('r2', 'Pendapatan', 'Pendapatan dari penjualan pupuk', '1', '1'),
('r4', 'Kas', 'Kas dari pemasukan penjualan pupuk', '1', '1'),
('r5', 'Modal', 'Modal awal', '1', '2'),
('r6', 'Peralatan', 'Pembelian atau perawatan', '1', '2'),
('r7', 'Persediaan', 'Persediaan', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(40) NOT NULL,
  `alamat_cus` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email_cus` varchar(35) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `nama_cus`, `alamat_cus`, `no_hp`, `email_cus`, `username`, `password`) VALUES
(1, 'Fahrizal Azi Ferdiansyah', 'Banyuwangi Balak', 'jiwanrizal$gmai', '085678128123', 'jiwan', '12345'),
(5, 'Jiwan Rizal', 'Banyuwangi', '085736586636', 'jiwanrizal5@gmail.com', 'aji', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `dekorasi`
--

CREATE TABLE `dekorasi` (
  `id_dekorasi` int(40) NOT NULL,
  `nama_dekorasi` varchar(50) NOT NULL,
  `harga_dekorasi` int(30) NOT NULL,
  `deskripsi_dekorasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dekorasi`
--

INSERT INTO `dekorasi` (`id_dekorasi`, `nama_dekorasi`, `harga_dekorasi`, `deskripsi_dekorasi`) VALUES
(2, 'Minimalis', 750000, 'Dekorasi minimalis dapat di tempatkan di ruangan kecil/sempit dengan harga yang terjangkau'),
(3, 'Sedang', 5000000, 'Dekorasi yang tidak terlalu besar dengan kualitas memuaskan'),
(4, 'Mewah', 10000000, 'Dekorasi yang besar dengan barang-barang yang mewah.');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `id_kategori`) VALUES
(1, 'gallery-4.jpg', '5'),
(2, 'gallery-5.jpg', '2'),
(4, '06627c8c-6b87-4f60-b151-00a359', '2'),
(6, 'cople.jpeg', '3'),
(7, 'grup.jpeg', '7'),
(8, 'kids.jpeg', '4'),
(9, 'single.jpeg', '5'),
(10, 'wedding.jpeg', '2'),
(11, 'wisuda.jpeg', '6'),
(12, 'prewedding.jpeg', '8');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `jenis_pengeluaran`) VALUES
(1, 'Dekorasi'),
(2, 'Kamera');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_saldo`
--

CREATE TABLE `jenis_saldo` (
  `id_jenis` int(11) NOT NULL,
  `nama_saldo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_saldo`
--

INSERT INTO `jenis_saldo` (`id_jenis`, `nama_saldo`) VALUES
(1, 'Debit'),
(2, 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(35) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
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
-- Table structure for table `kertas`
--

CREATE TABLE `kertas` (
  `id_kertas` int(50) NOT NULL,
  `nama_kertas` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `opsi` varchar(30) NOT NULL,
  `dp` int(50) DEFAULT NULL,
  `total_bayar` int(50) NOT NULL,
  `bukti_transfer` varchar(128) NOT NULL,
  `tgl_checkout` varchar(30) NOT NULL,
  `jurnal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `id_pemesanan`, `opsi`, `dp`, `total_bayar`, `bukti_transfer`, `tgl_checkout`, `jurnal`) VALUES
(16, 50, 'Lunas', 0, 130000, '0918194620X310.jpg', 'Senin, 3 Agustus 2020', 'Ya'),
(17, 52, 'Lunas', 0, 130000, '0918194620X310.jpg', 'Selasa, 4 Agustus 2020', 'Ya'),
(18, 53, 'DP', 40000, 80000, '0918194620X310.jpg', 'Selasa, 4 Agustus 2020', 'Ya'),
(19, 54, 'Lunas', 0, 130000, '0918194620X310.jpg', 'Selasa, 4 Agustus 2020', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_cus` int(50) NOT NULL,
  `id_dekorasi` int(50) NOT NULL,
  `id_sesi` int(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `lokasi` text,
  `tgl_pemesanan` varchar(128) NOT NULL,
  `waktu_pemesanan` varchar(30) NOT NULL,
  `waktu_selesai` varchar(30) NOT NULL,
  `total_biaya` int(70) NOT NULL,
  `status_cus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_kategori`, `id_cus`, `id_dekorasi`, `id_sesi`, `jenis`, `lokasi`, `tgl_pemesanan`, `waktu_pemesanan`, `waktu_selesai`, `total_biaya`, `status_cus`) VALUES
(51, 2, 5, 1, 1, 'Studio', '', '03-08-2020', '20:11', '20:17', 130000, 'Belum Checkout'),
(52, 2, 1, 1, 1, 'Studio', '', '04-08-2020', '15:02', '15:08', 130000, 'Pesanan Selesai'),
(53, 5, 1, 1, 1, 'Studio', '', '04-08-2020', '15:06', '15:12', 80000, 'Pesanan Selesai'),
(54, 2, 1, 1, 1, 'Studio', '', '04-08-2020', '15:16', '15:22', 130000, 'Pesanan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `sesi_pemotretan`
--

CREATE TABLE `sesi_pemotretan` (
  `id_sesi` int(30) NOT NULL,
  `jumlah_sesi` int(30) NOT NULL,
  `harga_sesi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesi_pemotretan`
--

INSERT INTO `sesi_pemotretan` (`id_sesi`, `jumlah_sesi`, `harga_sesi`) VALUES
(1, 2, 10000),
(2, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_pengeluaran` varchar(30) NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `deskripsi_pengeluaran` text NOT NULL,
  `tgl_pengeluaran` varchar(30) NOT NULL,
  `id_jenis_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `biaya_pengeluaran`, `deskripsi_pengeluaran`, `tgl_pengeluaran`, `id_jenis_pengeluaran`) VALUES
(1, 'Menambah Dekorasi', 25000, 'Penambahan model dekorasi', 'Sabtu, 1 Agustus 2020', 1),
(2, 'Membuat Bingkai', 50000, 'Lagi mahal nih kertasnya', 'Minggu, 2 Agustus 2020', 1),
(3, 'Membuat Bingkai', 50000, 'Asa', 'Selasa, 4 Agustus 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_admin`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(34, '1', 'r5', '04-08-2020 05:21:26', '2020-08-04', 2, 1500000),
(35, '', 'r1', '04-08-2020 06:04:15', '2020-08-05', 2, 150000),
(37, '', 'r2', '04-08-2020 07:14:18', '2020-08-06', 1, 150000),
(39, '', 'r2', '04-08-2020 07:15:44', '2020-08-21', 1, 150000),
(40, '', 'r6', '04-08-2020 08:24:16', '2020-08-13', 2, 50000),
(41, '', 'r2', '04-08-2020 08:32:23', '2020-08-05', 1, 135000);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(30) NOT NULL,
  `nama_ukuran` varchar(80) NOT NULL,
  `harga` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `dekorasi`
--
ALTER TABLE `dekorasi`
  ADD PRIMARY KEY (`id_dekorasi`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indexes for table `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kertas`
--
ALTER TABLE `kertas`
  ADD PRIMARY KEY (`id_kertas`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `sesi_pemotretan`
--
ALTER TABLE `sesi_pemotretan`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dekorasi`
--
ALTER TABLE `dekorasi`
  MODIFY `id_dekorasi` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_saldo`
--
ALTER TABLE `jenis_saldo`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kertas`
--
ALTER TABLE `kertas`
  MODIFY `id_kertas` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
