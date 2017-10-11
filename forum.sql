-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2017 at 12:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum1`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(5) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id_2` (`user_id`),
  KEY `topic_id_2` (`topic_id`),
  KEY `user_id_3` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `content`, `user_id`, `topic_id`) VALUES
(1, 'slavco php', 1, 18),
(2, 'slavco koli', 1, 19),
(3, 'slavco joga', 1, 20),
(4, 'marko php', 2, 18),
(5, 'marko koli', 2, 19),
(6, 'marko joga', 2, 20),
(7, 'silvana php', 3, 18),
(8, 'silvana koli', 3, 19),
(9, 'silvana joga', 3, 20),
(54, 'asd', 2, 18),
(55, 'ffffffffffff', 2, 18),
(56, 'rrrrrrrrrrr', 2, 18),
(57, 'nnnnnnnn', 2, 18),
(58, 'test koli slavco', 1, 19),
(59, 'marko post', 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(5) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(111) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `user_id`) VALUES
(18, 'php', 1),
(19, 'koli', 2),
(20, 'joga', 3),
(22, '                       marko topic 111                ', 2),
(24, '                   silvana\r\n                    ', 3),
(25, '                            asdasd           ', 2),
(26, '                                       tyhthththtyhn', 2),
(28, '                                       aaaaaaaaaaaaaaaaaaa', 2),
(29, '                                       www', 2),
(30, '                              sdfsdf         ', 2),
(31, '                                       sss', 1),
(32, '                                 asdad      ', 1),
(33, '                                       aaa', 1),
(34, '                                 qqqqqqqqqqqqqqqqqqqqqqqqqq      ', 2),
(35, '                                    fsdfdf   ', 2),
(36, '                            kraj\r\n           ', 2),
(37, '                     xzcvsdvs                  ', 1),
(38, '                                   marko test    ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'slavco', '123'),
(2, 'marko', '123'),
(3, 'silvana', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
