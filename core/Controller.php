<?php

abstract class Controller
{
    protected $isSecured = 0;

    abstract public function index();

    //this method should call View depends on demand
    abstract protected function render($param);

    protected function getAuthenticationStatus()
    {
        require_once "config/AuthModule.php";
        $authModule = new AuthModule();
        $this->isSecured = $authModule->checkSecured();
        return $this;
    }

    public function read($paramArray)
    {
        $r = Model::getInform($paramArray, $this->isSecured);
        self::render($r);
    }

//    public function delete($paramArray)
//    {
//        return false;
//    }
//
//    protected function viewHelper()
//    {
//        require_once 'views/ViewHelper.php';
//
//        return new ViewHelper();
//    }
}