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

INSERT INTO `alternatifbir` (`alterbir_id`, `alterbir_metin`, `alterbir_devambir`, `alterbir_devamiki`, `alterbir_devamuc`, `alterbir_parentid`, `alterbir_tarih`, `alterbir_seviye`, `alterbir_begeni`, `kullanici_id`) VALUES
(10,	' – Ben seni nasıl taşıyım. Seni asla alıp, taşıyamam. Çabucak yorulurum, Hem ne yapacaksın dünyadaki güzellikleri, diyerek papatyayı götürmek istemez ve uçarak gözden kaybolur. Bu duruma oldukça üzülen papatya günlerce ağlar ve kendisine kibirli davranan arı onu çok üzmüştür. Aslında papatyayı alıp, gezdirebilirdi. Fakat o kibirli davranarak onu küçümsemeyi tercih etti.\r\n\r\nAradan aylar geçti ve havalar yavaş yavaş soğudu. Ağaçlar yaprak döküyor ve çiçekler soluyordu. Fakat papatya halen yapraklarını dökmemişti. O gün havada arıyı uçarken görür ve bal yapmak için çiçek aradığını fark eder. Oysa oradaki solmadan kalan tek çiçek papatyaydı. Papatyanın üzerine konmak ister ve papatya arının konm',	6,	7,	NULL,	63,	'2018-12-07 16:29:02',	1,	0,	22),
(11,	' – Neden konmama izin vermiyorsun. Bal yapmam gerek.” der. Papatya aylar önce kendisine kibirli davranan arının yaptıklarını ona hatırlatır. Durumu hatırlayan arı kendine çok kızar ve papatyadan özür diler. Kendisinin kibri yüzünden geri çevirdiği papatyaya, şimdi kendi muhtaç olmuştu. Arının yaptıklarını affeden papatya, arının bal yapmasına izin verir ve bu duruma sevinen arı papatyayı alarak dünyayı gezdirmek için havalanmaya başlarlar.',	NULL,	NULL,	NULL,	63,	'2018-12-07 16:28:28',	1,	0,	22),
(12,	' -Bu tahtalarla ne yapıyorsun Selim?\r\n-Tahta çanaklar yapıyorum.\r\n-Tahta çanakları ne yapacaksın?\r\n-Sizin için!\r\n-Bizim için mi?\r\n-Evet sizin için.',	NULL,	NULL,	NULL,	63,	'2018-12-07 16:29:46',	1,	0,	23),
(13,	' gfhngfh',	NULL,	NULL,	NULL,	64,	'2018-12-09 13:27:44',	1,	0,	22),
(14,	' fghngfh',	NULL,	NULL,	NULL,	64,	'2018-12-09 13:27:47',	1,	0,	22),
(15,	' fgdhfgd',	NULL,	NULL,	NULL,	64,	'2018-12-09 13:41:20',	1,	0,	24),
(16,	' sadfasdf',	NULL,	NULL,	NULL,	67,	'2018-12-12 19:04:43',	1,	0,	23),
(17,	' efadsfads',	NULL,	NULL,	NULL,	67,	'2018-12-12 19:04:48',	1,	0,	23),
(18,	' – Ben seni nasıl taşıyım. Seni asla alıp, taşıyamam. Çabucak yorulurum, Hem ne yapacaksın dünyadaki güzellikleri, diyerek papatyayı götürmek istemez ve uçarak gözden kaybolur. Bu duruma oldukça üzülen papatya günlerce ağlar ve kendisine kibirli davranan arı onu çok üzmüştür. Aslında papatyayı alıp, gezdirebilirdi. Fakat o kibirli davranarak onu küçümsemeyi tercih etti. Aradan aylar geçti ve havalar yavaş yavaş soğudu. Ağaçlar yaprak döküyor ve çiçekler soluyordu. Fakat papatya halen yapraklarını dökmemişti. O gün havada arıyı uçarken görür ve bal yapmak için çiçek aradığını fark eder. Oysa oradaki solmadan kalan tek çiçek papatyaydı. Papatyanın üzerine konmak ister ve papatya arının konm ',	NULL,	NULL,	NULL,	68,	'2018-12-12 19:16:01',	1,	0,	23),
(19,	' – Ben seni nasıl taşıyım. Seni asla alıp, taşıyamam. Çabucak yorulurum, Hem ne yapacaksın dünyadaki güzellikleri, diyerek papatyayı götürmek istemez ve uçarak gözden kaybolur. Bu duruma oldukça üzülen papatya günlerce ağlar ve kendisine kibirli davranan arı onu çok üzmüştür. Aslında papatyayı alıp, gezdirebilirdi. Fakat o kibirli davranarak onu küçümsemeyi tercih etti. Aradan aylar geçti ve havalar yavaş yavaş soğudu. Ağaçlar yaprak döküyor ve çiçekler soluyordu. Fakat papatya halen yapraklarını dökmemişti. O gün havada arıyı uçarken görür ve bal yapmak için çiçek aradığını fark eder. Oysa oradaki solmadan kalan tek çiçek papatyaydı. Papatyanın üzerine konmak ister ve papatya arının konm ',	NULL,	NULL,	NULL,	68,	'2018-12-12 19:16:06',	1,	0,	23);

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

