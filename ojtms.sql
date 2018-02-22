-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 12:42 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

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

CREATE TABLE `ojt_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `announcements` varchar(500) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_hours_rendered`
--

CREATE TABLE `ojt_hours_rendered` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `total_hours_id` int(11) NOT NULL,
  `hours_rendered` int(11) NOT NULL,
  `dtr` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_hours_rendered`
--

INSERT INTO `ojt_hours_rendered` (`id`, `stud_id`, `total_hours_id`, `hours_rendered`, `dtr`, `status`, `created_at`, `updated_at`) VALUES
(4, '2017-000E1-TG-0', 0, 100, '2017-000E1-TG-0_34238.', 1, '2018-02-19', '0000-00-00'),
(5, '2017-000E1-TG-0', 0, 100, '2017-000E1-TG-0_46796.', 1, '2018-02-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_monthly_report`
--

CREATE TABLE `ojt_monthly_report` (
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

CREATE TABLE `ojt_requirements_list` (
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

--
-- Dumping data for table `ojt_requirements_list`
--

INSERT INTO `ojt_requirements_list` (`id`, `name`, `description`, `file`, `created_at`, `updated_at`, `type`, `step`, `is_online`) VALUES
(1, 'Application Letter', 'Application Letter', '', '2018-02-19', '0000-00-00', 1, 1, 1),
(2, 'DTR', 'DTR', '', '2018-02-19', '0000-00-00', 1, 1, 0),
(3, 'Final Evaluation', 'Final Evaluation', '', '2018-02-19', '0000-00-00', 1, 1, 1),
(4, 'Resume', 'Resume', '', '2018-02-19', '0000-00-00', 1, 2, 1),
(5, 'Monthly Report', 'Monthly Report', '', '2018-02-19', '0000-00-00', 1, 2, 1),
(6, 'Test Requirement', 'Test Requirement', '', '2018-02-19', '0000-00-00', 1, 2, 0),
(7, 'Step 3', 'Step 3', '', '2018-02-19', '0000-00-00', 1, 3, 1),
(8, 'Step 4', 'Step 4', '', '2018-02-19', '0000-00-00', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ojt_student_recommendation`
--

CREATE TABLE `ojt_student_recommendation` (
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

CREATE TABLE `ojt_student_requirements` (
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
  `is_completed` int(11) NOT NULL,
  `flag` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_student_requirements`
--

INSERT INTO `ojt_student_requirements` (`id`, `requirement_id`, `stud_id`, `name`, `link`, `type`, `status`, `created_at`, `updated_at`, `is_online`, `is_completed`, `flag`) VALUES
(8, 1, '2017-000E1-TG-0', '2017-000E1-TG-0_19066.jpg', '../../assets/uploads/student_requirements/', NULL, '2', '2018-02-20', '0000-00-00', 0, 1, 0),
(9, 3, '2017-000E1-TG-0', '2017-000E1-TG-0_18057.jpg', '../../assets/uploads/student_requirements/', NULL, '3', '2018-02-20', '0000-00-00', 0, 1, 0),
(10, 2, '2017-000E1-TG-0', NULL, '', NULL, '3', '2018-02-20', '0000-00-00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ojt_total_hours`
--

CREATE TABLE `ojt_total_hours` (
  `id` int(11) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_total_hours`
--

INSERT INTO `ojt_total_hours` (`id`, `school_year`, `semester`, `course`, `total_hours`, `created_at`, `updated_at`) VALUES
(1, '2018 - 2019', 1, 'BSAIT', 500, '2018-02-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_users`
--

CREATE TABLE `ojt_users` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `student_id` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` smallint(6) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_users`
--

INSERT INTO `ojt_users` (`user_id`, `lastname`, `firstname`, `middlename`, `suffix`, `student_id`, `course`, `section`, `username`, `password`, `email`, `contact_number`, `gender`, `birthdate`, `street`, `barangay`, `city`, `province`, `profile_picture`, `created_at`, `updated_at`, `is_validated`, `is_admin`, `token`) VALUES
(1, '', '', NULL, NULL, '', '', 0, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@ojtms.com', '0', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 1, ''),
(2, 'Jamarin', 'Walid', 'A', NULL, '2017-000E1-TG-0', 'BSAIT', 1, 'walid', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'juliuscedricjomena@gmail.com', '0', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 1, 0, ''),
(3, 'Dela Cruz', 'Juan', '', '', '2017-00441', 'BSAIT', 2, 'juanluna', '9ea9839ac9edafdaf7d93ba440ae4fc76a93667f', 'cronnelbrian@gmail.com', '0', 'MALE', '2018-02-10', '', '', '', '', '', '2018-02-10', '0000-00-00', 1, 0, ''),
(4, 'Penduco', 'Pedro', NULL, NULL, '2017-00440', 'BSIM', 3, 'pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedro@mail.com', '0', 'MALE', '2018-02-11', '', '', '', '', '', '2018-02-13', '0000-00-00', 0, 0, ''),
(5, 'Jomena', 'Julius', '', '', '000000000', 'BSIM', 1, 'julzedric', '7c222fb2927d828af22f592134e8932480637c0d', '', '639169318734', 'MALE', '2018-02-16', '', '', '', '', NULL, '2018-02-16', NULL, NULL, 0, 'ff3cc643ce7de52d601033ef222b505a');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ojt_monthly_report`
--
ALTER TABLE `ojt_monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_requirements_list`
--
ALTER TABLE `ojt_requirements_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ojt_student_recommendation`
--
ALTER TABLE `ojt_student_recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ojt_student_requirements`
--
ALTER TABLE `ojt_student_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ojt_total_hours`
--
ALTER TABLE `ojt_total_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ojt_users`
--
ALTER TABLE `ojt_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
