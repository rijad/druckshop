-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2020 at 06:53 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.1.33-12+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ps_about`
--

CREATE TABLE `ps_about` (
  `id` bigint(11) NOT NULL,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` text,
  `text_german` text,
  `status` tinyint(4) DEFAULT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_about`
--

INSERT INTO `ps_about` (`id`, `title_english`, `title_german`, `text_english`, `text_german`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'public/images/product4.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_art_list`
--

CREATE TABLE `ps_art_list` (
  `id` bigint(11) NOT NULL,
  `check_list` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_art_list`
--

INSERT INTO `ps_art_list` (`id`, `check_list`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Klassik', NULL, 'Klassik', 'Klassik', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Edition', NULL, 'Edition', 'Auflage', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_back_cover`
--

CREATE TABLE `ps_back_cover` (
  `id` bigint(11) NOT NULL,
  `back_cover` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_back_cover`
--

INSERT INTO `ps_back_cover` (`id`, `back_cover`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Folie-matt', NULL, 'Foil matt', 'Folie-matt', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Folie-Klarsicht', NULL, 'Transparent film', 'Folie-Klarsicht', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'Karton-Schwarz', NULL, 'Cardboard black', 'Karton-Schwarz', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(4, 'Karton-Dunkelblau', NULL, 'Cardboard dark blue', 'Karton-Dunkelblau', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(5, 'Eigenes Deckblatt mit Folie', NULL, 'Own cover sheet with foil', 'Eigenes Deckblatt mit Folie', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(6, 'Eigenes Deckblatt ohne Folie', NULL, 'Own cover sheet without foil', 'Eigenes Deckblatt ohne Folie', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_billing_address`
--

CREATE TABLE `ps_billing_address` (
  `id` bigint(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ps_cd_bag`
--

CREATE TABLE `ps_cd_bag` (
  `id` bigint(11) NOT NULL,
  `bag` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_cd_bag`
--

INSERT INTO `ps_cd_bag` (`id`, `bag`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hülle', NULL, 'Cover', 'Hülle', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Selbstklebende', NULL, 'Self-adhesive', 'Selbstklebende', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_contact`
--

CREATE TABLE `ps_contact` (
  `id` int(11) NOT NULL,
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
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_contact`
--

INSERT INTO `ps_contact` (`id`, `email`, `address_english`, `address_german`, `text_english`, `text_german`, `location`, `contact`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abc@gmail.com', '#123 sector-13', '#123 sector-13', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Chandigarh', '1234569877', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_color`
--

CREATE TABLE `ps_cover_color` (
  `id` bigint(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_cover_color`
--

INSERT INTO `ps_cover_color` (`id`, `color`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Schwarz', NULL, 'Black', 'Schwarz', NULL, NULL, NULL, NULL),
(2, 'Dunkelblau', NULL, 'Navy Blue', 'Dunkelblau', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_settings`
--

CREATE TABLE `ps_cover_settings` (
  `id` bigint(11) NOT NULL,
  `cover_settings` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_cover_settings`
--

INSERT INTO `ps_cover_settings` (`id`, `cover_settings`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AA', NULL, 'AA', 'AA', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'BB', NULL, 'BB', 'BB', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'None', NULL, 'None', 'Keiner', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_settings_back_sheet`
--

CREATE TABLE `ps_cover_settings_back_sheet` (
  `id` bigint(11) NOT NULL,
  `cover_settings_id` bigint(11) NOT NULL,
  `back_sheet_id` bigint(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_cover_settings_back_sheet`
--

INSERT INTO `ps_cover_settings_back_sheet` (`id`, `cover_settings_id`, `back_sheet_id`, `updated_at`, `deleted_at`, `created_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_settings_cover_color`
--

CREATE TABLE `ps_cover_settings_cover_color` (
  `id` bigint(11) NOT NULL,
  `cover_settings_id` bigint(11) NOT NULL,
  `cover_color_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_cover_settings_cover_color`
--

INSERT INTO `ps_cover_settings_cover_color` (`id`, `cover_settings_id`, `cover_color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 1, 1, NULL, NULL, NULL),
(4, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_settings_cover_sheet`
--

CREATE TABLE `ps_cover_settings_cover_sheet` (
  `id` bigint(11) NOT NULL,
  `cover_settings_id` bigint(11) NOT NULL,
  `cover_sheet_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_cover_settings_cover_sheet`
--

INSERT INTO `ps_cover_settings_cover_sheet` (`id`, `cover_settings_id`, `cover_sheet_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_cover_sheet`
--

CREATE TABLE `ps_cover_sheet` (
  `id` bigint(11) NOT NULL,
  `sheet` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_cover_sheet`
--

INSERT INTO `ps_cover_sheet` (`id`, `sheet`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Folie-matt', NULL, 'Foil-matt', 'Folie-matt', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Folie-Klarsicht', NULL, 'Transparent film', 'Folie-Klarsicht', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'Karton-Schwarz', NULL, 'Cardboard black', 'Karton-Schwarz', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(4, 'Karton-Dunkelblau', NULL, 'Cardboard dark blue', 'Karton-Dunkelblau', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(5, 'Eigenes Deckblatt mit Folie', NULL, 'Own cover sheet with foil', 'Eigenes Deckblatt mit Folie', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(6, 'Eigenes Deckblatt ohne Folie', NULL, 'Own cover sheet without foil', 'Eigenes Deckblatt ohne Folie', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_data_check`
--

CREATE TABLE `ps_data_check` (
  `id` bigint(11) NOT NULL,
  `check_list` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_data_check`
--

INSERT INTO `ps_data_check` (`id`, `check_list`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Standard', NULL, 'Standard', 'Standard', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Prämium', NULL, 'Premium', 'Prämium', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_date_format`
--

CREATE TABLE `ps_date_format` (
  `id` bigint(11) NOT NULL,
  `date_format` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_date_format`
--

INSERT INTO `ps_date_format` (`id`, `date_format`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jahr\n      ', 'y', 'year', 'Jahr\n      \n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Monat - Jahr\n      \n      ', 'my', 'Month year', 'Monat - Jahr\n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'Tag - Monat - Jahr       ', 'dmy', 'Day month Year', 'Tag - Monat - Jahr       ', 1, '2020-02-26 23:30:00', '2020-02-27 05:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_delivery_service`
--

CREATE TABLE `ps_delivery_service` (
  `id` bigint(11) NOT NULL,
  `delivery_service` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_delivery_service`
--

INSERT INTO `ps_delivery_service` (`id`, `delivery_service`, `surname`, `name_english`, `name_german`, `status`, `weight_per_sheet`, `min_sheets_for_spine`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DHL', NULL, NULL, NULL, 1, NULL, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'UPS', NULL, NULL, NULL, 1, NULL, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'DPD', NULL, NULL, NULL, 1, NULL, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_discount`
--

CREATE TABLE `ps_discount` (
  `id` bigint(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `by_price` double(9,4) DEFAULT NULL,
  `by_percent` double(9,4) DEFAULT NULL,
  `needs_code` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_discount`
--

INSERT INTO `ps_discount` (`id`, `code`, `surname`, `name_english`, `name_german`, `to_date`, `from_date`, `duration`, `by_price`, `by_percent`, `needs_code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DS-2435', NULL, NULL, NULL, '2020-02-29', '2020-02-11', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(7, 'test1', NULL, 'test', 'test', '2020-04-04', '2020-03-05', 30, 52.0000, NULL, 1, 1, '2020-03-18 03:49:14', '2020-03-18 03:49:14', NULL),
(8, 'test12', NULL, 'test2', 'test2', '2020-04-21', '2020-03-02', 50, 52.0000, 25.0000, 1, 1, '2020-03-18 03:53:43', '2020-03-18 04:04:01', NULL),
(9, 'test', NULL, 'test', 'test', NULL, '2020-03-11', 7, NULL, 89.0000, 1, 1, '2020-03-18 03:54:09', '2020-03-18 03:54:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_fonts`
--

CREATE TABLE `ps_fonts` (
  `id` bigint(11) NOT NULL,
  `font` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_fonts`
--

INSERT INTO `ps_fonts` (`id`, `font`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Times New Roman\n      ', NULL, 'Times New Roman', 'Times New Roman\n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Arial\n      ', '', 'Arial', 'Arial\n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_free_smaple`
--

CREATE TABLE `ps_free_smaple` (
  `id` bigint(11) NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_frequently_asked_question`
--

CREATE TABLE `ps_frequently_asked_question` (
  `id` bigint(11) NOT NULL,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` text,
  `text_german` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_frequently_asked_question`
--

INSERT INTO `ps_frequently_asked_question` (`id`, `title_english`, `title_german`, `text_english`, `text_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' Collapsible Group Item #1', 'Zusammenklappbares Gruppenelement Nr. 1', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.', 1, NULL, NULL, NULL),
(2, ' Collapsible Group Item #2', 'Zusammenklappbares Gruppenelement Nr. 2', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.', 1, NULL, NULL, NULL),
(3, ' Collapsible Group Item #3', 'Zusammenklappbares Gruppenelement Nr. 3', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod High Life Akkusamus Terry Richardson Ad Squid. 3 Wolf Moon Officia Aute, nicht Cupidatat Skateboard Dolor Brunch. Imbisswagen quinoa nesciunt laborum eiusmod. Brunch 3 Wolf Mond tempor, sunt Aliqua legte einen Vogel darauf Tintenfisch Single-Origin-Kaffee nulla Annahme Shoreditch et. Nihil anim keffiyeh helvetica, bier basteln labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur Metzger Vice Lomo. Leggings Occaecat Craft Beer Farm-to-Table, ästhetischer Synthie-Nesciunt aus rohem Denim, von dem Sie wahrscheinlich noch nichts gehört haben. Akkusamus labore nachhaltige VHS.', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_gallery`
--

CREATE TABLE `ps_gallery` (
  `id` bigint(11) NOT NULL,
  `image` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_kind_list`
--

CREATE TABLE `ps_kind_list` (
  `id` bigint(11) NOT NULL,
  `kind` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ps_latest`
--

CREATE TABLE `ps_latest` (
  `id` bigint(11) NOT NULL,
  `title_english` varchar(45) DEFAULT NULL,
  `title_german` varchar(45) DEFAULT NULL,
  `text_english` text,
  `text_german` text,
  `status` tinyint(4) DEFAULT NULL,
  `image` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_latest`
--

INSERT INTO `ps_latest` (`id`, `title_english`, `title_german`, `text_english`, `text_german`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'public/images/product1.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_letters_of_spine`
--

CREATE TABLE `ps_letters_of_spine` (
  `id` bigint(11) NOT NULL,
  `sheets_range_start` double(6,2) DEFAULT NULL,
  `sheets_range_end` double(6,2) DEFAULT NULL,
  `letters` varchar(45) DEFAULT NULL,
  `paper_weight_id` bigint(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delivery_service_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_letters_of_spine`
--

INSERT INTO `ps_letters_of_spine` (`id`, `sheets_range_start`, `sheets_range_end`, `letters`, `paper_weight_id`, `status`, `delivery_service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0.00, 65.00, '40', 3, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 66.00, 150.00, '130', 3, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 151.00, 190.00, '160', 3, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(4, 191.00, 250.00, '205', 3, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(5, 251.00, 300.00, '265', 3, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(6, 0.00, 65.00, '40', 2, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(7, 66.00, 150.00, '130', 2, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(8, 151.00, 190.00, '160', 2, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(9, 191.00, 250.00, '205', 2, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(10, 251.00, 300.00, '265', 2, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(11, 0.00, 65.00, '40', 1, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(12, 66.00, 150.00, '130', 1, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(13, 151.00, 190.00, '160', 1, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(14, 191.00, 250.00, '205', 1, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(15, 251.00, 300.00, '265', 1, 1, NULL, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(16, 0.00, 3.50, '3.5', NULL, 1, 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(17, 3.50, 4.50, '4', NULL, 1, 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(18, 4.50, 5.50, '4.5', NULL, 1, 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(19, 0.00, 3.50, '3.5', NULL, 1, 2, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(20, 3.50, 4.50, '4', NULL, 1, 2, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(21, 4.50, 5.50, '4.5', NULL, 1, 2, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(22, 0.00, 3.50, '3.5', NULL, 1, 3, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(23, 3.50, 4.50, '4', NULL, 1, 3, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(24, 4.50, 5.50, '4.5', NULL, 1, 3, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_mirror`
--

CREATE TABLE `ps_mirror` (
  `id` bigint(11) NOT NULL,
  `mirror` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_mirror`
--

INSERT INTO `ps_mirror` (`id`, `mirror`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Long edge', NULL, NULL, NULL, 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Short edge', NULL, NULL, NULL, 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_news_letter`
--

CREATE TABLE `ps_news_letter` (
  `id` bigint(11) NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_news_letter`
--

INSERT INTO `ps_news_letter` (`id`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jjj', NULL, '2020-01-24 06:08:22', '2020-01-24 06:08:22', NULL),
(2, 'lll', 1, '2020-01-24 06:09:04', '2020-01-24 06:09:04', NULL),
(3, 'jj', 1, '2020-01-24 06:10:31', '2020-01-24 06:10:31', NULL),
(4, 'jjjj', 1, '2020-01-24 06:12:03', '2020-01-24 06:12:03', NULL),
(5, 'kkk', 1, '2020-01-24 06:12:12', '2020-01-24 06:12:12', NULL),
(6, 'lhk;jlk', 1, '2020-01-24 06:13:09', '2020-01-24 06:13:09', NULL),
(7, 'fsgh', 1, '2020-01-24 07:19:46', '2020-01-24 07:19:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_order`
--

CREATE TABLE `ps_order` (
  `id` bigint(11) NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ps_order_attributes`
--

CREATE TABLE `ps_order_attributes` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `attribute` text,
  `attribute_desc` text,
  `product_id` varchar(255) DEFAULT NULL,
  `price_per_product` double(8,3) DEFAULT NULL,
  `price_product_qty` double(8,3) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_order_attributes`
--

INSERT INTO `ps_order_attributes` (`id`, `user_id`, `product`, `attribute`, `attribute_desc`, `product_id`, `price_per_product`, `price_product_qty`, `quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'Softcover', '{\"_token\":\"lhf1eulzKYRI8UC4wweYGl0IXK8pR5lyIjvftIBI\",\"binding\":\"2\",\"no_of_copies\":\"5\",\"page-format\":\"1\",\"cover-color\":\"-1\",\"cover-sheet\":\"-1\",\"selectfile\":null,\"selectfile_coversheet\":null,\"back-cover\":\"-1\",\"selectfile_backcover\":null,\"page_options\":\"1\",\"paper-weight\":\"1\",\"mirror\":\"-1\",\"no_of_pages\":\"5\",\"selectfile_content\":\"1583991773_sample.pdf\",\"page_numbers\":null,\"number_of_pages\":null,\"pos_of_A3_pages\":null,\"selectfile_din_A3\":null,\"number_of_A2_pages\":null,\"selectfile_din_A2\":null,\"template\":\"-1\",\"selectfile_logo\":null,\"fonts\":\"-1\",\"date-format\":\"-1\",\"remarks\":null,\"number_of_cds\":null,\"selectfile_cd\":null,\"cd-template\":\"-1\",\"cd-bag\":\"-1\",\"data_check\":\"1\",\"total\":\"1\"}', 'binding of 2 ,no_of_copies of 5 ,page-format of 1 ,page_options of 1 ,paper-weight of 1 ,no_of_pages of 5 ,data_check of 1 ,', 'Softcover_1583991844_1583991844', 1.000, 1.000, 1, 1, '2020-03-12 00:14:04', '2020-03-12 00:18:48', '2020-03-12 05:44:04'),
(2, 10, 'Softcover', '{\"_token\":\"lhf1eulzKYRI8UC4wweYGl0IXK8pR5lyIjvftIBI\",\"binding\":\"2\",\"no_of_copies\":\"3\",\"page-format\":\"1\",\"cover-color\":\"-1\",\"cover-sheet\":\"-1\",\"selectfile\":null,\"selectfile_coversheet\":null,\"back-cover\":\"-1\",\"selectfile_backcover\":null,\"page_options\":\"1\",\"paper-weight\":\"1\",\"mirror\":\"-1\",\"no_of_pages\":\"8\",\"selectfile_content\":\"1583992266_sample.pdf\",\"page_numbers\":null,\"number_of_pages\":null,\"pos_of_A3_pages\":null,\"selectfile_din_A3\":null,\"number_of_A2_pages\":null,\"selectfile_din_A2\":null,\"template\":\"-1\",\"selectfile_logo\":null,\"fonts\":\"-1\",\"date-format\":\"-1\",\"remarks\":null,\"number_of_cds\":null,\"selectfile_cd\":null,\"cd-template\":\"-1\",\"cd-bag\":\"-1\",\"data_check\":\"1\",\"total\":\"1\"}', 'binding of 2 ,no_of_copies of 3 ,page-format of 1 ,page_options of 1 ,paper-weight of 1 ,no_of_pages of 8 ,data_check of 1 ,', 'Softcover_10_1583992277', 1.000, 1.000, 1, 1, '2020-03-12 00:21:17', '2020-03-12 00:21:17', '2020-03-12 05:51:17'),
(3, 10, 'Softcover', '{\"_token\":\"lhf1eulzKYRI8UC4wweYGl0IXK8pR5lyIjvftIBI\",\"binding\":\"2\",\"no_of_copies\":\"3\",\"page-format\":\"1\",\"cover-color\":\"-1\",\"cover-sheet\":\"-1\",\"selectfile\":null,\"selectfile_coversheet\":null,\"back-cover\":\"-1\",\"selectfile_backcover\":null,\"page_options\":\"1\",\"paper-weight\":\"1\",\"mirror\":\"-1\",\"no_of_pages\":\"7\",\"selectfile_content\":\"1583996264_sample.pdf\",\"page_numbers\":null,\"number_of_pages\":null,\"pos_of_A3_pages\":null,\"selectfile_din_A3\":null,\"number_of_A2_pages\":null,\"selectfile_din_A2\":null,\"template\":\"-1\",\"selectfile_logo\":null,\"fonts\":\"-1\",\"date-format\":\"-1\",\"remarks\":null,\"number_of_cds\":null,\"selectfile_cd\":null,\"cd-template\":\"-1\",\"cd-bag\":\"-1\",\"data_check\":\"1\",\"total\":\"1\"}', 'binding of 2 ,no_of_copies of 3 ,page-format of 1 ,page_options of 1 ,paper-weight of 1 ,no_of_pages of 7 ,data_check of 1 ,', 'Softcover_10_1583996272', 1.000, 1.000, 1, 1, '2020-03-12 01:27:52', '2020-03-12 01:27:52', '2020-03-12 06:57:52'),
(4, 10, 'Softcover', '{\"_token\":\"lhf1eulzKYRI8UC4wweYGl0IXK8pR5lyIjvftIBI\",\"binding\":\"2\",\"no_of_copies\":\"3\",\"page-format\":\"1\",\"cover-color\":\"-1\",\"cover-sheet\":\"-1\",\"selectfile\":null,\"selectfile_coversheet\":null,\"back-cover\":\"-1\",\"selectfile_backcover\":null,\"page_options\":\"1\",\"mirror\":\"-1\",\"no_of_pages\":\"7\",\"selectfile_content\":\"1583996286_sample.pdf\",\"page_numbers\":null,\"number_of_pages\":null,\"pos_of_A3_pages\":null,\"selectfile_din_A3\":null,\"number_of_A2_pages\":null,\"selectfile_din_A2\":null,\"template\":\"-1\",\"selectfile_logo\":null,\"fonts\":\"-1\",\"date-format\":\"-1\",\"remarks\":null,\"number_of_cds\":null,\"selectfile_cd\":null,\"cd-template\":\"-1\",\"cd-bag\":\"-1\",\"data_check\":\"2\",\"total\":\"5\"}', 'binding of 2 ,no_of_copies of 3 ,page-format of 1 ,page_options of 1 ,no_of_pages of 7 ,data_check of 2 ,', 'Softcover_10_1583996307', 5.000, 5.000, 1, 1, '2020-03-12 01:28:27', '2020-03-12 01:28:27', '2020-03-12 06:58:27'),
(5, 10, 'Hardcover', '{\"_token\":\"lhf1eulzKYRI8UC4wweYGl0IXK8pR5lyIjvftIBI\",\"binding\":\"1\",\"no_of_copies\":\"3\",\"page-format\":\"1\",\"cover-color\":\"1\",\"cover-sheet\":\"5\",\"selectfile\":null,\"selectfile_coversheet\":\"1584003637_sample.pdf\",\"back-cover\":\"5\",\"selectfile_backcover\":\"1584003644_sample.pdf\",\"page_options\":\"2\",\"paper-weight\":\"1\",\"mirror\":\"2\",\"no_of_pages\":\"5\",\"selectfile_content\":\"1584003659_sample.pdf\",\"color-pages\":\"on\",\"page_numbers\":\"5\",\"A3-pages\":\"on\",\"number_of_pages\":\"5\",\"pos_of_A3_pages\":\"7\",\"selectfile_din_A3\":null,\"A2-pages\":\"on\",\"number_of_A2_pages\":\"7\",\"selectfile_din_A2\":null,\"embossment-cover-sheet\":\"on\",\"template\":\"Standardvorlage mit Logo\",\"selectfile_logo\":null,\"fonts\":\"Times New Roman\\r\\n \\u00a0 \\u00a0 \\u00a0\",\"date-format\":\"my\",\"remarks\":null,\"cd-check\":\"on\",\"number_of_cds\":\"6\",\"selectfile_cd\":\"1584003714_sample.pdf\",\"imprint\":\"on\",\"cd-template\":\"Standardvorlage mit Logo\",\"cd-bag\":\"1\",\"data_check\":\"1\",\"total\":\"1\"}', 'binding is Hardcover ,no_of_copies are 3 ,page-format type is DIN A4 Hotch ,cover-color is Schwarz ,cover-sheet is Folie-matt ,back-cover is Folie-matt ,page_options is Hülle ,paper-weight is 100 g/m² ,mirror type is Long edge ,no_of_pages are 5 ,color-pages are on ,page_numbers are 5 ,A3-pages are on ,number_of_pages are 5 ,pos_of_A3_pages are 7 ,A2-pages are on ,number_of_A2_pages are 7 ,embossment-cover-sheet are on ,template are Standardvorlage mit Logo ,fonts is Times New Roman\r\n       ,date-format is my ,cd-check are on ,number_of_cds are 6 ,imprint are on ,cd-template are Standardvorlage mit Logo ,cd-bag is Hülle ,data_check is Standard ,', 'Hardcover_10_1584013265', 1.000, 1.000, 1, 1, '2020-03-12 06:11:05', '2020-03-12 06:11:05', '2020-03-12 11:41:05'),
(6, 1584357475, 'Softcover', '{\"_token\":\"h5j3Lmn6iyuwrQ1S2oy1sDFANddZNYkKA3a1oD3c\",\"binding\":\"2\",\"no_of_copies\":\"3\",\"page-format\":\"1\",\"cover-color\":\"-1\",\"cover-sheet\":\"-1\",\"selectfile\":null,\"selectfile_coversheet\":null,\"back-cover\":\"-1\",\"selectfile_backcover\":null,\"page_options\":\"1\",\"paper-weight\":\"1\",\"mirror\":\"-1\",\"no_of_pages\":\"8\",\"selectfile_content\":\"1584357466_sample.pdf\",\"page_numbers\":null,\"number_of_pages\":null,\"pos_of_A3_pages\":null,\"selectfile_din_A3\":null,\"number_of_A2_pages\":null,\"selectfile_din_A2\":null,\"template\":\"-1\",\"selectfile_logo\":null,\"fonts\":\"-1\",\"date-format\":\"-1\",\"remarks\":null,\"number_of_cds\":null,\"selectfile_cd\":null,\"cd-template\":\"-1\",\"cd-bag\":\"-1\",\"data_check\":\"1\",\"total\":\"1\"}', 'binding is Hardcover ,no_of_copies are 3 ,page-format type is DIN A4 Hotch ,page_options is Hülle ,paper-weight is 100 g/m² ,no_of_pages are 8 ,data_check is Standard ,', 'Softcover_1584357475_1584357475', 1.000, 1.000, 1, 1, '2020-03-16 05:47:55', '2020-03-16 05:47:55', '2020-03-16 11:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `ps_order_details`
--

CREATE TABLE `ps_order_details` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `no_of_copies` int(5) NOT NULL,
  `no_of_cds` int(5) NOT NULL,
  `shipping_company` varchar(255) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `billing_address` text NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `total` double(8,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_order_details`
--

INSERT INTO `ps_order_details` (`id`, `user_id`, `order_id`, `no_of_copies`, `no_of_cds`, `shipping_company`, `promo_code`, `shipping_address`, `billing_address`, `email_id`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, '10_1583992297', 3, 3, 'test1', 'fgmgjh', 'ghkju,', 'gfmj,', 'abctesting@gmail.com', 1.000, '2020-03-12 00:21:37', '2020-03-12 00:21:37', NULL),
(2, 10, '10_1583995248', 3, 3, 'test1', 'fgmgjh', 'ghkju,', 'gfmj,', 'abctesting@gmail.com', 1.000, '2020-03-12 01:10:48', '2020-03-12 01:10:48', NULL),
(3, 10, '10_1583995254', 3, 3, 'test1', 'fgmgjh', 'ghkju,', 'gfmj,', 'abctesting@gmail.com', 1.000, '2020-03-12 01:10:54', '2020-03-12 01:10:54', NULL),
(4, 10, '10_1583995272', 3, 3, 'test1', 'fgmgjh', 'ghkju,', 'gfmj,', 'abctesting@gmail.com', 1.000, '2020-03-12 01:11:12', '2020-03-12 01:11:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_order_details_final`
--

CREATE TABLE `ps_order_details_final` (
  `id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `no_of_copies` int(5) NOT NULL,
  `no_of_cds` int(5) NOT NULL,
  `shipping_company` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `billing_address` text NOT NULL,
  `total` double(8,3) DEFAULT NULL,
  `status` text NOT NULL,
  `txn` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_order_details_final`
--

INSERT INTO `ps_order_details_final` (`id`, `user_id`, `order_id`, `no_of_copies`, `no_of_cds`, `shipping_company`, `promo_code`, `shipping_address`, `billing_address`, `total`, `status`, `txn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 1, '1_1583603297', 3, 3, '3', 'rgtbrtgbg', 'enter herecgvjhgvjhbhj', 'enter heregvhnhmbjm', 6.000, 'Completed', '4EB41594V72250234', '2020-03-09 07:42:13', '2020-03-09 07:42:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_format`
--

CREATE TABLE `ps_page_format` (
  `id` bigint(11) NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_page_format`
--

INSERT INTO `ps_page_format` (`id`, `page_format`, `surname`, `name_english`, `name_german`, `can_add_din_A2`, `can_add_din_A3`, `status`, `max_pages_A2`, `max_pages_A3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DIN A4 Hotch', NULL, 'DIN A4 Portrait ', 'DIN A4 Hotch', 1, 1, 1, 3, 10, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'DIN A4 Quer', NULL, 'DIN A4 Landscape', 'DIN A4 Hotch', 1, 1, 1, 4, 10, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(5, 'DIN A5 Hotch', NULL, 'DIN A5 Portrait ', 'DIN A5 Hotch', 0, 0, 1, 0, 0, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(6, 'DIN A5 Quer', NULL, 'DIN A5 Landscape', 'DIN A5 Quer', 0, 0, 1, 0, 0, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(7, 'DIN A3 Hotch', NULL, 'DIN A3 Portrait ', 'DIN A3 Hotch', 1, 0, 1, 7, 0, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_options`
--

CREATE TABLE `ps_page_options` (
  `id` bigint(11) NOT NULL,
  `page_options` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_page_options`
--

INSERT INTO `ps_page_options` (`id`, `page_options`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hülle', NULL, 'Unilaterally', 'Hülle', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Selbstklebende', NULL, 'Both Sides', 'Selbstklebende', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_options_attributes`
--

CREATE TABLE `ps_page_options_attributes` (
  `id` bigint(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `model` text NOT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_page_options_attributes`
--

INSERT INTO `ps_page_options_attributes` (`id`, `attribute`, `created_at`, `updated_at`, `model`, `deleted_at`) VALUES
(1, 'paper_weight', '2020-02-26 12:26:05', '2020-02-14 06:51:34', 'PaperWeight', NULL),
(5, 'mirror', '2020-02-27 07:13:52', '2020-02-27 07:13:52', 'Mirror', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_options_attribute_realationship`
--

CREATE TABLE `ps_page_options_attribute_realationship` (
  `id` bigint(20) NOT NULL,
  `page_option_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_page_options_attribute_realationship`
--

INSERT INTO `ps_page_options_attribute_realationship` (`id`, `page_option_id`, `attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(10, 2, 5, NULL, NULL, NULL),
(11, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_options_mirror`
--

CREATE TABLE `ps_page_options_mirror` (
  `id` bigint(11) NOT NULL,
  `page_option_id` bigint(11) NOT NULL,
  `paper_mirror_id` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_page_options_mirror`
--

INSERT INTO `ps_page_options_mirror` (`id`, `page_option_id`, `paper_mirror_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-02-26 12:20:57', '2020-02-26 12:21:36', NULL),
(2, 2, 1, '2020-02-26 12:20:57', '2020-02-26 12:21:36', NULL),
(3, 2, 2, '2020-02-27 07:53:44', '2020-02-27 07:53:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_page_options_paper_weight`
--

CREATE TABLE `ps_page_options_paper_weight` (
  `id` bigint(11) NOT NULL,
  `page_option_id` bigint(11) NOT NULL,
  `paper_weight_id` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_page_options_paper_weight`
--

INSERT INTO `ps_page_options_paper_weight` (`id`, `page_option_id`, `paper_weight_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-02-26 12:20:57', '2020-02-26 12:21:36', NULL),
(2, 2, 1, '2020-02-26 12:20:57', '2020-02-26 12:21:36', NULL),
(3, 2, 2, '2020-02-27 07:55:04', '2020-02-27 07:55:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_paper_weight`
--

CREATE TABLE `ps_paper_weight` (
  `id` bigint(11) NOT NULL,
  `paper_weight` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `weight_per_sheet` double(9,5) DEFAULT NULL,
  `min_sheets_for_spine` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_paper_weight`
--

INSERT INTO `ps_paper_weight` (`id`, `paper_weight`, `surname`, `name_english`, `name_german`, `status`, `weight_per_sheet`, `min_sheets_for_spine`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '100 g/m²', NULL, '100 g/m²', '100 g/m²', 1, 6.25000, 40, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, '80 g/m²', NULL, '80 g/m²', '80 g/m²', 1, 5.00000, 0, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, '120 g/m²', NULL, '120 g/m²', '120 g/m²', 1, 7.50000, 0, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_parameter_list`
--

CREATE TABLE `ps_parameter_list` (
  `id` bigint(11) NOT NULL,
  `parameter_list` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_parameter_list`
--

INSERT INTO `ps_parameter_list` (`id`, `parameter_list`, `model`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Binding', 'Product', 1, NULL, NULL, NULL),
(2, 'PageFormat ', 'PageFormat', 1, NULL, NULL, NULL),
(3, 'CoverColor', 'CoverColor', 1, NULL, NULL, NULL),
(4, 'CoverSheet', 'CoverSheet', 1, NULL, NULL, NULL),
(5, 'BackCover', 'BackCovers', 1, NULL, NULL, NULL),
(6, 'PaperWeight', 'PaperWeight', 1, NULL, NULL, NULL),
(7, 'CdBag', 'CdBag', 1, NULL, NULL, NULL),
(8, 'DataCheck', 'DataCheck', 1, NULL, NULL, NULL),
(9, 'Art', 'ArtList', 1, NULL, NULL, NULL),
(10, 'Discount', 'Discount', 1, NULL, NULL, NULL),
(11, 'DeliveryService', 'DeliveryService', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_payment`
--

CREATE TABLE `ps_payment` (
  `id` bigint(11) NOT NULL,
  `payment_type` bigint(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amount` int(4) DEFAULT NULL,
  `status` text,
  `order_id` varchar(255) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `shipper_id` bigint(11) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `txn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_payment`
--

INSERT INTO `ps_payment` (`id`, `payment_type`, `type`, `amount`, `status`, `order_id`, `ship_date`, `shipper_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `txn`) VALUES
(1, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:06:59', '2020-03-09 07:06:59', NULL, 1, '1VV52084UJ464615R'),
(2, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:07:46', '2020-03-09 07:07:46', NULL, 1, '1VV52084UJ464615R'),
(3, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:09:10', '2020-03-09 07:09:10', NULL, 1, '1VV52084UJ464615R'),
(4, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:10:52', '2020-03-09 07:10:52', NULL, 1, '1VV52084UJ464615R'),
(5, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:12:46', '2020-03-09 07:12:46', NULL, 1, '1VV52084UJ464615R'),
(6, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:14:39', '2020-03-09 07:14:39', NULL, 1, '1VV52084UJ464615R'),
(7, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:16:48', '2020-03-09 07:16:48', NULL, 1, '1VV52084UJ464615R'),
(8, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:17:22', '2020-03-09 07:17:22', NULL, 1, '1VV52084UJ464615R'),
(9, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:17:35', '2020-03-09 07:17:35', NULL, 1, '1VV52084UJ464615R'),
(10, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:17:55', '2020-03-09 07:17:55', NULL, 1, '1VV52084UJ464615R'),
(11, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:18:47', '2020-03-09 07:18:47', NULL, 1, '1VV52084UJ464615R'),
(12, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:19:01', '2020-03-09 07:19:01', NULL, 1, '1VV52084UJ464615R'),
(13, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:19:07', '2020-03-09 07:19:07', NULL, 1, '1VV52084UJ464615R'),
(14, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:19:13', '2020-03-09 07:19:13', NULL, 1, '1VV52084UJ464615R'),
(15, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:19:37', '2020-03-09 07:19:37', NULL, 1, '1VV52084UJ464615R'),
(16, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:31:47', '2020-03-09 07:31:47', NULL, 1, '1VV52084UJ464615R'),
(17, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:32:10', '2020-03-09 07:32:10', NULL, 1, '1VV52084UJ464615R'),
(18, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:33:42', '2020-03-09 07:33:42', NULL, 1, '6K421179S1990621W'),
(19, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:39:36', '2020-03-09 07:39:36', NULL, 1, '4EB41594V72250234'),
(20, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:40:06', '2020-03-09 07:40:06', NULL, 1, '4EB41594V72250234'),
(21, NULL, NULL, 6, 'Completed', '1_1583603297', NULL, NULL, NULL, '2020-03-09 07:42:13', '2020-03-09 07:42:13', NULL, 1, '4EB41594V72250234');

-- --------------------------------------------------------

--
-- Table structure for table `ps_print_finishing`
--

CREATE TABLE `ps_print_finishing` (
  `id` bigint(11) NOT NULL,
  `finishing` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_print_finishing`
--

INSERT INTO `ps_print_finishing` (`id`, `finishing`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CC', NULL, 'CC', 'CC', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'DD', NULL, 'DD', 'DD', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'None', NULL, 'None', 'Keiner', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_print_finishing_art_list`
--

CREATE TABLE `ps_print_finishing_art_list` (
  `id` bigint(11) NOT NULL,
  `print_finishing_id` bigint(11) NOT NULL,
  `art_list_id` bigint(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_print_finishing_art_list`
--

INSERT INTO `ps_print_finishing_art_list` (`id`, `print_finishing_id`, `art_list_id`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product`
--

CREATE TABLE `ps_product` (
  `id` bigint(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_product`
--

INSERT INTO `ps_product` (`id`, `title_english`, `title_german`, `image_path`, `short_description_english`, `short_description_german`, `description_english`, `description_german`, `product_page_url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hardcover', 'Gebundene Ausgabe', 'public/images/product1.jpg', 'For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.', 'Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL),
(2, 'Softcover', 'Weiche Abdeckung', 'public/images/product2.jpg', 'Are you still just printing out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Drucken Sie immer noch nur Ihre Arbeit aus? Kein Problem, bei uns können Sie sogar drucken und Ihre Arbeit woanders binden lassen.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL),
(3, 'Thermal binding', 'Wärmebindung', 'public/images/product3.jpg', 'The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.', 'Die thermische Bindung ist die klassische Wahl zum Drucken und Binden einer Arbeit. Der Grund dafür, dass diese Bindung das meistverkaufte Cover für Studenten ist, ist der attraktive Preis und die kurze Produktionszeit.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL),
(4, 'Spiral binding', 'Spiralbindung', 'public/images/product4.jpg', 'The thermal binding is the classic choice for printing and binding a thesis. The reason for this binding being the best-selling cover for students is the attractive price and short production time.', 'Die thermische Bindung ist die klassische Wahl zum Drucken und Binden einer Arbeit. Der Grund dafür, dass diese Bindung das meistverkaufte Cover für Studenten ist, ist der attraktive Preis und die kurze Produktionszeit.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL),
(5, 'Printing with loose paper', 'Drucken mit losem Papier', 'public/images/product4.jpg', 'The completely enclosing softcover made of fine cardboard - also called paperback - gives your thesis a high-quality, magazine-like look.', 'Das vollständig umhüllende Softcover aus feinem Karton - auch Taschenbuch genannt - verleiht Ihrer Arbeit ein hochwertiges, magazinartiges Aussehen.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL),
(6, 'Sample with 15 free pages', 'Probe mit 15 freien Seiten', 'public/images/product4.jpg', 'You just want to print out your work? No problem, with us you can even print and have your work tied up elsewhere.', 'Sie möchten nur Ihre Arbeit ausdrucken? Kein Problem, bei uns können Sie sogar drucken und Ihre Arbeit woanders binden lassen.', '<h2>Hardcover</h2>\n					<p>For a high-quality bachelor\'s thesis, master\'s thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>\n					\n					<h2>Hardcover edition</h2>\n					<p>In the \"Edition\" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>\n\n					<h2>Hardcover classic</h2>\n					<p>The \"classic\" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>\n', '<h2> Gebundene Ausgabe </ h2> <p> Für eine hochwertige Bachelor-, Master- oder Doktorarbeit ist das Hardcover die optimale Lösung als professionell gebundenes Buch. </ p>  <h2> Gebundene Ausgabe </ h2> <p> In der Variante \"Edition\" bieten wir Ihnen eine völlig kostenlose Gestaltung Ihrer Bachelorarbeit. Mit unseren Vorlagen können Sie die Titelseite, den Rücken und den Buchrücken nach Ihren Wünschen drucken und binden lassen. </ P>  <h2> Hardcover-Klassiker </ h2> <p> Die \"klassische\" Variante ist absolut einzigartig und edel. Kombinieren Sie Ihre Favoriten aus 4 exklusiven Materialtypen, 20 Deckfarben und 5 Druckfarben mit Metallic-Effekt. Dies macht die Dissertation zu etwas ganz Besonderem. </ P>', '', 1, '2020-01-24 06:30:00', '2020-01-24 06:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_attributes`
--

CREATE TABLE `ps_product_attributes` (
  `id` bigint(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `model` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_attributes`
--

INSERT INTO `ps_product_attributes` (`id`, `attribute`, `created_at`, `updated_at`, `model`, `deleted_at`, `status`) VALUES
(1, 'page_format', '2020-03-12 12:59:15', '2020-02-14 06:51:34', 'PageFormat', NULL, 1),
(2, 'cover_color', '2020-03-12 12:59:20', '2020-02-14 06:51:34', 'CoverColor', NULL, 1),
(3, 'cover_sheet', '2020-03-12 12:59:22', '2020-02-14 06:51:34', 'CoverSheet', NULL, 1),
(4, 'back_sheet', '2020-03-12 12:59:24', '2020-02-14 06:51:34', 'BackCovers', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_attribute_realationship`
--

CREATE TABLE `ps_product_attribute_realationship` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_attribute_realationship`
--

INSERT INTO `ps_product_attribute_realationship` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL),
(3, 1, 3, NULL, NULL, NULL),
(4, 1, 4, NULL, NULL, NULL),
(5, 2, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_back_cover`
--

CREATE TABLE `ps_product_back_cover` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `back_cover_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_back_cover`
--

INSERT INTO `ps_product_back_cover` (`id`, `product_id`, `back_cover_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_cover_color`
--

CREATE TABLE `ps_product_cover_color` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `color_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_cover_color`
--

INSERT INTO `ps_product_cover_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_cover_sheet`
--

CREATE TABLE `ps_product_cover_sheet` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `cover_sheet_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_cover_sheet`
--

INSERT INTO `ps_product_cover_sheet` (`id`, `product_id`, `cover_sheet_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_image`
--

CREATE TABLE `ps_product_image` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `image_path` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_page_format`
--

CREATE TABLE `ps_product_page_format` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `paper_format` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ps_product_page_format`
--

INSERT INTO `ps_product_page_format` (`id`, `product_id`, `paper_format`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-02-12 11:59:06', '2020-02-12 11:38:05', NULL),
(2, 1, 2, '2020-02-13 06:44:15', '2020-02-13 06:44:15', NULL),
(3, 2, 1, '2020-02-13 13:20:52', '2020-02-13 13:20:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_paper_weight`
--

CREATE TABLE `ps_product_paper_weight` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `page_format_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_product_print_finishing`
--

CREATE TABLE `ps_product_print_finishing` (
  `id` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `print_finishing_id` bigint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ps_shipping_address`
--

CREATE TABLE `ps_shipping_address` (
  `id` bigint(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ps_slider`
--

CREATE TABLE `ps_slider` (
  `id` bigint(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_slider`
--

INSERT INTO `ps_slider` (`id`, `image_path`, `is_active`, `is_slide`, `title_english`, `title_german`, `content_english`, `content_german`, `title_color`, `title_size`, `redirect_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'public/images/slide-01.png', 1, 1, 'Slide 1', 'Folie 1', 'Title 1', 'Title 1', 'black', 14, '', '2020-01-23 13:30:00', '2020-01-23 13:30:00', NULL),
(2, 'public/images/slide-02.png', 1, 0, 'Tittle_2', 'Tittle_2', 'Content_2', 'Inhalt_2', 'black', 14, '', '2020-01-24 05:30:00', '2020-01-24 05:30:00', NULL),
(3, 'public/images/slide-03.png', 1, 0, 'Tittle_3', 'Tittle_3', 'Content_3', 'Inhalt_3', 'black', 14, '', '2020-01-24 05:30:00', '2020-01-24 05:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ps_template`
--

CREATE TABLE `ps_template` (
  `id` bigint(11) NOT NULL,
  `tempelate` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `name_english` varchar(45) DEFAULT NULL,
  `name_german` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps_template`
--

INSERT INTO `ps_template` (`id`, `tempelate`, `surname`, `name_english`, `name_german`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Standardvorlage mit Logo\n      ', NULL, 'Standard template with logo', 'Standardvorlage mit Logo\n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(2, 'Standardvorlage ohne Logo\n      ', NULL, 'Standard template without logo', 'Standardvorlage ohne Logo\n      ', 1, '2020-02-10 18:30:00', '2020-02-10 18:30:00', NULL),
(3, 'Eigene Vorlage       ', NULL, 'Own template', 'Eigene Vorlage       ', 1, '2020-02-27 01:30:00', '2020-02-27 02:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'swati', 'swati.batra@trantorinc.com', NULL, '$2y$10$VMXa7UeRiMio9NPeWuZTpeeNQGA3YutyV2qaf2Z8HW9TvWPchX4BG', NULL, '2020-03-07 09:49:40', '2020-03-07 09:49:40'),
(2, 'test', 'test@gmail.com', NULL, '$2y$10$a1mpwq4R3rcySZMIYY5su.EpcvezxV69/FBwoKPiut2udfMElsBAm', NULL, '2020-03-11 01:14:37', '2020-03-11 01:14:37'),
(3, 'Guest', 'test1234@gmail.com', NULL, NULL, NULL, '2020-03-11 07:29:09', '2020-03-11 07:29:09'),
(4, 'Guest', 'aaaa@gmail.com', NULL, NULL, NULL, '2020-03-11 07:31:42', '2020-03-11 07:31:42'),
(5, 'Guest', 'abceeeeee@gmail.com', NULL, NULL, NULL, '2020-03-11 08:09:23', '2020-03-11 08:09:23'),
(6, 'Guest', 'asfhtghbc@gmail.com', NULL, NULL, NULL, '2020-03-11 08:12:18', '2020-03-11 08:12:18'),
(7, 'Guest', 'aarhyjbtjykyc@gmail.com', NULL, NULL, NULL, '2020-03-11 08:13:02', '2020-03-11 08:13:02'),
(8, 'Guest', 'dddddddddabc@gmail.com', NULL, NULL, 'M0742HDRZlPMCLlsoS2dV0B84MxgPC6J9sJ7OXoQ6VHX4ewEF8ygYUWw6Rmc', '2020-03-11 08:18:32', '2020-03-11 08:18:32'),
(9, 'Guest', 'abctesttest@gmail.com', NULL, NULL, NULL, '2020-03-12 00:17:33', '2020-03-12 00:17:33'),
(10, 'Guest', 'abctesttesting@gmail.com', NULL, NULL, 'pgSfGeGscAwKg3JZro9QqPbg37epOSy1jCkFBaSDmexJpbmtyYBAWzuHx8qT', '2020-03-12 00:20:43', '2020-03-12 00:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '0 => SA',
  `status` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'swati', 'swati.batra@trantorinc.com', NULL, '$2y$10$VMXa7UeRiMio9NPeWuZTpeeNQGA3YutyV2qaf2Z8HW9TvWPchX4BG', NULL, 0, 1, '2020-03-07 09:49:40', '2020-03-07 09:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_about`
--
ALTER TABLE `ps_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_art_list`
--
ALTER TABLE `ps_art_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_back_cover`
--
ALTER TABLE `ps_back_cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_billing_address`
--
ALTER TABLE `ps_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_cd_bag`
--
ALTER TABLE `ps_cd_bag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_contact`
--
ALTER TABLE `ps_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_cover_color`
--
ALTER TABLE `ps_cover_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_cover_settings`
--
ALTER TABLE `ps_cover_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_cover_settings_back_sheet`
--
ALTER TABLE `ps_cover_settings_back_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`back_sheet_id`),
  ADD KEY `FK_product_cover_sheet` (`cover_settings_id`);

--
-- Indexes for table `ps_cover_settings_cover_color`
--
ALTER TABLE `ps_cover_settings_cover_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`cover_color_id`),
  ADD KEY `FK_product_cover_sheet` (`cover_settings_id`);

--
-- Indexes for table `ps_cover_settings_cover_sheet`
--
ALTER TABLE `ps_cover_settings_cover_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`cover_sheet_id`),
  ADD KEY `FK_product_cover_sheet` (`cover_settings_id`);

--
-- Indexes for table `ps_cover_sheet`
--
ALTER TABLE `ps_cover_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_data_check`
--
ALTER TABLE `ps_data_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_date_format`
--
ALTER TABLE `ps_date_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_delivery_service`
--
ALTER TABLE `ps_delivery_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_discount`
--
ALTER TABLE `ps_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_fonts`
--
ALTER TABLE `ps_fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_free_smaple`
--
ALTER TABLE `ps_free_smaple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_frequently_asked_question`
--
ALTER TABLE `ps_frequently_asked_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_gallery`
--
ALTER TABLE `ps_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_kind_list`
--
ALTER TABLE `ps_kind_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_latest`
--
ALTER TABLE `ps_latest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_letters_of_spine`
--
ALTER TABLE `ps_letters_of_spine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_letters_of_spine_1_idx` (`paper_weight_id`),
  ADD KEY `fk_ps_letters_of_spine_2_idx` (`delivery_service_id`);

--
-- Indexes for table `ps_mirror`
--
ALTER TABLE `ps_mirror`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_news_letter`
--
ALTER TABLE `ps_news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_order`
--
ALTER TABLE `ps_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_order_1_idx` (`user_id`),
  ADD KEY `fk_ps_order_2_idx` (`product_id`);

--
-- Indexes for table `ps_order_attributes`
--
ALTER TABLE `ps_order_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_attrib` (`user_id`);

--
-- Indexes for table `ps_order_details`
--
ALTER TABLE `ps_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_order_details_final`
--
ALTER TABLE `ps_order_details_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_page_format`
--
ALTER TABLE `ps_page_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_page_options`
--
ALTER TABLE `ps_page_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_page_options_attributes`
--
ALTER TABLE `ps_page_options_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_page_options_attribute_realationship`
--
ALTER TABLE `ps_page_options_attribute_realationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_attributes_relaton` (`attribute_id`),
  ADD KEY `fk_product_attributes` (`page_option_id`);

--
-- Indexes for table `ps_page_options_mirror`
--
ALTER TABLE `ps_page_options_mirror`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`paper_mirror_id`),
  ADD KEY `FK_product_cover_sheet` (`page_option_id`);

--
-- Indexes for table `ps_page_options_paper_weight`
--
ALTER TABLE `ps_page_options_paper_weight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`paper_weight_id`),
  ADD KEY `FK_product_cover_sheet` (`page_option_id`);

--
-- Indexes for table `ps_paper_weight`
--
ALTER TABLE `ps_paper_weight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_parameter_list`
--
ALTER TABLE `ps_parameter_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_payment`
--
ALTER TABLE `ps_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_payment_1_idx` (`user_id`),
  ADD KEY `fk_ps_payment_2_idx` (`product_id`),
  ADD KEY `fk_ps_payment_3_idx` (`order_id`);

--
-- Indexes for table `ps_print_finishing`
--
ALTER TABLE `ps_print_finishing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_print_finishing_art_list`
--
ALTER TABLE `ps_print_finishing_art_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`art_list_id`),
  ADD KEY `FK_product_cover_sheet` (`print_finishing_id`);

--
-- Indexes for table `ps_product`
--
ALTER TABLE `ps_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_product_attributes`
--
ALTER TABLE `ps_product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_product_attribute_realationship`
--
ALTER TABLE `ps_product_attribute_realationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_attributes_relaton` (`attribute_id`),
  ADD KEY `fk_product_attributes` (`product_id`);

--
-- Indexes for table `ps_product_back_cover`
--
ALTER TABLE `ps_product_back_cover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`back_cover_id`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_product_cover_color`
--
ALTER TABLE `ps_product_cover_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`color_id`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_product_cover_sheet`
--
ALTER TABLE `ps_product_cover_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`cover_sheet_id`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_product_image`
--
ALTER TABLE `ps_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_product_image_1_idx` (`product_id`);

--
-- Indexes for table `ps_product_page_format`
--
ALTER TABLE `ps_product_page_format`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`paper_format`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_product_paper_weight`
--
ALTER TABLE `ps_product_paper_weight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`page_format_id`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_product_print_finishing`
--
ALTER TABLE `ps_product_print_finishing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cover_sheet` (`print_finishing_id`),
  ADD KEY `FK_product_cover_sheet` (`product_id`);

--
-- Indexes for table `ps_shipping_address`
--
ALTER TABLE `ps_shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ps_shipping_address_1_idx` (`order_id`);

--
-- Indexes for table `ps_slider`
--
ALTER TABLE `ps_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ps_template`
--
ALTER TABLE `ps_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ps_about`
--
ALTER TABLE `ps_about`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ps_art_list`
--
ALTER TABLE `ps_art_list`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_back_cover`
--
ALTER TABLE `ps_back_cover`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ps_billing_address`
--
ALTER TABLE `ps_billing_address`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_cd_bag`
--
ALTER TABLE `ps_cd_bag`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_contact`
--
ALTER TABLE `ps_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ps_cover_color`
--
ALTER TABLE `ps_cover_color`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_cover_settings`
--
ALTER TABLE `ps_cover_settings`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_cover_settings_back_sheet`
--
ALTER TABLE `ps_cover_settings_back_sheet`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_cover_settings_cover_color`
--
ALTER TABLE `ps_cover_settings_cover_color`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ps_cover_settings_cover_sheet`
--
ALTER TABLE `ps_cover_settings_cover_sheet`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_cover_sheet`
--
ALTER TABLE `ps_cover_sheet`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ps_data_check`
--
ALTER TABLE `ps_data_check`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_date_format`
--
ALTER TABLE `ps_date_format`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_delivery_service`
--
ALTER TABLE `ps_delivery_service`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_discount`
--
ALTER TABLE `ps_discount`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ps_fonts`
--
ALTER TABLE `ps_fonts`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_free_smaple`
--
ALTER TABLE `ps_free_smaple`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_frequently_asked_question`
--
ALTER TABLE `ps_frequently_asked_question`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_gallery`
--
ALTER TABLE `ps_gallery`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_kind_list`
--
ALTER TABLE `ps_kind_list`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_latest`
--
ALTER TABLE `ps_latest`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ps_letters_of_spine`
--
ALTER TABLE `ps_letters_of_spine`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ps_mirror`
--
ALTER TABLE `ps_mirror`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_news_letter`
--
ALTER TABLE `ps_news_letter`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ps_order`
--
ALTER TABLE `ps_order`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_order_attributes`
--
ALTER TABLE `ps_order_attributes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ps_order_details`
--
ALTER TABLE `ps_order_details`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ps_order_details_final`
--
ALTER TABLE `ps_order_details_final`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ps_page_format`
--
ALTER TABLE `ps_page_format`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ps_page_options`
--
ALTER TABLE `ps_page_options`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_page_options_attributes`
--
ALTER TABLE `ps_page_options_attributes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ps_page_options_attribute_realationship`
--
ALTER TABLE `ps_page_options_attribute_realationship`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ps_page_options_mirror`
--
ALTER TABLE `ps_page_options_mirror`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_page_options_paper_weight`
--
ALTER TABLE `ps_page_options_paper_weight`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_paper_weight`
--
ALTER TABLE `ps_paper_weight`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_parameter_list`
--
ALTER TABLE `ps_parameter_list`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ps_payment`
--
ALTER TABLE `ps_payment`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ps_print_finishing`
--
ALTER TABLE `ps_print_finishing`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_print_finishing_art_list`
--
ALTER TABLE `ps_print_finishing_art_list`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ps_product`
--
ALTER TABLE `ps_product`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ps_product_attributes`
--
ALTER TABLE `ps_product_attributes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ps_product_attribute_realationship`
--
ALTER TABLE `ps_product_attribute_realationship`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ps_product_back_cover`
--
ALTER TABLE `ps_product_back_cover`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ps_product_cover_color`
--
ALTER TABLE `ps_product_cover_color`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_product_cover_sheet`
--
ALTER TABLE `ps_product_cover_sheet`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ps_product_image`
--
ALTER TABLE `ps_product_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_product_page_format`
--
ALTER TABLE `ps_product_page_format`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ps_product_paper_weight`
--
ALTER TABLE `ps_product_paper_weight`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_product_print_finishing`
--
ALTER TABLE `ps_product_print_finishing`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_shipping_address`
--
ALTER TABLE `ps_shipping_address`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ps_slider`
--
ALTER TABLE `ps_slider`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ps_template`
--
ALTER TABLE `ps_template`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ps_cover_settings_back_sheet`
--
ALTER TABLE `ps_cover_settings_back_sheet`
  ADD CONSTRAINT `fk_cover_settings_back` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cover_settings_back_sheet` FOREIGN KEY (`back_sheet_id`) REFERENCES `ps_back_cover` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_cover_settings_cover_color`
--
ALTER TABLE `ps_cover_settings_cover_color`
  ADD CONSTRAINT `fk_cover_settings` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cover_settings_color` FOREIGN KEY (`cover_color_id`) REFERENCES `ps_cover_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_cover_settings_cover_sheet`
--
ALTER TABLE `ps_cover_settings_cover_sheet`
  ADD CONSTRAINT `fk_cover_sheet_settings` FOREIGN KEY (`cover_settings_id`) REFERENCES `ps_cover_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cover_sheets` FOREIGN KEY (`cover_sheet_id`) REFERENCES `ps_cover_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_letters_of_spine`
--
ALTER TABLE `ps_letters_of_spine`
  ADD CONSTRAINT `fk_ps_letters_of_spine_1` FOREIGN KEY (`paper_weight_id`) REFERENCES `ps_paper_weight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ps_letters_of_spine_2` FOREIGN KEY (`delivery_service_id`) REFERENCES `ps_delivery_service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ps_order`
--
ALTER TABLE `ps_order`
  ADD CONSTRAINT `fk_ps_order_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ps_order_2` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ps_page_options_attribute_realationship`
--
ALTER TABLE `ps_page_options_attribute_realationship`
  ADD CONSTRAINT `fk_page_option` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_page_options_mirror`
--
ALTER TABLE `ps_page_options_mirror`
  ADD CONSTRAINT `fk_page_mirror` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_page_option_mirror` FOREIGN KEY (`paper_mirror_id`) REFERENCES `ps_mirror` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_page_options_paper_weight`
--
ALTER TABLE `ps_page_options_paper_weight`
  ADD CONSTRAINT `pk_option` FOREIGN KEY (`page_option_id`) REFERENCES `ps_page_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_option_weight` FOREIGN KEY (`paper_weight_id`) REFERENCES `ps_paper_weight` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_payment`
--
ALTER TABLE `ps_payment`
  ADD CONSTRAINT `fk_ps_payment_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ps_payment_2` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ps_print_finishing_art_list`
--
ALTER TABLE `ps_print_finishing_art_list`
  ADD CONSTRAINT `fk_art_list` FOREIGN KEY (`art_list_id`) REFERENCES `ps_art_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_print_finishing` FOREIGN KEY (`print_finishing_id`) REFERENCES `ps_print_finishing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_attribute_realationship`
--
ALTER TABLE `ps_product_attribute_realationship`
  ADD CONSTRAINT `fk_product_attributes` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_attributes_relaton` FOREIGN KEY (`attribute_id`) REFERENCES `ps_product_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_back_cover`
--
ALTER TABLE `ps_product_back_cover`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_back_cover` FOREIGN KEY (`back_cover_id`) REFERENCES `ps_back_cover` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_cover_color`
--
ALTER TABLE `ps_product_cover_color`
  ADD CONSTRAINT `pk_product` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_product_color` FOREIGN KEY (`color_id`) REFERENCES `ps_cover_color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_cover_sheet`
--
ALTER TABLE `ps_product_cover_sheet`
  ADD CONSTRAINT `FK_cover_sheet` FOREIGN KEY (`cover_sheet_id`) REFERENCES `ps_cover_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_product_cover_sheet` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_image`
--
ALTER TABLE `ps_product_image`
  ADD CONSTRAINT `fk_ps_product_image_1` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ps_product_page_format`
--
ALTER TABLE `ps_product_page_format`
  ADD CONSTRAINT `fk_paper_format` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_page_format` FOREIGN KEY (`paper_format`) REFERENCES `ps_page_format` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_product_print_finishing`
--
ALTER TABLE `ps_product_print_finishing`
  ADD CONSTRAINT `pk_finishing` FOREIGN KEY (`print_finishing_id`) REFERENCES `ps_print_finishing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk_product_print` FOREIGN KEY (`product_id`) REFERENCES `ps_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ps_shipping_address`
--
ALTER TABLE `ps_shipping_address`
  ADD CONSTRAINT `fk_ps_shipping_address_1` FOREIGN KEY (`order_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ps_shipping_address_2` FOREIGN KEY (`order_id`) REFERENCES `ps_order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
