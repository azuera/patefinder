<?php


use Model\User;


if (!empty($_POST)) {
    $usermail = trim($_POST['email_username']);
    $password = trim($_POST['password']);
    $errors = [];
    if (empty($usermail)) {
        $errors[] = "Entrez un Pseudo/ Email";
    }
    if (empty($password)) {
        $errors[] = "Mot de passe incorrect";
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM userr WHERE userrEmail = :bddUserMail OR userrName= :bddUserMail";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':bddUserMail', $_POST['email_username'], PDO::PARAM_STR);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $statement->execute();
        $result = $statement->fetch();

        if (!$result) {
            ?>
            <p class="alert alert-danger">Utilisateur inconnu</p>
            <?php
        } else {
            $hash = $result->getUserrPassword();
            if (password_verify($_POST['password'], $hash)) {
                $_SESSION['user'] = $result;
                header('location:?page=home&login=success');
            } else {
                ?>
                <p class="alert alert-danger">Mot de passe incorrect</p>
                <?php
            }
        }




    } else {
        foreach ($errors as $error) {
            ?>
            <p class="alert alert-danger ">
                <?= $error; ?>
            </p>
            <?php
        }
    }
}

// && $bddUserMail == $usermail

?>
<form action="" method="post">
    <div class="mb-3">
        <label for="email_username" class="form-label">Mail ou Pseudo</label>
        <input type="text" class="form-control" id="email_username" name="email_username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>