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
-- Table structure for table `pagamento_despesas_variaveis`
--

DROP TABLE IF EXISTS `pagamento_despesas_variaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento_despesas_variaveis` (
  `id_pagamento_despesa_variavel` int(11) NOT NULL AUTO_INCREMENT,
  `despesa_variavel_id` int(11) NOT NULL,
  `forma_pagamento_id` int(11) NOT NULL,
  `cartao_id` int(11) NOT NULL,
  `valor_pago` double(6,2) NOT NULL DEFAULT 0.00,
  `data_pagamento` date NOT NULL DEFAULT current_timestamp(),
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pagamento_despesa_variavel`,`despesa_variavel_id`,`forma_pagamento_id`,`cartao_id`),
  KEY `fk_pagamento_despesas_variaveis_cartoes1_idx` (`cartao_id`),
  CONSTRAINT `fk_pagamento_despesas_variaveis_cartoes1` FOREIGN KEY (`cartao_id`) REFERENCES `cartoes` (`id_cartao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento_despesas_variaveis`
--

LOCK TABLES `pagamento_despesas_variaveis` WRITE;
/*!40000 ALTER TABLE `pagamento_despesas_variaveis` DISABLE KEYS */;
INSERT INTO `pagamento_despesas_variaveis` VALUES (1,3,3,4,83.90,'2024-08-15','2024-08-19 00:30:10','kaiuviny','2024-09-12 03:36:18'),(2,2,3,4,131.26,'2024-08-17','2024-08-19 00:30:10','kaiuviny','2024-08-19 00:30:10'),(3,1,3,4,72.60,'2024-08-17','2024-08-19 00:30:10','kaiuviny','2024-09-12 03:36:18'),(4,4,3,5,246.26,'2024-09-01','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(5,5,3,5,358.58,'2024-09-01','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(6,6,3,5,59.80,'2024-09-05','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(7,7,3,5,155.43,'2024-09-05','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(8,8,3,5,109.99,'2024-09-05','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(9,9,3,5,149.29,'2024-09-08','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18'),(10,10,3,6,37.90,'2024-09-11','2024-09-12 03:15:48','kaiuviny','2024-09-12 03:36:18');
/*!40000 ALTER TABLE `pagamento_despesas_variaveis` ENABLE KEYS */;
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
