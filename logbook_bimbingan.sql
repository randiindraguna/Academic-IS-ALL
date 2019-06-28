-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2019 pada 01.44
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_skripsi_prpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook_bimbingan`
--

CREATE TABLE `logbook_bimbingan` (
  `id_logbook` int(10) NOT NULL,
  `materi_bimbingan` varchar(50) NOT NULL,
  `id_skripsi` varchar(15) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `jam` time NOT NULL,
  `jenis` enum('metopen','skripsi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logbook_bimbingan`
--

INSERT INTO `logbook_bimbingan` (`id_logbook`, `materi_bimbingan`, `id_skripsi`, `tanggal_bimbingan`, `jam`, `jenis`) VALUES
(1, 'monitoring evaluasi sebelum pelaksanaan semprop', '1700018066', '2019-05-10', '20:08:00', 'metopen'),
(2, 'none', '1700018066', '2019-05-01', '16:44:00', 'metopen'),
(3, 'bimbingan awal pengenalan masalah', '1700018164', '2019-05-10', '20:08:00', 'metopen'),
(4, 'perbaikan materi bab 2', '1700018066', '2019-05-23', '15:00:00', 'metopen'),
(5, 'bimbingan bagian kata pengantar', '1700018164', '2019-05-24', '05:06:25', 'metopen'),
(6, 'perbaikan kata yang kurang tepat pada latar belaka', '1700018164', '2019-05-24', '05:07:45', 'metopen'),
(7, 'perbaikan database yang kurang tepat dengan desain', '1700018164', '2019-05-24', '05:22:42', 'metopen'),
(8, 'perbaikan program pada fitur search', '1700018164', '2019-05-24', '05:53:22', 'metopen'),
(9, 'penambahan fitur sorting ', '1700018164', '2019-05-24', '05:54:52', 'metopen'),
(10, 'penambahan beberapa materi ', '1700018164', '2019-05-25', '08:02:51', 'metopen'),
(11, 'pengarahan format laporan skripsi', '1700018164', '2019-05-25', '08:15:13', 'skripsi'),
(12, 'konsultasi masalah lapangan', '1700018164', '2019-05-26', '07:45:39', 'skripsi'),
(13, 'bimbingan awal kuliah', '1700018158', '2019-05-26', '07:47:58', 'metopen'),
(14, 'konsultasi perbaikan materi dalam menyusun laporan', '1700018158', '2019-05-26', '07:49:01', 'metopen'),
(15, 'perbaikan bagian frontend', '1700018164', '2019-05-28', '02:12:43', 'skripsi'),
(16, 'bimbinga bab 2', '1700018164', '2019-05-28', '02:13:22', 'skripsi'),
(17, 'konsultasi perbaikan masalah lapangan', '1700018158', '2019-05-28', '09:07:56', 'metopen'),
(18, 'konsultasi evaluasi proyek metopen', '1700018158', '2019-05-28', '09:08:27', 'metopen'),
(19, 'membuat perencanaan dalam penyusunan laporan berik', '1700018158', '2019-05-28', '09:08:43', 'metopen'),
(20, 'evaluasi hasil laporan', '1700018158', '2019-05-28', '09:08:58', 'metopen'),
(21, 'menambah referensi', '1700018165', '2019-05-29', '11:41:54', 'metopen'),
(22, 'bimbingan bab 5', '1700018164', '2019-06-23', '07:57:51', 'skripsi'),
(23, 'evaluasi bab 5', '1700018164', '2019-06-23', '08:01:28', 'skripsi'),
(24, 'bimbingan bab 6', '1700018164', '2019-06-23', '08:02:07', 'skripsi'),
(25, 'bimbingan bab 6', '1700018164', '2019-06-23', '08:04:23', 'skripsi'),
(26, 'bimbingan bab 6', '1700018164', '2019-06-23', '08:04:28', 'skripsi'),
(27, 'bimbingan bab 6', '1700018164', '2019-06-23', '08:05:51', 'skripsi'),
(28, 'evaluasi bab 6', '1700018164', '2019-06-23', '08:06:16', 'skripsi'),
(29, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:07:53', 'skripsi'),
(30, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:08:19', 'skripsi'),
(31, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:13:12', 'skripsi'),
(32, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:13:14', 'skripsi'),
(33, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:13:15', 'skripsi'),
(34, 'bimbingan bab 7\r\n', '1700018164', '2019-06-23', '08:15:54', 'skripsi'),
(35, 'bimbingan bab 9', '1700018164', '2019-06-23', '08:39:17', 'skripsi'),
(36, 'bimbingan bab 10', '1700018164', '2019-06-23', '08:39:53', 'skripsi'),
(37, 'evaluasi bab 10', '1700018164', '2019-06-23', '08:40:36', 'skripsi'),
(38, 'evaluasi bab 9\r\n', '1700018164', '2019-06-23', '08:43:26', 'skripsi'),
(39, 'bimbingan awal metopen', '1700018105', '2019-06-24', '04:37:57', 'metopen'),
(40, 'bimbingan awal metopen', '1700018105', '2019-06-24', '04:38:27', 'metopen'),
(41, 'bimbingan awal skripsi', '1700018105', '2019-06-24', '04:39:05', 'skripsi'),
(42, 'bimbingan laporan metopen pertama ', '1700018165', '2019-06-25', '07:11:36', 'metopen'),
(43, 'pembahasan masalah kosakata', '1700018165', '2019-06-25', '07:11:55', 'metopen'),
(44, 'bimbingan bab 1\r\n', '1700018165', '2019-06-25', '07:12:07', 'metopen'),
(45, 'bimbingan bab 9', '1700018164', '2019-06-29', '01:36:12', 'skripsi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_skripsi` (`id_skripsi`),
  ADD KEY `id_skripsi_2` (`id_skripsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  MODIFY `id_logbook` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD CONSTRAINT `logbook_bimbingan_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `mahasiswa_metopen` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
