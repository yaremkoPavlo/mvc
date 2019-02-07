<?php
namespace Core;

abstract class Controller
{
    protected $isSecured = 0;

    /**
     * @var array
     */
    abstract public function index($arg = []);

    public function __call($name, $arg = [])
    {
        $method = $name . 'Action';
        if (method_exists($this, $method)) {
            call_user_func_array([$this, $method], $arg);
        }
    }

    public function getSecuredStatus()
    {
        return $this->isSecured;
    }

}