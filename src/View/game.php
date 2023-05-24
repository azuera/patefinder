






    <div>
        <h2><?php echo $resultGame->getGameName();?></h2>
        <p><?= $resultsUser?></p>
        <div><?php echo $resultGame->getGameLore();?></div>
    </div>



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
                <td><a class="btn btn-danger" href="?page=deleteCharactereFromList&indexCharacter=<?= $resultCharacterSheetSelect->getCharacterSheetId(); ?>&&index=<?= $resultCharacterSheetSelect->getGameId();?>">delete</a></td>
            </tr>

            <?php }            


        ?>
    </table>
</div>



