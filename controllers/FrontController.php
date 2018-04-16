<?php

require_once 'router/Router.php';

class FrontController
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

    }

    /**
     * call Router method
     * @return array
     */
    private function parseUri():array
    {

        return $this->router->parseUri();
    }

    public function run()
    {
        $paramArr = $this->parseUri();

        $nameController = ucfirst(array_shift($paramArr)) . '_Controller';
        $nameAction = array_shift($paramArr);

        //require controller class
        $controllerPath = "controllers/" . $nameController . ".php";

        //if controller file doesn't exist change controller to default controller
        // also can trow exception
        if(!file_exists($controllerPath))
        {
            $nameController = Constants::DEFAULT_CONTROLLER . '_Controller';
            $controllerPath = "controllers/".$nameController.".php";

        }
        require_once "$controllerPath";

        //create new controller
        $cc = new $nameController();
        if(method_exists($cc, $nameAction))
        {
            return call_user_func_array(array($cc, $nameAction), $paramArr);
            //$cc->$nameAction($paramArr);
        }
        else
        {
            //here can trow new exception, but we call default method index
            return $cc->index();
        }

    }

}