-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: GroceryStore
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `contact_info` varchar(200) NOT NULL,
  `purchase_history` text DEFAULT NULL,
  `contract_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES
(1001,'Іван Іваненко','ivan.ivanenko@gmail.com','Яблука, Хліб, Груши','КН1001'),
(1002,'Марія Шевченко','m.scevchenko@mail.ua','Молоко, Банани','КН1002'),
(1003,'Петро Петренко','petro.petrenko@gmail.com','Апельсиновий сік','КН1003'),
(1004,'Олена Ковальчук','elena.kov@gmail.com','Печиво','КН1004'),
(1005,'Олександр Бойко','alex.boyko@mail.ua','Вода','КН1005'),
(1006,'Наталія Ткаченко','natalia.takchenko@gmail.com','Морква','КН1006'),
(1007,'Василь Кравченко','vasyl.kravchenko@mail.ua','Картопля','КН1007'),
(1008,'Галина Овчаренко','galyna.ovcharenko@gmail.com','Яйця, Молоко','КН1008'),
(1009,'Микола Коваль','mykola.koval@mail.ua','Хліб, Вода','КН1009'),
(1010,'Інна Дорошенко','inna.doroschenko@gmail.com','Сметана','КН1010'),
(1011,'Олег Чорний','oleg.chronyi@gmail.com','Банани, Морква','КН1011');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category` varchar(50) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(101,'Груши',0.50,'Фрукти',200,'2024-12-01',201),
(102,'Булочки з маком',1.30,'Випічка',150,'2024-11-15',202),
(103,'Молоко',1.00,'Молочні',180,'2024-11-10',203),
(104,'Апельсиновий сік',2.50,'Напої',75,'2025-01-01',204),
(105,'Банани',0.75,'Фрукти',120,'2024-12-05',201),
(106,'Печиво',1.50,'Випічка',90,'2024-11-30',202),
(107,'Сметана',1.25,'Молочні',70,'2024-11-20',203),
(108,'Вода',0.30,'Напої',300,'2025-02-01',204),
(109,'Морква',0.40,'Овочі',220,'2024-12-10',205),
(110,'Картопля',0.35,'Овочі',250,'2024-12-15',205),
(111,'Яйця',1.80,'Молочні',140,'2024-11-25',203),
(114,'Яблука',1.50,'Фрукти',250,'2024-12-27',NULL),
(115,'Тестовий Товар',2.00,'Фрукти',0,'2024-12-30',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `contact_info` varchar(200) DEFAULT NULL,
  `last_supply_date` date DEFAULT NULL,
  `cooperation_history` text DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES
(201,'Свіжі фрукти','info_order@svizhifryktu.com','2024-10-25','Постачання фруктів до магазину'),
(202,'Хлібний Край','contact@hlibnykray@.com','2024-10-30','Постачання випічки'),
(203,'Молочарня','support@molocharnya.com','2024-10-20','Поставляє молочні продукти'),
(204,'Світ соків','sales@soky.com','2024-10-15','Поставляє продукти'),
(205,'Овочі України','vegetables.ukraine@gmail.com','2024-10-28','Постачання овочів'),
(206,'Вітамін С','vitamin-c@mail.ua','2024-10-30','Постачання апельсинів'),
(207,'Продукти Закарпаття','zakarpattya.prod@gmail.com','2024-10-18','Постачання продуктів'),
(208,'Чиста вод','cleanwater@mail.com','2024-10-22','Постачання води'),
(209,'Ферма Ягідка','yagidka.farm@gmail.com','2024-10-26',' Постачання ягід'),
(210,'Здоровий овоч','healthyveggie@ukr.net','2024-10-12','Постачання екологічних овочів'),
(211,'Гармонія молока','milkharmony@gmail.com','2024-10-29','Постачання молочних продуктів');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supply_orders`
--

DROP TABLE IF EXISTS `supply_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supply_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `contract_number` varchar(50) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `planned_delivery` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `supply_orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supply_orders`
--

LOCK TABLES `supply_orders` WRITE;
/*!40000 ALTER TABLE `supply_orders` DISABLE KEYS */;
INSERT INTO `supply_orders` VALUES
(1,'Іван Іваненко','вул. Лесі Українки, 23','+380638097754','КН1001','2024-11-01',101,5),
(2,'Марія Шевченко','вул. Шевченка, 15','+380967650912','КН1002','2024-11-02',102,3),
(3,'Петро Петренко','вул. Грушевського, 7','+380503456789','КН1003','2024-11-03',103,2),
(4,'Олена Ковальчук','просп. Перемоги, 10','+380504567890','КН1004','2024-11-04',104,4),
(5,'Олександр Бойко','вул. Січових Стрільців, 1','+380505678901','КН1005','2024-11-05',105,1),
(6,'Наталія Ткаченко','вул. Академіка Корольова, 20','+380506789012','КН1006','2024-11-06',106,6),
(7,'Василь Кравченко','вул. Миру, 30','+380507890123','КН1007','2024-11-07',107,7),
(8,'Галина Овчаренко','просп. Волі, 50','+380508901234','КН1008','2024-11-08',108,2),
(9,'Микола Коваль','вул. Київська, 8','+380509012345','КН1009','2024-11-09',109,5),
(10,'Інна Дорошенко','вул. Героїв УПА, 9','+380501123456','КН1010','2024-11-10',110,3),
(11,'Олег Чорний','вул. Лятошинського, 22','+380502234567','КН1011','2024-11-11',111,4);
/*!40000 ALTER TABLE `supply_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES
(1,101,'2024-11-01',1001),
(2,102,'2024-11-02',1002),
(3,103,'2024-11-03',1003),
(4,104,'2024-11-04',1004),
(5,105,'2024-11-05',1005),
(6,106,'2024-11-06',1006),
(7,107,'2024-11-07',1007),
(8,108,'2024-11-08',1008),
(9,109,'2024-11-09',1009),
(10,110,'2024-11-10',1010),
(11,111,'2024-11-11',1011);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'LoneryWarrior','$2y$10$HKTqil.71cPEdChS8X2JL.hnwuOSL4Xc7gjMTatjYeOhiRwg1MY0G'),
(2,'q','$2y$10$CuxKWDCIa.rWCWOAb/s5CuCEn4zSqDZ/8/0FAEp8bHJ7UfAlAg5jm'),
(3,'Danil','$2y$10$JfWknmdfgXVi8PMYVuSAo.7.5KZaE6R6hV.3jIofrP07.d3KenYc.'),
(7,'Admin','$2y$10$m2hNXzMqjVvxw5IrBADvEelvzlADDismcu2sxzjnnpyVH0JrLXnj2');
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

-- Dump completed on 2024-12-16 15:56:23
