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
-- Table structure for table `Ingredients`
--

DROP TABLE IF EXISTS `Ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ingredients` (
  `food_id` int(11) NOT NULL,
  `quantity` decimal(4,2) NOT NULL,
  `unit` varchar(255) NOT NULL COMMENT 'foreign key (Units.name)',
  `recipe_id` int(11) NOT NULL,
  KEY `food_id` (`food_id`,`recipe_id`),
  KEY `Ingredients_ibfk_3_idx` (`recipe_id`),
  KEY `Ingredients_ibfk_2` (`unit`),
  CONSTRAINT `Ingredients_ibfk_4` FOREIGN KEY (`food_id`) REFERENCES `Food` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Ingredients_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `Units` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Ingredients_ibfk_3` FOREIGN KEY (`recipe_id`) REFERENCES `Recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ingredients`
--

LOCK TABLES `Ingredients` WRITE;
/*!40000 ALTER TABLE `Ingredients` DISABLE KEYS */;
INSERT INTO `Ingredients` VALUES (58,0.25,'cups',46),(32,0.25,'cups',46),(43,0.25,'cups',46),(44,0.25,'teaspoons',46),(10,2.00,'cups',46),(50,3.00,'cups',47),(48,1.00,'cups',47),(51,2.00,'cups',47),(53,2.00,'cups',49),(56,1.00,'teaspoons',49),(54,2.00,'cups',47),(55,2.00,'cups',47),(57,2.00,'cups',50),(58,1.00,'cups',51),(64,9.00,'cups',48),(65,9.00,'cups',48),(65,9.00,'cups',48);
/*!40000 ALTER TABLE `Ingredients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-24 11:28:56
