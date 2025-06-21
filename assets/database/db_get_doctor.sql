-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2024 at 11:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_get_doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AID` int NOT NULL AUTO_INCREMENT,
  `APHOTO` longblob NOT NULL,
  `ANAME` varchar(25) NOT NULL,
  `APASSWORD` varchar(20) NOT NULL,
  `AEMAIL` varchar(35) NOT NULL,
  `ALAST_PASSWORD_CHANGE` date NOT NULL,
  `ANUMBER` varchar(10) NOT NULL,
  `AADDRESS` varchar(50) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `APHOTO`, `ANAME`, `APASSWORD`, `AEMAIL`, `ALAST_PASSWORD_CHANGE`, `ANUMBER`, `AADDRESS`) VALUES
(2, 0x61646d696e2d332e6a7067, 'sahil', 'sahiladmin78', 'sahilpatel78@gmail.com', '2024-04-29', '9313166545', 'kuvara'),
(1, 0x61646d696e2d312e6a7067, 'kevin', 'kevinadmin68', 'kevinpatel68@gmail.com', '2024-04-29', '7862878931', 'deesa'),
(3, 0x61646d696e2d342e6a7067, 'aastha', 'aasthaadmin129', 'aasthapatel78@gmail.com', '2024-04-29', '8735878808', 'siddhpur'),
(4, 0x61646d696e2d322e6a7067, 'mishwa', 'mishwaadmin73', 'mishwapatel73@gmail.com', '2024-04-29', '1234567890', 'patan');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `DID` int NOT NULL,
  `PID` int NOT NULL,
  `APPOINTMENT_DATE` date NOT NULL,
  `APPOINTMENT_TIME` time NOT NULL,
  `SID` int NOT NULL,
  `FEES` int NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `FEEDBACK` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ID`, `DID`, `PID`, `APPOINTMENT_DATE`, `APPOINTMENT_TIME`, `SID`, `FEES`, `STATUS`, `FEEDBACK`) VALUES
