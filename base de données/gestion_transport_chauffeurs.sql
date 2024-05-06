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
-- Table structure for table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chauffeurs` (
  `IDchauffeur` int(11) NOT NULL AUTO_INCREMENT,
  `Nomchauffeur` varchar(255) NOT NULL,
  `Prenomchauffeur` varchar(255) NOT NULL,
  `Adressechauffeur` varchar(255) NOT NULL,
  `Codepostalchauffeur` varchar(10) NOT NULL,
  `Villechauffeur` varchar(255) NOT NULL,
  `Payschauffeur` varchar(255) NOT NULL,
  `Telephonechauffeur` varchar(20) NOT NULL,
  `Emailchauffeur` varchar(255) NOT NULL,
  `Numeropermis` varchar(20) NOT NULL,
  `Dateexpirationpermis` date NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  `urlImage` varchar(255) NOT NULL,
  `statut` varchar(100) NOT NULL,
  PRIMARY KEY (`IDchauffeur`,`Emailchauffeur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chauffeurs`
--

LOCK TABLES `chauffeurs` WRITE;
/*!40000 ALTER TABLE `chauffeurs` DISABLE KEYS */;
INSERT INTO `chauffeurs` VALUES (1,'simmou','soufiane','72 Rue Jean Cavaillès','34080','Montpellier','Allemagne','0783820167','simmou.soufiane4@gmail.com','453262','2024-05-10','$2y$10$pLpToqZXYRjndBoqLwhCYO/b6gths9JM/JM7En5lFlXVYNbUVrvyu','image/','chauffeur occupé'),(2,'simmou','soufiane','72 Rue Jean Cavaillès','34080','MONTPELLIER','Angleterre','0676620057','simmou.soufiane4@gmail.com','453262','2024-04-19','$2y$10$kwhwu0mBzfm03D9nhJJi5OcWWqcY3ZPwP2nGprp.tb/T9ITopN7KC','image/',' est utilisee par ce chauffeur'),(4,'simmou','soufiane','72 Rue Jean Cavaillès','34080','Montpellier','Espagne','0783820167','simmou.soufiane34@gmail.com','3','2024-04-19','$2y$10$gJc6BwtoB.VYkDFEK/jioOfRWTDFfwi3TapZZpoLlWGEGvNfzqH/m','image/','aucun camion a disposition');
/*!40000 ALTER TABLE `chauffeurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `gestion_transport`.`chauffeurs_AFTER_INSERT` AFTER INSERT ON `chauffeurs` FOR EACH ROW
BEGIN
insert into gestion_transport_log.log(timestamp,action,description)
values (now(),'ajouter',concat('chauffeur ajouter est l\'ID ', new.IDchauffeur));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `gestion_transport`.`chauffeurs_AFTER_UPDATE` AFTER UPDATE ON `chauffeurs` FOR EACH ROW
BEGIN
insert into gestion_transport_log.log(timestamp,action,description)
values (now(),'modifier',concat('chauffeur modifier est l\'ID ', new.IDchauffeur));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `gestion_transport`.`chauffeurs_AFTER_DELETE` AFTER DELETE ON `chauffeurs` FOR EACH ROW
BEGIN
insert into gestion_transport_log.log(timestamp,action,description)
values (now(),'supprimer',concat('chauffeur supprimer est l\'ID ', old.IDchauffeur));
END */;;
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

-- Dump completed on 2024-04-30 16:23:06
