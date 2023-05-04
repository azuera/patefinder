<?php
var_dump($_POST);
if(!empty($_POST)){
$sqlCreateAccount='INSERT INTO userr (userrRole,userrName, userrEmail, userrPassword,userrProfilePicture, userrGender) 
                    VALUES (:userr_role,:userr_name,:userr_email,:userr_password,:userr_profile_picture,:userr_gender)';
$statementCreateAccount=$connection->prepare($sqlCreateAccount);
$statementCreateAccount->bindValue(":userr_role",$_POST['role'],PDO::PARAM_STR);
$statementCreateAccount->bindValue(":userr_name",$_POST['pseudo'],PDO::PARAM_STR);
$statementCreateAccount->bindValue(":userr_email",$_POST['email'],PDO::PARAM_STR);
$statementCreateAccount->bindValue(":userr_password",password_hash($_POST['password'],PASSWORD_BCRYPT),PDO::PARAM_STR);
$statementCreateAccount->bindValue(":userr_profile_picture",'https://picsum.photos/200',PDO::PARAM_STR);
$statementCreateAccount->bindValue(":userr_gender",$_POST['genre'],PDO::PARAM_STR);
$statementCreateAccount->execute();

}

?>
<form action="" method="post">
    <div>
        <select class="form-select" aria-label="Default select example" name="role">
            <option selected>choissiez votre role</option>
            <option value="1">MJ</option>
            <option value="2">joueur</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="pseudo" class="form-label">choisissez votre pseudo</label>
        <input type="texte" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label"> rentrez votre email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">choisissez votre mdp</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div>
        <select class="form-select" aria-label="Default select example" name="genre">
            <option selected>choissiez votre genre</option>
            <option value="1">homme</option>
            <option value="2">femme</option>
            <option value="3">non-genre</option>
        </select>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>