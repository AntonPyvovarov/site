<?php

namespace Controller;

use Model\ProductModel;

class ProductController extends BaseController
{
    protected $name = 'Product';
    public function index()
    {

    }
    /**
     *show all items from category
     */
    public function all(){
        $productModel= new ProductModel();
        $this->data['category']=$productModel->all();
        $this->render('products');
    }

    /**
     * @param $id
     * show one item
     */
    public function item($id){
        $item =new ProductModel();
        $item=$item->item($id);
        if (!$item){
            return $this->render404 ();
        }
        $this->data['item']=$item;
        $this->render('item');

    }
}