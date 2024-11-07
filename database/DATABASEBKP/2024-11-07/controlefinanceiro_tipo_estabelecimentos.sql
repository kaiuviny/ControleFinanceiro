CREATE DATABASE  IF NOT EXISTS `controlefinanceiro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `controlefinanceiro`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: controlefinanceiro
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `tipo_estabelecimentos`
--

DROP TABLE IF EXISTS `tipo_estabelecimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estabelecimentos` (
  `id_tipo_estabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_estabelecimento` varchar(45) NOT NULL,
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_tipo_estabelecimento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_estabelecimentos`
--

LOCK TABLES `tipo_estabelecimentos` WRITE;
/*!40000 ALTER TABLE `tipo_estabelecimentos` DISABLE KEYS */;
INSERT INTO `tipo_estabelecimentos` VALUES (1,'MERCADO','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(2,'LOJA COMERCIAL','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(3,'FAST FOOD','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(4,'LANCHONETE','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(5,'BAR','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(6,'SHOPPING','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(7,'POSTO DE GASOLINA','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(8,'PEDAGIO','2024-09-12 03:31:35','kaiuviny','2024-09-12 03:31:35'),(9,'PADARIA','2024-09-12 03:34:02','kaiuviny','2024-09-12 03:34:02');
/*!40000 ALTER TABLE `tipo_estabelecimentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-07  7:09:32
