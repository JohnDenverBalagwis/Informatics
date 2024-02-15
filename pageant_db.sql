-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:09 AM
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
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female_candidates`
--

INSERT INTO `female_candidates` (`id`, `candidate_number`, `name`, `age`, `course`, `image`) VALUES
(5, 1, 'sdfsdf', 22, 'bsit', 'IMG-65cd7d9ee20297.76155414.png'),
(6, 2, '234', 23423, '423', 'IMG-65cd80c352aae9.83463854.png');

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
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male_candidates`
--

INSERT INTO `male_candidates` (`id`, `candidate_number`, `name`, `age`, `course`, `image`) VALUES
(21, 1, 'andrei monroyo', 4, 'd', 'IMG-65cd817dbf2584.27890454.png'),
(22, 3, 'r', 4, '4', 'IMG-65cd8187dce058.84609454.jpg'),
(23, 4, '4', 4, '4', 'IMG-65cd81917b3aa7.20981551.jpg'),
(24, 5, '44', 4, '4', 'IMG-65cd819a4d6744.51454416.jpg'),
(25, 7, '7', 7, '7', 'IMG-65cd81b99395f0.10188833.jpg'),
(26, 6, '6', 6, '6', 'IMG-65cd81c62d06f5.87659502.jpg'),
(27, 8, '9', 9, '9', 'IMG-65cd81e4773e74.56128090.jpg'),
(28, 9, '2342', 23, '4234', 'IMG-65cd842b1b3988.42933647.png'),
(29, 10, '534', 345345, '345', 'IMG-65cd84c4a86172.22023027.png'),
(30, 11, '23', 42342, '432', 'IMG-65cd856160bfb1.93967091.png'),
(31, 12, 'adf', 3, 'adsf', 'IMG-65cd865603ee31.89414675.png'),
(32, 13, '324', 34, '3243', 'IMG-65cd867d5744e0.57333447.png'),
(33, 14, 'dsf', 234234, '3', 'IMG-65cd8c2cc8d0c2.79637827.png'),
(34, 15, '235555', 4234, '234', 'IMG-65cd8c5228bb70.88841779.png'),
(35, 2, 'bunjing', 34, '2', 'IMG-65cda704232326.57547578.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `female_candidates`
--
ALTER TABLE `female_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `male_candidates`
--
ALTER TABLE `male_candidates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `female_candidates`
--
ALTER TABLE `female_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `male_candidates`
--
ALTER TABLE `male_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
