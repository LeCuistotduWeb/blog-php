<?php
/**
 * class autoloader
 */
class Autoloader
{

  public static function start(){
    spl_autoload_register(array(__class__, 'autoload'));


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
