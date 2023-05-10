<?php

use Model\Skill;

$sqlSkill = "SELECT * FROM `skill`";

$statementSkill = $connection->prepare($sqlSkill);
$statementSkill->execute();

$statementSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);

$results = $statementSkill->fetchAll();


var_dump($results);
foreach ($results as $key => $result) {
    if (isset($_SESSION['email_username'])) {
        ?>
        <section>
            <div class="characterName">
                <h3>Id de la compétence :
                    <?php echo $result->getSkillId() ?>
                </h3>
            </div>
            <div class="characterName">
                <h3>Nom de la compétence :
                    <?php echo $result->getSkillName() ?>
                </h3>
            </div>
            <div class="characterName">
                <p>Niveau de la compétence :
                    <?php echo $result->getSkillLevel() ?>
                </p>
            </div>
        </section>
        <a href="?pages=charactereSheetCart&index=<?= $result->getEquipementId() ?>" class="btn btn-primary">ajouter a votre
            feuille de perso</a>
        <?php
    }
}
?>