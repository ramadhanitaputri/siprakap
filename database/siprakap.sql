-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 05:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siprakap`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `s_kelurahan` varchar(225) NOT NULL,
  `s_lpm` varchar(225) NOT NULL,
  `s_linmas` varchar(225) NOT NULL,
  `s_pemuda` varchar(225) NOT NULL,
  `k_rtrw` varchar(225) NOT NULL,
  `pembimbing` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `profile`, `s_kelurahan`, `s_lpm`, `s_linmas`, `s_pemuda`, `k_rtrw`, `pembimbing`) VALUES
(1, 'Kerja Praktek merupakan salah satu mata kuliah dan program dari PENS PSDKU Lamongan yang harus diikuti oleh setiap mahasiswa sebagai syarat untuk kelulusannya. Kerja Praktek (KP) merupakan suatu bentuk implementasi perkuliahan yang dilakukan secara langsung ke suatu Instansi atau suatu Perusahaan.\r\n<br><br>\r\n       Bagaimana proses kerja praktek? Mahasiswa yang telah mengambil matakuliah kerja praktek selanjutnya mencari tempat, instansi atau perusahaan untuk menyelesaikan matakuliah ini. Mahasiswa membuat surat permohonan kerja praktek ke kampus, kampus mengeluarkan surat keterangan sesuai dengan surat\r\npermohonan. Selanjutnya instansi atau perusahaan mengeluarkan surat balasan bahwa mahasiswa yang dimaksud melakukan kerja praktek pada instansi atau perusahaan tersebut.', '3.png', '4.png', '5.png', '7.png', '8.png', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp_mhs_2` varchar(50) NOT NULL,
  `nama_mhs_2` varchar(100) NOT NULL,
  `nrp_mhs_3` varchar(50) NOT NULL,
  `nama_mhs_3` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tmpt_lhr` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `status_mhs` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `nrp_mhs_2`, `nama_mhs_2`, `nrp_mhs_3`, `nama_mhs_3`, `no_hp`, `tmpt_lhr`, `tgl_lhr`, `pekerjaan`, `alamat`, `rt`, `rw`, `status_mhs`) VALUES
('3120521001', 'Siti Ayu Mutmainatin', '3120521015', 'Nur Alifia', '3120521019', 'Ramadhanita Putri H. P.', 'Dinas Komunikasi dan Informatika Lamongan', '', '0000-00-00', '', '', 0, 0, 1),
('3120521002', 'Deatri Nari Ratih', '3120521013', 'Moch. Shodiq Ircham', '3120521022', 'Iksal Febrianto', 'Dinas Komunikasi dan Informatika Jawa Timur', '', '0000-00-00', '', '', 0, 0, 0),
('3120521003', 'Mochammad Alfarizi R.', '3120521010', 'Yovie Andrean', '3120521027', 'Marcel Bintang S.', 'PT. Otak Kanan', '', '0000-00-00', '', '', 0, 0, 1),
('3120521004', 'Dewi Sa\'aidah SJ ', '3120521006', 'Aprilia Dwi Endarwati', '3120521007', 'Cicilia Ayuningdias Saputri', 'Badan Pusat Statistik Kab. Lamongan ', '', '0000-00-00', '', '', 0, 0, 0),
('3120521005', 'Dwi Wahyuni', '3120521009', 'Rizqi Amalia Putri', '3120521017', 'Anggi Fransiska Putri H.', 'PT. Digital Media Telematika', '', '0000-00-00', '', '', 0, 0, 0),
('3120521012', 'Bimo Suryo Prayogo', '3120521025', 'Achmad Nanda Risky P', '3120521018', 'Ageng Bagus Prambudi ', 'Komisi Pemilihan Umum Kab. Lamongan', '', '0000-00-00', '', '', 0, 0, 0),
('3120521016', 'Fanny Maulana Rizky', '', '', '', '', 'PT Jaster Intermedia Network', '', '0000-00-00', '', '', 0, 0, 0),
('3120521023', 'Sigit Khoirun Nizam', '3120521030', 'Okky Roy Dirgantara', '', '', 'PT. Bank Rakyat Indonesia', '', '0000-00-00', '', '', 0, 0, 0),
('3120521028', 'Muhammad Sholikul Jihan ', '', '', '', '', 'PT Duta Media Cipta', '', '0000-00-00', '', '', 0, 0, 1),
('5120521005', 'Dita Aulia Rahma', '', '', '', '', 'Badan Pusat Statistik Kabupaten Tuban', '', '0000-00-00', '', '', 0, 0, 0),
('5120521007', 'Amany Firdaus Marine', '', '', '', '', 'PT Educa Sisfomedia Indonesia', '', '0000-00-00', '', '', 0, 0, 0),
('5120521009', 'Fadia Laila Rahma', '', '', '', '', 'PT Educa Sisfomedia Indonesia', '', '0000-00-00', '', '', 0, 0, 0),
('5120521010', 'Risma Ayu Damayanti', '', '', '', '', 'PT. Solusi Karya Nusantara', '', '0000-00-00', '', '', 0, 0, 0),
('5120521013', 'Salsabil Tsabita An Nabilah', '', '', '', '', 'PT Educa Sisfomedia Indonesia', '', '0000-00-00', '', '', 0, 0, 0),
('5120521021', 'La Ode Muhammad Badar Pramuditya', '', '', '', '', 'PT Aksara Dinamika Jogja', '', '0000-00-00', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id` varchar(100) NOT NULL,
  `NIK` varchar(200) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id`, `NIK`, `jenis_surat`, `tanggal`, `file`, `status`) VALUES
('IT-0635760023', '3120521002', 'IT', '2023-05-19', 'IT646781dae045enfo.pdf', '1'),
('IT-1306150023', '3120521005', 'IT', '2023-05-19', 'IT6467816669e19nfo.pdf', '3'),
('IT-26T10790023', '3120521001', 'IT', '2023-06-25', 'IT6497c2fd0c8bfnfo.pdf', '5'),
('IT-2I98170023', '3120521023', 'IT', '2023-06-25', 'IT6497c22fc312anfo.pdf', '1'),
('IT-65T8440023', '3120521003', 'IT', '2023-05-19', 'IT6467808d27fcenfo.pdf', '5'),
('IT-72e7270023', '3120521016', 'IT', '2023-05-19', 'IT646782256b702nfo.pdf', '5'),
('IT-7326120023', '3120521028', 'IT', '2023-05-19', 'IT64677fc2e5764nfo.pdf', '5'),
('IT-8885980023', '3120521004', 'IT', '2023-05-19', 'IT64678290e49dcnfo.pdf', '4'),
('IT-9bd8480023', '3120521012', 'IT', '2023-06-25', 'IT6497c2aad7039nfo.pdf', '1'),
('MMB-06810713023', '5120521009', 'MMB', '2023-06-25', 'MMB6497c8253d302MMB.pdf', '5'),
('MMB-0Me7115023', '5120521021', 'MMB', '2023-06-25', 'MMB6497c879824beMMB.pdf', '5'),
('MMB-4098714023', '5120521013', 'MMB', '2023-06-25', 'MMB6497c84d4ae8aMMB.pdf', '1'),
('MMB-42B11310023', '5120521005', 'MMB', '2023-06-25', 'MMB6497c777cae85MMB.pdf', '5'),
('MMB-47610211023', '5120521010', 'MMB', '2023-06-25', 'MMB6497c7a89f4f1MMB.pdf', '5'),
('MMB-7725512023', '5120521007', 'MMB', '2023-06-25', 'MMB6497c7f12f368MMB.pdf', '5');

-- --------------------------------------------------------

--
-- Table structure for table `rekapan`
--

CREATE TABLE `rekapan` (
  `id_rekapan` int(11) NOT NULL,
  `nama_1` varchar(100) NOT NULL,
  `nama_2` varchar(100) NOT NULL,
  `nama_3` varchar(100) NOT NULL,
  `nrp_1` varchar(50) NOT NULL,
  `nrp_2` varchar(50) NOT NULL,
  `nrp_3` varchar(50) NOT NULL,
  `rekening_1` varchar(50) NOT NULL,
  `rekening_2` varchar(50) NOT NULL,
  `rekening_3` varchar(50) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `dospem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekapan`
--

INSERT INTO `rekapan` (`id_rekapan`, `nama_1`, `nama_2`, `nama_3`, `nrp_1`, `nrp_2`, `nrp_3`, `rekening_1`, `rekening_2`, `rekening_3`, `tempat`, `dospem`) VALUES
(1, 'Siti Ayu Mutmainatin', 'Nur Alifia', 'Ramadhanita Putri', '3120521001', '3120521015', '3120521019', '1400020030384', '1400020031184', '1400020031051', 'Dinas Komunikasi dan Informatika Lamongan', 'Arif Basofi, S.Kom., M.Kom.'),
(2, 'Muhammad Sholikul Jihan Mukminin', '', '', '3120521028', '', '', '1390026670913', '', '', 'PT Duta Media Cipta', 'Mohammad Robihul Mufid, S.ST., M.Tr.Kom.'),
(3, 'Mochammad Alfarizi R.', 'Yovie Andrian', 'Marcell Bintang S.', '3120521003', '3120521010', '3120521027', '1400020170826', '1400020170628', '1410023274913', 'PT. Otak Kanan', 'Saniyatul Mawaddah, S. ST., M.Kom.');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `nama_surat_keluar` varchar(100) NOT NULL,
  `tanggal_surat_keluar` date NOT NULL,
  `keterangan_surat_keluar` varchar(100) NOT NULL,
  `file_surat_keluar` varchar(200) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `terima_kasih` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nama_surat_keluar`, `tanggal_surat_keluar`, `keterangan_surat_keluar`, `file_surat_keluar`, `nomor_surat`, `terima_kasih`) VALUES
