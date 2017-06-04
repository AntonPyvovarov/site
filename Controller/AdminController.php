<?php


namespace Controller {

    use Model\AdminCatModel;
    use Model\AdminNewsModel;


    class AdminController extends BaseController
    {
        protected $name = 'Admin';
        protected $itemPerPage = 10;
        protected $view = 'adminNews';


        public function getModel ()
        {
            return new AdminNewsModel();
        }


        public function index ()
        {
            //add category in the method index
            self::addCategory ();
            //delete category
            self::deleteCategory ();
            $this->render ( 'adminCategory' );
        }

        public function news ($id)
        {
            //delete news
            self::deleteNews ();
            //show news
            self::category ( $id );

        }

        public function addCategory ()
        {
            if (isset( $_POST ) && isset( $_POST['category'] )) {
                $cat = self::protect ( $_POST['category'] );
                if (strlen ( $cat ) > 3) {
                    $category = new AdminCatModel();
                    $authCat = $category->categoryValidate ( $cat );

                    if ($cat !== $authCat) {
                        $category->addCategory ( $cat );
                        $this->message = "Категорія добавлена";
                    } else {
                        $this->message = "Категорія вже існує";
                    }
                } else {
                    $this->message = "Пуста категорія або менше 3 символів ";
                }
            }
        }

        public function deleteCategory ()
        {
            if (isset( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'deleteCat') {
                $id = $_POST['id'];
                $del = new AdminCatModel();
                $del->delete ( $id );
            }
        }

        public function updateCat ()
        {

        }


        public function deleteNews ()
        {
            if (isset( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'deleteNews') {
                $id = $_POST['id'];
                $del = $this->getModel ();
                $del->delete ( $id );
            }
        }

        public function updateNews ()
        {

        }
    }

}