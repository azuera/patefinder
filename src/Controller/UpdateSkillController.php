<?php

namespace Controller;

use Model\Skill;
use PDO;

class UpdateSkillController extends AbstractController
{

    public function getContent(): array
    {
        $id = intval($_GET['index']);
        $skillId = intval(($_GET['skillId']));



        $sqlSelectSkill = "SELECT * FROM `skill` 
WHERE skillId = :skillId";
        $statementSelectSkill = $this->connection->prepare($sqlSelectSkill);
        $statementSelectSkill->bindValue(':skillId', $skillId, PDO::PARAM_INT);

        $statementSelectSkill->setFetchMode(PDO::FETCH_CLASS, Skill::class);

        $statementSelectSkill->execute();

        $results = $statementSelectSkill->fetch();


        if (!empty($_POST)) {
            $skillName = trim($_POST['skillName']);
            $skillLevel = intval($_POST['skillLevel']);
            $errors = [];

            if (empty($skillName)) {
                $errors[] = "Veuillez entrer un nom de compétence";

            }
            if ($skillLevel == '' || $skillLevel > 5 || $skillLevel < 0) {
                $errors[] = "Veuillez entrer un niveau de compétence compris entre 0 et 5";

            }

            if (empty($errors)) {
                $sqlUpdateSkill = "UPDATE skill SET skillName = :skillName, skillLevel = :skillLevel WHERE skillId = :skillId";
                //ATTENTION PEUT ETRE PAS LE BON WHERE !
                $statementUpdateSkill = $this->connection->prepare($sqlUpdateSkill);
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
        return [
            'results'=>$results,
            '$skillId'=>$skillId,
        ];
    }

    public function getFileName(): string
    {
        return 'updateSkill';
    }

    public function getPageTitle(): string
    {
       return 'modifiez votre compétence';
    }
}