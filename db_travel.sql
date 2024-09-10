-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 08:03 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `destination_cards_id` int(11) NOT NULL,
  `img_path` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `destination_cards_id`, `img_path`) VALUES
(1, 25, 'https://1.bp.blogspot.com/-ZwyubnTMDuc/ULZeybQcnCI/AAAAAAAALcI/Vdpxxrp_5dY/s1600/china+wall+(3).jpg'),
(2, 25, 'https://hdwallpaperim.com/wp-content/uploads/2017/08/27/143174-Great_Wall_of_China.jpg'),
(3, 25, 'https://cdn.britannica.com/54/122154-050-4DA0F697/Great-Wall-of-China.jpg'),
(4, 25, 'https://getwallpapers.com/wallpaper/full/5/d/a/1120472-amazing-the-great-wall-of-china-wallpaper-2560x1544-pc.jpg'),
(6, 26, 'https://i.pinimg.com/originals/92/de/64/92de645ea2bc848ef184b42ef78dbf83.jpg'),
(7, 26, 'https://www.tripsavvy.com/thmb/aCiBu1D-Kr3-P90I6QmvPaJJ4SI=/2121x1414/filters:fill(auto,1)/chinese-temple-and-forbidden-city-in-a-day-636217080-f9f58e9618db4409b22733fcf9591901.jpg'),
(10, 26, 'https://cdn.theworldofchinese.com/media/images/VCG111406876481.original.jpg'),
(11, 27, 'https://th.bing.com/th/id/R.fa7db323b6c5610d391d5e4fb90537b6?rik=G6XmpEe%2fdE1KdA&riu=http%3a%2f%2fwww.eyesonlife.org%2fArticles%2fCountry%2fChina%2fImages%2fterracotta_army-007.jpg&ehk=LJ4Gyob0q8dfMEWDWqaoOwY5EhFS%2bwAwqezOIFRDLVs%3d&risl=&pid=ImgRaw&r=0'),
(12, 27, 'https://live-production.wcms.abc-cdn.net.au/9e0a5acd2e42f3aeca290c5e62034134?impolicy=wcms_crop_resize&cropH=999&cropW=1500&xPos=0&yPos=128&width=862&height=575'),
(13, 27, 'https://www.archaeology.wiki/wp-content/uploads/2022/03/Terracotta_army_1.jpg'),
(14, 28, 'https://www.pixel4k.com/wp-content/uploads/2020/08/the-bund-waterfront-shanghai_1596916650.jpg'),
(15, 28, 'https://www.terragalleria.com/images/gallery/china/chin66623.large.jpeg'),
(16, 28, 'https://bestcityscape.com/wp-content/uploads/2018/11/DJICN18_005038.jpg'),
(17, 29, 'https://studycli.org/wp-content/uploads/2020/04/li-river-jiumahuashan-karst-mountains-guilin-landscape-02.jpg'),
(18, 29, 'https://www.easytourchina.com/images/Photo/yangshuo/p7_d20151019152411.jpg'),
(19, 29, 'https://cdn.britannica.com/48/94448-050-90D2325E/Li-River-China.jpg'),
(20, 1, 'https://1.bp.blogspot.com/-xgkzA1v3IW4/X1FtmWqFLII/AAAAAAAAEwU/hFTCs_l7hx4I2xqKvhijsFE-DXPxVEmdQCLcBGAsYHQ/s2048/Osaka_Castle_Japan.jpg'),
(21, 1, 'https://th.bing.com/th/id/R.e4a2f8a866cb3d369570ab2f255d0988?rik=JwIxssLz%2bVHR%2bw&riu=http%3a%2f%2fwww.kanpai-japan.com%2fsites%2fdefault%2ffiles%2fuploads%2f2012%2f05%2fosaka-castle-5.jpg&ehk=Wln%2b6RPh%2bsme8kKAaS9RqvcD%2fvI2J4xvDKla7%2fjWzA8%3d&risl=&pid=ImgRaw&r=0'),
(22, 1, 'https://th.bing.com/th/id/R.f10a33c4e79d060f339601f87ed07831?rik=vWQSQ6e%2bG%2b%2byvA&riu=http%3a%2f%2finspirationseek.com%2fwp-content%2fuploads%2f2014%2f09%2fOsaka-Castle-Pictures-Wallpaper1.jpg&ehk=8T3lbjjzoR7zo65b6RV4KjpVXZ8L6f%2bBVnkTp0tlSvs%3d&risl=&pid=ImgRaw&r=0'),
(23, 1, 'https://live.staticflickr.com/65535/50335987562_337058b37c_b.jpg'),
(24, 2, 'https://th.bing.com/th/id/R.57898fbfbb9f3acfb65af42c4021a753?rik=iUTRXy6Bm%2bEdpA&riu=http%3a%2f%2fwww.tdrfan.com%2ftds%2fmysterious_island%2f20000_leagues_under_the_sea%2fgallery%2f20000_leagues_under_the_sea_006.jpg&ehk=UI1DS%2bJz1DdF2XKUPEnBKsSmnx1VohVko0PRsw0gTn0%3d&risl=&pid=ImgRaw&r=0'),
(25, 2, 'https://gaijinpot.scdn3.secure.raxcdn.com/app/uploads/sites/6/2016/06/Tokyo-DisneySea-Flickr.jpg'),
(26, 2, 'https://imgcp.aacdn.jp/img-a/1200/900/global-aaj-front/article/2016/08/57af0f933ed63_57af0c1dd6cc1_104386731.jpg'),
(27, 2, 'https://th.bing.com/th/id/R.5de5242c87e594b7e48661c36bd4b312?rik=TIV5E%2fJproyqMA&riu=http%3a%2f%2fstatic1.squarespace.com%2fstatic%2f57b72100e4fcb5e4aef2f4c4%2ft%2f63b681af9df1ef58f0dc3a4e%2f1674114553982%2fTokyo-DisneySea-Hotel-Miracosta-Balcony-View-by-Joshua-Meyer.jpeg%3fformat%3d1500w&ehk=4iXnzhDFASPwrjiaUMuDlfUcyb%2fZSpt%2bI%2bVpnzA9ihQ%3d&risl=&pid=ImgRaw&r=0'),
(28, 3, 'https://media.istockphoto.com/photos/nijo-castle-in-kyoto-picture-id474932712?k=20&m=474932712&s=612x612&w=0&h=bK6F-JrFPresUwipdOeJsAYEcsYPdlFy93v2kA39x0Q='),
(29, 3, 'https://www.infojepang.net/wp-content/uploads/Interior-dan-lukisan-di-dalam-Istana-Nijo-1024x1024.jpg'),
(30, 3, 'https://4.bp.blogspot.com/-vwvFqSUvtMg/TxwFbRM6WQI/AAAAAAAABDg/suxSnMIuXt8/s1600/SAM_1678.JPG'),
(31, 4, 'https://jepang-indonesia.co.id/wp-content/uploads/2023/01/sensoji-temple-1.jpg'),
(32, 4, 'https://cdn.idntimes.com/content-images/community/2021/08/fromandroid-f313e1058f9c434d3120b714106367b4.jpg'),
(33, 4, 'https://www.blazetrip.com/wp-content/uploads/2019/12/tokyo-sensoji-temple-overview.jpg'),
(34, 4, 'https://www.gotravelly.com/assets/img/review/gallery/1710/4e6a985a1da1d4db8ae57f3cd614c5cf.jpg'),
(35, 5, 'https://th.bing.com/th/id/OIP.8pO6x_aDTdXiyTazQuaukwHaJQ?rs=1&pid=ImgDetMain'),
(36, 5, 'https://lh4.googleusercontent.com/proxy/xonLwKPqzC_OgD8BH7f8DchGyFAU2mFMrR3nWEz5I0tL6uYeyZhwERX5sy1CGvzMEZyGe34xcgpjwiqbWFN2PYw4-7BkKP2_AizWILn62saYPMl7eVF3xQ=s0-d'),
(37, 6, 'https://www.tripsavvy.com/thmb/Zk_fxIIF92UIfujOk5lMOj9YS0M=/3936x2624/filters:fill(auto,1)/DSC_6146-5ed42cc667dc4defb4f489d681f4036b.jpg'),
(38, 6, 'https://external-preview.redd.it/uibxGaszB41-5CizB5l0X6ozuZrhYiY7wC6DwkMwsco.jpg?auto=webp&s=c2d129bfe6c8a31cb72ac3b320d05a8f8e1ed788'),
(39, 6, 'https://www.monikasalzmann.com/wp-content/uploads/2020/01/Fushimi-Inari-Taisha-kyoto.jpg'),
(40, 6, 'https://thumbs.dreamstime.com/b/inari-japan-nov-thousands-torii-form-sort-gallery-fushimi-inari-taisha-shrine-inscriptions-fushimi-inari-taisha-111037368.jpg'),
(41, 7, 'https://itsyourjapan.com/wp-content/uploads/2018/11/When-are-the-best-days-to-visit-the-park-Universal-Studios-Japan-Tips-1024x597.jpg'),
(42, 7, 'https://c1.staticflickr.com/3/2219/2270953711_0a41a16cc6_b.jpg'),
(43, 7, 'https://th.bing.com/th/id/R.03c5c04a03228818d25ebae29d4a110e?rik=lQ7Mtg6kzqmSDw&riu=http%3a%2f%2fwww.travelcaffeine.com%2fwp-content%2fuploads%2f2016%2f03%2funiversal-studios-japan-osaka-trip-071.jpg&ehk=jfD1xNxwsy3OsHgZJTH3Eut6aQp5O7IiD5tcrbExj1M%3d&risl=&pid=ImgRaw&r=0'),
(44, 7, 'https://1.bp.blogspot.com/-yf1Wwz0Veho/ThJAnU_RvrI/AAAAAAAAAK4/S0s9Utelq3w/s1600/DSC04596.JPG'),
(45, 8, 'https://i.pinimg.com/originals/c8/23/17/c823172587b4b1003f8224eb1ff881a7.jpg'),
(46, 8, 'https://www.pcclean.io/wp-content/gallery/mount-fuji-hd-wallpapers/Mount-Fuji-21.jpg'),
(47, 10, 'https://cdn.getyourguide.com/img/location/5b45cac29bcf1.jpeg/88.jpg'),
(48, 10, 'https://1.bp.blogspot.com/-f4oTpZDYvdM/TrukMAT-oGI/AAAAAAAAAU4/U8b8FxZNMpE/s1600/seoul-tower-aerial-view.jpg'),
(49, 11, 'https://thumbs.dreamstime.com/b/gallery-gyeongbokgung-palace-grounds-seoul-south-korea-39316007.jpg'),
(50, 11, 'https://thisiskoreatours.com/wp-content/uploads/2017/03/Gyeongbokgung-Palace.jpg'),
(51, 11, 'https://a.cdn-hotels.com/gdcs/production87/d1597/ecdd89f2-79d4-46a1-b474-6f132ffdc2d1.jpg'),
(52, 12, 'https://toucanslandmarks.s3.amazonaws.com/media/com_scatalog/images/listings/o/2020073018573523752.jpg'),
(53, 12, 'https://i.pinimg.com/originals/cd/c5/ff/cdc5ff1bac3dd595c7e75e760da09212.jpg'),
(54, 12, 'https://www.tripsavvy.com/thmb/ie3EIwNbr5w3CNjwxeBQnRRWSqo=/2119x1414/filters:fill(auto,1)/GettyImages-1075844336-9cbbdc598d8b44518f55cd24610cf3d9.jpg'),
(55, 14, 'https://th.bing.com/th/id/R.4e600a05f4725de6d3eff95d05c10987?rik=AQ2sHx41aCn%2bEg&riu=http%3a%2f%2fassets.fodors.com%2fdestinations%2f710812%2fpath-seongsan-ilchulbong-jeju-island-south-korea_980x650.jpg&ehk=9NyVssxuEADMV0%2fJTZ8xG%2bxx7XeNX87HFzzUPnVHomA%3d&risl=&pid=ImgRaw&r=0'),
(56, 14, 'https://th.bing.com/th/id/R.6e6911cf18c920fc8982a9c14ab3ef71?rik=hH0g1zQPvaJp%2fw&riu=http%3a%2f%2fwww.erichevesyphotography.com%2fwp-content%2fuploads%2f2015%2f12%2fTop-Jeju-Island-Photos-2015-12-of-19.jpg&ehk=95ZlETTfF1nz6zMfI6zFI7hk6rcKz53IY1lrRUyUZxk%3d&risl=&pid=ImgRaw&r=0'),
(57, 14, 'https://th.bing.com/th/id/R.234bc87717e468df38fb42f26c1475fc?rik=JZWsCvFP8esErA&riu=http%3a%2f%2fassets.fodors.com%2fdestinations%2f710812%2fjeongbang-waterfall-jeju-island-south-korea_980x650.jpg&ehk=r6rk%2fRiCGNPURVMoeHftFt%2f9WlXSf9al8eOhylEAZUc%3d&risl=&pid=ImgRaw&r=0'),
(58, 15, 'https://www.thehiddenthimble.com/wp-content/uploads/2012/11/lotteworld17-1024x768.jpg'),
(59, 15, 'https://cdn-imgix.headout.com/tour/19742/TOUR-IMAGE/5352fe14-ad34-43e3-aaf2-290a4dd4840c-10592-seoul-lotte-world-theme-park-ticket-01.jpg'),
(60, 15, 'https://3.bp.blogspot.com/-1E1Ab5PJUFI/WhQWwpKsM0I/AAAAAAAAAcw/nwX6deaF-TANg6fZ8gZ-45Avu4KwPYipwCLcBGAs/s1600/maxresdefault.jpg'),
(61, 15, 'https://th.bing.com/th/id/R.1da2545660dd513793ac7d21a6531e1f?rik=QgxaKSQC9SeBhQ&riu=http%3a%2f%2fdivui.com%2fblog%2fwp-content%2fuploads%2f2018%2f04%2fLotte-World-2.jpg&ehk=7PWLHA6GnPeQ9aYc%2b75IpQqSUh7tbhXoZfFEn%2fy%2fWA8%3d&risl=&pid=ImgRaw&r=0'),
(62, 17, 'https://wallpapercave.com/wp/wp7545684.jpg'),
(63, 17, 'https://www.ivisitkorea.com/wp-content/uploads/nami-island-on-Autumn.jpg'),
(64, 24, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0a/d1/56/53/coex-aquarium.jpg?w=1200&h=1200&s=1'),
(65, 24, 'https://media-cdn.tripadvisor.com/media/photo-s/16/f4/bf/2a/coex-aquarium.jpg'),
(66, 30, 'https://th.bing.com/th/id/R.f08f0330c2d8e34fcc65600c24205241?rik=mqkl%2bMj4%2fPEY7Q&riu=http%3a%2f%2fwww.jics.co.kr%2fdata%2feditor%2f1905%2fthumb-bb84958701e2e0d1c8521189a27ecefb_1557919666_8508_750x563.jpg&ehk=1UVjHX7ktMMCwG9YHGCF4%2f6ya2chWOBLo%2fggka7LtEA%3d&risl=&pid=ImgRaw&r=0'),
(67, 30, 'https://d3rr2gvhjw0wwy.cloudfront.net/uploads/activity_galleries/53046/2000x2000-0-70-5b47cfcbea16eb11136dee366826c341.jpg');

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
(65, 11, 25, 1, 1000000, '0000-00-00 00:00:00', 3, '47'),
(66, 13, 2, 3, 6600000, '2024-08-09 08:31:34', 2, '4'),
(67, 13, 3, 3, 6750000, '2024-08-09 08:31:50', 3, '7,8'),
(74, 11, 11, 4, 21200000, '0000-00-00 00:00:00', 2, '28,29,30'),
(79, 11, 3, 3, 13650000, '2024-08-27 17:00:00', 2, '7,8,9'),
(80, 11, 2, 4, 17600000, '0000-00-00 00:00:00', 2, '4,5,6'),
(82, 11, 3, 6, 10200000, '0000-00-00 00:00:00', 3, '7'),
(84, 15, 3, 3, 13650000, '2024-09-18 17:00:00', 2, '7'),
(85, 15, 4, 3, 11850000, '2024-08-27 17:00:00', 3, '1'),
(86, 15, 3, 2, 9100000, '0000-00-00 00:00:00', 2, '7,8,9'),
(87, 15, 3, 2, 9100000, '2024-08-14 17:00:00', 1, '7'),
(88, 15, 27, 2, 14600000, '0000-00-00 00:00:00', 1, '1'),
(89, 11, 14, 3, 17400000, '2024-08-14 17:00:00', 1, '1');

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
(14, 'repan ', '111', 'repan1@gmail.com'),
(15, 'Rizwan', '123', 'rzn@gmail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_cards_id` (`destination_cards_id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`destination_cards_id`) REFERENCES `destination_cards` (`id`);

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
