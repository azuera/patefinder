<?php

namespace Controller;

use Modele\Page;
use PDO;


abstract class AbstractController
{
    protected PDO $connection;
    protected Page $page;

    public function __construct(PDO $connection)
    {

        $this->connection = $connection;
    }

    public function render()
    {
        session_start();
        ob_start();



        $pageTitle = $this->getPageTitle();

        include_once 'includes/header.php';

        $viewParams = $this->getContent();
        extract($viewParams);
        include_once 'src/View/' . $this->getFileName() . '.php';

        include_once 'includes/footer.php';

        ob_end_flush();
    }

    abstract public function getContent(): array;

    abstract public function getFileName(): string;

    abstract public function getPageTitle(): string;

}