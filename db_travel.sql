-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 06:04 PM
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
-- Database: `db_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination_cards`
--

CREATE TABLE `destination_cards` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_cards`
--

INSERT INTO `destination_cards` (`id`, `judul`, `deskripsi`, `harga`, `image_path`, `kategori`) VALUES
(1, 'Osaka Castle', 'Istana Osaka sering disebut sebagai tengara paling penting di Osaka dan memungkiri perebutan kekuasaan berdarah yang melatari lahirnya zaman Edo pada 1603. ', 700000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722914556/Osaka_Castle_vtk7dd.jpg', 'jepang'),
(2, 'Tokyo Disney Sea', 'DisneySea Tokyo memiliki 7 tema yang masing-masing mempunyai gaya yang unik. ', 910000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722915918/tokyo-disneysea_t2vadm.jpg', 'jepang'),
(3, 'Istana Nijo', 'Istana Nijo terdiri dari dua benteng berbentuk cincin konsentris (Kuruwa), Istana Ninomaru, reruntuhan Istana Honmaru, berbagai bangunan pendukung dan beberapa taman.', 670000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722916156/Istana-Nijo-Kyoto_uimcuk.jpg', 'jepang'),
(4, 'Kuil Senso-ji', 'Kuil Senso-ji merupakan kuil Buddha tertua di ibu kota, dan pagoda lima lantai, jalur dupa, dan atap yang luas akan membawa Anda kembali ke Tokyo di masa lalu.', 550000, 'https://th.bing.com/th/id/R.44063c9fc36a32301c2a875749fd39c7?rik=iUfX54WSVhlrpg&riu=http%3a%2f%2ffs.genpi.co%2fuploads%2fdata%2fimages%2fasakusa-tokyo-japan-temple-8BPJQ9F.jpg&ehk=MEi6urq1GGok4B4leTHQEZfM4MLJesgEGMOXuNHk4bs%3d&risl=&pid=ImgRaw&r=0', 'jepang'),
(5, 'Tokyo Tower', 'Menara ikonik di Tokyo dengan pemandangan kota yang menakjubkan.', 750000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722785612/tokyo_tower_bczdab.jpg', 'jepang'),
(6, 'Fushimi Inari Shrine', 'Kuil terkenal dengan ribuan torii merah.', 560000, 'https://cdn-images-1.medium.com/max/2000/1*IB12fALDUxfmQuOBDWIdXQ.jpeg', 'jepang'),
(7, 'Universal Studio Japan', 'Kota budaya Jepang dengan banyak kuil dan taman tradisional.', 770000, 'https://th.bing.com/th/id/R.b05fb5ef3dd7058ad0e844b0fc7b2518?rik=14mRd6cBVzjC4Q&riu=http%3a%2f%2fstatic1.squarespace.com%2fstatic%2f57b72100e4fcb5e4aef2f4c4%2f581a1179e58c62432bdf34b9%2f641d33d9b732e16d1f8d9915%2f1679662281203%2fUniversal-Studios-Japan-Entrance-Arch-by-Joshua-Meyer.jpeg%3fformat%3d1500w&ehk=uKVkWBcVpQPKa5NxgJjjPnQfvG6alXP3gptlGUvg1i0%3d&risl=&pid=ImgRaw&r=0', 'jepang'),
(8, 'Mt. Fuji', 'Gunung tertinggi di Jepang dan objek wisata terkenal.', 670000, 'https://th.bing.com/th/id/R.aaee20592e6984d2eb588ac45ab71d9f?rik=iDEnRkZbnqAhIA&riu=http%3a%2f%2fwww.travelplanet.in%2fwp-content%2fuploads%2f2016%2f03%2f291425-mount-fuji.jpg&ehk=uX9Kyoi9mSeUBPaLIMFFQi5w1iy4cbgOTS5bA7Qm1%2bo%3d&risl=&pid=ImgRaw&r=0', 'jepang'),
(10, 'N Seoul Tower', 'Menara ikonik dengan pemandangan kota Seoul yang menakjubkan, sering dikunjungi untuk pemandangan malam yang romantis.', 1500000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722936033/4549_eanmfy.jpg', 'korea'),
(11, 'Gyeongbokgung Palace', 'Istana utama dari Dinasti Joseon, terkenal dengan arsitektur tradisional Korea dan upacara pergantian penjaga.', 1300000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006233/Gyeongbokgung-palace-Seoul-Throne-Hall_ith5bd.webp', 'korea'),
(12, 'Bukchon Hanok Village', 'Desa tradisional yang menampilkan rumah-rumah hanok dan budaya Korea yang autentik.', 1200000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006236/sczwllhwe7jeysqrhy5a_cu5ngk.jpg', 'korea'),
(14, 'Jeju Island', 'Pulau tropis dengan pemandangan alam yang menakjubkan, termasuk Gunung Hallasan dan Air Terjun Jeongbang.', 900000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006119/5e3bae0229f41_jng2xg.jpg', 'korea'),
(15, 'Lotte World', 'Taman hiburan dalam ruangan terbesar di dunia dengan berbagai wahana dan atraksi.', 500000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006131/Beli_Lotte_World_Seoul_Theme_Park_1_Day_Pass_Online_eiytif.jpg', 'korea'),
(17, 'Nami Island', 'Pulau kecil yang terkenal dengan jalanan pohon yang indah dan sering digunakan sebagai lokasi syuting drama Korea.', 1300000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006123/caption_s23cfe.jpg', 'korea'),
(24, 'COEX Aquarium', 'Aquàrium Barcelona merupakan sebuah akuarium yang terletak di Seoul, Korea Selatan. Coex akuarium terbesar di Seoul, akuarium ini memiliki zona-zona yang menaungi 40.000 lebih satwa laut.', 950000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006509/TiketMasukCoexAquarium_Seoul_Korea-KlookIndonesia_r5wqjo.jpg', 'korea'),
(25, 'Great Wall of China', 'Salah satu keajaiban dunia kuno, Tembok Besar China menawarkan pemandangan spektakuler dan sejarah yang kaya.', 1700000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1722956962/great_wall_ufwrog.jpg', 'china'),
(26, 'Forbidden City', 'Istana kekaisaran yang megah di pusat Beijing, merupakan tempat tinggal kaisar selama lebih dari 500 tahun.', 800000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723010104/ForbiddenCityIn-DepthHalfDayTour_qwnuqu.jpg', 'china'),
(27, 'Terracotta Army', 'Koleksi patung prajurit yang terkenal, dibangun untuk menjaga makam Kaisar Qin Shi Huang.', 550000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723010102/7541_pm9zjt.jpg', 'china'),
(28, 'The Bund, Shanghai', 'Kawasan bersejarah di tepi sungai Shanghai yang terkenal dengan pemandangan kota yang indah dan bangunan kolonial.', 600000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723010098/the-bund-700-13_mau8fg.jpg', 'china'),
(29, 'Li River', 'Pemandangan alam yang memukau dengan bukit karst yang indah, ideal untuk berperahu dan wisata alam.', 1300000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723010096/65d53699b0ea1fd4fb5a614f7121a1b8_ig1h2c.jpg', 'china'),
(30, 'Everland', 'Everland merupakan taman hiburan yang menghibur pengunjung melalui atraksi di lima area bertema Global Fair, American Adventure, Magic Land, Zootopia, dan European Adventure.', 700000, 'https://res.cloudinary.com/dkpj7h514/image/upload/v1723006671/Everland-Theme-Park-Wisata-Dunia-Fantasi-Terbesar-di-Korea-Selatan_y0ctsk.jpg', 'korea');

-- --------------------------------------------------------

--
-- Table structure for table `opsi_trip`
--

CREATE TABLE `opsi_trip` (
  `id` int(11) NOT NULL,
  `destination_cards_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opsi_trip`
--

INSERT INTO `opsi_trip` (`id`, `destination_cards_id`, `option_name`, `option_price`) VALUES
(1, 1, 'Penerbangan', 1500000),
(2, 1, 'Makan', 500000),
(3, 1, 'Hotel', 2000000),
(4, 2, 'Penerbangan', 1600000),
(5, 2, 'Makan', 600000),
(6, 2, 'Hotel', 2200000),
(7, 3, 'Penerbangan', 1700000),
(8, 3, 'Makan', 550000),
(9, 3, 'Hotel', 2300000),
(10, 4, 'Penerbangan', 1400000),
(11, 4, 'Makan', 450000),
(12, 4, 'Hotel', 2100000),
(13, 5, 'Penerbangan', 1800000),
(14, 5, 'Makan', 600000),
(15, 5, 'Hotel', 2500000),
(16, 6, 'Penerbangan', 1500000),
(17, 6, 'Makan', 500000),
(18, 6, 'Hotel', 2200000),
(19, 7, 'Penerbangan', 1600000),
(20, 7, 'Makan', 550000),
(21, 7, 'Hotel', 2300000),
(22, 8, 'Penerbangan', 1700000),
(23, 8, 'Makan', 600000),
(24, 8, 'Hotel', 2500000),
(25, 10, 'Penerbangan', 1800000),
(26, 10, 'Makan', 650000),
(27, 10, 'Hotel', 2600000),
(28, 11, 'Penerbangan', 1900000),
(29, 11, 'Makan', 700000),
(30, 11, 'Hotel', 2700000),
(31, 12, 'Penerbangan', 2000000),
(32, 12, 'Makan', 750000),
(33, 12, 'Hotel', 2800000),
(34, 14, 'Penerbangan', 2100000),
(35, 14, 'Makan', 800000),
(36, 14, 'Hotel', 2900000),
(37, 15, 'Penerbangan', 2200000),
(38, 15, 'Makan', 850000),
(39, 15, 'Hotel', 3000000),
(40, 17, 'Penerbangan', 2300000),
(41, 17, 'Makan', 900000),
(42, 17, 'Hotel', 3100000),
(43, 24, 'Penerbangan', 2400000),
(44, 24, 'Makan', 950000),
(45, 24, 'Hotel', 3200000),
(46, 25, 'Penerbangan', 2500000),
(47, 25, 'Makan', 1000000),
(48, 25, 'Hotel', 3300000),
(49, 26, 'Penerbangan', 2600000),
(50, 26, 'Makan', 1050000),
(51, 26, 'Hotel', 3400000),
(52, 27, 'Penerbangan', 2700000),
(53, 27, 'Makan', 1100000),
(54, 27, 'Hotel', 3500000),
(55, 28, 'Penerbangan', 2800000),
(56, 28, 'Makan', 1150000),
(57, 28, 'Hotel', 3600000),
(58, 29, 'Penerbangan', 2900000),
(59, 29, 'Makan', 1200000),
(60, 29, 'Hotel', 3700000),
(61, 30, 'Penerbangan', 3000000),
(62, 30, 'Makan', 1250000),
(63, 30, 'Hotel', 3800000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_cards_id` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method_id` int(11) DEFAULT NULL,
  `opsi_trip_ids` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `destination_cards_id`, `jumlah_tiket`, `total_harga`, `order_date`, `payment_method_id`, `opsi_trip_ids`) VALUES
(1, 4, 2, 2, 0, '2024-08-04 04:10:50', NULL, NULL),
(2, 4, 2, 2, 0, '2024-08-04 04:11:53', NULL, NULL),
(3, 4, 1, 3, 0, '2024-08-04 04:14:28', NULL, NULL),
(4, 4, 1, 3, 0, '2024-08-04 04:15:38', NULL, NULL),
(5, 4, 1, 2, 0, '2024-08-04 04:24:36', NULL, NULL),
(13, 4, 1, 2, 24, '2024-08-06 03:40:25', 2, NULL),
(15, 4, 7, 13, 390, '2024-08-05 22:00:56', 3, NULL),
(16, 3, 8, 7, 350, '2024-08-04 05:33:48', 2, NULL),
(17, 3, 6, 4, 40, '2024-08-04 05:43:54', 2, NULL),
(18, 3, 5, 4, 100, '2024-08-04 06:18:22', 3, NULL),
(19, 4, 5, 3, 75, '2024-08-05 22:11:30', 1, NULL),
(21, 4, 7, 5, 150, '2024-08-06 03:15:59', 2, NULL),
(22, 4, 1, 1, 12, '2024-08-06 03:33:35', 3, NULL),
(23, 4, 2, 5, 5, '2024-08-06 03:46:34', 3, NULL),
(24, 4, 6, 3, 30, '2024-08-06 06:11:46', 2, NULL),
(25, 4, 3, 5, 45, '2024-08-06 08:27:26', 2, NULL),
(26, 4, 10, 3, 4500000, '2024-08-06 09:21:17', 1, NULL),
(27, 3, 2, 4, 48, '2024-08-06 14:20:43', 3, NULL),
(30, 3, 24, 1, 760000, '2024-08-06 17:16:05', 1, NULL),
(46, 12, 15, 6, 3000000, '2024-08-07 08:57:37', 1, NULL),
(54, 11, 2, 2, 8800000, '2024-08-09 03:40:23', 3, '4,5,6'),
(55, 11, 3, 2, 4500000, '2024-08-09 03:48:23', 2, '7'),
(57, 11, 26, 1, 7050000, '2024-08-09 04:20:45', 3, '1,2,3'),
(58, 11, 14, 1, 5000000, '2024-08-09 06:28:33', 2, '34,36'),
(59, 11, 1, 2, 8000000, '2024-08-09 06:47:40', 2, '1'),
(60, 11, 2, 1, 3800000, '2024-08-09 06:53:14', 2, '4,6'),
(61, 11, 11, 3, 15900000, '2024-08-09 07:47:07', 2, '28,29,30'),
(62, 11, 11, 3, 15900000, '2024-08-09 07:47:24', 1, '28'),
(63, 11, 2, 1, 4400000, '2024-08-09 07:57:41', 2, '4'),
(64, 11, 1, 2, 8000000, '2024-08-09 08:07:48', 1, '1'),
(65, 11, 25, 3, 20400000, '2024-08-09 08:16:57', 3, '46,47,48'),
(66, 13, 2, 3, 6600000, '2024-08-09 08:31:34', 2, '4'),
(67, 13, 3, 3, 6750000, '2024-08-09 08:31:50', 3, '7,8'),
(68, 11, 25, 2, 13600000, '2024-08-09 08:58:35', 1, '46,47,48');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Bank BCA'),
(3, 'Bank BNI'),
(2, 'Bank Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'aa', '123', 'aa@gmail.com'),
(2, 'qqq@gmail.com', '1234', ''),
(3, 'Ridhuan', '12345', 'ridhuan@gmail.com'),
(4, 'Raj Alam', '11', 'alam12@gmail.com'),
(5, 'revan', '112233', 'revan@gmail.com'),
(6, 'asds', '111', 'sadsad@ss'),
(7, 'sdad', '11', 'ads@dsd'),
(8, 'saS', '11', 'ww@ww'),
(9, 'aa', '111', 'ss@dd'),
(10, 'aa', 'ss', 'asa@sdsd'),
(11, 'Revan', '11', 'revan1@gmail.com'),
(12, 'adun', '111', 'adun@gmail.com'),
(13, 'ope', 'opeope', 'ope@gmail.com'),
(14, 'repan ', '111', 'repan1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination_cards`
--
ALTER TABLE `destination_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opsi_trip`
--
ALTER TABLE `opsi_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_cards_id` (`destination_cards_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destination_cards_id` (`destination_cards_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination_cards`
--
ALTER TABLE `destination_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `opsi_trip`
--
ALTER TABLE `opsi_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opsi_trip`
--
ALTER TABLE `opsi_trip`
  ADD CONSTRAINT `opsi_trip_ibfk_1` FOREIGN KEY (`destination_cards_id`) REFERENCES `destination_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`destination_cards_id`) REFERENCES `destination_cards` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
