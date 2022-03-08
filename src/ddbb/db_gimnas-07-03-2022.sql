-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: db_gimnas
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `activitat`
--

DROP TABLE IF EXISTS `activitat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activitat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `descripcio` varchar(255) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `durada_sessio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat`
--

LOCK TABLES `activitat` WRITE;
/*!40000 ALTER TABLE `activitat` DISABLE KEYS */;
INSERT INTO `activitat` VALUES (1,'Body pump','','vermell',60),(2,'Cycling','','vermell',45),(3,'Zumba','','blau',30),(4,'Pilates','','blau',30),(5,'Yoga','','taronja',45),(6,'Body Combat','','verd',45),(7,'Crossfit','','taronja',60),(8,'Body balance','','verd',60);
/*!40000 ALTER TABLE `activitat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitat_colectiva`
--

DROP TABLE IF EXISTS `activitat_colectiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activitat_colectiva` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `activitat_colectiva_ibfk_1` FOREIGN KEY (`id`) REFERENCES `activitat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_colectiva`
--

LOCK TABLES `activitat_colectiva` WRITE;
/*!40000 ALTER TABLE `activitat_colectiva` DISABLE KEYS */;
INSERT INTO `activitat_colectiva` VALUES (1),(3),(7),(8);
/*!40000 ALTER TABLE `activitat_colectiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitat_lliure`
--

DROP TABLE IF EXISTS `activitat_lliure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activitat_lliure` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `activitat_lliure_ibfk_1` FOREIGN KEY (`id`) REFERENCES `activitat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_lliure`
--

LOCK TABLES `activitat_lliure` WRITE;
/*!40000 ALTER TABLE `activitat_lliure` DISABLE KEYS */;
INSERT INTO `activitat_lliure` VALUES (2),(4),(5),(6);
/*!40000 ALTER TABLE `activitat_lliure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alta`
--

DROP TABLE IF EXISTS `alta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alta`
--

LOCK TABLES `alta` WRITE;
/*!40000 ALTER TABLE `alta` DISABLE KEYS */;
INSERT INTO `alta` VALUES (1);
/*!40000 ALTER TABLE `alta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `dni` varchar(9) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `cognom` varchar(30) NOT NULL,
  `telefon` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `data_neixement` date NOT NULL,
  `usuari` varchar(20) NOT NULL,
  `contrasenya` varchar(250) NOT NULL,
  `compte_bancari` varchar(24) NOT NULL,
  `condicio` varchar(150) DEFAULT NULL,
  `comunicacio_comercial` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('06317354J','Rosa','Mosqueta',0,'fghfgh@ghj.tf','D','2015-08-08','rosa','1234','ES7030048495015631843452',NULL,0),('08668582C','Joan','Garcia',0,'sdf@ghj.uh','D','1984-10-06','juan','1234','ES8204876961366691772115',NULL,0),('1234567L','Roger','Marin',655656566,'rmarin@gmail.com','H','2003-09-05','rmarin','81dc9bdb52d04dc20036dbd8313ed055','1234567B','',0),('18348822C','Eva','Rever',0,'asdas@ed.cs','D','1994-03-15','eva','1234','ES3501286358664681244662',NULL,0),('62362804Y','Sara','Capa',0,'iouiou@fg.es','D','2018-09-04','sara','1234','ES2204877188296493336369',NULL,0),('63814864F','Marta','Lozano',0,'dfd@ghgh.com','D','1989-02-22','marta','1234','ES7031902998173385885716',NULL,0),('66066267D','sdf','sdf',0,'sdfsdf@hjk.ojk','D','1988-02-28','kkk','1234','ES0821008334146863972929',NULL,0),('828556oP','Pedro','Picapiedra',525896548,'ppiedra@gmail.com','H','1995-04-12','ppp','81dc9bdb52d04dc20036dbd8313ed055','ES522589654','',0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curses`
--

DROP TABLE IF EXISTS `curses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curses`
--

LOCK TABLES `curses` WRITE;
/*!40000 ALTER TABLE `curses` DISABLE KEYS */;
/*!40000 ALTER TABLE `curses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `es_dona`
--

DROP TABLE IF EXISTS `es_dona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `es_dona` (
  `data_alta` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `dni` (`dni`),
  CONSTRAINT `es_dona_ibfk_1` FOREIGN KEY (`id`) REFERENCES `alta` (`id`),
  CONSTRAINT `es_dona_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `client` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `es_dona`
--

LOCK TABLES `es_dona` WRITE;
/*!40000 ALTER TABLE `es_dona` DISABLE KEYS */;
INSERT INTO `es_dona` VALUES ('2022-02-27',NULL,'1234567L',1);
/*!40000 ALTER TABLE `es_dona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `es_fa`
--

DROP TABLE IF EXISTS `es_fa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `es_fa` (
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `num` (`num`),
  CONSTRAINT `es_fa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `activitat` (`id`),
  CONSTRAINT `es_fa_ibfk_2` FOREIGN KEY (`num`) REFERENCES `sala` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `es_fa`
--

LOCK TABLES `es_fa` WRITE;
/*!40000 ALTER TABLE `es_fa` DISABLE KEYS */;
INSERT INTO `es_fa` VALUES ('2022-04-28','16:30:00',10,1),('2022-02-28','18:30:00',11,2),('2022-03-07','16:30:00',12,3),('2022-05-08','18:30:00',13,4),('2022-03-02','16:30:00',14,5),('2022-03-02','18:30:00',15,6),('2022-03-03','16:30:00',16,7),('2022-03-03','18:30:00',17,8);
/*!40000 ALTER TABLE `es_fa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriu`
--

DROP TABLE IF EXISTS `inscriu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscriu` (
  `data_cursa` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dni` (`dni`),
  CONSTRAINT `inscriu_ibfk_1` FOREIGN KEY (`id`) REFERENCES `curses` (`id`),
  CONSTRAINT `inscriu_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `client` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriu`
--

LOCK TABLES `inscriu` WRITE;
/*!40000 ALTER TABLE `inscriu` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitor`
--

DROP TABLE IF EXISTS `monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitor` (
  `dni` varchar(9) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `cognom` varchar(30) NOT NULL,
  `tel_personal` int(9) NOT NULL,
  `tel_fix` int(9) DEFAULT NULL,
  `salari` double NOT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  KEY `num` (`num`),
  CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`num`) REFERENCES `sala` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitor`
--

LOCK TABLES `monitor` WRITE;
/*!40000 ALTER TABLE `monitor` DISABLE KEYS */;
INSERT INTO `monitor` VALUES ('1234567L','Ramon','Martinez',674853448,357375375,2000,10),('4476345R','Eduard','Montero',679474286,583957453,1800,16),('5568954L','Antoni','Pijuan',865642975,847597667,2600,15),('5687549R','Marta','Ruiz',694283383,846864648,1400,11),('5754345O','Xavi','Castells',683275794,794382575,2300,14),('5869584P','Laia','Alvarez',639853745,38697386,1200,13),('6786576P','Anna','Bofarull',684733485,679457956,2400,17),('6865456W','Raquel','Puig',678509465,947479479,2300,12);
/*!40000 ALTER TABLE `monitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_colectiva`
--

DROP TABLE IF EXISTS `reserva_colectiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva_colectiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `anulada` tinyint(1) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `id_act` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_act` (`id_act`),
  KEY `dni` (`dni`),
  CONSTRAINT `reserva_colectiva_ibfk_1` FOREIGN KEY (`id_act`) REFERENCES `activitat` (`id`),
  CONSTRAINT `reserva_colectiva_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `client` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_colectiva`
--

LOCK TABLES `reserva_colectiva` WRITE;
/*!40000 ALTER TABLE `reserva_colectiva` DISABLE KEYS */;
INSERT INTO `reserva_colectiva` VALUES (23,'2022-04-28','16:30:00',1,'1234567L',1),(73,'2022-04-28','16:30:00',1,'828556oP',1);
/*!40000 ALTER TABLE `reserva_colectiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva_lliure`
--

DROP TABLE IF EXISTS `reserva_lliure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva_lliure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `anulada` tinyint(1) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `id_act` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_act` (`id_act`),
  KEY `dni` (`dni`),
  CONSTRAINT `reserva_lliure_ibfk_1` FOREIGN KEY (`id_act`) REFERENCES `activitat` (`id`),
  CONSTRAINT `reserva_lliure_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `client` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_lliure`
--

LOCK TABLES `reserva_lliure` WRITE;
/*!40000 ALTER TABLE `reserva_lliure` DISABLE KEYS */;
INSERT INTO `reserva_lliure` VALUES (1,'2022-03-01','16:30:00',NULL,'1234567L',2);
/*!40000 ALTER TABLE `reserva_lliure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sala` (
  `num` int(11) NOT NULL,
  `descripcio` varchar(255) DEFAULT NULL,
  `aforament_max` int(11) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (10,'',30),(11,'',15),(12,'',15),(13,'',20),(14,'',10),(15,'',15),(16,'',30),(17,'',20);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_gimnas'
--

--
-- Dumping routines for database 'db_gimnas'
--
/*!50003 DROP PROCEDURE IF EXISTS `anular_reserva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `anular_reserva`(IN _tipus VARCHAR(30), IN _data DATE, IN _hora TIME, IN _dni VARCHAR(9), IN _id_act INT)
BEGIN
	 IF _tipus = 'colectives' 
		THEN 
			UPDATE reserva_colectiva SET anulada = 1 WHERE id_act = _id_act AND `data` = _data AND hora = _hora AND dni = _dni;
     ELSE IF _tipus = 'lliures' 
		THEN 
			UPDATE reserva_lliure SET anulada = 1 WHERE id_act = _id_act AND `data` = _data AND hora = _hora AND dni = _dni;
		END IF;
     END IF;
 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `consultar_persones` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_persones`(IN _tipus VARCHAR(30), IN _data DATE, IN _hora TIME, IN _dni VARCHAR(9), IN _id_act INT)
BEGIN
	 IF _tipus = 'colectives' 
		THEN 
			IF 
				(SELECT count(d.id) as num FROM client a, reserva_colectiva b, activitat c, activitat_colectiva d 
				WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.anulada is null AND a.dni = _dni AND _data IN 
                (SELECT `data` FROM reserva_colectiva WHERE reserva_colectiva.dni = _dni AND reserva_colectiva.anulada is null)) > 0
			THEN
                SELECT "no pots";
			ELSE
				INSERT INTO reserva_colectiva (`data`,`hora`, dni, id_act) 
				VALUES (_data, _hora, _dni, _id_act);
                END IF;
     ELSE IF _tipus = 'lliures' 
		THEN 
			IF
				(SELECT count(d.id) as num FROM client a, reserva_lliure b, activitat c, activitat_lliure d 
				WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.anulada is null AND a.dni = _dni AND _data IN 
                (SELECT `data` FROM reserva_lliure WHERE reserva_lliure.dni = _dni AND reserva_colectiva.anulada is null)) > 0
			THEN
				SELECT "no pots";
			ELSE
				INSERT INTO reserva_lliure (`data`,`hora`, dni, id_act) 
				VALUES (_data, _hora, _dni, _id_act);
			 END IF;
		 END IF;
     END IF;
 END ;;
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

-- Dump completed on 2022-03-07 16:23:23
