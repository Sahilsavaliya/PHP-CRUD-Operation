-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 02:11 PM
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
-- Table structure for table `logintable`
--

CREATE TABLE `logintable` (
  `name` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`name`, `password`) VALUES
('sahil', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `fname`, `lname`, `gender`, `contact`, `email`, `designation`, `age`, `password`, `file`) VALUES
(27, 'sahil', 'patel', 'male', '9737014969', 'sahil@gamil.com', 'Sr.Software Devloper', 20, 'Sahil@1234', 'MU Report Template 2021-22.docx'),
(32, 'meet', 'desai', 'male', '4578123654', 'meet@gmail.com', 'Project Manager', 25, 'Meet@123', 'Report Sem 8.doc'),
(33, 'tej', 'soni', 'male', '4578125968', 'tej11@gmail.com', 'Sr.Software Devloper', 25, 'Tej@123', 'oneplus-nord-2.jpg'),
(34, 'jaypal', 'prajapati', 'male', '9067073422', 'jaypal@gmail.com', 'Project Manager', 25, 'Jaypal@123', 'API-Commans and steps.txt'),
(42, 'tej', 'patel', 'male', '1245789634', 'tej123@gmail.com', 'Jr.Software Devloper', 22, 'Tej@123412', 'auth_app_create.txt'),
(50, 'shubham', 'babariya', 'female', '8200694913', 'testuser@kcsitglobal.com', 'Sr.Software Devloper', 20, 'Shubh@123', 'report.txt'),
(51, 'krishna', 'savaliyaq', 'female', '7847825645', 'krishna@gmail.com', 'Project Manager', 24, 'Krishna@12', 'report.txt'),
(52, 'nency', 'savaliya', 'female', '9737472895', 'nency@gmail.com', 'Project Manager', 18, 'Nency@1234', 'report.txt'),
(53, 'milind', 'patil', 'male', '4545588498', 'mili@gmail.com', 'Sr.Software Devloper', 21, 'Milind@123', 'report.txt'),
(55, 'tej', 'soni', 'male', '7842569874', 'tej1212@gmail.com', 'Sr.Software Devloper', 21, 'Tej@1212', 'report.txt'),
(60, 'raaj', 'ptl', 'male', '7585967412', 'raaj@gmail.com', 'Jr.Software Devloper', 21, 'Raaj@123', 'auth_app_create.txt'),
(61, 'shrushti', 'ptl', 'female', '1224758963', 'shrushti@gmail.com', 'Jr.Software Devloper', 21, 'Patel@123', 'kk.txt'),
(62, 'jayraj', 'vala', 'male', '4125879887', 'jayraj@gmil.com', 'Sr.Software Devloper', 21, 'Jayraj@123', 'kk.txt'),
(64, 'divyraj', 'dhadhal', 'male', '1204569775', 'jayraj@gmail.com', 'Sr.Software Devloper', 25, 'Divyraj@00', 'auth_app_create.txt'),
(65, 'divyraj', 'dhadhal', 'male', '2563347788', 'jayraj@gmail.com', 'Sr.Software Devloper', 25, 'Divyraj@12', 'auth_app_create.txt'),
(66, 'ram', 'desai', 'male', '4589633221', 'ram@gmail.com', 'Sr.Software Devloper', 25, 'Ram@123000', 'report.txt'),
(67, 'jaypal', 'ptl', 'male', '8974572156', 'jaypal11@gmail.com', 'Sr.Software Devloper', 20, 'Jaypal@123', 'kk.txt'),
(68, 'niraj', 'ptl', 'male', '8974563214', 'niraj@gmail.com', 'Sr.Software Devloper', 21, 'Niraj@123', 'auth_app_create.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
