<?php

use Model\Skill;

if (!empty($_POST)) {

    $id = $_GET['index'];

    $skillName = trim($_POST["skillName"]);
    $skillLevel = intval($_POST['skillLevel']);
    $idCharacterSheet = intval($_GET['index']);

    var_dump($_POST);
    var_dump($_GET);
    $skills = (new Skill($_POST))
        ->setSkillName($skillName)
        ->setSkillLevel($skillLevel)
        ->setIdCharacterSheet($idCharacterSheet);

    $sql = "INSERT INTO `skill`(`skillName`, `skillLevel`, `idCharacterSheet`)
    VALUES (:skillName, :skillLevel, :idCharacterSheet)";

    $statementInsertSkill = $connection->prepare($sql);
    $statementInsertSkill->bindValue(":skillName", $skillName, PDO::PARAM_STR);
    $statementInsertSkill->bindValue(":skillLevel", $skillLevel, PDO::PARAM_INT);
    $statementInsertSkill->bindValue(':idCharacterSheet', $idCharacterSheet, PDO::PARAM_INT);
    $statementInsertSkill->execute();

    header("Location:?page=characterSheet&index=$id");
}
?>


<form method="post" action="">
    <label for="skillName">Nom de la compétence :</label>
    <input type="text" id="skillName" name="skillName" required>

    <label for="skillsId">Caractéristique associée :</label>
    <select id="skillsId" name="skillsId" required>
        <option value=0>Force</option>
        <option value=1>Dexterité</option>
        <option value=2>Endurance</option>
        <option value=3>Intelligence</option>
        <option value=4>Sagesse</option>
        <option value=5>Chance</option>
    </select>

    <label for="skillLevel">Niveau de la compétence :</label>
    <input type="number" id="skillLevel" name="skillLevel" min="0" max="5" required>

    <button class="btn btn-primary" type="submit">Envoyer</button>

</form>