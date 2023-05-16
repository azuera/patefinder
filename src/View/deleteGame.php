<?php
$id = $_GET['index'];

$sqlUpdateCharactereSheet = "UPDATE `character_sheet` SET gameId = NULL WHERE gameId = :gameId";
$statementUpdateCharacterSheet=$connection->prepare($sqlUpdateCharactereSheet);
$statementUpdateCharacterSheet->bindValue(':gameId', $id, PDO::PARAM_INT);
$statementUpdateCharacterSheet->execute();



$sqlDeleteGame = "DELETE FROM `game` WHERE gameId = :gameId";
$statementDeleteGame=$connection->prepare($sqlDeleteGame);
$statementDeleteGame->bindValue(':gameId', $id, PDO::PARAM_INT);
$statementDeleteGame->execute();
header("Location:?page=listGame");
?>