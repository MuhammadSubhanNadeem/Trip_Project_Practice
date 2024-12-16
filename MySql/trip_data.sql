-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 08:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facalities_id` varchar(20) NOT NULL,
  `facilitie_name` varchar(120) NOT NULL,
  `facility_score_sustaniablity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facalities_id`, `facilitie_name`, `facility_score_sustaniablity`) VALUES
('A1', 'Free WiFi, Parking, Breakfast', 7),
('A2', 'Breakfast, Pet-Friendly, Free Parking', 8),
('A3', 'Parking, Heater, Room Service', 6),
('A4', 'Free WiFi, Scenic View, Restaurant', 8),
('A5', 'Breakfast, Mountain View, WiFi', 9);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_data`
--

CREATE TABLE `hotel_data` (
  `hotel_id` int(11) NOT NULL,
  `hotel_type_id` varchar(20) NOT NULL,
  `hotel_name` varchar(20) NOT NULL,
  `hotel_location` varchar(20) NOT NULL,
  `hotel_price_min` int(11) NOT NULL,
  `hotel_price_max` int(11) NOT NULL,
  `hotel_sustainable_score` int(11) NOT NULL,
  `hotel_disc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_data`
--

INSERT INTO `hotel_data` (`hotel_id`, `hotel_type_id`, `hotel_name`, `hotel_location`, `hotel_price_min`, `hotel_price_max`, `hotel_sustainable_score`, `hotel_disc`) VALUES
(1, 'A1', 'Pine Hills Hotel', 'Naran', 5000, 10000, 0, 'Good Siting Area'),
(2, 'A2', 'Mountain View Resort', 'Kaghan', 8000, 12000, 0, 'Yummy Food And Break Fast'),
(3, 'A3', 'Lulusar Inn', 'Kaghan', 6000, 9000, 0, 'Yummy Food And Break Fast With'),
(4, 'A4', 'Kunhar Breeze Hotel', 'Naran', 7500, 11000, 0, 'Beautiful Room And Meal'),
(5, 'A5', 'Babusar Heights Lodg', 'Babusar Top', 10000, 15000, 0, 'Beautiful Room, Meal and Guest');

-- --------------------------------------------------------

--
-- Table structure for table `room_data`
--

CREATE TABLE `room_data` (
  `room_id` int(11) NOT NULL,
  `hotel_id` varchar(20) NOT NULL,
  `room_type` varchar(20) NOT NULL,
  `room_disc` varchar(120) NOT NULL,
  `room_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_data`
--

INSERT INTO `room_data` (`room_id`, `hotel_id`, `room_type`, `room_disc`, `room_price`) VALUES
(1, 'A1', 'Single Room ', 'One bed, private bathroom\n', 650),
(2, 'A2', 'Family Suite', 'Two bedrooms, lounge area', 800),
(3, 'A3', 'Deluxe Room', 'Spacious room with king-sized bath', 940),
(4, 'A4', 'Standard Room', 'Basic room with scenic view', 1080),
(6, 'A5', 'Luxury Suite', 'Premium suite with mountain view', 1200),
(7, 'A6', 'Adventure Cabin', 'Rustic cabin with outdoor seating', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `routes_data`
--

CREATE TABLE `routes_data` (
  `route_id` int(11) NOT NULL,
  `route_type_id` varchar(20) NOT NULL,
  `route_from` varchar(30) NOT NULL,
  `route_to` varchar(30) NOT NULL,
  `route_name` varchar(50) NOT NULL,
  `route_distance` int(11) NOT NULL,
  `route_weather_temp` int(11) NOT NULL,
  `route_weather_condition` varchar(30) NOT NULL,
  `route_key_attraction` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes_data`
--

INSERT INTO `routes_data` (`route_id`, `route_type_id`, `route_from`, `route_to`, `route_name`, `route_distance`, `route_weather_temp`, `route_weather_condition`, `route_key_attraction`) VALUES
(1, 'A1', 'Islamabad', 'Naran', 'Islamabad to Naran', 600, 15, 'Sunny', 'Mountain Hill'),
(2, 'A2', 'Kaghan', 'Lulusar', 'Kaghan to Lulusar', 620, 7, 'Sunny', 'Blue Mosque'),
(3, 'A3', 'Kaghan', 'Babusar', 'Kaghan to Babusar', 410, 4, 'Cloudy', 'Forest'),
(4, 'A4', 'Naran', 'Lake Saif-ul-Malook', 'Naran to Saif-ul-Malook', 820, 6, 'Rainy', 'Chitral Valley'),
(5, 'A5', 'Balakot', 'Kaghan', 'Balakot to Kaghan ', 740, 3, 'Partly Cloud', 'Mountain View'),
(6, 'A6', 'Murree', 'Naran', 'Murree to Naran', 120, 20, 'Sunny Heat', 'Water Fall, Lake'),
(7, 'A7', 'Abbottabad', 'Naran', 'Abbottabad to Naran ', 465, 12, 'Foog', 'Neelum Lake, Forest View'),
(8, 'A8', 'Islamabad', 'Balakot', 'Islamabad to Balakot', 325, 8, 'Foog', 'Snow Fall'),
(9, 'A9', 'Naran', 'Ansoo Lake', 'Naran to Ansoo Lake', 285, -2, 'Snow-Fall', 'Mountain Height View'),
(10, 'A10', 'Shogran', 'Siri Paye', 'Shogran to Siri Paye', 635, 4, 'Heavy Rain', 'OFF-Roading, Tracks Racing in '),
(11, 'A11', 'Kaghan', 'Noori Top', 'Kaghan to Noori Top', 328, 11, 'Sunny', 'Animal Zoo, Faisal Mosque'),
(12, 'A12', 'Babusar Top', 'Chilas', 'Babusar to Chilas', 465, 2, 'Foog', 'Camping, Cooking, Loving Peopl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD UNIQUE KEY `facalities_id` (`facalities_id`);

--
-- Indexes for table `hotel_data`
--
ALTER TABLE `hotel_data`
  ADD UNIQUE KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `room_data`
--
ALTER TABLE `room_data`
  ADD UNIQUE KEY `room_id` (`room_id`),
  ADD UNIQUE KEY `room_type` (`room_type`);

--
-- Indexes for table `routes_data`
--
ALTER TABLE `routes_data`
  ADD UNIQUE KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel_data`
--
ALTER TABLE `hotel_data`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_data`
--
ALTER TABLE `room_data`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `routes_data`
--
ALTER TABLE `routes_data`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
