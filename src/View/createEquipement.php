<?php

use model\Equipement;
if(!empty($_POST)){
    $equipementName=trim($_POST['equipementName']);
    $equipementDamage=intval($_POST['equipementDamage']);
    $equipementRange=intval($_POST['equipementRange']);

    var_dump($_POST);
    $equipement=(new Equipement($_POST))
        ->setEquipementName($equipementName)
        ->setEquipementDamage($equipementDamage)
        ->setEquipementRange($equipementRange);

    $sql ="INSERT INTO `equipement`( `equipementName`, `equipementDamage`, `equipementRange`) 
        VALUES (:equipementName,:equipementDamage,:equipementRange)";
    $statementInsertEquipement=$connection->prepare($sql);
    $statementInsertEquipement->bindValue(':equipementName',$equipementName,PDO::PARAM_STR);
    $statementInsertEquipement->bindValue(':equipementDamage',$equipementDamage,PDO::PARAM_INT);
    $statementInsertEquipement->bindValue(':equipementRange',$equipementRange,PDO::PARAM_INT);
    $statementInsertEquipement->execute();

}
?>
<form action="" method="post">
    <div class="mb-3">
        <label for="equipementName" class="form-label">Nom de vôtre équipement</label>
        <input type="text" class="form-control" id="equipementName" name="equipementName">
    </div>
    <div class="mb-3">
        <label for="equipementDamage" class="form-label">quels sont ces dégats</label>
        <input type="number" class="form-control" id="equipementDamage" name="equipementDamage">
    </div>
    <div class="mb-3">
        <label for="equipementRange" class="form-label">A quel distance votre équipement peux t'il toucher votre cible</label>
        <input type="number" class="form-control" id="equipementRange" name="equipementRange">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
