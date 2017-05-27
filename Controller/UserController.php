<?php


namespace Controller;


use Common\Session;
use Model\UserModel;

class UserController extends BaseController
{

    protected $name = 'User';
    protected $message;

    public function __construct ()
    {
        $this->user = new UserModel();
    }

    /**
     *register new user
     *
     */
    public function register ()
    {

        if ($this->user->checkUser ()) {
            header ( 'Location: /mySite/index' );
            return;
        }
        if ($_POST && $_POST['name'] && strlen ( $_POST['name'] ) > 2 &&
            $_POST && $_POST['pass'] && strlen ( $_POST['pass'] ) > 5
            && $_POST['pass'] === $_POST['confirmPass']
        ) {
            $name = self::protect ( $_POST['name'] );
            $pass = self::protect ( $_POST['pass'] );
            $email = self::protect ( $_POST['email'] );

            $this->user->email = $email;
            $authUser = $this->user->userValidate ();

            if ($authUser['email'] == $email) {
                $this->message = 'Такий емеіл вже існує ';
            } else {
                $this->user->userName = $name;
                $this->user->pass = md5 ( $pass . SALT );
                $this->user->registration ();
                header ( 'Location: /mySite/index' );
            }
        }
        $this->render ( 'register' );
    }

    public function login ()
    {

        if ($this->user->checkUser ()) {
            header ( 'Location: /mySite/index' );
            return;
        }
        if ($_POST && $_POST['email'] && $_POST['pass']) {
            $this->user->email = $_POST['email'];
            $this->user->pass = md5 ( $_POST['pass'] . SALT );
            $res = $this->user->loginUser ();
            if ($res) {
                Session::set('userId', $res['id']);
                Session::set ( 'isAdmin', $res['is_admin'] );
                Session::set ( 'user', $res['name'] );
                if ($res['is_admin']) {
                    header ( 'Location: /mySite/Admin/index' );
                    return;
                } else {
                    header ( "Location:". $_SERVER['HTTP_REFERER'] );
                    return;
                }
            }
            $this->message = 'Повторіть спробу';
        }
        $this->render ( 'login' );
    }

    public static function logOut ()
    {
        Session::destroy ();
        header ( 'Location: /mySite/index' );
    }


}