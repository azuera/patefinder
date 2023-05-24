<?php

namespace Controller;

use Model\Equipement;
use PDO;

class UpdateEquipementController extends AbstractController
{

    public function getContent(): array
    {
        $id = $_GET['index'];
        $sheetId = $_GET['sheetId'];

        $sqlEquipement = "SELECT * FROM equipement WHERE equipementId = :equipementId";
        $statementEquipement = $this->connection->prepare($sqlEquipement);
        $statementEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
        $statementEquipement->execute();
        $statementEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
        $result = $statementEquipement->fetch();



        if (!empty($_POST)) {

            $equipement = new Equipement($_POST);

            $sql = "UPDATE `equipement` SET `equipementName` = :equipementName , `equipementDamage` = :equipementDamage, `equipementRange` = :equipementRange
    WHERE equipementId = :equipementId";
            $statementUpdateEquipement = $this->connection->prepare($sql);
            $statementUpdateEquipement->bindValue(':equipementName', $equipement->getEquipementName(), PDO::PARAM_STR);
            $statementUpdateEquipement->bindValue(':equipementDamage', $equipement->getEquipementDamage(), PDO::PARAM_INT);
            $statementUpdateEquipement->bindValue(':equipementRange', $equipement->getEquipementRange(), PDO::PARAM_INT);
            $statementUpdateEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
            $statementUpdateEquipement->execute();

            header("Location:?page=characterSheet&index=$sheetId&update=success");
        }
       return [
           'result'=>$result,
           'id'=>$id,
           'sheetId'=>$sheetId,
       ];
    }

    public function getFileName(): string
    {
        return 'updateEquipement';
    }

    public function getPageTitle(): string
    {
        return 'modification equipement';
    }
}