<?php

/**
 * class database
 */
class Database {

  private $db;

  public function dbConnect()
  {
      $db = new PDO('mysql:host=localhost;dbname=blog-php;charset=utf8', 'root', '');
      return $db;
  }
}
