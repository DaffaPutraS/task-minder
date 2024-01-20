-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2024 pada 07.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `email`, `password`) VALUES
(0, 'cecep surecep', 'cecep99', 'cecep@gmail.com', 'cpcpcp'),
(2, 'dscfsf', 'ayang', 'afkain@NAAFN', '123'),
(3, 'Ahmad bro', 'ahmadd', 'ahmad@gmail.com', 'amamam'),
(4, 'Budi bro', 'budii', 'budi@gmail.com', 'bdbdbd'),
(5, 'Dewi sis', 'dewii', 'dewi@gmail.com', 'dwdwdw'),
(6, 'Adi bro', 'adii', 'adi@gmail.com', 'adadad'),
(7, 'Eko bro', 'ekoo', 'eko@gmail.com', 'ekekek'),
(8, 'Siti sis', 'sitii', 'siti@gmail.com', 'ststst'),
(9, 'Wawan bro', 'wawann', 'wawan@gmail.com', 'wnwnwn'),
(10, 'Agus bro', 'aguss', 'agus@gmail.com', 'agagag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`task_id`, `username`, `task_name`, `date`, `description`) VALUES
(27, 'Testing#1', 'UI/UX', '2024-01-18', 'Membuat mockup dari ADSI '),
(32, 'Testing#1', 'UI/UX', '2024-01-18', 'Membuat mockup'),
(33, 'Testing#2', 'PWL', '2024-01-18', 'Mengerjakan project akhir'),
(42, 'udin99', 'AI', '2024-01-19', 'Proyek Akhir'),
(54, 'gg6969', 'PWL', '2024-01-18', 'lanjut projek brok'),
(55, 'ujang99', 'PWL', '2024-01-18', 'Presentasi Tugas Akhir/Projek dengan membuat website'),
(56, 'ujang99', 'ADSI', '2024-01-24', 'Presentasi Tugas Akhir/Projek dengan membuat rancangan beberapa diagram'),
(57, 'ujang99', 'UI/UX', '2024-01-23', 'Membuat Prototype Figma kemudian di presentasikan'),
(58, 'ujang99', 'GRAFIKA KOMPUTER', '2024-01-23', 'Membuat Game dengan ketentuan scoring dan 2D/3D, kemudian di presentasikan'),
(59, 'ujang99', 'Kecerdasan Buatan', '2024-01-22', 'Membuat Fuzzy logic dengan ketentuan seperti di Jurnal, kemudian di Presentasikan'),
(60, 'ujang99', 'Sistem Terdistribusi', '2024-01-26', 'Mengerjakan UAS normal'),
(61, 'ujang99', 'Metode Numerik', '2024-01-24', 'Mengerjakan UAS normal'),
(62, 'ujang99', 'ADSI', '2024-01-24', 'Mengerjakan UAS 10 nomer dengan waktu 1 jam'),
(63, 'ujang99', 'GRAFIKA KOMPUTER', '2024-01-23', 'Presentasi Projek lalu di tanya per orangan secara random'),
(64, 'ujang99', 'PWL', '2024-01-25', 'Membuat laporan projek'),
(65, 'ucok99', 'Kecerdasan Buatan', '2024-01-22', 'Membuat Fuzzy logic dengan ketentuan seperti di Jurnal, kemudian di Presentasikan'),
(66, 'ucok99', 'GRAFIKA KOMPUTER', '2024-01-23', 'Membuat Game dengan ketentuan scoring dan 2D/3D, kemudian di presentasikan'),
(67, 'ucok99', 'UI/UX', '2024-01-23', 'Membuat Prototype Figma kemudian di presentasikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `email`, `password`) VALUES
(1, 'ujang', 'ujang99', 'ujang99@gmail.com', '$2y$10$T7NDynWs.fy2LweIK1kWlei82UslaI8ZdwJ58Mn0TZFMPtbz1TRU2'),
(2, 'Test', 'Testing#1', 'Test@gmail.com', '$2y$10$ZRmfyRO8c1NG60s.kLScUuOAwvhCPu02qWdQOBerdYsNz2TtiWDs6'),
(3, 'Ucok Marucok', 'ucok99', 'ucok@gmail.com', '$2y$10$kWFWaJAvn/pxPkxnFxASQeA/IJQgNCzSLq7JDv3j1yhCDm7VOcpX.'),
(4, 'Udin Marudin', 'udin99', 'udin@gmail.com', '$2y$10$TE1YpT4DouCq4HKRa0c7s.HLR85vVcwjnGhhUu.DiWlhfSkejzpem'),
(5, 'Mamat jeding', 'mamat99', 'mamat@gmail.com', '$2y$10$ouuN/c4r0rN0Jgwy86ts5e9ZBK8kZb/TNwdIWQbOYnNPm/X.NJRQW'),
(6, 'si dadang ganteng', 'dadang99', 'dadang@gmail.com', '$2y$10$cnXhouh1XgH5.e3EkI.Seu0fVhYoJCUFKNQdfXv2ikRd5mNjk6RR6'),
(7, 'bang keling', 'bangkeling99', 'bangkeling@gmail.com', '$2y$10$tY3VSQocXqgGPxgNfr6nmO.ZRRDtQNCVYkFXrs9rbb/PdaEhQMtcW'),
(8, 'Tony stang', 'tony99', 'tony@gmail.com', '$2y$10$ZzoZ22.2Qa8oqbFH.0pOK.5ETFOeBwY.t/1BXFWwhVaKQclK.dktm'),
(9, 'Gold D Roger', 'roger99', 'roger@gmail.com', '$2y$10$obmPJjJYEJpl1R0Is7G1.OwJEsbqS8RZdzC5ZxLMF/uAfXNatrRxG'),
(10, 'Portgas D Ace', 'ace99', 'ace@gmail.com', '$2y$10$PPnkMBTtDhnBrFUBCu2NFe7B5He8cJAFxG1CdEC01rzMrHBo.viam'),
(11, 'Monkey D Luffy', 'luffy99', 'luffy@gmail.com', '$2y$10$peJVJBWRBasJ6Ha1yPgolu8pXBexxfZeUokCcpGJvzdGizGNGG5m.'),
(12, 'Trafalgar D Waterlaw', 'trafalgar99', 'trafalgar@gmail.com', '$2y$10$AO/PO4744blEPUWPNqJYkeMMGIA4C1K0EbrGTR16Defvjin0JwBvu'),
(13, 'Jaguar D Paul', 'jaguar99', 'jaguar@gmail.com', '$2y$10$v59rGhBSx3Me8KKJ7dankOqMez4qnNAQ6X8esaRwzo7kILPDkUc5W'),
(14, 'Monkey D Dragon', 'dragon99', 'dragon@gmail.com', '$2y$10$02QfbWCAL06ALbGSbbeZ..h68AO/s9r0vd/HU9cbxmyD0belkx0LK'),
(15, 'Monkey D Garp', 'garp99', 'garp@gmail.com', '$2y$10$mEndC6tgiAJcwed9qqQxTuF31gYmdHUIrr1F6.5BF9X5QubCjJ6S2'),
(17, 'Al D taher', 'taher99', 'taher@gmail.com', '$2y$10$YK8256.SCdkSbvWxfuoS8Oljpv8k8KYRt2UxeYxN9atvo9.lZBBXG'),
(18, 'salman', 'salmann', 'salman@gmail.com', '$2y$10$ycGm19QvQDAjgpHPXZISz.b7D3C5DJ0sKhS3pWVLVrq.mQNfNC15m');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
