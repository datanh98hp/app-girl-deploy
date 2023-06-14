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


-- Dumping database structure for trumgop_db
DROP DATABASE IF EXISTS `trumgop_db`;
CREATE DATABASE IF NOT EXISTS `trumgop_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `trumgop_db`;

-- Dumping structure for table trumgop_db.banks
DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `account` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.banks: ~0 rows (approximately)

-- Dumping structure for table trumgop_db.banners
DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.banners: ~2 rows (approximately)
REPLACE INTO `banners` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(34, 'banner 1', 'banners/HrHkPC55poIooAWagK2QksEdkxNqptoUBkh1lRRY.jpg', 1, '2023-01-18 08:59:28', '2023-01-19 05:54:33'),
	(37, '2023', 'banners/3AAW1kUH23d3BpSXA1ZKcGC7eUtD5ySECePjPYtO.jpg', 1, '2023-01-21 22:30:28', '2023-06-14 10:06:25');

-- Dumping structure for table trumgop_db.bills
DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `member_id` bigint unsigned DEFAULT NULL,
  `price` bigint unsigned DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bills_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.bills: ~1 rows (approximately)
REPLACE INTO `bills` (`id`, `email`, `phone`, `address`, `content`, `product_id`, `member_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(14, 'lephu@gmail.com', '0916743545', 'HCM', 'dsfdsf', 1303, 2, 11000000, 0, '2023-02-27 09:34:16', '2023-02-27 09:34:16');

