<a class="btn btn-primary" href="?page=createGame"> Créer votre partie</a>
<?php
foreach ($resultsGame as $resultGame){
?>




    <div class="card" style="width: 18rem;">

    <div class="card-body">
        <h5 class="card-title"><?= $resultGame->getGameName() ;?></h5>
        <p><?= $resultsUser?></p>
        <a href="?page=game&index=<?php echo $resultGame->getGameId();?>" class="btn btn-primary">Voir détails</a>
        <a href="?page=deleteGame&index=<?= $resultGame->getGameId();?>" class="btn btn-danger">Supprimer la partie</a>
    </div>
</div>
<?php } ?>