
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table olod
# ------------------------------------------------------------

DROP TABLE IF EXISTS `olod`;

CREATE TABLE `olod` (
  `olod_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `specialisation` varchar(64) DEFAULT NULL,
  `choice` varchar(64) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `contact_hours` float DEFAULT NULL,
  `study_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`olod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `olod` DISABLE KEYS */;

INSERT INTO `olod` (`olod_id`, `name`, `specialisation`, `choice`, `semester`, `credits`, `contact_hours`, `study_time`)
VALUES
	(1,'Marketing','CMO','Graphic Design (GD)',3,2,1.5,55),
	(2,'Economie Voor De Creatieve Industrie','CMO','Graphic Design (GD)',3,2,1.5,55),
	(3,'Media- & Handelsrecht','CMO','Graphic Design (GD)',4,2,1.5,55),
	(4,'Reclame','CMO','Graphic Design (GD)',4,2,1.5,55),
	(5,'Engels','CMO','Graphic Design (GD)',4,2,1,55),
	(6,'Frans','CMO','Graphic Design (GD)',4,2,1,55),
	(7,'Projectcommunicatie','CMO','Graphic Design (GD)',4,1,0.75,27),
	(8,'Vormgeving 2','CMO','Graphic Design (GD)',3,6,4,165),
	(9,'Schetsen 2','CMO','Graphic Design (GD)',3,2,2,55),
	(10,'Photoshop 2 CMO','CMO','Graphic Design (GD)',3,2,2,55),
	(11,'Image Processing III CMO','CMO','Graphic Design (GD)',3,3,2,82),
	(12,'Material Science CMO','CMO','Graphic Design (GD)',3,4,3,110),
	(13,'New Media Design II','CMO','Graphic Design (GD)',3,3,3,82),
	(14,'Print Production I CMO','CMO','Graphic Design (GD)',3,6,4,165),
	(15,'New Media Design 3','CMO','Graphic Design (GD)',4,4,3,110),
	(16,'Projectmanagement CMO','CMO','Graphic Design (GD)',4,1,0.5,27),
	(17,'Workflow CMO','CMO','Graphic Design (GD)',4,6,4,165),
	(18,'Technologie GD','CMO','Graphic Design (GD)',4,2,2,55),
	(19,'Practicum GD','CMO','Graphic Design (GD)',4,8,6,220);

/*!40000 ALTER TABLE `olod` ENABLE KEYS */;


# Dump of table submission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `submission`;

CREATE TABLE `submission` (
  `submission_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`submission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table submission_olod
# ------------------------------------------------------------

DROP TABLE IF EXISTS `submission_olod`;

CREATE TABLE `submission_olod` (
  `submission_olod_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `submission_id` int(11) DEFAULT NULL,
  `olod_id` int(11) DEFAULT NULL,
  `real_study_time` float DEFAULT NULL,
  `wish_contact_hours` float DEFAULT NULL,
  `wish_study_time` float DEFAULT NULL,
  PRIMARY KEY (`submission_olod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
