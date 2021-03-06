-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 07:34 PM
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
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interestedin`
--

INSERT INTO `interestedin` (`username`, `sid`) VALUES
('Batman', 19);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(16) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `sid`) VALUES
('Batman', 17),
('starlord', 17);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`rid` int(11) NOT NULL,
  `reviewerusername` varchar(16) NOT NULL,
  `ownerusername` varchar(16) NOT NULL,
  `description` text NOT NULL,
  `score` int(11) NOT NULL,
  `sid` int(11) NOT NULL
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
  `name` varchar(80) NOT NULL,
  `location` varchar(46) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `ownerusername` varchar(16) NOT NULL,
  `photo` varchar(16) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `space`
--

INSERT INTO `space` (`sid`, `name`, `location`, `price`, `description`, `ownerusername`, `photo`, `score`) VALUES
(17, 'A test space', 'toronto', 600, 'It''s just a test, tbh', 'test', 'ipanema.jpg', 0),
(19, '80s Spaceship', 'The Galaxy', 1000, 'I''m hooked on a feeling', 'starlord', 'also me.jpg', 0);

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
-- Table structure for table `userreview`
--

CREATE TABLE IF NOT EXISTS `userreview` (
`urid` int(11) NOT NULL,
  `reviewerusername` varchar(46) NOT NULL,
  `reviewedusername` varchar(46) NOT NULL,
  `description` text NOT NULL,
  `score` int(11) NOT NULL
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first`, `last`, `age`, `occupation`, `photo`, `description`, `email`, `location`, `avescore`) VALUES
('Batman', 'gotham', 'Bruce', 'Wayne', NULL, NULL, NULL, NULL, 'batman@batcave.com', NULL, NULL),
('starlord', 'galaxy', 'Peter', 'Quill', 33, 'Legendary Outlaw', 'starlord.png', 'I have pelvic sorcery', 'starlord@galaxy.com', 'Space', NULL),
('test', 'test', 'Test', 'Testest', 21, 'Tester', 'clazzi cover.jpg', 'I am testing', 'test@test.ca', 'Toronto', NULL);

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
 ADD KEY `pid` (`username`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`username`,`sid`), ADD KEY `pid` (`username`,`sid`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`rid`), ADD KEY `reviewerid` (`reviewerusername`,`ownerusername`), ADD KEY `reviewedid` (`ownerusername`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `skilledin`
--
ALTER TABLE `skilledin`
 ADD KEY `pid` (`username`), ADD KEY `pid_2` (`username`);

--
-- Indexes for table `space`
--
ALTER TABLE `space`
 ADD PRIMARY KEY (`sid`), ADD KEY `ownerid` (`ownerusername`), ADD KEY `ownerid_2` (`ownerusername`), ADD KEY `sid` (`sid`), ADD KEY `sid_2` (`sid`), ADD KEY `sid_3` (`sid`);

--
-- Indexes for table `spaceprojects`
--
ALTER TABLE `spaceprojects`
 ADD KEY `sid` (`sid`);

--
-- Indexes for table `userreview`
--
ALTER TABLE `userreview`
 ADD PRIMARY KEY (`urid`), ADD KEY `reviewerusername` (`reviewerusername`,`reviewedusername`), ADD KEY `reviewedusername` (`reviewedusername`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `pid` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `space`
--
ALTER TABLE `space`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `userreview`
--
ALTER TABLE `userreview`
MODIFY `urid` int(11) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `interestedin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `interestedin_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `space` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ownerusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `space` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `userreview`
--
ALTER TABLE `userreview`
ADD CONSTRAINT `userreview_ibfk_1` FOREIGN KEY (`reviewerusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `userreview_ibfk_2` FOREIGN KEY (`reviewedusername`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
