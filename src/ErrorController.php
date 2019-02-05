<?php
namespace Core;


class ErrorController extends Controller
{
    public function index()
    {
        echo 'Page not found';
    }

    public function throwException(Array $params)
    {
        $message = $params['message'];
        $statusCode = $params['statusCode'] ?? 419;
        return new \Exception($message, $statusCode);
    }
}