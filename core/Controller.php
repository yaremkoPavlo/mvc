<?php

abstract class Controller
{
    protected $isSecured = 0;
//    protected $view;
//    protected $model;
//    public function __construct()
//    {
//        $this->view = new View();
//        $this->model = new Model();
//    }

    abstract public function index($param);

    abstract public function render();

    protected function getAuthenticationStatus()
    {
        $authModule = new AuthModule();
        $this->isSecured = $authModule->checkSecured();
        return $this;
    }

    protected function viewHelper()
    {
        require_once 'views/ViewHelper.php';

        return new ViewHelper();
    }
}