-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Feb 20, 2022 at 05:20 AM
=======
-- Generation Time: Feb 20, 2022 at 10:40 AM
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
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
-- Table structure for table `acceptedrequest`
--

CREATE TABLE `acceptedrequest` (
  `id` int(11) NOT NULL,
  `requestedId` int(11) NOT NULL,
  `pickupEmpId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acceptedrequest`
--

INSERT INTO `acceptedrequest` (`id`, `requestedId`, `pickupEmpId`) VALUES
<<<<<<< HEAD
(7, 16, 3),
(30, 16, 3),
(36, 16, 3),
(38, 16, 3),
(40, 16, 3),
(20, 17, 3),
(22, 17, 3),
(24, 17, 3),
(26, 17, 3),
(32, 17, 3),
(34, 17, 3),
(12, 17, 4),
(28, 19, 3);
=======
(40, 16, 3),
(22, 17, 3);
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

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
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`) VALUES
(1, 'Colombo 1'),
(2, 'Colombo 2'),
(3, 'Colombo 3'),
(4, 'Colombo 4'),
(5, 'Colombo 5'),
(6, 'Colombo 6');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `centerName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `centerName`, `address`, `phoneNo`, `areaId`) VALUES
<<<<<<< HEAD
(1, 'Colombo 01 Operational Center', 'No 11, Temple street, Colombo 01.', 114568236, 1),
(8, 'Colombo 02 Operational Center', 'No 87A, Main road, Colombo 02.', 115874621, 2),
(9, 'Colombo 03 Operational Center', 'No 14/1, Stacy road, Colombo 03.', 118793645, 3),
(10, 'Colombo 04 Operational Center', 'No 332, Francis road, Colombo 04.', 118786364, 4),
(11, 'Colombo 05 Operational Center', 'No 452, Park road, Colombo 05.', 117875421, 5),
(12, 'Colombo 06 Operational Center', 'No 39A, Layards broadway, Colombo 06.', 114687845, 6);
=======
(1, 'Colombo 01 OP center', 'No 11, Temple street, Colombo 01.', 114568236, 1),
(8, 'Colombo 02 OP center', 'No 87A, Main road, Colombo 02.', 115874621, 2),
(9, 'Colombo 03 OP center', 'No 14/1, Stacy road, Colombo 03.', 118793645, 3),
(10, 'Colombo 04 OP center', 'No 332, Francis road, Colombo 04.', 118786364, 4),
(11, 'Colombo 05 OP center', 'No 452, Park road, Colombo 05.', 117875421, 5),
(12, 'Colombo 06 OP center', 'No 39A, Layards broadway, Colombo 06.', 114687845, 6);
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

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
  `address` varchar(255) NOT NULL,
  `areaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `cName`, `phoneNo`, `email`, `address`, `areaId`) VALUES
(6, 'dinesh', '$2y$10$jeWlaCB0.gflLLYYMDEfLespfH4bIsNgVBvL.Z7LgWXMD9vzc14sm', 'karthikkkk', 765853625, 'kartheepan@gmail.com', 'updated', 6),
(7, 'karthee', '$2y$10$mmsHFKMaj9bq6bXPYTBMLOstPfI5szYQCXJVdsu6sxZD1ccf5FRu2', 'kartheepan', 765853625, 'kartheepan2211@gmail.com', 'No.12,Galle Road,Rathmalana. try change', 1),
(8, 'john', '$2y$10$h4Jp2rXuxxXV0P9vRNvTcOxx0gmZFsv63nTLXuWreh6vIsPSPrUFa', 'johncena', 1234567891, 'j@mail.com', 'Something', 5),
(9, 'TestUser', '$2y$10$pUH0L4SmybYxqE3baJsqYeQVGKpEwU.PiWMfQuVqy9/q4i5GM0z72', 'ValidTestData22', 2147483647, 'tested2@mail.com', 'Changed password. Test22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `pickupRequestId` int(11) NOT NULL,
  `deliveredDateTime` datetime NOT NULL,
  `deliveryProof` varchar(255) DEFAULT NULL,
  `DeliveryEmpId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `pickupRequestId`, `deliveredDateTime`, `deliveryProof`, `DeliveryEmpId`) VALUES
<<<<<<< HEAD
(8, 16, '2022-02-19 11:30:55', 'Activity Diagram2.png', 5),
(9, 19, '2022-02-19 04:13:19', 'Activity Diagram2.png', 5);
=======
(12, 16, '2022-02-20 06:55:22', 'Activity Diagram1.png', 5);
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

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
  `opCenterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `eName`, `phoneNo`, `email`, `address`, `opCenterId`) VALUES
<<<<<<< HEAD
(3, 'sawnthar', '$2y$10$XfMdP/wrv4OSKCGL/fiKuuGPrlV.OnhFls1aHDvnAi9l/oI8zGDKW', 'sawntharan', 765853625, 'sawntharan07@gmail.com', 'No,15,Rathmalana', 10),
(4, 'kamal', '$2y$10$AcigFZWdGFSTouIddTCSGu4fsFWK95MYE1HkOBN4j3Wl7SyX5ozbi', 'kamal k', 715853635, 'kamal@gmail.com', 'No,1/1, Galle Road, Moratuwa', 11),
(5, 'kumar', '$2y$10$G/I5ruFbu.lFLp.GROF5veQdPe9DY2aUFnXh1U0KNPGkL8bU8n77K', 'kumar', 765853625, 'kumar@gmail.com', 'kumar', 11);
=======
(3, 'sawnthar', '$2y$10$XfMdP/wrv4OSKCGL/fiKuuGPrlV.OnhFls1aHDvnAi9l/oI8zGDKW', 'sawntharan', 765853625, 'sawntharan07@gmail.com', 'No,15,Rathmalana', 11),
(4, 'kamal', '$2y$10$AcigFZWdGFSTouIddTCSGu4fsFWK95MYE1HkOBN4j3Wl7SyX5ozbi', 'kamal k', 715853635, 'kamal@gmail.com', 'No,1/1, Galle Road, Moratuwa', 11),
(5, 'kumar', '$2y$10$G/I5ruFbu.lFLp.GROF5veQdPe9DY2aUFnXh1U0KNPGkL8bU8n77K', 'kumar', 765853625, 'kumar@gmail.com', 'kumar', 11),
(6, 'raj', '$2y$10$JyE4li9vStHtkzOJ8dc9IO.oQ5w.KTmBlTixhdFgsox.K98YcUtaa', 'rajkumar', 715853625, 'raj@gmail.com', 'No.10, Mount Lavinia', 8);
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `weight` int(10) NOT NULL,
  `size` varchar(100) NOT NULL,
  `pickupTime` datetime NOT NULL,
  `rate` int(10) NOT NULL,
  `pickupRequestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `weight`, `size`, `pickupTime`, `rate`, `pickupRequestId`) VALUES
