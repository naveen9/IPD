-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2013 at 11:27 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `df_pages`
--

CREATE TABLE IF NOT EXISTS `df_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `link` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `df_pages`
--

INSERT INTO `df_pages` (`id`, `name`, `link`) VALUES
(1, 'Dashboard', 'dashboard.php'),
(2, 'Reception', 'ipd_visit.php'),
(3, 'IPD', 'visit_proc.php'),
(4, 'Pharmacy', 'medicine_list.php'),
(5, 'Diagnostics', 'create_lab_report.php'),
(6, 'Inventory', 'main_store.php'),
(7, 'Accounting', 'settle-visit.php'),
(8, 'Data Mx', 'doctors-list.php'),
(9, 'MIS', 'op-list.php'),
(10, 'Hosp_admin', 'hospital_register.php'),
(11, 'Med Record', '#'),
(12, 'Claims', 'patient-details.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
