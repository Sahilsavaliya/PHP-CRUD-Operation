-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 07:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `fname`, `lname`, `gender`, `contact`, `email`, `dob`, `age`, `password`, `file`) VALUES
(105, 'dev', 'rajyguru', 'M', '1223343121', 'dev123@gmail.com', '0000-00-00', 21, '124', 'i4.jpg'),
(111, 'kushal', 'vala', 'M', '0011212121', 'kaushal@gmail.com', '0000-00-00', 21, '21214', 'i4.jpg'),
(113, 'vishal', 'sonar', 'M', '0001112222', 'vishal@gmail.com', '0000-00-00', 24, '123', 'i4.jpg'),
(115, 'vishal', 'patil', 'M', '0000111111', 'vishalll@gmail.com', '0000-00-00', 21, '123', 'i4.jpg'),
(116, 'nishant', 'karen', 'M', '1100110011', 'nishant@gmail.com', '0000-00-00', 21, '123456', 'i4.jpg'),
(117, 'nishant', 'nishant', 'F', '3546535464', 'sahil@gamil.com', '0000-00-00', 25, 'asdlfkaj', 'dd.txt'),
(118, 'jayraj', 'sarvaiya', 'M', '1144557788', 'jayraj@gmail.com', '0000-00-00', 21, '123', 'dd.txt'),
(121, 'suryaraj', 'rathod', 'M', '0033333333', 'surya@gmail.com', '0000-00-00', 22, '123456', 'i4.jpg'),
(124, 'vivek', 'babriya', 'M', '6565656565', 'vivek@gmail.com', '0000-00-00', 25, '123', 'aa.txt'),
(129, 'radhika', 'vora', 'F', '0011445588', 'radhika@gmail.com', '0000-00-00', 22, 'abcde424', 'xx.txt'),
(130, 'dhruti', 'vasoya', 'F', '0321478596', 'dhruti@gmail.com', '0000-00-00', 21, 'sahil123', 'qq.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`email`),
  ADD UNIQUE KEY `Contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
