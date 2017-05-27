<?php

namespace Controller;

use Model\ContactModel;
use Model\NewsModel;


class IndexController extends BaseController
{
    protected $name = 'Index';


    public function index()
    {
        $main=new NewsModel();
        $this->data['carousel']=$main->carousel();
        $this->data['mainNews']=$main->mainNews();
        $this->render('main');
    }

    public function contact()
    {
        $this->message;
        /*adding massege */
        if ($_POST){
            $message=new ContactModel();
            $message->save($_POST);
            $this->message ='Thank U for your message!';
        }
        $this->render('contact');
    }

}