(1, 1, 6, '2024-03-27', '11:00:00', 2, 500, 1, 'Dr. Kevin provides exceptional care, with a compassionate bedside manner that reassures patients. His thoroughness and expertise make him a trusted healthcare provider.'),
(2, 1, 10, '2024-05-29', '11:30:00', 2, 500, 1, 'Dr. Kevin provides exceptional care with profound expertise, fostering a comfortable and trusting patient-doctor relationship.'),
(3, 2, 5, '2024-05-22', '05:00:00', 1, 500, 1, 'Dr. Sahil provided exceptional care, demonstrating deep expertise and compassion throughout my treatment.'),
(6, 2, 16, '2026-05-22', '16:30:00', 1, 500, 1, NULL),
(7, 4, 16, '2027-05-22', '15:30:00', 7, 500, 1, NULL),
(8, 3, 17, '2024-06-26', '16:00:00', 5, 500, 1, NULL),
(9, 3, 1, '2004-05-22', '13:30:00', 5, 500, 1, NULL),
(10, 3, 1, '2004-05-22', '13:30:00', 5, 500, 1, NULL),
(11, 1, 1, '2004-05-22', '13:30:00', 1, 500, 1, NULL),
(12, 1, 1, '2004-05-22', '13:00:00', 1, 500, 1, NULL),
(13, 2, 1, '2004-05-22', '13:30:00', 1, 500, 1, NULL),
(14, 1, 1, '2004-05-22', '13:30:00', 1, 500, 1, NULL),
(15, 2, 1, '2004-05-22', '13:30:00', 1, 500, 1, NULL),
(16, 2, 1, '2004-05-13', '13:30:00', 1, 500, 1, NULL),
(17, 1, 1, '2004-05-22', '13:30:00', 1, 500, 1, NULL),
(18, 2, 1, '2004-05-13', '13:30:00', 1, 500, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `DID` int NOT NULL AUTO_INCREMENT,
  `DPHOTO` longblob NOT NULL,
  `DNAME` varchar(35) NOT NULL,
  `DPASSWORD` varchar(20) NOT NULL,
  `DEMAIL` varchar(35) NOT NULL,
  `DGENDER` varchar(10) NOT NULL,
  `DNUMBER` varchar(10) NOT NULL,
  `DADDRESS` varchar(50) NOT NULL,
  `SID` int NOT NULL,
  `DDATE_OF_BIRTH` date NOT NULL,
  `DCONSULTATION_FEE` int NOT NULL,
  `DEXPERIENCE_YEARS` int NOT NULL,
  `DQUALIFICATION` varchar(50) NOT NULL,
  PRIMARY KEY (`DID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `DPHOTO`, `DNAME`, `DPASSWORD`, `DEMAIL`, `DGENDER`, `DNUMBER`, `DADDRESS`, `SID`, `DDATE_OF_BIRTH`, `DCONSULTATION_FEE`, `DEXPERIENCE_YEARS`, `DQUALIFICATION`) VALUES
(1, 0x74657374696d6f6e69616c732d342e6a7067, 'kevin', 'kevindoctor68', 'kevinpatel68@gmail.com', 'Male', '7862878931', 'deesa', 2, '2024-04-02', 500, 6, 'MBBS'),
(2, 0x74657374696d6f6e69616c732d352e6a7067, 'sahil', 'sahildoctor78', 'sahilpatel78@gmail.com', 'Male', '9313166545', 'kuvara', 1, '2024-02-22', 500, 5, 'MBBS'),
(3, 0x74657374696d6f6e69616c732d312e6a7067, 'kavan', 'kavandoctor67', 'kavanpatel67@gmail.com', 'Male', '1234567890', 'patan', 5, '2024-02-01', 400, 3, 'MBBS,12th'),
(4, 0x74657374696d6f6e69616c732d332e6a7067, 'aastha', 'aasthadoctor129', 'aasthapatel129@gmail.com', 'Female', '1593574562', 'siddhpur', 7, '2024-01-10', 400, 2, 'nursing'),
(5, 0x74657374696d6f6e69616c732d322e6a7067, 'mishwa', 'mishwadoctor73', 'mishwapatel73@gmail.com', 'Female', '7894561230', 'patan', 8, '2024-01-02', 450, 4, 'bhms');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `PID` int NOT NULL AUTO_INCREMENT,
  `PPHOTO` longblob,
  `PNAME` varchar(35) NOT NULL,
  `PPASSWORD` varchar(20) NOT NULL,
  `PEMAIL` varchar(35) NOT NULL,
  `PGENDER` varchar(10) NOT NULL,
  `PNUMBER` varchar(10) NOT NULL,
  `PADDRESS` varchar(50) NOT NULL,
  `PBLOOD_GROUP` varchar(3) NOT NULL,
  `PDATE_OF_BIRTH` date NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PID`, `PPHOTO`, `PNAME`, `PPASSWORD`, `PEMAIL`, `PGENDER`, `PNUMBER`, `PADDRESS`, `PBLOOD_GROUP`, `PDATE_OF_BIRTH`) VALUES
(4, 0x70617469656e74322e6a7067, 'sahil', 'sahilpatient', 'sahilpatel78@gmail.com', 'Male', '9313166545', 'kuvara', 'B+', '2024-04-02'),
(1, 0x70617469656e74312e6a706567, 'kevin', 'kevinpatient68', 'kevinpatel68@gmail.com', 'Male', '7862878931', 'deesa', 'O+', '2024-04-01'),
(5, 0x70617469656e74332e6a7067, 'aastha', 'aasthapatient129', 'aasthapatel129@gmail.com', 'Female', '2233223322', 'siddhpur', 'A+', '2024-04-03'),
(6, 0x70617469656e74342e6a7067, 'kavan', 'kavanpatient67', 'kavanpatel67@gmail.com', 'Male', '1234567890', 'patan', 'A+', '2024-04-01'),
(7, 0x70617469656e74352e6a7067, 'nimesh', 'nimeshpatient94', 'nimeshprajapati94@gmail.com', 'Male', '3216549871', 'sasam', 'B-', '2024-04-18'),
(8, 0x70617469656e74362e6a7067, 'mishwa', 'mishavapatient73', 'mishwapatel73@gmail.com', 'Female', '4561237891', 'patan', 'A-', '2024-04-12'),
(9, 0x70617469656e74372e6a7067, 'nirajari', 'nirajaripatient74', 'nirajaripatel74@gmail.com', 'Female', '7891234562', 'patan', 'A+', '2024-04-11'),
(10, 0x70617469656e74382e6a7067, 'ketan', 'ketanpatient90', 'ketanprajapati90@gmail.com', 'Male', '2583691473', 'palanpur', 'AB+', '2024-04-09'),
(16, 0x2070617469656e74362e6a706720, 'mayara', 'mayarapatient1', 'mayarapatient1@gmail.com', 'Female', '9922556633', 'kuvara', 'A+', '2004-05-22'),
(17, 0x2070617469656e74352e6a706720, 'nimesh', 'nimeshpatient93', 'nimeshprajapati@gmail.com', 'Male', '9925417316', 'sasam', 'A-', '2006-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PAYMENT_ID` int NOT NULL AUTO_INCREMENT,
  `PID` int NOT NULL,
  `DID` int NOT NULL,
  `AMOUNT` int NOT NULL,
  PRIMARY KEY (`PAYMENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

DROP TABLE IF EXISTS `specialization`;
CREATE TABLE IF NOT EXISTS `specialization` (
  `SID` int NOT NULL AUTO_INCREMENT,
  `SPECIALIZATION` varchar(35) NOT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`SID`, `SPECIALIZATION`) VALUES
(1, 'Cardiology'),
(2, 'Dermatology'),
(3, 'Neurology'),
(4, 'Otolaryngology'),
(5, 'Ophthalmology'),
(6, 'Radiology'),
(7, 'Psychiatry'),
(8, 'Orthopedics');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
