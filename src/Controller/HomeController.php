<?php

namespace Controller;
class HomeController extends AbstractController
{

    public function getContent(): array
    {
        return [];
    }

    public function getFileName(): string
    {
        return 'home';
    }

    public function getPageTitle(): string
    {
       return 'bienvenue';
    }
}