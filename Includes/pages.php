<?php


use Controller\CharacterListController;
use Controller\CharacterSheetController;
use Controller\HomeController;
use Controller\ListGameController;
use Controller\LoginController;
use Controller\LogoutController;
use Controller\GameController;
use Controller\CreateEquipementController;
use Controller\UpdateEquipementController;
use Controller\DeleteEquipementController;
use Controller\UpdateSkillController;
use Controller\CreateSkillController;
use Controller\DeleteGameController;
use Controller\DeleteCharactereFromListController;
use Controller\CreateCharacterSheetController;

$pages = [

    'home' => HomeController::class,
    'listGame'=> ListGameController::class,
    'login'=> LoginController::class,
    'logout'=> LogoutController::class,
    'game'=> GameController::class,
    'characterSheet'=> CharacterSheetController::class,
    'characterSheetList'=> CharacterListController::class,
    'createEquipement'=>CreateEquipementController::class,
    'updateEquipement'=>UpdateEquipementController::class,
    'deleteEquipement'=>DeleteEquipementController::class,
    'updateSkill'=>UpdateSkillController::class,
    'createSkill'=>CreateSkillController::class,
    'deleteGame'=>DeleteGameController::class,
    'deleteCharactereFromList'=>DeleteCharactereFromListController::class,
    'createCharacterSheet'=>CreateCharacterSheetController::class,


];