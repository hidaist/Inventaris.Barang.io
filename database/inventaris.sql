-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table inventaris.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `kode_admin` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  PRIMARY KEY (`kode_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.admin: 1 rows
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`kode_admin`, `username`, `password`, `level`) VALUES
	('KAD-671f6d8c64914', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table inventaris.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` varchar(20) NOT NULL,
  `no_barang` varchar(25) NOT NULL,
  `nm_barang` text NOT NULL,
  `kd_ruang` varchar(20) NOT NULL,
  `kondisi_barang` varchar(20) NOT NULL,
  `date_pembelian` date DEFAULT NULL,
  `keterangan_barang` varchar(500) NOT NULL,
  `filegambar` varchar(500) NOT NULL,
  `harga_barang` int NOT NULL,
  `anggaran_awal` varchar(100) NOT NULL,
  `sat` varchar(20) NOT NULL,
  `stat` int NOT NULL DEFAULT '0',
  `merk` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.barang: 7 rows
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`kd_barang`, `no_barang`, `nm_barang`, `kd_ruang`, `kondisi_barang`, `date_pembelian`, `keterangan_barang`, `filegambar`, `harga_barang`, `anggaran_awal`, `sat`, `stat`, `merk`, `type`) VALUES
	('INV-668544fbca5a5', '12345', 'Laptop', 'KRG-667ccd646b488', 'RR', '2024-07-03', 'asdf', '672182c22afa8.jpg', 2500000, 'BOS', 'Instansi Kesehatan', 0, 'Thosiba', 'Slim'),
	('INV-6720fbfa12b6e', 'MSC23450KK12', 'Mesin Cuci', 'KRG-6720984fb1b5d', 'B', '2024-10-29', '7.5 Liter dengan kecepatan putaran 1000rpm', '6720fe12346d6.jpg', 3500000, 'BOS', 'Instansi Sekolah', 1, 'Lenovo', 'Military'),
	('INV-67219a72305b3', '34582ms', 'Komputer PC', 'KRG-667ccd646b488', 'B', '2023-08-05', 'PC core i 7 bla bla bla', '67219aa9c52f2.jpg', 5000000, 'BOS', 'SD', 1, NULL, NULL),
	('INV-67219acbc05a5', 'tstr33554', 'TV LCD', 'KRG-6720984fb1b5d', 'B', '2022-10-30', 'asdf', '67219af42e2b9.jpg', 1500000, 'BOS', 'SD', 1, NULL, NULL),
	('INV-67219f8f76301', 'clor1254', 'Tv Samsung', 'KRG-667ccd646b488', 'RB', '2021-10-23', ';blg', '67219fac9344f.jpg', 7000000, 'BOS', 'SD', 0, NULL, NULL),
	('INV-6721abbf22f72', 'msd114', 'TV LCD', 'KRG-6720984fb1b5d', 'B', '2019-11-06', '65yghc', '6721abdcb761d.jpg', 4550000, 'BOS', 'SD', 1, NULL, NULL),
	('INV-6739c246dff10', '1', 'Laptop', 'KRG-667ccd646b488', 'RR', '2024-11-17', 'adsf', '6739c260b93a3.jpg', 2000000, 'BOS', 'SD', 1, NULL, NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table inventaris.barang_kembali
CREATE TABLE IF NOT EXISTS `barang_kembali` (
  `kd_kembali` varchar(20) NOT NULL,
  `kd_pinjam` varchar(20) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `date_kembali` date NOT NULL,
  PRIMARY KEY (`kd_kembali`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.barang_kembali: 2 rows
/*!40000 ALTER TABLE `barang_kembali` DISABLE KEYS */;
INSERT INTO `barang_kembali` (`kd_kembali`, `kd_pinjam`, `kd_barang`, `date_kembali`) VALUES
	('KJB-668555f19b610', 'PJB-66855354b097f', 'INV-668544fbca5a5', '2024-07-03'),
	('KJB-672c06dfc709c', 'PJB-672ac6f58a9c1', 'INV-6721abbf22f72', '2024-11-07');
/*!40000 ALTER TABLE `barang_kembali` ENABLE KEYS */;

-- Dumping structure for table inventaris.barang_pinjam
CREATE TABLE IF NOT EXISTS `barang_pinjam` (
  `kd_pinjam` varchar(20) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `kd_user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nm_peminjam` varchar(100) NOT NULL,
  `date_pinjam` date NOT NULL,
  `keterangan_pinjam` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_pinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.barang_pinjam: 3 rows
/*!40000 ALTER TABLE `barang_pinjam` DISABLE KEYS */;
INSERT INTO `barang_pinjam` (`kd_pinjam`, `kd_barang`, `kd_user`, `nm_peminjam`, `date_pinjam`, `keterangan_pinjam`) VALUES
	('PJB-66855354b097f', 'INV-668544fbca5a5', 'USR-667518d6bf874', 'Dhais Imam Sutrisno', '2024-07-03', 'buat maen'),
	('PJB-672ac6f58a9c1', 'INV-6721abbf22f72', NULL, 'Dika', '2024-11-06', 'TES KD_BARANG'),
	('PJB-672c16eb2edb3', 'INV-67219f8f76301', NULL, 'Dika', '2024-11-07', 'Peminjaman Untuk Penampilan di AULA');
/*!40000 ALTER TABLE `barang_pinjam` ENABLE KEYS */;

-- Dumping structure for table inventaris.ruang
CREATE TABLE IF NOT EXISTS `ruang` (
  `kd_ruang` varchar(20) NOT NULL,
  `nm_ruang` varchar(100) NOT NULL,
  `detail_ruang` varchar(500) NOT NULL,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.ruang: 2 rows
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` (`kd_ruang`, `nm_ruang`, `detail_ruang`) VALUES
	('KRG-667ccd646b488', 'Ruang Tata Usaha SD', 'Ruang Tata Usaha SD'),
	('KRG-6720984fb1b5d', 'Lab Komputer', 'Ruang Lab Komputer Dengan Panjang 5x5 meter persegi.');
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;

-- Dumping structure for table inventaris.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `kd_barang` varchar(6) NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.stok: 0 rows
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;

-- Dumping structure for table inventaris.users
CREATE TABLE IF NOT EXISTS `users` (
  `kd_user` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(500) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table inventaris.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`kd_user`, `email`, `password`, `nama`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl`, `foto`, `level`, `status`) VALUES
	('USR-667ba6ceafa37', 'dodo@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Roki', 'Laki-laki', 'wef', 'Bantul', '2024-06-26', '667ba70e75bdb.jpg', 'SD', 'Offline now'),
	('USR-667518d6bf874', 'dhaisimam.s@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Dhais Imam Sutrisno', 'Laki-laki', 'asdf', 'Bantul', '2024-06-21', '66761ee999a1f.jpg', 'SD', 'Active now'),
	('USR-667bb0c7052d9', 'reds.cloud89@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'dodo', 'Laki-laki', 'reh', 'Bantul', '2024-06-26', '667bb0e26531a.jpg', 'SD', 'Active now');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for trigger inventaris.barangkembali
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `barangkembali` AFTER INSERT ON `barang_kembali` FOR EACH ROW UPDATE barang
    SET stat = stat + 1
    WHERE kd_barang = NEW.kd_barang//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger inventaris.deletpinjambarang
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `deletpinjambarang` AFTER DELETE ON `barang_pinjam` FOR EACH ROW UPDATE barang
    SET stat = stat + 1
    WHERE kd_barang = OLD.kd_barang//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger inventaris.pinjambarang
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pinjambarang` AFTER INSERT ON `barang_pinjam` FOR EACH ROW UPDATE barang
    SET stat = stat - 1
    WHERE kd_barang = NEW.kd_barang//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
