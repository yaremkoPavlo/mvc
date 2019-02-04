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

    public function setRoutes(array $route)
    {
        self::$routes = array_merge(self::$routes, $route);
    }

    private function dispatch($requestedUrl = null)
    {
        if ($requestedUrl === null) {
            $uri = reset(explode('?', $_SERVER["REQUEST_URI"]));
            $requestedUrl = urldecode(rtrim($uri, '/'));
        }

        if (isset(self::$routes[$requestedUrl])) {
           $this->splitUrl(self::$routes[$requestedUrl]);
        } else {

            foreach (self::$routes as $route => $uri) {
                if (strpos($route, '${id}') !== false || strpos($route, '${any}') !== false) {
                    $route = str_replace('${any}', '(.+)', str_replace('${id}', '([0-9]+)', $route));
                }

                if (preg_match('#^' . $route . '$#', $requestedUrl)) {
                    if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                        $uri = preg_replace('#^' . $route . '$#', $uri, $requestedUrl);
                    }
                    $this->splitUrl($uri);

                    break;
                }
            }
        }
    }

    private function splitUrl($url)
    {
        $this->params = [];
        $arr = preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
        $this->controllerName = ucfirst(array_shift($arr));
        $this->actionName = array_shift($arr);
        $this->params = $arr;
    }

    public function run($requestedUrl = null)
    {
        $this->dispatch($requestedUrl);

        if(class_exists($this->controllerName))
        {
            $cc = new $this->controllerName();

            if(method_exists($cc, $this->actionName))
            {
                return call_user_func_array(array($cc, $this->actionName), $this->params);
            }
        }
        $cc = new Err404();
        return $cc->index();
    }
}