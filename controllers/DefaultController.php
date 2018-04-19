<?php
namespace controllers;


use core\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->view->renderMain();
    }
}