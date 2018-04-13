<?php

class Router
{
    private $paramArr;

    public function __construct()
    {
        $this->paramArr = [];
    }

    public function parseUrl():array
    {
        //default name of controller and action
        $controller_name = 'Login';
        $action_name = 'index';

        $param = [];

        //get url and parse to array
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //check available of
        if (!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }
        if (!empty($routes[2]))
        {
            $action_name = $routes[2];
        }

        $this->paramArr[0] = $controller_name;
        $this->paramArr[1] = $action_name;

        if (!empty($routes[3]))
        {
            $param = array_slice($routes, 3);
            $this->paramArr[] =  $param;
        }

        return $this->paramArr;
    }
}