-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Dec 01, 2024 at 07:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `cid` int(10) UNSIGNED NOT NULL,
  `roomnumber` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`cid`, `roomnumber`, `capacity`) VALUES
(1, '100', '45'),
(5, '101', '40'),
(6, '105', '50'),
(7, '110', '35'),
(8, '103', '44');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `slevel` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `lid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`slevel`, `grade`, `semester`, `lid`) VALUES
('primary level', '5th', 'summer', 5),
('middle level', '9th', 'fall', 6),
('high level', '11th', 'spring', 7);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(10) UNSIGNED NOT NULL,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `sphone` char(11) NOT NULL,
  `sgender` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `lid` int(10) UNSIGNED NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `sname`, `semail`, `sphone`, `sgender`, `address`, `academic_year`, `lid`, `cid`) VALUES
(1, 'Aya Hemida', 'ayahemida@gmail.com', '01012089748', 'Male', 'Cairo', '2022/2023', 5, 1),
(2, 'Menna Alaa', 'mennaalaa@gmail.com', '01089714638', 'Female', 'Giza', '2022/2023', 6, 6),
(3, 'Adam Ahmed', 'adamahmed@gmail.com', '01065478921', 'Male', 'Cairo', '2022/2023', 5, 7),
(4, 'Adam Hassan', 'adamm9@gmail.com', '01566777884', 'Male', 'Giza', '2022/2023', 7, 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentview`
-- (See below for the actual view)
--
CREATE TABLE `studentview` (
`sid` int(10) unsigned
,`sname` varchar(50)
,`semail` varchar(50)
,`slevel` varchar(50)
,`grade` varchar(50)
,`roomnumber` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subid` int(10) UNSIGNED NOT NULL,
  `subname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subid`, `subname`) VALUES
(1, 'sciences'),
(2, 'english'),
(5, 'Math'),
(7, 'Arabic');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` int(10) UNSIGNED NOT NULL,
  `tname` varchar(50) NOT NULL,
  `tphone` char(11) NOT NULL,
  `temail` varchar(50) NOT NULL,
  `tgender` varchar(50) DEFAULT NULL,
  `experience` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `subid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `tname`, `tphone`, `temail`, `tgender`, `experience`, `address`, `salary`, `subid`) VALUES
(6, 'Ahmed Ali', '77896544334', 'ahmed444@gmail.com', 'Male', 'positive, energetic', 'Egypt-Cairo', '3000', 1),
(7, 'Huda Mohamed', '45678954123', 'huda33@gmail.com', 'Female', 'flexible style of teaching ', 'Egypt-Giza', '3000', 5),
(8, 'Nada Ahmed', '01558894325', 'nada446@gmail.com', 'Female', ' knowledgeable, and industrious teacher', 'Egypt-ElMaadi', '3000', 5),
(9, 'Ali Mohamed', '01098765432', 'ali44mo@gmail.com', 'Male', 'flexible style of teaching ', 'Egypt-Cairo', '3000', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `teacherview`
-- (See below for the actual view)
--
CREATE TABLE `teacherview` (
`tid` int(10) unsigned
,`tname` varchar(50)
,`temail` varchar(50)
,`subname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classroom`
--

CREATE TABLE `teacher_classroom` (
  `tcid` int(10) NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `tid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_classroom`
--

INSERT INTO `teacher_classroom` (`tcid`, `cid`, `tid`) VALUES
(1, 1, 6),
(2, 6, 7),
(3, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '2412005'),
(2, 'user1', '123456');

-- --------------------------------------------------------

--
-- Structure for view `studentview`
--
DROP TABLE IF EXISTS `studentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `studentview`  AS SELECT `s`.`sid` AS `sid`, `s`.`sname` AS `sname`, `s`.`semail` AS `semail`, `l`.`slevel` AS `slevel`, `l`.`grade` AS `grade`, `c`.`roomnumber` AS `roomnumber` FROM ((`students` `s` join `levels` `l`) join `classrooms` `c`) WHERE `s`.`lid` = `l`.`lid` AND `s`.`cid` = `c`.`cid` ;

-- --------------------------------------------------------

--
-- Structure for view `teacherview`
--
DROP TABLE IF EXISTS `teacherview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `teacherview`  AS SELECT `t`.`tid` AS `tid`, `t`.`tname` AS `tname`, `t`.`temail` AS `temail`, `s`.`subname` AS `subname` FROM (`teachers` `t` join `subjects` `s` on(`t`.`subid` = `s`.`subid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `subid` (`subid`);

--
-- Indexes for table `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  ADD PRIMARY KEY (`tcid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `lid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  MODIFY `tcid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `levels` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `classrooms` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subjects` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  ADD CONSTRAINT `teacher_classroom_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_classroom_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `classrooms` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
