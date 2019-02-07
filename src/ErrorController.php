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
        $statusCode = $params['statusCode'] ?? 419;
        throw new \Exception($message, $statusCode);
    }
}