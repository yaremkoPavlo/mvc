<?php
namespace Core;

// TODO: make render templates

class View
{
    public function sayHello($person)
    {
        echo 'Hello ' . $person;
    }

    public static function renderMain($view = null, $args = [])
    {
//        $viewPath = "views/" . $view . ".php";
//        if (file_exists($viewPath))
//        {
//            $param =  require_once($viewPath);
//        }
//        else
//        {
//            $param = require_once('views/err404.php');
//        }
//        require_once 'views/main.php';
    }
}