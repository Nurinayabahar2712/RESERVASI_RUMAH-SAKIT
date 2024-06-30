-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2024 pada 21.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbrs`
--

CREATE TABLE `dbrs` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `noHP` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbrs`
--

INSERT INTO `dbrs` (`id`, `nama`, `alamat`, `noHP`, `email`, `created_at`, `gambar`) VALUES
(9, 'Rumah Sakit Siloam', 'Jl. Metro Tanjung Bunga Kav. 9, Tanjung Merdeka', '0824113662900', 'rsSiloam@gmail.com', '2024-06-24 15:38:02', 'uploads/siloam.jpeg'),
(10, 'Rumah Sakit Regional dr Hasri Ainun Habibie', 'Lumpue', '0977262622', 'HasriAinunHabibie@gmail.com', '2024-06-24 18:50:12', 'uploads/rsainun.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_dokter`
--

CREATE TABLE `db_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dbrs_id` int(11) NOT NULL,
  `poli_id` int(11) NOT NULL,
  `hari_pelayanan` varchar(255) NOT NULL,
  `jam_pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `db_dokter`
--

INSERT INTO `db_dokter` (`id`, `nama`, `alamat`, `telepon`, `email`, `dbrs_id`, `poli_id`, `hari_pelayanan`, `jam_pelayanan`) VALUES
(4, 'dr.Ahmad Abizar', 'Sumpang Minangae', '098664556677', 'AhmadAbizar@gmail.com', 9, 11, 'Senin,Rabu,Jumat', '08:00-12:00'),
(5, 'Dr. Novita Sp.DP', 'BTN CItra Indah', '37838282782', 'novita@gmail.com', 10, 12, 'Senin,Jumat,Sabtu', '08:00-12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_user`
--

CREATE TABLE `db_user` (
  `id` int(222) NOT NULL,
  `nama` varchar(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `alamat` varchar(222) NOT NULL,
  `usia` varchar(222) NOT NULL,
  `no_HP` varchar(222) NOT NULL,
  `jenis_kelamin` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `db_user`
--

INSERT INTO `db_user` (`id`, `nama`, `username`, `password`, `alamat`, `usia`, `no_HP`, `jenis_kelamin`, `email`, `role`) VALUES
(1, 'naya', '12345678', '12345', 'bau massepe', '19', ' 082393490229', 'P', 'naya@gmail.com', 'admin'),
(2, 'naya', '1224566', 'qwer', 'xddfdf', '12', ' 1344555566', 'L', 'ndndng@gmail.com', 'user'),
(3, 'KelompokWeb', '1234567890', '12345678', 'Bau Massepe', '20', ' 083456789123', 'P', 'Kelompokweb@gmai.com', 'user'),
(4, 'naya', '1234569000', '$2y$10$VVmumsfdrDuI8QgIfcdxmuLFfkxYrQO93cRFTbRyQRAQyHLSBk5au', 'sumpang', '19', '098432156789', 'P', 'naya123@gmail.com', 'admin'),
(5, 'naya', '4567890', '$2y$10$BXViIpQvrSKhU4FrziBZTe1A/QYa/8.eaSuHX1g5rcHrK/0YttGVa', 'mattirotaso', '18', '098653465789', 'P', 'nayabaru@gmail.com', 'user'),
(6, 'ith', '123456789', '$2y$10$z5YP1mZNG9XSirdVxk7CputLtDVIp4VgOJkmCyeOuVJpnW1etcJa.', 'bau massepe', '12', '093838389322', 'L', 'Ith@gmail.com', 'user'),
(7, 'ith123', '123456789011', '$2y$10$xxcFZDZW4tBvAfRIb.vVB.NKiEgdhiKpvn8ygWkRPqbbwZBGIr7vm', 'Jl. Walikota', '22', '0439388383383', 'L', 'ith@gmail.com', 'user'),
(8, 'ith2727', '33455789097643', '$2y$10$VezHOulWy5qjjWlCK7kHjuZKDIYfZj5Og91gTE42jqrT4y4LxtvNW', 'Bau Massepe', '23', '098838833922', 'L', 'ith2727@gmail.com', 'user'),
(9, 'nayanaya', '33334848449494', '$2y$10$xc/Xs0T9bRP1pIkBXwvFVuAhwlDWINLC0hj4tN5E1JnDUZAI/ICQ6', 'sumpang', '19', '0982838930303', 'P', 'nayanaya@gmail.com', 'user'),
(10, 'naya27', '384894930200202', '$2y$10$49pFhz0LxgvdzlTu8Q7VsOyT5UAa.22Sykzf2MiEw1Vku51CnRKYG', 'Agussalim', '22', '08636448899302', 'L', 'naya27@gmail.com', 'user'),
(11, 'inayabahar', '8384848392929292', '$2y$10$OEo.u/fgZsn0qnv05ClniOIxiUFSLDgp7beHM7KdTbtU8dstUoeMi', 'ahmad yani', '19', '0987556777722', 'P', 'inayabahar@gmail.com', 'admin'),
(12, 'ith12345', '7382829920202002', '$2y$10$MouwsEcJOs.GrZ9H3Pc/sO7ruedGJj.tlo2Qz5RFZ.Rgn7eJjtrQq', 'kesuma', '23', '0976433456688888', 'P', 'ith12345@gmail.com', 'user'),
(13, 'anisa', '23456890088', '$2y$10$iZzxfbwgwOIk0PQtmrjYk.1DgZvyPV36Cbq/gyNDxeeUCqRZ5.06K', 'Bau Massepe', '24', '09884848484', 'P', 'anisa@gmail.com', 'user'),
(14, '123456', '22233444433322', '$2y$10$p1oLADkbX6cK31b2/XyLhepFnhc9RGNa605XtXMyPIMz7qRCCRBr.', 'bau massepe', '19', '09278277272', 'L', '123456@gmail.com', 'user'),
(15, '123456789', '292929292992', '$2y$10$ctK7FHNc0YjlB6FDMHog2eh9o30QtHio6XhfxM73aBI1efM30HBvS', 'bau massepe ', '20', '0832837376362', 'L', '12345@gmail.com', 'user'),
(16, 'inayainaya123', '1243456789977', '$2y$10$MhOe8215llWITOPgucvKPO.FMRH84mSGg7BVBMJhtDz6BSyyt/jHu', 'agussalim', '20', '028287728282', 'L', 'inayainaya123@gmail.com', 'user'),
(17, 'klp3', '151616718819', '$2y$10$FfvRgpGVuwWs73z/Ji5uB.UyivHSBZb4McLsdUaTqueUul.CDcHTW', 'lumpue', '29', '0987655668900', 'L', 'klp3@gmail.com', 'user'),
(18, 'ithith123', '3838020201011', '$2y$10$7v.SqQLaLlGuoGK3LdYJcOLiTQA8J.ckSDlde//2LKUqhf9aorTs6', 'jendral sudirman', '20', '0897262678299', 'L', 'ithith123@gmail.com', 'user'),
(19, 'nayanaya123', '282827727272', '$2y$10$5f/NJUH9rx8ogzu.U5eIsuf3ejtVhK6hPgPSHO0DF.t2OUCN3i9ly', 'agussalim', '23', '0383839930202', 'P', 'nayanaya123@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `dbrs_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `dbrs_id`, `name`) VALUES
(11, 9, 'Saraf'),
(12, 10, 'Penyakit Dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli_data`
--

CREATE TABLE `poli_data` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `dbrs_id` int(11) DEFAULT NULL,
  `poli_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `tanggal_reservasi` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `dbrs_id`, `poli_id`, `dokter_id`, `no_antrian`, `tanggal_reservasi`, `created_at`) VALUES
(1, 9, 11, 4, 1, '2024-06-24', '2024-06-24 16:42:21'),
(2, 9, 11, 4, 1, '2024-07-04', '2024-06-24 16:47:14'),
(3, 9, 11, 4, 1, '2024-07-06', '2024-06-24 17:10:18'),
(4, 9, 11, 4, 2, '2024-07-06', '2024-06-24 17:11:04'),
(5, 9, 11, 4, 3, '2024-07-06', '2024-06-24 17:11:37'),
(6, 9, 11, 4, 4, '2024-07-06', '2024-06-24 18:14:00'),
(7, 9, 11, 4, 5, '2024-07-06', '2024-06-24 18:14:19'),
(8, 10, 12, 5, 1, '2024-06-29', '2024-06-24 19:08:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dbrs`
--
ALTER TABLE `dbrs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `db_dokter`
--
ALTER TABLE `db_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbrs_id` (`dbrs_id`),
  ADD KEY `poli_id` (`poli_id`);

--
-- Indeks untuk tabel `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbrs_id` (`dbrs_id`);

--
-- Indeks untuk tabel `poli_data`
--
ALTER TABLE `poli_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbrs_id` (`dbrs_id`),
  ADD KEY `poli_id` (`poli_id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbrs`
--
ALTER TABLE `dbrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `db_dokter`
--
ALTER TABLE `db_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `poli_data`
--
ALTER TABLE `poli_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `db_dokter`
--
ALTER TABLE `db_dokter`
  ADD CONSTRAINT `db_dokter_ibfk_1` FOREIGN KEY (`dbrs_id`) REFERENCES `dbrs` (`id`),
  ADD CONSTRAINT `db_dokter_ibfk_2` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`);

--
-- Ketidakleluasaan untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD CONSTRAINT `poli_ibfk_1` FOREIGN KEY (`dbrs_id`) REFERENCES `dbrs` (`id`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`dbrs_id`) REFERENCES `dbrs` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`dokter_id`) REFERENCES `db_dokter` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
