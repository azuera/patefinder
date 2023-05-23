<?php


?>
<form action="" method="post">
    <div>
        <?php if (!empty($errors["equipementName"])) {
            ?>
            <p class="alert alert-danger">Le nom de l'équipement ne peut pas être vide</p>
            <?php
        } ?>
        <?php if (!empty($errors["equipementDamage"])) {
            // Tu es un sorcier harry
            ?>
            <p class="alert alert-danger">Les dégâts ne peuvent pas être en dessous de 0</p>
            <?php
        } ?>
        <?php if (!empty($errors["equipementRange"])) {
            ?>
            <p class="alert alert-danger">La portée n'est pas comprise entre 0 et 5</p>
            <?php
        } ?>
    </div>
    <div class="mb-3">
        <label for="equipementName" class="form-label">Nom de vôtre équipement</label>
        <input type="text" class="form-control" id="equipementName" name="equipementName"
            value="<?= $equipement->getEquipementName() ?>">
    </div>
    <div class="mb-3">
        <label for="equipementDamage" class="form-label">quels sont ces dégats</label>
        <input type="number" class="form-control" id="equipementDamage" name="equipementDamage" min="0"
            value="<?= $equipement->getEquipementDamage() ?>">
    </div>
    <div class="mb-3">
        <label for="equipementRange" class="form-label">A quel distance votre équipement peux t'il toucher votre
            cible</label>
        <input type="number" class="form-control" id="equipementRange" name="equipementRange" min="0" max="5"
            value="<?= $equipement->getEquipementRange() ?>">
    </div>

    <button type=" submit" class="btn btn-primary">Submit</button>
</form>