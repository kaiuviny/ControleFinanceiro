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
-- Table structure for table `despesas_fixas`
--

DROP TABLE IF EXISTS `despesas_fixas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesas_fixas` (
  `id_despesa_fixa` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_despesas_fixas_id` int(11) NOT NULL,
  `codigo_grupo_usuarios` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `estabelecimento` varchar(45) NOT NULL,
  `site` varchar(255) DEFAULT NULL,
  `data_inicial` date NOT NULL DEFAULT current_timestamp(),
  `valor` double(6,2) NOT NULL,
  `juros_por_dia_atraso` double(3,2) DEFAULT 1.10,
  `encargos` double(3,2) DEFAULT 5.00,
  `multa_atraso` double(3,2) DEFAULT 8.90,
  `desconto_por_dia_adiantado` double(3,2) DEFAULT 0.20,
  `datetime_cretate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'nope',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_despesa_fixa`,`categoria_despesas_fixas_id`),
  KEY `fk_minhas_depesas_fixas_categoria_despesas_fixas_idx` (`categoria_despesas_fixas_id`),
  CONSTRAINT `fk_minhas_depesas_fixas_categoria_despesas_fixas` FOREIGN KEY (`categoria_despesas_fixas_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesas_fixas`
--

LOCK TABLES `despesas_fixas` WRITE;
/*!40000 ALTER TABLE `despesas_fixas` DISABLE KEYS */;
INSERT INTO `despesas_fixas` VALUES (1,3,'1','XBOX Cloud','MICROSOFT',NULL,'2024-05-20',49.90,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:03','Y'),(2,1,'1','IPTU','P.M.MK',NULL,'2024-05-20',46.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:05','Y'),(3,1,'1','Energia Eletrica','CPFL',NULL,'2024-05-20',284.50,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:07','Y'),(4,1,'1','Agua','SANEAQUA',NULL,'2024-05-30',80.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:08','Y'),(5,1,'1','Plano Internet 750 Mpbs','VERO',NULL,'2024-05-12',109.90,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:10','Y'),(6,17,'1','Mensalidade CASM','CASM',NULL,'2024-05-15',100.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:11','Y'),(7,1,'1','Aluguel de Casa','GIOVANNI',NULL,'2024-05-21',900.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:11','Y'),(8,15,'1','Mensalidade Escola Sesi','SESI',NULL,'2024-05-10',500.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:13','Y'),(9,15,'1','Transporte VAN Escola Sesi','GALO',NULL,'2024-05-10',300.00,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:12','Y'),(10,15,'1','Faculdade de Engenharia de Software','UNIASSELVI',NULL,'2024-05-10',348.00,NULL,5.00,NULL,5.00,'2024-08-18 17:16:43','kaiuviny','2024-09-12 02:35:01','Y'),(11,1,'1','Plano Claro Chip Pré-Pago','CLARO','https://minhaclaro.claro.com.br/mcpf/index.html#.html/faturas/minhas-faturas','2024-02-03',25.41,NULL,5.00,NULL,NULL,'2024-08-18 17:16:43','kaiuviny','2024-08-15 19:25:14','Y');
/*!40000 ALTER TABLE `despesas_fixas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-02 15:48:10
