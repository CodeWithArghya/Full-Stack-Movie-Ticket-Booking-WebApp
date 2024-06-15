-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: movie_ticket
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `admin_account`
--

DROP TABLE IF EXISTS `admin_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_account` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_account`
--

LOCK TABLES `admin_account` WRITE;
/*!40000 ALTER TABLE `admin_account` DISABLE KEYS */;
INSERT INTO `admin_account` VALUES (1,'admin@admin.com','$2y$10$yfXdQMxeUGv7w1XosoM3PO6WUCzoFHT/3WybXNL5p2CrULd4/G.4C');
/*!40000 ALTER TABLE `admin_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `emergency_contact` varchar(20) NOT NULL,
  `age` int NOT NULL,
  `address` text NOT NULL,
  `seat_number` int NOT NULL DEFAULT '0',
  `booking_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost_per_head` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ticket_quantity` int NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (24,'Jawan (Hindi)','Arghyadip Karmakar','codewitharghya0@gmail.com','06295717932','6295717932',21,'VILL- KOTULPUR, P.O- KOTULPUR, P.S- KOTULPUR, DIST- BANKURA, PIN- 72241, WEST BENGAL',0,'2023-09-24 20:43:17',0.00,1000.00,2);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `userType` enum('registered','nonregistered') NOT NULL,
  `problemType` enum('loginissue','bookingissue','query','others') NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (2,'Arghyadip Karmakar','codewitharghya0@gmail.com','06295717932','registered','others','Demo');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `time` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost_per_head` decimal(10,2) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (2,'Jawan (Hindi)','2023-09-26','Kolkata INOX','06.00 PM',500.00,500.00),(3,'Chander Pahar (Bengali)','2023-09-28','Siliguri INOX Cinema','06.00 PM',450.00,450.00),(4,'3 Idiots (Hindi)','2023-10-02','Asansol Eylex Cinema','7.00 PM',450.00,450.00),(5,'Pathaan(Hindi)	','2023-10-18','Durgapur Carnival Cinemas','05.00 PM',500.00,500.00);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `paymentname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `ticketid` int NOT NULL,
  `transaction` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'Demo','demo123@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(2,'Demo','demo123@gmail.com',500.00,0,'xz zc  c'),(3,'Demo','demo123@gmail.com',500.00,0,'xz zc  c'),(4,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(5,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(6,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(7,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(8,'Demo','arghyadipkarmakar2u@gmail.com',1500.00,524856,'252125415541'),(9,'Demo','arghyadipkarmakar2u@gmail.com',1500.00,524856,'252125415541'),(10,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(11,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(12,'Demo','arghyadipkarmakar2u@gmail.com',500.00,0,'0000BBVGHBHBNHV00000'),(13,'Demo','arghyadipkarmakar2u@gmail.com',1500.00,0,'0000BBVGHBHBNHV00000'),(14,'Demo','arghyadipkarmakar2u@gmail.com',1500.00,7676,'0000BBVGHBHBNHV00000'),(15,'Demo','arghyadipkarmakar2u@gmail.com',1500.00,7676,'0000BBVGHBHBNHV00000'),(16,'ARghyadip Karmakar','arghyadipkarmakar2u@gmail.com',1000.00,123456,'45212005JYH545');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `country` enum('in','bd','np','bh','us','au','other') NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_account`
--

LOCK TABLES `user_account` WRITE;
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` VALUES (1,'test@gmail.com','Test@123','Test','00000000','in','male','2002-03-08'),(2,'arghya@gmail.com','$2y$10$Xw5AFpANnY2MzbXgmoOMTu3wDKQSph/3MPCN1HKjXdzfHjXf1nQ32','ARGHYADIP KARMAKAR','6295717932','in','male','2002-03-08'),(3,'arghyadipkarmakar2u@gmail.com','$2y$10$symv/XTDnWeSa84ul/FumOI4B9vqXYTSj/sf9MkdsEYya9YEIGiKy','Arghyadip Karmakar','6295717932','in','male','2002-03-08');
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-24 20:52:39
