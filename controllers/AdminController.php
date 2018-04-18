<?php
namespace controllers;
use core\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $this->view->sayHello('admin');
    }

    protected function render($param)
    {
        // TODO: Implement render() method.
    }
}