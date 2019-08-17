/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100203
 Source Host           : localhost:3306
 Source Schema         : asix7191_pat

 Target Server Type    : MySQL
 Target Server Version : 100203
 File Encoding         : 65001

 Date: 31/07/2019 19:01:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for biaya
-- ----------------------------
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of biaya
-- ----------------------------
INSERT INTO `biaya` VALUES (1, 'Tes Gula Darah', 'TINDAKAN', 120000, '2019-06-30 16:18:08', '2019-06-30 16:18:08', NULL);
INSERT INTO `biaya` VALUES (2, 'UMUM', 'TINDAKAN', 100000, '2019-06-30 16:19:17', '2019-06-30 16:19:17', NULL);
INSERT INTO `biaya` VALUES (3, 'TARIF DOKTER', 'JASA', 100000, '2019-06-30 16:22:01', '2019-06-30 16:56:00', NULL);

-- ----------------------------
-- Table structure for daftars
-- ----------------------------
DROP TABLE IF EXISTS `daftars`;
CREATE TABLE `daftars`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `decode` int(11) NULL DEFAULT NULL,
  `id_pasien` bigint(20) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `pulang` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_dokter` bigint(11) NULL DEFAULT NULL,
  `status` tinyint(4) NULL DEFAULT 1 COMMENT '1=antri, 2=periksa, 3=apotek, 4=kasir, 5=selesai',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daftars
-- ----------------------------
INSERT INTO `daftars` VALUES (6, '2019-07-01', NULL, 2, 'Budiman', 1, '2019-07-06 16:16:25', '2019-07-06 16:16:25', NULL, 3, 1);
INSERT INTO `daftars` VALUES (7, '2019-07-11', NULL, 2, 'Hendra', 1, '2019-07-08 07:53:21', '2019-07-08 07:53:21', NULL, 3, 1);
INSERT INTO `daftars` VALUES (9, '2019-07-16', NULL, 3, '', 1, '2019-07-16 12:03:38', '2019-07-16 12:03:38', NULL, 1, 1);
INSERT INTO `daftars` VALUES (10, '2019-07-21', NULL, 2, '', NULL, '2019-07-21 06:26:49', '2019-07-21 06:26:49', NULL, 2, 1);
INSERT INTO `daftars` VALUES (11, '2019-07-30', 1, 1, '', NULL, '2019-07-30 06:55:01', '2019-07-30 06:55:01', NULL, 1, 4);
INSERT INTO `daftars` VALUES (12, '2019-07-30', 2, 1, '', NULL, '2019-07-30 05:28:06', '2019-07-30 05:28:06', NULL, 1, 3);
INSERT INTO `daftars` VALUES (13, '2019-07-30', 3, 1, '', NULL, '2019-07-30 07:51:41', '2019-07-30 07:51:41', NULL, 1, 5);
INSERT INTO `daftars` VALUES (14, '2019-07-30', 4, 2, '', NULL, '2019-07-30 13:50:16', '2019-07-30 13:50:16', NULL, 2, 2);
INSERT INTO `daftars` VALUES (15, '2019-07-31', 1, 1, '', NULL, '2019-07-31 08:59:12', '2019-07-31 08:59:12', NULL, 1, 2);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'Dokter', '2019-06-30 15:48:20', '2019-06-30 15:48:20');
INSERT INTO `groups` VALUES (2, 'Admin IT', '2019-06-30 15:48:28', '2019-06-30 15:48:28');
INSERT INTO `groups` VALUES (3, 'Kasir', '2019-06-30 15:48:34', '2019-06-30 15:48:34');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 84 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (55, '2019_06_26_005636_create_roles_table', 1);
INSERT INTO `migrations` VALUES (65, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (66, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (67, '2019_06_25_180629_create_pasiens_table', 2);
INSERT INTO `migrations` VALUES (68, '2019_06_25_181556_create_daftars_table', 2);
INSERT INTO `migrations` VALUES (69, '2019_06_25_182106_create_obats_table', 2);
INSERT INTO `migrations` VALUES (70, '2019_06_26_010106_create_settings_table', 2);
INSERT INTO `migrations` VALUES (72, '2019_06_30_153658_create_groups_table', 3);
INSERT INTO `migrations` VALUES (74, '2019_06_30_161126_create_biaya_table', 4);
INSERT INTO `migrations` VALUES (75, '2019_07_04_123149_create_roles_table', 5);
INSERT INTO `migrations` VALUES (76, '2019_07_06_160704_create_rekam_medis_table', 6);
INSERT INTO `migrations` VALUES (79, '2019_07_06_160710_create_rekam_medis_detail1_table', 9);
INSERT INTO `migrations` VALUES (80, '2019_07_06_160715_create_rekam_medis_detail2_table', 10);
INSERT INTO `migrations` VALUES (81, '2019_07_06_171821_create_pembayaran_table', 11);
INSERT INTO `migrations` VALUES (82, '2019_07_06_171829_create_pembayaran_detail1_table', 12);
INSERT INTO `migrations` VALUES (83, '2019_07_06_171837_create_pembayaran_detail2_table', 13);

-- ----------------------------
-- Table structure for obats
-- ----------------------------
DROP TABLE IF EXISTS `obats`;
CREATE TABLE `obats`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NULL DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obats
-- ----------------------------
INSERT INTO `obats` VALUES (1, '6850', 'Bodrex', 'Obat Keras', 'PCS', 10000, 12000, '2019-06-30 16:07:25', '2019-06-30 16:07:25', NULL);
INSERT INTO `obats` VALUES (2, '6888', 'Panadol', 'Sakit Kepala', 'PCS', 5000, 10000, '2019-07-06 16:01:26', '2019-07-06 16:01:26', NULL);

-- ----------------------------
-- Table structure for pasiens
-- ----------------------------
DROP TABLE IF EXISTS `pasiens`;
CREATE TABLE `pasiens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasiens
-- ----------------------------
INSERT INTO `pasiens` VALUES (1, 'Hendra', 987, 'L', '2019-06-30', 'Jl Raya Legok 120', '2019-06-30 16:05:56', '2019-06-30 16:05:56', NULL);
INSERT INTO `pasiens` VALUES (2, 'BUDIMAN PAPAK', 989, 'L', '2019-06-04', 'Legok', '2019-06-30 16:06:18', '2019-06-30 16:06:18', NULL);
INSERT INTO `pasiens` VALUES (3, 'jamaludin', 12345, 'L', '1995-01-09', 'perum tangerang', '2019-07-16 12:02:55', '2019-07-16 12:02:55', NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `is_tindakan` tinyint(4) NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `biaya_tindakan` int(11) NULL DEFAULT 0,
  `biaya_obat` int(11) NULL DEFAULT 0,
  `total` int(11) NULL DEFAULT 0,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `id_daftar` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (1, 1, 1, 1, 1, 400000, 460000, 860000, 'sakit mag kronis harus segera operasi plastik', '2019-07-30 03:57:08', '2019-07-30 03:57:08', NULL, 11);
INSERT INTO `pembayaran` VALUES (2, 1, 1, 2, 1, 400000, 460000, 860000, 'kebanyakan', '2019-07-30 13:43:44', '2019-07-30 13:43:44', NULL, 13);
INSERT INTO `pembayaran` VALUES (3, 2, 2, 3, 1, 0, 0, 0, 'migren', '2019-07-30 13:51:10', '2019-07-30 13:51:10', NULL, 14);

-- ----------------------------
-- Table structure for pembayaran_detail1
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_detail1`;
CREATE TABLE `pembayaran_detail1`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) NOT NULL,
  `tindakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `biaya` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_detail1
-- ----------------------------
INSERT INTO `pembayaran_detail1` VALUES (1, 1, '4', NULL, '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `pembayaran_detail1` VALUES (2, 1, '5', NULL, '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `pembayaran_detail1` VALUES (3, 2, '4', NULL, '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `pembayaran_detail1` VALUES (4, 2, '5', NULL, '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `pembayaran_detail1` VALUES (5, 3, '4', NULL, '2019-07-30 13:51:10', '2019-07-30 13:51:10');

-- ----------------------------
-- Table structure for pembayaran_detail2
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_detail2`;
CREATE TABLE `pembayaran_detail2`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) NOT NULL,
  `id_obat` int(11) NULL DEFAULT NULL,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `qty` int(11) NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_detail2
-- ----------------------------
INSERT INTO `pembayaran_detail2` VALUES (1, 1, 1, '', 30, NULL, '3 x 2', '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `pembayaran_detail2` VALUES (2, 1, 2, '', 10, NULL, '3 x 1', '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `pembayaran_detail2` VALUES (3, 2, 1, '', 30, NULL, '3 x 2', '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `pembayaran_detail2` VALUES (4, 2, 2, '', 10, NULL, '3 x 1', '2019-07-30 13:43:44', '2019-07-30 13:43:44');

-- ----------------------------
-- Table structure for rekam_medis
-- ----------------------------
DROP TABLE IF EXISTS `rekam_medis`;
CREATE TABLE `rekam_medis`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `keluhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergi_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tindakan` tinyint(4) NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_daftar` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekam_medis
-- ----------------------------
INSERT INTO `rekam_medis` VALUES (1, 1, 1, 'nyeri ulu hati', 'T', 1, '2019-07-30 03:57:08', '2019-07-30 03:57:08', 'sakit mag kronis harus segera operasi plastik', 11);
INSERT INTO `rekam_medis` VALUES (2, 1, 1, 'sakit pinggang', 'T', 1, '2019-07-30 13:43:44', '2019-07-30 13:43:44', 'kebanyakan', 13);
INSERT INTO `rekam_medis` VALUES (3, 2, 2, 'sakit kepala', 'T', 1, '2019-07-30 13:51:10', '2019-07-30 13:51:10', 'migren', 14);

-- ----------------------------
-- Table structure for rekam_medis_detail1
-- ----------------------------
DROP TABLE IF EXISTS `rekam_medis_detail1`;
CREATE TABLE `rekam_medis_detail1`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(11) NULL DEFAULT NULL,
  `tindakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `biaya` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekam_medis_detail1
-- ----------------------------
INSERT INTO `rekam_medis_detail1` VALUES (1, 1, '4', NULL, '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `rekam_medis_detail1` VALUES (2, 1, '5', NULL, '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `rekam_medis_detail1` VALUES (3, 2, '4', NULL, '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `rekam_medis_detail1` VALUES (4, 2, '5', NULL, '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `rekam_medis_detail1` VALUES (5, 3, '4', NULL, '2019-07-30 13:51:10', '2019-07-30 13:51:10');

-- ----------------------------
-- Table structure for rekam_medis_detail2
-- ----------------------------
DROP TABLE IF EXISTS `rekam_medis_detail2`;
CREATE TABLE `rekam_medis_detail2`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_rekam_medis` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `qty` int(11) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekam_medis_detail2
-- ----------------------------
INSERT INTO `rekam_medis_detail2` VALUES (1, 1, 1, '', 30, '3 x 2', '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `rekam_medis_detail2` VALUES (2, 1, 2, '', 10, '3 x 1', '2019-07-30 03:57:08', '2019-07-30 03:57:08');
INSERT INTO `rekam_medis_detail2` VALUES (3, 2, 1, '', 30, '3 x 2', '2019-07-30 13:43:44', '2019-07-30 13:43:44');
INSERT INTO `rekam_medis_detail2` VALUES (4, 2, 2, '', 10, '3 x 1', '2019-07-30 13:43:44', '2019-07-30 13:43:44');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 2, 'pendaftaran', 2, '2019-07-04 17:32:50', '2019-07-04 17:32:50');
INSERT INTO `roles` VALUES (2, 2, 'master_data', 1, '2019-07-05 13:00:02', '2019-07-05 13:00:02');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_klinik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'Klinik Medica', 'Jl Raya Legok 120', '82110191448', 'https://i.ibb.co/X4HLh9Y/logo.jpg', '2019-06-30 16:52:36', '2019-06-30 17:01:01', NULL);

-- ----------------------------
-- Table structure for tindakan
-- ----------------------------
DROP TABLE IF EXISTS `tindakan`;
CREATE TABLE `tindakan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `biaya` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tindakan
-- ----------------------------
INSERT INTO `tindakan` VALUES (1, '6850', 'Anestesi lokal', 'TINDAKAN', 50000, '2019-06-30 16:07:25', '2019-06-30 16:07:25', NULL);
INSERT INTO `tindakan` VALUES (2, '6888', 'Anestesi regional', 'TINDAKAN', 75000, '2019-07-06 16:01:26', '2019-07-06 16:01:26', NULL);
INSERT INTO `tindakan` VALUES (3, '6890', 'Anestesi umum', 'TINDAKAN', 125000, '2019-07-06 16:01:27', NULL, NULL);
INSERT INTO `tindakan` VALUES (4, '6691', 'Konsultasi', 'JASA', 150000, '2019-07-21 07:46:04', '2019-07-21 07:48:15', NULL);
INSERT INTO `tindakan` VALUES (5, '6692', 'Bedah Minor', 'TINDAKAN', 250000, '2019-07-21 08:11:53', '2019-07-21 08:12:22', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NULL DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_doctor` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 'Dr. Budiman', '0987654321', 'L', 'Parung jaya', 'budiman@gmail.com', '$2y$10$OEdrK2DcZW/ecj3a6JqdSO0uK5G0g7m8h//5xQGMsM73S3c./WWoy', '2019-06-30 17:00:32', '2019-07-10 03:15:54', NULL, '1562400101_42.jpg', 1);
INSERT INTO `users` VALUES (2, 1, 'Dr. Hendra', '82110191448', 'L', 'Perum Graha Hijau Blok B319 Ds.saga kec.Balaraja kab.tangerang', 'hendra@gmail.com', '$2y$10$9Y0yv.Ruq3Jy2mqaQC/0Z.tFh6VXcNyzcWh2qZjdMc.VUrS8cQuwG', '2019-06-30 15:56:57', '2019-07-10 15:44:36', NULL, NULL, 1);
INSERT INTO `users` VALUES (3, 1, 'dr. Jamal', '082110191448', 'L', 'tangerang', 'admin@asistenmedis.com', '$2y$10$OEdrK2DcZW/ecj3a6JqdSO0uK5G0g7m8h//5xQGMsM73S3c./WWoy', '2019-06-30 17:00:32', '2019-07-10 03:15:54', NULL, '1562400101_42.jpg', 1);

SET FOREIGN_KEY_CHECKS = 1;
