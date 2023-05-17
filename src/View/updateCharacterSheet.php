<?php
use Model\CharacterSheet;
$id = $_GET['index'];

$sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE `characterSheetId` = :characterSheetId";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$result = $statementCharacterSheet->fetch();
var_dump($result);
if (!empty($_POST)) {
    var_dump($_POST);
    var_dump($_GET);
    $characterSheet = new CharacterSheet();
    
    
    $sqlUpdateCharacterSheet = 
    "UPDATE `character_sheet` 
    SET `characterSheetName` = :characterSheetName ,`characterSheetRace`= :characterSheetRace,`characterSheetClass`= :characterSheetClass ,
    `characterSheetStatus`= :characterSheetStatus ,`characteristicInitiative`= :characteristicInitiative ,
    `characteristicHpMax`= :characteristicHpMax ,
    `characteristicActualHp`= :characteristicActualHp ,`characteristicMpMax`= :characteristicMpMax ,
    `characteristicActualMp`= :characteristicActualMp ,
    `characteristicStrength`= :characteristicStrength ,`characteristicDexterity`= :characteristicDexterity ,
    `characteristicStamina`= :characteristicStamina ,
    `characteristicIntelligence`= :characteristicIntelligence ,`characteristicWisdom`= :characteristicWisdom ,
    `characteristicLuck`= :characteristicLuck  WHERE `characterSheetId` = :characterSheetId";
    
    $statementUpdateCharacterSheet=$connection->prepare($sqlUpdateCharacterSheet);
    $statementUpdateCharacterSheet->bindValue(':characterSheetName', $characterSheet->getcharacterSheetName(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetRace', $characterSheet->getcharacterSheetRace(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetClass', $characterSheet->getcharacterSheetClass(), PDO::PARAM_STR);
    $statementUpdateCharacterSheet->bindValue(':characterSheetStatus', $characterSheet->getcharacterSheetName(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicInitiative', $characterSheet->getcharacteristicInitiative(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicHpMax', $characterSheet->getcharacteristicHpMax(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicActualHp', $characterSheet->getcharacteristicActualHp(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicMpMax', $characterSheet->getcharacteristicMpMax(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicActualMp', $characterSheet->getcharacteristicActualMp(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicStrength', $characterSheet->getcharacteristicDexterity(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicDexterity', $characterSheet->getcharacteristicInitiative(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicStamina', $characterSheet->getcharacteristicStamina(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicIntelligence', $characterSheet->getcharacteristicIntelligence(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicWisdom', $characterSheet->getcharacteristicWisdom(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':characteristicLuck', $characterSheet->getcharacteristicLuck(), PDO::PARAM_INT);
    $statementUpdateCharacterSheet->execute();

    header("Location:?page=characterSheet&index=$id&update=success");
    
}
?>

<form method="post" action="">
  <label for="characterSheetName">Nom du personnage :</label>
  <input type="text" id="characterSheetName" name="characterSheetName" value="Vindo" required>

  <label for="characterSheetClass">Classe du personnage :</label>
  <input type="text" id="characterSheetClass" name="characterSheetClass" value="Mage" required>

  <label for="characterSheetRace">Race du personnage :</label>
  <input type="text" id="characterSheetRace" name="characterSheetRace" value="Mort-vivant" required>

  <label for="characterSheetStatus">Statut du personnage :</label>
  <select name="characterSheetStatus" id="characterSheetStatus">
    <option value=0>Ally</option>
    <option value=1>Enemy</option>
    <option value=2>Neutral</option>
  </select>


  <h2>Characteristics</h2>

  <label for="characteristicInitiative">Initiative (max 10):</label>
  <input type="number" id="characteristicInitiative" name="characteristicInitiative" value="1" min="0" max="10"
    required>

  <label for="characteristicHpMax">Health Points Max:</label>
  <input type="number" id="characteristicHpMax" name="characteristicHpMax" value="1" min="1" max="999" required>

  <label for="characteristicActualHp">Health Points Actual:</label>
  <input type="number" id="characteristicActualHp" name="characteristicActualHp" value="1" min="0" max="999" required>

  <label for="characteristicMpMax">Magic Points Max:</label>
  <input type="number" id="characteristicMpMax" name="characteristicMpMax" value="1" min="1" max="999" required>

  <label for="characteristicActualMp">Magic Points Actual:</label>
  <input type="number" id="characteristicActualMp" name="characteristicActualMp" value="1" min="0" max="999" required>

  <label for="characteristicStrength">Strength (max 20):</label>
  <input type="number" id="characteristicStrength" name="characteristicStrength" value="1" min="0" max="20" required>

  <label for="characteristicDexterity">Dexterity (max 20):</label>
  <input type="number" id="characteristicDexterity" name="characteristicDexterity" value="1" min="0" max="20" required>

  <label for="characteristicStamina">Stamina (max 20):</label>
  <input type="number" id="characteristicStamina" name="characteristicStamina" value="1" min="0" max="20" required>

  <label for="characteristicIntelligence">Intelligence (maximum 20):</label>
  <input type="number" id="characteristicIntelligence" name="characteristicIntelligence" value="1" min="0" max="20"
    required>

  <label for="characteristicWisdom">Wisdom (maxi 20):</label>
  <input type="number" id="characteristicWisdom" name="characteristicWisdom" value="1" min="0" max="20" required>

  <label for="characteristicLuck">Luck (max 20):</label>
  <input type="number" id="characteristicLuck" name="characteristicLuck" value="1" min="0" max="20" required>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>