<?php
if (!empty($_POST)) {

  var_dump($_POST);

  $characterSheetName = trim($_POST["characterSheetName"]);
  $characterSheetClass = trim($_POST["characterSheetClass"]);
  $characterSheetRace = trim($_POST["characterSheetRace"]);
  $characterSheetStatus = trim($_POST["characterSheetStatus"]);

  $characteristicInitiative = intval($_POST["characteristicInitiative"]);
  $characteristicHpMax = intval($_POST["characteristicHpMax"]);
  $characteristicActualHp = intval($_POST["characteristicActualHp"]);
  $characteristicMpMax = intval($_POST["characteristicMpMax"]);
  $characteristicActualMp = intval($_POST["characteristicActualMp"]);
  $characteristicStrength = intval($_POST["characteristicStrength"]);
  $characteristicDexterity = intval($_POST["characteristicDexterity"]);
  $characteristicStamina = intval($_POST["characteristicStamina"]);
  $characteristicIntelligence = intval($_POST["characteristicIntelligence"]);
  $characteristicWisdom = intval($_POST["characteristicWisdom"]);
  $characteristicLuck = intval($_POST["characteristicLuck"]);

  // $skill_name = $_POST["skill_name"];
  // $Skills_charac = $_POST["Skills_charac"];
  // $skill_level = $_POST["skill_level"];

  // $equipement_name = $_POST["equipement_name"];
  // $equipement_damage = $_POST["equipement_damage"];
  // $equipement_range = $_POST["equipement_range"];



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






  // $sqlInsertSkill = "INSERT INTO skill (skill_name, skill_level) VALUES (:skill_name, :skill_level)";

  // $statementInsertSkill = $connection ->prepare($sqlInsertSkill);
  // $statementInsertSkill->bindValue(':skill_name', $skill_name, PDO::PARAM_STR);
  // $statementInsertSkill->bindValue(':skill_level', $skill_level, PDO::PARAM_INT);
  // $statementInsertSkill->execute();

  // $sqlInsertEquip = "INSERT INTO `equipement` (`equipement_id`, `equipement_name`, `equipement_damage`, `equipement_range`) VALUES (:equipement_name, :equipement_damage, :equipement_range)";

  // $statementInsertEquip = $connection ->prepare($sqlInsertEquip);

  // $statementInsertEquip->bindValue(':equipement_name', $equipement_name, PDO::PARAM_STR);
  // $statementInsertEquip->bindValue(':equipement_damage', $equipement_damage, PDO::PARAM_INT);
  // $statementInsertEquip->bindValue(':equipement_range', $equipement_range, PDO::PARAM_INT);

  // $statementInsertEquip->execute();
}


?>

<form method="post" action="">
  <label for="characterSheetName">Character's Name:</label>
  <input type="text" id="characterSheetName" name="characterSheetName" value="qsfdbqdb" required>

  <label for="characterSheetClass">Character's Class:</label>
  <input type="text" id="characterSheetClass" name="characterSheetClass" value="qsfdbqdb" required>

  <label for="characterSheetRace">Character's Race:</label>
  <input type="text" id="characterSheetRace" name="characterSheetRace" value="qsfdbqdb" required>

  <label for="characterSheetStatus">Character's Status:</label>
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

 
 
  
  <button type="submit" class="btn btn-primary" href="?page=characterSheet">Submit</button>
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