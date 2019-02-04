<?php

namespace App\Controllers;

use Core\Router;

class FrontController
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
        self::run();

    }

    public function run()
    {
        $params = $this->router->getParams();
        $controllerName = $this->router->getControllerName();
        $actionName = $this->router->getActionName();

        if(class_exists($controllerName))
        {
            $cc = new $controllerName();

            if(method_exists($cc, $actionName))
            {
              return call_user_func_array(array($cc, $actionName), $params);
            }
        }
        $cc = new Err404();
        return $cc->index();
    }

}