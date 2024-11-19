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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesas_variaveis`
--

LOCK TABLES `despesas_variaveis` WRITE;
/*!40000 ALTER TABLE `despesas_variaveis` DISABLE KEYS */;
INSERT INTO `despesas_variaveis` VALUES (1,8,2024,12,'1',0,4,'AOBA BURGUER','Lanches Hamburguer',72.60,'2024-08-17','2024-08-18 18:51:42','kaiuviny','2024-09-12 03:34:29'),(2,8,2024,12,'1',0,4,'AOBA BURGUER','Lanches Hamburguer',131.26,'2024-08-17','2024-08-18 18:55:07','kaiuviny','2024-09-12 03:34:29'),(3,8,2024,12,'1',0,4,'MAD MAX','Comida Mexicana',83.90,'2024-08-15','2024-08-18 18:55:53','kaiuviny','2024-09-12 03:34:29'),(4,9,2024,12,'1',0,1,'REINALDO CHICAROLLI M','CHIMAR BOA VISTA',246.26,'2024-09-01','2024-09-09 21:15:34','kaiuviny','2024-11-18 18:39:55'),(5,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',358.58,'2024-09-01','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(6,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE DE MAIRINQUE','Compra Mercado',59.80,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(7,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',155.43,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(8,9,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE BAIXO PONTE','Compra Mercado',109.99,'2024-09-05','2024-09-09 21:15:34','kaiuviny','2024-09-12 03:34:29'),(9,9,2024,12,'1',0,1,'REINALDO CHICAROLLI M','CHIMAR BOA VISTA',149.29,'2024-09-08','2024-09-09 21:15:34','kaiuviny','2024-11-18 18:39:55'),(10,9,2024,12,'1',0,3,'BURGUER KING SÃO ROQUE','Compra wooper drive thru',37.90,'2024-09-12','2024-09-12 03:14:08','kaiuviny','2024-09-12 03:34:29'),(11,11,2024,6,'1',0,7,'POSTO IPIRANGA ENTRADA SÃO ROQUE','ABASTECECIMENTO CARRO COM ALCOOL',100.00,'2024-11-01','2024-11-06 22:33:37','kaiuviny','2024-11-18 18:20:45'),(12,11,2024,12,'1',0,4,'Tanushi suhi prime - Kiasih Sushi  Sao Roque','Restaurante Kaishi Sushi',13.90,'2024-11-03','2024-11-06 22:38:47','kaiuviny','2024-11-18 18:27:50'),(13,11,2024,12,'1',0,4,'Tanushi suhi prime - Kiasih Sushi  Sao Roque','Restaurante Kaishi Sushi',78.00,'2024-11-03','2024-11-06 22:38:47','kaiuviny','2024-11-18 18:27:50'),(14,11,2024,12,'1',0,3,'BURGUER KING SÃO ROQUE','Compra wooper drive thru',37.80,'2024-11-02','2024-11-06 22:38:47','kaiuviny','2024-11-18 18:27:50'),(15,11,2024,12,'1',0,3,'CHURRASCARIA PORTAL DOS PPAMPAS','Compra Marmita',32.00,'2024-11-01','2024-11-06 22:38:47','kaiuviny','2024-11-06 22:38:47'),(16,11,2024,12,'1',0,1,'REINALDO CHICAROLLI-CHIMAR','CHIMAR COM AS CRIANÇAS A NOITE',123.70,'2024-11-01','2024-11-06 22:38:47','kaiuviny','2024-11-06 22:44:26'),(17,11,2024,12,'1',0,1,'MAIRINQUE SUPERMERCADO','MARLY - ALINE',79.58,'2024-11-06','2024-11-06 22:44:26','acristina','2024-11-06 22:44:26'),(18,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','MERCADO SR DE MK - ALINE',86.32,'2024-11-05','2024-11-06 22:44:26','acristina','2024-11-06 22:44:26'),(19,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','MERCADO SR BAIXO DA PONTE - ALINE',313.46,'2024-11-05','2024-11-06 22:44:26','acristina','2024-11-06 22:44:26'),(20,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','MERCADO SR BAIXO DA PONTE - CAIO E ALINE',103.20,'2024-11-04','2024-11-06 22:44:26','kaiuviny','2024-11-06 22:44:26'),(21,11,2024,12,'1',0,1,'PONSONI PAES E DOCES LTDA','Cafe da Manhã com Morzao ponsoni mk',99.10,'2024-11-04','2024-11-06 22:44:26','kaiuviny','2024-11-06 22:44:26'),(22,11,2024,12,'1',0,1,'AGROBIGA MK','Racao gold 15kg',88.90,'2024-11-06','2024-11-06 22:45:16','kaiuviny','2024-11-06 22:45:16'),(24,11,2024,12,'1',0,3,'BURGUER KING VOTORANTIM SHOPPING IGUATEMI','Compra lanches almoço shopping sorocaba iguat',77.80,'2024-11-17','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(25,11,2024,12,'1',0,3,'KFC SHOPPING IGUATEMI SOROCABA','Compra lanches almoço shopping sorocaba iguat',43.80,'2024-11-17','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(26,11,2024,12,'1',0,10,'MAGIC KIDS JUNDIAI BRASIL SHOPPING IGUATEMI S','Compra livros box George Well',40.00,'2024-11-17','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(27,11,2024,12,'1',0,4,'PIZZARIA ITALIA SAO ROQUE','Compra pizza 5 queijos e frango com catupiry ',56.79,'2024-11-16','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(28,11,2024,12,'1',0,1,'PONSONI PAES E DOCES LTDA','Cafe da Manhã com mae ponsoni mk',71.70,'2024-11-14','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(29,11,2024,12,'1',0,3,'IFD*IFOOD CLUB OSASCO','Plano aplicativo ifood para cupoons de descon',4.95,'2024-11-14','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(30,11,2024,12,'1',0,4,'DIIHENY S DOG','compra dois chachorros quentes salgado e doce',40.00,'2024-11-13','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(31,11,2024,12,'1',0,11,'SHOPEE*CHERRYSHOP RIO','compra dois items do anuncio da aline',58.90,'2024-11-13','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(32,11,2024,12,'1',0,15,'CASM MAIRINQUE BRA','compra 4 metros grama artificial',60.00,'2024-11-13','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(33,11,2024,12,'1',0,2,'CARLOS ALBERTO MERGUI','MATELUX compra dobradiças',29.00,'2024-11-13','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(34,11,2024,12,'1',0,14,'DOGRARIA MARECHAL DE M','compra remedios na popular de mairinque para ',28.96,'2024-11-11','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(35,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','compra cafe da manha',25.03,'2024-11-10','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(36,11,2024,12,'1',0,14,'DOGRARIA SP DROGARIASA','Droga Sao Paulo de Sao Roque',25.98,'2024-11-12','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(37,11,2024,12,'1',0,7,'POSTO IPIRANGA ENTRADA SÃO ROQUE','ABASTECECIMENTO carro COM ALCOOL',100.00,'2024-11-09','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(38,11,2024,12,'1',0,1,'MARMELEIRO SUPERMERCADO','compra bala halls',4.19,'2024-11-08','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(39,11,2024,12,'1',0,15,'DIEGODEMORAES OSASCO','corte e barba',40.00,'2024-11-08','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(40,11,2024,12,'1',0,2,'LQ*LOQUIDO SAO PAULO B','pagemtno de alguma coisa',99.90,'2024-11-07','2024-11-18 18:20:45','kaiuviny','2024-11-18 18:20:45'),(42,11,2024,12,'1',0,11,'MERCADOLIVRE*HARCIMPO','pagamento alguma coisa',167.00,'2024-11-01','2024-11-18 18:28:46','kaiuviny','2024-11-18 18:28:46'),(52,11,2024,12,'1',0,1,'CARREFOUR SOROCABA','compra ref para bater no cartao estacionament',8.79,'2024-11-17','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(53,11,2024,12,'1',0,1,'CARREFOUR SOROCABA','compra ali para bater no cartao estacionament',27.54,'2024-11-17','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(54,11,2024,12,'1',0,3,'MC DONALDS SOC IGUATEMI SHOPPING SOROCABA','compra lanche aline',15.80,'2024-11-17','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(55,11,2024,12,'1',0,3,'BURGUER KING SÃO ROQUE','Compra LANCHES ALmoço drive thru',48.70,'2024-11-13','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(56,11,2024,12,'1',0,3,'BURGUER KING SÃO ROQUE','compra lanche drive trhu com a familia',100.80,'2024-11-11','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(57,11,2024,12,'1',0,1,'REINALDO CHICAROLLI M','CHIMAR BOA VISTA hot roll',44.00,'2024-11-09','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(58,11,2024,12,'1',0,1,'ESTANCIA SUPERMERCADO SR','Aline compra estancia',22.59,'2024-11-15','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(59,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','compra algma coisa',45.44,'2024-11-11','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55'),(60,11,2024,12,'1',0,1,'SUPERMERCADO SAO ROQUE','compra algma coisa',239.92,'2024-08-11','2024-11-18 18:39:55','kaiuviny','2024-11-18 18:39:55');
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

-- Dump completed on 2024-11-19 19:24:56
