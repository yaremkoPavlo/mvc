<?php
namespace controllers;
use core\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $this->view->sayHello('admin');
    }
}