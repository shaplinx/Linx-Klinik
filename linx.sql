-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 06:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(6) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `nama`, `satuan`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES
(1, 'Kolesterol', 'mg/dl', 15000, '2020-04-07 08:32:20', '2020-04-12 03:05:59', 1),
(2, 'Asam Urat', 'mg/dl', 15000, '2020-04-07 01:43:20', '2020-04-07 01:43:20', 0),
(3, 'Gula Darah Sewaktu', 'mg/dl', 15000, '2020-04-07 01:43:47', '2020-04-07 01:51:29', 0),
(4, 'Gula Darah Puasa', 'mg/dl', 15000, '2020-04-12 03:06:27', '2020-04-12 03:06:27', 0),
(5, 'Gula Darah 2 Jam PP', 'mg/dl', 15000, '2020-04-26 05:09:37', '2020-04-26 21:05:34', 0),
(6, 'Hemoglobin', 'mg/dl', 15000, '2020-04-26 05:45:42', '2020-04-26 05:45:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `Judul` varchar(25) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `Judul`, `Deskripsi`) VALUES
(1, 'Daftar Pasien', 'Merupakan list pasien yang sudah terdaftar di klinik anda.'),
(2, 'Tambah Pasien', 'Isi biodata berikut untuk menambah pasien baru.'),
(3, 'Edit Pasien', 'Lakukan pengeditan pasien sesuai kolom yang tertera.'),
(4, 'Daftar Obat', 'Daftar obat-obatan yang terdaftar di klinik.'),
(5, 'Tambah Obat Baru', 'Tambahkan obat baru kedalam database dengan mengisi formulir berikut'),
(6, 'Edit Obat', 'lakukan perubahan informasi mengenai obat yang anda inginkan dengan menuliskannya di formulir berikut.'),
(7, 'Daftar Pemeriksaan Lab', 'Daftar pemeriksaan lab yang tersedia di klinik.'),
(8, 'Tambah Pemeriksaan Lab', 'Tabahkan fasilitas lab kedalam database dengan mengisi formulir berikut.'),
(9, 'Edit Lab', 'lakukan perubahan informasi mengenai obat yang anda inginkan dengan menuliskannya di formulir berikut.'),
(10, 'Lihat Rekam Medis', 'Lihat rekam medis yang tersdia pada pasien yang dipilih.'),
(11, 'Tambah Rekam Medis', 'Tambahkan rekam medis pada pasien yang dipilih.'),
(12, 'List Rekam Medis Pasien', 'Jejak rekam medis pasien di klinik anda.'),
(13, 'Edit Rekam Medis', 'Lakukan Pengeditan rekam medis.'),
(14, 'Buat Tagihan Kunjungan', 'Berikut adalah tagihan tehadap pasien yang diperiksa.'),
(15, 'Lihat rekam Medis', 'Lihat Rekam Medis Pasien Yang Dipilih'),
(16, 'Pengaturan', 'Pengaturan yang tersedia untuk klinik anda'),
(17, 'Dashboard', 'Halaman muka dari klinik anda, overview hal-hal mengenai klinik anda.'),
(18, 'Daftar Pengguna', 'Daftar pengguna atau pegawai yang dapat log-in di klinik anda.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(4) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `sediaan` varchar(50) NOT NULL,
  `dosis` int(12) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(9) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `sediaan`, `dosis`, `satuan`, `stok`, `harga`, `created_time`, `updated_time`, `deleted`) VALUES
(1, 'Metronidazole', 'Tablet', 500, 'mg', 4, 10000, '2020-04-26 19:00:17', '2020-04-26 19:00:17', 0),
(2, 'Amoxicillin', 'Tablet', 500, 'mg', 90, 10000, '2020-04-26 19:00:52', '2020-04-26 19:00:52', 0),
(3, 'Cefixime', 'Kapsul', 200, 'mg', 100, 40000, '2020-04-26 12:04:38', '2020-04-26 12:04:38', 0),
(4, 'Cefixime', 'Kapsul', 100, 'mg', 100, 30000, '2020-04-26 12:05:19', '2020-04-26 12:05:19', 1),
(5, 'Paracetamol', 'Tablet', 500, 'mg', 100, 10000, '2020-04-26 12:08:32', '2020-04-26 12:08:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(14) NOT NULL,
  `pendidikan` varchar(16) DEFAULT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_bpjs` int(15) DEFAULT NULL,
  `alergi` text DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tgl_lhr`, `jk`, `alamat`, `hp`, `pendidikan`, `pekerjaan`, `no_bpjs`, `alergi`, `created_time`, `updated_time`, `deleted`) VALUES
(1, 'Jajang Rukmana Sukarna', '2020-04-01', 'Perempuan', 'JAKARTA', '082191019181', 'SMP', 'Buruh', 9182717, 'tidak ada alergi', '0000-00-00 00:00:00', '2020-04-27 03:48:16', 0),
(2, 'Abdul Somara', '1991-01-01', 'Laki-laki', 'Garut indah sekali jaya tentrem abadi dan tak terlupakan', '0918212111', NULL, 'Pengangguran', 1092811221, 'alergi kamu', '0000-00-00 00:00:00', '2020-04-27 03:58:25', 0),
(6, 'Pinkan Rambo', '1991-02-01', 'perempuan', 'Hutan', '019281992', 'Tidak Ssekolah', 'Model', NULL, NULL, '2020-04-27 04:01:21', '2020-04-27 04:01:21', 0),
(7, 'Fia Jatuh', '1991-01-01', 'Laki-laki', 'Panggung', '01999212', 'Tidak Ssekolah', 'soundsystem', NULL, NULL, '2020-04-27 04:05:21', '2020-04-27 04:05:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(1) NOT NULL,
  `n_Klinik` varchar(50) NOT NULL,
  `Slogan` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gambarbool` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jasa` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `n_Klinik`, `Slogan`, `logo`, `gambarbool`, `gambar`, `jasa`) VALUES
(1, 'Linx Klinik', 'Melayani Sepenuh Hati', 'fa-plus', 0, 'logo1587958142.png', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

CREATE TABLE `rm` (
  `id` int(5) NOT NULL,
  `idpasien` int(4) NOT NULL,
  `ku` varchar(40) NOT NULL,
  `anamnesis` text NOT NULL,
  `pxfisik` text NOT NULL,
  `lab` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `diagnosis` varchar(40) DEFAULT NULL,
  `resep` text DEFAULT NULL,
  `jumlah` text DEFAULT NULL,
  `aturan` text DEFAULT NULL,
  `dokter` int(3) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rm`
--

INSERT INTO `rm` (`id`, `idpasien`, `ku`, `anamnesis`, `pxfisik`, `lab`, `hasil`, `diagnosis`, `resep`, `jumlah`, `aturan`, `dokter`, `created_time`, `updated_time`, `deleted`) VALUES
(1, 1, 'Pusing', 'Demam 10 hari', 'T:38.7', '3|1|2', '150|260|10', 'Febris', '1|2', '1|6', '3x1|3x1', 2, '2020-04-11 12:26:51', '2020-04-26 13:32:15', 0),
(3, 1, 'Pegal', 'Pegal Linu', 'Nyeri tekan di otot biceps', '', '', 'Myalgia', '1', '2', '2x1', 4, '2020-04-12 09:31:03', '2020-04-26 05:51:40', 0),
(5, 2, 'lemas', 'Sakit', 'Normal', '', '', 'Typhoid Fever', '2', '10', '2x1', 2, '2020-04-26 05:56:01', '2020-04-26 05:56:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profesi`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `admin`, `created_at`, `updated_at`, `deleted`) VALUES
(2, 'admin', 'Dokter', 'Reza Irfan Raditya', 'rezaraditya21@gmail.com', NULL, '$2y$10$lsIzdwxI18oSYwTJVMNDd.QqN3lsbI6M3B0VhJzl9BEasd8cSIbUK', 'avatar1587795209.jpg', NULL, 1, '2020-04-22 02:54:12', '2020-04-25 02:22:53', 0),
(4, 'dokter', 'Dokter', 'Irfan', 'reza@linx.com', NULL, '$2y$10$GWj0qd8EpKugu4ji56nN7.iOanxOVneq4w3Lq4i11iS2uS6pYGoqK', 'default.jpg', NULL, 0, '2020-04-22 21:43:07', '2020-04-24 22:43:18', 0),
(5, NULL, 'Staff', 'Alek Kelek', NULL, NULL, '$2y$10$NvOWdrlhoHpf31D/uXUt..hT6U5.m1RY6lhdcW/hIeZpkWj.oUdPu', 'default.jpg', NULL, 0, '2020-04-23 19:05:08', '2020-04-26 21:17:38', 1),
(6, NULL, 'Staff', 'test', NULL, NULL, '$2y$10$DcxoUIpnCtZluFcAZgDnvujKQM2X9lT0Ga4oTgks6zxFZJnryIG/K', 'avatar1587712752.jpg', NULL, 1, '2020-04-24 00:19:12', '2020-04-26 21:17:16', 1),
(9, 'staff', 'Staff', 'Raditya', 'staff@Raditya.com', NULL, '$2y$10$KLpJyGVF3n7p7rAKv17iL.wHauTIgm/HYLoReHAfX5FJR5MSZ5AQC', 'avatar1587961527.jpg', NULL, 0, '2020-04-24 22:40:12', '2020-04-26 21:33:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rm`
--
ALTER TABLE `rm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rm`
--
ALTER TABLE `rm`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
