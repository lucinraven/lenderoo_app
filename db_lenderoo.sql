-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2021 at 08:39 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lenderoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `broken_cart`
--

DROP TABLE IF EXISTS `broken_cart`;
CREATE TABLE IF NOT EXISTS `broken_cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  KEY `broken_cart_ibfk_1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `is_active`) VALUES
(1, 2, b'0'),
(2, 3, b'0'),
(3, 4, b'1'),
(4, NULL, b'1'),
(5, 2, b'1'),
(6, 8, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

DROP TABLE IF EXISTS `cart_products`;
CREATE TABLE IF NOT EXISTS `cart_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `product_id`, `duration`, `cart_id`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 2),
(3, 1, 1, 2),
(4, 3, 1, 3),
(5, 3, 1, 4),
(6, 3, 1, 1),
(7, 1, 1, 5),
(8, 3, 4, 5),
(9, 11, 30, 6),
(10, 3, 30, 6);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'camping'),
(2, 'outdoor'),
(3, 'indoor'),
(4, 'fishing'),
(5, 'hardware'),
(6, 'hiking'),
(7, 'sailing'),
(8, 'boating'),
(9, 'outdoor cooking');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

DROP TABLE IF EXISTS `credit`;
CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `card_number` int DEFAULT NULL,
  `card_holderName` varchar(255) DEFAULT NULL,
  `card_expiration` date DEFAULT NULL,
  `ccv` int DEFAULT NULL,
  PRIMARY KEY (`credit_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

DROP TABLE IF EXISTS `fav`;
CREATE TABLE IF NOT EXISTS `fav` (
  `fav_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fav_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`fav_id`, `product_id`, `user_id`, `created_at`) VALUES
(4, 3, 3, '2021-06-07 23:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `lender_id` int DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `opened` tinyint(1) DEFAULT NULL,
  `viewed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  KEY `lender_id` (`lender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `cart_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(255) DEFAULT NULL,
  `lender_id` int DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_price` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `created_at`, `payment_method`, `lender_id`, `delivery_date`, `return_date`, `address`, `status`, `total_price`) VALUES
(1, 2, '2021-06-07 20:51:29', 'Delivered by lender', NULL, '2020-01-25', '2020-02-01', 'test', 'processing', 55.50),
(2, 1, '2021-06-07 21:23:30', 'Pick up from lender', NULL, '2020-01-18', '2020-01-25', 'test', 'processing', 40.50),
(3, 6, '2021-06-07 23:49:14', 'Pick up from lender', NULL, '2020-01-15', '2020-01-15', 'yes', 'Processing', 18900.00);

-- --------------------------------------------------------

--
-- Table structure for table `password_token`
--

DROP TABLE IF EXISTS `password_token`;
CREATE TABLE IF NOT EXISTS `password_token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` char(64) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `codes` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `age` varchar(30) DEFAULT NULL,
  `technicalDesc` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category_id` int NOT NULL,
  `condition_id` int NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `click_counter` bigint NOT NULL DEFAULT '0',
  `lender_id` int DEFAULT NULL,
  `max_lend_duration` int DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_name`, `description`, `age`, `technicalDesc`, `price`, `category_id`, `condition_id`, `status`, `click_counter`, `lender_id`, `max_lend_duration`) VALUES
(1, 'Selling 6 person tent', 'Coleman cabin tent', 'The best tent', '0-1 month', 'Weight: 13kg,Capacity: 6 person', 10.5, 1, 3, 'Available', 41, 1, 15),
(2, 'Renting outdoor grill for a reasonable price', 'Imperial home non-stick grill pan', 'Nonstick pan that uses a state of the art materials. highly durable and can be easily cleaned.', 'Brand New', 'Weight: 5kg,', 15, 9, 3, 'Available', 54, 2, 30),
(3, 'Barbeque renting set for grabs!', 'Barbeque set', 'Enter description', '1-6 months', 'Weight: 3.5,Capacity: Tons', 30, 1, 3, 'Available', 43, 3, 7),
(4, 'Fishing set for rent! for a reasonable price.', 'Fishing rod set', 'Fishing rod for rent, contact me for more information', '6-12 months', 'Weight: 3kg', 20, 4, 2, 'Available', 1, 4, 2),
(7, '1 person kayaking boat', 'Kayaking boat', 'Kayaking boat for outdoor enthusiast and people passionate for exploration', '1-2 years', 'Weight: 3kg,Length: 6m,Color: Yellow', 50, 8, 5, 'Available', 0, 2, 5),
(8, 'Camping bag for outdoor explorers', 'Camping bag', 'Camping bag for outdoor explorers.', 'Brand New', 'Weight: 3kg,', 15, 1, 3, 'Available', 0, 3, 5),
(9, 'Camping shoes for bargain for a right price!', 'Hiking shoes', 'Hiking shoes for men and women.', 'Brand New', 'Shoe size: 40 men,Metal Toe,Weight: 1.5kg', 5, 6, 2, 'Available', 0, 4, 3),
(10, 'Tool box set for rent', 'Tool box series mk1000', 'Tool box set for fixing mechanical issues and home furnitures.', 'Brand New', 'Weight: 5kg,', 10, 5, 2, 'Available', 0, 3, 15),
(11, 'Pickaxe', 'Fortnite pickaxe', 'Fortnite', '6-12 months', '5.5kg,300 Meters long', 600, 2, 3, 'Available', 6, 7, 30),
(12, 'Steel umbrella 4 rent', 'Umbrella steel', 'Fortnite umbrella', '1-6 months', '5kg,4.5 ft', 300, 2, 3, 'Available', 1, 8, 30),
(13, 'Yacht 4 rent ', '100 feet yacht for rent', 'More fortnite yacht', '6-12 months', '100ft', 200, 7, 5, 'Available', 0, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_condition`
--

DROP TABLE IF EXISTS `product_condition`;
CREATE TABLE IF NOT EXISTS `product_condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_condition`
--

INSERT INTO `product_condition` (`id`, `condition_name`) VALUES
(2, 'new'),
(3, 'very good'),
(4, 'good'),
(5, 'acceptable'),
(6, 'refurbished');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`image_id`, `source`, `product_id`) VALUES
(1, 'corinne-kutz-f1fV_4Q1dYE-unsplash.jpg', 1),
(2, 'brooke-lark-nLBcOY8t9tc-unsplash.jpg', 1),
(3, 'brooke-lark-DKOVgaayXXY-unsplash.jpg', 1),
(4, 'brooke-lark-HlNcigvUi4Q-unsplash.jpg', 1),
(5, '71ydrdh37al-sl1500--500x500.jpg', 2),
(6, 'stainless-steel-barbeque-set-500x500.jpg', 3),
(7, 'fishing.jpg', 4),
(9, 'hobie-proangler12-boa.jpg', 7),
(10, 'osprey-aether-ag-60-hiking-backpack.jpg', 8),
(11, 'Shoe+-+1.png', 9),
(12, 'Tool-Cabinet-with-Wheels-Tool-Trolley-Tool-Kit-Tool-Box.jpg', 10),
(13, 'f874f-16045216368549-800.jpg', 11),
(14, 'fortnite-theumbrella.jpg', 12),
(15, 'The_Yacht_-_Location_-_Fortnite.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `review` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `review`, `user_id`, `product_id`) VALUES
(1, 'Renting outdoor grill for lovely couples like ga. rent for 10 days and you will have 10 days dating with ga. non stick pan so ga will like it. i love ga', NULL, 2),
(4, 'Very nice lender and very accomodating to my queries!', 3, 3),
(5, 'I love the product item and I love my ex jan louise mendonza! My forever more,', 4, 3),
(6, 'I love sweetie, add more sweets when i rent more product.', NULL, 3),
(7, 'Victory Royale', 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `rate_id` int NOT NULL AUTO_INCREMENT,
  `score` double DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rate_id` int DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `score` int DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  KEY `rate_id` (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lender` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `contact`, `address`, `lender`, `status`, `created_at`) VALUES
(1, 'Nanno', 'Amarin', 'nanno@gmail.com', 'f1d9be51880dd631aee0c1b54d406443', '0561234567', '', 1, 0, '2021-06-07 12:12:06'),
(2, 'Rav', 'Lucin', 'ravlucin@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-342342', '', 1, 0, '2021-06-07 12:43:32'),
(3, 'Hardmund', 'Tzuyu', 'monmon@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-3223131', '', 1, 0, '2021-06-07 20:47:27'),
(4, 'Louise', 'Delossantos', 'donmen@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-3223131', '', 1, 0, '2021-06-07 21:07:27'),
(5, 'Ravs', 'Lucin', 'fushyravs@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-3223131', '', 1, 0, '2021-06-07 21:11:57'),
(6, 'Zaira', 'Mundi', 'zm@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-3223131', '', 1, 0, '2021-06-07 21:48:31'),
(7, 'Jester', 'Domingo', 'jrndomingo@gmail.com', '79f0c57c9196bc2931f69439a865c52f', '0529318887', '', 1, 0, '2021-06-07 23:44:54'),
(8, 'Jester', 'Domingo', 'jesterrobindomingo4@gmail.com', 'c9e5f7651fb9f269e5b1e9ad2a1a9a31', '0529318887', '', 1, 0, '2021-06-07 23:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_rented_products`
--

DROP TABLE IF EXISTS `user_rented_products`;
CREATE TABLE IF NOT EXISTS `user_rented_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `details` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broken_cart`
--
ALTER TABLE `broken_cart`
  ADD CONSTRAINT `broken_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `broken_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fav`
--
ALTER TABLE `fav`
  ADD CONSTRAINT `fav_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fav_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`lender_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
