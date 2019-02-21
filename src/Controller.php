<?php
namespace Core;

abstract class Controller
{
    /**
     * @var array
     */
    abstract public function index();

    public function __call($name, $arg = [])
    {
        $method = $name . 'Action';
        if (method_exists($this, $method)) {
            call_user_func_array([$this, $method], $arg);
        }
    }

}