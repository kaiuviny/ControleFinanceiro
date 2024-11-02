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
-- Table structure for table `despesas_variaveis`
--

DROP TABLE IF EXISTS `despesas_variaveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesas_variaveis` (
  `id_despesa_variavel` int(11) NOT NULL AUTO_INCREMENT,
  `mes_id` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `categoria_despesas_variaveis_id` int(11) NOT NULL,
  `codigo_grupo_usuarios` varchar(45) NOT NULL,
  `estabelecimento_id` int(11) NOT NULL,
  `tipo_estabelecimento_id` int(11) NOT NULL,
  `observacao_estabelecimento` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) NOT NULL,
  `valor` double(6,2) NOT NULL DEFAULT 0.00,
  `data_utilizada` date NOT NULL DEFAULT current_timestamp(),
  `datetime_cretate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(45) NOT NULL DEFAULT 'kaiuviny',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_despesa_variavel`,`mes_id`,`ano`,`categoria_despesas_variaveis_id`,`codigo_grupo_usuarios`,`tipo_estabelecimento_id`),
  KEY `fk_minhas_despesas_variaveis_categoria_despesas_fixas1_idx` (`categoria_despesas_variaveis_id`),
  CONSTRAINT `fk_minhas_despesas_variaveis_categoria_despesas_fixas1` FOREIGN KEY (`categoria_despesas_variaveis_id`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesas_variaveis`
--

LOCK TABLES `despesas_variaveis` WRITE;
/*!40000 ALTER TABLE `despesas_variaveis` DISABLE KEYS */;
INSERT INTO `despesas_variaveis` VALUES (1,8,2024,12,'1',0,4,'AOBA BURGUER','Lanches Hamburguer',72.60,'2024-08-17','2024-08-18 18:51:42','kaiuviny','2024-09-12 03:34:29'),(2,8,2024,12,'1',0,4,'AOBA BURGUER','Lanches Hamburguer',131.26,'2024-08-17','2024-08-18 18:55:07','kaiuviny','2024-09-12 03:34:29'),(3,8,2024,12,'1',0,4,'MAD MAX','Comida Mexicana',83.90,'2024-08-15','2024-08-18 18:55:53','kaiuviny','2024-09-12 03:34:29'),(4,9,2024,12,'1',0,1,'CHIMAR BOA VISTA','Compra Mercado',246.26,'2024-09-01','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(5,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',358.58,'2024-09-01','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(6,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE DE MAIRINQUE','Compra Mercado',59.80,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(7,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',155.43,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(8,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',109.99,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(9,9,2024,12,'1',0,1,'CHIMAR BOA VISTA','Compra Mercado',149.29,'2024-09-08','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(10,9,2024,12,'1',0,3,'BURGUER KING SÃO ROQUE','Compra wooper drive thru',37.90,'2024-09-12','2024-09-12 03:14:08','kaiuviny','2024-09-12 03:34:29');
/*!40000 ALTER TABLE `despesas_variaveis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-02 15:48:09
