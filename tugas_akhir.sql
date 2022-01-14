-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2020 at 04:09 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `user`, `pass`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Sabri');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(150) NOT NULL,
  `harga_menu` varchar(15) NOT NULL,
  `gambar_menu` varchar(500) NOT NULL,
  `kategori_menu` varchar(50) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `gambar_menu`, `kategori_menu`, `deskripsi_menu`) VALUES
(2, 'Cheeseburger with Egg', '10000', 'jIFNIQEF2h4q7LTyV5AM.png', 'Makanan', 'Roti burger lezat dengan daging sapi, telur, keju, saus tomat, acar, potongan bawang dan mustard'),
(3, 'McFlurryÂ® Oreo', '10000', 'uhMqKyBSMEOn7FtaLG36.png', 'Pencuci Mulut', 'Es krim vanilla lembut dengan campuran bubuk biskuit Oreo.'),
(4, 'Big MacÂ®', '20000', '55OlgpzhBWeDj5XVCQL3.png', 'Makanan', '3 tumpuk roti burger dengan taburan wijen di atasnya, 2 lapis daging sapi, selada segar, keju, acar, saus Big Mac, potongan bawang.'),
(5, 'VEGGIE GARDEN', '70000', 'PHD-Veggie-Pizza-210x165px.png', 'Makanan', 'Dengan jamur, paprika merah dan hijau, nanas, jagung, keju mozzarella dan saus spesial PHD.'),
(6, 'CHEESE WORLD PIZZA', '80000', 'PHD-CheeseWorld-Pizza-210x165px.png', 'Makanan', 'Dengan keju mozzarella, keju camembert, cream cheese, keju orange cheddar, saus alfredo dan peterseli.\r\n\r\n'),
(7, 'Triple Burger with Cheese', '15000', '6ZDzhChKnawUgijjRTcq.png', 'Makanan', 'Dijamin puas dengan 3 lapisan daging ditambah keju\r\n\r\n'),
(8, 'McSpicyâ„¢', '15000', 'ABytZXl0HufKWtMwykBw.png', 'Makanan', 'Burger dengan daging paha ayam yang empuk, renyah dan pedas, dilengkapi dengan selada segar dan saus istimewa di dalam roti berwijen.'),
(9, 'Premium Roast Coffee', '15000', 'EWDUZ1f4vDGEOKMt0Nf6.png', 'Minuman', 'Kopi 100% Arabica, tersaji panas dengan pilihan black coffee (kopi hitam) atau white coffee (kopi dengan tambahan susu)'),
(10, 'Sosro Heritage Tea', '15000', '2ReB0kiH8BoYKFYduHYQ.png', 'Minuman', 'Teh melati yang tersaji panas dan dapat ditambahkan gula sesuai selera.'),
(11, 'Iced Coffee', '15000', 'Hgl1cngcNgsRGl86paWv.png', 'Minuman', 'Alternatif segar untuk menikmati kopi dingin ditambah krim dan bubuk cokelat.\r\n\r\n'),
(12, 'Iced Milo', '15000', 'uWwcZHvGd8GfWBsCusxL (1).png', 'Makanan', 'Minuman susu coklat berenergi yang tersaji dingin.\r\n\r\n'),
(13, 'ada', '800', '', 'Makanan', '                        808                ');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

DROP TABLE IF EXISTS `ongkir`;
CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Makassar', 0),
(2, 'Luar Makassar', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Dalam Proses',
  PRIMARY KEY (`id_pembelian`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
(4, 4, 1, '2019-11-14', 90000, 0, 'PK 7', 'Dalam Proses'),
(2, 1, 2, '2018-12-19', 20000, 10000, 'Jalan Biring Romang.', 'Dalam Proses'),
(3, 1, 2, '2019-01-07', 20000, 10000, '', 'Dalam Proses');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_menu`
--

DROP TABLE IF EXISTS `pembelian_menu`;
CREATE TABLE IF NOT EXISTS `pembelian_menu` (
  `id_pembelian_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(5) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `subharga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembelian_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_menu`
--

INSERT INTO `pembelian_menu` (`id_pembelian_menu`, `id_pembelian`, `id_menu`, `jumlah`, `nama_menu`, `harga`, `subharga`) VALUES
(1, 1, 5, 1, 'VEGGIE GARDEN', '70000', '70000'),
(2, 1, 2, 3, 'Cheeseburger with Egg', '10000', '30000'),
(3, 2, 2, 1, 'Cheeseburger with Egg', '10000', '10000'),
(4, 3, 2, 1, 'Cheeseburger with Egg', '10000', '10000'),
(5, 4, 5, 1, 'VEGGIE GARDEN', '70000', '70000'),
(6, 4, 4, 1, 'Big MacÂ®', '20000', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `pass`, `kontak`) VALUES
(1, 'Sabri', 'ensabrii90@gmail.com', '123', '082293833177'),
(2, 'sabri', 'ensabrii90@gmail.com', 'Newpw123', '5037365916'),
(3, 'ensabrii90', 'ensabrii90@gmail.com', 'Newpw123', '8520'),
(4, 'Riska', 'riska@gmail.com', '123123', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
