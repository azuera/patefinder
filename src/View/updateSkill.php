<?php



if (isset($_GET['skillId'])) {
    ?>
    <form method="POST" action="">
        <label for="skillName">Nom de la compétence :</label>
        <input type="text" id="skillName" name="skillName" value="<?php echo $results->getSkillName(); ?>">

        <label for="skillLevel">Niveau de la compétence :</label>
        <input type="number" id="skillLevel" name="skillLevel" value="<?php echo $results->getSkillLevel(); ?>">

        <button class="btn btn-primary" type="submit">Envoyer</button>

    </form>
    <?php
}
?>