<?php
//namespace controllers;
//use core\Controller;

class Login_Controller extends Controller
{

    public function index()
    {
        View::sayHello('User');
    }

    protected function render($param)
    {
        // TODO: Implement render() method.
        View::renderResultFromArray($param);
    }

    public function showAll()
    {
        $arr = Model::getAllInformation($this);
        $this->render($arr);
        return $this;
    }

}