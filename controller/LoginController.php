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
    $Session = new Session();
    $userManager = new UserManager();
    $userObj = new User(array(
      'username' => $username,
      'password'  => $password,
    ));
    $confirmUser = $userManager->loginVerify($username);
    if($confirmUser == false){
      $Session->setFlash('Mauvais identifiant ou mot de passe !','danger');
      header('Location: login');
    }
    else{
      // verifié password
      $isPasswordCorrect = password_verify($password, $confirmUser->password());
      if ($isPasswordCorrect == true) {
        $Session->setFlash('Vous êtes connecté !','success');
        $_SESSION['auth'] = $confirmUser->username();
        header('Location: backend');
      }
      else {
        $Session->setFlash('Mauvais identifiant ou mot de passe !','danger');
        header('Location: login');
      }
    }
  }

  public static function disconnect() {
    $session = new Session();
    $session->disconnect();
    header('Location: listsPost');
  }
}
