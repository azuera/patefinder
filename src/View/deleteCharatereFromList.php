<?php
$id=intval($_GET['index']);
$indexcharacterSheet=intval($_GET['indexCharacter']);

$sqlUpdateCharacterGameId="UPDATE `character_sheet` SET `gameId`= null WHERE characterSheetId=:indexCharacter;";
$statementUpdateCharacterGameId=$connection->prepare($sqlUpdateCharacterGameId);
$statementUpdateCharacterGameId->bindValue(":indexCharacter",$indexcharacterSheet,PDO::PARAM_INT);
$statementUpdateCharacterGameId->execute();
header("location:?page=game&index=$id");