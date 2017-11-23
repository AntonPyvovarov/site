<?php

namespace Common;


class DB
{
private static $connection;


    public static   function getInstance(){
        if (self::$connection===null){
            self::$connection=new \mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
            self::$connection->query  ('SET NAMES UTF8');
            if (self::$connection->errno){
                die("Error while connect to MySql");
            }
        }
        return self::$connection;
    }
    private function __clone() { //запрещаем клонирование объекта модификатором private
    }

    protected function __wakeup(){

    }

    public function __construct ()
    {
        $this->db=DB::getInstance ();
    }

    /**
     * @param $sql
     * @return array|bool|\mysqli_result
     */
    public function query ($sql)
    {
        $result = $this->db->query ( $sql );
        if (is_bool ( $result )) {
            return $result;
        }
        $data = [];
        while ($row = mysqli_fetch_assoc ( $result )) {
            $data[] = $row;
        }
        if (!$data) {
            return false;
        }
        return $data;
    }


    /**
     * protect for sql injection
     * @param $value
     * @return string
     */
    public function escape ($value)
    {
        return $this->db->real_escape_string ( $value );
    }

}