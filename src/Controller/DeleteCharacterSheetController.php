<?php

namespace Controller;

use PDO;

class DeleteCharacterSheetController extends AbstractController
{
    public function getContent(): array
    {
        $id = $_GET['index'];

        $sqlDeleteCharacterSheetUser = "DELETE FROM `charactersheetuser` WHERE characterSheetId = :characterSheetId";
        $statementDeleteCharacterSheetUser = $this->connection->prepare($sqlDeleteCharacterSheetUser);
        $statementDeleteCharacterSheetUser->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementDeleteCharacterSheetUser->execute();


        $sqlDeleteEquipement = "DELETE FROM `equipement` WHERE idCharacterSheet = :characterSheetId";
        $statementDeleteEquipement = $this->connection->prepare($sqlDeleteEquipement);
        $statementDeleteEquipement->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementDeleteEquipement->execute();

        $sqlDeleteSkill = "DELETE FROM `skill` WHERE idCharacterSheet = :characterSheetId";
        $statementDeleteSkill = $this->connection->prepare($sqlDeleteSkill);
        $statementDeleteSkill->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementDeleteSkill->execute();

        $sqlDeleteCharacterSheet = "DELETE FROM `character_sheet` WHERE characterSheetId = :characterSheetId";
        $statementDeleteCharacterSheet = $this->connection->prepare($sqlDeleteCharacterSheet);
        $statementDeleteCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementDeleteCharacterSheet->execute();

        header("Location:?page=characterSheetList");


        return [];

    }

    public function getFileName(): string
    {
        return 'deleteCharacterSheet';
    }

    public function getPageTitle(): string
    {
        return 'Supprimer une characterSheet';
    }
}


?>