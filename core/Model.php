<?php
//namespace core;

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

    //make array from query, where $result is result of query and $tableRules is array with key from DB table
    //return array
    protected static function makeArrayFromQuery($result)
    {
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newResult = [];
        while ($row = $result->fetch())
        {
            $newResult[] = $row;
        }
        return $newResult;

    }

    public static function getAllInformation($controller)
    {
        $db = self::connectToDB($controller->getSecuredStatus);
        $result = $db->query("SELECT * FROM tableName");
        return self::makeArrayFromQuery($result);
    }

    public static function getPartInformation($paramArray, $controller)
    {
        $db = self::connectToDB($controller->getSecuredStatus);

        //SELECT * FROM tableName WHERE par0=$paramArray[0] AND\OR par1=$paramArray[1] ...

        $result = $db->query(self::makeSelectQueryString($paramArray));
        return self::makeArrayFromQuery($result);
    }

    public static function getRowFromDB($id, $controller)
    {
        $db = self::connectToDB($controller->getSecuredStatus);
        $result = $db->query("SELECT * FROM tableName WHERE id=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    protected static function makeSelectQueryString( $paramArray)
    {
        $query = "SELECT * FROM tableName WHERE ";
        //this we should send param from url to parser module with query map, but I didn't have time for this
        $query = $query . QueryModule::renderParams($paramArray);
        $query = $query.";";
        return $query;
    }
}