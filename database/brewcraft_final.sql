-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: coffeeshop
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (5,3,'Cold Brews'),(6,3,'Quick Bites'),(7,5,'Hot Coffee'),(8,5,'Cold Brews'),(9,5,'Bakery'),(10,6,'Hot Coffee'),(11,6,'Cold Brews'),(12,6,'Bakery'),(13,7,'Hot Coffee'),(14,7,'Cold Brews'),(15,7,'Bakery'),(16,8,'Hot Coffee'),(17,8,'Cold Brews'),(18,8,'Bakery'),(19,9,'Hot Coffee'),(20,9,'Cold Brews'),(21,9,'Bakery'),(22,10,'Hot Coffee'),(23,10,'Cold Brews'),(24,10,'Bakery'),(25,11,'Hot Coffee'),(26,11,'Cold Brews'),(27,11,'Bakery'),(28,12,'Hot Coffee'),(29,12,'Cold Brews'),(30,12,'Bakery'),(31,13,'Hot Coffee'),(32,13,'Cold Brews'),(33,13,'Bakery'),(34,14,'Hot Coffee'),(35,14,'Cold Brews'),(36,14,'Bakery'),(37,4,'Hot Beverages'),(38,4,'Snacks');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (3,3,9,1,200.00),(4,4,9,1,200.00);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address` text DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','accepted','preparing','ready','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (3,10,NULL,3,200.00,'completed','2026-05-30 06:17:39'),(4,10,'SahakarNagar',3,200.00,'ready','2026-05-30 06:27:53');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT 'default_product.jpg',
  `in_stock` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (9,3,5,'Signature Cold Brew','Steeped for 24 hours for a smooth finish.',200.00,'cappuccino.png',1),(10,3,5,'Vanilla Iced Latte','Espresso, milk, and vanilla syrup over ice.',190.00,'cappuccino.png',1),(11,3,6,'Peri Peri Fries','Crispy fries tossed in spicy peri peri mix.',120.00,'cheesecake.png',1),(12,3,6,'Grilled Sandwich','Stuffed with veggies, cheese and green chutney.',110.00,'cheesecake.png',1),(13,5,7,'Classic Espresso',NULL,145.00,'iced_coffee.png',1),(14,5,7,'Cappuccino',NULL,205.00,'iced_coffee.png',1),(15,5,7,'Cafe Latte',NULL,215.00,'iced_coffee.png',1),(16,5,8,'Iced Americano',NULL,175.00,'cappuccino.png',1),(17,5,8,'Frappuccino',NULL,275.00,'iced_coffee.png',1),(18,5,9,'Butter Croissant',NULL,135.00,'cheesecake.png',1),(19,5,9,'Blueberry Muffin',NULL,165.00,'croissant.png',1),(20,5,9,'Choco Chip Cookie',NULL,115.00,'croissant.png',1),(21,6,10,'Classic Espresso',NULL,150.00,'dummy_coffee.png',1),(22,6,10,'Cappuccino',NULL,210.00,'dummy_coffee.png',1),(23,6,10,'Cafe Latte',NULL,220.00,'iced_coffee.png',1),(24,6,11,'Iced Americano',NULL,180.00,'dummy_coffee.png',1),(25,6,11,'Frappuccino',NULL,280.00,'iced_coffee.png',1),(26,6,12,'Butter Croissant',NULL,140.00,'croissant.png',1),(27,6,12,'Blueberry Muffin',NULL,170.00,'dummy_pastry.png',1),(28,6,12,'Choco Chip Cookie',NULL,120.00,'cheesecake.png',1),(29,7,13,'Classic Espresso',NULL,155.00,'iced_coffee.png',1),(30,7,13,'Cappuccino',NULL,215.00,'cappuccino.png',1),(31,7,13,'Cafe Latte',NULL,225.00,'iced_coffee.png',1),(32,7,14,'Iced Americano',NULL,185.00,'dummy_coffee.png',1),(33,7,14,'Frappuccino',NULL,285.00,'dummy_coffee.png',1),(34,7,15,'Butter Croissant',NULL,145.00,'croissant.png',1),(35,7,15,'Blueberry Muffin',NULL,175.00,'cheesecake.png',1),(36,7,15,'Choco Chip Cookie',NULL,125.00,'dummy_pastry.png',1),(37,8,16,'Classic Espresso',NULL,160.00,'dummy_coffee.png',1),(38,8,16,'Cappuccino',NULL,220.00,'cappuccino.png',1),(39,8,16,'Cafe Latte',NULL,230.00,'cappuccino.png',1),(40,8,17,'Iced Americano',NULL,190.00,'iced_coffee.png',1),(41,8,17,'Frappuccino',NULL,290.00,'iced_coffee.png',1),(42,8,18,'Butter Croissant',NULL,150.00,'cheesecake.png',1),(43,8,18,'Blueberry Muffin',NULL,180.00,'dummy_pastry.png',1),(44,8,18,'Choco Chip Cookie',NULL,130.00,'cheesecake.png',1),(45,9,19,'Classic Espresso',NULL,165.00,'dummy_coffee.png',1),(46,9,19,'Cappuccino',NULL,225.00,'iced_coffee.png',1),(47,9,19,'Cafe Latte',NULL,235.00,'dummy_coffee.png',1),(48,9,20,'Iced Americano',NULL,195.00,'iced_coffee.png',1),(49,9,20,'Frappuccino',NULL,295.00,'dummy_coffee.png',1),(50,9,21,'Butter Croissant',NULL,155.00,'croissant.png',1),(51,9,21,'Blueberry Muffin',NULL,185.00,'croissant.png',1),(52,9,21,'Choco Chip Cookie',NULL,135.00,'dummy_pastry.png',1),(53,10,22,'Classic Espresso',NULL,170.00,'dummy_coffee.png',1),(54,10,22,'Cappuccino',NULL,230.00,'iced_coffee.png',1),(55,10,22,'Cafe Latte',NULL,240.00,'dummy_coffee.png',1),(56,10,23,'Iced Americano',NULL,200.00,'dummy_coffee.png',1),(57,10,23,'Frappuccino',NULL,300.00,'dummy_coffee.png',1),(58,10,24,'Butter Croissant',NULL,160.00,'cheesecake.png',1),(59,10,24,'Blueberry Muffin',NULL,190.00,'dummy_pastry.png',1),(60,10,24,'Choco Chip Cookie',NULL,140.00,'cheesecake.png',1),(61,11,25,'Classic Espresso',NULL,175.00,'dummy_coffee.png',1),(62,11,25,'Cappuccino',NULL,235.00,'iced_coffee.png',1),(63,11,25,'Cafe Latte',NULL,245.00,'dummy_coffee.png',1),(64,11,26,'Iced Americano',NULL,205.00,'iced_coffee.png',1),(65,11,26,'Frappuccino',NULL,305.00,'cappuccino.png',1),(66,11,27,'Butter Croissant',NULL,165.00,'dummy_pastry.png',1),(67,11,27,'Blueberry Muffin',NULL,195.00,'dummy_pastry.png',1),(68,11,27,'Choco Chip Cookie',NULL,145.00,'croissant.png',1),(69,12,28,'Classic Espresso',NULL,180.00,'cappuccino.png',1),(70,12,28,'Cappuccino',NULL,240.00,'iced_coffee.png',1),(71,12,28,'Cafe Latte',NULL,250.00,'iced_coffee.png',1),(72,12,29,'Iced Americano',NULL,210.00,'iced_coffee.png',1),(73,12,29,'Frappuccino',NULL,310.00,'cappuccino.png',1),(74,12,30,'Butter Croissant',NULL,170.00,'cheesecake.png',1),(75,12,30,'Blueberry Muffin',NULL,200.00,'cheesecake.png',1),(76,12,30,'Choco Chip Cookie',NULL,150.00,'cheesecake.png',1),(77,13,31,'Classic Espresso',NULL,185.00,'dummy_coffee.png',1),(78,13,31,'Cappuccino',NULL,245.00,'dummy_coffee.png',1),(79,13,31,'Cafe Latte',NULL,255.00,'cappuccino.png',1),(80,13,32,'Iced Americano',NULL,215.00,'iced_coffee.png',1),(81,13,32,'Frappuccino',NULL,315.00,'cappuccino.png',1),(82,13,33,'Butter Croissant',NULL,175.00,'dummy_pastry.png',1),(83,13,33,'Blueberry Muffin',NULL,205.00,'cheesecake.png',1),(84,13,33,'Choco Chip Cookie',NULL,155.00,'croissant.png',1),(85,14,34,'Classic Espresso',NULL,190.00,'cappuccino.png',1),(86,14,34,'Cappuccino',NULL,250.00,'cappuccino.png',1),(87,14,34,'Cafe Latte',NULL,260.00,'iced_coffee.png',1),(88,14,35,'Iced Americano',NULL,220.00,'iced_coffee.png',1),(89,14,35,'Frappuccino',NULL,320.00,'iced_coffee.png',1),(90,14,36,'Butter Croissant',NULL,180.00,'croissant.png',1),(91,14,36,'Blueberry Muffin',NULL,210.00,'dummy_pastry.png',1),(92,14,36,'Choco Chip Cookie',NULL,160.00,'cheesecake.png',1),(93,4,37,'Authentic Filter Coffee',NULL,60.00,'dummy_coffee.png',1),(94,4,37,'Irani Chai',NULL,40.00,'dummy_coffee.png',1),(95,4,38,'Bun Maska',NULL,50.00,'dummy_pastry.png',1),(96,4,38,'Kanda Poha',NULL,45.00,'dummy_pastry.png',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT 'default_logo.png',
  `banner` varchar(255) DEFAULT 'default_banner.jpg',
  `theme_color` varchar(20) DEFAULT '#4a3320',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (3,8,'Viman Nagar Coffee House','Your friendly neighborhood cafe for cold brews and snacks.','Datta Mandir Chowk, Viman Nagar, Pune, Maharashtra 411014','+91 8000033333','dummy_logo.png','dummy_banner.png','#CD853F','2026-05-30 04:28:40'),(4,6,'FC Road Roasters','Authentic filter coffee and fresh bakes on FC Road.','Fergusson College Rd, Shivajinagar, Pune, Maharashtra 411004','+91 8000011111','minimal_logo.png','modern_cafe_banner.png','#8B4513','2026-05-30 05:46:21'),(5,12,'The Daily Grind','Your daily dose of caffeine.','123 Main St, Pune','9876543001','vintage_logo.png','modern_cafe_banner.png','#2c3e50','2026-05-30 05:46:44'),(6,13,'Brew & Co','Premium handcrafted brews.','456 MG Road, Pune','9876543002','dummy_logo.png','modern_cafe_banner.png','#8e44ad','2026-05-30 05:46:44'),(7,14,'Morning Roast','Start your day the right way.','789 KP, Pune','9876543003','vintage_logo.png','modern_cafe_banner.png','#d35400','2026-05-30 05:46:44'),(8,15,'Cafe Mocha','Chocolate and coffee combined.','101 Baner, Pune','9876543004','minimal_logo.png','vintage_cafe_banner.png','#7f8c8d','2026-05-30 05:46:44'),(9,16,'Urban Bean','The city\'s finest beans.','202 Viman Nagar, Pune','9876543005','dummy_logo.png','modern_cafe_banner.png','#16a085','2026-05-30 05:46:44'),(10,17,'Central Perk','Where friends meet.','303 Aundh, Pune','9876543006','minimal_logo.png','modern_cafe_banner.png','#e74c3c','2026-05-30 05:46:44'),(11,18,'Beans & Leaves','Organic coffee and tea.','404 Kothrud, Pune','9876543007','minimal_logo.png','dummy_banner.png','#27ae60','2026-05-30 05:46:44'),(12,19,'Espresso Express','Fast, hot, and delicious.','505 FC Road, Pune','9876543008','minimal_logo.png','modern_cafe_banner.png','#2980b9','2026-05-30 05:46:44'),(13,20,'The Roastery','Freshly roasted every day.','606 Wakad, Pune','9876543009','vintage_logo.png','vintage_cafe_banner.png','#c0392b','2026-05-30 05:46:44'),(14,21,'Sugar & Spice Cafe','Sweet treats and spicy brews.','707 Hinjewadi, Pune','9876543010','vintage_logo.png','dummy_banner.png','#f39c12','2026-05-30 05:46:44'),(15,7,'Priya Kulkarni\'s Shop',NULL,NULL,NULL,'default_logo.png','default_banner.jpg','#4a3320','2026-05-30 06:18:17');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','owner','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Rahul Deshmukh','rahul@fcroad.com','$2y$10$OqegV/6Y.v5zhGMQ4TY0OefSueZnNvnar2.6wTbgqfIHAFH2Lj4US','owner','2026-05-30 04:28:40','Shivajinagar, Pune','+91 9876543210'),(7,'Priya Kulkarni','priya@kpcafe.com','$2y$10$OqegV/6Y.v5zhGMQ4TY0OefSueZnNvnar2.6wTbgqfIHAFH2Lj4US','owner','2026-05-30 04:28:40','Koregaon Park, Pune','+91 9876543211'),(8,'Amit Joshi','amit@vimannagar.com','$2y$10$OqegV/6Y.v5zhGMQ4TY0OefSueZnNvnar2.6wTbgqfIHAFH2Lj4US','owner','2026-05-30 04:28:40','Viman Nagar, Pune','+91 9876543212'),(9,'Ramesh Patwardhan','ramesh@example.com','$2y$10$OqegV/6Y.v5zhGMQ4TY0OefSueZnNvnar2.6wTbgqfIHAFH2Lj4US','customer','2026-05-30 04:28:40','Kothrud, Pune','+91 9998887776'),(10,'Sneha Shinde','sneha@example.com','$2y$10$OqegV/6Y.v5zhGMQ4TY0OefSueZnNvnar2.6wTbgqfIHAFH2Lj4US','customer','2026-05-30 04:28:40','SahakarNagar',''),(11,'Super Admin','admin@brewcraft.com','$2y$10$qlm/KFJVbUiEtK7sQxBfVebcTyh1sfLx.FT3lyE./cqgpy.hY3zcW','admin','2026-05-30 04:54:50',NULL,NULL),(12,'Sarah Connor','owner1@dailygrind.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','123 Main St, Pune','9876543001'),(13,'John Wick','owner2@brewco.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','456 MG Road, Pune','9876543002'),(14,'Bruce Wayne','owner3@morningroast.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','789 KP, Pune','9876543003'),(15,'Clark Kent','owner4@cafemocha.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','101 Baner, Pune','9876543004'),(16,'Tony Stark','owner5@urbanbean.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','202 Viman Nagar, Pune','9876543005'),(17,'Rachel Green','owner6@centralperk.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','303 Aundh, Pune','9876543006'),(18,'Peter Parker','owner7@beansleaves.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','404 Kothrud, Pune','9876543007'),(19,'Barry Allen','owner8@espressoexpress.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','505 FC Road, Pune','9876543008'),(20,'Natasha Romanoff','owner9@theroastery.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','606 Wakad, Pune','9876543009'),(21,'Wanda Maximoff','owner10@sugarspice.com','$2y$10$wOlDdMagaeP2m.6FXa5m3Ow5.d75hlM/wM7rp5PJu.G3.DQctWCTq','owner','2026-05-30 05:46:44','707 Hinjewadi, Pune','9876543010');
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

-- Dump completed on 2026-05-30 12:28:35
