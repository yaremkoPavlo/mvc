<?php

class Login_Controller extends Controller
{
    public function index()
    {
        View::sayHello('User');
    }

    protected function render($param)
    {
        // TODO: Implement render() method.
        View::renderResultToArray($param);
    }

    public function showArray()
    {
        $arr = ['a'=> 'just', 'b' => 'test'];
        $this->render($arr);
        return $this;
    }
}