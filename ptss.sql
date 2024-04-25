-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptss`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(200) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `person_incharge` varchar(200) NOT NULL,
  `data_time_transaction` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `transaction`, `person_incharge`, `data_time_transaction`) VALUES
(2, 'created a project: Mamam', 'John Dexter Pore', '2024-02-28 09:21:46'),
(3, 'created a project: Mamam', 'John Dexter Pore', '2024-02-28 09:25:20'),
(4, 'created a project: Mamam', 'John Dexter Pore', '2024-02-28 09:25:45'),
(5, 'created a project: 123', 'John Dexter Pore', '2024-02-28 09:30:25'),
(6, 'edited a personnel: 202, name: Test, designation: , project: Mamamo', 'John Dexter Pore', '2024-02-29 17:04:49'),
(7, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:19:49'),
(8, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:25:24'),
(9, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:27:52'),
(10, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:29:51'),
(11, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:31:17'),
(12, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:33:31'),
(13, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:33:39'),
(14, 'Updated output id: 304', 'John Dexter Pore', '2024-02-29 17:33:48'),
(15, 'Updated output id: 301', 'John Dexter Pore', '2024-02-29 17:41:11'),
(16, 'Inserted output of personnel: Test, project: test', 'John Dexter Pore', '2024-02-29 17:43:33'),
(17, 'created a project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:21:47'),
(18, 'created a personel for Adamson University: John Kylle Valerio Betiz, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:23:17'),
(19, 'created a personel for Adamson University: Angelito Avila, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:23:37'),
(20, 'created a personel for Adamson University: Christine Queenie Castillo, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:23:46'),
(21, 'created a personel for Adamson University: Melvin Valerio, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:23:53'),
(22, 'created a personel for Adamson University: Clarenz De Los Santos, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:24:11'),
(23, 'created a personel for Adamson University: Anne, designation: Scanning, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:24:26'),
(24, 'Inserted output of personnel: John Kylle Valerio Betiz, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:26:41'),
(25, 'Inserted output of personnel: Melvin Valerio, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:27:11'),
(26, 'Inserted output of personnel: Clarenz De Los Santos, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:27:32'),
(27, 'Inserted output of personnel: Anne, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:27:50'),
(28, 'Inserted output of personnel: Christine Queenie Castillo, project: Adamson University', 'Jan Kiefer Liao', '2024-03-01 08:28:15'),
(29, 'edited a user 1, name: , designation: , project: ', 'John Dexter Pore', '2024-03-01 12:00:16'),
(30, 'edited a user 1, name: , designation: , project: ', 'Diane Villamor', '2024-03-01 12:01:21'),
(31, 'edited a user 1, name: , designation: , project: ', 'Charlie Tuplano', '2024-03-01 13:38:25'),
(32, 'edited a user 1, name: , designation: , project: ', 'Charlie Tuplano', '2024-03-01 13:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE `output` (
  `id` int(11) NOT NULL,
  `project` varchar(200) NOT NULL,
  `personelName` varchar(100) NOT NULL,
  `projectCoordinator` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `documentPreparation` int(200) DEFAULT NULL,
  `documentPreparationTime` int(200) DEFAULT NULL,
  `scanning` int(200) DEFAULT NULL,
  `scanningTime` int(200) DEFAULT NULL,
  `qualityAssurance` int(200) DEFAULT NULL,
  `qualityAssuranceTime` int(200) DEFAULT NULL,
  `indexing` int(200) DEFAULT NULL,
  `indexingTime` int(200) DEFAULT NULL,
  `microFilming` int(200) DEFAULT NULL,
  `microFilmingTime` int(200) DEFAULT NULL,
  `refiling` int(200) DEFAULT NULL,
  `refilingTime` int(200) DEFAULT NULL,
  `uploading` int(200) NOT NULL,
  `uploadingTime` int(200) NOT NULL,
  `conversion` int(200) NOT NULL,
  `conversionTime` int(200) NOT NULL,
  `imageQualityAssurance` int(200) NOT NULL,
  `imageQualityAssuranceTime` int(200) NOT NULL,
  `stuffing` int(200) NOT NULL,
  `stuffingTime` int(200) NOT NULL,
  `printing` int(200) NOT NULL,
  `printingTime` int(200) NOT NULL,
  `cropping` int(200) NOT NULL,
  `croppingTime` int(200) NOT NULL,
  `submission` int(200) NOT NULL,
  `submissionTime` int(200) NOT NULL,
  `releasing` int(200) NOT NULL,
  `releasingTime` int(200) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `output`
--

INSERT INTO `output` (`id`, `project`, `personelName`, `projectCoordinator`, `date`, `documentPreparation`, `documentPreparationTime`, `scanning`, `scanningTime`, `qualityAssurance`, `qualityAssuranceTime`, `indexing`, `indexingTime`, `microFilming`, `microFilmingTime`, `refiling`, `refilingTime`, `uploading`, `uploadingTime`, `conversion`, `conversionTime`, `imageQualityAssurance`, `imageQualityAssuranceTime`, `stuffing`, `stuffingTime`, `printing`, `printingTime`, `cropping`, `croppingTime`, `submission`, `submissionTime`, `releasing`, `releasingTime`, `remarks`) VALUES
(301, 'test', 'Test', 'TestCoordinator', '2024-02-29', 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'test'),
(302, 'test', 'Test', 'TestCoordinator', '2024-02-29', 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'TEST'),
(303, 'Adamson University', 'John Kylle Valerio Betiz', 'Jocelyn Santilices', '2024-02-29', 0, 0, 968, 8, 0, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, ''),
(304, 'Adamson University', 'Melvin Valerio', 'Jocelyn Santilices', '2024-02-29', 0, 0, 807, 4, 0, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, ''),
(305, 'Adamson University', 'Clarenz De Los Santos', 'Jocelyn Santilices', '2024-02-29', 0, 0, 877, 8, 0, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, ''),
(306, 'Adamson University', 'Anne', 'Jocelyn Santilices', '2024-02-29', 0, 0, 451, 8, 0, 8, 0, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, ''),
(307, 'Adamson University', 'Christine Queenie Castillo', 'Jocelyn Santilices', '2024-02-29', 0, 0, 0, 8, 0, 8, 6732, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `id` int(100) NOT NULL,
  `personelName` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `project` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`id`, `personelName`, `designation`, `project`) VALUES
(201, 'Test', 'Refiling', 'test'),
(202, 'John Kylle Valerio Betiz', 'Scanning', 'Adamson University'),
(203, 'Angelito Avila', 'Scanning', 'Adamson University'),
(204, 'Christine Queenie Castillo', 'Scanning', 'Adamson University'),
(205, 'Melvin Valerio', 'Scanning', 'Adamson University'),
(206, 'Clarenz De Los Santos', 'Scanning', 'Adamson University'),
(207, 'Anne', 'Scanning', 'Adamson University');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(100) NOT NULL,
  `projectName` varchar(100) NOT NULL,
  `durationFrom` date NOT NULL,
  `durationTo` date NOT NULL,
  `coordinator` varchar(200) NOT NULL,
  `teamLeader` varchar(100) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `projectOrder` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`projectOrder`)),
  `documentPreparationAll` int(200) NOT NULL,
  `documentPreparation` int(200) NOT NULL,
  `scanningAll` int(200) NOT NULL,
  `scanning` int(200) NOT NULL,
  `qualityAssuranceAll` int(200) NOT NULL,
  `qualityAssurance` int(200) NOT NULL,
  `indexingAll` int(200) NOT NULL,
  `indexing` int(200) NOT NULL,
  `microFilmingAll` int(200) NOT NULL,
  `microFilming` int(200) NOT NULL,
  `refilingAll` int(200) NOT NULL,
  `refiling` int(200) NOT NULL,
  `uploadingAll` int(200) NOT NULL,
  `uploading` int(200) NOT NULL,
  `conversionAll` int(200) NOT NULL,
  `conversion` int(200) NOT NULL,
  `imageQualityAssuranceAll` int(200) NOT NULL,
  `imageQualityAssurance` int(200) NOT NULL,
  `stuffingAll` int(200) NOT NULL,
  `stuffing` int(200) NOT NULL,
  `printingAll` int(200) NOT NULL,
  `printing` int(200) NOT NULL,
  `croppingAll` int(200) NOT NULL,
  `cropping` int(200) NOT NULL,
  `submissionAll` int(200) NOT NULL,
  `submission` int(200) NOT NULL,
  `releasingAll` int(200) NOT NULL,
  `releasing` int(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `durationFrom`, `durationTo`, `coordinator`, `teamLeader`, `contactPerson`, `projectOrder`, `documentPreparationAll`, `documentPreparation`, `scanningAll`, `scanning`, `qualityAssuranceAll`, `qualityAssurance`, `indexingAll`, `indexing`, `microFilmingAll`, `microFilming`, `refilingAll`, `refiling`, `uploadingAll`, `uploading`, `conversionAll`, `conversion`, `imageQualityAssuranceAll`, `imageQualityAssurance`, `stuffingAll`, `stuffing`, `printingAll`, `printing`, `croppingAll`, `cropping`, `submissionAll`, `submission`, `releasingAll`, `releasing`, `status`) VALUES
(101, 'test', '2024-02-23', '2024-03-01', 'TestCoordinator', 'TestTeamLeader', 'adsasd', '[\"refiling\",\"qualityAssurance\",\"microFilming\",\"scanning\",\"indexing\",\"documentPreparation\"]', 6, 1, 4, 1, 2, 1, 5, 1, 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ongoing'),
(102, 'test2', '2024-02-28', '2024-03-06', 'TestCoordinator', 'TestTeamLeader', 'test', '[\"documentPreparation\",\"scanning\"]', 123, 123, 123, 123, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ongoing'),
(103, 'Adamson University', '2024-02-02', '2024-04-05', 'Jocelyn Santilices', 'TestTeamLeader', 'Belen Buna', '[\"scanning\",\"imageQualityAssurance\",\"indexing\",\"qualityAssurance\",\"submission\"]', 0, 0, 123500, 1600, 123500, 1600, 123500, 1600, 0, 0, 0, 0, 0, 0, 0, 0, 123500, 1600, 0, 0, 0, 0, 0, 0, 123500, 1600, 0, 0, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `log_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `category`, `status`, `log_at`) VALUES
(1, 'John Dexter Pore', 'johndexter.pore', '$2y$10$juaX.AaW9R/z2yxEEJnAEeqaK3hgQj5aStp1iOpudIVky6wyhdn52', 'Admin', 'offline', '2024-04-25 11:15:37'),
(2, 'Diane Villamor', 'diane.villamor', '$2y$10$C7IR2bpYPUf.pbbWhUqURunmjpsUTICuUPpIvxbQMZi7HxFZEP7nG', 'Admin', 'offline', '2024-03-01 12:02:13'),
(3, 'Nancy Mabagos', 'nancy.mabagos', '$2y$10$wXMOi4VIbE/HRX2iKfv.rOFqKskKXWkq1d1GK118fiHRkIGADkS46', 'Admin', 'offline', '0000-00-00 00:00:00'),
(4, 'Brando Javier', 'brando.javier', '$2y$10$LonGQufnqa6VjXrh2OGwNOwoVbdy3FREsX4rU0LgFuQKQDZNPbLBq', 'Admin', 'offline', '0000-00-00 00:00:00'),
(6, 'Charlie Tuplano', 'charlie.tuplano', '$2y$10$HcCwIyfvvtk4sHB9jP8aWe2TNS58dMsHfMorqOWNGIcDBWgHJU4EW', 'Admin', 'offline', '2024-03-01 13:41:55'),
(7, 'TestTeamLeader', 'TestTeamLeader', '$2y$10$wYXnA17ZWw1XD4nOlk8A8ul/xSOttWJl72Foagu131.bzNGMGNgo2', 'Project Team Leader', 'offline', '0000-00-00 00:00:00'),
(8, 'TestCoordinator', 'TestCoordinator', '$2y$10$lLMBEAFHqR4s1FDsJ/6qN.KyxzLuraadmyFDkbxZZINKF9QQfIel6', 'Project Coordinator', 'offline', '0000-00-00 00:00:00'),
(9, 'Jocelyn Santilices', 'jsantilices', '', 'Project Coordinator', 'offline', '0000-00-00 00:00:00'),
(10, 'Jan Kiefer Liao', 'jkliao', '$2y$10$kNLnmQ9mhQpDKTJ2MZ7muuJONqTXwRtF6UFGASva2HMQIZ3.u36MS', 'Admin', 'offline', '2024-03-01 09:30:41'),
(10, 'Nathalyn Garcia', 'ngarcia', '$2y$10$lJawaxzfxLIYOqa1WEhoUOnJYAucS/MZMKvWxi98PTHwE4kM2C/Pu', 'Admin', 'offline', '2024-02-02 17:41:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
