<?php
namespace Core;


class Router
{
    /**
     * Associative array of routes
     * @var array
     */
    private static $routes = [];


    /**
     * Params for calling action
     * @var array
     */
    private $params = [];

    private $controllerName = 'Main';

    private $actionName = 'index';

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

    public function setRoutes(array $route)
    {
        self::$routes = array_merge(self::$routes, $route);
    }

    public function dispatch($requestedUrl = null)
    {
        if ($requestedUrl === null) {
            $uri = reset(explode('?', $_SERVER["REQUEST_URI"]));
            $requestedUrl = urldecode(rtrim($uri, '/'));
        }

        if (isset(self::$routes[$requestedUrl])) {
            $this->params = $this->splitUrl(self::$routes[$requestedUrl]);
        } else {

            foreach (self::$routes as $route => $uri) {
                if (strpos($route, ':') !== false) {
                    $route = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', $route));
                }

                if (preg_match('#^' . $route . '$#', $requestedUrl)) {
                    if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                        $uri = preg_replace('#^' . $route . '$#', $uri, $requestedUrl);
                    }
                    $this->params = $this->splitUrl($uri);

                    break;
                }
            }
        }
    }

    private function splitUrl($url)
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
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