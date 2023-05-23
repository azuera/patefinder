<?php

namespace Controller;

use Model\Equipement;
use PDO;

class CreateEquipementController extends AbstractController
{

    public function getContent(): array
    {


        $errors = [];
        $idCharacterSheet = intval($_GET['index']);
        $equipement = (new Equipement($_POST))
            ->setIdCharacterSheet($idCharacterSheet);

        if (!empty($_POST)) {
            $id = $_GET['index'];

            if ($equipement->getEquipementName() == '') {
                $errors["equipementName"] = true;
            }
            if ($equipement->getEquipementDamage() == '' || $equipement->getEquipementDamage() < 0) {
                $errors["equipementDamage"] = true;
            }
            if ($equipement->getEquipementRange() == '' || $equipement->getEquipementRange() < 0 || $equipement->getEquipementRange() > 5) {
                $errors["equipementRange"] = true;
            }
            if (empty($errors)) {
                $sql = "INSERT INTO `equipement`( `equipementName`, `equipementDamage`, `equipementRange`, `idCharacterSheet`)
            VALUES (:equipementName,:equipementDamage,:equipementRange,:idCharacterSheet)";
                $statementInsertEquipement = $this->connection->prepare($sql);
                $statementInsertEquipement->bindValue(':equipementName', $equipement->getEquipementName(), PDO::PARAM_STR);
                $statementInsertEquipement->bindValue(':equipementDamage', $equipement->getEquipementDamage(), PDO::PARAM_INT);
                $statementInsertEquipement->bindValue(':equipementRange', $equipement->getEquipementRange(), PDO::PARAM_INT);
                $statementInsertEquipement->bindValue(':idCharacterSheet', $equipement->getIdCharacterSheet(), PDO::PARAM_INT);
                $statementInsertEquipement->execute();
                header("Location:?page=characterSheet&index=$id");
            }
        }
        return [
            'equipement'=>$equipement,
        ];
    }

    public function getFileName(): string
    {
        return 'createEquipement';
    }

    public function getPageTitle(): string
    {
        return 'cree un équipement';
    }
}