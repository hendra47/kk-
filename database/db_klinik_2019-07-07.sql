# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Database: db_klinik
# Generation Time: 2019-07-06 18:43:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table biaya
# ------------------------------------------------------------

DROP TABLE IF EXISTS `biaya`;

CREATE TABLE `biaya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `biaya` WRITE;
/*!40000 ALTER TABLE `biaya` DISABLE KEYS */;

INSERT INTO `biaya` (`id`, `nama`, `type`, `nilai`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Tes Gula Darah','TINDAKAN',120000,'2019-06-30 16:18:08','2019-06-30 16:18:08',NULL),
	(2,'UMUM','TINDAKAN',100000,'2019-06-30 16:19:17','2019-06-30 16:19:17',NULL),
	(3,'TARIF DOKTER','JASA',100000,'2019-06-30 16:22:01','2019-06-30 16:56:00',NULL);

/*!40000 ALTER TABLE `biaya` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table daftars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daftars`;

CREATE TABLE `daftars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_pasien` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `pulang` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_dokter` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `daftars` WRITE;
/*!40000 ALTER TABLE `daftars` DISABLE KEYS */;

INSERT INTO `daftars` (`id`, `tgl`, `id_pasien`, `nama`, `pulang`, `created_at`, `updated_at`, `deleted_at`, `id_dokter`)
VALUES
	(5,'2019-07-06',1,'',NULL,'2019-07-06 08:26:22','2019-07-06 08:29:40',NULL,3),
	(6,'2019-07-06',2,'',1,'2019-07-06 16:16:25','2019-07-06 16:16:25',NULL,3);

/*!40000 ALTER TABLE `daftars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `nama`, `created_at`, `updated_at`)
VALUES
	(1,'Dokter','2019-06-30 15:48:20','2019-06-30 15:48:20'),
	(2,'Admin IT','2019-06-30 15:48:28','2019-06-30 15:48:28'),
	(3,'Kasir','2019-06-30 15:48:34','2019-06-30 15:48:34');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(55,'2019_06_26_005636_create_roles_table',1),
	(65,'2014_10_12_000000_create_users_table',2),
	(66,'2014_10_12_100000_create_password_resets_table',2),
	(67,'2019_06_25_180629_create_pasiens_table',2),
	(68,'2019_06_25_181556_create_daftars_table',2),
	(69,'2019_06_25_182106_create_obats_table',2),
	(70,'2019_06_26_010106_create_settings_table',2),
	(72,'2019_06_30_153658_create_groups_table',3),
	(74,'2019_06_30_161126_create_biaya_table',4),
	(75,'2019_07_04_123149_create_roles_table',5),
	(76,'2019_07_06_160704_create_rekam_medis_table',6),
	(79,'2019_07_06_160710_create_rekam_medis_detail1_table',9),
	(80,'2019_07_06_160715_create_rekam_medis_detail2_table',10),
	(81,'2019_07_06_171821_create_pembayaran_table',11),
	(82,'2019_07_06_171829_create_pembayaran_detail1_table',12),
	(83,'2019_07_06_171837_create_pembayaran_detail2_table',13);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table obats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `obats`;

CREATE TABLE `obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `obats` WRITE;
/*!40000 ALTER TABLE `obats` DISABLE KEYS */;

INSERT INTO `obats` (`id`, `code`, `nama`, `jenis`, `satuan`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'6850','Bodrex','Obat Keras','PCS',10000,12000,'2019-06-30 16:07:25','2019-06-30 16:07:25',NULL),
	(2,'6888','Panadol','Sakit Kepala','PCS',NULL,10000,'2019-07-06 16:01:26','2019-07-06 16:01:26',NULL);

/*!40000 ALTER TABLE `obats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pasiens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pasiens`;

CREATE TABLE `pasiens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pasiens` WRITE;
/*!40000 ALTER TABLE `pasiens` DISABLE KEYS */;

INSERT INTO `pasiens` (`id`, `nama`, `no_ktp`, `jk`, `tgl_lahir`, `alamat`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Hendra',987,'L','2019-06-30','Jl Raya Legok 120','2019-06-30 16:05:56','2019-06-30 16:05:56',NULL),
	(2,'BUDIMAN PAPAK',989,'L','2019-06-04','Legok','2019-06-30 16:06:18','2019-06-30 16:06:18',NULL);

/*!40000 ALTER TABLE `pasiens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pembayaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `is_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;

INSERT INTO `pembayaran` (`id`, `id_pasien`, `id_dokter`, `id_rekam_medis`, `total`, `note`, `is_tindakan`, `created_at`, `updated_at`)
VALUES
	(3,1,3,23,22000,'TEST','Y','2019-07-06 17:41:14','2019-07-06 17:41:14');

/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pembayaran_detail1
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembayaran_detail1`;

