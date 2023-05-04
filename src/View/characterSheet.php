<?php


use Model\CharacterSheet;

$sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE characterSheetId = 5";

$statementCharacterSheet = $connection->query($sqlCharacterSheet);

$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

$result = $statementCharacterSheet->fetch();



// $statementCharacterSheet->execute();

// $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

// $result = $statementCharacterSheet->fetch();


var_dump($result);

?>