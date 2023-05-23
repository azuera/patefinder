<?php

namespace Controller;

class LogoutController extends AbstractController
{

    public function getContent(): array
    {
        session_destroy();
        header('location: index.php?logout=success');
        return [];
    }

    public function getFileName(): string
    {
       return 'logout';
    }

    public function getPageTitle(): string
    {
        return 'deconnection';
    }
}