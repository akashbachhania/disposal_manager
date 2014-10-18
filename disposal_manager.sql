-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 02:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `disposal_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `username` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `roll`, `date`, `username`, `image`) VALUES
(1, 'admin1', 'admin1', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'Thu-10-2014', 'admin1', 'index.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roll`
--

CREATE TABLE IF NOT EXISTS `roll` (
`id` int(11) NOT NULL,
  `roll` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roll`
--

INSERT INTO `roll` (`id`, `roll`) VALUES
(1, 'admin'),
(2, 'generator'),
(3, 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `suspendtb`
--

CREATE TABLE IF NOT EXISTS `suspendtb` (
`id` int(11) NOT NULL,
  `suspend_id` int(11) NOT NULL,
  `suspend_by` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `suspend_date` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `suspendtb`
--

INSERT INTO `suspendtb` (`id`, `suspend_id`, `suspend_by`, `firstname`, `lastname`, `email`, `suspend_date`) VALUES
(15, 83, 'admin1', 'sasdfasdfaaasd', 'asdfassad', 'asdfasd', '06-Oct-2014');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `epa_id` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roll` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `account` varchar(50) NOT NULL COMMENT 'active="1",deactive="0"',
  `companyname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `address1`, `address2`, `city`, `state`, `zipcode`, `epa_id`, `contact`, `fax`, `password`, `roll`, `date`, `account`, `companyname`, `department`, `account_no`) VALUES
(83, 'sasdfasdfaaasd', 'asdfassad', 'asdfasd', '', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2', 'not_login', '0', 'asdas', 'asdfasdf', '10000001'),
(84, 'asdf', 'asdfasd', 'asdfasd@gmail.com', '', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '3', 'not_login', '1', 'asdf', 'asdf', '90000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roll`
--
ALTER TABLE `roll`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspendtb`
--
ALTER TABLE `suspendtb`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roll`
--
ALTER TABLE `roll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suspendtb`
--
ALTER TABLE `suspendtb`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
