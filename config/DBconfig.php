<?php
namespace config;

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
        return self::getConnect(DBparams::params);
    }

}