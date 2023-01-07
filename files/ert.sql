-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 07, 2023 at 06:37 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
  `personal_no` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `days` int(3) DEFAULT NULL,
  `score_days` float DEFAULT NULL,
  KEY `personal_no` (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covering`
--

INSERT INTO `covering` (`personal_no`, `name`, `days`, `score_days`) VALUES
(761413, 'Mohammad akd', 360, 1),
(817844, 'AJLANI, OMAR I', 1, 0),
(788609, 'ALSHEHRY, ABDULLAH M', 7, 0.02),
(789234, 'ALGHAMDI, MOHAMMED S', 13, 0.04),
(789260, 'ALMULHIM, ABDULLAH S', 19, 0.05),
(789459, 'ALKHALDI, ABDULMOHSEN F', 25, 0.07),
(789554, 'ALKHATEEB ALJAAFARI, MOHAMMED A', 31, 0.09),
(793225, 'ALQAHTANI, ABDULAZIZ A', 37, 0.1),
(793471, 'ALSHAMI, HAMED A', 43, 0.12),
(793707, 'ALMULHIM, ABDULLAH A', 49, 0.14),
(794889, 'MALAEKAH, ALI A', 55, 0.15),
(795045, 'ALKAHTANI, TRKY H', 61, 0.17),
(795046, 'ALSHEHRI, SAAD K', 67, 0.19),
(795063, 'ALSHIHA, AHMED S', 73, 0.2),
(795076, 'ALROQAIE, ABDULAZIZ A', 79, 0.22),
(797426, 'ALGHAMDI, ABDULAZIZ O', 85, 0.24),
(797442, 'ALOTAIBI, ABDULLAH H', 91, 0.25),
(797489, 'ALHAJRI, ABDULLAH M', 97, 0.27),
(888000, 'ALHAJRI, KHALID D', 103, 0.29),
(780567, 'SALEH, ABDULRAHMAN R', 109, 0.3),
(780847, 'ALMALEKI, HESHAM A', 115, 0.32),
(781296, 'ALDUGHAITHER, YAZEED R', 121, 0.34),
(788805, 'ALQAHTANI, ABDULAZIZ D', 127, 0.35),
(788818, 'ALEIDHI, ABDULAZIZ A', 133, 0.37),
(788836, 'ALSHAMMARI, HAMED M', 139, 0.39),
(789510, 'HASHIM, AHMED O', 145, 0.4),
(790085, 'SOLAMI, MAHER H', 151, 0.42),
(790171, 'ALZAHRANI, SHAIG H', 157, 0.44),
(790462, 'ALAHMAD, BADER M', 163, 0.45),
(790546, 'ALBASSAM, ABDULLAH M', 169, 0.47),
(792375, 'ALZAHRANI, ABDULLAH A', 175, 0.49),
(792429, 'MALIBARI, MAHER I', 181, 0.5),
(792717, 'ALHELAL, RAID A', 187, 0.52),
(272941, 'ALENIZI, FAYEZ R', 193, 0.54),
(780776, 'ALDOSSARY, MAJED A', 199, 0.55),
(781096, 'ALKHALAF, ABDULLAH A', 205, 0.57),
(785001, 'BALHARETH, TURKI M', 211, 0.59),
(785020, 'ALSHAMMARI, MESHARI F', 217, 0.6),
(785026, 'ALENEZI, FAHAD A', 223, 0.62),
(785826, 'ALDAWSARI, SALLAL A', 229, 0.64),
(788076, 'ALAHMADI., RAYAN K', 235, 0.65),
(788092, 'ALNUTIFAT, MESFER A', 241, 0.67),
(788123, 'ALHAJRI, SAAD G', 247, 0.69),
(788137, 'ALKUHAILI, AHMED A', 253, 0.7),
(788204, 'ALAMEER, ADEL A', 259, 0.72),
(808586, 'MARZOOQ, SALEH Y', 265, 0.74),
(280530, 'EISA, ABDULLAH H', 271, 0.75),
(747712, 'ALJINDAN, KHALID A', 277, 0.77),
(761637, 'MOUSA, MOHAMMAD A', 283, 0.79);

-- --------------------------------------------------------

--
-- Table structure for table `hipo`
--

DROP TABLE IF EXISTS `hipo`;
CREATE TABLE IF NOT EXISTS `hipo` (
  `personal_no` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `hipo` varchar(3) DEFAULT NULL,
  `score_hipo` int(2) DEFAULT NULL,
  KEY `personal_no` (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hipo`
--

INSERT INTO `hipo` (`personal_no`, `name`, `hipo`, `score_hipo`) VALUES
(761413, 'Mohammad akd', 'Y', 15),
(817844, 'AJLANI, OMAR I', 'N', 0),
(788609, 'ALSHEHRY, ABDULLAH M', 'Y', 15),
(789234, 'ALGHAMDI, MOHAMMED S', 'N', 0),
(789260, 'ALMULHIM, ABDULLAH S', 'Y', 15),
(789459, 'ALKHALDI, ABDULMOHSEN F', 'N', 0),
(789554, 'ALKHATEEB ALJAAFARI, MOHAMMED A', 'Y', 15),
(793225, 'ALQAHTANI, ABDULAZIZ A', 'N', 0),
(793471, 'ALSHAMI, HAMED A', 'Y', 15),
(793707, 'ALMULHIM, ABDULLAH A', 'N', 0),
(794889, 'MALAEKAH, ALI A', 'Y', 15),
(795045, 'ALKAHTANI, TRKY H', 'N', 0),
(795046, 'ALSHEHRI, SAAD K', 'Y', 15),
(795063, 'ALSHIHA, AHMED S', 'N', 0),
(795076, 'ALROQAIE, ABDULAZIZ A', 'Y', 15),
(797426, 'ALGHAMDI, ABDULAZIZ O', 'Y', 15),
(797442, 'ALOTAIBI, ABDULLAH H', 'N', 0),
(797489, 'ALHAJRI, ABDULLAH M', 'N', 0),
(888000, 'ALHAJRI, KHALID D', 'Y', 15),
(780567, 'SALEH, ABDULRAHMAN R', 'N', 0),
(780847, 'ALMALEKI, HESHAM A', 'Y', 15),
(781296, 'ALDUGHAITHER, YAZEED R', 'N', 0),
(788805, 'ALQAHTANI, ABDULAZIZ D', 'N', 0),
(788818, 'ALEIDHI, ABDULAZIZ A', 'Y', 15),
(788836, 'ALSHAMMARI, HAMED M', 'N', 0),
(789510, 'HASHIM, AHMED O', 'Y', 15),
(790085, 'SOLAMI, MAHER H', 'N', 0),
(790171, 'ALZAHRANI, SHAIG H', 'Y', 15),
(790462, 'ALAHMAD, BADER M', 'N', 0),
(790546, 'ALBASSAM, ABDULLAH M', 'Y', 15),
(792375, 'ALZAHRANI, ABDULLAH A', 'N', 0),
(792429, 'MALIBARI, MAHER I', 'Y', 15),
(792717, 'ALHELAL, RAID A', 'N', 0),
(272941, 'ALENIZI, FAYEZ R', 'Y', 15),
(780776, 'ALDOSSARY, MAJED A', 'N', 0),
(781096, 'ALKHALAF, ABDULLAH A', 'Y', 15),
(785001, 'BALHARETH, TURKI M', 'N', 0),
(785020, 'ALSHAMMARI, MESHARI F', 'Y', 15),
(785026, 'ALENEZI, FAHAD A', 'Y', 15),
(785826, 'ALDAWSARI, SALLAL A', 'N', 0),
(788076, 'ALAHMADI., RAYAN K', 'N', 0),
(788092, 'ALNUTIFAT, MESFER A', 'Y', 15),
(788123, 'ALHAJRI, SAAD G', 'N', 0),
(788137, 'ALKUHAILI, AHMED A', 'Y', 15),
(788204, 'ALAMEER, ADEL A', 'N', 0),
(808586, 'MARZOOQ, SALEH Y', 'Y', 15),
(280530, 'EISA, ABDULLAH H', 'N', 0),
(747712, 'ALJINDAN, KHALID A', 'Y', 15),
(761637, 'MOUSA, MOHAMMAD A', 'N', 0);

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
  `score_dept` int(1) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`personal_no`, `name`, `psg`, `score_psg`, `age_yrs`, `hire_date`, `service_years`, `perm_job_title`, `perm_div_cc_title`, `perm_dept_title`, `previous_exp`, `score_dept`, `total`) VALUES
