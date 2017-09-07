-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2017 at 02:05 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creatij6_navy`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts`
--

CREATE TABLE IF NOT EXISTS `aircrafts` (
  `airCrafts_Id` int(12) NOT NULL AUTO_INCREMENT,
  `airCrafts_Name` varchar(250) NOT NULL,
  `airCrafts_Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`airCrafts_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aircrafts`
--

INSERT INTO `aircrafts` (`airCrafts_Id`, `airCrafts_Name`, `airCrafts_Status`) VALUES
(1, 'MiG29K', 1),
(2, 'TestAircraft', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cartridges`
--

CREATE TABLE IF NOT EXISTS `cartridges` (
  `cartridge_Id` int(12) NOT NULL AUTO_INCREMENT,
  `cartridge_Name` varchar(250) NOT NULL,
  `cartridge_Nomenclature` varchar(250) NOT NULL,
  `cartridge_PartNo` varchar(250) NOT NULL,
  `cartridge_LotNum` varchar(500) NOT NULL,
  `cartridge_ForAircraft` int(12) NOT NULL,
  `cartridge_Quantity` int(12) NOT NULL,
  `cartridge_Status` tinyint(1) NOT NULL DEFAULT '1',
  `cartridge_AddedBy` int(12) NOT NULL,
  `cartridge_TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cartridge_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cartridges`
--

INSERT INTO `cartridges` (`cartridge_Id`, `cartridge_Name`, `cartridge_Nomenclature`, `cartridge_PartNo`, `cartridge_LotNum`, `cartridge_ForAircraft`, `cartridge_Quantity`, `cartridge_Status`, `cartridge_AddedBy`, `cartridge_TimeStamp`) VALUES
(1, 'PDO-1', 'First Nomen', '001', 'USA_2017', 1, 100, 1, 1, '2017-04-04 10:34:35'),
(2, 'Tst', '124', '12', 'yu2', 1, 1222, 1, 1, '2017-05-07 11:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE IF NOT EXISTS `loginlogs` (
  `Login_Id` int(12) NOT NULL AUTO_INCREMENT,
  `Login_UserId` int(12) NOT NULL,
  `Login_TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Login_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_Id` int(11) NOT NULL AUTO_INCREMENT,
  `request_Number` varchar(250) NOT NULL,
  `request_AirCraft` int(12) NOT NULL,
  `request_catridges` int(12) NOT NULL,
  `request_Quantity` int(11) NOT NULL,
  `request_Comments` varchar(500) DEFAULT NULL,
  `request_By` int(11) NOT NULL,
  `request_TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_Status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_Id`, `request_Number`, `request_AirCraft`, `request_catridges`, `request_Quantity`, `request_Comments`, `request_By`, `request_TimeStamp`, `request_Status`) VALUES
(1, '', 1, 1, 10, '\r\n', 1, '2017-04-04 12:34:18', 1),
(2, '', 1, 1, 10, '\r\n', 1, '2017-04-04 12:34:33', 1),
(3, '', 1, 1, 110, 'Test', 1, '2017-04-04 19:34:07', 2),
(4, '', 2, 2, 2, 'sd\r\n', 1, '2017-05-07 11:35:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `supply_Id` int(12) NOT NULL AUTO_INCREMENT,
  `supply_RequestId` int(12) NOT NULL,
  `supply_LotNumber` varchar(250) NOT NULL,
  `supply_Quantity` int(11) NOT NULL,
  `supply_ShellLife` int(11) NOT NULL,
  `supply_OperationalLife` int(11) NOT NULL,
  `supply_dateofSupply` date NOT NULL,
  `supply_CreatedBy` int(12) NOT NULL,
  `supply_TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supply_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_Id`, `supply_RequestId`, `supply_LotNumber`, `supply_Quantity`, `supply_ShellLife`, `supply_OperationalLife`, `supply_dateofSupply`, `supply_CreatedBy`, `supply_TimeStamp`) VALUES
(1, 1, '0001.', 1, 8, 4, '2017-02-01', 1, '2017-04-04 19:34:33'),
(2, 1, '0115', 2, 10, 2, '2017-02-01', 1, '2017-04-04 20:34:01'),
(3, 1, '123', 7, 4, 5, '2017-02-01', 1, '2017-04-04 20:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `Usr_Id` int(12) NOT NULL AUTO_INCREMENT,
  `Usr_Name` varchar(250) NOT NULL,
  `Usr_Role` int(1) NOT NULL,
  `Usr_Password` varchar(250) NOT NULL,
  `Usr_Email` varchar(300) NOT NULL,
  `Usr_Active` tinyint(1) NOT NULL DEFAULT '1',
  `Usr_CreatedBy` int(1) DEFAULT NULL,
  `Usr_TimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Usr_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`Usr_Id`, `Usr_Name`, `Usr_Role`, `Usr_Password`, `Usr_Email`, `Usr_Active`, `Usr_CreatedBy`, `Usr_TimeStamp`) VALUES
(1, 'squadron', 1, 'squadron', 'squadron@test.com', 1, NULL, '2017-04-01 17:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `Roles_Id` int(12) NOT NULL AUTO_INCREMENT,
  `Roles_Name` varchar(250) NOT NULL,
  `Roles_Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Roles_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`Roles_Id`, `Roles_Name`, `Roles_Status`) VALUES
(1, 'Squadron', 1),
(2, 'HANSA', 1),
(3, 'NDA', 1),
(4, 'HQNA', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
