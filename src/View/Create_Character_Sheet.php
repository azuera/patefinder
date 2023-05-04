<?php
if (!empty($_POST)) {
  $characterSheetName = trim($_POST["character_sheet_name"]);
  $characterSheetClass = trim($_POST["character_sheet_class"]);
  $characterSheetRace = trim($_POST["character_sheet_race"]);
  $characterSheetStatus = trim($_POST["character_sheet_status"]);

  $characteristicInitiative = intval($_POST["characteristic_initiative"]);
  $characteristicHpMax = intval($_POST["characteristic_hp_max"]);
  $characteristicActualHp = intval($_POST["characteristic_actual_hp"]);
  $characteristicMpMax = intval($_POST["characteristic_mp_max"]);
  $characteristicActualMp = intval($_POST["characteristic_actual_mp"]);
  $characteristicStrength = intval($_POST["characteristic_strength"]);
  $characteristicDexterity = intval($_POST["characteristic_dexterity"]);
  $characteristicStamina = intval($_POST["characteristic_stamina"]);
  $characteristicIntelligence = intval($_POST["characteristic_intelligence"]);
  $characteristicWisdom = intval($_POST["characteristic_wisdom"]);
  $characteristicLuck = intval($_POST["characteristic_luck"]);

  // $skill_name = $_POST["skill_name"];
  // $Skills_charac = $_POST["Skills_charac"];
  // $skill_level = $_POST["skill_level"];

  // $equipement_name = $_POST["equipement_name"];
  // $equipement_damage = $_POST["equipement_damage"];
  // $equipement_range = $_POST["equipement_range"];
  


  $sql = 'INSERT INTO character_sheet (character_sheet_name, character_sheet_status, character_sheet_race, character_sheet_class, characteristic_initiative, characteristic_hp_max, characteristic_actual_hp, characteristic_mp_max, characteristic_actual_mp, characteristic_strength, characteristic_dexterity, characteristic_stamina, characteristic_intelligence, characteristic_wisdom, characteristic_luck) VALUES (:character_sheet_name, :character_sheet_status, :character_sheet_race, :character_sheet_class, :characteristic_initiative, :characteristic_hp_max, :characteristic_actual_hp, :characteristic_mp_max, :characteristic_actual_mp, :characteristic_strength, :characteristic_dexterity, :characteristic_stamina, :characteristic_intelligence, :characteristic_wisdom, :characteristic_luck)';
  $statement = $connection ->prepare($sql);
  $statement->bindValue(':character_sheet_name',$characterSheetName, PDO::PARAM_STR);
  $statement->bindValue(':character_sheet_status',$characterSheetStatus, PDO::PARAM_STR);
  $statement->bindValue(':character_sheet_race',$characterSheetRace, PDO::PARAM_STR);
  $statement->bindValue(':character_sheet_class',$characterSheetClass, PDO::PARAM_STR);
  $statement->bindValue(':characteristic_initiative',$characteristicInitiative, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_hp_max',$characteristicHpMax, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_actual_hp',$characteristicActualHp, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_mp_max',$characteristicMpMax, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_actual_mp',$characteristicActualMp, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_strength',$characteristicStrength, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_dexterity',$characteristicDexterity, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_stamina',$characteristicStamina, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_intelligence',$characteristicIntelligence, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_wisdom',$characteristicWisdom, PDO::PARAM_INT);
  $statement->bindValue(':characteristic_luck',$characteristicLuck, PDO::PARAM_INT);
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
      <label for="character_sheet_name">Character's Name:</label>
      <input type="text" id="character_sheet_name" name="character_sheet_name" value="qsfdbqdb" required>

      <label for="character_sheet_class">Character's Class:</label>
      <input type="text" id="character_sheet_class" name="character_sheet_class" value="qsfdbqdb" required>

      <label for="character_sheet_race">Character's Race:</label>
      <input type="text" id="character_sheet_race" name="character_sheet_race" value="qsfdbqdb" required>

      <label for="character_sheet_status">Character's Status:</label>
      <select name="character_sheet_status" id="character_sheet_status">
        <option value= 0>Ally</option>
        <option value= 1>Enemy</option>
        <option value= 2>Neutral</option>
      </select>
      
    
      <h2>Characteristics</h2>
    
      <label for="characteristic_initiative">Initiative (max 10):</label>
      <input type="number" id="characteristic_initiative" name="characteristic_initiative" value="1" min="0" max="10" required>
    
      <label for="characteristic_hp_max">Health Points Max:</label>
      <input type="number" id="characteristic_hp_max" name="characteristic_hp_max" value="1" min="1" max="999" required>
    
      <label for="characteristic_actual_hp">Health Points Actual:</label>
      <input type="number" id="characteristic_actual_hp" name="characteristic_actual_hp" value="1" min="0" max="999" required>
    
      <label for="characteristic_mp_max">Magic Points Max:</label>
      <input type="number" id="characteristic_mp_max" name="characteristic_mp_max" value="1" min="1" max="999" required>
    
      <label for="characteristic_actual_mp">Magic Points Actual:</label>
      <input type="number" id="characteristic_actual_mp" name="characteristic_actual_mp" value="1" min="0" max="999" required>
    
      <label for="characteristic_strength">Strength (max 20):</label>
      <input type="number" id="characteristic_strength" name="characteristic_strength" value="1" min="0" max="20" required>
    
      <label for="characteristic_dexterity">Dexterity (max 20):</label>
      <input type="number" id="characteristic_dexterity" name="characteristic_dexterity" value="1" min="0" max="20" required>
    
      <label for="characteristic_stamina">Stamina (max 20):</label>
      <input type="number" id="characteristic_stamina" name="characteristic_stamina" value="1" min="0" max="20" required>
    
      <label for="characteristic_intelligence">Intelligence (maximum 20):</label>
      <input type="number" id="characteristic_intelligence" name="characteristic_intelligence" value="1" min="0" max="20" required>
    
      <label for="characteristic_wisdom">Wisdom (maxi 20):</label>
      <input type="number" id="characteristic_wisdom" name="characteristic_wisdom" value="1" min="0" max="20" required>
    
      <label for="characteristic_luck">Luck (max 20):</label>
      <input type="number" id="characteristic_luck" name="characteristic_luck" value="1" min="0" max="20" required>
    
      <!-- <h2>Skills</h2>
    
      <label for="skill_name">Name:</label>
      <input type="text" id="skill_name" name="skill_name" value="qsfdbqdb" required>
    
      <label for="skill_id">Associated Characteristic:</label>
      <select id="skill_id" name="skill_id" required>
        <option value=0>Strength</option>
        <option value=1>Dexterity</option>
        <option value=2>Stamina</option>
        <option value=3>Intelligence</option>
        <option value=4>Wisdom</option>
        <option value=5>Luck</option>
      </select> 
    
      <label for="skill_level">Skill's level</label>
      <input type="number" id="skill_level" name="skill_level" value="1" min="0" max="5" required>
    
      <h2>Equipments</h2>

      <label for="equipement_name">Name:</label>
      <input type="text" id="equipement_name" name="equipement_name" value="qsfdbqdb" required>
    
      <label for="equipement_damage">Damage:</label>
      <input type="number" id="equipement_damage" name="equipement_damage" value="1" min="0" required>
    
      <label for="equipement_range">Range:</label>
      <input type="number" id="equipement_range" name="equipement_range" value="1" min="0" max="5" required>
     -->
      <br><br>
      <input type="submit" value="Save">
    </form>
    
    <!-- <script>
    function validateForm() {
      let initiative = document.getElementById("initiative").value;
      if (initiative > 10) {
        alert("Initiative must be less than or equal to 10.");
        return false;
      }
    
      
      let characteristic_hp_max = document.getElementById("characteristic_hp_max").value;
      let characteristic_actual_hp = document.getElementById("characteristic_actual_hp").value;
      if (characteristic_actual_hp > characteristic_hp_max) {
        alert("Current health points cannot exceed maximum health points.");
        return false;
      }
    
      
      let characteristic_mp_max = document.getElementById("characteristic_mp_max").value;
      let characteristic_actual_mp = document.getElementById("characteristic_actual_mp").value;
      if (characteristic_actual_mp > characteristic_mp_maxs) {
        alert("Current magic points cannot exceed the maximum magic points.");
        return false;
      }
    
      
      let characteristic_strength = document.getElementById("strength").value;
      let characteristic_dexterity = document.getElementById("characteristic_dexterity").valcharacteristic_strengthue;
      let characteristic_stamina = document.getElementById("characteristic_stamina").value;
      let characteristic_intelligence = document.getElementById("characteristic_intelligence").value;
      let characteristic_wisdom = document.getElementById("characteristic_wisdom").value;
      let characteristic_luck = document.getElementById("characteristic_luck").value;
    
      if (characteristic_strength > 20 || characteristic_dexterity > 20 || characteristic_stamina > 20 || characteristic_intelligence > 20 || characteristic_wisdom > 20 || characteristic_luck > 20) {
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