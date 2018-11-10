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
  `alterbir_devambir` int(50) NOT NULL DEFAULT '0',
  `alterbir_devamiki` int(50) NOT NULL DEFAULT '0',
  `alterbir_devamuc` int(50) NOT NULL DEFAULT '0',
  `alterbir_parentid` int(100) NOT NULL,
  `alterbir_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alterbir_seviye` int(100) NOT NULL DEFAULT '1',
  `alterbir_begeni` int(100) NOT NULL DEFAULT '0',
  `kullanici_id` int(100) NOT NULL,
  PRIMARY KEY (`alterbir_id`),
  KEY `alterbir_parentid` (`alterbir_parentid`),
  KEY `kullanici_id` (`kullanici_id`),
  CONSTRAINT `alternatifbir_ibfk_1` FOREIGN KEY (`alterbir_parentid`) REFERENCES `anahikaye` (`hikaye_id`),
  CONSTRAINT `alternatifbir_ibfk_3` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `alternatifbir` (`alterbir_id`, `alterbir_metin`, `alterbir_devambir`, `alterbir_devamiki`, `alterbir_devamuc`, `alterbir_parentid`, `alterbir_tarih`, `alterbir_seviye`, `alterbir_begeni`, `kullanici_id`) VALUES
(27,	'<p>&Ccedil;ok zorlu bir yolculuk sonunda Bilgenin yaşadığı eve ulaşmış adam. Kapıdan i&ccedil;eri girmiş ve bilgeye hayatın anlamının ne olduğunu sormuş .. Bilge &ldquo;sana bunun yanıtını s&ouml;ylerim ama &ouml;nce bir sınavdan ge&ccedil;men gerekiyor&rdquo; demiş . Adam kabul etmiş. Bilge bir &ccedil;ay kaşığı vermiş adamın eline ve i&ccedil;ine de silme bir şekilde zeytinyağı doldurmuş.</p>',	4,	0,	0,	40,	'2018-11-10 15:46:13',	1,	0,	13),
(28,	'<p>- Şimdi &ccedil;ık ve bah&ccedil;ede bir tur at, tekrar buraya gel ... Yalnız dikkat et, kaşıktaki zeytinyağı eksilmesin, eğer bir damla eksilirse kaybedersin..<br />Adam, g&ouml;z&uuml; &ccedil;ay kaşığında, bah&ccedil;eyi turlayıp gelmiş. Bilge bakmış evet demiş &quot;kaşıkta yağ eksilmemiş, peki bah&ccedil;e nasıldı?&quot;</p>',	1,	2,	3,	40,	'2018-11-10 15:38:46',	1,	2,	13),
(29,	'<p>Adam şaşkın...<br />- Ama demiş ben kaşıktan başka bir yere bakmadım ki ...<br />- Şimdi tekrar bah&ccedil;eyi dolaşıyorsun, kaşık yine elinde olacak ama bah&ccedil;eyi inceleyip gel, demiş Bilge...<br />Adam tekrar bah&ccedil;eye &ccedil;ıkmış, g&ouml;rd&uuml;ğ&uuml;&nbsp; g&uuml;zelliklerle b&uuml;y&uuml;lenmiş, muhteşem bir bah&ccedil;edeymiş &ccedil;&uuml;nk&uuml; ... Geri geldiğinde bilge adama &quot;bah&ccedil;e nasıldı&quot; diye&nbsp;</p>',	0,	0,	0,	40,	'2018-11-10 14:44:51',	1,	0,	14);

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
  CONSTRAINT `alternatifiki_ibfk_1` FOREIGN KEY (`alteriki_parentid`) REFERENCES `alternatifbir` (`alterbir_id`),
  CONSTRAINT `alternatifiki_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `alternatifiki` (`alteriki_id`, `alteriki_metin`, `alteriki_tarih`, `alteriki_parentid`, `alteriki_seviye`, `alteriki_begeni`, `kullanici_id`) VALUES
(1,	'<p>asd</p>',	'2018-11-10 14:47:34',	28,	2,	0,	14),
(2,	'<p>HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA</p>',	'2018-11-10 14:58:09',	28,	2,	3,	14),
(3,	'<p>&Ccedil;ok zorlu bir yolculuk sonunda Bilgenin yaşadığı eve ulaşmış adam. Kapıdan i&ccedil;eri girmiş ve bilgeye hayatın anlamının ne olduğunu sormuş .. Bilge &ldquo;sana bunun yanıtını s&ouml;ylerim ama &ouml;nce bir sınavdan ge&ccedil;men gerekiyor&rdquo; demiş . Adam kabul etmiş. Bilge bir &ccedil;ay kaşığı vermiş adamın eline ve i&ccedil;ine de silme bir şekilde zeytinyağı doldurmuş.</p>',	'2018-11-10 15:38:46',	28,	2,	0,	14),
(4,	'<p>deneme</p>',	'2018-11-10 15:46:13',	27,	2,	8,	14);

DROP TABLE IF EXISTS `anahikaye`;
CREATE TABLE `anahikaye` (
  `hikaye_id` int(100) NOT NULL AUTO_INCREMENT,
  `hikaye_baslik` varchar(200) NOT NULL,
  `hikaye_metin` varchar(700) NOT NULL,
  `hikaye_devambir` int(50) NOT NULL DEFAULT '0',
  `hikaye_devamiki` int(50) NOT NULL DEFAULT '0',
  `hikaye_devamuc` int(50) NOT NULL DEFAULT '0',
  `hikaye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hikaye_seviye` int(10) NOT NULL,
  `hikaye_begeni` int(100) NOT NULL DEFAULT '0',
  `kullanici_id` int(100) NOT NULL,
  PRIMARY KEY (`hikaye_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `hikaye_devambir` (`hikaye_devambir`),
  KEY `hikaye_devamuc` (`hikaye_devamuc`),
  KEY `hikaye_devamiki` (`hikaye_devamiki`),
  CONSTRAINT `anahikaye_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `anahikaye` (`hikaye_id`, `hikaye_baslik`, `hikaye_metin`, `hikaye_devambir`, `hikaye_devamiki`, `hikaye_devamuc`, `hikaye_tarih`, `hikaye_seviye`, `hikaye_begeni`, `kullanici_id`) VALUES
(40,	'denem',	'<p>Eski zamanların birinde bir adam hayatın anlamının ne olduğuna takmış kafayı...</p><p>Bulduğu hi&ccedil;bir yanıt ona yeterli gelmemiş ve başkalarına sormaya karar vermiş.. Ama aldığı yanıtlar da ona yetmemiş. Fakat mutlaka bir yanıtı olmalı diyormuş.. Ve dolaşıp herkese bunu sormaya karar vermiş.. K&ouml;y, kasaba, &uuml;lke dolaşmış, bu arada zaman da durmuyor tabii ki ...</p><p>Tam umudunu yitirmişken bir k&ouml;yde konuştuğu insanlar ona<br />-Şu karşı ki dağları g&ouml;r&uuml;yor musun, orada yaşlı bir bilge yaşar istersen ona git belki o sana aradığın yanıtı verebilir, demişler.</p>',	27,	28,	29,	'2018-11-10 14:42:19',	0,	0,	13),
(41,	'deneme2',	'<p>Adam şaşkın...<br />- Ama demiş ben kaşıktan başka bir yere bakmadım ki ...<br />- Şimdi tekrar bah&ccedil;eyi dolaşıyorsun, kaşık yine elinde olacak ama bah&ccedil;eyi inceleyip gel, demiş Bilge...<br />Adam tekrar bah&ccedil;eye &ccedil;ıkmış, g&ouml;rd&uuml;ğ&uuml;&nbsp; g&uuml;zelliklerle b&uuml;y&uuml;lenmiş, muhteşem bir bah&ccedil;edeymiş &ccedil;&uuml;nk&uuml; ... Geri geldiğinde bilge adama &quot;bah&ccedil;e nasıldı&quot; diye&nbsp;</p>',	0,	0,	0,	'2018-11-10 14:46:21',	0,	2,	14);

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `kullanici_id` int(100) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(25) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`) VALUES
(13,	'hakantrkmn',	'hakan6161'),
(14,	'efe',	'efe6161');

-- 2018-11-10 15:55:19
