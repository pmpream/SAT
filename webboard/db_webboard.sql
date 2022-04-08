-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 01:24 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `db_webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aw_id` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `qu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aw_id`, `detail`, `name`, `email`, `create_date`, `qu_id`) VALUES
(1, 'ทดสอบการตอบคำถาม', 'บุญมี', 'itoffside@hotmail.com', '2016-11-07 16:41:16', 1),
(2, 'ทดสอบ ทดสอบ', 'V_V', 'V_V@hotmail.com', '2016-11-07 16:42:30', 2),
(3, 'DDDD', 'sssss', '', '2016-11-07 16:42:35', 2),
(4, 'sssss', 'ssss', '', '2016-11-07 16:42:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qu_id` int(11) NOT NULL,
  `topic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qu_id`, `topic`, `detail`, `name`, `email`, `create_date`) VALUES
(1, 'ช่วยด้วย พิมพ์ภาษาอังกฤษไม่ได้', 'คีย์บอร์ดภาษาอังกฤษกดไม่ได้ครับ\r\nช่วยหน่อยครับ\r\nขอบคุณครับ', 'บี@itoffside.com', 'bee@itoffside.com', '2016-11-07 16:17:23'),
(2, 'ทดสอบการตั้งคำถาม', 'ทดสอบ', 'test0000', 'itoffside@hotmail.com', '2016-11-07 16:41:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aw_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
