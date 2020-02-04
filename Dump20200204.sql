-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: 192.168.8.8    Database: druckshop
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_back_cover`
--

DROP TABLE IF EXISTS `ps_back_cover`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_back_cover` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `back_cover` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_back_cover`
--

LOCK TABLES `ps_back_cover` WRITE;
/*!40000 ALTER TABLE `ps_back_cover` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_back_cover` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_billing_address`
--

DROP TABLE IF EXISTS `ps_billing_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_billing_address` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `order_id` bigint(11) DEFAULT NULL,
  `house_no` varchar(45) DEFAULT NULL,
  `street_address` text,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `same_as_shipping` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_billing_address`
--

LOCK TABLES `ps_billing_address` WRITE;
/*!40000 ALTER TABLE `ps_billing_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_billing_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_cd_bag`
--

DROP TABLE IF EXISTS `ps_cd_bag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_cd_bag` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `bag` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_cd_bag`
--

LOCK TABLES `ps_cd_bag` WRITE;
/*!40000 ALTER TABLE `ps_cd_bag` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_cd_bag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_cover_color`
--

DROP TABLE IF EXISTS `ps_cover_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_cover_color` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_cover_color`
--

LOCK TABLES `ps_cover_color` WRITE;
/*!40000 ALTER TABLE `ps_cover_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_cover_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_cover_sheet`
--

DROP TABLE IF EXISTS `ps_cover_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_cover_sheet` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sheet` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_cover_sheet`
--

LOCK TABLES `ps_cover_sheet` WRITE;
/*!40000 ALTER TABLE `ps_cover_sheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_cover_sheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_data_check`
--

DROP TABLE IF EXISTS `ps_data_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_data_check` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `check_list` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_data_check`
--

LOCK TABLES `ps_data_check` WRITE;
/*!40000 ALTER TABLE `ps_data_check` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_data_check` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_delivery_service`
--

DROP TABLE IF EXISTS `ps_delivery_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_delivery_service` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `delivery_service` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_delivery_service`
--

LOCK TABLES `ps_delivery_service` WRITE;
/*!40000 ALTER TABLE `ps_delivery_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_delivery_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_discount`
--

DROP TABLE IF EXISTS `ps_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_discount` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `by_price` double(9,4) DEFAULT NULL,
  `by_percent` double(9,4) DEFAULT NULL,
  `needs_code` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_discount`
--

LOCK TABLES `ps_discount` WRITE;
/*!40000 ALTER TABLE `ps_discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_frequently_asked_question`
--

DROP TABLE IF EXISTS `ps_frequently_asked_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_frequently_asked_question` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` text,
  `text_german` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_frequently_asked_question`
--

LOCK TABLES `ps_frequently_asked_question` WRITE;
/*!40000 ALTER TABLE `ps_frequently_asked_question` DISABLE KEYS */;
INSERT INTO `ps_frequently_asked_question` VALUES (1,' Collapsible Group Item #1',NULL,'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',NULL,1,NULL,NULL),(2,' Collapsible Group Item #2',NULL,'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',NULL,1,NULL,NULL),(3,' Collapsible Group Item #3',NULL,'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.',NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `ps_frequently_asked_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_kind_list`
--

DROP TABLE IF EXISTS `ps_kind_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_kind_list` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_kind_list`
--

LOCK TABLES `ps_kind_list` WRITE;
/*!40000 ALTER TABLE `ps_kind_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_kind_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_letters_of_spine`
--

DROP TABLE IF EXISTS `ps_letters_of_spine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_letters_of_spine` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sheets_range_start` int(3) DEFAULT NULL,
  `sheets_range_end` int(3) DEFAULT NULL,
  `letters` varchar(45) DEFAULT NULL,
  `paper_weight_id` bigint(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delivery_service_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_letters_of_spine_1_idx` (`paper_weight_id`),
  KEY `fk_ps_letters_of_spine_2_idx` (`delivery_service_id`),
  CONSTRAINT `fk_ps_letters_of_spine_1` FOREIGN KEY (`paper_weight_id`) REFERENCES `ps_paper_weight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ps_letters_of_spine_2` FOREIGN KEY (`delivery_service_id`) REFERENCES `ps_delivery_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_letters_of_spine`
--

LOCK TABLES `ps_letters_of_spine` WRITE;
/*!40000 ALTER TABLE `ps_letters_of_spine` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_letters_of_spine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_news_letter`
--

DROP TABLE IF EXISTS `ps_news_letter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_news_letter` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_news_letter`
--

LOCK TABLES `ps_news_letter` WRITE;
/*!40000 ALTER TABLE `ps_news_letter` DISABLE KEYS */;
INSERT INTO `ps_news_letter` VALUES (1,'jjj',NULL,'2020-01-24 06:08:22','2020-01-24 06:08:22'),(2,'lll',1,'2020-01-24 06:09:04','2020-01-24 06:09:04'),(3,'jj',1,'2020-01-24 06:10:31','2020-01-24 06:10:31'),(4,'jjjj',1,'2020-01-24 06:12:03','2020-01-24 06:12:03'),(5,'kkk',1,'2020-01-24 06:12:12','2020-01-24 06:12:12'),(6,'lhk;jlk',1,'2020-01-24 06:13:09','2020-01-24 06:13:09'),(7,'fsgh',1,'2020-01-24 07:19:46','2020-01-24 07:19:46');
/*!40000 ALTER TABLE `ps_news_letter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_order`
--

DROP TABLE IF EXISTS `ps_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_order` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `order_number` varchar(45) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `shipper_id` varchar(45) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_id` bigint(11) DEFAULT NULL,
  `amount` int(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `priority` varchar(45) DEFAULT NULL,
  `assigned_to` varchar(45) DEFAULT NULL,
  `transaction_id` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_order_1_idx` (`user_id`),
  KEY `fk_ps_order_2_idx` (`product_id`),
  CONSTRAINT `fk_ps_order_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ps_order_2` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_order`
--

LOCK TABLES `ps_order` WRITE;
/*!40000 ALTER TABLE `ps_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_page_format`
--

DROP TABLE IF EXISTS `ps_page_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_page_format` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `page_format` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `can_add_din_A2` tinyint(4) DEFAULT NULL,
  `can_add_din_A3` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `max_pages_A2` int(5) DEFAULT NULL,
  `max_pages_A3` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_page_format`
--

LOCK TABLES `ps_page_format` WRITE;
/*!40000 ALTER TABLE `ps_page_format` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_page_format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_paper_weight`
--

DROP TABLE IF EXISTS `ps_paper_weight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_paper_weight` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `paper_weight` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_paper_weight`
--

LOCK TABLES `ps_paper_weight` WRITE;
/*!40000 ALTER TABLE `ps_paper_weight` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_paper_weight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_payment`
--

DROP TABLE IF EXISTS `ps_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_payment` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `payment_type` bigint(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amount` int(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `order_id` bigint(11) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `shipper_id` bigint(11) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_payment_1_idx` (`user_id`),
  KEY `fk_ps_payment_2_idx` (`product_id`),
  KEY `fk_ps_payment_3_idx` (`order_id`),
  CONSTRAINT `fk_ps_payment_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ps_payment_2` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ps_payment_3` FOREIGN KEY (`order_id`) REFERENCES `ps_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_payment`
--

LOCK TABLES `ps_payment` WRITE;
/*!40000 ALTER TABLE `ps_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_product`
--

DROP TABLE IF EXISTS `ps_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_product` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(256) DEFAULT NULL,
  `title_german` varchar(256) NOT NULL,
  `image_path` text NOT NULL,
  `short_description_english` text,
  `short_description_german` text NOT NULL,
  `description_english` text,
  `description_german` text NOT NULL,
  `product_page_url` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_product`
--

LOCK TABLES `ps_product` WRITE;
/*!40000 ALTER TABLE `ps_product` DISABLE KEYS */;
INSERT INTO `ps_product` VALUES (1,'Hardcover','','public/images/product1.jpg','For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00'),(2,'Softcover','','public/images/product2.jpg','Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00'),(3,'Thermal binding','','public/images/product3.jpg','The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00'),(4,'Spiral binding','','public/images/product4.jpg','The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00'),(5,'Printing with loose paper','','public/images/product4.jpg','The completely enclosing softcover made of fine cardboard - also called paperback - gives your thesis a high-quality, magazine-like look.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00'),(6,'Sample with 15 free pages','','public/images/product4.jpg','You just want to print out your work? No problem, with us you can even print and have your work tied up elsewhere.','','<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n','','',1,'2020-01-24 06:30:00','2020-01-24 06:30:00');
/*!40000 ALTER TABLE `ps_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_product_image`
--

DROP TABLE IF EXISTS `ps_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_product_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT NULL,
  `image_path` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_product_image_1_idx` (`product_id`),
  CONSTRAINT `fk_ps_product_image_1` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_product_image`
--

LOCK TABLES `ps_product_image` WRITE;
/*!40000 ALTER TABLE `ps_product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_shipping_address`
--

DROP TABLE IF EXISTS `ps_shipping_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_shipping_address` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `order_id` bigint(11) DEFAULT NULL,
  `house_no` varchar(45) DEFAULT NULL,
  `street_address` text,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `same_as_billing` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_shipping_address_1_idx` (`order_id`),
  CONSTRAINT `fk_ps_shipping_address_1` FOREIGN KEY (`order_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ps_shipping_address_2` FOREIGN KEY (`order_id`) REFERENCES `ps_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_shipping_address`
--

LOCK TABLES `ps_shipping_address` WRITE;
/*!40000 ALTER TABLE `ps_shipping_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `ps_shipping_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_slider`
--

DROP TABLE IF EXISTS `ps_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_slider` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `image_path` text,
  `is_active` tinyint(4) DEFAULT NULL,
  `is_slide` tinyint(4) DEFAULT NULL,
  `title_english` text NOT NULL,
  `title_german` text NOT NULL,
  `content_english` text NOT NULL,
  `content_german` text NOT NULL,
  `title_color` varchar(256) NOT NULL,
  `title_size` int(3) NOT NULL,
  `redirect_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_slider`
--

LOCK TABLES `ps_slider` WRITE;
/*!40000 ALTER TABLE `ps_slider` DISABLE KEYS */;
INSERT INTO `ps_slider` VALUES (1,'public/images/slide-01.png',1,1,'Slide 1','Slide 1','Title 1','Title 1','black',14,'','2020-01-23 13:30:00','2020-01-23 13:30:00'),(2,'public/images/slide-02.png',1,0,'Tittle_2','Tittle_2','Content_2','Content_2','black',14,'','2020-01-24 05:30:00','2020-01-24 05:30:00'),(3,'public/images/slide-03.png',1,0,'Tittle_3','Tittle_3','Content_3','Content_3','black',14,'','2020-01-24 05:30:00','2020-01-24 05:30:00'),(4,'public/images/slide-04.png',1,0,'Tittle_4','Tittle_4','Content_4','Content_4','black',14,'','2020-01-24 05:30:00','2020-01-24 05:30:00');
/*!40000 ALTER TABLE `ps_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'swati','swati.batra@trantorinc.com',NULL,'$2y$10$rovwe.f78eb4XXxV9R7k7.eN.XXsyhQ9QeeyCqLAga7Omy3kxupu2',NULL,'2020-01-14 01:06:26','2020-01-14 01:06:26');
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

-- Dump completed on 2020-02-04 12:06:04
