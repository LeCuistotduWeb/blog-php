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
  public Id() { return $this->id; }
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
  public setUsername($password) {
    $password = (string) $password;
    $this->password = $password;
  }
  public setUsername($email) {
    $email = (string) $email;
    $this->email = $email;
  }
}
