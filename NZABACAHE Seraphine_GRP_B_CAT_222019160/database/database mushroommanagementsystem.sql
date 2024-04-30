-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2024 at 01:06 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mushroommanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountcreation`
--

CREATE TABLE IF NOT EXISTS `accountcreation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(120) NOT NULL,
  `email` varchar(140) NOT NULL,
  `age` int(8) NOT NULL,
  `username` varchar(200) NOT NULL,
  `usertype` varchar(170) NOT NULL,
  `password` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `accountcreation`
--

INSERT INTO `accountcreation` (`id`, `fullname`, `address`, `email`, `age`, `username`, `usertype`, `password`) VALUES
(1, 'serafina', 'muhanga', 'sera@gmail.com', 23, 'sese', 'admin', '123'),
(2, 'nzabacahe', 'kamonyi', 'nza@gmail.com', 57, 'nzanza', 'mnbv', '12345'),
(3, 'nzabacahe', 'kamonyi', 'sera@gmail.com', 23, 'sera', 'admin', '1234'),
(12, 'ad', 'kgl', 'er@gmail.com', 23, 'fat', 'manager', '3245');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(110) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(220) NOT NULL,
  `password` varchar(210) NOT NULL,
  `gender` varchar(43) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `phone`, `email`, `username`, `password`, `gender`) VALUES
(17, 'ange', '0788845670', 'mine1@gmail.com', 'sese', '1222', 'Female'),
(18, 'ange', '0725076859', 'nzaseraphine12@gmail.com', 'sese', '1222', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(1) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(230) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salary` int(20) NOT NULL,
  `position` varchar(198) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `telephone`, `email`, `salary`, `position`) VALUES
(1, 'agnes', '780547013', 'ag@gmail.com', 500, 'admin'),
(2, 'nickita', '0785463666', 'neck@gmail.com', 6700000, 'user'),
(3, 'ange', 'an@gmail.com', '078976543', 23456, 'asdfghj'),
(7, 'kjuyt', 'mjhgfd', '098765', 123456, 'mjhtr'),
(11, 'veve', '725573438', 've@gmail.com', 45000, 'admin'),
(12, 'asdfgh', 'asdfghj', '0987654', 23456, 'asdfgh'),
(13, 'seraphine', 'sd@gmail.com', '0987654', 234567, 'admin'),
(14, 'keza', '0790010170', 'mine1@gmail.com', 345000, 'admin'),
(15, 'keza', '0790010170', 'nzaseraphine12@gmail.com', 60000, 'manager'),
(16, 'aimme', '0788889644', 'nzaseraphine12@gmail.com', 60000, 'manager'),
(17, 'keza', '0790010170', 'nzaseraphine12@gmail.com', 345000, 'manager'),
(18, 'aimme', '0788889644', 'aime@gmail.com', 60000, 'manager'),
(19, 'aimme', '0788889644', 'aime@gmail.com', 60000, 'manager'),
(20, 'aimme', '0790010170', 'aime@gmail.com', 60000, 'manager'),
(21, 'aimme', '0790010170', 'mine1@gmail.com', 345000, 'manager'),
(22, 'aimme', '0788889644', 'nzaseraphine12@gmail.com', 345000, 'admin'),
(23, 'aimme', '0790010170', 'nzaseraphine12@gmail.com', 345000, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE IF NOT EXISTS `harvest` (
  `harvest_id` int(12) NOT NULL AUTO_INCREMENT,
  `harvest_name` varchar(200) NOT NULL,
  `quantity` int(18) NOT NULL,
  `unit_price` int(12) NOT NULL,
  `total_price` int(16) NOT NULL,
  `mushroom_id` int(12) NOT NULL,
  PRIMARY KEY (`harvest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `harvest`
--

INSERT INTO `harvest` (`harvest_id`, `harvest_name`, `quantity`, `unit_price`, `total_price`, `mushroom_id`) VALUES
(1, 'bello', 670, 500, 2300, 3),
(3, 'imegeri', 9876, 7000, 98765, 6789),
(12, 'portbello', 43, 70, 4000, 15),
(13, 'ibyobo', 21, 200, 400, 4),
(14, 'ibiyege', 34, 200, 4500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mushroom`
--

CREATE TABLE IF NOT EXISTS `mushroom` (
  `mushroom_id` int(12) NOT NULL AUTO_INCREMENT,
  `mushroom_name` varchar(255) NOT NULL,
  `description` varchar(68) NOT NULL,
  `quantity` int(12) NOT NULL,
  `unit_price` int(12) NOT NULL,
  `total_price` int(21) NOT NULL,
  PRIMARY KEY (`mushroom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `mushroom`
--

INSERT INTO `mushroom` (`mushroom_id`, `mushroom_name`, `description`, `quantity`, `unit_price`, `total_price`) VALUES
(1, 'asdfgh', 'asdf', 123, 3456, 6789),
(4, 'agnes', 'imegeri', 430, 2345, 23456),
(12, 'sese', 'ibiyege', 23, 500, 650),
(13, 'portibelo', 'imegeri', 34, 0, 0),
(14, 'portibelo', 'imegeri', 34, 0, 0),
(15, 'portibelo', 'imegeri', 34, 0, 0),
(16, 'portibelo', 'imegeri', 34, 0, 0),
(17, 'portibelo', 'imegeri', 34, 0, 0),
(18, 'portibelo', 'imegeri', 23, 0, 0),
(19, 'portibelo', 'imegeri', 34, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(12) NOT NULL AUTO_INCREMENT,
  `sales_name` varchar(200) NOT NULL,
  `quantity` int(18) NOT NULL,
  `total_price` int(12) NOT NULL,
  `mushroom_id` int(16) NOT NULL,
  `customer_id` int(12) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_name`, `quantity`, `total_price`, `mushroom_id`, `customer_id`) VALUES
(1, 'imegeri', 34, 5000, 3, 2),
(21, 'emma', 43, 3400, 21336, 4300),
(23, 'ertrty', 234, 234567, 45678, 87654);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(89) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `activation_code` varchar(67) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `phone`, `email`, `gender`, `password`, `created_date`, `activation_code`) VALUES
(1, 'well', '0786655321', 'ves@gmail.com', 'female', '', '2024-04-19', '23'),
(2, 'sese', '0788845670', 'nzaseraphine12@gmail.com', 'female', '122', '2024-04-19', '22222'),
(3, 'ganza', '0725076859', 'nzaseraphine12@gmail.com', 'male', '111', '2024-04-19', '234'),
(4, 'vestine', '078654321', 'mine1@gmail.com', 'female', '1222', '2024-04-19', '55'),
(5, 'vestine', '0788845670', 'mine1@gmail.com', 'female', '1222', '2024-04-21', '22222'),
(6, 'sese', '0725076859', 'aime@gmail.com', 'female', '1234', '2024-04-22', '22222'),
(7, 'sese', '0788845670', 'mine1@gmail.com', 'female', '1234', '2024-04-23', '22222'),
(8, 'sese', '0788845670', 'mine1@gmail.com', 'female', '1234', '2024-04-24', '234'),
(9, 'ganza', '0788845670', 'mine1@gmail.com', 'female', '1234', '2024-04-25', '22222'),
(10, 'vestine', '0786655321', 'mine1@gmail.com', 'female', '1222', '2024-04-25', '22222'),
(11, 'vestine', '0725076859', 'aime@gmail.com', 'female', '1234', '2024-04-29', '22222'),
(12, 'sese', '0725076859', 'seraphinenza@gmail.com', 'female', '12345', '2024-04-29', '22222');
