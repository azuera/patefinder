<?php

use Model\CharacterSheet;

var_dump($_POST);

$sqlCharacterSheet = "SELECT * FROM `character_sheet`";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$results = $statementCharacterSheet->fetchAll();




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
                <p>class :
                    <?php echo $result->getcharacterSheetClass() ?>
                </p>
            </div>
            <div class="characterName">
                <p>Status :
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