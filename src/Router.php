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
    private static $params = [];

    /**
     * Default controller name
     */
    private static $controllerName = 'Main';


    /**
     * Default action name
     */
    private static $actionName = 'index';

    /**
     * void function for redirect
     * @param $where
     */
    public static function redirect($where)
    {
        if ($_SERVER['REQUEST_URI'] != $where) {
            header("Location: $where");
        }
    }

    /**
     * @var array
     */
    public static function setRoutes(array $route)
    {
        self::$routes = array_merge(self::$routes, $route);
    }

    public static function dispatch($requestedUrl = null)
    {
        if ($requestedUrl === null) {
            $uri =explode('?', $_SERVER["REQUEST_URI"])[0];
            $requestedUrl = urldecode(rtrim($uri, '/'));
        }

        if (isset(self::$routes[$requestedUrl])) {
           self::splitUrl(self::$routes[$requestedUrl]);
        } else {

            foreach (self::$routes as $route => $uri) {
                if (strpos($route, '${id}') !== false || strpos($route, '${any}') !== false) {
                    $route = str_replace('${any}', '(.+)', str_replace('${id}', '([0-9]+)', $route));
                }

                if (preg_match('#^' . $route . '$#', $requestedUrl)) {
                    if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                        $uri = preg_replace('#^' . $route . '$#', $uri, $requestedUrl);
                    }
                    self::splitUrl($uri);

                    break;
                }
            }
        }
        return self::actionCall();
    }

    private static function splitUrl($url)
    {
        static::$params = [];
        $arr = preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
        self::$controllerName = 'App\\Controllers\\' . ucfirst(array_shift($arr)) . 'Controller';
        self::$actionName = array_shift($arr);
        if (!empty($arr)) {
            self::$params = $arr;
        }
    }

    private static function actionCall()
    {
        if(class_exists(self::$controllerName))
        {
            $cc = new self::$controllerName();
        } else {
            $cc = new ErrorController();
            self::$actionName = 'throwException';
            self::$params = ['message' => "Class ".self::$controllerName." not found"];
        }
        return call_user_func([$cc, self::$actionName], self::$params);
    }
}