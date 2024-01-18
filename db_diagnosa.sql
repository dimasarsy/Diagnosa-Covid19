-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2021 pada 20.33
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diagnosa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(4) NOT NULL,
  `id_pasien` int(4) DEFAULT NULL,
  `iduser` int(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `persentase` double NOT NULL,
  `tanggal` datetime NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `iduser` char(4) NOT NULL,
  `id_dokter` int(7) NOT NULL,
  `lahir` char(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` char(30) NOT NULL,
  `praktek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`iduser`, `id_dokter`, `lahir`, `tgl_lahir`, `kelamin`, `praktek`) VALUES
('57', 12, 'Bandung', '1952-10-15', 'P', 'RS Pasar Rebo Jakarta'),
('58', 13, 'Jakarta', '1953-05-13', 'P', 'RS Pondok Kopi'),
('59', 14, 'Lampung', '1954-06-10', 'L', 'RSPAD Gatot Soebroto'),
('60', 15, 'Medan', '1949-05-14', 'P', 'RS Pertamina Jaya'),
('61', 16, 'Solo', '1950-04-04', 'P', 'RS Fatmawati'),
('62', 17, 'Jakarta', '1956-05-25', 'P', 'RS Pusat Pertamina'),
('63', 18, 'Jakarta', '1964-11-12', 'P', 'RS Griya Husada'),
('64', 19, 'Jakarta', '1961-04-11', 'L', 'RSUD Koja'),
('65', 20, 'Medan', '1966-03-29', 'L', 'RSUD Bakti Husada'),
('66', 21, 'Padang', '1964-04-11', 'P', 'RS Islam Jakarta Utara'),
('67', 22, 'Bandung', '1955-07-09', 'L', 'RS Harapan Bunda Jakarta Timur'),
('69', 24, 'Medan', '1962-08-11', 'P', 'RSUD Tarakan Jakarta Pusat'),
('70', 25, 'Surabaya', '1968-10-08', 'L', 'RSPAD Gatot Soebroto'),
('71', 26, 'Jakarta', '1971-04-03', 'L', 'RS Fatmawati'),
('72', 27, 'Padang', '1977-06-18', 'P', 'RS Persahabatan - Jakarta'),
('73', 28, 'Bandung', '1967-04-29', 'P', 'RS Hermina Grand Wisata Bekasi'),
('74', 29, 'Surabaya', '1969-10-18', 'L', 'RS International Bintaro'),
('75', 30, 'Semarang', '1983-08-06', 'P', 'RS Fatmawati'),
('76', 31, 'Surabaya', '1977-04-21', 'L', 'RS Harapan Bunda Jakarta Timur'),
('77', 32, 'Surabaya', '1976-06-23', 'P', 'RS Setia Mitra Jakarta Selatan'),
('78', 33, 'Bandung', '1979-06-13', 'P', 'RS Pondok Indah'),
('79', 34, 'Cianjur', '1971-03-11', 'P', 'RS Pusat Pertamina'),
('80', 35, 'Surabaya', '1966-06-16', 'L', 'RS Fatmawati'),
('81', 36, 'Jakarta', '1960-08-29', 'L', 'RS Cipto Mangunkusumo'),
('82', 37, 'Bandung', '1972-04-01', 'P', 'RS Harapan Bunda Jakarta Timur'),
('83', 38, 'Makasar', '1974-11-07', 'L', 'RSPAD Gatot Soebroto'),
('84', 39, 'Bandung', '1971-11-12', 'L', 'RS Harapan Bunda Jakarta Timur'),
('85', 40, 'Manado', '1977-07-20', 'P', 'RSUD Koja'),
('86', 41, 'Malang', '1976-04-05', 'L', 'RSUD Bakti Husada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G006', 'Demam'),
('G001', 'Batuk Ringan, Pilek, dan Bersin'),
('G007', 'Batuk Kering'),
('G008', 'fatigue (kelelahan ringan)'),
('G009', 'Anoreksia(gangguan makan)'),
('G004', 'Nyeri tenggorokan'),
('G017', 'Sesak napas tanpa distrees pernapasan'),
('G010', 'Anosmia (kehilangan indra penciuman)'),
('G011', 'Ageusia (hilang indra pengecapan)'),
('G012', ' malgia (nyeri tulang)'),
('G013', 'Mual dan atau Muntah'),
('G014', 'Nyeri perut dan atau diare'),
('G015', 'Konjungtivitas (mata merah)'),
('G016', 'Kemerahan pada kulit dan atau ada perubahan warna pada jari kaki'),
('G005', 'Sakit Kepala\r\n'),
('G018', 'ARDS (Gagal napas)'),
('G019', 'Sepsis (Infeksi organ)'),
('G020', 'Syok sepsis (kegagalan organ dan tekanan darah sangat rendah)'),
('G021', 'Multiorgan failure (Kegagalan multiorgan)'),
('G022', 'Frekuensi napas: 12-20 kali/menit - Saturasi oksigen >= 95%'),
('G023', 'Frekuensi napas: 12-20 kali/menit - Saturasi oksigen: <= 95%'),
('G024', 'Frekuensi napas: 20-30 kali/menit - Saturasi oksigen: < 95%'),
('G025', 'Frekuensi napas: >= 30 kali/menit - Saturasi oksigen: <= 95 persen'),
('G002', 'Bersin-bersin'),
('G003', 'Hidung tersumbat dan berair');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala_pasien`
--

CREATE TABLE `gejala_pasien` (
  `id_gejala_pasien` int(3) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `id_pasien` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(4) NOT NULL,
  `iduser` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `definisi` text,
  `solusi` text,
  `lama_perawatan` text,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`, `lama_perawatan`, `keterangan`) VALUES
