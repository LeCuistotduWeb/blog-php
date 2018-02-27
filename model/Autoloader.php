<?php

/**
 * class autoloader
 */
class Autoloader
{

  private static function autoload($classe)
  {
    require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
  }

  public static function register(){
    spl_autoload_register(array(__CLASS__, 'autoload')); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
  }
}