(4, 10, 'small', '2022-02-19 07:24:15', 1100, 16),
(5, 7, 'medium', '2022-02-19 04:06:31', 900, 19),
(6, 10, 'small', '2022-02-19 08:56:25', 1100, 16),
(7, 10, 'small', '2022-02-19 08:59:06', 1100, 16),
(8, 10, 'small', '2022-02-19 09:00:43', 1100, 16);

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
  `pickupAvailability` datetime NOT NULL,
  `schedulePickupTime` datetime DEFAULT NULL,
  `customerId` int(11) NOT NULL,
  `srcOPcenter` int(11) NOT NULL,
  `destinationOPcenter` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `tracking` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickuprequests`
--

INSERT INTO `pickuprequests` (`id`, `requestedDateTime`, `pickupAvailability`, `schedulePickupTime`, `customerId`, `srcOPcenter`, `destinationOPcenter`, `receiverId`, `status`, `tracking`) VALUES
(16, '2022-02-16 06:28:06', '2022-02-26 22:58:00', NULL, 7, 10, 11, 35, 2, 24575),
(17, '2022-02-16 07:55:08', '2022-02-23 00:25:00', '2022-02-05 00:48:00', 7, 10, 1, 36, -1, 52596),
(18, '2022-02-16 09:10:40', '2022-02-19 01:40:00', NULL, 6, 12, 11, 37, -1, 33281),
(19, '2022-02-19 03:55:34', '2022-02-25 20:24:00', NULL, 7, 1, 11, 38, 3, 45407);

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `area` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `name`, `address`, `phoneNo`, `email`, `area`) VALUES
(26, 'dinesh', 'No.12,Galle Road,Rathmalana', 765853625, 'dinesh@gmail.com', 3),
(27, 'rcvrtest', 'testAddress', 1234567890, '123saw@mail.com', 6),
(28, 'rcvrtest', 'testAddress', 1234567890, '123saw@mail.com', 6),
(29, 'rcvrTest', 'teastAddress', 1234561234, 'asas@mail.com', 6),
(30, 'rcvrTest', 'teastAddress', 1234561234, 'asas@mail.com', 6),
(31, 'testrcvr2', 'testAddress2', 1231231313, 'gg@m.com', 5),
(32, 'testRcvr3', 'testAdrs3', 2147483647, 'three@mail.com', 3),
(33, 'testRcvr4', 'testAdres4', 2147483647, 'four@mail.com', 4),
(34, 'testReceiv', 'five', 1231231231, 'five@mail.com', 5),
(35, 'fiveRcvr', 'five', 1234561231, 'wyvtycagttaxnubzni@kvhrs.com', 5),
(36, 'Anush', 'testing track code', 1234567890, 'wyvtycagttaxnubzni@kvhrs.com', 1),
(37, 'changedreq', 'changed?', 1231231231, 'change@maio.com', 1),
(38, 'Receiverte', 'asdress', 1231231321, 'mail@mail.com', 1);

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
-- Indexes for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestedId` (`requestedId`,`pickupEmpId`),
  ADD KEY `pickupEmpId` (`pickupEmpId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district` (`areaId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areaId` (`areaId`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pickupRequestId` (`pickupRequestId`),
  ADD KEY `opCenter` (`DeliveryEmpId`);

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
  ADD KEY `receivingOperationCenter` (`srcOPcenter`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `receiverId` (`receiverId`),
  ADD KEY `destinationOPcenter` (`destinationOPcenter`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`);

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
-- AUTO_INCREMENT for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  ADD CONSTRAINT `acceptedrequest_ibfk_2` FOREIGN KEY (`pickupEmpId`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `acceptedrequest_ibfk_3` FOREIGN KEY (`requestedId`) REFERENCES `pickuprequests` (`id`);

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `areas` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`areaId`) REFERENCES `areas` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`pickupRequestId`) REFERENCES `pickuprequests` (`id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`DeliveryEmpId`) REFERENCES `employee` (`id`);

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
  ADD CONSTRAINT `pickuprequests_ibfk_2` FOREIGN KEY (`receiverId`) REFERENCES `receiver` (`id`),
  ADD CONSTRAINT `pickuprequests_ibfk_3` FOREIGN KEY (`destinationOPcenter`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `pickuprequests_ibfk_4` FOREIGN KEY (`srcOPcenter`) REFERENCES `centers` (`id`);

--
-- Constraints for table `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `receiver_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`id`);

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
