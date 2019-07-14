-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 12:31 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `niy` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bidang_keahlian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`niy`, `nama`, `email`, `bidang_keahlian`) VALUES
('0006027001', 'Eko Aribowo, S.T., M.Kom', 'ekoab@tif.uad.ac.id', 'Kriptografi, Keamanan Komputer'),
('0014107301', 'Ali Tarmuji, S.T., M. Cs', 'alitarmuji@tif.uad.ac.id', 'Software Engineering, Web Engineering'),
('0015118001', 'Fiftin Noviyanto, S.T., M. Cs', 'fiftin.noviyanto@tif.uad.ac.id', 'Web Programming, Multimedia'),
('0019087601', 'Nur Rochmah Dyah Pujiastuti, S.T, M.Kom.', 'rochmahdyah@tif.uad.ac.id', 'Keamanan Sistem, CRM'),
('060150841', 'Adhi Prahara, S.Si., M.Cs.', 'adhi.prahara@tif.uad.ac.id', 'Softcomputing and Multimedia'),
('060150842', 'Dewi Pramudi Ismi, S.T., M.CompSc', 'dewi.ismi@tif.uad.ac.id', 'Sistem Cerdas'),
('60010308', 'Sri Handayaningsih, S.T., M.T.', 'sriningsih@tif.uad.ac.id', 'Enterprise Systems, Sistem Informasi, IT/IS Governance'),
('60010314', 'Taufik Ismail, S.T., M. Cs', 'taufiq@tif.uad.ac.id', 'Komunikasi Data, Jaringan Komputer, Grafika & Multimedia, Mobile Computing'),
('60020388', 'Sri Winiarti, S.T., M. Cs', 'sri.winiarti@tif.uad.ac.id', 'Sistem cerdas'),
('60030475', 'Drs. Tedy Setiadi, M.T', 'tedy.setiadi@tif.uad.ac.id', 'Sistem Informasi, Basis Data, Teknik Kompilasi, Data Mining'),
('60030476', 'Ardiansyah, S.T., M. Cs', 'ardi@uad.ac.id / ardian2007@gmail.com', 'Mobile Web Application Development, Software Enterpreneurship, Personal Finance Computing'),
('60030479', 'Muhammad Aziz, S.T., M. Cs', 'moch.aziz@tif.uad.ac.id', 'Computer Organization and Architecture, Technopreneurship, Geographic Information System (GIS)'),
('60030480', 'Ir. Ardi Pujiyanta, M. T.', 'ardipujiyanta@tif.uad.ac.id', 'Sistem Cerdas, Pemrograman Komputasi'),
('60040496', 'Murinto, S.Si., M. Kom', 'murintokusno[at]tif.uad.ac.id', 'Grafika Komputer, Pengolahan Citra, Computer Vision, Sistem Cerdas'),
('60040497', 'Dewi Soyusiawaty, S.T., M.T', 'dewi.soyusiawati@tif.uad.ac.id / my_soyus@yahoo.com', 'Softcomputing dan Multimedia, Bahasa Alami'),
('60090586', 'Arfiani Nur Khusna, S.T., M.Kom.', 'arfiani.khusna@tif.uad.ac.id', 'Sistem Informasi'),
('60110647', 'Anna Hendri Soleliza Jones, S. Kom, M.Cs.', 'annahendri@tif.uad.ac.id', 'Sistem Cerdas'),
('60110648', 'Herman Yuliansyah, S.T., M. Eng', 'herman.yuliansyah@tif.uad.ac.id / herman.yuliansyah@gmail.com', 'Basis Data, Pemrograman Web, Jaringan Komputer'),
('60130757', 'Andri Pranolo, S.Kom., M. Cs', 'andripranolo@tif.uad.ac.id / apranolo@gmail.com', 'Multimedia, Sistem Cerdas'),
('60150773', 'Lisna Zahrotun S.T., M.Cs.', 'lisna.zahrotun@tif.uad.ac.id', 'Data Mining, Text Mining, Sistem Pendukung Keputusan'),
('60160863', 'Ahmad Azhari, S.Kom., M.Eng.', 'ahmad.azhari@tif.uad.ac.id', 'Sistem Cerdas'),
('60160951', 'Ika Arfiani, S.T., M.Cs.', 'ika.arfiani@tif.uad.ac.id', 'Rekayasa Perangkat Lunak dan Data'),
('60160952', 'Supriyanto, S.T., M.T.', 'supriyanto@tif.uad.ac.id', 'Media Digital dan Game'),
('60160960', 'Murein Miksa Mardhia, S.T., M.T.', 'murein.miksa@tif.uad.ac.id', 'Sistem Cerdas'),
('60160978', 'Dwi Normawati, S.T., M.Eng.', 'dwinormawati6516@gmail.com', 'Data Mining'),
('60160979', 'Jefree Fahana, ST., M.Kom.', 'jefree.fahana@tif.uad.ac.id', 'Sistem Informasi'),
('60160980', 'Nuril Anwar, S.T.,M.Kom', 'nuril.anwar@tif.uad.ac.id', 'Computer Network & Security, Digital Forensics'),
('60910095', 'Drs. Wahyu Pujiyono, M. Kom', 'yywahyup@tif.uad.ac.id', 'Multimedia, Mobile, Enterprise System'),
('60960147', 'Mushlihudin, S.T., M.T.', 'mdin@ee.uad.ac.id', 'Security, Web, Networking'),
('60980174', 'Rusydi Umar, S.T., M.T, Ph.D.', 'rusydi.umar@tif.uad.ac.id', 'Grid Computing, Cloud Computing, Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `logbook_bimbingan`
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
-- Dumping data for table `logbook_bimbingan`
--

INSERT INTO `logbook_bimbingan` (`id_logbook`, `materi_bimbingan`, `id_skripsi`, `tanggal_bimbingan`, `jam`, `jenis`) VALUES
(1, 'monitoring evaluasi sebelum pelaksanaan semprop', '1700018066', '2019-05-10', '20:08:00', 'metopen'),
(2, 'none', '1700018066', '2019-05-01', '16:44:00', 'metopen'),
(3, 'bimbingan awal pengenalan masalah', '1700018164', '2019-05-10', '20:08:00', 'metopen'),
(4, 'perbaikan materi bab 2', '1700018066', '2019-05-23', '15:00:00', 'metopen'),
(5, 'kehangatan yang nyata', '1700018164', '2019-05-24', '05:06:25', 'metopen'),
(6, 'perbaikan kata yang kurang tepat pada latar belaka', '1700018164', '2019-05-24', '05:07:45', 'metopen'),
(7, 'terserah', '1700018164', '2019-05-24', '05:22:42', 'metopen'),
(8, 'perbaikan program pada fitur search', '1700018164', '2019-05-24', '05:53:22', 'metopen'),
(9, 'penambahan fitur sorting ', '1700018164', '2019-05-24', '05:54:52', 'metopen'),
(10, 'penambahan beberapa materi ', '1700018164', '2019-05-25', '08:02:51', 'metopen'),
(11, 'pengarahan format laporan skripsi', '1700018164', '2019-05-25', '08:15:13', 'skripsi'),
(12, 'konsultasi masalah lapangan', '1700018164', '2019-05-26', '07:45:39', 'skripsi'),
(13, 'bimbingan awal kuliah', '1700018158', '2019-05-26', '07:47:58', 'metopen'),
(14, 'konsultasi perbaikan materi dalam menyusun laporan', '1700018158', '2019-05-26', '07:49:01', 'metopen'),
(15, 'mamayougerou', '1700018164', '2019-05-28', '02:12:43', 'skripsi'),
(16, 'konohaganinaruo', '1700018164', '2019-05-28', '02:13:22', 'skripsi'),
(17, 'konsultasi perbaikan masalah lapangan', '1700018158', '2019-05-28', '09:07:56', 'metopen'),
(18, 'konsultasi evaluasi proyek metopen', '1700018158', '2019-05-28', '09:08:27', 'metopen'),
(19, 'membuat perencanaan dalam penyusunan laporan berik', '1700018158', '2019-05-28', '09:08:43', 'metopen'),
(20, 'evaluasi hasil laporan', '1700018158', '2019-05-28', '09:08:58', 'metopen'),
(21, 'menambah referensi', '1700018165', '2019-05-29', '11:41:54', 'metopen'),
(22, 'tes 1', '1700018066', '2019-06-29', '08:29:08', 'skripsi'),
(23, 'tes2', '1700018066', '2019-06-29', '08:29:16', 'skripsi'),
(24, 'tes3', '1700018066', '2019-06-29', '08:29:27', 'skripsi'),
(25, 'tes4', '1700018066', '2019-06-29', '08:29:45', 'skripsi'),
(26, 'tes5', '1700018066', '2019-06-29', '08:30:00', 'skripsi'),
(27, 'tes6', '1700018066', '2019-06-29', '08:30:13', 'skripsi'),
(28, 'tes7', '1700018066', '2019-06-29', '08:30:25', 'skripsi'),
(29, 'tes8', '1700018066', '2019-06-29', '08:30:34', 'skripsi'),
(30, 'tes9', '1700018066', '2019-06-29', '08:30:45', 'skripsi'),
(31, 'tes10', '1700018066', '2019-06-29', '08:30:57', 'skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','dosen','mahasiswa') NOT NULL,
  `status_akun` enum('baru','dirubah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `level`, `status_akun`) VALUES
('0006027001', 'f5vuiw1Z', 'dosen', 'baru'),
('0014107301', 'MrcabTfg', 'dosen', 'baru'),
('0015118001', '9Pc3XamH', 'dosen', 'baru'),
('0019087601', 'V6IcOAb7', 'dosen', 'baru'),
('060150841', 'xlxTpi1c', 'dosen', 'baru'),
('060150842', 'CAbRL3Pj', 'dosen', 'baru'),
('1700018066', 'MtyA1yeZ', 'mahasiswa', 'baru'),
('1700018067', 'PPTidB4r', 'mahasiswa', 'baru'),
('1700018068', 'q0r98Gxg', 'mahasiswa', 'baru'),
('1700018069', 'RqS4VZzA', 'mahasiswa', 'baru'),
('1700018070', 'EBwkgg41', 'mahasiswa', 'baru'),
('1700018071', '6SfXLLQ1', 'mahasiswa', 'baru'),
('1700018073', 'wRABxAZc', 'mahasiswa', 'baru'),
('1700018074', '8Z0WWp6e', 'mahasiswa', 'baru'),
('1700018075', 'X9Mfuzfb', 'mahasiswa', 'baru'),
('1700018076', 'BccHDKun', 'mahasiswa', 'baru'),
('1700018079', 'qsLMqKql', 'mahasiswa', 'baru'),
('1700018080', '4Jpx3bOH', 'mahasiswa', 'baru'),
('1700018082', 'gRPAxmuU', 'mahasiswa', 'baru'),
('1700018086', 'rxALtfDD', 'mahasiswa', 'baru'),
('1700018087', 'uiqR0wWM', 'mahasiswa', 'baru'),
('1700018089', '3VlQQ2Ln', 'mahasiswa', 'baru'),
('1700018090', 'tRllEw3J', 'mahasiswa', 'baru'),
('1700018091', 'Ert2dgSE', 'mahasiswa', 'baru'),
('1700018092', 'iPXQmjXN', 'mahasiswa', 'baru'),
('1700018093', 'zxqG9jeF', 'mahasiswa', 'baru'),
('1700018094', 'WGPbVVos', 'mahasiswa', 'baru'),
('1700018095', 'EwMo8um7', 'mahasiswa', 'baru'),
('1700018096', 'Gb47vqWJ', 'mahasiswa', 'baru'),
('1700018101', '0LBoZs4I', 'mahasiswa', 'baru'),
('1700018102', 'jIjQCCOR', 'mahasiswa', 'baru'),
('1700018103', 'MhYtYFgh', 'mahasiswa', 'baru'),
('1700018104', '0LHoYPI9', 'mahasiswa', 'baru'),
('1700018105', 'SEd8daMI', 'mahasiswa', 'baru'),
('1700018106', 'EH7cPi2F', 'mahasiswa', 'baru'),
('1700018107', 'xYTmhfNU', 'mahasiswa', 'baru'),
('1700018108', 'gGamH3Cn', 'mahasiswa', 'baru'),
('1700018109', '6mG80QHr', 'mahasiswa', 'baru'),
('1700018110', 'B6iOW0OT', 'mahasiswa', 'baru'),
('1700018111', 'n7bKKkqA', 'mahasiswa', 'baru'),
('1700018112', '2wUxqyEz', 'mahasiswa', 'baru'),
('1700018113', 'pgwxOT9w', 'mahasiswa', 'baru'),
('1700018114', 'cjR4bd5p', 'mahasiswa', 'baru'),
('1700018115', 'NlHZ3rmI', 'mahasiswa', 'baru'),
('1700018116', 'l3zY6Wrl', 'mahasiswa', 'baru'),
('1700018117', 'pwfZTkeC', 'mahasiswa', 'baru'),
('1700018118', '6jRlO9eN', 'mahasiswa', 'baru'),
('1700018120', 'PHyrpLkF', 'mahasiswa', 'baru'),
('1700018121', '2dwOEhW5', 'mahasiswa', 'baru'),
('1700018122', '5B7BD3rP', 'mahasiswa', 'baru'),
('1700018123', '3gcc4eDR', 'mahasiswa', 'baru'),
('1700018124', 'vCVap7zY', 'mahasiswa', 'baru'),
('1700018125', '2rr1t8Ah', 'mahasiswa', 'baru'),
('1700018126', 'W8H7Vht8', 'mahasiswa', 'baru'),
('1700018127', 'toESz9Ua', 'mahasiswa', 'baru'),
('1700018129', 'aKwdJkVz', 'mahasiswa', 'baru'),
('1700018130', 'XQaUXUkJ', 'mahasiswa', 'baru'),
('1700018131', 'EP2on0D2', 'mahasiswa', 'baru'),
('1700018133', '3Cb5urVV', 'mahasiswa', 'baru'),
('1700018135', 'aae1kX4Z', 'mahasiswa', 'baru'),
('1700018137', 'GNYWKwH9', 'mahasiswa', 'baru'),
('1700018139', 'fHcmiKCh', 'mahasiswa', 'baru'),
('1700018140', 'nZyVsuyO', 'mahasiswa', 'baru'),
('1700018141', 'B3Cgo3DN', 'mahasiswa', 'baru'),
('1700018142', 'ZFYnAtdU', 'mahasiswa', 'baru'),
('1700018143', '5gYgMPHG', 'mahasiswa', 'baru'),
('1700018144', 'q1KTVdE4', 'mahasiswa', 'baru'),
('1700018146', 'YXSDWwBb', 'mahasiswa', 'baru'),
('1700018147', '53MyCsjP', 'mahasiswa', 'baru'),
('1700018148', 'LzIGkMga', 'mahasiswa', 'baru'),
('1700018152', 'VRUOhHZK', 'mahasiswa', 'baru'),
('1700018154', 'smb5b8pD', 'mahasiswa', 'baru'),
('1700018155', 'G5dTuAHs', 'mahasiswa', 'baru'),
('1700018156', '1cp6XeNR', 'mahasiswa', 'baru'),
('1700018158', 'rifal', 'mahasiswa', 'baru'),
('1700018159', 'HxPmqL2U', 'mahasiswa', 'baru'),
('1700018161', 'm9bn2okD', 'mahasiswa', 'baru'),
('1700018162', '0JD7xND3', 'mahasiswa', 'baru'),
('1700018163', 'qz4NzD0K', 'mahasiswa', 'baru'),
('1700018164', 'ancas', 'mahasiswa', 'baru'),
('1700018165', 'hNQlPrLV', 'mahasiswa', 'baru'),
('1700018167', 'OCc5eRM1', 'mahasiswa', 'baru'),
('1700018168', 'kdTzBlfP', 'mahasiswa', 'baru'),
('1700018169', 'jVB8fPBA', 'mahasiswa', 'baru'),
('1700018171', 'yYcSMk28', 'mahasiswa', 'baru'),
('1700018174', 'NtMrwqo0', 'mahasiswa', 'baru'),
('1700018177', 'kuku', 'mahasiswa', 'baru'),
('60010308', 'pFWsP1ZE', 'dosen', 'baru'),
('60010314', 'Sq0rWW8h', 'dosen', 'baru'),
('60020388', '6MAVdpek', 'dosen', 'baru'),
('60030475', 'isE8do9W', 'dosen', 'baru'),
('60030476', 'h1QCpLta', 'dosen', 'baru'),
('60030479', 'zgeOEutJ', 'dosen', 'baru'),
('60030480', 'LuNY2MKa', 'dosen', 'baru'),
('60040496', '7X6C8MWv', 'dosen', 'baru'),
('60040497', 'mkJKXgCi', 'dosen', 'baru'),
('60090586', 'CyFgMMo3', 'dosen', 'baru'),
('60110647', 'yUC9cRz2', 'dosen', 'baru'),
('60110648', 'll1HlUIb', 'dosen', 'baru'),
('60130757', 'lz7Mz4zJ', 'dosen', 'baru'),
('60150773', 'tl4P51w8', 'dosen', 'baru'),
('60160863', 'bbGKtq46', 'dosen', 'baru'),
('60160951', '6vGKiRRp', 'dosen', 'baru'),
('60160952', '8QtvhkMO', 'dosen', 'baru'),
('60160960', 'Z4Sdz6Xy', 'dosen', 'baru'),
('60160978', 'LGVo8Vyz', 'dosen', 'baru'),
('60160979', 'kr9iIzUL', 'dosen', 'baru'),
('60160980', 'lcqT4kIX', 'dosen', 'baru'),
('60910095', '3cxURbfK', 'dosen', 'baru'),
('60960147', '9q2MkXpx', 'dosen', 'baru'),
('60980174', 'nYJxtCI5', 'dosen', 'baru'),
('admin', 'admin', 'admin', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_metopen`
--

CREATE TABLE `mahasiswa_metopen` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `topik` varchar(100) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `bidang_minat` enum('Rekayasa Perangkat Lunak','Sistem Cerdas','Multimedia','Sistem Informasi','Media Pembelajaran') NOT NULL,
  `status` enum('metopen','skripsi','lulus','gagal') NOT NULL,
  `tanggal_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa_metopen`
--

INSERT INTO `mahasiswa_metopen` (`nim`, `nama`, `jenis_kelamin`, `topik`, `dosen`, `bidang_minat`, `status`, `tanggal_mulai`) VALUES
('1700018066', 'Pratomo Adi', 'Laki-laki', 'Implementasi Teknologi Cloud Computing Pada Pemasaran Oleh-Oleh Berbasis Web', '60160863', 'Sistem Cerdas', 'skripsi', '2019-01-07'),
('1700018067', 'Via Wahyuningtyas', 'Perempuan', 'Pembuatan Iklan Bencana Banjir Berbasis Multimedia', '60910095', 'Sistem Informasi', 'metopen', '2019-01-09'),
('1700018068', 'Diky Syahrul', 'Laki-laki', 'Manajemen Bandwidth Dan Optimalisasi Sistem Keamanan Pada Jaringan Komputer Dengan Winbox Menggunaka', '60160960', 'Rekayasa Perangkat Lunak', 'metopen', '2019-03-04'),
('1700018069', 'Wahyu Amin Mahmud', 'Laki-laki', 'Pengamanan Account Sistem Informasi Akademik Online Sekolah Menengah Atas Dengan Menggunakan Metode ', '060150842', 'Rekayasa Perangkat Lunak', 'metopen', '2019-03-01'),
('1700018070', 'Zulfan Khaidir', 'Laki-laki', 'Penerapan Seo (Search Engine Optimization) Pada Website Wedding Menggunakan Semantik Web', '060150841', 'Sistem Cerdas', 'metopen', '2019-03-04'),
('1700018071', 'Iis Sudianto', 'Perempuan', 'Pembuatan Media Pembelajaran Ilmu Tajwid Berbasis Audio Visual Menggunakan Macromedia Flash', '60960147', 'Media Pembelajaran', 'metopen', '2019-03-05'),
('1700018073', 'Murdheny', 'Laki-laki', 'Media Pembelajaran Iqro Sebagai Sarana Mempelajari Huruf Al-Quran', '60160960', 'Media Pembelajaran', 'metopen', '2019-03-07'),
('1700018074', 'Yusuf Mahdiansyah', 'Laki-laki', 'Penentuan Pemberian Obat Penderita Penyakit Pernapasan Pada Anak Menggunakan Puzzy Smart', '60980174', 'Sistem Cerdas', 'metopen', '2019-03-13'),
('1700018075', 'Rizki Akbari', 'Laki-laki', 'Pengembangan Sistem Pakar Diagnosa Penyakit Gigi Berbasis Android', '60020388', 'Sistem Cerdas', 'metopen', '2019-03-12'),
('1700018076', 'Muhammad Rangga A.Z', 'Laki-laki', 'Implementasi Algoritma Perangkingan Untuk Pencarian Kata Didalam Kamus Komputer Berbasis Android', '60130757', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018079', 'Syahrani Lonang', 'Laki-laki', 'Pengembangan Sistem Pakar Diagnosa Penyakit Kulit Berbasis Mobile Web Pada Smartphone', '60030475', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018080', 'Zulfikar Yunus', 'Laki-laki', 'Penggunaan Steganografi Dan Kriptografi Dalam Aplikasi Penyisipan Pesan Rahasia Pada Gambar Berbasis', '60030479', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018082', 'Tri Wahyuni', 'Laki-laki', 'Pembuatan Aplikasi Sms Kriptografi Rsa Dengan Android', '60910095', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018086', 'M.Alif Rahmat Novian', 'Laki-laki', 'Implementasi Supply Chain Management Untuk Stock Dan Pendistribusian Barang Berbasis Web', '60160863', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018087', 'Yunus Fajri', 'Laki-laki', 'Pemanfaatan Aplikasi Mobile Android Oleh Asisten Laboratorium Dalam Aktivitas Praktikum', '60160979', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018089', 'Primadi Apriyanto', 'Laki-laki', 'Pembangunan Sistem Informasi Manajemen Inventory Dengan Menggunakan Teknologi Webbase', '60160980', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018090', 'Nicky Dwi Rizky', 'Laki-laki', 'Implementasi Windows Presentation Foundation (Wpf) Pada Sistem Informasi Penjualan Handycraft', '60160951', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018091', 'Iqbal Kurnia Dama', 'Laki-laki', 'Implementasi Konsep E-Commerce Terhadap Rancang Bangun E-Mall System', '60150773', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018092', 'Iqbal Amanulloh', 'Laki-laki', 'Pemilihan Template Website Pada Lumonata Webdesign And Design Graphis Menggunakan Metode Clustering', '60960147', 'Multimedia', 'metopen', '0000-00-00'),
('1700018093', 'Fadel Syahbana Tamran Putra', 'Laki-laki', 'Membangun Aplikasi Multimedia Pembelajaran Bahasa Inggris Untuk Anak-Anak', '60160978', 'Multimedia', 'metopen', '0000-00-00'),
('1700018094', 'Panji Ragil Wibisono', 'Laki-laki', 'Implementasi Keamanan Replikasi Site Active Directory Pada Windows Server 2008', '60150773', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018095', 'Adrianto Setyo Nugroho G.', 'Laki-laki', 'Pengembangan Sistem Informasi Pemasaran Product Tour Dan Travel Berbasis Cloud Computing', '60010314', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018096', 'Bayu Tudo Prasetyo', 'Laki-laki', 'Perancangan Perangkat Lunak Belajar Bahasa Mandarin', '60040496', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018101', 'M.Iqbal Hadiwibowo', 'Laki-laki', 'Perancangan Perangkat Lunak Untuk Kompresi Data Dengan Menggunakan Metode Wavelet', '60040497', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018102', 'Teguh Pangestu', 'Laki-laki', 'Perancangan Aplikasi Pengelola Keuangan Pada Komputer Menggunakan Java', '60030480', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018103', 'Rio Subandi', 'Laki-laki', 'Perangkat Pemberi Pakan Ikan Pada Akuarium Dengan Menggunakan Mikrokontroler At328p-Au', '60090586', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018104', 'Agam Panuntas', 'Laki-laki', 'Penggunaan Gps Dan Mac Address Sebagai Location Based Service Untuk Aplikasi Mobile', '60030476', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018105', 'Ainin Maftukhah', 'Laki-laki', 'Rancang Bangun Aplikasi E-Voting Berbasis Web Service', '60110647', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018106', 'Brilian Anugra', 'Laki-laki', 'Pembuatan Aplikasi Pembelajaran Interaktif Tembang Macapat Berbasis Adobe Flash', '60160980', 'Media Pembelajaran', 'metopen', '0000-00-00'),
('1700018107', 'Okky Alwi Dwi R.', 'Laki-laki', 'Komputerisasi Sistem Persediaan Obat Pada Apotik Kimia Parma', '60160952', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018108', 'Feni Sastriani', 'Laki-laki', 'Rancang Bangun Aplikasi Monitoring Service Pada Server Menggunakan Sms Gateway', '60110648', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018109', 'Muhammad Firdaus Fahrullah', 'Laki-laki', 'Messanger Berbasis Client-Server Pada Lingkungan Bisnis Menggunakan Triple Transposition Vigenere Ci', '60160979', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018110', 'Syaifullah Ihsan', 'Laki-laki', 'Pengembangan Keamanan Jaringan Intranet Dengan Metode Access Control List', '60010308', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018111', 'Mujahid Islami Primaldi Abdullah', 'Laki-laki', 'Implementasi Kalender Mobile Pada Platform Android', '60130757', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018112', 'Mohammad Fitri Haikal H.S', 'Laki-laki', 'Penerapan Metode Algoritma Genetika Untuk Pnjadwalan Pelatihan Karyawan', '60980174', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018113', 'Lutfi Purba Fitrianto', 'Laki-laki', 'Sistem Pakar Diagnosa Penyakit Sapi Menggunakan Visual Basic 6.0', '60160952', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018114', 'Rizqa Tsaqila A.H', 'Laki-laki', 'Implementasi Web Service Untuk Penunjang Sistem Informasi Executive', '60160951', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018115', 'Tri Subagio', 'Laki-laki', 'Membuat Aplikasi Facebook Client Untuk Windows Phone', '60160978', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018116', 'Nanda Suci Pratiwi', 'Laki-laki', 'Aplikasi Sistem Pemesanan Barang Pada The Code Manufacture Of Shoes And Bag Company Berbasis Android', '60020388', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018117', 'Muhammad Nashir A', 'Laki-laki', 'Aplikasi Untuk Tempat Penimbunan Sementara Peti Kemas Berbasis Php', '60030480', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018118', 'Adil Baihaqi', 'Laki-laki', 'Aplikasi Sistem Informasi Peta Digital Untuk Sekolah Menengah Atas', '60010314', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018120', 'Rizky Muhamad Hasan', 'Laki-laki', 'Aplikasi Smart Card Untuk Kebutuhan Pelayanan Kesehatan', '60030476', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018121', 'Amir Fauzi Ansharif', 'Laki-laki', 'Aplikasi Sistem Komputerisasi Modul Pembelajaran Berbasis Web', '60010314', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018122', 'Rafida Kumalasari', 'Laki-laki', 'Rancang Bangun Sistem Informasi Kompetisi Bela Diri Berbasis Web', '0015118001', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018123', 'Nurfadhilah Alfianty F', 'Laki-laki', 'Rancang Bangun Sistem Informasi Pemesanan Tiket Bus Berbasis Windows Mobile', '0019087601', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018124', 'Iftitah Dwi Ulumiyah', 'Laki-laki', 'Aplikasi Sistem Penjualan Barang Berbasis Web', '60030475', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018125', 'Muhammad Satria Gradienta', 'Laki-laki', 'Analisa Dan Perancangan Sistem Digital Watermarking Pada Citra Digital Dengan Metode Dct', '0006027001', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018126', 'Ennu Intan Iksan', 'Laki-laki', 'Analisis Dan Implementasi Sistem Pemantau Ruangan Dengan Menggunakan Ip Camera Pada Sistem Operasi A', '0006027001', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018127', 'Ervin Fikot M', 'Laki-laki', 'Analisis Dan Perancangan Akses Jarak Jauh Dengan Teknologi Vpn Pada Kantor Suku Dinas Kependudukan D', '0006027001', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018129', 'Heronitah Yanzyah', 'Laki-laki', 'Analisis Troubleshooting Jaringan Komputer Lan Pada Pt Agna Preperindo Abadi Dengan Menggunakan Pake', '0014107301', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018130', 'Eef Mekeliano', 'Laki-laki', 'Aplikasi Bimbingan Konseling Dalam Kesulitan Belajar Siswa Menggunakan Backward Chainning Berbasis W', '0014107301', 'Media Pembelajaran', 'metopen', '0000-00-00'),
('1700018131', 'Aditya Angga Ramadhan', 'Laki-laki', 'Aplikasi Enkripsi Pesan Singkat Menggunakan Metode Triple Des Berbasis Android', '0015118001', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018133', 'Sandy Valentino Gerani', 'Laki-laki', 'Aplikasi Game 3d Dengan Pemanfaatan Shiva Game Engine', '0015118001', 'Multimedia', 'metopen', '0000-00-00'),
('1700018135', 'Rizal Adijisman', 'Laki-laki', 'Aplikasi Lowongan Pekerjaan Berbasis Mobile', '0019087601', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018137', 'Siti Issari  Sabhati', 'Laki-laki', 'Sistem Informasi Pengelolaan Tanah Wakaf', '0014107301', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018139', 'Iqbal Manaf', 'Laki-laki', 'Perancangan Dan Pembuatan Sistem Pendukung Keputusan Untuk Kenaikan Jabatan Dan Perencanaan Karir', '60040497', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018140', 'Nurzaitun Safitri', 'Laki-laki', 'Aplikasi Mobile Banking Bri Berbasis Android', '0019087601', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018141', 'Siti Apryanti K', 'Laki-laki', 'Sistem Informasi Berbasis Komputer di FISIPOL UAD', '0006027001', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018142', 'Muhammad Adi Rezky', 'Laki-laki', 'Aplikasi Mobile Commerce Bookstore Online System Berbasis Wireless Application Protocol Dengan Mengg', '060150841', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018143', 'Agung Parmono', 'Laki-laki', 'Aplikasi Pemetaan Daerah Tempat Penimbunan Sampah Berbasis Android', '060150841', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018144', 'Mochammad Yulianto Andi Saputro', 'Laki-laki', 'Aplikasi Pengolahan Data Penentuan Jurusan Pada Sekolah Menengah Umum Menggunakan Metode Clustering', '060150842', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018146', 'Lalu Hendri Bagus Wira Setiawan', 'Laki-laki', 'Aplikasi Penjualan Handphone Berbasis Web', '060150842', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018147', 'Ali Usman', 'Laki-laki', 'Aplikasi Remote Desktop System Menggunakan Spyware Untuk Memonitoring Kegiatan Siswa Di Laboratorium', '60010308', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018148', 'Abima Nugraha', 'Laki-laki', 'Aplikasi Pengamanan Data Menggunakan Algoritma Kriptografi Blowfish Dan Algoritma Steganografi Lsb P', '0015118001', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018152', 'Nofand Adlil Mukhollad', 'Laki-laki', 'Aplikasi Sistem Administrasi Pembayaran Spp Pada Sekolah Menengah Kejuruan', '60010308', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018154', 'Ricco Yhandy Fernando', 'Laki-laki', 'Aplikasi Untuk Mendiagnosa Penyakit Ayam Menggunakan Metode Fuzzy Logic', '60030479', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018155', 'Fitri Andini', 'Laki-laki', 'Implementasi Web Service Untuk Sistem Informasi Akademik', '60040496', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018156', 'Randi Indraguna', 'Laki-laki', 'Aplikasi Sistem Penunjang Keputusan Bagi Penentuan Ras Manusia Dengan Metode Forward Chaining', '60030475', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018158', 'Arifaleo Nurdin', 'Laki-laki', 'Aplikasi Sms Gateway Untuk Sistem Informasi Pemesanan Tiket Pesawat', '60030479', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018159', 'Latifatul Mujahidah', 'Laki-laki', 'Identifikasi Kerusakan Gangguan Sambungan Telephone Pada Pt.Telkom Menggunakan Rumus Euclidean Dista', '60110648', 'Sistem Cerdas', 'metopen', '0000-00-00'),
('1700018161', 'Isnan Arif Cahyadi', 'Laki-laki', 'Rancangan Sistem Informasi Arsip Induk Langganan Berbasis Web', '60090586', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018162', 'Puspa Nutari', 'Laki-laki', 'Rancang Bangun Sistem Informasi Perhitungan Zakat Berbasis Web', '60090586', 'Sistem Informasi', 'metopen', '0000-00-00'),
('1700018163', 'Shindi Sri Wahyuni Pawah', 'Laki-laki', 'Implementasi Algoritma K-Means Clustering Dalam Sistem Pemilihan Jurusan Di Smk', '60110648', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018164', 'Ancas Wasita Budi Cahya', 'Laki-laki', 'Sistem Informasi Pendistribusian Obat Pada Dinas Kesehatan Berbasis Web', '60110647', 'Sistem Informasi', 'skripsi', '0000-00-00'),
('1700018165', 'Ihsan Fadhilah', 'Laki-laki', 'Enkripsi-Dekripsi Data Dengan Menggunakan Metode Kriptografi Advanced Encryption Standard', '60110647', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018167', 'Adhymas Fajar Sudrajat', 'Laki-laki', 'Aplikasi Sistem Siaran Stasiun Radio Dengan Live Streaming Client Berbasis Android', '60030476', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018168', 'Abdun Fattah Yolandanu', 'Laki-laki', 'Aplikasi Travel Berbasis Web Dan Sms Gateway Menggunakan Metode Model View Controller', '60030480', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018169', 'Mariam Ulfa', 'Laki-laki', 'Rancang Bangun Aplikasi Sistem Informasi Geografis Jalur Rawan Kemacetan Berbasis Web', '60040497', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018171', 'Rifka Riyani Radilla', 'Laki-laki', 'Implementasi Web Service Pada Sistem Informasi Penjualan Menggunakan Asp.Net Dan Xml', '60040496', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00'),
('1700018174', 'M.Andika Riski', 'Laki-laki', 'Aplikasi Sistem Pencegahan Penanggulangan Dan Tanggap Darurat Terhadap Kebakaran Di Perpustakaan Pus', '60020388', 'Rekayasa Perangkat Lunak', 'metopen', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `id_penguji` int(5) NOT NULL,
  `id_jadwal` varchar(50) NOT NULL,
  `niy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`id_penguji`, `id_jadwal`, `niy`) VALUES
(60822146, 'SP0010000111', '0006027001'),
(60822147, 'SP3010000121', '0014107301'),
(60822148, 'SP0010000131', '0015118001'),
(60822149, 'SP6010000112', '0019087601'),
(60822150, 'SP8420000122', '060150842'),
(60822151, 'SP8410000132', '060150841'),
(60822152, 'SP8420000113', '060150842'),
(60822153, 'SP3080000123', '60010308'),
(60822154, 'SP3140000133', '60010314'),
(60822156, 'SP3880000221', '60020388');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` varchar(50) NOT NULL,
  `jenis_ujian` enum('SEMPROP','UNDARAN') NOT NULL,
  `nim` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` enum('1','2','3','') NOT NULL,
  `tempat` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_jadwal`, `jenis_ujian`, `nim`, `tanggal`, `jam`, `tempat`) VALUES
('SP0010000111', 'SEMPROP', '1700018066', '2019-03-01', '1', '1'),
('SP0010000131', 'SEMPROP', '1700018068', '2019-04-01', '3', '1'),
('SP3010000121', 'SEMPROP', '1700018067', '2019-04-01', '2', '1'),
('SP3080000123', 'SEMPROP', '1700018074', '2019-04-01', '2', '3'),
('SP3140000133', 'SEMPROP', '1700018075', '2019-04-01', '3', '3'),
('SP3880000221', 'SEMPROP', '1700018076', '2019-04-02', '2', '1'),
('SP6010000112', 'SEMPROP', '1700018069', '2019-04-01', '1', '2'),
('SP8410000132', 'SEMPROP', '1700018071', '2019-04-01', '3', '2'),
('SP8420000113', 'SEMPROP', '1700018073', '2019-04-01', '1', '3'),
('SP8420000122', 'SEMPROP', '1700018070', '2019-04-01', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
('18', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `status` enum('terbuka','tertutup','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `periode`, `status`) VALUES
(1, '2017/2018 Gasal', 'tertutup'),
(2, '2017/2018 Genap', 'tertutup'),
(3, '2018/2019 Gasal', 'tertutup'),
(4, '2018/2019 Genap', 'tertutup'),
(5, '2019/2020 Gasal', 'tertutup'),
(6, '2019/2020 Genap', 'terbuka');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar` int(5) NOT NULL,
  `nilai_proses_pembimbing` char(3) NOT NULL,
  `status` enum('lulus','tidak_lulus') NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nilai_ujian_pembimbing` char(3) NOT NULL,
  `nilai_ujian_penguji` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_proposal`
--

INSERT INTO `seminar_proposal` (`id_seminar`, `nilai_proses_pembimbing`, `status`, `nim`, `nilai_ujian_pembimbing`, `nilai_ujian_penguji`) VALUES
(1700018066, '100', 'lulus', '1700018066', '100', '100'),
(1700018067, '90', 'lulus', '1700018067', '99', '88'),
(1700018068, '20', 'tidak_lulus', '1700018068', '10', '10'),
(1700018086, '90', 'lulus', '1700018086', '90', '80'),
(1700018090, '45', 'tidak_lulus', '1700018090', '55', '30');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_pendadaran`
--

CREATE TABLE `ujian_pendadaran` (
  `nim` varchar(15) NOT NULL,
  `id_pendadaran` varchar(15) NOT NULL,
  `status` enum('lulus','tidak_lulus') NOT NULL,
  `nilai_penguji_1` char(3) NOT NULL,
  `nilai_penguji_2` char(3) NOT NULL,
  `nilai_pembimbing` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian_pendadaran`
--

INSERT INTO `ujian_pendadaran` (`nim`, `id_pendadaran`, `status`, `nilai_penguji_1`, `nilai_penguji_2`, `nilai_pembimbing`) VALUES
('1700018086', '1700018086', 'lulus', '90', '90', '80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy`);

--
-- Indexes for table `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_skripsi` (`id_skripsi`),
  ADD KEY `id_skripsi_2` (`id_skripsi`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Dosen` (`dosen`),
  ADD KEY `Dosen_2` (`dosen`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id_penguji`),
  ADD KEY `NIY` (`niy`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `NIM` (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `NIM` (`nim`);

--
-- Indexes for table `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD PRIMARY KEY (`id_pendadaran`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  MODIFY `id_logbook` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id_penguji` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60822157;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1700018091;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD CONSTRAINT `logbook_bimbingan_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_1` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`),
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_2` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`);

--
-- Constraints for table `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_1` FOREIGN KEY (`niy`) REFERENCES `dosen` (`niy`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `seminar_proposal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD CONSTRAINT `ujian_pendadaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
