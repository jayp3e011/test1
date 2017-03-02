-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 08:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `user_id`, `subject_id`, `question_id`, `answer`) VALUES
(1, 1, 1, 1, 'C'),
(2, 2, 2, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice_a` text NOT NULL,
  `choice_b` text NOT NULL,
  `choice_c` text NOT NULL,
  `choice_d` text NOT NULL,
  `answer` varchar(1) NOT NULL DEFAULT 'A',
  `reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `subject_id`, `question`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `answer`, `reference`) VALUES
(1, 1, 'The Uniform Commercial Code provides for a warranty against infringement. Its primary purpose is to protect the buyer of goods from infringement of the rights of third parties. This warranty', 'Only applies if the sale is between merchants.', 'Must be expressly stated in the contract or the Statute of Frauds will prevent its enforceability.', 'Protects the seller if the buyer finishes specificiations which result in an infringement.', 'Cannot be disclaimed.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/'),
(2, 2, 'The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if', 'Both the offeror and offeree are merchants.', 'The offer proposes a sale of real estate.', 'The offer provides that an acceptance shall not be effective until actually received.', 'The duration of the offer is not in excess of 3 months.', 'C', 'https://www.efficientlearning.com/cpa/resources/pop-quiz/reg-questions/');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timeduration` varchar(50) NOT NULL,
  `passingrate` int(11) NOT NULL,
  `attempt` int(11) NOT NULL DEFAULT '0',
  `items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`, `timeduration`, `passingrate`, `attempt`, `items`) VALUES
(1, 'Theory of Accounts', 'Theory of accounts', '30', 50, 0, 100),
(2, 'Business law and taxation', 'Business law and taxation', '40', 60, 0, 150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `createdat`, `isadmin`) VALUES
(1, 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'admin', '2017-02-04 19:03:07', 1),
(2, 'student@gmail.com', '5e5545d38a68148a2d5bd5ec9a89e327', 'student', 'student', '2017-02-04 19:03:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
