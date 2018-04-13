<?php

require_once 'router/Router.php';

class FrontController
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

    }

    protected function parseUrl():array
    {
        return $this->router->parseUrl();
    }

    public function run()
    {
        $paramArr = $this->parseUrl();
        $nameController = $paramArr[0] . '_Controller';
        $nameAction = $paramArr[1];

        //require controller class
        $controllerPath = "controllers/" . $nameController . ".php";
        if(file_exists($controllerPath))
        {
            require_once "$controllerPath";
        }

        //create new controller
        $cc = new $nameController();
        if(method_exists($cc, $nameAction) && $nameAction != 'index')
        {
            $cc->$nameAction($paramArr[2]);
        }
        else
        {
            //here can trow new exception, but we call default method index
            $cc->index();
        }

    }

}