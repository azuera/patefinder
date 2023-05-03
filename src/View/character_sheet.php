<?php


use Model\CharacterSheet;

$sqlCharacterSheet = "SELECT * FROM `character_sheet` WHERE character_sheet_id = 1";

$statementCharacterSheet = $connection->query($sqlCharacterSheet);

$statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

$result = $statementCharacterSheet->fetch();



// $statementCharacterSheet->execute();

// $statementCharacterSheet->setFetchMode(PDO::FETCH_CLASS, CharacterSheet::class);

// $result = $statementCharacterSheet->fetch();


var_dump($result);

?>