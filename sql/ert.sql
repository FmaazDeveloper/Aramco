-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2022 at 05:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ert`
--

-- --------------------------------------------------------

--
-- Table structure for table `covering`
--

DROP TABLE IF EXISTS `covering`;
CREATE TABLE IF NOT EXISTS `covering` (
  `personal_no` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `days` int(3) DEFAULT NULL,
  `score_days` float DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hipo`
--

DROP TABLE IF EXISTS `hipo`;
CREATE TABLE IF NOT EXISTS `hipo` (
  `personal_no` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `hipo` varchar(3) DEFAULT NULL,
  `score_hipo` int(2) DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `personal_no` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `psg` int(2) DEFAULT NULL,
  `score_psg` int(3) DEFAULT NULL,
  `age_yrs` int(2) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `service_years` int(2) DEFAULT NULL,
  `perm_job_title` varchar(250) DEFAULT NULL,
  `perm_div_cc_title` varchar(250) DEFAULT NULL,
  `perm_dept_title` varchar(250) DEFAULT NULL,
  `previous_exp` varchar(250) DEFAULT NULL,
  `score_dept` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `percent`
--

DROP TABLE IF EXISTS `percent`;
CREATE TABLE IF NOT EXISTS `percent` (
  `percent_psg` float DEFAULT NULL,
  `percent_service_years` float DEFAULT NULL,
  `percent_dept` float DEFAULT NULL,
  `percent_covering` float DEFAULT NULL,
  `percent_hipo` float DEFAULT NULL,
  `percent_pmp` float DEFAULT NULL,
  `percent_total` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pmp`
--

DROP TABLE IF EXISTS `pmp`;
CREATE TABLE IF NOT EXISTS `pmp` (
  `personal_no` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `pmp_2021` varchar(3) DEFAULT NULL,
  `pmp_2020` varchar(3) DEFAULT NULL,
  `pmp_2019` varchar(3) DEFAULT NULL,
  `score_pmp` int(2) DEFAULT NULL,
  `avg_pmp` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE IF NOT EXISTS `ranking` (
  `personal_no` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `rank` int(4) DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

DROP TABLE IF EXISTS `sign_in`;
CREATE TABLE IF NOT EXISTS `sign_in` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
