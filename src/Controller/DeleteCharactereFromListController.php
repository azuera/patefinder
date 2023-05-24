<?php

namespace Controller;

use PDO;

class DeleteCharactereFromListController extends AbstractController
{

    public function getContent(): array
    {
        $id=intval($_GET['index']);
        $indexcharacterSheet=intval($_GET['indexCharacter']);

        $sqlUpdateCharacterGameId="UPDATE `character_sheet` SET `gameId`= null WHERE characterSheetId=:indexCharacter;";
        $statementUpdateCharacterGameId=$this->connection->prepare($sqlUpdateCharacterGameId);
        $statementUpdateCharacterGameId->bindValue(":indexCharacter",$indexcharacterSheet,PDO::PARAM_INT);
        $statementUpdateCharacterGameId->execute();
        header("location:?page=game&index=$id");
        return [
            'id'=>$id,
            'indexcharacterSheet'=>$indexcharacterSheet,
        ];
    }

    public function getFileName(): string
    {
        return 'deleteCharactereFromList';
    }

    public function getPageTitle(): string
    {
       return "supression d'un charactere dans une partie";
    }
}