<?php
use Model\CharacterSheet;
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
    
    $statementUpdateCharacterSheet = $connection->prepare($sqlUpdateCharacterSheet);
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
    
    header("Location:?page=characterSheet&index=$id&update=success&characterSheet");
    }
  
  
    
    
  
  $sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE `characterSheetId` = :characterSheetId";
  $statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
  $statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
  $statementCharacterSheet->execute();
  $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
  $result = $statementCharacterSheet->fetch();
?>

<form method="post" action="">
  <label for="characterSheetName">Nom du personnage :</label>
  <input type="text" id="characterSheetName" name="characterSheetName" value="<?php $characterSheet->getcharacterSheetName();?>" required>

  <label for="characterSheetClass">Classe du personnage :</label>
  <input type="text" id="characterSheetClass" name="characterSheetClass" value="<?php $characterSheet->getcharacterSheetClass();?>" required>

  <label for="characterSheetRace">Race du personnage :</label>
  <input type="text" id="characterSheetRace" name="characterSheetRace" value="<?php $characterSheet->getcharacterSheetRace();?>" required>

  <label for="characterSheetStatus">Statut du personnage :</label>
  <select name="characterSheetStatus" id="characterSheetStatus">
  <?php
   foreach (CharacterSheet::CHARACTER_SHEET_STATUS_LIST as $key => $status) { 
    ?>
    <option value="<?= $key ?>" <?php
      if ($characterSheet->getCharacterSheetStatus() == $key) {
        echo 'selected';
      } ?>>
      <?= $status; ?>
    </option>
    <?php
  }
  ?>  </select>
  <?php
?>
  <h2>Characteristics</h2>

  <label for="characteristicInitiative">Initiative (max 10):</label>
  <input type="number" id="characteristicInitiative" name="characteristicInitiative" value="<?php $characterSheet->getcharacteristicInitiative();?>" min="0" max="10"
    required>

  <label for="characteristicHpMax">Pv maximaux:</label>
  <input type="number" id="characteristicHpMax" name="characteristicHpMax" value="<?php $characterSheet->getcharacteristicHpMax();?>" min="1" max="999" required>

  <label for="characteristicActualHp">Pv actuels:</label>
  <input type="number" id="characteristicActualHp" name="characteristicActualHp" value="<?php $characterSheet->getcharacteristicActualHp();?>" min="0" max="999" required>

  <label for="characteristicMpMax">Pm maximaux:</label>
  <input type="number" id="characteristicMpMax" name="characteristicMpMax" value="<?php $characterSheet->getcharacteristicMpMax();?>" min="1" max="999" required>

  <label for="characteristicActualMp">Pm actuels:</label>
  <input type="number" id="characteristicActualMp" name="characteristicActualMp" value="<?php $characterSheet->getcharacteristicActualMp();?>" min="0" max="999" required>

  <label for="characteristicStrength">Force (max 20):</label>
  <input type="number" id="characteristicStrength" name="characteristicStrength" value="<?php $characterSheet->getcharacteristicStrength();?>" min="0" max="20" required>

  <label for="characteristicDexterity">Dextérité (max 20):</label>
  <input type="number" id="characteristicDexterity" name="characteristicDexterity" value="<?php $characterSheet->getcharacteristicDexterity();?>" min="0" max="20" required>

  <label for="characteristicStamina">Constitution (max 20):</label>
  <input type="number" id="characteristicStamina" name="characteristicStamina" value="<?php $characterSheet->getcharacteristicStamina();?>" min="0" max="20" required>

  <label for="characteristicIntelligence">Intelligence (maximum 20):</label>
  <input type="number" id="characteristicIntelligence" name="characteristicIntelligence" value="<?php $characterSheet->getcharacteristicIntelligence();?>" min="0" max="20"
    required>

  <label for="characteristicWisdom">Sagesse (maxi 20):</label>
  <input type="number" id="characteristicWisdom" name="characteristicWisdom" value="<?php $characterSheet->getcharacteristicWisdom();?>" min="0" max="20" required>

  <label for="characteristicLuck">Chance (max 20):</label>
  <input type="number" id="characteristicLuck" name="characteristicLuck" value="<?php $characterSheet->getcharacteristicLuck();?>" min="0" max="20" required>




  <button type="submit" name="submit" value="Validez" class="btn btn-primary">Validez</button>
</form>
