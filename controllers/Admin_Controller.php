<?php

class Admin_Controller extends Controller
{
    public function index()
    {
        View::sayHello('admin');
    }

    protected function render($param)
    {
        // TODO: Implement render() method.
    }
}