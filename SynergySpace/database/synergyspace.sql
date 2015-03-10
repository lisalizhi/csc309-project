-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2015 at 05:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `synergyspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendswith`
--

CREATE TABLE IF NOT EXISTS `friendswith` (
  `username1` varchar(16) NOT NULL,
  `username2` varchar(16) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interestedin`
--

CREATE TABLE IF NOT EXISTS `interestedin` (
  `username` varchar(16) NOT NULL,
  `projectName` varchar(46) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(16) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `rid` int(11) NOT NULL,
  `reviewerusername` varchar(16) NOT NULL,
  `ownerusername` varchar(16) NOT NULL,
  `description` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skilledin`
--

CREATE TABLE IF NOT EXISTS `skilledin` (
  `username` varchar(16) NOT NULL,
  `skill` varchar(46) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `space`
--

CREATE TABLE IF NOT EXISTS `space` (
`sid` int(11) NOT NULL,
  `location` varchar(46) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `ownerusername` varchar(16) NOT NULL,
  `photo` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spaceprojects`
--

CREATE TABLE IF NOT EXISTS `spaceprojects` (
  `sid` int(11) NOT NULL,
  `projectname` varchar(46) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `first` varchar(46) NOT NULL,
  `last` varchar(46) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(46) DEFAULT NULL,
  `photo` varchar(16) DEFAULT NULL,
  `description` text,
  `email` varchar(46) NOT NULL,
  `location` varchar(46) DEFAULT NULL,
  `avescore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendswith`
--
ALTER TABLE `friendswith`
 ADD KEY `pid1` (`username1`,`username2`,`sid`), ADD KEY `pid2` (`username2`,`sid`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `interestedin`
--
ALTER TABLE `interestedin`
 ADD KEY `pid` (`username`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD KEY `pid` (`username`,`sid`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`rid`), ADD KEY `reviewerid` (`reviewerusername`,`ownerusername`), ADD KEY `reviewedid` (`ownerusername`);

--
-- Indexes for table `skilledin`
--
ALTER TABLE `skilledin`
 ADD KEY `pid` (`username`), ADD KEY `pid_2` (`username`);

--
-- Indexes for table `space`
--
ALTER TABLE `space`
 ADD PRIMARY KEY (`sid`), ADD KEY `ownerid` (`ownerusername`), ADD KEY `ownerid_2` (`ownerusername`);

--
-- Indexes for table `spaceprojects`
--
ALTER TABLE `spaceprojects`
 ADD KEY `sid` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `pid` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `space`
--
ALTER TABLE `space`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendswith`
--
ALTER TABLE `friendswith`
ADD CONSTRAINT `friendswith_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `space` (`sid`),
ADD CONSTRAINT `friendswith_ibfk_4` FOREIGN KEY (`username1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `friendswith_ibfk_5` FOREIGN KEY (`username2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interestedin`
--
ALTER TABLE `interestedin`
ADD CONSTRAINT `interestedin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `space` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`reviewerusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ownerusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skilledin`
--
ALTER TABLE `skilledin`
ADD CONSTRAINT `skilledin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `space`
--
ALTER TABLE `space`
ADD CONSTRAINT `space_ibfk_1` FOREIGN KEY (`ownerusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spaceprojects`
--
ALTER TABLE `spaceprojects`
ADD CONSTRAINT `spaceprojects_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `space` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
