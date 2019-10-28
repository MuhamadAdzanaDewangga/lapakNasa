-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 01:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(2, 'Amotee Nasa', 1, 250000, 51, 'Pcs', 'gambar/amotee.png', 'Membantu menjaga kesehatan kulit &amp; mencerahkan wajah', 'Y'),
(3, 'Collaskin Nasa', 1, 200000, 5, 'Pcs', 'gambar/collaskin.jpg', 'Paket perawatan kecantikan dari dalam', 'Y'),
(4, 'Facial Cleanser', 1, 75000, 50, 'Pcs', 'gambar/cleanser.jpg', 'Pembersih wajah untuk mengangkat sel kulit mati', 'Y'),
(5, 'Moreskin Clean & Glow', 1, 125000, 30, 'Pcs', 'gambar/c_g.jpg', 'Untukmembuat wajah glowing alami', 'Y'),
(6, 'Paket Moreskin Pink', 1, 650000, 10, 'Pcs', 'gambar/moreskin.jpg', 'Satu paket lengkap kecantikan', 'Y'),
(7, 'Looke Matte', 1, 150000, 20, 'Pcs', 'gambar/looke_matte.jpg', 'Bahan ringan dibibir & awet', 'Y'),
(8, 'Lacoco Orange', 1, 255000, 17, 'Pcs', 'gambar/lacoco_orange.png', 'Terbuat dari orange asli', 'Y'),
(9, 'Lacoco WtrM Glow', 1, 250000, 20, 'Pcs', 'gambar/1.jpg', 'Terbuat dari Watermelon asli', 'Y'),
(10, 'Angga', 1, 100000000, 1, 'Org', 'gambar/DSC_01033.JPG', 'Orang Tampan Aset Negara', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `IdComment` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`IdComment`, `IdUser`, `Comment`, `Tanggal`) VALUES
(1, 2, 'MANTAP GAN', '2019-09-21'),
(2, 2, 'manqtap gan sdasd asd asd ad asd as d a Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-09-02'),
(3, 2, 'Tanggal', '2019-09-21'),
(4, 2, 'Tanggal', '2019-09-21'),
(5, 2, 'Mantap\r\n', '2019-09-22'),
(9, 2, '&lt;div style=&quot;position: absolute; top: 0; right: 0; left: 0; bottom: 0; background-color: black;&quot;&gt;heheheheheh&lt;/div&gt;', '2019-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `IdKeranjang` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`IdKeranjang`, `IdUser`, `br_id`, `Qty`) VALUES
(22, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kp_pem` varchar(6) NOT NULL,
  `kota_pem` varchar(30) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `norek_pem` varchar(20) NOT NULL,
  `bank_pem` varchar(25) NOT NULL,
  `Bukti_Transfer` varchar(50) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `br_id` int(6) NOT NULL,
  `Qty` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `StsPembelian` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `tanggal`, `nama_penerima`, `alamat`, `kp_pem`, `kota_pem`, `telepon`, `norek_pem`, `bank_pem`, `Bukti_Transfer`, `IdUser`, `br_id`, `Qty`, `provinsi`, `StsPembelian`) VALUES
(1, '2019-09-25', 'angga', 'banjarjo', '567892', 'klaten', '08580990220', '324234324', 'bra', 'dd6.png', 2, 1, 2, 'jawa tengah', 3),
(2, '2019-09-25', 'angga', 'banjarjo', '567892', 'klaten', '08580990220', '324234324', 'bra', 'dd6.png', 2, 2, 3, 'jawa tengah', 3),
(4, '2019-09-27', 'Angga', 'wqewewe', '123321', 'wefdwefewfewf', '123213213', '21312323', 'wer', 'dd2.png', 1, 2, 2, 'Yogyakarta', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Pasword` varchar(75) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `UserName`, `Pasword`, `Email`, `Status`) VALUES
(1, 'Angga', '$2y$10$GB1fiQvIP3KOWRU2iSkDi.TrGofZmhkDeasKs/3GbrRClKkKLVaYa', 'muhamadadzana20@gmail.com', 'Admin'),
(2, 'Lusiyana', '$2y$10$mbvKgRY9.sP/rOSPGRpGc.jZwMuq/AbL6DNRA79ra7orPsi1C7yp.', 'Lusiyana@gmail.com', 'User');

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdComment`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`IdKeranjang`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

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
  MODIFY `br_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `IdKeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_kustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