-- Dumping structure for table trumgop_db.brands
DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.brands: ~25 rows (approximately)
REPLACE INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(27, 'Vision', 'brands/aRd5ufTcE25VrNMKbqNL7bZLOrqRhjqbNAlhT0OM.png', 1, '2021-12-22 23:22:43', '2022-01-23 08:18:47'),
	(29, 'Pcx', 'brands/lxU4x4aEEKJPZLMInuYkoc61xxWMgQ4unc0MEGwD.png', 1, '2022-01-23 08:23:05', '2022-01-23 08:23:05'),
	(30, 'Lead', 'brands/5GbZ6gDSSVBhw4VSd25pqFKS8DjcjT0rL9mqAZJj.png', 1, '2022-01-23 08:24:34', '2022-01-23 08:24:34'),
	(31, 'SH', 'brands/Bymoed4eWgqdzXFKSC1vDukU5W5anjWYdLRV2Ars.png', 1, '2022-01-23 08:28:46', '2022-01-23 08:28:46'),
	(33, 'Ps', 'brands/cIEm6yAXEbQ5Blbms6LiI9q3k0jK89mZ6q1OvaMV.png', 1, '2022-01-23 08:32:47', '2022-01-23 08:32:47'),
	(34, 'Sh Việt', 'brands/beGSDxzT5AvlAw8OVjcjPnbO360h6SMrpd2Px5ip.png', 1, '2022-01-23 08:33:44', '2022-01-23 08:33:44'),
	(35, 'Libety', 'brands/HTzeFBkSlduuLDde54yRbEahdOEilmL9sAJxQyYh.png', 1, '2022-01-23 08:34:48', '2022-01-23 08:34:48'),
	(36, 'Vespa', 'brands/V4fx17yr3Oepatiu0rvXvy7y2rYo9o7w3BqcMVrB.png', 1, '2022-01-23 08:35:54', '2022-01-23 08:35:54'),
	(37, 'Novou', 'brands/HpNM6SePKvhSVuLkb7K0UJlS0rZb6u2IbgHkco6H.png', 1, '2022-01-23 08:37:07', '2022-01-23 08:37:07'),
	(38, 'Winner', 'brands/waA8ikalHSv46uk0J18f0mtQp4toXQOHYj1ude9i.png', 1, '2022-01-23 08:40:32', '2022-01-27 09:23:51'),
	(39, 'Exciter', 'brands/3F0ME0sqcscM5jpZ54uZn8etPI5N102V2trm1EIS.png', 1, '2022-01-23 08:41:45', '2022-01-23 08:41:45'),
	(40, 'Raider', 'brands/9wH5tu0Qevd3thRJTkAEy5Gg6Gs7P5o9D8V1KMiH.png', 1, '2022-01-23 08:43:01', '2022-01-23 08:44:27'),
	(41, 'Satria', 'brands/VFGeUCpkG1YarKbKWXIOC7cO8XI8MIyIYWVBk47w.png', 1, '2022-01-23 08:45:46', '2022-01-23 08:45:46'),
	(42, 'Sonic', 'brands/EESodwSzKflpoORwkOaIJdEVp98IXLrfTgWfvv5m.png', 1, '2022-01-23 08:47:07', '2022-01-23 08:47:07'),
	(43, 'Yazz xipo', 'brands/SEz1EWhBiZfx5hHxPdny3LOpfXxJTuURwpmzCDRP.png', 1, '2022-01-23 08:50:47', '2022-01-23 08:50:47'),
	(44, 'Axelo', 'brands/m3W6f4VcUMef5mE7gsSe8qBD8GTksJr0QZBiVaSe.png', 1, '2022-01-23 08:53:40', '2022-01-23 08:53:40'),
	(45, 'Beneli', 'brands/rjNybMR4Ebd7aEz6Ua9HRYnMuPwKXAhyi65BHOlH.png', 1, '2022-01-23 08:54:38', '2022-01-27 09:24:09'),
	(46, 'Wave', 'brands/vEXlIO0KXbkjr3Ne5FwBDWJorptzQcrXp0VRByI2.png', 1, '2022-01-23 08:57:13', '2022-01-23 08:57:13'),
	(47, 'Dream', 'brands/9sUMH6zkCPsnnHhMZdUGQZpuRVBUPMXMHpjwhXi1.jpg', 1, '2022-01-23 09:02:41', '2022-01-23 09:02:41'),
	(48, 'Future', 'brands/L6LoefhzC0y2WtY7w7r1OxV73W6NyCTlBR4QSACl.png', 1, '2022-01-23 09:05:56', '2022-01-23 09:05:56'),
	(49, 'Cub', 'brands/Go9fBwjjjj4Z0P6sp0kbMG3FJIuLfhCiIXysmo7X.png', 1, '2022-01-23 09:07:02', '2022-01-23 09:07:02'),
	(50, 'Sirius', 'brands/dwoJnrxn0LoPpk1DwSYkXh0pKpazfnPopGh3Cnbe.png', 1, '2022-01-23 09:08:22', '2022-01-23 09:08:22'),
	(51, 'Jupiter', 'brands/OCzG4JD0pGr6uoJPnlHPJD2ahXGZoSseIxAuciKj.png', 1, '2022-01-23 09:15:01', '2022-01-23 09:15:01'),
	(52, 'Air Blade', 'brands/POsEdIX831cWIZeMMHAtJQjjyNNJ4F1QRHMMJaR1.jpg', 1, '2022-01-23 09:21:13', '2023-01-19 06:26:34'),
	(53, 'Click', 'brands/9l3CjzhAacWXyTPXQUpr0BukJ8YRr1DkWQOVDPLI.jpg', 1, '2022-02-08 02:37:23', '2023-01-19 06:24:49');

-- Dumping structure for table trumgop_db.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` bigint DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.categories: ~3 rows (approximately)
REPLACE INTO `categories` (`id`, `name`, `image`, `parent_id`, `status`, `created_at`, `updated_at`, `type`) VALUES
	(32, 'Trang chủ', NULL, NULL, 1, '2023-05-27 05:25:10', '2023-05-27 05:25:10', 1),
	(33, 'Gioi thieuu', NULL, NULL, 1, '2023-05-31 03:42:49', '2023-05-31 03:49:11', 1),
	(34, 'Girl', NULL, NULL, 1, '2023-06-14 20:15:21', '2023-06-14 20:15:22', NULL);

-- Dumping structure for table trumgop_db.category_brand
DROP TABLE IF EXISTS `category_brand`;
CREATE TABLE IF NOT EXISTS `category_brand` (
  `category_id` bigint NOT NULL,
  `brand_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.category_brand: ~118 rows (approximately)
