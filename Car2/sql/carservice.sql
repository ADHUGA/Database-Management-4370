-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 11:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(4) NOT NULL,
  `userID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `incart`
--

CREATE TABLE `incart` (
  `carID` int(4) NOT NULL,
  `cartID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incart`
--

INSERT INTO `incart` (`carID`, `cartID`) VALUES
(1, 1),
(3, 1);

DELIMITER $$
CREATE TRIGGER `add quantity` AFTER DELETE ON `incart` FOR EACH ROW UPDATE products SET quantity = quantity + 1 WHERE carID = old.carID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subtract quantity` AFTER INSERT ON `incart` FOR EACH ROW UPDATE products SET quantity = quantity - 1 WHERE carID = new.carID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(4) NOT NULL,
  `userID` int(4) NOT NULL,
  `cartID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(4) NOT NULL,
  `userID` int(4) NOT NULL DEFAULT 0,
  `cardNumber` int(16) NOT NULL DEFAULT 0,
  `CVV` int(4) NOT NULL DEFAULT 0,
  `expirationDate` int(16) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `userID`, `cardNumber`, `CVV`, `expirationDate`) VALUES
(1, 1, 12345678, 111, 1012000),
(2, 2, 87654321, 222, 2022000),
(3, 3, 13572468, 333, 3032000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `carID` int(4) NOT NULL,
  `carName` varchar(255) NOT NULL DEFAULT '',
  `manufacturer` varchar(30) NOT NULL DEFAULT '',
  `mileage` int(12) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text NOT NULL DEFAULT '',
  `imageOfCar` varchar(255) NOT NULL DEFAULT '',
  `quantity` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`carID`, `carName`, `manufacturer`, `mileage`, `price`, `description`, `imageOfCar`, `quantity`) VALUES
(1, 'Sonata', 'Hyundai', 10000, '2000.00', 'Good car', 'images/Sonata.jpg', 10),
(2, 'Camry', 'Toyota', 12000, '2500.00', 'The car to get', 'images/Camry.jpg', 20),
(3, 'Altima', 'Nissan', 15000, '2750.00', 'Very good indeed', 'images/Altima.jpg', 15),
(7, 'Civic', 'Honda', 14000, '92000.00', 'Pretty Ugly', 'images/Civic.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `password` varbinary(40) NOT NULL DEFAULT '',
  `phoneNumber` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `name`, `password`, `phoneNumber`) VALUES
(1, 'user1@gmail.com', 'user1', 0x7061737331, 1234567890),
(2, 'user2@gmail.com', 'user2', 0x7061737332, 987654321),
(3, 'user3@gmail.com', 'user3', 0x7061737332, 1357924680),
(16, 'Jebus@gmail.com', 'Queen', 0x64636234613632643362633239636661366466643435666436313332646263333463616665633831, 1230909999);

--
-- Indexes for dumped tables
--
DELIMITER $$
CREATE TRIGGER `cart creation` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO cart (cartID, userID)VALUES(new.userID,new.userID)
$$
DELIMITER ;
--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `Test2` (`userID`);

--
-- Indexes for table `incart`
--
ALTER TABLE `incart`
  ADD PRIMARY KEY (`carID`,`cartID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `cartID` (`cartID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `carID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Test2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`paymentID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
