<?php

class DBconfig
{

    private static function getConnect($params)
    {
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }

    //make connection from user, config is in 'config/DB_params.php'
    public static function connect()
    {
        $params = include_once('config/DB_params.php');
        return self::getConnect($params);
    }

    //make root connection to DB, config is in 'config/DB_params_root.php'
    public static function connectRoot()
    {
        $params = include_once('config/DB_params_root.php');
        return self::getConnect($params);
    }
}