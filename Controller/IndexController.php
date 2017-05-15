<?php

namespace Controller;

use Model\MessageModel;
use Model\NewsModel;


class IndexController extends BaseController
{
    protected $name = 'Index';


    public function index()
    {
        $carousel=new NewsModel();
        $this->data['carousel']=$carousel->carousel();
        $this->data['price'] = '340 $';
        $this->data['siteName'] = SITE_NAME;
        $this->render('main');
    }

    public function contact()
    {
        $this->message;
        /*adding massege */
        if ($_POST){
            $message=new MessageModel();
            $message->save($_POST);
            $this->message ='Thank U for your message!';
        }
        $this->render('contact');
    }

}