('P001', 'Tanpa Gejala', 'Isolasi mandiri di rumah, fasilitas isolasi pemerintah\r\n', 'Vitamin C, D, dan Zinc', '10 hari isolasi sejak pengambilan spesimen diagnosis konfirmasi', 'Pengidap Covid-19 tanpa gejala disarankan untuk menjalani isolasi mandiri di rumah atau fasilitas isolasi mandiri yang disediakan pemerintah dan sejumlah institusi. Isolasi mandiri tersebut dilakukan minimal selama 10 hari sejak pengidap dinyatakan positif Covid-19. Selama menjalani isolasi mandiri, pasien perlu rutin berkonsultasi dengan tenaga kesehatan secara daring atau petugas puskesmas. Selain itu, hindari sembarangan mengonsumsi obat tanpa konsultasi dan pengawasan dari tenaga kesehatan.\r\n'),
('P002', 'Gejala Ringan', 'Fasilitas isolasi pemerintah, isolasi mandiri di rumah bagi yang memenuhi syarat.', 'Oseltamivir atau favipiravir, Vitamin C, D, dan Zinc.', '10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.', 'Pengidap Covid-19 gejala ringan disarankan untuk menjalani isolasi mandiri di rumah atau fasilitas isolasi mandiri yang disediakan pemerintah dan sejumlah institusi. Isolasi mandiri tersebut dilakukan minimal selama 10 hari sejak pengidap dinyatakan positif Covid-19, ditambah tiga hari bebas demam dan gangguan pernapasan. Selama menjalani isolasi mandiri, pasien perlu rutin berkonsultasi dengan tenaga kesehatan atau petugas puskesmas secara daring . Hindari sembarangan mengonsumsi obat tanpa konsultasi dan pengawasan dari tenaga kesehatan.'),
('P003', 'Gejala Sedang', 'Rumah Sakit Lapangan, Rumah Sakit Darurat COVID-19, Rumah Sakit Non Rujukan, Rumah Sakit Rujukan.', 'Favipiravir, remdesivir 200 mgIV, azitromisin, kartikosteroid, Vitamin C, D, dan Zinc, Antikoagulan LMWH/UFH berdasarkan evaluasi Dokter penanggung jawab (DPJP), pengorbatan komorbid bila ada, terapi O2 secara noninvasif dengan arus sedang sampai tinggi (HFNC)', '10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.', 'Pengidap Covid-19 gejala sedang disarankan untuk menjalani isolasi mandiri di rumah atau fasilitas isolasi mandiri yang disediakan pemerintah dan sejumlah institusi. Isolasi mandiri tersebut dilakukan minimal selama 10 hari sejak pengidap dinyatakan positif Covid-19, ditambah tiga hari bebas demam dan gangguan pernapasan. Selama menjalani isolasi mandiri, pasien perlu rutin berkonsultasi dengan tenaga kesehatan atau petugas puskesmas lewat telepon. Hindari sembarangan mengonsumsi obat tanpa konsultasi dan pengawasan dari tenaga kesehatan.'),
('P004', 'Gejala Berat', 'HCU/ICU Rumah Sakit Rujukan\r\n', 'Favipiravir, remdesivir, azitromisin, kartikosteroid, Vitamin C, D, dan Zinc, Antikoagulan LMWH/UFH berdasarkan evaluasi Dokter penanggung jawab (DPJP), pengorbatan komorbid bila ada, HFNC/ventilator, terapi tambahan.', '10 hari isolasi sejak timbul gejala dan minimal 3 hari bebas gejala.', 'Pada pasien Covid-19 kritis, beberapa gejala Covid-19 berat di atas disertai gangguan pernapasan berat (ARDS), sepsis atau komplikasi infeksi, dan gagal organ. Pengidap Covid-19 gejala berat disarankan untuk menjalani isolasi di rumah sakit dengan pengawasan intensitf dari dokter dan petugas kesehatan. Isolasi tersebut dilakukan minimal selama 10 hari sejak pengidap dinyatakan positif Covid-19, ditambah tiga hari bebas demam dan gangguan pernapasan. Dokter biasanya akan merekomendasikan perlu tidaknya pasien Covid-19 gejala berat menjalani tes swab PCR ulang atau tidak.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id_rule`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(74, 'G010', 'P004', 0.33),
(18, 'G010', 'P003', 0.33),
(17, 'G014', 'P002', 0.33),
(16, 'G014', 'P003', 0.33),
(15, 'G005', 'P004', 0.33),
(14, 'G013', 'P002', 0.33),
(83, 'G017', 'P003', 0.5),
(12, 'G013', 'P003', 0.33),
(11, 'G012', 'P003', 0.33),
(10, 'G011', 'P004', 0.33),
(9, 'G012', 'P002', 0.33),
(8, 'G004', 'P004', 0.33),
(7, 'G004', 'P003', 0.33),
(109, 'G002', 'P002', 0.33),
(5, 'G009', 'P003', 0.33),
(4, 'G009', 'P004', 0.33),
(3, 'G009', 'P002', 0.33),
(2, 'G007', 'P003', 0.33),
(19, 'G016', 'P003', 0.33),
(20, 'G015', 'P004', 0.33),
(21, 'G016', 'P002', 0.33),
(23, 'G016', 'P004', 0.33),
(106, 'G001', 'P002', 0.33),
(107, 'G001', 'P003', 0.33),
(66, 'G010', 'P002', 0.33),
(75, 'G013', 'P004', 0.33),
(69, 'G006', 'P004', 0.33),
(70, 'G005', 'P002', 0.33),
(72, 'G008', 'P003', 0.33),
(73, 'G008', 'P004', 0.33),
(82, 'G018', 'P004', 0.8),
(77, 'G011', 'P002', 0.33),
(78, 'G006', 'P003', 0.33),
(79, 'G005', 'P003', 0.33),
(80, 'G012', 'P004', 0.33),
(84, 'G019', 'P004', 0.8),
(85, 'G024', 'P003', 0.8),
(86, 'G025', 'P004', 0.8),
(89, 'G007', 'P004', 0.33),
(93, 'G011', 'P003', 0.33),
(94, 'G014', 'P004', 0.33),
(92, 'G008', 'P002', 0.33),
(95, 'G015', 'P002', 0.33),
(96, 'G015', 'P003', 0.33),
(97, 'G020', 'P004', 0.8),
(98, 'G021', 'P004', 0.8),
(99, 'G022', 'P001', 0.8),
(100, 'G023', 'P002', 0.8),
(108, 'G001', 'P003', 0.33),
(102, 'G007', 'P002', 0.33),
(103, 'G006', 'P002', 0.33),
(104, 'G004', 'P002', 0.33),
(110, 'G002', 'P003', 0.33),
(111, 'G002', 'P004', 0.33),
(112, 'G003', 'P002', 0.33),
(113, 'G003', 'P003', 0.33),
(114, 'G003', 'P004', 0.33),
(115, 'G017', 'P004', 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skrining`
--

CREATE TABLE `skrining` (
  `kd_skrining` char(4) NOT NULL,
  `skrining` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skrining`
--

INSERT INTO `skrining` (`kd_skrining`, `skrining`) VALUES
('S01', 'Apakah pernah keluar rumah/tempat umum (pasar, fasilitas pelayanan kesehatan, kerumunan orang, dll) ?'),
('S02', 'Apakah pernah menggunakan transportasi umum ?'),
('S03', 'Apakah pernah melakukukan perjalanan keluar kota/internasional ? (wilayah yang terjangkit / zona merah)'),
('S04', 'Apakah anda mengikuti kegiatan yang melibatkan orang banyak ?'),
('S05', 'Apakah anda memiliki riwayat kontak langsung/tidak langsung dengan orang yang dinyatakan ODP,PDP, atau terkonfirmasi covid-19 ?'),
('S06', 'Saat ini anda sedang merasakan demam, batuk, dan pilek ?'),
('S07', 'Saat ini Anda merasa kesulitan bernafas atau sesak nafas, nyeri tenggorokan ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skrining_pasien`
--

CREATE TABLE `skrining_pasien` (
  `id_skrining_pasien` int(3) NOT NULL,
  `id_pasien` int(4) NOT NULL,
  `kd_skrining` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Izam', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(51, 'Dimas', 'dimas', '7d49e40f4b3d8f68c19406a58303f826', 'admin'),
(57, 'dr. Nancy Maria. Sp.P', 'nancy', '7b0f81bdd2b24ba32cb27f6c16e6b900', 'dokterparu'),
(58, 'Dr. Priyanti Sekar W. Sp.P(K)', 'priyanti', '6dda3d34c4b64de35ee44022a05f2406', 'dokterparu'),
(59, 'Dr. Supriyantoro Hamdi Sp.P MARS', 'supriyantoro', 'bb01df0f3a4dafa62215ae860878ba30', 'dokterparu'),
(60, 'Dr. Saharawati J. Sp. P', 'saharawati', 'ec6b90b9304826f84644f2403057a29e', 'dokterparu'),
(61, 'Dr. Caecilia Ariyani Sp.P', 'caecilia', '93974ff924fbbd86fd517e4b2cd6b3de', 'dokterparu'),
(62, 'Dr. Sutji Astuti P Sp.P', 'sutji', '6a3da7cf02235f5fb84760ff63254684', 'dokterparu'),
(63, 'Dr. Dwi Syanthi Sumarni Sp.P', 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'dokterparu'),
(64, 'Dr. Hamdi Ramadhani Sp.P', 'hamdi', '43423adfc48147f0ed1777d0080dd802', 'dokterparu'),
(65, 'Dr. Syafrizal Anwar, SpP', 'syafrizal', 'd0782a3a76385d3d279ba666132091a5', 'dokterparu'),
(66, 'Dr. Erlina Yulianti, MSc, SpP', 'erlina', '41d93c474a0e06142a7a4052444e69e9', 'dokterparu'),
(67, 'dr. Marthin Alex, Sp PD', 'marthin', '9e8387ae6a13bfc27b3389368134def3', 'dokterdalam'),
(69, 'dr. Martina Safitri, Sp PD FINASIM', 'martina', 'a32afbe54e4fbab0c8c44c01f5b90792', 'dokterdalam'),
(70, 'dr. Christofel Hutapea, Sp PD FINASIM', 'christofel', '1a5379978be8dd62c2c491f65dabe67a', 'dokterdalam'),
(71, 'dr. Satriyo Dirgantara, Sp PD', 'satriyo', 'bcc98c1b0cadb36ec1864c26733713ba', 'dokterdalam'),
(72, 'dr. Rida Maya M,SpPD', 'rida', '48404a63a11363d74ceaa5088d3ae2cf', 'dokterdalam'),
(73, 'dr. Yani Mulyani SpPD', 'yani', '080840925a7e2087673145d83918c658', 'dokterdalam'),
(74, 'dr. Anton Salim,Sp.PD', 'anton', '784742a66a3a0c271feced5b149ff8db', 'dokterdalam'),
(75, 'dr. Yessi Tika', 'yessi', '783d77339a4ea762b7869abe85b24e87', 'dokterumum'),
(76, 'dr. Dickson Julio', 'dickson', '2154f28665b529473f56a08e79568ab3', 'dokterumum'),
(77, 'dr. Dewy Magdalena', 'dewy', 'f37c5037e960fc76ccd3e3e6c7c21201', 'dokterumum'),
(78, 'dr. Resti Adiyana', 'resti', 'f5a7a91022921bea8248c0b7176902ed', 'dokterumum'),
(79, 'dr. Cahyani Putri Azzahra', 'cahyani', '4f33c80cd57c096bb6058428a6eca467', 'dokterumum'),
(80, 'dr. Dian Anugerah', 'dian', 'f97de4a9986d216a6e0fea62b0450da9', 'dokterumum'),
(81, 'dr. Mulyadi Atmaja', 'mulyadi', 'ef34c0dc47139e55c72bb333c3810131', 'dokterumum'),
(82, 'dr. Vianny Alessia', 'vianny', '2f73d21d6316dd2255873da95ebdbfa0', 'dokterumum'),
(83, 'dr. Satya Budiman', 'satya', '1cbff3d2bdcc7486cc38d9edd9c024df', 'dokterumum'),
(84, 'dr. Widjaja Â Saputro , M.D.', 'widjaja', '64f709d56c68cb0688ab076e5ed82680', 'dokterumum'),
(85, 'dr. Lisa Yanti', 'lisa', 'ed14f4a4d7ecddb6dae8e54900300b1e', 'dokterumum'),
(86, 'dr. Hendra Hadibrata', 'hendra', 'a04cca766a885687e33bc6b114230ee9', 'dokterumum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `iduser` int(4) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  ADD PRIMARY KEY (`id_gejala_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `skrining`
--
ALTER TABLE `skrining`
  ADD PRIMARY KEY (`kd_skrining`);

--
-- Indexes for table `skrining_pasien`
--
ALTER TABLE `skrining_pasien`
  ADD PRIMARY KEY (`id_skrining_pasien`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  MODIFY `id_gejala_pasien` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `skrining_pasien`
--
ALTER TABLE `skrining_pasien`
  MODIFY `id_skrining_pasien` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
