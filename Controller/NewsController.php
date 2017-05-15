<?php


namespace Controller;


use Lib\Pagination;
use Model\NewsModel;

class NewsController extends BaseController
{
    protected $model;
    protected $name = 'News';
    public $itemPerPage=5;
    public function __construct()
    {
        $this->model = new NewsModel();
    }

    /**
     * @param $id
     */

    public function category($id)
    {
        $page=isset($_GET['page'])? intval($_GET['page']):1;
        $this->data['page']=new Pagination
        ([
            'itemsCount' => $this->model->getCountNews ( $id ),
            'itemsPerPage' => $this->itemPerPage,
            'currentPage' => $page
        ]);
        $getNews = $this->model->getNews($id, $page);
        if (!$getNews) {
            $this->render404();
        }
        $this->data['category'] = $getNews;
        $this->render('news');
    }

    public function item($id)
    {
        $item = $this->model->item($id);
        if (!$item) {
            $this->render404();
        }
        $this->data['item'] = $item;
        $this->render('item');
    }
}