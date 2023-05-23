<?php

namespace Controller;

use Model\Skill;
use PDO;

class CreateSkillController extends AbstractController
{


    public function getContent(): array
    {
        $id = null;
        $skillLevel = null;
        $idCharacterSheet = null;
        $skillName= null;
        $skills=null;

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

            $statementInsertSkill = $this->connection->prepare($sql);
            $statementInsertSkill->bindValue(":skillName", $skillName, PDO::PARAM_STR);
            $statementInsertSkill->bindValue(":skillLevel", $skillLevel, PDO::PARAM_INT);
            $statementInsertSkill->bindValue(':idCharacterSheet', $idCharacterSheet, PDO::PARAM_INT);
            $statementInsertSkill->execute();

            header("Location:?page=characterSheet&index=$id");
        }
        return [
            'skill'=>$skills,
             "idCharacterSheet"=>$idCharacterSheet,
            'skillLevel'=>$skillLevel,
            'skillName'=>$skillName,
            'id'=>$id,
        ];
    }

    public function getFileName(): string
    {
        return 'createSkill';
    }

    public function getPageTitle(): string
    {
        return 'creez votre skill';
    }
}