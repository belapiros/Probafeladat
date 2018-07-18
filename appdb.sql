-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2018 at 04:37 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1, '$2y$10$5y4mRLARYNiD/tMjd3JLwenmQadUQ/Rw5/KBaZPsJRaDzVTNmQO16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_path`, `created_at`, `modified_at`) VALUES
(1, 'Excel 2016 basics', 'You will learn the basics of Excel 2016 starting with simple tasks.', 'images/excel-01.jpg', '2018-06-27 09:31:11', '2018-06-27 09:31:11'),
(2, 'Excel 2016 advanced', 'You will learn advanced techniques in Excel 2016, please complete the basics first.', 'images/excel-02.jpg', '2018-06-27 09:33:03', '2018-06-27 09:33:03'),
(3, 'Excel 2016 functions', 'You will learn the functions of Excel 2016 starting with simple concepts.', 'images/excel-03.jpg', '2018-06-27 10:19:35', '2018-06-27 10:19:35'),
(4, 'Word 2010 basics', 'You will learn the basics of Word 2010 starting with simple tasks.', 'images/word-01.jpg', '2018-06-27 09:31:11', '2018-06-27 09:31:11'),
(5, 'Word 2010 advanced', 'You will learn advanced techniques in Word 2010, please complete the basics first.', 'images/word-02.jpg', '2018-06-27 09:31:11', '2018-06-27 09:31:11'),
(6, 'Word 2013 basics', 'You will learn the basics of Word 2013 starting with simple tasks.', 'images/word-03.jpg', '2018-06-27 09:31:11', '2018-06-27 09:31:11'),
(15, 'Word 2013 advanced', 'You will learn advanced techniques in Word 2013, please complete the basics first.', 'images/word-04.jpg', '2018-06-27 09:31:11', '2018-06-27 09:31:11'),
(33, 'PowerPoint 2016 basics', 'You will learn the basics of PowerPoint 2016 starting with simple tasks.', 'images/powerp-01.jpg', '2018-06-29 03:35:53', '2018-06-29 03:35:53'),
(34, 'PowerPoint 2016 advanced', 'You will learn advanced techniques in PowerPoint 2016, please complete the basics first.', 'images/powerp-02.jpg', '2018-06-29 03:37:50', '2018-06-29 03:37:50'),
(35, 'PowerPoint 2013 basics', 'You will learn the basics of PowerPoint 2013 starting with simple tasks.', 'images/powerp-03.jpg', '2018-06-29 03:41:47', '2018-06-29 03:41:47'),
(36, 'PowerPoint 2013 advanced', 'You will learn advanced techniques in PowerPoint 2013, please complete the basics first.', 'images/powerp-04.jpg', '2018-06-29 03:42:26', '2018-06-29 03:42:26'),
(37, 'Outlook 2016 basics', 'You will learn the basics of Outlook 2016 starting with simple tasks.', 'images/outlook-01.jpg', '2018-06-29 03:55:49', '2018-06-29 03:55:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
