<?php

namespace controllers;
use core\Controller;

class Err404 extends Controller
{
    public function indexAction()
    {
        $this->view->renderMain('err404');
    }
}