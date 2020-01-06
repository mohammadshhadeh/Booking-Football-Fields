-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2020 at 06:47 PM
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
-- Database: `pitchbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_image` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(1, 'Mohammad Shehadeh', 'm@m.m', 'm', '1ccf68df-d54d-46c4-b040-04b3156f27c1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `aside`
--

DROP TABLE IF EXISTS `aside`;
CREATE TABLE IF NOT EXISTS `aside` (
  `aside_id` int(3) NOT NULL AUTO_INCREMENT,
  `aside_name` varchar(50) NOT NULL,
  `aside_number` int(2) NOT NULL,
  `aside_price_hour` double(5,2) NOT NULL,
  `pitch_id` int(3) NOT NULL,
  PRIMARY KEY (`aside_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aside`
--

INSERT INTO `aside` (`aside_id`, `aside_name`, `aside_number`, `aside_price_hour`, `pitch_id`) VALUES
(1, 'first', 7, 15.00, 1),
(2, 'first', 6, 12.00, 1),
(3, 'second', 6, 12.00, 1),
(4, 'first', 5, 10.00, 1),
(5, 'second', 5, 10.00, 1),
(6, 'third', 5, 10.00, 1),
(8, 'first', 7, 15.00, 5),
(20, 'fourth', 6, 12.00, 12),
(19, 'third', 6, 12.00, 12),
(18, 'second', 6, 12.00, 12),
(17, 'first', 6, 12.00, 12),
(15, 'first', 6, 12.00, 9),
(14, 'first', 5, 10.00, 9),
(13, 'first', 6, 12.00, 8);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(3) NOT NULL AUTO_INCREMENT,
  `price` int(10) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `hour_start` varchar(6) NOT NULL,
  `hour_end` varchar(6) NOT NULL,
  `aside_id` int(3) NOT NULL,
  `customer_id` int(3) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `price`, `booking_date`, `hour_start`, `hour_end`, `aside_id`, `customer_id`) VALUES
(109, 24, '2020-01-06', '6PM', '8PM', 2, 1),
(108, 12, '2020-01-06', '8PM', '9PM', 2, 1),
(107, 12, '2020-01-06', '11PM', '12AM', 2, 1),
(106, 24, '2020-01-06', '1AM', '3AM', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `identical_number` bigint(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `identical_number`, `password`, `phone`) VALUES
(1, 'Mohammad Shehadeh', 'a@a.a', 11211515, '123456789', '0789972842'),
(20, 'asdasd', 'moh@s.c', 54545, '123554584848512', '545454545454'),
(22, 'tfyguhij', 'asdasd@fsdf.asd', 5151515, '12354584', '51515155'),
(23, 'sadasd sada', 'mohammasd@asdas.com', 25615611, 'sdasbdjnk5121', '15454151'),
(24, 'sadasd sada', 'mohammasd@asdas.com', 256156116, 'sdasbdjnk5121', '15454151'),
(21, 'Mohammad Zaid Sh', 'Mohammad@gmail.com', 123456789, 'Mohammad0789972842', '0789972842'),
(25, 'sadasd sada', 'mohammasd@asdas.com', 256156151, 'sdasbdjnk5121', '15454151'),
(26, 'sadasd sada', 'mohammasd@asdas.com', 25615611651, 'sdasbdjnk5121', '15454151'),
(27, 'sadasd sada', 'mohammasd@asdas.com', 2561561454541651, 'sdasbdjnk5121', '15454151'),
(28, 'sadasd sada', 'mohammasd@asdas.com', 256156777711651, 'sdasbdjnk5121', '15454151'),
(29, 'sadasd  sada', 'mohammasd@asdas.com', 25615611651, 'sdasbdjnk5121', '15454151');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(3) NOT NULL AUTO_INCREMENT,
  `aside_image` varchar(250) NOT NULL,
  `aside_id` varchar(250) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `aside_image`, `aside_id`) VALUES
(6, 'main_h.jpg', '1'),
(7, 'FB_IMG_1547145438468.jpg', '8'),
(11, 'main_small.jpg', '13'),
(12, 'main_smalls.jpg', '4'),
(13, 'main_smallss.jpg', '5'),
(14, 'main_smallsss.jpg', '6'),
(15, 'main_smallssss.jpg', '2'),
(16, 'main_smallsssss.jpg', '3'),
(17, 'maink.jpg', '15'),
(20, 'crocker_soccergoal.jpg', '1'),
(21, 'main_as.jpg', '8'),
(18, 'Ù…Ù„Ø¹Ø¨-Ø«ÙŠÙ„-ØµÙ†Ø§Ø¹ÙŠ.jpg', '14'),
(19, 'slide-2.jpg', '1'),
(23, 'first.jpg', '17'),
(24, 'second.jpg', '18'),
(25, 'third.jpg', '19'),
(26, 'fourth.jpg', '20');

-- --------------------------------------------------------

--
-- Table structure for table `pitch`
--

DROP TABLE IF EXISTS `pitch`;
CREATE TABLE IF NOT EXISTS `pitch` (
  `pitch_id` int(3) NOT NULL AUTO_INCREMENT,
  `pitch_name` varchar(25) NOT NULL,
  `pitch_address` varchar(20) NOT NULL,
  `five_aside` int(3) NOT NULL,
  `six_aside` int(3) NOT NULL,
  `seven_aside` int(3) NOT NULL,
  `description` mediumtext NOT NULL,
  `pitch_image` varchar(250) NOT NULL,
  PRIMARY KEY (`pitch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pitch`
--

INSERT INTO `pitch` (`pitch_id`, `pitch_name`, `pitch_address`, `five_aside`, `six_aside`, `seven_aside`, `description`, `pitch_image`) VALUES
(1, 'Shabab Al-Ordon Club', 'Amman, Ghamadan', 3, 2, 1, '   Shabab Al-Ordon Club is a Jordanian football club based in Amman, in Jordan. The club was established in 2002 and is considered as the newest club in Jordan, but originated from its club Al-Qadisiyah.   ', 'olsj-pic1-web.jpg'),
(5, 'Al Jawhra', 'Amman, Jawa', 0, 0, 1, '   Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.   ', 'B46B5CEC5CDE3173040115C3F8CCE9BD.jpg'),
(9, 'Al Arz Club', 'Amman, Juwaideh', 0, 1, 1, '  Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.	  ', '598fbfed99da970d66521f03f03a9e9c.jpg'),
(8, 'Juwaideh Club', 'Amman, Juwaideh ', 0, 1, 0, ' Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\r\n         ', 'flood-lights.jpg'),
(12, 'Al-Yarmouk Club', 'Amman, Ghamadan', 0, 4, 0, 'is Jordan a football, formed in Amman in 1967, the club is currently part of the Jordan Premier League', 'yarmouk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `image`) VALUES
(1, 'download.png'),
(2, ''),
(3, 'FB_IMG_1547145438468.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
