-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2022 at 07:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_regis`
--

CREATE TABLE `emp_regis` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_regis`
--

INSERT INTO `emp_regis` (`id`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(1, 'divya', 'Gupta', 'admin@gmail.com', 9930452222, '$2y$10$OPnTwSnu/wxh1u0tr7PlBOGa.gJO7HUuQ7PwYNaYg5vVmZt2QW/W2'),
(3, 'Divya', 'Gupta', 'admin2@gmail.com', 8787878787877, '$2y$10$7rSORxjbClOu6YGOLvX44emKsba6xUHNe6FWxDu5WBv7wv88zPIXu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_regis`
--
ALTER TABLE `emp_regis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_regis`
--
ALTER TABLE `emp_regis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
