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

    public function dispatch($requestedUrl = null)
    {
        if ($requestedUrl === null) {
            $uri =explode('?', $_SERVER["REQUEST_URI"])[0];
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
        return $this->actionCall();
    }

    private function splitUrl($url)
    {
        $this->params = [];
        $arr = preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
        $this->controllerName = 'App\\Controllers\\' . ucfirst(array_shift($arr)) . 'Controller';
        $this->actionName = array_shift($arr);
        $this->params = $arr;
    }

    private function actionCall()
    {
        if(class_exists($this->controllerName))
        {
            $cc = new $this->controllerName();

            if(!method_exists($cc, $this->actionName))
            {
                $cc = new ErrorController();
                $this->params = ['className' => $this->controllerName,
                    'method' => $this->actionName,
                    'message' => 'Method not found'
                ];
                $this->actionName = 'throwException';
            }
        } else {
            $cc = new ErrorController();
            $this->actionName = 'throwException';
            $this->params = ['className' => $this->controllerName,
                             'message' => 'Class not found'
                ];
        }

        return call_user_func_array(array($cc, $this->actionName), $this->params);
    }
}