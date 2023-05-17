<?php

use model\CharacterSheet;

$errors = [];
$userId = ($_SESSION['user'])->getUserrId();
$characterSheet = (new CharacterSheet($_POST))
  ->setUserrId($userId);

if (!empty($_POST)) {
  var_dump($_POST);

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
    $statement = $connection->prepare($sql);
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
    $id = $connection->lastInsertId();

    $sqlInsertCharacterSheetUser = "INSERT INTO `charactersheetuser` (`userrId`,`characterSheetId`) VALUES (:userrId, :characterSheetId)";
    $statementInsertCharacterSheetUser = $connection->prepare($sqlInsertCharacterSheetUser);
    $statementInsertCharacterSheetUser->bindValue(':userrId', $_SESSION['user']->getUserrId(), PDO::PARAM_INT);
    $statementInsertCharacterSheetUser->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
    $statementInsertCharacterSheetUser->execute();

    header("Location: ?page=characterSheet&index=$id");
  }
}


?>

<form method="post" action="">
  <div>
    <?php
    foreach ($errors as $error) {
      ?>
      <p class="alert alert-danger">
        <?php echo $error ?>
      </p>
      <?php
    } ?>
  </div>
  <label for="characterSheetName">Nom du personnage :</label>
  <input type="text" id="characterSheetName" name="characterSheetName"
    value="<?= $characterSheet->getcharacterSheetName() ?>" required>

  <label for="characterSheetClass">Classe du personnage :</label>
  <input type="text" id="characterSheetClass" name="characterSheetClass"
    value="<?= $characterSheet->getcharacterSheetClass() ?>" required>

  <label for="characterSheetRace">Race du personnage :</label>
  <input type="text" id="characterSheetRace" name="characterSheetRace"
    value="<?= $characterSheet->getcharacterSheetRace() ?>" required>

  <label for="characterSheetStatus">Statut du personnage :</label>
  <select name="characterSheetStatus" id="characterSheetStatus">
    <?php
    foreach (CharacterSheet::CHARACTER_SHEET_STATUS_LIST as $status) {
      ?>
      <option value="<?= $status ?>" <?php
        if ($characterSheet->getCharacterSheetStatus() == $status) {
          echo 'selected';
        } ?>>
        <?= $status; ?>
      </option>
      <?php
    }
    ?>
  </select>


  <h2>Characteristics</h2>

  <label for="characteristicInitiative">Initiative (max 10):</label>
  <input type="number" id="characteristicInitiative" name="characteristicInitiative"
    value="<?= $characterSheet->getcharacteristicInitiative() ?>">

  <label for="characteristicHpMax">Points de vie max:</label>
  <input type="number" id="characteristicHpMax" name="characteristicHpMax"
    value="<?= $characterSheet->getcharacteristicHpMax() ?>" min="1" max="999" required>

  <label for="characteristicActualHp">Points Actual:</label>
  <input type="number" id="characteristicActualHp" name="characteristicActualHp"
    value="<?= $characterSheet->getcharacteristicActualHp() ?>" min="0" max="999" required>

  <label for="characteristicMpMax">Magic Points Max:</label>
  <input type="number" id="characteristicMpMax" name="characteristicMpMax"
    value="<?= $characterSheet->getcharacteristicMpMax() ?>" min="1" max="999" required>

  <label for="characteristicActualMp">Magic Points Actual:</label>
  <input type="number" id="characteristicActualMp" name="characteristicActualMp"
    value="<?= $characterSheet->getcharacteristicActualMp() ?>" min="0" max="999" required>

  <label for="characteristicStrength">Strength (max 20):</label>
  <input type="number" id="characteristicStrength" name="characteristicStrength"
    value="<?= $characterSheet->getcharacteristicStrength() ?>" min="0" max="20" required>

  <label for="characteristicDexterity">Dexterity (max 20):</label>
  <input type="number" id="characteristicDexterity" name="characteristicDexterity"
    value="<?= $characterSheet->getcharacteristicDexterity() ?>" min="0" max="20" required>

  <label for="characteristicStamina">Constitution (max 20):</label>
  <input type="number" id="characteristicStamina" name="characteristicStamina"
    value="<?= $characterSheet->getcharacteristicStamina() ?>" min="0" max="20" required>

  <label for="characteristicIntelligence">Intelligence (maximum 20):</label>
  <input type="number" id="characteristicIntelligence" name="characteristicIntelligence"
    value="<?= $characterSheet->getcharacteristicIntelligence() ?>" min="0" max="20" required>

  <label for="characteristicWisdom">Wisdom (maxi 20):</label>
  <input type="number" id="characteristicWisdom" name="characteristicWisdom"
    value="<?= $characterSheet->getcharacteristicWisdom() ?>" min="0" max="20" required>

  <label for="characteristicLuck">Luck (max 20):</label>
  <input type="number" id="characteristicLuck" name="characteristicLuck"
    value="<?= $characterSheet->getcharacteristicLuck() ?>" min="0" max="20" required>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- <script>
    function validateForm() {
      let initiative = document.getElementById("initiative").value;
      if (initiative > 10) {
        alert("Initiative must be less than or equal to 10.");
        return false;
      }
    
      
      let characteristicHpMax = document.getElementById("characteristicHpMax").value;
      let characteristicActualHp = document.getElementById("characteristicActualHp").value;
      if (characteristicActualHp > characteristicHpMax) {
        alert("Current health points cannot exceed maximum health points.");
        return false;
      }
    
      
      let characteristicMpMax = document.getElementById("characteristicMpMax").value;
      let characteristicActualMp = document.getElementById("characteristicActualMp").value;
      if (characteristicActualMp > characteristicMpMaxs) {
        alert("Current magic points cannot exceed the maximum magic points.");
        return false;
      }
    
      
      let characteristicStrength = document.getElementById("strength").value;
      let characteristicDexterity = document.getElementById("characteristicDexterity").valcharacteristicStrengthue;
      let characteristicStamina = document.getElementById("characteristicStamina").value;
      let characteristicIntelligence = document.getElementById("characteristicIntelligence").value;
      let characteristicWisdom = document.getElementById("characteristicWisdom").value;
      let characteristicLuck = document.getElementById("characteristicLuck").value;
    
      if (characteristicStrength > 20 || characteristicDexterity > 20 || characteristicStamina > 20 || characteristicIntelligence > 20 || characteristicWisdom > 20 || characteristicLuck > 20) {
        alert("Characteristics cannot exceed 20.");
        return false;
      }
    
      let skills_level = document.getElementById("Skills_level").value;
      if (skills_level < 0 || skills_level > 5) {
        alert("The level of the skill must be between 0 and 5.");
        return false;
      }
    
      
      let equipement_range = document.getElementById("equipement_range").value;
      if (equipement_range< 0 || equipement_range > 5) {
        alert("The range of the equipment must be between 0 and 5.");
        return false;
      }
    
      return true
    }
    </script> -->