<a class="btn btn-primary" href="?page=createCharacterSheet"> Créer votre fiche de personnage</a>
<?php
foreach ($results as $result) {
    if (isset($_SESSION['user'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Nom du joueur :
                    <?php echo implode(', ', $resultsUser[$result->getCharacterSheetId()]) ?>
                </h2>
            </div>
            <div class="characterName">
                <h3>Nom du personnage :
                    <?php echo $result->getcharacterSheetName() ?>
                </h3>
            </div>
            <div class="characterName">
                <p>Classe du personnage :
                    <?php echo $result->getcharacterSheetClass() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Statut du personnage :
                    <?php echo $result->getcharacterSheetStatus() ?>
                </p>
            </div>
            <!-- Affichage delete characterSheet -->

            <a href="?page=deleteCharacterSheet&index=<?= $result->getCharacterSheetId(); ?>" class="btn btn-danger">Supprimer
                la
                fiche personnage</a>
            <a class="btn btn-primary" href="?page=characterSheet&index=<?= $result->getCharacterSheetId(); ?>">Voir plus</a>

            <?php


    }
}

;
?>