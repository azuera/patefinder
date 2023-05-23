<?php

use Model\Skill;


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