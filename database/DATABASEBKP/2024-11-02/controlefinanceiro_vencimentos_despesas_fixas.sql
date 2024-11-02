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
-- Table structure for table `vencimentos_despesas_fixas`
--

DROP TABLE IF EXISTS `vencimentos_despesas_fixas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vencimentos_despesas_fixas` (
  `id_vencimentos_despesas_fixas` int(11) NOT NULL AUTO_INCREMENT,
  `minha_depesa_fixa_id` int(11) NOT NULL,
  `dia_mes_vencimento` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_vencimentos_despesas_fixas`,`minha_depesa_fixa_id`),
  KEY `fk_vencimentos_despesas_fixas_minhas_depesas_fixas1_idx` (`minha_depesa_fixa_id`),
  CONSTRAINT `fk_vencimentos_despesas_fixas_minhas_depesas_fixas1` FOREIGN KEY (`minha_depesa_fixa_id`) REFERENCES `despesas_fixas` (`id_despesa_fixa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vencimentos_despesas_fixas`
--

LOCK TABLES `vencimentos_despesas_fixas` WRITE;
/*!40000 ALTER TABLE `vencimentos_despesas_fixas` DISABLE KEYS */;
INSERT INTO `vencimentos_despesas_fixas` VALUES (1,1,20),(2,2,20),(2,3,20),(4,4,30),(5,5,12),(6,6,15),(7,7,21),(8,8,10),(9,9,10),(10,10,10);
/*!40000 ALTER TABLE `vencimentos_despesas_fixas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-02 15:48:07
