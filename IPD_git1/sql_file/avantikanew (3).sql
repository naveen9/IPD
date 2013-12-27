-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2013 at 01:07 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avantikanew`
--
CREATE DATABASE IF NOT EXISTS `avantikanew` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `avantikanew`;

-- --------------------------------------------------------

--
-- Table structure for table `cancle_bills`
--

CREATE TABLE IF NOT EXISTS `cancle_bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_id` int(11) NOT NULL,
  `procedure_name` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `ipid` int(11) NOT NULL,
  `patient_name` varchar(55) NOT NULL,
  `dep` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cancle_bills`
--

INSERT INTO `cancle_bills` (`id`, `procedure_id`, `procedure_name`, `amount`, `bill_id`, `ipid`, `patient_name`, `dep`) VALUES
(1, 18, 'blood test                                             ', 1000, 56, 3, 'reena ray                                              ', 'opdi'),
(2, 4, 'blood test                                             ', 5000, 98, 6, 'uttra                                                  ', 'otb'),
(3, 24, 'blood test                                             ', 1000, 99, 3, 'reena ray                                              ', 'opdi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
