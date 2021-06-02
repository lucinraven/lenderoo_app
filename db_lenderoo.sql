-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 08:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `credit_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `card_number` int(11) DEFAULT NULL,
  `card_holderName` varchar(255) DEFAULT NULL,
  `card_expiration` date DEFAULT NULL,
  `ccv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `fav_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lender_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `opened` tinyint(1) DEFAULT NULL,
  `viewed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `opened` tinyint(1) DEFAULT NULL,
  `viewed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_method` varchar(255) DEFAULT NULL,
  `delivered_by` varchar(255) DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `brand` varchar(64) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `pr_condition` varchar(30) DEFAULT NULL,
  `technicalDesc` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `click_counter` bigint(20) NOT NULL DEFAULT 0,
  `lender_id` int(11) DEFAULT NULL,
  `max_lend_duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_name`, `description`, `brand`, `age`, `pr_condition`, `technicalDesc`, `price`, `category`, `status`, `click_counter`, `lender_id`, `max_lend_duration`) VALUES
(1, 'Coleman Cabin Tent with Instant Setup in 60 Seconds', NULL, 'Weatherproof: Welded corners and inverted seams keep water from getting in; integrated rainfly offers extra weather protection with better airflow\r\nBuilt to last: Double-thick fabric stands up to the elements season after season\r\nInstant setup: In as fast as 1 minute\r\nRoomy interior: 8 x 7 ft. With 4 ft. 11 in. Center height; fits 1 queen-size air bed\r\n1-year limited warranty', 'Coleman', '1 - 2 months', 'Excellent Condition', 'Capacity Name : ‎4\r\nColor : Brown/Black\r\nSize : ‎4-Person\r\nStyle : ‎4-person\r\nLength : 96 inches\r\nWeight : ‎9.8 Pounds', 12.5, 'Camping', 'Available', 15, 1, NULL),
(2, 'Bestway Hydro-Force Inflatable Stand Up Paddle Board SUP', NULL, 'Contents: Paddle board, Paddle, hand pump, travel bag, surf leash\r\nWeight capacity: 209 lbs\r\nNon-slip traction pad\r\nAdjustable 2.17M (85 inch ) aluminum oar included\r\nConvenient deck handle to easily carry the SUP', 'Bestway', '1 - 2 months', 'Excellent Condition', 'Style : Aqua Journey - 9 Ft.\r\nNumber of Items : ‎1\r\nBatteries Included? : ‎No', 22, 'Outdoor', 'Available', 0, NULL, NULL),
(3, '2 Pack Portable LED Camping Lantern Flashlights Survival Kit for Emergency, Hurricane, Outage', NULL, 'ULTRA BRIGHT: Includes 30 individual energy saving LED bulbs, designed for a longer lifespan. Carry 360 degree of luminous light while saving energy(batteries included)\r\nDEPENDABLE BUILD: Constructed with military grade; promising long-time durability, no matter where you go\r\nDESIGNED FOR CONVENIENCE: The extremely lightweight build allows you to take your lantern on the go with ease. When not in use collapse the lantern to a smaller size; store it effortlessly, taking little space\r\nLOW CONSUMPTION: Light up to 12 hours of regular, continuous use with enough battery capacity', 'SKY-TOUCH', '6-12 months', 'Good Condition', 'Batteries ‏ : ‎ 3 AA batteries required.\r\nProduct Dimensions ‏ : ‎ 5 x 4 x 3 cm; 540 Grams', 5.3, 'Camping', 'Available', 0, NULL, NULL),
(4, 'Camptrek Foldable Beach And Garden Chair, Red, BCI-3707', NULL, 'Type: Chairs\r\nMaterial: Nylon\r\nFoldable metal legs\r\nPortable and lightweight', 'Camptrek', '2-5 years', 'Fair Condition', 'Color : ‎Red\r\nProduct Dimensions : ‎12 x 80 x 19 cm; 1.5 Kilograms\r\nPrimary material : Polyester\r\nShipping Weight : ‎1.5 Kilograms', 6, 'Camping', 'Available', 0, NULL, NULL),
(5, 'Fishing Chair, Sturdy Durable Foldable Camping Chair, Practical for Camping Fishing', NULL, 'Suitable for outdoor activities such as fishing, camping, mountain climbing, long‑distance travel, etc. It is also suitable for indoor use, with Oxford cloth bags.\r\nThe clever design can be folded or unfolded easily and quickly. Professional structure design, stylish atmosphere, strong, lightweight, safe and comfortable.\r\nThe unique ergonomic seat design provides you with the best seat experience, allowing you to relax.\r\nThe use of high‑strength 7075 aviation aluminum alloy and a foldable bracket composed of high‑strength and thick nylon components, lightweight, compact and portable, and can bear a maximum load bearing of 150KG, very convenient and practical.\r\nThe fishing chair is equipped with a sponge pillow and a high back, which can full relax your back and support your head.', 'Denkerm', 'Brand New', 'Never Used', NULL, 18.62, 'Outdoor', 'Available', 0, NULL, NULL),
(6, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL),
(7, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL),
(8, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 3, NULL, NULL),
(9, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL),
(10, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL),
(11, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 1, NULL, NULL),
(12, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL),
(13, 'Cosmoplast Keep Cold Plastic Picnic Cooler Icebox 24 Liters', NULL, 'Thick polyurethane insulation up to 3 days of ice retention.\r\nProduct dimensions: L 41.5 x W 28 x H 35 cm.\r\nBail handle with secure lid locking.\r\nHolds up to 36 cans.\r\nFits 1.5 liter bottles upright.\r\nLeak proof tap for easy drainage of water.\r\nCup holders for easy access to beverages.\r\nPerfect for beach, hiking, camping, picnic, and other.', 'Cosmoplast', 'Brand New', 'Never Used', NULL, 20.56, 'Cooking', 'Available', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `image_id` int(11) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lender` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `contact`, `address`, `lender`, `status`, `created_at`) VALUES
(1, 'Nanno', 'Amarin', 'nanno@gmail.com', '9a1336773808610d69e1dd86113f771f', '+971561234567', '', 1, 0, '2021-05-30 08:42:35'),
(2, 'Jules', 'Perez', 'julesperez@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '055-3223131', '', 1, 0, '2021-05-30 15:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_rented_products`
--

CREATE TABLE `user_rented_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `details` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`credit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lender_id` (`lender_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_rented_products`
--
ALTER TABLE `user_rented_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_rented_products`
--
ALTER TABLE `user_rented_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`);

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
