<?php


namespace Model;




class AdminModel extends BaseModel
{
    protected $itemsPerPage=10;

    public function addCategory($cat)
    {
    $cat=$this->db->escape($cat);
    $sql="INSERT INTO `category` SET `category`='{$cat}' ";

    return $this->db->query($sql);

    }
public function categoryValidate($cat)
{
    $sql="SELECT * FROM `category` WHERE `category`='{$cat}'";

    $result= $this->db->query($sql);
    return $result[0]['category'];
}



}