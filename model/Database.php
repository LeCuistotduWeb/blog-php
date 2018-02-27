<?php

/**
 * class database
 */
// class Database {
//
//   private $db;
//   private $db_host;
//   private $db_name;
//   private $db_user;
//   private $db_pass;
//
//   public function __construct($db_name = "blog-php", $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
//         $this->db_name = $db_name;
//         $this->db_user = $db_user;
//         $this->db_pass = $db_pass;
//         $this->db_host = $db_host;
//     }
//
//   function getDb(){
//     if($this->db === NULL) {
//       $db = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
//       $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//       $this->db = $db;
//     }
//     return $db;
//   }
//
//   public function query($statement, $class_name){
//     $req = $this->getDb()->query($statement);
//     $datas = $req->fetchAll(PDO::FETCH_OBJ, $class_name);
//     $datas;
//
//   }
//
//   public function prepare($statement, $attributes , $class_name, $one){
//     $req = $this->getDb()->prepare($statement);
//     $req->execute($attributes);
//     $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
//     if ($one) {
//       $datas = $req->fetch();
//     }
//     else {
//       $datas = $req->fetchAll();
//     }
//     $datas;
//   }

}
