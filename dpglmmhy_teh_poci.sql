-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 03:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpglmmhy_teh_poci`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `lokasiID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`lokasiID`, `userID`, `nama_lokasi`, `alamat`) VALUES
(1, 1, 'Es Teh Poci UNIKOM', 'Jl Dipatiukur'),
(2, 3, 'Es Teh Poci Cipadung', 'Jl Vijaya Kusuma Indah Permata 05'),
(3, 4, 'Es Teh Poci Cigondewah', 'Jl Cigondewah Rahayu Emas 18');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `metodeID` int(11) NOT NULL,
  `lokasiID` int(11) NOT NULL,
  `nama_metode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`metodeID`, `lokasiID`, `nama_metode`) VALUES
(1, 1, 'OVO'),
(5, 1, 'LinkAja'),
(6, 1, 'M-Banking'),
(7, 1, 'DANA');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesananID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `produkID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','diterima','ditolak','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesananID`, `userID`, `produkID`, `qty`, `waktu`, `status`) VALUES
(1, 2, 1, 3, '2024-02-16 00:54:51', 'diterima'),
(2, 2, 1, 10, '2024-02-16 00:54:45', 'diterima'),
(3, 5, 8, 30, '2024-02-16 01:58:31', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produkID` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produkID`, `nama_produk`, `harga`, `stok`) VALUES
(1, 'Jasmine Poci Iced Tea', 4000, 89),
(4, 'Vanilla Iced Tea', 4000, 40),
(5, 'Lychee Iced Tea', 5000, 999),
(6, 'Blackcurrant Iced Tea', 5000, 100),
(7, 'Lemon Honey Iced Tea', 5000, 12),
(8, 'Apple Iced Tea', 5000, 77);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` enum('penjual','pembeli','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `nama`, `tipe`) VALUES
(1, 'dika01@gmail.com', 'dikadika', 'dika', 'penjual'),
(2, 'gabriel22@gmail.com', 'gabrielgabriel', 'gabriel', 'pembeli'),
(3, 'sidik@gmail.com', 'sidiksidik', 'sidik', 'penjual'),
(4, 'bayu00@gmail.com', 'bayubayu', 'bayu', 'penjual'),
(5, 'raveen@gmail.com', 'raveenraveen', 'raveen', 'pembeli'),
(6, 'salman@gmail.com', 'salmansalman', 'salman', 'pembeli'),
(7, 'rashad@gmail.com', 'rashadrashad', 'rashad', 'pembeli'),
(9, 'rival@gmail.com', 'rivalrival', 'rival', 'pembeli'),
(10, 'nanda@gmail.com', 'nandananda', 'nanda', 'pembeli'),
(11, '', '', '', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`lokasiID`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`metodeID`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesananID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produkID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `lokasiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `metodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesananID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
