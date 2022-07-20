-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 01:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `win`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CatagoryId` int(255) NOT NULL,
  `CatagoryName` varchar(100) NOT NULL,
  `subCatagoryName` varchar(100) NOT NULL,
  `Media` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CatagoryId`, `CatagoryName`, `subCatagoryName`, `Media`) VALUES
(2, 'Amman', 'Places', 'Category/c0e183ec007337fa992835ae4cf14281amman-hisar-gece.jpg'),
(3, 'Jerash', 'Places', 'Category/fbf1057841dcfc9a22033824744e2798IMG_1480-3.jpeg'),
(4, 'Jerash', 'restaurants', 'Category/31a0365f6014968b7641ab88fc4474e156-3957474-1442844962b8d14d09770143bd91ed0920f40aa0ca.jpg'),
(5, 'Jerash', 'Hotels', 'Category/feeec6abaa025a3e3a32df4bae30c936329468709.jpg'),
(6, 'Aqaba', 'Trips', 'Category/f4c4c399b01ac5d62c3c8d1d4968853dimage_processing20190731-4-7rfbuv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(255) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `UserName`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `regist`
--

CREATE TABLE `regist` (
  `id` int(11) NOT NULL,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regist`
--

INSERT INTO `regist` (`id`, `firstname`, `lastname`, `phone`, `email`, `pass`) VALUES
(1, 'test', 'test', 797971123, 'ashrafshorbaji6@gmail.com', '124bd1296bec0d9d93c7b52a71ad8d5b');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `quantity` int(20) NOT NULL,
  `FinalAmount` varchar(15) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `DatePost` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `FirstName`, `LastName`, `phone`, `Title`, `Description`, `quantity`, `FinalAmount`, `Type`, `DatePost`) VALUES
(1, 'test', 'test', '797971123', 'Enjoy in the largest luxury hotels in Jerash', 'The largest luxury hotel in the ancient city of Jerash, you can visit Jerash Castle while you are in the hotel, which is not one kilometer away from the hotel and you can walk on foot to enjoy the most beautiful scenery', 2, '50', 'Private', '2021-12-31 20:51:41'),
(2, 'test', 'test', '797971123', 'Visit Aqaba', 'discount for above five person', 2, '10', 'Private', '2021-12-31 20:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripId` int(255) NOT NULL,
  `CatagoryName` varchar(100) NOT NULL,
  `subCatagoryName` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `TripDescription` text NOT NULL,
  `TripPrice` varchar(10) NOT NULL,
  `Media` text NOT NULL,
  `QuantityAvailable` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripId`, `CatagoryName`, `subCatagoryName`, `Title`, `TripDescription`, `TripPrice`, `Media`, `QuantityAvailable`) VALUES
(1, 'Jerash', 'restaurants', 'Breakfast at a hut restaurant in the Jerash Mountains', 'In the morning, a group goes to Jerash to eat breakfast in a hut restaurant in the Jerash Mountains, then learn about the high mountains in the Jerash region', '10.5', 'Trips/dfd0e524a85422a3013d2cbc2e3270e356-3957474-1442844962b8d14d09770143bd91ed0920f40aa0ca.jpg', 8),
(2, 'Jerash', 'Hotels', 'Enjoy in the largest luxury hotels in Jerash', 'The largest luxury hotel in the ancient city of Jerash, you can visit Jerash Castle while you are in the hotel, which is not one kilometer away from the hotel and you can walk on foot to enjoy the most beautiful scenery', '50', 'Trips/444e422bbe0822930181cbcd34ad52ca329468709.jpg', 5),
(3, 'Amman', 'Hotels', 'The Olive Branch Hotel, Jerash', 'Two nights at the Olive Branch Hotel in Jerash, including two people', '50', 'Trips/ec4f7bb73330835df8721344334de726139840857.jpg', 0),
(4, 'Aqaba', 'Trips', 'Visit Aqaba', 'discount for above five person', '10', 'Trips/aa761f20a99ba6b6bb6546531480eb74image_processing20190731-4-7rfbuv.jpg', 5),
(5, 'Aqaba', 'Hotels', 'Kempinski Hotel Aqaba Red Sea', 'Kempinski Hotel Aqaba Red Sea just 100 JD', '100', 'Trips/0fd94e08d9f8a2955a5a5da501f24fa2exterior.jpg', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CatagoryId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regist`
--
ALTER TABLE `regist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CatagoryId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regist`
--
ALTER TABLE `regist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
