<?php

namespace Controller;

use PDO;

class DeleteGameController extends AbstractController
{

    public function getContent(): array
    {
        $id = $_GET['index'];

        $sqlUpdateCharactereSheet = "UPDATE `character_sheet` SET gameId = NULL WHERE gameId = :gameId";
        $statementUpdateCharacterSheet=$this->connection->prepare($sqlUpdateCharactereSheet);
        $statementUpdateCharacterSheet->bindValue(':gameId', $id, PDO::PARAM_INT);
        $statementUpdateCharacterSheet->execute();



        $sqlDeleteGame = "DELETE FROM `game` WHERE gameId = :gameId";
        $statementDeleteGame=$this->connection->prepare($sqlDeleteGame);
        $statementDeleteGame->bindValue(':gameId', $id, PDO::PARAM_INT);
        $statementDeleteGame->execute();
        header("Location:?page=listGame");

        return [
            'id'=>$id,
        ];
    }

    public function getFileName(): string
    {
        return 'deleteGame';
    }

    public function getPageTitle(): string
    {
       return ' suppression de game';
    }
}