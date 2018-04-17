<?php
//namespace core;
require_once 'observer/Subject.php';
abstract class Controller extends Subject
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
        $r = Model::getInform($paramArray, $this);
        self::render($r);
    }

    public function getSecuredStatus()
    {
        return $this->isSecured;
    }

//    protected function viewHelper()
//    {
//        require_once 'views/ViewHelper.php';
//
//        return new ViewHelper();
//    }
}