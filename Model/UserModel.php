<?php


namespace Model;





use Common\Session;

class UserModel extends BaseModel
{
    public $userName;
    public $pass;
    public $email;

    /**
     * @return array|bool|\mysqli_result
     */
    public function registration()
    {
        $this->email= $this->db->escape($this->email);
        $this->pass= $this->db->escape($this->pass);
        $this->userName= $this->db->escape($this->userName);

        $sql = "INSERT INTO `user` SET `email`='{$this->email}',
                                    `name`='{$this->userName}',
                                    pass='{$this->pass}'";
        return $this->db->query($sql);
    }
    /**
     * @return bool
     */
    public  function userValidate()
    {

        $sql = "SELECT * FROM `user` WHERE email = '{$this->email}' LIMIT 1";
        $result = $this->db->query($sql);
        if (isset($result[ 0 ])) {
            return $result[ 0 ];
        }
        return false;
    }

    public function loginUser()
    {
        $user = $this->userValidate();
        if ($user[ 'pass' ] == $this->pass) {
            return $user;
        }
        return false;
    }

    public  function checkUser()
    {
        if (!Session::get('user')) {
            return false;
        }
        return true;
    }
}