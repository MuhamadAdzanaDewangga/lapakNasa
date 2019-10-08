-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 03:55 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`) VALUES
(3, '28', 'T10090078', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `br_id` int(6) NOT NULL,
  `br_nm` varchar(50) NOT NULL,
  `br_item` int(4) NOT NULL,
  `br_hrg` int(10) NOT NULL,
  `br_stok` int(9) NOT NULL,
  `br_satuan` varchar(20) NOT NULL,
  `br_gbr` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `br_sts` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`br_id`, `br_nm`, `br_item`, `br_hrg`, `br_stok`, `br_satuan`, `br_gbr`, `ket`, `br_sts`) VALUES
(1, 'Moreskin Serum Glowing', 1, 110000, 12, 'Pcs', 'gambar/serum.jpg', 'Membantu mencerahkan dan melembabkan kulit wajah', 'Y'),
(2, 'Amotee Nasa', 1, 250000, 50, 'Pcs', 'gambar/amotee.png', 'Membantu menjaga kesehatan kulit & mencerahkan wajah', 'Y'),
(3, 'Collaskin Nasa', 1, 200000, 5, 'Pcs', 'gambar/collaskin.jpg', 'Paket perawatan kecantikan dari dalam', 'Y'),
(4, 'Facial Cleanser', 1, 75000, 50, 'Pcs', 'gambar/cleanser.jpg', 'Pembersih wajah untuk mengangkat sel kulit mati', 'Y'),
(5, 'Moreskin Clean & Glow', 1, 125000, 30, 'Pcs', 'gambar/c_g.jpg', 'Untukmembuat wajah glowing alami', 'Y'),
(6, 'Paket Moreskin Pink', 1, 650000, 10, 'Pcs', 'gambar/moreskin.jpg', 'Satu paket lengkap kecantikan', 'Y'),
(7, 'Looke Matte', 1, 150000, 20, 'Pcs', 'gambar/looke_matte.jpg', 'Bahan ringan dibibir & awet', 'Y'),
(8, 'Lacoco Orange', 1, 255000, 17, 'Pcs', 'gambar/lacoco_orange.png', 'Terbuat dari orange asli', 'Y'),
(9, 'Lacoco WtrM Glow', 1, 250000, 20, 'Pcs', 'gambar/1.jpg', 'Terbuat dari Watermelon asli', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `username` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kp_pem` varchar(6) NOT NULL,
  `kota_pem` varchar(30) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `norek_pem` varchar(20) NOT NULL,
  `bank_pem` varchar(25) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(1) NOT NULL,
  `id_kustomer` int(11) NOT NULL,
  `br_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `tanggal`, `username`, `nama_penerima`, `alamat`, `kp_pem`, `kota_pem`, `telepon`, `norek_pem`, `bank_pem`, `total_pembelian`, `status_pembelian`, `id_kustomer`, `br_id`) VALUES
('T10090078', '2010-09-29', 13, 'sandi ajah', ' Jl. Nangka Raya Blok I ', '17151', 'Bekasi', '021', '', '', 12070000, 'Y', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_kustomer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_kustomer`, `nama`, `username`, `password`, `email`) VALUES
(28, 'lapaknasa', 'lapaknasa', 'Lapaknasa112', 'lapaknasa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `br_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_kustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
