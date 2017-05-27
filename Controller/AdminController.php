<?php


namespace Controller {

    use Model\AdminModel;
    use Model\NewsModel;

    class AdminController extends BaseController
    {
        protected $name = 'Admin';
        protected $itemPerPage=20;
        protected $view='adminNews';



        public function index ()
        {

            //add category in the method index
            if (isset( $_POST ) && isset( $_POST['category'] )) {
                $cat = self::protect ( $_POST['category'] );
                if (strlen ( $cat ) > 3) {
                    $category = new AdminModel();
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
            $this->render ( 'admin' );
        }







    }
}