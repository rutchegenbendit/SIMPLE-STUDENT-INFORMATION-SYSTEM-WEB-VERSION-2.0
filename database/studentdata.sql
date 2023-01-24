-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2023 at 01:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeId` int NOT NULL,
  `collegeName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeId`, `collegeName`) VALUES
(1, 'College of Computer Studies'),
(2, 'College of Education'),
(3, 'College of Nursing'),
(4, 'College of Art and Social Science'),
(5, 'College of Science and Mathematic'),
(6, 'College of Engineering and Technology'),
(7, 'College of Economics, Business and Accountancy');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int NOT NULL,
  `courseCode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courseName` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseCode`, `courseName`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BEED', 'Bachelor or Education in Elementary Education'),
(148, 'BSCS', 'Bachelor of Science in Computer Science'),
(149, 'BSIS', 'Bachelor of Science in INFORMATION SYSTEM '),
(150, 'BSCA', 'Bachelor of Science in COMPUTER APPLICATION '),
(151, 'BS MATH', 'Bachelor of Science in MATH'),
(152, 'BS STAT', 'Bachelor of Science in STAT'),
(153, 'BS MARINE BIO', 'Bachelor of Science in MARINE BIOLOGY'),
(154, 'BS PHYSICS', 'Bachelor of Science in PHYSICS'),
(155, 'BS CHEMISTRY', 'Bachelor of Science in CHEMISTRY'),
(156, 'BAELS', 'BAELS'),
(157, 'BA FILIPINO', 'Bachelor of Arts in FILIPINO'),
(158, 'BA HISTORY', 'Bachelor of Arts in HISTORY'),
(159, 'BA PSYCHOLOGY', 'Bachelor of Arts in PSYCHOLOGY'),
(160, 'BSN', 'Bachelor of Science in NURSING'),
(161, 'BS CIVIL ENG', 'Bachelor of Science in CIVIL ENGINEERING'),
(162, 'BS CERAMIC ENG', 'Bachelor of Science in CERAMIC ENGINEERING'),
(163, 'BS COMPUTER ENG', 'Bachelor of Science in COMPUTER ENGINEERING'),
(164, 'BS ELECTRIC ENG', 'Bachelor of Science in ELECTRIC ENGINEERING'),
(165, 'BS MINING ENG', 'Bachelor of Science in MINING ENGINEER'),
(166, 'BS METALLURGICAL ENG', 'Bachelor of Science in METALLURGICAL ENGINEERING'),
(167, 'BSPE', 'Bachelor of Science in IN PHYSICAL EDUCATION'),
(168, 'BTVTEd DT', 'BTVTEd (DRAFTING TECHNOLOGY)'),
(169, 'BTLEd HE', 'BTLEd (HOME ECONOMICS)'),
(170, 'BTLEd IA', 'BTLEd (INDUSTRIAL ARTS)'),
(171, 'BS HM', 'Bachelor of Science in Hospitality Management'),
(172, 'BSBA BE', 'BSBA Business Economics'),
(173, 'BSBA MM', 'BSBA Marketing Management'),
(174, 'BS Accountancy', 'Bachelor of Science in Accountancy'),
(175, 'BS Economics', 'Bachelor of Science in Economics');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `displayId` varchar(12) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(64) NOT NULL,
  `course` varchar(64) NOT NULL,
  `college` varchar(64) NOT NULL,
  `year` varchar(16) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `studentImg` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `displayId`, `firstName`, `lastName`, `course`, `college`, `year`, `gender`, `studentImg`) VALUES
(2, '2023-0002', 'Ador', 'Dalisay', 'BEED', 'College of Education', '3rd Year', 'Male', '9944-2ae91fee5720443090fa609a0c177eed.jpeg'),
(3, '2023-0003', 'Cardo', 'Dalisay', 'BSIT', 'College of Engineering and Computer Science', '2nd Year', 'Male', '9853-pexels-miguel-á-padriñán-745365.jpg'),
(4, '2023-4', 'Cancan', 'Canete', 'BSIT', 'College of Engineering and Computer Science', '4th Year', 'Male', '3015-pexels-fwstudio-164005.jpg'),
(5, '2023-5', 'Tonyo', 'Dalogdog', 'BSIT', 'College of Engineering and Computer Science', '4th Year', 'Male', '4325-pexels-rovenimagescom-949587.jpg'),
(6, '2023-6', 'Luigi Lou', 'Yang', 'BEED', 'College of Education', '4th Year', 'Male', '1282-pexels-eberhard-grossgasteiger-12486830.jpg'),
(7, '2023-7', 'Jacinth', 'Conde', 'BEED', 'College of Education', '5th Year', 'Female', '2084-pexels-cátia-matos-1072179.jpg'),
(8, '2023-8', 'Narda', 'Darna', 'BEED', 'College of Education', '3rd Year', 'Female', '4541-file-pexels-gradienta-6985134.jpg'),
(9, '2023-9', 'John', 'Cena', 'BS MATH', 'College of Science and Mathematic', '2nd Year', 'Male', '2841-pexels-eberhard-grossgasteiger-12486830.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yearId` int NOT NULL,
  `year` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yearId`, `year`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year'),
(5, '5th Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yearId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `collegeId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
