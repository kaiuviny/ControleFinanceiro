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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `tipo_despesas` enum('N','F','V') NOT NULL DEFAULT 'N',
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Casa','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(2,'Profissional','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(3,'Assinatura','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(4,'Farmácia e Saúde','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(5,'Mercado','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(6,'Transporte','F','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(7,'Restaurante','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(8,'Shopping','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(9,'Lazer','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(10,'Festa','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(11,'Profissional','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(12,'Ifood','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(13,'Uber','V','2024-04-29 22:31:39','kaiuviny','2024-04-29 22:31:39','Y'),(14,'Viagem','V','2024-04-29 22:35:01','kaiuviny','2024-04-29 22:35:01','Y'),(15,'Educação','F','2024-04-29 22:35:01','kaiuviny','2024-04-29 22:35:01','Y'),(16,'Cursos','V','2024-04-29 22:35:01','kaiuviny','2024-04-29 22:35:01','Y'),(17,'Lazer','F','2024-05-20 15:18:03','kaiuviny','2024-05-20 15:18:03','Y');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-19 19:24:58
