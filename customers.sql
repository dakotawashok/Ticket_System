-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 09:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`primkey` int(11) NOT NULL,
  `nameFirst` text NOT NULL,
  `nameLast` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `streetAddress` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `ticketNumbers` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`primkey`, `nameFirst`, `nameLast`, `phoneNumber`, `streetAddress`, `city`, `state`, `ticketNumbers`) VALUES
(1, 'Dakota', 'Washok', '8155932961', '', '', '', ''),
(2, 'Drokota', 'Washok', '8155932961', '824 Greenbrier Road', 'DeKalb', 'IL', ''),
(3, 'Nickolai', 'Putin', '8479532998', 'Vleningrad Road', 'Vleningrad', 'Russia', ''),
(4, 'Mcokaon', 'Ralfanoff', '8984557898', 'Killamanjaro avenue', 'DeKalb', 'IL', ''),
(5, 'Darrier', 'Rellfanof', '8537962243', '', '', '', ''),
(6, 'jimminy', 'cricket', '589978444', '', '', '', ''),
(7, 'George', 'Washington', '6666666666', 'cherry', 'tree', 'dekalb', ''),
(8, 'Abe', 'Lincoln', '8745895654', 'cherry', 'tree', 'il', ''),
(9, 'benjamin', 'button', '8889995555', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`primkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
MODIFY `primkey` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
