-- --------------------------------------------------------
-- Host:                         db
-- Server version:               5.5.57-0+deb8u1-log - (Debian)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for tr-infoservice
CREATE DATABASE IF NOT EXISTS `tr-infoservice` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tr-infoservice`;


-- Dumping structure for table tr-infoservice.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameEn` varchar(100) DEFAULT '0',
  `shortName` varchar(100) DEFAULT '0',
  `nameTh` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table tr-infoservice.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titleName` tinyint(4) DEFAULT NULL COMMENT 'คำหน้าชื่อ',
  `firstname` varchar(250) DEFAULT NULL COMMENT 'ชื่อจริง',
  `lastname` varchar(250) DEFAULT NULL COMMENT 'นามสกุล',
  `department` varchar(250) DEFAULT NULL COMMENT 'แผนก',
  `location` varchar(250) DEFAULT NULL COMMENT 'หน่วยงาน/สถานที่ติดต่อ',
  `tel` varchar(250) DEFAULT NULL COMMENT 'โทร',
  `requestTypeList` varchar(250) DEFAULT NULL COMMENT 'ประเภทงาน',
  `detail` varchar(500) DEFAULT NULL COMMENT 'รายละเอียด',
  `for` varchar(300) DEFAULT NULL COMMENT 'เพื่อ',
  `originAmount` smallint(6) DEFAULT NULL COMMENT 'ต้นฉบับ',
  `copyAmount` smallint(6) DEFAULT NULL COMMENT 'ถ่ายเอกสาร',
  `fileAmount` smallint(6) DEFAULT NULL,
  `fileServiceCharge` float DEFAULT NULL COMMENT 'ค่าเปิดแฟ้ม (@10,20)',
  `copyChargeAmount` smallint(6) DEFAULT NULL COMMENT 'ค่าถ่ายเอกสาร (@2,5,10)',
  `copyCharge` float DEFAULT NULL,
  `pic1Amount` smallint(6) DEFAULT NULL COMMENT 'ภาพขนาด 4" x 6" ราคาภาพละ 100 บาท จำนวน',
  `pic1Price` float DEFAULT NULL,
  `pic2Amount` smallint(6) DEFAULT NULL COMMENT 'ภาพขนาด 5" x 7" ราคาภาพละ 200 บาท จำนวน',
  `pic2Price` float DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'รวมเป็นเงิน',
  `createBy` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `lastUpdateBy` int(11) DEFAULT NULL,
  `lastUpdateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table tr-infoservice.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `createBy` int(11) DEFAULT NULL,
  `lastUpdateBy` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `lastUpdateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
