<?php

namespace controllers;
use core\Controller;

class LoginController extends Controller
{

    public function index()
    {
        $this->view->sayHello('User');
    }

    protected function render($param)
    {
        // TODO: Implement render() method.
        //View::renderResultFromArray($param);
    }

    public function showAll()
    {
        //$arr = Model::getAllInformation($this);
        //$this->render($arr);
        //return $this;
    }

}