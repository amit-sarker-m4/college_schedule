-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 04:05 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `college_timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL COMMENT 'Admin ID',
  `full_name` varchar(50) NOT NULL COMMENT 'Full Name',
  `user_name` varchar(50) NOT NULL COMMENT 'User Name',
  `password` varchar(50) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `full_name`, `user_name`, `password`) VALUES
(1, 'amit sarker', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(11) NOT NULL COMMENT 'course id',
  `course_name` varchar(20) NOT NULL COMMENT 'course name',
  `year` varchar(20) NOT NULL COMMENT 'course in year',
  `section` varchar(20) NOT NULL COMMENT 'section',
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `year`, `section`, `subject_id`, `teacher_id`) VALUES
(1, 'Science', '2017', 'A', 1, 1),
(2, 'Commerce', '2017', 'A', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_timing`
--

CREATE TABLE IF NOT EXISTS `lecture_timing` (
`lecture_timing_id` int(11) NOT NULL COMMENT 'lecture timing id',
  `Lecture_time` varchar(20) NOT NULL COMMENT 'lecture timing'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lecture_timing`
--

INSERT INTO `lecture_timing` (`lecture_timing_id`, `Lecture_time`) VALUES
(1, '8-9am'),
(2, '9-10am'),
(3, '10-11am'),
(4, '11-12am'),
(5, '1-2pm'),
(6, '2-3pm'),
(7, '3-4pm'),
(8, '4-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
`request_id` int(11) NOT NULL COMMENT 'Request ID',
  `subject_id` int(11) NOT NULL COMMENT 'Subject ID',
  `teacher_id` int(11) NOT NULL COMMENT 'Teacher ID',
  `sessionid` varchar(20) NOT NULL COMMENT 'Session Id',
  `course_id` int(11) NOT NULL COMMENT 'Course ID',
  `section` varchar(50) NOT NULL COMMENT 'Section',
  `for_day` varchar(100) NOT NULL COMMENT 'For Day',
  `to_day` varchar(100) NOT NULL COMMENT 'To Day',
  `for_time` varchar(100) NOT NULL COMMENT 'For Time',
  `lecture_timing_id` int(11) NOT NULL COMMENT 'To Time',
  `for_room` varchar(100) NOT NULL COMMENT 'From Room',
  `room_id` int(11) NOT NULL COMMENT 'To Room',
  `status` varchar(100) NOT NULL COMMENT 'Status'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `subject_id`, `teacher_id`, `sessionid`, `course_id`, `section`, `for_day`, `to_day`, `for_time`, `lecture_timing_id`, `for_room`, `room_id`, `status`) VALUES
(19, 2, 2, '200', 2, 'A', 'Thrusday', 'Saturday', '4-5pm', 4, 'R#106', 4, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(11) NOT NULL COMMENT 'Room ID',
  `room_no` varchar(20) NOT NULL COMMENT 'Room One'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`) VALUES
(1, 'R#101'),
(2, 'R#102'),
(3, 'R#103'),
(4, 'R#104'),
(5, 'R#105'),
(6, 'R#106');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`schedule_id` int(11) NOT NULL COMMENT 'subject id',
  `subject_id` int(50) NOT NULL COMMENT 'subject ID',
  `teacher_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL COMMENT 'Day ',
  `room_id` int(11) NOT NULL,
  `lecture_timing_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` varchar(200) NOT NULL COMMENT 'Section',
  `dates` date NOT NULL COMMENT 'Date'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `subject_id`, `teacher_id`, `day`, `room_id`, `lecture_timing_id`, `course_id`, `section`, `dates`) VALUES
(1, 1, 1, 'Saturday', 1, 1, 1, 'A', '2017-04-25'),
(167, 2, 2, 'Sunday', 2, 2, 2, 'A', '2017-04-25'),
(168, 2, 2, 'Monday', 3, 3, 2, 'A', '2017-04-25'),
(169, 2, 2, 'Saturday', 4, 4, 2, 'A', '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(11) NOT NULL COMMENT 'Student ID',
  `user_name` varchar(50) NOT NULL COMMENT 'User Name',
  `roll` varchar(50) NOT NULL COMMENT 'Roll',
  `stu_group` varchar(50) NOT NULL COMMENT 'group',
  `password` varchar(50) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_name`, `roll`, `stu_group`, `password`) VALUES
(1, 'amit', '374', 'Science', 'amit');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(11) NOT NULL COMMENT 'Subject ID',
  `subject_code` varchar(50) NOT NULL COMMENT 'Subject Code',
  `subject_name` varchar(50) NOT NULL COMMENT 'Subject Name',
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT 'Teacher Id'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `course_id`, `teacher_id`) VALUES
(1, 'MAT 201', 'Mathematics', 1, 1),
(2, 'ACC 201', 'Accounting', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`teacher_id` int(11) NOT NULL COMMENT 'Teacher ID',
  `teacher_code` varchar(20) NOT NULL COMMENT 'teacher code',
  `teacher_name` varchar(20) NOT NULL COMMENT 'teacher name',
  `teacher_image` text NOT NULL COMMENT 'Teacher Image',
  `qualification` varchar(20) NOT NULL COMMENT 'teacher qualification',
  `department` varchar(20) NOT NULL COMMENT 'teacher department',
  `subject_id` int(11) NOT NULL COMMENT 'Subject ID',
  `password` varchar(50) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_code`, `teacher_name`, `teacher_image`, `qualification`, `department`, `subject_id`, `password`) VALUES
(1, '100', 'Tutul Islam', 'amit.jpg', 'Msc', 'Science', 1, 'tutul'),
(2, '200', 'Putul Kumar', 'amit.jpg', 'Msc', 'Commerce', 2, 'putul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`), ADD KEY `subject_id` (`subject_id`), ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `lecture_timing`
--
ALTER TABLE `lecture_timing`
 ADD PRIMARY KEY (`lecture_timing_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`schedule_id`), ADD KEY `teacher_id` (`teacher_id`), ADD KEY `room_id` (`room_id`), ADD KEY `lecture_timing_id` (`lecture_timing_id`), ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`), ADD KEY `course_id` (`course_id`), ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`), ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecture_timing`
--
ALTER TABLE `lecture_timing`
MODIFY `lecture_timing_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lecture timing id',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Request ID',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Room ID',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'subject id',AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Student ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Subject ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Teacher ID',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
