<?php


namespace Controller {

    use Model\AdminModel;
    use Model\NewsModel;
    class AdminController extends BaseController
    {
        protected $name='Admin';


        public function index(){

                $this->render('admin');


        }


        public  function addCategory(){
            if(isset($_POST)&& isset($_POST['category'])){

            }
        }

        public function category($id){
            $news= new AdminModel();
            $data['news']=$news->getNews($id);
        }

    }
}