-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_envent`
--

CREATE TABLE `create_envent` (
  `eventid` int(10) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `etime` varchar(255) NOT NULL,
  `edetails` varchar(500) NOT NULL,
  `elocation` varchar(100) NOT NULL,
  `eorg` varchar(20) NOT NULL,
  `speaker` varchar(30) NOT NULL,
  `dtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_envent`
--

INSERT INTO `create_envent` (`eventid`, `ename`, `edate`, `etime`, `edetails`, `elocation`, `eorg`, `speaker`, `dtime`) VALUES
(6, 'placment ', '2023-08-19', '09:45', 'todays placement will be taken in B- block', 'vgec B-block', 'vgec', 'wasim sir', '03:00'),
(7, 'Celebrating the Bond of Love: Raksha Bandhan', '2023-08-30', '09:00', 'Join us as we celebrate the 76th Independence Day of our beloved nation on August 15th 2023. This day holds great significance in the history of our country  marking the day when India gained freedom from British colonial rule in 1947. Its a time for reflection unity and patriotic fervor.', 'vgec A-block', 'vgec -IT Deparment', 'Principal sir and fa', '11:00'),
(8, 'Celebrating the Bond of Love: Raksha Bandhan', '2023-08-30', '09:00', 'Join us as we celebrate the 76th Independence Day of our beloved nation on August 15th 2023. This day holds great significance in the history of our country  marking the day when India gained freedom from British colonial rule in 1947. Its a time for reflection unity and patriotic fervor.', 'vgec A-block', 'vgec -IT Deparment', 'Principal sir and faculty', '11:00'),
(9, 'avi', '2023-08-22', '17:07', 'warfg', 'vgec A-block', '', 'Principal sir and faculty', '18:08'),
(10, '99226', '', '', '', '', '', '', ''),
(11, 's', '', '56335667', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `registered_student`
--

CREATE TABLE `registered_student` (
  `id` varchar(25) NOT NULL,
  `event_id` int(20) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_student`
--

INSERT INTO `registered_student` (`id`, `event_id`, `student_name`, `semail`) VALUES
('104', 10, 'c', 'c@gmail.com'),
('64', 6, 'c', 'c@gmail.com'),
('66', 6, 'd', 'd@gmail.com'),
('67', 6, 'e', 'e@gmail.com'),
('68', 6, 'f', 'f@gmail.com'),
('74', 7, 'c', 'c@gmail.com'),
('94', 9, 'c', 'c@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'student',
  `approve` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `approve`) VALUES
(2, 'a', 'a@gmail.com', 'a', 'Hod', 0),
(3, 'b', 'b@gmail.com', 'b', 'faculty', 0),
(4, 'c', 'c@gmail.com', 'c', 'student', 1),
(5, 'admin', 'admin@gmail.com', 'admin', 'admin', 1),
(6, 'd', 'd@gmail.com', 'd', 'student', 0),
(7, 'e', 'e@gmail.com', 'e', 'student', 0),
(8, 'f', 'f@gmail.com', 'f', 'student', 0),
(9, 'Name001', 'email001@example.com', 'password001', 'student', 0),
(10, 'Name002', 'email002@example.com', 'password002', 'student', 0),
(11, 'Name003', 'email003@example.com', 'password003', 'faculty', 0),
(12, 'Name004', 'email004@example.com', 'password004', 'faculty', 0),
(13, 'Name005', 'email005@example.com', 'password005', 'faculty', 0),
(14, 'Name006', 'email006@example.com', 'password006', 'faculty', 0),
(15, 'Name007', 'email007@example.com', 'password007', 'Hod', 0),
(16, 'Name008', 'email008@example.com', 'password008', 'Hod', 0),
(17, 'Name009', 'email009@example.com', 'password009', 'Hod', 0),
(18, 'Name010', 'email010@example.com', 'password010', 'student', 0),
(19, 'Name011', 'email011@example.com', 'password011', 'Hod', 0),
(20, 'Name012', 'email012@example.com', 'password012', 'faculty', 0),
(21, 'Name013', 'email013@example.com', 'password013', 'faculty', 0),
(22, 'Name014', 'email014@example.com', 'password014', 'Hod', 0),
(23, 'Name015', 'email015@example.com', 'password015', 'student', 0),
(24, 'Name016', 'email016@example.com', 'password016', 'student', 0),
(25, 'Name017', 'email017@example.com', 'password017', 'faculty', 0),
(26, 'Name018', 'email018@example.com', 'password018', 'student', 0),
(27, 'Name019', 'email019@example.com', 'password019', 'faculty', 0),
(28, 'Name020', 'email020@example.com', 'password020', 'faculty', 0),
(29, 'Name021', 'email021@example.com', 'password021', 'faculty', 0),
(30, 'Name022', 'email022@example.com', 'password022', 'Hod', 0),
(31, 'Name023', 'email023@example.com', 'password023', 'Hod', 0),
(32, 'Name024', 'email024@example.com', 'password024', 'student', 0),
(33, 'Name025', 'email025@example.com', 'password025', 'faculty', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_envent`
--
ALTER TABLE `create_envent`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `registered_student`
--
ALTER TABLE `registered_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_envent`
--
ALTER TABLE `create_envent`
  MODIFY `eventid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
