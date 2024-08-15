-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2024 at 12:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pesanan`
--

CREATE TABLE `daftar_pesanan` (
  `id_daftar_pesanan` int NOT NULL,
  `id_paket_wisata` int NOT NULL,
  `nama_pemesan` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `jumlah_peserta` int NOT NULL,
  `jumlah_hari` int NOT NULL,
  `akomodasi` int NOT NULL,
  `transportasi` int NOT NULL,
  `service_makanan` int NOT NULL,
  `harga_paket` int NOT NULL,
  `total_tagihan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket_wisata` int NOT NULL,
  `nama_paket` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_paket` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_paket` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `link_video` text COLLATE utf8mb4_general_ci NOT NULL,
  `harga_penginapan` int NOT NULL,
  `harga_transportasi` int NOT NULL,
  `harga_servis_makan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `nama_paket`, `deskripsi_paket`, `img_paket`, `link_video`, `harga_penginapan`, `harga_transportasi`, `harga_servis_makan`) VALUES
(1, 'Paket Wisata Bromo', 'Bromo terletak di kawasan Taman Nasional Bromo Tengger Semeru yang berada di 4 perbatasan wilayah kabupaten dengan luas kurang lebih 50.276,3 ha dengan bentangan dari barat ke timur sekitar 20-30 kilometer dan dari utara ke selatan sekitar 40 km.\r\n\r\n', 'info-1.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Gwl3jYWp828?si=8c7qBURmRVfznmqr\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 5000000, 7000000, 2000000),
(2, 'Paket Wisata Danau Toba', 'Danau Toba merupakan danau terbesar yang ada di Indonesia maupun Asia Tenggara. Danau Toba juga merupakan danau yang terbentuk dari letusan Gunung Toba beberapa ratus tahun yang lalu. Kawah Danau Toba memiliki luas yang sangat besar, sehingga di sebut kaldera. Kawah ukurannya hanya beberapa ratus meter atau beberapa kilometer.\r\n\r\n', 'info-2.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ahCRvdj-REQ?si=ZY78kkUom6xsRTE0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n', 7000000, 8000000, 6000000),
(3, 'Paket Wisata Labuan Bajo', 'Labuan Bajo merupakan Ibu Kota Kabupaten Manggarai Barat. Secara geografis, Labuan Bajo memiliki letak yang sangat strategis, karena berada di bagian barat pulau Flores, sehingga dikenal sebagai kota pariwisata yang merupakan pintu gerbang barat memasuki pesona wisata Pulau Flores.\r\n', 'info-3.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/O1CHeyFXJiM?si=ufwvbHSlBrJIVola\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n', 10000000, 9000000, 7000000),
(4, 'Paket Wisata Raja Ampat', 'Raja Ampat adalah perairan top dunia dengan flora dan fauna paling lengkap1. Ekosistem ini bagaikan kerajaan bagi ratusan jenis ikan dan ribuan jenis karang langka. Secara umum, Raja Ampat adalah kepulauan yang terdiri dari banyak sekali pulau karang dan tersebar luas di seluruh wilayahnya. Raja Ampat memiliki 4 pulau utama yang paling besar, yaitu Pulau Waigeo, Pulau Batanta, Pulau Salawati, dan Pulau Misool\r\n', 'info-4.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q-OWraAwJOE?si=XaXUotiIsM8uaV14\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 11000000, 6000000, 5000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  ADD PRIMARY KEY (`id_daftar_pesanan`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pesanan`
--
ALTER TABLE `daftar_pesanan`
  MODIFY `id_daftar_pesanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket_wisata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
