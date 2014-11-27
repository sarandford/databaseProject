CREATE DATABASE  IF NOT EXISTS `kitchen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kitchen`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 23.229.206.34    Database: kitchen
-- ------------------------------------------------------
-- Server version	5.5.36-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Cooks`
--

DROP TABLE IF EXISTS `Cooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cooks`
--

LOCK TABLES `Cooks` WRITE;
/*!40000 ALTER TABLE `Cooks` DISABLE KEYS */;
INSERT INTO `Cooks` VALUES (3,'lkh','jhlk'),(4,'hkjkjhkj','gkjhkjhk'),(5,'khkj','kjhkjh'),(9,'testUser','pword'),(10,'newUser','new'),(19,'new ','ooo'),(21,'hkh','kjh'),(22,'kjhk','kjhkj'),(23,'kjkj','kjjk'),(34,'hi','there'),(52,'ihl','hjhkj'),(53,'',''),(56,'ioioioi','oooooo'),(59,'jllllll','poppppp'),(60,'hhhh','popooo'),(62,'bjk','HL'),(64,'unique','user'),(65,'ella','sam'),(66,'oj','ko'),(67,'old','password'),(68,'lol','ttyl'),(69,'lea','hammerhead'),(70,'panettama','daphne77'),(71,'sarah','tryme'),(72,'sarandford','newpword');
/*!40000 ALTER TABLE `Cooks` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`sarandford`@`localhost`*/ /*!50003 trigger validateUser before insert on Cooks for each row
begin
IF exists(select username from Cooks where username=NEW.username) THEN
		SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[table:Cooks] - `username` column is not valid';
elseif exists(select password from Cooks where password=NEW.password) THEN
	SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[table:Cooks] - `password` column is not valid';
	END IF;
    end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-24 11:28:53
