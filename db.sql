-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ci3.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Dumping data for table ci3.tbl_hak_akses: ~29 rows (approximately)
DELETE FROM `tbl_hak_akses`;
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
  (15, 1, 1),
  (19, 1, 3),
  (21, 2, 1),
  (28, 2, 3),
  (29, 2, 2),
  (30, 1, 2),
  (33, 1, 11),
  (36, 1, 13),
  (41, 1, 9),
  (43, 1, 12),
  (45, 1, 15),
  (46, 1, 14),
  (47, 1, 10),
  (49, 5, 13),
  (50, 1, 16),
  (51, 1, 17),
  (52, 1, 18),
  (53, 1, 19),
  (54, 1, 20),
  (55, 1, 21),
  (56, 1, 22),
  (57, 1, 23),
  (58, 1, 24),
  (59, 1, 25),
  (60, 1, 26),
  (61, 1, 27),
  (62, 1, 28),
  (63, 1, 29),
  (64, 1, 30);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table ci3.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table ci3.tbl_menu: ~0 rows (approximately)
DELETE FROM `tbl_menu`;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`, `urutan`) VALUES
  (1, 'MENU', 'admin/menu', 'fa fa-server', 15, 'y', 5),
  (2, 'USER / ADMIN', 'admin/user', 'fa fa-user-o', 15, 'y', 8),
  (3, 'HAK AKSES', 'admin/userlevel', 'fa fa-users', 15, 'y', 3),
  (13, 'Beranda', 'admin/home', 'fa fa-id-card', 0, 'y', 0),
  (15, 'Opsi', '#', 'fa fa-cog', 0, 'y', 77);
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Dumping structure for table ci3.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ci3.tbl_setting: ~0 rows (approximately)
DELETE FROM `tbl_setting`;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
  (1, 'Tampil Menu', 'ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table ci3.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ci3.tbl_user: ~0 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
  (4, 'oqhadev', 'oqhatime@gmail.com', '$2y$04$6o4CbvOtWBdFYLv6llC4Je.HqZXMOgtazfNJLRRjYJP/HRckbsiAi', 'cari.png', 1, 'y'),
  (8, 'Admin', 'admin@admin.com', '$2y$04$VUMElLwvzn7nFHwzFd1sHe5iG4OPVsDipRjFo8laIMpxw0veHq8RO', '61080_-_Copy.jpg', 1, 'y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table ci3.tbl_user_level
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ci3.tbl_user_level: ~2 rows (approximately)
DELETE FROM `tbl_user_level`;
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
  (1, 'Super Admin'),
  (2, 'Admin');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;










