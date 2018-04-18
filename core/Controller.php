<?php
namespace core;

abstract class Controller
{
    protected $isSecured = 0;
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    abstract public function index();

    //this method should call View depends on demand
//    protected function renderView()
//    {
//        return new View();
//    }

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
        $this->renderView()::renderResultFromArray($r);
    }

    public function getSecuredStatus()
    {
        return $this->isSecured;
    }

}