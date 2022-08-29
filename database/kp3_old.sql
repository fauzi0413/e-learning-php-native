-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `username`, `nik`, `nama_guru`, `mata_pelajaran`, `kode_pelajaran`, `kelamin`) VALUES
(1, 'tiara', '1111', 'Bu Tiara', 'Pemrograman Berorientasi Objek', 'pbo', 'P'),
(3, 'fajar', '1113', 'Pak Fajar', 'Bahasa Jepang', 'jpg', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas_siswa` varchar(50) NOT NULL,
  `kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `username`, `nis`, `nama_siswa`, `kelas_siswa`, `kelamin`) VALUES
(1, 'fauzi', '192010007', 'Fauzi Aditya Pratama', 'XII RPL 1', 'L'),
(2, 'putri', '192010001', 'Amalia Putri Cantika', 'X RPL 1', 'P'),
(3, 'joko', '192010009', 'Joko Gunandar', 'XI RPL 1', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(3, 'XI RPL 1'),
(4, 'XII RPL 1'),
(5, 'X RPL 1');

-- --------------------------------------------------------

--
-- Table structure for table `list_pelajaran`
--

CREATE TABLE `list_pelajaran` (
  `id` int(11) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `kode_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_pelajaran`
--

INSERT INTO `list_pelajaran` (`id`, `mata_pelajaran`, `kode_pelajaran`) VALUES
(1, 'Bahasa Indonesia', 'indo'),
(2, 'Bahasa Inggris', 'inggris'),
(3, 'Bahasa Jepang', 'jpg'),
(4, 'Basis Data', 'basdat'),
(5, 'Matematika', 'mtk'),
(7, 'Kimia', 'kma'),
(8, 'Python', 'pyt'),
(9, 'Pemrograman Berorientasi Objek', 'pbo'),
(10, 'Pendidikan Agama Islam', 'pai'),
(11, 'Pendidikan Pancasila dan Kewarganegaraan', 'pkn'),
(12, 'Kewirausahaan', 'kwu'),
(13, 'Produk Keterampilan Kreatif', 'pkk'),
(14, 'Pendidikan Jasmani Olahraga dan Kesehatan', 'pjok'),
(15, 'Fisika', 'fsk'),
(16, 'Sejarah', 'sjh');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_jumat`
--

CREATE TABLE `mapel_jumat` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `pelajaran1` varchar(100) NOT NULL,
  `pelajaran2` varchar(100) NOT NULL,
  `pelajaran3` varchar(100) NOT NULL,
  `pelajaran4` varchar(100) NOT NULL,
  `pelajaran5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_jumat`
--

INSERT INTO `mapel_jumat` (`id`, `nama_kelas`, `pelajaran1`, `pelajaran2`, `pelajaran3`, `pelajaran4`, `pelajaran5`) VALUES
(1, 'XII RPL 1', 'pyt', 'jpg', 'pbo', 'kwu', 'basdat'),
(2, 'XI RPL 1', 'basdat', 'pbo', 'kma', 'mtk', 'fsk'),
(3, 'X RPL 1', 'indo', 'mtk', 'jpg', 'basdat', 'pyt');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_kamis`
--

CREATE TABLE `mapel_kamis` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `pelajaran1` varchar(100) NOT NULL,
  `pelajaran2` varchar(100) NOT NULL,
  `pelajaran3` varchar(100) NOT NULL,
  `pelajaran4` varchar(100) NOT NULL,
  `pelajaran5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_kamis`
--

INSERT INTO `mapel_kamis` (`id`, `nama_kelas`, `pelajaran1`, `pelajaran2`, `pelajaran3`, `pelajaran4`, `pelajaran5`) VALUES
(1, 'XII RPL 1', 'kwu', 'mtk', 'inggris', 'pbo', 'pkk'),
(2, 'XI RPL 1', 'pai', 'jpg', 'inggris', 'pyt', 'pai'),
(3, 'X RPL 1', 'sjh', 'inggris', 'mtk', 'pkk', 'pkn');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_rabu`
--

CREATE TABLE `mapel_rabu` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `pelajaran1` varchar(100) NOT NULL,
  `pelajaran2` varchar(100) NOT NULL,
  `pelajaran3` varchar(100) NOT NULL,
  `pelajaran4` varchar(100) NOT NULL,
  `pelajaran5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_rabu`
--

INSERT INTO `mapel_rabu` (`id`, `nama_kelas`, `pelajaran1`, `pelajaran2`, `pelajaran3`, `pelajaran4`, `pelajaran5`) VALUES
(1, 'XII RPL 1', 'mtk', 'kwu', 'pjok', 'pyt', 'pkk'),
(2, 'XI RPL 1', 'basdat', 'pbo', 'kwu', 'pjok', 'indo'),
(3, 'X RPL 1', 'inggris', 'pkk', 'mtk', 'kwu', 'pbo');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_selasa`
--

CREATE TABLE `mapel_selasa` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `pelajaran1` varchar(100) NOT NULL,
  `pelajaran2` varchar(100) NOT NULL,
  `pelajaran3` varchar(100) NOT NULL,
  `pelajaran4` varchar(100) NOT NULL,
  `pelajaran5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_selasa`
--

INSERT INTO `mapel_selasa` (`id`, `nama_kelas`, `pelajaran1`, `pelajaran2`, `pelajaran3`, `pelajaran4`, `pelajaran5`) VALUES
(1, 'X RPL 1', 'jpg', 'pkk', 'kwu', 'fsk', 'mtk'),
(2, 'XI RPL 1', 'jpg', 'mtk', 'basdat', 'pbo', 'pkn'),
(3, 'XII RPL 1', 'basdat', 'pbo', 'pkn', 'pai', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_senin`
--

CREATE TABLE `mapel_senin` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `pelajaran1` varchar(100) NOT NULL,
  `pelajaran2` varchar(100) NOT NULL,
  `pelajaran3` varchar(100) NOT NULL,
  `pelajaran4` varchar(100) NOT NULL,
  `pelajaran5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel_senin`
--

INSERT INTO `mapel_senin` (`id`, `nama_kelas`, `pelajaran1`, `pelajaran2`, `pelajaran3`, `pelajaran4`, `pelajaran5`) VALUES
(4, 'XI RPL 1', 'fsk', 'pjok', 'mtk', 'kwu', 'pai'),
(6, 'X RPL 1', 'indo', 'pjok', 'mtk', 'kwu', 'mtk'),
(7, 'XII RPL 1', 'jpg', 'pjok', 'mtk', 'pyt', 'pkk');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `judul_materi` varchar(50) NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `nama_penulis`, `pelajaran`, `kelas`, `judul_materi`, `tanggal_unggah`, `deskripsi`, `file`) VALUES
(1, 'Bu Tiara', 'pbo', 'XII RPL 1', 'Cara Membuat CRUD Menggunakan PHP', '2021-11-05', '<p>Disini akan dijelaskan bagaimana cara membuat CRUD menggunakan <strong>PHP</strong></p>\r\n', 'contoh.pdf'),
(2, 'Bu Tiara', 'pbo', 'X RPL 1', 'Apa itu PHP?', '2021-11-03', '<p>Apa aja dah</p>\r\n', 'contoh.pdf'),
(3, 'Bu Tiara', 'pbo', 'X RPL 1', 'Apa itu OOP pada PHP?', '2021-11-06', '<p><strong>Apa Itu OOP</strong> Pada <strong>PHP</strong> ?. <strong>OOP</strong> (<strong>Object Oriented Programming</strong>) atau yang dalam bahasa Indonesia berarti Pemrograman Berbasis Objek (PBO) adalah konsep dimana Property / Variable dan juga Method / Fungsi di bungkus dalam sebuah Class, yang kemudian akan di terapkan pada Objek &ndash; objek yang di deklarasikan.</p>\r\n', 'contoh.pdf'),
(9, 'Bu Tiara', 'pbo', 'XII RPL 1', 'PRAKTIKUM CRUD JAVA XII', '2021-11-06', '<p>Pemrograman berorientasi objek merupakan paradigma pemrograman berdasarkan konsep &quot;objek&quot;, yang dapat berisi data, dalam bentuk field atau dikenal juga sebagai atribut; serta kode, dalam bentuk fungsi/prosedur atau dikenal juga sebagai method. <a href=\"https://id.wikipedia.org/wiki/Pemrograman_berorientasi_objek\">Wikipedia</a></p>\r\n', 'PRAKTIKUM CRUD JAVA XII.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `judul_tugas` varchar(50) NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `nama_penulis`, `pelajaran`, `kelas`, `judul_tugas`, `tanggal_unggah`, `deskripsi`, `file`) VALUES
(1, 'Bu Tiara', 'pbo', 'XII RPL 1', 'Membuat OOP', '2021-11-05', '<p>Disini akan dijelaskan bagaimana cara membuat CRUD menggunakan <strong>PHP</strong></p>\r\n', 'contoh.pdf'),
(3, 'Bu Tiara', 'pbo', 'X RPL 1', 'Meringkas Module OOP PHP', '2021-11-06', '<p><strong>Apa Itu OOP</strong> Pada <strong>PHP</strong> ?. <strong>OOP</strong> (<strong>Object Oriented Programming</strong>) atau yang dalam bahasa Indonesia berarti Pemrograman Berbasis Objek (PBO) adalah konsep dimana Property / Variable dan juga Method / Fungsi di bungkus dalam sebuah Class, yang kemudian akan di terapkan pada Objek &ndash; objek yang di deklarasikan.</p>\r\n', 'contoh.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'fauzi', 'fauzi', 'user'),
(3, 'tiara', 'tiara', 'guru'),
(4, 'putri', 'putri', 'user'),
(6, 'fajar', 'fajar', 'guru'),
(7, 'joko', 'joko', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_pelajaran`
--
ALTER TABLE `list_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_jumat`
--
ALTER TABLE `mapel_jumat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_kamis`
--
ALTER TABLE `mapel_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_rabu`
--
ALTER TABLE `mapel_rabu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_selasa`
--
ALTER TABLE `mapel_selasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_senin`
--
ALTER TABLE `mapel_senin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_pelajaran`
--
ALTER TABLE `list_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mapel_jumat`
--
ALTER TABLE `mapel_jumat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_kamis`
--
ALTER TABLE `mapel_kamis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_rabu`
--
ALTER TABLE `mapel_rabu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_selasa`
--
ALTER TABLE `mapel_selasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_senin`
--
ALTER TABLE `mapel_senin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
