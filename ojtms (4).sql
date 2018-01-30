-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 10:46 PM
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
-- Table structure for table `ojt_accounts`
--

CREATE TABLE IF NOT EXISTS `ojt_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `updated_at` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_announcements`
--

CREATE TABLE IF NOT EXISTS `ojt_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `announcements` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_announcements`
--

INSERT INTO `ojt_announcements` (`id`, `title`, `announcements`, `created_at`, `updated_at`) VALUES
(2, 'Sample Title', 'Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample Sample ', '2018-01-27', '2018-01-28'),
(3, 'Sample2 Sample2', 'Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2Sample2 Sample2', '2018-01-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_company_details`
--

CREATE TABLE IF NOT EXISTS `ojt_company_details` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `supervisor_position` varchar(50) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_form_status`
--

CREATE TABLE IF NOT EXISTS `ojt_form_status` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `form_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` int(11) NOT NULL
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
-- Table structure for table `ojt_requirements`
--

CREATE TABLE IF NOT EXISTS `ojt_requirements` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_downloadable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_total_hours`
--

CREATE TABLE IF NOT EXISTS `ojt_total_hours` (
  `id` int(11) NOT NULL,
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
  `middlename` varchar(50) NOT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `student_id` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_validated` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_users`
--

INSERT INTO `ojt_users` (`user_id`, `lastname`, `firstname`, `middlename`, `suffix`, `student_id`, `course`, `semester`, `username`, `password`, `email`, `contact_number`, `gender`, `birthdate`, `street`, `barangay`, `city`, `province`, `created_at`, `updated_at`, `is_validated`, `is_admin`) VALUES
(1, 'test', 'test', 'test', 'test', '001', '1', 1, 'test', 'test', 'test@test.com', 0, 'MALE', '2018-01-27', 'test', 'test', 'test', 'test', '2018-01-27', '0000-00-00', 0, 0),
(2, 'test2', 'test2', 'test2', 'test2', '002', '1', 1, 'test2', 'test2', 'test@test.com', 0, 'FEMALE', '2018-01-27', 'test2', 'test2', 'test2', 'test2', '2018-01-27', '0000-00-00', 0, 0),
(3, 'test3', 'test3', 'test3', 'test3', '003', '1', 1, 'test3', 'test3', 'test@test.com', 0, 'MALE', '2018-01-27', 'tst3', 'test3', 'test3', 'test3', '2018-01-27', '0000-00-00', 0, 0),
(4, 'test4', 'test4', 'test4', 'test4', '004', '1', 1, 'test4', 'test4', 'test@test.com', 0, 'FEMALE', '2018-01-27', 'test4', 'test4', 'test4', 'test4', '2018-01-27', '0000-00-00', 0, 0),
(5, 'test', 'test', 'test', 'test', '001', '2', 2, 'test', 'test', 'test@test.com', 0, 'FEMALE', '2018-01-27', 'test', 'test', 'test', 'test', '2018-01-27', '0000-00-00', 0, 0),
(6, 'test', 'test', 'test', 'test', '001', '1', 1, 'test', 'test', 'test@test.com', 0, 'FEMALE', '2018-01-27', 'test', 'test', 'test', 'test', '2018-01-27', '0000-00-00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ojt_accounts`
--
ALTER TABLE `ojt_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_announcements`
--
ALTER TABLE `ojt_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_company_details`
--
ALTER TABLE `ojt_company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_form_status`
--
ALTER TABLE `ojt_form_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_monthly_report`
--
ALTER TABLE `ojt_monthly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_requirements`
--
ALTER TABLE `ojt_requirements`
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
-- AUTO_INCREMENT for table `ojt_accounts`
--
ALTER TABLE `ojt_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_announcements`
--
ALTER TABLE `ojt_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ojt_company_details`
--
ALTER TABLE `ojt_company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_form_status`
--
ALTER TABLE `ojt_form_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_monthly_report`
--
ALTER TABLE `ojt_monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_requirements`
--
ALTER TABLE `ojt_requirements`
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
