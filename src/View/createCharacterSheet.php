<?php

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
    foreach ($characterSheetStatusList as $key => $status) {
      ?>
      <option value="<?= $key ?>" <?php
        if ($characterSheet->getCharacterSheetStatus() == $key) {
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
    value="<?= $characterSheet->getcharacteristicInitiative() ?>" min="0" max="10">
  <!-- min="0" max="10" -->

  <label for="characteristicHpMax">PV max:</label>
  <input type="number" id="characteristicHpMax" name="characteristicHpMax"
    value="<?= $characterSheet->getcharacteristicHpMax() ?>" min="1" max="999" required>

  <label for="characteristicActualHp">PV actuel:</label>
  <input type="number" id="characteristicActualHp" name="characteristicActualHp"
    value="<?= $characterSheet->getcharacteristicActualHp() ?>" min="0" max="999" required>

  <label for="characteristicMpMax">PM Max:</label>
  <input type="number" id="characteristicMpMax" name="characteristicMpMax"
    value="<?= $characterSheet->getcharacteristicMpMax() ?>" min="1" max="999" required>

  <label for="characteristicActualMp">PM actuel:</label>
  <input type="number" id="characteristicActualMp" name="characteristicActualMp"
    value="<?= $characterSheet->getcharacteristicActualMp() ?>" min="0" max="999" required>

  <label for="characteristicStrength">Force (max 20):</label>
  <input type="number" id="characteristicStrength" name="characteristicStrength"
    value="<?= $characterSheet->getcharacteristicStrength() ?>" min="0" max="20" required>

  <label for="characteristicDexterity">Dexterité (max 20):</label>
  <input type="number" id="characteristicDexterity" name="characteristicDexterity"
    value="<?= $characterSheet->getcharacteristicDexterity() ?>" min="0" max="20" required>

  <label for="characteristicStamina">Constitution (max 20):</label>
  <input type="number" id="characteristicStamina" name="characteristicStamina"
    value="<?= $characterSheet->getcharacteristicStamina() ?>" min="0" max="20" required>

  <label for="characteristicIntelligence">Intélligence (maximum 20):</label>
  <input type="number" id="characteristicIntelligence" name="characteristicIntelligence"
    value="<?= $characterSheet->getcharacteristicIntelligence() ?>" min="0" max="20" required>

  <label for="characteristicWisdom">Sagesse (maxi 20):</label>
  <input type="number" id="characteristicWisdom" name="characteristicWisdom"
    value="<?= $characterSheet->getcharacteristicWisdom() ?>" min="0" max="20" required>

  <label for="characteristicLuck">Chance (max 20):</label>
  <input type="number" id="characteristicLuck" name="characteristicLuck"
    value="<?= $characterSheet->getcharacteristicLuck() ?>" min="0" max="20" required>


  <p>Vous devrez avoir maximum 80 points et minmum 60 points.</p>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>