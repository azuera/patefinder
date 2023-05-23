<?php

namespace Controller;

use Model\Game;
use PDO;

class ListGameController extends AbstractController
{

    public function getContent(): array
    {
        $sqlSelect = "SELECT * FROM `game`";
        $statementSelectGame = $this->connection->prepare($sqlSelect);
        $statementSelectGame->execute();
        $statementSelectGame->setFetchMode(PDO::FETCH_CLASS, game::class);
        $resultsGame = $statementSelectGame->fetchAll();
        foreach ($resultsGame as $resultGame) {
            $sqlSelectUser = "SELECT `userr`.userrName FROM `userr`
                                LEFT JOIN game ON game.userrId = userr.userrId
                                WHERE game.gameId = :gameId";
            $statementSelectUser = $this->connection->prepare($sqlSelectUser);

            $statementSelectUser->execute([
                ':gameId' => $resultGame->getGameId(),
            ]);
            $resultsUser = $statementSelectUser->fetch(PDO::FETCH_COLUMN);

        }
        return [
            'resultsGame' => $resultsGame,
            'resultsUser' => $resultsUser,
        ];

    }

    public function getFileName(): string
    {
        return 'listGame';
    }

    public function getPageTitle(): string
    {
        return 'liste des games';
    }
}