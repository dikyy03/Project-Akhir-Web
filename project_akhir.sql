-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 04:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar_menu`
--

CREATE TABLE `tbl_daftar_menu` (
  `id_menu` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_daftar_menu`
--

INSERT INTO `tbl_daftar_menu` (`id_menu`, `gambar`, `nama_menu`, `keterangan`, `harga`, `stok`) VALUES
(37, 'img/galonisiulang.jpg', 'Galon Isi Ulang', 'Galon Isi Ulang RO dengan kapasitas 19 Liter', '7000', '40'),
(38, 'img/aqua.jpg', 'Galon Aqua', 'Galon Aqua dengan kapasitas 19 Liter', '22000', '20'),
(39, 'img/vit.jpg', 'Galon Vit', 'Galon Vit dengan kapasitas 19 Liter', '20000', '20'),
(40, 'img/cleo.jpg', 'Galon Cleo', 'Galon Cleo dengan kapasitas 19 Liter', '16000', '20'),
(41, 'img/leminerale.jpg', 'Leminerale', 'Leminerale dengan kapasital 15 Liter', '15000', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jumlah_pesanan` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `waktu_pemesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_harga` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_menu`, `username`, `alamat`, `jumlah_pesanan`, `keterangan`, `waktu_pemesanan`, `total_harga`, `status`) VALUES
(5, 37, 'firman123', 'Jl. Industri Kecil, No.25', 5, 'Rumah Merah', '2024-06-25 16:21:38', 35000.00, 'accepted'),
(6, 38, 'firman123', 'mscs', 4, 'axa', '2024-06-25 16:22:30', 88000.00, 'accepted'),
(7, 37, 'alfa123', 'Jl. Kesuma No.9', 5, 'Rumah warna Hijau samping Balaikota', '2024-06-25 17:54:50', 35000.00, 'accepted'),
(8, 38, 'alfa123', 'jl.atletik No 12', 3, 'Rumah warna ungu', '2024-06-26 04:00:32', 66000.00, 'accepted'),
(9, 37, 'alfa123', 'jl.atletik No 12', 4, 'Rumah warna biru', '2024-06-26 05:30:27', 28000.00, 'accepted'),
(10, 37, 'alfa123', 'jl.atletik No 12', 4, 'Warna Rumah ungu', '2024-06-26 05:56:31', 28000.00, 'accepted'),
(11, 40, 'alfa123', 'jl.atletik No 12', 2, 'Rumah Warna Kuning', '2024-06-28 01:51:34', 32000.00, 'accepted'),
(12, 37, 'alfa123', 'jl.atletik No 12', 3, 'Rumah berwarna merah', '2024-06-28 02:03:58', 21000.00, 'accepted'),
(13, 38, 'alfa123', 'jl.atletik No 12', 2, 'Rumah warna biru', '2024-06-28 02:47:18', 44000.00, 'accepted'),
(14, 38, 'alfa123', 'jl.atletik No 12', 4, 'Rumah warna kuning', '2024-06-28 11:14:26', 88000.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) DEFAULT 'pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `email`, `alamat`, `nomor_telepon`, `password`, `status`) VALUES
(34, 'Muhammad Dicky Armansyah', 'dicky03', 'muhammaddicky123@gmail.com', 'jl.pelita', '0897678576785', 'ee0b6db238b075d0da86340048fb147a', 'admin'),
(35, 'Muhammad Alfa', 'alfa123', 'alfa123@gmail.com', 'jl.atletik No 12', '099887766554', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan'),
(36, 'Firman', 'firman123', 'firman@gmail.com', 'jl.industri', '0987766557788', '827ccb0eea8a706c4c34a16891f84e7b', 'pelanggan'),
(37, 'Muhammad Agung', 'agung123', 'agung@gmail.com', 'jl.agussalim', '0998877887796', '827ccb0eea8a706c4c34a16891f84e7b', 'kurir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_daftar_menu`
--
ALTER TABLE `tbl_daftar_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_daftar_menu`
--
ALTER TABLE `tbl_daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_daftar_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