(33, '[Muhammad Sholikul Jihan  - 3120521028] - Teknik Informatika', '2023-05-19', 'IT-7326120023', '', '2873/PL14/TI/2022', ''),
(34, '[Mochammad Alfarizi R. - 3120521003] - Teknik Informatika', '2023-05-19', 'IT-65T8440023', '', '6122/PL14/TI/2022', '1077/PL14/TI/2023'),
(35, '[Fanny Maulana Rizky - 3120521016] - Teknik Informatika', '2023-05-19', 'IT-72e7270023', '', '3900/PL14/TI/2022', ''),
(39, '[Siti Ayu Mutmainatin - 3120521001] - Teknik Informatika', '2023-06-25', 'IT-26T10790023', '', '2868/PL14/TI/2022', ''),
(40, '[Dita Aulia Rahma - 5120521005] - Multimedia Broadcasting', '2023-06-25', 'MMB-42B11310023', '', '5548/PL14/MB/2022', ''),
(41, '[Risma Ayu Damayanti - 5120521010] - Multimedia Broadcasting', '2023-06-25', 'MMB-47610211023', '', '5602/PL14/MB/2022', ''),
(42, '[Amany Firdaus Marine - 5120521007] - Multimedia Broadcasting', '2023-06-25', 'MMB-7725512023', '', '5604/PL14/MB/2022', ''),
(43, '[La Ode Muhammad Badar Pramuditya - 5120521021] - Multimedia Broadcasting', '2023-06-25', 'MMB-0Me7115023', '', '5622/PL14/MB/2022', ''),
(44, '[Fadia Laila Rahma - 5120521009] - Multimedia Broadcasting', '2023-06-25', 'MMB-06810713023', '', '5605/PL14/MB/2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_surat_keterangan` int(11) NOT NULL,
  `nama_surat_keterangan` varchar(100) NOT NULL,
  `tempat_surat_keterangan` varchar(100) NOT NULL,
  `tanggal_surat_keterangan` date NOT NULL,
  `keterangan_surat_keterangan` varchar(100) NOT NULL,
  `file_surat_keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_surat_keterangan`, `nama_surat_keterangan`, `tempat_surat_keterangan`, `tanggal_surat_keterangan`, `keterangan_surat_keterangan`, `file_surat_keterangan`) VALUES
