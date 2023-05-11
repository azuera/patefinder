<?php

use Model\CharacterSheet;

$sqlCharacterSheet = "SELECT * FROM `character_sheet` 
INNER JOIN charactersheetuser ON character_sheet.characterSheetId = charactersheetuser.characterSheetId
WHERE userrId = :userId";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->bindValue(':userId', $_SESSION['user']->getUserrId());
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$results = $statementCharacterSheet->fetchAll();


?>
<a class="btn btn-primary" href="?page=createCharacterSheet"> Créer votre fiche de personnage</a>
<?php


foreach ($results as $result) {
    if (isset($_SESSION['user'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Nom du joueur :
                    <?= $_SESSION['user']->getUserrName(); ?>
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
            <a class="btn btn-primary" href="?page=characterSheet&index=<?= $result->getCharacterSheetId(); ?>">Voir plus</a>
            <?php
            var_dump($result->getCharacterSheetId());

    }
}
;
?>