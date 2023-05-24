<?php
?>
<form action="" method="post">
    <div class="mb-3">
        <label for="equipementName" class="form-label">Nom de votre équipement</label>
        <input type="text" class="form-control" id="equipementName" name="equipementName"
            value="<?= $result->getEquipementName(); ?>">
    </div>
    <div class="mb-3">
        <label for="equipementDamage" class="form-label">Quels sont ses dégats</label>
        <input type="number" class="form-control" id="equipementDamage" name="equipementDamage"
            value="<?= $result->getEquipementDamage(); ?>">
    </div>
    <div class="mb-3">
        <label for="equipementRange" class="form-label">Quelle est la portée de votre équipement peux t'il
            toucher</label>
        <input type="number" class="form-control" id="equipementRange" name="equipementRange"
            value="<?= $result->getEquipementRange(); ?>">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>