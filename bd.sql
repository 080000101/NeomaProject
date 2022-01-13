-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: econtact
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7D3656A4E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'mauricia@gmail.com','[]','$2y$13$P2TX9VmdxBpi1bsI.wGnJunNZAPsIuz/1yy4drNiylASv5ywjpx.a'),(2,'nils@gmail.com','[]','$2y$13$X5F70poRlml7UCdKxhn7z.VwtQQwS3u1D5aSXYH5sUXBaQVNY7jMe'),(3,'rimie@gmail.com','[]','$2y$13$TmL/d9SJDEB2Zytkw5GOo.H1MlO9gPTijc3EDwISMV7yMMrCUHe2C'),(4,'lucas@gmail.com','[]','$2y$13$LOnBli4APmtrdu834rN0XOnTjv2P9mabIEP3f5h0CpJV2yqQi1PYK'),(5,'marie@gmail.com','[]','$2y$13$okfoTLxX312iFelT9cBdeuxwmaIBaldUsOVzU5yIdWGgJEA903vk6'),(6,'danna@gmail.com','[]','$2y$13$CjxGyLZWbPynHlKTxESv1OM7Ia3LT/rlgvGRtwmN2ljvKDxff41N6');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adress` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5CECC7BEE7A1254A` (`contact_id`),
  CONSTRAINT `FK_5CECC7BEE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
/*!40000 ALTER TABLE `adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E6389B6B5FBA` (`account_id`),
  CONSTRAINT `FK_4C62E6389B6B5FBA` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (4,1,'Clément','Moreux'),(7,1,'Lily','Kay'),(8,1,'Mauricia','Nkou'),(10,1,'Marie','dupont'),(11,1,'Mauly','Franc'),(13,1,'Corentin','Chalons'),(15,1,'Passy','Rofidal'),(17,1,'Lili','jeanne'),(18,1,'arthur','dumont'),(19,1,'jean','jacques'),(20,1,'paul','tigue'),(21,1,'lucifer','morningstar'),(22,1,'lucien','depardieux'),(23,1,'Crash','Test');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211203100723',NULL,NULL),('DoctrineMigrations\\Version20211207135654',NULL,NULL),('DoctrineMigrations\\Version20211207151521',NULL,NULL),('DoctrineMigrations\\Version20211210092839','2021-12-10 10:28:53',177),('DoctrineMigrations\\Version20220105095614','2022-01-06 12:19:22',53),('DoctrineMigrations\\Version20220105102002','2022-01-12 13:08:54',72),('DoctrineMigrations\\Version20220105102243','2022-01-12 13:18:59',14),('DoctrineMigrations\\Version20220106111901','2022-01-12 13:19:52',52),('DoctrineMigrations\\Version20220113093737','2022-01-13 10:37:53',165),('DoctrineMigrations\\Version20220113100256','2022-01-13 11:13:21',59),('DoctrineMigrations\\Version20220113102936','2022-01-13 11:29:58',102),('DoctrineMigrations\\Version20220113142134','2022-01-13 15:23:23',105),('DoctrineMigrations\\Version20220113142610','2022-01-13 15:26:25',63),('DoctrineMigrations\\Version20220113144226','2022-01-13 15:42:45',182),('DoctrineMigrations\\Version20220113145554','2022-01-13 15:56:10',340);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E7927C74E7A1254A` (`contact_id`),
  CONSTRAINT `FK_E7927C74E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_number`
--

DROP TABLE IF EXISTS `phone_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone_number` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6B01BC5BE7A1254A` (`contact_id`),
  CONSTRAINT `FK_6B01BC5BE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_number`
--

LOCK TABLES `phone_number` WRITE;
/*!40000 ALTER TABLE `phone_number` DISABLE KEYS */;
/*!40000 ALTER TABLE `phone_number` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-13 15:57:30
