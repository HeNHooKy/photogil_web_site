-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: photogil_db
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `all_albums`
--

DROP TABLE IF EXISTS `all_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `all_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `real_name` varchar(100) NOT NULL,
  `link` text DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `real_name_eng` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `description_eng` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `all_albums`
--

LOCK TABLES `all_albums` WRITE;
/*!40000 ALTER TABLE `all_albums` DISABLE KEYS */;
INSERT INTO `all_albums` VALUES (1,'love','Weddings and love story','photos/block1_love.jpg','love','Weddings and love story','Weddings and love story','Weddings and love story'),(2,'family','Family fotosession','photos/block2_family.jpg','family','Family fotosession','Family fotosession','Family fotosession'),(3,'portret','Portrets','photos/block3_portret.jpg','portret','Portrets','Portrets','Portrets');
/*!40000 ALTER TABLE `all_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `love`
--

DROP TABLE IF EXISTS `love`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `love`
--

LOCK TABLES `love` WRITE;
/*!40000 ALTER TABLE `love` DISABLE KEYS */;
INSERT INTO `love` VALUES (5,'photos/NmIwYWQ1NDJkNTlhZDhjOW.jpg','NmIwYWQ1NDJkNTlhZDhjOW');
/*!40000 ALTER TABLE `love` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'photo_1','photos/kipr.jpg'),(2,'me_photo','photos/dasha.jpg');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portret`
--

DROP TABLE IF EXISTS `portret`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portret`
--

LOCK TABLES `portret` WRITE;
/*!40000 ALTER TABLE `portret` DISABLE KEYS */;
INSERT INTO `portret` VALUES (5,'NzU2N2IzZWYxZTc0NmI5Nz','photos/NzU2N2IzZWYxZTc0NmI5Nz.jpg'),(6,'NWJjYTEwNDFiYzVjZTNhMj','photos/NWJjYTEwNDFiYzVjZTNhMj.jpg'),(7,'ZDkwNjU1NDM3MjYyOTdjZG','photos/ZDkwNjU1NDM3MjYyOTdjZG.jpg');
/*!40000 ALTER TABLE `portret` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(5) NOT NULL,
  `value` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES (0,'en','vuu',1,'first'),(1,'en','vuu',2,'first'),(2,'en','vuu',1,'second'),(3,'en','vuu',2,'second'),(4,'en','vuu',3,'second'),(5,'en','vuu',4,'second'),(6,'en','vuu',5,'second'),(7,'en','vuu',0,'second'),(8,'en',' vuu ',0,'thrid'),(9,'en',' vudfdfdu ',1,'thrid'),(10,'en','vuu',2,'thrid'),(11,'en','vuu',3,'thrid'),(12,'en','vuu',4,'thrid'),(13,'en','vuu',5,'thrid'),(14,'en',' vuu  &#8364;',6,'thrid'),(15,'en','Premium',0,'last'),(16,'en','vuu',1,'last'),(17,'en','vuu',2,'last'),(18,'en','vuu',22,'last'),(19,'en','vuu',4,'last'),(20,'en','vuu',5,'last'),(21,'en','500 &#8364;',6,'last'),(22,'en','say hello!',1,'pharagraph'),(23,'en','vuu232323',2,'pharagraph'),(24,'en','vuu',3,'pharagraph'),(25,'en','vuu',4,'pharagraph');
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revietimed`
--

DROP TABLE IF EXISTS `revietimed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revietimed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revietimed`
--

LOCK TABLES `revietimed` WRITE;
/*!40000 ALTER TABLE `revietimed` DISABLE KEYS */;
/*!40000 ALTER TABLE `revietimed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `link` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Alena&Max','en','photos/otziv.jpg','Best moment of my life','email','number'),(3,'Ð”Ð¼Ð¸Ñ‚Ñ€Ð¸Ð¹','en','photos/YmQ5MDc2Njlm.jpg','hey, bro!','henhooky@gmail.com','-79999999'),(4,'rivieTImed_name','','photos/ZjJlY2VlZjcw.jpg','rivieTImed_content','rivieTImed_email','789999999'),(5,'Ð”Ð¼Ð¸Ñ‚Ñ€Ð¸Ð¹','en','photos/MjFlOGQxNDJm.jpg','some review','henhooky@gmail.com','-79999999');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rusification`
--

DROP TABLE IF EXISTS `rusification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rusification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rusification`
--

LOCK TABLES `rusification` WRITE;
/*!40000 ALTER TABLE `rusification` DISABLE KEYS */;
INSERT INTO `rusification` VALUES (1,'about_site','en','Photographer in Cyprus'),(2,'about_me','en','I am a photographer living in Cyprus and love to capture the best moment of your life.');
/*!40000 ALTER TABLE `rusification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_net`
--

DROP TABLE IF EXISTS `social_net`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_net` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_net`
--

LOCK TABLES `social_net` WRITE;
/*!40000 ALTER TABLE `social_net` DISABLE KEYS */;
INSERT INTO `social_net` VALUES (1,'phone_number','+79999998888'),(2,'mywed','#'),(3,'instagram','#'),(4,'facebook','#'),(5,'vk','#');
/*!40000 ALTER TABLE `social_net` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin-code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_list`
--

LOCK TABLES `user_list` WRITE;
/*!40000 ALTER TABLE `user_list` DISABLE KEYS */;
INSERT INTO `user_list` VALUES (1,'root','$2y$10$YWY4OWU4NGYyZjM0N2E4M.ESTlVp/4LtrDoRPVPw85QZ2Yk6FFvYm','$2y$10$ZTY1ZmVlN2IxZjNiOGVhMe5Y1ESOCBsf4oVYD15Rt36zMeIa4hV8u');
/*!40000 ALTER TABLE `user_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-12 19:13:03
