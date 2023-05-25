<?php
namespace Controller;
use Controller\AbstractController;
use Model\CharacterSheet;
use PDO;
class UpdateCharacterSheetController extends AbstractController {
    
    public function getContent(): array
    {
        $id = intval($_GET['index']);
    $characterSheet = new CharacterSheet($_POST);
    if (!empty($_POST)) {
    $sqlUpdateCharacterSheet = 
    "UPDATE `character_sheet` 
    SET `characterSheetName` = :characterSheetName ,
    `characterSheetRace`= :characterSheetRace,
    `characterSheetClass`= :characterSheetClass ,
    `characterSheetStatus`= :characterSheetStatus ,
    `characteristicInitiative`= :characteristicInitiative ,
    `characteristicHpMax`= :characteristicHpMax ,
    `characteristicActualHp`= :characteristicActualHp ,
    `characteristicMpMax`= :characteristicMpMax ,
    `characteristicActualMp`= :characteristicActualMp ,
    `characteristicStrength`= :characteristicStrength ,
    `characteristicDexterity`= :characteristicDexterity ,
    `characteristicStamina`= :characteristicStamina ,
    `characteristicIntelligence`= :characteristicIntelligence ,
    `characteristicWisdom`= :characteristicWisdom ,
    `characteristicLuck`= :characteristicLuck  WHERE `characterSheetId` = :characterSheetId";
    
    $statementUpdateCharacterSheet = $this->connection->prepare($sqlUpdateCharacterSheet);
    $statementUpdateCharacterSheet->bindValue(':characterSheetName', $characterSheet->getcharacterSheetName(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetRace', $characterSheet->getcharacterSheetRace(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetClass', $characterSheet->getcharacterSheetClass(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetStatus', $characterSheet->getCharacterSheetStatus(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicInitiative', $characterSheet->getcharacteristicInitiative(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicHpMax', $characterSheet->getcharacteristicHpMax(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicActualHp', $characterSheet->getcharacteristicActualHp(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicMpMax', $characterSheet->getcharacteristicMpMax(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicActualMp', $characterSheet->getcharacteristicActualMp(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicStrength', $characterSheet->getcharacteristicStrength(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicDexterity', $characterSheet->getcharacteristicDexterity(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicStamina', $characterSheet->getcharacteristicStamina(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicIntelligence', $characterSheet->getcharacteristicIntelligence(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicWisdom', $characterSheet->getcharacteristicWisdom(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicLuck', $characterSheet->getcharacteristicLuck(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
    $statementUpdateCharacterSheet->execute();
    
    header("Location:?page=characterSheet&index=$id&updateCharacterSheet=success");
    }
  
  
    
    
  
  $sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE `characterSheetId` = :characterSheetId";
  $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
  $statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
  $statementCharacterSheet->execute();
  $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
  $result = $statementCharacterSheet->fetch();
        return [
            'characterSheet' => $characterSheet,
        ] ;
    }
    public function getFileName(): string
    {
        return 'updateCharacterSheet' ;
    }

    public function getPageTitle(): string
    {
        return 'Modification du Personnage';
    }
}

