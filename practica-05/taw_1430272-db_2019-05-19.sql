-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2019 at 10:05 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.0-dev

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taw_1430272`
--

-- --------------------------------------------------------

--
-- Table structure for table `practica_05_productos`
--

CREATE TABLE `practica_05_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `practica_05_productos`
--

INSERT INTO `practica_05_productos` (`id`, `nombre`, `precio`) VALUES
(1, 'Jeans', '240'),
(2, 'playeras rojas', '70'),
(3, 'playeras azules', '90'),
(4, 'sueter', '160'),
(5, 'medias', '40'),
(6, 'algo', '5');

-- --------------------------------------------------------

--
-- Table structure for table `practica_05_users`
--

CREATE TABLE `practica_05_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `practica_05_users`
--

INSERT INTO `practica_05_users` (`id`, `username`, `fullname`, `password`, `created_at`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '2019-05-19 09:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `practica_05_ventas`
--

CREATE TABLE `practica_05_ventas` (
  `venta_id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`venta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `practica_05_ventas`
--

INSERT INTO `practica_05_ventas` (`venta_id`, `producto_id`, `cantidad`, `fecha`) VALUES
(1, 1, 6, '2019-05-16'),
(2, 2, 8, '2019-05-16'),
(3, 3, 4, '2019-05-16'),
(4, 4, 6, '2019-05-16'),
(5, 5, 9, '2019-05-15'),
(6, 6, 3, '2019-05-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
