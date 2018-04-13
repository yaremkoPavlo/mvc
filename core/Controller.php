<?php

namespace core;


abstract class Controller
{
    protected $view;
    protected $model;
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function index()
    {

    }
}