-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 09:04 AM
-- Server version: 5.5.33-1
-- PHP Version: 5.5.7-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lasku`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL COMMENT 'User email address, used to login',
  `password` char(32) NOT NULL COMMENT 'Password in MD5',
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Full name',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this user is a system administrator',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User accounts' AUTO_INCREMENT=1 ;
