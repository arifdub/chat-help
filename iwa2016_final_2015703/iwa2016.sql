-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2016 at 04:03 PM
-- Server version: 5.7.11
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `iwa2016`
--

CREATE TABLE `iwa2016` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `question` varchar(500) NOT NULL DEFAULT '0',
  `answer` varchar(500) NOT NULL DEFAULT '0',
  `status` int(20) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iwa2016`
--

INSERT INTO `iwa2016` (`id`, `name`, `question`, `answer`, `status`, `time`) VALUES
(28, 'John', 'can you help me', '0', 0, '2016-05-12 15:34:55'),
(29, 'John', 'can you hlep me', '0', 0, '2016-05-12 15:38:30'),
(30, '0', '0', 'yes sure how can i help u ', 1, '2016-05-12 15:45:33'),
(31, 'joe', 'howa', '0', 0, '2016-05-12 15:54:25'),
(32, '0', '0', 'i am good', 1, '2016-05-12 15:54:37'),
(33, 'joe', 'hi', '0', 0, '2016-05-12 15:59:43'),
(34, '0', '0', 'good', 1, '2016-05-12 15:59:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iwa2016`
--
ALTER TABLE `iwa2016`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iwa2016`
--
ALTER TABLE `iwa2016`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
