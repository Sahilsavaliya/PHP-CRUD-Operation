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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conpassword` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('active','inactive','archive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `password`, `conpassword`, `address`, `designation`, `gender`, `file`, `status`) VALUES
(59, '', '', '', '', '', '\r\n          \r\n         \r\n          \r\n       \r\n          ', 'Sr Developer', 'male', '', 'active'),
(64, 'Aayush', 'Soni', 'As@gmail.com', '9198', '9198', '\r\n          Panchmal \r\n          ', 'Project Manager', 'male', 'img1.pdf', 'active'),
(67, 'Nik', 'seth', 'nk@gmail.com', '1515', '1515', 'gsvhbjkml ', 'Project Manager', 'male', 'img1.pdf', 'active'),
(69, 'tej ', 'hjbknm', 'J@gmail.com', '111', '111', '\r\n          \r\n           ghj\r\n          \r\n          ', 'Project Manager', 'male', 'tej.pdf', 'active'),
(84, 'Tej', 'Soni', 'tejsoni898@gmail.com', 'Tej4545', 'Tej4545', '\r\n          CH Road  \r\n          ', 'Jr Developer', 'male', 'file4.pdf', 'active'),
(85, 'Milind', 'Patil', 'MilindP55@gmail.com', 'Milind@55', 'Milind@55', 'CG Road  ', 'Project Manager', 'male', 'file5.pdf', 'active'),
(95, 'tej', 'Soni', 'tej@gmail.com', 'Tej@12345', 'Tej@12345', 'Swastik ', 'Jr Developer', 'male', '190393107004_CompletionCertificate1.pdf', 'active'),
(96, 'Vishruti', 'Patel', 'vp@gmail.com', 'Tej@12345', 'Tej@12345', 'Cg Road ', 'Sr Developer', 'male', '190393107004_CompletionCertificate2.pdf', 'active'),
(97, 'gvhij', 'gvhjbkl', 'bjknml@gmail.com', 'Tej@12345', 'Tej@12345', 'CGVHJklm ', 'Project Manager', 'male', '190393107004_CompletionCertificate3.pdf', 'active'),
(98, 'Jaypal', 'Prajapati', 'Jp@gmail.com', 'Pass@123', 'Pass@123', 'Thaltej ', 'Project Manager', 'male', '190393107004_CompletionCertificate4.pdf', 'active'),
(100, 'Tek', 'cgfhjbk', 'gvhjbkn@gmail.com', 'Tej@12345', 'Tej@123456', 'trdyugjikl ', 'Project Manager', 'male', '19039310700455.pdf', 'active'),
(102, 'dtfghjkl', 'fyguhijk', 'fguhijkl@gmail.com', 'Pass@123', 'PAss@1234', ' vhjbkml,;.', 'Project Manager', 'male', 'fdf.pdf', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tablea`
--

CREATE TABLE `tablea` (
  `id` int(11) NOT NULL,
  `checkbox_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablea`
--

INSERT INTO `tablea` (`id`, `checkbox_data`) VALUES
(5, 'Checkbox5'),
(10, 'Checkbox4'),
(13, 'Checkbox1'),
(14, 'Checkbox3');

-- --------------------------------------------------------

--
-- Table structure for table `tableb`
--

CREATE TABLE `tableb` (
  `id` int(11) NOT NULL,
  `checkbox_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tableb`
--

INSERT INTO `tableb` (`id`, `checkbox_data`) VALUES
(9, 'Checkbox2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablea`
--
ALTER TABLE `tablea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableb`
--
ALTER TABLE `tableb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tablea`
--
ALTER TABLE `tablea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tableb`
--
ALTER TABLE `tableb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
