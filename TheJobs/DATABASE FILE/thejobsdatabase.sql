-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2023 at 03:53 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thejobsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs_admin`
--

DROP TABLE IF EXISTS `jobs_admin`;
CREATE TABLE IF NOT EXISTS `jobs_admin` (
  `a_id` int(20) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_admin`
--

INSERT INTO `jobs_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
(1, 'System Admin', 'admin@mail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_consultant`
--

DROP TABLE IF EXISTS `jobs_consultant`;
CREATE TABLE IF NOT EXISTS `jobs_consultant` (
  `c_id` int(20) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_number` varchar(200) NOT NULL,
  `c_addr` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `cn_name` varchar(200) NOT NULL,
  `c_status` varchar(200) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_consultant`
--

INSERT INTO `jobs_consultant` (`c_id`, `c_name`, `c_number`, `c_addr`, `c_email`, `cn_name`, `c_status`) VALUES
(3, 'Thisara Navod', '0773446510', 'colombo 5, Sri lanka', 'thisaranavod@mail.com', 'Thisara Navod', 'Available'),
(5, 'Akila Bandara', '0712345643', 'colombo 1, Sri lanka', 'Akila@mail.com', 'Akila Bandara', 'Available'),
(6, 'Parami Hewage', '0772341232', 'colombo 2 ,Sri lanka', 'Parami@mail.com', 'Parami Hewage', 'Available'),
(8, 'Ramani Silva', '0775645432', 'colombo 7 ,Sri lanka', 'ramani@mail.com', 'Ramani Silva', 'Available'),
(10, 'Dinuka Bandara', '0764534356', 'Colombo 3 ,Sri lanka', 'dinuka@mail.com', 'Dinuka Bandara', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_user`
--

DROP TABLE IF EXISTS `jobs_user`;
CREATE TABLE IF NOT EXISTS `jobs_user` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_phone` varchar(200) NOT NULL,
  `u_addr` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_category` varchar(200) NOT NULL,
  `c_n_name` varchar(200) NOT NULL,
  `c_n_phone` varchar(200) NOT NULL,
  `c_bookdate` varchar(200) NOT NULL,
  `c_book_status` varchar(200) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_user`
--

INSERT INTO `jobs_user` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_addr`, `u_email`, `u_pwd`, `u_category`, `c_n_name`, `c_n_phone`, `c_bookdate`, `c_book_status`) VALUES
(3, 'Nihala', 'Perera', '0706789091', 'Gampaha, Sri lanka', 'nihal@mail.com', 'nihal', 'User', 'Thisara Navod', '0773456784', '2023-09-22', 'Pending'),
(8, 'Kamal', 'Perera', '0774543444', 'Colombo, Sri lanka', 'kamal@mail.com', 'kamal', 'User', 'Ramani Silva', '0775645432', '2023-09-26', 'Pending'),
(9, 'Sunil', 'Silva', '0741256311', 'Kurunagala, Sri Lanka', 'sunil@mail.com', 'sunil', 'User', 'Akila Bandara', '0712345643', '2023-09-29', 'Pending'),
(10, 'Amal', 'Bandara', '0723436764', 'Kandy, Sri lanka', 'amal@mail.com', 'amal', 'User', 'Akila Bandara', '0712345643', '2023-09-13', 'Approved'),
(11, 'Thisara', 'Bandara', '0776440410', 'mawanella, srilanka', 'thisara@mail.com', 'thisara', 'User', 'Akila Bandara', '0712345643', '2023-09-27', 'Approved'),
(12, 'Saman', 'Bandara', '0785432345', 'kegalle, Sri lanka', 'saman@mail.com', 'saman', 'User', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
