/*
Navicat MySQL Data Transfer

Source Server         : Druckshop_staging
Source Server Version : 50731
Source Host           : 192.168.8.8:3306
Source Database       : druckshop

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2020-10-01 19:18:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('swati.batra@trantorinc.com', '$2y$10$etHJosvboEVJewVZ5SemEOqTkHpaHETXNS5aayVhSaKLtxW1T6Rsu', '2020-05-05 08:52:38');

-- ----------------------------
-- Table structure for `ps_about`
-- ----------------------------
DROP TABLE IF EXISTS `ps_about`;
CREATE TABLE `ps_about` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` text,
  `text_german` text,
  `status` tinyint(4) DEFAULT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_about
-- ----------------------------
INSERT INTO `ps_about` VALUES ('1', 'Spiral Bindings', 'Spiralbindungen', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', 'public/images/product4.jpg', null, null, null);
INSERT INTO `ps_about` VALUES ('2', 'Spiral Bindings 2', 'Spiralbindungen 2', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', 'public/images/product4.jpg', null, null, null);

-- ----------------------------
-- Table structure for `ps_art_list`
-- ----------------------------
DROP TABLE IF EXISTS `ps_art_list`;
CREATE TABLE `ps_art_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `check_list` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_art_list
-- ----------------------------
INSERT INTO `ps_art_list` VALUES ('1', 'Classic', null, 'Classic', 'Klassik', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_art_list` VALUES ('2', 'Edition', null, 'Edition', 'Edition', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_back_cover`
-- ----------------------------
DROP TABLE IF EXISTS `ps_back_cover`;
CREATE TABLE `ps_back_cover` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `back_cover` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_back_cover
-- ----------------------------
INSERT INTO `ps_back_cover` VALUES ('1', 'Folie-matt', null, 'Foil matt', 'Folie-matt', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_back_cover` VALUES ('2', 'Folie-Klarsicht', null, 'Transparent film', 'Folie-Klarsicht', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_back_cover` VALUES ('3', 'Karton-Schwarz', null, 'Cardboard black', 'Karton-Schwarz', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_back_cover` VALUES ('4', 'Karton-Dunkelblau', null, 'Cardboard dark blue', 'Karton-Dunkelblau', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_back_cover` VALUES ('5', 'Eigenes Deckblatt mit Folie', null, 'Own back sheet with foil', 'Eigenes Deckblatt mit Folie', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_back_cover` VALUES ('6', 'Eigenes Deckblatt ohne Folie', null, 'Own back sheet without foil', 'Eigenes Deckblatt ohne Folie', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_binding_sample_image`
-- ----------------------------
DROP TABLE IF EXISTS `ps_binding_sample_image`;
CREATE TABLE `ps_binding_sample_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) DEFAULT NULL,
  `pageformat_id` bigint(11) DEFAULT NULL,
  `covercolor_id` bigint(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_binding_sample_image
-- ----------------------------
INSERT INTO `ps_binding_sample_image` VALUES ('1', '2', '2', '2', 'public/bindingsampleimage/ger.png', '1', '2020-04-08 10:13:30', '2020-04-08 10:13:30', null);
INSERT INTO `ps_binding_sample_image` VALUES ('2', '3', '2', '2', 'public/bindingsampleimage/cards.png', '1', '2020-04-08 10:29:26', '2020-04-08 10:29:26', null);
INSERT INTO `ps_binding_sample_image` VALUES ('3', '1', '1', '1', 'public/bindingsampleimage/eng.png', '1', '2020-04-08 10:43:07', '2020-04-08 10:43:07', null);

-- ----------------------------
-- Table structure for `ps_cd_bag`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cd_bag`;
CREATE TABLE `ps_cd_bag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bag` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_cd_bag
-- ----------------------------
INSERT INTO `ps_cd_bag` VALUES ('1', 'Hülle', null, 'Cover', 'Hülle', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cd_bag` VALUES ('2', 'Selbstklebende', null, 'Self-adhesive', 'Selbstklebende', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_cd_cover_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cd_cover_price`;
CREATE TABLE `ps_cd_cover_price` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  `cd_bag_id` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_cd_cover_price
-- ----------------------------
INSERT INTO `ps_cd_cover_price` VALUES ('1', 'Envelope', '0.500', '1');
INSERT INTO `ps_cd_cover_price` VALUES ('2', 'Self-adhesive', '1.000', '2');

-- ----------------------------
-- Table structure for `ps_contact`
-- ----------------------------
DROP TABLE IF EXISTS `ps_contact`;
CREATE TABLE `ps_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `address_english` text,
  `address_german` text,
  `text_english` text,
  `text_german` text,
  `location` text,
  `contact` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_contact
-- ----------------------------
INSERT INTO `ps_contact` VALUES ('1', 'abc@gmail.com', '#123 sector-13', '#123 sector-13', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Chandigarh', '1234569877', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_cover_color`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_color`;
CREATE TABLE `ps_cover_color` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_cover_color
-- ----------------------------
INSERT INTO `ps_cover_color` VALUES ('1', 'Schwarz', null, 'Black', 'Schwarz', '1', null, null, null);
INSERT INTO `ps_cover_color` VALUES ('2', 'Dunkelblau', null, 'Navy Blue', 'Dunkelblau', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_cover_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_settings`;
CREATE TABLE `ps_cover_settings` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `cover_settings` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_cover_settings
-- ----------------------------
INSERT INTO `ps_cover_settings` VALUES ('1', 'only cover color', null, 'only cover color', 'nur Deckfarbe', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_settings` VALUES ('2', 'cover color, cover sheet, back sheet', null, 'cover color, cover sheet, back sheet', 'Deckfarbe, Deckblatt, Rückblatt', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_settings` VALUES ('3', 'None', null, 'None', 'Keiner', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_cover_settings_back_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_settings_back_sheet`;
CREATE TABLE `ps_cover_settings_back_sheet` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `cover_settings_id` bigint(11) NOT NULL,
  `back_sheet_id` bigint(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`back_sheet_id`),
  KEY `FK_product_cover_sheet` (`cover_settings_id`),
  CONSTRAINT `fk_cover_settings_back` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cover_settings_back_sheet` FOREIGN KEY (`back_sheet_id`) REFERENCES `ps_back_cover` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_cover_settings_back_sheet
-- ----------------------------
INSERT INTO `ps_cover_settings_back_sheet` VALUES ('1', '1', '1', null, null, null);
INSERT INTO `ps_cover_settings_back_sheet` VALUES ('2', '1', '2', null, null, null);

-- ----------------------------
-- Table structure for `ps_cover_settings_cover_color`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_settings_cover_color`;
CREATE TABLE `ps_cover_settings_cover_color` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `cover_settings_id` bigint(11) NOT NULL,
  `cover_color_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`cover_color_id`),
  KEY `FK_product_cover_sheet` (`cover_settings_id`),
  CONSTRAINT `fk_cover_settings` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cover_settings_color` FOREIGN KEY (`cover_color_id`) REFERENCES `ps_cover_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_cover_settings_cover_color
-- ----------------------------
INSERT INTO `ps_cover_settings_cover_color` VALUES ('1', '2', '1', null, null, null);
INSERT INTO `ps_cover_settings_cover_color` VALUES ('2', '2', '2', null, null, null);
INSERT INTO `ps_cover_settings_cover_color` VALUES ('3', '1', '1', null, null, null);
INSERT INTO `ps_cover_settings_cover_color` VALUES ('4', '2', '2', null, null, null);

-- ----------------------------
-- Table structure for `ps_cover_settings_cover_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_settings_cover_sheet`;
CREATE TABLE `ps_cover_settings_cover_sheet` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `cover_settings_id` bigint(11) NOT NULL,
  `cover_sheet_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`cover_sheet_id`),
  KEY `FK_product_cover_sheet` (`cover_settings_id`),
  CONSTRAINT `fk_cover_sheet_settings` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cover_sheets` FOREIGN KEY (`cover_sheet_id`) REFERENCES `ps_cover_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_cover_settings_cover_sheet
-- ----------------------------
INSERT INTO `ps_cover_settings_cover_sheet` VALUES ('1', '1', '1', null, null, null);
INSERT INTO `ps_cover_settings_cover_sheet` VALUES ('2', '1', '2', null, null, null);

-- ----------------------------
-- Table structure for `ps_cover_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `ps_cover_sheet`;
CREATE TABLE `ps_cover_sheet` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sheet` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_cover_sheet
-- ----------------------------
INSERT INTO `ps_cover_sheet` VALUES ('1', 'Folie-matt', null, 'Foil-matt', 'Folie-matt', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_sheet` VALUES ('2', 'Folie-Klarsicht', null, 'Transparent film', 'Folie-Klarsicht', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_sheet` VALUES ('3', 'Karton-Schwarz', null, 'Cardboard black', 'Karton-Schwarz', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_sheet` VALUES ('4', 'Karton-Dunkelblau', null, 'Cardboard dark blue', 'Karton-Dunkelblau', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_sheet` VALUES ('5', 'Eigenes Deckblatt mit Folie', null, 'Own cover sheet with foil', 'Eigenes Deckblatt mit Folie', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_cover_sheet` VALUES ('6', 'Eigenes Deckblatt ohne Folie', null, 'Own cover sheet without foil', 'Eigenes Deckblatt ohne Folie', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_customer_area`
-- ----------------------------
DROP TABLE IF EXISTS `ps_customer_area`;
CREATE TABLE `ps_customer_area` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_customer_ares` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_customer_area
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_data_check`
-- ----------------------------
DROP TABLE IF EXISTS `ps_data_check`;
CREATE TABLE `ps_data_check` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `check_list` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_data_check
-- ----------------------------
INSERT INTO `ps_data_check` VALUES ('1', 'Standard', null, 'Standard', 'Standard', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_data_check` VALUES ('2', 'Premium', null, 'Premium', 'Prämium', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_datacheck_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_datacheck_price`;
CREATE TABLE `ps_datacheck_price` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_datacheck_price
-- ----------------------------
INSERT INTO `ps_datacheck_price` VALUES ('1', 'Standard', '1.000');
INSERT INTO `ps_datacheck_price` VALUES ('2', 'Premium', '5.000');

-- ----------------------------
-- Table structure for `ps_date_format`
-- ----------------------------
DROP TABLE IF EXISTS `ps_date_format`;
CREATE TABLE `ps_date_format` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `date_format` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_date_format
-- ----------------------------
INSERT INTO `ps_date_format` VALUES ('1', 'Jahr\n      ', 'y', 'year', 'Jahr\n      \n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_date_format` VALUES ('2', 'Monat - Jahr\n      \n      ', 'my', 'Month year', 'Monat - Jahr\n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_date_format` VALUES ('3', 'Tag - Monat - Jahr       ', 'dmy', 'Day month Year', 'Tag - Monat - Jahr       ', '1', '2020-02-27 05:00:00', '2020-02-27 11:00:00', null);

-- ----------------------------
-- Table structure for `ps_delivery_service`
-- ----------------------------
DROP TABLE IF EXISTS `ps_delivery_service`;
CREATE TABLE `ps_delivery_service` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `delivery_service` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `shipment_tracking_link` text,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_delivery_service
-- ----------------------------
INSERT INTO `ps_delivery_service` VALUES ('1', 'DHL', null, null, null, null, '1', '1', null, null, '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_delivery_service` VALUES ('2', 'UPS', null, null, null, null, '1', '1', null, null, '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_delivery_service` VALUES ('3', 'DPD', null, null, null, null, '1', '1', null, null, '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_delivery_service` VALUES ('4', 'ABC', null, null, null, null, '1', '1', null, null, '2020-03-19 07:33:26', '2020-03-19 07:33:26', null);
INSERT INTO `ps_delivery_service` VALUES ('5', 'ADD', null, null, null, null, '1', '1', null, null, '2020-03-19 12:06:48', '2020-03-19 12:06:48', null);
INSERT INTO `ps_delivery_service` VALUES ('6', 'BCC', null, null, null, null, '1', '1', null, null, '2020-03-19 12:29:09', '2020-03-19 12:29:09', null);
INSERT INTO `ps_delivery_service` VALUES ('7', 'TSC', null, null, null, null, '1', '1', null, null, '2020-03-19 12:34:03', '2020-03-19 12:34:03', null);
INSERT INTO `ps_delivery_service` VALUES ('8', 'TTK', null, null, null, null, '1', '0', null, null, '2020-03-19 12:37:36', '2020-03-27 06:06:56', null);
INSERT INTO `ps_delivery_service` VALUES ('9', 'DPD', null, null, null, 'test', '1', '1', null, null, '2020-03-20 08:07:03', '2020-03-27 10:21:26', null);
INSERT INTO `ps_delivery_service` VALUES ('10', 'Test Delivery', null, null, null, null, '1', '1', null, null, '2020-04-28 06:38:15', '2020-08-23 19:19:00', null);
INSERT INTO `ps_delivery_service` VALUES ('11', 'Last', null, null, null, null, '1', '1', null, null, '2020-05-04 12:20:14', '2020-05-04 12:20:14', null);
INSERT INTO `ps_delivery_service` VALUES ('12', 'Last1', null, null, null, null, '1', '0', null, null, '2020-05-04 12:33:27', '2020-05-04 12:44:39', null);
INSERT INTO `ps_delivery_service` VALUES ('13', 'test', null, null, null, null, '1', '1', null, null, '2020-06-23 13:55:10', '2020-06-23 13:55:10', null);
INSERT INTO `ps_delivery_service` VALUES ('14', 'test11', null, null, null, null, '1', '1', null, null, '2020-06-23 13:55:56', '2020-06-23 13:55:56', null);
INSERT INTO `ps_delivery_service` VALUES ('15', 'DHL Express', null, null, null, null, '1', '1', null, null, '2020-07-24 12:13:40', '2020-07-24 12:13:40', null);

-- ----------------------------
-- Table structure for `ps_discount`
-- ----------------------------
DROP TABLE IF EXISTS `ps_discount`;
CREATE TABLE `ps_discount` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `by_price` double(9,4) DEFAULT NULL,
  `by_percent` double(9,4) DEFAULT NULL,
  `type` int(1) DEFAULT NULL COMMENT '0 => product delivery, 1=> single product, 2=>multiple product',
  `product_id` text,
  `needs_code` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_discount
-- ----------------------------
INSERT INTO `ps_discount` VALUES ('1', 'test1', null, 'test1', 'test1', null, '2020-07-09', '30', '10.0000', null, '0', '[\"-1\"]', '1', '1', '2020-07-09 13:21:02', '2020-07-09 13:21:02', null);
INSERT INTO `ps_discount` VALUES ('2', 'test2', null, 'test2', 'test2', null, '2020-07-09', '30', '10.0000', null, '1', '[\"2\"]', '1', '1', '2020-07-09 13:21:40', '2020-07-09 13:21:40', null);
INSERT INTO `ps_discount` VALUES ('3', 'test3', null, 'test3', 'test3', null, '2020-07-09', '30', '10.0000', null, '2', '[\"2\",\"1\"]', '1', '1', '2020-07-09 13:22:09', '2020-07-09 13:22:09', null);
INSERT INTO `ps_discount` VALUES ('4', 'DD', null, 'DD', 'DD', '2020-08-22', '2020-07-23', '30', '5.0000', null, '2', '[\"2\"]', '1', '1', '2020-07-23 14:50:50', '2020-07-24 14:27:17', null);
INSERT INTO `ps_discount` VALUES ('5', 'discount15perc', null, 'discount15perc', 'discount15perc', '2020-09-25', '2020-09-08', '17', '0.0000', '15.0000', '2', '[\"1\"]', '1', '1', '2020-08-09 09:41:31', '2020-08-30 10:25:21', null);
INSERT INTO `ps_discount` VALUES ('6', 'freeship', null, 'freeship', 'freeship', '2020-09-04', '2020-08-05', '30', '0.0000', '20.0000', '0', '[\"-1\"]', '1', '1', '2020-08-09 10:13:48', '2020-08-23 18:05:32', null);
INSERT INTO `ps_discount` VALUES ('7', 'discount10', null, 'discount10', 'discount10', '2020-09-22', '2020-08-23', '30', '10.0000', '0.0000', '2', '[\"2\"]', null, '1', '2020-08-23 18:14:25', '2020-09-05 10:36:21', null);
INSERT INTO `ps_discount` VALUES ('8', 'discount20value', null, 'discount20value', 'discount20value', '2020-09-24', '2020-08-25', '30', '20.0000', '0.0000', '2', '[\"2\"]', null, '1', '2020-08-30 09:42:27', '2020-09-13 13:07:04', null);
INSERT INTO `ps_discount` VALUES ('9', 'discount50', null, 'discount50', 'discount50', '2020-10-08', '2020-09-09', '29', '0.0000', '50.0000', '2', '[\"2\"]', null, '1', '2020-08-30 09:56:12', '2020-09-13 12:57:19', null);

-- ----------------------------
-- Table structure for `ps_embossing_cover_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_embossing_cover_price`;
CREATE TABLE `ps_embossing_cover_price` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ps_embossing_cover_price
-- ----------------------------
INSERT INTO `ps_embossing_cover_price` VALUES ('1', 'Edition', '8.000');
INSERT INTO `ps_embossing_cover_price` VALUES ('2', 'Classic', '6.000');

-- ----------------------------
-- Table structure for `ps_embossing_spine_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_embossing_spine_price`;
CREATE TABLE `ps_embossing_spine_price` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ps_embossing_spine_price
-- ----------------------------
INSERT INTO `ps_embossing_spine_price` VALUES ('1', 'Edition', '8.000');
INSERT INTO `ps_embossing_spine_price` VALUES ('2', 'Classic', '6.000');

-- ----------------------------
-- Table structure for `ps_fonts`
-- ----------------------------
DROP TABLE IF EXISTS `ps_fonts`;
CREATE TABLE `ps_fonts` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `font` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_fonts
-- ----------------------------
INSERT INTO `ps_fonts` VALUES ('1', 'Times New Roman\n      ', null, 'Times New Roman', 'Times New Roman\n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_fonts` VALUES ('2', 'Arial\n      ', '', 'Arial', 'Arial\n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_free_smaple`
-- ----------------------------
DROP TABLE IF EXISTS `ps_free_smaple`;
CREATE TABLE `ps_free_smaple` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) DEFAULT NULL,
  `side_option` varchar(255) DEFAULT NULL,
  `paper_weight` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `addition_to_address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `document` text,
  `sample_status` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_free_smaple
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_frequently_asked_question`
-- ----------------------------
DROP TABLE IF EXISTS `ps_frequently_asked_question`;
CREATE TABLE `ps_frequently_asked_question` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` longtext,
  `text_german` longtext,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_frequently_asked_question
-- ----------------------------
INSERT INTO `ps_frequently_asked_question` VALUES ('1', 'Collapsible Group Item #1', 'Zusammenklappbares Gruppenelement Nr. 1', '<b><u>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</u></b>', '<u><b>Anim pariatur cliche</b> reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.</u>', '1', '2020-04-22 18:48:30', '2020-04-22 13:18:30', null);
INSERT INTO `ps_frequently_asked_question` VALUES ('2', ' Collapsible Group Item #2', 'Zusammenklappbares Gruppenelement Nr. 2', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.', '1', null, null, null);
INSERT INTO `ps_frequently_asked_question` VALUES ('3', ' Collapsible Group Item #3', 'Zusammenklappbares Gruppenelement Nr. 3', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.', '1', null, null, null);
INSERT INTO `ps_frequently_asked_question` VALUES ('4', 'Sit totam non ut sed', 'Tempor quia enim est', '<b>Porro blanditiis del.</b>', '<b>Nulla adipisci tempo.</b>', null, '2020-04-22 13:11:06', '2020-04-22 13:11:06', null);

-- ----------------------------
-- Table structure for `ps_gallery`
-- ----------------------------
DROP TABLE IF EXISTS `ps_gallery`;
CREATE TABLE `ps_gallery` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `image` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_kind_list`
-- ----------------------------
DROP TABLE IF EXISTS `ps_kind_list`;
CREATE TABLE `ps_kind_list` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_kind_list
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_latest`
-- ----------------------------
DROP TABLE IF EXISTS `ps_latest`;
CREATE TABLE `ps_latest` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` longtext,
  `text_german` longtext,
  `status` tinyint(4) DEFAULT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_latest
-- ----------------------------
INSERT INTO `ps_latest` VALUES ('1', 'Latest', 'Neueste', '<p style=\"text-align: center; \"><img src=\"data:image/jpeg;base64,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\" style=\"width: 265.5px; height: 176.038px;\"><b><br></b></p><p><b>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</b></p>', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', 'public/images/slide-01.png', '2020-04-22 18:21:51', '2020-04-22 12:51:51', null);
INSERT INTO `ps_latest` VALUES ('2', 'Latest 2', 'Neueste 2', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', 'public/images/slide-02.png', '2020-04-13 19:39:54', null, null);
INSERT INTO `ps_latest` VALUES ('3', 'Ipsum possimus elig', 'Voluptatem Eligendi', 'Et laborum autem cum', 'Mollitia voluptatem', '1', 'public/latest/Coding backgrounds 41.jpg', '2020-04-13 19:39:54', '2020-04-13 14:09:54', null);
INSERT INTO `ps_latest` VALUES ('4', 'Quasi dolorem repreh', 'Quidem deserunt sequ', '<p>Dicta eius nostrud o. <u>ssdsdsdsffsdfdfdf<b>fdsfdfsdfsd</b></u></p><p><img src=\"data:image/jpeg;base64,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\" style=\"width: 800px;\" data-filename=\"code-brackets-wallpaper-66945.jpg\"><br></p>', '<p>Anim<b>i, non necessita.</b></p><p><b><br></b></p><p><img src=\"data:image/jpeg;base64,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\" data-filename=\"Coding backgrounds 41.jpg\" style=\"width: 990px;\"><b><br></b></p>', '1', 'public/latest/code-brackets-wallpaper-66945.jpg', '2020-04-22 12:24:03', '2020-04-22 12:38:38', null);

-- ----------------------------
-- Table structure for `ps_letters_of_spine`
-- ----------------------------
DROP TABLE IF EXISTS `ps_letters_of_spine`;
CREATE TABLE `ps_letters_of_spine` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sheets_range_start` double(6,2) DEFAULT NULL,
  `sheets_range_end` double(6,2) DEFAULT NULL,
  `letters` varchar(45) DEFAULT NULL,
  `paper_weight_id` bigint(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `delivery_service_id` bigint(11) DEFAULT NULL,
  `ds_from` float DEFAULT NULL,
  `ds_to` float DEFAULT NULL,
  `ds_price` float DEFAULT NULL,
  `ds_del_status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_letters_of_spine_1_idx` (`paper_weight_id`),
  KEY `fk_ps_letters_of_spine_2_idx` (`delivery_service_id`),
  CONSTRAINT `fk_ps_letters_of_spine_1` FOREIGN KEY (`paper_weight_id`) REFERENCES `ps_paper_weight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ps_letters_of_spine_2` FOREIGN KEY (`delivery_service_id`) REFERENCES `ps_delivery_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_letters_of_spine
-- ----------------------------
INSERT INTO `ps_letters_of_spine` VALUES ('1', '0.00', '65.00', '40', '3', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('2', '66.00', '150.00', '130', '3', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('3', '151.00', '190.00', '160', '3', '1', null, null, null, null, '1', '2020-02-11 00:00:00', '2020-08-23 19:19:26', null);
INSERT INTO `ps_letters_of_spine` VALUES ('4', '191.00', '250.00', '205', '3', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('5', '251.00', '300.00', '265', '3', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('6', '0.00', '65.00', '40', '2', '1', null, null, null, null, '1', '2020-02-11 00:00:00', '2020-08-23 19:19:24', null);
INSERT INTO `ps_letters_of_spine` VALUES ('7', '66.00', '150.00', '130', '2', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('8', '151.00', '190.00', '160', '2', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('9', '191.00', '250.00', '205', '2', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('10', '251.00', '300.00', '265', '2', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('11', '5.00', '65.00', '20', '1', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-06-29 08:29:41', null);
INSERT INTO `ps_letters_of_spine` VALUES ('12', '66.00', '150.00', '130', '1', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('13', '151.00', '190.00', '160', '1', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('14', '191.00', '250.00', '205', '1', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('15', '251.00', '300.00', '265', '1', '1', null, null, null, null, '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('16', '0.00', '3.50', '3.5', null, '1', '1', '1', '12', '3', '0', '2020-02-11 00:00:00', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('17', '3.50', '4.50', '4', null, '1', '1', '4', '60', '12', '0', '2020-02-11 00:00:00', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('18', '4.50', '5.50', '4.5', null, '1', '1', '70', '120', '12', '0', '2020-02-11 00:00:00', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('19', '0.00', '3.50', '3.5', null, '1', '2', '1', '12', '12', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('20', '3.50', '4.50', '4', null, '1', '2', '1', '12', '12', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('21', '4.50', '5.50', '4.5', null, '1', '2', '1', '12', '12', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('22', '0.00', '3.50', '3.5', null, '1', '3', '1', '121', '2', '0', '2020-02-11 00:00:00', '2020-03-20 13:45:45', null);
INSERT INTO `ps_letters_of_spine` VALUES ('23', '3.50', '4.50', '4', null, '1', '3', '1', '1000', '5', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('24', '4.50', '5.50', '4.5', null, '1', '3', '1', '660000', '50', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_letters_of_spine` VALUES ('25', null, null, null, null, null, '7', null, null, null, '0', '2020-03-19 12:34:03', '2020-03-19 12:34:03', null);
INSERT INTO `ps_letters_of_spine` VALUES ('26', null, null, null, null, null, '7', null, null, null, '0', '2020-03-19 12:34:03', '2020-03-19 12:34:03', null);
INSERT INTO `ps_letters_of_spine` VALUES ('27', null, null, null, null, null, '7', null, null, null, '0', '2020-03-19 12:34:03', '2020-03-19 12:34:03', null);
INSERT INTO `ps_letters_of_spine` VALUES ('28', null, null, null, null, null, '8', '0', '29', '464', '0', '2020-03-19 12:37:36', '2020-03-19 12:37:36', null);
INSERT INTO `ps_letters_of_spine` VALUES ('29', null, null, null, null, null, '8', '0', '2', '2', '1', '2020-03-19 12:37:36', '2020-03-19 12:37:36', null);
INSERT INTO `ps_letters_of_spine` VALUES ('30', null, null, null, null, null, '8', '3', '12', '122', '1', '2020-03-19 12:37:36', '2020-03-19 12:37:36', null);
INSERT INTO `ps_letters_of_spine` VALUES ('31', null, null, null, null, null, '8', '0', null, null, '1', '2020-03-19 12:37:36', '2020-03-19 12:37:36', null);
INSERT INTO `ps_letters_of_spine` VALUES ('32', null, null, null, null, null, '9', '0', '112', '1212', '1', '2020-03-20 08:07:03', '2020-03-27 10:21:45', null);
INSERT INTO `ps_letters_of_spine` VALUES ('33', null, null, null, null, null, '9', '0', '12', '111', '1', '2020-03-20 08:07:03', '2020-03-27 09:55:52', null);
INSERT INTO `ps_letters_of_spine` VALUES ('34', null, null, null, null, '1', '9', '112', '22', '22', '1', '2020-03-27 10:34:33', '2020-03-27 10:36:34', null);
INSERT INTO `ps_letters_of_spine` VALUES ('35', '66.00', '150.00', '130', '4', '1', null, null, null, null, '0', '2020-03-27 11:25:32', '2020-03-27 11:25:32', null);
INSERT INTO `ps_letters_of_spine` VALUES ('36', '151.00', '190.00', '160', '4', '1', null, null, null, null, '0', '2020-03-27 11:25:32', '2020-03-27 11:25:32', null);
INSERT INTO `ps_letters_of_spine` VALUES ('37', '191.00', '250.00', '160', '4', '1', null, null, null, null, '0', '2020-03-27 11:25:32', '2020-03-27 11:25:32', null);
INSERT INTO `ps_letters_of_spine` VALUES ('38', '251.00', '300.00', '265', '4', '1', null, null, null, null, '0', '2020-03-27 11:25:32', '2020-03-27 11:25:32', null);
INSERT INTO `ps_letters_of_spine` VALUES ('39', '0.00', '65.00', '40', '5', '1', null, null, null, null, '0', '2020-03-27 11:27:58', '2020-03-27 11:27:58', null);
INSERT INTO `ps_letters_of_spine` VALUES ('40', '66.00', '150.00', '130', '5', '1', null, null, null, null, '0', '2020-03-27 11:27:59', '2020-03-27 11:27:59', null);
INSERT INTO `ps_letters_of_spine` VALUES ('41', '151.00', '190.00', '160', '5', '1', null, null, null, null, '0', '2020-03-27 11:27:59', '2020-03-27 11:27:59', null);
INSERT INTO `ps_letters_of_spine` VALUES ('42', '191.00', '250.00', '160', '5', '1', null, null, null, null, '0', '2020-03-27 11:27:59', '2020-03-27 11:27:59', null);
INSERT INTO `ps_letters_of_spine` VALUES ('43', '251.00', '300.00', '265', '5', '0', null, null, null, null, '0', '2020-03-27 11:27:59', '2020-03-27 11:51:04', null);
INSERT INTO `ps_letters_of_spine` VALUES ('44', '301.00', '222.00', '300', '5', '0', null, null, null, null, '1', '2020-03-27 11:27:59', '2020-03-27 11:51:35', null);
INSERT INTO `ps_letters_of_spine` VALUES ('45', '250.00', '2222.00', '2222', '5', '1', null, null, null, null, '0', '2020-03-27 11:52:15', '2020-03-27 11:52:15', null);
INSERT INTO `ps_letters_of_spine` VALUES ('46', null, null, null, null, '1', '10', '0', '3', '2', '0', '2020-04-28 06:38:15', '2020-08-23 19:19:37', null);
INSERT INTO `ps_letters_of_spine` VALUES ('47', null, null, null, null, '1', '10', '3', '6', '4', '1', '2020-04-28 06:38:15', '2020-08-23 19:19:08', null);
INSERT INTO `ps_letters_of_spine` VALUES ('48', null, null, null, null, '1', '11', '0', '9', '9.1', '0', '2020-05-04 12:20:14', '2020-05-04 12:20:14', null);
INSERT INTO `ps_letters_of_spine` VALUES ('49', null, null, null, null, '1', '12', '0', '8', '0.06', '0', '2020-05-04 12:33:27', '2020-05-04 12:33:27', null);
INSERT INTO `ps_letters_of_spine` VALUES ('50', '0.00', '65.00', '40', '7', '1', null, null, null, null, '0', '2020-05-08 11:12:50', '2020-05-08 11:12:50', null);
INSERT INTO `ps_letters_of_spine` VALUES ('51', '66.00', '150.00', '130', '7', '1', null, null, null, null, '0', '2020-05-08 11:12:50', '2020-05-08 11:12:50', null);
INSERT INTO `ps_letters_of_spine` VALUES ('52', '151.00', '190.00', '160', '7', '1', null, null, null, null, '0', '2020-05-08 11:12:50', '2020-05-08 11:12:50', null);
INSERT INTO `ps_letters_of_spine` VALUES ('53', '191.00', '250.00', '205', '7', '1', null, null, null, null, '0', '2020-05-08 11:12:51', '2020-05-08 11:12:51', null);
INSERT INTO `ps_letters_of_spine` VALUES ('54', '251.00', '300.00', '265', '7', '1', null, null, null, null, '0', '2020-05-08 11:12:51', '2020-05-08 11:12:51', null);
INSERT INTO `ps_letters_of_spine` VALUES ('55', '301.00', null, null, '7', '1', null, null, null, null, '0', '2020-05-08 11:12:51', '2020-05-08 11:12:51', null);
INSERT INTO `ps_letters_of_spine` VALUES ('56', null, null, null, null, '1', '13', '0', '2000', '2.07', '0', '2020-06-23 13:55:11', '2020-06-23 13:55:11', null);
INSERT INTO `ps_letters_of_spine` VALUES ('57', null, null, null, null, '1', '14', '0', '2000', '50', '0', '2020-06-23 13:55:56', '2020-06-23 13:55:56', null);
INSERT INTO `ps_letters_of_spine` VALUES ('58', null, null, null, null, '1', '15', '0', '1000', '10', '1', '2020-07-24 12:13:40', '2020-07-24 12:13:40', null);
INSERT INTO `ps_letters_of_spine` VALUES ('59', '30.00', '65.00', '40', '6', '1', null, null, null, null, '0', '2020-08-09 09:04:31', '2020-08-09 09:04:31', null);
INSERT INTO `ps_letters_of_spine` VALUES ('60', null, null, null, null, '1', '1', '13', '20', '5', '0', '2020-08-17 14:19:30', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('61', null, null, null, null, '1', '1', '21', '45', '100', '0', '2020-08-17 14:36:37', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('62', null, null, null, null, '1', '1', '46', '100', '78', '0', '2020-08-17 14:39:02', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('63', null, null, null, null, '1', '1', '101', '200', '90', '0', '2020-08-17 14:40:01', '2020-08-17 14:40:01', null);
INSERT INTO `ps_letters_of_spine` VALUES ('64', null, null, null, null, '1', '10', '7', '10', '6', '1', '2020-08-23 19:19:00', '2020-08-23 19:19:07', null);
INSERT INTO `ps_letters_of_spine` VALUES ('65', null, null, null, null, '1', '10', '4', '6', '4', '0', '2020-08-23 19:19:37', '2020-08-23 19:19:37', null);
INSERT INTO `ps_letters_of_spine` VALUES ('66', null, null, null, null, '1', '10', '7', '10', '6', '0', '2020-08-23 19:19:37', '2020-08-23 19:19:37', null);

-- ----------------------------
-- Table structure for `ps_mirror`
-- ----------------------------
DROP TABLE IF EXISTS `ps_mirror`;
CREATE TABLE `ps_mirror` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `mirror` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_mirror
-- ----------------------------
INSERT INTO `ps_mirror` VALUES ('1', 'Long edge', null, 'Long edge', 'Lange Kante', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_mirror` VALUES ('2', 'Short edge', null, 'Short edge', 'Kurze Kante', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_news_letter`
-- ----------------------------
DROP TABLE IF EXISTS `ps_news_letter`;
CREATE TABLE `ps_news_letter` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_news_letter
-- ----------------------------
INSERT INTO `ps_news_letter` VALUES ('1', 'sachin.kumar@trantorinc.com', '1', '2020-01-24 11:38:22', '2020-01-24 11:38:22', null);
INSERT INTO `ps_news_letter` VALUES ('2', 'testing123@yopmail.com', '1', '2020-01-24 11:39:04', '2020-01-24 11:39:04', null);
INSERT INTO `ps_news_letter` VALUES ('3', 'testing@yopmail.com', '1', '2020-01-24 11:40:31', '2020-01-24 11:40:31', null);
INSERT INTO `ps_news_letter` VALUES ('4', 'testing12@yopmail.com', '1', '2020-01-24 11:42:03', '2020-01-24 11:42:03', null);
INSERT INTO `ps_news_letter` VALUES ('5', 'testing1212@yopmail.com', '1', '2020-01-24 11:42:12', '2020-01-24 11:42:12', null);
INSERT INTO `ps_news_letter` VALUES ('6', 'testing121212@yopmail.com', '1', '2020-01-24 11:43:09', '2020-01-24 11:43:09', null);
INSERT INTO `ps_news_letter` VALUES ('7', 'testing123123@yopmail.com', '1', '2020-01-24 12:49:46', '2020-01-24 12:49:46', null);

-- ----------------------------
-- Table structure for `ps_order`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order`;
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_order_1_idx` (`user_id`),
  KEY `fk_ps_order_2_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_attributes`;
CREATE TABLE `ps_order_attributes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `item_sequence` bigint(2) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `no_of_copies` int(3) DEFAULT NULL,
  `no_of_cds` int(3) DEFAULT NULL,
  `attribute` text,
  `attribute_desc_german` text,
  `attribute_desc` text,
  `shipping_company` text,
  `billing_address` text,
  `shipping_address` text,
  `cd_dvd_unit_price` double(20,3) DEFAULT NULL,
  `price_per_product` double(20,3) DEFAULT NULL,
  `price_product_qty` double(20,3) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`price_product_qty`),
  KEY `fk_order_attrib` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_order_attributes
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_details`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_details`;
CREATE TABLE `ps_order_details` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `no_of_copies` int(5) DEFAULT NULL,
  `no_of_cds` int(5) DEFAULT NULL,
  `shipping_company` varchar(255) DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `shipping_address` text,
  `billing_address` text,
  `email_id` varchar(255) DEFAULT NULL,
  `total` double(20,3) DEFAULT NULL,
  `net_amt` double(20,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_order_details
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_details_final`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_details_final`;
CREATE TABLE `ps_order_details_final` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `no_of_copies` int(5) DEFAULT NULL,
  `no_of_cds` int(5) DEFAULT NULL,
  `shipping_company` varchar(255) DEFAULT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `shipping_address` text,
  `billing_address` text,
  `total` double(20,3) DEFAULT NULL,
  `net_amt` double(20,3) DEFAULT NULL,
  `status` text,
  `priority` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `assigned_to` bigint(11) DEFAULT NULL,
  `txn` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `admin_response` text,
  PRIMARY KEY (`id`),
  KEY `fk_uid` (`user_id`),
  CONSTRAINT `fk_uid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_order_details_final
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_history`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_history`;
CREATE TABLE `ps_order_history` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `order_history_id` bigint(11) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `item_sequence` bigint(2) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `no_of_copies` int(3) DEFAULT NULL,
  `no_of_cds` int(3) DEFAULT NULL,
  `shipping_company` text,
  `billing_address` text,
  `shipping_address` text,
  `attribute` text,
  `attribute_desc_german` text,
  `attribute_desc` text,
  `product_id` varchar(255) DEFAULT NULL,
  `cd_dvd_unit_price` double(20,3) DEFAULT NULL,
  `price_per_product` double(20,3) DEFAULT NULL,
  `price_product_qty` double(20,3) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_order_attrib` (`user_id`),
  KEY `order_history_id_final_history` (`order_history_id`),
  CONSTRAINT `fk_usr_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_history_id_final_history` FOREIGN KEY (`order_history_id`) REFERENCES `ps_order_details_final` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_order_history
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_return`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_return`;
CREATE TABLE `ps_order_return` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `image_path` text,
  `return_desc` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `admin_response` text,
  PRIMARY KEY (`id`),
  KEY `Fk_return` (`user_id`),
  CONSTRAINT `Fk_return` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_order_return
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_order_state`
-- ----------------------------
DROP TABLE IF EXISTS `ps_order_state`;
CREATE TABLE `ps_order_state` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `order_state` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_order_state
-- ----------------------------
INSERT INTO `ps_order_state` VALUES ('1', 'New', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('2', 'In-Progress', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('3', 'Done', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('4', 'Reversal Request', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('5', 'Reversal declined', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('6', 'Reversal approved', '1', null, null, null);
INSERT INTO `ps_order_state` VALUES ('7', 'Reversal coupon', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_page_format`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_format`;
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_page_format
-- ----------------------------
INSERT INTO `ps_page_format` VALUES ('1', 'DIN A4 Hotch', null, 'DIN A4 Portrait', 'DIN A4 Hotch', '1', '1', '1', '10', '10', '2020-02-11 00:00:00', '2020-05-20 13:31:28', null);
INSERT INTO `ps_page_format` VALUES ('2', 'DIN A4 Quer', null, 'DIN A4 Landscape', 'DIN A4 Quer', '1', '0', '1', '4', '0', '2020-02-11 00:00:00', '2020-05-13 06:24:55', null);
INSERT INTO `ps_page_format` VALUES ('5', 'DIN A5 Hotch', null, 'DIN A5 Portrait ', 'DIN A5 Hotch', '0', '0', '1', '0', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_page_format` VALUES ('6', 'DIN A5 Quer', null, 'DIN A5 Landscape', 'DIN A5 Quer', '0', '0', '1', '0', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_page_format` VALUES ('7', 'DIN A3 Hotch', null, 'DIN A3 Portrait ', 'DIN A3 Hotch', '1', '0', '1', '7', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_page_format` VALUES ('8', 'DIN A3 Quer', null, 'DIN A3 Landscape', 'DIN A3 Quer', '1', '0', '1', '7', '0', '2020-04-24 19:57:30', '2020-04-24 19:57:38', null);

-- ----------------------------
-- Table structure for `ps_page_options`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_options`;
CREATE TABLE `ps_page_options` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `page_options` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_page_options
-- ----------------------------
INSERT INTO `ps_page_options` VALUES ('1', 'Einseitig', null, 'Unilaterally', 'Einseitig', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_page_options` VALUES ('2', 'Beidseitig', null, 'Both Sides', 'Beidseitig', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_page_options_attribute_realationship`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_options_attribute_realationship`;
CREATE TABLE `ps_page_options_attribute_realationship` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_option_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_attributes_relaton` (`attribute_id`),
  KEY `fk_product_attributes` (`page_option_id`),
  CONSTRAINT `fk_page_option` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_page_options_attribute_realationship
-- ----------------------------
INSERT INTO `ps_page_options_attribute_realationship` VALUES ('1', '1', '1', null, null, null);
INSERT INTO `ps_page_options_attribute_realationship` VALUES ('10', '2', '5', null, null, null);
INSERT INTO `ps_page_options_attribute_realationship` VALUES ('11', '2', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_page_options_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_options_attributes`;
CREATE TABLE `ps_page_options_attributes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `model` text NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_page_options_attributes
-- ----------------------------
INSERT INTO `ps_page_options_attributes` VALUES ('1', 'paper_weight', '2020-02-26 17:56:05', '2020-02-14 12:21:34', 'PaperWeight', null);
INSERT INTO `ps_page_options_attributes` VALUES ('5', 'mirror', '2020-02-27 12:43:52', '2020-02-27 12:43:52', 'Mirror', null);

-- ----------------------------
-- Table structure for `ps_page_options_mirror`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_options_mirror`;
CREATE TABLE `ps_page_options_mirror` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `page_option_id` bigint(11) NOT NULL,
  `paper_mirror_id` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`paper_mirror_id`),
  KEY `FK_product_cover_sheet` (`page_option_id`),
  CONSTRAINT `fk_page_mirror` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_page_option_mirror` FOREIGN KEY (`paper_mirror_id`) REFERENCES `ps_mirror` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_page_options_mirror
-- ----------------------------
INSERT INTO `ps_page_options_mirror` VALUES ('1', '1', '1', '2020-02-26 17:50:57', '2020-02-26 17:51:36', null);
INSERT INTO `ps_page_options_mirror` VALUES ('2', '2', '1', '2020-02-26 17:50:57', '2020-02-26 17:51:36', null);
INSERT INTO `ps_page_options_mirror` VALUES ('3', '2', '2', '2020-02-27 13:23:44', '2020-02-27 13:23:44', null);

-- ----------------------------
-- Table structure for `ps_page_options_paper_weight`
-- ----------------------------
DROP TABLE IF EXISTS `ps_page_options_paper_weight`;
CREATE TABLE `ps_page_options_paper_weight` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `page_option_id` bigint(11) NOT NULL,
  `paper_weight_id` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`paper_weight_id`),
  KEY `FK_product_cover_sheet` (`page_option_id`),
  CONSTRAINT `pk_option` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_option_weight` FOREIGN KEY (`paper_weight_id`) REFERENCES `ps_paper_weight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_page_options_paper_weight
-- ----------------------------
INSERT INTO `ps_page_options_paper_weight` VALUES ('1', '1', '1', '2020-02-26 17:50:57', '2020-02-26 17:51:36', null);
INSERT INTO `ps_page_options_paper_weight` VALUES ('2', '2', '1', '2020-02-26 17:50:57', '2020-02-26 17:51:36', null);
INSERT INTO `ps_page_options_paper_weight` VALUES ('3', '2', '2', '2020-02-27 13:25:04', '2020-02-27 13:25:04', null);
INSERT INTO `ps_page_options_paper_weight` VALUES ('4', '2', '3', '2020-03-27 13:00:29', '2020-03-27 13:00:29', null);
INSERT INTO `ps_page_options_paper_weight` VALUES ('5', '1', '2', '2020-03-27 13:00:48', '2020-03-27 13:00:48', null);
INSERT INTO `ps_page_options_paper_weight` VALUES ('6', '1', '3', '2020-03-27 13:26:30', '2020-03-27 13:26:30', null);

-- ----------------------------
-- Table structure for `ps_paper_weight`
-- ----------------------------
DROP TABLE IF EXISTS `ps_paper_weight`;
CREATE TABLE `ps_paper_weight` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `paper_weight` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_paper_weight
-- ----------------------------
INSERT INTO `ps_paper_weight` VALUES ('1', '100', null, '100', '100', '1', null, '5', '2020-02-11 00:00:00', '2020-08-09 09:04:46', null);
INSERT INTO `ps_paper_weight` VALUES ('2', '80', null, '80 ', '80 ', '1', '5.00000', '0', '2020-02-11 00:00:00', '2020-03-27 06:23:06', null);
INSERT INTO `ps_paper_weight` VALUES ('3', '120', null, '120 ', '120 ', '1', '7.50000', '0', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_paper_weight` VALUES ('4', '300', null, '300 ', '300 ', '1', '12.00000', '12', '2020-03-27 11:25:32', '2020-03-27 11:25:32', null);
INSERT INTO `ps_paper_weight` VALUES ('5', '200', null, '200 ', '200 ', '0', '12.00000', '222', '2020-03-27 11:27:58', '2020-03-27 11:53:36', null);
INSERT INTO `ps_paper_weight` VALUES ('6', '1221', null, '1221', '1221', '1', null, '30', '2020-03-31 08:19:29', '2020-08-09 09:04:31', null);
INSERT INTO `ps_paper_weight` VALUES ('7', 'test', null, 'test', 'test', '0', null, '0', '2020-05-08 11:12:50', '2020-05-08 11:12:50', null);

-- ----------------------------
-- Table structure for `ps_parameter_list`
-- ----------------------------
DROP TABLE IF EXISTS `ps_parameter_list`;
CREATE TABLE `ps_parameter_list` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `parameter_list` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_parameter_list
-- ----------------------------
INSERT INTO `ps_parameter_list` VALUES ('1', 'Binding', 'Product', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('2', 'PageFormat ', 'PageFormat', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('3', 'CoverColor', 'CoverColor', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('4', 'CoverSheet', 'CoverSheet', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('5', 'BackCover', 'BackCovers', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('6', 'PaperWeight', 'PaperWeight', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('7', 'CdBag', 'CdBag', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('8', 'DataCheck', 'DataCheck', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('9', 'Art', 'ArtList', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('10', 'Discount', 'Discount', '1', null, null, null);
INSERT INTO `ps_parameter_list` VALUES ('11', 'DeliveryService', 'DeliveryService', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_payment`
-- ----------------------------
DROP TABLE IF EXISTS `ps_payment`;
CREATE TABLE `ps_payment` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `payment_type` bigint(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amount` double(20,3) DEFAULT NULL,
  `status` text,
  `order_id` varchar(255) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `shipper_id` bigint(11) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `txn` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_payment_1_idx` (`user_id`),
  KEY `fk_ps_payment_2_idx` (`product_id`),
  KEY `fk_ps_payment_3_idx` (`order_id`),
  CONSTRAINT `fk_ps_payment_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ps_payment_2` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_payment
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `ps_permissions`;
CREATE TABLE `ps_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_permissions
-- ----------------------------
INSERT INTO `ps_permissions` VALUES ('1', 'Parameter', '2020-07-03 15:36:26', '2020-07-03 15:36:46', null);
INSERT INTO `ps_permissions` VALUES ('2', 'Return orders', '2020-07-03 15:36:30', '2020-07-03 15:36:49', null);
INSERT INTO `ps_permissions` VALUES ('3', 'Sliders', '2020-07-03 15:36:32', '2020-07-03 15:36:53', null);
INSERT INTO `ps_permissions` VALUES ('4', 'Latest', '2020-07-03 15:36:36', '2020-07-03 15:36:56', null);
INSERT INTO `ps_permissions` VALUES ('5', 'Change Orders Attributes', '2020-07-03 15:36:40', '2020-07-03 15:36:59', null);
INSERT INTO `ps_permissions` VALUES ('6', 'Send link for new file', '2020-07-03 15:36:43', '2020-07-03 15:37:03', null);

-- ----------------------------
-- Table structure for `ps_print_finishing`
-- ----------------------------
DROP TABLE IF EXISTS `ps_print_finishing`;
CREATE TABLE `ps_print_finishing` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `finishing` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_print_finishing
-- ----------------------------
INSERT INTO `ps_print_finishing` VALUES ('1', 'standard refinement', null, 'standard refinement', 'Standardverfeinerung', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_print_finishing` VALUES ('2', 'refinement with embossing', null, 'refinement with embossing', 'Verfeinerung mit Prägung', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_print_finishing` VALUES ('3', 'None', null, 'None', 'Keiner', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);

-- ----------------------------
-- Table structure for `ps_print_finishing_art_list`
-- ----------------------------
DROP TABLE IF EXISTS `ps_print_finishing_art_list`;
CREATE TABLE `ps_print_finishing_art_list` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `print_finishing_id` bigint(11) NOT NULL,
  `art_list_id` bigint(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`art_list_id`),
  KEY `FK_product_cover_sheet` (`print_finishing_id`),
  CONSTRAINT `fk_art_list` FOREIGN KEY (`art_list_id`) REFERENCES `ps_art_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_print_finishing` FOREIGN KEY (`print_finishing_id`) REFERENCES `ps_print_finishing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_print_finishing_art_list
-- ----------------------------
INSERT INTO `ps_print_finishing_art_list` VALUES ('1', '2', '1', null, null, null);
INSERT INTO `ps_print_finishing_art_list` VALUES ('2', '2', '2', null, null, null);

-- ----------------------------
-- Table structure for `ps_printout_basic_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_printout_basic_price`;
CREATE TABLE `ps_printout_basic_price` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `din` varchar(5) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `sided` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_printout_basic_price
-- ----------------------------
INSERT INTO `ps_printout_basic_price` VALUES ('1', 'A4', 'B/W', 'one-sided', '0.040');
INSERT INTO `ps_printout_basic_price` VALUES ('2', 'A4', 'B/W', 'two-sided', '0.030');
INSERT INTO `ps_printout_basic_price` VALUES ('3', 'A4', 'colored', 'one-sided', '0.150');
INSERT INTO `ps_printout_basic_price` VALUES ('4', 'A4', 'colored', 'two-sided', '0.130');
INSERT INTO `ps_printout_basic_price` VALUES ('5', 'A3', 'B/W', 'one-sided', '0.080');
INSERT INTO `ps_printout_basic_price` VALUES ('6', 'A3', 'B/W', 'two-sided', '0.060');
INSERT INTO `ps_printout_basic_price` VALUES ('7', 'A3', 'colored', 'one-sided', '0.300');
INSERT INTO `ps_printout_basic_price` VALUES ('8', 'A3', 'colored', 'two-sided', '0.260');
INSERT INTO `ps_printout_basic_price` VALUES ('9', 'A2', 'B/w', 'one-sided', '2.000');
INSERT INTO `ps_printout_basic_price` VALUES ('10', 'A2', 'colored', 'one-sided', '2.500');

-- ----------------------------
-- Table structure for `ps_printout_paper_surcharge`
-- ----------------------------
DROP TABLE IF EXISTS `ps_printout_paper_surcharge`;
CREATE TABLE `ps_printout_paper_surcharge` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `din` varchar(5) DEFAULT NULL,
  `papier` int(5) DEFAULT NULL,
  `sided` varchar(255) DEFAULT NULL,
  `price` double(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ps_printout_paper_surcharge
-- ----------------------------
INSERT INTO `ps_printout_paper_surcharge` VALUES ('1', 'A4', '80', 'one-sided', '0.000');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('2', 'A4', '100', 'one-sided', '0.040');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('3', 'A4', '120', 'one-sided', '0.080');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('4', 'A4', '80', 'two-sided', '0.000');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('5', 'A4', '100', 'two-sided', '0.020');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('6', 'A4', '120', 'two-sided', '0.040');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('7', 'A3', '80', 'one-sided', '0.000');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('8', 'A3', '100', 'one-sided', '0.080');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('9', 'A3', '120', 'one-sided', '0.160');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('10', 'A3', '80', 'two-sided', '0.000');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('11', 'A3', '100', 'two-sided', '0.040');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('12', 'A3', '120', 'two-sided', '0.080');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('13', 'A2', '80', 'one-sided', '0.000');
INSERT INTO `ps_printout_paper_surcharge` VALUES ('14', 'A2', '80', 'one-sided', '0.000');

-- ----------------------------
-- Table structure for `ps_product`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product`;
CREATE TABLE `ps_product` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title_english` varchar(256) DEFAULT NULL,
  `title_german` varchar(256) DEFAULT NULL,
  `image_path` text,
  `short_description_english` text,
  `short_description_german` text,
  `description_english` text,
  `description_german` text,
  `product_page_url` text,
  `cover_weight` bigint(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_product
-- ----------------------------
INSERT INTO `ps_product` VALUES ('1', 'Hardcover', 'Hardcover', '15882587211.jpg', 'For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.', 'Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', '10', '1', '2020-01-24 12:00:00', '2020-04-30 15:06:10', null);
INSERT INTO `ps_product` VALUES ('2', 'Softcover', 'Softcover', '15898093872_158919157613.jpg.jpg', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Drucken Sie immer noch nur Ihre Arbeit aus? Kein Problem, bei uns können Sie sogar drucken und Ihre Arbeit woanders binden lassen.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', '10', '1', '2020-01-24 12:00:00', '2020-05-18 13:43:07', null);
INSERT INTO `ps_product` VALUES ('3', 'Thermal binding', 'Leimbindung', 'product3.jpg', 'The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.', 'Die thermische Bindung ist die klassische Wahl zum Drucken und Binden einer Arbeit. Der Grund dafür, dass diese Bindung das meistverkaufte Cover für Studenten ist, ist der attraktive Preis und die kurze Produktionszeit.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', null, '1', '2020-01-24 12:00:00', '2020-08-09 10:01:40', null);
INSERT INTO `ps_product` VALUES ('4', 'Spiral binding', 'Spiralbindung', 'product4.jpg', 'The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.', 'Die thermische Bindung ist die klassische Wahl zum Drucken und Binden einer Arbeit. Der Grund dafür, dass diese Bindung das meistverkaufte Cover für Studenten ist, ist der attraktive Preis und die kurze Produktionszeit.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', null, '1', '2020-01-24 12:00:00', '2020-08-09 10:02:16', null);
INSERT INTO `ps_product` VALUES ('5', 'Printing with loose paper', 'Drucken mit losem Papier', 'product4.jpg', 'The completely enclosing softcover made of fine cardboard - also called paperback - gives your thesis a high-quality, magazine-like look.', 'Das vollständig umhüllende Softcover aus feinem Karton - auch Taschenbuch genannt - verleiht Ihrer Arbeit ein hochwertiges, magazinartiges Aussehen.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'loose-print', null, '1', '2020-01-24 12:00:00', '2020-01-24 12:00:00', null);
INSERT INTO `ps_product` VALUES ('6', 'Softcover - Individual', 'Weiche Abdeckung - Individuell', 'product2.jpg', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Drucken Sie immer noch nur Ihre Arbeit aus? Kein Problem, bei uns können Sie sogar drucken und Ihre Arbeit woanders binden lassen.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\r\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', null, '1', null, null, null);
INSERT INTO `ps_product` VALUES ('7', 'Wire Binding', 'Draht Bindung\n', 'product2.jpg', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Drucken Sie immer noch nur Ihre Arbeit aus? Kein Problem, bei uns können Sie sogar drucken und Ihre Arbeit woanders binden lassen.', '<h2>Hardcover</h2>\r\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\r\n					\r\n					<h2>Hardcover edition</h2>\r\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\r\n\r\n					<h2>Hardcover classic</h2>\r\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\r\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'check-out', null, '1', null, null, null);
INSERT INTO `ps_product` VALUES ('8', '15 Free Sample Pages', '15 kostenlose Beispielseiten', 'product3.jpg', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', '<h2>Hardcover</h2>\\r\\n					<p>For a high-quality bachelor\\\'s thesis, master\\\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\\r\\n					\\r\\n					<h2>Hardcover edition</h2>\\r\\n					<p>In the \\\"Edition\\\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\\r\\n\\r\\n					<h2>Hardcover classic</h2>\\r\\n					<p>The \\\"classic\\\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\\r\\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', 'free-sample', null, '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_product_attribute_realationship`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_attribute_realationship`;
CREATE TABLE `ps_product_attribute_realationship` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_attributes_relaton` (`attribute_id`),
  KEY `fk_product_attributes` (`product_id`),
  CONSTRAINT `fk_product_attributes` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_attributes_relaton` FOREIGN KEY (`attribute_id`) REFERENCES `ps_product_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_attribute_realationship
-- ----------------------------
INSERT INTO `ps_product_attribute_realationship` VALUES ('1', '1', '1', null, null, null);
INSERT INTO `ps_product_attribute_realationship` VALUES ('2', '1', '2', null, null, null);
INSERT INTO `ps_product_attribute_realationship` VALUES ('3', '1', '3', null, null, null);
INSERT INTO `ps_product_attribute_realationship` VALUES ('4', '1', '4', null, null, null);
INSERT INTO `ps_product_attribute_realationship` VALUES ('5', '2', '1', null, null, null);
INSERT INTO `ps_product_attribute_realationship` VALUES ('6', '5', '1', null, null, null);

-- ----------------------------
-- Table structure for `ps_product_attributes`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_attributes`;
CREATE TABLE `ps_product_attributes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `model` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_attributes
-- ----------------------------
INSERT INTO `ps_product_attributes` VALUES ('1', 'page_format', '2020-03-12 18:29:15', '2020-02-14 12:21:34', 'PageFormat', null, '1');
INSERT INTO `ps_product_attributes` VALUES ('2', 'cover_color', '2020-03-12 18:29:20', '2020-02-14 12:21:34', 'CoverColor', null, '1');
INSERT INTO `ps_product_attributes` VALUES ('3', 'cover_sheet', '2020-03-12 18:29:22', '2020-02-14 12:21:34', 'CoverSheet', null, '1');
INSERT INTO `ps_product_attributes` VALUES ('4', 'back_sheet', '2020-03-12 18:29:24', '2020-02-14 12:21:34', 'BackCovers', null, '1');

-- ----------------------------
-- Table structure for `ps_product_back_cover`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_back_cover`;
CREATE TABLE `ps_product_back_cover` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `back_cover_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`back_cover_id`),
  KEY `FK_product_cover_sheet` (`product_id`),
  CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_back_cover` FOREIGN KEY (`back_cover_id`) REFERENCES `ps_back_cover` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_back_cover
-- ----------------------------
INSERT INTO `ps_product_back_cover` VALUES ('1', '1', '5', '1', null, null, null);
INSERT INTO `ps_product_back_cover` VALUES ('6', '2', '2', '1', '2020-05-14 09:57:37', '2020-07-30 07:09:14', null);
INSERT INTO `ps_product_back_cover` VALUES ('7', '2', '1', '1', '2020-06-24 10:12:28', '2020-07-30 07:09:14', null);
INSERT INTO `ps_product_back_cover` VALUES ('8', '2', '3', '1', '2020-06-24 10:12:28', '2020-07-30 07:09:14', null);
INSERT INTO `ps_product_back_cover` VALUES ('9', '2', '4', '1', '2020-06-24 10:12:28', '2020-07-30 07:09:14', null);
INSERT INTO `ps_product_back_cover` VALUES ('10', '2', '5', '1', '2020-06-24 10:12:28', '2020-07-30 07:09:14', null);
INSERT INTO `ps_product_back_cover` VALUES ('11', '2', '6', '1', '2020-06-24 10:12:28', '2020-07-30 07:09:14', null);

-- ----------------------------
-- Table structure for `ps_product_cover_color`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_cover_color`;
CREATE TABLE `ps_product_cover_color` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `color_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`color_id`),
  KEY `FK_product_cover_sheet` (`product_id`),
  CONSTRAINT `pk_product` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_product_color` FOREIGN KEY (`color_id`) REFERENCES `ps_cover_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_cover_color
-- ----------------------------
INSERT INTO `ps_product_cover_color` VALUES ('3', '1', '1', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_cover_color` VALUES ('15', '2', '2', '1', '2020-05-14 08:42:04', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_color` VALUES ('16', '2', '1', '1', '2020-05-14 10:15:24', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_color` VALUES ('17', '1', '2', '1', '2020-05-16 13:24:28', '2020-08-09 09:48:32', null);

-- ----------------------------
-- Table structure for `ps_product_cover_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_cover_setting`;
CREATE TABLE `ps_product_cover_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_product_id` bigint(11) NOT NULL,
  `ps_cover_setting_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ps_cover_setting_id` (`ps_cover_setting_id`),
  KEY `ps_product_id` (`ps_product_id`),
  CONSTRAINT `ps_product_cover_setting_ibfk_3` FOREIGN KEY (`ps_cover_setting_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ps_product_cover_setting_ibfk_4` FOREIGN KEY (`ps_product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ps_product_cover_setting
-- ----------------------------
INSERT INTO `ps_product_cover_setting` VALUES ('3', '2', '3', '1', '2020-04-27 08:16:34', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_cover_setting` VALUES ('4', '1', '1', '1', '2020-04-29 09:43:00', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_cover_setting` VALUES ('22', '3', '3', '1', '2020-08-09 10:01:40', '2020-08-09 10:05:10', null);
INSERT INTO `ps_product_cover_setting` VALUES ('23', '4', '3', '1', '2020-08-09 10:02:17', '2020-08-09 10:08:43', null);

-- ----------------------------
-- Table structure for `ps_product_cover_sheet`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_cover_sheet`;
CREATE TABLE `ps_product_cover_sheet` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `cover_sheet_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`cover_sheet_id`),
  KEY `FK_product_cover_sheet` (`product_id`),
  CONSTRAINT `FK_cover_sheet` FOREIGN KEY (`cover_sheet_id`) REFERENCES `ps_cover_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_cover_sheet` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_cover_sheet
-- ----------------------------
INSERT INTO `ps_product_cover_sheet` VALUES ('1', '1', '5', '1', null, null, null);
INSERT INTO `ps_product_cover_sheet` VALUES ('5', '2', '1', '1', '2020-05-14 11:22:41', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_sheet` VALUES ('6', '2', '2', '1', '2020-05-14 11:23:05', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_sheet` VALUES ('7', '2', '3', '1', '2020-06-24 10:12:27', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_sheet` VALUES ('8', '2', '4', '1', '2020-06-24 10:12:27', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_sheet` VALUES ('9', '2', '5', '1', '2020-06-24 10:12:27', '2020-07-30 07:09:13', null);
INSERT INTO `ps_product_cover_sheet` VALUES ('10', '2', '6', '1', '2020-06-24 10:12:27', '2020-07-30 07:09:14', null);

-- ----------------------------
-- Table structure for `ps_product_image`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_image`;
CREATE TABLE `ps_product_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT NULL,
  `image_path` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ps_product_image_1_idx` (`product_id`),
  CONSTRAINT `fk_ps_product_image_1` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_product_image
-- ----------------------------
INSERT INTO `ps_product_image` VALUES ('1', '1', 'product1.jpg', '2020-04-01 08:23:48', '2020-04-01 08:23:48', null);
INSERT INTO `ps_product_image` VALUES ('2', '1', 'product1.jpg', null, null, null);
INSERT INTO `ps_product_image` VALUES ('3', '1', 'product1.jpg', '2020-04-01 08:25:19', '2020-04-01 08:25:19', null);
INSERT INTO `ps_product_image` VALUES ('4', '1', 'product1.jpg', '2020-04-01 08:25:19', '2020-04-01 08:25:19', null);
INSERT INTO `ps_product_image` VALUES ('19', '2', '1588785397.jpg', '2020-05-06 17:16:37', '2020-05-06 17:16:37', null);
INSERT INTO `ps_product_image` VALUES ('20', '2', '1588832248.jpg', '2020-05-07 06:17:28', '2020-05-07 06:17:28', null);
INSERT INTO `ps_product_image` VALUES ('22', '2', '1588834298.png', '2020-05-07 06:51:38', '2020-05-07 06:51:38', null);

-- ----------------------------
-- Table structure for `ps_product_page_format`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_page_format`;
CREATE TABLE `ps_product_page_format` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `paper_format` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`paper_format`),
  KEY `FK_product_cover_sheet` (`product_id`),
  CONSTRAINT `fk_paper_format` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_page_format` FOREIGN KEY (`paper_format`) REFERENCES `ps_page_format` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_page_format
-- ----------------------------
INSERT INTO `ps_product_page_format` VALUES ('1', '1', '1', '1', '2020-08-09 13:18:32', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_page_format` VALUES ('2', '1', '2', '1', '2020-08-09 13:18:32', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_page_format` VALUES ('3', '2', '1', '1', '2020-08-23 21:14:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_page_format` VALUES ('15', '5', '1', '1', null, '2020-04-11 13:23:00', null);
INSERT INTO `ps_product_page_format` VALUES ('28', '2', '2', '1', '2020-08-23 21:14:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_page_format` VALUES ('29', '2', '5', '1', '2020-08-23 21:14:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_page_format` VALUES ('35', '3', '1', '1', '2020-08-09 13:35:10', '2020-08-09 10:05:10', null);
INSERT INTO `ps_product_page_format` VALUES ('36', '4', '1', '1', '2020-08-09 13:38:43', '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_page_format` VALUES ('37', '4', '2', '1', '2020-08-09 13:38:43', '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_page_format` VALUES ('38', '3', '2', '1', '2020-08-09 13:35:10', '2020-08-09 10:05:10', null);

-- ----------------------------
-- Table structure for `ps_product_paper_weight`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_paper_weight`;
CREATE TABLE `ps_product_paper_weight` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `paper_weight_id` int(11) NOT NULL,
  `min_sheets` varchar(10) DEFAULT NULL,
  `max_sheets` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`paper_weight_id`),
  KEY `FK_product_cover_sheet` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_paper_weight
-- ----------------------------
INSERT INTO `ps_product_paper_weight` VALUES ('25', '13', '1', '1', '2', '1', '2020-05-11 08:46:12', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_paper_weight` VALUES ('26', '13', '2', '3', '4', '1', '2020-05-11 08:46:12', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_paper_weight` VALUES ('27', '13', '3', '5', '6', '1', '2020-05-11 08:46:12', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_paper_weight` VALUES ('28', '13', '3', '5', '6', '0', '2020-05-11 08:46:12', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_paper_weight` VALUES ('29', '13', '3', '5', '6', '0', '2020-05-11 08:46:12', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_paper_weight` VALUES ('30', '14', '1', '1', '12', '1', '2020-05-11 11:11:03', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('31', '14', '2', '33', '15', '1', '2020-05-11 11:11:03', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('32', '14', '3', '5', '16', '1', '2020-05-11 11:11:03', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('33', '14', '4', '7', '19', '1', '2020-05-11 11:11:03', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('34', '14', '6', '9', '29', '1', '2020-05-11 11:11:03', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('35', '15', '1', '11', '210', '1', '2020-05-11 11:44:05', '2020-05-18 13:37:15', null);
INSERT INTO `ps_product_paper_weight` VALUES ('36', '15', '2', '31', '410', '1', '2020-05-11 11:44:05', '2020-05-18 13:37:15', null);
INSERT INTO `ps_product_paper_weight` VALUES ('37', '15', '3', '511', '610', '0', '2020-05-11 11:44:05', '2020-05-18 13:37:14', null);
INSERT INTO `ps_product_paper_weight` VALUES ('38', '15', '4', '511', '610', '1', '2020-05-11 11:44:05', '2020-05-18 13:37:15', null);
INSERT INTO `ps_product_paper_weight` VALUES ('39', '15', '6', '81', '910', '1', '2020-05-11 11:44:05', '2020-05-18 13:37:15', null);
INSERT INTO `ps_product_paper_weight` VALUES ('40', '16', '1', '8', '14', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_paper_weight` VALUES ('41', '21', '1', '5', '9', '1', '2020-05-11 16:33:56', '2020-05-11 16:33:56', null);
INSERT INTO `ps_product_paper_weight` VALUES ('42', '22', '1', '11', '12', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_paper_weight` VALUES ('43', '26', '1', '4', '7', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_paper_weight` VALUES ('44', '27', '1', '9', '10', '1', '2020-05-11 16:59:13', '2020-05-11 17:06:17', null);
INSERT INTO `ps_product_paper_weight` VALUES ('45', '9', '1', '11', '24', '1', '2020-05-19 07:31:04', '2020-05-19 07:33:06', null);
INSERT INTO `ps_product_paper_weight` VALUES ('46', '29', '1', '14', '27', '1', '2020-05-19 11:57:51', '2020-05-19 12:00:39', null);
INSERT INTO `ps_product_paper_weight` VALUES ('47', '29', '2', '7', '16', '1', '2020-05-19 11:57:52', '2020-05-19 12:00:39', null);
INSERT INTO `ps_product_paper_weight` VALUES ('48', '29', '3', '201', '301', '1', '2020-05-19 11:57:52', '2020-05-19 12:00:39', null);
INSERT INTO `ps_product_paper_weight` VALUES ('49', '29', '4', null, null, '1', '2020-05-19 11:57:52', '2020-05-19 12:00:39', null);
INSERT INTO `ps_product_paper_weight` VALUES ('135', '30', '1', '1', '2', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_paper_weight` VALUES ('136', '30', '2', '3', '5', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_paper_weight` VALUES ('137', '30', '4', '0', '0', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_paper_weight` VALUES ('138', '32', '1', '1', '2', '1', '2020-05-21 14:25:02', '2020-05-21 14:25:02', null);
INSERT INTO `ps_product_paper_weight` VALUES ('139', '32', '2', '3', '4', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_paper_weight` VALUES ('140', '32', '4', '5', '6', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_paper_weight` VALUES ('245', '1', '1', '50', '199', '1', '2020-08-09 09:48:32', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_paper_weight` VALUES ('246', '1', '3', '60', '240', '1', '2020-08-09 09:48:32', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_paper_weight` VALUES ('248', '3', '1', '40', '60', '1', '2020-08-09 10:05:10', '2020-08-09 10:05:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('249', '3', '2', '40', '60', '1', '2020-08-09 10:05:10', '2020-08-09 10:05:10', null);
INSERT INTO `ps_product_paper_weight` VALUES ('250', '4', '1', '40', '60', '1', '2020-08-09 10:08:43', '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_paper_weight` VALUES ('259', '2', '1', '40', '80', '1', '2020-08-23 17:44:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_paper_weight` VALUES ('260', '2', '2', '5', '9', '1', '2020-08-23 17:44:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_paper_weight` VALUES ('261', '2', '3', '7', '8', '1', '2020-08-23 17:44:47', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_paper_weight` VALUES ('262', '2', '6', '5', '6', '1', '2020-08-23 17:44:47', '2020-08-23 17:44:47', null);

-- ----------------------------
-- Table structure for `ps_product_price`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_price`;
CREATE TABLE `ps_product_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_product_id` bigint(11) NOT NULL DEFAULT '0',
  `min_range` bigint(11) NOT NULL DEFAULT '0',
  `max_range` bigint(11) NOT NULL DEFAULT '0',
  `price` double(10,3) NOT NULL DEFAULT '0.000',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ps_product_id` (`ps_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ps_product_price
-- ----------------------------
INSERT INTO `ps_product_price` VALUES ('1', '1', '1', '50', '10.000', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_price` VALUES ('2', '1', '51', '100', '11.000', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_price` VALUES ('3', '1', '101', '150', '12.000', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_price` VALUES ('4', '1', '151', '210', '13.000', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_price` VALUES ('5', '1', '201', '250', '14.000', '1', null, '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_price` VALUES ('6', '2', '1', '50', '8.000', '1', null, '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_price` VALUES ('7', '2', '51', '100', '8.500', '1', null, '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_price` VALUES ('8', '2', '101', '150', '9.000', '1', null, '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_price` VALUES ('9', '2', '151', '200', '9.500', '1', null, '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_price` VALUES ('10', '2', '201', '250', '10.000', '1', null, '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_price` VALUES ('11', '6', '1', '50', '11.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('12', '6', '51', '100', '12.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('13', '6', '101', '150', '13.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('14', '6', '151', '200', '14.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('15', '6', '201', '250', '15.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('16', '7', '1', '50', '2.500', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('17', '7', '51', '100', '3.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('18', '7', '101', '150', '3.500', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('19', '7', '151', '200', '4.000', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('20', '7', '201', '250', '4.500', '1', null, null, null);
INSERT INTO `ps_product_price` VALUES ('21', '4', '1', '50', '2.500', '1', null, '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_price` VALUES ('22', '4', '151', '200', '3.000', '1', null, '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_price` VALUES ('23', '4', '201', '250', '3.500', '1', null, '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_price` VALUES ('26', '4', '51', '100', '4.000', '1', null, '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_price` VALUES ('27', '4', '101', '150', '4.500', '1', null, '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_price` VALUES ('28', '10', '1', '50', '10.000', '1', '2020-05-11 07:59:28', '2020-05-11 07:59:28', null);
INSERT INTO `ps_product_price` VALUES ('29', '10', '51', '100', '11.000', '1', '2020-05-11 07:59:28', '2020-05-11 07:59:28', null);
INSERT INTO `ps_product_price` VALUES ('30', '10', '101', '150', '12.000', '1', '2020-05-11 07:59:28', '2020-05-11 07:59:28', null);
INSERT INTO `ps_product_price` VALUES ('31', '10', '191', '250', '13.000', '1', '2020-05-11 07:59:28', '2020-05-11 07:59:28', null);
INSERT INTO `ps_product_price` VALUES ('32', '10', '201', '250', '14.000', '1', '2020-05-11 07:59:28', '2020-05-11 07:59:28', null);
INSERT INTO `ps_product_price` VALUES ('33', '12', '1', '50', '18.000', '1', '2020-05-11 08:41:48', '2020-05-11 08:41:48', null);
INSERT INTO `ps_product_price` VALUES ('34', '12', '51', '100', '21.000', '1', '2020-05-11 08:41:48', '2020-05-11 08:41:48', null);
INSERT INTO `ps_product_price` VALUES ('35', '12', '101', '150', '12.000', '1', '2020-05-11 08:41:48', '2020-05-11 08:41:48', null);
INSERT INTO `ps_product_price` VALUES ('36', '12', '191', '250', '13.000', '1', '2020-05-11 08:41:48', '2020-05-11 08:41:48', null);
INSERT INTO `ps_product_price` VALUES ('37', '12', '201', '250', '14.000', '1', '2020-05-11 08:41:48', '2020-05-11 08:41:48', null);
INSERT INTO `ps_product_price` VALUES ('38', '38', '1', '50', '11675.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:40', null);
INSERT INTO `ps_product_price` VALUES ('39', '39', '51', '100', '1276.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:41', null);
INSERT INTO `ps_product_price` VALUES ('40', '40', '101', '150', '1367.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:41', null);
INSERT INTO `ps_product_price` VALUES ('41', '41', '191', '250', '1467.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:41', null);
INSERT INTO `ps_product_price` VALUES ('42', '42', '201', '250', '1567.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:41', null);
INSERT INTO `ps_product_price` VALUES ('43', '43', '251', '300', '1667.000', '1', '2020-05-11 08:46:12', '2020-05-11 10:51:41', null);
INSERT INTO `ps_product_price` VALUES ('44', '13', '1', '50', '1012.000', '1', '2020-05-11 11:00:30', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_price` VALUES ('45', '13', '51', '100', '1112.000', '1', '2020-05-11 11:00:30', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_price` VALUES ('46', '13', '101', '150', '1212.000', '1', '2020-05-11 11:00:30', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_price` VALUES ('47', '13', '191', '250', '1311.000', '1', '2020-05-11 11:00:30', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_price` VALUES ('48', '13', '201', '250', '141.000', '1', '2020-05-11 11:00:30', '2020-05-11 11:00:30', null);
INSERT INTO `ps_product_price` VALUES ('49', '49', '1', '50', '32.000', '1', '2020-05-11 11:11:03', '2020-05-11 11:38:20', null);
INSERT INTO `ps_product_price` VALUES ('50', '50', '51', '100', '38.000', '1', '2020-05-11 11:11:03', '2020-05-11 11:38:20', null);
INSERT INTO `ps_product_price` VALUES ('51', '51', '101', '150', '45.000', '1', '2020-05-11 11:11:03', '2020-05-11 11:38:20', null);
INSERT INTO `ps_product_price` VALUES ('52', '52', '191', '250', '52.000', '1', '2020-05-11 11:11:03', '2020-05-11 11:38:20', null);
INSERT INTO `ps_product_price` VALUES ('53', '53', '201', '250', '66.000', '1', '2020-05-11 11:11:03', '2020-05-11 11:38:20', null);
INSERT INTO `ps_product_price` VALUES ('54', '54', '1', '50', '100.000', '1', '2020-05-11 11:39:55', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_price` VALUES ('55', '55', '51', '100', '110.000', '1', '2020-05-11 11:39:55', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_price` VALUES ('56', '56', '101', '150', '120.000', '1', '2020-05-11 11:39:55', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_price` VALUES ('57', '57', '191', '250', '130.000', '1', '2020-05-11 11:39:55', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_price` VALUES ('58', '58', '201', '250', '140.000', '1', '2020-05-11 11:39:55', '2020-05-11 11:41:10', null);
INSERT INTO `ps_product_price` VALUES ('59', '59', '1', '50', '100.000', '1', '2020-05-11 11:44:05', '2020-05-11 11:45:55', null);
INSERT INTO `ps_product_price` VALUES ('60', '60', '51', '100', '110.000', '1', '2020-05-11 11:44:05', '2020-05-11 11:45:55', null);
INSERT INTO `ps_product_price` VALUES ('61', '61', '101', '150', '120.000', '1', '2020-05-11 11:44:05', '2020-05-11 11:45:55', null);
INSERT INTO `ps_product_price` VALUES ('62', '62', '191', '250', '130.000', '1', '2020-05-11 11:44:05', '2020-05-11 11:45:55', null);
INSERT INTO `ps_product_price` VALUES ('63', '63', '201', '250', '149.000', '1', '2020-05-11 11:44:05', '2020-05-11 11:45:55', null);
INSERT INTO `ps_product_price` VALUES ('64', '64', '1', '50', '10001.000', '1', '2020-05-11 11:51:13', '2020-05-11 11:52:13', null);
INSERT INTO `ps_product_price` VALUES ('65', '65', '51', '100', '1101.000', '1', '2020-05-11 11:51:13', '2020-05-11 11:52:13', null);
INSERT INTO `ps_product_price` VALUES ('66', '66', '101', '150', '12011.000', '1', '2020-05-11 11:51:13', '2020-05-11 11:52:13', null);
INSERT INTO `ps_product_price` VALUES ('67', '67', '191', '250', '1301.000', '1', '2020-05-11 11:51:13', '2020-05-11 11:52:13', null);
INSERT INTO `ps_product_price` VALUES ('68', '68', '201', '250', '1401.000', '1', '2020-05-11 11:51:13', '2020-05-11 11:52:13', null);
INSERT INTO `ps_product_price` VALUES ('69', '15', '1', '50', '9.120', '1', '2020-05-11 11:59:32', '2020-05-13 11:05:48', null);
INSERT INTO `ps_product_price` VALUES ('70', '15', '51', '100', '1100.040', '1', '2020-05-11 11:59:32', '2020-05-18 10:50:44', null);
INSERT INTO `ps_product_price` VALUES ('71', '15', '101', '150', '1200.000', '1', '2020-05-11 11:59:32', '2020-05-11 12:01:20', null);
INSERT INTO `ps_product_price` VALUES ('72', '15', '191', '250', '13000.000', '1', '2020-05-11 11:59:32', '2020-05-11 12:01:20', null);
INSERT INTO `ps_product_price` VALUES ('73', '15', '201', '250', '1400.000', '1', '2020-05-11 11:59:32', '2020-05-11 12:01:20', null);
INSERT INTO `ps_product_price` VALUES ('74', '16', '1', '50', '10.000', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_price` VALUES ('75', '16', '51', '100', '11.000', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_price` VALUES ('76', '16', '101', '150', '12.000', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_price` VALUES ('77', '16', '191', '250', '13.000', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_price` VALUES ('78', '16', '201', '250', '14.000', '1', '2020-05-11 16:27:14', '2020-05-11 16:27:14', null);
INSERT INTO `ps_product_price` VALUES ('79', '21', '1', '50', '10.000', '1', '2020-05-11 16:33:57', '2020-05-11 16:33:57', null);
INSERT INTO `ps_product_price` VALUES ('80', '21', '51', '100', '11.000', '1', '2020-05-11 16:33:57', '2020-05-11 16:33:57', null);
INSERT INTO `ps_product_price` VALUES ('81', '21', '101', '150', '12.000', '1', '2020-05-11 16:33:57', '2020-05-11 16:33:57', null);
INSERT INTO `ps_product_price` VALUES ('82', '21', '191', '250', '13.000', '1', '2020-05-11 16:33:57', '2020-05-11 16:33:57', null);
INSERT INTO `ps_product_price` VALUES ('83', '21', '201', '250', '14.000', '1', '2020-05-11 16:33:57', '2020-05-11 16:33:57', null);
INSERT INTO `ps_product_price` VALUES ('84', '22', '1', '50', '10.000', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_price` VALUES ('85', '22', '51', '100', '11.000', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_price` VALUES ('86', '22', '101', '150', '12.000', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_price` VALUES ('87', '22', '191', '250', '13.000', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_price` VALUES ('88', '22', '201', '250', '14.000', '1', '2020-05-11 16:37:34', '2020-05-11 16:37:34', null);
INSERT INTO `ps_product_price` VALUES ('89', '26', '1', '50', '10.000', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_price` VALUES ('90', '26', '51', '100', '11.000', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_price` VALUES ('91', '26', '101', '150', '12.000', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_price` VALUES ('92', '26', '191', '250', '13.000', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_price` VALUES ('93', '26', '201', '250', '14.000', '1', '2020-05-11 16:53:00', '2020-05-11 16:53:00', null);
INSERT INTO `ps_product_price` VALUES ('94', '27', '1', '50', '10.000', '1', '2020-05-11 16:59:13', '2020-05-11 16:59:13', null);
INSERT INTO `ps_product_price` VALUES ('95', '27', '51', '100', '11.000', '1', '2020-05-11 16:59:13', '2020-05-11 16:59:13', null);
INSERT INTO `ps_product_price` VALUES ('96', '27', '101', '150', '12.000', '1', '2020-05-11 16:59:13', '2020-05-11 16:59:13', null);
INSERT INTO `ps_product_price` VALUES ('97', '27', '191', '250', '13.000', '1', '2020-05-11 16:59:13', '2020-05-11 16:59:13', null);
INSERT INTO `ps_product_price` VALUES ('98', '27', '201', '250', '14.000', '1', '2020-05-11 16:59:13', '2020-05-11 16:59:13', null);
INSERT INTO `ps_product_price` VALUES ('99', '9', '1', '50', '10.000', '1', '2020-05-19 07:33:06', '2020-05-19 07:33:06', null);
INSERT INTO `ps_product_price` VALUES ('100', '9', '51', '100', '11.000', '1', '2020-05-19 07:33:07', '2020-05-19 07:33:07', null);
INSERT INTO `ps_product_price` VALUES ('101', '9', '101', '150', '12.000', '1', '2020-05-19 07:33:07', '2020-05-19 07:33:07', null);
INSERT INTO `ps_product_price` VALUES ('102', '9', '191', '250', '13.000', '1', '2020-05-19 07:33:07', '2020-05-19 07:33:07', null);
INSERT INTO `ps_product_price` VALUES ('103', '9', '201', '250', '14.000', '1', '2020-05-19 07:33:07', '2020-05-19 07:33:07', null);
INSERT INTO `ps_product_price` VALUES ('104', '29', '1', '50', '10.000', '1', '2020-05-19 11:57:52', '2020-05-19 11:57:52', null);
INSERT INTO `ps_product_price` VALUES ('105', '29', '51', '100', '11.000', '1', '2020-05-19 11:57:52', '2020-05-19 11:57:52', null);
INSERT INTO `ps_product_price` VALUES ('106', '29', '101', '150', '12.000', '1', '2020-05-19 11:57:52', '2020-05-19 11:57:52', null);
INSERT INTO `ps_product_price` VALUES ('107', '29', '191', '250', '13.000', '1', '2020-05-19 11:57:52', '2020-05-19 11:57:52', null);
INSERT INTO `ps_product_price` VALUES ('108', '29', '201', '250', '14.000', '1', '2020-05-19 11:57:52', '2020-05-19 11:57:52', null);
INSERT INTO `ps_product_price` VALUES ('109', '30', '1', '50', '10.000', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_price` VALUES ('110', '30', '51', '100', '11.000', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_price` VALUES ('111', '30', '101', '150', '12.000', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_price` VALUES ('112', '30', '191', '250', '13.000', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_price` VALUES ('113', '30', '201', '250', '14.000', '1', '2020-05-21 14:15:57', '2020-05-21 14:15:57', null);
INSERT INTO `ps_product_price` VALUES ('114', '32', '1', '50', '10.000', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_price` VALUES ('115', '32', '51', '100', '11.000', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_price` VALUES ('116', '32', '101', '150', '12.000', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_price` VALUES ('117', '32', '191', '250', '13.000', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_price` VALUES ('118', '32', '201', '250', '14.000', '1', '2020-05-21 14:25:03', '2020-05-21 14:25:03', null);
INSERT INTO `ps_product_price` VALUES ('119', '3', '1', '50', '10.000', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:10', null);
INSERT INTO `ps_product_price` VALUES ('120', '3', '51', '100', '11.000', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:11', null);
INSERT INTO `ps_product_price` VALUES ('121', '3', '101', '150', '12.000', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:11', null);
INSERT INTO `ps_product_price` VALUES ('122', '3', '191', '250', '13.000', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:11', null);
INSERT INTO `ps_product_price` VALUES ('123', '3', '201', '250', '14.000', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:11', null);

-- ----------------------------
-- Table structure for `ps_product_print_finishing`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_print_finishing`;
CREATE TABLE `ps_product_print_finishing` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(11) NOT NULL,
  `print_finishing_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cover_sheet` (`print_finishing_id`),
  KEY `FK_product_cover_sheet` (`product_id`),
  CONSTRAINT `pk_finishing` FOREIGN KEY (`print_finishing_id`) REFERENCES `ps_print_finishing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_product_print` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_product_print_finishing
-- ----------------------------
INSERT INTO `ps_product_print_finishing` VALUES ('2', '2', '2', '1', '2020-04-01 06:46:57', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_print_finishing` VALUES ('3', '1', '2', '1', '2020-04-01 08:25:20', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_print_finishing` VALUES ('20', '4', '3', '1', '2020-08-09 10:03:26', '2020-08-09 10:08:43', null);
INSERT INTO `ps_product_print_finishing` VALUES ('21', '3', '3', '1', '2020-08-09 10:03:48', '2020-08-09 10:05:10', null);

-- ----------------------------
-- Table structure for `ps_product_print_finishing_art_list`
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_print_finishing_art_list`;
CREATE TABLE `ps_product_print_finishing_art_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_product_pf_id` bigint(11) NOT NULL,
  `ps_art_list_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ps_product_pf_id` (`ps_product_pf_id`),
  KEY `ps_art_list_id` (`ps_art_list_id`),
  CONSTRAINT `ps_product_print_finishing_art_list_ibfk_2` FOREIGN KEY (`ps_art_list_id`) REFERENCES `ps_art_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ps_product_print_finishing_art_list
-- ----------------------------
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('1', '2', '1', '0', '2020-04-01 06:46:57', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('2', '3', '1', '0', '2020-04-01 08:25:20', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('3', '3', '2', '0', '2020-04-01 08:25:20', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('4', '2', '2', '0', '2020-04-27 08:16:34', '2020-08-23 17:44:47', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('5', '3', '1', '0', '2020-05-16 13:24:28', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('6', '3', '2', '0', '2020-05-16 13:24:28', '2020-08-09 09:48:32', null);
INSERT INTO `ps_product_print_finishing_art_list` VALUES ('13', '15', '2', '0', '2020-05-18 11:16:47', '2020-05-18 13:37:15', null);

-- ----------------------------
-- Table structure for `ps_roles`
-- ----------------------------
DROP TABLE IF EXISTS `ps_roles`;
CREATE TABLE `ps_roles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_roles
-- ----------------------------
INSERT INTO `ps_roles` VALUES ('1', 'SuperAdmin', '2020-07-08 18:29:54', '2020-07-08 18:30:03', null);
INSERT INTO `ps_roles` VALUES ('2', 'Admin', '2020-07-08 18:29:58', '2020-07-08 18:30:07', null);
INSERT INTO `ps_roles` VALUES ('3', 'Employee', '2020-07-08 18:30:00', '2020-07-08 18:30:13', null);

-- ----------------------------
-- Table structure for `ps_slider`
-- ----------------------------
DROP TABLE IF EXISTS `ps_slider`;
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
  `redirect_url` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_slider
-- ----------------------------
INSERT INTO `ps_slider` VALUES ('1', 'public/images/slide-01.png', '1', '1', 'Slide 1', 'Folie 1', 'Title 1', 'Title 1', 'black', '14', '1', '2020-01-23 19:00:00', '2020-01-23 19:00:00', null);
INSERT INTO `ps_slider` VALUES ('2', 'public/images/slide-02.png', '1', '0', 'Tittle_2', 'Tittle_2', 'Content_2', 'Inhalt_2', '#000000', '14', '3', '2020-01-24 11:00:00', '2020-05-19 05:23:26', null);
INSERT INTO `ps_slider` VALUES ('3', 'public/images/slide-03.png', '1', '0', 'Tittle_3', 'Tittle_3', 'Content_3', 'Inhalt_3', '#000000', '14', '1', '2020-01-24 11:00:00', '2020-08-09 11:01:31', null);
INSERT INTO `ps_slider` VALUES ('4', 'public/images/slide-04.png', '1', '0', 'test', 'test', 'test', 'test', '#000000', '22', '3', '2020-05-19 05:34:15', '2020-07-15 15:59:17', null);

-- ----------------------------
-- Table structure for `ps_split_order_shipping_addresses`
-- ----------------------------
DROP TABLE IF EXISTS `ps_split_order_shipping_addresses`;
CREATE TABLE `ps_split_order_shipping_addresses` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `prod_sequence` int(2) DEFAULT NULL,
  `sequence` int(2) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `no_of_copies` int(5) unsigned NOT NULL DEFAULT '0',
  `no_of_cds` int(5) DEFAULT '0',
  `shipping_address` text,
  `shipping_company` text,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_split_order_shipping_addresses
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_template`
-- ----------------------------
DROP TABLE IF EXISTS `ps_template`;
CREATE TABLE `ps_template` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `tempelate` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_template
-- ----------------------------
INSERT INTO `ps_template` VALUES ('1', 'Standardvorlage mit Logo\n      ', null, 'Standard template with logo', 'Standardvorlage mit Logo\n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_template` VALUES ('2', 'Standardvorlage ohne Logo\n      ', null, 'Standard template without logo', 'Standardvorlage ohne Logo\n      ', '1', '2020-02-11 00:00:00', '2020-02-11 00:00:00', null);
INSERT INTO `ps_template` VALUES ('3', 'Eigene Vorlage       ', null, 'Own template', 'Eigene Vorlage       ', '1', '2020-02-27 07:00:00', '2020-02-27 08:00:00', null);

-- ----------------------------
-- Table structure for `ps_user_addresses`
-- ----------------------------
DROP TABLE IF EXISTS `ps_user_addresses`;
CREATE TABLE `ps_user_addresses` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `address_type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `addition` varchar(255) DEFAULT NULL,
  `default` tinyint(1) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_address` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_user_addresses
-- ----------------------------

-- ----------------------------
-- Table structure for `ps_user_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `ps_user_permissions`;
CREATE TABLE `ps_user_permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `permissions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ps_user_permissions
-- ----------------------------
INSERT INTO `ps_user_permissions` VALUES ('1', '8', 'palak1', '1', '{\"Parameter\":\"0\",\"Return orders\":\"0\",\"Sliders\":\"1\",\"Latest\":\"1\",\"Change Orders Attributes\":\"0\",\"Send link for new file\":\"0\"}', '2020-07-09 07:27:02', '2020-08-09 10:49:16', null);
INSERT INTO `ps_user_permissions` VALUES ('2', '12', 'superAdmin', '0', '{\"Parameter\":1,\"Return orders\":1,\"Sliders\":1,\"Latest\":1,\"Change Orders Attributes\":1,\"Send link for new file\":1}', '2020-07-09 07:50:24', '2020-07-09 07:50:24', null);
INSERT INTO `ps_user_permissions` VALUES ('3', '1', 'swati', '0', '{\"Parameter\":1,\"Return orders\":1,\"Sliders\":1,\"Latest\":1,\"Change Orders Attributes\":1,\"Send link for new file\":1}', '2020-07-09 16:17:46', '2020-07-09 16:17:50', null);
INSERT INTO `ps_user_permissions` VALUES ('4', '13', 'Druckshop', '2', '{\"Parameter\":\"1\",\"Return orders\":\"1\",\"Sliders\":\"1\",\"Latest\":\"1\",\"Change Orders Attributes\":\"1\",\"Send link for new file\":\"1\"}', '2020-07-19 17:41:59', '2020-08-23 17:58:13', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'swati', 'swati.batra@trantorinc.com', '1', null, '$2y$10$VMXa7UeRiMio9NPeWuZTpeeNQGA3YutyV2qaf2Z8HW9TvWPchX4BG', '26VuAAIDAgJqVQa0UxUqquuJGpFASpZMVxfCgrHt50xCRtSyumTgEeuQYU7e', '2020-03-07 15:19:40', '2020-03-07 15:19:40');

-- ----------------------------
-- Table structure for `users_admin`
-- ----------------------------
DROP TABLE IF EXISTS `users_admin`;
CREATE TABLE `users_admin` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 => SA, 1=>A, 2=>E, 3=>U, 4=>SV',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users_admin
-- ----------------------------
INSERT INTO `users_admin` VALUES ('1', 'swati', null, 'swati.batra@trantorinc.com', null, '$2y$10$qNSsrL83cYAYXro9VT3N2.99qRstgFss85W/T8gNwtHHBmUXkloge', null, '0', '1', '2020-03-07 15:19:40', '2020-05-21 09:19:59', null);

-- ----------------------------
-- Table structure for `verify_users`
-- ----------------------------
DROP TABLE IF EXISTS `verify_users`;
CREATE TABLE `verify_users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `token` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Fk_user_id` (`user_id`),
  CONSTRAINT `Fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of verify_users
-- ----------------------------
