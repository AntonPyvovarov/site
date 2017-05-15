<?php

namespace Controller;


use Model\CategoryModel;

 class BaseController
{

    protected $name;
    protected $layout = 'default';
    protected $data;
    protected $message;
    protected $user;

    /**
     * @param $templateName
     */
    protected function render($templateName)
    {
        $data = $this->data;
        $message = $this->message;
        $menu = new CategoryModel();
        $data['menu'] = $menu->all();
        ob_start();
        //динамический контент
        $render = SITE_DIR . DS . 'View' . DS . $this->name . DS . $templateName . '.php';
        if ($render) {
            include($render);
        }
        $content = ob_get_clean();
        include SITE_DIR . DS . 'View' . DS . 'Layout' . DS . $this->layout . '.php';
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
}



