-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 02:52 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ojt_announcements`
--

CREATE TABLE IF NOT EXISTS `ojt_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `announcements` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_hours_rendered`
--

CREATE TABLE IF NOT EXISTS `ojt_hours_rendered` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `total_hours_id` int(11) NOT NULL,
  `hours_rendered` int(11) NOT NULL,
  `dtr` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_monthly_report`
--

CREATE TABLE IF NOT EXISTS `ojt_monthly_report` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `hours_completed` time NOT NULL,
  `is_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_requirements_list`
--

CREATE TABLE IF NOT EXISTS `ojt_requirements_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `type` int(11) NOT NULL,
  `step` int(11) DEFAULT NULL,
  `is_online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_student_recommendation`
--

CREATE TABLE IF NOT EXISTS `ojt_student_recommendation` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `company_address` varchar(500) NOT NULL,
  `supervisor_name` varchar(200) NOT NULL,
  `supervisor_position` varchar(500) NOT NULL,
  `supervisor_contact` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_student_requirements`
--

CREATE TABLE IF NOT EXISTS `ojt_student_requirements` (
  `id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_online` int(11) NOT NULL,
  `is_completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_total_hours`
--

CREATE TABLE IF NOT EXISTS `ojt_total_hours` (
  `id` int(11) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_users`
--

CREATE TABLE IF NOT EXISTS `ojt_users` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `student_id` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `is_validated` int(11) DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_users`
--

INSERT INTO `ojt_users` (`user_id`, `lastname`, `firstname`, `middlename`, `suffix`, `student_id`, `course`, `username`, `password`, `email`, `contact_number`, `gender`, `birthdate`, `street`, `barangay`, `city`, `province`, `profile_picture`, `created_at`, `updated_at`, `is_validated`, `is_admin`, `token`) VALUES
(1, '', '', NULL, NULL, '', '', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@ojtms.com', '0', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 1, ''),
(2, 'Jamarin', 'Walid', 'A', NULL, '2017-000E1-TG-0', 'BSIT', 'walid', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'walidilaw@gmail.com', '0', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 1, 0, ''),
(3, 'Dela Cruz', 'Juan', '', '', '2017-00441', 'BSAIT', 'juanluna', '9ea9839ac9edafdaf7d93ba440ae4fc76a93667f', 'cronnelbrian@gmail.com', '0', 'MALE', '2018-02-10', '', '', '', '', '', '2018-02-10', '0000-00-00', 1, 0, ''),
(4, 'Penduco', 'Pedro', NULL, NULL, '2017-00440', 'BSIM', 'pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedro@mail.com', '0', 'MALE', '2018-02-11', '', '', '', '', '', '2018-02-13', '0000-00-00', 0, 0, ''),
(5, 'Jomena', 'Julius', '', '', '000000000', 'BSIM', 'julzedric', '7c222fb2927d828af22f592134e8932480637c0d', 'juliuscedricjomena@gmail.com', '639169318734', 'MALE', '2018-02-16', '', '', '', '', NULL, '2018-02-16', NULL, NULL, 0, 'ff3cc643ce7de52d601033ef222b505a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ojt_announcements`
--
ALTER TABLE `ojt_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_hours_rendered`
--
ALTER TABLE `ojt_hours_rendered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_monthly_report`
--
ALTER TABLE `ojt_monthly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_requirements_list`
--
ALTER TABLE `ojt_requirements_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_student_recommendation`
--
ALTER TABLE `ojt_student_recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_student_requirements`
--
ALTER TABLE `ojt_student_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_total_hours`
--
ALTER TABLE `ojt_total_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_users`
--
ALTER TABLE `ojt_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ojt_announcements`
--
ALTER TABLE `ojt_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_hours_rendered`
--
ALTER TABLE `ojt_hours_rendered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_monthly_report`
--
ALTER TABLE `ojt_monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_requirements_list`
--
ALTER TABLE `ojt_requirements_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_student_recommendation`
--
ALTER TABLE `ojt_student_recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_student_requirements`
--
ALTER TABLE `ojt_student_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_total_hours`
--
ALTER TABLE `ojt_total_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_users`
--
ALTER TABLE `ojt_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
