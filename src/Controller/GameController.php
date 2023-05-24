<?php

namespace Controller;

use Model\CharacterSheet;
use Model\Game;
use PDO;

class GameController extends AbstractController
{

    public function getContent(): array
    {
        $id=intval($_GET['index']);

        $sqlSelect="SELECT * FROM `game` WHERE gameId= :gameId";
        $statementSelectGame=$this->connection->prepare($sqlSelect);
        $statementSelectGame->bindValue(':gameId',$id,PDO::PARAM_INT);
        $statementSelectGame->execute();
        $statementSelectGame->setFetchMode(PDO::FETCH_CLASS, Game::class);
        $resultsGame=$statementSelectGame->fetchAll();



        /* affichage des checkbox */
        $sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE gameId IS NULL;";
        $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
        $statementCharacterSheet->execute();
        $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

        $resultsSelect = $statementCharacterSheet->fetchAll();


        /* update des game id */
        if(!empty($_POST)){

            $chexbox=$_POST;
            array_walk($chexbox, function (&$value) {
                $value = intval($value);
            });
            $variable=implode(",",$chexbox);
            /* probleme avec le IN en sql qui ne marche pas avec un objet pdo ducoup on fait une verif
            avec aray_Walk qui parcours le tableau  et qui impose que les donne soit en int avec le intval*/

            $sqlCharacterSheetUpdateAll = "UPDATE `character_sheet` SET `gameId`= :indexgame WHERE characterSheetId IN ($variable) ; ";
            $statementCharacterSheetUpdate=$this->connection->prepare($sqlCharacterSheetUpdateAll);
            $statementCharacterSheetUpdate->bindValue(":indexgame",$id,PDO::PARAM_STR);
            $statementCharacterSheetUpdate->execute();
            header("location:?page=game&index=$id");



        }

        /* affichage cractere sheet*/
        $sqlCharacterSheetSelectAll = "SELECT * FROM `character_sheet` WHERE gameId=:indexgame ;";
        $statementCharacterSheetSelect=$this->connection->prepare($sqlCharacterSheetSelectAll);
        $statementCharacterSheetSelect->bindValue(":indexgame",$id,PDO::PARAM_INT);
        $statementCharacterSheetSelect->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
        $statementCharacterSheetSelect->execute();
        $resultsCharacterSheetSelect=$statementCharacterSheetSelect->fetchAll();





        foreach ($resultsGame as $resultGame){

            $sqlSelectUser = "SELECT `userr`.userrName FROM `userr`
    LEFT JOIN game ON game.userrId = userr.userrId
    WHERE game.gameId = :gameId" ;
            $statementSelectUser = $this->connection->prepare($sqlSelectUser);

            $statementSelectUser->execute([
                ':gameId' => $resultGame->getGameId(),
            ]);
            $resultsUser = $statementSelectUser->fetch(PDO::FETCH_COLUMN);
        }
        return [
            'resultsUser' => $resultsUser,
            'resultsCharacterSheetSelect' => $resultsCharacterSheetSelect,
            'resultsSelect' => $resultsSelect,
            'resultGame'=>$resultGame,
        ];
    }


    public function getFileName(): string
    {
        return 'game';
    }

    public function getPageTitle(): string
    {
        return 'mes games';
    }
}