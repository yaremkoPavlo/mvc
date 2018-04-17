<?php
//namespace router;
//use config\Constants;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    /**
     * @@return array
     */
    private function getUri()
    {
        //get url and parse to array
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);
        return $uri;
    }

    /**
     * @return array
     */
    public function parseUri()
    {
        //default name of controller and action
        $controller_name = Constants::DEFAULT_CONTROLLER;
        $action_name = Constants::DEFAULT_ACTION;

        $routes = $this->getUri();

        //check available of
        if (empty($routes[0]))
        {
             $routes[0] = $controller_name;
        }
        if (empty($routes[1]))
        {
            $routes[1] = $action_name;
        }

        return $routes;
    }
}