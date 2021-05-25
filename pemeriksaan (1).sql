-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2020 pada 06.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemeriksaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `a3_report`
--

CREATE TABLE `a3_report` (
  `Id_a3report` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_peg` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_rincian` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `tema` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `problem_statement` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `target` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `aliran_proses` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `implementasi` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `yokoten` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `a3_report`
--

INSERT INTO `a3_report` (`Id_a3report`, `Id_peg`, `Id_rincian`, `tema`, `problem_statement`, `target`, `aliran_proses`, `implementasi`, `yokoten`) VALUES
('A3R001', '0004', 'R-001', 'hgjhjg', 'bjbj', 'hgjjghg', 'gfgffgf', 'hjjhjgh', 'jhjjjj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_jadwal` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `type_unit` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `sequence` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `no_chasis` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `warna` varchar(10) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`Id_jadwal`, `type_unit`, `sequence`, `no_chasis`, `warna`) VALUES
('J0001', 'FM9012', 'S21721', '282292', 'Green'),
('J0002', 'FR1212', 'S17128', '221211', 'Red'),
('J0003', 'FR986', '45632', '90765', 'Kuning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part`
--

CREATE TABLE `part` (
  `Id_part` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `check` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `nama_part` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `st_item` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `jumlah` int(6) NOT NULL,
  `metode` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `part`
--

INSERT INTO `part` (`Id_part`, `check`, `nama_part`, `model`, `st_item`, `jumlah`, `metode`) VALUES
('P001', '1', 'Marker Lamp', 'FR/FM', 'Marker Lamp Menyala dengan baik', 2, 'Visual'),
('P002', '1', 'Exhoust Brake', 'FR/FM', 'Exhoust Brake berfungsi dengan baik', 1, 'Visual Switch on'),
('P003', '2', 'Nut', 'FR/FM', 'Nut tidak kencang', 2, 'Visual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `Id_peg` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `nama_peg` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `JK` enum('P','L') COLLATE utf8mb4_bin NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(8) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`Id_peg`, `nama_peg`, `JK`, `alamat`, `no_telp`, `jabatan`, `username`, `password`) VALUES
('0001', 'Dilana', 'P', 'puri cendana', '0895326930923', 'Operator', 'dilana', 'dilana'),
('0002', 'Yana Aqila', 'L', 'Jl. Bunga sari', '02929823282', 'Kepala_departemen', 'yana', 'yana'),
('0003', 'Sujoto', 'L', 'Jl. Mawar Indah No. 9, Bekasi', '02227812', 'Section_head', 'sujoto', 'sujoto'),
('0004', 'Dean Sumono', 'L', 'Jl. Merpati Putih No.5', '08954247686', 'Section_Trimming', 'dean', 'dean');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cs`
--

CREATE TABLE `tbl_cs` (
  `Id_check` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_peg` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_jadwal` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `check_gate` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `tgl_check` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tbl_cs`
--

INSERT INTO `tbl_cs` (`Id_check`, `Id_peg`, `Id_jadwal`, `check_gate`, `tgl_check`) VALUES
('CS002', '0001', '', '', '2020-07-02'),
('CS003', '0001', '', '', '2020-07-03'),
('CS004', '0001', '', '', '2020-07-03'),
('CS005', '0001', '', '', '2020-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailcs`
--

CREATE TABLE `tbl_detailcs` (
  `Id_detailcs` int(8) NOT NULL,
  `Id_check` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_jadwal` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_part` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `remark` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tbl_detailcs`
--

INSERT INTO `tbl_detailcs` (`Id_detailcs`, `Id_check`, `Id_jadwal`, `Id_part`, `remark`, `status`) VALUES
(29, 'CS002', 'J0001', 'P001', 'OK', 1),
(31, 'CS003', 'J0001', 'P002', 'NG', 3),
(32, 'CS004', 'J0001', 'P001', 'OK', 1),
(34, 'CS005', 'J0001', 'P001', 'NG', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reason`
--

CREATE TABLE `tbl_reason` (
  `Id_reason` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `nama_reason` varchar(35) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tbl_reason`
--

INSERT INTO `tbl_reason` (`Id_reason`, `nama_reason`) VALUES
('RSN-001', 'External Complain'),
('RSN-002', 'Internal Audit'),
('RSN-003', 'Performance Produk'),
('RSN-004', 'Performance Mesin'),
('RSN-005', 'Performance Lingkungan Safety');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rincian`
--

CREATE TABLE `tbl_rincian` (
  `Id_rincian` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_reason` varchar(8) COLLATE utf8mb4_bin NOT NULL,
  `Id_detailcs` int(8) NOT NULL,
  `rincian_kerusakan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `penyebab` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `tgl_masalah` date NOT NULL,
  `tindakan` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_verifikasi` date NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tbl_rincian`
--

INSERT INTO `tbl_rincian` (`Id_rincian`, `Id_reason`, `Id_detailcs`, `rincian_kerusakan`, `penyebab`, `tgl_masalah`, `tindakan`, `tgl_selesai`, `tgl_verifikasi`, `status`) VALUES
('R-001', 'RSN-003', 31, 'Pecah dan tidak menyala', 'human eror', '2020-07-04', 'Diperbaiki bagian kacanya', '2020-07-04', '2020-07-04', 'Sudah dibuat A3'),
('R-002', 'RSN-004', 34, 'hhjggju', 'nnhhnhn', '2020-07-04', 'hhhhj', '2020-07-04', '2020-07-04', 'Belum dibuat A3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inspeksi`
--

CREATE TABLE `tb_inspeksi` (
  `id` varchar(2) NOT NULL,
  `inspeksi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_inspeksi`
--

INSERT INTO `tb_inspeksi` (`id`, `inspeksi`) VALUES
('1', 'K07'),
('2', 'K08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `a3_report`
--
ALTER TABLE `a3_report`
  ADD PRIMARY KEY (`Id_a3report`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_jadwal`);

--
-- Indeks untuk tabel `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`Id_part`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`Id_peg`);

--
-- Indeks untuk tabel `tbl_cs`
--
ALTER TABLE `tbl_cs`
  ADD PRIMARY KEY (`Id_check`),
  ADD KEY `Id_peg` (`Id_peg`),
  ADD KEY `Id_jadwal` (`Id_jadwal`);

--
-- Indeks untuk tabel `tbl_detailcs`
--
ALTER TABLE `tbl_detailcs`
  ADD PRIMARY KEY (`Id_detailcs`),
  ADD KEY `Id_check` (`Id_check`),
  ADD KEY `Id_part` (`Id_part`);

--
-- Indeks untuk tabel `tbl_reason`
--
ALTER TABLE `tbl_reason`
  ADD PRIMARY KEY (`Id_reason`);

--
-- Indeks untuk tabel `tbl_rincian`
--
ALTER TABLE `tbl_rincian`
  ADD PRIMARY KEY (`Id_rincian`),
  ADD KEY `Id_cpar` (`Id_detailcs`);

--
-- Indeks untuk tabel `tb_inspeksi`
--
ALTER TABLE `tb_inspeksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detailcs`
--
ALTER TABLE `tbl_detailcs`
  MODIFY `Id_detailcs` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
