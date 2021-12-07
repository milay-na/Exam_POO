-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2021 at 12:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wf3_php_final_milena`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id_contest` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `id_winner` int(11) DEFAULT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id_contest`, `start_date`, `id_winner`, `id_game`) VALUES
(1, '2019-12-25', 2, 23),
(2, '2019-12-25', NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `min_players` int(3) NOT NULL,
  `max_players` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `title`, `min_players`, `max_players`) VALUES
(23, '7 Wonders', 2, 7),
(24, 'Ticket to Ride', 2, 5),
(25, 'Pandemic ', 2, 4),
(26, 'Munchkin ', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nickname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id_player`, `email`, `nickname`) VALUES
(1, 'luke.skywalker@rogue.sw ', 'Luke'),
(2, 'amidala.padme@naboo.gov ', 'Padme'),
(3, 'han.solo@millenium-falcon.com', 'HanSolo'),
(4, 'chewbacca@wook.ie', 'Chewbie '),
(5, 'rey@jakku.planet', 'Rey');

-- --------------------------------------------------------

--
-- Table structure for table `player_contest`
--

CREATE TABLE `player_contest` (
  `id_player_contest` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_contest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_contest`
--

INSERT INTO `player_contest` (`id_player_contest`, `id_player`, `id_contest`) VALUES
(10, 1, 1),
(11, 2, 1),
(12, 3, 1),
(13, 4, 1),
(14, 5, 1),
(15, 2, 2),
(16, 3, 2),
(17, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id_contest`),
  ADD KEY `id_winner` (`id_winner`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`);

--
-- Indexes for table `player_contest`
--
ALTER TABLE `player_contest`
  ADD PRIMARY KEY (`id_player_contest`),
  ADD KEY `id_player` (`id_player`),
  ADD KEY `id_contest` (`id_contest`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id_contest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `player_contest`
--
ALTER TABLE `player_contest`
  MODIFY `id_player_contest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_ibfk_2` FOREIGN KEY (`id_winner`) REFERENCES `player` (`id_player`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player_contest`
--
ALTER TABLE `player_contest`
  ADD CONSTRAINT `player_contest_ibfk_1` FOREIGN KEY (`id_player`) REFERENCES `player` (`id_player`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_contest_ibfk_2` FOREIGN KEY (`id_contest`) REFERENCES `contest` (`id_contest`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
