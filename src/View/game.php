<?php


use Model\CharacterSheet;
use Model\Game;
$id=intval($_GET['index']);

    $sqlSelect="SELECT * FROM `game` WHERE gameId= :gameId";
    $statementSelectGame=$connection->prepare($sqlSelect);
    $statementSelectGame->bindValue(':gameId',$id,PDO::PARAM_INT);
    $statementSelectGame->execute();
    $statementSelectGame->setFetchMode(PDO::FETCH_CLASS, Game::class);
    $resultsGame=$statementSelectGame->fetchAll();



/* affichage des checkbox */
    $sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE gameId IS NULL;";
    $statementCharacterSheet = $connection->prepare($sqlCharacterSheet);
    $statementCharacterSheet->execute();
    $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

    $resultsSelect = $statementCharacterSheet->fetchAll();


/* update des game id */
if(!empty($_POST)){

    $chexbox=$_POST;
    array_walk($chexbox, function (&$value) {
        $value = intval($value);
    });
    $variable=implode(",",$chexbox);
    /* probleme avec le IN en sql qui ne marche pas avec un objet pdo ducoup on fait une verif
    avec aray_Walk qui parcours le tableau  et qui impose que les donne soit en int avec le intval*/

    $sqlCharacterSheetUpdateAll = "UPDATE `character_sheet` SET `gameId`= :indexgame WHERE characterSheetId IN ($variable) ; ";
    $statementCharacterSheetUpdate=$connection->prepare($sqlCharacterSheetUpdateAll);
    $statementCharacterSheetUpdate->bindValue(":indexgame",$id,PDO::PARAM_STR);
    $statementCharacterSheetUpdate->execute();
    header("location:?page=game&index=$id");



}

/* affichage cractere sheet*/
$sqlCharacterSheetSelectAll = "SELECT * FROM `character_sheet` WHERE gameId=:indexgame ;";
$statementCharacterSheetSelect=$connection->prepare($sqlCharacterSheetSelectAll);
$statementCharacterSheetSelect->bindValue(":indexgame",$id,PDO::PARAM_INT);
$statementCharacterSheetSelect->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
$statementCharacterSheetSelect->execute();
$resultsCharacterSheetSelect=$statementCharacterSheetSelect->fetchAll();





foreach ($resultsGame as $resultGame){

    $sqlSelectUser = "SELECT `userr`.userrName FROM `userr`
    LEFT JOIN game ON game.userrId = userr.userrId
    WHERE game.gameId = :gameId" ;
    $statementSelectUser = $connection->prepare($sqlSelectUser);
    
    $statementSelectUser->execute([
            ':gameId' => $resultGame->getGameId(),
    ]);
    $resultsUser = $statementSelectUser->fetch(PDO::FETCH_COLUMN);
    var_dump($resultsUser);
    ?>
    <div>
        <h2><?php echo $resultGame->getGameName();?></h2>
        <p><?= $resultsUser?></p>
        <div><?php echo $resultGame->getGameLore();?></div>
    </div>


<?php } ?>
<form action="" method="post">

<?php  /** @var characterSheet $resultSelect */
foreach ($resultsSelect as $resultSelect){ ?>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="<?= $resultSelect->getCharacterSheetId();?>" value="<?= $resultSelect->getCharacterSheetId();?>">
    <label class="form-check-label" for="flexCheckDefault">
        <?= $resultSelect->getcharacterSheetName();?>

    </label>
        <a href="?page=characterSheet&index=<?= $resultSelect->getcharacterSheetId();?>">voir profil</a>
</div>
<?php }?>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
<div>
    <table class="table">
        <thead>
        <tr>
            <th>id</th>
            <th>nom joueur</th>
            <th>nom perso</th>
            <th>gameID</th>
            <th>Delete</th>
        </tr>
        </thead>
        <?php /** @var CharacterSheet $resultCharacterSheetSelect */

        foreach ($resultsCharacterSheetSelect as $resultCharacterSheetSelect){
            ?>
            <tr>
                <td><?= $resultCharacterSheetSelect->getCharacterSheetId();?></td>
                <td><?= $resultCharacterSheetSelect->getcharacterSheetName();?></td>
                <td><?= $resultCharacterSheetSelect->getcharacterSheetRace();?></td>
                <td><?= $resultCharacterSheetSelect->getGameId();?></td>
                <td><a class="btn btn-danger" href="?page=deleteCharatereFromList&indexCharacter=<?= $resultCharacterSheetSelect->getCharacterSheetId(); ?>&&index=<?= $resultCharacterSheetSelect->getGameId();?>">delete</a></td>
            </tr>

            <?php }            


        ?>
    </table>
</div>



