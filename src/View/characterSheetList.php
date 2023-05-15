<?php

use Model\CharacterSheet;
use Model\User;
var_dump($_GET);
if(isset($_GET['gameindex'])){
    $indexgame=$_GET['gameindex'];
}

if (isset($_GET['indexperso'])){
    $indexperso=$_GET['indexperso'];


    $sqlUpdateCharactereSheet="UPDATE `character_sheet` SET `gameId`= :indexgame WHERE characterSheetId = :characterSheetId  ";
    $statementUpdateCharacterSheet = $connection->prepare($sqlUpdateCharactereSheet);
    $statementUpdateCharacterSheet->bindValue(':characterSheetId',$indexperso,PDO::PARAM_INT);
    $statementUpdateCharacterSheet->bindValue(':indexgame',$indexgame,PDO::PARAM_INT);
    $statementUpdateCharacterSheet->execute();
    var_dump($statementUpdateCharacterSheet);
}



$sqlCharacterSheet = "SELECT * FROM `character_sheet` ";
$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
$statementCharacterSheet->execute();
$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$results = $statementCharacterSheet->fetchAll();

//$sqlCharacterSheet = "SELECT * FROM `character_sheet`
//INNER JOIN charactersheetuser ON character_sheet.characterSheetId = charactersheetuser.characterSheetId";
//$statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
//$statementCharacterSheet->bindValue(':userId', $_SESSION['user']->getUserrId());
//$statementCharacterSheet->execute();
//$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
//$results = $statementCharacterSheet->fetchAll();
// requete a utiliser si un joueur est connecter et pas un MJ


?>
<a class="btn btn-primary" href="?page=createCharacterSheet"> Créer votre fiche de personnage</a>
<?php


foreach ($results as $result) {
    $sqlCharacterSheet = "SELECT  `userr`.userrName FROM `userr`
LEFT JOIN charactersheetuser ON charactersheetuser.userrId = userr.userrId
WHERE charactersheetuser.characterSheetId = :sheet_id
GROUP BY userr.userrId";

    $statementCharacterSheet = $connection->prepare($sqlCharacterSheet);

    $statementCharacterSheet->execute([
            ':sheet_id' => $result->getCharacterSheetId(),
    ]);
    $resultsUser = $statementCharacterSheet->fetchAll(PDO::FETCH_COLUMN);

    if (isset($_SESSION['user'])) {
        ?>
        <section>
            <div class="characterName">
                <h2>Nom du joueur :
                    <?php echo implode(', ', $resultsUser) ?>
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
        <?php if (isset($_GET['gameindex'])){ ?>
            <a class="btn btn-primary" href="?page=characterSheetList&gameindex=<?php echo $indexgame?>&&indexperso=<?=$result->getCharacterSheetId()?>">ajouter votre perso a une feuille de caractere</a>
            <?php } ?>
            <?php


    }
}
;
?>