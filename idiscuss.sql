-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 06:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catagory_id`, `catagory_name`, `desc`, `date`, `sts`) VALUES
(1, 'PHP', 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.\r\n\r\nPHP is a widely-used, free, and efficient alternative to competitors such as Microsoft\'s ASP.', '2021-11-17 23:11:55', 0),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled and multi-paradigm. ', '2021-11-17 23:13:09', 0),
(3, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation.', '2021-11-18 15:24:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(11) NOT NULL,
  `cmt_content` text NOT NULL,
  `thrd_id` int(11) NOT NULL,
  `cmt_by` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmt_id`, `cmt_content`, `thrd_id`, `cmt_by`, `date`, `sts`) VALUES
(1, 'This is comment', 2, 1, '2021-11-25 17:46:30', 0),
(2, 'Please somebudy fix this.', 1, 3, '2021-11-25 17:59:38', 0),
(3, 'Please somebudy fix this.', 1, 2, '2021-11-25 18:03:02', 0),
(4, 'please search on php Manual', 2, 1, '2021-12-11 18:01:58', 0),
(5, 'thank you budy', 2, 3, '2021-12-11 18:16:41', 0),
(6, 'Welcome yaar', 2, 1, '2021-12-11 18:17:33', 0),
(7, 'please search on php Manual', 2, 1, '2021-12-11 18:19:06', 0),
(8, 'please search on php Manual', 2, 2, '2021-12-11 18:24:56', 0),
(9, 'please search on php Manual', 2, 2, '2021-12-11 18:26:34', 0),
(10, '%lt;script%gt;alert(\"skjkj\")%lt;/script%gt;', 2, 4, '2021-12-20 12:26:37', 0),
(11, '&lt;script&gt;alert(\"asdfa\")&lt;/script&gt;', 2, 4, '2021-12-20 12:28:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(20) NOT NULL,
  `descp` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`sno`, `name`, `email`, `number`, `descp`, `date`, `sts`) VALUES
(1, 'Swapnil tare', 'swapniltare85@gmail.com', 999999999, 'Conatan me', '2021-12-22 13:14:59', 0),
(2, 'sachin sdads', 'abc85@gmail.com', 999999999, 'test', '2021-12-23 10:32:42', 0),
(3, 'sachin patil', 'abc85@gmail.com', 999999999, 'test', '2021-12-23 10:34:47', 0),
(4, 'makya tari', 'makya@gmail.com', 999999999, 'test', '2021-12-23 10:36:11', 0),
(5, 'dev patil', 'test@gmail.com', 2147483647, 'test', '2021-12-23 10:37:07', 0),
(6, 'Rohit kanade', 'rohit@gmail.com', 2147483647, 'test', '2021-12-23 10:38:36', 0),
(7, 'dev ', 'test@gmail.com', 3462346, 'test', '2021-12-23 10:40:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thrd_id` int(11) NOT NULL,
  `thrd_title` varchar(255) NOT NULL,
  `thrd_desc` text NOT NULL,
  `thrd_cat_id` int(11) NOT NULL,
  `thrd_user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thrd_id`, `thrd_title`, `thrd_desc`, `thrd_cat_id`, `thrd_user_id`, `date`, `sts`) VALUES
(1, 'Not installing python', 'I am not install python in windows 10', 3, 1, '2021-11-19 13:15:19', 0),
(2, 'Not found php framwork', 'I am not found php framwork in google ', 1, 1, '2021-11-19 13:18:15', 0),
(3, 'php error extension gd is not found', 'On the localhost the library is working fine, when the function is called on production,php throws a fatal errer.\r\n\r\ni checked the phpinfo() its there and it is enabled.\r\n\r\nI tired to see if there is anything that i can add on the php.ini but i couldn\'t find any. The error is thrown when i call\r\n\r\ngd_info();', 1, 2, '2021-11-19 13:27:32', 0),
(4, 'self', 'self', 3, 1, '2021-11-24 18:26:26', 0),
(5, 'test title', 'test decription', 1, 3, '2021-11-24 18:34:46', 0),
(6, 'test title', 'test decription', 3, 1, '2021-11-24 18:36:37', 0),
(7, 'python tutorial ', 'please give me ideas', 3, 2, '2021-11-24 18:43:28', 0),
(8, 'php is good or bad ', 'php is good or bad language. please answer me', 1, 2, '2021-12-11 18:29:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `email` varchar(110) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `email`, `password`, `date`, `sts`) VALUES
(1, 'swap@gmail.com', '$2y$10$a.Bc24i9kgwYLSbWTLYOW.jXMtzHz/FF2gCxHLVftrh23m8CYrIWy', '2021-12-01 17:15:35', 0),
(2, 'abc@gmail.com', '$2y$10$lasJiG0OThOSNAggKQHoLuSqLorr3FclZgzayc6eNKMfYXdUjK7IW', '2021-12-01 17:18:18', 0),
(3, 'sachin@gmail.com', '$2y$10$EsLw/e4pbe6wfHv8Nw1Aduaji.AF8WOkVqKTtl1ysAEuondkPb8Xe', '2021-12-01 17:29:17', 0),
(4, 'swap', '$2y$10$mxW0dGZtWl2QhNdLIJRmguyWX0ypprC7f2a.1BNGNCXSMr9TlBfiO', '2021-12-20 11:45:39', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thrd_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thrd_title` (`thrd_title`,`thrd_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thrd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
