-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 11:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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

CREATE TABLE `ojt_accounts` (
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

CREATE TABLE `ojt_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `announcements` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_announcements`
--

INSERT INTO `ojt_announcements` (`id`, `title`, `announcements`, `created_at`, `updated_at`) VALUES
(2, 'Sample Title 2', 'Sample', '2018-01-27', '2018-02-03'),
(3, 'test', 'test', '2018-02-03', '0000-00-00'),
(4, 'test2', 'test2', '2018-02-03', '0000-00-00'),
(5, 'test3', 'test3', '2018-02-03', '0000-00-00'),
(6, 'test4', 'test4', '2018-02-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_company_details`
--

CREATE TABLE `ojt_company_details` (
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
-- Table structure for table `ojt_enrolled_students`
--

CREATE TABLE `ojt_enrolled_students` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_form_status`
--

CREATE TABLE `ojt_form_status` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `form_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_hours_rendered`
--

CREATE TABLE `ojt_hours_rendered` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `hours_rendered` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_requirements_list`
--

INSERT INTO `ojt_requirements_list` (`id`, `name`, `description`, `file`, `created_at`, `updated_at`, `type`, `step`, `is_online`) VALUES
(2, 'test3', 'test3', '24126594_896111943887045_1329009679069609984_n.jpg', '2018-02-10', '2018-02-10', 0, 0, 0),
(4, 'test', 'test', 'ics_logo.png', '2018-02-10', '0000-00-00', 1, 2, 0),
(5, 'test4', 'test4', 'image_gallery_(2).jpg', '2018-02-10', '0000-00-00', 0, 1, 0),
(6, 'test5', 'test5', 'FutureTech-HighAltitude-AirbusDefenseAndSpace.jpg', '2018-02-10', '0000-00-00', 0, 4, 0),
(7, 'test6', 'test6', 'FutureTech_UbiquitousDrones_DeutschePostDHL.jpg', '2018-02-10', '0000-00-00', 0, 0, 0),
(8, 'Waivers', 'waivers', 'Online_Shopping_-_Print_order.pdf', '2018-02-10', '2018-02-10', 0, 0, 0),
(9, 'Application Letter', 'Initial Requirements', '', '2018-02-12', '0000-00-00', 1, 1, 1),
(10, 'test', 'test', '', '2018-02-12', '0000-00-00', 1, 2, 1),
(11, 'test2', 'test2', '', '2018-02-12', '0000-00-00', 1, 2, 1),
(12, 'test7', 'test7', '', '2018-02-12', '0000-00-00', 0, 0, 1),
(13, 'test8', 'test8', '', '2018-02-12', '2018-02-12', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ojt_student_requirements`
--

CREATE TABLE `ojt_student_requirements` (
  `id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_online` int(11) NOT NULL,
  `is_complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_student_requirements`
--

INSERT INTO `ojt_student_requirements` (`id`, `requirement_id`, `stud_id`, `name`, `link`, `type`, `status`, `created_at`, `updated_at`, `is_online`, `is_complete`) VALUES
(1, 9, '2017-000E1-TG-0', '34946373544-646458182-ticket (2).pdf', '../../assets/uploads/student_requirements/', '', '1', '2018-02-12', '0000-00-00', 0, 0),
(2, 10, '2017-000E1-TG-0', '34946373544-646458182-ticket (2).pdf', '../../assets/uploads/student_requirements/', '', '1', '2018-02-12', '0000-00-00', 0, 0),
(3, 11, '2017-000E1-TG-0', 'AWpHNU.jpg', '../../assets/uploads/student_requirements/', '', '1', '2018-02-12', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ojt_stud_ojt_status`
--

CREATE TABLE `ojt_stud_ojt_status` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_total_hours`
--

CREATE TABLE `ojt_total_hours` (
  `id` int(11) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` int(1) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` int(20) DEFAULT NULL,
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

INSERT INTO `ojt_users` (`user_id`, `lastname`, `firstname`, `middlename`, `suffix`, `student_id`, `course`, `username`, `password`, `email`, `contact_number`, `gender`, `birthdate`, `street`, `barangay`, `city`, `province`, `profile_picture`, `created_at`, `updated_at`, `is_validated`, `is_admin`, `token`) VALUES
(1, '', '', NULL, NULL, '', '', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin@ojtms.com', 0, '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 1, ''),
(2, 'Jamarin', 'Walid', 'A', NULL, '2017-000E1-TG-0', 'BSIT', 'walid', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'walidilaw@gmail.com', 0, '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, ''),
(3, 'Dela Cruz', 'Juan', '', '', '2017-00440', 'BSAIT', 'juanluna', '9ea9839ac9edafdaf7d93ba440ae4fc76a93667f', 'cronnelbrian@gmail.com', 0, 'MALE', '2018-02-10', '', '', '', '', '', '2018-02-10', '0000-00-00', 1, 0, ''),
(4, 'Penduco', 'Pedro', NULL, NULL, '2017-00440', 'BSIM', 'pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedro@mail.com', 0, 'MALE', '2018-02-11', '', '', '', '', '', '2018-02-13', '0000-00-00', 0, 0, '');

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
-- Indexes for table `ojt_enrolled_students`
--
ALTER TABLE `ojt_enrolled_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_form_status`
--
ALTER TABLE `ojt_form_status`
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
-- Indexes for table `ojt_student_requirements`
--
ALTER TABLE `ojt_student_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_stud_ojt_status`
--
ALTER TABLE `ojt_stud_ojt_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ojt_company_details`
--
ALTER TABLE `ojt_company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_enrolled_students`
--
ALTER TABLE `ojt_enrolled_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ojt_form_status`
--
ALTER TABLE `ojt_form_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ojt_student_requirements`
--
ALTER TABLE `ojt_student_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ojt_stud_ojt_status`
--
ALTER TABLE `ojt_stud_ojt_status`
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