CREATE TABLE `pembayaran_detail1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `biaya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pembayaran_detail1` WRITE;
/*!40000 ALTER TABLE `pembayaran_detail1` DISABLE KEYS */;

INSERT INTO `pembayaran_detail1` (`id`, `id_pembayaran`, `tindakan`, `biaya`, `created_at`, `updated_at`)
VALUES
	(2,3,'CEK DARAH',NULL,'2019-07-06 17:41:14','2019-07-06 17:41:14');

/*!40000 ALTER TABLE `pembayaran_detail1` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pembayaran_detail2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembayaran_detail2`;

CREATE TABLE `pembayaran_detail2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pembayaran_detail2` WRITE;
/*!40000 ALTER TABLE `pembayaran_detail2` DISABLE KEYS */;

INSERT INTO `pembayaran_detail2` (`id`, `id_pembayaran`, `id_obat`, `nama_obat`, `qty`, `harga`, `note`, `created_at`, `updated_at`)
VALUES
	(2,3,1,'',1,NULL,'Minum 1 x 1','2019-07-06 17:41:14','2019-07-06 17:41:14'),
	(4,3,2,'',1,NULL,'1 x 2',NULL,NULL);

/*!40000 ALTER TABLE `pembayaran_detail2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rekam_medis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rekam_medis`;

CREATE TABLE `rekam_medis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergi_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_daftar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rekam_medis` WRITE;
/*!40000 ALTER TABLE `rekam_medis` DISABLE KEYS */;

INSERT INTO `rekam_medis` (`id`, `id_pasien`, `id_dokter`, `keluhan`, `alergi_obat`, `is_tindakan`, `created_at`, `updated_at`, `note`, `id_daftar`)
VALUES
	(23,1,3,'Sakit Gigi','T','Y','2019-07-06 17:41:14','2019-07-06 17:41:14','TEST',5);

/*!40000 ALTER TABLE `rekam_medis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rekam_medis_detail1
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rekam_medis_detail1`;

CREATE TABLE `rekam_medis_detail1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(11) DEFAULT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `biaya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rekam_medis_detail1` WRITE;
/*!40000 ALTER TABLE `rekam_medis_detail1` DISABLE KEYS */;

INSERT INTO `rekam_medis_detail1` (`id`, `id_rekam_medis`, `tindakan`, `biaya`, `created_at`, `updated_at`)
VALUES
	(8,23,'CEK DARAH',NULL,'2019-07-06 17:41:14','2019-07-06 17:41:14');

/*!40000 ALTER TABLE `rekam_medis_detail1` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rekam_medis_detail2
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rekam_medis_detail2`;

CREATE TABLE `rekam_medis_detail2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `qty` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rekam_medis_detail2` WRITE;
/*!40000 ALTER TABLE `rekam_medis_detail2` DISABLE KEYS */;

INSERT INTO `rekam_medis_detail2` (`id`, `id_rekam_medis`, `id_obat`, `nama_obat`, `qty`, `note`, `created_at`, `updated_at`)
VALUES
	(4,23,1,'',1,'T','2019-07-06 17:41:14','2019-07-06 17:41:14');

/*!40000 ALTER TABLE `rekam_medis_detail2` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `user_id`, `menu`, `akses`, `created_at`, `updated_at`)
VALUES
	(1,2,'pendaftaran',2,'2019-07-04 17:32:50','2019-07-04 17:32:50'),
	(2,2,'master_data',1,'2019-07-05 13:00:02','2019-07-05 13:00:02');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_klinik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `nama_klinik`, `alamat`, `phone`, `logo`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Klinik Medica','Jl Raya Legok 120','82110191448','https://i.ibb.co/X4HLh9Y/logo.jpg','2019-06-30 16:52:36','2019-06-30 17:01:01',NULL);

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_doctor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `id_group`, `name`, `phone`, `jk`, `Alamat`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `photo`, `is_doctor`)
VALUES
	(2,1,'jamal','82110191448','L','Perum Graha Hijau Blok B319 Ds.saga kec.Balaraja kab.tangerang','jamal@gmail.com','$2y$10$43aybESRyQQ6zjluTTHL2e3YtVAL1nAxvTWUmkOw0gw6oq4hBCFx2','2019-06-30 15:56:57','2019-07-01 15:25:15',NULL,NULL,NULL),
	(3,1,'Dr.Jamal','082110191448','L','tangerang','admin@asistenmedis.com','$2y$10$OEdrK2DcZW/ecj3a6JqdSO0uK5G0g7m8h//5xQGMsM73S3c./WWoy','2019-06-30 17:00:32','2019-07-06 16:25:14',NULL,'1562400101_42.jpg',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
