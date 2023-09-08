-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccinationbookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(250) NOT NULL,
  `adminEmail` varchar(250) NOT NULL,
  `adminPassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `adminName`, `adminEmail`, `adminPassword`) VALUES
(1, 'Fiza', 'fiza@gmail.com', '1234'),
(2, 'Iqra', 'iqra@gmail.com', '0000'),
(3, 'Iman', 'iman@gmail.com', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `children_details`
--

CREATE TABLE `children_details` (
  `childID` int(11) NOT NULL,
  `childName` varchar(250) NOT NULL,
  `childGender` enum('male','female','others') NOT NULL,
  `childAge` int(11) NOT NULL,
  `hospitalID` int(11) DEFAULT NULL,
  `vaccineID` int(11) DEFAULT NULL,
  `vaccinationDate` date NOT NULL,
  `parentID` int(11) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `appointmentStatus` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children_details`
--

INSERT INTO `children_details` (`childID`, `childName`, `childGender`, `childAge`, `hospitalID`, `vaccineID`, `vaccinationDate`, `parentID`, `contact`, `appointmentStatus`) VALUES
(16, 'Aleena', 'female', 12, 20, 1, '2023-11-11', 18, 37867564, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_login`
--

CREATE TABLE `hospital_login` (
  `hospitalID` int(11) NOT NULL,
  `hospitalName` varchar(250) NOT NULL,
  `hospitalEmail` varchar(250) NOT NULL,
  `hospitalPassword` varchar(250) NOT NULL,
  `hospitalLocation` varchar(250) NOT NULL,
  `hospitalStatus` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_login`
--

INSERT INTO `hospital_login` (`hospitalID`, `hospitalName`, `hospitalEmail`, `hospitalPassword`, `hospitalLocation`, `hospitalStatus`) VALUES
(20, 'Indus', 'indus@gmail.com', '$2y$10$GqqDlqCk0uAL1k8dyXEDveb40WM700c3kLV9BGYjc22NEUJxdBj6a', 'Karachi', 'approved'),
(21, 'Jinah', 'jinah@gmail.com', '$2y$10$1WM.xeR5IA8GZYXTOtYMHuEjYmK9LOkCJ8eQNFOdqvKffsJco8Kl2', 'Karachi', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `parent_login`
--

CREATE TABLE `parent_login` (
  `parentID` int(11) NOT NULL,
  `parentName` varchar(250) NOT NULL,
  `parentEmail` varchar(250) NOT NULL,
  `parentPassword` varchar(250) NOT NULL,
  `parentStatus` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `image` varchar(225) DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_login`
--

INSERT INTO `parent_login` (`parentID`, `parentName`, `parentEmail`, `parentPassword`, `parentStatus`, `image`) VALUES
(18, 'Fiza', 'fiza@gmail.com', '$2y$10$9glJlspYFmUYxRLU4orlZea.AzrEBrR7RecM8he.igiFnPRN6QGX.', 'approved', 'product-min-01.jpg'),
(19, 'Iman', 'iman@gmail.com', '$2y$10$oELLP29ICjSVD2klaNvuGOuDa9v57G0fz63WCr/e3ePxZ5tptP7fK', 'pending', 'user.jpg'),
(20, 'Iqra', 'iqra@gmail.com', '$2y$10$IE94W.2qbx86TA/ZZK5FQuZZLYdtfLSrcdhshrsCEWGtnoP48xDTW', 'pending', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_details`
--

CREATE TABLE `vaccine_details` (
  `vaccineID` int(11) NOT NULL,
  `vaccineName` varchar(250) NOT NULL,
  `vaccineStock` int(11) NOT NULL,
  `hospitalID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine_details`
--

INSERT INTO `vaccine_details` (`vaccineID`, `vaccineName`, `vaccineStock`, `hospitalID`) VALUES
(1, 'Mumps', 20, NULL),
(2, 'Pneumococcal.\r\n', 22, NULL),
(3, 'Polio', 89, NULL),
(4, 'Rotavirus', 88, NULL),
(5, 'Rubella', 90, NULL),
(6, 'Tetanus', 100, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `children_details`
--
ALTER TABLE `children_details`
  ADD PRIMARY KEY (`childID`),
  ADD KEY `hospitalID` (`hospitalID`),
  ADD KEY `parentID` (`parentID`),
  ADD KEY `vaccineID` (`vaccineID`);

--
-- Indexes for table `hospital_login`
--
ALTER TABLE `hospital_login`
  ADD PRIMARY KEY (`hospitalID`),
  ADD UNIQUE KEY `hospitalEmail` (`hospitalEmail`),
  ADD UNIQUE KEY `hospitalEmail_2` (`hospitalEmail`),
  ADD UNIQUE KEY `hospitalEmail_3` (`hospitalEmail`);

--
-- Indexes for table `parent_login`
--
ALTER TABLE `parent_login`
  ADD PRIMARY KEY (`parentID`),
  ADD UNIQUE KEY `parentEmail` (`parentEmail`),
  ADD UNIQUE KEY `parentEmail_2` (`parentEmail`);

--
-- Indexes for table `vaccine_details`
--
ALTER TABLE `vaccine_details`
  ADD PRIMARY KEY (`vaccineID`),
  ADD KEY `hospitalConstraint` (`hospitalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `children_details`
--
ALTER TABLE `children_details`
  MODIFY `childID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hospital_login`
--
ALTER TABLE `hospital_login`
  MODIFY `hospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `parent_login`
--
ALTER TABLE `parent_login`
  MODIFY `parentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vaccine_details`
--
ALTER TABLE `vaccine_details`
  MODIFY `vaccineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children_details`
--
ALTER TABLE `children_details`
  ADD CONSTRAINT `hospitalID` FOREIGN KEY (`hospitalID`) REFERENCES `hospital_login` (`hospitalID`) ON DELETE SET NULL,
  ADD CONSTRAINT `parentID` FOREIGN KEY (`parentID`) REFERENCES `parent_login` (`parentID`) ON DELETE SET NULL,
  ADD CONSTRAINT `vaccineID` FOREIGN KEY (`vaccineID`) REFERENCES `vaccine_details` (`vaccineID`) ON DELETE SET NULL;

--
-- Constraints for table `vaccine_details`
--
ALTER TABLE `vaccine_details`
  ADD CONSTRAINT `hospital_id` FOREIGN KEY (`hospitalID`) REFERENCES `hospital_login` (`hospitalID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
