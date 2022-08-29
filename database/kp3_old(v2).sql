-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 11:02 AM
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
  `mata_pelajaran1` varchar(100) NOT NULL,
  `mata_pelajaran2` varchar(100) NOT NULL,
  `mata_pelajaran3` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `username`, `nik`, `nama_guru`, `mata_pelajaran1`, `mata_pelajaran2`, `mata_pelajaran3`, `kelamin`) VALUES
(4, 'bagus', '1115', 'Bagus Sujiwo', 'Bahasa Jawa', 'Bahasa Inggris', 'Bahasa German', 'L'),
(5, 'tiara', '11232', 'Tiara Kusuma Dewi', 'Pemrogramman Berbasis Objek', 'Basis Data', 'Pemrograman Web', 'P'),
(8, 'fajar', '11121', 'Fajar Apriani', 'Teknik Jaringan', 'Bahasa Arab', '', 'L');

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
(1, 'Fauzi', '192010007', 'Fauzi Aditya Pratama', 'XII RPL 1', 'L'),
(3, 'Joko', '192010009', 'Joko Gunandar', 'XI RPL 1', 'L'),
(4, 'Dimas', '1920100020', 'Dimas Putra', 'X RPL 1', 'L'),
(5, 'Putri', '19201999191', 'Amalia Putri Cantika', 'XI RPL 1', 'P');

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
(1, 'X RPL 1'),
(2, 'XI RPL 1'),
(5, 'XII RPL 2'),
(12, 'XII RPL 1');

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
(16, 'Sejarah', 'sjh'),
(17, '', '');

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
(2, 'XI RPL 1', 'basdat', 'pbo', 'kma', 'mtk', 'fsk'),
(3, 'X RPL 1', 'indo', 'mtk', 'jpg', 'basdat', 'pyt'),
(5, 'XII RPL 2', '', '', '', '', ''),
(6, 'XII RPL 1', 'Bahasa Jawa', 'Pemrograman Web', 'Pemrogramman Berbasis Objek', 'Bahasa German', 'Bahasa Arab');

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
(2, 'XI RPL 1', 'pai', 'jpg', 'inggris', 'pyt', 'pai'),
(3, 'X RPL 1', 'sjh', 'inggris', 'mtk', 'pkk', 'pkn'),
(5, 'XII RPL 2', '', '', '', '', ''),
(6, 'XII RPL 1', '', '', '', '', '');

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
(2, 'XI RPL 1', 'basdat', 'pbo', 'kwu', 'pjok', 'indo'),
(3, 'X RPL 1', 'inggris', 'pkk', 'mtk', 'kwu', 'pbo'),
(5, 'XII RPL 2', '', '', '', '', ''),
(6, 'XII RPL 1', '', '', '', '', '');

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
(2, 'XI RPL 1', 'Bahasa Jawa', 'Bahasa Arab', 'Bahasa Inggris', 'Bahasa Inggris', 'Bahasa German'),
(5, 'XII RPL 2', '', '', '', '', ''),
(6, 'XII RPL 1', 'Pemrogramman Berbasis Objek', 'Bahasa German', 'Teknik Jaringan', 'Pemrogramman Berbasis Objek', 'Pemrograman Web');

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
(1, 'X RPL 1', 'Bahasa Arab', '', '', '', ''),
(2, 'XI RPL 1', 'Bahasa Jawa', 'Pemrogramman Berbasis Objek', 'Bahasa Inggris', 'Bahasa Jawa', 'Bahasa German'),
(5, 'XII RPL 2', 'Bahasa Jawa', 'Teknik Jaringan', '', '', ''),
(10, 'XII RPL 1', 'Bahasa Jawa', 'Teknik Jaringan', 'Pemrograman Web', 'Pemrograman Web', 'Pemrogramman Berbasis Objek');

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
(1, 'tiara', 'Pemrogramman Berbasis Objek', 'XII RPL 1', 'Cara Membuat CRUD Menggunakan PHP', '2021-11-05', '<p>Disini akan dijelaskan bagaimana cara membuat CRUD menggunakan <strong>PHP</strong></p>', 'contoh.pdf'),
(2, 'tiara', 'Pemrograman Web', 'X RPL 1', 'Apa itu PHP?', '2021-11-03', '<p>Apa aja dah</p>\r\n', 'contoh.pdf'),
(3, 'tiara', 'Pemrogramman Berbasis Objek', 'X RPL 1', 'Apa itu OOP pada PHP?', '2021-11-11', '<p><strong>Apa Itu OOP</strong> Pada <strong>PHP</strong> ?. <strong>OOP</strong> (<strong>Object Oriented Programming</strong>) atau yang dalam bahasa Indonesia berarti Pemrograman Berbasis Objek (PBO) adalah konsep dimana Property / Variable dan juga Method / Fungsi di bungkus dalam sebuah Class, yang kemudian akan di terapkan pada Objek &ndash; objek yang di deklarasikan.</p>', 'contoh.pdf'),
(14, 'tiara', 'Basis Data', 'XII RPL 1', 'Class Diagram', '2021-11-07', '<p>Class Diagram</p>\r\n', '4_Class Diagram.pdf'),
(15, 'bagus', 'Bahasa Inggris', 'XII RPL 1', 'CAUSE AND EFFECT', '2022-02-14', '<p>Materi ini berhubungan tentang apa itu &#39;cause&#39;&nbsp; dan &#39;effect&#39; di dalam bahasa inggris, simak materi berikut ini</p>', 'CAUSE AND EFFECT.docx'),
(17, 'tiara', 'Pemrograman Web', 'XII RPL 1', 'LOGIN MULTILEVEL PADA CODEIGNITER', '2022-02-20', '<p>Ini materi terakhir di minggu ini, diharapkan kalian bisa mempelajarinya dengan baik. Materi berikut ini merupakah cara pembuatan login multilevel pada codeigniter, jangan lupa di praktekan dengan baik</p>', 'LOGIN MULTILEVEL PADA CODEIGNITER.pdf'),
(18, 'tiara', 'Pemrogramman Berbasis Objek', 'XII RPL 1', 'Class Diagram', '2022-02-20', '<p>Class Diagram untuk mata pelajaran pemrogramman berbasis objek</p>', '4_Class Diagram.pdf');

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
(1, 'tiara', 'Pemrogramman Berbasis Objek', 'XII RPL 1', 'Membuat OOP', '2021-11-05', '<p>Disini akan dijelaskan bagaimana cara membuat CRUD menggunakan <strong>PHP</strong></p>\r\n', 'contoh.pdf'),
(3, 'tiara', 'Basis Data', 'X RPL 1', 'Meringkas Module OOP PHP', '2021-11-06', '<p><strong>Apa Itu OOP</strong> Pada <strong>PHP</strong> ?. <strong>OOP</strong> (<strong>Object Oriented Programming</strong>) atau yang dalam bahasa Indonesia berarti Pemrograman Berbasis Objek (PBO) adalah konsep dimana Property / Variable dan juga Method / Fungsi di bungkus dalam sebuah Class, yang kemudian akan di terapkan pada Objek &ndash; objek yang di deklarasikan.</p>\r\n', 'contoh.pdf'),
(5, 'tiara', 'Pemrogramman Berbasis Objek', 'XII RPL 1', 'Class Diagram', '2022-02-20', '<p>Class Diagram</p>\r\n', '4_Class Diagram.pdf'),
(9, 'bagus', 'Bahasa Inggris', 'X RPL 1', 'QUIZ 1', '2022-02-20', '<p>QUIZ Bahasa Inggris</p>', 'QUIZ 1.docx');

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
(1, 'admin', 'admin', 'Admin'),
(2, 'Fauzi', 'fauzi', 'Siswa'),
(7, 'Joko', 'joko', 'Siswa'),
(9, 'Putri', 'putri', 'Siswa'),
(11, 'Dimas', 'dimas', 'Siswa'),
(12, 'tiara', 'tiara', 'Guru'),
(13, 'bagus', 'bagus', 'Guru'),
(14, 'fajar', 'fajar', 'Guru');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `list_pelajaran`
--
ALTER TABLE `list_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mapel_jumat`
--
ALTER TABLE `mapel_jumat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel_kamis`
--
ALTER TABLE `mapel_kamis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel_rabu`
--
ALTER TABLE `mapel_rabu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel_selasa`
--
ALTER TABLE `mapel_selasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mapel_senin`
--
ALTER TABLE `mapel_senin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