(761413, 'Mohammad akd', 15, 100, 20, '2022-12-31', 25, 'x', 'y', 's', 'y z', 0, 69.38),
(817844, 'AJLANI, OMAR I', 12, 40, 21, '2021-08-17', 14, 'Drilling Engineer III', 'WORKOVER ENGINEERING DIV #3 - ADM', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 44.58),
(788609, 'ALSHEHRY, ABDULLAH M', 13, 60, 22, '2018-10-30', 13, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 70.54),
(789234, 'ALGHAMDI, MOHAMMED S', 14, 80, 23, '2018-07-15', 12, 'Drilling Engineer IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 53.17),
(789260, 'ALMULHIM, ABDULLAH S', 15, 100, 24, '2018-11-18', 11, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 70.79),
(789459, 'ALKHALDI, ABDULMOHSEN F', 11, 20, 25, '2018-10-28', 10, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 36.75),
(789554, 'ALKHATEEB ALJAAFARI, MOHAMMED A', 12, 40, 26, '2018-07-29', 9, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 59.38),
(793225, 'ALQAHTANI, ABDULAZIZ A', 13, 60, 27, '2018-04-22', 8, 'Drilling Engineer IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 42),
(793471, 'ALSHAMI, HAMED A', 14, 80, 28, '2018-05-13', 7, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 71.29),
(793707, 'ALMULHIM, ABDULLAH A', 15, 100, 29, '2018-05-22', 16, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 54.33),
(794889, 'MALAEKAH, ALI A', 11, 20, 30, '2018-07-22', 5, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 64.88),
(795045, 'ALKAHTANI, TRKY H', 12, 40, 31, '2018-08-09', 4, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 39.17),
(795046, 'ALSHEHRI, SAAD K', 13, 60, 32, '2018-08-09', 3, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 65.13),
(795063, 'ALSHIHA, AHMED S', 14, 80, 33, '2018-08-26', 2, 'Drilling Engineer IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 49.42),
(795076, 'ALROQAIE, ABDULAZIZ A', 15, 100, 34, '2018-09-02', 10, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 75.42),
(797426, 'ALGHAMDI, ABDULAZIZ O', 11, 20, 35, '2018-11-11', 0, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 58),
(797442, 'ALOTAIBI, ABDULLAH H', 12, 40, 36, '2018-11-18', 15, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 44.96),
(797489, 'ALHAJRI, ABDULLAH M', 13, 60, 37, '2018-11-22', 14, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 45.92),
(888000, 'ALHAJRI, KHALID D', 14, 80, 38, '2018-08-30', 13, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 73.54),
(780567, 'SALEH, ABDULRAHMAN R', 15, 100, 39, '2017-12-24', 12, 'Pet Engrg Sys Analyst IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 49.5),
(780847, 'ALMALEKI, HESHAM A', 11, 20, 40, '2017-12-03', 11, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 62.13),
(781296, 'ALDUGHAITHER, YAZEED R', 12, 40, 41, '2017-12-03', 10, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 41.42),
(788805, 'ALQAHTANI, ABDULAZIZ D', 13, 60, 42, '2017-03-14', 9, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 44.04),
(788818, 'ALEIDHI, ABDULAZIZ A', 14, 80, 43, '2017-03-26', 8, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 76.67),
(788836, 'ALSHAMMARI, HAMED M', 15, 100, 44, '2017-04-05', 7, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 47.63),
(789510, 'HASHIM, AHMED O', 11, 20, 45, '2017-05-24', 6, 'Drilling Engineer IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 65.25),
(790085, 'SOLAMI, MAHER H', 12, 40, 35, '2017-07-10', 5, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 46.21),
(790171, 'ALZAHRANI, SHAIG H', 13, 60, 36, '2017-07-13', 4, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 70.5),
(790462, 'ALAHMAD, BADER M', 14, 80, 37, '2017-08-13', 3, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 48.13),
(790546, 'ALBASSAM, ABDULLAH M', 15, 100, 38, '2017-10-01', 2, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 75.75),
(792375, 'ALZAHRANI, ABDULLAH A', 11, 20, 39, '2017-11-26', 1, 'Drilling Engineer IV', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 41.71),
(792429, 'MALIBARI, MAHER I', 12, 40, 40, '2017-12-12', 0, 'Pet Engrg Sys Analyst IV', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 66),
(792717, 'ALHELAL, RAID A', 13, 60, 41, '2017-12-28', 15, 'Drilling Engineer IV', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 49.63),
(272941, 'ALENIZI, FAYEZ R', 14, 80, 42, '2016-10-16', 14, 'Drilling Engineer III', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 77.25),
(780776, 'ALDOSSARY, MAJED A', 15, 100, 43, '2016-02-28', 13, 'Drilling Engineer III', 'NA OIL DRILLING ENGINEERING DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 58.21),
(781096, 'ALKHALAF, ABDULLAH A', 11, 20, 44, '2016-11-08', 12, 'Drilling Engineer III', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Gas Drilling Engineering Dept', 'Dept X\nDept Y', 2, 67.5),
(785001, 'BALHARETH, TURKI M', 12, 40, 45, '2016-02-28', 11, 'Drilling Engineer III', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 45.13),
(785020, 'ALSHAMMARI, MESHARI F', 13, 60, 35, '2016-03-21', 10, 'Drilling Engineer III', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 72.75),
(785026, 'ALENEZI, FAHAD A', 14, 80, 36, '2016-03-27', 9, 'Drilling Engineer III', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 78.71),
(785826, 'ALDAWSARI, SALLAL A', 15, 100, 37, '2016-06-19', 8, 'Drilling Engineer III', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Drilling Technical Dept', 'Dept X\nDept Y', 2, 53),
(788076, 'ALAHMADI., RAYAN K', 11, 20, 38, '2016-11-09', 7, 'Drilling Engineer III', 'NA OIL DRILLING ENGINEERING DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 40.63),
(788092, 'ALNUTIFAT, MESFER A', 12, 40, 39, '2016-11-14', 6, 'Drilling Engineer III', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 71.58),
(788123, 'ALHAJRI, SAAD G', 13, 60, 40, '2016-11-22', 5, 'Drilling Engineer III', 'SA ONSHORE GAS DRILLING ENGRG DI', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 45.88),
(788137, 'ALKUHAILI, AHMED A', 14, 80, 41, '2016-11-27', 4, 'Drilling Engineer III', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 73.5),
(788204, 'ALAMEER, ADEL A', 15, 100, 42, '2016-12-20', 3, 'Drilling Engineer III', 'NA OIL DRILLING ENGINEERING DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 51.13),
(808586, 'MARZOOQ, SALEH Y', 11, 20, 43, '2018-01-17', 2, 'Drilling Engineer IV', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 67.08),
(280530, 'EISA, ABDULLAH H', 12, 40, 44, '2013-12-03', 1, 'Drilling Engineer III', 'OFFSHORE OIL DRILLING ENGRG DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 41.38),
(747712, 'ALJINDAN, KHALID A', 13, 60, 45, '2015-09-15', 0, 'Drilling Engineer III', 'NA OIL DRILLING ENGINEERING DIV -', 'Exploration & Oil Drilling Engrg Dept', 'Dept X\nDept Y', 2, 72.33),
(761637, 'MOUSA, MOHAMMAD A', 14, 80, 49, '2015-05-05', 10, 'Drilling Engineer III', 'ONSHORE GAS WORKOVER ENGRG DIV -', 'Workover Engineering Dept', 'Dept X\nDept Y', 2, 50.75);

-- --------------------------------------------------------

--
-- Table structure for table `percent`
--

DROP TABLE IF EXISTS `percent`;
CREATE TABLE IF NOT EXISTS `percent` (
  `percent_pmp` float DEFAULT NULL,
  `percent_hipo` float DEFAULT NULL,
  `percent_service_years` float DEFAULT NULL,
  `percent_covering` float DEFAULT NULL,
  `percent_psg` float DEFAULT NULL,
  `percent_dept` float DEFAULT NULL,
  `percent_total` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `percent`
--

INSERT INTO `percent` (`percent_pmp`, `percent_hipo`, `percent_service_years`, `percent_covering`, `percent_psg`, `percent_dept`, `percent_total`) VALUES
(25, 25, 30, 0, 0, 20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `pmp`
--

DROP TABLE IF EXISTS `pmp`;
CREATE TABLE IF NOT EXISTS `pmp` (
  `personal_no` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `pmp_2021` varchar(3) DEFAULT NULL,
  `pmp_2020` varchar(3) DEFAULT NULL,
  `pmp_2019` varchar(3) DEFAULT NULL,
  `score_pmp` int(2) DEFAULT NULL,
  `avg_pmp` varchar(3) DEFAULT NULL,
  KEY `personal_no` (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pmp`
--

INSERT INTO `pmp` (`personal_no`, `name`, `pmp_2021`, `pmp_2020`, `pmp_2019`, `score_pmp`, `avg_pmp`) VALUES
(761413, 'Mohammad akd', 'E+', 'E', 'S', 12, 'E+'),
(817844, 'AJLANI, OMAR I', 'S', 'E+', 'E', 12, 'E+'),
(788609, 'ALSHEHRY, ABDULLAH M', 'S', 'S', 'D', 11, 'E+'),
(789234, 'ALGHAMDI, MOHAMMED S', 'S', 'E+', 'S', 14, 'S'),
(789260, 'ALMULHIM, ABDULLAH S', 'S', 'D', 'M', 8, 'E'),
(789459, 'ALKHALDI, ABDULMOHSEN F', 'S', 'E+', 'D', 10, 'E'),
(789554, 'ALKHATEEB ALJAAFARI, MOHAMMED A', 'D', 'D', 'S', 7, 'M'),
(793225, 'ALQAHTANI, ABDULAZIZ A', 'S', 'E+', 'D', 10, 'E'),
(793471, 'ALSHAMI, HAMED A', 'S', 'E+', 'M', 11, 'E+'),
(793707, 'ALMULHIM, ABDULLAH A', 'S', 'E+', 'E', 12, 'E+'),
(794889, 'MALAEKAH, ALI A', 'S', 'S', 'E', 13, 'E+'),
(795045, 'ALKAHTANI, TRKY H', 'S', 'E+', 'M', 11, 'E+'),
(795046, 'ALSHEHRI, SAAD K', 'S', 'E+', 'D', 10, 'E'),
(795063, 'ALSHIHA, AHMED S', 'S', 'E+', 'S', 14, 'S'),
(795076, 'ALROQAIE, ABDULAZIZ A', 'S', 'S', 'D', 11, 'E+'),
(797426, 'ALGHAMDI, ABDULAZIZ O', 'S', 'E+', 'D', 10, 'E'),
(797442, 'ALOTAIBI, ABDULLAH H', 'S', 'E+', 'E', 12, 'E+'),
(797489, 'ALHAJRI, ABDULLAH M', 'S', 'E+', 'M', 11, 'E+'),
(888000, 'ALHAJRI, KHALID D', 'S', 'S', 'D', 11, 'E+'),
(780567, 'SALEH, ABDULRAHMAN R', 'S', 'E+', 'D', 10, 'E'),
(780847, 'ALMALEKI, HESHAM A', 'S', 'E+', 'D', 10, 'E'),
(781296, 'ALDUGHAITHER, YAZEED R', 'S', 'E+', 'M', 11, 'E+'),
(788805, 'ALQAHTANI, ABDULAZIZ D', 'S', 'S', 'D', 11, 'E+'),
(788818, 'ALEIDHI, ABDULAZIZ A', 'S', 'E+', 'S', 14, 'S'),
(788836, 'ALSHAMMARI, HAMED M', 'S', 'E+', 'D', 10, 'E'),
(789510, 'HASHIM, AHMED O', 'S', 'E+', 'E+', 13, 'E+'),
(790085, 'SOLAMI, MAHER H', 'S', 'S', 'S', 15, 'S'),
(790171, 'ALZAHRANI, SHAIG H', 'S', 'E+', 'E+', 13, 'E+'),
(790462, 'ALAHMAD, BADER M', 'S', 'E+', 'E+', 13, 'E+'),
(790546, 'ALBASSAM, ABDULLAH M', 'S', 'E+', 'E+', 13, 'E+'),
(792375, 'ALZAHRANI, ABDULLAH A', 'S', 'S', 'S', 15, 'S'),
(792429, 'MALIBARI, MAHER I', 'S', 'E+', 'E+', 13, 'E+'),
(792717, 'ALHELAL, RAID A', 'S', 'E+', 'E+', 13, 'E+'),
(272941, 'ALENIZI, FAYEZ R', 'S', 'E+', 'E+', 13, 'E+'),
(780776, 'ALDOSSARY, MAJED A', 'S', 'S', 'S', 15, 'S'),
(781096, 'ALKHALAF, ABDULLAH A', 'S', 'E+', 'E+', 13, 'E+'),
(785001, 'BALHARETH, TURKI M', 'S', 'E+', 'E+', 13, 'E+'),
(785020, 'ALSHAMMARI, MESHARI F', 'S', 'E+', 'E+', 13, 'E+'),
(785026, 'ALENEZI, FAHAD A', 'S', 'S', 'S', 15, 'S'),
(785826, 'ALDAWSARI, SALLAL A', 'S', 'E+', 'E+', 13, 'E+'),
(788076, 'ALAHMADI., RAYAN K', 'S', 'E+', 'E+', 13, 'E+'),
(788092, 'ALNUTIFAT, MESFER A', 'S', 'S', 'S', 15, 'S'),
(788123, 'ALHAJRI, SAAD G', 'S', 'E+', 'E+', 13, 'E+'),
(788137, 'ALKUHAILI, AHMED A', 'S', 'E+', 'E+', 13, 'E+'),
(788204, 'ALAMEER, ADEL A', 'S', 'E+', 'E+', 13, 'E+'),
(808586, 'MARZOOQ, SALEH Y', 'S', 'S', 'S', 15, 'S'),
(280530, 'EISA, ABDULLAH H', 'S', 'E+', 'E+', 13, 'E+'),
(747712, 'ALJINDAN, KHALID A', 'S', 'S', 'S', 15, 'S'),
(761637, 'MOUSA, MOHAMMAD A', 'S', 'E+', 'E+', 13, 'E+');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE IF NOT EXISTS `ranking` (
  `personal_no` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `rank` int(4) DEFAULT NULL,
  KEY `personal_no` (`personal_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`personal_no`, `name`, `total`, `rank`) VALUES
(761413, 'Mohammad akd', 69.38, 5),
(817844, 'AJLANI, OMAR I', 44.58, 46),
(788609, 'ALSHEHRY, ABDULLAH M', 70.54, 17),
(789234, 'ALGHAMDI, MOHAMMED S', 53.17, 33),
(789260, 'ALMULHIM, ABDULLAH S', 70.79, 13),
(789459, 'ALKHALDI, ABDULMOHSEN F', 36.75, 49),
(789554, 'ALKHATEEB ALJAAFARI, MOHAMMED A', 59.38, 23),
(793225, 'ALQAHTANI, ABDULAZIZ A', 42, 47),
(793471, 'ALSHAMI, HAMED A', 71.29, 14),
(793707, 'ALMULHIM, ABDULLAH A', 54.33, 29),
(794889, 'MALAEKAH, ALI A', 64.88, 22),
(795045, 'ALKAHTANI, TRKY H', 39.17, 48),
(795046, 'ALSHEHRI, SAAD K', 65.13, 20),
(795063, 'ALSHIHA, AHMED S', 49.42, 37),
(795076, 'ALROQAIE, ABDULAZIZ A', 75.42, 7),
(797426, 'ALGHAMDI, ABDULAZIZ O', 58, 24),
(797442, 'ALOTAIBI, ABDULLAH H', 44.96, 42),
(797489, 'ALHAJRI, ABDULLAH M', 45.92, 38),
(888000, 'ALHAJRI, KHALID D', 73.54, 10),
(780567, 'SALEH, ABDULRAHMAN R', 49.5, 31),
(780847, 'ALMALEKI, HESHAM A', 62.13, 21),
(781296, 'ALDUGHAITHER, YAZEED R', 41.42, 44),
(788805, 'ALQAHTANI, ABDULAZIZ D', 44.04, 40),
(788818, 'ALEIDHI, ABDULAZIZ A', 76.67, 6),
(788836, 'ALSHAMMARI, HAMED M', 47.63, 32),
(789510, 'HASHIM, AHMED O', 65.25, 19),
(790085, 'SOLAMI, MAHER H', 46.21, 39),
(790171, 'ALZAHRANI, SHAIG H', 70.5, 12),
(790462, 'ALAHMAD, BADER M', 48.13, 35),
(790546, 'ALBASSAM, ABDULLAH M', 75.75, 4),
(792375, 'ALZAHRANI, ABDULLAH A', 41.71, 45),
(792429, 'MALIBARI, MAHER I', 66, 18),
(792717, 'ALHELAL, RAID A', 49.63, 30),
(272941, 'ALENIZI, FAYEZ R', 77.25, 2),
(780776, 'ALDOSSARY, MAJED A', 58.21, 25),
(781096, 'ALKHALAF, ABDULLAH A', 67.5, 15),
(785001, 'BALHARETH, TURKI M', 45.13, 36),
(785020, 'ALSHAMMARI, MESHARI F', 72.75, 8),
(785026, 'ALENEZI, FAHAD A', 78.71, 1),
(785826, 'ALDAWSARI, SALLAL A', 53, 26),
(788076, 'ALAHMADI., RAYAN K', 40.63, 43),
(788092, 'ALNUTIFAT, MESFER A', 71.58, 11),
(788123, 'ALHAJRI, SAAD G', 45.88, 34),
(788137, 'ALKUHAILI, AHMED A', 73.5, 3),
(788204, 'ALAMEER, ADEL A', 51.13, 28),
(808586, 'MARZOOQ, SALEH Y', 67.08, 16),
(280530, 'EISA, ABDULLAH H', 41.38, 41),
(747712, 'ALJINDAN, KHALID A', 72.33, 9),
(761637, 'MOUSA, MOHAMMAD A', 50.75, 27);

-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

DROP TABLE IF EXISTS `sign_in`;
CREATE TABLE IF NOT EXISTS `sign_in` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sign_in`
--

INSERT INTO `sign_in` (`email`, `password`) VALUES
('07yahala@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
