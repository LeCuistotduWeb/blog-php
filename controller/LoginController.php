<?php
/**
 *
 */
class LoginController
{

  public static function login() {
    $Session = new Session();
    require(VIEW.'frontend/loginView.php');
  }

  public static function addUser() {
    $userManager = new UserManager();
    $addUser = $userManager->addUser();
    if ($newPost === false) {
        throw new Exception('Impossible d\'ajouter l\'utilisateur');
    }
    else {
        header('Location: backend');
      }
  }

  public static function loginVerify($username, $password){
    $userManager = new UserManager();
    $userObj = new User(array(
      'username' => $username,
      'password'  => $password,
    ));
    $confirmUser = $userManager->loginVerify($userObj);
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('Location: backend');
    }
    else {
      echo 'Mauvais identifiant ou mot de passe !';
    }
  }
}
