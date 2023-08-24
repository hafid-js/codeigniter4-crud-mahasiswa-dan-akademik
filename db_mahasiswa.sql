-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Agu 2023 pada 00.42
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email_akademik` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `nip`, `nama`, `email_akademik`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '12300001', 'Nadia Rahayu', '12300001@gmail.com', '2023-08-23 20:06:30', '2023-08-23 21:53:47', NULL),
(15, '12300002', 'Aulia Lia', '12300002@gmail.com', '2023-08-25 05:05:15', '2023-08-25 05:05:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` bigint(1) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `id_mahasiswa`, `file`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(17, 18560033, 'KRS-18560033-25-08-2023 05:19:06.pdf', 'KRS Semester 1', 0, '2023-08-25 05:19:06', '2023-08-25 05:19:06'),
(18, 18560033, 'KRS-18560033-25-08-2023 05:20:23.pdf', 'KRS Semester 2', 0, '2023-08-25 05:20:23', '2023-08-25 05:20:23'),
(21, 18560012, 'KRS-18560012-25-08-2023 05:33:15.pdf', 'KRS Semester 1', 1, '2023-08-25 05:33:15', '2023-08-25 05:34:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `id_matakuliah` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_mahasiswa`, `id_matakuliah`, `created_at`, `updated_at`) VALUES
(32, 18560033, 31, NULL, NULL),
(33, 18560033, 30, NULL, NULL),
(34, 18560033, 32, NULL, NULL),
(38, 18560012, 30, NULL, NULL),
(39, 18560012, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email_mahasiswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `email_mahasiswa`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(330, '18560587', 'Estiawan Nasyidah', 'gandi66@gmail.com', 'Perempuan', 'Gg. Jend. A. Yani No. 193, Surakarta 20014, Jatim', '2023-08-23 19:54:06', NULL, NULL),
(331, '18560898', 'Jatmiko Tampubolon', 'ikin82@gmail.co.id', 'Perempuan', 'Ki. Gedebage Selatan No. 94, Tidore Kepulauan 91811, Gorontalo', '2023-08-23 19:54:06', NULL, NULL),
(332, '18560493', 'Clara Maulana', 'devi35@yahoo.com', 'Perempuan', 'Psr. Baranang Siang Indah No. 959, Banjarbaru 69324, NTB', '2023-08-23 19:54:06', NULL, NULL),
(333, '18560371', 'Ajimat Agustina', 'puspita.vicky@gmail.co.id', 'Perempuan', 'Gg. Wahidin No. 264, Padangpanjang 50226, Banten', '2023-08-23 19:54:06', NULL, NULL),
(334, '18560876', 'Keisha Padmasari', 'eli.mardhiyah@gmail.com', 'Laki-Laki', 'Gg. Yoga No. 347, Tangerang Selatan 97064, Bali', '2023-08-23 19:54:06', NULL, NULL),
(335, '18560584', 'Purwadi Mustofa', 'amalia46@yahoo.co.id', 'Laki-Laki', 'Jln. Kalimalang No. 49, Palembang 27715, Aceh', '2023-08-23 19:54:06', NULL, NULL),
(336, '18560120', 'Kasim Nashiruddin', 'dhabibi@gmail.co.id', 'Perempuan', 'Kpg. Bah Jaya No. 592, Kotamobagu 13409, Kalsel', '2023-08-23 19:54:06', NULL, NULL),
(337, '18560207', 'Kasusra Padmasari', 'cgunarto@gmail.co.id', 'Perempuan', 'Kpg. Kusmanto No. 404, Banjarmasin 73339, Lampung', '2023-08-23 19:54:06', NULL, NULL),
(338, '18560506', 'Clara Hariyah', 'mutia32@gmail.co.id', 'Laki-Laki', 'Kpg. Lada No. 769, Tomohon 82188, Jambi', '2023-08-23 19:54:06', NULL, NULL),
(339, '18560304', 'Almira Nasyidah', 'nasrullah40@yahoo.com', 'Laki-Laki', 'Psr. Bank Dagang Negara No. 750, Subulussalam 74331, DIY', '2023-08-23 19:54:06', NULL, NULL),
(340, '18560448', 'Dewi Nurdiyanti', 'lulut31@yahoo.co.id', 'Perempuan', 'Dk. Nangka No. 582, Palembang 49222, Kalbar', '2023-08-23 19:54:06', NULL, NULL),
(341, '18560466', 'Pia Lazuardi', 'daruna.rahmawati@gmail.co.id', 'Laki-Laki', 'Ki. Radio No. 536, Pasuruan 38619, Sulut', '2023-08-23 19:54:06', NULL, NULL),
(342, '18560480', 'Dalima Marpaung', 'hutapea.edi@gmail.com', 'Perempuan', 'Kpg. B.Agam Dlm No. 660, Bandar Lampung 92641, Papua', '2023-08-23 19:54:06', NULL, NULL),
(343, '18560713', 'Hafshah Winarsih', 'fsaptono@gmail.co.id', 'Perempuan', 'Kpg. Bhayangkara No. 998, Sukabumi 31126, Jambi', '2023-08-23 19:54:06', NULL, NULL),
(344, '18560206', 'Daliono Simbolon', 'wahyudin.nadine@gmail.com', 'Perempuan', 'Gg. Lumban Tobing No. 674, Payakumbuh 20711, Riau', '2023-08-23 19:54:06', NULL, NULL),
(345, '18560503', 'Jasmani Hasanah', 'vega31@yahoo.com', 'Laki-Laki', 'Dk. Raden No. 548, Dumai 40375, Bengkulu', '2023-08-23 19:54:06', NULL, NULL),
(346, '18560610', 'Prakosa Permata', 'muni.prastuti@gmail.com', 'Perempuan', 'Ki. Tambak No. 497, Banda Aceh 13255, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(347, '18560913', 'Utama Andriani', 'nova.sudiati@gmail.co.id', 'Laki-Laki', 'Psr. Ciwastra No. 843, Administrasi Jakarta Selatan 67694, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(348, '18560572', 'Naradi Susanti', 'wijayanti.halima@gmail.com', 'Perempuan', 'Ki. Thamrin No. 332, Denpasar 84085, Sulut', '2023-08-23 19:54:06', NULL, NULL),
(349, '18560605', 'Adinata Sitorus', 'wijayanti.michelle@gmail.com', 'Perempuan', 'Kpg. Pahlawan No. 810, Solok 94489, Kaltara', '2023-08-23 19:54:06', NULL, NULL),
(350, '18560519', 'Titi Prasasta', 'agnes.rahimah@gmail.com', 'Perempuan', 'Dk. Ahmad Dahlan No. 29, Sawahlunto 99977, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(351, '18560388', 'Maimunah Ardianto', 'manah80@yahoo.com', 'Perempuan', 'Dk. Katamso No. 448, Payakumbuh 64670, Maluku', '2023-08-23 19:54:06', NULL, NULL),
(352, '18560746', 'Pangestu Wacana', 'zsaragih@yahoo.co.id', 'Laki-Laki', 'Kpg. Babadan No. 338, Administrasi Jakarta Selatan 91148, NTT', '2023-08-23 19:54:06', NULL, NULL),
(353, '18560722', 'Balijan Hastuti', 'yessi.aryani@gmail.co.id', 'Laki-Laki', 'Ki. Ters. Pasir Koja No. 426, Pontianak 78903, Jateng', '2023-08-23 19:54:06', NULL, NULL),
(354, '18560172', 'Kawaca Saputra', 'sitorus.umi@yahoo.co.id', 'Laki-Laki', 'Gg. Urip Sumoharjo No. 477, Lhokseumawe 13082, Gorontalo', '2023-08-23 19:54:06', NULL, NULL),
(355, '18560345', 'Kezia Hassanah', 'cahyanto85@gmail.com', 'Perempuan', 'Kpg. Suryo Pranoto No. 901, Magelang 47645, Sulteng', '2023-08-23 19:54:06', NULL, NULL),
(356, '18560661', 'Latika Utami', 'rosman89@gmail.com', 'Perempuan', 'Ds. Basoka Raya No. 616, Pematangsiantar 81042, Kaltim', '2023-08-23 19:54:06', NULL, NULL),
(357, '18560150', 'Zahra Kusmawati', 'gawati59@yahoo.co.id', 'Laki-Laki', 'Psr. Kusmanto No. 13, Sukabumi 74028, Jatim', '2023-08-23 19:54:06', NULL, NULL),
(358, '18560426', 'Harjo Maheswara', 'qwaskita@gmail.com', 'Perempuan', 'Jr. Sampangan No. 134, Tasikmalaya 49762, NTB', '2023-08-23 19:54:06', NULL, NULL),
(359, '18560222', 'Daruna Puspita', 'balapati.saptono@gmail.co.id', 'Perempuan', 'Kpg. Bank Dagang Negara No. 296, Palopo 60284, Aceh', '2023-08-23 19:54:06', NULL, NULL),
(360, '18560792', 'Tedi Rahayu', 'ardianto.rahman@gmail.com', 'Laki-Laki', 'Psr. Bagis Utama No. 400, Pangkal Pinang 45396, Jabar', '2023-08-23 19:54:06', NULL, NULL),
(361, '18560681', 'Eva Pangestu', 'saefullah.niyaga@gmail.co.id', 'Perempuan', 'Kpg. Perintis Kemerdekaan No. 437, Kediri 96854, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(362, '18560601', 'Luluh Mulyani', 'fpermata@gmail.com', 'Laki-Laki', 'Ki. Batako No. 945, Kendari 79197, Pabar', '2023-08-23 19:54:06', NULL, NULL),
(363, '18560731', 'Lili Pradana', 'fujiati.halima@gmail.co.id', 'Laki-Laki', 'Psr. Dipatiukur No. 807, Makassar 29521, Bengkulu', '2023-08-23 19:54:06', NULL, NULL),
(364, '18560592', 'Gaduh Simbolon', 'lasmanto.uwais@yahoo.com', 'Laki-Laki', 'Psr. Orang No. 283, Banda Aceh 98434, DIY', '2023-08-23 19:54:06', NULL, NULL),
(365, '18560423', 'Syahrini Wijayanti', 'yuliana.halimah@yahoo.com', 'Perempuan', 'Ds. Abdul. Muis No. 823, Samarinda 59685, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(366, '18560847', 'Eli Napitupulu', 'anggabaya.manullang@yahoo.com', 'Perempuan', 'Ds. Sugiono No. 98, Padangsidempuan 95671, Maluku', '2023-08-23 19:54:06', NULL, NULL),
(367, '18560497', 'Ikin Fujiati', 'lramadan@yahoo.co.id', 'Laki-Laki', 'Dk. Yosodipuro No. 269, Tual 89851, NTT', '2023-08-23 19:54:06', NULL, NULL),
(368, '18560570', 'Aisyah Hutasoit', 'kemal.prasetyo@yahoo.co.id', 'Perempuan', 'Jr. Bass No. 696, Pekalongan 34903, Sumbar', '2023-08-23 19:54:06', NULL, NULL),
(369, '18560783', 'Almira Fujiati', 'wijayanti.damar@gmail.co.id', 'Perempuan', 'Ds. Pasteur No. 800, Sungai Penuh 27276, Kepri', '2023-08-23 19:54:06', NULL, NULL),
(370, '18560403', 'Eluh Waluyo', 'lailasari.carub@yahoo.com', 'Laki-Laki', 'Dk. Pelajar Pejuang 45 No. 44, Makassar 48815, Jambi', '2023-08-23 19:54:06', NULL, NULL),
(371, '18560608', 'Nurul Hariyah', 'pangestu09@gmail.co.id', 'Laki-Laki', 'Psr. Baladewa No. 78, Sibolga 60146, Kepri', '2023-08-23 19:54:06', NULL, NULL),
(372, '18560671', 'Darman Waluyo', 'wastuti.gamanto@gmail.com', 'Perempuan', 'Ds. Jagakarsa No. 825, Blitar 94345, Sultra', '2023-08-23 19:54:06', NULL, NULL),
(373, '18560033', 'Khafid', '18560033@gmail.com', 'Laki-Laki', '', '2023-08-23 20:06:55', '2023-08-23 20:06:55', NULL),
(378, '18560012', 'Fajar Fajrudin', '18560012@gmail.com', 'Laki-Laki', 'Cakung, Jakarta Timur', '2023-08-25 05:25:26', '2023-08-25 05:25:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` bigint(20) UNSIGNED NOT NULL,
  `kode_matakuliah` varchar(60) DEFAULT NULL,
  `nama_matakuliah` varchar(60) DEFAULT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kode_matakuliah`, `nama_matakuliah`, `sks`) VALUES
(30, 'KM184109', 'Bahasa Jawa', 2),
(31, 'KM184101', 'Matematika 2 ', 4),
(32, 'SF184101', 'Fisika 1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-08-22-043346', 'App\\Database\\Migrations\\CreateMatakuliah', 'default', 'App', 1692693494, 1),
(3, '2023-08-22-050931', 'App\\Database\\Migrations\\CreateMahasiswa', 'default', 'App', 1692693509, 2),
(5, '2023-08-22-083104', 'App\\Database\\Migrations\\CreateKrs', 'default', 'App', 1692780532, 3),
(7, '2023-08-23-103501', 'App\\Database\\Migrations\\CreateAkademik', 'default', 'App', 1692787181, 4),
(8, '2023-08-22-041930', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1692794709, 5),
(10, '2023-08-24-005913', 'App\\Database\\Migrations\\CreateFileUpload', 'default', 'App', 1692851037, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `level` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `password_user`, `level`) VALUES
(12300001, '12300001@gmail.com', '$2a$12$VFP585EGPo7O7mI0V1l6UOkmbeATyLG03uqgU9w3mRqnH0RaCCpOW', '1'),
(12300002, '12300002@gmail.com', '$2y$10$S1MQlYCtoUr95DZ0axRui.VO8mCCoocHTEtDQ1YarTItC0jVTHJ1W', '1'),
(18560012, '18560012@gmail.com', '$2y$10$VQkHievgcWm687PY5Ih4Nea.xk.3uG/WPFHZFGUId1w4n4Jj/9J0q', '2'),
(18560033, '18560033@gmail.com', '$2a$12$MQpiYFbz1V4p90/OqEKAmukZeB.XtY2bGWS245oHSHJtZbrRtZwN6', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
