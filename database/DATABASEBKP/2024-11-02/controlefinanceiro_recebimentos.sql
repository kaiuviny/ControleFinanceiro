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
-- Table structure for table `recebimentos`
--

DROP TABLE IF EXISTS `recebimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recebimentos` (
  `id_recebimento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_grupo_usuarios` varchar(45) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `tipo_recebimento_id` int(11) NOT NULL,
  `valor_recebido` double(6,2) NOT NULL DEFAULT 0.00,
  `descricao` double(6,2) NOT NULL DEFAULT 0.00,
  `data_recebimento` date NOT NULL DEFAULT current_timestamp(),
  `datetime_create` timestamp NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_recebimento`,`codigo_grupo_usuarios`,`mes_id`,`ano`,`tipo_recebimento_id`,`pessoa_id`),
  KEY `fk_ganhos_mes1_idx` (`mes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recebimentos`
--

LOCK TABLES `recebimentos` WRITE;
/*!40000 ALTER TABLE `recebimentos` DISABLE KEYS */;
INSERT INTO `recebimentos` VALUES (1,'1',1,8,2024,1,6050.00,0.00,'2024-08-05','2024-08-20 00:12:02','kaiuviny','2024-09-04 14:37:38'),(2,'1',1,8,2024,1,1870.56,0.00,'2024-08-20','2024-08-20 00:12:02','kaiuviny','2024-09-04 14:37:38'),(3,'1',1,9,2024,1,6480.00,0.00,'2024-09-05','2024-09-04 14:37:38','kaiuviny','2024-09-04 14:37:38'),(4,'1',2,9,2024,1,616.00,0.00,'2024-09-01','2024-09-04 14:37:38','kaiuviny','2024-09-09 21:07:30'),(5,'1',2,9,2024,1,1155.00,0.00,'2024-09-09','2024-09-09 21:07:30','kaiuviny','2024-09-09 21:07:30');
/*!40000 ALTER TABLE `recebimentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-02 15:48:12
