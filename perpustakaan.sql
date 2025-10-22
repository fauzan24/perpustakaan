-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 04:34 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `npm`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
(17, 5, 12313, 'Dayat', 'Batam', '2024-10-08', 'Laki-Laki', 'DKV'),
(19, 1, 2342, 'jakyyyy', 'padang', '2024-10-08', 'Laki-Laki', 'Bisnis'),
(20, 6, 231, 'Jamal', 'Nongsa', '2024-10-08', 'Perempuan', 'TKJ'),
(24, 7, 1231, 'agung', 'qeq', '2024-10-08', 'Laki-Laki', 'RPL'),
(27, 1, 1234, 'ucok', 'sadas', '2024-10-13', 'Laki-Laki', 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `isbn`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `deskripsi`, `lokasi`, `cover`) VALUES
(25, 'FUFUFAFA', '3452', 'sada', 'dimas p', 3432, 38, 'kampung', 'rak2', 'buku11.jpg'),
(26, 'fufufafa', '1221', 'djfisdj', 'asfnaj', 2112, 12, 'ashfja', 'rak3', 'buku12 1.jpg'),
(27, 'fasdf', '3412', 'sdf', 'afs', 12424, 10, 'fs', 'rak2', 'buku3.jpg'),
(28, 'kuning', '2323', 'sf', 'wa', 4221, 1219, 'dshsd', 'rak2', 'buku8.jpg'),
(29, 'joker', '1231', 'dimas', 'gramedia', 2021, 4, 'keren', 'rak2', 'buku6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket`) VALUES
(18, 'T001', 19, 29, '2024-10-13', '2024-10-20', 'kembali', 'kembali'),
(19, 'T002', 27, 25, '2024-10-14', '2024-10-21', 'kembali', 'kembali'),
(23, 'T003', 20, 28, '2024-10-14', '2024-10-21', 'kembali', 'kembali'),
(30, 'T004', 17, 25, '2024-10-14', '2024-10-21', 'kembali', 'kembali'),
(31, 'T005', 24, 29, '2024-10-14', '2024-10-21', 'kembali', 'kembali'),
(32, 'T006', 24, 29, '2024-10-14', '2024-10-21', 'kembali', 'kembali'),
(33, 'ucok', 27, 29, '2024-10-14', '2024-10-21', 'kembali', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `email`, `password`, `gambar`, `level`) VALUES
(1, 'ucok', 'ucok', 'ucok@gmail.com', '123', '', 'user'),
(5, 'Muhammad Safamal Jovanda', 'mamal', 'safamal@gmail.com', 'qwert234', '', 'admin'),
(6, 'sapa kek', 'sadas', 'zaid@gmail.com', '213', 'images (1).jpg', 'admin'),
(7, 'dasa', 'fauzan', 'zaid@gmail.com', '213', 'download (4).jpg', 'admin'),
(8, 'Juan', 'juan', 'zaid@gmail.com', '123', 'download (5).jpg', 'admin'),
(9, 'sofaaaa', 'agung', 'garit25@gmail.com', 'qwert234', 'download (4).jpg', 'admin'),
(10, 'dimas pratama', 'admin', 'jamal@gmail.com', '123', 'images.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `anggota_id` (`id_anggota`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
