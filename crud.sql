-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 05:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_name`) VALUES
(1, 1, 'Chennai'),
(2, 1, 'ambattur'),
(3, 2, 'tree'),
(4, 11, 'salem1');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'Brazil'),
(3, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `crudphp`
--

CREATE TABLE `crudphp` (
  `id` int(3) NOT NULL,
  `name` varchar(99) NOT NULL,
  `city` int(9) NOT NULL,
  `state` int(9) NOT NULL,
  `country` int(9) NOT NULL,
  `pincode` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crudphp`
--

INSERT INTO `crudphp` (`id`, `name`, `city`, `state`, `country`, `pincode`) VALUES
(5, 'Preethi suuya', 1, 1, 1, 2147483647),
(23, 'surya preethi', 3, 2, 2, 2147483647),
(25, 'Preethi v', 1, 1, 1, 2147483647),
(27, 'Preethi Velraj ss', 1, 1, 1, 2147483647),
(28, 'suuy', 1, 1, 1, 2147483647),
(30, 'Preethi Velraj', 1, 1, 1, 2147483647),
(31, 'Preethi Velraj', 1, 1, 1, 2147483647),
(33, 'Preethi Velrajsdfdsfsdsfsd', 3, 2, 2, 2147483647),
(34, 'Preethi Velrajsdfdsfsdsfsd', 3, 2, 2, 2147483647),
(35, 'Preethi Velrajsdfdsfsdsfsd', 3, 2, 2, 2147483647),
(36, 'Preethi Velrajsdfsdfsdfsdf', 1, 1, 1, 2147483647),
(37, 'Preethi Velrajsdfsdfsdfsdf', 1, 1, 1, 2147483647),
(38, 'Preethi Velraj', 1, 1, 1, 2147483647),
(39, 'Preethi Velraj', 1, 1, 1, 2147483647),
(40, 'sddsdsds', 4, 11, 1, 1234567890),
(41, 'Preethi Velraj', 1, 1, 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'Tamil Nadu'),
(2, 2, 'brazil1'),
(8, 3, 'kin'),
(9, 2, 'leaf'),
(10, 3, 'kia'),
(11, 1, 'salem'),
(13, 1, 'kerela');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `crudphp`
--
ALTER TABLE `crudphp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `country` (`country`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crudphp`
--
ALTER TABLE `crudphp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crudphp`
--
ALTER TABLE `crudphp`
  ADD CONSTRAINT `city` FOREIGN KEY (`city`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `country` FOREIGN KEY (`country`) REFERENCES `country` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `state` FOREIGN KEY (`state`) REFERENCES `state` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
