-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 07:15 AM
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
-- Database: `ice`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `iname` varchar(250) NOT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `quantity`, `mobile`, `location`, `status`, `iname`, `payment`) VALUES
(59, 'suyashnehete7@gmail.com', 1, '+919834147148', 'https://www.google.com/maps/place/Bhusawal,+Maharashtra/@21.03965,75.7746584,13z/data=!3m1!4b1!4m5!3m4!1s0x3bd9a61556423e47:0x47f833853d8103a6!8m2!3d21.0417689!4d75.7875538', 'Completed', 'LIME SORBET', 100),
(60, 'suyashnehete7@gmail.com', 1, '+919834147148', 'https://www.google.com/maps/place/Bhusawal,+Maharashtra/@21.03965,75.7746584,13z/data=!3m1!4b1!4m5!3m4!1s0x3bd9a61556423e47:0x47f833853d8103a6!8m2!3d21.0417689!4d75.7875538', 'Completed', 'LIME SORBET', 100),
(61, 'suyashnehete7@gmail.com', 1, '+919834147148', 'https://www.google.com/maps/place/Bhusawal,+Maharashtra/@21.03965,75.7746584,13z/data=!3m1!4b1!4m5!3m4!1s0x3bd9a61556423e47:0x47f833853d8103a6!8m2!3d21.0417689!4d75.7875538', 'Completed', 'CHOCOLATE & SEA SALT', 60),
(62, 'suyashnehete7@gmail.com', 1, '+919834147148', 'https://www.google.com/maps/place/Bhusawal,+Maharashtra/@21.03965,75.7746584,13z/data=!3m1!4b1!4m5!3m4!1s0x3bd9a61556423e47:0x47f833853d8103a6!8m2!3d21.0417689!4d75.7875538', 'Completed', 'LIME SORBET', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(9, 'suyashnehete7@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
