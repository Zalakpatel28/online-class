-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 08:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartlearning`
--
CREATE DATABASE IF NOT EXISTS `smartlearning` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smartlearning`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1001, 'zalak', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `eid` int(11) NOT NULL,
  `etime` time DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `totalmarks` int(11) NOT NULL,
  `subid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`eid`, `etime`, `edate`, `fid`, `sid`, `totalmarks`, `subid`) VALUES
(102, '01:01:00', '2021-03-20', 1, 1, 50, 0),
(104, '18:04:00', '2021-03-20', 1, 2, 20, 0),
(106, '16:04:00', '2021-04-11', 1, 5, 60, 0),
(107, '23:00:00', '2021-04-06', 1, 5, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `firstname`, `contact`, `gender`, `photo`, `email`, `password`, `subid`) VALUES
(1, 'pooja', '12345678', 'female', 'testimonials-2.jpg', 'poja@gmail.com', '234', 1),
(5, 'aa', '1234567890', 'male', 'naman.txt', 'a@gmail.com', 'aa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mid` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subid` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`mid`, `title`, `subid`, `fid`, `file`) VALUES
(2, 'Biology', 1, 1, 'php_slide.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(20) NOT NULL,
  `subid` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer1` varchar(20) NOT NULL,
  `answer2` varchar(30) NOT NULL,
  `answer3` varchar(30) NOT NULL,
  `answer4` varchar(30) NOT NULL,
  `correctAns` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `subid`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correctAns`) VALUES
(1, 2, 'what is full form of wd?', 'website', 'webapplication', 'webdesign', 'webgraphics', 'webdesign'),
(2, 1, 'design is?', 'called serverside', 'called clientside', 'called programing', 'called graphics', 'called graphics'),
(3, 1, 'How to set a picture as a background webpage?', ' background=b', 'background image= backp', 'background= backpic.gif', 'background image= backpic.gi', ' background= backpic.gif'),
(4, 1, '<TITLE> ... </TITLE> tag must be within ?', 'Title', 'Header', 'Form', 'Body', 'Title'),
(5, 1, 'Text within <EM> ...</EM> tag is displayed as ?', 'Bold', 'Italic', 'List', 'Indented', 'Italic'),
(6, 1, 'Text within <STRONG> ... </STRONG> tag is displaye', 'Bold', 'Italic', 'List', 'Indented', 'Bold'),
(7, 1, '<SCRIPT> ... </SCRIPT> tag can be displayed with i', 'Header', 'Body', 'Both A and B', 'None of the above', 'Both A and B'),
(8, 1, 'Using <P> tag will ?', 'Start a new paragrap', 'Break the line', 'End of the current paragraph', 'None of the above', 'Start a new paragraph'),
(9, 0, 'Comments in XML document is given by ?', '<?_ _ _>', '</ _ _ _/>', '<! _ _ _>', '</ _ _ _>', '<! _ _ _>'),
(10, 0, 'Which statment is true ?', 'An XML document ', 'An XML document can have one c', 'XML elements have to be in low', 'All of the above', 'All of the above'),
(11, 0, 'what is sql?', 'Structure ', 'Static Question Language', 'Staic Query Language', 'Social Que Line', 'Structure Query Language'),
(12, 0, 'what is sql?', 'a1', 'a', 'a', 'a', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resultid` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `obtainmarks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pasword` varchar(20) NOT NULL,
  `contect` varchar(14) DEFAULT NULL,
  `subid` varchar(10) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `firstname`, `lastname`, `email`, `pasword`, `contect`, `subid`, `gender`, `address`, `dob`, `photo`) VALUES
(1, 'patel', 'dolly', 'dolly@gmai', '', '456789876', 'sciecne', 'female', 'abc', '2000-02-09', NULL),
(2, 'patel', 'parita', 'parita@yah', '', '123456789', 'science', 'female', 'cba', '2000-03-03', ''),
(4, 'a', 'm', 'poja@gmail.com', '123', '12345678', 'aa', 'female', 'J.M Market,Opp Anand Ice Cream', '2021-03-09', '.babelrc.js'),
(5, 'neha', 'patel', 'neha@gmail.com', '123', '1234567890', '1', 'female', '                              ', '2021-03-11', 'ava-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`) VALUES
(1, 'PHP'),
(2, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `ans_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(60) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`ans_id`, `question_id`, `answer`, `eid`) VALUES
(1, 3, ' background=b', 107),
(2, 4, 'Title', 107),
(3, 5, 'Bold', 107),
(4, 6, 'List', 107),
(5, 7, 'Header', 107),
(6, 8, 'End of the current paragraph', 107),
(7, 0, '', 107);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `vid` int(11) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `file` varchar(10) DEFAULT NULL,
  `uploaddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`vid`, `fid`, `file`, `uploaddate`) VALUES
(2, 1, 'sample.mp4', '2021-03-28'),
(5, 1, 'Assignment', '2021-04-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `subid` (`subid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `sub_id` (`subid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resultid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `fid` (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resultid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `exam` (`eid`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
