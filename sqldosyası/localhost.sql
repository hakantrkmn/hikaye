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
  KEY `kullanici_id` (`kullanici_id`),
  KEY `alterbir_parentid` (`alterbir_parentid`),
  CONSTRAINT `alternatifbir_ibfk_3` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alternatifbir_ibfk_4` FOREIGN KEY (`alterbir_parentid`) REFERENCES `anahikaye` (`hikaye_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `alternatifbir` (`alterbir_id`, `alterbir_metin`, `alterbir_devambir`, `alterbir_devamiki`, `alterbir_devamuc`, `alterbir_parentid`, `alterbir_tarih`, `alterbir_seviye`, `alterbir_begeni`, `kullanici_id`) VALUES
(35,	' dfhg',	0,	0,	0,	44,	'2018-11-27 21:08:03',	1,	0,	16),
(36,	' kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjööööööööööööv kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö kjööööööööööööv kjöööööööööööö kjöööööööööööö kjöööööööööööö kjöööööööööööö',	0,	0,	0,	44,	'2018-11-27 21:09:02',	1,	0,	16),
(37,	' İkinci yumurta horoz olmuş, bir köyde harman biçmekle meşguldü. Önce \"Gidip horozu alayım\", dedim. Minareden aşağıya indim. Köye gittim. Oraya varınca horozumun kendisi için çalıştığı çiftçiye:\r\n\r\n \r\n\r\n- Horozumu ver. Ayrıca sana çalıştığı kadarının ücretini de ver dedim.\r\n\r\n \r\n\r\nUzun tartışmalardan sonra çeltik ekili tarlanın ürününden bana bir öküz dengi hak vermesinde anlaştık. Harman kaldırıldıktan sonra yirmi beş batman pirinç benim payıma düştü.\r\n\r\n \r\n\r\nPirinçleri götürmek istedim. Çuvalım yoktu. Bir pire öldürdüm. Derisinden çuval yaptım. Pirinçleri içine doldurup horozun sırtına yükledim. Yürümeye başladım.',	18,	19,	0,	44,	'2018-11-28 11:45:59',	1,	0,	16),
(38,	' hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrükenv hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrükenv hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken hakantrüken',	0,	0,	0,	45,	'2018-11-27 21:13:39',	1,	0,	15),
(39,	' ghjbnmbnm',	0,	0,	0,	45,	'2018-11-28 11:43:51',	1,	0,	15),
(40,	'Hemen şehrimizin tarihini okudum ve köyümüzdeki dedeleri dinledim.\r\n\r\nKöyün hemen önünde görkemli bir dağ vardır dağ çok büyük olduğundan tepesindeki kar daha erimemiştir. Köyün ilk ışıklarıyla mükemmel bir görüntü ortaya çıkar. Dedelerimizin dediğine göre o dağda dolu altın var, eskiler altınlarını oraya gömermiş. Ama kazıp almaya kimse cesaret edemezmiş.\r\n\r\nBu cümlenin üzerine çok düşündüm altı üstü kazıp altını alacaklar bunu cesaretle ne ilgisi var diye düşündüm durdum, ama bu benim kazıp altın almamla değişecekti aileme haber vermeden aldım elime kazma küreği direk dağın yolunu tuttum.',	20,	0,	0,	46,	'2018-11-28 17:22:15',	1,	0,	15),
(41,	' Bayağı mutluydum bu arada kediden ses çıkmıyordu etrafıma bakındım ama ortada kedi yoktu. Testiyi boynumdaki şala sarıp köye indirdim.\r\nEve babamın gelmesini bekledim ve babam gelince gösterdim babam altınları görünce korktu bunları nereden bulduğumu sordu ben de dağdan bulduğumu söyledim kazıp çıkardım dedim babam gözüyle beni süzdükten sonra altın dolu büyük testiyi alıp çıktı ve akşama döndü.',	0,	0,	0,	46,	'2018-11-28 17:23:11',	1,	0,	16),
(42,	' – Hadi kalkın yeni evimize gidiyoruz.\r\n\r\nAnnem şaşkın şaşkın bakarken ben babamın altınları harcamaya başladığını anlamıştım annem ne yeni evi diye sorunca babam yeni bir iş bulduğunu ve yüksek miktarda maaş aldığını söyledi buna inanan annem hemen eşyaları toplamaya başladı 2-3 günde yeni evimize taşındık yeni evimiz bayağı büyük ve güzel bir evdi. Ama mutlu olmamız gerekirken hiç kavga etmeyen ailem kavga etmeye başladı artık hiçbir günümüz mutlu geçmiyordu. Her gün kabuslar görüyordum. Kabuslardan uyandığımda penceremin önünde tıpkı dağdaki kedi gibi bir kedi görüyordum.',	0,	0,	0,	46,	'2018-11-28 17:31:34',	1,	0,	16);

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
(18,	' - Bu yaranın ilacı nedir? diye sordum.\r\n\r\n \r\n\r\n- Ceviz içini kavurup horozun sırtına sürersen yarası iyileşir, dediler.\r\n\r\n \r\n\r\nBir ceviz içini kavurdum. Yarası iyileşsin diye sırtına koydum ve yattım. Sabah uyandığımda bir de ne göreyim, horozun sırtında kocaman bir ceviz ağacı bitmiş! Çocuklar ağacın etrafına toplanmışlar, ceviz düşürüp yemek için ağaca taş ve kesek atıyorlar! Ağacın dalına çıktım. Ağaçta yüz eşek yükü taş ve kesek toplandığını gördüm. Bir keser bulup yer dümdüz olana kadar kesekleri parçaladım. Burasının salatalık ve karpuz ekimi için uygun olduğunu gördüm.\r\n\r\n \r\n\r\nBir parça salatalık ve karpuz tohumu ektim. Ertesi sabah pek çok salatalık ve karpuz bitmişt',	'2018-11-27 21:10:39',	37,	2,	0,	15),
(19,	' deneme',	'2018-11-28 11:45:59',	37,	2,	0,	15),
(20,	' Dedemin dediğinde göre altın olan yerlerde genellikle taşa konmuş bir işaret vardır demişti bende aramaya koyuldum. 1 – 2 saat aradıktan sonra üzerinde bir simge olan garip bir taş parçası buldum, vakit kaybetmeden hemen kazmaya başladım kazarken garip bir şey oldu toprağı yaklaşık 1 metre kazdıktan sonra toprağın içinden kara bir kedi çıktı ben bunun üzerine bayağı şaşkındım kedi bana garip garip bakıp etrafımda dolaşıyordu herhalde küçük bir köstebek deliğinden girmiştir diye düşündüm kazmaya devam ederken kedi beni seyrediyordu bu beni biraz ürkütmüştü dağın yarısını tırmandığımdan dolayı bayağı hava soğumuştu rüzgar dağa vuruyor çok korkunç bir ses çıkartıyordu biraz daha kazdıktan son',	'2018-11-28 17:22:15',	40,	2,	0,	16);

