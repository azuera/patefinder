CREATE TABLE userr(
    userrId INT AUTO_INCREMENT,
    userrRole BOOLEAN,
    userrName VARCHAR(255),
    userrEmail VARCHAR(255),
    userrPassword VARCHAR(255),
    userrProfilePicture DOUBLE,
    userrGender BOOLEAN,
    PRIMARY KEY(userrId)
);

CREATE TABLE game(
    gameId INT AUTO_INCREMENT,
    skillName VARCHAR(255),
    skillLevel INT,
    userrId INT,
    PRIMARY KEY(gameId),
    FOREIGN KEY(userrId) REFERENCES userr(userrId)
);

CREATE TABLE character_sheet(
    characterSheetId INT AUTO_INCREMENT,
    characterSheetName VARCHAR(255),
    characterSheetRace VARCHAR(255),
    characterSheetClass VARCHAR(255),
    characterSheetStatus INT,
    characteristicInitiative INT,
    characteristicHpMax INT,
    characteristicActualHp INT,
    characteristicMpMax INT,
    characteristicActualMp INT,
    characteristicStrength INT,
    characteristicDexterity INT,
    characteristicStamina INT,
    characteristicIntelligence INT,
    characteristicWisdom INT,
    characteristicLuck INT,
    gameId INT,
    PRIMARY KEY(characterSheetId),
    FOREIGN KEY(gameId) REFERENCES game(gameId)
);

CREATE TABLE equipement(
    equipementId INT AUTO_INCREMENT,
    equipementName VARCHAR(255),
    equipementDamage INT,
    equipementRange INT,
    characterSheetId INT,
    PRIMARY KEY(equipementId),
    FOREIGN KEY(characterSheetId) REFERENCES character_sheet(characterSheetId)
);

CREATE TABLE skill(
    skillId INT AUTO_INCREMENT,
    skillName VARCHAR(255),
    skillLevel INT,
    characterSheetId INT,
    PRIMARY KEY(skillId),
    FOREIGN KEY(characterSheetId) REFERENCES character_sheet(characterSheetId)
);

CREATE TABLE characterSheetUser(
    userrId INT,
    characterSheetId INT,
    PRIMARY KEY(userrId, characterSheetId),
    FOREIGN KEY(userrId) REFERENCES userr(userrId),
    FOREIGN KEY(characterSheetId) REFERENCES character_sheet(characterSheetId)
);
