-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2026 at 04:01 AM
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
-- Database: `db_remidi_pbo_ti1c_ifatfebriansyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_reservasi`
--

CREATE TABLE `tabel_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `durasi_jam` int(11) NOT NULL,
  `tarif_dasar_per_jam` decimal(10,2) NOT NULL,
  `jenis_paket` enum('reguler','premium','event') NOT NULL,
  `tipe_background` varchar(50) DEFAULT NULL,
  `cetak_foto_lembar` int(11) DEFAULT NULL,
  `kuota_talent_orang` int(11) DEFAULT NULL,
  `layanan_makeup` tinyint(1) DEFAULT NULL,
  `nama_lokasi_luar` varchar(100) DEFAULT NULL,
  `biaya_transportasi_tim` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_reservasi`
--

INSERT INTO `tabel_reservasi` (`id_reservasi`, `nama_pelanggan`, `tanggal_booking`, `durasi_jam`, `tarif_dasar_per_jam`, `jenis_paket`, `tipe_background`, `cetak_foto_lembar`, `kuota_talent_orang`, `layanan_makeup`, `nama_lokasi_luar`, `biaya_transportasi_tim`) VALUES
(1, 'Budi Santoso', '2026-07-15', 2, 100000.00, 'reguler', 'Putih Polos', 5, NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '2026-07-16', 1, 100000.00, 'reguler', 'Biru Abstrak', 2, NULL, NULL, NULL, NULL),
(3, 'Andi Wijaya', '2026-07-17', 3, 100000.00, 'reguler', 'Hitam Elegan', 10, NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', '2026-07-18', 2, 100000.00, 'reguler', 'Bunga-bunga', 5, NULL, NULL, NULL, NULL),
(5, 'Rina Nose', '2026-07-19', 1, 100000.00, 'reguler', 'Putih Polos', 3, NULL, NULL, NULL, NULL),
(6, 'Eko Patrio', '2026-07-20', 2, 100000.00, 'reguler', 'Merah Merona', 5, NULL, NULL, NULL, NULL),
(7, 'Sule Prikitiew', '2026-07-21', 4, 100000.00, 'reguler', 'Kuning Cerah', 15, NULL, NULL, NULL, NULL),
(8, 'Ayu Ting Ting', '2026-08-01', 3, 250000.00, 'premium', 'Emas Mewah', 10, 5, 1, NULL, NULL),
(9, 'Raffi Ahmad', '2026-08-02', 4, 250000.00, 'premium', 'Klasik Eropa', 15, 6, 1, NULL, NULL),
(10, 'Nagita Slavina', '2026-08-03', 2, 250000.00, 'premium', 'Elegan Putih', 5, 2, 0, NULL, NULL),
(11, 'Luna Maya', '2026-08-04', 5, 250000.00, 'premium', 'Hitam Glamour', 20, 8, 1, NULL, NULL),
(12, 'Ariel Noah', '2026-08-05', 3, 250000.00, 'premium', 'Abstrak Modern', 10, 4, 0, NULL, NULL),
(13, 'Bunga Citra', '2026-08-06', 4, 250000.00, 'premium', 'Taman Bunga', 15, 5, 1, NULL, NULL),
(14, 'Afgan Syahreza', '2026-08-07', 2, 250000.00, 'premium', 'Retro Vintage', 5, 3, 1, NULL, NULL),
(15, 'PT Maju Jaya', '2026-09-01', 8, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Gedung Serbaguna Jakarta', 150000.00),
(16, 'CV Makmur Abadi', '2026-09-05', 10, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Hotel Indonesia Kempinski', 200000.00),
(17, 'Universitas Diponegoro', '2026-09-10', 12, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Auditorium Undip', 100000.00),
(18, 'Dinas Pendidikan', '2026-09-15', 6, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Kantor Gubernur Jateng', 50000.00),
(19, 'Keluarga Bpk Rahmat', '2026-09-20', 8, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Villa Puncak Bogor', 300000.00),
(20, 'Komunitas Fotografi', '2026-09-25', 12, 500000.00, 'event', NULL, NULL, NULL, NULL, 'Candi Borobudur', 400000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_reservasi`
--
ALTER TABLE `tabel_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_reservasi`
--
ALTER TABLE `tabel_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
