-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2015 at 12:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `categories`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brandID` int(11) NOT NULL,
  `brand` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandID`, `brand`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Alcatel'),
(4, 'Lenovo'),
(5, 'Asus'),
(6, 'Acer'),
(7, 'Motorola'),
(8, 'HTC'),
(9, 'Samsung'),
(10, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `model` text NOT NULL,
  `brandID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model`, `brandID`, `typeID`) VALUES
('One M8 (Gun Grey)', 8, 4),
('Supreme 12', 3, 4),
('6+ (White)', 10, 4),
('6 (White)', 10, 4),
('Compaq 6000 Pro Microtower', 1, 1),
('Optiplex GXL 5000', 2, 1),
('Compaq Presario 1000', 1, 1),
('Optiplex 2000', 2, 1),
('Galaxy S3 (Light Blue)', 9, 4),
('Galaxy S6 (White)', 9, 4),
('Razr', 7, 4),
('Razr M', 7, 4),
('Ultra Processor', 11, 98),
('iPhone 5s (White)', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `operatingsystems`
--

CREATE TABLE IF NOT EXISTS `operatingsystems` (
`osID` int(11) NOT NULL,
  `operatingsystem` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operatingsystems`
--

INSERT INTO `operatingsystems` (`osID`, `operatingsystem`) VALUES
(1, 'Windows XP'),
(2, 'Windows Vista'),
(3, 'Windows 7'),
(4, 'Windows 8'),
(5, 'Windows 10'),
(6, 'OSX Leopard'),
(7, 'OSX Snow Leopard'),
(8, 'OSX Lion'),
(9, 'OSX Mountain Lion'),
(10, 'OSX Yosemite'),
(11, 'Android'),
(12, 'iOS'),
(13, 'Ubuntu');

-- --------------------------------------------------------

--
-- Table structure for table `statustypes`
--

CREATE TABLE IF NOT EXISTS `statustypes` (
`statusID` int(11) NOT NULL,
  `status` text NOT NULL,
  `statusCount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statustypes`
--

INSERT INTO `statustypes` (`statusID`, `status`, `statusCount`) VALUES
(1, 'Ongoing', 0),
(2, 'Open', 0),
(3, 'Awaiting Pickup', 0),
(4, 'Awaiting Response', 0),
(5, 'Awaiting Parts', 0),
(6, 'Order Parts', 0),
(7, 'Need to Call', 0),
(8, 'Closed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickettypes`
--

CREATE TABLE IF NOT EXISTS `tickettypes` (
`typeID` int(11) NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickettypes`
--

INSERT INTO `tickettypes` (`typeID`, `type`, `description`) VALUES
(1, 'Hardware - Repair', 'Repair of malfunctioning hardware in a desktop, laptop, phone, or other device'),
(2, 'Hardware - Replace/Upgrade', 'Replacing/Upgrading hardware in a laptop or desktop'),
(4, 'Software - Upgrade', 'Upgrading to a newer version of an Operating System, or upgrading a piece of software already on the computer'),
(5, 'Software - Reinstallation', 'Reinstalling a piece of software on the computer or replacing the Operating System itself'),
(6, 'Refurbished Computer', '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`typeID` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `type`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Netbook'),
(4, 'Phone'),
(5, 'Tablet'),
(6, 'Server'),
(98, 'Video Card'),
(99, 'MISC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `operatingsystems`
--
ALTER TABLE `operatingsystems`
 ADD PRIMARY KEY (`osID`);

--
-- Indexes for table `statustypes`
--
ALTER TABLE `statustypes`
 ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `tickettypes`
--
ALTER TABLE `tickettypes`
 ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`typeID`), ADD UNIQUE KEY `typeID` (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `operatingsystems`
--
ALTER TABLE `operatingsystems`
MODIFY `osID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `statustypes`
--
ALTER TABLE `statustypes`
MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tickettypes`
--
ALTER TABLE `tickettypes`
MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerassets`
--

CREATE TABLE IF NOT EXISTS `customerassets` (
  `customerID` int(11) NOT NULL,
  `model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerassets`
--

INSERT INTO `customerassets` (`customerID`, `model`) VALUES
(2, 'One M8 (Gun Grey)'),
(2, 'Supreme 12'),
(2, 'Galaxy S3 (Light Blue)');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`primkey`, `nameFirst`, `nameLast`, `phoneNumber`, `streetAddress`, `city`, `state`, `ticketNumbers`) VALUES
(2, 'Drokota', 'Washok', '8155932961', '824 Greenbrier Road', 'DeKalb', 'IL', ''),
(4, 'Mcokaon', 'Ralfanoff', '8984557898', 'Killamanjaro avenue', 'DeKalb', 'IL', ''),
(5, 'Darrier', 'Rellfanof', '8537962243', '', '', '', ''),
(6, 'jimminy', 'cricket', '589978444', '', '', '', ''),
(7, 'George', 'Washington', '6666666666', 'cherry', 'tree', 'dekalb', ''),
(8, 'Abe', 'Lincoln', '8745895654', 'cherry', 'tree', 'il', ''),
(9, 'benjamin', 'button', '8889995555', '', '', '', ''),
(10, 'Ralfie', 'Hubler', '877 122 6545', '', '', '', ''),
(11, 'Ralphy', 'Crusty', '9999999999', 'robert lane', 'Dekalb', 'IL', '');

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
MODIFY `primkey` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;--
-- Database: `tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`ticketID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `ticketStatus` int(11) NOT NULL,
  `dateCreated` date NOT NULL,
  `rush` int(11) NOT NULL DEFAULT '0',
  `pickupdeliver` int(11) NOT NULL DEFAULT '0',
  `onsite` int(11) NOT NULL DEFAULT '0',
  `model` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `otheritems` int(11) NOT NULL,
  `problem` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`ticketID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
