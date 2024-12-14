-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 02:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'olet cahya syuhada', 'cahya', 'e360ecbad39e03546e7289e5aa16d2dd'),
(2, 'yusuf', 'yusuf', 'e4985e348d46b03b7d8f84460d37543d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(150) NOT NULL,
  `id_admin_berita` int(11) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `konten_berita` text NOT NULL,
  `foto_berita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `id_admin_berita`, `tanggal_berita`, `konten_berita`, `foto_berita`) VALUES
(1, 'kampus dilampung uinril', 1, '2024-11-25', 'Universitas Islam Negeri Raden Intan Lampung (UIN RIL) adalah sebuah perguruan tinggi negeri yang terletak di Bandar Lampung, Provinsi Lampung, Indonesia. UIN Raden Intan Lampung merupakan salah satu universitas Islam yang memiliki peran penting dalam dunia pendidikan tinggi di Lampung. Kampus ini dikenal sebagai lembaga pendidikan yang mengintegrasikan ilmu pengetahuan umum dengan nilai-nilai Islam, serta berkomitmen untuk mencetak lulusan yang tidak hanya berkompeten dalam bidang akademik, tetapi juga memiliki akhlak dan karakter yang baik.', '706048339_fotoo.jpg'),
(3, 'kampus PTKIN terbaik di lampung', 1, '2024-12-01', 'kampus PTKIN terbaik di lampung adalah uin raden intan lampung', '1727686710_uinril.png'),
(4, 'Embung indah Uinril', 1, '2024-12-01', '\"Embung Indah UIN RIL\" mengacu pada embung atau danau buatan yang berada di lingkungan Universitas Islam Negeri Raden Intan Lampung (UIN RIL). Embung ini biasanya dibuat untuk tujuan estetika, ekologi, sekaligus menjadi sumber air, baik untuk pengairan maupun penunjang kegiatan lingkungan di kampus.', '1374669641_embung.jpg'),
(5, 'kampus intititut terbaru di lampung', 1, '2024-12-02', 'ITERA adalah singkatan dari Institut Teknologi Sumatera, sebuah perguruan tinggi negeri yang berlokasi di Lampung, Indonesia. ITERA didirikan pada tahun 2014 untuk mendukung pengembangan sumber daya manusia di bidang teknologi dan sains, terutama di wilayah Sumatera. Kampus ini sering dianggap sebagai \"saudara\" Institut Teknologi Bandung (ITB) karena memiliki visi dan fokus yang serupa dalam pengembangan ilmu pengetahuan dan teknologi', '1218236017_itera.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `keterangan_foto` varchar(51) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama_foto` varchar(51) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `keterangan_foto`, `id_wisata`, `nama_foto`) VALUES
(3, 'pantai pasir putih', 5, '1215623254_pasir_putih.jpg'),
(5, 'Danau Ranau', 1, '1564097207_danau_ranau.jpg'),
(6, 'warung kakak adik bandar lampung', 4, '1101853550_wr.kakak_adik.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `keterangan`, `url_img`) VALUES
(3, 'wisata alam', 'wisata alam merupakan', 'img_kategori/1733665182_1564097207_danau_ranau.jpg'),
(4, 'Wisata Kuliner', 'wisata kuliner terbaik dilampung', 'img_kategori/1733665249_1101853550_wr.kakak_adik.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(3) NOT NULL,
  `konten_profil` text NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `konten_profil`, `foto_profil`) VALUES
(1, 'Pantai Labuhan Jukung Krui, Kabupaten Pesisir Barat ini, salah satu pantai terindah di Lampung. Pantainya yang berombak besar juga bisa untuk surfing. Meskipun pesonanya indah tapi tak seramai pantai-pantai lainnya, seperti Pantai Mutun maupun Pantai Sari Ringgung di Pesawaran. Jadi, kalau kamu menyukai ketenangan sangat cocok mengunjungi Pantai Labuhan Jukung Krui.', '497679840_1564097207_danau_ranau.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wisata`
--

CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(111) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi_wisata` varchar(111) NOT NULL,
  `link_peta` varchar(350) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wisata`
--

INSERT INTO `tbl_wisata` (`id_wisata`, `nama_wisata`, `id_kategori`, `lokasi_wisata`, `link_peta`, `deskripsi`) VALUES
(1, 'danau ranau ', 3, 'lampung barat', 'https://www.openstreetmap.org/export/embed.html?bbox=103.76449584960938%2C-4.984925299910968%2C104.02748107910158%2C-4.786863847521791&layer=mapnik&marker=-4.885901889549583%2C103.89598846435547\" style=\"border: 1px solid black\r\n\r\n', 'danau terbesar di provinsi lampung'),
(4, 'Wr. Kakak Adik', 4, 'Bandar Lampung', 'https://www.openstreetmap.org/export/embed.html?bbox=105.26762187480927%2C-5.430248257491658%2C105.26967644691469%2C-5.4287022261267515&amp;layer=mapnik', 'Rumah makan warung kakak adik dilampung'),
(5, 'pantai pasir putih', 3, 'lampung selatan', 'https://www.openstreetmap.org/export/embed.html?bbox=105.35197198390962%2C-5.530144399668511%2C105.35608112812044%2C-5.527052850006009&amp;layer=mapnik', 'pantai indah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_id_admin_berita` (`id_admin_berita`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `fk_id_galeri_wisata` (`id_wisata`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `fk_id_wisata_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `fk_id_admin_berita` FOREIGN KEY (`id_admin_berita`) REFERENCES `tbl_admin` (`id_admin`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD CONSTRAINT `fk_id_galeri_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `tbl_wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD CONSTRAINT `fk_id_wisata_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
