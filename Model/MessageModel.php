<?php

namespace Model;


class MessageModel extends BaseModel
{
    protected $table = 'messages';

    /**
     * @param $data
     * @return array|bool|\mysqli_result
     */
    public function save($data)
    {

        $data['name']=$this->db->escape($data['name']);
        $data['email']=$this->db->escape($data['email']);
        $data['message']=$this->db->escape($data['message']);

        $sql = "INSERT INTO messages set `name`='{$data['name']}',
                                            email='{$data['email']}',
                                            message='{$data['message']}'";
        return $this->db->query($sql);

    }
}