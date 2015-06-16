-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2015 at 09:11 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `communitydashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `ID` int(11) NOT NULL,
  `KPA_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `key_performance_area`
--

CREATE TABLE `key_performance_area` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `key_performance_indicator`
--

CREATE TABLE `key_performance_indicator` (
  `ID` int(11) NOT NULL,
  `Goal_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metric`
--

CREATE TABLE `metric` (
  `ID` int(11) NOT NULL,
  `KPI_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Current` int(11) NOT NULL,
  `Target` int(11) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(200) NOT NULL,
  `Last_Name` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FK_KPA` (`KPA_ID`),
  ADD UNIQUE KEY `FK_UsernameGoal` (`User_ID`);

--
-- Indexes for table `key_performance_area`
--
ALTER TABLE `key_performance_area`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FK_User` (`User_ID`);

--
-- Indexes for table `key_performance_indicator`
--
ALTER TABLE `key_performance_indicator`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FK_Goal` (`Goal_ID`) USING BTREE,
  ADD UNIQUE KEY `FK_User` (`User_ID`);

--
-- Indexes for table `metric`
--
ALTER TABLE `metric`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FK_KPI` (`KPI_ID`),
  ADD UNIQUE KEY `FK_User` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `FK_UsernameGoal` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FK_KPA` FOREIGN KEY (`KPA_ID`) REFERENCES `key_performance_area` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `key_performance_area`
--
ALTER TABLE `key_performance_area`
  ADD CONSTRAINT `FK_UsernameKPA` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `key_performance_indicator`
--
ALTER TABLE `key_performance_indicator`
  ADD CONSTRAINT `FK_UsernameKPI` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FK_Goal` FOREIGN KEY (`Goal_ID`) REFERENCES `goal` (`ID`);

--
-- Constraints for table `metric`
--
ALTER TABLE `metric`
  ADD CONSTRAINT `FK_UsernameMetric` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FK_KPI` FOREIGN KEY (`KPI_ID`) REFERENCES `key_performance_indicator` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
