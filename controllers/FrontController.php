<?php

namespace controllers;
use router\Router;

class FrontController
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

    }

    public function run()
    {
        $paramArr = $this->router->parseUri();

        $nameController = "controllers\\" . ucfirst(array_shift($paramArr)) . "Controller";
        $nameAction = array_shift($paramArr) . "Action";

        if(class_exists($nameController))
        {
            $cc = new $nameController();

            if(method_exists($cc, $nameAction))
            {
              return call_user_func_array(array($cc, $nameAction), $paramArr);
              //$cc->$nameAction($paramArr);
            }
            else
            {
              return $cc->indexAction();
            }
        }
        else
        {
            $cc = new Err404();
            return $cc->indexAction();
        }

    }

}