-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2013 at 12:27 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblamountperassessment`
--

INSERT INTO `tblamountperassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldToBePaid`) VALUES
(2, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 0, 0, 0, 10),
(3, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 100, 0, 10),
(4, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 0, 10),
(5, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 100, 0, 10),
(6, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 50, 5, 0, 10),
(7, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=907 ;

--
-- Dumping data for table `tblassissment`
--

INSERT INTO `tblassissment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNum`, `fldAssessmentName`, `fldOriginalAmount`, `fldAssessmentPaid`, `fldBalance`, `fldAdvancedPayment`, `fldAssessmentCounter`, `fldModeOfPayment`) VALUES
(901, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 2000, 0, 0, 1, 'Monthly'),
(902, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 0, 1000, 0, 1, 'Monthly'),
(903, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 0, 50, 0, 1, 'Monthly'),
(904, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 0, 1000, 0, 1, 'Monthly'),
(905, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 0, 50, 0, 1, 'Monthly'),
(906, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 0, 500, 0, 1, 'Monthly');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblenrolldata`
--

INSERT INTO `tblenrolldata` (`fldId`, `fld_Enrollment_Id`, `fld_Student_Num`, `fld_School_Year`, `fld_Grade_Year_Level`, `fld_Section`, `fld_Adviser`) VALUES
(3, 'EN-2013-2014-1', '2013-0003', '2013-2014', 'First Year', 'NOT YET POH', 'WA PA');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tblnextassessment`
--

INSERT INTO `tblnextassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldAssessmentNo`) VALUES
(80, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 3),
(77, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 61, 3),
(78, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 100, 0, 3),
(79, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 50, 5, 0, 3),
(76, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 100, 0, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `tblpaymentbreakdown`
--

INSERT INTO `tblpaymentbreakdown` (`fldId`, `fldTransactionNo`, `fldStudentNum`, `fldFeeName`, `fldAmountPaid`) VALUES
(76, 'TN-2013-2014-1', '2013-0003', 'Entrance', 2000),
(77, 'TN-2013-2014-1', '2013-0003', 'Books', 0),
(78, 'TN-2013-2014-1', '2013-0003', 'BSP/GSP', 0),
(79, 'TN-2013-2014-1', '2013-0003', 'Laboratory', 0),
(80, 'TN-2013-2014-1', '2013-0003', 'Step', 0),
(81, 'TN-2013-2014-1', '2013-0003', 'Graduation fee', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tblpaymentcashflow`
--

INSERT INTO `tblpaymentcashflow` (`fldId`, `fldTransactionNo`, `fldStudentNum`, `fldDate`, `fldTotalAmount`, `fldAmountTendered`, `fldType`) VALUES
(13, 'TN-2013-2014-1', '2013-0003', '4/15/2013', 2000, 2000, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tblpreparedassessment`
--

CREATE TABLE IF NOT EXISTS `tblpreparedassessment` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=631 ;

--
-- Dumping data for table `tblpreparedassessment`
--

INSERT INTO `tblpreparedassessment` (`fldId`, `fldTransactionNo`, `fldEnrollmentNo`, `fldStudentNo`, `fldAssessmentName`, `fldOriginalAmount`, `fldOriginalBalance`, `fldAssessmentAmount`, `fldAdvancedPayment`, `fldAssessmentNo`) VALUES
(614, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 2000, 2000, 0, 1),
(615, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 1000, 0, 1),
(616, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 50, 0, 1),
(617, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 1000, 0, 1),
(618, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 50, 50, 0, 1),
(619, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 500, 0, 1),
(620, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Entrance', 2000, 0, 0, 0, 2),
(621, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Books', 1000, 1000, 100, 0, 2),
(622, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'BSP/GSP', 50, 50, 5, 61, 2),
(623, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Laboratory', 1000, 1000, 100, 0, 2),
(624, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Step', 50, 50, 5, 0, 2),
(625, 'TN-2013-2014-1', 'EN-2013-2014-1', '2013-0003', 'Graduation fee', 500, 500, 50, 0, 2);

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
  PRIMARY KEY (`fldID`),
  UNIQUE KEY `fldStudent_No` (`fldStudent_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblstudentrecord`
--

INSERT INTO `tblstudentrecord` (`fldID`, `fldStudent_No`, `fldStud_FirstName`, `fldStud_MiddleName`, `fldStud_LastName`, `fldBirthDate`, `fldBirthPlace`, `fldGender`, `fldAddress`, `fldZipCode`, `fldContact_No`, `fldSY_Entered`, `fldGrade_Year_Lvl_Entered`, `fldGeneral_Average`, `fldParent_Guardian`, `fldDate_Created`, `fldBy_Whom`, `fldStudent_Status`) VALUES
(1, '2013-0003', 'Ramel', 'Relampagos', 'Coletana', '1996-04-23', 'Merida, Leyte', 'male', 'Capasanan, San Isidro, Merida,Leyte', '6540', '09091289827', '2013-2014', 'First Year', 65, 'Ramonito Colitana', '2013-01-23', 'Ramel Coletana', 'enrolled');

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
