-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2017 at 01:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AttendanceManager`
--

-- --------------------------------------------------------

--
-- Table structure for table `AS301`
--

CREATE TABLE `AS301` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AS301`
--

INSERT INTO `AS301` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN301`
--

CREATE TABLE `CEN301` (
  `RollNo` varchar(15) NOT NULL,
  `_04_12_17_12` int(11) DEFAULT '0',
  `_04_12_17_11` int(11) DEFAULT '0',
  `_04_12_13_11` int(11) DEFAULT '0',
  `_04_10_13_11` int(11) DEFAULT '0',
  `_02_10_13_11` int(11) DEFAULT '0',
  `_02_08_13_11` int(11) DEFAULT '0',
  `_02_09_13_11` int(11) DEFAULT '0',
  `_02_09_13_10` int(11) DEFAULT '0',
  `_02_09_13_9` int(11) DEFAULT '0',
  `_02_09_13_08` int(11) DEFAULT '0',
  `_02_09_13_07` int(11) DEFAULT '0',
  `_02_09_13_06` int(11) DEFAULT '0',
  `_02_07_13_06` int(11) DEFAULT '0',
  `_02_07_13_07` int(11) DEFAULT '0',
  `_02_07_13_08` int(11) DEFAULT '0',
  `_02_06_13_08` int(11) DEFAULT '0',
  `_02_06_13_09` int(11) DEFAULT '0',
  `_02_06_13_10` int(11) DEFAULT '0',
  `_02_06_13_11` int(11) DEFAULT '0',
  `_02_05_13_11` int(11) DEFAULT '0',
  `_02_05_13_12` int(11) DEFAULT '0',
  `_02_05_13_01` int(11) DEFAULT '0',
  `_02_05_13_02` int(11) DEFAULT '0',
  `_02_05_13_03` int(11) DEFAULT '0',
  `_02_05_13_04` int(11) DEFAULT '0',
  `_02_04_13_04` int(11) DEFAULT '0',
  `_02_04_13_05` int(11) DEFAULT '0',
  `_02_04_13_06` int(11) DEFAULT '0',
  `_02_04_13_07` int(11) DEFAULT '0',
  `_02_04_13_08` int(11) DEFAULT '0',
  `_02_03_13_08` int(11) DEFAULT '0',
  `_02_03_13_09` int(11) DEFAULT '0',
  `_02_03_13_10` int(11) DEFAULT '0',
  `_02_03_13_11` int(11) DEFAULT '0',
  `_02_03_13_12` int(11) DEFAULT '0',
  `_02_02_13_12` int(11) DEFAULT '0',
  `_02_02_13_01` int(11) DEFAULT '0',
  `_02_02_13_02` int(11) DEFAULT '0',
  `_02_02_13_03` int(11) DEFAULT '0',
  `_02_02_13_04` int(11) DEFAULT '0',
  `_02_02_13_05` int(11) DEFAULT '0',
  `_02_02_13_06` int(11) DEFAULT '0',
  `_02_01_13_06` int(11) DEFAULT '0',
  `_02_01_13_01` int(11) DEFAULT '0',
  `_02_01_13_02` int(11) DEFAULT '0',
  `_02_01_13_03` int(11) DEFAULT '0',
  `_02_01_13_04` int(11) DEFAULT '0',
  `_02_01_13_05` int(11) DEFAULT '0',
  `_02_01_13_07` int(11) DEFAULT '0',
  `_02_11_13_01` int(11) DEFAULT '0',
  `_02_11_13_02` int(11) DEFAULT '0',
  `_02_11_13_03` int(11) DEFAULT '0',
  `_02_11_13_04` int(11) DEFAULT '0',
  `_02_11_13_05` int(11) DEFAULT '0',
  `_02_11_13_06` int(11) DEFAULT '0',
  `_02_11_13_07` int(11) DEFAULT '0',
  `_02_11_13_07_1` int(11) DEFAULT '0',
  `_02_11_13_08_1` int(11) DEFAULT '0',
  `_02_11_13_08_2` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN301`
--