DROP TABLE IF EXISTS `anahikaye`;
CREATE TABLE `anahikaye` (
  `hikaye_id` int(100) NOT NULL AUTO_INCREMENT,
  `hikaye_baslik` varchar(200) NOT NULL,
  `hikaye_metin` varchar(700) NOT NULL,
  `hikaye_devambir` int(50) NOT NULL DEFAULT '0',
  `hikaye_devamiki` int(50) NOT NULL DEFAULT '0',
  `hikaye_devamuc` int(50) NOT NULL DEFAULT '0',
  `hikaye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hikaye_seviye` int(10) NOT NULL DEFAULT '0',
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
(43,	'dsfg',	' sdfg',	0,	0,	0,	'2018-11-27 21:05:40',	0,	0,	16),
(44,	'hj',	' (Kirman Bölgesi\'nden bir masal)\r\n\r\n \r\n\r\nBir varmış bir yokmuş. Hiçler Şehri\'nde bir kız vardı. Bir gün eli yaralandı. Yarası iyileşmeye başladıktan birkaç gün sonra, merhem ve ilaç alıp yarasına sürmek için halasına gitti. Halası, \"Bende merhem yok\" dedi. Onun yerine iki yumurta verdi kıza.\r\n\r\n \r\n\r\n- Bu yumurtaları pazara götürüp sat ve parasıyla attardan merhem al, dedi.\r\n\r\n \r\n\r\nŞimdi dinleyin bakın, kızacağız başından geçenleri nasıl anlatıyor: Pazara giderken yolda yumurtalarımı kaybettim. ok üzüldüm. Elimi keseye soktum. Kesenin dibinde bir kuruş buldum. Sonra yumurtaları bulmak için o bir kuruşu bir',	35,	36,	37,	'2018-11-27 21:06:47',	0,	0,	16),
(45,	'sdfsdf',	' sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsdv sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsd sdfsdfsdv sdfsdfsd sd',	38,	39,	0,	'2018-11-27 21:13:26',	0,	0,	15),
(46,	'Dağdaki Büyülü Altın',	'Bu ay yine elektrik faturası fazla gelmişti, artık evi idare edemiyor resmen batıyorduk evimizin kirasını ödemeyince yıkık dökük yağmur yağdığında içeri su damlayan içeri soğuk alan kötü bir evde yaşamak zorunda kalmıştık. Babamın işindeki en yakın arkadaşının yaptığı hainlik yüzünden babam işten atılmıştı, yeni bir iş bulmuştu tabi ama ne sigortası vardı ne de bizi geçindirebilecek bir maaşı bu yüzden bize bir yerden para lazımdı ama nasıl gelecekti o para.\r\n\r\nHemen şehrimizin tarihini okudum ve köyümüzdeki dedeleri dinledim.',	40,	41,	42,	'2018-11-28 17:20:49',	0,	0,	15);

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `kullanici_id` int(100) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(25) NOT NULL,
  `kullanici_sifre` varchar(50) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`) VALUES
(15,	'hakantrkmn',	'hakan6161'),
(16,	'hasan',	'hasan61'),
(18,	'efe',	'efe61');

-- 2018-11-28 19:40:36
