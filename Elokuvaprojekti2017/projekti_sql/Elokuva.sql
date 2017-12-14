-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql.metropolia.fi
-- Generation Time: Dec 12, 2017 at 04:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tommilag`
--

-- --------------------------------------------------------

--
-- Table structure for table `Elokuva`
--

CREATE TABLE `Elokuva` (
  `ElokuvaID` int(11) NOT NULL,
  `nimi` char(40) DEFAULT NULL,
  `vuosi` char(10) DEFAULT NULL,
  `kuvaus` char(255) DEFAULT NULL,
  `arvosanaTotal` int(11) DEFAULT NULL,
  `mediaUrl` char(30) DEFAULT NULL,
  `mediaThumb` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Elokuva`
--

INSERT INTO `Elokuva` (`ElokuvaID`, `nimi`, `vuosi`, `kuvaus`, `arvosanaTotal`, `mediaUrl`, `mediaThumb`) VALUES
(1, 'Star Wars: Espisode IV - A New Hope', '1977', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee, and two droids to save the galaxy from the Empire´s world-destroying battle-station, while also attempting to rescue Princess Leia from the evil Darth Vader.', NULL, '1_img.jpg', '1_img.jpg'),
(2, 'Star Wars: Episode III - Revenge of the', '2005', 'Three years into the Clone Wars, the Jedi rescue Palpatine from Count Dooku. As Obi-Wan pursues a new threat, Anakin acts as a double agent between the Jedi Council and Palpatine and is lured into a sinister plan to rule the galaxy.', NULL, '2_img.jpg', '2_img.jpg'),
(3, 'Inception', '2010', 'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', NULL, '3_img.jpg', '3_img.jpg'),
(4, 'Pulp Fiction', '1994', '-The lives of two mob hit men, a boxer, a gangster´s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', NULL, '4_img.jpg', '4_img.jpg'),
(5, 'The Dark Knight', '2008', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, the Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', NULL, '5_img.jpg', '5_img.jpg'),
(6, 'Gladiator', '2000', 'When a Roman General is betrayed, and his family murdered by an emperor´s corrupt son, he comes to Rome as a gladiator to seek revenge.', NULL, '6_img.jpg', '6_img.jpg'),
(7, 'The Hobbit: An Unexpected Journey', '2012', 'A reluctant hobbit, Bilbo Baggins, sets out to the Lonely Mountain with a spirited group of dwarves to reclaim their mountain home, and the gold within it from the dragon Smaug.', NULL, '7_img.jpg', '7_img.jpg'),
(8, 'Harry Potter and the Sorcerer´s Stone', '2001', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.', NULL, '8_img.jpg', '8_img.jpg'),
(9, 'The Lord of the Rings: The Fellowship of', '2001', 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle Earth from the Dark Lord Sauron.', NULL, '9_img.jpg', '9_img.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Elokuva`
--
ALTER TABLE `Elokuva`
  ADD PRIMARY KEY (`ElokuvaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
