<?php

namespace Controller;

use PDO;

class DeleteCharacterSheetController extends AbstractController
{
    public function getContent(): array
    {
        $id = $_GET['index'];

        $sqlDeleteCharacterSheet = "DELETE * FROM `character_sheet` WHERE characterSheetId = :characterSheetId";
        $statementCharacterSheet = $this->connection->prepare($sqlDeleteCharacterSheet);
        $statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementCharacterSheet->execute();
        header("Location:?page=characterSheet&index=$id");
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