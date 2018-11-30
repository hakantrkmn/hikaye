-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `hikaye` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `hikaye`;

DROP TABLE IF EXISTS `alternatifbir`;
CREATE TABLE `alternatifbir` (
  `alterbir_id` int(50) NOT NULL AUTO_INCREMENT,
  `alterbir_metin` varchar(700) NOT NULL,
  `alterbir_devambir` int(50) DEFAULT NULL,
  `alterbir_devamiki` int(50) DEFAULT NULL,
  `alterbir_devamuc` int(50) DEFAULT NULL,
  `alterbir_parentid` int(100) NOT NULL,
  `alterbir_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alterbir_seviye` int(100) NOT NULL DEFAULT '1',
  `alterbir_begeni` int(100) NOT NULL DEFAULT '0',
  `kullanici_id` int(100) NOT NULL,
  PRIMARY KEY (`alterbir_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `alterbir_parentid` (`alterbir_parentid`),
  KEY `alterbir_devambir` (`alterbir_devambir`),
  KEY `alterbir_devamiki` (`alterbir_devamiki`),
  KEY `alterbir_devamuc` (`alterbir_devamuc`),
  CONSTRAINT `alternatifbir_ibfk_3` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alternatifbir_ibfk_4` FOREIGN KEY (`alterbir_parentid`) REFERENCES `anahikaye` (`hikaye_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alternatifbir_ibfk_5` FOREIGN KEY (`alterbir_devambir`) REFERENCES `alternatifiki` (`alteriki_id`) ON DELETE SET NULL,
  CONSTRAINT `alternatifbir_ibfk_8` FOREIGN KEY (`alterbir_devamiki`) REFERENCES `alternatifiki` (`alteriki_id`) ON DELETE SET NULL,
  CONSTRAINT `alternatifbir_ibfk_9` FOREIGN KEY (`alterbir_devamuc`) REFERENCES `alternatifiki` (`alteriki_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `alternatifiki`;
CREATE TABLE `alternatifiki` (
  `alteriki_id` int(20) NOT NULL AUTO_INCREMENT,
  `alteriki_metin` varchar(700) NOT NULL,
  `alteriki_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alteriki_parentid` int(10) NOT NULL,
  `alteriki_seviye` int(10) NOT NULL DEFAULT '2',
  `alteriki_begeni` int(100) NOT NULL DEFAULT '0',
  `kullanici_id` int(100) NOT NULL,
  PRIMARY KEY (`alteriki_id`),
  KEY `alteriki_parentid` (`alteriki_parentid`),
  KEY `kullanici_id` (`kullanici_id`),
  CONSTRAINT `alternatifiki_ibfk_3` FOREIGN KEY (`alteriki_parentid`) REFERENCES `alternatifbir` (`alterbir_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alternatifiki_ibfk_4` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `anahikaye`;
CREATE TABLE `anahikaye` (
  `hikaye_id` int(100) NOT NULL AUTO_INCREMENT,
  `hikaye_baslik` varchar(200) NOT NULL,
  `hikaye_metin` varchar(700) NOT NULL,
  `hikaye_devambir` int(50) DEFAULT NULL,
  `hikaye_devamiki` int(50) DEFAULT NULL,
  `hikaye_devamuc` int(50) DEFAULT NULL,
  `hikaye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hikaye_seviye` int(10) NOT NULL DEFAULT '0',
  `hikaye_begeni` int(100) NOT NULL DEFAULT '0',
  `kullanici_id` int(100) NOT NULL,
  PRIMARY KEY (`hikaye_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `hikaye_devambir` (`hikaye_devambir`),
  KEY `hikaye_devamiki` (`hikaye_devamiki`),
  KEY `hikaye_devamuc` (`hikaye_devamuc`),
  CONSTRAINT `anahikaye_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anahikaye_ibfk_5` FOREIGN KEY (`hikaye_devambir`) REFERENCES `alternatifbir` (`alterbir_id`) ON DELETE SET NULL,
  CONSTRAINT `anahikaye_ibfk_6` FOREIGN KEY (`hikaye_devamiki`) REFERENCES `alternatifbir` (`alterbir_id`) ON DELETE SET NULL,
  CONSTRAINT `anahikaye_ibfk_7` FOREIGN KEY (`hikaye_devamuc`) REFERENCES `alternatifbir` (`alterbir_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `kullanici_id` int(100) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(25) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2018-11-30 19:40:56
