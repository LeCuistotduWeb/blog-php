<?php

/**
 * class UserManager
 */
class UserManager
{

  private $db;

  public function __construct(){
    $db = $this->getDb();
  }

/**
 * verifie validité identifiant et mot de passe
 * @param $username
 * @param $password
 * @return boolean
 */
public function login($username, $password){
    $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
    var_dump(password_hash($password));
    if($user){
        if($user->password === sha1($password)){
            $_SESSION['auth'] = $user->id;
            return true;
        }
    }
    return false;
}
/**
 * verifier si connecté
 */
  public function logged(){
    return isset($_SESSION['auth']);
  }

  /**
  * function addUser
  * ajoute un utilisateur
  */
  public function addUser() {
      $newUser = [];
      // Hachage du mot de passe
      $pass = "password";
      $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

      $req = $this->db->prepare('INSERT INTO users(username, password, email) VALUES(:username, :password, :email)');
      $req->execute(array(
        'username' => "JForteroche",
        'password' => $pass_hache,
        'email' => "jean.forteroche@gmail.com"
      ));

      return $newUser;
  }

  /**
  * function loginVerify
  * verification utilisateur et mot de passe
  */
  public function loginVerify($userObj){
    $resultat=[];
    $req = $this->db->prepare('SELECT id, password FROM users WHERE username = :username');
    $req->execute(array(
      'username' => $userObj->username()
    ));
    while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
    $resultat[] = new Post($donnees);

    $isPasswordCorrect = password_verify($donnees->password(), $userObj->passsword());
    if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }

  }
}

  /**
   * connection bdd
   */
  public function getDb(){
    if($this->db === NULL) {
      $db = new PDO('mysql:host=localhost;dbname=blog-php;charset=utf8', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $this->db = $db;
    }
    return $db;
  }
}
