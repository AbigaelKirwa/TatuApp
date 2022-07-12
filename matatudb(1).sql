-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 12, 2022 at 06:41 AM
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
-- Database: `matatudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `pickup_stage_id` int(20) NOT NULL,
  `dropoff_stage_id` int(20) NOT NULL,
  `bus_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `booking_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(10) NOT NULL,
  `bus_name` varchar(70) NOT NULL,
  `number_plate` varchar(10) NOT NULL,
  `route_id` int(20) NOT NULL,
  `bus_image` varchar(50) NOT NULL,
  `capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`, `number_plate`, `route_id`, `bus_image`, `capacity`) VALUES
(1, 'super-metro', 'KCA 001A', 1, 'images/bluebus2.png', 25),
(2, 'latema', 'KCA 002A', 1, 'images/orangebus2.png', 25),
(3, 'la-trans', 'KCA 003A', 2, 'images/orangebus2.png', 14),
(4, 'expresso', 'KCA 004A', 2, 'images/bluebus2.png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE `fare` (
  `fare_id` int(20) NOT NULL,
  `pickup_stage_id` int(20) NOT NULL,
  `pickup_stage_name` varchar(60) NOT NULL,
  `dropoff_stage_id` int(20) NOT NULL,
  `dropoff_stage_name` varchar(60) NOT NULL,
  `fare_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`fare_id`, `pickup_stage_id`, `pickup_stage_name`, `dropoff_stage_id`, `dropoff_stage_name`, `fare_amount`) VALUES
(1, 5, 'CBD', 1, 'Westlands', 50),
(2, 5, 'CBD', 2, 'Parklands', 60),
(3, 5, 'CBD', 3, 'Nyayo stadium', 20),
(4, 5, 'CBD', 4, 'T-mall', 30);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_amount` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `bus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `route_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`, `route_number`) VALUES
(1, 'Waiyaki way', '105'),
(2, 'Langata road', '34');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `stage_id` int(11) NOT NULL,
  `stage_name` varchar(100) NOT NULL,
  `stage_number` varchar(20) NOT NULL,
  `route_id` int(20) NOT NULL,
  `route_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`stage_id`, `stage_name`, `stage_number`, `route_id`, `route_name`) VALUES
(1, 'Westlands', 'A1', 1, 'Waiyaki way'),
(2, 'Parklands', 'A2', 1, 'Waiyaki way'),
(3, 'CBD', 'A0', 1, 'Waiyaki way'),
(4, 'T-mall', 'B2', 2, 'Langata road'),
(5, 'CBD', 'A0', 2, 'Langata');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `role`) VALUES
(1, 'bella', 'boom', 'bella@gmail.com', 'bella', 'bella', 'passenger'),
(2, 'tatu', 'prep', 'bella@gmail.com', 'tatu', 'tatu', 'passenger'),
(3, 'billy', 'jean', 'billy@gmail.com', 'billy', 'billy', 'passenger'),
(5, 'trio', 'mio', 'trio@gmail.com', 'trio', 'trio', 'passenger'),
(6, 'yellow', 'button', 'yellow@gmail.com', 'yellow', 'yellow', 'passenger'),
(7, 'johny', 'bravo', 'johny@gmail.com', 'johny', 'johny', 'passenger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `dropoff_stage_id` (`dropoff_stage_id`),
  ADD KEY `pickup_stage_id` (`pickup_stage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
  ADD PRIMARY KEY (`fare_id`),
  ADD KEY `pickup_stage_id` (`pickup_stage_id`),
  ADD KEY `dropoff_stage_id` (`dropoff_stage_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `payment_ibfk_1` (`user_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stage_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fare`
--
ALTER TABLE `fare`
  MODIFY `fare_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`dropoff_stage_id`) REFERENCES `stage` (`stage_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`pickup_stage_id`) REFERENCES `stage` (`stage_id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`pickup_stage_id`) REFERENCES `stage` (`stage_id`),
  ADD CONSTRAINT `fare_ibfk_2` FOREIGN KEY (`dropoff_stage_id`) REFERENCES `stage` (`stage_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
