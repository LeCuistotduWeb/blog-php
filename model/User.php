<?php

/**
 * class user
 */
class User
{

  private $id;
  private $username;
  private $password;
  private $email;


  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  // getters
  public id() { return $this->id; }
  public Username() { return $this->username; }
  public Password() { return $this->password; }
  public Email() { return $this->email; }

  // setters
  public setId($id) {
    $id = (int) $id;

    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
  public setUsername($username) {
    $username = (string) $username;
    $this->username = $username;
  }
  public setPassword($password) {
    $password = (string) $password;
    $this->password = $password;
  }
  public setEmail($email) {
    $email = (string) $email;
    $this->email = $email;
  }
}
