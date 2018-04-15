<?php

class Model
{
    protected static function connectToDB()
    {
        return DBconfig::connect();
    }

    protected static function connectToDB_root()
    {
        return DBconfig::connectRoot();
    }



}