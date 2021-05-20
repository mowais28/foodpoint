-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:10 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `fp_items`
--

CREATE TABLE `fp_items` (
  `ID` int(11) NOT NULL,
  `Item_Title` varchar(155) NOT NULL,
  `Price` varchar(155) NOT NULL,
  `Img` varchar(155) NOT NULL,
  `Total_Orders` varchar(155) NOT NULL,
  `Add_Date` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fp_items`
--

INSERT INTO `fp_items` (`ID`, `Item_Title`, `Price`, `Img`, `Total_Orders`, `Add_Date`) VALUES
(1, 'Beaf Burger with Fries', '200', '20210405-100520-burger.jpg', '0', '2021-05-03 02:50:11'),
(3, 'Biryani With Raita', '180', '20210405-100544-slide3.jpg', '3', '2021-05-03 02:52:58'),
(4, 'Nuggets with Fries', '220', '20210405-100507-nuget.jpg', '0', '2021-05-03 02:53:52'),
(5, 'Classic Fries', '80', '20210405-100534-aboutimg.jpg', '1', '2021-05-03 02:55:07'),
(6, 'Spicy Hot Cheesy Pizza ', '350', '20210405-100520-slide1.jpg', '0', '2021-05-03 02:56:14'),
(9, 'Nugget With addition', '250', '20210405-100504-nuggets.jpg', '0', '2021-05-03 03:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `fp_orders`
--

CREATE TABLE `fp_orders` (
  `ID` int(11) NOT NULL,
  `Item_Name` varchar(155) NOT NULL,
  `Item_id` varchar(155) NOT NULL,
  `Customer` varchar(155) NOT NULL,
  `Quantity` varchar(155) NOT NULL,
  `Phone` varchar(155) NOT NULL,
  `Email` varchar(155) NOT NULL,
  `Payment` varchar(155) NOT NULL,
  `Address` varchar(155) NOT NULL,
  `Order_Date` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fp_orders`
--

INSERT INTO `fp_orders` (`ID`, `Item_Name`, `Item_id`, `Customer`, `Quantity`, `Phone`, `Email`, `Payment`, `Address`, `Order_Date`) VALUES
(1, 'Biryani With Raita', '3', 'M Owais', '1', '03002526339', 'mowais.work@gmail.com', 'Cash On Delivery', 'abc road xyz street', '04-05-2021'),
(2, 'Classic Fries', '5', 'M Owais', '3', '03002526339', '', 'Cash On Delivery', 'hey world this street', '04-05-2021'),
(3, 'Biryani With Raita', '3', 'Hassan', '2', '03123456789', '', 'Cash On Delivery', 'abc road', '04-05-2021'),
(4, 'Biryani With Raita', '3', 'Owais', '1', '080980909009', '', 'Cash On Delivery', 'jaks ajksfh asfhla faflh afahf', '17-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `fp_users`
--

CREATE TABLE `fp_users` (
  `ID` int(11) NOT NULL,
  `Email_Address` varchar(155) NOT NULL,
  `Name` varchar(155) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fp_users`
--

INSERT INTO `fp_users` (`ID`, `Email_Address`, `Name`, `Password`, `Status`) VALUES
(6, 'mowais.work@gmail.com', 'M Owais', '$2y$10$nuoo82zOSo2tdwGtzGGBau96Jn89LNZQCl4i/wGwsvQtJCSzIa8iS', '1'),
(8, 'abc@example.com', 'Test User', '$2y$10$Aw.XY2IH75dIi//j.NRjBeW4FGph5f4K2OxdhTvayEv.IBZ7MBaKW', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fp_items`
--
ALTER TABLE `fp_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fp_orders`
--
ALTER TABLE `fp_orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fp_users`
--
ALTER TABLE `fp_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fp_items`
--
ALTER TABLE `fp_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fp_orders`
--
ALTER TABLE `fp_orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fp_users`
--
ALTER TABLE `fp_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
