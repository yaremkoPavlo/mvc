<?php
namespace Core;


class View
{
    public function sayHello($person)
    {
        echo 'Hello ' . $person;
    }

//    public function renderMain($view)
//    {
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
//    }

}