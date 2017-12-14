-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql.metropolia.fi
-- Generation Time: Dec 12, 2017 at 04:00 PM
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
-- Table structure for table `Arvostelu`
--

CREATE TABLE `Arvostelu` (
  `arvosana` int(11) DEFAULT NULL,
  `arvostelu` char(255) DEFAULT NULL,
  `ElokuvaID` int(11) DEFAULT NULL,
  `KayttajaID` int(11) DEFAULT NULL,
  `ArvosteluID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Arvostelu`
--

INSERT INTO `Arvostelu` (`arvosana`, `arvostelu`, `ElokuvaID`, `KayttajaID`, `ArvosteluID`) VALUES
(5, 'Tämä on hyvä elokuva.', 1, 2, 1),
(2, 'Tämä on huono elokuva.', 3, 1, 2),
(3, 'Ihan ok', 2, 2, 12),
(4, 'Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva. Kiva.', 2, 3, 13),
(5, 'Huikea', 4, 5, 15),
(5, 'Ihan kiva', 5, 5, 16),
(5, 'Paras elokuva ikinä.', 6, 1, 17),
(3, 'Hyvä', 1, 5, 27),
(3, 'Keskitasoa', 4, 2, 34),
(3, 'Ok', 5, 2, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Arvostelu`
--
ALTER TABLE `Arvostelu`
  ADD PRIMARY KEY (`ArvosteluID`),
  ADD KEY `ElokuvaID` (`ElokuvaID`),
  ADD KEY `KayttajaID` (`KayttajaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Arvostelu`
--
ALTER TABLE `Arvostelu`
  MODIFY `ArvosteluID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Arvostelu`
--
ALTER TABLE `Arvostelu`
  ADD CONSTRAINT `Arvostelu_ibfk_1` FOREIGN KEY (`ElokuvaID`) REFERENCES `Elokuva` (`ElokuvaID`),
  ADD CONSTRAINT `Arvostelu_ibfk_2` FOREIGN KEY (`KayttajaID`) REFERENCES `Kayttaja` (`KayttajaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
