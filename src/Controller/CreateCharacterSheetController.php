<?php

namespace Controller;

use Model\CharacterSheet;
use PDO;

class CreateCharacterSheetController extends AbstractController
{

    public function getContent(): array
    {
        $characterSheetStatusList=CharacterSheet::CHARACTER_SHEET_STATUS_LIST;
        $id=null;
        $errors = [];
        $userId = ($_SESSION['user'])->getUserrId();
        $characterSheet = (new CharacterSheet($_POST))
            ->setUserrId($userId);

        if (!empty($_POST)) {

            $characterSheetName = $_POST["characterSheetName"];
            $characterSheetClass = $_POST["characterSheetClass"];
            $characterSheetRace = $_POST["characterSheetRace"];
            $characterSheetStatus = $_POST["characterSheetStatus"];

            $characteristicInitiative = $_POST["characteristicInitiative"];
            $characteristicHpMax = $_POST["characteristicHpMax"];
            $characteristicActualHp = $_POST["characteristicActualHp"];
            $characteristicMpMax = $_POST["characteristicMpMax"];
            $characteristicActualMp = $_POST["characteristicActualMp"];
            $characteristicStrength = $_POST["characteristicStrength"];
            $characteristicDexterity = $_POST["characteristicDexterity"];
            $characteristicStamina = $_POST["characteristicStamina"];
            $characteristicIntelligence = $_POST["characteristicIntelligence"];
            $characteristicWisdom = $_POST["characteristicWisdom"];
            $characteristicLuck = $_POST["characteristicLuck"];

            if (empty($characterSheetName)) {
                $errors[] = "Entrer un nom de personnage";
            }
            if (empty($characterSheetClass)) {
                $errors[] = "Entrer un nom de classe";
            }
            if (empty($characterSheetRace)) {
                $errors[] = "Entrer un nom de race";
            }

            if (!isset($characteristicInitiative) || ($characteristicInitiative < 0 || $characteristicInitiative > 10)) {
                $errors[] = "Statistique Initiative doit être comprise entre 0 et 10";
            }
            if (!isset($characteristicHpMax) || $characteristicHpMax < 1) {
                $errors[] = "Statistique PV Max doit être au minimum de 1";
            }
            if (!isset($characteristicActualHp) || ($characteristicActualHp < 0 || $characteristicActualHp > $characteristicHpMax)) {
                $errors[] = "Statistique PV Actuel doit être comprise entre 1 et la statistique PV max";
            }
            if (!isset($characteristicMpMax) || $characteristicMpMax < 0) {
                $errors[] = "Statistique PM Max doit être au minimum de 0";
            }
            if (!isset($characteristicActualMp) || ($characteristicActualMp < 0 || $characteristicActualMp > $characteristicMpMax)) {
                $errors[] = "Statistique PM Actuel doit être comprise entre 1 et la statistique PM max";
            }
            if (!isset($characteristicStrength) || ($characteristicStrength < 0 || $characteristicStrength > 20)) {
                $errors[] = "Statistique Force doit être comprise entre 0 et 20";
            }
            if (!isset($characteristicDexterity) || ($characteristicDexterity < 0 || $characteristicDexterity > 20)) {
                $errors[] = "Statistique Dexterité doit être comprise entre 0 et 20";
            }
            if (!isset($characteristicStamina) || ($characteristicStamina < 0 || $characteristicStamina > 20)) {
                $errors[] = "Statistique Constitution doit être comprise entre 0 et 20";
            }
            if (!isset($characteristicIntelligence) || ($characteristicIntelligence < 0 || $characteristicIntelligence > 20)) {
                $errors[] = "Statistique Intelligence doit être comprise entre 0 et 20";
            }
            if (!isset($characteristicWisdom) || ($characteristicWisdom < 0 || $characteristicWisdom > 20)) {
                $errors[] = "Statistique Sagesse doit être comprise entre 0 et 20";
            }
            if (!isset($characteristicLuck) || $characteristicLuck < 0 || $characteristicLuck > 20) {
                $errors[] = "Statistique Chance doit être comprise entre 0 et 20";
            }



            if (empty($errors)) {
                $sql = 'INSERT INTO character_sheet (characterSheetName, characterSheetStatus, characterSheetRace, characterSheetClass, characteristicInitiative, characteristicHpMax, characteristicActualHp, characteristicMpMax, characteristicActualMp, characteristicStrength, characteristicDexterity, characteristicStamina, characteristicIntelligence, characteristicWisdom, characteristicLuck) VALUES (:characterSheetName, :characterSheetStatus, :characterSheetRace, :characterSheetClass, :characteristicInitiative, :characteristicHpMax, :characteristicActualHp, :characteristicMpMax, :characteristicActualMp, :characteristicStrength, :characteristicDexterity, :characteristicStamina, :characteristicIntelligence, :characteristicWisdom, :characteristicLuck)';
                $statement = $this->connection->prepare($sql);
                $statement->bindValue(':characterSheetName', $characterSheetName, PDO::PARAM_STR);
                $statement->bindValue(':characterSheetStatus', $characterSheetStatus, PDO::PARAM_STR);
                $statement->bindValue(':characterSheetRace', $characterSheetRace, PDO::PARAM_STR);
                $statement->bindValue(':characterSheetClass', $characterSheetClass, PDO::PARAM_STR);
                $statement->bindValue(':characteristicInitiative', $characteristicInitiative, PDO::PARAM_INT);
                $statement->bindValue(':characteristicHpMax', $characteristicHpMax, PDO::PARAM_INT);
                $statement->bindValue(':characteristicActualHp', $characteristicActualHp, PDO::PARAM_INT);
                $statement->bindValue(':characteristicMpMax', $characteristicMpMax, PDO::PARAM_INT);
                $statement->bindValue(':characteristicActualMp', $characteristicActualMp, PDO::PARAM_INT);
                $statement->bindValue(':characteristicStrength', $characteristicStrength, PDO::PARAM_INT);
                $statement->bindValue(':characteristicDexterity', $characteristicDexterity, PDO::PARAM_INT);
                $statement->bindValue(':characteristicStamina', $characteristicStamina, PDO::PARAM_INT);
                $statement->bindValue(':characteristicIntelligence', $characteristicIntelligence, PDO::PARAM_INT);
                $statement->bindValue(':characteristicWisdom', $characteristicWisdom, PDO::PARAM_INT);
                $statement->bindValue(':characteristicLuck', $characteristicLuck, PDO::PARAM_INT);
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
            'id'=>$id,
            'errors'=>$errors,
            'userId'=>$userId,
            'characterSheet'=>$characterSheet,
            'characterSheetStatusList'=>$characterSheetStatusList,
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