-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 06:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelas_virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_anggota`, `kode_kelas`) VALUES
(8, 7, '356748'),
(9, 7, '087e9a'),
(10, 8, 'd14909'),
(11, 8, 'c96805'),
(14, 32, '356748 '),
(17, 16, '087e9a'),
(18, 33, '356748 '),
(19, 34, '356748 '),
(20, 36, '356748 '),
(21, 35, '356748 '),
(22, 37, '356748 '),
(23, 38, '356748 '),
(24, 39, '356748 '),
(25, 40, '356748 '),
(26, 41, '356748 '),
(27, 42, '356748 '),
(28, 43, '356748 '),
(29, 44, '356748 '),
(30, 45, '356748 '),
(31, 46, '356748 '),
(32, 47, '356748 '),
(33, 48, '356748 '),
(34, 49, '356748 '),
(35, 50, '356748 '),
(36, 51, '356748 '),
(37, 52, '356748 '),
(38, 9, '087e9a '),
(39, 10, '087e9a '),
(40, 11, '087e9a '),
(41, 12, '087e9a '),
(42, 13, '087e9a '),
(43, 14, '087e9a '),
(44, 15, '087e9a '),
(45, 17, '087e9a '),
(46, 18, '087e9a '),
(47, 19, '087e9a '),
(48, 20, '087e9a '),
(49, 21, '087e9a '),
(50, 22, '087e9a '),
(51, 23, '087e9a '),
(52, 24, '087e9a '),
(53, 25, '087e9a '),
(54, 26, '087e9a '),
(55, 27, '087e9a '),
(56, 28, '087e9a '),
(57, 29, '087e9a '),
(58, 30, '087e9a '),
(59, 31, '087e9a ');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode`, `kelas`, `pembuat`) VALUES
(5, '356748', 'Aplikasi Mobile MIF-A', 7),
(6, '087e9a', 'Aplikasi Mobile MIF-B', 7),
(7, 'd14909', 'Administrasi Jaringan MIF-A', 8),
(8, 'c96805', 'Administrasi Jaringan MIF-B', 8);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lap` int(11) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_lap`, `id_kelas`, `id_tugas`, `tgl_kirim`, `judul`, `keterangan`, `pengirim`, `file`) VALUES
(5, '6', 10, '2020-07-22', 'Tugas membuat activity', 'ini tugas membuat activity', 9, 'tugas-membuat-activity.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `materi` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelas`, `materi`, `keterangan`, `file`) VALUES
(7, 5, 'Modul 1', 'Membuat Activity', 'modul-1.pdf'),
(8, 5, 'Modul 2', 'membuat Intent\r\n', 'modul-2.pdf'),
(9, 6, 'Modul 1', 'Membuat activity hello world', 'modul-1.pdf'),
(10, 6, 'Modul 2', 'Ini modul 2 android', 'modul-2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'home'),
(2, 'admin'),
(3, 'dosen'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_akses` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id_akses`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(7, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_sub`
--

CREATE TABLE `menu_sub` (
  `id_sub` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_sub`
--

INSERT INTO `menu_sub` (`id_sub`, `id_menu`, `judul`, `url`, `icon`) VALUES
(1, 1, 'Profile', 'home', 'fas fa-fw fa-user-circle'),
(2, 3, 'Dashboard', 'dosen', 'fas fa-fw fa-tachometer-alt'),
(3, 4, 'Dashboard', 'mahasiswa', 'fas fa-fw fa-tachometer-alt'),
(4, 3, 'Kelas', 'dosen/allkelas', 'fas fa-fw fa-school'),
(5, 3, 'Buat kelas', 'dosen/tambahkelas', 'fas fa-fw fa-plus-circle'),
(6, 4, 'Kelas', 'mahasiswa/allkelas', 'fas fa-fw fa-school'),
(7, 4, 'Tambah kelas', 'mahasiswa/tambahkelas', 'fas fa-fw fa-plus-circle'),
(8, 2, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt'),
(9, 2, 'User', 'admin/user', 'fas fa-fw fa-users-cog'),
(10, 2, 'Control', 'admin/control', 'fas fa-fw fa-wrench');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tugas` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_kelas`, `tugas`, `keterangan`, `tgl_selesai`, `is_active`) VALUES
(9, 5, 'Tugas membuat activity', 'Buat activity hello world', '2020-07-25', 1),
(10, 6, 'Tugas membuat activity', 'buat activity hello world', '2020-07-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `alamat`, `jurusan`, `password`, `id_role`, `foto`, `is_active`, `tgl_buat`) VALUES
(1, 'admin@gmail.com', 'admin', '', '', '$2y$10$YC26gtI76DSPe2SpdGZpz.EW1bHtm6IPXpe/Ct/DrocQTwQZXvQ3a', 1, 'default.jpg', 1, 1588081152),
(7, 'slamet@gmail.com', 'Slamet Budi Santoso', 'Nganjuk', 'Manajement Informatika', '$2y$10$3T4TNx2tQ6.w6Tx6OFDyz.ssOa/LNYOfrhsqgxtYfTvyFtEdsdtLu', 2, 'default.jpg', 1, 1593744604),
(8, 'sumiran@gmail.com', 'Sumiran', '', '', '$2y$10$4kwI7SO8KcSCE3Os3944QOc0EtWRm1oZo87YCZjSCceDov3/MLtYG', 2, 'default.jpg', 1, 1593747930),
(9, 'aditya@gmail.com', 'Aditya insani', '', '', '$2y$10$WYlIbUaDN5vfksVBccN4B.zAFWzmvX6dXbe2PTs3JeTr6C6zmN/7u', 3, 'default.jpg', 1, 1593748071),
(10, 'aldano@gamil.com', 'Aldano Wahyu Triobakti', '', '', '$2y$10$akunMhjveip2T0tFC9OdJOWE8JpCswwA74c/ogjTzHJ3iwFNZRh.e', 3, 'default.jpg', 1, 1593748199),
(11, 'anita@gmail.com', 'Anita Slistiowati', '', '', '$2y$10$jF4F0weg9Lb1Fs1UowcTAe8exTSJ3s93hFlgqKXb/7tAYWMhqSvIG', 3, 'default.jpg', 1, 1593748262),
(12, 'ariq@gmail.com', 'Ariq Luthfi Rifqi', '', '', '$2y$10$m3/qCHMef.tSxfWaLlNf2Osz6SHfdtmt3wpFFvh8B4eg0YOIMKhDu', 3, 'default.jpg', 1, 1593748317),
(13, 'ayuk@gmail.com', 'Ayuk Wulandari', '', '', '$2y$10$0jBl0xeMKbhQ1MyEEpAZGeeB/UvXthuRoMEu2B3Q1ml1qVf4YqgX.', 3, 'default.jpg', 1, 1593748374),
(14, 'bactyar@gmail.com', 'Bactiyar Bayu Ardy', '', '', '$2y$10$SUvt5GishDUz.oGgUHoO8e83Kk7J7eVnPGglQbNyTIb7pje2h82wK', 3, 'default.jpg', 1, 1593748438),
(15, 'bagus@gmail.com', 'Bagus Setiawan', '', '', '$2y$10$wpXwo3uP0zjkUTjSaQvlveHePNHHqsstfmvVsn4oj92ipyBwMSX4u', 3, 'default.jpg', 1, 1593748488),
(16, 'eko@gmail.com', 'Eko Tri Yustikawan', 'Nganjuk', 'Manajement Informatika', '$2y$10$d3ceZHU7ntMEQfEXzBU.AO2m0PZ3EyUZuRFvCeX/.FgddSFjVVid6', 3, 'default.jpg', 1, 1593748521),
(17, 'fahmi@gamil.com', 'Fahmi Amrilah Silatur Rochim', '', '', '$2y$10$eF1UCB0kuviV7y6MzchlrOPr4o1kJvHO0PQPwZVwE6rBYLOQgpRGe', 3, 'default.jpg', 1, 1593748632),
(18, 'gustin@gmail.com', 'Gustin Elvira Wiryani', '', '', '$2y$10$1fv01hWOOlW7Ex2et/7y0u8SUrDWbnfhBOtRBEdIySrk3a7WvgB.6', 3, 'default.jpg', 1, 1593748696),
(19, 'akbar@gmail.com', 'Ilmi Akbar Dien Yahya', '', '', '$2y$10$BlHbglGXa.E5Wkix1RQbxe7QvlPUxHduS8Fvkm5ykZkC6ONdB0aWy', 3, 'default.jpg', 1, 1593748742),
(20, 'ilmi@gmail.com', 'Miftahul Ilmi Bahtiar', '', '', '$2y$10$HhC14ZGfFiyKBNw4flzRk.8pCJqJJ/kIImzdyLWT1u3SFffQDaXhq', 3, 'default.jpg', 1, 1593748840),
(21, 'huda@gmail.com', 'miftakhul huda', '', '', '$2y$10$Erxi6L0oZGISEzEFnsTh2uys/h38pHSJSU0vMrVbJ9ZZPt6o4BIrS', 3, 'default.jpg', 1, 1593748876),
(22, 'rony@gmail.com', 'Mohamd Rony Hidayat', '', '', '$2y$10$CXR.ZKgHGOHJPPxXOSIBtuElwlRvt/ufn2ToOk9yYEuzk6uh.lQWu', 3, 'default.jpg', 1, 1593748918),
(23, 'chamid@gamil.com', 'Muhamad Abu Chamid', '', '', '$2y$10$IhGDfucj9eVHtkERJOD79u5o5uR/y..1FsbZgTUVdp511xreePZ3G', 3, 'default.jpg', 1, 1593748952),
(24, 'rival@gmail.com', 'Muhammad Rival Septian', '', '', '$2y$10$o4FZTzVrzLx.0lG.GVAfde4mFqzxGSm6sXC5hDEiJxcuwDcGPg5Ty', 3, 'default.jpg', 1, 1593749026),
(25, 'azizah@gmail.com', 'Nur Azizah', '', '', '$2y$10$IefVd86Lq/I1nGJMOPQkPuGrEKDEbSfr8GF4aWSKAdfOgxSPpw0dG', 3, 'default.jpg', 1, 1593749067),
(26, 'tyas@gmail.com', 'Nur Khoiril Wahyuningtyas', '', '', '$2y$10$3e8zCsTGLJyRJjoO5n5MH.EEcrA88r2jwDxvfIBMe6uLmU.wJW2Aq', 3, 'default.jpg', 1, 1593749126),
(27, 'ocha@gmail.com', 'Ocha Vanya Megarani', '', '', '$2y$10$5q7jX2yvaUclh2H.MpgjauT5mmnv1stztygLaK5ze/J3e9bFptP.2', 3, 'default.jpg', 1, 1593749161),
(28, 'Ragil@gmail.com', 'Ragil Yayang Anjasmoro', '', '', '$2y$10$4uhhmU9DQUUllfWpLE/tZeccqStBYcyR8wqvpxyt9/kA7g84YW37K', 3, 'default.jpg', 1, 1593749232),
(29, 'dani@gmail.com', 'Ramadhanny Maulana Ibra', '', '', '$2y$10$3puC3X0cd3y4dbgkRpBLduP8GDzqsZ7qmWdin0fFzC93htvAtFBMq', 3, 'default.jpg', 1, 1593749283),
(30, 'resti@gmail.com', 'Resti Prastiwi', '', '', '$2y$10$tTcTJqM.DwudKnzarCHKMeutAdrZJhh0ZLLNGRvotTFgBrfkfD0E6', 3, 'default.jpg', 1, 1593749320),
(31, 'teddy@gmail.com', 'Teddy Iswanto', '', '', '$2y$10$bL0i6QHi4AJGrl/DNYqGze9t0lmGG45jflfVBXPtUtINwtMKkvwWG', 3, 'default.jpg', 1, 1593749362),
(32, 'chafil@gmail.com', 'Achmad Fuza Chafil', '', '', '$2y$10$UUrtoep6ax22wJvVzCtl0eiTwS9JMAFRssbXV9iucjnxCZ2hmCn4u', 3, 'default.jpg', 1, 1593750729),
(33, 'affandi@gmail.com', 'Affandi Febrinza Pratama', '', '', '$2y$10$REWjGSF/uxfLpnj1j13ei.e3mKdzYZ1.3.RsuRbo0o7QIk/jUTBwG', 3, 'default.jpg', 1, 1593750787),
(34, 'alfita@gmail.com', 'Alfita Kumalasari', '', '', '$2y$10$Os/f2bNXNEcKBid.965f1Ov.fKc.CL50lRWOFymxd4l6cMdHYNmhW', 3, 'default.jpg', 1, 1593750878),
(35, 'alifdyah@gmail.com', 'Alifdyah Hermasrurin Gusnugraeni', '', '', '$2y$10$cAERvLTb8a6N1CntsYTrg./4n6YURK4z7Trt5CdDbkCNxxB4qIKyi', 3, 'default.jpg', 1, 1593750972),
(36, 'andre@gmail.com', 'Andre Setiyawan', '', '', '$2y$10$LAXzeB7/gUCFP5HKmLRUa.aVWKuPMx2r04GTArD1cMfaU8Z611umq', 3, 'default.jpg', 1, 1593751035),
(37, 'daffa@gmail.com', 'Daffa Fairuz Zain', '', '', '$2y$10$a4qdSF2zLaBhw0uXjoo7zO9LimXPc7OFcc6hLa91qwJWBQ6fJ2fV6', 3, 'default.jpg', 1, 1593751091),
(38, 'feni@gmail.com', 'Feni Andrian', '', '', '$2y$10$q.neDuDsdFhaVvpE5nnD9.pixuhzMNbV4TPstY6Jv.WRK9aj3F7/.', 3, 'default.jpg', 1, 1593751123),
(39, 'firma@gmail.com', 'Firma Fuji Rinti Antika', '', '', '$2y$10$xYkc.LHhEvYd60zvorujouibyMpIeZhpw1SApuVWK4p9hVeOgxy7W', 3, 'default.jpg', 1, 1593751169),
(40, 'handika@gmail.com', 'Handika Kurnia Rahmadhani', '', '', '$2y$10$qEwBwoM9EuhGKXj3B8fGoOEzNS6ojjPMd9Fbw3hZxANJVpYs70W0a', 3, 'default.jpg', 1, 1593751207),
(41, 'hanif@gmail.com', 'Hanif Chintya Ashafira', '', '', '$2y$10$0Vjeb/WTcazoT70QVH0HkeLWOYNhvOLsXo81WVY6TsbnEz51aZLwG', 3, 'default.jpg', 1, 1593751253),
(42, 'ibnu@gmail.com', 'Ibnu Mas ud', '', '', '$2y$10$AiMS8Bb3DF00MRGlU.Le4.CHDzcV/to0MqP65Jz1L3Ev/fROLwOde', 3, 'default.jpg', 1, 1593751283),
(43, 'mira@gmail.com', 'Mira Kholifah Karyanti Putri', '', '', '$2y$10$lSapsUeDszwoLie.yENuLOhyvN2Q.RcZcrJawvbFLOO5S2Vp447ai', 3, 'default.jpg', 1, 1593751394),
(44, 'mita@gmail.com', 'Mita Diantika', '', '', '$2y$10$TGALOWsQxMV4uxFu4oNmleNsPjuQHSUvrnG3QA9ZOCeWpWu9pMRH6', 3, 'default.jpg', 1, 1593751426),
(45, 'afie@gmail.com', 'Mohammad Afie Mujaddi', '', '', '$2y$10$h5yGaKIs1qbHK6JqbiWgV.akrx5s.P5ezPXHy5vzt3F/arTsEbRSO', 3, 'default.jpg', 1, 1593751470),
(46, 'taufik@gmail.com', 'Muhammad Taufik', '', '', '$2y$10$9LUs22IiNNOqrb4M4KA0Nekd8SuiY7EkbM5/5qfjCHgsz4enwkyN6', 3, 'default.jpg', 1, 1593751526),
(47, 'mujiati@gmail.com', 'Mujiati Nur Devina Mulyanza', '', '', '$2y$10$8jfo5m8mFZqG/Ps/VdNFhuyaZX6wnoo1EKumQ0wydfRKbddXvlirC', 3, 'default.jpg', 1, 1593751588),
(48, 'nabila@gmail.com', 'Nabila Aulia Puspita Maharani', '', '', '$2y$10$oGw2uC9Aub8oAEuavyhYCu3.dTTlx8ZeiAiIjvC0p21RiKt3Ht9Y2', 3, 'default.jpg', 1, 1593751644),
(49, 'nitta@gmail.com', 'Nitta Puspitasari', '', '', '$2y$10$x4QRvfq0s3EJAoNAESyuZu045kqBuolRT.DfefNevTz3yEHZqjHRe', 3, 'default.jpg', 1, 1593751677),
(50, 'puji@gmail.com', 'Puji Santoso', '', '', '$2y$10$ebJMAL.B3k.dCacqKXbepeLsn0foVxBF3EZ774hyjmlLKin05QW7q', 3, 'default.jpg', 1, 1593751710),
(51, 'utami@gmail.com', 'Tri utami', '', '', '$2y$10$LM6PWEs3E9.ADztsZWXOB.0izNffeFsAxyvaaBo9GsQrCZaXtQyTC', 3, 'default.jpg', 1, 1593751741),
(52, 'yayang@gmail.com', 'Yayang Harybahagyawaty', '', '', '$2y$10$pg5Ag4a.gdGeOYuJuE.WbObQBDnXkswO34aiepKl4fOJOBJTUn/4i', 3, 'default.jpg', 1, 1593751793);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
