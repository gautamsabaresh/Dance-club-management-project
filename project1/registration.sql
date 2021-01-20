-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 08:27 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventtype_master`
--

CREATE TABLE `eventtype_master` (
  `eventtype_id` int(11) NOT NULL,
  `event_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype_master`
--

INSERT INTO `eventtype_master` (`eventtype_id`, `event_type`) VALUES
(1, 'Meeting'),
(2, 'Practice Session'),
(3, 'Competition'),
(4, 'Official Circular'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `event_information`
--

CREATE TABLE `event_information` (
  `event_id` int(11) NOT NULL,
  `event_added_by_userid` varchar(25) NOT NULL,
  `event_added_date` datetime NOT NULL,
  `eventtype_id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `eventinformation` text NOT NULL,
  `event_participation` tinyint(4) NOT NULL DEFAULT 0,
  `event_attachments_link` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_information`
--

INSERT INTO `event_information` (`event_id`, `event_added_by_userid`, `event_added_date`, `eventtype_id`, `event_date`, `eventinformation`, `event_participation`, `event_attachments_link`) VALUES
(1, 'sab', '2019-09-25 16:09:12', 1, '0000-00-00', 'The regular meeting of the month has been scheduled. The students are requested to come.', 0, ''),
(9, 'sab', '2019-09-26 12:52:09', 3, '2019-10-25', 'sabbyyy', 0, 'http://localhost/project1/eventattachments/Gautam Resume final.pdf'),
(10, 'sab', '2019-09-26 12:59:51', 3, '2019-09-27', 'asdgfdsg', 0, 'http://localhost/project1/eventattachments/intern letter.docx');

-- --------------------------------------------------------

--
-- Table structure for table `query_responses`
--

CREATE TABLE `query_responses` (
  `response_id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `new_query_message` text NOT NULL,
  `reopened_query_date` datetime NOT NULL,
  `response_message` text DEFAULT NULL,
  `response_update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_responses`
--

INSERT INTO `query_responses` (`response_id`, `query_id`, `new_query_message`, `reopened_query_date`, `response_message`, `response_update_date`) VALUES
(2, 19, 'Hey how are you?', '2019-09-17 14:59:18', 'I am fine.', '2019-09-17 15:50:24'),
(7, 2, 'heyyy', '2019-09-18 10:16:38', 'ugasfg', '2019-09-18 10:17:14'),
(8, 23, 'I dont undersrabhdfggas', '2019-09-19 12:40:06', 'jgfasdygsdkgfk', '2019-09-19 12:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `role_id` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`role_id`, `rolename`) VALUES
(1, 'admin'),
(2, 'Student Coordinator'),
(3, 'Staff Coordinator'),
(4, 'Student Member');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `resetpwdtoken` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`fname`, `lname`, `role_id`, `userid`, `password`, `resetpwdtoken`, `email`, `user_status`) VALUES
('admin', 'admin', 1, 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '', 'psgcascrew@gmail.com', 1),
('Gautam', 'Sabaresh', 2, 'sab', '446cbdc9a9550295978a137fc3fa015f', '', 'gautamsabaresh@gmail.com', 1),
('staff', 'coo', 3, 'staff', 'b99165cd2609bbb891390120ed2df1cb', '', 'meenarathina0@gmail.com', 1),
('student', 'member', 4, 'student', 'e4a6a34a2c625d52f26846f5e3d22064', '', 'theavengerscrew007@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `query_id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `query_to` int(11) NOT NULL,
  `query_post_date` datetime NOT NULL,
  `query_message` text NOT NULL,
  `query_resolve_date` datetime DEFAULT NULL,
  `query_resolved_by` varchar(50) DEFAULT NULL,
  `query_resolution` text DEFAULT NULL,
  `query_status` varchar(10) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`query_id`, `user_id`, `query_to`, `query_post_date`, `query_message`, `query_resolve_date`, `query_resolved_by`, `query_resolution`, `query_status`) VALUES
(2, 'student', 2, '2019-09-09 15:15:10', 'safdgdfh', '2019-09-18 10:15:35', 'sab', 'jhygufdsghf', 'closed'),
(19, 'student', 2, '2019-09-10 13:19:44', 'Hi, When will the practice session start for the competition coming on September end?', '2019-09-12 13:26:57', 'sab', 'heysafasfdag', 'closed'),
(23, 'student', 3, '2019-09-19 12:37:20', 'hfyadfrydfa', '2019-09-19 12:38:33', 'staff', 'heyyyy jasgfukagf', 'closed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventtype_master`
--
ALTER TABLE `eventtype_master`
  ADD PRIMARY KEY (`eventtype_id`);

--
-- Indexes for table `event_information`
--
ALTER TABLE `event_information`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `userid` (`event_added_by_userid`),
  ADD KEY `eventtype_id` (`eventtype_id`);

--
-- Indexes for table `query_responses`
--
ALTER TABLE `query_responses`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `query_id` (`query_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userid`,`email`),
  ADD UNIQUE KEY `username` (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `query_resolved_by` (`query_resolved_by`),
  ADD KEY `user_queries_ibfk_2` (`query_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_information`
--
ALTER TABLE `event_information`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `query_responses`
--
ALTER TABLE `query_responses`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_information`
--
ALTER TABLE `event_information`
  ADD CONSTRAINT `event_information_ibfk_1` FOREIGN KEY (`event_added_by_userid`) REFERENCES `userdetails` (`userid`),
  ADD CONSTRAINT `event_information_ibfk_2` FOREIGN KEY (`eventtype_id`) REFERENCES `eventtype_master` (`eventtype_id`);

--
-- Constraints for table `query_responses`
--
ALTER TABLE `query_responses`
  ADD CONSTRAINT `query_responses_ibfk_1` FOREIGN KEY (`query_id`) REFERENCES `user_queries` (`query_id`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_master` (`role_id`);

--
-- Constraints for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD CONSTRAINT `user_queries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`userid`),
  ADD CONSTRAINT `user_queries_ibfk_2` FOREIGN KEY (`query_to`) REFERENCES `role_master` (`role_id`),
  ADD CONSTRAINT `user_queries_ibfk_3` FOREIGN KEY (`query_resolved_by`) REFERENCES `userdetails` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
