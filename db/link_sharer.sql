-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2015 at 03:31 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `link_sharer`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `url` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`url`, `username`, `time`, `upvotes`, `downvotes`, `clicks`) VALUES
('http://facebook.com', 'test', '2015-01-08 00:46:21', 0, 0, 0),
('http://gvaibhaau/', 'gvaibhau', '2015-01-27 23:13:17', 0, 0, 0),
('http://localhost', 'pdhoot', '2015-01-27 23:07:04', 0, 0, 0),
('http://sabkomaardunga.com', 'pdhoot', '2015-01-27 23:01:32', 0, 0, 0),
('http://www.blender.org/getblender', 'pdhoot', '2015-01-27 23:04:33', 0, 0, 0),
('https://shishi.com', 'gvaibhau', '2015-01-29 13:57:41', 0, 0, 0),
('https://www.google.co.in', 'pdhoot', '2015-01-27 23:03:07', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`),
  KEY `username_3` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `name`) VALUES
('agwae', 'aesg', 'aweg'),
('b', 'c', 'a'),
('bb', 'cc', 'aa'),
('bbb', 'ccc', 'aaa'),
('gvaibhau', 'justdoit', 'Vaibhau'),
('pdhoot', 'getthem', 'Punit'),
('test', 'pass', 'Test User'),
('tnmy', 'daddy', 'Tanmay'),
('tnmys', 'daddy', 'Tanmay');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
