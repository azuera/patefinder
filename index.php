<?php
use Controller\HomeController;

include 'includes/autoload.php';
include 'includes/db.inc.php';
include 'includes/pages.php';

$controller = HomeController::class;
if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
    $controller = $pages[$_GET['page']];
}

$current = new $controller($connection);
$current->render();
?>>