-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: apthoras
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `apontamentos`
--

DROP TABLE IF EXISTS `apontamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apontamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hora_fim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` text COLLATE utf8_unicode_ci,
  `task_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apontamentos_user_id_foreign` (`user_id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `apontamentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apontamentos`
--

LOCK TABLES `apontamentos` WRITE;
/*!40000 ALTER TABLE `apontamentos` DISABLE KEYS */;
INSERT INTO `apontamentos` VALUES (1,'2017-01-06 02:02:32','2017-01-06 02:02:32',NULL,1,1,'2017-01-06 02:02:32','2017-01-06 02:02:32'),(2,'2017-01-06 02:07:33','2017-01-06 02:07:33',NULL,1,1,'2017-01-06 02:02:59','2017-01-06 02:02:59'),(3,'2017-01-06 02:06:45','2017-01-06 02:06:55',NULL,1,1,'2017-01-06 02:06:45','2017-01-06 02:06:45'),(4,'2017-01-06 04:02:47','2017-01-06 04:04:11',NULL,6,1,'2017-01-06 04:04:11','2017-01-06 04:04:11'),(5,'2017-01-06 04:06:46','2017-01-06 04:06:58',NULL,6,1,'2017-01-06 04:06:58','2017-01-06 04:06:58'),(6,'2017-01-06 04:15:40','2017-01-06 04:15:47',NULL,6,1,'2017-01-06 04:15:47','2017-01-06 04:15:47'),(7,'2017-01-06 04:18:53','2017-01-06 04:19:05',NULL,7,1,'2017-01-06 04:19:05','2017-01-06 04:19:05'),(8,'2017-01-06 04:19:56','2017-01-06 04:20:01',NULL,7,1,'2017-01-06 04:20:01','2017-01-06 04:20:01'),(9,'2017-01-06 04:23:58','2017-01-06 04:24:06',NULL,17,1,'2017-01-06 04:24:06','2017-01-06 04:24:06'),(10,'2017-01-06 04:30:41','2017-01-06 04:31:55',NULL,17,1,'2017-01-06 04:31:55','2017-01-06 04:31:55'),(11,'2017-01-06 04:32:00','2017-01-06 04:32:09',NULL,11,1,'2017-01-06 04:32:09','2017-01-06 04:32:09'),(12,'2017-01-06 04:33:24','2017-01-06 04:33:35',NULL,1,1,'2017-01-06 04:33:35','2017-01-06 04:33:35'),(13,'2017-01-06 04:42:41','2017-01-06 04:43:06',NULL,1,1,'2017-01-06 04:43:06','2017-01-06 04:43:06'),(14,'2017-01-06 04:43:30','2017-01-06 04:43:34',NULL,17,1,'2017-01-06 04:43:34','2017-01-06 04:43:34'),(15,'2017-01-06 04:54:47','2017-01-06 05:10:02',NULL,19,1,'2017-01-06 05:10:02','2017-01-06 05:10:02'),(16,'2017-01-06 05:13:15','2017-01-06 05:58:00',NULL,20,1,'2017-01-06 05:58:00','2017-01-06 05:58:00'),(17,'2017-01-06 15:16:56','2017-01-06 15:17:04',NULL,1,1,'2017-01-06 15:17:04','2017-01-06 15:17:04'),(18,'2017-01-06 14:56:56','2017-01-06 15:17:23',NULL,21,1,'2017-01-06 15:17:23','2017-01-06 15:17:23'),(19,'2017-01-06 15:23:30','2017-01-06 15:23:40',NULL,13,1,'2017-01-06 15:23:40','2017-01-06 15:23:40'),(20,'2017-01-06 16:55:32','2017-01-06 16:58:50',NULL,20,1,'2017-01-06 16:58:50','2017-01-06 16:58:50'),(21,'2017-01-06 17:01:37','2017-01-06 17:42:39',NULL,22,1,'2017-01-06 17:42:39','2017-01-06 17:42:39'),(22,'2017-01-06 22:00:29','2017-01-06 22:01:57',NULL,23,1,'2017-01-06 22:01:57','2017-01-06 22:01:57'),(23,'2017-01-06 22:14:06','2017-01-06 22:48:27',NULL,23,1,'2017-01-06 22:48:27','2017-01-06 22:48:27'),(24,'2017-01-06 23:09:35','2017-01-06 23:22:40',NULL,23,1,'2017-01-06 23:22:40','2017-01-06 23:22:40'),(25,'2017-01-07 02:16:25','2017-01-07 02:22:03',NULL,23,1,'2017-01-07 02:22:03','2017-01-07 02:22:03'),(26,'2017-01-07 02:22:22','2017-01-07 03:26:35',NULL,23,1,'2017-01-07 03:26:35','2017-01-07 03:26:35'),(27,'2017-01-07 16:40:11','2017-01-07 16:42:23',NULL,23,1,'2017-01-07 16:42:23','2017-01-07 16:42:23'),(28,'2017-01-07 16:48:59','2017-01-07 17:34:24',NULL,23,1,'2017-01-07 17:34:24','2017-01-07 17:34:24'),(29,'2017-01-07 20:11:39','2017-01-07 20:16:42',NULL,25,1,'2017-01-07 20:16:42','2017-01-07 20:16:42'),(30,'2017-01-07 20:17:19','2017-01-07 20:25:06',NULL,27,1,'2017-01-07 20:25:06','2017-01-07 20:25:06'),(31,'2017-01-07 22:19:12','2017-01-07 22:20:05',NULL,29,1,'2017-01-07 22:20:05','2017-01-07 22:20:05'),(32,'2017-01-07 21:43:53','2017-01-07 22:22:04',NULL,26,1,'2017-01-07 22:22:04','2017-01-07 22:22:04'),(33,'2017-01-07 22:31:45','2017-01-07 22:38:41',NULL,30,1,'2017-01-07 22:38:41','2017-01-07 22:38:41'),(34,'2017-01-08 02:16:57','2017-01-08 02:30:11',NULL,33,1,'2017-01-08 02:30:11','2017-01-08 02:30:11'),(35,'2017-01-08 02:31:09','2017-01-08 02:34:40',NULL,34,1,'2017-01-08 02:34:40','2017-01-08 02:34:40'),(36,'2017-01-08 02:37:40','2017-01-08 03:09:08',NULL,31,1,'2017-01-08 03:09:08','2017-01-08 03:09:08'),(37,'2017-01-08 04:43:50','2017-01-08 04:21:27','test',1,1,'2017-01-08 04:21:27','2017-01-08 04:21:27'),(38,'2017-01-08 03:20:52','2017-01-08 04:24:20',NULL,35,1,'2017-01-08 04:24:20','2017-01-08 04:24:20'),(39,'2017-01-08 04:54:18','2017-01-08 06:47:07','<p>Concluído:</p><ul><li>requisicao ajax para o show do apontamento controller</li><li>montagem da table no modal</li></ul><p>Falta:</p><ul><li>Arrumar layout da table no modal</li></ul>',37,1,'2017-01-08 06:47:07','2017-01-08 06:47:07'),(40,'2017-01-08 16:23:25','2017-01-08 16:40:27','<p>Tentativa de melhorar a sql que retorna as horas/min/segs</p>',38,1,'2017-01-08 16:40:27','2017-01-08 16:40:27'),(41,'2017-01-08 21:04:27','2017-01-08 21:57:30','<p><b>Bug na montagem da table fixed!</b></p>',37,1,'2017-01-08 21:57:30','2017-01-08 21:57:30'),(42,'2017-01-09 02:19:08','2017-01-09 02:33:37','<p>Atalho feito pressionando as teclas \'nt\' no telado (atalho disponível apenas para versão web)</p>',36,1,'2017-01-09 02:33:37','2017-01-09 02:33:37'),(43,'2017-01-09 02:34:58','2017-01-09 02:38:20','<p>Done!</p>',40,1,'2017-01-09 02:38:20','2017-01-09 02:38:20'),(44,'2017-01-09 02:39:13','2017-01-09 03:32:49','<p>Adicionado DataTable com Bootstrap 3</p>',16,1,'2017-01-09 03:32:49','2017-01-09 03:32:49'),(45,'2017-01-09 03:43:58','2017-01-09 03:48:14','<p>Bug corrigido.</p>',43,1,'2017-01-09 03:48:14','2017-01-09 03:48:14'),(46,'2017-01-09 03:49:23','2017-01-09 04:29:47','<p>Dentro do dropdown o link para my-tasks com separator</p>',44,1,'2017-01-09 04:29:47','2017-01-09 04:29:47'),(47,'2017-01-09 14:30:17','2017-01-09 15:30:31','<p>Alterações no gulp e instalações de compenentes com bower</p>',30,1,'2017-01-09 15:30:31','2017-01-09 15:30:31'),(48,'2017-01-11 02:29:02','2017-01-11 02:39:42','<p>Bug Fixed!</p>',48,1,'2017-01-11 02:39:42','2017-01-11 02:39:42'),(49,'2017-01-11 03:07:18','2017-01-11 03:13:46','<p>Apenas ícones, em fase de testes</p>',49,1,'2017-01-11 03:13:46','2017-01-11 03:13:46'),(50,'2017-01-11 03:32:24','2017-01-11 04:19:20','<p>Campos criados no DB, interfaces corrigidas. Bug quando edita um client, pois no ClientRequest há campos com regra <u>unique</u></p>',42,1,'2017-01-11 04:19:20','2017-01-11 04:19:20'),(51,'2017-01-11 04:15:00','2017-01-11 04:40:35','<p>Visto a função sum, não implementada</p>',41,1,'2017-01-11 04:40:35','2017-01-11 04:40:35'),(52,'2017-01-11 18:58:45','2017-01-11 19:11:07','Colocado data-order e data-page-length na table, falta colocar data de criação na table',45,1,'2017-01-11 19:11:07','2017-01-11 19:11:07'),(53,'2017-01-11 19:56:08','2017-01-11 19:59:56','<p>Colocado order by desc no id da task</p>',45,1,'2017-01-11 19:59:56','2017-01-11 19:59:56'),(54,'2017-01-11 20:00:43','2017-01-11 20:34:55','',47,1,'2017-01-11 20:34:55','2017-01-11 20:34:55'),(55,'2017-01-11 22:48:05','2017-01-11 22:58:18','<p>Em fase de testes</p>',51,1,'2017-01-11 22:58:18','2017-01-11 22:58:18'),(56,'2017-01-11 22:58:45','2017-01-11 23:29:55','<p>Bug fixed! Nos Request de validação, add a classe Rule::unique(\'model\')-&gt;ignore($this-&gt;id)</p>',50,1,'2017-01-11 23:29:55','2017-01-11 23:29:55'),(57,'2017-01-11 23:31:18','2017-01-11 23:31:51','<p>Bug fixed na Task 50.</p>',42,1,'2017-01-11 23:31:51','2017-01-11 23:31:51'),(58,'2017-01-12 16:14:08','2017-01-12 17:24:23','<p>Concluído:</p><ol><li>Upload da aplicação no remote server</li><li>Instalados no remote server</li><ol><li>php 7</li><li>mysql</li><li>composer</li></ol></ol><p>Pendente:</p><ol><li>Configurar apache: Deixar raiz a homepage, e /apthoras a aplicação</li></ol>',52,1,'2017-01-12 17:24:23','2017-01-12 17:24:23'),(59,'2017-01-12 17:26:39','2017-01-12 18:43:08','<p>Verificar os VirtualHosts</p>',52,1,'2017-01-12 18:43:08','2017-01-12 18:43:08'),(60,'2017-01-12 20:13:24','2017-01-12 21:37:36','<p>Bug Fixed! Add columns no banco de produção</p>',54,1,'2017-01-12 21:37:36','2017-01-12 21:37:36'),(61,'2017-01-12 22:04:17','2017-01-12 22:13:56','<p>html tag min = 0</p>',53,1,'2017-01-12 22:13:56','2017-01-12 22:13:56'),(62,'2017-01-12 22:14:55','2017-01-12 22:22:41','<p>Arrumando mascara cpf/cnpj</p>',20,1,'2017-01-12 22:22:41','2017-01-12 22:22:41'),(63,'2017-01-12 22:29:08','2017-01-12 23:43:38','<p>Concluído!</p>',20,1,'2017-01-12 23:43:38','2017-01-12 23:43:38'),(64,'2017-01-13 12:17:19','2017-01-13 12:52:11','<p>Alteraçãoes na table da index, provavel que seja o tipo da col no banco (varchar) para smallint</p>',55,1,'2017-01-13 12:52:11','2017-01-13 12:52:11'),(65,'2017-01-13 14:41:53','2017-01-13 14:51:29','<p>Arrumado Slider</p>',56,1,'2017-01-13 14:51:29','2017-01-13 14:51:29'),(66,'2017-01-13 17:51:36','2017-01-13 18:31:10','<p>Tratativa paleativa, copiado main.js para public</p>',56,1,'2017-01-13 18:31:10','2017-01-13 18:31:10'),(67,'2017-01-13 18:37:41','2017-01-13 20:30:14','<p>Definido New Age do startbootstrap.com: Alteração: No exemplo mobile colocar um carroussel com prints da telas</p>',57,1,'2017-01-13 20:30:14','2017-01-13 20:30:14'),(68,'2017-01-13 21:03:47','2017-01-13 22:44:14','<p>Upload do layout &nbsp;no remoteserver</p>',57,1,'2017-01-13 22:44:14','2017-01-13 22:44:14'),(69,'2017-01-14 02:51:42','2017-01-14 03:04:16','<p>Ou nas configs do apache ou como caminho dentro da aplicação</p>',62,1,'2017-01-14 03:04:16','2017-01-14 03:04:16'),(70,'2017-01-15 19:55:35','2017-01-15 19:55:51','<p>Concluído</p>',62,1,'2017-01-15 19:55:51','2017-01-15 19:55:51'),(71,'2017-01-16 02:45:02','2017-01-16 03:13:48','<p>Adicionado as cinco fases do pmbok na aplicação</p>',28,1,'2017-01-16 03:13:48','2017-01-16 03:13:48'),(72,'2017-01-16 17:46:35','2017-01-16 18:10:29','<p>Opção de tratativa: Injetar o valor do ajax no value do campo</p>',22,1,'2017-01-16 18:10:29','2017-01-16 18:10:29'),(73,'2017-01-16 18:12:34','2017-01-16 18:59:56','<p>Criada a class mail</p>',46,1,'2017-01-16 18:59:56','2017-01-16 18:59:56'),(74,'2017-01-16 19:08:18','2017-01-16 22:14:27','<p>Template do email, controller</p>',46,1,'2017-01-16 22:14:27','2017-01-16 22:14:27'),(75,'2017-01-16 22:52:38','2017-01-16 23:21:26','<p>Função Mail implementada, falta implementar Events.</p>',46,1,'2017-01-16 23:21:26','2017-01-16 23:21:26'),(76,'2017-01-17 00:26:35','2017-01-17 03:52:34','<p>Alterações em Kernel.php, TaskController (novos métodos)</p>',46,1,'2017-01-17 03:52:34','2017-01-17 03:52:34'),(77,'2017-01-17 03:52:46','2017-01-17 04:42:49','<p>Testar em produção o Task Scheduling</p>',46,1,'2017-01-17 04:42:49','2017-01-17 04:42:49'),(79,'2017-01-18 01:55:31','2017-01-18 02:26:47','<p>Add on delete na foreign key task_id da table apontamentos</p>',64,1,'2017-01-18 02:26:47','2017-01-18 02:26:47'),(80,'2017-01-18 02:41:24','2017-01-18 02:41:34','<p>Concertado</p>',30,1,'2017-01-18 02:41:34','2017-01-18 02:41:34'),(81,'2017-01-18 02:43:08','2017-01-18 02:43:12','<p>Feito atualmente via ftp para o remote server</p>',52,1,'2017-01-18 02:43:12','2017-01-18 02:43:12'),(82,'2017-01-18 02:48:51','2017-01-18 03:19:29','<p>testes com gulp version</p>',65,1,'2017-01-18 03:19:29','2017-01-18 03:19:29'),(83,'2017-01-18 18:57:50','2017-01-18 19:32:56','<p>Novas configurações no remote server, instalado sendmail no remote server, ver como a digital ocean trabalha com smtp</p>',46,1,'2017-01-18 19:32:56','2017-01-18 19:32:56');
/*!40000 ALTER TABLE `apontamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `documento` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_foreign` (`user_id`),
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'teste','77777777777777',1,'2016-12-27 04:36:34','2017-01-11 23:24:57','42999999999','teste@test.com'),(2,'Teste1','99999999999999',1,'2016-12-27 04:44:30','2017-01-11 23:25:26','42997777777','teste1@test.com'),(3,'Guilherme Bail','09999999999',1,'2017-01-06 05:34:15','2017-01-06 16:58:10','42999249657','guilhermedanbail@gmail.com'),(4,'Cliente Tio João','53278066600',1,'2017-01-12 22:08:22','2017-01-12 22:08:22','4299999999','clientetiojoao@tiojoao.com');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_12_22_150550_create_tasks_table',1),(4,'2016_12_27_014404_create_clients_table',2),(5,'2016_12_27_014405_create_projects_table',2),(6,'2016_12_27_015337_create_apontamentos_table',3),(7,'2017_01_07_183117_add_column_deleted_at',4),(8,'2017_01_11_013320_add_coluns_fone_email_table_clients',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `data_entrega` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fase` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  KEY `projects_client_id_foreign` (`client_id`),
  CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Projeto2017','2017-04-12','2','50',1,2,'2016-12-27 05:38:28','2016-12-27 05:38:28',NULL),(3,'AptHoras','2017-02-28 00:02:00','0','0',1,3,'2017-01-07 20:06:36','2017-01-07 20:06:36',NULL),(7,'teste soft deletes','2017-01-07 00:01:00','0','0',1,3,'2017-01-07 20:42:20','2017-01-07 20:44:12','2017-01-07 20:44:12'),(8,'teste soft deletes','2017-01-07 00:01:00','0','0',1,3,'2017-01-07 20:45:17','2017-01-07 20:46:35','2017-01-07 20:46:35'),(9,'Projeto Tipo João','2017-01-12 00:01:00','0','0',1,1,'2017-01-12 19:05:35','2017-01-12 19:05:35',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prazo_finalizacao` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Requisitos','9','2016-12-22 17:18:50','2017-01-17 02:12:53','2017-01-18 00:01:00',1,1),(2,'Banco de Dados','45','2016-12-22 18:27:03','2017-01-17 02:13:09','2017-01-20 00:01:00',1,1),(3,'Programação','51','2016-12-22 21:37:08','2017-01-17 02:13:23','2017-01-24 00:01:00',2,1),(6,'Teste de associação','85','2016-12-31 00:27:34','2017-01-03 05:18:34','2017-01-10 00:01:00',1,1),(7,'Fazer funcionar o Gulp','0','2017-01-03 00:18:29','2017-01-06 04:20:23','2017-01-03 00:01:00',1,1),(8,'Separar tasks por projeto','0','2017-01-03 00:20:33','2017-01-03 00:20:33','2017-01-05 00:01:00',1,1),(9,'Separar tasks por usuário','100','2017-01-03 00:22:55','2017-01-07 19:58:43','2017-01-06 00:01:00',1,1),(10,'Colocar um tema','0','2017-01-03 00:23:16','2017-01-03 00:23:16','2017-01-13 00:01:00',1,1),(11,'Colocar data de entrega na tabela de tasks','100','2017-01-03 00:23:52','2017-01-03 15:43:57','2017-01-06 00:01:00',1,1),(12,'Colocar usuário responsável na tabela de tasks','100','2017-01-03 00:27:32','2017-01-05 22:12:56','2017-01-05 00:01:00',1,1),(13,'Colocar o Timer acima do panel das Tasks','100','2017-01-03 00:28:14','2017-01-03 04:21:15','2017-05-01 00:05:00',1,1),(14,'Colocar aspas na pag edit das tasks','100','2017-01-03 00:29:23','2017-01-03 15:42:57','2017-01-05 00:01:00',1,1),(15,'Colocar o projeto no select da edit das Tasks','100','2017-01-03 00:31:24','2017-01-03 15:42:41','2017-01-06 00:01:00',1,1),(16,'Colocar DataTables nas tabelas','100','2017-01-03 00:31:51','2017-01-03 00:31:51','2017-01-05 00:01:00',1,1),(17,'Fazer o vínculo do Timer com a Task','100','2017-01-03 00:43:40','2017-01-03 00:43:40','2017-01-13 00:01:00',1,1),(18,'Arrumar my-tasks page','100','2017-01-04 00:03:07','2017-01-07 17:49:33','2017-01-05 00:01:00',1,1),(19,'Fazer cliente pessoa fisica','100','2017-01-04 00:04:56','2017-01-04 00:04:56','2017-01-06 00:01:00',1,1),(20,'Fazer o CRUD de \'Clients\'','50','2017-01-06 05:12:58','2017-01-13 02:49:41','2017-01-06 00:01:00',1,1),(21,'Slider como progresso da Task','100','2017-01-06 14:56:32','2017-01-06 14:56:32','2017-01-06 00:01:00',1,1),(22,'Trazer o progresso da task salvo no slider','0','2017-01-06 16:59:34','2017-01-06 16:59:34','2017-01-07 00:01:00',1,1),(23,'Fazer Dashboard por usuário','100','2017-01-06 21:59:52','2017-01-07 17:46:43','2017-01-06 00:01:00',1,1),(24,'new task, project list order by asc','100','2017-01-07 20:07:49','2017-01-07 20:16:54','2017-01-07 00:01:00',1,3),(25,'user list, order by asc','100','2017-01-07 20:08:05','2017-01-07 20:08:05','2017-01-07 00:01:00',1,3),(26,'Ctrl + N to new task','100','2017-01-07 20:08:29','2017-01-07 20:08:29','2017-01-07 00:01:00',1,3),(27,'CRUD for projects','90','2017-01-07 20:08:45','2017-01-07 20:47:31','2017-01-07 00:01:00',1,3),(28,'Fase dos projetos, campo enum','100','2017-01-07 20:09:51','2017-01-07 20:09:51','2017-01-07 00:01:00',1,3),(29,'Deixar responsive modal task, projects ','16','2017-01-07 22:18:03','2017-01-07 22:18:03','2017-01-07 00:01:00',1,1),(30,'Arrumar user dropdown e progressbar','100','2017-01-07 22:31:35','2017-01-07 22:31:35','2017-01-07 00:01:00',1,3),(31,'Depois de expirar sessao redirecionar para login','28','2017-01-08 01:55:08','2017-01-08 01:55:08','2017-01-07 00:01:00',1,3),(32,'Colocar o timer no my-tasks',NULL,'2017-01-08 01:55:57','2017-01-08 01:55:57','2017-01-14 00:01:00',1,3),(33,'Botoes do timer trocar por ícones','100','2017-01-08 01:57:47','2017-01-08 01:57:47','2017-01-07 00:01:00',1,3),(34,'Desativar start button quando task 100%','100','2017-01-08 02:31:00','2017-01-08 02:31:00','2017-01-08 00:01:00',1,3),(35,'Colocar campo comentário com editor de fonts p/ tasks','100','2017-01-08 02:36:47','2017-01-08 02:36:47','2017-01-08 00:01:00',1,3),(36,'Fazer atalho como Shit + T ou nt','100','2017-01-08 04:18:09','2017-01-08 11:59:40','2017-01-08 00:01:00',1,3),(37,'Mostrar user/comments no dashboard','100','2017-01-08 04:24:03','2017-01-08 04:24:03','2017-01-08 00:01:00',1,3),(38,'Deixar no singular as horas na pag my-tasks','7','2017-01-08 12:02:05','2017-01-08 12:02:05','2017-01-08 00:01:00',1,3),(40,'Tirar table das tasks do panel','100','2017-01-09 02:16:05','2017-01-09 02:16:05','2017-01-09 00:01:00',1,3),(41,'Fazer datatable somar a col de tempo on my-tasks','10','2017-01-09 03:35:27','2017-01-09 03:35:27','2017-01-09 00:01:00',1,3),(42,'Add columns: email e fone na table \'clients\'','100','2017-01-09 03:37:42','2017-01-09 03:42:32','2017-01-09 00:01:00',1,3),(43,'Arrumar exclusao task na index','100','2017-01-09 03:40:22','2017-01-09 03:40:22','2017-01-09 00:01:00',1,3),(44,'Fazer username link my-tasks','100','2017-01-09 03:41:02','2017-01-09 03:41:02','2017-01-09 00:01:00',1,3),(45,'Fazer oder desc por ultimas tasks na index','100','2017-01-09 03:41:58','2017-01-09 03:41:58','2017-01-09 00:01:00',1,3),(46,'Disparar email fantando 7, 3 e 1 dia para a entrega da task','80','2017-01-09 04:32:41','2017-01-16 19:00:32','2017-01-10 00:01:00',1,3),(47,'Fazer atalhos de teclado','0','2017-01-09 21:54:09','2017-01-09 21:54:09','2017-01-09 00:01:00',1,3),(48,'Bug após modal dashboard, navbar vai para esquerda','100','2017-01-11 02:28:39','2017-01-11 02:28:39','2017-01-11 00:01:00',1,3),(49,'Testar deixar apenas ícones na col Ação','100','2017-01-11 02:49:36','2017-01-11 02:49:36','2017-01-11 00:01:00',1,3),(50,'Campos unique nos Requests, verificar nos edits','100','2017-01-11 04:16:53','2017-01-11 04:16:53','2017-01-11 00:01:00',1,3),(51,'Testar deixar apenas ícones na col Timer','100','2017-01-11 22:47:52','2017-01-11 22:47:52','2017-01-11 00:01:00',1,3),(52,'Fazer deploy da aplicação','100','2017-01-12 00:07:33','2017-01-12 00:07:33','2017-01-11 00:01:00',1,3),(53,'Campo documento não deixar numero negativo','100','2017-01-12 19:02:27','2017-01-12 19:02:27','2017-01-12 00:01:00',1,3),(54,'Arrumar my-tasks page quando não tem nenhuma task','100','2017-01-12 19:10:56','2017-01-12 19:10:56','2017-01-12 00:01:00',1,3),(55,'Arrumar order na col Status na index tasks','24','2017-01-13 11:59:22','2017-01-13 11:59:22','2017-01-13 00:01:00',1,3),(56,'Arrumar JS nas paginas','35','2017-01-13 11:59:44','2017-01-13 11:59:44','2017-01-13 00:01:00',1,3),(57,'Arrumar welcome page','95','2017-01-13 18:31:48','2017-01-13 18:31:48','2017-01-13 00:01:00',1,3),(58,'Estudar','','2017-01-13 21:31:24','2017-01-16 20:43:07','2017-01-23 00:01:00',4,1),(61,'Ver pq em prod não esta funcioanndo my-tasks',NULL,'2017-01-14 02:49:50','2017-01-14 02:49:50','2017-01-14 00:01:00',1,3),(62,'Colocar favicon em produção','100','2017-01-14 02:51:17','2017-01-14 02:51:17','2017-01-14 00:01:00',1,3),(63,'Como sincronizar as versoes de dev e prod',NULL,'2017-01-16 03:14:31','2017-01-16 03:14:31','2017-01-16 00:01:00',1,3),(64,'Del Task em prod','100','2017-01-17 17:08:32','2017-01-17 17:08:32','2017-01-17 00:01:00',1,3),(65,'Alterar atalho de nova task p/ Ctrl + Alt + N','0','2017-01-18 02:48:48','2017-01-18 02:48:48','2017-01-18 00:01:00',1,3);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Guilherme Bail User','guilhermedanbail@gmail.com','$2y$10$c4VeHA/lhN9GDK20M5XKku31rrJvuBgr7YDk146SPDOSRoRJK5LJ.','HCEv2kDLRBgsiuRKbtVuumNPp5iJ09OSyLyVBmgH2opyt0Tupa9LGQqrU0nV','2016-12-27 01:21:25','2017-01-13 20:37:11'),(2,'J9D0xk3QPP','VNCM3IZiLA@gmail.com','$2y$10$M8sfAHf78arG1FlPCvvPzu2LdWDnyyZ8MAt9XjwRTZQMI2A9l5JTG',NULL,'2016-12-31 18:51:25','2016-12-31 18:51:25'),(3,'BQ0A8P6UrV','sasn7dd4JE@gmail.com','$2y$10$532vT/R3F1D5jwrB.1j2cuj8ukQneNUsgHCFGKLq5Gk02D1ShG/Cm',NULL,'2016-12-31 18:51:38','2016-12-31 18:51:38'),(4,'Test','test@test.org','$2y$10$mdaf2K3QUKjeUtDcH7CCTuVYgyUVlYsHUl6/RgHiIHxCg./13WFFq','403Irs7pEq8NpTJRBDuWP1gwvrv7norIoqzFGYpKfWicHFbYSCMPfBFpYpbz','2017-01-03 03:38:32','2017-01-12 20:12:57'),(5,'Valdir','valdilindo@gmail.com','$2y$10$uvQQ9r0btZT0tsMYj3u1UO/mH6ZfVAMwTJrjzjYw5FMjdO/UfcSC6','6zaFqX9es0fKSreLoVU4brljI672NQRqZNurg8N0UlmpqDyqJ4Ay6G2x8oU3','2017-01-08 22:10:05','2017-01-08 22:16:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-18 18:49:22
