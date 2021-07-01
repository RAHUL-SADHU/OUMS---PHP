-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2021 at 06:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OUMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'Rahul', 'Sadhu', 'r@r.com', '1111', 'Admin'),
(3, 'MAYA', 'ACHaraya', 'm@m.com', '1111', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `attendance_date` date NOT NULL,
  `student_id` int(10) NOT NULL,
  `present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `department_id`, `semester`, `subject_id`, `attendance_date`, `student_id`, `present`) VALUES
(88, 26, '1', 1, '2021-05-22', 1, 0),
(90, 26, '1', 1, '2021-05-22', 6, 0),
(91, 26, '1', 1, '2021-05-20', 1, 0),
(93, 26, '1', 1, '2021-05-20', 6, 0),
(94, 26, '1', 1, '2021-05-29', 1, 0),
(96, 26, '1', 1, '2021-05-29', 6, 0),
(97, 26, '1', 1, '2021-05-31', 1, 1),
(99, 26, '1', 1, '2021-05-31', 6, 1),
(106, 26, '1', 1, '2021-06-26', 1, 1),
(108, 26, '1', 1, '2021-06-26', 6, 1),
(109, 26, '1', 2, '2021-05-01', 1, 1),
(111, 26, '1', 2, '2021-05-01', 6, 1),
(112, 26, '1', 3, '2021-03-13', 1, 0),
(114, 26, '1', 3, '2021-03-13', 6, 0),
(115, 26, '1', 3, '2021-03-14', 1, 0),
(117, 26, '1', 3, '2021-03-14', 6, 0),
(118, 26, '1', 3, '2021-03-15', 1, 0),
(120, 26, '1', 3, '2021-03-15', 6, 0),
(121, 26, '1', 1, '2021-01-22', 1, 1),
(123, 26, '1', 1, '2021-01-22', 6, 1),
(124, 26, '1', 1, '2020-10-16', 1, 1),
(126, 26, '1', 1, '2020-10-16', 6, 1),
(127, 26, '1', 1, '2020-10-15', 1, 1),
(129, 26, '1', 1, '2020-10-15', 6, 1),
(130, 26, '1', 1, '2020-01-10', 1, 0),
(132, 26, '1', 1, '2020-01-10', 6, 0),
(133, 26, '1', 1, '2020-01-09', 1, 0),
(135, 26, '1', 1, '2020-01-09', 6, 0),
(136, 26, '1', 1, '2020-01-04', 1, 0),
(138, 26, '1', 1, '2020-01-04', 6, 0),
(139, 26, '1', 1, '2019-08-16', 1, 0),
(141, 26, '1', 1, '2019-08-16', 6, 0),
(142, 26, '1', 1, '2019-08-03', 1, 0),
(144, 26, '1', 1, '2019-08-03', 6, 1),
(145, 26, '1', 1, '2023-02-26', 1, 1),
(147, 26, '1', 1, '2023-02-26', 6, 1),
(148, 26, '1', 1, '2023-02-27', 1, 1),
(150, 26, '1', 1, '2023-02-27', 6, 1),
(151, 26, '1', 3, '2021-05-22', 1, 0),
(153, 26, '1', 3, '2021-05-22', 6, 0),
(154, 26, '1', 3, '2021-05-31', 1, 0),
(156, 26, '1', 3, '2021-05-31', 6, 1),
(157, 27, '1', 5, '2021-07-09', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `book_no` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `rack_no` varchar(10) NOT NULL,
  `row_no` varchar(10) NOT NULL,
  `book_type` varchar(50) NOT NULL,
  `department_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_no`, `name`, `author`, `quantity`, `rack_no`, `row_no`, `book_type`, `department_id`, `description`) VALUES
(2, '12034', 'Java', 'TaxMa', 12, '13', '52', 'Story', 26, 'testde'),
(3, '1254', 'Oracle', 'Herbert schildt  ', 12, '1', '2', 'Academic', 26, 'test'),
(4, '1245', 'Network Security', 'TaxMax', 50, '1', '4', 'Academic', 26, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `issue_date` date NOT NULL,
  `book_id` int(15) NOT NULL,
  `quantity` int(100) NOT NULL,
  `return_date` date NOT NULL,
  `fine` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`id`, `department_id`, `semester`, `student_id`, `issue_date`, `book_id`, `quantity`, `return_date`, `fine`, `status`) VALUES
(1, 26, 1, 1, '2021-04-17', 2, 1, '2021-04-30', 12, 'borrow'),
(2, 26, 1, 1, '2021-04-29', 2, 12, '2021-04-23', 12, 'borrow'),
(3, 26, 1, 1, '2021-04-17', 3, 12, '2021-04-23', 12, 'borrow'),
(4, 26, 1, 1, '2021-04-17', 2, 1, '2021-04-23', 12, 'borrow'),
(5, 26, 1, 1, '2021-04-17', 3, 1, '2021-04-23', 1, 'borrow'),
(6, 26, 1, 1, '2021-04-17', 3, 1, '2021-04-23', 1, 'borrow'),
(7, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-23', 12, 'borrow'),
(8, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-23', 12, 'borrow'),
(9, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-23', 10, 'borrow'),
(10, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-23', 10, 'borrow'),
(11, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-29', 12, 'borrow'),
(12, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-17', 12, 'borrow'),
(13, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-17', 12, 'borrow'),
(14, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-17', 12, 'borrow'),
(15, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-16', 12, 'borrow'),
(16, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-16', 12, 'borrow'),
(17, 26, 1, 1, '2021-04-17', 2, 12, '2021-04-29', 1, 'borrow'),
(20, 26, 1, 6, '2021-07-02', 2, 1, '2021-07-03', 0, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `year` int(5) NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `code`, `description`, `year`, `crated_at`) VALUES
(26, 'BCA', '12', 'Test', 1241, '2021-03-01 15:57:46'),
(27, 'MCA', '12541', 'test', 2021, '2021-03-24 15:20:39'),
(28, 'B.COM', '1254', 'B.COM Description', 2009, '2021-04-20 04:41:37'),
(30, 'M.COM', '1214', 'Test', 2006, '2021-07-01 15:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `written` int(10) NOT NULL,
  `presentation` int(10) NOT NULL,
  `practical` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `department_id`, `semester`, `exam`, `subject_id`, `student_id`, `written`, `presentation`, `practical`) VALUES
(1, 26, 1, 'Midterm Exam', 1, 1, 12, 21, 50),
(3, 26, 1, 'Midterm Exam', 1, 6, 0, 0, 0),
(4, 26, 1, 'Final Exam', 1, 1, 50, 27, 30),
(6, 26, 1, 'Final Exam', 1, 6, 40, 55, 85);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fees_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `payableAmount` decimal(20,0) NOT NULL,
  `lateFee` decimal(20,0) NOT NULL,
  `paidAmount` decimal(20,0) NOT NULL,
  `dueAmount` decimal(20,0) NOT NULL,
  `payDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fees_id`, `student_id`, `payableAmount`, `lateFee`, `paidAmount`, `dueAmount`, `payDate`) VALUES
(1, 1, '1500', '0', '1000', '500', '2021-05-01'),
(2, 1, '2000', '0', '2000', '0', '2021-05-06'),
(3, 1, '1500', '0', '0', '1500', '2021-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `institute_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `establish` year(4) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`institute_id`, `name`, `establish`, `website`, `email`, `phone_number`, `address`) VALUES
(1, 'Government Engineering Collage Gandhinagar', 2000, 'https://nandkunvarbamahilacollege.com/', 'nmcbhavnagar@gmail.com', 2147483647, 'Devraj nagar - 2, Saher farti sadak, Near Shivaji Circle, Ghogha Road, Bhavnagar.\r\n\r\n\"\"\"');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `bod` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_mo` varchar(15) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_mo` varchar(15) NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `department_id`, `semester`, `first_name`, `last_name`, `middle_name`, `student_id`, `blood_group`, `gender`, `religion`, `nationality`, `bod`, `phone`, `father_name`, `father_mo`, `mother_name`, `mother_mo`, `present_address`, `permanent_address`, `profile_image`) VALUES
(1, 26, 1, 'first_namesdfs', 'Sadhu', 'As', 584, 'A+', 'male', 'Hindu', 'Indian', '2021-03-11', '08487054954', 'Test', '08487054954', 'testt', '08487054954', 'Openxcell', 'TA VEJALPUR DIST AHMEDABAD  ', 'AndroidR-Google.png'),
(5, 27, 5, 'Rahul', 'Sadhu', 'A', 124587, 'O+', 'male', 'Hindu', 'Indian', '1994-03-21', '8487054954', 'AshokBhai', '85871', 'Ilaben', '887544', 'Bakrol', 'test         ', 'FB_IMG_1585833060339.jpg'),
(6, 27, 1, 'Tome', 'Johnshan', 'John', 1547, 'A+', 'male', 'Hindu', 'Indian', '2021-04-10', '9876543210', 'John', '9876543210', 'Maria', '9876543210', '739 Ridge Street\r\nMassillon, OH 44646', '739 Ridge Street\r\nMassillon, OH 44646  ', 'unnamed.jpg'),
(7, 28, 1, 'Ram', 'Raghuvir', 'Dasharath', 124, 'A+', 'male', 'Hindu', 'Indian', '2020-09-11', '08487054954', 'Dasharath', '987546257', 'Kausalya', '87415874785', 'TO BAKROL, DHOLKA ROAD', 'TA VEJALPUR DIST AHMEDABAD', 'unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` int(10) NOT NULL,
  `subject_credit` int(5) NOT NULL,
  `department_id` int(10) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_code`, `subject_credit`, `department_id`, `semester`) VALUES
(1, 'Java', 120, 12, 26, 1),
(2, 'C++', 123, 12, 26, 1),
(3, 'DBMS', 105, 12, 26, 1),
(5, 'Advance Java', 254, 12, 27, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d` (`department_id`),
  ADD KEY `student` (`student_id`),
  ADD KEY `subject` (`subject_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book` (`book_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `department_key` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `e_d_id` (`department_id`),
  ADD KEY `e_s_id` (`subject_id`),
  ADD KEY `e_student_id` (`student_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fees_id`),
  ADD KEY `stud` (`student_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `department` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrow_book`
--
ALTER TABLE `borrow_book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fees_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `d` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_key` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `e_d_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_s_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `e_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `stud` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
