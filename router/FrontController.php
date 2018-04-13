<?php

namespace router;


class FrontController
{
    private $router;
    public function __construct()
    {
        $this->router = new Router();

    }
//    protected function setController()
//    {
//        return $this;
//    }

    protected function parseUrl():array
    {
        return $this->router->parseUrl();
    }

    public function run()
    {
//        $nameController = $contrl . '_Controller'
//        $cc = new $nameController();
//        $cc-> nameAction($paramArray);
    }

}