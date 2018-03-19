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

  function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  /**
   * function hydrate
   */
  private function hydrate(array $donnees) {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  // getters
  public function id() { return $this->id; }
  public function username() { return $this->username; }
  public function password() { return $this->password; }
  public function email() { return $this->email; }

  // setters
  public function setId($id) {
    $id = (int) $id;

    if ($id > 0)
    {
      $this->id = $id;
    }
  }
  public function setUsername($username) {
    $username = (string) $username;
    $this->username = $username;
  }
  public function setPassword($password) {
    $password = (string) $password;
    $this->password = $password;
  }
  public function setEmail($email) {
    $email = (string) $email;
    $this->email = $email;
  }
}
