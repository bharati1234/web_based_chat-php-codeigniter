-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 07:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_username` varchar(255) NOT NULL,
  `from_username` varchar(255) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `to_username`, `from_username`, `chat_message`, `timestamp`, `status`) VALUES
(1, 2, 1, 'pradip', 'bharati', 'hi pradip', '2021-05-25 03:59:28', 1),
(2, 1, 2, 'bharati', 'pradip', 'Hello...bharati', '2021-05-25 04:01:18', 1),
(3, 1, 2, 'bharati', 'pradip', 'how are you bharati', '2021-05-25 04:02:27', 1),
(4, 2, 1, 'pradip', 'bharati', 'i am good', '2021-05-25 04:03:00', 1),
(5, 3, 4, '', '', 'fdsfdfdfdf', '2021-05-25 04:05:53', 1),
(6, 2, 1, 'pradip', 'bharati', 'bye pradip', '2021-05-25 04:10:53', 1),
(21, 1, 2, 'bharati', 'pradip', 'good night bharati', '2021-05-25 09:23:38', 1),
(22, 4, 2, 'prapti', 'pradip', 'hi prapti good morning', '2021-05-26 01:33:24', 1),
(23, 2, 4, 'pradip', 'prapti', 'hi pradip how are you?', '2021-05-26 01:34:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `friends` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_date`, `phone`, `friends`, `sender_id`, `receiver_id`) VALUES
(1, 'bharati', 'bharati@gmail.com', '123456', '2021-05-20', '8390222342', '3,2', '', ''),
(2, 'pradip', 'pradipvdeore@gmail.com', 'pradip', '2021-05-20', '435465465', '4,1', '3,4', ''),
(3, 'Jyoti', 'jyoti123@gmail.com', '123456', '2021-05-20', '8007859611', '1,4', '', '2'),
(4, 'prapti', 'prapti@gmail.com', 'prapti', '2021-05-21', '1234567890', '2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
