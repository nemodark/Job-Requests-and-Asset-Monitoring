-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2014 at 03:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datatable`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `cost` float NOT NULL,
  `price` float NOT NULL,
  `critical_level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `category`, `cost`, `price`, `critical_level`) VALUES
(1, 'Samsung Galaxy Golden', 'Samsung', 4000, 43000, 5),
(2, 'Samsung Galaxy S5', 'Samsung', 32000, 33000, 5),
(3, 'Samsung Galaxy S3 I9300 32GB', 'Samsung', 25000, 26000, 5),
(4, ' Samsung Galaxy Note 3', 'Samsung', 33000, 34000, 5),
(5, ' Samsung Galaxy K Zoom', 'Samsung', 29000, 30000, 5),
(6, ' Samsung Galaxy Note', 'Samsung', 22500, 23000, 5),
(7, 'Samsung Galaxy S2 I9100', 'Samsung', 27600, 28200, 5),
(8, 'Samsung Galaxy Note 3 Neo', 'Samsung', 26000, 27000, 5),
(9, ' Samsung Galaxy S4', 'Samsung', 25500, 26000, 3),
(10, 'Samsung Galaxy Mega 6.3 I9200', 'Samsung', 25487, 26400, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
