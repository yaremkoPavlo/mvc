<?php
namespace Core;


class ErrorController extends Controller
{
    public function index($args = [])
    {
        echo 'Page not found';
    }

    public function throwException($params)
    {
        $message = $params['message'];
        throw new \Exception($message);
    }
}