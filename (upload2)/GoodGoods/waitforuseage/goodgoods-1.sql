-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 02:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodgoods好好藏-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `Useraccount` varchar(100) NOT NULL,
  `boxname` varchar(100) NOT NULL,
  `boxpic` varchar(100) NOT NULL,
  `boxdiscription` text NOT NULL,
  `Warehouseid` varchar(50) NOT NULL,
  `boxid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`Useraccount`, `boxname`, `boxpic`, `boxdiscription`, `Warehouseid`, `boxid`) VALUES
('peter', 'b2', 'b2140.jpg', '', 'peterw90', 'peterb172'),
('peter', 'b1', 'b1250.jpg', '', 'peterw877', 'peterb357');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `goodsname` varchar(100) DEFAULT NULL,
  `goodsid` varchar(50) NOT NULL,
  `goodspic` varchar(100) DEFAULT NULL,
  `goodsdiscription` varchar(100) DEFAULT NULL,
  `useraccount` varchar(100) DEFAULT NULL,
  `boxid` varchar(50) DEFAULT NULL,
  `Warehouseid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Useraccount` varchar(100) NOT NULL,
  `Userpassword` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Birthday` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Useraccount`, `Userpassword`, `Username`, `Email`, `Birthday`) VALUES
('peter', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'peter', 'p6301@gmail.com', '2021-06-03'),
('rong', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'rong', 'p630111@gmail.com', '2021-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Useraccount` varchar(100) NOT NULL,
  `Warehousename` varchar(100) NOT NULL,
  `Warehousepic` varchar(100) NOT NULL,
  `Warehousediscription` text NOT NULL,
  `warehouseid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Useraccount`, `Warehousename`, `Warehousepic`, `Warehousediscription`, `warehouseid`) VALUES
('peter', 'w1', 'w1608.jpg', '', 'peterw877'),
('peter', 'w2', 'w2147.jpg', '', 'peterw90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`boxid`),
  ADD KEY `Useraccount` (`Useraccount`),
  ADD KEY `Warehouseid` (`Warehouseid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goodsid`),
  ADD KEY `useraccount` (`useraccount`),
  ADD KEY `boxid` (`boxid`),
  ADD KEY `Warehouseid` (`Warehouseid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`Useraccount`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouseid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `boxes_ibfk_1` FOREIGN KEY (`Useraccount`) REFERENCES `userinfo` (`Useraccount`),
  ADD CONSTRAINT `boxes_ibfk_2` FOREIGN KEY (`Warehouseid`) REFERENCES `warehouse` (`warehouseid`);

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`useraccount`) REFERENCES `userinfo` (`Useraccount`),
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`boxid`) REFERENCES `boxes` (`boxid`),
  ADD CONSTRAINT `goods_ibfk_3` FOREIGN KEY (`Warehouseid`) REFERENCES `warehouse` (`warehouseid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
