-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 11:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reload_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`, `dept_status`, `reload_status`) VALUES
(1, 'IT', '2019-09-08 12:24:05', 1),
(2, 'CSE', '2019-09-05 14:42:54', 1),
(3, 'Technology Center', '2019-09-11 11:13:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dept_flash`
--

DROP TABLE IF EXISTS `dept_flash`;
CREATE TABLE IF NOT EXISTS `dept_flash` (
  `dept_id` int(11) NOT NULL,
  `flash_news` varchar(350) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time` time NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_flash`
--

INSERT INTO `dept_flash` (`dept_id`, `flash_news`, `status`, `time`, `time_stamp`) VALUES
(3, 'hwo ylmam kl nlkm', 0, '10:20:00', '2019-09-09 04:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `flash`
--

DROP TABLE IF EXISTS `flash`;
CREATE TABLE IF NOT EXISTS `flash` (
  `flash_id` int(11) NOT NULL AUTO_INCREMENT,
  `flash` varchar(250) NOT NULL,
  PRIMARY KEY (`flash_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flash`
--

INSERT INTO `flash` (`flash_id`, `flash`) VALUES
(1, 'HAPPY TEACHERS DAY');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `sno` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `news` varchar(250) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`sno`, `date`, `news`) VALUES
(61, '2019-08-19', 'Ram Bhadri Raju of Mechanical Engineering awarded with PhD in Mechanical Engineering from KL University 19-August-2019'),
(64, '2019-07-30', '400 Students of SRKR have taken the TCS Ninja Online Exam @ Technology Centre & GCC. '),
(65, '2019-08-10', ' 2-Week Workshop on Machine Learning & Deep Learning for Faculty to be organized by IT Department in November 2019.'),
(66, '2019-08-27', 'Md. Mahaboobunnisa of 4/4 CSE makes it to TOP 10 of Grand Final of Master Orator Chamionship 2019. (Total Participants: 3300+) '),
(67, '2019-09-04', 'Dr. Brahma Raju garu, HOD Mech Dept received ITC-2019 Excellence Award @ Indian Technology Congress 2019 at Bangalore.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Sno` int(3) NOT NULL AUTO_INCREMENT,
  `userid` varchar(25) NOT NULL,
  `passwd` varchar(25) NOT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Sno`, `userid`, `passwd`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
