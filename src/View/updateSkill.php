<?php

use Model\Skill;



$id = intval($_GET['index']);
$skillId = intval(($_GET['skillId']));



$sqlSelectSkill = "SELECT * FROM `skill` 
WHERE skillId = :skillId";
$statementSelectSkill = $connection->prepare($sqlSelectSkill);
$statementSelectSkill->bindValue(':skillId', $skillId, PDO::PARAM_INT);

$statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);

$statementSelectSkill->execute();

$results = $statementSelectSkill->fetch();

// var_dump($results);

// if (isset($_POST)) {
//     var_dump($_POST);
// }

if (!empty($_POST)) {
    $errors = [];
    $skillName = trim($_POST['skillName']);
    $skillLevel = intval($_POST['skillLevel']);

    if (empty($skillName)) {
        $errors[] = "Veuillez entrer un nom de compétence";

    }
    if ($skillLevel == '' || $skillLevel > 5 || $skillLevel < 0) {
        $errors[] = "Veuillez entrer un niveau de compétence compris entre 0 et 5";

    }

    if (empty($errors)) {
        $sqlUpdateSkill = "UPDATE skill SET skillName = :skillName, skillLevel = :skillLevel WHERE skillId = :skillId";
        //ATTENTION PEUT ETRE PAS LE BON WHERE !
        $statementUpdateSkill = $connection->prepare($sqlUpdateSkill);
        $statementUpdateSkill->bindValue(':skillName', $skillName, PDO::PARAM_STR);
        $statementUpdateSkill->bindValue(':skillLevel', $skillLevel, PDO::PARAM_INT);
        $statementUpdateSkill->bindValue(':skillId', $skillId, PDO::PARAM_INT);
        $statementUpdateSkill->execute();
        header("Location:?page=characterSheet&index=$id&skillId=$skillId");
    } else {
        foreach ($errors as $error) {

            ?>
            <p class="alert alert-danger">
                <?= $error; ?>
            </p>
            <?php
        }
    }
}

// var_dump($statementUpdateSkill);



if (isset($skillId)) {
    ?>
    <form method="POST" action="">
        <label for="skillName">Nom de la compétence :</label>
        <input type="text" id="skillName" name="skillName" value="<?php echo $results->getSkillName(); ?>">


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
        <input type="number" id="skillLevel" name="skillLevel" value="<?php echo $results->getSkillLevel(); ?>">

        <button class="btn btn-primary" type="submit">Envoyer</button>

    </form>
    <?php
}
?>