-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2014 at 08:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_reset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uid` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `confirmation`, `password`, `pass_reset`, `profile_picture`, `fb_token`, `uid`, `role`, `updated_at`, `created_at`) VALUES
(2, 'misa11a04', 'Hieu', 'Nguyen', 'misa11a04@gmail.com', '', '$2y$08$Ag.L7Sl4XpV4nDt9v.Hnc.Zqvxli1GeRoftKWwpkVJsopyptYEhdW', '', '', '', 0, 0, '2014-08-25 13:41:44', '0000-00-00 00:00:00'),
(4, 'hieu.huu', 'Hieu', 'Nguyen Huu', 'huuhieubk@gmail.com', '', '$2y$08$Ag.L7Sl4XpV4nDt9v.Hnc.Zqvxli1GeRoftKWwpkVJsopyptYEhdW', '', 'http://quiz.local/uploads/users/_user_1409249266.jpg', 'CAAEhLOQNDI4BALnPHWt4CfSuVb5jmb7f6EORefQ8lJNYOkAUZCROZBC4INhpgCm6uIPbeQFboVEOMtnQ2MTC7uXabXeE9ahAJL9MIdiZAISD55N4Rjqaoz24SUuT2s0s0kQOqlrZBCIRhWph5d0ZC1MDhPHcVFM3UZCjiUNugiy7ujUECfsX7g9r5dDAyZBKtisr2r6BXlpPOVLcgEtlZC9b', 10201246982535573, 1, '2014-08-28 11:07:50', '2014-08-18 07:38:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
