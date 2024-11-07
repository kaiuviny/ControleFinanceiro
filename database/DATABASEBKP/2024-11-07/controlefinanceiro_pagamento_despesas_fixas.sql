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
-- Table structure for table `pagamento_despesas_fixas`
--

DROP TABLE IF EXISTS `pagamento_despesas_fixas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento_despesas_fixas` (
  `id_pagamento_despesa_fixa` int(11) NOT NULL AUTO_INCREMENT,
  `despesa_fixa_id` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ano` int(4) NOT NULL DEFAULT 2024,
  `valor_pago` double(6,2) NOT NULL DEFAULT 0.00,
  `data_pagamento` date NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pagamento_despesa_fixa`,`despesa_fixa_id`,`mes_id`,`ano`),
  KEY `fk_pagamento_despesas_mes1_idx` (`mes_id`),
  CONSTRAINT `fk_pagamento_despesas_mes1` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id_mes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento_despesas_fixas`
--

LOCK TABLES `pagamento_despesas_fixas` WRITE;
/*!40000 ALTER TABLE `pagamento_despesas_fixas` DISABLE KEYS */;
INSERT INTO `pagamento_despesas_fixas` VALUES (1,1,5,2024,49.90,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(2,3,4,2024,284.50,'2024-05-20','kaiuviny','2024-11-06 21:57:39'),(3,4,5,2024,80.00,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(4,5,8,2024,109.90,'2024-07-20','kaiuviny','2024-11-06 22:03:10'),(5,6,5,2024,100.00,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(6,7,8,2024,900.00,'2024-08-20','kaiuviny','2024-11-06 22:04:21'),(7,8,5,2024,500.00,'2024-05-30','kaiuviny','2024-08-19 00:16:05'),(8,9,5,2024,300.00,'2024-05-30','kaiuviny','2024-08-19 00:16:05'),(9,10,9,2024,344.50,'2024-09-11','kaiuviny','2024-10-17 11:58:14'),(10,5,10,2024,119.90,'2024-10-05','kaiuviny','2024-11-06 22:01:55'),(11,6,10,2024,100.00,'2024-10-17','kaiuviny','2024-10-17 11:59:17'),(12,6,10,2024,120.00,'2024-11-06','kaiuviny','2024-11-06 21:42:52'),(13,6,11,2024,100.00,'2024-11-06','kaiuviny','2024-11-06 21:42:52'),(14,6,6,2024,100.00,'2024-05-20','kaiuviny','2024-11-06 21:46:13'),(15,6,7,2024,100.00,'2024-06-20','kaiuviny','2024-11-06 21:46:13'),(16,6,8,2024,100.00,'2024-07-20','kaiuviny','2024-11-06 21:46:13'),(17,6,9,2024,100.00,'2024-08-20','kaiuviny','2024-11-06 21:46:13'),(18,12,5,2024,35.00,'2024-04-20','kaiuviny','2024-11-06 21:46:13'),(19,12,6,2024,35.00,'2024-05-20','kaiuviny','2024-11-06 21:46:13'),(20,12,7,2024,35.00,'2024-06-20','kaiuviny','2024-11-06 21:46:13'),(21,12,8,2024,35.00,'2024-11-06','kaiuviny','2024-11-06 21:46:13'),(22,12,9,2024,35.00,'2024-11-06','kaiuviny','2024-11-06 21:46:13'),(23,12,10,2024,35.00,'2024-11-06','kaiuviny','2024-11-06 21:46:13'),(24,12,11,2024,35.00,'2024-11-06','kaiuviny','2024-11-06 21:46:13'),(25,3,11,2023,360.80,'2023-11-20','kaiuviny','2024-11-06 21:57:39'),(26,3,12,2023,316.27,'2023-12-20','kaiuviny','2024-11-06 21:57:39'),(27,3,1,2024,319.31,'2024-01-20','kaiuviny','2024-11-06 21:57:39'),(28,3,2,2024,270.25,'2024-02-20','kaiuviny','2024-11-06 21:57:39'),(29,3,3,2024,351.10,'2024-03-20','kaiuviny','2024-11-06 21:57:39'),(30,3,5,2024,338.68,'2024-05-20','kaiuviny','2024-11-06 21:57:39'),(31,3,6,2024,389.71,'2024-06-20','kaiuviny','2024-11-06 21:57:39'),(32,3,7,2024,362.92,'2024-07-20','kaiuviny','2024-11-06 21:57:39'),(33,3,8,2024,365.76,'2024-08-20','kaiuviny','2024-11-06 21:57:39'),(34,3,9,2024,351.85,'2024-09-20','kaiuviny','2024-11-06 21:57:39'),(35,3,10,2024,319.71,'2024-11-06','kaiuviny','2024-11-06 21:57:39'),(36,3,11,2024,364.34,'2024-11-20','kaiuviny','2024-11-06 21:57:39'),(37,3,12,2024,290.00,'2024-12-20','kaiuviny','2024-11-06 21:57:39'),(43,4,6,2024,119.00,'2024-06-30','kaiuviny','2024-11-06 22:00:53'),(44,4,7,2024,120.00,'2024-07-30','kaiuviny','2024-11-06 22:00:53'),(45,4,8,2024,105.00,'2024-08-20','kaiuviny','2024-11-06 22:00:53'),(46,4,9,2024,73.10,'2024-11-06','kaiuviny','2024-11-06 22:00:53'),(47,5,9,2024,119.90,'2024-09-05','kaiuviny','2024-11-06 22:01:55'),(48,5,11,2024,119.90,'2024-11-06','kaiuviny','2024-11-06 22:01:55'),(49,5,5,2024,109.90,'2024-05-01','kaiuviny','2024-11-06 22:03:10'),(50,5,6,2024,109.90,'2024-06-01','kaiuviny','2024-11-06 22:03:10'),(51,5,7,2024,109.90,'2024-07-01','kaiuviny','2024-11-06 22:03:10'),(52,7,5,2024,900.00,'2024-05-20','kaiuviny','2024-11-06 22:04:21'),(53,7,6,2024,900.00,'2024-06-20','kaiuviny','2024-11-06 22:04:21'),(54,7,7,2024,900.00,'2024-07-20','kaiuviny','2024-11-06 22:04:21'),(55,7,9,2024,900.00,'2024-09-20','kaiuviny','2024-11-06 22:04:21'),(56,7,10,2024,900.00,'2024-10-20','kaiuviny','2024-11-06 22:04:21'),(57,8,6,2024,500.00,'2024-06-30','kaiuviny','2024-11-06 22:06:07'),(58,8,7,2024,500.00,'2024-07-30','kaiuviny','2024-11-06 22:06:07'),(59,8,8,2024,500.00,'2024-08-15','kaiuviny','2024-11-06 22:06:07'),(60,8,9,2024,500.00,'2024-09-15','kaiuviny','2024-11-06 22:06:07'),(62,9,6,2024,300.00,'2024-06-15','kaiuviny','2024-11-06 22:12:36'),(63,9,7,2024,300.00,'2024-07-15','kaiuviny','2024-11-06 22:12:36'),(64,9,8,2024,300.00,'2024-08-20','kaiuviny','2024-11-06 22:12:36'),(65,9,9,2024,300.00,'2024-09-15','kaiuviny','2024-11-06 22:12:36'),(66,9,10,2024,300.00,'2024-11-06','kaiuviny','2024-11-06 22:12:36'),(67,9,11,2024,300.00,'2024-11-06','kaiuviny','2024-11-06 22:12:36'),(68,11,2,2024,26.90,'2024-01-20','kaiuviny','2024-11-06 22:14:57'),(69,11,3,2024,26.90,'2024-02-20','kaiuviny','2024-11-06 22:14:57'),(70,11,4,2024,26.90,'2024-03-20','kaiuviny','2024-11-06 22:14:57'),(71,11,5,2024,26.90,'2024-04-20','kaiuviny','2024-11-06 22:14:57'),(72,11,6,2024,26.90,'2024-05-20','kaiuviny','2024-11-06 22:14:57'),(73,11,7,2024,26.90,'2024-06-20','kaiuviny','2024-11-06 22:14:57'),(74,11,8,2024,26.90,'2024-07-20','kaiuviny','2024-11-06 22:14:57'),(75,11,9,2024,26.90,'2024-08-20','kaiuviny','2024-11-06 22:14:57'),(76,11,10,2024,26.90,'2024-10-20','kaiuviny','2024-11-06 22:14:57'),(77,11,11,2024,29.90,'2024-10-20','kaiuviny','2024-11-06 22:14:57'),(78,13,8,2024,33.33,'2024-08-05','kaiuviny','2024-11-06 22:19:17'),(79,13,9,2024,33.33,'2024-08-05','kaiuviny','2024-11-06 22:19:17'),(80,13,10,2024,33.33,'2024-08-05','kaiuviny','2024-11-06 22:19:17'),(81,13,11,2024,33.33,'2024-11-06','kaiuviny','2024-11-06 22:19:17'),(82,13,12,2024,33.33,'2024-11-06','kaiuviny','2024-11-06 22:19:17'),(83,13,1,2025,33.33,'2024-11-06','kaiuviny','2024-11-06 22:19:17');
/*!40000 ALTER TABLE `pagamento_despesas_fixas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-07  7:09:28
