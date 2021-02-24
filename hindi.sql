-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2021 at 09:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hindi`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `username`, `user_id`) VALUES
(1, 'laptop', 4),
(2, 'google', 9),
(3, 'microsoft', 4),
(4, 'yahoo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hindis`
--

DROP TABLE IF EXISTS `hindis`;
CREATE TABLE IF NOT EXISTS `hindis` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hindis`
--

INSERT INTO `hindis` (`id`, `name`, `email`) VALUES
(1, 'hamode', 'hamoodylkbeer@gmail.com'),
(2, 'mostafa', 'mostafa@gmail.com'),
(6, 'mahmoud', 'aboosta7ta7@gmail.com'),
(5, 'ahmad', 'ahmad@gmail.com'),
(7, 'ahmad', 'ahmad@gmail.com'),
(8, 'mahmoud', 'mahmood@gmail.com'),
(9, 'aboali', 'aboali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `nationality` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`nationality`) VALUES
('arabic'),
('german');

-- --------------------------------------------------------

--
-- Table structure for table `migr`
--

DROP TABLE IF EXISTS `migr`;
CREATE TABLE IF NOT EXISTS `migr` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migr`
--

INSERT INTO `migr` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, '5Zkpx', 'AeUUAay 7aga', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_12_27_050241_create_migr_table', 1),
(3, '2021_01_25_160120_create_profiles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ana@gmail.com', 'k6dBfFfKWnw1A1uToaeBhx6NFeDqpz9jBTGbwQ5VYk74Fdnf6GLtLNndl8SG', '2021-02-24 07:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(4, 'dj2jd2', '1611604104.jpg', NULL, NULL),
(7, 'fwf3g3', '1611603722.xml', NULL, NULL),
(6, 'mostafa', '1611601045.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resset`
--

DROP TABLE IF EXISTS `resset`;
CREATE TABLE IF NOT EXISTS `resset` (
  `resset` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resset`
--

INSERT INTO `resset` (`resset`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `case_id` int(100) NOT NULL,
  `sender_id` int(100) NOT NULL,
  `reciever_id` int(100) NOT NULL,
  `reciever_type` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `parent_task` varchar(100) DEFAULT NULL,
  `is_complete` varchar(100) NOT NULL,
  `completed_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `case_id`, `sender_id`, `reciever_id`, `reciever_type`, `title`, `discription`, `due_date`, `parent_task`, `is_complete`, `completed_date`) VALUES
(1, 20, 21, 22, 'doctor', 'urine test', 'hodhiqohdqidq', '20-11-2020', NULL, 'yes', NULL),
(2, 20, 22, 21, 'doctor', 'check ', 'bone ', '20-11-2020', NULL, 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Mname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mobile` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `certificates` varchar(500) DEFAULT NULL,
  `resset` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `Mname`, `email`, `password`, `mobile`, `country`, `city`, `type`, `nationality`, `major`, `certificates`, `resset`) VALUES
(14, 'mhs', '', '', 'mawdi93@gmail.com', '$2y$10$3IWbIUJMHViGPbxZTh11XeB0UkQjvk1Vj0VXVNaSVlm8AzpEO7cq.', 12121, '', '', 'admin', NULL, NULL, NULL, 0),
(20, 'mhmd', 'hassan', 'alhassan', 'hamoodylkbeer@gmail.com', '$2y$10$A7q2cNX3d.Ai8gMEH/znUuKAIXNI2PZ6v7CKK.QjKSxj//P/oYmNq', 71941273, 'lebanon', 'saida', 'patient', NULL, NULL, NULL, 1),
(21, 'mhmd', 'hassan', 'alhassan', '31730568@students.liu.edu.lb', '$2y$10$mqsH84.MEiQCw6Y9ClerpeCXF/Fx2g6Z3fDvJRZHU999zMw.BdZca', 9000, 'lebanon', 'saida', 'doctor', 'Arabic', 'bones', '1613061791.zip', 1),
(22, 'ahmad', 'antar', 'ahmd', 'ana@gmail.com', '$2y$10$ob3OOmsU0DNn31Zoo3ujge2dOBv2DPAnJq8TrSxENlqzEpg/4YlF2', 9000, 'lebanon', 'saida', 'doctor', 'Arabic', 'bones', '1613498138.docx', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