(10, 'IT-7326120023', 'PT Duta Media Cipta', '2023-04-02', 'Teknik Informatika', 'PT__Duta_Media_Cipta.pdf'),
(11, 'IT-72e7270023', 'PT Jaster Intermedia Network', '2023-03-03', 'Teknik Informatika', 'PT__Jaster_Intermedia_Network.pdf'),
(12, 'IT-65T8440023', 'PT. Otak Kanan', '2023-02-04', 'Teknik Informatika', 'PT__Otak_Kanan.pdf'),
(14, 'IT-26T10790023', 'Dinas Komunikasi dan Informatika Lamongan', '2023-06-25', 'Teknik Informatika', 'Dinas_Komunikasi_dan_Informatika_Lamongan.pdf'),
(15, 'MMB-42B11310023', 'Badan Pusat Statistik Kabupaten Tuban', '2023-06-01', 'Multimedia Broadcasting', 'Badan_Pusat_Statistik_Kabupaten_Tuban.pdf'),
(16, 'MMB-47610211023', 'PT. Solusi Karya Nusantara', '2023-06-05', 'Multimedia Broadcasting', 'PT__Solusi_Karya_Nusantara.pdf'),
(17, 'MMB-7725512023', 'PT Educa Sisfomedia Indonesia', '2023-06-07', 'Multimedia Broadcasting', 'PT__Educa_Sisfomedia_Indonesia_(Amany).pdf'),
(18, 'MMB-0Me7115023', 'PT Aksara Dinamika Jogja', '2023-06-12', 'Multimedia Broadcasting', 'PT__Aksara_Dinamika_Jogja.pdf'),
(19, 'MMB-06810713023', 'PT Educa Sisfomedia Indonesia', '2023-06-16', 'Multimedia Broadcasting', 'PT__Educa_Sisfomedia_Indonesia_(Fadia).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `nama_surat_masuk` varchar(100) NOT NULL,
  `tempat_surat_masuk` varchar(100) NOT NULL,
  `tanggal_surat_masuk` date NOT NULL DEFAULT current_timestamp(),
  `keterangan_surat_masuk` varchar(100) NOT NULL,
  `prodi_surat_masuk` varchar(100) NOT NULL,
  `file_surat_masuk` varchar(200) NOT NULL,
  `nomor_surat_masuk` varchar(100) NOT NULL,
  `status_surat_masuk` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nama_surat_masuk`, `tempat_surat_masuk`, `tanggal_surat_masuk`, `keterangan_surat_masuk`, `prodi_surat_masuk`, `file_surat_masuk`, `nomor_surat_masuk`, `status_surat_masuk`) VALUES
(24, 'IT-7326120023', 'PT Duta Media Cipta', '2023-07-12', '', 'Teknik Informatika', 'PT_Duta_Media_Cipta.pdf', '', 0),
(25, 'IT-65T8440023', 'PT Otak Kanan', '2023-05-19', '', 'Teknik Informatika', 'PT__Otak_Kanan_.pdf', '', 1),
(30, 'IT-26T10790023', 'Dinas Komunikasi dan Informatika Lamongan', '2023-06-27', '', 'Teknik Informatika', 'Dinas_Komunikasi_dan_Informatika_Lamongan.pdf', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terima_kasih`
--

CREATE TABLE `terima_kasih` (
  `id_terima_kasih` int(11) NOT NULL,
  `nama_terima_kasih` varchar(100) NOT NULL,
  `tempat_terima_kasih` varchar(100) NOT NULL,
  `tanggal_terima_kasih` date NOT NULL DEFAULT current_timestamp(),
  `prodi_terima_kasih` varchar(100) NOT NULL,
  `file_terima_kasih` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terima_kasih`
--

INSERT INTO `terima_kasih` (`id_terima_kasih`, `nama_terima_kasih`, `tempat_terima_kasih`, `tanggal_terima_kasih`, `prodi_terima_kasih`, `file_terima_kasih`) VALUES
(2, 'IT-65T8440023', 'PT. Otak Kanan', '2023-05-21', 'Teknik Informatika', 'Surat_Ucapan_Terima_Kasih_PT_Otak_Kanan_docx.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'koordinator'),
(8, 'baak', 'baak', 'baak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapan`
--
ALTER TABLE `rekapan`
  ADD PRIMARY KEY (`id_rekapan`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id_surat_keterangan`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `terima_kasih`
--
ALTER TABLE `terima_kasih`
  ADD PRIMARY KEY (`id_terima_kasih`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekapan`
--
ALTER TABLE `rekapan`
  MODIFY `id_rekapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_surat_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `terima_kasih`
--
ALTER TABLE `terima_kasih`
  MODIFY `id_terima_kasih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
