<?php

namespace Controller;

use PDO;

class CreateAccountController extends AbstractController
{

    public function getContent(): array
    {
        if (!empty($_POST)) {
            $sqlCreateAccount = 'INSERT INTO userr (userrRole, userrName, userrEmail, userrPassword, userrProfilePicture, userrGender) 
                    VALUES (:userrRole, :userrName, :userrEmail, :userrPassword, :userrProfilePicture, :userrGender)';
            $statementCreateAccount = $this->connection->prepare($sqlCreateAccount);
            $statementCreateAccount->bindValue(":userrRole", $_POST['role'], PDO::PARAM_INT);
            $statementCreateAccount->bindValue(":userrName", $_POST['pseudo'], PDO::PARAM_STR);
            $statementCreateAccount->bindValue(":userrEmail", $_POST['email'], PDO::PARAM_STR);
            $statementCreateAccount->bindValue(":userrPassword", password_hash($_POST['password'], PASSWORD_BCRYPT), PDO::PARAM_STR);
            $statementCreateAccount->bindValue(":userrProfilePicture", 'https://picsum.photos/200', PDO::PARAM_STR);
            $statementCreateAccount->bindValue(":userrGender", $_POST['genre'], PDO::PARAM_INT);
            $statementCreateAccount->execute();

            header('Location: ?page=login');

        }
        return [];
    }

    public function getFileName(): string
    {
        return 'createAccount';
    }

    public function getPageTitle(): string
    {
        return 'enregistrez-vous';
    }
}