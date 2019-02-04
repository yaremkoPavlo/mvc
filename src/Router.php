<?php
namespace Core;


class Router
{
    /**
     * Associative array of routes
     * @var array
     */
    protected static $routes = [];


    /**
     * Params for calling action
     * @var array
     */
    protected $params = [];

    protected $controllerName = 'Main';

    protected $actionName = 'index';

//    public static function get($path, $action)
//    {
//
//    }
//
//    public static function post($path, $action)
//    {
//
//    }

    /**
     * @return array
     */
    public function getParams() : array
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getControllerName() : string
    {
        return "App\\Controllers\\" . $this->controllerName . "Controller";
    }

    /**
     * @return string
     */
    public function getActionName() : string
    {
        return $this->actionName;
    }


   /*
    private function getUri()
    {
        $routes = require_once __DIR__ . '../app/routes.php';
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($routes as $key => $value)
        {
            if (preg_match("~$key~", $uri))
            {
                $uri = $value;
                return $uri;
            }
        }

        return $uri;
    }

    public function parseUri()
    {
        //default name of controller and action
        $controller_name = "default";
        $action_name = "index";

        $uri = $this->getUri();
        $uri = explode('/', $uri);

        //check available of
        if (empty($uri[0]))
        {
             $uri[0] = $controller_name;
        }
        if (empty($uri[1]))
        {
            $uri[1] = $action_name;
        }

        return $uri;
    }
   */
}