INSERT INTO `CEN301` (`RollNo`, `_04_12_17_12`, `_04_12_17_11`, `_04_12_13_11`, `_04_10_13_11`, `_02_10_13_11`, `_02_08_13_11`, `_02_09_13_11`, `_02_09_13_10`, `_02_09_13_9`, `_02_09_13_08`, `_02_09_13_07`, `_02_09_13_06`, `_02_07_13_06`, `_02_07_13_07`, `_02_07_13_08`, `_02_06_13_08`, `_02_06_13_09`, `_02_06_13_10`, `_02_06_13_11`, `_02_05_13_11`, `_02_05_13_12`, `_02_05_13_01`, `_02_05_13_02`, `_02_05_13_03`, `_02_05_13_04`, `_02_04_13_04`, `_02_04_13_05`, `_02_04_13_06`, `_02_04_13_07`, `_02_04_13_08`, `_02_03_13_08`, `_02_03_13_09`, `_02_03_13_10`, `_02_03_13_11`, `_02_03_13_12`, `_02_02_13_12`, `_02_02_13_01`, `_02_02_13_02`, `_02_02_13_03`, `_02_02_13_04`, `_02_02_13_05`, `_02_02_13_06`, `_02_01_13_06`, `_02_01_13_01`, `_02_01_13_02`, `_02_01_13_03`, `_02_01_13_04`, `_02_01_13_05`, `_02_01_13_07`, `_02_11_13_01`, `_02_11_13_02`, `_02_11_13_03`, `_02_11_13_04`, `_02_11_13_05`, `_02_11_13_06`, `_02_11_13_07`, `_02_11_13_07_1`, `_02_11_13_08_1`, `_02_11_13_08_2`) VALUES
('15BCS0034', 0, 0, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 1, 2, 1, 2, 0, 2, 1, 1, 1, 1, 0, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 0, 0, 1, 1, 1, 2, 0, 0, 1, 1, 1, 2, 2, 2, 0, 0, 1, 2, 0, 0, 1, 1, 1, 1, 2),
('15BCS0035', 1, 1, 0, 0, 0, 0, 2, 1, 1, 1, 1, 2, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 2, 2, 2, 1, 0, 1, 2, 0, 0, 1, 1, 1, 0, 0, 2, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 2),
('15BCS0039', 1, 1, 2, 2, 2, 0, 0, 1, 1, 1, 1, 2, 1, 2, 1, 2, 1, 0, 0, 0, 1, 0, 0, 1, 1, 2, 1, 1, 1, 1, 0, 0, 0, 0, 2, 2, 1, 1, 1, 2, 0, 0, 0, 0, 1, 2, 2, 0, 0, 0, 1, 2, 1, 1, 1, 1, 1, 1, 2),
('15BCS0040', 1, 1, 2, 2, 2, 2, 2, 1, 1, 1, 1, 2, 1, 0, 0, 2, 1, 2, 1, 0, 0, 0, 1, 1, 1, 2, 1, 0, 0, 0, 0, 1, 1, 2, 0, 2, 0, 0, 0, 0, 0, 0, 1, 1, 1, 2, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0),
('15BCS0041', 1, 1, 2, 2, 2, 2, 2, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 2, 1, 0, 1, 1, 0, 0, 2, 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `CEN302`
--

CREATE TABLE `CEN302` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN302`
--

INSERT INTO `CEN302` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN303`
--

CREATE TABLE `CEN303` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN303`
--

INSERT INTO `CEN303` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN304`
--

CREATE TABLE `CEN304` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN304`
--

INSERT INTO `CEN304` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN306`
--

CREATE TABLE `CEN306` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN306`
--

INSERT INTO `CEN306` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN391`
--

CREATE TABLE `CEN391` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN391`
--

INSERT INTO `CEN391` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN392`
--

CREATE TABLE `CEN392` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN392`
--

INSERT INTO `CEN392` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN393`
--

CREATE TABLE `CEN393` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN393`
--

INSERT INTO `CEN393` (`RollNo`) VALUES
('15BCS0034'),
('15BCS0035'),
('15BCS0039'),
('15BCS0040'),
('15BCS0041');

-- --------------------------------------------------------

--
-- Table structure for table `CEN401`
--

CREATE TABLE `CEN401` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN401`
--

INSERT INTO `CEN401` (`RollNo`) VALUES
('15BCS0042');

-- --------------------------------------------------------

--
-- Table structure for table `CEN402`
--

CREATE TABLE `CEN402` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN402`
--

INSERT INTO `CEN402` (`RollNo`) VALUES
('15BCS0042');

-- --------------------------------------------------------

--
-- Table structure for table `CEN491`
--

CREATE TABLE `CEN491` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN491`
--

INSERT INTO `CEN491` (`RollNo`) VALUES
('15BCS0042');

-- --------------------------------------------------------

--
-- Table structure for table `CEN492`
--

CREATE TABLE `CEN492` (
  `RollNo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CEN492`
--

INSERT INTO `CEN492` (`RollNo`) VALUES
('15BCS0042');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `DeptId` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`DeptId`, `Name`) VALUES
(1, 'Computer Engineering'),
(2, 'Electronics And Communication Engineering'),
(3, 'Mechanical Engineering'),
(4, 'Civil Engineering'),
(5, 'Electrical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `StudentBase`
--

CREATE TABLE `StudentBase` (
  `RollNo` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `EnrollmentNo` varchar(10) NOT NULL,
  `DeptId` int(11) DEFAULT NULL,
  `Semester` text NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text,
  `LastName` text NOT NULL,
  `SNo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StudentBase`
--

INSERT INTO `StudentBase` (`RollNo`, `Email`, `EnrollmentNo`, `DeptId`, `Semester`, `FirstName`, `MiddleName`, `LastName`, `SNo`) VALUES
('15BCS0034', 'shvetaank05@gmail.com', '153465', 1, '3', 'Shvetaank', NULL, 'Tripathi', NULL),
('15BCS0035', 'sh@gmail.com', '125432', 1, '3', 'haha', NULL, 'chutiya', NULL),
('15BCS0039', 'Teacher@gmail.com', '153467', 1, '3', 'Raman', 'Bandar', 'Tripathi', NULL),
('15BCS0040', 'stshivaank78@gmail.com', '153460', 1, '3', 'Aman', NULL, 'Tripathi', NULL),
('15BCS0041', 'shivaank@gmail.com', '153461', 1, '3', 'Shivaank', NULL, 'hahaha', NULL),
('15BCS0042', 'aryen@gmail.com', '153463', 1, '4', 'Aryen', NULL, 'Negi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `SubjectCode` varchar(10) NOT NULL,
  `SubjectName` text NOT NULL,
  `Semester` int(11) NOT NULL,
  `TId` varchar(15) DEFAULT NULL,
  `NumOfClass` int(11) NOT NULL DEFAULT '0',
  `DeptId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`SubjectCode`, `SubjectName`, `Semester`, `TId`, `NumOfClass`, `DeptId`) VALUES
('AS301', 'Mathematics', 3, 'JMIAM0001', 0, 1),
('AS405', 'Mathematics (NACP)', 4, NULL, 0, 1),
('CEN301', 'Data Structures and Programming', 3, 'JMIAM0001', 0, 1),
('CEN302', 'Digital Logic Theory', 3, 'JMIAM0001', 0, 1),
('CEN303', 'Discrete Mathematics', 3, 'JMIAM0001', 0, 1),
('CEN304', 'Electronics Devices and Applications', 3, 'JMIAM0001', 0, 1),
('CEN306', 'Signals and Systems', 3, 'JMIAM0001', 0, 1),
('CEN391', 'C Programming Lab', 3, 'JMIAM0001', 0, 1),
('CEN392', 'Electronics Devices Lab', 3, 'JMIAM0001', 0, 1),
('CEN393', 'Digital Logic Lab', 3, 'JMIAM0001', 0, 1),
('CEN401', 'Computer Organization', 4, 'JMIAM0001', 0, 1),
('CEN402', 'Operating System', 4, 'JMIAM0001', 0, 1),
('CEN403', 'Information Technology', 4, NULL, 0, 1),
('CEN404', 'Analog and Digital Communication', 4, NULL, 0, 1),
('CEN406', 'System Software', 4, NULL, 0, 1),
('CEN491', 'Linux Lab', 4, 'JMIAM0001', 0, 1),
('CEN492', 'Data Structure Lab', 4, 'JMIAM0001', 0, 1),
('CEN493', 'System Software Lab', 4, NULL, 0, 1),
('CEN494', 'Advanced C Lab', 4, NULL, 0, 1),
('CEN501', 'Computer Architecture', 5, NULL, 0, 1),
('CEN502', 'Automata Theory', 5, NULL, 0, 1),
('CEN503', 'Computer Networks-I', 5, NULL, 0, 1),
('CEN504', 'Data Base System', 5, NULL, 0, 1),
('CEN505', 'Microprocessor', 5, NULL, 0, 1),
('CEN591', 'Advanced Data Structure Lab', 5, NULL, 0, 1),
('CEN592', 'DBMS Lab', 5, NULL, 0, 1),
('CEN593', 'Operating System Lab', 5, NULL, 0, 1),
('CEN594', 'Microprocessor Lab', 5, NULL, 0, 1),
('CEN601', 'Computer Graphics', 6, NULL, 0, 1),
('CEN602', 'Software Engineering', 6, NULL, 0, 1),
('CEN603', 'Object oriented programming', 6, NULL, 0, 1),
('CEN604', 'Computer Networks-II', 6, NULL, 0, 1),
('CEN605', 'Analysis and Design of Algorithm', 6, NULL, 0, 1),
('CEN606', 'Parallel and Distributed Systems', 6, NULL, 0, 1),
('CEN607', 'Language Processor', 6, NULL, 0, 1),
('CEN691', 'Computer Network lab', 6, NULL, 0, 1),
('CEN692', 'Object Oriented Programming Lab', 6, NULL, 0, 1),
('CEN693', 'Linux utility lab', 6, NULL, 0, 1),
('CEN701', 'Internet Fundamentals - Elective', 7, NULL, 0, 1),
('CEN702', 'Management Science', 7, NULL, 0, 1),
('CEN703', 'Language Processor-II', 7, NULL, 0, 1),
('CEN704', 'Mobile Communication - Elective', 7, NULL, 0, 1),
('CEN705', 'Data Mining- Elective', 7, NULL, 0, 1),
('CEN706', 'Embedded System- Elective', 7, NULL, 0, 1),
('CEN791', 'Computer Graphics lab', 7, NULL, 0, 1),
('CEN792', 'Compiler Design lab', 7, NULL, 0, 1),
('CEN802', 'Artificial Intelligence - Elective', 8, NULL, 0, 1),
('CEN803', 'Software Project Management', 8, NULL, 0, 1),
('CEN804', 'Distributed processing- Elective', 8, NULL, 0, 1),
('CEN805', 'Network Security - Elective', 8, NULL, 0, 1),
('CEN806', 'Soft Computing Techniques - Elective', 8, NULL, 0, 1),
('CEN807', 'Web Mining - Elective', 8, NULL, 0, 1),
('CEN891', 'Software project Management Lab', 8, NULL, 0, 1),
('CEN892', 'Major Project', 8, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TeacherBase`
--

CREATE TABLE `TeacherBase` (
  `TId` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text,
  `LastName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeacherBase`
--

INSERT INTO `TeacherBase` (`TId`, `Email`, `FirstName`, `MiddleName`, `LastName`) VALUES
('JMIAM0001', 'jsfdh@gmail.com', 'Md', 'Zeeshan', 'Ansari');

-- --------------------------------------------------------

--
-- Table structure for table `UserBase`
--

CREATE TABLE `UserBase` (
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `PhoneNo` varchar(10) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserBase`
--

INSERT INTO `UserBase` (`Name`, `Email`, `Password`, `PhoneNo`, `Status`) VALUES
('Aryen Negi', 'aryen@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '7985151290', 2),
('Md Zeeshan Ansari', 'jsfdh@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '4656554654', 3),
('haha chutiya', 'sh@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '7985151235', 2),
('Shivaank hahaha', 'shivaank@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '7985151291', 2),
('Shvetaank Tripathi', 'shvetaank05@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '9717243395', 2),
('Aman Tripathi', 'stshivaank78@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '7210202949', 2),
('Raman Bandar Tripathi', 'Teacher@gmail.com', '28c8edde3d61a0411511d3b1866f0636', '7985151294', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AS301`
--
ALTER TABLE `AS301`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN301`
--
ALTER TABLE `CEN301`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN302`
--
ALTER TABLE `CEN302`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN303`
--
ALTER TABLE `CEN303`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN304`
--
ALTER TABLE `CEN304`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN306`
--
ALTER TABLE `CEN306`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN391`
--
ALTER TABLE `CEN391`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN392`
--
ALTER TABLE `CEN392`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN393`
--
ALTER TABLE `CEN393`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN401`
--
ALTER TABLE `CEN401`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN402`
--
ALTER TABLE `CEN402`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN491`
--
ALTER TABLE `CEN491`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `CEN492`
--
ALTER TABLE `CEN492`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `StudentBase`
--
ALTER TABLE `StudentBase`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `EnrollmentNo` (`EnrollmentNo`),
  ADD UNIQUE KEY `SNo` (`SNo`),
  ADD KEY `DeptId` (`DeptId`);

--
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`SubjectCode`),
  ADD KEY `TId` (`TId`),
  ADD KEY `DeptId` (`DeptId`);

--
-- Indexes for table `TeacherBase`
--
ALTER TABLE `TeacherBase`
  ADD PRIMARY KEY (`TId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `UserBase`
--
ALTER TABLE `UserBase`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `PhoneNo` (`PhoneNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AS301`
--
ALTER TABLE `AS301`
  ADD CONSTRAINT `AS301_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN301`
--
ALTER TABLE `CEN301`
  ADD CONSTRAINT `CEN301_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN302`
--
ALTER TABLE `CEN302`
  ADD CONSTRAINT `CEN302_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN303`
--
ALTER TABLE `CEN303`
  ADD CONSTRAINT `CEN303_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN304`
--
ALTER TABLE `CEN304`
  ADD CONSTRAINT `CEN304_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN306`
--
ALTER TABLE `CEN306`
  ADD CONSTRAINT `CEN306_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN391`
--
ALTER TABLE `CEN391`
  ADD CONSTRAINT `CEN391_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN392`
--
ALTER TABLE `CEN392`
  ADD CONSTRAINT `CEN392_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN393`
--
ALTER TABLE `CEN393`
  ADD CONSTRAINT `CEN393_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN401`
--
ALTER TABLE `CEN401`
  ADD CONSTRAINT `CEN401_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN402`
--
ALTER TABLE `CEN402`
  ADD CONSTRAINT `CEN402_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN491`
--
ALTER TABLE `CEN491`
  ADD CONSTRAINT `CEN491_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `CEN492`
--
ALTER TABLE `CEN492`
  ADD CONSTRAINT `CEN492_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `StudentBase` (`RollNo`);

--
-- Constraints for table `StudentBase`
--
ALTER TABLE `StudentBase`
  ADD CONSTRAINT `StudentBase_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `UserBase` (`Email`),
  ADD CONSTRAINT `StudentBase_ibfk_2` FOREIGN KEY (`DeptId`) REFERENCES `Department` (`DeptId`);

--
-- Constraints for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD CONSTRAINT `Subjects_ibfk_1` FOREIGN KEY (`TId`) REFERENCES `TeacherBase` (`TId`),
  ADD CONSTRAINT `Subjects_ibfk_2` FOREIGN KEY (`DeptId`) REFERENCES `Department` (`DeptId`);

--
-- Constraints for table `TeacherBase`
--
ALTER TABLE `TeacherBase`
  ADD CONSTRAINT `TeacherBase_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `UserBase` (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
