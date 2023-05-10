<?php


use Model\CharacterSheet;
use Model\Equipement;
use Model\Skill;


$id = intval($_GET['index']);


$sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE characterSheetId = :characterSheetId";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$results = $statementCharacterSheet->fetchAll();

if (isset($_GET)) {
    $sqlEquipement = "SELECT equipement.* FROM `equipement` 
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = equipement.idCharacterSheet
    WHERE idCharacterSheet = characterSheetId ";
    $statementSelectEquipement = $connection->query($sqlEquipement);
    $statementSelectEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
    $equipementResults = $statementSelectEquipement->fetchAll();


    $sqlSkill = "SELECT skill.* FROM `skill` 
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = skill.idCharacterSheet
    WHERE idCharacterSheet = characterSheetId ";
    $statementSelectSkill = $connection->query($sqlSkill);
    $statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);
    $skillResults = $statementSelectSkill->fetchall();
}


foreach ($results as $result) {
    if (isset($_SESSION['user'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Player's name :
                    <?= $_SESSION['user']->getUserrName(); ?>
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
            <a class="btn btn-primary" href="?page=createEquipement&index=<?= $result->getCharacterSheetId(); ?>">ajouter votre
                equipement</a>
        </section>
        <?php
    }

    // Affichage Equipment
    ?>
    <a class="btn btn-primary" href="?page=createEquipement&index=<?= $result->getCharacterSheetId(); ?>">ajouter un
        equipement</a>
    <?php
    if (empty($equipementResults)) {
        ?>
        <div>
            <p>pas d'équipement</p>
        </div>
        <?php
    } else {
        foreach ($equipementResults as $equipementResult) {
            ?>
            <div class="d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $equipementResult->getEquipementName(); ?>
                        </h5>
                        <p class="card-text">degats :
                            <?= $equipementResult->getEquipementDamage(); ?>
                        </p>
                        <p class="card-text">range :
                            <?= $equipementResult->getEquipementRange(); ?>
                        </p>

                    </div>
                </div>
            </div>
        <?php }
    }
    // Affichage Skill
    ?>
    <a class="btn btn-primary" href="?page=createSkill&index=<?= $result->getCharacterSheetId(); ?>">ajouter un
        skill</a>
    <?php
    if (empty($skillResults)) {
        ?>
        <div>
            <p>pas de skill</p>
        </div>
        <?php
    } else {
        foreach ($skillResults as $skillResult) {
            ?>
            <div class="d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $skillResult->getSkillName(); ?>
                        </h5>
                        <p class="card-text">Niveau :
                            <?= $skillResult->getSkillLevel(); ?>
                        </p>

                    </div>
                </div>
            </div>
        <?php }
    }
}
?>