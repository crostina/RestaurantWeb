-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 08:47 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(40) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `typeCategory` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(60) NOT NULL,
  `Rating` int(5) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Available` tinyint(1) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Label` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idCategory` (`idCategory`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offreproduct`
--

DROP TABLE IF EXISTS `offreproduct`;
CREATE TABLE IF NOT EXISTS `offreproduct` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idOffre` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idOffre` (`idOffre`),
  KEY `idProduct` (`idProduct`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderoffre`
--

DROP TABLE IF EXISTS `orderoffre`;
CREATE TABLE IF NOT EXISTS `orderoffre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `idOrder` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idOrder` (`idOrder`),
  KEY `idOffre` (`idOffre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `amount` float NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(40) NOT NULL,
  `orderId` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `orderId` (`orderId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CIN` int(8) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(60) NOT NULL,
  `Role` enum('Client','Employee','Cashier','Manager') NOT NULL,
  `idEvaluation` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idEvaluation` (`idEvaluation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `idCategory` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idCategory` (`idCategory`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Description` varchar(120) NOT NULL,
  `idRTable` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idCashier` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idRTable` (`idRTable`),
  KEY `idClient` (`idClient`),
  KEY `idCashier` (`idCashier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rorder`
--

DROP TABLE IF EXISTS `rorder`;
CREATE TABLE IF NOT EXISTS `rorder` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Comment` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `idPayment` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idPayment` (`idPayment`),
  KEY `idClient` (`idClient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rtable`
--

DROP TABLE IF EXISTS `rtable`;
CREATE TABLE IF NOT EXISTS `rtable` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Position` int(11) NOT NULL,
  `Reserved` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
