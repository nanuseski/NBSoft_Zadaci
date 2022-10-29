-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 02:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `orderId`, `value`, `productId`) VALUES
(1, 1, '100', 3),
(2, 1, '100', 3),
(3, 2, '100', 1),
(4, 9, '100', 2),
(5, 2, '100', 3),
(6, 2, '100', 4),
(7, 5, '100', 1),
(8, 1, '100', 2),
(9, 5, '100', 5),
(10, 4, '100', 1),
(11, 3, '100', 1),
(12, 5, '100', 1),
(13, 5, '100', 1),
(30, 30, '30', 1),
(31, 30, '30', 2),
(32, 30, '30', 3),
(33, 30, '30', 4),
(34, 31, '30', 1),
(35, 31, '30', 2),
(36, 31, '30', 3),
(37, 31, '30', 4),
(38, 32, '30', 4),
(39, 32, '30', 5),
(40, 32, '30', 3),
(41, 33, '30', 2),
(42, 33, '30', 1),
(43, 33, '30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `value`, `dateCreated`) VALUES
(1, 1, 21, '2022-10-29'),
(2, 1, 21, '2022-10-29'),
(3, 3, 21, '2022-10-29'),
(4, 5, 21, '2022-10-29'),
(5, 3, 21, '2022-10-29'),
(6, 1, 21, '2022-10-29'),
(7, 3, 21, '2022-10-29'),
(8, 2, 21, '2022-10-29'),
(9, 4, 21, '2022-10-29'),
(10, 4, 21, '2022-10-29'),
(30, 6, 1, '2022-10-29'),
(31, 6, 1, '2022-10-29'),
(32, 6, 1, '2022-10-29'),
(33, 6, 1, '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'Pr1', 3),
(2, 'Pr1', 2),
(3, 'Pr1', 3),
(4, 'Pr4', 4),
(5, 'Pr5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `datecreated` date NOT NULL,
  `dateEdit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `phone`, `email`, `datecreated`, `dateEdit`) VALUES
(1, 'Prva', 'Osoba', 'br  telefona', 'mejl', '2022-11-29', '2022-11-29'),
(2, 'Drugi', 'Korisnik', 'telefon', 'gmail', '2022-01-29', '2022-10-29'),
(3, '3i', 'Korisnik', 'telefon', 'gmail', '2022-10-29', '2022-10-29'),
(4, '4i', 'Korisnik', 'telefon', 'gmail', '2022-10-29', '2022-10-29'),
(5, '5i', 'Korisnik', 'telefon', 'gmail', '2022-10-29', '2022-10-29'),
(6, 'Imp', 'Ostor', 'imp', 'ostor', '2022-10-29', '2022-10-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
