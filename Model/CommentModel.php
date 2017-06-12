<?php


namespace Model;


class CommentModel extends BaseModel
{
    protected $table='comment';
    public function getComment($id)
    {
        $sql="SELECT  `comment`.`text`,`comment`.`news_id`,`user`.`name` 
FROM `comment` LEFT JOIN `user` ON `comment`.`user_id`=`user`.`id` WHERE `news_id`=$id";
       $result=$this->db->query($sql);
        return $result ;
    }

    public function setComment($text, $id,$userId)
    {

        $text= $this->db->escape($text);
        $id= $this->db->escape($id);
        $sql="INSERT INTO $this->table (`id`, `text`, `is_active`, `news_id`, `user_id`) 
                        VALUES (NULL, '{$text}', '1', '{$id}', '{$userId}');";
        return $this->db->query($sql);
    }
}