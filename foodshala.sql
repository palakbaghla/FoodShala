-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 22, 2020 at 09:31 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Landmark` varchar(200) DEFAULT NULL,
  `StreetAddress` varchar(200) DEFAULT NULL,
  `ApartmentNumber` varchar(200) DEFAULT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `CountryCode` varchar(10) NOT NULL,
  `City` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Id`, `Landmark`, `StreetAddress`, `ApartmentNumber`, `ZipCode`, `CountryCode`, `City`) VALUES
(1, 'Opposite Lancers Convent School', 'block A', '75', '110085', 'IN', 'New Delhi'),
(2, 'Near Sunrise hospital', 'Block B Pocket 2', '41', '110089', 'IN', 'New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

DROP TABLE IF EXISTS `dish`;
CREATE TABLE IF NOT EXISTS `dish` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Category` enum('Veg','Non-veg','','') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`Id`, `Name`, `Category`) VALUES
(1, 'Shahi Paneer', 'Veg'),
(3, 'Tandoori Aloo', 'Veg'),
(4, 'Chicken Seekh Kabab', 'Non-veg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_Id` int(11) NOT NULL,
  `Availability` enum('Yes','No') NOT NULL,
  `Dish_Id` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `restaurant_id` (`Restaurant_Id`) USING BTREE,
  KEY `fk_dish_id` (`Dish_Id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order(summary)`
--

DROP TABLE IF EXISTS `order(summary)`;
CREATE TABLE IF NOT EXISTS `order(summary)` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` enum('Delivered','Not Delivered','Cancelled','','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `receive_time` timestamp NOT NULL,
  `deliver_time` timestamp NOT NULL,
  `Payment_mode` enum('Credit','Cash','','') NOT NULL,
  `Delivery_mode` enum('dine-in','pickup','','') NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `userid` (`userid`),
  UNIQUE KEY `restaurant_id` (`restaurant_id`),
  KEY `FK_user_Id` (`userid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items(cart)`
--

DROP TABLE IF EXISTS `order_items(cart)`;
CREATE TABLE IF NOT EXISTS `order_items(cart)` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_Id` int(11) NOT NULL,
  `Dish_Id` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Serving` enum('Half Plate','Full Plate','','') DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Dish_Id` (`Dish_Id`),
  UNIQUE KEY `restaurant_id` (`Restaurant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurantdetail`
--

DROP TABLE IF EXISTS `restaurantdetail`;
CREATE TABLE IF NOT EXISTS `restaurantdetail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `GSTNo` varchar(20) NOT NULL,
  `Start_Timings` timestamp NULL DEFAULT NULL,
  `End_Timings` timestamp NULL DEFAULT NULL,
  `Availability_Days` varchar(20) DEFAULT NULL,
  `DeliveryMode` enum('DineIn','DeliveryOnly','Both','') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`) VALUES
(1, 'Customer'),
(2, 'Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Address_Id` int(11) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `CreatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Password` varchar(32) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `Preference` enum('Veg','Non-veg','Both','','') NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `restaurant_id` (`restaurant_id`),
  KEY `Email` (`Email`),
  KEY `address_id_FK` (`Address_Id`),
  KEY `role_id_FK` (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `LastName`, `Email`, `Address_Id`, `Phone`, `CreatedTime`, `Password`, `RoleId`, `restaurant_id`, `Preference`) VALUES
(3, 'Palak', NULL, 'palak@gmail.com', 2, '9876543210', '2020-06-21 20:13:37', 'palak123', 1, NULL, 'Veg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_dish_id` FOREIGN KEY (`Dish_Id`) REFERENCES `dish` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order(summary)`
--
ALTER TABLE `order(summary)`
  ADD CONSTRAINT `FK_restaurant_Id` FOREIGN KEY (`restaurant_id`) REFERENCES `user` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_user_Id` FOREIGN KEY (`userid`) REFERENCES `user` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_items(cart)`
--
ALTER TABLE `order_items(cart)`
  ADD CONSTRAINT `FK_restrau_Id` FOREIGN KEY (`Restaurant_Id`) REFERENCES `restaurantdetail` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items(cart)_ibfk_1` FOREIGN KEY (`Dish_Id`) REFERENCES `dish` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `address_id_FK` FOREIGN KEY (`Address_Id`) REFERENCES `address` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_res_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurantdetail` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `role_id_FK` FOREIGN KEY (`RoleId`) REFERENCES `role` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
