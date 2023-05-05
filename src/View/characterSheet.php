<?php


use Model\CharacterSheet;

$sqlCharacterSheet = "SELECT * FROM `character_sheet`";

// $statementCharacterSheet = $connection->query($sqlCharacterSheet);
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
// $statementCharacterSheet->bindValue(":characterSheetId", $characterSheetId, PDO::PARAM_INT);
$statementCharacterSheet->execute();

$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

$results = $statementCharacterSheet->fetchAll();


var_dump($results);
foreach ($results as $key => $result) {
    if (isset($_SESSION['email_username'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Player's name :
                    <?php echo $_SESSION['email_username'] ?>
                </h2>
            </div>
            <div class="characterName">
                <h3>Character's name :
                    <?php echo $result->getcharacterSheetName() ?>
                </h3>
            </div>
            <div class="characterName">
                <p>Race:
                    <?php echo $result->getcharacterSheetRace() ?>
                </p>
            </div>
            <div class="characterName">
                <p>class :
                    <?php echo $result->getcharacterSheetClass() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Status :
                    <?php echo $result->getcharacterSheetStatus() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Initiative:
                    <?php echo $result->getcharacteristicInitiative() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Hp max:
                    <?php echo $result->getcharacteristicHpMax() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Actual Hp:
                    <?php echo $result->getcharacteristicActualHp() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Mp max:
                    <?php echo $result->getcharacteristicMpMax() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Actual Mp:
                    <?php echo $result->getcharacteristicActualMp() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Strength:
                    <?php echo $result->getcharacteristicStrength() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Dexterity:
                    <?php echo $result->getcharacteristicDexterity() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Stamina:
                    <?php echo $result->getcharacteristicStamina() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Intelligence:
                    <?php echo $result->getcharacteristicIntelligence() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Wisdom:
                    <?php echo $result->getcharacteristicWisdom() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Luck:
                    <?php echo $result->getcharacteristicLuck() ?>
                </p>
            </div>
        </section>
        <?php
    }
    ?>

    <!--
characterSheetRace
characterSheetClass
characterSheetStatus
characteristicInitiative
characteristicHpMax
characteristicActualHp
characteristicMpMax
characteristicActualMp
characteristicStrength
characteristicDexterity
characteristicStamina
characteristicIntelligence
characteristicWisdom
characteristicLuck
     -->




    <?php
}
?>