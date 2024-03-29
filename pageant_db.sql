-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 04:45 AM
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
-- Database: `pageant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `female_candidates`
--

CREATE TABLE `female_candidates` (
  `id` int(11) NOT NULL,
  `candidate_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `final_score` int(11) DEFAULT NULL,
  `winner` varchar(20) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_candidates`
--

INSERT INTO `female_candidates` (`id`, `candidate_number`, `name`, `age`, `course`, `score`, `final_score`, `winner`, `image`) VALUES
(122, 1, 'female one', 23, 'bsit', 23, NULL, NULL, 'IMG-66063770e12513.27599984.png');

-- --------------------------------------------------------

--
-- Table structure for table `female_casual_wear`
--

CREATE TABLE `female_casual_wear` (
  `id` int(11) NOT NULL,
  `female_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL,
  `stage_deportment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_casual_wear`
--

INSERT INTO `female_casual_wear` (`id`, `female_candidate_id`, `judge_name`, `poise_and_bearing`, `fitness`, `stage_deportment`) VALUES
(199, 122, 'judge 1', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `female_formal_attire`
--

CREATE TABLE `female_formal_attire` (
  `id` int(11) NOT NULL,
  `female_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `stage_presence` int(11) DEFAULT NULL,
  `fitness_and_style` int(11) DEFAULT NULL,
  `elegance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_formal_attire`
--

INSERT INTO `female_formal_attire` (`id`, `female_candidate_id`, `judge_name`, `poise_and_bearing`, `stage_presence`, `fitness_and_style`, `elegance`) VALUES
(201, 122, 'judge 1', 2, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `female_production_number`
--

CREATE TABLE `female_production_number` (
  `id` int(11) NOT NULL,
  `female_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL,
  `uniqueness_and_style` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_production_number`
--

INSERT INTO `female_production_number` (`id`, `female_candidate_id`, `judge_name`, `poise_and_bearing`, `fitness`, `uniqueness_and_style`) VALUES
(356, 122, 'judge 1', 22, 22, 25);

-- --------------------------------------------------------

--
-- Table structure for table `female_sports_wear`
--

CREATE TABLE `female_sports_wear` (
  `id` int(11) NOT NULL,
  `female_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `stage_deportment` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_sports_wear`
--

INSERT INTO `female_sports_wear` (`id`, `female_candidate_id`, `judge_name`, `poise_and_bearing`, `stage_deportment`, `fitness`) VALUES
(188, 122, 'judge 1', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `username`, `occupied`) VALUES
(15, 'judge 1', 1),
(16, 'judge 2', 0),
(18, 'judge 3', 0),
(19, 'judge 4', 0),
(20, 'judge 5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `male_candidates`
--

CREATE TABLE `male_candidates` (
  `id` int(11) NOT NULL,
  `candidate_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `final_score` int(11) DEFAULT NULL,
  `winner` varchar(20) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_candidates`
--

INSERT INTO `male_candidates` (`id`, `candidate_number`, `name`, `age`, `course`, `score`, `final_score`, `winner`, `image`) VALUES
(149, 1, 'female two', 23, 'a', 23, NULL, NULL, 'IMG-6606378026f865.70138816.png');

-- --------------------------------------------------------

--
-- Table structure for table `male_casual_wear`
--

CREATE TABLE `male_casual_wear` (
  `id` int(11) NOT NULL,
  `male_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL,
  `stage_deportment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_casual_wear`
--

INSERT INTO `male_casual_wear` (`id`, `male_candidate_id`, `judge_name`, `poise_and_bearing`, `fitness`, `stage_deportment`) VALUES
(179, 149, 'judge 1', 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `male_formal_attire`
--

CREATE TABLE `male_formal_attire` (
  `id` int(11) NOT NULL,
  `male_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `stage_presence` int(11) DEFAULT NULL,
  `fitness_and_style` int(11) DEFAULT NULL,
  `elegance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_formal_attire`
--

INSERT INTO `male_formal_attire` (`id`, `male_candidate_id`, `judge_name`, `poise_and_bearing`, `stage_presence`, `fitness_and_style`, `elegance`) VALUES
(190, 149, 'judge 1', 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `male_production_number`
--

CREATE TABLE `male_production_number` (
  `id` int(11) NOT NULL,
  `male_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL,
  `uniqueness_and_style` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_production_number`
--

INSERT INTO `male_production_number` (`id`, `male_candidate_id`, `judge_name`, `poise_and_bearing`, `fitness`, `uniqueness_and_style`) VALUES
(210, 149, 'judge 1', 30, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `male_sports_wear`
--

CREATE TABLE `male_sports_wear` (
  `id` int(11) NOT NULL,
  `male_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `poise_and_bearing` int(11) DEFAULT NULL,
  `stage_deportment` int(11) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_sports_wear`
--

INSERT INTO `male_sports_wear` (`id`, `male_candidate_id`, `judge_name`, `poise_and_bearing`, `stage_deportment`, `fitness`) VALUES
(167, 149, 'judge 1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qa_female`
--

CREATE TABLE `qa_female` (
  `id` int(11) NOT NULL,
  `female_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `spontaneity` int(11) DEFAULT NULL,
  `substance` int(11) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_male`
--

CREATE TABLE `qa_male` (
  `id` int(11) NOT NULL,
  `male_candidate_id` int(11) DEFAULT NULL,
  `judge_name` varchar(50) NOT NULL,
  `spontaneity` int(11) DEFAULT NULL,
  `substance` int(11) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `female_candidates`
--
ALTER TABLE `female_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `female_casual_wear`
--
ALTER TABLE `female_casual_wear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `female_candidate_id` (`female_candidate_id`);

--
-- Indexes for table `female_formal_attire`
--
ALTER TABLE `female_formal_attire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `female_candidate_id` (`female_candidate_id`);

--
-- Indexes for table `female_production_number`
--
ALTER TABLE `female_production_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `female_candidate_id` (`female_candidate_id`);

--
-- Indexes for table `female_sports_wear`
--
ALTER TABLE `female_sports_wear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `female_candidate_id` (`female_candidate_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `male_candidates`
--
ALTER TABLE `male_candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_candidates_ibfk_1` (`candidate_number`);

--
-- Indexes for table `male_casual_wear`
--
ALTER TABLE `male_casual_wear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_casual_wear_ibfk_1` (`male_candidate_id`);

--
-- Indexes for table `male_formal_attire`
--
ALTER TABLE `male_formal_attire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_candidate_id` (`male_candidate_id`);

--
-- Indexes for table `male_production_number`
--
ALTER TABLE `male_production_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_candidate_id` (`male_candidate_id`);

--
-- Indexes for table `male_sports_wear`
--
ALTER TABLE `male_sports_wear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_candidate_id` (`male_candidate_id`);

--
-- Indexes for table `qa_female`
--
ALTER TABLE `qa_female`
  ADD PRIMARY KEY (`id`),
  ADD KEY `female_candidate_id` (`female_candidate_id`);

--
-- Indexes for table `qa_male`
--
ALTER TABLE `qa_male`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_candidate_id` (`male_candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `female_candidates`
--
ALTER TABLE `female_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `female_casual_wear`
--
ALTER TABLE `female_casual_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `female_formal_attire`
--
ALTER TABLE `female_formal_attire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `female_production_number`
--
ALTER TABLE `female_production_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `female_sports_wear`
--
ALTER TABLE `female_sports_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `male_candidates`
--
ALTER TABLE `male_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `male_casual_wear`
--
ALTER TABLE `male_casual_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `male_formal_attire`
--
ALTER TABLE `male_formal_attire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `male_production_number`
--
ALTER TABLE `male_production_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `male_sports_wear`
--
ALTER TABLE `male_sports_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `qa_female`
--
ALTER TABLE `qa_female`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `qa_male`
--
ALTER TABLE `qa_male`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `female_casual_wear`
--
ALTER TABLE `female_casual_wear`
  ADD CONSTRAINT `female_casual_wear_ibfk_1` FOREIGN KEY (`female_candidate_id`) REFERENCES `female_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `female_formal_attire`
--
ALTER TABLE `female_formal_attire`
  ADD CONSTRAINT `female_formal_attire_ibfk_1` FOREIGN KEY (`female_candidate_id`) REFERENCES `female_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `female_production_number`
--
ALTER TABLE `female_production_number`
  ADD CONSTRAINT `female_production_number_ibfk_1` FOREIGN KEY (`female_candidate_id`) REFERENCES `female_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `female_sports_wear`
--
ALTER TABLE `female_sports_wear`
  ADD CONSTRAINT `female_sports_wear_ibfk_1` FOREIGN KEY (`female_candidate_id`) REFERENCES `female_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `male_casual_wear`
--
ALTER TABLE `male_casual_wear`
  ADD CONSTRAINT `male_casual_wear_ibfk_1` FOREIGN KEY (`male_candidate_id`) REFERENCES `male_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `male_formal_attire`
--
ALTER TABLE `male_formal_attire`
  ADD CONSTRAINT `male_formal_attire_ibfk_1` FOREIGN KEY (`male_candidate_id`) REFERENCES `male_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `male_production_number`
--
ALTER TABLE `male_production_number`
  ADD CONSTRAINT `male_production_number_ibfk_1` FOREIGN KEY (`male_candidate_id`) REFERENCES `male_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `male_sports_wear`
--
ALTER TABLE `male_sports_wear`
  ADD CONSTRAINT `male_sports_wear_ibfk_1` FOREIGN KEY (`male_candidate_id`) REFERENCES `male_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_female`
--
ALTER TABLE `qa_female`
  ADD CONSTRAINT `qa_female_ibfk_1` FOREIGN KEY (`female_candidate_id`) REFERENCES `female_candidates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_male`
--
ALTER TABLE `qa_male`
  ADD CONSTRAINT `qa_male_ibfk_1` FOREIGN KEY (`male_candidate_id`) REFERENCES `male_candidates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