REPLACE INTO `category_brand` (`category_id`, `brand_id`) VALUES
	(15, 6),
	(4, 12),
	(19, 14),
	(14, 5),
	(7, 9),
	(13, 16),
	(11, 16),
	(12, 2),
	(6, 6),
	(14, 9),
	(5, 3),
	(7, 10),
	(7, 5),
	(10, 16),
	(1, 4),
	(9, 11),
	(17, 11),
	(7, 8),
	(8, 19),
	(4, 2),
	(19, 18),
	(4, 11),
	(17, 2),
	(2, 6),
	(6, 9),
	(11, 12),
	(20, 13),
	(3, 1),
	(14, 15),
	(5, 15),
	(16, 11),
	(8, 16),
	(16, 8),
	(5, 17),
	(6, 3),
	(4, 8),
	(15, 18),
	(16, 17),
	(4, 4),
	(9, 13),
	(12, 6),
	(8, 13),
	(3, 3),
	(14, 2),
	(13, 14),
	(9, 18),
	(3, 6),
	(8, 18),
	(7, 2),
	(19, 2),
	(16, 6),
	(8, 8),
	(13, 15),
	(1, 19),
	(14, 15),
	(12, 19),
	(4, 1),
	(1, 4),
	(1, 11),
	(14, 15),
	(16, 10),
	(25, 23),
	(27, 22),
	(25, 21),
	(26, 21),
	(27, 21),
	(25, 20),
	(26, 20),
	(27, 20),
	(28, 20),
	(25, 24),
	(26, 24),
	(27, 24),
	(28, 24),
	(25, 25),
	(26, 25),
	(27, 25),
	(28, 25),
	(25, 26),
	(26, 26),
	(27, 26),
	(28, 26),
	(28, 21),
	(25, 22),
	(26, 22),
	(28, 22),
	(25, 27),
	(25, 28),
	(25, 29),
	(25, 30),
	(25, 31),
	(25, 32),
	(25, 33),
	(25, 34),
	(25, 35),
	(25, 36),
	(25, 37),
	(30, 38),
	(30, 39),
	(30, 40),
	(30, 41),
	(30, 42),
	(30, 43),
	(30, 44),
	(30, 45),
	(26, 46),
	(26, 47),
	(26, 48),
	(26, 49),
	(26, 50),
	(26, 51),
	(25, 52),
	(25, 53),
	(25, 54),
	(25, 55),
	(26, 55),
	(30, 55),
	(31, 55);

-- Dumping structure for table trumgop_db.configs
DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `favicon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hotline` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.configs: ~0 rows (approximately)

-- Dumping structure for table trumgop_db.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Tên người gửi thông báo',
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` int NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=> Đã xử lý | 0 => Chưa xử lý',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.contacts: ~19 rows (approximately)
REPLACE INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `content`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Câu hỏi 20', 'kade94@example.net', 919591108, 'Địa chỉ 20', 'Nội dung 2', 1, '2021-12-04 02:04:09', '2023-01-14 21:41:41'),
	(2, 'Câu hỏi 9', 'juliana24@example.net', 915167054, 'Địa chỉ 2', 'Nội dung 6', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(3, 'Câu hỏi 1', 'johann.blick@example.net', 722433247, 'Địa chỉ 15', 'Nội dung 10', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(4, 'Câu hỏi 3', 'julius36@example.org', 779092366, 'Địa chỉ 11', 'Nội dung 2', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(5, 'Câu hỏi 6', 'johns.santos@example.org', 648682292, 'Địa chỉ 5', 'Nội dung 9', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(6, 'Câu hỏi 17', 'jlebsack@example.com', 372176355, 'Địa chỉ 6', 'Nội dung 16', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(7, 'Câu hỏi 18', 'lexie69@example.net', 542098779, 'Địa chỉ 8', 'Nội dung 17', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(8, 'Câu hỏi 2', 'yessenia.skiles@example.net', 886217114, 'Địa chỉ 19', 'Nội dung 6', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(9, 'Câu hỏi 4', 'oconnell.margarita@example.org', 228375101, 'Địa chỉ 10', 'Nội dung 6', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(10, 'Câu hỏi 15', 'tlarson@example.com', 241167926, 'Địa chỉ 13', 'Nội dung 11', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(11, 'Câu hỏi 9', 'ttremblay@example.com', 996914560, 'Địa chỉ 15', 'Nội dung 7', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(12, 'Câu hỏi 17', 'owalsh@example.org', 932242459, 'Địa chỉ 7', 'Nội dung 17', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(13, 'Câu hỏi 13', 'irving59@example.org', 976479871, 'Địa chỉ 10', 'Nội dung 19', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(14, 'Câu hỏi 11', 'fprice@example.com', 675957913, 'Địa chỉ 5', 'Nội dung 8', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(15, 'Câu hỏi 11', 'ernser.helga@example.com', 411177491, 'Địa chỉ 15', 'Nội dung 1', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(16, 'Câu hỏi 6', 'koss.ernest@example.com', 331735339, 'Địa chỉ 7', 'Nội dung 3', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(17, 'Câu hỏi 16', 'deondre65@example.com', 813183729, 'Địa chỉ 2', 'Nội dung 8', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(18, 'Câu hỏi 8', 'waelchi.eryn@example.com', 319193740, 'Địa chỉ 16', 'Nội dung 5', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(19, 'Câu hỏi 5', 'joshua.beier@example.com', 977310767, 'Địa chỉ 18', 'Nội dung 9', 0, '2021-12-04 02:04:09', '2021-12-04 02:04:09');

-- Dumping structure for table trumgop_db.girls
DROP TABLE IF EXISTS `girls`;
CREATE TABLE IF NOT EXISTS `girls` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `girls_category_id_foreign` (`category_id`),
  CONSTRAINT `girls_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.girls: ~3 rows (approximately)
