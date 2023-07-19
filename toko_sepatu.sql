-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 06:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412018015`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_login`, `nama`, `no_telpon`) VALUES
(1, 2, 'reyn', '12120'),
(2, 7, 'rey', 'rey'),
(3, 8, 'reynaldo', '081240262336'),
(4, 9, 'reynaldo12', '081247751243');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image_path`) VALUES
(2, 'Before - After', 'Deep Clean Nike Jordan I', '64a95f7f22c1f6.70233084.jpeg'),
(4, 'Before - After', 'Deep Clean Treatment', '64a95ff9500201.30378934.jpeg'),
(5, 'Before - After', 'Deep Clean Treatment', '64a9603113af90.53778892.jpeg'),
(6, 'Before - After', 'Fast Clean Treatment', '64a9605c642184.72513674.jpeg'),
(7, 'Before - After', 'Deep Clean Treatment Converse All Starr ', '64a96081695937.97259240.jpeg'),
(8, 'Before - After', 'Fast Clean Nike Air Force x Louis Vuitton', '64a960fe0b9734.89842243.jpeg'),
(9, 'Before - After', 'Fast Clean', '64a9612c8c1056.89872557.jpeg'),
(10, 'Before - After', 'Deep Clean Treatment', '64a9617535b324.55324304.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sepatu`
--

CREATE TABLE `jenis_sepatu` (
  `id` int(11) NOT NULL,
  `jenis_sepatu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_sepatu`
--

INSERT INTO `jenis_sepatu` (`id`, `jenis_sepatu`) VALUES
(1, 'Canvas Material'),
(2, 'Suede Material'),
(3, 'Lea Material');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','pelanggan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(1, 'rey', '$2y$10$.yWmAPliK9q9uMsuieSmieJwuVGf6YfIqWaOeEzXCJeo.WY16jO1C', 'pelanggan'),
(2, 'admin', '$2y$10$qUSe/XW9RPhrpXYdCTUWPux3y8ZVxvWgKifH1kHKbXNOrw01Hwmwu', 'admin'),
(3, 'reyanakotta', '$2y$10$XFUfq.ZMOAx18eRPp667NO6D04nGB2Xut58ZkIlAQEDPQ4iz9DHaW', 'pelanggan'),
(4, 'rey03', '$2y$10$nFhiXnGVyDW6COO1gPMEo../ZrZmXLLG/LfqvVvE9Yu2dDWVA97D2', 'pelanggan'),
(5, 'dfcx', '$2y$10$PH5PTyPwD67D.a9ssFBxmuu4/oAmtvCG1nvUO4v2/q4lwbZAjnGiO', 'pelanggan'),
(6, 'allbert', '$2y$10$DkOF8k80E5Fc9GvOO3O/m./l5kX1a9/GqI5a42yl1CTC9JWCRDcmC', 'pelanggan'),
(7, 'rey', '$2y$10$vIHr4RcEGQQYpLLPujVyVO5o9D/ZV/ednnpOipUIuy5N4hFyjTBp6', 'admin'),
(8, 'rey1', '$2y$10$IDuRHUkexb2H.Y/ZXmoVkuM/YzscDX9Y5WOO6frg7pKsP.gM14Fkq', 'admin'),
(9, 'reynaldo12', '$2y$10$11eMfEf/Q4bLOX23FdWzOeSb7J36st2MEBoRdCT90HaMn10sJJCfG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(9000) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'Fast Cleaning ', 'Perawatan sepatu yang hanya dicuci pada bagian luar nya saja. Waktu pengerjaannya hanya 2-3 hari.\r\nUntuk bahan sepatu canvas, leather/suede material.', '40.000', 's3.jpeg'),
(2, 'Deep Clean', 'Perawatan sepatu yang hanya dicuci pada semua bagian sepatu. Waktu pengerjaannya hanya 3-4 hari.\r\nUntuk bahan sepatu canvas, leather/suede material.', '50.000', 's2.jpeg'),
(3, 'Unyellowing Treatment', 'Perawatan sepatu dengan cara menghilangkan noda kuning pada bagian midsole atau pinggir sepatu.\r\nUntuk semua jenis bahan sepatu.\r\n', '60.000', 's1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_login`, `nama`, `no_telpon`, `email`, `alamat`) VALUES
(1, 1, 'Reynaldo Anakotta', '081240262336', 'ReynaldoAnakotta@gmail.com', 'sdxz'),
(3, 3, 'Reynaldo Anakotta', '081247751243', 'reyanakotta03@gmail.com', 'Tanjung Duren'),
(4, 4, 'Reynaldo Anakotta', '081247751243', 'reyanakotta03@gmail.com', 'Tanjung Duren'),
(5, 5, 'dvx', '058500888888', 'dosen3@gmail.com', 'oiuhgbfc'),
(6, 6, 'allbert', '081256526262', 'marcelinovictor020@gmail.com', 'ghfd');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_jenis_sepatu` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pelanggan`, `id_jenis_sepatu`, `id_paket`, `jumlah`, `tanggal_pesan`) VALUES
(3, 4, 1, 1, 3, '2023-07-08'),
(4, 4, 1, 1, 10, '2023-07-08'),
(5, 4, 1, 1, 5, '2023-07-08'),
(6, 6, 1, 1, 3, '2023-07-08'),
(7, 6, 1, 1, 4, '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `review_pelanggan`
--

CREATE TABLE `review_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_pelanggan`
--

INSERT INTO `review_pelanggan` (`id`, `nama`, `review`, `foto`) VALUES
(1, 'wsz', 'csz', 'Attaca Album Cover.jpg'),
(2, 'dx', 'dcx', 'Screenshot (5).png'),
(3, 'dxz', 'dcx', 'Screenshot (6).png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `jumlah_pembayaran` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sepatu`
--
ALTER TABLE `jenis_sepatu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_jenis_sepatu` (`id_jenis_sepatu`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `review_pelanggan`
--
ALTER TABLE `review_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_sepatu`
--
ALTER TABLE `jenis_sepatu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review_pelanggan`
--
ALTER TABLE `review_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_jenis_sepatu`) REFERENCES `jenis_sepatu` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
