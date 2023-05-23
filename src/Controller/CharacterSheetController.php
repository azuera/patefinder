<?php

namespace Controller;

use Model\CharacterSheet;
use Model\Equipement;
use Model\Skill;
use Model\User;
use PDO;

class CharacterSheetController extends AbstractController
{

    public function getContent(): array
    {
        $id = intval($_GET['index']);


        $sqlCharacterSheet = "SELECT  `userr`.* FROM `userr`
LEFT JOIN charactersheetuser ON charactersheetuser.userrId = userr.userrId
LEFT JOIN character_sheet ON character_sheet.characterSheetId = charactersheetuser.characterSheetId
WHERE character_sheet.characterSheetId = :userName;";
        $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
        $statementCharacterSheet->bindValue(':userName', $id, PDO::PARAM_INT);
        $statementCharacterSheet->execute();
        $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, User::class);
        $resultsUser = $statementCharacterSheet->fetchAll();


        $sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE characterSheetId = :characterSheetId";
        $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
        $statementCharacterSheet->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
        $statementCharacterSheet->execute();
        $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
        $results = $statementCharacterSheet->fetchAll();

        if (isset($_GET)) {

            if (!empty($_GET['delete'])) {
                $sqlDeleteSkill = "DELETE FROM `skill` WHERE skillId = :skillId";
                $statementDeleteSkill = $this->connection->prepare($sqlDeleteSkill);
                $statementDeleteSkill->bindValue(':skillId', intval($_GET['delete']), PDO::PARAM_INT);
                $statementDeleteSkill->execute();
                header("Location:?page=characterSheet&index=$id");
            }

            $sqlEquipement = "SELECT equipement.* FROM `equipement`
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = equipement.idCharacterSheet
    WHERE idCharacterSheet = :characterSheetId ";
            $statementSelectEquipement = $this->connection->prepare($sqlEquipement);
            $statementSelectEquipement->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
            $statementSelectEquipement->execute();

            $statementSelectEquipement->setFetchMode(PDO::FETCH_CLASS, Equipement::class);
            $equipementResults = $statementSelectEquipement->fetchAll();


            $sqlSkill = "SELECT skill.* FROM `skill` 
    LEFT JOIN character_sheet ON character_sheet.characterSheetId = skill.idCharacterSheet
    WHERE idCharacterSheet = :characterSheetId ";

            $statementSelectSkill = $this->connection->prepare($sqlSkill);
            $statementSelectSkill->bindValue(':characterSheetId', $id, PDO::PARAM_INT);
            $statementSelectSkill->execute();

            $statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);
            $skillResults = $statementSelectSkill->fetchall();

        }

        if (isset($_GET['update'])) {
            echo "L'equipement a bien été modifié";
        }
        return [
            'skillResults'=>$skillResults,
            'equipementResults'=>$equipementResults,
            'results'=>$results,
            'resultsUser'=>$resultsUser,
            'id'=>$id,
        ];
    }

    public function getFileName(): string
    {
        return 'characterSheet';
    }

    public function getPageTitle(): string
    {
        return 'ma liste de perso';
    }
}