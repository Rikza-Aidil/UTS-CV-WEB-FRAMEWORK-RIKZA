-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Nov 2025 pada 15.34
-- Versi server: 10.6.24-MariaDB
-- Versi PHP: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelasbmy_cv_rikza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) DEFAULT 'Available for Hire',
  `foto` varchar(255) DEFAULT NULL,
  `profil_singkat` text DEFAULT NULL,
  `deskripsi_lengkap` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`, `email`, `telepon`, `alamat`, `status`, `foto`, `profil_singkat`, `deskripsi_lengkap`, `created_at`, `updated_at`, `linkedin`, `github`, `instagram`) VALUES
(1, 'Rikza Aidil Rifqi', '2025-03-10', 'Sukabumi', 'rikzaaidil10@gmail.com', '+62 831 8751 1786', 'Sukabumi, Jawa Barat, Indonesia', 'Mahasiswa', 'rikzya.jpg', 'Seorang Mahasiswa Teknik Informatika', 'Saya adalah seorang mahasiswa yang sedang menempuh jenjang S1 Teknik Informatika. Saya memiliki minat yang besar dalam bidang teknologi dan pengembangan perangkat lunak. Selama studi saya, saya telah mempelajari berbagai konsep dasar dalam ilmu komputer, mulai dari pemrograman, jaringan komputer, hingga sistem operasi. Selain itu, saya juga aktif dalam berbagai proyek yang melibatkan pemrograman dan pengembangan aplikasi, baik secara individu maupun dalam kelompok.', '2025-11-12 01:51:43', '2025-11-12 22:05:29', 'https://www.linkedin.com/in/rikza-aidil-4458b9376/', 'https://github.com/Rikza-Aidil', 'https://www.instagram.com/rikzya_/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `nama_institusi` varchar(150) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `status` enum('Lulus','Sedang Berjalan','Tidak Selesai') DEFAULT 'Lulus',
  `ipk` decimal(3,2) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `jenjang`, `nama_institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `status`, `ipk`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'SMP', 'MTS YASPI CANTAYAN', NULL, '2016', '2019', 'Lulus', NULL, 0, '2025-11-11 22:56:21', '2025-11-12 22:10:05'),
(2, 'SMA', 'MA YASPI CANTAYAN', 'IPA', '2020', '2023', 'Lulus', NULL, 0, '2025-11-11 22:56:21', '2025-11-12 06:35:51'),
(3, 'S1', 'Unniversitas Muhammadiyah Sukabumi', 'Teknik Informatika', '2023', '2027', 'Lulus', 3.64, 0, '2025-11-11 22:56:21', '2025-11-12 22:11:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `tipe` enum('Pekerjaan','Magang','Organisasi','Proyek') NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(150) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `bulan_mulai` tinyint(4) NOT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `bulan_selesai` tinyint(4) DEFAULT NULL,
  `status` enum('Selesai','Sedang Berjalan') DEFAULT 'Selesai',
  `deskripsi` text DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `tipe`, `posisi`, `nama_perusahaan`, `lokasi`, `tahun_mulai`, `bulan_mulai`, `tahun_selesai`, `bulan_selesai`, `status`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Pekerjaan', 'Frontend Developer', 'Fujitsu', 'Tokyo, japan', '2022', 3, '2025', 3, 'Sedang Berjalan', 'Saya adalah Frontend Developer di Fujitsu Jepang, berfokus pada pengembangan antarmuka web modern untuk solusi enterprise dan sistem internal perusahaan. Saya bekerja dengan React dan TypeScript, mengimplementasikan desain yang responsif dan ramah pengguna sesuai standar UX global Fujitsu.', 0, '2025-11-12 01:33:44', '2025-11-13 00:29:56'),
(2, 'Magang', 'Data Analyst Intern', 'Google Asia Pacific', 'Singapore', '2017', 6, '2018', 1, 'Selesai', 'Saya menjalani magang sebagai Data Analyst Intern di Google Asia Pacific. Fokus utama saya adalah analisis big data menggunakan Python dan Google Cloud Platform untuk meningkatkan efisiensi iklan digital. Saya juga mengembangkan dashboard interaktif dengan Data Studio untuk tim pemasaran regional.', 1, '2025-11-13 00:25:00', '2025-11-13 00:25:00'),
(3, 'Magang', 'Machine Learning Engineer', 'Telkom University', 'Bandung, Indonesia', '2019', 2, '2020', 11, 'Selesai', 'Sebagai Machine Learning Engineer di proyek riset Telkom University, saya mengembangkan model deteksi emosi berbasis NLP menggunakan TensorFlow dan Bahasa Indonesia Dataset. Proyek ini berhasil dipublikasikan dalam konferensi internasional IEEE pada tahun 2032.', 2, '2025-11-13 00:25:00', '2025-11-13 00:25:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `nama_skill` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `nama_skill`, `kategori`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'React.js', 'Frontend Development', 'Menguasai pengembangan antarmuka web modern menggunakan React.js dengan pendekatan komponen fungsional dan state management melalui Redux atau Context API.', 0, '2025-11-13 00:30:00', '2025-11-13 00:30:00'),
(2, 'TypeScript', 'Frontend Development', 'Mampu mengembangkan aplikasi front-end yang kuat dan scalable menggunakan TypeScript, dengan pemanfaatan typing system untuk meningkatkan keamanan kode.', 1, '2025-11-13 00:30:00', '2025-11-13 00:30:00'),
(3, 'Google Cloud Platform (GCP)', 'Data Analytics', 'Berpengalaman menggunakan GCP untuk analisis big data, termasuk BigQuery, Data Studio, dan Cloud Functions.', 2, '2025-11-13 00:30:00', '2025-11-13 00:30:00'),
(4, 'Python', 'Data Science', 'Menguasai Python untuk analisis data, pembersihan dataset, serta membangun model machine learning menggunakan pustaka seperti Pandas, NumPy, dan scikit-learn.', 3, '2025-11-13 00:30:00', '2025-11-13 00:30:00'),
(5, 'TensorFlow', 'Machine Learning', 'Mampu merancang, melatih, dan mengoptimalkan model machine learning berbasis deep learning menggunakan TensorFlow.', 4, '2025-11-13 00:30:00', '2025-11-13 00:30:00'),
(6, 'Natural Language Processing (NLP)', 'Artificial Intelligence', 'Berpengalaman dalam membangun model deteksi emosi dan analisis teks berbahasa Indonesia menggunakan teknik NLP.', 5, '2025-11-13 00:30:00', '2025-11-13 00:30:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
