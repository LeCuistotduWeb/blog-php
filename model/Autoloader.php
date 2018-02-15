<?php

/**
 * class autoloader
 */
class Autoloader
{

  static private function autoload($classe)
  {
    require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
  }

  static public function register(){
    spl_autoload_register(array(__CLASS__, 'autoload')); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
  }
}
