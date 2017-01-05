-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: arctl
-- ------------------------------------------------------
-- Server version	5.5.53-0+deb7u1

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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `disp` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `setpoint` float NOT NULL,
  `hist` float NOT NULL,
  `modo` int(11) NOT NULL,
  `pidp` float NOT NULL,
  `pidi` float NOT NULL,
  `pidd` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (2,9,10,22,2.4,1,0,0,0),(3,8,10,25,0.5,1,0,0,0),(4,7,5,10,0.2,5,12,3,3),(6,12,5,5,0,5,20,5,10);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dados`
--

DROP TABLE IF EXISTS `dados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `disp` int(11) NOT NULL,
  `var` int(11) NOT NULL,
  `dado` double NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2197105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados`
--

LOCK TABLES `dados` WRITE;
/*!40000 ALTER TABLE `dados` DISABLE KEYS */;
/*!40000 ALTER TABLE `dados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disp`
--

DROP TABLE IF EXISTS `disp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `disp` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `tipo` int(11) NOT NULL,
  `rssi` int(11) NOT NULL,
  `atu` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disp`
--

LOCK TABLES `disp` WRITE;
/*!40000 ALTER TABLE `disp` DISABLE KEYS */;
INSERT INTO `disp` VALUES (7,0,'chopeira ant','0013A200403B0CC3',1,-34,'2017-01-03 16:52:06',0),(8,2,'teste','0013A20040E5F09E',1,-40,'2016-12-26 19:06:46',0),(9,1,'teste1','0013A20040E5F091',1,-28,'2016-12-27 17:28:22',0),(12,0,'Chopeira','0013A200409B0FF9',1,-46,'2017-01-05 16:08:50',1);
/*!40000 ALTER TABLE `disp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disp_atu`
--

DROP TABLE IF EXISTS `disp_atu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disp_atu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `disp` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disp_atu`
--

LOCK TABLES `disp_atu` WRITE;
/*!40000 ALTER TABLE `disp_atu` DISABLE KEYS */;
INSERT INTO `disp_atu` VALUES (24,7,4);
/*!40000 ALTER TABLE `disp_atu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modo_config`
--

DROP TABLE IF EXISTS `modo_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modo_config` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `modo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modo_config`
--

LOCK TABLES `modo_config` WRITE;
/*!40000 ALTER TABLE `modo_config` DISABLE KEYS */;
INSERT INTO `modo_config` VALUES (1,'Manual'),(2,'Automatico'),(3,'Automatico Aquecimento'),(4,'Automatico Resfriamento'),(5,'PID Resfriamento'),(6,'PID Aquecimento');
/*!40000 ALTER TABLE `modo_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-05 16:17:26
