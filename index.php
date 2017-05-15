
<?php
require_once 'settings.php';
require_once 'autoload.php';

session_start();


//show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//default variable
$controller = 'index';
$action = 'index';
$param = null;
//Get url

$url = ltrim($_SERVER[ 'REQUEST_URI' ], '/');

$url = explode("?", $url);
$url = array_shift($url);
$url = explode("/", $url);
//when put on server delete this dir
$deleteDir = array_shift($url);
if (isset($url[ 0 ])) {
    $controller = $url[ 0 ];
    if ($url[ 0 ] === '') {
        $controller = 'Index';
    }
}
if (isset($url[ 1 ])) {
    $action = $url[ 1 ];
}
if (isset($url[ 2 ])) {
    $param = $url[ 2 ];
}

$controller = ucfirst(strtolower($controller));
//check if is Admin go to the admin page
if($controller==="Admin" && \Common\Session::get('isAdmin')!=='1'){
    header('Location: /mySite/index');

}
    $controllerName = 'Controller\\' . $controller . 'Controller';
    $controllerObj = new $controllerName;
    $controllerObj->$action( $param );
