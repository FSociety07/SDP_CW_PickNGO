-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 07:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `centerName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `districtId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `cName`, `phoneNo`, `email`, `address`) VALUES
(6, 'dinesh', '$2y$10$lcXYULRL0xFQhXeXQ48iEOLm3wox3q.mfRap8jDfXgj4J8Z2YGqPO', 'dineshkumar', 765853625, 'kartheepan@gmail.com', '123456'),
(7, 'karthee', '$2y$10$t68AMRsfY/epP/t55iRLtO7tuZRuUqFFNaIZSOib4WS4Ijvnksi2u', 'kartheepan', 765853625, 'kartheepan2211@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `pickupRequestId` int(11) NOT NULL,
  `currentLocation` varchar(50) NOT NULL,
  `deliveredDateTime` datetime NOT NULL,
  `trackingCode` varchar(10) NOT NULL,
  `deliveryProof` int(11) NOT NULL,
  `opCenter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `dName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `eName` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `opCenterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `eName`, `phoneNo`, `email`, `address`, `status`, `opCenterId`) VALUES
(3, 'sawnthar', '$2y$10$XfMdP/wrv4OSKCGL/fiKuuGPrlV.OnhFls1aHDvnAi9l/oI8zGDKW', 'sawntharan', 765853625, 'sawntharan07@gmail.com', 'No,15,Rathmalana', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `weight` int(10) NOT NULL,
  `pickupTime` datetime NOT NULL,
  `rate` varchar(10) NOT NULL,
  `pickupRequestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payAmount` varchar(10) NOT NULL,
  `payDate` date NOT NULL,
  `payMethod` varchar(10) NOT NULL,
  `customerId` int(11) NOT NULL,
  `packageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pickuprequests`
--

CREATE TABLE `pickuprequests` (
  `id` int(11) NOT NULL,
  `requestedDateTime` datetime NOT NULL,
  `pickedDateTime` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `pickupAvailability` int(1) NOT NULL,
  `customerId` int(11) NOT NULL,
  `receivingOperationCenter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `registrationNo` varchar(50) NOT NULL,
  `vehicleType` int(11) NOT NULL,
  `coverage` varchar(50) NOT NULL,
  `opCenter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL,
  `typeName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district` (`districtId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packageId` (`packageId`),
  ADD KEY `pickupRequestId` (`pickupRequestId`),
  ADD KEY `opCenter` (`opCenter`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opCenterId` (`opCenterId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `customerId` (`pickupRequestId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `packageId` (`packageId`);

--
-- Indexes for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivingOperationCenter` (`receivingOperationCenter`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicleType` (`vehicleType`),
  ADD KEY `opCenter` (`opCenter`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_ibfk_1` FOREIGN KEY (`districtId`) REFERENCES `district` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `package` (`id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`pickupRequestId`) REFERENCES `pickuprequests` (`id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`opCenter`) REFERENCES `centers` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`opCenterId`) REFERENCES `centers` (`id`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`pickupRequestId`) REFERENCES `pickuprequests` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`packageId`) REFERENCES `package` (`id`);

--
-- Constraints for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  ADD CONSTRAINT `pickuprequests_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `pickuprequests_ibfk_2` FOREIGN KEY (`receivingOperationCenter`) REFERENCES `centers` (`id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`opCenter`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`vehicleType`) REFERENCES `vehicletype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
