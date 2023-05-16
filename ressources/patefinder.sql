-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 mai 2023 à 12:29
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `patefinder`
--

-- --------------------------------------------------------

--
-- Structure de la table `charactersheetuser`
--

DROP TABLE IF EXISTS `charactersheetuser`;
CREATE TABLE IF NOT EXISTS `charactersheetuser` (
  `userrId` int NOT NULL,
  `characterSheetId` int NOT NULL,
  PRIMARY KEY (`userrId`,`characterSheetId`),
  KEY `characterSheetId` (`characterSheetId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `charactersheetuser`
--

INSERT INTO `charactersheetuser` (`userrId`, `characterSheetId`) VALUES
(3, 5),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `character_sheet`
--

DROP TABLE IF EXISTS `character_sheet`;
CREATE TABLE IF NOT EXISTS `character_sheet` (
  `characterSheetId` int NOT NULL AUTO_INCREMENT,
  `characterSheetName` varchar(255) DEFAULT NULL,
  `characterSheetRace` varchar(255) DEFAULT NULL,
  `characterSheetClass` varchar(255) DEFAULT NULL,
  `characterSheetStatus` int DEFAULT NULL,
  `characteristicInitiative` int DEFAULT NULL,
  `characteristicHpMax` int DEFAULT NULL,
  `characteristicActualHp` int DEFAULT NULL,
  `characteristicMpMax` int DEFAULT NULL,
  `characteristicActualMp` int DEFAULT NULL,
  `characteristicStrength` int DEFAULT NULL,
  `characteristicDexterity` int DEFAULT NULL,
  `characteristicStamina` int DEFAULT NULL,
  `characteristicIntelligence` int DEFAULT NULL,
  `characteristicWisdom` int DEFAULT NULL,
  `characteristicLuck` int DEFAULT NULL,
  `gameId` int DEFAULT NULL,
  PRIMARY KEY (`characterSheetId`),
  KEY `gameId` (`gameId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `character_sheet`
--

INSERT INTO `character_sheet` (`characterSheetId`, `characterSheetName`, `characterSheetRace`, `characterSheetClass`, `characterSheetStatus`, `characteristicInitiative`, `characteristicHpMax`, `characteristicActualHp`, `characteristicMpMax`, `characteristicActualMp`, `characteristicStrength`, `characteristicDexterity`, `characteristicStamina`, `characteristicIntelligence`, `characteristicWisdom`, `characteristicLuck`, `gameId`) VALUES
(5, 'Vindo', 'Mort-vivant', 'Mage', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 17),
(6, 'azu', 'Mort-vivant', 'rogue', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(7, 'super demo', 'gnome lepreux', 'demo', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `equipementId` int NOT NULL AUTO_INCREMENT,
  `equipementName` varchar(255) DEFAULT NULL,
  `equipementDamage` int DEFAULT NULL,
  `equipementRange` int DEFAULT NULL,
  `idCharacterSheet` int NOT NULL,
  PRIMARY KEY (`equipementId`),
  KEY `idCharacter` (`idCharacterSheet`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`equipementId`, `equipementName`, `equipementDamage`, `equipementRange`, `idCharacterSheet`) VALUES
(7, 'arc', 5, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `gameId` int NOT NULL AUTO_INCREMENT,
  `gameName` varchar(255) NOT NULL,
  `gameLore` text NOT NULL,
  `userrId` int DEFAULT NULL,
  PRIMARY KEY (`gameId`),
  KEY `userrId` (`userrId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`gameId`, `gameName`, `gameLore`, `userrId`) VALUES
(10, 'la communauter des sans cullottes', 'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Powerful forces are unrelenting in their search for it. But fate has placed it in the hands of a young Hobbit named Frodo Baggins (Elijah Wood), who inherits the Ring and steps into legend. A daunting task lies ahead for Frodo when he becomes the Ringbearer - to destroy the One Ring in the fires of Mount Doom where it was forged.', 4),
(17, 'qdfv', 'vsdv', 4);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `skillId` int NOT NULL AUTO_INCREMENT,
  `skillName` varchar(255) DEFAULT NULL,
  `skillLevel` int DEFAULT NULL,
  `idCharacterSheet` int NOT NULL,
  PRIMARY KEY (`skillId`),
  KEY `idCharacterSheet` (`idCharacterSheet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `userr`
--

DROP TABLE IF EXISTS `userr`;
CREATE TABLE IF NOT EXISTS `userr` (
  `userrId` int NOT NULL AUTO_INCREMENT,
  `userrRole` tinyint(1) DEFAULT NULL,
  `userrName` varchar(255) DEFAULT NULL,
  `userrEmail` varchar(255) DEFAULT NULL,
  `userrPassword` varchar(255) DEFAULT NULL,
  `userrProfilePicture` double DEFAULT NULL,
  `userrGender` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userrId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `userr`
--

INSERT INTO `userr` (`userrId`, `userrRole`, `userrName`, `userrEmail`, `userrPassword`, `userrProfilePicture`, `userrGender`) VALUES
(1, 0, 'azuera', 'azu@lolo.com', '$2y$10$jbUxkjNoqJnNPAuL2d.lHunFpUIZKLYOyLwz0PQlJUoAWUE2S7cOu', 0, 1),
(2, 1, 'azuera', 'azu@lolo.com', '$2y$10$eorpRIcMktR05RtG3B8LRuSf2M55iRcQYkkPR2JtD.8QV.N8sbQJq', 0, 1),
(3, 1, 'vindo', 'vindo@lolo.com', '$2y$10$s7MM2WfUuIWMhsqtpJAfzehqKCYnRHT5vfoRy09No244wSXfOUFi.', 0, 2),
(4, 1, 'Hich', 'hichambenzaied69150@gmail.com', '$2y$10$env6lfAyvn6zpxMYVrq3oeUQMX9pP.a12LyYVdffrPjoxtANka2WS', 0, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `charactersheetuser`
--
ALTER TABLE `charactersheetuser`
  ADD CONSTRAINT `charactersheetuser_ibfk_1` FOREIGN KEY (`userrId`) REFERENCES `userr` (`userrId`),
  ADD CONSTRAINT `charactersheetuser_ibfk_2` FOREIGN KEY (`characterSheetId`) REFERENCES `character_sheet` (`characterSheetId`);

--
-- Contraintes pour la table `character_sheet`
--
ALTER TABLE `character_sheet`
  ADD CONSTRAINT `character_sheet_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`);

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`userrId`) REFERENCES `userr` (`userrId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
