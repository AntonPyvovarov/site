<?php


namespace Model;


class newsModel extends BaseModel
{
    protected $itemsPerPage=6;
    protected $table = "news";

    public $title;
    public $short_content;
    public $text;
    public $category_id;
    public $tags_id;
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

    public function setNews()
    {
        $this->title=$this->db->escape($this->title);
        $this->short_content=$this->db->escape($this->short_content);
        $this->text=$this->db->escape($this->text);
        $this->category_id=$this->db->escape($this->category_id);
        $this->tags_id=$this->db->escape($this->tags_id);

        $uploads_dir=SITE_ROOT.'/View/img/';
        $tmp_file = $_FILES["photo"]["tmp_name"];
        $file_name =$_FILES['photo']['name'];
        move_uploaded_file($tmp_file, $uploads_dir.$file_name);



       $result= $this->db->query("INSERT INTO $this->table SET 
                               `title`='{$this->title}',
                               `short_content`='{$this->short_content}',
                                `text`='{$this->text}',
                                `photo`='{$file_name }';
                                `category_id`='{$this->category_id}',
                                `tags_id`='{$this->tags_id}'");
       return $result;
    }

    public function search($search)
    {
       $search=$this->db->escape($search);
       $result=$this->db->query("SELECT FROM $this->table WHERE `title` LIKE '$search%'");
       return $result;
    }

}