<?php
namespace core;


class View
{
    public function sayHello($person)
    {
        echo 'Hello ' . $person;
    }

    public static function renderResultFromArray($result)
    {
        require_once 'views/table.php';
    }

    public static function renderOnceRow($result)
    {
        require_once 'views/single.php';
    }
}