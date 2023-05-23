<?php

namespace Controller;

use Model\User;
use PDO;

class LoginController extends AbstractController
{

    public function getContent(): array
    {
        $errors = [];
        $password= null;
        $usermail= null;

        if (!empty($_POST)) {
            $usermail = trim($_POST['email_username']);
            $password = trim($_POST['password']);

            if (empty($usermail)) {
                $errors[] = "Entrez un Pseudo/ Email";
            }
            if (empty($password)) {
                $errors[] = "Mot de passe incorrect";
            }

            if (empty($errors)) {
                $sql = "SELECT * FROM userr WHERE userrEmail = :bddUserMail OR userrName= :bddUserMail";
                $statement = $this->connection->prepare($sql);
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
        return [
            'errors'=>$errors,
            'usermail'=>$usermail,
            'password'=>$password,

        ];
    }

    public function getFileName(): string
    {
       return 'login';
    }

    public function getPageTitle(): string
    {
       return 'Connection';
    }
}