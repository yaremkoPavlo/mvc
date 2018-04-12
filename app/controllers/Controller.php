<?php

namespace app\controllers;
use views\View;

abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function action()
    {

    }
}