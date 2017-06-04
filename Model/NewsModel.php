<?php


namespace Model;


class newsModel extends BaseModel
{
    protected $itemsPerPage=6;
    protected $table = "news";
    /**
     * show last 3 news
     * @return array|bool|\mysqli_result
     */
    public function carousel()
    {
        $result = $this->db->query("SELECT * FROM $this->table ORDER BY `date` DESC LIMIT 3");

        return $result;
    }


    public function mainNews()
    {
        $result = $this->db->query("SELECT * FROM $this->table 
                                        ORDER BY `date` DESC LIMIT 21 OFFSET 3 ");

        return $result;
    }
}