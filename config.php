<?php
/**
 * class autoloader
 */
class Autoloader
{

  public static function start(){
    spl_autoload_register(array(__class__, 'autoload'));

    $root = $_SERVER['DOCUMENT_ROOT'];
    $host = $_SERVER['HTTP_HOST'];

    define('ROOT', $root.'/Blog-mvc/app/');
    define('HOST', 'http://'.$host.'/Blog-mvc/');


    define('CONTROLLER', ROOT.'controller/');
    define('MODEL', ROOT.'model/');
    define('VIEW', ROOT.'view/');
    define('PUBLICS', HOST.'public/');

  }

  public static function autoload($class){
    if(file_exists(MODEL . $class . '.php')){
      include_once (MODEL . $class . '.php');
    } else if(file_exists(CONTROLLER . $class . '.php')){
        include_once (CONTROLLER . $class . '.php');
      }else if(file_exists(VIEW . $class . '.php')){
        include_once (MODEL . $class . '.php');
    };
  }
}
