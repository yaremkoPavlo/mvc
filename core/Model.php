<?php
namespace core;
use config\DBconfig;

class Model
{
    protected $db;
    public function __construct()
    {
        //$this->db = DBconfig::connect();

    }

    /**
     * @param $controller
     * @return array
     */
    public function getAllInformation($controller)
    {
        $result = $this->db->query("SELECT * FROM tableName");
        return self::makeArrayFromDB($result);
    }

    /**
     * @param $paramArray
     * @return array
     */
    public function getPartInformation($paramArray)
    {
        $result = $this->db->query(self::makeSelectQueryString($paramArray));
        return self::makeArrayFromDB($result);
    }

    /**
     * @param $id
     * @return array
     */
    public function getRowById($id)
    {
        $result = $this->db->query("SELECT * FROM tableName WHERE id=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }

    /**
     * @param $paramArray
     * @return string
     */
    protected static function makeSelectQueryString( $paramArray)
    {
        //this we should send param from url to parser module with query map
        $query = QueryModule::renderParams($paramArray);
        return $query;
    }

    /**
     * @return array
     */
    //make array from DB response, where $result is result of query
    protected static function makeArrayFromDB($result)
    {
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newResult = [];
        while ($row = $result->fetch())
        {
            $newResult[] = $row;
        }
        return $newResult;
    }

}