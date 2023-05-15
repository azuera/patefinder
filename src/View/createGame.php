<?php
if(!empty($_POST)){
    $nameOfTheGame=($_POST['nameOfGame']);
    $loreOfTheGame=($_POST['loreOfGame']);

    $sqlInsert="INSERT INTO `game`( `gameName`, `gameLore`) VALUES (:gameName,:gameLore)";
    $statementInsertgame=$connection->prepare($sqlInsert);
    $statementInsertgame->bindValue(':gameName',$nameOfTheGame,PDO::PARAM_STR);
    $statementInsertgame->bindValue(':gameLore',$loreOfTheGame,PDO::PARAM_STR);
    $statementInsertgame->execute();
}



?>
<form action="" method="post">

    <div class="mb-3">
        <label for="nameOfGame" class="form-label">choisissez votre nom de game</label>
        <input type="texte" class="form-control" id="nameOfGame" name="nameOfGame">
    </div>

    <div class="mb-3">
        <label for="loreOfGame" class="form-label">Ecrivez le lore de votre game</label>
        <input type="texte" class="form-control" id="loreOfGame" name="loreOfGame">
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>
