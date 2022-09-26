-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2020 at 05:38 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctf`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `avatar_id` int(11) NOT NULL,
  `avatar_name` varchar(255) NOT NULL,
  `avatar_pass` varchar(255) NOT NULL,
  `coins` float NOT NULL DEFAULT '1000',
  PRIMARY KEY (`avatar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Bakery'),
(2, 'Weapons'),
(3, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `avatar_id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `FK_avatarOrder` (`avatar_id`),
  KEY `FK_productOrder` (`prd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sku` varchar(14) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `sku` (`sku`),
  KEY `FK_CategoryProduct` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `sku`, `price`, `image`, `category_id`) VALUES
(1, 'Pound Cake', 'BAK001', '50.00', 'images/products/poundcake.jpg', 1),
(2, 'Butter Croissant', 'BAK002', '35.00', 'images/products/croissant.jpg', 1),
(3, 'Donut', 'BAK003', '15.00', 'images/products/donuts.jpg', 1),
(4, 'Baguette', 'BAK004', '15.00', 'images/products/baguette.jpg', 1),
(5, 'Cup Cake', 'BAK005', '10.00', 'images/products/cupcakes.jpg', 1),
(6, 'Grain Bread', 'BAK006', '20.00', 'images/products/grainbread.jpg', 1),
(7, 'Smith & Wesson Model 460 VXR', 'WEA001', '100.00', 'images/products/smith.jpg', 2),
(8, 'Boomerag', 'WEA002', '75.00', 'images/products/boomerang.jpg', 2),
(9, 'Franchi SPAS-12', 'WEA003', '150.00', 'images/products/spas.jpg', 2),
(10, 'Knife', 'WEA004', '80.00', 'images/products/knife.jpg', 2),
(11, 'Crossbow', 'WEA005', '100.00', 'images/products/crossbow.jpg', 2),
(12, 'Grenade', 'WEA006', '180.00', 'images/products/grenade.jpg', 2),
(13, 'Apple', 'FRU001', '10.00', 'images/products/apple.jpg', 3),
(14, 'Pineapple', 'FRU002', '25.00', 'images/products/pineapple.jpg', 3),
(15, 'Pear', 'FRU003', '15.00', 'images/products/pears.jpg', 3),
(16, 'Watermelon', 'FRU004', '25.00', 'images/products/watermelon.jpg', 3),
(17, 'Banana', 'FRU005', '30.00', 'images/products/banana.jpg', 3),
(18, 'Pomegranate', 'FRU006', '60.00', 'images/products/pomegranate.jpg', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CategoryProduct` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
