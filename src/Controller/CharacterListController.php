<?php

namespace Controller;

use Model\CharacterSheet;
use PDO;

class CharacterListController extends AbstractController
{

    public function getContent(): array
    {
        $resultsUser = [];
        if ($_SESSION['user']->getUserrRole() == 2) {
            $sqlCharacterSheet = "SELECT * FROM `character_sheet`
            INNER JOIN charactersheetuser ON character_sheet.characterSheetId = charactersheetuser.characterSheetId
            WHERE charactersheetuser.userrId = :userId ";
            $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
            $statementCharacterSheet->bindValue(':userId', $_SESSION['user']->getUserrId());
            $statementCharacterSheet->execute();
            $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
            $results = $statementCharacterSheet->fetchAll();
        } else {
            $sqlCharacterSheet = "SELECT * FROM `character_sheet` ";
            $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);
            $statementCharacterSheet->execute();
            $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);
            $results = $statementCharacterSheet->fetchAll();
        }


        foreach ($results as $result) {
            $sqlCharacterSheet = "SELECT `userr`.userrName FROM `userr`
            LEFT JOIN charactersheetuser ON charactersheetuser.userrId = userr.userrId
            WHERE charactersheetuser.characterSheetId = :sheet_id
            GROUP BY userr.userrId";

            $statementCharacterSheet = $this->connection->prepare($sqlCharacterSheet);

            $statementCharacterSheet->execute([
                ':sheet_id' => $result->getCharacterSheetId(),
            ]);
            $resultsUser[$result->getCharacterSheetId()] = $statementCharacterSheet->fetchAll(PDO::FETCH_COLUMN);
        }
        return [
            'results' => $results,
            'resultsUser' => $resultsUser
        ];
    }

    public function getFileName(): string
    {
        return 'characterSheetLIst';
    }

    public function getPageTitle(): string
    {
        return 'ma liste de perso';
    }
}