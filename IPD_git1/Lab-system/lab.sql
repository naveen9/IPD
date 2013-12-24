-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 203.124.112.187
-- Generation Time: Nov 29, 2013 at 10:37 PM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `deepakshi`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `recp_id` double NOT NULL auto_increment,
  `p_name` varchar(20) NOT NULL,
  `cat` varchar(88) NOT NULL,
  `result` longtext NOT NULL,
  `img` varchar(88) NOT NULL,
  `date_of_test` date NOT NULL,
  `date_of_report` date NOT NULL,
  PRIMARY KEY  (`recp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lab`
--

