<?php

namespace Controller;

use PDO;

class DeleteEquipementController extends AbstractController
{

    public function getContent(): array
    {
        $id = $_GET['index'];
        $idSheet= $_GET['sheetId'];

        $sqlDeleteEquipement = "DELETE FROM `equipement` WHERE equipementId = :equipementId";
        $statementEquipement=$this->connection->prepare($sqlDeleteEquipement);
        $statementEquipement->bindValue(':equipementId', $id, PDO::PARAM_INT);
        $statementEquipement->execute();
        header("Location:?page=characterSheet&index=$idSheet");
        return [];
    }

    public function getFileName(): string
    {
       return 'deleteEquipement';
    }

    public function getPageTitle(): string
    {
        return 'supprimez votre équipement';
    }
}