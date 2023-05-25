SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


INSERT INTO `character_sheet` (`characterSheetId`, `characterSheetName`, `characterSheetRace`, `characterSheetClass`, `characterSheetStatus`, `characteristicInitiative`, `characteristicHpMax`, `characteristicActualHp`, `characteristicMpMax`, `characteristicActualMp`, `characteristicStrength`, `characteristicDexterity`, `characteristicStamina`, `characteristicIntelligence`, `characteristicWisdom`, `characteristicLuck`, `gameId`) VALUES
(1, 'azuera', 'elfe', 'rogue', 0, 10, 100, 100, 1, 1, 10, 20, 20, 1, 10, 10, NULL);

INSERT INTO `equipement` (`equipementId`, `equipementName`, `equipementDamage`, `equipementRange`, `idCharacterSheet`) VALUES
(1, 'hache', 75, 2, 1),
(2, 'arc', 14, 50, 1),
(3, 'baton', 1, 2, 1);

INSERT INTO `skill` (`skillId`, `skillName`, `skillLevel`, `idCharacterSheet`) VALUES
(1, 'test', 1, 1),
(2, 'Boule de feu', 5, 1),
(3, 'Rush', 3, 1);

INSERT INTO `userr` (`userrId`, `userrRole`, `userrName`, `userrEmail`, `userrPassword`, `userrProfilePicture`, `userrGender`) VALUES
(1, 0, 'azaz', 'azaz@azaz.com', '$2y$10$jbUxkjNoqJnNPAuL2d.lHunFpUIZKLYOyLwz0PQlJUoAWUE2S7cOu', 0, 1);