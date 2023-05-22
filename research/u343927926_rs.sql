
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 09:11 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u343927926_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_a`
--

CREATE TABLE IF NOT EXISTS `forum_a` (
  `qn` int(11) NOT NULL,
  `usn` varchar(12) NOT NULL,
  `ans` varchar(500) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_a`
--

INSERT INTO `forum_a` (`qn`, `usn`, `ans`, `dt`) VALUES
(1, 'Admin', 'Reply 1 to Question 1', '2016-11-15 23:51:46'),
(2, 'Admin', 'Reply 1 to Question 2', '2016-11-16 10:09:48'),
(1, 'Admin', 'Reply 2 to Question 1', '2016-11-18 03:12:21'),
(1, '1BM15CS001', 'Reply 3 to Question 1', '2016-11-25 19:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `forum_q`
--

CREATE TABLE IF NOT EXISTS `forum_q` (
  `qn` int(11) NOT NULL AUTO_INCREMENT,
  `usn` varchar(12) NOT NULL,
  `tt` varchar(50) NOT NULL,
  `qut` varchar(300) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`qn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `forum_q`
--

INSERT INTO `forum_q` (`qn`, `usn`, `tt`, `qut`, `dt`) VALUES
(1, 'Admin', 'Q 1', 'Question 1 ?', '2016-11-15 23:52:12'),
(2, 'Admin', 'Q 2', 'Question 2 ?', '2016-11-16 10:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE IF NOT EXISTS `login_users` (
  `userType` varchar(15) NOT NULL,
  `usn` varchar(12) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`userType`, `usn`, `userPassword`) VALUES
('scholar', '1BM15CS001', '1BM15CS001'),
('scholar', '1BM15CS002', '1BM15CS002'),
('admin', 'admin', 'admin'),
('hod', 'ED123', 'hod'),
('rh', 'ED456', 'rh');

-- --------------------------------------------------------

--
-- Table structure for table `pub_details`
--

CREATE TABLE IF NOT EXISTS `pub_details` (
  `title` varchar(40) NOT NULL,
  `rarea` varchar(300) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `dop` date NOT NULL,
  `usn` varchar(12) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pub_details`
--

INSERT INTO `pub_details` (`title`, `rarea`, `cname`, `dop`, `usn`, `ID`) VALUES
('Title 2', 'Area 2', 'Name 2', '2016-11-02', '1BM15CS002', 6),
('Title 1', 'Area 1', 'Name 1', '2016-11-01', '1BM15CS001', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rch_details`
--

CREATE TABLE IF NOT EXISTS `rch_details` (
  `yearj` date NOT NULL,
  `nopub` int(11) NOT NULL,
  `norep` int(11) NOT NULL,
  `usn` varchar(12) NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rch_details`
--

INSERT INTO `rch_details` (`yearj`, `nopub`, `norep`, `usn`) VALUES
('2014-08-01', 1, 7, '1BM15CS001'),
('2015-09-02', 1, 10, '1BM15CS002'),
('2003-07-15', 0, 0, 'ED123'),
('2005-07-12', 0, 0, 'ED456');

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE IF NOT EXISTS `scholar` (
  `name` varchar(30) NOT NULL,
  `qual` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `post` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `eid` varchar(30) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `addr1` varchar(100) NOT NULL,
  `pcode` int(11) NOT NULL,
  `usn` varchar(12) NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`name`, `qual`, `dept`, `post`, `sex`, `dob`, `eid`, `mob`, `addr1`, `pcode`, `usn`) VALUES
('Person1', 'BE', 'CSE', 'Student', 'male', '1997-12-09', 'fakeemail@id.com', 9876543210, '# ADDRESS', 560019, '1BM15CS001'),
('Person2', 'BE', 'ISE', 'Student', 'male', '1997-10-14', 'fakeemail@id.com', 9876543210, '# ADDRESS', 560019, '1BM15CS002'),
('Admin', '', '', '', '', '', '', 0, '', 0, 'admin'),
('Person3 ', 'PHD', 'CSE', 'HOD', 'male', '1965-12-14', 'xxxxxxx@xxx.xxx', 9876543210, '# ADDRESS', 560019, 'ED123'),
('Person4', 'PHD', 'CSE', 'Research Head', 'male', '1965-10-14', 'xxxxxxx@xxx.xxx', 9876543210, '# ADDRESS', 560019, 'ED456');

-- --------------------------------------------------------

--
-- Table structure for table `updts`
--

CREATE TABLE IF NOT EXISTS `updts` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `updt` varchar(2000) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `updts`
--

INSERT INTO `updts` (`sn`, `updt`) VALUES
(4, 'This website is given as project to us. This project is based on Research Scholar Details Management.'),
(5, 'This project uses some features of bootstrap.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
