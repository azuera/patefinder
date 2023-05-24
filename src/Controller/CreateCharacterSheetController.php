<?php

namespace Controller;

use Model\CharacterSheet;
use PDO;

class CreateCharacterSheetController extends AbstractController
{

    public function getContent(): array
    {
        $characterSheetStatusList = CharacterSheet::CHARACTER_SHEET_STATUS_LIST;
        $id = null;
        $errors = [];
        $userId = ($_SESSION['user'])->getUserrId();
        $characterSheet = (new CharacterSheet($_POST))
            ->setUserrId($userId);

        if (!empty($_POST)) {


            if ($characterSheet->getcharacterSheetName() == "") {
                $errors[] = "Entrer un nom de personnage";
            }
            if ($characterSheet->getcharacterSheetClass() == "") {
                $errors[] = "Entrer un nom de classe";
            }
            if ($characterSheet->getcharacterSheetRace() == "") {
                $errors[] = "Entrer un nom de race";
            }

            if ($characterSheet->getcharacteristicInitiative() == 0 || ($characterSheet->getcharacteristicInitiative() < 0 || $characterSheet->getcharacteristicInitiative() > 10)) {
                $errors[] = "Statistique Initiative doit être comprise entre 0 et 10";
            }
            if ($characterSheet->getcharacteristicHpMax() == 0 || $characterSheet->getcharacteristicHpMax() < 1) {
                $errors[] = "Statistique PV Max doit être au minimum de 1";
            }
            if ($characterSheet->getcharacteristicActualHp() == 0 || ($characterSheet->getcharacteristicActualHp() < 0 || $characterSheet->getcharacteristicActualHp() > $characterSheet->getcharacteristicHpMax())) {
                $errors[] = "Statistique PV Actuel doit être comprise entre 1 et la statistique PV max";
            }
            if ($characterSheet->getcharacteristicHpMax() == 0 || $characterSheet->getcharacteristicHpMax() < 0) {
                $errors[] = "Statistique PM Max doit être au minimum de 0";
            }
            if ($characterSheet->getcharacteristicActualHp() == 0 || ($characterSheet->getcharacteristicActualMp() < 0 || $characterSheet->getcharacteristicActualMp() > $characterSheet->getcharacteristicMpMax())) {
                $errors[] = "Statistique PM Actuel doit être comprise entre 1 et la statistique PM max";
            }
            if ($characterSheet->getcharacteristicStrength() == 0 || ($characterSheet->getcharacteristicStrength() < 0 || $characterSheet->getcharacteristicStrength() > 20)) {
                $errors[] = "Statistique Force doit être comprise entre 0 et 20";
            }
            if ($characterSheet->getcharacteristicDexterity() == 0 || ($characterSheet->getcharacteristicDexterity() < 0 || $characterSheet->getcharacteristicDexterity() > 20)) {
                $errors[] = "Statistique Dexterité doit être comprise entre 0 et 20";
            }
            if ($characterSheet->getcharacteristicStamina() == 0 || ($characterSheet->getcharacteristicStamina() < 0 || $characterSheet->getcharacteristicStamina() > 20)) {
                $errors[] = "Statistique Constitution doit être comprise entre 0 et 20";
            }
            if ($characterSheet->getcharacteristicIntelligence() == 0 || ($characterSheet->getcharacteristicIntelligence() < 0 || $characterSheet->getcharacteristicIntelligence() > 20)) {
                $errors[] = "Statistique Intelligence doit être comprise entre 0 et 20";
            }
            if ($characterSheet->getcharacteristicWisdom() == 0 || ($characterSheet->getcharacteristicWisdom() < 0 || $characterSheet->getcharacteristicWisdom() > 20)) {
                $errors[] = "Statistique Sagesse doit être comprise entre 0 et 20";
            }
            if ($characterSheet->getcharacteristicLuck() == 0 || $characterSheet->getcharacteristicLuck() < 0 || $characterSheet->getcharacteristicLuck() > 20) {
                $errors[] = "Statistique Chance doit être comprise entre 0 et 20";
            }


            if (empty($errors)) {
                $sql = 'INSERT INTO character_sheet (characterSheetName, characterSheetStatus, characterSheetRace, characterSheetClass, characteristicInitiative, characteristicHpMax, characteristicActualHp, characteristicMpMax, characteristicActualMp, characteristicStrength, characteristicDexterity, characteristicStamina, characteristicIntelligence, characteristicWisdom, characteristicLuck) VALUES (:characterSheetName, :characterSheetStatus, :characterSheetRace, :characterSheetClass, :characteristicInitiative, :characteristicHpMax, :characteristicActualHp, :characteristicMpMax, :characteristicActualMp, :characteristicStrength, :characteristicDexterity, :characteristicStamina, :characteristicIntelligence, :characteristicWisdom, :characteristicLuck)';
                $statement = $this->connection->prepare($sql);
                $statement->bindValue(':characterSheetName', $characterSheet->getcharacterSheetName(), PDO::PARAM_STR);
                $statement->bindValue(':characterSheetStatus', $characterSheet->getCharacterSheetStatus(), PDO::PARAM_STR);
                $statement->bindValue(':characterSheetRace', $characterSheet->getcharacterSheetRace(), PDO::PARAM_STR);
                $statement->bindValue(':characterSheetClass', $characterSheet->getcharacterSheetClass(), PDO::PARAM_STR);
                $statement->bindValue(':characteristicInitiative', $characterSheet->getcharacteristicInitiative(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicHpMax', $characterSheet->getCharacteristicHpMax(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicActualHp', $characterSheet->getcharacteristicActualHp(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicMpMax', $characterSheet->getcharacteristicMpMax(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicActualMp', $characterSheet->getcharacteristicActualMp(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicStrength', $characterSheet->getcharacteristicStrength(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicDexterity', $characterSheet->getcharacteristicDexterity(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicStamina', $characterSheet->getcharacteristicStamina(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicIntelligence', $characterSheet->getcharacteristicIntelligence(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicWisdom', $characterSheet->getcharacteristicLuck(), PDO::PARAM_INT);
                $statement->bindValue(':characteristicLuck', $characterSheet->getcharacteristicLuck(), PDO::PARAM_INT);
                $statement->execute();


                $id = $this->connection->lastInsertId();

                $sqlInsertCharacterSheetUser = "INSERT INTO `charactersheetuser` (`userrId`,`characterSheetId`) VALUES (:userrId, :characterSheetId)";
                $statementInsertCharacterSheetUser = $this->connection->prepare($sqlInsertCharacterSheetUser);
                $statementInsertCharacterSheetUser->bindValue(':userrId', $_SESSION['user']->getUserrId(), PDO::PARAM_INT);
                $statementInsertCharacterSheetUser->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
                $statementInsertCharacterSheetUser->execute();


                header("Location: ?page=characterSheet&index=$id");
            }
        }
        return [
            'id' => $id,
            'errors' => $errors,
            'userId' => $userId,
            'characterSheet' => $characterSheet,
            'characterSheetStatusList' => $characterSheetStatusList,
        ];
    }

    public function getFileName(): string
    {
        return 'createCharacterSheet';
    }

    public function getPageTitle(): string
    {
        return 'creation de fiche personnage';
    }
}