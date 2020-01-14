# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: webdev1examen
# Generation Time: 2020-01-13 08:21:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table favorite
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favorite`;

CREATE TABLE `favorite` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `favorite` WRITE;
/*!40000 ALTER TABLE `favorite` DISABLE KEYS */;

INSERT INTO `favorite` (`photo_id`, `user_id`)
VALUES
	(1,3),
	(1,6),
	(1,9),
	(2,2),
	(2,3),
	(2,4),
	(2,6),
	(2,7),
	(2,8),
	(2,10),
	(3,1),
	(3,2),
	(3,3),
	(3,4),
	(3,5),
	(3,7),
	(4,2),
	(4,5),
	(4,9),
	(4,10),
	(5,1),
	(5,2),
	(5,4),
	(5,6),
	(5,7),
	(5,8),
	(5,10),
	(6,6),
	(6,7),
	(6,8),
	(6,10),
	(7,1),
	(7,2),
	(7,3),
	(7,8),
	(8,1),
	(8,5),
	(8,8),
	(8,9),
	(8,10);

/*!40000 ALTER TABLE `favorite` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `photo_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `src` varchar(256) DEFAULT NULL,
  `upload_date` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;

INSERT INTO `photo` (`photo_id`, `user_id`, `title`, `src`, `upload_date`)
VALUES
	(1,1,'Birds view','2304917.jpg','2020-01-01 06:15:00'),
	(2,2,'Home sweet home','3297503.jpg','2020-01-04 12:34:00'),
	(3,2,'Morning yoga session','3326362.jpg','2020-01-04 12:33:00'),
	(4,4,'#smile','3373398.jpg','2020-01-09 11:45:00'),
	(5,5,'Reflection Birds','3375493.jpg','2020-01-10 10:00:00'),
	(6,5,'Reflection Tower','3378994.jpg','2020-01-10 10:03:00'),
	(7,5,'Reflection Mirror','3476402.jpg','2020-01-10 10:06:00'),
	(8,1,'Floating bridge','3493777.jpg','2020-01-11 11:11:00');

/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `creation_date`)
VALUES
	(1,'Armando','Rawstron','arawstron0@omniture.com','Bki9vNfVT','2019-01-28 00:00:00'),
	(2,'Dane','McLarty','dmclarty1@senate.gov','07XkRWb','2019-01-14 00:00:00'),
	(3,'Dwain','Nuccii','dnuccii2@xing.com','Vy6ivAHhi8Q0','2019-11-16 00:00:00'),
	(4,'Elana','Westover','ewestover3@marriott.com','aHEeEE35Hdwh','2019-12-09 00:00:00'),
	(5,'Calli','Degenhardt','cdegenhardt4@statcounter.com','a6S7NOw8Dk','2019-12-13 00:00:00'),
	(6,'Dasi','Latan','dlatan5@e-recht24.de','Hp83OxL6','2019-06-28 00:00:00'),
	(7,'Moina','Janecki','mjanecki6@gov.uk','CYQlUW','2019-02-27 00:00:00'),
	(8,'Kelsey','Bernette','kbernette7@indiatimes.com','YVbwSYBKMYRe','2019-07-22 00:00:00'),
	(9,'Brit','Hancock','bhancock8@gravatar.com','JPeUByCqnGEA','2019-01-30 00:00:00'),
	(10,'Hermon','Goseling','hgoseling9@buzzfeed.com','SfbRXy40mL','2019-03-06 00:00:00');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
