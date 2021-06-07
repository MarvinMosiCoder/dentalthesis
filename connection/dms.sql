-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2021 at 07:44 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `datecreated`) VALUES
(1, 'administrator', 'adminpassword', '2020-11-18 10:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `treatment_type` varchar(255) NOT NULL,
  `date_of_appointment` date NOT NULL,
  `time_of_appointment` time NOT NULL,
  `users_status` int(11) NOT NULL,
  `appointment_status` varchar(255) DEFAULT NULL,
  `date_of_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `dentist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `client_id`, `client_name`, `treatment_type`, `date_of_appointment`, `time_of_appointment`, `users_status`, `appointment_status`, `date_of_registered`, `dentist`) VALUES
(61, 1, 'Marvin Q Mosico', 'matalino', '2021-06-10', '12:31:00', 0, '0', '2021-06-07 12:44:10', 'Dentist Name 2');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE `appointment_history` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name_client` varchar(255) NOT NULL,
  `type_of_treatment` varchar(255) NOT NULL,
  `name_of_dentist` varchar(255) NOT NULL,
  `date_of` date NOT NULL,
  `time_of` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`id`, `client_id`, `name_client`, `type_of_treatment`, `name_of_dentist`, `date_of`, `time_of`) VALUES
(6, 1, 'Marvin Q Mosico', 'lasing', 'Doctor Name 1', '2021-06-07', '12:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `report_tbl`
--

CREATE TABLE `report_tbl` (
  `id` int(11) NOT NULL,
  `name_of_patient` varchar(255) DEFAULT NULL,
  `treatment_type` varchar(255) DEFAULT NULL,
  `date_of_treatment` date DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `date_of_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_tbl`
--

INSERT INTO `report_tbl` (`id`, `name_of_patient`, `treatment_type`, `date_of_treatment`, `uploaded_by`, `date_of_upload`) VALUES
(17, 'dale', 'manginginum', '2021-01-01', 1, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `mname`, `lname`, `gender`, `date_of_birth`, `email`, `username`, `password`, `address`, `contact`, `status`, `date_of_register`) VALUES
(1, 'Marvin', 'Q', 'Mosico', '', '0000-00-00', 'mozze@gmail.com', 'Mozze', '21232f297a57a5a743894a0e4a801fc3', '', '09123345631', '0', '2020-11-17 07:12:25'),
(2, 'Jowe ', 'Matigas', 'Asas', 'Male', '1988-10-20', 'jowe@gmail.com', 'jowe', '202cb962ac59075b964b07152d234b70', 'Malabon City', '09765267819', '1', '2020-12-06 11:52:41'),
(3, 'Marialyn', 'Rico', 'Real', 'female', '1970-01-01', 'maria@gmail.com', 'maria', '8ad92b1af7e1d426219a319d4f9853ff', 'Malabon City', '08927819291', '1', '2020-12-07 06:48:06'),
(4, 'Cyrill', 'Jane', 'Novera', '', '0000-00-00', 'cy@gmail.com', 'cy', 'cfe81fe0db6affeb2ef066fd2b54540e', '', '09728346712', '1', '2020-12-07 06:52:32'),
(5, 'earl', 'john', 'navarette', '', '0000-00-00', 'earl@gmail.com', 'earl', '49518a801af38929c82ea09dc3c5f830', '', '09761278172', '1', '2020-12-07 06:54:47'),
(6, 'test', 'test', 'tes', '', '0000-00-00', 'test@gmail.com', 'test', '827ccb0eea8a706c4c34a16891f84e7b', '', '09273181281', '1', '2021-04-01 14:30:52'),
(7, 'Marialyn', 'Rico ', 'Real', '', '0000-00-00', 'marialyn@gmail.com', 'Ria', '202cb962ac59075b964b07152d234b70', '', '09273812839', '1', '2021-06-03 06:13:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tbl`
--
ALTER TABLE `report_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `appointment_history`
--
ALTER TABLE `appointment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report_tbl`
--
ALTER TABLE `report_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
