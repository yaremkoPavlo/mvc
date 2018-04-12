<?php

namespace app\controllers;


class FrontController
{
//    protected function setController()
//    {
//        return $this;
//    }

    protected function parseUrl()
    {
        $urlParamArray = Router::parseUrl();
    }


    public function run()
    {

    }

}