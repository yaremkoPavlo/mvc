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

    public static function getInform($paramArray, $isSecured)
    {
        $db = self::connectToDB($isSecured);
        //SELECT * FROM tableName WHERE par0=$paramArray[0] par1=$paramArray[1] ...
        return $db->query('some query');
    }

}