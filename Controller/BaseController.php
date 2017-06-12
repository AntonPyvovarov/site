<?php

namespace Controller;


use Lib\Pagination;
use Model\CategoryModel;
use Model\NewsModel;
use Model\TagModel;

class BaseController
{

    protected $name='News';
    protected $layout = 'default';
    protected $data;
    protected $message;
    protected $user;
    protected $itemPerPage;
    protected $view;


    /**
     * @param $templateName
     */
    protected function render($templateName)
    {
        $data = $this->data;
        $message = $this->message;

        $data['menu']=self::getCat();
        self::search();
        ob_start();
        //динамический контент
        $render = SITE_DIR . DS . 'View' . DS . $this->name . DS . $templateName . '.php';
        if ($render) {
            include($render);
        }
        $content = ob_get_clean();
        include SITE_DIR . DS . 'View' . DS . 'Layout' . DS . $this->layout . '.php';
    }

        public function getCat()
        {
            $menu = new CategoryModel();
            $menu = $menu->all();
            return $menu;

        }

    /**
     * show error page
     */
    protected function render404()
    {
        $data = $this->data;
        $message = $this->message;
        ob_start();
        include SITE_DIR . DS . 'View' . DS . '404.php';
        $content = ob_get_clean();
        include SITE_DIR . DS . 'View' . DS . 'Layout' . DS . $this->layout . '.php';
    }

    /**
     * @param $text
     * @return string
     */
    public static function protect($text)
    {
        $text = trim($text);
        $text = strip_tags($text);
        return $text;
    }

     /**
      * get news by $id with pagination
      */
     public function category($id)
     {
         $page=isset($_GET['page'])? intval($_GET['page']):1;
         $news = $this->getModel();
         $this->data['page']=new Pagination
         ([
             'itemsCount' => $news->getCountNews ( $id ),
             'itemsPerPage' => $this->itemPerPage,
             'currentPage' => $page
         ]);
         $getNews = $news->getNews($id, $page);
         if (!$getNews) {
             $this->render404();
         }
         $this->data['news'] = $getNews;
         $this->render($this->view);
     }


     public function getModel()
     {
         return  ;
     }

     public function  getTags()
     {
         $tags=new TagModel();
         $this->data['tags']=$tags->all();
     }

    public function search()
    {
        print_r($_POST);
        if(isset($_POST)&& isset($_POST['search'])){
            $text=self::protect($_POST['search']);
            $search=new newsModel();
            $data['search']=$search->search($text);
            $this->render('search');
            return;
        }
        }

 }



