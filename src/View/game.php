<?php


use Model\CharacterSheet;
use Model\game;
$id=intval($_GET['index']);

$sqlSelect="SELECT * FROM `game` WHERE gameId= :gameId";
$statementSelectGame=$connection->prepare($sqlSelect);
$statementSelectGame->bindValue(':gameId',$id,PDO::PARAM_INT);
$statementSelectGame->execute();
$statementSelectGame->setFetchMode(PDO::FETCH_CLASS, Game::class);
$resultsGame=$statementSelectGame->fetchAll();



    $sqlCharacterSheet = "SELECT * FROM `character_sheet`
WHERE character_sheet.gameId=:index;";
    $statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
    $statementCharacterSheet->bindValue(":index",$id);
    $statementCharacterSheet->execute();
    $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
    $results = $statementCharacterSheet->fetchAll();




foreach ($resultsGame as $resultGame){?>
    <div>
        <h2><?php echo $resultGame->getGameName() ;?></h2>
        <div><?php echo $resultGame->getGameLore() ;?></div>
    </div>

<?php } ?>

    <div>
        <table class="table">
            <tr>
                <thead>
                <th>id</th>
                <th>nom joueur</th>
                <th>nom perso</th>
                <th>gameID</th>
                </thead>
            </tr>
            <?php /** @var CharacterSheet $result */

            foreach ($results as $result){
                ?>
            <tr>
                <td><?= $result->getCharacterSheetId();?></td>
                <td><?= $result->getcharacterSheetName();?></td>
                <td><?= $result->getcharacterSheetRace();?></td>
                <td><?= $result->getGameId();?></td>
            </tr>

        <?php }

            ?>
        </table>
    </div>
<a class="btn btn-primary" href="?page=characterSheetList&gameindex=<?php echo $resultGame->getGameId();?>"> ajouter des personnages a votre partie</a>

