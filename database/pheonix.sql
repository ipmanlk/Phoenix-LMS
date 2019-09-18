-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2019 at 09:15 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pheonix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `answer`, `question_id`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '4', 1),
(5, 'very', 2),
(6, 'less', 2),
(7, 'none', 2),
(8, 'null', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `invite_code` varchar(50) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `invite_code`, `instructor_id`, `description`) VALUES
(1, 'Introduction to Data Science', 'd3a2afeded', 15, 'This is a test');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nic` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `fname`, `lname`, `dob`, `email`, `password`, `nic`) VALUES
(1, 'Kasun', 'Srilam', '2019-09-18 00:00:00', 'kasun@kasun.com', 'adadaadad', '1'),
(4, 'Sepala', 'kasun da fox', '1998-02-20 00:00:00', 'kasuff22n@srimal.com', 'Humans must die', '2'),
(6, 'Sepala', 'kasun da fox', '1998-02-20 00:00:00', 'kasufff22n@srimal.com', 'Humans must die', '3'),
(7, 'Manjula', 'Amarabandu', '1998-02-20 00:00:00', 'fact@fact.com', 'Humans must die', '4'),
(8, 'Sex Education', 'Sex Education', '1998-02-11 00:00:00', 'sex@aa.com', 'Sex Education', '5'),
(10, 'Sex Education', 'Sex Education', '1998-02-11 00:00:00', 'sex@aac.com', 'Sex Education', '6'),
(12, 'test', 'kasun da fox', '1998-02-20 00:00:00', 'test@srimal.com', '$2y$10$XeFzhyxAG2rHuQ6Dkec2xetE0XcI2MuR/IevZmYH1KFZ.bWZ0arLa', '7'),
(15, 'test', 'kasun da fox', '1998-02-20 00:00:00', 'test@test.com', '$2y$10$zBGePRbdpSibynpQAbDOqOkAIjfHROnDhx63f1LUEGdyVdAFkdtfG', '8');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(150) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `test_id`) VALUES
(1, 'How many data?', 1),
(2, 'How important is data?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questioncorrectanswer`
--

CREATE TABLE `questioncorrectanswer` (
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questioncorrectanswer`
--

INSERT INTO `questioncorrectanswer` (`question_id`, `answer_id`) VALUES
(1, 3),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL,
  `resource_name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nic` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `dob`, `email`, `password`, `nic`) VALUES
(2, 'Srimal', 'kasun da fox', '1998-02-20 00:00:00', 'kasuff22n@srimal.com', '$2y$10$SXHYWObyGPASisXGUcyNNOFChuUlOIFu63akDm3inB1NOY7YG8Apu', '1'),
(3, 'Venusha', 'kasun da fox', '1998-02-20 00:00:00', 'kasuff22n@srifmal.com', '$2y$10$hd7hRgV7AuEuXLZmP.zCjO7Ch7EIQulTdM1SL5Rt2owgo14hCI0G6', '2'),
(4, 'Test', 'User', '1998-02-20 00:00:00', 'test@test.com', '$2y$10$Xfd1pnBNLvupFeJV3xa29eAbrs4G3xTYkurTuhWRu.A.BVhdEweuu', '3'),
(6, 'Pakaya', 'Pakaya', '2019-09-03 00:00:00', 'pakaya@pakaya.com', '$2y$10$5yv8xKcEW3dEEj7cxKIiJuk/cvdiFXE8bHtk6Y5gZ3686szoowhCi', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `studentassignment`
--

CREATE TABLE `studentassignment` (
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `path` varchar(150) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp(),
  `checked_date` datetime NOT NULL DEFAULT current_timestamp(),
  `marks` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`student_id`, `course_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studenttest`
--

CREATE TABLE `studenttest` (
  `student_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studenttest`
--

INSERT INTO `studenttest` (`student_id`, `test_id`, `marks`, `start_time`, `end_time`) VALUES
(4, 1, 50, '2019-09-18 09:34:52', '2019-09-18 09:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(45) NOT NULL,
  `duration` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `deadline` datetime NOT NULL,
  `testtype_id` int(11) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `duration`, `course_id`, `description`, `deadline`, `testtype_id`, `add_date`) VALUES
(1, 'Basic Data', 30, 1, 'More about basic data', '2019-09-30 00:00:00', 1, '2019-09-18 03:39:49'),
(2, 'Submit Work Project', 1, 1, 'Work project', '2019-09-30 00:00:00', 2, '2019-09-18 03:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `testtype`
--

CREATE TABLE `testtype` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testtype`
--

INSERT INTO `testtype` (`id`, `type`) VALUES
(1, 'MCQ'),
(2, 'Assignment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answer_question1_idx` (`question_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`instructor_id`),
  ADD KEY `fk_course_instructor_idx` (`instructor_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nic_UNIQUE` (`nic`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_test1_idx` (`test_id`);

--
-- Indexes for table `questioncorrectanswer`
--
ALTER TABLE `questioncorrectanswer`
  ADD PRIMARY KEY (`question_id`,`answer_id`),
  ADD KEY `fk_question_has_answer_answer1_idx` (`answer_id`),
  ADD KEY `fk_question_has_answer_question1_idx` (`question_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`,`course_id`),
  ADD KEY `fk_resource_course1_idx` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nic_UNIQUE` (`nic`);

--
-- Indexes for table `studentassignment`
--
ALTER TABLE `studentassignment`
  ADD PRIMARY KEY (`student_id`,`test_id`),
  ADD KEY `fk_student_has_test_test2_idx` (`test_id`),
  ADD KEY `fk_student_has_test_student2_idx` (`student_id`);

--
-- Indexes for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `fk_student_has_course_course1_idx` (`course_id`),
  ADD KEY `fk_student_has_course_student1_idx` (`student_id`);

--
-- Indexes for table `studenttest`
--
ALTER TABLE `studenttest`
  ADD PRIMARY KEY (`student_id`,`test_id`),
  ADD KEY `fk_student_has_test_test1_idx` (`test_id`),
  ADD KEY `fk_student_has_test_student1_idx` (`student_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_test_course1_idx` (`course_id`),
  ADD KEY `fk_test_testtype1_idx` (`testtype_id`);

--
-- Indexes for table `testtype`
--
ALTER TABLE `testtype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testtype`
--
ALTER TABLE `testtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_instructor` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_test1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `questioncorrectanswer`
--
ALTER TABLE `questioncorrectanswer`
  ADD CONSTRAINT `fk_question_has_answer_answer1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_question_has_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `fk_resource_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studentassignment`
--
ALTER TABLE `studentassignment`
  ADD CONSTRAINT `fk_student_has_test_student2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_test_test2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD CONSTRAINT `fk_student_has_course_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_course_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studenttest`
--
ALTER TABLE `studenttest`
  ADD CONSTRAINT `fk_student_has_test_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_has_test_test1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_test_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_testtype1` FOREIGN KEY (`testtype_id`) REFERENCES `testtype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
