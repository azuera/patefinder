<?php









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
                    <?php echo $result->getCharacterSheetStatusLabel() ?>
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
                <p>Constitution :
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
                <a class="btn btn-secondary" href="?page=updateCharacterSheet&index=<?= $result->getCharacterSheetId();?>">
                Modifier votre personnage</a>
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
                        <a class="btn btn-primary"
                            href="?page=updateEquipement&index=<?= $equipementResult->getEquipementId(); ?>&sheetId=<?= $id ?>">Modifier
                            l'équipement</a>

                        <a class="btn btn-danger"
                            href="?page=deleteEquipement&index=<?= $equipementResult->getEquipementId(); ?>&sheetId=<?= $id ?>">Supprimer
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
                        <!-- update Skill -->
                        <a class="btn btn-primary"
                            href="?page=updateSkill&index=<?= $result->getCharacterSheetId(); ?>&skillId=<?= $skillResult->getSkillId(); ?>">modifier
                            le
                            skill</a>
                        <!-- delete -->
                        <a class="btn btn-danger" href="?page=characterSheet&index=<?= $result->getCharacterSheetId();
                        ?>&delete=<?= $skillResult->getSkillId(); ?>">Supprimer
                            le skill</a>
                    </div>
                </div>
            </div>
        <?php }
    }
}
?>