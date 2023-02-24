-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 09:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 01:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `carService` DEFAULT CHARACTER SET utf8mb4;

USE `carService`;

DROP TABLE IF EXISTS `products_orders`, `products`, `orders`, `payment`, `users`;

CREATE TABLE `users` (
  `userID` int(4) NOT NULL AUTO_INCREMENT, 
  `email` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `password` varbinary(40) NOT NULL DEFAULT '',
  `phoneNumber` int(10) NOT NULL DEFAULT '0', 
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`userID`, `email`, `name`, `password`, `phoneNumber`) VALUES
(1, 'user1@gmail.com', 'user1', 'pass1', '1234567890'),
(2, 'user2@gmail.com', 'user2', 'pass2', '0987654321'),
(3, 'user3@gmail.com', 'user3', 'pass2', '1357924680');



CREATE TABLE `payment` (
  `paymentID` int(4) NOT NULL AUTO_INCREMENT, 
  `userID` int(4) NOT NULL DEFAULT '0',
  `cardNumber` int(16) NOT NULL DEFAULT '0',
  `CVV` int(4) NOT NULL DEFAULT '0',
  `expirationDate` int(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paymentID`),
  FOREIGN KEY (`paymentID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `payment` (`paymentID`, `userID`, `cardNumber`, `CVV`, `expirationDate`) VALUES
(1, '1', '12345678', '111', '01012000'),
(2, '2', '87654321', '222', '02022000'),
(3, '3', '13572468', '333', '03032000');



CREATE TABLE `products` (
  `carID` int(4) NOT NULL AUTO_INCREMENT, 
  `carName` varchar(255) NOT NULL DEFAULT '',
  `manufacturer` varchar(30) NOT NULL DEFAULT '',
  `mileage` int(12) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text(255) NOT NULL DEFAULT '',
  `imageOfCar` varchar(255) NOT NULL DEFAULT '',
  `quantity` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`carID`, `carName`, `manufacturer`, `mileage`, `price`, `description`, `imageOfCar`, `quantity`) VALUES
(1, 'Sonata', 'Hyundai', '10000', '2000.00', 'Good car', 'https://images.hgmsites.net/lrg/2020-hyundai-sonata-limited-2-0l-angular-front-exterior-view_100759686_l.jpg', '10'),
(2, 'Camry', 'Toyota', '12000', '2500.00', 'The car to get', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTA0z8YWQnmbLfg7zmtITo2tWFSygwXuVPmGA&usqp=CAU', '20' ),
(3, 'Altima', 'Nissan', '15000', '2750.00', 'Very good indeed', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-uHcs06EgrpfCq02ff7uwLM8Te3RRDOX89w&usqp=CAU', '15');




CREATE TABLE `orders` (
  `orderID` int(4) NOT NULL AUTO_INCREMENT, 
  `userID` int(4) NOT NULL DEFAULT '0',
  `paymentID` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderID`),
  FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`orderID`, `userID`, `paymentID`) VALUES
(1, '1', '1'),
(2, '2', '2'),
(3, '3', '3');




CREATE TABLE `products_orders` (
  `orderID` int(4) NOT NULL DEFAULT '0', 
  `carID` int(4) NOT NULL DEFAULT '0',
  FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  FOREIGN KEY (`carID`) REFERENCES `products` (`carID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products_orders` (`orderID`, `carID`) VALUES
(1, '1'),
(2, '2'),
(3, '3');
