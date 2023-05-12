<?php
$id = $_GET['index'];
$idSheet= $_GET['sheetId'];

$sqlDeleteEquipement = "DELETE FROM `equipement` WHERE equipementId = :equipementId";
$statementEquipement=$connection->prepare($sqlDeleteEquipement);
$statementEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
$statementEquipement->execute();
header("Location:?page=characterSheet&index=$idSheet");
?>