INSERT INTO `alternatifiki` (`alteriki_id`, `alteriki_metin`, `alteriki_tarih`, `alteriki_parentid`, `alteriki_seviye`, `alteriki_begeni`, `kullanici_id`) VALUES
(6,	' Bilge Dede iyice yaşlanmıştı. Gözleri görmüyor, kulakları iyi işitmiyordu. Yemeğini bile yemekte zorlanıyordu. Üstüne başına döküyor, sofrayı kirletiyordu. Bu yüzden gelini ve oğlu Bilge Dede’ye kızıyorlardı, iyi davranmıyorlardı. Evde onu tek seven, küçük torunu Selim idi. Selim, dedesine acıyor, babasıyla annesinin davranışlarına çok kızıyordu.\r\n\r\nBir akşam yemek yiyeceklerdi. Dede, ekmeğe uzanayım derken, kolu tabağına takıldı ve tabağını yere düşürdü. Örtüler kirlendi. Tabak kırıldı. Gelini kızdı, bağırdı. Bilge Dede, odasına çekildi. Karnı çok açtı ama yiyecek hali kalmamıştı. Ağlıyordu… Allah’a yalvarmaya başladı. “Allah’ım canımı alda kurtulayım, oğluma ve gelinime daha fazla yük olm',	'2018-12-07 16:28:49',	10,	2,	0,	22),
(7,	' Ertesi gün Selim’in babası eve elinde tahta çanak ve kaşıklarla geldi. Bilge Dede’yi evin bahçesindeki kulübeye taşıdılar. Artık burada kalacak yemeklerini de burada bu tahta çanak ve kaşıklarla yiyecekti.\r\n\r\nSelim buna çok üzüldü. “Neden böyle yapıyorlardı” ki? Bir gün gelecek, onlar da yaşlanacaklardı. Onların da eli ayağı tutmaz olacaktı. Bunu annesine, babasına nasıl anlatmalıydı?\r\n\r\nYağmurlu bir gündü. Selim’in annesi babası evdeydi. İşe gitmemişlerdi. Selim, birkaç tahta parçası getirdi. Bir bıçakla onları kesmeye, oymaya başladı. Bir yandan da annesine, babasına bakıyordu. Annesi ve babası merak ettiler. Selim bu tahtalarla ne yapıyordu? Annesi Ali’ye sordu:\r\n\r\n',	'2018-12-07 16:29:02',	10,	2,	0,	22);

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

INSERT INTO `anahikaye` (`hikaye_id`, `hikaye_baslik`, `hikaye_metin`, `hikaye_devambir`, `hikaye_devamiki`, `hikaye_devamuc`, `hikaye_tarih`, `hikaye_seviye`, `hikaye_begeni`, `kullanici_id`) VALUES
(63,	'Arı ile Papatya Hikayesi',	' Sıcak bir yaz günüydü. Her yer çiçeklerle dolu ve hava mis gibi kokuyordu. Çiçek tarlasının üzerinde arı vız vız diyerek neşeli neşeli uçuyordu. Havada o kadar güzel süzülüyordu ki papatya onu hayranlıkla izledi. Uçmaktan yorulan arı papatyanın yanındaki ağaç dalına konar. Papatya, arı ile konuşmak ister ve seslenir:\r\n\r\n– Arı kardeş ne kadar güzel uçuyorsun. Oysa benim kanatlarım yok ve ben senin gibi dünyadaki güzellikleri göremiyorum. Sadece etrafımdaki çiçekleri görüyorum. Bir gün beni de alıp gezdirebilir misin? der.\r\n\r\nArı papatyaya kibirli gözlerle bakar ve:\r\n\r\n',	10,	11,	12,	'2018-12-07 16:27:41',	0,	0,	22),
(64,	'vbn',	' vbn',	13,	14,	15,	'2018-12-07 16:36:00',	0,	0,	23),
(65,	'dfsg',	' dsfgsdfg',	NULL,	NULL,	NULL,	'2018-12-09 11:31:28',	0,	0,	22),
(66,	'sdfg',	' sdfg',	NULL,	NULL,	NULL,	'2018-12-09 13:28:39',	0,	0,	22),
(67,	'sdfgdsg',	' dsfgsfg',	16,	17,	NULL,	'2018-12-09 13:28:44',	0,	0,	22),
(68,	'sdfgd',	' sdsgdsfg',	18,	19,	NULL,	'2018-12-09 13:28:48',	0,	0,	22);

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `kullanici_id` int(100) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(25) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`) VALUES
(22,	'hakan',	'hakan6161'),
(23,	'efe',	'efe6161'),
(24,	'foa',	'foa6161');

-- 2018-12-12 20:51:02
