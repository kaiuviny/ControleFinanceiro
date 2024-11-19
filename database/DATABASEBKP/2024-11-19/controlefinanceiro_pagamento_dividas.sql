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
-- Table structure for table `pagamento_dividas`
--

DROP TABLE IF EXISTS `pagamento_dividas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento_dividas` (
  `id_pagamento_dividas` int(11) NOT NULL AUTO_INCREMENT,
  `minha_divida_id` int(11) NOT NULL,
  `forma_pagamento_id` int(11) NOT NULL,
  `cartoao_id` int(11) NOT NULL,
  `mes_id` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `numero_parcela_paga` int(11) NOT NULL,
  `valor_desconto` double(6,2) DEFAULT 0.00,
  `valor_juros` double(6,2) DEFAULT 0.00,
  `valor_encargos` double(6,2) DEFAULT 0.00,
  `valor_multa` double(6,2) DEFAULT 0.00,
  `valor_pago` double(6,2) NOT NULL DEFAULT 0.00,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `observacao` varchar(255) DEFAULT NULL,
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pagamento_dividas`,`minha_divida_id`,`forma_pagamento_id`,`cartoao_id`,`mes_id`,`ano`,`numero_parcela_paga`),
  KEY `fk_pagamento_dividas_minhas_dividas1_idx` (`minha_divida_id`),
  KEY `fk_pagamento_dividas_mes1_idx` (`mes_id`),
  KEY `fk_pagamento_dividas_cartoes1_idx` (`cartoao_id`),
  CONSTRAINT `fk_pagamento_dividas_cartoes1` FOREIGN KEY (`cartoao_id`) REFERENCES `cartoes` (`id_cartao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_dividas_mes1` FOREIGN KEY (`mes_id`) REFERENCES `meses` (`id_mes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_dividas_minhas_dividas1` FOREIGN KEY (`minha_divida_id`) REFERENCES `dividas` (`id_minha_divida`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamento_dividas`
--

LOCK TABLES `pagamento_dividas` WRITE;
/*!40000 ALTER TABLE `pagamento_dividas` DISABLE KEYS */;
INSERT INTO `pagamento_dividas` VALUES (1,4,2,0,4,2024,1,0.00,0.00,0.00,0.00,100.00,'2024-04-25 12:38:29','pagamento entrada parcela numero 1','kaiuviny','2024-10-08 13:55:43'),(2,4,2,0,7,2024,2,0.00,0.00,0.00,5.58,284.57,'2024-07-30 12:39:22','parcela numero 2','kaiuviny','2024-10-08 13:55:43'),(4,7,3,4,9,2024,1,0.00,0.00,0.00,0.00,344.07,'2024-09-18 21:38:01',NULL,'kaiuviny','2024-09-18 21:38:01'),(5,1,3,4,8,2024,1,0.00,0.00,0.00,0.00,2417.94,'2024-08-20 21:38:01','QUITADO','kaiuviny','2024-09-19 15:26:13'),(6,6,3,4,6,2024,1,0.00,0.00,0.00,0.00,56.60,'2024-09-18 21:40:50','QUITADO','kaiuviny','2024-09-18 21:40:50'),(9,121,3,4,1,2024,1,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(10,121,3,4,2,2024,2,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(11,121,3,4,3,2024,3,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(12,121,3,4,4,2024,4,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(13,121,3,4,5,2024,5,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(14,121,3,4,6,2024,6,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(15,121,3,4,7,2024,7,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:32:57'),(16,121,3,4,9,2024,9,0.00,0.00,0.00,0.00,149.51,'2024-09-19 15:32:57',NULL,'kaiuviny','2024-09-19 15:33:10'),(17,3,3,2,3,2024,1,0.00,0.00,0.00,0.00,2940.88,'2024-03-11 21:44:58','pagando renegociacao','kaiuviny','2024-09-25 23:35:47'),(18,2,3,2,4,2024,1,0.00,0.00,50.71,0.00,1650.77,'2024-04-18 22:01:45','Primeira parcela','kaiuviny','2024-09-25 23:26:45'),(19,2,3,2,4,2024,2,0.00,0.00,0.00,0.00,1585.24,'2024-04-18 22:01:45','Segunda parcela pago com emprestimo feito','kaiuviny','2024-09-25 23:29:02'),(20,2,3,2,5,2024,3,0.00,0.00,0.00,0.00,1591.96,'2024-05-31 21:03:12','terceira paga com o salario','kaiuviny','2024-09-25 23:29:02'),(21,2,3,2,6,2024,4,0.00,0.00,70.72,0.00,1690.24,'2024-09-09 20:51:02','QUARTA PAGA QUANDO VOLTADO A TRABALHAR','kaiuviny','2024-11-06 22:28:37'),(22,3,3,2,4,2024,2,0.00,0.00,9.16,0.00,2950.04,'2024-04-18 19:34:12','pagando segunda parcela renegociacao','kaiuviny','2024-09-25 23:35:47'),(23,3,3,2,5,2024,3,0.00,0.00,14.17,0.00,2955.05,'2024-09-09 21:44:58','pagan terceira da renegociacao','kaiuviny','2024-09-25 23:35:47'),(24,4,2,0,8,2024,3,0.00,0.00,0.00,5.58,284.57,'2024-08-30 12:39:22','parcela numero 3','kaiuviny','2024-10-08 13:55:43'),(25,4,2,0,9,2024,4,0.00,0.00,0.00,5.58,284.57,'2024-09-30 12:39:22','parcela numero 4','kaiuviny','2024-10-08 13:55:43'),(26,4,2,0,10,2024,5,0.00,0.00,0.00,5.58,284.57,'2024-10-08 13:55:43','parcela numero 5','kaiuviny','2024-10-08 13:55:43'),(27,2,3,0,7,2024,5,0.00,0.00,0.00,0.00,1750.00,'2024-10-30 13:55:43','parcela numero 5','kaiuviny','2024-11-06 22:28:37'),(28,2,3,0,8,2024,6,0.00,0.00,0.00,0.00,1750.00,'2024-10-30 13:55:43','parcela numero 6','kaiuviny','2024-11-06 22:28:37'),(29,2,3,0,9,2024,7,0.00,0.00,0.00,0.00,1750.00,'2024-10-30 13:55:43','parcela numero 7','kaiuviny','2024-11-06 22:28:37'),(30,2,3,0,10,2024,8,0.00,0.00,0.00,0.00,1750.00,'2024-10-30 13:55:43','parcela numero 8','kaiuviny','2024-11-06 22:28:37'),(31,126,3,0,10,2024,1,0.00,0.00,0.00,56.42,1037.88,'2024-10-30 13:55:43','parcela 1 sinal','kaiuviny','2024-11-06 22:31:30');
/*!40000 ALTER TABLE `pagamento_dividas` ENABLE KEYS */;
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