REPLACE INTO `girls` (`id`, `name`, `age`, `country`, `video_src`, `category_id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'asdafawgv  è', 18, 'China', 'http://video.mp4', 34, 'Testsgv sdfs fasf', NULL, NULL),
	(2, 'asfasdf àè fasfas', 18, 'China', 'http://video.mp4', 34, 'Testsgv sdfs fasf', NULL, NULL),
	(3, 'asfasdf àè fasfas', 18, 'China', 'http://video.mp4', 34, 'Testsgv sdfs fasf', '2023-06-14 13:32:04', '2023-06-14 13:32:04');

-- Dumping structure for table trumgop_db.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.images: ~2 rows (approximately)
REPLACE INTO `images` (`id`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80', 32, NULL, NULL),
	(4, 'https://trumgop.top/storage/public/images/cYAAapvwZf5dlos7aotPpS5DKDn45qacgnArmN7l.png', 32, '2023-06-03 20:26:46', '2023-06-03 20:45:26');

-- Dumping structure for table trumgop_db.love_images
DROP TABLE IF EXISTS `love_images`;
CREATE TABLE IF NOT EXISTS `love_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_id` bigint unsigned DEFAULT NULL,
  `member_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.love_images: ~3 rows (approximately)
REPLACE INTO `love_images` (`id`, `image_id`, `member_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2023-05-31 04:15:42', '2023-05-31 04:15:42'),
	(5, 3, 3, '2023-05-31 07:11:58', '2023-05-31 07:11:58'),
	(6, 1, 3, '2023-05-31 08:26:47', '2023-05-31 08:26:47');

-- Dumping structure for table trumgop_db.members
DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.members: ~2 rows (approximately)
REPLACE INTO `members` (`id`, `name`, `user_name`, `email`, `password`, `otp`, `birthday`, `avatar`, `cover_image`, `description`, `address`, `phone`, `price`, `products`, `email_verified_at`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'lephu', 'lephu@gmail.com', 'tui.hrv@gmail.com', '$2y$10$kioL6hhgB6pIS74S0JWVWOHfV0eUdbMrI82T9oZ4BZssoTTtH4xIq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89000100, '{"id":1302,"brand_id":27,"code":"24578","name":"FREEGO","image":"products\\/QK6QfVHzhoGbyNmG0kVHBiIchTXP96sTFIxfKPBJ.png","images":"[\\"products\\\\\\/qyFDHUyDxMBbMOzA8jqdcB9dUSHhmI2qqoDtqP5r.png\\"]","price":12000000,"price_old":12000000,"views":4,"installment":0,"description":null,"style":null,"content":"<p>T&igrave;nh tr\\u1ea1ng v\\u1eeba b\\u1ea3o d\\u01b0\\u1ee1ng Full xe trong h&atilde;ng . &ecirc;m ru cam k\\u1ebft c\\u1ef1c l\\u01b0\\u1edbt s&oacute;ng cho ae n&agrave;o kh&oacute; t&iacute;nh . M&aacute;y m&oacute;c zin c\\u1ee5c m&aacute;y n&agrave;y th&igrave; bao t&ecirc; lu&ocirc;n \\u1ea1 , &ecirc;m ru \\u0111\\u1eddi n&agrave;y Fi l\\u1ee3i x\\u0103ng r\\u1ed3i \\u1ea1 . H\\u1ed3 s\\u01a1 c\\u1ea7m tay b\\u1ea1n n&agrave;o mua m&igrave;nh bao b\\u1ea5m bi\\u1ec3n s\\u1ed1 m\\u1edbi lu&ocirc;n nha&nbsp;<\\/p>\\r\\n\\r\\n<p>li&ecirc;n h\\u1ec7 zalo :0339051052<\\/p>","link_video":null,"status":1,"created_at":"2023-02-08 04:21:37","updated_at":"2023-02-08 15:00:15","condition":2,"used":null,"kilometer":null,"year":null,"fuel":null,"engine":null,"color":null,"address":null,"type_of_sim":null,"type":null}', NULL, NULL, 1, '2023-02-27 09:26:17', '2023-03-03 07:30:37'),
	(3, 'Phú', 'phu_123', 'phu@gmail.com', '$2y$10$RuIWPux/.JHSuWkj9qOOl.kPK4dU16rGAc6XFNUh.StIB0ypQXBZ.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, '2023-05-31 06:18:57', '2023-05-31 06:18:57');

-- Dumping structure for table trumgop_db.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.migrations: ~29 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(49, '2014_10_12_000000_create_users_table', 1),
	(50, '2014_10_12_100000_create_password_resets_table', 1),
	(51, '2021_04_11_042948_create_banners_table', 1),
	(52, '2021_04_11_043424_create_categories_table', 1),
	(53, '2021_04_11_043525_create_brands_table', 1),
	(54, '2021_04_11_043849_create_category_brand_table', 1),
	(55, '2021_04_12_141518_create_products_table', 1),
	(56, '2021_04_12_141536_create_product_category_table', 1),
	(57, '2021_04_12_141602_create_posts_table', 1),
	(58, '2021_04_12_141623_create_pages_table', 1),
	(59, '2021_04_12_142926_create_contacts_table', 1),
	(60, '2021_11_30_140504_create_settings_table', 1),
	(61, '2021_12_05_095214_add_column_condition_to_products_table', 2),
	(62, '2021_12_13_090258_add_column_to_products_table', 3),
	(63, '2022_01_08_143743_create_banks_table', 4),
	(67, '2023_02_14_042710_create_members_table', 5),
	(74, '2023_02_14_112649_create_members_table', 6),
	(83, '2022_02_18_065520_widgets', 7),
	(84, '2022_02_18_071738_add_paid_to_widgets_table', 7),
	(85, '2022_02_18_073640_configs', 7),
	(86, '2023_02_14_114256_create_members_table', 7),
	(87, '2023_02_26_122145_create_notifications_table', 8),
	(89, '2023_02_27_124023_create_bills_table', 9),
	(90, '2023_03_03_140326_create_love_products_table', 10),
	(91, '2023_05_27_124012_create_table_images', 11),
	(92, '2023_05_31_105959_create_love_images', 12),
	(93, '2023_06_14_191941_create_girls_table', 13),
	(94, '2023_06_14_204305_create_photos_table', 14),
	(95, '2023_06_14_210850_create_photo_table', 15);

-- Dumping structure for table trumgop_db.notifications
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `post_id` bigint unsigned DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.notifications: ~5 rows (approximately)
REPLACE INTO `notifications` (`id`, `product_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, '2023-02-26 05:43:01', '2023-02-26 05:43:01'),
	(2, 1, 1, 1, '2023-02-26 05:43:28', '2023-02-26 05:43:28'),
	(3, 1, 2, 1, '2023-02-27 08:38:23', '2023-02-27 08:38:23'),
	(4, NULL, 22, 1, '2023-03-07 19:29:04', '2023-03-07 19:29:04'),
	(5, NULL, 23, 1, '2023-06-14 10:45:44', '2023-06-14 10:45:44');

-- Dumping structure for table trumgop_db.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.pages: ~20 rows (approximately)
REPLACE INTO `pages` (`id`, `name`, `content`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Page 18', 'Nội dung page 8', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(2, 'Page 4', 'Nội dung page 19', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(3, 'Page 14', 'Nội dung page 7', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(4, 'Page 7', 'Nội dung page 11', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(5, 'Page 8', 'Nội dung page 12', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(6, 'Page 5', 'Nội dung page 15', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(7, 'Page 9', 'Nội dung page 13', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(8, 'Page 5', 'Nội dung page 16', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(9, 'Page 1', 'Nội dung page 10', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(10, 'Page 5', 'Nội dung page 10', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(11, 'Page 14', 'Nội dung page 12', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(12, 'Page 19', 'Nội dung page 10', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(13, 'Page 10', 'Nội dung page 14', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(14, 'Page 20', 'Nội dung page 10', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(15, 'Page 17', 'Nội dung page 19', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(16, 'Page 2', 'Nội dung page 16', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(17, 'Page 13', 'Nội dung page 1', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(18, 'Page 18', 'Nội dung page 1', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(19, 'Page 9', 'Nội dung page 19', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09'),
	(20, 'Page 9', 'Nội dung page 13', 1, '2021-12-04 02:04:09', '2021-12-04 02:04:09');

-- Dumping structure for table trumgop_db.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.password_resets: ~0 rows (approximately)

-- Dumping structure for table trumgop_db.photo
DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `girl_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_girl_id_foreign` (`girl_id`),
  CONSTRAINT `photo_girl_id_foreign` FOREIGN KEY (`girl_id`) REFERENCES `girls` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.photo: ~0 rows (approximately)

-- Dumping structure for table trumgop_db.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `views` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0 => pending | 1=> Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.posts: ~1 rows (approximately)
REPLACE INTO `posts` (`id`, `name`, `image`, `link`, `description`, `content`, `views`, `status`, `created_at`, `updated_at`) VALUES
	(23, 'Lorem test', 'posts/4E0pwcuI6zUHaMnUi8qUoJCFTnXlBrKDJhNRBUWS.jpg', NULL, 'ầ sgsdgsdgf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 123, 1, '2023-06-14 10:45:44', '2023-06-14 10:45:44');

-- Dumping structure for table trumgop_db.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` bigint DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `price` bigint NOT NULL DEFAULT '0',
  `price_old` bigint NOT NULL DEFAULT '0',
  `views` bigint NOT NULL DEFAULT '0' COMMENT 'Lượt xem',
  `installment` tinyint NOT NULL DEFAULT '0' COMMENT 'Trả góp: 1=>  Có | 0=>Không',
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `style` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'kiểu dáng',
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `link_video` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0 => pending | 1 => publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condition` tinyint NOT NULL DEFAULT '1' COMMENT '1=> Cũ | 2=> Mới',
  `used` int DEFAULT NULL,
  `kilometer` int DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `engine` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type_of_sim` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1325 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.products: ~1 rows (approximately)
REPLACE INTO `products` (`id`, `brand_id`, `code`, `name`, `image`, `images`, `price`, `price_old`, `views`, `installment`, `description`, `style`, `content`, `link_video`, `status`, `created_at`, `updated_at`, `condition`, `used`, `kilometer`, `year`, `fuel`, `engine`, `color`, `address`, `type_of_sim`, `type`) VALUES
	(1324, 53, 'FVBEBE', 'test', 'products/kwrUw271h3De1RrfmdhrFqQC9Yz9eApXrJJNxFpb.jpg', '["products\\/sTQpAXF6vypYhacvR7Pa4Lzwnelrf1Zo1YLZWgXS.jpg"]', 200000, 200, 0, 0, 'fđhgsgs gsdgsdgs', NULL, '<p>&acirc;fasrffsdgsdggf</p>', NULL, 1, '2023-06-14 11:59:52', '2023-06-14 12:01:03', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table trumgop_db.product_category
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_id` bigint NOT NULL,
  `category_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.product_category: ~231 rows (approximately)
REPLACE INTO `product_category` (`product_id`, `category_id`) VALUES
	(1073, 25),
	(1072, 26),
	(1071, 26),
	(1069, 26),
	(1066, 25),
	(1063, 25),
	(1062, 27),
	(1071, 27),
	(1061, 25),
	(1055, 26),
	(1054, 26),
	(1053, 25),
	(1051, 26),
	(1050, 25),
	(1048, 26),
	(1047, 26),
	(1047, 27),
	(1044, 25),
	(1043, 25),
	(1042, 26),
	(1034, 26),
	(1033, 25),
	(1031, 26),
	(1030, 26),
	(1028, 26),
	(1027, 25),
	(1022, 25),
	(1020, 25),
	(1019, 25),
	(1018, 26),
	(1018, 27),
	(1017, 25),
	(1016, 25),
	(1014, 26),
	(1013, 26),
	(1011, 25),
	(1007, 25),
	(998, 25),
	(997, 26),
	(996, 26),
	(995, 26),
	(993, 26),
	(991, 25),
	(990, 26),
	(989, 26),
	(984, 25),
	(983, 26),
	(982, 25),
	(977, 25),
	(976, 26),
	(970, 25),
	(964, 26),
	(962, 26),
	(958, 25),
	(957, 25),
	(942, 26),
	(937, 25),
	(935, 25),
	(934, 26),
	(932, 26),
	(931, 27),
	(930, 27),
	(927, 27),
	(926, 26),
	(924, 25),
	(922, 26),
	(911, 26),
	(909, 25),
	(903, 25),
	(902, 26),
	(901, 25),
	(893, 26),
	(892, 25),
	(890, 26),
	(891, 26),
	(889, 26),
	(886, 25),
	(883, 26),
	(881, 26),
	(880, 26),
	(878, 25),
	(872, 25),
	(871, 25),
	(864, 26),
	(1154, 25),
	(1155, 25),
	(1155, 26),
	(1156, 30),
	(1157, 25),
	(1158, 25),
	(1159, 25),
	(1160, 25),
	(1161, 25),
	(1162, 30),
	(1163, 25),
	(1164, 25),
	(1165, 25),
	(1166, 27),
	(1167, 30),
	(1168, 25),
	(1169, 25),
	(1170, 25),
	(1171, 30),
	(1172, 30),
	(1173, 30),
	(1175, 30),
	(1177, 25),
	(1178, 25),
	(1179, 25),
	(1180, 30),
	(1181, 25),
	(1182, 25),
	(1183, 26),
	(1184, 25),
	(1185, 25),
	(1186, 30),
	(1188, 25),
	(1189, 25),
	(1190, 25),
	(1191, 25),
	(1192, 25),
	(1193, 30),
	(1194, 25),
	(1195, 25),
	(1196, 25),
	(1197, 26),
	(1198, 30),
	(1199, 25),
	(1200, 26),
	(1201, 30),
	(1202, 26),
	(1203, 25),
	(1204, 30),
	(1205, 30),
	(1206, 30),
	(1207, 30),
	(1208, 25),
	(1209, 25),
	(1210, 30),
	(1211, 25),
	(1212, 25),
	(1213, 25),
	(1214, 30),
	(1215, 25),
	(1216, 26),
	(1217, 25),
	(1218, 26),
	(1219, 30),
	(1220, 30),
	(1221, 30),
	(1222, 25),
	(1223, 25),
	(1224, 25),
	(1225, 25),
	(1226, 25),
	(1227, 25),
	(1228, 30),
	(1229, 30),
	(1230, 30),
	(1231, 25),
	(1232, 30),
	(1233, 30),
	(1234, 30),
	(1235, 30),
	(1236, 30),
	(1237, 25),
	(1238, 25),
	(1239, 30),
	(1240, 25),
	(1241, 25),
	(1242, 30),
	(1243, 25),
	(1244, 25),
	(1245, 30),
	(1246, 25),
	(1247, 26),
	(1248, 26),
	(1249, 25),
	(1250, 30),
	(1251, 30),
	(1252, 25),
	(1253, 30),
	(1254, 25),
	(1255, 25),
	(1256, 30),
	(1257, 25),
	(1258, 30),
	(1259, 30),
	(1260, 26),
	(1261, 26),
	(1262, 25),
	(1263, 25),
	(1264, 26),
	(1265, 30),
	(1266, 25),
	(1267, 25),
	(1268, 25),
	(1269, 25),
	(1270, 26),
	(1271, 25),
	(1272, 30),
	(1273, 26),
	(1274, 26),
	(1275, 25),
	(1276, 30),
	(1277, 30),
	(1278, 25),
	(1279, 25),
	(1280, 25),
	(1281, 25),
	(1282, 30),
	(1283, 30),
	(1284, 30),
	(1285, 30),
	(1286, 30),
	(1287, 30),
	(1289, 26),
	(1290, 30),
	(1288, 30),
	(1291, 25),
	(1292, 26),
	(1293, 26),
	(1294, 31),
	(1295, 31),
	(1296, 25),
	(1298, 25),
	(1299, 26),
	(1297, 31),
	(1297, 25),
	(1297, 26),
	(1324, 32);

-- Dumping structure for table trumgop_db.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.settings: ~0 rows (approximately)

-- Dumping structure for table trumgop_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `api_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table trumgop_db.users: ~8 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `api_token`, `created_at`, `updated_at`) VALUES
	(1, 'Joannie McClure', 'users/aPT8PphGEinCwanq1PzAFTCUcvwsmxHQv1ijK3VY.png', 'admin@gmail.com', '2021-12-04 02:04:09', '$2y$10$ap3V4iw.99XxyIhe7vU1guU8g8vUtzu./F8uHQPIJzkfN0Wf./R7S', 'M20qdAeeFwnM4uB7md9B6hQDDGXIKKg8xaU0ZmIZONxPEyTr4zIf2qcCE4m1', 1, NULL, '2021-12-04 02:04:09', '2021-12-29 23:40:25'),
	(2, 'trumgop.xyz bbbdnwkdowifhrdokpwoeiyutrieowsowddfbvksodkasofjgiekwskfieghrhjkfejfegigofwkdkbhbgiejfwokdd', NULL, 'dimafokin199506780tx+e281@inbox.ru', NULL, '$2y$10$89dsV3bcNMZG9RBts0h92OaCzYtRL04Bfolv.rJaFtyeNCXtwMvJy', NULL, 1, NULL, '2022-01-31 23:36:07', '2022-01-31 23:36:07'),
	(3, 'lephu', NULL, 'tui.hrv@gmail.com', NULL, '$2y$10$NL0thjWxzN5QADQSEPkifOqjr6f69pXPiDp5DnrB/CXEjDa0xdMtK', NULL, 1, NULL, '2023-02-20 08:02:00', '2023-02-20 08:02:00'),
	(4, 'vanphu', NULL, 'lephu.hrv@gmail.com', NULL, '$2y$10$Jb5tkyEVS9ez6xQU.25Jru19HPGGP2Im6kVfP01pNw//iwM0MO/2K', NULL, 1, NULL, '2023-03-03 05:31:57', '2023-03-03 05:31:57'),
	(5, 'vanphu', NULL, 'lephu890@gmail.com', NULL, '$2y$10$ZstmClclo8YuIqPq5jbWe.UNBhFfA6APeiZM7QO1yCZv9Lqft0lnu', NULL, 1, NULL, '2023-03-07 19:27:34', '2023-03-07 19:27:34'),
	(6, 'vanphu', NULL, 'admin@com', NULL, '$2y$10$/q7ieYPOSW.nyzrkkR1TGeLhvHZDwPMkYzbbyV74SdSlqT99Q91l6', NULL, 1, NULL, '2023-05-28 08:46:10', '2023-05-28 08:46:10'),
	(7, 'vanphu', NULL, 'phu.hrv@gmail.com', NULL, '$2y$10$wFhJJPhDpqTQ3CknkNqCqOq3n1gpEu8MZYIt.G3cXOtn4/MrYdV9y', NULL, 1, NULL, '2023-05-31 03:30:20', '2023-05-31 03:30:20'),
	(8, 'admin', NULL, 'dat198hp@gmail.com', NULL, '$2y$10$RoZmovsNcUFZMZeh2IKRsedmkRPtQuMH215dyQPaf01bR1feTZzTu', NULL, 1, NULL, '2023-06-14 10:00:01', '2023-06-14 10:00:01');

-- Dumping structure for table trumgop_db.widgets
DROP TABLE IF EXISTS `widgets`;
CREATE TABLE IF NOT EXISTS `widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trumgop_db.widgets: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
