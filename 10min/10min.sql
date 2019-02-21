-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 06:01 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `10min`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `date_created`, `date_modified`) VALUES
(1, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-10-03 10:59:52', '2017-10-03 17:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `date`) VALUES
(1, 'Business', '2017-09-30 11:17:05'),
(2, 'Computers', '2017-09-30 11:17:05'),
(3, 'Photography', '2017-09-30 11:17:28'),
(4, 'Lifestyle', '2017-09-30 11:17:28'),
(6, 'Science', '2017-10-03 11:39:55'),
(7, 'Doctor', '2017-10-04 10:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `date`) VALUES
(1, 'Hindi', '2017-09-30 11:17:46'),
(2, 'Urdu', '2017-09-30 11:17:46'),
(3, 'French', '2017-09-30 11:17:57'),
(4, 'Punjabi', '2017-09-30 11:17:57'),
(5, 'English', '2017-10-03 11:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `work` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `cloud_id` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `category`, `language`, `video_url`, `cloud_id`, `image`, `user_id`, `date_created`, `status`) VALUES
(3, 'MBA in 10 days', 'Hi everyone Learn MBA in just 10 days', 1, 5, 'http://res.cloudinary.com/rahulmma/video/upload/v1507112823/Cartoon_-_On_On_Feat._Daniel_Levi_-_YouTube_mhgafm.mp4', 'Cartoon_-_On_On_Feat._Daniel_Levi_-_YouTube_mhgafm', 'http://res.cloudinary.com/rahulmma/video/upload/c_limit,h_60,w_90/v1507112823/Cartoon_-_On_On_Feat._Daniel_Levi_-_YouTube_mhgafm.jpg', 5, '2017-10-04 10:27:11', 1),
(5, 'sadasd', 'asdas', 1, 1, 'http://res.cloudinary.com/rahulmma/video/upload/v1507131223/Zara_Zara_Extended_Version_-_Unplugged_Cover_-_Rahul_Jain_-_RHTDM_-_YouTube_xel81q.mp4', 'Zara_Zara_Extended_Version_-_Unplugged_Cover_-_Rahul_Jain_-_RHTDM_-_YouTube_xel81q', 'http://res.cloudinary.com/rahulmma/video/upload/c_limit,h_60,w_90/v1507131223/Zara_Zara_Extended_Version_-_Unplugged_Cover_-_Rahul_Jain_-_RHTDM_-_YouTube_xel81q.jpg', 5, '2017-10-04 15:33:48', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
