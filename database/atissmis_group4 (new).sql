-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2013 at 03:17 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atissmis_group4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblallassessment`
--

CREATE TABLE IF NOT EXISTS `tblallassessment` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldEnrollmentNo` varchar(255) NOT NULL,
  `fldStudentNo` varchar(255) NOT NULL,
  `fldAssessmentName` varchar(200) NOT NULL,
  `fldOriginalAmount` double NOT NULL,
  `fldOriginalBalance` double NOT NULL,
  `fldAssessmentAmount` double NOT NULL,
  `fldAdvancedPayment` double NOT NULL,
  `fldAssessmentNo` int(11) NOT NULL,
  PRIMARY KEY (`fldId`),
  UNIQUE KEY `fldId` (`fldId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1650 ;

--
-- Dumping data for table `tblallassessment`
--

INSERT INTO `tblallassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldAssessmentNo`) VALUES
(758, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 2000, 2000, 0, 1),
(759, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 1000, 0, 1),
(760, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 50, 0, 1),
(761, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 1000, 0, 1),
(763, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 500, 0, 1),
(1605, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 0, 0, 0, 2),
(1606, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 999, 100, 0, 2),
(1607, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 0, 2),
(1608, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 100, 0, 2),
(1609, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 2),
(1610, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 990, 100, 0, 3),
(1611, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 3),
(1612, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 0, 3),
(1613, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 999, 100, 0, 3),
(1614, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 909, 100, 0, 4),
(1615, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 990, 100, 0, 4),
(1616, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 450, 50, 0, 4),
(1617, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 0, 4),
(1618, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 980, 100, 0, 5),
(1619, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 440, 50, 0, 5),
(1620, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 40, 5, 5, 5),
(1621, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 819, 100, 0, 5),
(1622, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 809, 100, 0, 6),
(1623, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 35, 5, 0, 6),
(1624, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 390, 50, 0, 6),
(1625, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 970, 100, 0, 6),
(1626, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 340, 50, 0, 7),
(1627, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 870, 100, 0, 7),
(1628, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 30, 5, 0, 7),
(1629, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 709, 100, 0, 7),
(1630, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 609, 100, 0, 8),
(1631, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 25, 5, 0, 8),
(1632, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 900, 100, 0, 8),
(1633, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 290, 50, 0, 8),
(1634, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 450, 50, 0, 9),
(1635, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 800, 100, 0, 9),
(1636, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 20, 5, 0, 9),
(1637, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 509, 100, 0, 9),
(1638, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 409, 100, 0, 10),
(1639, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 15, 5, 0, 10),
(1640, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 700, 100, 0, 10),
(1641, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 400, 50, 0, 10),
(1642, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 350, 50, 0, 11),
(1643, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 600, 100, 0, 11),
(1644, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 10, 5, 0, 11),
(1645, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 309, 100, 0, 11),
(1646, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 350, 50, 0, 12),
(1647, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 600, 100, 0, 12),
(1648, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 10, 5, 0, 12),
(1649, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 309, 100, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblallsubjects`
--

CREATE TABLE IF NOT EXISTS `tblallsubjects` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldSubCode` varchar(255) NOT NULL,
  `fldSubName` varchar(255) NOT NULL,
  `fldSubUnit` double NOT NULL,
  `fldSubYearLevel` varchar(255) NOT NULL,
  PRIMARY KEY (`fldId`),
  UNIQUE KEY `fldSubCode` (`fldSubCode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblallsubjects`
--

INSERT INTO `tblallsubjects` (`fldId`, `fldSubCode`, `fldSubName`, `fldSubUnit`, `fldSubYearLevel`) VALUES
(1, 'eng1', 'English I', 1, 'First Year'),
(2, 'math1', 'Math I', 1, 'First Year'),
(3, 'fil1', 'Filipino I', 1, 'First Year'),
(4, 'aral1', 'Araling Panlipunan I', 1, 'First Year'),
(5, 'tle1', 'T.L.E 1', 0.5, 'First Year'),
(6, 'sci1', 'Science I', 1, 'First Year'),
(7, 'val1', 'Values I', 0.5, 'First Year'),
(8, 'map1', 'MAPEH I', 0.5, 'First Year');

-- --------------------------------------------------------

--
-- Table structure for table `tblamountperassessment`
--

CREATE TABLE IF NOT EXISTS `tblamountperassessment` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldEnrollmentNo` varchar(255) NOT NULL,
  `fldStudentNo` varchar(255) NOT NULL,
  `fldAssessmentName` varchar(255) NOT NULL,
  `fldOriginalAmount` double NOT NULL,
  `fldOriginalBalance` double NOT NULL,
  `fldAssessmentAmount` double NOT NULL,
  `fldAdvancedPayment` double NOT NULL,
  `fldToBePaid` int(11) NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tblamountperassessment`
--

INSERT INTO `tblamountperassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldToBePaid`) VALUES
(38, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 0, 0, 0, 10),
(23, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 100, 0, 10),
(22, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 0, 10),
(21, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 100, 0, 10),
(43, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 10),
(42, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 50, 5, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblassissment`
--

CREATE TABLE IF NOT EXISTS `tblassissment` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldEnrollmentNo` varchar(255) NOT NULL,
  `fldStudentNum` varchar(255) NOT NULL,
  `fldAssessmentName` varchar(255) NOT NULL,
  `fldOriginalAmount` double NOT NULL,
  `fldAssessmentPaid` double NOT NULL,
  `fldBalance` double NOT NULL,
  `fldAdvancedPayment` double NOT NULL,
  `fldAssessmentCounter` int(11) NOT NULL,
  `fldModeOfPayment` varchar(255) NOT NULL,
  PRIMARY KEY (`fldId`),
  UNIQUE KEY `fldId` (`fldId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1057 ;

--
-- Dumping data for table `tblassissment`
--

INSERT INTO `tblassissment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNum`, `fldAssessmentName`, `fldOriginalAmount`, `fldAssessmentPaid`, `fldBalance`, `fldAdvancedPayment`, `fldAssessmentCounter`, `fldModeOfPayment`) VALUES
(1045, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 2000, 0, 0, 2, 'Monthly'),
(1046, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 691, 309, 0, 11, 'Monthly'),
(1047, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 40, 10, 0, 11, 'Monthly'),
(1048, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 400, 600, 0, 11, 'Monthly'),
(1050, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 150, 350, 0, 11, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `tblenrolldata`
--

CREATE TABLE IF NOT EXISTS `tblenrolldata` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fld_Enrollment_Id` varchar(255) NOT NULL,
  `fld_Student_Num` varchar(255) NOT NULL,
  `fld_School_Year` varchar(50) NOT NULL,
  `fld_Grade_Year_Level` varchar(100) NOT NULL,
  `fld_Section` varchar(20) NOT NULL,
  `fld_Adviser` varchar(255) NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tblenrolldata`
--

INSERT INTO `tblenrolldata` (`fldId`, `fld_Enrollment_Id`, `fld_Student_Num`, `fld_School_Year`, `fld_Grade_Year_Level`, `fld_Section`, `fld_Adviser`) VALUES
(27, 'EN-2013-2014-1', '2013-0003', '2013-2014', 'First Year', 'NOT YET POH', 'WA PA');

-- --------------------------------------------------------

--
-- Table structure for table `tblfor_fees`
--

CREATE TABLE IF NOT EXISTS `tblfor_fees` (
  `fldFeeId` int(11) NOT NULL AUTO_INCREMENT,
  `fldFeeDescription` varchar(100) NOT NULL,
  `fldFeeAmount` float NOT NULL,
  `fldFeeCategory` varchar(15) NOT NULL,
  PRIMARY KEY (`fldFeeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblfor_fees`
--

INSERT INTO `tblfor_fees` (`fldFeeId`, `fldFeeDescription`, `fldFeeAmount`, `fldFeeCategory`) VALUES
(1, 'Entrance', 2000, 'First Year'),
(2, 'Books', 1000, 'First Year'),
(3, 'BSP/GSP', 50, 'First Year'),
(5, 'Laboratory', 1000, 'First Year'),
(7, 'Step', 50, 'First Year'),
(10, 'Graduation fee', 500, 'First Year');

-- --------------------------------------------------------

--
-- Table structure for table `tblimages`
--

CREATE TABLE IF NOT EXISTS `tblimages` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldFileName` varchar(255) NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblimages`
--

INSERT INTO `tblimages` (`fldId`, `fldFileName`) VALUES
(1, '../images/bg-block.gif');

-- --------------------------------------------------------

--
-- Table structure for table `tblnextassessment`
--

CREATE TABLE IF NOT EXISTS `tblnextassessment` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldEnrollmentNo` varchar(255) NOT NULL,
  `fldStudentNo` varchar(255) NOT NULL,
  `fldAssessmentName` varchar(255) NOT NULL,
  `fldOriginalAmount` double NOT NULL,
  `fldOriginalBalance` double NOT NULL,
  `fldAssessmentAmount` double NOT NULL,
  `fldAdvancedPayment` double NOT NULL,
  `fldAssessmentNo` int(11) NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=716 ;

--
-- Dumping data for table `tblnextassessment`
--

INSERT INTO `tblnextassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldAssessmentNo`) VALUES
(708, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 350, 50, 0, 12),
(709, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 600, 100, 0, 12),
(710, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 10, 5, 0, 12),
(711, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 309, 100, 0, 12),
(715, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 309, 100, 0, 13),
(714, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 10, 5, 0, 13),
(713, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 600, 100, 0, 13),
(712, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 350, 50, 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentbreakdown`
--

CREATE TABLE IF NOT EXISTS `tblpaymentbreakdown` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldStudentNum` varchar(255) NOT NULL,
  `fldFeeName` varchar(100) NOT NULL,
  `fldAmountPaid` double NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=320 ;

--
-- Dumping data for table `tblpaymentbreakdown`
--

INSERT INTO `tblpaymentbreakdown` (`fldId`, `fldTransactionNo`, `fldStudentNum`, `fldFeeName`, `fldAmountPaid`) VALUES
(220, 'TN-2013-2014-1', '2013-0003', 'Entrance', 2000),
(221, 'TN-2013-2014-1', '2013-0003', 'Books', 0),
(222, 'TN-2013-2014-1', '2013-0003', 'BSP/GSP', 0),
(223, 'TN-2013-2014-1', '2013-0003', 'Laboratory', 0),
(224, 'TN-2013-2014-1', '2013-0003', 'Step', 0),
(268, 'TN-2013-2014-38', '2013-0003', 'Laboratory', 0),
(276, 'TN-2013-2014-59', '2013-0003', 'BSP/GSP', 0),
(277, 'TN-2013-2014-59', '2013-0003', 'Laboratory', 0),
(278, 'TN-2013-2014-59', '2013-0003', 'Books', 10),
(279, 'TN-2013-2014-59', '2013-0003', 'Graduation fee', 0),
(280, 'TN-2013-2014-60', '2013-0003', 'BSP/GSP', 0),
(281, 'TN-2013-2014-60', '2013-0003', 'Graduation fee', 0),
(282, 'TN-2013-2014-60', '2013-0003', 'Books', 1),
(283, 'TN-2013-2014-60', '2013-0003', 'Laboratory', 0),
(284, 'TN-2013-2014-60', '2013-0003', 'Laboratory', 10),
(285, 'TN-2013-2014-60', '2013-0003', 'Graduation fee', 0),
(286, 'TN-2013-2014-60', '2013-0003', 'BSP/GSP', 0),
(287, 'TN-2013-2014-60', '2013-0003', 'Books', 0),
(288, 'TN-2013-2014-60', '2013-0003', 'Books', 90),
(289, 'TN-2013-2014-60', '2013-0003', 'Laboratory', 0),
(290, 'TN-2013-2014-60', '2013-0003', 'BSP/GSP', 0),
(291, 'TN-2013-2014-60', '2013-0003', 'Graduation fee', 50),
(292, 'TN-2013-2014-63', '2013-0003', 'Laboratory', 10),
(293, 'TN-2013-2014-63', '2013-0003', 'Books', 90),
(294, 'TN-2013-2014-63', '2013-0003', 'BSP/GSP', 10),
(295, 'TN-2013-2014-63', '2013-0003', 'Graduation fee', 10),
(296, 'TN-2013-2014-64', '2013-0003', 'BSP/GSP', 5),
(297, 'TN-2013-2014-64', '2013-0003', 'Graduation fee', 50),
(298, 'TN-2013-2014-64', '2013-0003', 'Laboratory', 10),
(299, 'TN-2013-2014-64', '2013-0003', 'Books', 10),
(300, 'TN-2013-2014-65', '2013-0003', 'Graduation fee', 50),
(301, 'TN-2013-2014-65', '2013-0003', 'Laboratory', 100),
(302, 'TN-2013-2014-65', '2013-0003', 'Books', 100),
(303, 'TN-2013-2014-65', '2013-0003', 'BSP/GSP', 5),
(304, 'TN-2013-2014-66', '2013-0003', 'Books', 100),
(305, 'TN-2013-2014-66', '2013-0003', 'BSP/GSP', 5),
(306, 'TN-2013-2014-66', '2013-0003', 'Graduation fee', 50),
(307, 'TN-2013-2014-66', '2013-0003', 'Laboratory', 100),
(308, 'TN-2013-2014-67', '2013-0003', 'Graduation fee', 50),
(309, 'TN-2013-2014-67', '2013-0003', 'BSP/GSP', 5),
(310, 'TN-2013-2014-67', '2013-0003', 'Laboratory', 100),
(311, 'TN-2013-2014-67', '2013-0003', 'Books', 100),
(312, 'TN-2013-2014-67', '2013-0003', 'Books', 100),
(313, 'TN-2013-2014-67', '2013-0003', 'Laboratory', 100),
(314, 'TN-2013-2014-67', '2013-0003', 'BSP/GSP', 5),
(315, 'TN-2013-2014-67', '2013-0003', 'Graduation fee', 50),
(316, 'TN-2013-2014-69', '2013-0003', 'Graduation fee', 50),
(317, 'TN-2013-2014-69', '2013-0003', 'Laboratory', 100),
(318, 'TN-2013-2014-69', '2013-0003', 'Books', 100),
(319, 'TN-2013-2014-69', '2013-0003', 'BSP/GSP', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentcashflow`
--

CREATE TABLE IF NOT EXISTS `tblpaymentcashflow` (
  `fldId` int(11) NOT NULL AUTO_INCREMENT,
  `fldTransactionNo` varchar(255) NOT NULL,
  `fldStudentNum` varchar(255) NOT NULL,
  `fldDate` varchar(100) NOT NULL,
  `fldTotalAmount` double NOT NULL,
  `fldAmountTendered` double NOT NULL,
  `fldType` varchar(20) NOT NULL,
  PRIMARY KEY (`fldId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tblpaymentcashflow`
--

INSERT INTO `tblpaymentcashflow` (`fldId`, `fldTransactionNo`, `fldStudentNum`, `fldDate`, `fldTotalAmount`, `fldAmountTendered`, `fldType`) VALUES
(37, 'TN-2013-2014-1', '2013-0003', '4/22/2013', 2000, 2000, 'Cash'),
(59, 'TN-2013-2014-59', '2013-0003', '3/29/2013', 10, 10, 'Cash'),
(60, 'TN-2013-2014-60', '2013-0003', '3/29/2013', 1, 2, 'Cash'),
(61, 'TN-2013-2014-60', '2013-0003', '3/29/2013', 10, 10, 'Cash'),
(62, 'TN-2013-2014-60', '2013-0003', '3/29/2013', 140, 140, 'Cash'),
(63, 'TN-2013-2014-63', '2013-0003', '3/29/2013', 120, 120, 'Cash'),
(64, 'TN-2013-2014-64', '2013-0003', '3/29/2013', 75, 75, 'Cash'),
(65, 'TN-2013-2014-65', '2013-0003', '3/29/2013', 255, 255, 'Cash'),
(66, 'TN-2013-2014-66', '2013-0003', '3/29/2013', 255, 255, 'Cash'),
(67, 'TN-2013-2014-67', '2013-0003', '3/29/2013', 255, 255, 'Cash'),
(68, 'TN-2013-2014-67', '2013-0003', '3/29/2013', 255, 255, 'Cash'),
(69, 'TN-2013-2014-69', '2013-0003', '3/29/2013', 255, 255, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentrecord`
--

CREATE TABLE IF NOT EXISTS `tblstudentrecord` (
  `fldID` int(11) NOT NULL AUTO_INCREMENT,
  `fldStudent_No` varchar(255) NOT NULL,
  `fldStud_FirstName` varchar(100) NOT NULL,
  `fldStud_MiddleName` varchar(100) NOT NULL,
  `fldStud_LastName` varchar(100) NOT NULL,
  `fldBirthDate` date NOT NULL,
  `fldBirthPlace` varchar(200) NOT NULL,
  `fldGender` varchar(7) NOT NULL,
  `fldAddress` varchar(200) NOT NULL,
  `fldZipCode` varchar(10) NOT NULL,
  `fldContact_No` varchar(13) NOT NULL,
  `fldSY_Entered` varchar(15) NOT NULL,
  `fldGrade_Year_Lvl_Entered` varchar(10) NOT NULL,
  `fldGeneral_Average` float NOT NULL,
  `fldParent_Guardian` varchar(100) NOT NULL,
  `fldDate_Created` varchar(100) NOT NULL,
  `fldBy_Whom` varchar(100) NOT NULL,
  `fldStudent_Status` varchar(100) NOT NULL,
  `fldProfile_Pic` varchar(255) NOT NULL,
  PRIMARY KEY (`fldID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblstudentrecord`
--

INSERT INTO `tblstudentrecord` (`fldID`, `fldStudent_No`, `fldStud_FirstName`, `fldStud_MiddleName`, `fldStud_LastName`, `fldBirthDate`, `fldBirthPlace`, `fldGender`, `fldAddress`, `fldZipCode`, `fldContact_No`, `fldSY_Entered`, `fldGrade_Year_Lvl_Entered`, `fldGeneral_Average`, `fldParent_Guardian`, `fldDate_Created`, `fldBy_Whom`, `fldStudent_Status`, `fldProfile_Pic`) VALUES
(1, '2013-0003', 'Ramel', 'Relampagos', 'Coletana', '1996-04-23', 'Merida, Leyte', 'male', 'Capasanan, San Isidro, Merida,Leyte', '6540', '09091289827', '2013-2014', 'First Year', 65, 'Ramonito Colitana', '2013-01-23', 'Ramel Coletana', 'enrolled', ''),
(2, '', 'dfdfdfd', 'dfd', 'dfdd', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE IF NOT EXISTS `tbluseraccount` (
  `flduserID` varchar(50) NOT NULL,
  `fldfullName` varchar(50) NOT NULL,
  `fldpassword` varchar(20) NOT NULL,
  `flduserType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`flduserID`, `fldfullName`, `fldpassword`, `flduserType`) VALUES
('12', 'test', 'jwhqtk', 'jhfk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `fld_EnrollmentId` varchar(255) NOT NULL,
  `fld_Student_Num` varchar(255) NOT NULL,
  `fld_Subject_Id` varchar(50) NOT NULL,
  `fld_subject_Name` varchar(100) NOT NULL,
  `fld_first_grading_period` double NOT NULL,
  `fld_second_grading_period` double NOT NULL,
  `fld_third_grading_period` double NOT NULL,
  `fld_fourth_grading_period` double NOT NULL,
  `fld_Subject_Unit` double NOT NULL,
  `fld_subject_teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`fld_EnrollmentId`, `fld_Student_Num`, `fld_Subject_Id`, `fld_subject_Name`, `fld_first_grading_period`, `fld_second_grading_period`, `fld_third_grading_period`, `fld_fourth_grading_period`, `fld_Subject_Unit`, `fld_subject_teacher`) VALUES
('EN-2013-2014-1', '2013-0003', 'eng1', 'English I', 0, 0, 0, 0, 1, ''),
('EN-2013-2014-1', '2013-0003', 'math1', 'Math I', 0, 0, 0, 0, 1, ''),
('EN-2013-2014-1', '2013-0003', 'fil1', 'Filipino I', 0, 0, 0, 0, 1, ''),
('EN-2013-2014-1', '2013-0003', 'aral1', 'Araling Panlipunan I', 0, 0, 0, 0, 1, ''),
('EN-2013-2014-1', '2013-0003', 'tle1', 'T.L.E 1', 0, 0, 0, 0, 0.5, ''),
('EN-2013-2014-1', '2013-0003', 'sci1', 'Science I', 0, 0, 0, 0, 1, ''),
('EN-2013-2014-1', '2013-0003', 'val1', 'Values I', 0, 0, 0, 0, 0.5, ''),
('EN-2013-2014-1', '2013-0003', 'map1', 'MAPEH I', 0, 0, 0, 0, 0.5, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
