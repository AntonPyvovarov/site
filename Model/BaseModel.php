<?php


namespace Model;


use Common\DB;


class BaseModel
{
    protected $db;
    protected $table;
    protected $itemsPerPage ;
    /**
     * BaseModel constructor.
     */
    public function __construct()
    {
        $this->db = new DB();
    }
        //get all list
    /**
     * @return array|bool|\mysqli_result
     */
    public function all()
    {
        $result = $this->db->query("SELECT * FROM  $this->table");

        return $result;
    }



    public function item($id)
    {

        $result = $this->db->query("SELECT * FROM $this->table WHERE  id= ".$id);
        if (!$result){
            return false ;
        }
        return $result ;
    }


    /**
     * get count news from one category
     * @param $id
     * @return array|bool|\mysqli_result
     */
    public function getCountNews($id){
        $id=intval($id);
        $result=$this->db->query("SELECT count(*) as count  FROM $this->table WHERE `category_id`=$id");


        return $result[0]['count'];

    }
}

