-- MySQL dump 10.13  Distrib 8.0.24, for Linux (x86_64)
--
-- Host: localhost    Database: admissionnew
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `basic_info`
--

DROP TABLE IF EXISTS `basic_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basic_info` (
  `email` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `fathername` varchar(45) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `married` varchar(1) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `birthcountry` varchar(30) NOT NULL,
  `birthplace` varchar(30) NOT NULL,
  `language` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `blood` varchar(3) DEFAULT NULL,
  `cnic` bigint NOT NULL,
  `cnicissuedate` date NOT NULL,
  `cnicissueplace` varchar(30) NOT NULL,
  PRIMARY KEY (`email`,`cnic`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basic_info`
--

LOCK TABLES `basic_info` WRITE;
/*!40000 ALTER TABLE `basic_info` DISABLE KEYS */;
INSERT INTO `basic_info` VALUES ('ahmed.mujtaba@basecampdata.com','29258524_1881448628555847_4529987985348569051_n.jpg','Ahmed Mustafa','Nizamani','Haji Ahmed Khan','m','s','pakistani','2020-04-02','Pakistan','matli','urdu','islam','o+',1000000000000,'2020-04-02','Matli'),('mujtaba_niz@live.com','29258524_1881448628555847_4529987985348569051_n.jpg','Ahmed Mujtaba','Nizamani','Haji Ahmed Khan','m','s','pakistani','1997-02-08','Pakistan','badin','urdu','islam','o+',4110360436107,'2018-04-04','Matli');
/*!40000 ALTER TABLE `basic_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_info` (
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city_province` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipCode` bigint NOT NULL,
  `phone` bigint NOT NULL,
  `cEmail` varchar(45) DEFAULT NULL,
  `facebook` varchar(34) DEFAULT NULL,
  `whatsapp` bigint DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_info`
--

LOCK TABLES `contact_info` WRITE;
/*!40000 ALTER TABLE `contact_info` DISABLE KEYS */;
INSERT INTO `contact_info` VALUES ('ahmed.mujtaba@basecampdata.com','village malhan','Matli/Sindh','Pakistan',72010,3443448311,'mujtaba.nix@gmail.com','mujtaba.nix',1),('mujtaba_niz@live.com','village malhan','Matli/Sindh','Pakistan',72010,3443565281,'mujtaba.nix@gmail.com','mujtaba.nix',3443565281);
/*!40000 ALTER TABLE `contact_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docs_info`
--

DROP TABLE IF EXISTS `docs_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docs_info` (
  `email` varchar(50) NOT NULL,
  `matricCert` tinyint(1) DEFAULT NULL,
  `interCert` tinyint(1) DEFAULT NULL,
  `matricMark` tinyint(1) NOT NULL,
  `interMark` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docs_info`
--

LOCK TABLES `docs_info` WRITE;
/*!40000 ALTER TABLE `docs_info` DISABLE KEYS */;
INSERT INTO `docs_info` VALUES ('ahmed.mujtaba@basecampdata.com',1,1,1,1);
/*!40000 ALTER TABLE `docs_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edu_info`
--

DROP TABLE IF EXISTS `edu_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edu_info` (
  `email` varchar(50) NOT NULL,
  `prevEduName` varchar(100) NOT NULL,
  `prevEduDate` date NOT NULL,
  `prevEduCity` varchar(30) NOT NULL,
  `prevEduCountry` varchar(30) NOT NULL,
  `matricDate` date NOT NULL,
  `matricBoard` varchar(100) NOT NULL,
  `matricTotalMarks` int NOT NULL,
  `matricObtainedMarks` int NOT NULL,
  `interDate` date NOT NULL,
  `interBoard` varchar(100) NOT NULL,
  `interTotalMarks` int NOT NULL,
  `interObtainedMarks` int NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edu_info`
--

LOCK TABLES `edu_info` WRITE;
/*!40000 ALTER TABLE `edu_info` DISABLE KEYS */;
INSERT INTO `edu_info` VALUES ('ahmed.mujtaba@basecampdata.com','ahmed','2020-03-04','matli','Pakistan','2020-04-04','Hyderabad Sindh',-2,-2,'2019-03-03','Hyderabad Board',-2,-2);
/*!40000 ALTER TABLE `edu_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `email` varchar(50) NOT NULL,
  `program` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES ('ahmed.mujtaba@basecampdata.com','BSSE');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submitted`
--

DROP TABLE IF EXISTS `submitted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submitted` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'submitted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submitted`
--

LOCK TABLES `submitted` WRITE;
/*!40000 ALTER TABLE `submitted` DISABLE KEYS */;
INSERT INTO `submitted` VALUES (1,'ahmed.mujtaba@basecampdata.com','2021-05-05','submitted');
/*!40000 ALTER TABLE `submitted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertable`
--

LOCK TABLES `usertable` WRITE;
/*!40000 ALTER TABLE `usertable` DISABLE KEYS */;
INSERT INTO `usertable` VALUES (1,'ahmed','mujtaba.nix@gmail.com','$2y$10$A6pPoaTeK3kd7nXuLhmC.ej1PzaTbYP.EvxGUY02vFB0DtAwDnLAC',0,'verified'),(2,'mustafa','mujtaba_niz@live.com','$2y$10$u97wEmWxfLSEQBsjzfwClO.uZ3iaL/Nfj8RcvfIVCq1RQ9OGJr/yC',0,'verified'),(3,'ahmed','ahmed.mujtaba@basecampdata.com','$2y$10$00WtNI3vdUWE9sOxXaOgFO5BweWYlWGFr.5YWA2alP3J8TMJOayw2',0,'verified');
/*!40000 ALTER TABLE `usertable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-05 23:51:55
