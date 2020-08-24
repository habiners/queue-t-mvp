-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: queue_t
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `appointmentID` int NOT NULL AUTO_INCREMENT,
  `userID` int DEFAULT NULL,
  `scheduleID` int DEFAULT NULL,
  `serviceID` int DEFAULT NULL,
  `isServing` tinyint(1) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`appointmentID`),
  KEY `userID` (`userID`),
  KEY `scheduleID` (`scheduleID`),
  KEY `serviceID` (`serviceID`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`scheduleID`) REFERENCES `schedule` (`scheduleID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,3,1,NULL,0,1,'2020-08-24 07:39:27','2020-08-24 07:39:27'),(2,5,4,NULL,0,1,'2020-08-24 08:36:09','2020-08-24 08:36:09');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business` (
  `businessID` int NOT NULL AUTO_INCREMENT,
  `businessName` varchar(50) NOT NULL,
  `userID` int DEFAULT NULL,
  `businessHoursID` int DEFAULT NULL,
  `businessCategoryID` int DEFAULT NULL,
  `serviceCategoryID` int DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`businessID`),
  UNIQUE KEY `businessName` (`businessName`),
  KEY `userID` (`userID`),
  KEY `businessHoursID` (`businessHoursID`),
  KEY `businessCategoryID` (`businessCategoryID`),
  KEY `serviceCategoryID` (`serviceCategoryID`),
  CONSTRAINT `business_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `business_ibfk_2` FOREIGN KEY (`businessHoursID`) REFERENCES `business_hours` (`businessHoursID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `business_ibfk_3` FOREIGN KEY (`businessCategoryID`) REFERENCES `business_category` (`businessCategoryID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `business_ibfk_4` FOREIGN KEY (`serviceCategoryID`) REFERENCES `service_category` (`serviceCategoryID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (1,'Vroom Groom',2,1,2,2,'Natalio B. Bacalso Ave.','business@gmail.com','123','Hallo','2020-08-24 07:01:01','2020-08-24 07:01:01'),(2,'Dent All',4,2,1,1,'Natalio B. Bacalso Ave.','business@gmail.com','09123456789','HIIIIII','2020-08-24 08:32:04','2020-08-24 08:32:04');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_category`
--

DROP TABLE IF EXISTS `business_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_category` (
  `businessCategoryID` int NOT NULL AUTO_INCREMENT,
  `businessCategory` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`businessCategoryID`),
  UNIQUE KEY `businessCategory` (`businessCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_category`
--

LOCK TABLES `business_category` WRITE;
/*!40000 ALTER TABLE `business_category` DISABLE KEYS */;
INSERT INTO `business_category` VALUES (1,'Health','2020-08-24 06:46:55','2020-08-24 06:46:55'),(2,'Grooming','2020-08-24 06:46:55','2020-08-24 06:46:55'),(3,'Pets','2020-08-24 06:46:55','2020-08-24 06:46:55');
/*!40000 ALTER TABLE `business_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_hours`
--

DROP TABLE IF EXISTS `business_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_hours` (
  `businessHoursID` int NOT NULL AUTO_INCREMENT,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `sunday` tinyint(1) NOT NULL,
  `scheduleName` varchar(30) DEFAULT NULL,
  `businessOpen` time NOT NULL,
  `businessClose` time NOT NULL,
  `lunchStart` time NOT NULL,
  `lunchEnd` time NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`businessHoursID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_hours`
--

LOCK TABLES `business_hours` WRITE;
/*!40000 ALTER TABLE `business_hours` DISABLE KEYS */;
INSERT INTO `business_hours` VALUES (1,1,1,1,1,1,0,0,'Weekdays','07:00:00','18:00:00','12:00:00','13:00:00','2020-08-24 07:01:01','2020-08-24 07:03:59'),(2,1,1,1,1,1,1,1,'Everyday','07:00:00','18:00:00','12:00:00','13:00:00','2020-08-24 08:32:04','2020-08-24 08:32:40');
/*!40000 ALTER TABLE `business_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employeeID` int NOT NULL AUTO_INCREMENT,
  `serviceOfferedID` int DEFAULT NULL,
  `workerID` int DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`employeeID`),
  KEY `serviceOfferedID` (`serviceOfferedID`),
  KEY `workerID` (`workerID`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`serviceOfferedID`) REFERENCES `services_offered` (`serviceOfferedID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`workerID`) REFERENCES `worker` (`workerID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,1,1,1,'2020-08-24 07:27:59','2020-08-24 07:27:59'),(2,2,1,1,'2020-08-24 07:27:59','2020-08-24 07:27:59'),(3,1,2,1,'2020-08-24 07:45:24','2020-08-24 07:45:24'),(4,3,3,1,'2020-08-24 08:33:45','2020-08-24 08:33:45'),(5,4,3,1,'2020-08-24 08:33:45','2020-08-24 08:33:45'),(6,4,4,1,'2020-08-24 08:33:59','2020-08-24 08:33:59');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule` (
  `scheduleID` int NOT NULL AUTO_INCREMENT,
  `workerID` int DEFAULT NULL,
  `timeStart` timestamp NULL DEFAULT NULL,
  `timeEnd` timestamp NULL DEFAULT NULL,
  `isOpen` tinyint(1) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`scheduleID`),
  KEY `workerID` (`workerID`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`workerID`) REFERENCES `worker` (`workerID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,1,'2020-08-24 00:00:00','2020-08-24 01:20:00',0,'2020-08-24 07:28:09','2020-08-24 07:28:09'),(2,1,'2020-08-24 02:00:00','2020-08-24 03:20:00',1,'2020-08-24 07:38:52','2020-08-24 07:38:52'),(3,2,'2020-08-24 06:00:00','2020-08-24 07:05:00',1,'2020-08-24 07:45:52','2020-08-24 07:45:52'),(4,3,'2020-08-24 02:00:00','2020-08-24 03:05:00',0,'2020-08-24 08:34:20','2020-08-24 08:34:20'),(5,4,'2020-08-24 02:00:00','2020-08-24 02:45:00',1,'2020-08-24 08:34:35','2020-08-24 08:34:35');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `serviceID` int NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(50) NOT NULL,
  `serviceDuration` time DEFAULT NULL,
  `cleaningDuration` time DEFAULT NULL,
  `startingPrice` float DEFAULT NULL,
  `endingPrice` float DEFAULT NULL,
  `maxClients` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Cleaning','00:45:00','00:20:00',100,250,5,'Cleaning is...','2020-08-24 07:04:23','2020-08-24 07:04:23'),(2,'Italian Pasta','01:00:00','00:20:00',255,1000,5,'Lami ang pasta','2020-08-24 07:04:48','2020-08-24 07:04:48'),(3,'Italian Pasta','00:45:00','00:20:00',1000,1000000000,5,'Details','2020-08-24 08:33:08','2020-08-24 08:33:08'),(4,'Cleaning','00:30:00','00:15:00',125,255,5,'Yes','2020-08-24 08:33:22','2020-08-24 08:33:22');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_category`
--

DROP TABLE IF EXISTS `service_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_category` (
  `serviceCategoryID` int NOT NULL AUTO_INCREMENT,
  `serviceCategory` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`serviceCategoryID`),
  UNIQUE KEY `serviceCategory` (`serviceCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_category`
--

LOCK TABLES `service_category` WRITE;
/*!40000 ALTER TABLE `service_category` DISABLE KEYS */;
INSERT INTO `service_category` VALUES (1,'Dental','2020-08-24 06:46:55','2020-08-24 06:46:55'),(2,'Mental','2020-08-24 06:46:55','2020-08-24 06:46:55'),(3,'Pedia','2020-08-24 06:46:56','2020-08-24 06:46:56');
/*!40000 ALTER TABLE `service_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_offered`
--

DROP TABLE IF EXISTS `services_offered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services_offered` (
  `serviceOfferedID` int NOT NULL AUTO_INCREMENT,
  `businessID` int DEFAULT NULL,
  `serviceID` int DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`serviceOfferedID`),
  KEY `businessID` (`businessID`),
  KEY `serviceID` (`serviceID`),
  CONSTRAINT `services_offered_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `business` (`businessID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `services_offered_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_offered`
--

LOCK TABLES `services_offered` WRITE;
/*!40000 ALTER TABLE `services_offered` DISABLE KEYS */;
INSERT INTO `services_offered` VALUES (1,1,1,'2020-08-24 07:04:23','2020-08-24 07:04:23'),(2,1,2,'2020-08-24 07:04:48','2020-08-24 07:04:48'),(3,2,3,'2020-08-24 08:33:08','2020-08-24 08:33:08'),(4,2,4,'2020-08-24 08:33:22','2020-08-24 08:33:22');
/*!40000 ALTER TABLE `services_offered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'123','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','FN','LN','MN','2020-08-24','M','123@gmail.com','123','2020-08-24 07:01:01','2020-08-24 07:01:01'),(3,'User','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','123','456','789','2020-08-25','M','','09123456789','2020-08-24 07:07:58','2020-08-24 07:07:58'),(4,'Accenture','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','Acts','Chair','Scent','2020-08-24','M','1@gmail.com','09123456789','2020-08-24 08:32:04','2020-08-24 08:32:04'),(5,'Jav','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','Javin','Tan','Stefan','2020-08-01','M','javin.tan37@gmail.com','09123456789','2020-08-24 08:34:57','2020-08-24 08:34:57');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worker` (
  `workerID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NOT NULL,
  PRIMARY KEY (`workerID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,'Latom','Matol','2020-08-24 07:27:58','2020-08-24 07:27:58'),(2,'Ice ice','Baby','2020-08-24 07:45:24','2020-08-24 07:45:24'),(3,'Nio','Marupok','2020-08-24 08:33:45','2020-08-24 08:33:45'),(4,'Aneehs','Ashton','2020-08-24 08:33:59','2020-08-24 08:33:59');
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-24 20:01:47
