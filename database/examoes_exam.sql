-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 06:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjs_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acad`
--

CREATE TABLE `tbl_acad` (
  `ay_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acad`
--

INSERT INTO `tbl_acad` (`ay_id`, `name`, `date_registered`) VALUES
('AY1884', '2021-2022', '12-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_records`
--

CREATE TABLE `tbl_assessment_records` (
  `record_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL DEFAULT '-',
  `roll` varchar(255) NOT NULL DEFAULT '-',
  `exam_name` varchar(255) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `next_retake` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `rstatus` varchar(255) NOT NULL DEFAULT 'Result not published',
  `fstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_records`
--

INSERT INTO `tbl_assessment_records` (`record_id`, `student_id`, `student_name`, `class`, `section`, `roll`, `exam_name`, `exam_id`, `subject`, `score`, `status`, `next_retake`, `date`, `rstatus`, `fstatus`) VALUES
('RS46522439994016', 'OES59153', 'Oooo Gdfgd', '9', 'SECTION-A', '', 'Fcasdf', 'EX632533', 'F', '0', 'FAIL', '05/24/2021', '05/24/2021', 'Result not published', 'Paid'),
('RS49816675049021', 'OES19525', 'Koushik Sadhu', '10', 'SECTION-A', '25', 'FIRST TERMINAL', 'EX089278', 'DEMO', '8', 'FAIL', '05/22/2021', '05/22/2021', 'Result Published', 'Unpaid'),
('RS56326362528372', 'OES01423', 'Koushik Sadhu', '10', 'SECTION-A', '27', 'DEMO EXAMINATION', 'EX469070', 'DEMO', '0', 'FAIL', '05/21/2021', '05/21/2021', 'Result Published', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `class_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ay` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`class_id`, `name`, `ay`, `date_registered`) VALUES
('CL183083', '9', '2021-2022', '13-05-2021'),
('CL639972', '10', '2021-2022', '12-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_examinations`
--

CREATE TABLE `tbl_examinations` (
  `exam_id` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL DEFAULT '-',
  `subject` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `duration` int(255) NOT NULL,
  `passmark` int(255) NOT NULL,
  `full_marks` int(255) NOT NULL,
  `re_exam` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_examinations`
--

INSERT INTO `tbl_examinations` (`exam_id`, `class`, `section`, `subject`, `exam_name`, `date`, `duration`, `passmark`, `full_marks`, `re_exam`, `status`) VALUES
('EX632533', '9', '-', 'F', 'Fcasdf', '05/22/2021', 1, 10, 10, 0, 'Active'),
('EX663499', '5', '-', 'DEMO', 'Koushik', '05/28/2021', 40, 40, 40, 0, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `notice` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice`) VALUES
('vhhjh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `question_id` varchar(255) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `question` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Qmarks` int(255) NOT NULL,
  `option1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `option2` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `option3` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `option4` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `answer` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`question_id`, `exam_id`, `type`, `question`, `Qmarks`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
('QS-388968', 'EX632533', 'MC', '<p>vhjc</p>\r\n', 10, 'bjk', 'jbk', 'bvjhk', 'hvbjk', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `sect_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`sect_id`, `section`, `date_registered`) VALUES
('seca', 'SECTION-A', '12-05-2021'),
('secb', 'SECTION-B', '12-05-2021'),
('secc', 'SECTION-C', '12-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `subject_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ay` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `name`, `ay`, `class`, `date_registered`) VALUES
('SB-336656', 'G', '2021-2022', '----', '22-05-2021'),
('SB-827724', 'DEMO', '2021-2022', '----', '13-05-2021'),
('SB-910349', 'F', '2021-2022', '----', '22-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT 'teachersjs',
  `role` varchar(255) NOT NULL DEFAULT 'teacher',
  `acc_stat` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `email`, `phone`, `login`, `role`, `acc_stat`) VALUES
('admin', 'ADMINISTRATOR', '-', '-', '-', '-', '-', '-', '@dmin@SJS', 'admin', '1'),
('ksadmin', 'DEVELOPER KS', '-', '-', '-', '-', '-', '-', '@dmin@KS', 'admin', '1'),
('nkmadmin', 'DEVELOPER NKM', '-', '-', '-', '-', '-', '-', '@dmin@NKM', 'admin', '1'),
('SJSACC3415', 'BIKEE KUMAR RAM', '1', 'Male', '05/19/2021', 'KUMHAR PARA', 'bikee@gmail.com', '48', 'accountantsjs', 'accountant', '1'),
('TCHR7855', 'Samir', 'Singh', 'Male', '05/12/2021', 'Dumka', '----@gmail.com', '79038 31072', '123456', 'teacher', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `ay` varchar(255) NOT NULL DEFAULT '-',
  `class` varchar(255) NOT NULL DEFAULT '-',
  `section` varchar(255) NOT NULL DEFAULT '-',
  `roll` varchar(255) NOT NULL DEFAULT '-',
  `login` varchar(255) NOT NULL DEFAULT 'studentsjs',
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `acc_stat` varchar(255) NOT NULL DEFAULT 'Active',
  `fees` varchar(255) NOT NULL DEFAULT 'Paid',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_device` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `email`, `phone`, `ay`, `class`, `section`, `roll`, `login`, `role`, `acc_stat`, `fees`, `last_login`, `login_device`) VALUES
('OES11329', 'Vdsf', 'Sdaf', 'Male', '----', 'Dumka', 'hbjhsd@gmail.com', '8547965888', '2021-2022', '5', 'SECTION-A', '212', 'studentsjs', 'student', '1', 'Paid', '2021-05-22 15:19:13', ''),
('OES19525', 'Koushik', 'Sadhu', 'Female', '----', 'New LIC Colony, Behind D.I.G Residency Near The City Garden Marriage Hall, Durga Mandir Road', 'kkoushikssadhu@gmail.com', '07992321676', '2021-2022', '10', 'SECTION-A', '25', 'studentsjs', 'student', 'Active', 'Unpaid', '2021-05-23 09:47:10', 'Desktop/Laptop'),
('OES19900', 'Yrdy', 'Dyry', 'Male', '----', 'Ffff', 'ty@gmail.com', '56', '2021-2022', '9', 'SECTION-A', '-', 'studentsjs', 'student', 'Active', 'Paid', '2021-05-22 15:19:13', ''),
('OES26881', 'VIKRAM HARI', '8', 'Male', '22222', 'GAJHANDA DUMKA', 'fzxd@gmail.com', '564', '2021-2022', '10', 'SECTION-A', '25', 'studentsjs', 'student', 'Active', 'Paid', '2021-05-22 15:48:54', ''),
('OES31336', 'Swarnim', 'Mandal', 'Male', 'sd', 'Sd', 's@gmail.com', '8', '2021-2022', '10', 'SECTION-B', '54', 'studentsjs', 'student', 'Active', 'Paid', '2021-05-23 04:51:41', 'Android'),
('OES59153', 'Oooo', 'Gdfgd', 'Male', '51515', 'SdfrRSD', 'kdfgfgfd@gmail.com', '645', '2021-2022', '9', 'SECTION-A', '', 'studentsjs', 'student', 'Active', 'Paid', '2021-05-24 03:58:38', 'Desktop/Laptop'),
('OES64278', 'Fdfg', 'Hcgfh', 'Male', '----', 'Dumka', 'khsr@gmail.com', '45', '2021-2022', '5', 'SECTION-B', '28', 'studentsjs', 'student', '1', 'Paid', '2021-05-22 15:19:13', ''),
('OES70413', 'NishiKant Mandal', 'Mandal', 'Male', '----', 'DUMKA\r\n', 'nishi@GMAIL.COM', '85', '2021-2022', '10', 'SECTION-B', '22', 'studentsjs', 'student', 'Active', 'Paid', '2021-05-23 09:35:53', 'Desktop/Laptop'),
('OES91929', 'Fsdf', 'Adf', 'Male', '-----', 'Dumka', '564@gmail.com', 'fdsf', '2021-2022', '5', 'SECTION-A', '2222', 'studentsjs', 'student', '1', 'Paid', '2021-05-22 15:19:13', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acad`
--
ALTER TABLE `tbl_acad`
  ADD PRIMARY KEY (`ay_id`);

--
-- Indexes for table `tbl_assessment_records`
--
ALTER TABLE `tbl_assessment_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_examinations`
--
ALTER TABLE `tbl_examinations`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`sect_id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
