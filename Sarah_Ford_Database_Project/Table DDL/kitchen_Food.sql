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
-- Table structure for table `Food`
--

DROP TABLE IF EXISTS `Food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Food`
--

LOCK TABLES `Food` WRITE;
/*!40000 ALTER TABLE `Food` DISABLE KEYS */;
INSERT INTO `Food` VALUES (41,'.5'),(35,'All-purpose flour'),(1,'apples'),(40,'avocado'),(55,'baguette'),(15,'bananas'),(52,'Bannas'),(57,'black bean'),(71,'black bean soup'),(29,'black olives'),(58,'butter'),(32,'buttermilk'),(42,'canola oil'),(48,'carrots'),(69,'cauliflower'),(34,'Cheddar Cheese'),(72,'chick peas'),(23,'chocolate chips'),(2,'cinnamon'),(22,'cloves'),(67,'coleslaw'),(56,'condensed milk'),(61,'cornmeal'),(50,'cucumbers'),(14,'cumin'),(49,'Dry Maccoroni'),(26,'eggplant'),(3,'eggs'),(53,'flour'),(19,'garlic'),(27,'green bell peppers'),(28,'green olives'),(66,'hummus'),(73,'kiwis'),(44,'lemon juice'),(13,'lemons'),(31,'limes'),(11,'mango'),(10,'milk'),(64,'mint'),(38,'mozarella cheese'),(60,'oats'),(20,'olive oil'),(46,'onions'),(30,'orange juice'),(21,'oranges'),(59,'oreos'),(63,'pancake batter'),(45,'pears'),(54,'pepper'),(39,'pepperjack cheese'),(6,'pesto sauce'),(24,'pumpkin'),(7,'salt'),(47,'self-rising flour'),(68,'spinach'),(43,'sweet milk'),(65,'taragon'),(51,'Tomatos'),(4,'unsalted butter'),(12,'vanilla'),(17,'vegetable oil'),(33,'wheat thins'),(16,'white sugar'),(36,'white wine vinegar'),(70,'whole wheat bread'),(37,'Whole wheat flour'),(5,'whole wheat noodles');
/*!40000 ALTER TABLE `Food` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-24 11:28:58
