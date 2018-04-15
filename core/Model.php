<?php

class Model
{
    protected static function connectToDB($isSecured)
    {
        if ($isSecured == 1)
        {
            return DBconfig::connectRoot();
        }
        else
        {
            return DBconfig::connect();
        }
    }


}