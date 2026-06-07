-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2026 at 05:33 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stunting`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `nama_anak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia_bulan` int DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `user_id`, `nama_anak`, `tanggal_lahir`, `usia_bulan`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Avwwww', '2025-01-04', 16, 'L', '2026-05-11 16:01:29', '2026-05-13 07:02:27'),
(3, 6, 'Wangi', '2025-12-14', 5, 'P', '2026-05-12 09:27:15', '2026-05-12 09:27:15'),
(9, 12, 'Vario', '2025-06-27', 11, 'L', '2026-05-15 22:27:11', '2026-06-05 06:48:34'),
(17, 22, 'Zheika', '2026-02-05', 3, 'L', '2026-05-19 20:05:03', '2026-06-05 06:43:25'),
(18, 23, 'Misel', '2025-06-03', 12, 'P', '2026-06-02 08:07:24', '2026-06-02 08:30:06'),
(19, 24, 'Asoy', '2024-12-12', 18, 'L', '2026-06-05 07:58:12', '2026-06-05 07:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertumbuhan`
--

CREATE TABLE `data_pertumbuhan` (
  `id` bigint NOT NULL,
  `anak_id` bigint NOT NULL,
  `tanggal_pengukuran` date NOT NULL,
  `usia_bulan` int NOT NULL,
  `berat_badan` decimal(5,2) NOT NULL,
  `tinggi_badan` decimal(5,2) NOT NULL,
  `z_score` decimal(5,2) DEFAULT NULL,
  `status_gizi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_pertumbuhan`
--

INSERT INTO `data_pertumbuhan` (`id`, `anak_id`, `tanggal_pengukuran`, `usia_bulan`, `berat_badan`, `tinggi_badan`, `z_score`, `status_gizi`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-05-12', 16, 3.00, 56.00, -9.31, 'Stunting Berat', '2026-05-12 00:39:26', '2026-05-12 00:39:26'),
(2, 1, '2026-05-12', 16, 10.00, 80.00, -0.08, 'Normal', '2026-05-12 00:40:41', '2026-05-12 00:40:41'),
(3, 1, '2026-05-12', 16, 10.00, 99.90, 7.58, 'Tinggi', '2026-05-12 00:41:30', '2026-05-12 00:41:30'),
(4, 1, '2026-05-12', 16, 10.00, 149.90, 26.81, 'Tinggi', '2026-05-12 00:42:01', '2026-05-12 00:42:01'),
(5, 1, '2026-05-12', 16, 15.00, 128.90, 18.73, 'Tinggi', '2026-05-12 06:41:22', '2026-05-12 06:41:22'),
(6, 1, '2026-05-12', 16, 20.00, 129.90, 19.12, 'Tinggi', '2026-05-12 06:52:57', '2026-05-12 06:52:57'),
(7, 1, '2026-05-12', 16, 25.00, 131.90, 19.88, 'Tinggi', '2026-05-12 07:19:46', '2026-05-12 07:19:46'),
(8, 3, '2026-05-12', 5, 3.00, 98.00, 15.45, 'Tinggi', '2026-05-12 09:27:54', '2026-05-12 09:27:54'),
(13, 1, '2026-05-13', 16, 32.00, 159.90, 30.65, 'Tinggi', '2026-05-13 07:43:57', '2026-05-13 07:43:57'),
(15, 1, '2026-05-13', 16, 7.00, 150.00, -5.94, 'Gizi Buruk', '2026-05-13 08:17:16', '2026-05-13 08:17:16'),
(16, 3, '2026-05-13', 5, 15.00, 89.90, 1.78, 'Normal', '2026-05-13 08:31:31', '2026-05-13 08:31:31'),
(26, 1, '2026-05-16', 16, 23.00, 150.00, 26.85, 'Tinggi', '2026-05-16 00:22:30', '2026-05-16 00:22:30'),
(27, 1, '2026-05-16', 16, 23.00, 150.00, 26.85, 'Tinggi', '2026-05-16 00:22:30', '2026-05-16 00:22:30'),
(28, 9, '2026-05-16', 11, 12.00, 78.00, 1.46, 'Normal', '2026-05-16 00:24:30', '2026-05-16 00:24:30'),
(29, 17, '2025-11-01', 3, 11.00, 90.00, 13.62, 'Tinggi', '2026-05-19 20:06:27', '2026-06-05 06:57:57'),
(30, 17, '2025-12-02', 3, 11.00, 98.80, 17.81, 'Tinggi', '2026-05-19 20:07:59', '2026-06-05 06:58:05'),
(31, 17, '2026-01-03', 3, 12.00, 66.00, 2.19, 'Tinggi', '2026-06-02 08:00:44', '2026-06-05 06:58:16'),
(32, 17, '2026-02-06', 3, 12.00, 66.00, 2.19, 'Tinggi', '2026-06-02 08:01:16', '2026-06-05 06:58:40'),
(33, 18, '2026-06-02', 11, 17.00, 88.00, 6.08, 'Tinggi', '2026-06-02 08:51:14', '2026-06-02 08:51:14'),
(34, 17, '2026-03-04', 3, 21.00, 88.00, 12.67, 'Tinggi', '2026-06-02 09:25:31', '2026-06-05 06:58:49'),
(35, 17, '2026-04-03', 3, 12.00, 87.90, 12.62, 'Tinggi', '2026-06-02 09:26:30', '2026-06-05 06:58:58'),
(36, 17, '2026-05-09', 3, 12.00, 76.90, 7.38, 'Tinggi', '2026-06-02 09:27:10', '2026-06-05 06:59:07'),
(37, 17, '2026-06-03', 3, 1.00, 67.00, 2.67, 'Tinggi', '2026-06-02 09:36:34', '2026-06-05 06:59:14'),
(38, 18, '2026-06-02', 11, 12.00, 88.00, 6.08, 'Tinggi', '2026-06-02 09:51:17', '2026-06-02 09:51:17'),
(39, 18, '2026-06-02', 11, 14.00, 89.00, 6.48, 'Tinggi', '2026-06-02 09:52:05', '2026-06-02 09:52:05'),
(40, 1, '2026-06-03', 16, 23.00, 180.00, 38.38, 'Tinggi', '2026-06-02 19:18:41', '2026-06-02 19:18:41'),
(41, 17, '2026-06-05', 4, 11.00, 89.00, 11.95, 'Tinggi', '2026-06-05 06:53:38', '2026-06-05 06:53:38'),
(42, 17, '2026-06-05', 4, 16.00, 99.00, 16.71, 'Tinggi', '2026-06-05 07:07:27', '2026-06-05 07:07:27'),
(43, 17, '2026-06-05', 4, 17.00, 99.00, 16.71, 'Tinggi', '2026-06-05 07:10:46', '2026-06-05 07:10:46'),
(44, 17, '2026-06-05', 4, 21.00, 109.00, 21.48, 'Tinggi', '2026-06-05 07:11:38', '2026-06-05 07:11:38'),
(45, 17, '2026-06-05', 4, 13.00, 98.00, 16.24, 'Tinggi', '2026-06-05 07:12:57', '2026-06-05 07:12:57'),
(46, 17, '2026-06-05', 4, 14.00, 99.00, 16.71, 'Tinggi', '2026-06-05 07:30:04', '2026-06-05 07:30:04'),
(47, 17, '2026-06-05', 4, 16.00, 99.00, 16.71, 'Tinggi', '2026-06-05 09:07:49', '2026-06-05 09:07:49'),
(48, 17, '2026-06-05', 4, 16.00, 98.00, 16.24, 'Tinggi', '2026-06-05 09:11:11', '2026-06-05 09:11:11'),
(49, 17, '2026-06-05', 4, 19.00, 99.00, 16.71, 'Tinggi', '2026-06-05 09:13:47', '2026-06-05 09:13:47'),
(50, 17, '2026-06-05', 4, 22.00, 99.00, 16.71, 'Tinggi', '2026-06-05 09:14:57', '2026-06-05 09:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint NOT NULL,
  `anak_id` bigint NOT NULL,
  `pertumbuhan_id` bigint NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `hasil_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('avicenarga8793@gmail.com', '$2y$12$CpgcVNUUvBhvjzPtPEqlr.nRCKpYkks7g8Qhec.Z1SrDTMKXwPwHa', '2026-06-03 15:43:18'),
('widyanarga4@gmail.com', '$2y$12$7CxW9TSdljsJPkz48K.Q1.JaCeNshmL.sPGoIuvnSXVB/WmWQB0xa', '2026-06-05 06:48:52'),
('yantosleding22@gmail.com', '$2y$12$tU.vhPp1PIiXrHohUJsNZuHmDDjvRiNZrdFnYNMNZo6exsBebZ6fy', '2026-06-05 06:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_nutrisi`
--

CREATE TABLE `rekomendasi_nutrisi` (
  `id` bigint NOT NULL,
  `judul` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_usia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasi_nutrisi`
--

INSERT INTO `rekomendasi_nutrisi` (`id`, `judul`, `kategori_usia`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(24, 'Nutrisi Tepat untuk Ibu Menyusui agar ASI Berkualitas', '0-6 Bulan', 'Kualitas ASI sangat dipengaruhi oleh apa yang dikonsumsi oleh ibu. Selama masa menyusui 6 bulan pertama, ibu harus makan dengan porsi lebih banyak dari biasanya (tambah sekitar 400-500 kalori per hari). Pastikan piring ibu selalu mengandung protein hewani tinggi seperti telur, ikan gabus, ayam, atau daging, karena protein ini akan disalurkan melalui ASI untuk pertumbuhan sel bayi. Jangan lupa minum air putih minimal 3 liter sehari, mengonsumsi sayuran hijau (seperti daun katuk, bayam, kelor) yang dipercaya dapat melancarkan produksi ASI, serta istirahat yang cukup agar produksi hormon prolaktin tetap stabil.', 'rekomendasi/AgBjiIslAHTevyAUP0VKJlmFNe8yYEce5sh4ZEjM.jpg', '2026-06-02 10:20:09', '2026-06-02 10:20:09'),
(25, 'Pentingnya Pemantauan Bayi Secara Rutin', '0-6 Bulan', 'Meskipun bayi hanya mengonsumsi ASI eksklusif, pertumbuhan fisiknya harus dipantau secara ketat setiap bulan di Posyandu. Kenaikan berat badan bayi di trimester pertama (0-3 bulan) idealnya sangat pesat, yaitu minimal 750-900 gram per bulan. Jika grafik berat badan bayi mendatar atau tidak naik sesuai Garis Merah (KMS), ini adalah peringatan dini (red flag) risiko stunting. Jika ini terjadi, segera konsultasikan teknik pelekatan menyusui (latch on) ke konselor laktasi atau bidan desa agar ASI dapat dihisap bayi dengan maksimal.', 'rekomendasi/Y8ozHVtzXchLDU11UZJv6fvlsmS2VpiFQSrVt9EK.jpg', '2026-06-02 10:22:42', '2026-06-02 10:22:42'),
(26, 'Panduan Menaikkan Tekstur MPASI Secara Bertahap', '7-12 Bulan', 'Kemampuan mengunyah bayi harus dilatih agar struktur rahangnya berkembang sempurna. Mulailah MPASI di usia 6 bulan dengan tekstur lumat (saring halus). Saat bayi menginjak 8 bulan, naikkan teksturnya menjadi cincang halus (mashed). Di usia 9-10 bulan, bayi sudah bisa makan makanan cincang kasar atau makanan seukuran jari (finger food) yang bisa dipegang sendiri. Jangan menahan bayi di tekstur bubur halus terlalu lama, karena hal ini sering menjadi penyebab anak malas mengunyah, melepeh makanan, dan akhirnya mengalami gagal tumbuh atau stunting.', 'rekomendasi/9DAksJW6kvVoErXNgJtfWrFn6WJU8bAZUa82e6W1.jpg', '2026-06-02 10:25:45', '2026-06-02 10:25:45'),
(27, 'Berikan Protein Hewani', '7-12 Bulan', 'Anak di bawah 1 tahun sangat rentan mengalami anemia defisiensi besi yang merupakan salah satu akar masalah stunting. Hati ayam, hati sapi, dan telur (terutama telur puyuh) adalah bahan makanan lokal yang murah namun kandungan zat besi dan protein hewani-nya sangat tinggi, bahkan lebih baik dari daging mahal. Selalu sertakan minimal satu sumber protein hewani ke dalam setiap porsi makan utama bayi (3 kali sehari). Ingat, sayur dan buah hanya bersifat pengenalan pada usia ini, prioritas utama di piring bayi adalah karbohidrat dan protein hewani.', 'rekomendasi/0k4Do66xPdS2B2yGlWjASkJkXyNZJETErjkTap5t.jpg', '2026-06-02 10:29:19', '2026-06-02 10:29:19'),
(28, 'Sumber Kalsium dan Zat Besi Alami Ibu Menyusui', '0-6 Bulan', 'Selama menyusui, zat besi dan kalsium ibu akan diserap habis-habisan untuk memproduksi ASI. Ibu perlu mengonsumsi sayuran hijau gelap seperti daun katuk, bayam merah, dan kelor. Daun kelor sangat istimewa karena merupakan superfood lokal yang kandungan kalsiumnya 4 kali lipat dari susu sapi, serta zat besinya 3 kali lipat dari bayam biasa. Kombinasikan sayuran ini dengan sumber vitamin C (seperti perasan jeruk nipis pada kuah sayur) agar zat besi dari sayur dapat diserap tubuh dengan maksimal dan diteruskan ke ASI.', 'rekomendasi/EtQotHeI3dDep2CHLbZoVn2Ej8CuYvMh6HUAZJXk.jpg', '2026-06-02 10:38:11', '2026-06-02 10:38:11'),
(29, 'Takaran Porsi MPASI', '7-12 Bulan', 'Pastikan setiap mangkuk MPASI memiliki komponen yang lengkap. Gunakan rasio ini: 35-40% Karbohidrat (nasi putih, kentang, atau ubi jalar), 30% Protein Hewani (telur puyuh, ikan lele, belut, atau daging sapi), 10-15% Lemak (minyak, santan, atau mentega), dan hanya 10% Sayur/Buah. Perlu diingat, sayur dan buah yang terlalu banyak akan membuat perut bayi cepat penuh karena serat, sehingga ia tidak sanggup menghabiskan protein dan lemak yang justru merupakan kunci utama pencegah stunting.', 'rekomendasi/o1rgvlaTT9BmW209qLGJceHw3b1Dth5wZWTduySw.jpg', '2026-06-02 10:42:51', '2026-06-02 10:42:51'),
(30, 'Kalsium Tinggi dari Olahan Susu dan Teri', '1-3 Tahun', 'Masa batita adalah masa krusial pertumbuhan tinggi badan tulang rawan. Makanan harian harus kaya akan kalsium. Berikan susu segar (UHT/Pasteurisasi) secara teratur (maksimal 500ml sehari agar tidak mengganggu nafsu makan). Kenalkan keju sebagai pelengkap taburan di atas nasi hangat atau roti. Jika mencari opsi lokal yang sangat murah dan ampuh, ikan teri nasi kering (teri jengki) adalah jawabannya. Teri bisa dihaluskan menjadi bubuk kaldu dan ditaburkan ke atas makanan, memberikan asupan kalsium utuh langsung dari tulangnya.', 'rekomendasi/q7BrH1gpwrxTOx7mUoRw38fRNxh7adAO31fp0KgJ.jpg', '2026-06-02 10:45:38', '2026-06-02 10:45:38'),
(31, 'Strategi Makanan Padat Kalori untuk Batita', '1-3 Tahun', 'Lambung anak usia ini masih sebesar kepalan tangannya, sehingga mereka tidak bisa makan banyak sekaligus. Fokuslah pada makanan bervolume kecil tapi tinggi kalori (padat gizi). Buat perkedel kentang yang dicampur daging cincang dan digoreng dengan telur. Buat puding susu yang dicampur dengan alpukat lumat, atau sajikan alpukat yang dihancurkan dengan keju parut sebagai camilan sore. Hindari memberikan kaldu bening yang hanya berisi air, selalu gunakan kaldu tulang asli (bone broth) yang kaya kolagen dan sumsum untuk menanak nasinya.', 'rekomendasi/7GkFrPwWrYKXnKyEsK6C9X7kSVXArstR1Z264udY.jpg', '2026-06-02 10:48:03', '2026-06-02 10:48:03'),
(32, 'Kombinasi Lauk Ganda', '4-5 Tahun', 'Kebutuhan aktivitas fisik yang tinggi membutuhkan asupan otot yang kuat. Berikan strategi Double Protein (dua jenis protein hewani dalam satu piring). Misalnya: Nasi dengan Sup Bola Daging Sapi ditambah Telur Dadar Cincang, atau Nasi dengan Ikan Kembung Goreng ditambah Tumis Udang Rebon. Ikan kembung lokal sangat direkomendasikan karena kandungan Omega-3 (untuk kecerdasan otak) lebih tinggi dari ikan salmon harganya jauh lebih terjangkau.', 'rekomendasi/OuKYUV66viDYCKPVUlJm8hUWT2amWOvmqhs8mYDW.jpg', '2026-06-02 10:50:32', '2026-06-02 10:50:32'),
(33, 'Ganti Makanan Kemasan dengan Camilan Pangan Utuh', '4-5 Tahun', 'Gula berlebih dari biskuit, cokelat, atau permen kemasan akan menekan hormon pertumbuhan (HGH) anak. Ganti camilan harian dengan bahan pangan utuh (real food). Sajikan jagung manis rebus dengan olesan mentega, kacang hijau rebus yang dipipil dengan keju, pisang yang disiram yoghurt murni, atau ubi Cilembu panggang. Jika anak meminta makanan manis, buatkan smoothie dari mangga beku dan susu segar tanpa tambahan gula pasir sama sekali. Pangan utuh ini memastikan gula yang masuk diolah menjadi energi, bukan tumpukan lemak yang menghambat penyerapan gizi penting.', 'rekomendasi/uJxZlhcFvkmuRC3F53h1oiyLBsRWNnVRigNpC4bf.jpg', '2026-06-02 10:54:43', '2026-06-02 10:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9Ca6NgUUFyDcO0vML9Z9liXXwZ3cTbk53icE1nDn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUpLa1hiUVhjeWZZRGZzZWpuZk5scHRBZWJGWmFWcTI3OUZEbnB0VyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1780747856),
('Wcf4tL0hDAQzDadzV6t4AK56wMISIJxWdQrjVQcY', 22, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYklFVmt1T2d4dmYyc2dJUVJEUG1Ha0VmMFY0a3RXOE53bDc3YlM0SyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmFuZ3R1YS9yZWtvbWVuZGFzaS8wLTYlMjBCdWxhbiI7czo1OiJyb3V0ZSI7czoyNjoib3Jhbmd0dWEuZGV0YWlscmVrb21lbmRhc2kiO31zOjU1OiJsb2dpbl9vcmFuZ3R1YV81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIyO30=', 1780747919),
('zfRPp5QqybgjDS8nrQFPIVd9OVgmVtb1oterNCGI', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjRxM0hHWUFaRjN4SzJBZldYTHRPNEl1WjFENG1vZDZlazEzcVBCZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTU6ImxvZ2luX29yYW5ndHVhXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjI7fQ==', 1780746967);

-- --------------------------------------------------------

--
-- Table structure for table `standar_berat`
--

CREATE TABLE `standar_berat` (
  `id` bigint NOT NULL,
  `usia_bulan` int NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `median` decimal(5,2) NOT NULL,
  `sd_minus_1` decimal(5,2) NOT NULL,
  `sd_minus_2` decimal(5,2) NOT NULL,
  `sd_minus_3` decimal(5,2) NOT NULL,
  `sd_plus_1` decimal(5,2) NOT NULL,
  `sd_plus_2` decimal(5,2) NOT NULL,
  `sd_plus_3` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standar_berat`
--

INSERT INTO `standar_berat` (`id`, `usia_bulan`, `jenis_kelamin`, `median`, `sd_minus_1`, `sd_minus_2`, `sd_minus_3`, `sd_plus_1`, `sd_plus_2`, `sd_plus_3`, `created_at`, `updated_at`) VALUES
(1, 0, 'L', 3.30, 2.90, 2.50, 2.10, 3.90, 4.40, 5.00, NULL, NULL),
(2, 1, 'L', 4.50, 3.90, 3.40, 2.90, 5.10, 5.80, 6.60, NULL, NULL),
(3, 2, 'L', 5.60, 4.90, 4.30, 3.80, 6.30, 7.10, 8.00, NULL, NULL),
(4, 3, 'L', 6.40, 5.70, 5.00, 4.40, 7.20, 8.00, 9.00, NULL, NULL),
(5, 4, 'L', 7.00, 6.20, 5.60, 4.90, 7.80, 8.70, 9.70, NULL, NULL),
(6, 5, 'L', 7.50, 6.70, 6.00, 5.30, 8.40, 9.30, 10.40, NULL, NULL),
(7, 6, 'L', 7.90, 7.10, 6.40, 5.70, 8.80, 9.80, 10.90, NULL, NULL),
(8, 7, 'L', 8.30, 7.40, 6.70, 5.90, 9.20, 10.30, 11.40, NULL, NULL),
(9, 8, 'L', 8.60, 7.70, 6.90, 6.20, 9.60, 10.70, 11.90, NULL, NULL),
(10, 9, 'L', 8.90, 8.00, 7.10, 6.40, 9.90, 11.00, 12.30, NULL, NULL),
(11, 10, 'L', 9.20, 8.20, 7.40, 6.60, 10.20, 11.40, 12.70, NULL, NULL),
(12, 11, 'L', 9.40, 8.40, 7.60, 6.80, 10.50, 11.70, 13.00, NULL, NULL),
(13, 12, 'L', 9.60, 8.60, 7.70, 6.90, 10.80, 12.00, 13.30, NULL, NULL),
(14, 13, 'L', 9.90, 8.80, 7.90, 7.10, 11.00, 12.30, 13.70, NULL, NULL),
(15, 14, 'L', 10.10, 9.00, 8.10, 7.20, 11.30, 12.60, 14.00, NULL, NULL),
(16, 15, 'L', 10.30, 9.20, 8.30, 7.40, 11.50, 12.80, 14.30, NULL, NULL),
(17, 16, 'L', 10.50, 9.40, 8.40, 7.50, 11.70, 13.10, 14.60, NULL, NULL),
(18, 17, 'L', 10.70, 9.60, 8.60, 7.70, 12.00, 13.40, 14.90, NULL, NULL),
(19, 18, 'L', 10.90, 9.80, 8.80, 7.80, 12.20, 13.70, 15.30, NULL, NULL),
(20, 19, 'L', 11.10, 10.00, 8.90, 8.00, 12.50, 13.90, 15.60, NULL, NULL),
(21, 20, 'L', 11.30, 10.10, 9.10, 8.10, 12.70, 14.20, 15.90, NULL, NULL),
(22, 21, 'L', 11.50, 10.30, 9.20, 8.20, 12.90, 14.50, 16.20, NULL, NULL),
(23, 22, 'L', 11.80, 10.50, 9.40, 8.40, 13.20, 14.70, 16.50, NULL, NULL),
(24, 23, 'L', 12.00, 10.70, 9.50, 8.50, 13.40, 15.00, 16.80, NULL, NULL),
(25, 24, 'L', 12.20, 10.80, 9.70, 8.60, 13.60, 15.30, 17.10, NULL, NULL),
(26, 25, 'L', 12.40, 11.00, 9.80, 8.80, 13.90, 15.50, 17.50, NULL, NULL),
(27, 26, 'L', 12.50, 11.20, 10.00, 8.90, 14.10, 15.80, 17.80, NULL, NULL),
(28, 27, 'L', 12.70, 11.30, 10.10, 9.00, 14.30, 16.10, 18.10, NULL, NULL),
(29, 28, 'L', 12.90, 11.50, 10.20, 9.10, 14.50, 16.30, 18.40, NULL, NULL),
(30, 29, 'L', 13.10, 11.70, 10.40, 9.20, 14.80, 16.60, 18.70, NULL, NULL),
(31, 30, 'L', 13.30, 11.80, 10.50, 9.40, 15.00, 16.90, 19.00, NULL, NULL),
(32, 31, 'L', 13.50, 12.00, 10.70, 9.50, 15.20, 17.10, 19.30, NULL, NULL),
(33, 32, 'L', 13.70, 12.10, 10.80, 9.60, 15.40, 17.40, 19.60, NULL, NULL),
(34, 33, 'L', 13.80, 12.30, 10.90, 9.70, 15.60, 17.60, 19.90, NULL, NULL),
(35, 34, 'L', 14.00, 12.40, 11.00, 9.80, 15.80, 17.80, 20.20, NULL, NULL),
(36, 35, 'L', 14.20, 12.60, 11.20, 9.90, 16.00, 18.10, 20.40, NULL, NULL),
(37, 36, 'L', 14.30, 12.70, 11.30, 10.00, 16.20, 18.30, 20.70, NULL, NULL),
(38, 37, 'L', 14.50, 12.90, 11.40, 10.10, 16.40, 18.60, 21.00, NULL, NULL),
(39, 38, 'L', 14.70, 13.00, 11.50, 10.20, 16.60, 18.80, 21.30, NULL, NULL),
(40, 39, 'L', 14.80, 13.10, 11.60, 10.30, 16.80, 19.00, 21.60, NULL, NULL),
(41, 40, 'L', 15.00, 13.30, 11.80, 10.40, 17.00, 19.30, 21.90, NULL, NULL),
(42, 41, 'L', 15.20, 13.40, 11.90, 10.50, 17.20, 19.50, 22.10, NULL, NULL),
(43, 42, 'L', 15.30, 13.60, 12.00, 10.60, 17.40, 19.70, 22.40, NULL, NULL),
(44, 43, 'L', 15.50, 13.70, 12.10, 10.70, 17.60, 20.00, 22.70, NULL, NULL),
(45, 44, 'L', 15.70, 13.80, 12.20, 10.80, 17.80, 20.20, 23.00, NULL, NULL),
(46, 45, 'L', 15.80, 14.00, 12.40, 10.90, 18.00, 20.50, 23.30, NULL, NULL),
(47, 46, 'L', 16.00, 14.10, 12.50, 11.00, 18.20, 20.70, 23.60, NULL, NULL),
(48, 47, 'L', 16.20, 14.30, 12.60, 11.10, 18.40, 20.90, 23.90, NULL, NULL),
(49, 48, 'L', 16.30, 14.40, 12.70, 11.20, 18.60, 21.20, 24.20, NULL, NULL),
(50, 49, 'L', 16.50, 14.50, 12.80, 11.30, 18.80, 21.40, 24.50, NULL, NULL),
(51, 50, 'L', 16.70, 14.70, 12.90, 11.40, 19.00, 21.70, 24.80, NULL, NULL),
(52, 51, 'L', 16.80, 14.80, 13.10, 11.50, 19.20, 21.90, 25.10, NULL, NULL),
(53, 52, 'L', 17.00, 15.00, 13.20, 11.60, 19.40, 22.20, 25.40, NULL, NULL),
(54, 53, 'L', 17.20, 15.10, 13.30, 11.70, 19.60, 22.40, 25.70, NULL, NULL),
(55, 54, 'L', 17.30, 15.20, 13.40, 11.80, 19.80, 22.70, 26.00, NULL, NULL),
(56, 55, 'L', 17.50, 15.40, 13.50, 11.90, 20.00, 22.90, 26.30, NULL, NULL),
(57, 56, 'L', 17.70, 15.50, 13.60, 12.00, 20.20, 23.20, 26.60, NULL, NULL),
(58, 57, 'L', 17.80, 15.60, 13.70, 12.10, 20.40, 23.40, 26.90, NULL, NULL),
(59, 58, 'L', 18.00, 15.80, 13.80, 12.20, 20.60, 23.70, 27.20, NULL, NULL),
(60, 59, 'L', 18.20, 15.90, 14.00, 12.30, 20.80, 23.90, 27.60, NULL, NULL),
(61, 60, 'L', 18.30, 16.00, 14.10, 12.40, 21.00, 24.20, 27.90, NULL, NULL),
(62, 0, 'P', 3.20, 2.80, 2.40, 2.00, 3.70, 4.20, 4.80, NULL, NULL),
(63, 1, 'P', 4.20, 3.60, 3.20, 2.70, 4.80, 5.50, 6.20, NULL, NULL),
(64, 2, 'P', 5.10, 4.50, 3.90, 3.40, 5.80, 6.60, 7.50, NULL, NULL),
(65, 3, 'P', 5.80, 5.20, 4.50, 4.00, 6.60, 7.50, 8.50, NULL, NULL),
(66, 4, 'P', 6.40, 5.70, 5.00, 4.40, 7.30, 8.20, 9.30, NULL, NULL),
(67, 5, 'P', 6.90, 6.10, 5.40, 4.80, 7.80, 8.80, 10.00, NULL, NULL),
(68, 6, 'P', 7.30, 6.50, 5.70, 5.10, 8.20, 9.30, 10.60, NULL, NULL),
(69, 7, 'P', 7.60, 6.80, 6.00, 5.30, 8.60, 9.80, 11.10, NULL, NULL),
(70, 8, 'P', 7.90, 7.00, 6.30, 5.60, 9.00, 10.20, 11.60, NULL, NULL),
(71, 9, 'P', 8.20, 7.30, 6.50, 5.80, 9.30, 10.50, 12.00, NULL, NULL),
(72, 10, 'P', 8.50, 7.50, 6.70, 5.90, 9.60, 10.90, 12.40, NULL, NULL),
(73, 11, 'P', 8.70, 7.70, 6.90, 6.10, 9.90, 11.20, 12.80, NULL, NULL),
(74, 12, 'P', 8.90, 7.90, 7.00, 6.30, 10.10, 11.50, 13.10, NULL, NULL),
(75, 13, 'P', 9.20, 8.10, 7.20, 6.40, 10.40, 11.80, 13.50, NULL, NULL),
(76, 14, 'P', 9.40, 8.30, 7.40, 6.60, 10.60, 12.10, 13.80, NULL, NULL),
(77, 15, 'P', 9.60, 8.50, 7.60, 6.70, 10.90, 12.40, 14.10, NULL, NULL),
(78, 16, 'P', 9.80, 8.70, 7.70, 6.90, 11.10, 12.60, 14.50, NULL, NULL),
(79, 17, 'P', 10.00, 8.90, 7.90, 7.00, 11.40, 12.90, 14.80, NULL, NULL),
(80, 18, 'P', 10.20, 9.10, 8.10, 7.20, 11.60, 13.20, 15.10, NULL, NULL),
(81, 19, 'P', 10.40, 9.20, 8.20, 7.30, 11.80, 13.50, 15.40, NULL, NULL),
(82, 20, 'P', 10.60, 9.40, 8.40, 7.50, 12.10, 13.70, 15.70, NULL, NULL),
(83, 21, 'P', 10.90, 9.60, 8.60, 7.60, 12.30, 14.00, 16.00, NULL, NULL),
(84, 22, 'P', 11.10, 9.80, 8.70, 7.80, 12.50, 14.30, 16.40, NULL, NULL),
(85, 23, 'P', 11.30, 10.00, 8.90, 7.90, 12.80, 14.60, 16.70, NULL, NULL),
(86, 24, 'P', 11.50, 10.20, 9.00, 8.10, 13.00, 14.80, 17.00, NULL, NULL),
(87, 25, 'P', 11.70, 10.30, 9.20, 8.20, 13.30, 15.10, 17.30, NULL, NULL),
(88, 26, 'P', 11.90, 10.50, 9.40, 8.40, 13.50, 15.40, 17.70, NULL, NULL),
(89, 27, 'P', 12.10, 10.70, 9.50, 8.50, 13.70, 15.70, 18.00, NULL, NULL),
(90, 28, 'P', 12.30, 10.90, 9.70, 8.60, 14.00, 16.00, 18.30, NULL, NULL),
(91, 29, 'P', 12.50, 11.10, 9.80, 8.80, 14.20, 16.20, 18.70, NULL, NULL),
(92, 30, 'P', 12.70, 11.20, 10.00, 8.90, 14.40, 16.50, 19.00, NULL, NULL),
(93, 31, 'P', 12.90, 11.40, 10.10, 9.00, 14.70, 16.80, 19.30, NULL, NULL),
(94, 32, 'P', 13.10, 11.60, 10.30, 9.10, 14.90, 17.10, 19.60, NULL, NULL),
(95, 33, 'P', 13.30, 11.70, 10.40, 9.30, 15.10, 17.30, 20.00, NULL, NULL),
(96, 34, 'P', 13.50, 11.90, 10.50, 9.40, 15.40, 17.60, 20.30, NULL, NULL),
(97, 35, 'P', 13.70, 12.00, 10.70, 9.50, 15.60, 17.90, 20.60, NULL, NULL),
(98, 36, 'P', 13.90, 12.20, 10.80, 9.60, 15.80, 18.10, 20.90, NULL, NULL),
(99, 37, 'P', 14.00, 12.40, 10.90, 9.70, 16.00, 18.40, 21.30, NULL, NULL),
(100, 38, 'P', 14.20, 12.50, 11.10, 9.80, 16.30, 18.70, 21.60, NULL, NULL),
(101, 39, 'P', 14.40, 12.70, 11.20, 9.90, 16.50, 19.00, 22.00, NULL, NULL),
(102, 40, 'P', 14.60, 12.80, 11.30, 10.10, 16.70, 19.20, 22.30, NULL, NULL),
(103, 41, 'P', 14.80, 13.00, 11.50, 10.20, 16.90, 19.50, 22.70, NULL, NULL),
(104, 42, 'P', 15.00, 13.10, 11.60, 10.30, 17.20, 19.80, 23.00, NULL, NULL),
(105, 43, 'P', 15.20, 13.30, 11.70, 10.40, 17.40, 20.10, 23.40, NULL, NULL),
(106, 44, 'P', 15.30, 13.40, 11.80, 10.50, 17.60, 20.40, 23.70, NULL, NULL),
(107, 45, 'P', 15.50, 13.60, 12.00, 10.60, 17.80, 20.70, 24.10, NULL, NULL),
(108, 46, 'P', 15.70, 13.70, 12.10, 10.70, 18.10, 20.90, 24.50, NULL, NULL),
(109, 47, 'P', 15.90, 13.90, 12.20, 10.80, 18.30, 21.20, 24.80, NULL, NULL),
(110, 48, 'P', 16.10, 14.00, 12.30, 10.90, 18.50, 21.50, 25.20, NULL, NULL),
(111, 49, 'P', 16.30, 14.20, 12.40, 11.00, 18.80, 21.80, 25.50, NULL, NULL),
(112, 50, 'P', 16.40, 14.30, 12.60, 11.10, 19.00, 22.10, 25.90, NULL, NULL),
(113, 51, 'P', 16.60, 14.50, 12.70, 11.20, 19.20, 22.40, 26.30, NULL, NULL),
(114, 52, 'P', 16.80, 14.60, 12.80, 11.30, 19.40, 22.60, 26.60, NULL, NULL),
(115, 53, 'P', 17.00, 14.80, 12.90, 11.40, 19.70, 22.90, 27.00, NULL, NULL),
(116, 54, 'P', 17.20, 14.90, 13.00, 11.50, 19.90, 23.20, 27.40, NULL, NULL),
(117, 55, 'P', 17.30, 15.10, 13.20, 11.60, 20.10, 23.50, 27.70, NULL, NULL),
(118, 56, 'P', 17.50, 15.20, 13.30, 11.70, 20.30, 23.80, 28.10, NULL, NULL),
(119, 57, 'P', 17.70, 15.30, 13.40, 11.80, 20.60, 24.10, 28.50, NULL, NULL),
(120, 58, 'P', 17.90, 15.50, 13.50, 11.90, 20.80, 24.40, 28.80, NULL, NULL),
(121, 59, 'P', 18.00, 15.60, 13.60, 12.00, 21.00, 24.60, 29.20, NULL, NULL),
(122, 60, 'P', 18.20, 15.80, 13.70, 12.10, 21.20, 24.90, 29.50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `standar_tinggi`
--

CREATE TABLE `standar_tinggi` (
  `id` bigint NOT NULL,
  `usia_bulan` int NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `median` decimal(5,2) NOT NULL,
  `sd_minus_1` decimal(5,2) NOT NULL,
  `sd_minus_2` decimal(5,2) NOT NULL,
  `sd_minus_3` decimal(5,2) NOT NULL,
  `sd_plus_1` decimal(5,2) NOT NULL,
  `sd_plus_2` decimal(5,2) NOT NULL,
  `sd_plus_3` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standar_tinggi`
--

INSERT INTO `standar_tinggi` (`id`, `usia_bulan`, `jenis_kelamin`, `median`, `sd_minus_1`, `sd_minus_2`, `sd_minus_3`, `sd_plus_1`, `sd_plus_2`, `sd_plus_3`, `created_at`, `updated_at`) VALUES
(1, 0, 'L', 49.90, 48.00, 46.10, 44.20, 51.80, 53.70, 55.60, NULL, NULL),
(2, 1, 'L', 54.70, 52.80, 50.80, 48.90, 56.70, 58.60, 60.60, NULL, NULL),
(3, 2, 'L', 58.40, 56.40, 54.40, 52.40, 60.40, 62.40, 64.40, NULL, NULL),
(4, 3, 'L', 61.40, 59.40, 57.30, 55.30, 63.50, 65.50, 67.60, NULL, NULL),
(5, 4, 'L', 63.90, 61.80, 59.70, 57.60, 66.00, 68.00, 70.10, NULL, NULL),
(6, 5, 'L', 65.90, 63.80, 61.70, 59.60, 68.00, 70.10, 72.20, NULL, NULL),
(7, 6, 'L', 67.60, 65.50, 63.30, 61.20, 69.80, 71.90, 74.00, NULL, NULL),
(8, 7, 'L', 69.20, 67.00, 64.80, 62.70, 71.30, 73.50, 75.70, NULL, NULL),
(9, 8, 'L', 70.60, 68.40, 66.20, 64.00, 72.80, 75.00, 77.20, NULL, NULL),
(10, 9, 'L', 72.00, 69.70, 67.50, 65.20, 74.20, 76.50, 78.70, NULL, NULL),
(11, 10, 'L', 73.30, 71.00, 68.70, 66.40, 75.60, 77.90, 80.10, NULL, NULL),
(12, 11, 'L', 74.50, 72.20, 69.90, 67.60, 76.90, 79.20, 81.50, NULL, NULL),
(13, 12, 'L', 75.70, 73.40, 71.00, 68.60, 78.10, 80.50, 82.90, NULL, NULL),
(14, 13, 'L', 76.90, 74.50, 72.10, 69.60, 79.30, 81.80, 84.20, NULL, NULL),
(15, 14, 'L', 78.00, 75.60, 73.10, 70.60, 80.50, 83.00, 85.50, NULL, NULL),
(16, 15, 'L', 79.10, 76.60, 74.10, 71.60, 81.70, 84.20, 86.70, NULL, NULL),
(17, 16, 'L', 80.20, 77.60, 75.00, 72.50, 82.80, 85.40, 88.00, NULL, NULL),
(18, 17, 'L', 81.20, 78.60, 76.00, 73.30, 83.90, 86.50, 89.20, NULL, NULL),
(19, 18, 'L', 82.30, 79.60, 76.90, 74.20, 85.00, 87.70, 90.40, NULL, NULL),
(20, 19, 'L', 83.20, 80.50, 77.70, 75.00, 86.00, 88.80, 91.50, NULL, NULL),
(21, 20, 'L', 84.20, 81.40, 78.60, 75.80, 87.00, 89.80, 92.60, NULL, NULL),
(22, 21, 'L', 85.10, 82.30, 79.40, 76.50, 88.00, 90.90, 93.80, NULL, NULL),
(23, 22, 'L', 86.00, 83.10, 80.20, 77.20, 89.00, 91.90, 94.90, NULL, NULL),
(24, 23, 'L', 86.90, 83.90, 81.00, 78.00, 89.90, 92.90, 95.90, NULL, NULL),
(25, 24, 'L', 87.80, 84.80, 81.70, 78.70, 90.90, 93.90, 97.00, NULL, NULL),
(26, 25, 'L', 88.00, 84.90, 81.70, 78.60, 91.10, 94.20, 97.30, NULL, NULL),
(27, 26, 'L', 88.80, 85.60, 82.50, 79.30, 92.00, 95.20, 98.30, NULL, NULL),
(28, 27, 'L', 89.60, 86.40, 83.10, 79.90, 92.90, 96.10, 99.30, NULL, NULL),
(29, 28, 'L', 90.40, 87.10, 83.80, 80.50, 93.70, 97.00, 100.30, NULL, NULL),
(30, 29, 'L', 91.20, 87.80, 84.50, 81.10, 94.50, 97.90, 101.20, NULL, NULL),
(31, 30, 'L', 91.90, 88.50, 85.10, 81.70, 95.30, 98.70, 102.10, NULL, NULL),
(32, 31, 'L', 92.70, 89.20, 85.70, 82.30, 96.10, 99.60, 103.00, NULL, NULL),
(33, 32, 'L', 93.40, 89.90, 86.40, 82.80, 96.90, 100.40, 103.90, NULL, NULL),
(34, 33, 'L', 94.10, 90.50, 86.90, 83.40, 97.60, 101.20, 104.80, NULL, NULL),
(35, 34, 'L', 94.80, 91.10, 87.50, 83.90, 98.40, 102.00, 105.60, NULL, NULL),
(36, 35, 'L', 95.40, 91.80, 88.10, 84.40, 99.10, 102.70, 106.40, NULL, NULL),
(37, 36, 'L', 96.10, 92.40, 88.70, 85.00, 99.80, 103.50, 107.20, NULL, NULL),
(38, 37, 'L', 96.70, 93.00, 89.20, 85.50, 100.50, 104.20, 108.00, NULL, NULL),
(39, 38, 'L', 97.40, 93.60, 89.80, 86.00, 101.20, 105.00, 108.80, NULL, NULL),
(40, 39, 'L', 98.00, 94.20, 90.30, 86.50, 101.80, 105.70, 109.50, NULL, NULL),
(41, 40, 'L', 98.60, 94.70, 90.90, 87.00, 102.50, 106.40, 110.30, NULL, NULL),
(42, 41, 'L', 99.20, 95.30, 91.40, 87.50, 103.20, 107.10, 111.00, NULL, NULL),
(43, 42, 'L', 99.90, 95.90, 91.90, 88.00, 103.80, 107.80, 111.70, NULL, NULL),
(44, 43, 'L', 100.40, 96.40, 92.40, 88.40, 104.50, 108.50, 112.50, NULL, NULL),
(45, 44, 'L', 101.00, 97.00, 93.00, 88.90, 105.10, 109.10, 113.20, NULL, NULL),
(46, 45, 'L', 101.60, 97.50, 93.50, 89.40, 105.70, 109.80, 113.90, NULL, NULL),
(47, 46, 'L', 102.20, 98.10, 94.00, 89.80, 106.30, 110.40, 114.60, NULL, NULL),
(48, 47, 'L', 102.80, 98.60, 94.40, 90.30, 106.90, 111.10, 115.20, NULL, NULL),
(49, 48, 'L', 103.30, 99.10, 94.90, 90.70, 107.50, 111.70, 115.90, NULL, NULL),
(50, 49, 'L', 103.90, 99.70, 95.40, 91.20, 108.10, 112.40, 116.60, NULL, NULL),
(51, 50, 'L', 104.40, 100.20, 95.90, 91.60, 108.70, 113.00, 117.30, NULL, NULL),
(52, 51, 'L', 105.00, 100.70, 96.40, 92.10, 109.30, 113.60, 117.90, NULL, NULL),
(53, 52, 'L', 105.60, 101.20, 96.90, 92.50, 109.90, 114.20, 118.60, NULL, NULL),
(54, 53, 'L', 106.10, 101.70, 97.40, 93.00, 110.50, 114.90, 119.20, NULL, NULL),
(55, 54, 'L', 106.70, 102.30, 97.80, 93.40, 111.10, 115.50, 119.90, NULL, NULL),
(56, 55, 'L', 107.20, 102.80, 98.30, 93.90, 111.70, 116.10, 120.60, NULL, NULL),
(57, 56, 'L', 107.80, 103.30, 98.80, 94.30, 112.30, 116.70, 121.20, NULL, NULL),
(58, 57, 'L', 108.30, 103.80, 99.30, 94.70, 112.80, 117.40, 121.90, NULL, NULL),
(59, 58, 'L', 108.90, 104.30, 99.70, 95.20, 113.40, 118.00, 122.60, NULL, NULL),
(60, 59, 'L', 109.40, 104.80, 100.20, 95.60, 114.00, 118.60, 123.20, NULL, NULL),
(61, 60, 'L', 110.00, 105.30, 100.70, 96.10, 114.60, 119.20, 123.90, NULL, NULL),
(62, 0, 'P', 49.10, 47.30, 45.40, 43.60, 51.00, 52.90, 54.70, NULL, NULL),
(63, 1, 'P', 53.70, 51.70, 49.80, 47.80, 55.60, 57.60, 59.50, NULL, NULL),
(64, 2, 'P', 57.10, 55.00, 53.00, 51.00, 59.10, 61.10, 63.20, NULL, NULL),
(65, 3, 'P', 59.80, 57.70, 55.60, 53.50, 61.90, 64.00, 66.10, NULL, NULL),
(66, 4, 'P', 62.10, 59.90, 57.80, 55.60, 64.30, 66.40, 68.60, NULL, NULL),
(67, 5, 'P', 64.00, 61.80, 59.60, 57.40, 66.20, 68.50, 70.70, NULL, NULL),
(68, 6, 'P', 65.70, 63.50, 61.20, 58.90, 68.00, 70.30, 72.50, NULL, NULL),
(69, 7, 'P', 67.30, 65.00, 62.70, 60.30, 69.60, 71.90, 74.20, NULL, NULL),
(70, 8, 'P', 68.70, 66.40, 64.00, 61.70, 71.10, 73.50, 75.80, NULL, NULL),
(71, 9, 'P', 70.10, 67.70, 65.30, 62.90, 72.60, 75.00, 77.40, NULL, NULL),
(72, 10, 'P', 71.50, 69.00, 66.50, 64.10, 73.90, 76.40, 78.90, NULL, NULL),
(73, 11, 'P', 72.80, 70.30, 67.70, 65.20, 75.30, 77.80, 80.30, NULL, NULL),
(74, 12, 'P', 74.00, 71.40, 68.90, 66.30, 76.60, 79.20, 81.70, NULL, NULL),
(75, 13, 'P', 75.20, 72.60, 70.00, 67.30, 77.80, 80.50, 83.10, NULL, NULL),
(76, 14, 'P', 76.40, 73.70, 71.00, 68.30, 79.10, 81.70, 84.40, NULL, NULL),
(77, 15, 'P', 77.50, 74.80, 72.00, 69.30, 80.20, 83.00, 85.70, NULL, NULL),
(78, 16, 'P', 78.60, 75.80, 73.00, 70.20, 81.40, 84.20, 87.00, NULL, NULL),
(79, 17, 'P', 79.70, 76.80, 74.00, 71.10, 82.50, 85.40, 88.20, NULL, NULL),
(80, 18, 'P', 80.70, 77.80, 74.90, 72.00, 83.60, 86.50, 89.40, NULL, NULL),
(81, 19, 'P', 81.70, 78.80, 75.80, 72.80, 84.70, 87.60, 90.60, NULL, NULL),
(82, 20, 'P', 82.70, 79.70, 76.70, 73.70, 85.70, 88.70, 91.70, NULL, NULL),
(83, 21, 'P', 83.70, 80.60, 77.50, 74.50, 86.70, 89.80, 92.90, NULL, NULL),
(84, 22, 'P', 84.60, 81.50, 78.40, 75.20, 87.70, 90.80, 94.00, NULL, NULL),
(85, 23, 'P', 85.50, 82.30, 79.20, 76.00, 88.70, 91.90, 95.00, NULL, NULL),
(86, 24, 'P', 86.40, 83.20, 80.00, 76.70, 89.60, 92.90, 96.10, NULL, NULL),
(87, 25, 'P', 86.60, 83.30, 80.00, 76.80, 89.90, 93.10, 96.40, NULL, NULL),
(88, 26, 'P', 87.40, 84.10, 80.80, 77.50, 90.80, 94.10, 97.40, NULL, NULL),
(89, 27, 'P', 88.30, 84.90, 81.50, 78.10, 91.70, 95.00, 98.40, NULL, NULL),
(90, 28, 'P', 89.10, 85.70, 82.20, 78.80, 92.50, 96.00, 99.40, NULL, NULL),
(91, 29, 'P', 89.90, 86.40, 82.90, 79.50, 93.40, 96.90, 100.30, NULL, NULL),
(92, 30, 'P', 90.70, 87.10, 83.60, 80.10, 94.20, 97.70, 101.30, NULL, NULL),
(93, 31, 'P', 91.40, 87.90, 84.30, 80.70, 95.00, 98.60, 102.20, NULL, NULL),
(94, 32, 'P', 92.20, 88.60, 84.90, 81.30, 95.80, 99.40, 103.10, NULL, NULL),
(95, 33, 'P', 92.90, 89.30, 85.60, 81.90, 96.60, 100.30, 103.90, NULL, NULL),
(96, 34, 'P', 93.60, 89.90, 86.20, 82.50, 97.40, 101.10, 104.80, NULL, NULL),
(97, 35, 'P', 94.40, 90.60, 86.80, 83.10, 98.10, 101.90, 105.60, NULL, NULL),
(98, 36, 'P', 95.10, 91.20, 87.40, 83.60, 98.90, 102.70, 106.50, NULL, NULL),
(99, 37, 'P', 95.70, 91.90, 88.00, 84.20, 99.60, 103.40, 107.30, NULL, NULL),
(100, 38, 'P', 96.40, 92.50, 88.60, 84.70, 100.30, 104.20, 108.10, NULL, NULL),
(101, 39, 'P', 97.10, 93.10, 89.20, 85.30, 101.00, 105.00, 108.90, NULL, NULL),
(102, 40, 'P', 97.70, 93.80, 89.80, 85.80, 101.70, 105.70, 109.70, NULL, NULL),
(103, 41, 'P', 98.40, 94.40, 90.40, 86.30, 102.40, 106.40, 110.50, NULL, NULL),
(104, 42, 'P', 99.00, 95.00, 90.90, 86.80, 103.10, 107.20, 111.20, NULL, NULL),
(105, 43, 'P', 99.70, 95.60, 91.50, 87.40, 103.80, 107.90, 112.00, NULL, NULL),
(106, 44, 'P', 100.30, 96.20, 92.00, 87.90, 104.50, 108.60, 112.70, NULL, NULL),
(107, 45, 'P', 100.90, 96.70, 92.50, 88.40, 105.10, 109.30, 113.50, NULL, NULL),
(108, 46, 'P', 101.50, 97.30, 93.10, 88.90, 105.80, 110.00, 114.20, NULL, NULL),
(109, 47, 'P', 102.10, 97.90, 93.60, 89.30, 106.40, 110.70, 114.90, NULL, NULL),
(110, 48, 'P', 102.70, 98.40, 94.10, 89.80, 107.00, 111.30, 115.70, NULL, NULL),
(111, 49, 'P', 103.30, 99.00, 94.60, 90.30, 107.70, 112.00, 116.40, NULL, NULL),
(112, 50, 'P', 103.90, 99.50, 95.10, 90.70, 108.30, 112.70, 117.10, NULL, NULL),
(113, 51, 'P', 104.50, 100.10, 95.60, 91.20, 108.90, 113.30, 117.70, NULL, NULL),
(114, 52, 'P', 105.00, 100.60, 96.10, 91.70, 109.50, 114.00, 118.40, NULL, NULL),
(115, 53, 'P', 105.60, 101.10, 96.60, 92.10, 110.10, 114.60, 119.10, NULL, NULL),
(116, 54, 'P', 106.20, 101.60, 97.10, 92.60, 110.70, 115.20, 119.80, NULL, NULL),
(117, 55, 'P', 106.70, 102.20, 97.60, 93.00, 111.30, 115.90, 120.40, NULL, NULL),
(118, 56, 'P', 107.30, 102.70, 98.10, 93.40, 111.90, 116.50, 121.10, NULL, NULL),
(119, 57, 'P', 107.80, 103.20, 98.50, 93.90, 112.50, 117.10, 121.80, NULL, NULL),
(120, 58, 'P', 108.40, 103.70, 99.00, 94.30, 113.00, 117.70, 122.40, NULL, NULL),
(121, 59, 'P', 108.90, 104.20, 99.50, 94.70, 113.60, 118.30, 123.10, NULL, NULL),
(122, 60, 'P', 109.40, 104.70, 99.90, 95.20, 114.20, 118.90, 123.70, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','kader','orang_tua') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nomor_hp`, `alamat`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Avicena', 'avicenarga8793@gmail.com', '081288360400', 'Eromoko', '$2y$12$Gq3z1hLbyoN9e6ZjfrXX8eU.a0G/bgK77CpDt.672D7dV9WDfNfzG', 'G1XyhLON937OJoVcTax8LvhERd8m9DdxwpK8eQ0xr5Z6bz4Do3xf2BE8KbO7', 'orang_tua', '2026-05-11 16:01:29', '2026-06-03 15:33:35'),
(2, 'Admin', 'admin@gmail.com', '0812345678', 'Eromoko', '$2y$12$O.HbXjbup74ZmdIJuJsaC.u6yO.BC1wejhfHzRW9crCfj7Gnaufny', NULL, 'admin', '2026-05-11 16:06:09', '2026-05-17 22:31:42'),
(3, 'Kader', 'kader@gmail.com', '08987654321', 'eromoko', '$2y$12$KCVjxC0MjmKo8qubtD4a1.Fo1vYlWo4LX5G1Mppuw5rp.giDoNdby', NULL, 'kader', '2026-05-11 16:07:04', '2026-05-11 16:25:43'),
(6, 'Kembang', 'wangi@gmail.com', '088777666', 'Wonogiri', '$2y$12$.tjONOo0KqbbiMei5R9lhOF.YhelJZVAMelHNeIEflpIFKvKvPkIK', NULL, 'orang_tua', '2026-05-12 09:27:15', '2026-05-12 09:27:15'),
(12, 'Yamaha', 'widyanarga4@gmail.com', '08121212', 'Oslo', '$2y$12$K72w1IG4smEEcNRxKsgXmuAZjapitytsrK24nUN72pkHfO6zr4ySO', NULL, 'orang_tua', '2026-05-15 22:27:11', '2026-06-05 06:48:34'),
(20, 'Tirta', 'tirta@gmail.com', '08777777', 'Solo', '$2y$12$69rYkHIiynjQWef6tq7.FugRCq7oO7MUtC9Ita4QX8IqQ4qg0aobi', NULL, 'kader', '2026-05-17 21:42:03', '2026-05-17 21:42:03'),
(21, 'Rusdi', 'rusdi@gmail.com', '08696969', 'Ngawi', '$2y$12$8TDY90zbQyhRNs.VkowJ5u6WyPIhSbeEvobHvQ/m2xErpf73A/006', NULL, 'admin', '2026-05-17 21:44:08', '2026-05-17 21:44:08'),
(22, 'Alek', 'yantosleding22@gmail.com', '081081081081', 'Solo', '$2y$12$U0XQpvv0z.BDXW3L0ANj8.B9Xr6sLBLVBDB5kmHbtZ0V7gU/rS7ty', NULL, 'orang_tua', '2026-05-19 20:05:03', '2026-06-05 06:43:25'),
(23, 'Jess', 'jess@gmail.com', '081777888', 'Solo', '$2y$12$IbIyrMrKkoFEHP4FeTnzyuNqBDlwwXjvlsxIM8PlNzJHhID4S2ase', NULL, 'orang_tua', '2026-06-02 08:07:24', '2026-06-02 08:30:06'),
(24, 'Aloy', 'aloy@gmail.com', '0818283', 'Solo', '$2y$12$ACXT3cwTce/sezGYnYuohOwWBInJISrnKfyjntTzqybwmKS6uqHlG', NULL, 'orang_tua', '2026-06-05 07:58:12', '2026-06-05 07:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anak_user` (`user_id`);

--
-- Indexes for table `data_pertumbuhan`
--
ALTER TABLE `data_pertumbuhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pertumbuhan_anak` (`anak_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laporan_anak` (`anak_id`),
  ADD KEY `fk_laporan_pertumbuhan` (`pertumbuhan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rekomendasi_nutrisi`
--
ALTER TABLE `rekomendasi_nutrisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar_berat`
--
ALTER TABLE `standar_berat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar_tinggi`
--
ALTER TABLE `standar_tinggi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_pertumbuhan`
--
ALTER TABLE `data_pertumbuhan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekomendasi_nutrisi`
--
ALTER TABLE `rekomendasi_nutrisi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `standar_berat`
--
ALTER TABLE `standar_berat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `standar_tinggi`
--
ALTER TABLE `standar_tinggi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `fk_anak_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_pertumbuhan`
--
ALTER TABLE `data_pertumbuhan`
  ADD CONSTRAINT `fk_pertumbuhan_anak` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_anak` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_laporan_pertumbuhan` FOREIGN KEY (`pertumbuhan_id`) REFERENCES `data_pertumbuhan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
