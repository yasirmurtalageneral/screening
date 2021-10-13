-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 09:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `screening`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `PW_STATUS` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `USERNAME`, `PASSWORD`, `PW_STATUS`) VALUES
(1, 'admin', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `record_officer`
--

CREATE TABLE `record_officer` (
  `EntryID` int(11) NOT NULL,
  `RecordOfficerName` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `InsertedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_officer`
--

INSERT INTO `record_officer` (`EntryID`, `RecordOfficerName`, `Department`, `Email`, `Password`, `InsertedDate`) VALUES
(1, 'Adam Musa Yau ', 'Computer Science', 'adammusa89@gmail.com', '12345', '2021-08-18 22:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `EntryID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT '0',
  `StudentID` int(11) DEFAULT NULL,
  `ScheduledDate` varchar(45) DEFAULT NULL,
  `ScheduledTime` varchar(45) DEFAULT NULL,
  `ScheduleStatus` varchar(45) DEFAULT '0',
  `InsertedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CollegeID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`EntryID`, `DepartmentID`, `StudentID`, `ScheduledDate`, `ScheduledTime`, `ScheduleStatus`, `InsertedDate`, `CollegeID`) VALUES
(1, 1, 5, '21-08-2021', '8:30 - 10:30', '0', '2021-08-21 12:18:28', 0),
(2, 1, 2, '21-08-2021', '10:30 - 12:30', '0', '2021-08-21 12:18:29', 0),
(3, 1, 1, '21-08-2021', '12:30 - 3:30', '0', '2021-08-21 12:18:29', 0),
(4, 1, 3, '22-08-2021', '8:30 - 10:30', '0', '2021-08-21 12:18:29', 0),
(5, 1, 4, '22-08-2021', '10:30 - 12:30', '0', '2021-08-21 12:18:29', 0),
(41, NULL, 2, '21-08-2021', '8:30 - 10:30', '0', '2021-08-21 22:23:19', 1),
(42, NULL, 3, '21-08-2021', '10:30 - 12:30', '0', '2021-08-21 22:23:19', 1),
(43, NULL, 1, '21-08-2021', '12:30 - 3:30', '0', '2021-08-21 22:23:19', 1),
(44, NULL, 4, '22-08-2021', '8:30 - 10:30', '0', '2021-08-21 22:23:19', 1),
(45, NULL, 5, '22-08-2021', '10:30 - 12:30', '0', '2021-08-21 22:23:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `EntryID` int(11) NOT NULL,
  `AppID` varchar(11) DEFAULT NULL,
  `StudentName` varchar(50) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `InsertedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDepartmentCleared` int(11) DEFAULT '0',
  `IsStudentAffairsCleared` int(11) DEFAULT '0',
  `IsSchedule` int(11) DEFAULT '0',
  `IsScheduleStudentAffairs` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`EntryID`, `AppID`, `StudentName`, `Phone`, `Email`, `Department`, `InsertedDate`, `IsDepartmentCleared`, `IsStudentAffairsCleared`, `IsSchedule`, `IsScheduleStudentAffairs`) VALUES
(1, '1111', 'Adam Musa Yau', '8063017470', 'adammusa89@gmail.com', 'Computer Science', '2021-08-19 06:05:07', 1, 1, 1, 1),
(2, '1112', 'Yasir Murtala', '81024648348', 'yasirmurtalageneral@gmail.com', 'Computer Science', '2021-08-19 06:05:07', 0, 0, 1, 1),
(3, '1113', 'Shehu Isah', '81823847343', 'shehuisah007@gmail.com', 'Computer Science', '2021-08-19 06:05:07', 0, 1, 1, 1),
(4, '1114', 'Sani Abdullahi', '81658734673', 'saniabdullahi442@gmail.com', 'Computer Science', '2021-08-19 06:05:07', 0, 0, 1, 1),
(5, '1114', 'Mahmood Rabiu Abubakar', '80308237483', 'mrfantastic340@gmail.com', 'Computer Science', '2021-08-19 06:05:07', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_affairs`
--

CREATE TABLE `student_affairs` (
  `EntryID` int(11) NOT NULL,
  `OfficerName` varchar(50) NOT NULL,
  `College` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `InsertedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_affairs`
--

INSERT INTO `student_affairs` (`EntryID`, `OfficerName`, `College`, `Email`, `Password`, `InsertedDate`) VALUES
(1, 'Yasir Murtala', 'CST', 'yasirmurtalageneral@gmail.com', '12345', '2021-08-18 22:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `record_officer`
--
ALTER TABLE `record_officer`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `student_affairs`
--
ALTER TABLE `student_affairs`
  ADD PRIMARY KEY (`EntryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `record_officer`
--
ALTER TABLE `record_officer`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_affairs`
--
ALTER TABLE `student_affairs`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
