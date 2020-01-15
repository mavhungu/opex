-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 03:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gctta`
--

-- --------------------------------------------------------

--
-- Table structure for table `junior`
--

CREATE TABLE `junior` (
  `juniur_id` int(11) NOT NULL,
  `junior_ac_number` varchar(255) NOT NULL,
  `junior_name` varchar(250) NOT NULL,
  `junior_surname` varchar(250) NOT NULL,
  `junior_assoc` varchar(250) NOT NULL,
  `junior_club` varchar(250) NOT NULL,
  `junior_id_number` varchar(250) NOT NULL,
  `junior_under` varchar(250) NOT NULL,
  `junior_doouble` varchar(250) NOT NULL,
  `juniour_paring` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junior`
--

INSERT INTO `junior` (`juniur_id`, `junior_ac_number`, `junior_name`, `junior_surname`, `junior_assoc`, `junior_club`, `junior_id_number`, `junior_under`, `junior_doouble`, `juniour_paring`) VALUES
(1, 'Ac3564', 'ronewa', 'mavhungu', 'mavhungu', 'ronewa', '1245', 'ud13', '1', 'AC123'),
(2, 'AC4578', 'mavhungu', 'mavhungu', 'ddd', 'jd', '1548', 'ud18', '0', ''),
(3, '', '', '', '', ' ', '', '', '', ' '),
(4, '', '', '', '', ' ', '', '', '', ' '),
(5, '', '', '', '', ' ', '', '', '', ' '),
(6, '', '', '', '', ' ', '', '', '', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `senior_id` int(11) NOT NULL,
  `senior_ac_number` varchar(250) NOT NULL,
  `senior_name` varchar(250) NOT NULL,
  `senior_surname` varchar(250) NOT NULL,
  `senior_assoc` varchar(250) NOT NULL,
  `senior_club` varchar(250) NOT NULL,
  `senior_id_number` varchar(100) NOT NULL,
  `senior_gender` varchar(50) NOT NULL,
  `senior_double` varchar(50) NOT NULL,
  `senior_double_paring` varchar(50) NOT NULL,
  `senior_fees` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcoming`
--

INSERT INTO `upcoming` (`tour_id`, `tour_name`, `tour_date`) VALUES
(1, 'Raiders World Table tennis Day Juniors', '2020-04-13'),
(2, 'Gauteng Open', '2020-01-22'),
(3, 'Gauteng Open', 'TBA'),
(4, 'SA OPEN', '22nd to 28th JUNE'),
(5, 'Gauteng North Junior', '11th May'),
(6, 'WCTTA', 'TBA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'ronewa@gmail.com', 'ronewa'),
(2, 'mavhungu@gmail.com', 'mavhungu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `junior`
--
ALTER TABLE `junior`
  ADD PRIMARY KEY (`juniur_id`);

--
-- Indexes for table `senior`
--
ALTER TABLE `senior`
  ADD PRIMARY KEY (`senior_id`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `junior`
--
ALTER TABLE `junior`
  MODIFY `juniur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `senior`
--
ALTER TABLE `senior`
  MODIFY `senior_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
