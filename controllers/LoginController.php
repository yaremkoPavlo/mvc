<?php

namespace controllers;
use core\Controller;

class LoginController extends Controller
{

    public function indexAction()
    {
        $this->view->sayHello('User');
    }

    public function showAll()
    {
        //$arr = Model::getAllInformation($this);
        //$this->render($arr);
        //return $this;
    }

}