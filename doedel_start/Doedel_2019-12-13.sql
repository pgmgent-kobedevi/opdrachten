# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: Doedel
# Generation Time: 2019-12-13 07:38:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table doedel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doedel`;

CREATE TABLE `doedel` (
  `doedel_code` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`doedel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `doedel` WRITE;
/*!40000 ALTER TABLE `doedel` DISABLE KEYS */;

INSERT INTO `doedel` (`doedel_code`, `name`, `description`, `creation_date`)
VALUES
	('5df29c4593e2b','Examen webdev1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus risus eget lorem egestas volutpat. Donec ut lorem neque. Nam cursus libero turpis. Integer sapien ligula, aliquet vitae purus eget, facilisis venenatis ex. Vestibulum aliquam sed odio at vestibulum. Donec posuere, turpis sed consectetur posuere, diam quam hendrerit diam, et lacinia elit mi sit amet arcu. Integer ut nibh eget nunc dapibus imperdiet. Proin neque est, vestibulum vel ornare in, pretium et justo. Integer eget ipsum accumsan, au','2019-12-12 21:00:05');

/*!40000 ALTER TABLE `doedel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table doedel_date
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doedel_date`;

CREATE TABLE `doedel_date` (
  `doedel_date_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `doedel_code` varchar(50) DEFAULT NULL,
  `doedel_date` datetime DEFAULT NULL,
  PRIMARY KEY (`doedel_date_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `doedel_date` WRITE;
/*!40000 ALTER TABLE `doedel_date` DISABLE KEYS */;

INSERT INTO `doedel_date` (`doedel_date_id`, `doedel_code`, `doedel_date`)
VALUES
	(1,'5df29c4593e2b','2020-01-15 14:00:00'),
	(2,'5df29c4593e2b','2020-01-13 09:00:00'),
	(3,'5df29c4593e2b','2020-01-13 14:00:00'),
	(4,'5df29c4593e2b','2020-01-14 14:00:00');

/*!40000 ALTER TABLE `doedel_date` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`user_id`, `name`, `email`)
VALUES
	(3,'Dieter','dieter@deweirdt.be'),
	(4,'George','george@fromthejungle.com'),
	(5,'asdf','asdf');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vote
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `doedel_date_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`doedel_date_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;

INSERT INTO `vote` (`user_id`, `doedel_date_id`)
VALUES
	('3',2),
	('3',3),
	('4',2),
	('4',4),
	('5',22),
	('5',23);

/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
