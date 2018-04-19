<?php
namespace core;


class View
{
    public function sayHello($person)
    {
        echo 'Hello ' . $person;
    }

    public function renderResultFromArray($result)
    {
        require_once 'views/table.php';
    }

    public function renderOnceRow($result)
    {
        require_once 'views/single.php';
    }

    public function renderMain()
    {
        require_once 'views/main.php';
    }

    public function err404()
    {
        require_once 'views/err404.php';
    }
}