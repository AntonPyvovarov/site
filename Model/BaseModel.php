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
    public function getNews($categoryId = false, $page)
    {
        if ($categoryId) {
            $page = intval($page);

            $offset = ($page - 1) * $this->itemsPerPage;
            $result = $this->db->query("SELECT `news`.`id`,`news`.`title`, `news`.`photo`,`news`.`date`, `news`.`raiting`,
                                              `category_id`, `category`.`category` 
                                            FROM $this->table 
                                            LEFT JOIN `category` 
                                            ON `news`.`category_id`=`category`.`id` 
                                            WHERE `status`=1 
                                            AND `category_id`=$categoryId 
                                            ORDER BY `date` DESC
                                            LIMIT $this->itemsPerPage  
                                            OFFSET ".$offset);


        }

        return $result;

    }

    public function delete($id){

        $id=intval($id);
        $result=$this->db->query("DELETE FROM $this->table WHERE `id`=$id LIMIT 1");
        return $result;

    }


}

