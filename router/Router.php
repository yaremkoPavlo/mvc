<?php

namespace router;


class Router
{
    const DEFAULT_CONTROLLER = 'Login';
    const DEFAULT_ACTION = 'index';

    private $paramArr;
    public function __construct()
    {
        $this->paramArr = [];
    }

    protected function getUrl()
    {
        $url = $_SERVER['PATH_INFO'];
        if (!isset($url)) {
            $url = self::DEFAULT_CONTROLLER . "/" . self::DEFAULT_ACTION;
        }

        return $url;
    }

    public function parseUrl():array
    {
        echo $this->getUrl();
        return $this->paramArr;
    }
}