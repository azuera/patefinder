<?php

use Model\Skill;



$id = intval($_GET['index']);
$skillId = intval(($_GET['skillId']));



$sqlSelectSkill = "SELECT * FROM `skill` 
WHERE idCharacterSheet = :idCharacterSheet";
$statementSelectSkill = $connection->prepare($sqlSelectSkill);
$statementSelectSkill->bindValue(':idCharacterSheet', $id, PDO::PARAM_INT);

$statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);

$statementSelectSkill->execute();

$results = $statementSelectSkill->fetchAll();

var_dump($results);

if (isset($_POST)) {
    var_dump($_POST);
}

if (!empty($_POST)) {
    $skillName = $_POST['skillName'];
    $skillLevel = $_POST['skillLevel'];

    $sqlUpdateSkill = "UPDATE skill SET skillName = :skillName, skillLevel = :skillLevel WHERE skillId = :skillId"; //ATTENTION PEUT ETRE PAS LE BON WHERE !
    $statementUpdateSkill = $connection->prepare($sqlUpdateSkill);
    $statementUpdateSkill->bindValue(':skillName', $skillName, PDO::PARAM_STR);
    $statementUpdateSkill->bindValue(':skillLevel', $skillLevel, PDO::PARAM_INT);
    $statementUpdateSkill->bindValue(':skillId', $skillId, PDO::PARAM_INT);
    $statementUpdateSkill->execute();
}
// var_dump($statementUpdateSkill);



foreach ($results as $result) {
    if (isset($id)) {
        ?>
        <form method="POST" action="">
            <label for="skillName">Nom de la compétence :</label>
            <input type="text" id="skillName" name="skillName" required value="<?php echo $result->getSkillName(); ?>">


            <!-- A faire en liant avec les charactersitiques (skaling) -->
            <!-- <label for="skillsId">Caractéristique associée :</label>
            <select id="skillsId" name="skillsId" required>
                <option value=0>Force</option>
                <option value=1>Dextérité</option>
                <option value=2>Endurance</option>
                <option value=3>Intelligence</option>
                <option value=4>Sagesse</option>
                <option value=5>Chance</option>
            </select> -->

            <label for="skillLevel">Niveau de la compétence :</label>
            <input type="number" id="skillLevel" name="skillLevel" min="0" max="5" required
                value="<?php echo $result->getSkillLevel(); ?>">

            <button class="btn btn-primary" type="submit">Envoyer</button>

        </form>
        <?php
    }
}
?>