<?php
/**
 *  class Bdd
 *  Permet la connexion à la  db
 */
class Database
{

  protected $db;
  private $db_host      = "localhost";
  private $db_name      = "blog-php";
  private $db_login     = "root";
  private $db_password  = "";

  public function __construct()
  {
    $db = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', $this->db_login, $this->db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $this->db = $db;
  }
}
