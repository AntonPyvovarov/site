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
    public function getNews($categoryId = false, $page)
    {
        if ($categoryId) {
            $page = intval($page);

            $offset = ($page - 1) * $this->itemsPerPage;
            $result = $this->db->query("SELECT `news`.`id`,`news`.`title`, `news`.`photo`,`category_id`, `category`.`category` 
                                            FROM `news` 
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

    public function mainNews()
    {
        $result = $this->db->query("SELECT * FROM $this->table 
                                        ORDER BY `date` DESC LIMIT 18 OFFSET 3 ");

        return $result;
    }
}