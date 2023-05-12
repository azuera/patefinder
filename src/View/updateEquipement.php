<?php
use Model\Equipement;
$id = $_GET['index'];

$sqlEquipement = "SELECT * FROM equipement WHERE equipementId = :equipementId";
$statementEquipement=$connection->prepare($sqlEquipement);
$statementEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
$statementEquipement->execute();
$statementEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
$result = $statementEquipement->fetch();
var_dump($result);


if(!empty($_POST)){
    var_dump($_POST);
    var_dump($_GET);
    $equipement = new Equipement($_POST);

    $sql = "UPDATE `equipement` SET `equipementName` = :equipementName , `equipementDamage` = :equipementDamage, `equipementRange` = :equipementRange
    WHERE equipementId = :equipementId";
    $statementUpdateEquipement=$connection->prepare($sql);
    $statementUpdateEquipement->bindValue(':equipementName', $equipement->getEquipementName(), PDO::PARAM_STR);
    $statementUpdateEquipement->bindValue(':equipementDamage', $equipement->getEquipementDamage(), PDO::PARAM_INT);
    $statementUpdateEquipement->bindValue(':equipementRange', $equipement->getEquipementRange(), PDO::PARAM_INT);
    $statementUpdateEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
    $statementUpdateEquipement->execute();
    
    header("Location:?page=characterSheet&index=$id&update=success");
}
if (isset($_GET['update'])) {
    echo "L'equipement a bien été modifié";
}
?>
<form action="" method="post">
    <div class="mb-3">
        <label for="equipementName" class="form-label">Nom de vôtre équipement</label>
        <input type="text" class="form-control" id="equipementName" name="equipementName" value="<?= $result->getEquipementName();?>">
    </div>
    <div class="mb-3">
        <label for="equipementDamage" class="form-label">quels sont ces dégats</label>
        <input type="number" class="form-control" id="equipementDamage" name="equipementDamage" value="<?= $result->getEquipementDamage();?>">
    </div>
    <div class="mb-3">
        <label for="equipementRange" class="form-label">A quel distance votre équipement peux t'il toucher votre cible</label>
        <input type="number" class="form-control" id="equipementRange" name="equipementRange" value="<?= $result->getEquipementRange();?>" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


