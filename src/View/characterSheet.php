<?php


use Model\CharacterSheet;
use Model\Equipement;
use Model\Skill;
use Model\User;

// use Model\User;


$id = $_GET['index'];


$sqlCharacterSheet = "SELECT  `userr`.* FROM `userr`
LEFT JOIN charactersheetuser ON charactersheetuser.userrId = userr.userrId
LEFT JOIN character_sheet ON character_sheet.characterSheetId = charactersheetuser.characterSheetId
WHERE character_sheet.characterSheetId = :userName;";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->bindValue(':userName', $id, PDO::PARAM_INT);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, User::class);
$resultsUser = $statementCharacterSheet->fetchAll();


$sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE characterSheetId = :characterSheetId";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$results = $statementCharacterSheet->fetchAll();

if (isset($_GET)) {

    if (!empty($_GET['delete'])) {
        // echo "oui";
        $sqlDeleteSkill = "DELETE FROM `skill` WHERE skillId = :skillId";
        $statementDeleteSkill = $connection->prepare($sqlDeleteSkill);
        $statementDeleteSkill->bindValue(':skillId', $_GET['delete'], PDO::PARAM_INT);
        $statementDeleteSkill->execute();
        var_dump($_GET);
        header("Location:?page=characterSheet&index=$id");
    } else {
        echo "non";
    }

    $sqlEquipement = "SELECT equipement.* FROM `equipement`
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = equipement.idCharacterSheet
    WHERE idCharacterSheet = :characterSheetId ";
    $statementSelectEquipement = $connection->prepare($sqlEquipement);
    $statementSelectEquipement->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
    $statementSelectEquipement->execute();

    $statementSelectEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
    $equipementResults = $statementSelectEquipement->fetchAll();


    $sqlSkill = "SELECT skill.* FROM `skill` 
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = skill.idCharacterSheet
    WHERE idCharacterSheet = :characterSheetId ";

    $statementSelectSkill = $connection->prepare($sqlSkill);
    $statementSelectSkill->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
    $statementSelectSkill->execute();

    $statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);
    $skillResults = $statementSelectSkill->fetchall();

}

if (isset($_GET['update'])) {
    echo "L'equipement a bien été modifié";
}

foreach ($results as $result) {
    if (isset($_SESSION['user'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Nom du joueur :
                    <?php foreach ($resultsUser as $resultUser) {
                        echo $resultUser->getUserrName();
                    } ?>
                </h2>
            </div>
            <div class="characterName">
                <h3>Nom du personnage :
                    <?php echo $result->getcharacterSheetName() ?>
                </h3>
            </div>
            <div class="characterName">
                <p>Classe du personnage :
                    <?php echo $result->getcharacterSheetRace() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Race du personnage :
                    <?php echo $result->getcharacterSheetClass() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Statut du personnage :
                    <?php echo $result->getcharacterSheetStatus() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Initiative:
                    <?php echo $result->getcharacteristicInitiative() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Pv maximaux :
                    <?php echo $result->getcharacteristicHpMax() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Pv actuels :
                    <?php echo $result->getcharacteristicActualHp() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Pm maximaux :
                    <?php echo $result->getcharacteristicMpMax() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Pm actuels :
                    <?php echo $result->getcharacteristicActualMp() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Force :
                    <?php echo $result->getcharacteristicStrength() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Dextérité :
                    <?php echo $result->getcharacteristicDexterity() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Endurance :
                    <?php echo $result->getcharacteristicStamina() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Intelligence :
                    <?php echo $result->getcharacteristicIntelligence() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Sagesse :
                    <?php echo $result->getcharacteristicWisdom() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Chance :
                    <?php echo $result->getcharacteristicLuck() ?>
                </p>
            </div>
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
                        <p class="card-text">Dégâts :
                            <?= $equipementResult->getEquipementDamage(); ?>
                        </p>
                        <p class="card-text">Portée :
                            <?= $equipementResult->getEquipementRange(); ?>
                        </p>
                        <a class="btn btn-danger"
                            href="?page=deleteEquipement&index=<?= $equipementResult->getEquipementId(); ?>&sheetId=<?= $id ?>">Supprimer
                            l'équipement</a>

                        <a class="btn btn-primary"
                            href="?page=updateEquipement&index=<?= $equipementResult->getEquipementId(); ?>&sheetId=<?= $id ?>">Modifier
                            l'équipement</a>
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
        /** @var Skill $skillResult */
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
                        <a class="btn btn-primary" href="?page=updateSkill&index=<?= $result->getCharacterSheetId(); ?>">modifié le
                            skill</a>
                        <!-- delete -->
                        <a class="btn btn-primary"
                            href="?page=charactersheet&index=<?= $result->getCharacterSheetId(); ?>&delete=<?= $skillResult->getSkillId(); ?>">Supprimé
                            le skill</a>
                    </div>
                </div>
            </div>
        <?php }
    }
}
?>