-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2015 at 04:56 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dressrecord`
--

CREATE TABLE IF NOT EXISTS `dressrecord` (
  `dressid` int(11) NOT NULL,
  `dressname` varchar(50) NOT NULL,
  `dresssize` decimal(9,2) NOT NULL,
  `dresstype` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `imgname` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dressrecord`
--

INSERT INTO `dressrecord` (`dressid`, `dressname`, `dresssize`, `dresstype`, `status`, `price`, `qty`, `imgname`) VALUES
(24, 'BNY', '12.00', 'sayal', 1, '1500', 18, 'img-thing.jpg'),
(25, 'Jag', '5.00', 'tshirt', 1, '1400', 18, 'untitled.png'),
(26, 'Quenny Dress', '23.00', 'sando', 1, '34343434', 10, 't473kellygreen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseddress`
--

CREATE TABLE IF NOT EXISTS `purchaseddress` (
  `purid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dressid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseddress`
--

INSERT INTO `purchaseddress` (`purid`, `userid`, `dressid`, `status`, `qty`) VALUES
(1, 3, 25, 1, 2),
(2, 3, 26, 1, 2),
(3, 3, 24, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `roles` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `firstname`, `lastname`, `roles`, `active`) VALUES
(1, 'rexus', '1234', 'Lourence Rex', ',Traya', 1, 1),
(2, 'traya', 'lourence', 'Rexus Traya', ',Traya', 2, 1),
(3, 'hola', 'hola', 'Rasmos', 'Lerdof', 2, 1),
(5, 'rexus', 'rexustraya', 'Rexus', 'Traya', 2, 1),
(6, 'shayne', 'shayne', 'sdfs', 'sdfsd', 2, 0),
(8, 'rex', 'traya', 'Lourence Rex B.', 'Traya', 2, 1),
(9, 'claudine', '1234', 'claudine', 'daclison', 2, 1),
(10, 'mariano', 'mariano', 'Jhon Rex', 'Mariano', 2, 1),
(13, 'darah', 'bless', 'Darah Bless', 'Toreno', 2, 1),
(14, 'jade', 'jade', 'Jade Louriene', 'Traya', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dressrecord`
--
ALTER TABLE `dressrecord`
  ADD PRIMARY KEY (`dressid`);

--
-- Indexes for table `purchaseddress`
--
ALTER TABLE `purchaseddress`
  ADD PRIMARY KEY (`purid`),
  ADD KEY `dressid` (`dressid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dressrecord`
--
ALTER TABLE `dressrecord`
  MODIFY `dressid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `purchaseddress`
--
ALTER TABLE `purchaseddress`
  MODIFY `purid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchaseddress`
--
ALTER TABLE `purchaseddress`
  ADD CONSTRAINT `purchaseddress_ibfk_1` FOREIGN KEY (`dressid`) REFERENCES `dressrecord` (`dressid`),
  ADD CONSTRAINT `purchaseddress_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
