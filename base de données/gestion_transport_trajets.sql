-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: gestion_transport
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trajets` (
  `ID_trajet` int(11) NOT NULL AUTO_INCREMENT,
  `ID_client` int(11) NOT NULL,
  `ID_entreprise` int(11) NOT NULL,
  `ID_dépôt_départ` int(11) NOT NULL,
  `ID_dépôt_arrivée` int(11) NOT NULL,
  `Date_départ` date NOT NULL,
  `Date_arrivée` date NOT NULL,
  `Heure_départ` time NOT NULL,
  `Heure_arrivée` time NOT NULL,
  `Distance_trajet` int(11) NOT NULL,
  `Prix_trajet` float NOT NULL,
  `Statut_trajet` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_trajet`),
  KEY `ID_client` (`ID_client`),
  KEY `ID_entreprise` (`ID_entreprise`),
  KEY `ID_dépôt_départ` (`ID_dépôt_départ`),
  KEY `ID_dépôt_arrivée` (`ID_dépôt_arrivée`),
  CONSTRAINT `trajets_ibfk_1` FOREIGN KEY (`ID_client`) REFERENCES `clients` (`ID_client`),
  CONSTRAINT `trajets_ibfk_2` FOREIGN KEY (`ID_entreprise`) REFERENCES `entreprises` (`ID_entreprise`),
  CONSTRAINT `trajets_ibfk_3` FOREIGN KEY (`ID_dépôt_départ`) REFERENCES `dépôts` (`ID_dépôt`),
  CONSTRAINT `trajets_ibfk_4` FOREIGN KEY (`ID_dépôt_arrivée`) REFERENCES `dépôts` (`ID_dépôt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trajets`
--

LOCK TABLES `trajets` WRITE;
/*!40000 ALTER TABLE `trajets` DISABLE KEYS */;
/*!40000 ALTER TABLE `trajets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-30 16:23:06
