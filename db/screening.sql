-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 01:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `InsertedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_officer`
--

INSERT INTO `record_officer` (`EntryID`, `RecordOfficerName`, `Department`, `Email`, `Password`, `InsertedDate`) VALUES
(1, 'Murtala Isah', 'Computer Science', 'yasir@gmail.com', '12345', '2022-01-11 11:07:08');

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
  `InsertedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_affairs`
--

INSERT INTO `student_affairs` (`EntryID`, `OfficerName`, `College`, `Email`, `Password`, `InsertedDate`) VALUES
(1, 'Yasir Murtala', 'CST', 'yasirmurtalageneral@gmail.com', '12345', '2022-01-11 11:10:00');

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
-- AUTO_INCREMENT for table `student_affairs`
--
ALTER TABLE `student_affairs`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
