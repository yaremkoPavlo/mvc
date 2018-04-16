<?php

class View
{
    public static function sayHello($person)
    {
        echo 'Hello ' . $person;
    }

    public static function renderResultToArray($result)
    {
        foreach ($result as $key => $value)
        {
            echo $key . " = ". $value;
        }
    }

    public static function renderOnceRow($row)
    {
        print_r($row);
    }
}