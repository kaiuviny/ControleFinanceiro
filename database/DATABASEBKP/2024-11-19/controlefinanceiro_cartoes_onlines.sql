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
-- Table structure for table `cartoes_onlines`
--

DROP TABLE IF EXISTS `cartoes_onlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartoes_onlines` (
  `id_cartao_online` int(11) NOT NULL AUTO_INCREMENT,
  `cartao_id` int(11) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `vencimento` varchar(4) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `cpf` varchar(16) NOT NULL,
  `nome_titular_impresso` varchar(255) NOT NULL,
  `funcao_debito` enum('Y','N') NOT NULL DEFAULT 'N',
  `funcao_credito` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_cartao_online`,`cartao_id`),
  KEY `fk_cartoes_onlines_cartoes1_idx` (`cartao_id`),
  CONSTRAINT `fk_cartoes_onlines_cartoes1` FOREIGN KEY (`cartao_id`) REFERENCES `cartoes` (`id_cartao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartoes_onlines`
--

LOCK TABLES `cartoes_onlines` WRITE;
/*!40000 ALTER TABLE `cartoes_onlines` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartoes_onlines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-19 19:24:59
