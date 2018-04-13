<?php

abstract class Controller
{
//    protected $view;
//    protected $model;
//    public function __construct()
//    {
//        $this->view = new View();
//        $this->model = new Model();
//    }

    public function index()
    {
        echo 'index';
    }

    protected function viewHelper()
    {
        require_once 'views/ViewHelper.php';

        return new ViewHelper();
    }
}