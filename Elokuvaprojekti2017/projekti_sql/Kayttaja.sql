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
-- Table structure for table `Kayttaja`
--

CREATE TABLE `Kayttaja` (
  `KayttajaID` int(11) NOT NULL,
  `etunimi` char(40) DEFAULT NULL,
  `sahkoposti` char(50) DEFAULT NULL,
  `salasana` char(50) DEFAULT NULL,
  `profiilikuva` char(30) DEFAULT NULL,
  `sukunimi` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Kayttaja`
--

INSERT INTO `Kayttaja` (`KayttajaID`, `etunimi`, `sahkoposti`, `salasana`, `profiilikuva`, `sukunimi`) VALUES
(1, 'Nuuskamuikkunen', 'tui@tui.tui', '92c1994c903d329557c26c8e9ab94902', NULL, 'tui'),
(2, 'Jussi', 'io@io.io', 'd36b7bfcb1823b28e8510cd5e20468f5', NULL, 'io'),
(3, 'Henri', 'tommi25@hotmail.com', 'd182c11b35460c415d3a1d8670158336', NULL, 'lage'),
(4, 'Tommi', 'rrr@rrr.rrr', '6e0f7c9151ff363decbf29c016fceffc', NULL, 'rrr'),
(5, 'Matti', 'matti@virtanen.com', '4affa2c5181ddbdb838b45ea25b5f154', NULL, 'Virtanen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Kayttaja`
--
ALTER TABLE `Kayttaja`
  ADD PRIMARY KEY (`KayttajaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Kayttaja`
--
ALTER TABLE `Kayttaja`
  MODIFY `KayttajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
