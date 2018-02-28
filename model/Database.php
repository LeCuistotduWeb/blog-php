<?php

/**
 * class database
 */
abstract class Database {

  private $db;
  private $db_host;
  private $db_name;
  private $db_user;
  private $db_pass;

  public function __construct($db_name = "blog-php", $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

  function getDb(){
    if($this->db === NULL) {
      $db = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $this->db = $db;
    }
    return $db;
  }
}
