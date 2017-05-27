<?php

namespace Common;


class DB
{
protected $connection;

public function __construct()
{
    $this->connection=new \mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $this->query('SET NAMES UTF8');
}
    /**
     * @param $sql
     * @return array|bool|\mysqli_result
     */
public function query($sql){
    $result=$this->connection->query($sql);
    if (is_bool($result)){
        return $result;
    }
    $data=[];

    while ($row =mysqli_fetch_assoc ($result)){
         $data[] =$row;
    }
    if(!$data) {
        return false;
    }
    return $data ;
}

    /**
     * protect for sql injection
     * @param $value
     * @return string
     */
public function escape($value){
    return $this->connection->real_escape_string($value);
}
}