-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 04:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcpc_iris`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email_address` varchar(320) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `address1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `last_name`, `middle_name`, `first_name`, `email_address`, `birthday`, `nationality`, `civil_status`, `gender`, `mobile_number`, `address1`) VALUES
(1, 'Gantong', 'Vidal', 'Anfernee Jeev', 'anferneegantong@gmail.com', '1995-07-02', 'Filipino', 'Single', 'Male', '09178684637', 'Dela Costa III, San Jose del Monte City, Bulacan'),
(2, 'Gantong', 'Vidal', 'Rachel', 'rachelgantong@gmail.com', '1991-09-19', 'Filipino', 'Single', 'Female', '09178684638', 'Dela Costa III, San Jose del Monte City, Bulacan'),
(3, 'Tabayay', 'Santos', 'Jane', 'jane@gmail.com', '1995-11-12', 'Filipino', 'Single', 'Female', '09178684639', 'Guanzonville, San Jose del Monte City, Bulacan'),
(4, 'Gantong', 'Vidal', 'Anfernee Jeev', 'anferneegantong@gmail.com', '1995-07-02', 'Filipino', 'Single', 'Male', '09178684637', 'Dela Costa III, San Jose del Monte City, Bulacan'),
(5, 'Gantong', 'Vidal', 'Rachel', 'rachelgantong@gmail.com', '1991-09-19', 'Filipino', 'Single', 'Female', '09178684638', 'Dela Costa III, San Jose del Monte City, Bulacan'),
(6, 'Tabayay', 'Santos', 'Jane', 'jane@gmail.com', '1995-11-12', 'Filipino', 'Single', 'Female', '09178684639', 'Guanzonville, San Jose del Monte City, Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpass` varchar(20) NOT NULL,
  `usertype` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `userpass`, `usertype`) VALUES
(1, 'Admin', 'Umaasaka12', 30),
(2, 'user', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
