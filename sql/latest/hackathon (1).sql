-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2019 at 02:09 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'e3274be5c857fb42ab72d786e281b4b8');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `q_id`, `answer`, `teacher_id`, `likes`) VALUES
(1, 2, 'A stored procedure is a set of Structured Query Language (SQL) statements with an assigned name, which are stored in a relational database management system as a group, so it can be reused and shared by multiple programs.\r\n', 'nisha123', 4),
(3, 3, ' create trigger [trigger_name]: Creates or replaces an existing trigger with the trigger_name.\r\n[before | after]: This specifies when the trigger will be executed.\r\n{insert | update | delete}: This specifies the DML operation.\r\non [table_name]: This specifies the name of the table associated with the trigger.\r\n[for each row]: This specifies a row-level trigger, i.e., the trigger will be executed for each row being affected.\r\n[trigger_body]: This provides the operation to be performed as trigger is fired', 'nisha123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` varchar(25) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `branch`, `semester`) VALUES
('CSE06A', 'cse', 6),
('CSE07A', 'CSE', 7),
('CSE05A', 'CSE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `collegeadmin`
--

DROP TABLE IF EXISTS `collegeadmin`;
CREATE TABLE IF NOT EXISTS `collegeadmin` (
  `college_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegeadmin`
--

INSERT INTO `collegeadmin` (`college_id`, `password`, `name`, `email`, `phone`, `address`) VALUES
('msec123', 'msec123', 'M. S. Engineering College', 'msec.college@msec.ac.in', 7876765643, 'Sadahalli Gate, Banglaore, karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `notes_id` int(25) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(25) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`notes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `teacher_id`, `url`, `description`, `subject_id`, `rating`, `downloads`, `title`) VALUES
(1, 'nisha123', 'pdf/dbms.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '15CS53', 5, 6, 'DBMS all modules notes'),
(2, 'Prashanth123', 'pdf/final_report_new-1', 'first modeules notes', '15CS54', 0, 0, 'ATC'),
(3, 'nisha123', 'pdf/PDF_1507650466312_(1)', 'second modules notes', '15CS54', 0, 0, 'ATC');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE IF NOT EXISTS `query` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(25) NOT NULL,
  `query` text NOT NULL,
  `usn` varchar(15) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`q_id`, `subject_id`, `query`, `usn`) VALUES
(2, '15CS53', 'What are stored procedures', '1ME15CS028'),
(3, '15CS53', 'How to create a trigger in phpmyadmin', '1ME15CS028'),
(4, '15CS52', 'what is difference between TCP and IP', '1ME15CS028');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `usn` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `college_id` varchar(25) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  PRIMARY KEY (`usn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `password`, `name`, `email`, `phone`, `address`, `college_id`, `class_id`) VALUES
('1ME15CS028', '4122ea4f5490094a33d7cdba65136cf8', 'Himanshu Goswami', 'goswami.himanshu1807@gmail.com', 8587997151, 'T-241/A1 PATEL NAGAR', 'msec123', 'CSE05A'),
('1ME15CS042', 'd8052f9e09a17e6907629e76bbd261cc', 'Mohit Sinha', 'mohit@gmail.com', 4587521456, 'h no=3,patana', 'msec123', 'CSE07A'),
('1ME15CS047', 'bd8fe2cfe193ab507dbc4a2aecca0599', 'Nandan Chaudhary', 'nandan@gmail.com', 8456654123, 'villa no 2,BTM lAYOUT', 'msec123', 'CSE07A'),
('1ME15CS058', ' 63dd3e154ca6d948fc380fa576343ba6', 'Ravi Sukla', 'ravisukhla140@gmail.com', 6001245, 'house no=8,shiv mandir,jammu', 'msec123', 'CSE07A');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(20) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `semester`, `branch`) VALUES
('15CS51', 'Management & Interprenuership For IT Industry', 5, 'CSE'),
('15CS52', 'Computer Networks', 5, 'CSE'),
('15CS53', 'DBMS', 5, 'CSE'),
('15CS54', 'ATC', 5, 'CSE'),
('15CS553', 'Advance Java & J2EE', 5, 'CSE'),
('15CS562', 'Artificial Intelligence', 5, 'CSE'),
('15CS71', 'Web Technology & Application', 7, 'CSE'),
('15CS72', 'Advance Computer Architecture', 7, 'CSE'),
('15CS73', 'Machine Learning', 7, 'CSE'),
('15CS741', 'Natural Language Processing', 7, 'CSE'),
('15CS753', 'Digital Image Processing', 7, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `college_id` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `password`, `email`, `phone`, `college_id`, `name`) VALUES
('Aruna123', 'd3a28ff91cb58754c40f63161ae5e028', 'aruna@gmail.com', 89767865479, 'msec123', 'Aruna M G'),
('Bhavin123', 'de6b0c87d96dffad0b8b4deb59060d07', 'bhavin@gmail.com', 9876785643, 'msec123', 'Bhavin Kumar'),
('Divya123', '2cdd7064b290132617248dbfd85f740e', 'Divya@gmail.com', 6786875856, 'msec123', 'Divya  K S'),
('Manasha123', 'f07b517e38bb45964680314f841aafd1', 'manasha@gmail.com', 8887765467, 'msec123', 'Manasha C M'),
('nisha123', 'a9f56b7ece2113c9c4a1214a19ede99c', 'nisha@gmail.com', 8987676545, 'msec123', 'Nisha Chaudhary'),
('Prashanth123', 'c2da11b73b17d7e4e310d8a8d744a49c', 'prashanth@gmail.com', 9876876543, 'msec123', 'Prashanth P V');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
