<?php

use Model\User;

require_once 'autoload.php';
session_start();

require_once 'db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <title>Pâtefinder</title>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="?page=home">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                </li>


                <?php
                if (!empty($_SESSION['user']) && $_SESSION['user'] instanceof User) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=login">
                            <?php echo "bonjour " . $_SESSION['user']->getUserrName(); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout">logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=characterSheetList">Afficher la liste des personnages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=listGame">Afficher la liste des parties</a>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login">log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=createAccount">sign in</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
Ceci est un header

<body>