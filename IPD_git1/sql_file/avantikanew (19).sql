-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 07:21 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

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
-- Table structure for table `abortion`
--

CREATE TABLE IF NOT EXISTS `abortion` (
  `a_id` int(12) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) NOT NULL,
  `age` int(20) NOT NULL,
  `add` varchar(200) NOT NULL,
  `type_of_ab` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `beds_master_table`
--

CREATE TABLE IF NOT EXISTS `beds_master_table` (
  `bed_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_bed` varchar(11) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT '0',
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`bed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `beds_master_table`
--

INSERT INTO `beds_master_table` (`bed_id`, `no_of_bed`, `availability`, `p_id`) VALUES
(1, 'ground 1', 1, 1),
(2, 'ground 2', 1, 2),
(3, 'ground 3', 0, 0),
(4, 'ground 4', 1, 3),
(5, 'first 1', 0, 0),
(6, 'first 2', 1, 5),
(7, 'first 3', 1, 4),
(8, 'first 4', 1, 6),
(9, 'second 21', 0, 0),
(10, 'second 22', 0, 0),
(11, 'second 23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `beneficairy_payment`
--

CREATE TABLE IF NOT EXISTS `beneficairy_payment` (
  `bp_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `procedure_name` varchar(100) NOT NULL,
  `proc_id` int(11) NOT NULL,
  `doctor_incharge` varchar(100) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `deduction` double NOT NULL,
  `share` double NOT NULL,
  `tds` double NOT NULL,
  `doc_amount` int(200) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `check` varchar(12) NOT NULL,
  `verified` varchar(12) NOT NULL,
  PRIMARY KEY (`bp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `beneficairy_payment`
--

INSERT INTO `beneficairy_payment` (`bp_id`, `visit_id`, `patient_name`, `bill_id`, `procedure_name`, `proc_id`, `doctor_incharge`, `amount`, `date`, `deduction`, `share`, `tds`, `doc_amount`, `remarks`, `check`, `verified`) VALUES
(1, 4, 'uttra', 17, 'blood test', 1, 'DR. R.K. nag', 250, '2013-12-19', 0, 0, 0, 0, '', '', ''),
(2, 5, 'Suzane khan', 49, 'blood test', 1, 'DR. R.K. nag', 2500, '2013-12-20', 0, 0, 0, 0, '', '', ''),
(7, 3, 'reena ray', 18, 'blood test', 1, 'DR. R.K. nag', 1000, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(12, 4, 'rajveer', 23, 'blood test', 7, 'DR. R.K. nag', 200, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(13, 3, 'reena ray', 24, 'blood test', 8, 'DR. R.K. nag', 250, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(22, 4, 'rajveer', 32, 'blood test', 17, 'DR. R.K. nag', 250, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(23, 3, 'reena ray', 56, 'blood test', 1, 'DR. R.K. nag', 1000, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(24, 3, 'reena ray', 92, 'blood test', 3, 'DR. R.K. nag', 1000, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(25, 3, 'reena ray', 94, 'blood test', 3, 'DR james ford', 1000, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(26, 3, 'reena ray', 94, 'YFJYGYU', 3, 'DR james ford', 3600, '2013-12-21', 0, 0, 0, 0, '', '', ''),
(27, 4, 'rajveer', 95, 'blood test', 1, 'DR james ford', 2000, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(28, 4, 'rajveer', 95, 'IUYTRE', 1, 'DR james ford', 0, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(29, 1, 'ekta', 97, 'kjhgfd', 2, 'DR. R.K. nag', 3000, '2013-12-23', 0, 0, 0, 0, '', '', ''),
(30, 6, 'uttra', 98, 'blood test', 4, 'DR manoj kumar', 5000, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(31, 3, 'reena ray', 99, 'blood test', 24, 'DR. R.K. nag', 1000, '2013-12-23', 0, 0, 0, 0, '', '', ''),
(32, 1, 'ekta', 100, 'iuytre', 2, 'DR manoj kumar', 3000, '2013-12-22', 0, 0, 0, 0, '', '', ''),
(33, 3, 'reena ray', 102, 'blood test', 1, 'DR. R.K. nag', 2500, '2013-12-24', 0, 0, 0, 0, '', '', ''),
(34, 1, 'ekta', 103, 'blood test', 2, 'DR james ford', 3000, '2013-12-25', 0, 0, 0, 0, '', '', ''),
(35, 4, 'rajveer', 107, 'blood test12', 26, 'DR james ford', 2000, '2013-12-24', 0, 0, 0, 0, '', '', ''),
(36, 4, 'rajveer', 107, 'blood test13', 27, 'DR manoj kumar', 200, '2013-12-24', 0, 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing_cat`
--

CREATE TABLE IF NOT EXISTS `billing_cat` (
  `bill_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`bill_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE IF NOT EXISTS `birth` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_no` int(20) DEFAULT NULL,
  `mother_name` varchar(100) NOT NULL,
  `type_of_birth` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `consul_id` int(11) NOT NULL AUTO_INCREMENT,
  `consul_name` varchar(100) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`consul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `consumable`
--

CREATE TABLE IF NOT EXISTS `consumable` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` double NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `bed_no` double NOT NULL,
  `m_nam` varchar(80) NOT NULL,
  `m_rate` double NOT NULL,
  `m_q` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `grand_total` double NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE IF NOT EXISTS `corporate` (
  `corp_id` int(11) NOT NULL AUTO_INCREMENT,
  `corp_name` varchar(60) NOT NULL,
  PRIMARY KEY (`corp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`corp_id`, `corp_name`) VALUES
(1, 'icc'),
(2, 'Icici sector110');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE IF NOT EXISTS `death` (
  `d_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `add` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `cause` varchar(400) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `discharge_table`
--

CREATE TABLE IF NOT EXISTS `discharge_table` (
  `disc_id` int(12) NOT NULL AUTO_INCREMENT,
  `p_id` int(12) NOT NULL,
  `v_id` int(12) NOT NULL,
  `disc_date` date NOT NULL,
  `disc_time` varchar(20) NOT NULL,
  PRIMARY KEY (`disc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_billing`
--

CREATE TABLE IF NOT EXISTS `doctor_billing` (
  `dbid` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(100) NOT NULL,
  `doc_bill_cat` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`dbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_temp_table`
--

CREATE TABLE IF NOT EXISTS `doctor_temp_table` (
  `doc_id` int(15) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(60) NOT NULL,
  `doc_mob` double NOT NULL,
  `doc_email` varchar(50) DEFAULT NULL,
  `doc_gender` char(1) NOT NULL,
  `doc_dob` date NOT NULL,
  `doc_address` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) NOT NULL,
  `varified` varchar(4) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `deegre` varchar(255) NOT NULL,
  `opd_time` varchar(20) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_master_table`
--

CREATE TABLE IF NOT EXISTS `doc_master_table` (
  `doc_id` int(15) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(60) NOT NULL,
  `doc_mob` double NOT NULL,
  `doc_email` varchar(50) DEFAULT NULL,
  `doc_gender` char(1) NOT NULL,
  `doc_dob` date NOT NULL,
  `doc_address` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) NOT NULL,
  `varified` varchar(4) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `deegre` varchar(255) NOT NULL,
  `opd_time` varchar(20) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `doc_master_table`
--

INSERT INTO `doc_master_table` (`doc_id`, `doc_name`, `doc_mob`, `doc_email`, `doc_gender`, `doc_dob`, `doc_address`, `specialization`, `varified`, `pan`, `deegre`, `opd_time`) VALUES
(1, 'DR. R.K. nag', 45851274520, '', 'm', '0000-00-00', '  ', '', 'yes', 'PN68765FD', '', ''),
(2, 'DR james ford', 15346532.5, '', 'm', '0000-00-00', '  ', '', 'yes', '', '', ''),
(3, 'DR manoj kumar', 145321545, '', 'm', '0000-00-00', '  ', '', 'yes', '', '', ''),
(4, 'DR. Diviya chaudhary', 125456465, '', 'm', '0000-00-00', '  ', '', 'yes', '', '', ''),
(5, 'DR jack', 54854545, '', 'm', '0000-00-00', '  ', '', 'yes', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doc_payment`
--

CREATE TABLE IF NOT EXISTS `doc_payment` (
  `se.no.` int(200) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(200) NOT NULL,
  `total_payment` int(200) NOT NULL,
  `tds` int(200) NOT NULL,
  `total_tds` int(200) NOT NULL,
  `due_payment` int(200) NOT NULL,
  `current_payment` int(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `months_payment` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`se.no.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_payment_details`
--

CREATE TABLE IF NOT EXISTS `doc_payment_details` (
  `s.no` int(100) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(200) NOT NULL,
  `paid_amount` int(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `month` date NOT NULL,
  `due` int(200) NOT NULL,
  `total_payment` int(200) NOT NULL,
  `total_tds` int(200) NOT NULL,
  PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE IF NOT EXISTS `dummy` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `Proc_id` varchar(11) NOT NULL,
  `Doctor` varchar(100) NOT NULL,
  `Patient_name` varchar(100) NOT NULL,
  `Visit_id` varchar(50) NOT NULL,
  `Bill_id` varchar(100) NOT NULL,
  `Proc_name` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `table_type` varchar(200) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `duty_roster`
--

CREATE TABLE IF NOT EXISTS `duty_roster` (
  `duty_id` int(11) NOT NULL AUTO_INCREMENT,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL,
  `Status` tinyint(20) NOT NULL,
  PRIMARY KEY (`duty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `duty_roster`
--

INSERT INTO `duty_roster` (`duty_id`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `Status`) VALUES
(2, '2013-12-20', '08:00:00', '2013-12-23', '21:00:00', 1),
(3, '2013-12-24', '08:00:00', '2013-12-24', '20:00:00', 1),
(4, '2013-12-22', '08:00:00', '2013-12-26', '21:00:00', 1),
(5, '2013-12-20', '01:00:00', '2013-12-25', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `earning_group`
--

CREATE TABLE IF NOT EXISTS `earning_group` (
  `s_no` int(200) NOT NULL AUTO_INCREMENT,
  `ear_group_id` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `earning_table`
--

CREATE TABLE IF NOT EXISTS `earning_table` (
  `ear_no` int(200) NOT NULL AUTO_INCREMENT,
  `ear_name` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ear_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `emp_id` int(200) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(200) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `add` varchar(200) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` int(200) NOT NULL,
  `emp_mobile` int(12) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`emp_id`, `emp_name`, `age`, `gender`, `add`, `email_id`, `position`, `salary`, `emp_mobile`, `date`) VALUES
(1, 'neetu', '24', 'F', 'fe', 'neetu@gmail.com', 'category', 25000, 1212121212, '2013-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `emp_designation`
--

CREATE TABLE IF NOT EXISTS `emp_designation` (
  `s.no` int(200) NOT NULL AUTO_INCREMENT,
  `designation` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`s.no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `s.no.` int(100) NOT NULL AUTO_INCREMENT,
  `emp_id` int(100) NOT NULL,
  `payday` int(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `tds` int(100) NOT NULL,
  `tds_amount` int(200) NOT NULL,
  `medicelam` int(100) NOT NULL,
  `medcl_amount` int(200) NOT NULL,
  `ppf` int(100) NOT NULL,
  `ppf_amount` int(200) NOT NULL,
  `hra` int(100) NOT NULL,
  `hra_amount` int(200) NOT NULL,
  `other_details` varchar(1000) NOT NULL,
  `other_per` int(200) NOT NULL,
  `other_amount` int(100) NOT NULL,
  `final_amount` int(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `due` int(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`s.no.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_group`
--

CREATE TABLE IF NOT EXISTS `expenditure_group` (
  `s_no` int(200) NOT NULL AUTO_INCREMENT,
  `exp_group_id` int(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_table`
--

CREATE TABLE IF NOT EXISTS `expenditure_table` (
  `exp_id` int(200) NOT NULL AUTO_INCREMENT,
  `exp_name` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_info`
--

CREATE TABLE IF NOT EXISTS `hospitals_info` (
  `hospital_name` varchar(40) NOT NULL,
  `hospital_add` varchar(40) NOT NULL,
  `hospital_email` varchar(40) NOT NULL,
  `hospital_helpline` int(40) NOT NULL,
  `hospital_fax` int(40) NOT NULL,
  `reception_no` varchar(100) NOT NULL,
  `ambulance_no` varchar(100) NOT NULL,
  `emergency_no` varchar(100) NOT NULL,
  `logo_path` varchar(200) NOT NULL,
  `img_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals_info`
--

INSERT INTO `hospitals_info` (`hospital_name`, `hospital_add`, `hospital_email`, `hospital_helpline`, `hospital_fax`, `reception_no`, `ambulance_no`, `emergency_no`, `logo_path`, `img_path`) VALUES
('Jagdamba hospital', 'Noida,UP', 'jagdamba@gmail.com', 768456378, 78999, '852369', '789', '1234', 'img/images (2).jpg', 'img/hospital (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_store`
--

CREATE TABLE IF NOT EXISTS `inventory_store` (
  `in_id` int(200) NOT NULL AUTO_INCREMENT,
  `in_name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `unit price` int(200) NOT NULL,
  `mrp` int(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `ex_date` varchar(200) NOT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inventory_store`
--

INSERT INTO `inventory_store` (`in_id`, `in_name`, `type`, `unit price`, `mrp`, `quantity`, `ex_date`) VALUES
(1, 'crocin', 'Fixed', 48, 1100, '15', '12-2015');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_admit`
--

CREATE TABLE IF NOT EXISTS `ipd_admit` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(40) NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_gender` varchar(6) NOT NULL,
  `doa` date NOT NULL,
  `p_mob` double NOT NULL,
  `ref_dr` varchar(30) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `advance_pay` double NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `recp_id` double NOT NULL AUTO_INCREMENT,
  `p_name` varchar(20) NOT NULL,
  `cat` varchar(88) NOT NULL,
  `result` longtext NOT NULL,
  `img` varchar(88) NOT NULL,
  `date_of_test` date NOT NULL,
  `date_of_report` date NOT NULL,
  PRIMARY KEY (`recp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ligatain`
--

CREATE TABLE IF NOT EXISTS `ligatain` (
  `l_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `add` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE IF NOT EXISTS `medical_record` (
  `med_id` int(200) NOT NULL AUTO_INCREMENT,
  `p_id` int(200) NOT NULL,
  `v_id` int(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `record_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`med_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_store`
--

CREATE TABLE IF NOT EXISTS `medicine_store` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(20) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `mrp` double NOT NULL,
  `unit_mrp` float DEFAULT NULL,
  `pack` int(10) NOT NULL,
  `quantity` int(200) NOT NULL,
  `expiry_date` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medicine_store`
--

INSERT INTO `medicine_store` (`m_id`, `m_name`, `batch_no`, `mrp`, `unit_mrp`, `pack`, `quantity`, `expiry_date`) VALUES
(2, 'parecenamol', 'ddrdhgvf2145gh', 40, 4, 10, 356, '12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `miner_ot_store`
--

CREATE TABLE IF NOT EXISTS `miner_ot_store` (
  `mi_id` int(200) NOT NULL AUTO_INCREMENT,
  `incharge_name` varchar(200) NOT NULL,
  `i_name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `ex_date` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  PRIMARY KEY (`mi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlc`
--

CREATE TABLE IF NOT EXISTS `mlc` (
  `m_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `add` varchar(200) NOT NULL,
  `cause` varchar(400) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mydocs`
--

CREATE TABLE IF NOT EXISTS `mydocs` (
  `my_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(20) NOT NULL,
  `v_id` int(20) NOT NULL,
  `saved` varchar(40) NOT NULL,
  `imgname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `imgdate` varchar(40) NOT NULL,
  `cusernmae` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`my_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opd_bill`
--

CREATE TABLE IF NOT EXISTS `opd_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `grand_total` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `dis_remarks` text,
  `status` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `trans_details` longtext,
  `organization` varchar(255) DEFAULT NULL,
  `grand_discount` double DEFAULT NULL,
  `billeddate` date DEFAULT NULL,
  `billedtime` time DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `proc_status` int(11) DEFAULT NULL,
  `reception` varchar(40) NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `FK_opd_bill_1` (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `opd_bill`
--

INSERT INTO `opd_bill` (`bill_id`, `grand_total`, `due_amount`, `paid_amount`, `dis_remarks`, `status`, `payment_mode`, `trans_details`, `organization`, `grand_discount`, `billeddate`, `billedtime`, `visit_id`, `proc_status`, `reception`) VALUES
(1, NULL, -2000, 2000, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-11', '14:10:30', 1, 1, 'sheena'),
(5, NULL, -2000, 2000, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-21', '06:27:57', 2, 1, 'sheena'),
(6, NULL, -11400, 11400, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-21', '06:30:59', 3, 1, 'sheena'),
(8, NULL, -20000, 20000, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-18', '07:20:43', 4, 1, 'sheena'),
(9, NULL, -11400, 11400, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-22', '07:21:49', 5, 1, 'sheena'),
(10, NULL, -20000, 20000, '', 'unpaid', 'cash', '', NULL, 0, '2013-12-21', '07:22:54', 6, 1, 'sheena'),
(98, 5000, 5000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, 'sheena'),
(99, 1000, 1000, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-23', '17:41:29', 3, 1, 'sheena'),
(100, 3000, 3000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-12-22', '17:48:03', 1, 1, 'sheena'),
(101, 40, 40, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-23', '17:49:26', 3, 0, ''),
(102, 2500, 2500, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-24', '14:59:08', 3, 1, 'mac'),
(103, 3000, 3000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-12-25', '15:00:06', 1, 1, 'mac'),
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, ''),
(105, 20, 20, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-24', '15:11:33', 3, 0, ''),
(106, 16, 0, 16, NULL, 'paid', NULL, NULL, NULL, NULL, '2013-12-24', '15:13:43', 4, 0, ''),
(107, 2200, 2200, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-24', '15:24:12', 4, 1, 'sheena'),
(108, 20, 20, NULL, NULL, 'unpaid', NULL, NULL, NULL, NULL, '2013-12-24', '16:41:49', 3, 1, 'sheena');

-- --------------------------------------------------------

--
-- Table structure for table `opd_items`
--

CREATE TABLE IF NOT EXISTS `opd_items` (
  `proc_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `proc_name` varchar(255) NOT NULL,
  `doc_incharge` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `discount` double NOT NULL,
  `taxrate` double NOT NULL,
  `total` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `proc_status` varchar(11) NOT NULL,
  `reception` varchar(40) NOT NULL,
  PRIMARY KEY (`proc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `opd_items`
--

INSERT INTO `opd_items` (`proc_id`, `visit_id`, `bill_id`, `proc_name`, `doc_incharge`, `amount`, `discount`, `taxrate`, `total`, `date`, `time`, `proc_status`, `reception`) VALUES
(1, 1, 2, 'blood test', 'DR. R.K. nag', 300, 0, 0, 300, '2013-12-20', '18:42:02', '1', 'sheena'),
(7, 4, 23, 'blood test', 'DR. R.K. nag', 200, 0, 0, 200, '2013-12-21', '12:42:07', '1', 'sheena'),
(8, 3, 24, 'blood test', 'DR. R.K. nag', 250, 0, 0, 250, '2013-12-21', '12:43:48', '1', 'sheena'),
(17, 4, 32, 'blood test', 'DR. R.K. nag', 250, 0, 0, 250, '2013-12-21', '13:11:57', '1', 'sheena'),
(18, 3, 56, 'blood test', 'DR. R.K. nag', 1000, 0, 0, 1000, '2013-12-22', '19:09:27', '1', 'sheena'),
(24, 3, 99, 'blood test', 'DR. R.K. nag', 1000, 0, 0, 1000, '2013-12-23', '17:41:25', '1', 'sheena'),
(25, 3, 102, 'blood test', 'DR. R.K. nag', 2500, 0, 0, 2500, '2013-12-24', '14:59:06', '1', 'mac'),
(26, 4, 107, 'blood test12', 'DR james ford', 2000, 0, 0, 2000, '2013-12-24', '15:21:29', '1', 'sheena'),
(27, 4, 107, 'blood test13', 'DR manoj kumar', 200, 0, 0, 200, '2013-12-24', '15:24:05', '1', 'sheena');

-- --------------------------------------------------------

--
-- Table structure for table `opd_recpt`
--

CREATE TABLE IF NOT EXISTS `opd_recpt` (
  `recpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `recption_id` varchar(11) DEFAULT NULL,
  `visit_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `new_due_amnt` double DEFAULT NULL,
  `crnt_gvn_anmt` double DEFAULT NULL,
  `crnt_discount` double DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`recpt_id`),
  KEY `p_idd` (`p_id`),
  KEY `fk_recption_id` (`recption_id`),
  KEY `fk_visit_id` (`visit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `opd_recpt`
--

INSERT INTO `opd_recpt` (`recpt_id`, `recption_id`, `visit_id`, `p_id`, `new_due_amnt`, `crnt_gvn_anmt`, `crnt_discount`, `payment_mode`, `date`, `time`) VALUES
(1, '', 1, 1, 0, 2000, 0, 'cash', '2013-12-20', '14:10:30'),
(2, '', 2, 2, 0, 2000, 0, 'cash', '2013-12-21', '06:27:57'),
(3, '', 3, 3, 0, 11400, 0, 'cash', '2013-12-21', '06:30:59'),
(4, '', 4, 4, 0, 20000, 0, 'cash', '2013-12-21', '07:20:43'),
(5, '', 5, 5, 0, 11400, 0, 'cash', '2013-12-21', '07:21:49'),
(6, '', 6, 6, 0, 20000, 0, 'cash', '2013-12-21', '07:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `ot_billing`
--

CREATE TABLE IF NOT EXISTS `ot_billing` (
  `ot_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `Procedure_name` varchar(40) NOT NULL,
  `Procedure_Fee` int(11) NOT NULL,
  `Adnl_Surgeon_Charge` int(11) NOT NULL,
  `OT_Charge` int(40) NOT NULL,
  `Anasethetics_Charge` int(40) NOT NULL,
  `Consumamble_Charge` int(40) NOT NULL,
  `Implant_Charge` int(40) NOT NULL,
  `Other_Charge` int(40) NOT NULL,
  `Package` varchar(40) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `surgeon` varchar(40) NOT NULL,
  `ot_billing_date` varchar(11) NOT NULL,
  `ot_billing_time` varchar(200) NOT NULL,
  `reception_name` varchar(200) NOT NULL,
  `ot_billing_id` int(200) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ot_billing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ot_billing`
--

INSERT INTO `ot_billing` (`ot_id`, `bill_id`, `Procedure_name`, `Procedure_Fee`, `Adnl_Surgeon_Charge`, `OT_Charge`, `Anasethetics_Charge`, `Consumamble_Charge`, `Implant_Charge`, `Other_Charge`, `Package`, `visit_id`, `surgeon`, `ot_billing_date`, `ot_billing_time`, `reception_name`, `ot_billing_id`) VALUES
(4, 98, 'blood test', 1000, 1000, 500, 500, 500, 1000, 500, '5000', 6, 'DR manoj kumar', '2013-12-22', '17:36:56', 'sheena', 6),
(2, 100, 'iuytre', 300, 300, 300, 300, 750, 750, 300, '3000', 1, 'DR manoj kumar', '2013-12-22', '17:48:03', 'sheena', 7),
(2, 103, 'blood test', 750, 750, 300, 300, 300, 300, 300, '3000', 1, 'DR james ford', '2013-12-25', '15:00:06', 'mac', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ot_billing_mt`
--

CREATE TABLE IF NOT EXISTS `ot_billing_mt` (
  `ot_bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  PRIMARY KEY (`ot_bill_id`),
  UNIQUE KEY `p_id` (`p_id`),
  UNIQUE KEY `v_id` (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ot_billing_mt`
--

INSERT INTO `ot_billing_mt` (`ot_bill_id`, `p_id`, `v_id`) VALUES
(1, 4, 4),
(2, 1, 1),
(3, 3, 3),
(4, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ot_booking`
--

CREATE TABLE IF NOT EXISTS `ot_booking` (
  `ot_id` int(200) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(200) NOT NULL,
  `procedure` varchar(200) NOT NULL,
  `ot_no` int(200) NOT NULL,
  `surgeon` varchar(200) NOT NULL,
  `anaesthetic` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  PRIMARY KEY (`ot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ot_store`
--

CREATE TABLE IF NOT EXISTS `ot_store` (
  `ot_id` int(200) NOT NULL AUTO_INCREMENT,
  `in_id` int(200) NOT NULL,
  `incharge_name` varchar(200) NOT NULL,
  `i_name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `ex_date` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `type_of_store` varchar(200) NOT NULL,
  PRIMARY KEY (`ot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ot_store`
--

INSERT INTO `ot_store` (`ot_id`, `in_id`, `incharge_name`, `i_name`, `type`, `quantity`, `ex_date`, `date`, `time`, `type_of_store`) VALUES
(1, 1, '', 'crocin', 'Fixed', '8', '12-2015', '21-12-13', '17:41:12', 'OT Store');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE IF NOT EXISTS `panel` (
  `panel_id` int(11) NOT NULL AUTO_INCREMENT,
  `panel_name` varchar(60) NOT NULL,
  PRIMARY KEY (`panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`panel_id`, `panel_name`) VALUES
(1, 'cghs');

-- --------------------------------------------------------

--
-- Table structure for table `panel_ward`
--

CREATE TABLE IF NOT EXISTS `panel_ward` (
  `pw_id` int(11) NOT NULL AUTO_INCREMENT,
  `panel` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`pw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_advace`
--

CREATE TABLE IF NOT EXISTS `patient_advace` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `advace` double NOT NULL,
  PRIMARY KEY (`pa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `patient_advace`
--

INSERT INTO `patient_advace` (`pa_id`, `bill_id`, `p_id`, `visit_id`, `advace`) VALUES
(1, 1, 1, 1, 2000),
(2, 5, 2, 2, 2000),
(3, 6, 3, 3, 11400),
(4, 8, 4, 4, 20000),
(5, 9, 5, 5, 11400),
(6, 10, 6, 6, 20000),
(7, 57, 7, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE IF NOT EXISTS `patient_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tpa` varchar(25) NOT NULL,
  `in_img1` varchar(60) NOT NULL,
  `in_img2` varchar(60) NOT NULL,
  `id_img1` varchar(60) NOT NULL,
  `id_img2` varchar(60) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `o_img1` varchar(60) NOT NULL,
  `o_img2` varchar(60) NOT NULL,
  `corporate` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE IF NOT EXISTS `patient_info` (
  `patient_id` int(15) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(60) NOT NULL,
  `p_mob` varchar(15) DEFAULT NULL,
  `p_email` varchar(50) DEFAULT NULL,
  `p_gender` char(1) NOT NULL,
  `p_age` int(10) NOT NULL,
  `p_address` varchar(100) DEFAULT NULL,
  `p_guardian` varchar(60) DEFAULT NULL,
  `p_g_mob` double DEFAULT NULL,
  `p_g_relation` varchar(15) DEFAULT NULL,
  `p_bgroup` varchar(10) DEFAULT NULL,
  `p_height` int(10) DEFAULT NULL,
  `p_weight` float DEFAULT NULL,
  `due_amount` float NOT NULL DEFAULT '0',
  `marital_status` varchar(100) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `p_name`, `p_mob`, `p_email`, `p_gender`, `p_age`, `p_address`, `p_guardian`, `p_g_mob`, `p_g_relation`, `p_bgroup`, `p_height`, `p_weight`, `due_amount`, `marital_status`) VALUES
(1, 'ekta', '9876543210', 'ekta@gmail.com', 'F', 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(2, 'monika', '2123245785', 'monika@gmail.com', 'F', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(3, 'reena ray', '5641247898', 'reenaray@gmail.com', 'F', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(4, 'rajveer', '212455645', 'rajveer@gmail.com', 'M', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(5, 'ajay', '9876543210', 'ajay@gmail.com', 'M', 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(6, 'uttra', '3454445456', 'uttra@gmail.com', 'M', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(7, 'op', '64534', '', 'M', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medicine`
--

CREATE TABLE IF NOT EXISTS `patient_medicine` (
  `m_id` int(20) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `bill_id` int(20) NOT NULL,
  `dom` date NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `bed_no` double NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `mrp` double NOT NULL,
  `packs` double NOT NULL,
  `quantity` double NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `tax` double NOT NULL,
  `sub_total` double NOT NULL,
  `bill_time` varchar(200) NOT NULL,
  `reception` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `patient_medicine`
--

INSERT INTO `patient_medicine` (`m_id`, `p_id`, `v_id`, `bill_id`, `dom`, `p_name`, `bed_no`, `m_name`, `batch_no`, `mrp`, `packs`, `quantity`, `exp_date`, `tax`, `sub_total`, `bill_time`, `reception`) VALUES
(1, 3, 3, 54, '2013-12-21', 'reena ray', 0, 'finex', '23fgghhj', 4.17, 0, 10, '12-2015', 0, 41.7, '', ''),
(2, 4, 0, 78, '2013-12-23', 'rajveer', 0, 'finex', '23fgghhj', 4.17, 0, 10, '12-2015', 12, 46.704, '', ''),
(3, 3, 3, 101, '2013-12-22', 'reena ray', 0, 'parecenamol', 'ddrdhgvf2145gh', 4, 0, 10, '12-2016', 0, 40, '', ''),
(4, 6, 6, 104, '2013-12-25', 'uttra', 0, 'parecenamol', 'ddrdhgvf2145gh', 4, 0, 20, '12-2016', 0, 80, '', ''),
(5, 3, 3, 105, '2013-12-25', 'reena ray', 0, 'parecenamol', 'ddrdhgvf2145gh', 4, 0, 5, '12-2016', 0, 20, '', ''),
(6, 4, 4, 106, '2013-12-24', 'rajveer', 0, 'parecenamol', 'ddrdhgvf2145gh', 4, 0, 4, '12-2016', 0, 16, '', ''),
(7, 3, 3, 108, '2013-12-24', 'reena ray', 0, 'parecenamol', 'ddrdhgvf2145gh', 4, 0, 5, '12-2016', 0, 20, '16:41:46', 'sheena');

-- --------------------------------------------------------

--
-- Table structure for table `patient_other_img`
--

CREATE TABLE IF NOT EXISTS `patient_other_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `claim_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_panel`
--

CREATE TABLE IF NOT EXISTS `patient_panel` (
  `panel_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `panel` varchar(100) DEFAULT NULL,
  `corporate` varchar(100) DEFAULT NULL,
  `paymode` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `procedure_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`panel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `patient_panel`
--

INSERT INTO `patient_panel` (`panel_id`, `p_id`, `v_id`, `b_id`, `source`, `panel`, `corporate`, `paymode`, `remarks`, `procedure_id`) VALUES
(1, 1, 1, 0, '', 'icc', '', 'cash', '', 0),
(2, 2, 2, 0, NULL, NULL, NULL, 'cash', NULL, NULL),
(3, 3, 3, 0, NULL, 'Icici sector110', NULL, 'cash', NULL, NULL),
(4, 4, 4, 0, '', 'cghs', '', 'cash', '', 0),
(5, 5, 5, 0, '', 'Icici sector110', '', 'cash', '', 0),
(6, 6, 6, 0, '', 'cghs', '', 'cash', '', 0),
(7, 4, 4, 23, '', '', '', '', '', 0),
(8, 3, 3, 24, '', '', '', '', '', 0),
(9, 4, 4, 25, '', '', '', '', '', 0),
(10, 4, 4, 25, '', '', '', '', '', 0),
(11, 3, 3, 26, '', '', '', '', '', 0),
(12, 3, 3, 26, '', '', '', '', '', 0),
(13, 3, 3, 26, '', '', '', '', '', 0),
(15, 4, 4, 28, '', '', '', '', '', 0),
(16, 1, 1, 30, '', '', '', '', '', 0),
(17, 4, 4, 32, '', '', '', '', '', 0),
(18, 3, 3, 56, '', '', '', '', '', 0),
(24, 3, 3, 99, '', '', '', '', '', 0),
(25, 3, 3, 102, '', '', '', '', '', 0),
(26, 4, 4, 107, '', '', '', '', '', 0),
(27, 4, 4, 107, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_receive`
--

CREATE TABLE IF NOT EXISTS `payment_receive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(20) NOT NULL,
  `account` bigint(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_receive`
--

INSERT INTO `payment_receive` (`id`, `from`, `account`, `date`) VALUES
(1, 'naveen', 5000, '2013-12-24 11:05:16'),
(2, 'sameer', 5000, '2013-12-24 11:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment_to_staff`
--

CREATE TABLE IF NOT EXISTS `payment_to_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff` varchar(20) NOT NULL,
  `amount` bigint(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_to_vendor`
--

CREATE TABLE IF NOT EXISTS `payment_to_vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor` varchar(25) NOT NULL,
  `amount` bigint(15) NOT NULL,
  `address` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE IF NOT EXISTS `pc` (
  `pc_id` int(11) NOT NULL DEFAULT '0',
  `panel` varchar(20) DEFAULT NULL,
  `corporate` varchar(20) DEFAULT NULL,
  `source` varchar(100) NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preapp`
--

CREATE TABLE IF NOT EXISTS `preapp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `img` varchar(66) NOT NULL,
  `identifier` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `preventable`
--

CREATE TABLE IF NOT EXISTS `preventable` (
  `p_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(200) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `dise_name` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `procedure`
--

CREATE TABLE IF NOT EXISTS `procedure` (
  `proc_id` int(11) NOT NULL AUTO_INCREMENT,
  `proc_name` varchar(255) NOT NULL,
  `proc_cat` varchar(255) NOT NULL,
  `proc_amount` double NOT NULL,
  `paid` varchar(20) NOT NULL,
  `deduction` int(20) NOT NULL,
  PRIMARY KEY (`proc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `procedure_room_rate`
--

CREATE TABLE IF NOT EXISTS `procedure_room_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `room_type` varchar(15) NOT NULL,
  `charges` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `procedure_room_rate`
--

INSERT INTO `procedure_room_rate` (`id`, `pid`, `room_type`, `charges`) VALUES
(1, 65, 'AC', 300),
(2, 65, 'General', 250),
(3, 65, 'VIP', 500),
(4, 66, 'AC', 250),
(5, 66, 'General', 200),
(6, 66, 'VIP', 400),
(7, 67, 'AC', 1500),
(8, 67, 'General', 1000),
(9, 67, 'VIP', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `proc_info`
--

CREATE TABLE IF NOT EXISTS `proc_info` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `pn_cash_corp` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `proc_info`
--

INSERT INTO `proc_info` (`pid`, `p_name`, `type`, `pn_cash_corp`) VALUES
(65, 'blood test', 'lab', 'cash'),
(66, 'blood test', 'lab', 'cghs'),
(67, 'blood test', 'lab', 'Icici sector110');

-- --------------------------------------------------------

--
-- Table structure for table `proc_mode_rate`
--

CREATE TABLE IF NOT EXISTS `proc_mode_rate` (
  `id` int(10) NOT NULL,
  `belongs_proc` int(10) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `belongs_proc` (`belongs_proc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `claim_id` int(11) NOT NULL,
  `query` varchar(150) NOT NULL,
  `remarks` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `query_reply`
--

CREATE TABLE IF NOT EXISTS `query_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) NOT NULL,
  `query_reply` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recp_info`
--

CREATE TABLE IF NOT EXISTS `recp_info` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `r_mob` double NOT NULL,
  `email` varchar(240) NOT NULL,
  `sex` char(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recp_login`
--

CREATE TABLE IF NOT EXISTS `recp_login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ref_id` int(10) NOT NULL,
  `ip_adress` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `ref_id` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE IF NOT EXISTS `requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rf_img1` varchar(55) NOT NULL,
  `rf_img2` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_supporting_images`
--

CREATE TABLE IF NOT EXISTS `requisition_supporting_images` (
  `sdid` int(11) NOT NULL AUTO_INCREMENT,
  `ip_id` int(11) NOT NULL,
  `s_img` varchar(60) NOT NULL,
  PRIMARY KEY (`sdid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE IF NOT EXISTS `room_booking` (
  `room_id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `type_of_room` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(200) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_charge`
--

CREATE TABLE IF NOT EXISTS `room_charge` (
  `room_id` int(20) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `v_id` int(20) NOT NULL,
  `from_date_time` varchar(20) NOT NULL,
  `to_date_time` varchar(20) NOT NULL,
  `no_of_day` int(20) NOT NULL,
  `categery` varchar(40) NOT NULL,
  `bed_no` varchar(50) NOT NULL,
  `charge` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `room_charge`
--

INSERT INTO `room_charge` (`room_id`, `patient_id`, `v_id`, `from_date_time`, `to_date_time`, `no_of_day`, `categery`, `bed_no`, `charge`, `total`) VALUES
(1, 1, 1, '2013-12-19 01:07:50', '____', 0, 'AC', 'ground 2', 1200, 0),
(2, 2, 2, '2013-12-19 02:13:41', '____', 0, 'AC', 'ground 3', 1200, 0),
(3, 3, 3, '2013-12-18 02:20:30', '____', 0, 'AC', 'first 1', 1200, 0),
(4, 4, 4, '2013-12-19 05:31:46', '____', 0, 'General', 'second 21', 800, 0),
(5, 5, 5, '2013-12-20 10:22:22', '____', 0, 'VIP', 'first 4', 1500, 0),
(6, 6, 6, '2013-12-20 12:47:12', '____', 0, 'VIP', 'ground 4', 1500, 0),
(7, 1, 1, '2013-12-11 06:40:26', '____', 0, 'AC', 'ground 1', 1200, 0),
(8, 2, 2, '2013-12-21 10:57:54', '____', 0, 'VIP', 'ground 2', 1500, 0),
(9, 3, 3, '2013-12-21 11:00:57', '____', 0, 'General', 'ground 4', 800, 0),
(10, 4, 4, '2013-12-20 11:50:41', '____', 0, 'General', 'first 3', 800, 0),
(11, 5, 5, '2013-12-22 11:51:47', '____', 0, 'VIP', 'first 2', 1500, 0),
(12, 6, 6, '2013-12-21 11:52:52', '____', 0, 'VIP', 'first 4', 1500, 0),
(13, 7, 7, ' 07:10:18', '____', 0, 'category', 'category', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_charge_pay`
--

CREATE TABLE IF NOT EXISTS `room_charge_pay` (
  `patient_id` varchar(11) NOT NULL,
  `v_id` varchar(11) NOT NULL,
  `total_room_charge` int(11) NOT NULL,
  `bill_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(100) NOT NULL,
  `room_charge` int(20) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_id`, `room_type`, `room_charge`) VALUES
(1, 'AC', 1200),
(2, 'General', 800),
(3, 'VIP', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(60) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`s_id`, `source_name`) VALUES
(1, 'DR kathuria'),
(2, 'max hospital noida');

-- --------------------------------------------------------

--
-- Table structure for table `tpa`
--

CREATE TABLE IF NOT EXISTS `tpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` double NOT NULL,
  `gender` varchar(7) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `verify` tinyint(4) NOT NULL,
  `default_page` varchar(55) NOT NULL,
  `default_link` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `username`, `password`, `phone`, `gender`, `usertype`, `verify`, `default_page`, `default_link`) VALUES
(1, 'admin', 'admin', 'admin', 0, 'male', 'admin', 1, 'user_veri.php', 'user_veri.php'),
(5, 'sheena', 'sheena', 'sheena', 9817331414, 'F', 'NULL', 1, '', 'ipd_visit.php'),
(6, 'mac', 'mac', 'mac', 789666555, 'M', 'NULL', 1, '', 'dashboard.php');

-- --------------------------------------------------------

--
-- Table structure for table `user_priv`
--

CREATE TABLE IF NOT EXISTS `user_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dashboard` tinyint(4) NOT NULL,
  `reception` tinyint(4) NOT NULL,
  `ipd_billing` tinyint(4) NOT NULL,
  `pharmacy` tinyint(4) NOT NULL,
  `diagnostics` tinyint(4) NOT NULL,
  `inventory` tinyint(4) NOT NULL,
  `accounting` tinyint(4) NOT NULL,
  `data_mx` tinyint(4) NOT NULL,
  `mis` tinyint(4) NOT NULL,
  `hosp_admin` tinyint(4) NOT NULL,
  `med_records` tinyint(4) NOT NULL,
  `claim` tinyint(4) NOT NULL,
  `default_page` varchar(55) NOT NULL,
  `default_link` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_priv`
--

INSERT INTO `user_priv` (`id`, `user_id`, `dashboard`, `reception`, `ipd_billing`, `pharmacy`, `diagnostics`, `inventory`, `accounting`, `data_mx`, `mis`, `hosp_admin`, `med_records`, `claim`, `default_page`, `default_link`) VALUES
(3, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', 'ipd_visit.php'),
(4, 6, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'dashboard.php');

-- --------------------------------------------------------

--
-- Table structure for table `vender_table`
--

CREATE TABLE IF NOT EXISTS `vender_table` (
  `ven_id` int(200) NOT NULL AUTO_INCREMENT,
  `bill_no` int(200) NOT NULL,
  `date` date NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `pad_amount` int(200) NOT NULL,
  `payment_date` date NOT NULL,
  `verfiy` int(11) NOT NULL,
  PRIMARY KEY (`ven_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE IF NOT EXISTS `vendor_details` (
  `se_no` int(200) NOT NULL AUTO_INCREMENT,
  `ven_id` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `paid_amount` int(200) NOT NULL,
  `due_amount` int(200) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`se_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visit_register`
--

CREATE TABLE IF NOT EXISTS `visit_register` (
  `visit_id` int(15) NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `p_id` int(15) NOT NULL,
  `proc_status` varchar(12) NOT NULL,
  `bed_no` varchar(50) NOT NULL,
  `room_type` varchar(20) NOT NULL,
  `ref_dr` varchar(20) NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `visit_register`
--

INSERT INTO `visit_register` (`visit_id`, `visit_date`, `visit_time`, `p_id`, `proc_status`, `bed_no`, `room_type`, `ref_dr`) VALUES
(1, '2013-12-20', '06:40:26', 1, '1', 'ground 1', 'AC', 'DR. R.K. nag'),
(2, '2013-12-21', '10:57:54', 2, '1', 'ground 2', 'VIP', 'DR manoj kumar'),
(3, '2013-12-21', '11:00:57', 3, '1', 'ground 4', 'General', 'DR manoj kumar'),
(4, '2013-12-21', '11:50:41', 4, '1', 'first 3', 'General', 'DR. Diviya chaudhary'),
(5, '2013-12-21', '11:51:47', 5, '1', 'first 2', 'VIP', 'DR. Diviya chaudhary'),
(6, '2013-12-21', '11:52:52', 6, '1', 'first 4', 'VIP', 'DR. Diviya chaudhary'),
(7, '2013-12-22', '07:10:18', 7, '1', 'category', 'category', 'DR. R.K. nag');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE IF NOT EXISTS `wards` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `proc_id` int(11) NOT NULL,
  `procedure_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proc_mode_rate`
--
ALTER TABLE `proc_mode_rate`
  ADD CONSTRAINT `proc_mode_rate_ibfk_1` FOREIGN KEY (`belongs_proc`) REFERENCES `proc_info` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
