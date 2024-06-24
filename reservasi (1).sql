-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 08.53
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
(1, 'Rumah Sakit Sumantri', 'jl.bau massepe', '0987554618919', '@RSSumantri@gmail.com', '2024-06-07 05:11:15', NULL),
(2, 'Rumah Sakit Sumantri', 'jl.bau massepe', '0987554618919', '@RSSumantri@gmail.com', '2024-06-07 05:15:05', NULL),
(3, 'Rumah Sakit Sumantri', 'jl.bau massepe', '0987554618919', '@RSSumantri@gmail.com', '2024-06-07 05:16:22', NULL),
(4, 'Rumah Sakit Sumantri', 'jl.bau massepe', '0987554618919', '@RSSumantri@gmail.com', '2024-06-07 05:16:34', NULL),
(5, 'andi makkasau', 'jendral sudirman', '0987688900', 'andimakkasau@gmail.com', '2024-06-07 05:58:48', NULL),
(6, 'RS Fatima', 'Bau Massepe', '62672828292', 'fatima@gail.com', '2024-06-07 06:34:31', 'uploads/hos1.jpg'),
(7, 'Puskesmas Lapadde', 'Lapadde', '0986544667788', 'lapadde@gmail.com', '2024-06-07 09:33:00', 'uploads/hos7.jpg');

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
(1, 1, 'Gigi'),
(2, 1, 'Gigi'),
(3, 1, 'Gigi'),
(4, 5, 'mata'),
(5, 5, 'mata'),
(6, 5, 'mata'),
(7, 5, 'mata'),
(8, 1, 'mata');

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbrs`
--
ALTER TABLE `dbrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `db_dokter`
--
ALTER TABLE `db_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `poli_data`
--
ALTER TABLE `poli_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
