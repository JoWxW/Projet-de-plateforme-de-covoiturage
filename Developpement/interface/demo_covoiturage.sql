-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2018 at 02:28 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_covoiturage`
--

-- --------------------------------------------------------

--
-- Table structure for table `proposition`
--

DROP TABLE IF EXISTS `proposition`;
CREATE TABLE IF NOT EXISTS `proposition` (
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietaire` int(11) NOT NULL,
  `idT` int(11) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proposition`
--

INSERT INTO `proposition` (`idP`, `idProprietaire`, `idT`) VALUES
(1, 2, 12),
(2, 2, 13),
(3, 2, 14),
(4, 2, 15),
(5, 2, 16),
(6, 2, 17),
(7, 2, 18),
(8, 2, 19),
(9, 2, 20),
(10, 5, 21),
(11, 5, 22),
(12, 5, 23),
(13, 5, 24),
(14, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `idT` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(45) NOT NULL,
  `destination` varchar(45) NOT NULL,
  `date` varchar(5) NOT NULL,
  `tarif` varchar(45) NOT NULL,
  PRIMARY KEY (`idT`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trajet`
--

INSERT INTO `trajet` (`idT`, `depart`, `destination`, `date`, `tarif`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, 'Paris', 'Bordeaux', 'Nov01', '55'),
(6, 'Paris', 'Bordeaux', 'Nov01', '55'),
(7, 'Paris', 'Bordeaux', 'Nov01', '55'),
(8, 'Paris', 'Bordeaux', 'Nov01', '55'),
(9, 'Paris', 'Bordeaux', 'Nov01', '55'),
(10, 'Paris', 'Bordeaux', 'Nov01', '55'),
(11, 'Paris', 'Bordeaux', 'Nov01', '55'),
(12, 'Paris', 'Bordeaux', 'Nov01', '55'),
(13, 'Paris', 'Bordeaux', 'Nov01', '55'),
(14, 'Paris', 'Bordeaux', 'Nov01', '55'),
(15, 'Paris', 'Bordeaux', 'Nov01', '55'),
(16, 'Paris', 'Bordeaux', 'Nov01', '55'),
(17, 'Paris', 'Bordeaux', 'Nov01', '55'),
(18, 'Paris', 'Bordeaux', 'Nov01', '55'),
(19, 'Paris', 'Bordeaux', 'Nov01', '55'),
(20, 'Paris', 'Bordeaux', 'Nov01', '55'),
(21, 'Paris', 'Metz', 'Oct31', '25'),
(22, 'Paris', 'Metz', 'Oct31', '25'),
(23, 'Paris', 'Metz', 'Oct31', '25'),
(24, 'Paris', 'Metz', 'Oct31', '25'),
(25, 'Paris', 'Metz', 'Oct31', '25'),
(26, 'Paris', 'Troyes', 'Nov03', '10');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idU` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `motDePasse` varchar(32) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`idU`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `nom`, `motDePasse`, `address`) VALUES
(1, 'test0', 'motDePasse', 'address'),
(2, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', '0xe49bf8c999aafa1652cdd40342d3a0a7a542282a'),
(3, 'test', 'motDePasse', 'address'),
(4, 'client2', '2c66045d4e4a90814ce9280272e510ec', '0x0fcee201b5da2438fc589b3a6567055b150d9afe'),
(5, 'client1', 'a165dd3c2e98d5d607181d0b87a4c66b', '0xf4d89e21c8934a5f5465574a26a8cd0e04186198');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
