<?php

use Model\Skill;

if (!empty($_POST)) {
    $skillName = trim($_POST["skillName"]);
    $skillLevel = trim($_POST["skillLevel"]);

    $skills = (new Skill($_POST))
        ->setSkillName($skillName)
        ->setSkillLevel($skillLevel);

    var_dump($_POST);

    $sql = "INSERT INTO `skill`(`skillName`, `skillLevel`)
    VALUES (:skillName, :skillLevel)";

    $statementInsertSkill = $connection->prepare($sql);
    $statementInsertSkill->bindValue(":skillName", $skillName, PDO::PARAM_STR);
    $statementInsertSkill->bindValue(":skillLevel", $skillLevel, PDO::PARAM_INT);
    $statementInsertSkill->execute();
}
?>


<form method="post" action="">
    <label for="skillName">Nom de la compétence :</label>
    <input type="text" id="skillName" name="skillName" required>

    <label for="skillsId">Caractéristique associée :</label>
    <select id="skillsId" name="skillsId" required>
        <option value=0>Strength</option>
        <option value=1>Dexterity</option>
        <option value=2>Stamina</option>
        <option value=3>Intelligence</option>
        <option value=4>Wisdom</option>
        <option value=5>Luck</option>
    </select>

    <label for="skillLevel">Niveau de la compétence :</label>
    <input type="number" id="skillLevel" name="skillLevel" min="0" max="5" required>

    <button type="submit">Envoyer</button>

</form>