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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento_despesas_fixas`
--

LOCK TABLES `pagamento_despesas_fixas` WRITE;
/*!40000 ALTER TABLE `pagamento_despesas_fixas` DISABLE KEYS */;
INSERT INTO `pagamento_despesas_fixas` VALUES (1,1,5,2024,49.90,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(2,3,5,2024,284.50,'2024-05-20','kaiuviny','2024-09-12 02:41:16'),(3,4,5,2024,80.00,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(4,5,8,2024,109.90,'2024-05-20','kaiuviny','2024-08-19 00:21:32'),(5,6,5,2024,100.00,'2024-05-20','kaiuviny','2024-08-19 00:16:05'),(6,7,8,2024,900.00,'2024-05-20','kaiuviny','2024-08-19 00:21:32'),(7,8,5,2024,500.00,'2024-05-30','kaiuviny','2024-08-19 00:16:05'),(8,9,5,2024,300.00,'2024-05-30','kaiuviny','2024-08-19 00:16:05'),(9,10,9,2024,344.50,'2024-09-11','kaiuviny','2024-10-17 11:58:14'),(10,5,10,2024,119.90,'2024-10-17','kaiuviny','2024-10-17 11:58:45'),(11,6,10,2024,100.00,'2024-10-17','kaiuviny','2024-10-17 11:59:17');
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

-- Dump completed on 2024-11-02 15:48:08
