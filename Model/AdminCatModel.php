<?php


namespace Model;


class AdminCatModel extends BaseModel
{
    protected $table='category';

    public function addCategory ($cat)
    {
        $cat = $this->db->escape ( $cat );
        $sql = "INSERT INTO $this->table SET `category`='{$cat}' ";
        return $this->db->query ( $sql );
    }

    public function categoryValidate ($cat)
    {
        $sql = "SELECT * FROM $this->table WHERE `category`='{$cat}'";

        $result = $this->db->query ( $sql );
        return $result[0]['category'];
    }

}