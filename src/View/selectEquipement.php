<?php
use Model\Equipement;

if (!empty($_GET)) {
    $sql = "SELECT `equipementId`, `equipementName`, `equipementDamage`, `equipementRange` FROM `equipement`";
    $statementSelectEquipement = $connection->query($sql);
    $statementSelectEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
    $results = $statementSelectEquipement->fetchall();

    foreach ($results as $result) {
        ?>
        <div class="d-flex">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $result->getEquipementName(); ?>
                    </h5>
                    <p class="card-text">degats :
                        <?= $result->getEquipementDamage(); ?>
                    </p>
                    <p class="card-text">range :
                        <?= $result->getEquipementRange(); ?>
                    </p>
                    <a href="?pages=charactereSheetCart&index=<?= $result->getEquipementId() ?>" class="btn btn-primary">ajouter
                        a votre feuille de perso</a>
                </div>
            </div>
        </div>



    <?php }
} ?>