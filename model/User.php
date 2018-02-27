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


  function __construct()
  {

  }

  // getters
  public getId() { return $this->id; }
  public getUsername() { return $this->username; }
  public getPassword() { return $this->password; }
  public getEmail() { return $this->email; }

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
