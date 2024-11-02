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
-- Table structure for table `cartoes`
--

DROP TABLE IF EXISTS `cartoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartoes` (
  `id_cartao` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `numero` varchar(16) NOT NULL,
  `vencimento` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `funcao_debito` enum('Y','N') NOT NULL DEFAULT 'Y',
  `funcao_credito` varchar(45) NOT NULL DEFAULT 'Y',
  `limite_credito` double(6,2) NOT NULL DEFAULT 0.00,
  `limite_cheque_especial` double(6,2) DEFAULT 0.00,
  `dia_vencimento_fatura` date NOT NULL,
  `cartao_principal` enum('Y','N') NOT NULL DEFAULT 'N',
  `encargos` double(6,2) DEFAULT NULL,
  `multa` double(6,2) DEFAULT NULL,
  `juros` double(6,2) DEFAULT NULL,
  `datetime_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_cartao`,`pessoa_id`,`banco_id`),
  KEY `fk_cartoes_pessoas1_idx` (`pessoa_id`),
  KEY `fk_cartoes_bancos1_idx` (`banco_id`),
  CONSTRAINT `fk_cartoes_bancos1` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id_banco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cartoes_pessoas1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartoes`
--

LOCK TABLES `cartoes` WRITE;
/*!40000 ALTER TABLE `cartoes` DISABLE KEYS */;
INSERT INTO `cartoes` VALUES (0,1,0,' Sem Cartão','0','9999-12-31','0','N','N',0.00,0.00,'9999-12-31','N',0.00,0.00,0.00,'2024-08-14 20:02:09','kaiuviny','2024-08-15 02:48:03','Y'),(1,3,260,'Nubank Zelly','5162922866585886','2032-05-01','283','Y','Y',4500.00,0.00,'2024-01-24','N',0.00,0.00,0.00,'2024-08-14 20:02:09','kaiuviny','2024-08-19 00:29:03','Y'),(2,3,368,'Carrefour Zelly','5162922866585886','2032-05-01','283','Y','Y',7000.00,0.00,'2024-01-24','N',0.00,0.00,0.00,'2024-08-14 20:02:09','kaiuviny','2024-08-19 00:29:03','Y'),(4,1,368,'PicPay Caio','2227632213811055','2030-12-01','999','Y','Y',4100.00,0.00,'2024-01-10','Y',0.00,0.00,0.00,'2024-08-19 00:29:03','kaiuviny','2024-09-12 03:11:08','Y'),(5,1,1,'Alelo Alimentação','1111111111111111','2030-12-01','111','Y','Y',1150.00,0.00,'2024-01-01','N',0.00,0.00,0.00,'2024-09-12 03:11:08','kaiuviny','2024-09-12 03:11:14','Y'),(6,1,1,'Alelo Refeição','111111111111111','2030-12-01','111','Y','Y',615.00,0.00,'0000-00-00','N',0.00,0.00,0.00,'2024-09-12 03:11:08','kaiuviny','2024-09-12 03:11:14','Y');
/*!40000 ALTER TABLE `cartoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-02 15:48:11
