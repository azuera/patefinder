<?php

namespace Controller;

use PDO;

class CreateGameController extends AbstractController
{

    public function getContent(): array
    {
        if(!empty($_POST)){
            $nameOfTheGame=($_POST['nameOfGame']);
            $loreOfTheGame=($_POST['loreOfGame']);

            $sqlInsert="INSERT INTO `game`( `gameName`, `gameLore`, `userrId`) VALUES (:gameName,:gameLore, :userrId)";
            $statementInsertgame=$this->connection->prepare($sqlInsert);
            $statementInsertgame->bindValue(':gameName',$nameOfTheGame,PDO::PARAM_STR);
            $statementInsertgame->bindValue(':gameLore',$loreOfTheGame,PDO::PARAM_STR);
            $statementInsertgame->bindValue(':userrId',$_SESSION['user']->getUserrId(),PDO::PARAM_INT);
            $statementInsertgame->execute();
            header("location:?page=listGame");
        }
        return [

        ];
    }

    public function getFileName(): string
    {
        return 'createGame';
    }

    public function getPageTitle(): string
    {
       return 'creation de votre game';
    }
}