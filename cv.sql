-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2025 at 05:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) DEFAULT 'Available for Hire',
  `foto` varchar(255) DEFAULT NULL,
  `profil_singkat` text,
  `deskripsi_lengkap` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`, `email`, `telepon`, `alamat`, `status`, `foto`, `profil_singkat`, `deskripsi_lengkap`, `created_at`, `updated_at`, `linkedin`, `github`, `instagram`) VALUES
(1, 'Rikza Aidil Rifqi', '2025-03-10', 'Sukabumi', 'rikzaaidil10@gmail.com', '+62 831 8751 1786', 'Sukabumi, Jawa Barat, Indonesia', 'Mahasiswa', 'rikzya.jpg', 'Seorang Mahasiswa Teknik Informatika', 'Saya adalah seorang mahasiswa yang sedang menempuh jenjang S1 Teknik Informatika. Saya memiliki minat yang besar dalam bidang teknologi dan pengembangan perangkat lunak. Selama studi saya, saya telah mempelajari berbagai konsep dasar dalam ilmu komputer, mulai dari pemrograman, jaringan komputer, hingga sistem operasi. Selain itu, saya juga aktif dalam berbagai proyek yang melibatkan pemrograman dan pengembangan aplikasi, baik secara individu maupun dalam kelompok.', '2025-11-12 08:51:43', '2025-11-13 05:05:29', 'https://www.linkedin.com/in/rikza-aidil-4458b9376/', 'https://github.com/Rikza-Aidil', 'https://www.instagram.com/rikzya_/');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `nama_institusi` varchar(150) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `status` enum('Lulus','Sedang Berjalan','Tidak Selesai') DEFAULT 'Lulus',
  `ipk` decimal(3,2) DEFAULT NULL,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `jenjang`, `nama_institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `status`, `ipk`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'SMP', 'MTS YASPI CANTAYAN', NULL, '2016', '2019', 'Lulus', NULL, 0, '2025-11-12 05:56:21', '2025-11-13 05:10:05'),
(2, 'SMA', 'MA YASPI CANTAYAN', 'IPA', '2020', '2023', 'Lulus', NULL, 0, '2025-11-12 05:56:21', '2025-11-12 13:35:51'),
(3, 'S1', 'Unniversitas Muhammadiyah Sukabumi', 'Teknik Informatika', '2023', '2027', 'Lulus', 3.64, 0, '2025-11-12 05:56:21', '2025-11-13 05:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int NOT NULL,
  `tipe` enum('Pekerjaan','Magang','Organisasi','Proyek') NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tahun_mulai` year NOT NULL,
  `bulan_mulai` tinyint NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `bulan_selesai` tinyint DEFAULT NULL,
  `status` enum('Selesai','Sedang Berjalan') DEFAULT 'Selesai',
  `deskripsi` text,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `tipe`, `posisi`, `nama_perusahaan`, `lokasi`, `tahun_mulai`, `bulan_mulai`, `tahun_selesai`, `bulan_selesai`, `status`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Pekerjaan', 'Frontend Developer', 'Fujitsu', 'Tokyo japan', '2027', 3, '2035', 3, 'Sedang Berjalan', 'Saya adalah Frontend Developer di Fujitsu Jepang, berfokus pada pengembangan antarmuka web modern untuk solusi enterprise dan sistem internal perusahaan. Saya bekerja dengan React dan TypeScript, mengimplementasikan desain yang responsif dan ramah pengguna sesuai standar UX global Fujitsu.', 0, '2025-11-12 08:33:44', '2025-11-13 04:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `nama_skill` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `nama_skill`, `kategori`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Web', 'Frontend', 'Kemampuan dalam membangun aplikasi web menggunakan HTML, CSS, dan JavaScript.', 1, '2025-11-12 12:43:03', '2025-11-12 12:43:03'),
(2, 'Pemrograman Web', 'Backend', 'Penguasaan teknologi server-side seperti PHP, Node.js, dan Python.', 2, '2025-11-12 12:43:03', '2025-11-12 12:43:03'),
(5, 'Pengembangan Aplikasi Mobile', 'Mobile Development', 'Kemampuan dalam pengembangan aplikasi untuk platform Android dan iOS menggunakan Kotlin dan Swift.', 5, '2025-11-12 12:43:03', '2025-11-12 12:43:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
