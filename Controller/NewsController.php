<?php


namespace Controller;


use Common\Session;

use Model\CommentModel;
use Model\NewsModel;

class NewsController extends BaseController
{
    protected $model;
    protected $name = 'News';
    protected $itemPerPage=6;
    protected $view='news';



    public function item($id)
    {
        $id=intval($id);
        $news=new NewsModel();
        $item = $news->item($id);
        $comment=new CommentModel();
        if (!$item) {
            $this->render404();
        }
        self::Comment($id);
        $this->data['comment']=$comment->getComment($id);

        $this->data['item'] = $item;
        $this->render('item');
    }

    public function Comment($id)
    {
        if (isset($_POST)&& isset($_POST['message']))
        {
            $message=self::protect($_POST['message']);
            if(strlen($message)>1) {
                $userId = Session::get ( 'userId' );
                $userId = isset( $userId ) ? $userId : false;
                $comment = new CommentModel();
                $comment->setComment ( $message, $id, $userId );
            }
        }
    }

}